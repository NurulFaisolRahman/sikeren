<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('AkunDosen') != 'Dosen'){
			redirect(base_url()); 
		} 
	}

	public function SesiNotif(){
		$this->session->set_userdata('NamaDosen', $_POST['NamaDosen']);
		$this->session->set_userdata('NIPDosen', $_POST['NIPDosen']);
	}
	
	public function PDF(){
		$this->load->library('Pdf');
		$this->load->view('pdf');
  }

	public function Profil(){ 
		$NIP = $this->session->userdata('NIP');
    $Data['Halaman'] = 'Profil';
    $Data['SubMenu'] = '';
		$Data['Profil'] = $this->db->get_where('Dosen', array('NIP' => $NIP))->row_array(); 
		$Bidang = array('Penelitian','Pengabdian','Penunjang');
		$TahunKreditLama = $this->db->query("SELECT Tahun FROM Dosen WHERE NIP=".$NIP)->row_array()['Tahun']+1; 
		$Data['KreditBaru'] = 0;
		$Data['KreditBidang'] = array(0,0,0,0);
		for ($i=0; $i < 3; $i++) { 
			$Kredit = $this->db->query("SELECT SUM(JumlahKredit) AS JumlahKredit FROM Realisasi".$Bidang[$i]." WHERE NIP=".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$TahunKreditLama)->row_array()['JumlahKredit'];
			$Data['KreditBaru'] += $Kredit;
			$Data['KreditBidang'][$i] += $Kredit;
		}
		if ($Data['Profil']['Semester'] == 'Genap') {
			for ($i=0; $i < 3; $i++) { 
				$Kredit = $this->db->query("SELECT SUM(JumlahKredit) AS JumlahKredit FROM Realisasi".$Bidang[$i]." WHERE NIP=".$NIP." AND Semester = 'Ganjil' AND JumlahKredit != 0 AND Tahun = ".($TahunKreditLama-1))->row_array()['JumlahKredit'];
				$Data['KreditBaru'] += $Kredit;
				$Data['KreditBidang'][$i] += $Kredit;
			}
			$Kredit = $this->db->query("SELECT SUM(JumlahKredit) AS JumlahKredit FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND Semester = 'Ganjil' AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Tahun = ".($TahunKreditLama-1))->row_array()['JumlahKredit'];
			$Data['KreditBaru'] += $Kredit;
			$Data['KreditBidang'][3] += $Kredit;
			$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND Semester = 'Ganjil' AND IdKegiatan = 'PND3' AND Tahun = ".($TahunKreditLama-1))->result_array();
			$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND Semester = 'Ganjil' AND IdKegiatan = 'PND3' AND Tahun = ".($TahunKreditLama-1))->result_array();
			$Mk = array();
			for ($i=0; $i < count($Sortir); $i++) { 
				$Cek = true;
				for ($j=0; $j < count($data); $j++) {
					if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
						if ($Cek) {
							$Mk[$i] = $data[$j];
							$Cek = false;
						} 
						else {
							$Mk[$i]['JumlahKredit'] += $data[$j]['JumlahKredit'];
						}
					} 
				}
			}
			for ($i=0; $i < count($Mk); $i++) {
				if ($Mk[$i]['JumlahKredit'] > 10) {
					if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
						$Mk[$i]['JumlahKredit'] = 5+(($Mk[$i]['JumlahKredit']-10)*0.25);
					} else {
						$Mk[$i]['JumlahKredit'] = 10+(($Mk[$i]['JumlahKredit']-10)*0.5);
					}
				} else {
					if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
						$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit']*0.5;
					} else {
						$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit'];
					}
				}
			}
			for ($i=0; $i < count($Mk); $i++) {
				$Data['KreditBaru'] += $Mk[$i]['JumlahKredit'];
				$Data['KreditBidang'][3] += $Mk[$i]['JumlahKredit'];
			} 
		}
		$Kredit = $this->db->query("SELECT SUM(JumlahKredit) AS JumlahKredit FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Tahun >= ".$TahunKreditLama)->row_array()['JumlahKredit'];
		$Data['KreditBaru'] += $Kredit;
		$Data['KreditBidang'][3] += $Kredit;
		$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun >= ".$TahunKreditLama)->result_array();
		$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun >= ".$TahunKreditLama)->result_array();
		$Mk = array();
		for ($i=0; $i < count($Sortir); $i++) { 
			$Cek = true;
			for ($j=0; $j < count($data); $j++) {
				if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
					if ($Cek) {
						$Mk[$i] = $data[$j];
						$Cek = false;
					} 
					else {
						$Mk[$i]['JumlahKredit'] += $data[$j]['JumlahKredit'];
					}
				} 
			}
		}
		for ($i=0; $i < count($Mk); $i++) {
			if ($Mk[$i]['JumlahKredit'] > 10) {
				if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
					$Mk[$i]['JumlahKredit'] = 5+(($Mk[$i]['JumlahKredit']-10)*0.25);
				} else {
					$Mk[$i]['JumlahKredit'] = 10+(($Mk[$i]['JumlahKredit']-10)*0.5);
				}
			} else {
				if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
					$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit']*0.5;
				} else {
					$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit'];
				}
			}
		}
		for ($i=0; $i < count($Mk); $i++) {
			$Data['KreditBaru'] += $Mk[$i]['JumlahKredit'];
			$Data['KreditBidang'][3] += $Mk[$i]['JumlahKredit'];
		}
		$this->load->view('Header',$Data);
		$this->load->view('Profil',$Data);
	}

	public function EditProfil(){ 
		if ($this->CekBukti($_FILES)){
			$Sertifikat = $_POST['SertifikatLama'];
			if (isset($_FILES['Sertifikat'])) {
				if($Sertifikat != ''){
					unlink('DTPS/'.$Sertifikat);
				}
				$NamaPdf = date('Ymd',time()).substr(password_hash('Sertifikat', PASSWORD_DEFAULT),7,7);
				$NamaPdf = str_replace("/","E",$NamaPdf);
				$NamaPdf = str_replace(".","F",$NamaPdf);
				move_uploaded_file($_FILES['Sertifikat']['tmp_name'], "DTPS/".$NamaPdf.".pdf");
				$Sertifikat = $NamaPdf.".pdf";
			}
			if($this->db->get_where('Dosen', array('NIP' => $_POST['NIP']))->num_rows() === 0 || $this->session->userdata('NIP') == $_POST['NIP']){
				$this->db->where('NIP', $this->session->userdata('NIP'));
				$this->db->update('Dosen',
												array('NIP' => $_POST['NIP'], 
															'NIDN' => $_POST['NIDN'],
															'KarPeg' => htmlentities($_POST['KarPeg']),
															'Nama' => htmlentities($_POST['Nama']),
															'Gender' => $_POST['Gender'],
															'Homebase' => $_POST['Homebase'],
															'Kelahiran' => htmlentities($_POST['Kelahiran']),
															'Jabatan' => $_POST['Jabatan'],
															'Pangkat' => $_POST['Pangkat'],
															'Golongan' => $_POST['Golongan'],
															'Semester' => $_POST['Semester'],
															'Tahun' => $_POST['Tahun'],
															'KreditLama' => $_POST['KreditLama'],
															'WA' => $_POST['WA'],
															'S2' => $_POST['S2'],
															'S3' => $_POST['S3'],
															'BidangKeahlian' => $_POST['BidangKeahlian'],
															'KesesuaianKompetensi' => $_POST['KesesuaianKompetensi'],
															'KesesuaianBidang' => $_POST['KesesuaianBidang'],
															'SertifikatPendidik' => $_POST['SertifikatPendidik'],
															'SertifikatKompetensi' => $_POST['SertifikatKompetensi'],
															'Sertifikat' => $Sertifikat));											
				$this->session->set_userdata('NIP', $_POST['NIP']);
				$this->session->set_userdata('Jabatan', $_POST['Jabatan']);
				echo '1';
			} else {
				echo "Akun Dosen Dengan NIP ".$_POST['NIP']." Sudah Ada!";
			}
		}
		else {
			echo 'Bukti Sertifikat Hanya Boleh PDF!';
		}
	}

	public function CekBukti($file){
		$valid_extensions = array("pdf");
		foreach ($file as $key) {
			$Tipe = pathinfo($key['name'],PATHINFO_EXTENSION);
			if(!in_array(strtolower($Tipe),$valid_extensions)) {
				return false;
			} 
		}
		return true;
	}

	public function NamaPejabat(){
		$this->db->where('NIP', $this->session->userdata('NIP'));
		$this->db->update('Dosen',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menyimpan Data!';
		}
	}

	public function GantiPassword(){
		$this->db->where('NIP', $this->session->userdata('NIP'));
		$this->db->update('Akun',array('Password' => password_hash($_POST['Password'], PASSWORD_DEFAULT)));	
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Mengganti Password!';
		}
	}
	
	public function Foto(){
		$Tipe = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
		$valid_extensions = array("jpg","jpeg","png");
		if(!in_array(strtolower($Tipe),$valid_extensions)) {
			echo 'Mohon Upload jpg/jpeg/png';
		} else {
			$Tipe = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
			$NamaFoto = date('Ymd',time()).substr(password_hash('Foto', PASSWORD_DEFAULT),7,3);
			$NamaFoto = str_replace("/","E",$NamaFoto);
			$NamaFoto = str_replace(".","F",$NamaFoto);
			move_uploaded_file($_FILES['file']['tmp_name'], "FotoDosen/".$NamaFoto.'.'.$Tipe);
			if ($_POST['NamaFoto'] != '') { unlink('FotoDosen/'.$_POST['NamaFoto']); }
			$this->db->where('NIP', $this->session->userdata('NIP'));
			$this->db->update('Dosen',array('Foto' => $NamaFoto.'.'.$Tipe));
			echo '1';
		}
	}

	public function LihatRealisasiPendidikan(){
		$this->session->set_userdata('IdKegiatanPendidikan', $_POST['ID']);
	}

	public function LihatRealisasiPenelitian(){
		$this->session->set_userdata('IdKegiatanPenelitian', $_POST['ID']);
	}

	public function LihatRealisasiPengabdian(){
		$this->session->set_userdata('IdKegiatanPengabdian', $_POST['ID']);
	}

	public function LihatRealisasiPenunjang(){
		$this->session->set_userdata('IdKegiatanPenunjang', $_POST['ID']);
	}

	public function SubPendidikan(){
		$this->session->set_userdata('SubPendidikan', $_POST['SubPendidikan']);
	}

	public function SubPenelitian(){
		$this->session->set_userdata('SubPenelitian', $_POST['SubPenelitian']);
	}

	public function SubPengabdian(){
		$this->session->set_userdata('SubPengabdian', $_POST['SubPengabdian']);
	}

	public function SubPenunjang(){
		$this->session->set_userdata('SubPenunjang', $_POST['SubPenunjang']);
	}

	public function Pendidikan(){
    $Data['Halaman'] = 'Kegiatan';
		$Data['SubMenu'] = 'Pendidikan';		
		$NIP = $this->session->userdata('NIP');
		$ID = $this->session->userdata('IdKegiatanPendidikan');
		$Data['Rencana'] = $this->db->query("SELECT * FROM RencanaPendidikan WHERE NIP=".$NIP)->result_array();
		$Data['KreditRealisasi'] = array();
		foreach ($Data['Rencana'] as $key) {
			$Tampung = $this->db->query("SELECT * FROM RealisasiPendidikan"." WHERE NIP=".$NIP." AND JumlahKredit != 0 AND Jenjang="."'".$key['Jenjang']."'"." AND Semester="."'".$key['Semester']."'"." AND Tahun="."'".$key['Tahun']."'")->result_array();
			$Total = 0;
			foreach ($Tampung as $data) {
				$Total+=$data['JumlahKredit'];
			}
			array_push($Data['KreditRealisasi'],$Total);
		}
		$Data['Realisasi'] = $this->db->get_where('RealisasiPendidikan', array('NIP' => $NIP,'IdKegiatan' => $ID))->result_array();
		$this->load->view('Header',$Data);
		$this->load->view('Pendidikan',$Data);
	} 

	public function Penelitian(){
    $Data['Halaman'] = 'Kegiatan';
		$Data['SubMenu'] = 'Penelitian';		
		$NIP = $this->session->userdata('NIP');
		$ID = $this->session->userdata('IdKegiatanPenelitian');
		$Data['Rencana'] = $this->db->query("SELECT * FROM RencanaPenelitian WHERE NIP=".$NIP)->result_array();
		$Data['KreditRealisasi'] = array();
		foreach ($Data['Rencana'] as $key) {
			$Tampung = $this->db->query("SELECT * FROM RealisasiPenelitian"." WHERE NIP=".$NIP." AND JumlahKredit != 0 AND Jenjang="."'".$key['Jenjang']."'"." AND Semester="."'".$key['Semester']."'"." AND Tahun="."'".$key['Tahun']."'")->result_array();
			$Total = 0;
			foreach ($Tampung as $data) {
				$Total+=$data['JumlahKredit'];
			}
			array_push($Data['KreditRealisasi'],$Total);
		}
		$Data['Realisasi'] = $this->db->get_where('RealisasiPenelitian', array('NIP' => $NIP,'IdKegiatan' => $ID))->result_array();
		$this->load->view('Header',$Data);
		$this->load->view('Penelitian',$Data);
	}

	public function Pengabdian(){
    $Data['Halaman'] = 'Kegiatan';
		$Data['SubMenu'] = 'Pengabdian';		
		$NIP = $this->session->userdata('NIP');
		$ID = $this->session->userdata('IdKegiatanPengabdian');
		$Data['Rencana'] = $this->db->query("SELECT * FROM RencanaPengabdian WHERE NIP=".$NIP)->result_array();
		$Data['KreditRealisasi'] = array();
		foreach ($Data['Rencana'] as $key) {
			$Tampung = $this->db->query("SELECT * FROM RealisasiPengabdian"." WHERE NIP=".$NIP." AND JumlahKredit != 0 AND Jenjang="."'".$key['Jenjang']."'"." AND Semester="."'".$key['Semester']."'"." AND Tahun="."'".$key['Tahun']."'")->result_array();
			$Total = 0;
			foreach ($Tampung as $data) {
				$Total+=$data['JumlahKredit'];
			}
			array_push($Data['KreditRealisasi'],$Total);
		}
		$Data['Realisasi'] = $this->db->get_where('RealisasiPengabdian', array('NIP' => $NIP,'IdKegiatan' => $ID))->result_array();
		$this->load->view('Header',$Data);
		$this->load->view('Pengabdian',$Data);
	}

	public function Penunjang(){
    $Data['Halaman'] = 'Kegiatan';
		$Data['SubMenu'] = 'Penunjang';		
		$NIP = $this->session->userdata('NIP');
		$ID = $this->session->userdata('IdKegiatanPenunjang');
		$Data['Rencana'] = $this->db->query("SELECT * FROM RencanaPenunjang WHERE NIP=".$NIP)->result_array();
		$Data['KreditRealisasi'] = array();
		foreach ($Data['Rencana'] as $key) {
			$Tampung = $this->db->query("SELECT * FROM RealisasiPenunjang"." WHERE NIP=".$NIP." AND JumlahKredit != 0 AND Jenjang="."'".$key['Jenjang']."'"." AND Semester="."'".$key['Semester']."'"." AND Tahun="."'".$key['Tahun']."'")->result_array();
			$Total = 0;
			foreach ($Tampung as $data) {
				$Total+=$data['JumlahKredit'];
			}
			array_push($Data['KreditRealisasi'],$Total);
		}
		$Data['Realisasi'] = $this->db->get_where('RealisasiPenunjang', array('NIP' => $NIP,'IdKegiatan' => $ID))->result_array();
		$this->load->view('Header',$Data);
		$this->load->view('Penunjang',$Data);
	}

	public function PAK(){
		$NIP = $this->session->userdata('NIP');
		$Data['Profil'] = $this->db->get_where('Dosen', array('NIP' => $NIP))->row_array();
		$Semester = explode('-',$this->uri->segment('3'));
		$Tahun = explode('-',$this->uri->segment('4'));
		$Data['KreditPendidikan1a'] = $Data['KreditPendidikan1b'] = $Data['KreditPendidikan2'] = $Data['KreditPenelitian'] = $Data['KreditPengabdian'] = $Data['KreditPenunjang'] = 0;
		if ($Semester[0] == $Semester[1] && $Tahun[0] == $Tahun[1]) {
			$Data['Pendidikan'] = $this->db->query("SELECT * FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array();
			$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array();
			$Mk = array();
			for ($i=0; $i < count($Sortir); $i++) { 
				$Cek = true;
				for ($j=0; $j < count($data); $j++) {
					if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
						if ($Cek) {
							$Mk[$i] = $data[$j];
							$Cek = false;
						} 
						else {
							$Mk[$i]['Kegiatan'] .= ', '.$data[$j]['Kegiatan'];
							$Mk[$i]['JumlahKredit'] += $data[$j]['JumlahKredit'];
						}
					} 
				}
			}
			for ($i=0; $i < count($Mk); $i++) {
				if ($Mk[$i]['JumlahKredit'] > 10) {
					if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '0.5 & 0.25';
						$Mk[$i]['JumlahKredit'] = 5+(($Mk[$i]['JumlahKredit']-10)*0.25);
					} else {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '1 & 0.5';
						$Mk[$i]['JumlahKredit'] = 10+(($Mk[$i]['JumlahKredit']-10)*0.5);
					}
					$Mk[$i]['Satuan'] = '10 sks Pertama & 2 sks Berikutnya';
				} else {
					if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '0.5';
						$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit']*0.5;
					} else {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '1';
						$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit'];
					}
					$Mk[$i]['Satuan'] = '10 sks Pertama';
				}
			}
			array_splice($Data['Pendidikan'],0,0,$Mk);
			usort($Data['Pendidikan'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			$Data['Penelitian'] = $this->db->query("SELECT * FROM `RealisasiPenelitian` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Data['Pengabdian'] = $this->db->query("SELECT * FROM `RealisasiPengabdian` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Data['Penunjang'] = $this->db->query("SELECT * FROM `RealisasiPenunjang` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Data['KreditPendidikan1a'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND1'"." AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->row_array()['Kredit'];
			$Data['KreditPendidikan1b'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND2'"." AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->row_array()['Kredit'];
			for ($i=0; $i < count($Data['Pendidikan']); $i++) {
				if ($Data['Pendidikan'][$i]['IdKegiatan'] != 'PND1' && $Data['Pendidikan'][$i]['IdKegiatan'] != 'PND2') {
					$Data['KreditPendidikan2'] += $Data['Pendidikan'][$i]['JumlahKredit'];
				}
			}
			$Data['KreditPenelitian'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->row_array()['Kredit'];
			$Data['KreditPengabdian'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->row_array()['Kredit'];
			$Data['KreditPenunjang'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->row_array()['Kredit'];
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Pendidikan = array();
			foreach ($Tampung as $key) {
				$Pendidikan[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPendidikan'] = $Pendidikan;
			$Mengajar = 0;
			foreach ($Mk as $key) {
				$Mengajar += $key['JumlahKredit'];
			}
			$Data['Mengajar'] = $Mengajar;
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Penelitian = array();
			foreach ($Tampung as $key) {
				$Penelitian[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPenelitian'] = $Penelitian;
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Pengabdian = array();
			foreach ($Tampung as $key) {
				$Pengabdian[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPengabdian'] = $Pengabdian;
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Penunjang = array();
			foreach ($Tampung as $key) {
				$Penunjang[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPenunjang'] = $Penunjang;
		} else if ($Tahun[0] == $Tahun[1]) {
			$Data['Pendidikan'] = $this->db->query("SELECT * FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun = ".$Tahun[0])->result_array();
			$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun = ".$Tahun[0])->result_array();
			$Mk = array();
			for ($i=0; $i < count($Sortir); $i++) { 
				$Cek = true;
				for ($j=0; $j < count($data); $j++) {
					if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
						if ($Cek) {
							$Mk[$i] = $data[$j];
							$Cek = false;
						} 
						else {
							$Mk[$i]['Kegiatan'] .= ', '.$data[$j]['Kegiatan'];
							$Mk[$i]['JumlahKredit'] += $data[$j]['JumlahKredit'];
						}
					} 
				}
			}
			for ($i=0; $i < count($Mk); $i++) {
				if ($Mk[$i]['JumlahKredit'] > 10) {
					if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '0.5 & 0.25';
						$Mk[$i]['JumlahKredit'] = 5+(($Mk[$i]['JumlahKredit']-10)*0.25);
					} else {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '1 & 0.5';
						$Mk[$i]['JumlahKredit'] = 10+(($Mk[$i]['JumlahKredit']-10)*0.5);
					}
					$Mk[$i]['Satuan'] = '10 sks Pertama & 2 sks Berikutnya';
				} else {
					if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '0.5';
						$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit']*0.5;
					} else {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '1';
						$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit'];
					}
					$Mk[$i]['Satuan'] = '10 sks Pertama';
				}
			}
			array_splice($Data['Pendidikan'],0,0,$Mk);
			usort($Data['Pendidikan'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			$Data['Penelitian'] = $this->db->query("SELECT * FROM `RealisasiPenelitian` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Data['Pengabdian'] = $this->db->query("SELECT * FROM `RealisasiPengabdian` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Data['Penunjang'] = $this->db->query("SELECT * FROM `RealisasiPenunjang` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Data['KreditPendidikan1a'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND1'"." AND Tahun = ".$Tahun[0])->row_array()['Kredit'];
			$Data['KreditPendidikan1b'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND2'"." AND Tahun = ".$Tahun[0])->row_array()['Kredit'];
			for ($i=0; $i < count($Data['Pendidikan']); $i++) {
				if ($Data['Pendidikan'][$i]['IdKegiatan'] != 'PND1' && $Data['Pendidikan'][$i]['IdKegiatan'] != 'PND2') {
					$Data['KreditPendidikan2'] += $Data['Pendidikan'][$i]['JumlahKredit'];
				}
			}
			$Data['KreditPenelitian'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun = ".$Tahun[0])->row_array()['Kredit'];
			$Data['KreditPengabdian'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun = ".$Tahun[0])->row_array()['Kredit'];
			$Data['KreditPenunjang'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun = ".$Tahun[0])->row_array()['Kredit'];
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun = ".$Tahun[0]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Pendidikan = array();
			foreach ($Tampung as $key) {
				$Pendidikan[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPendidikan'] = $Pendidikan;
			$Mengajar = 0;
			foreach ($Mk as $key) {
				$Mengajar += $key['JumlahKredit'];
			}
			$Data['Mengajar'] = $Mengajar;
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun = ".$Tahun[0]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Penelitian = array();
			foreach ($Tampung as $key) {
				$Penelitian[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPenelitian'] = $Penelitian;
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun = ".$Tahun[0]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Pengabdian = array();
			foreach ($Tampung as $key) {
				$Pengabdian[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPengabdian'] = $Pengabdian;
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun = ".$Tahun[0]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Penunjang = array();
			foreach ($Tampung as $key) {
				$Penunjang[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPenunjang'] = $Penunjang;
		} else if ($Semester[0] == 'Ganjil' && $Semester[1] == 'Genap') {
			$Data['Pendidikan'] = $this->db->query("SELECT * FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1])->result_array();
			$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1])->result_array();
			$Mk = array();
			for ($i=0; $i < count($Sortir); $i++) { 
				$Cek = true;
				for ($j=0; $j < count($data); $j++) {
					if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
						if ($Cek) {
							$Mk[$i] = $data[$j];
							$Cek = false;
						} 
						else {
							$Mk[$i]['Kegiatan'] .= ', '.$data[$j]['Kegiatan'];
							$Mk[$i]['JumlahKredit'] += $data[$j]['JumlahKredit'];
						}
					} 
				}
			}
			for ($i=0; $i < count($Mk); $i++) {
				if ($Mk[$i]['JumlahKredit'] > 10) {
					if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '0.5 & 0.25';
						$Mk[$i]['JumlahKredit'] = 5+(($Mk[$i]['JumlahKredit']-10)*0.25);
					} else {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '1 & 0.5';
						$Mk[$i]['JumlahKredit'] = 10+(($Mk[$i]['JumlahKredit']-10)*0.5);
					}
					$Mk[$i]['Satuan'] = '10 sks Pertama & 2 sks Berikutnya';
				} else {
					if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '0.5';
						$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit']*0.5;
					} else {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '1';
						$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit'];
					}
					$Mk[$i]['Satuan'] = '10 sks Pertama';
				}
			}
			array_splice($Data['Pendidikan'],0,0,$Mk);
			usort($Data['Pendidikan'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			$Data['Penelitian'] = $this->db->query("SELECT * FROM `RealisasiPenelitian` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Data['Pengabdian'] = $this->db->query("SELECT * FROM `RealisasiPengabdian` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Data['Penunjang'] = $this->db->query("SELECT * FROM `RealisasiPenunjang` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Data['KreditPendidikan1a'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND1'"." AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1])->row_array()['Kredit'];
			$Data['KreditPendidikan1b'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND2'"." AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1])->row_array()['Kredit'];
			for ($i=0; $i < count($Data['Pendidikan']); $i++) {
				if ($Data['Pendidikan'][$i]['IdKegiatan'] != 'PND1' && $Data['Pendidikan'][$i]['IdKegiatan'] != 'PND2') {
					$Data['KreditPendidikan2'] += $Data['Pendidikan'][$i]['JumlahKredit'];
				}
			}
			$Data['KreditPenelitian'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1])->row_array()['Kredit'];
			$Data['KreditPengabdian'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1])->row_array()['Kredit'];
			$Data['KreditPenunjang'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1])->row_array()['Kredit'];
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Pendidikan = array();
			foreach ($Tampung as $key) {
				$Pendidikan[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPendidikan'] = $Pendidikan;
			$Mengajar = 0;
			foreach ($Mk as $key) {
				$Mengajar += $key['JumlahKredit'];
			}
			$Data['Mengajar'] = $Mengajar;
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Penelitian = array();
			foreach ($Tampung as $key) {
				$Penelitian[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPenelitian'] = $Penelitian;
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Pengabdian = array();
			foreach ($Tampung as $key) {
				$Pengabdian[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPengabdian'] = $Pengabdian;
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Penunjang = array();
			foreach ($Tampung as $key) {
				$Penunjang[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPenunjang'] = $Penunjang;
		} else if ($Semester[0] == 'Genap' && $Semester[1] == 'Ganjil') {
			$Data['Pendidikan'] = $this->db->query("SELECT * FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array();
			$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array();
			$Mk = array();
			for ($i=0; $i < count($Sortir); $i++) { 
				$Cek = true;
				for ($j=0; $j < count($data); $j++) {
					if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
						if ($Cek) {
							$Mk[$i] = $data[$j];
							$Cek = false;
						} 
						else {
							$Mk[$i]['Kegiatan'] .= ', '.$data[$j]['Kegiatan'];
							$Mk[$i]['JumlahKredit'] += $data[$j]['JumlahKredit'];
						}
					} 
				}
			}
			for ($i=0; $i < count($Mk); $i++) {
				if ($Mk[$i]['JumlahKredit'] > 10) {
					if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '0.5 & 0.25';
						$Mk[$i]['JumlahKredit'] = 5+(($Mk[$i]['JumlahKredit']-10)*0.25);
					} else {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '1 & 0.5';
						$Mk[$i]['JumlahKredit'] = 10+(($Mk[$i]['JumlahKredit']-10)*0.5);
					}
					$Mk[$i]['Satuan'] = '10 sks Pertama & 2 sks Berikutnya';
				} else {
					if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '0.5';
						$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit']*0.5;
					} else {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '1';
						$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit'];
					}
					$Mk[$i]['Satuan'] = '10 sks Pertama';
				}
			}
			array_splice($Data['Pendidikan'],0,0,$Mk);
			usort($Data['Pendidikan'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			$Data['Penelitian'] = $this->db->query("SELECT * FROM `RealisasiPenelitian` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Data['Pengabdian'] = $this->db->query("SELECT * FROM `RealisasiPengabdian` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Data['Penunjang'] = $this->db->query("SELECT * FROM `RealisasiPenunjang` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Data['KreditPendidikan1a'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND1'"." AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->row_array()['Kredit'];
			$Data['KreditPendidikan1b'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND2'"." AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->row_array()['Kredit'];
			$Data['KreditPenelitian'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->row_array()['Kredit'];
			$Data['KreditPengabdian'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->row_array()['Kredit'];
			$Data['KreditPenunjang'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->row_array()['Kredit'];
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Pendidikan = array();
			foreach ($Tampung as $key) {
				$Pendidikan[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPendidikan'] = $Pendidikan;
			$Mengajar = 0;
			foreach ($Mk as $key) {
				$Mengajar += $key['JumlahKredit'];
			}
			$Data['Mengajar'] = $Mengajar;
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Penelitian = array();
			foreach ($Tampung as $key) {
				$Penelitian[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPenelitian'] = $Penelitian;
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Pengabdian = array();
			foreach ($Tampung as $key) {
				$Pengabdian[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPengabdian'] = $Pengabdian;
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Penunjang = array();
			foreach ($Tampung as $key) {
				$Penunjang[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPenunjang'] = $Penunjang;
			// merge
			$Data['Pendidikan'] = array_merge($Data['Pendidikan'],$this->db->query("SELECT * FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
			$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->result_array();
			$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->result_array();
			$Mk = array();
			for ($i=0; $i < count($Sortir); $i++) { 
				$Cek = true;
				for ($j=0; $j < count($data); $j++) {
					if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
						if ($Cek) {
							$Mk[$i] = $data[$j];
							$Cek = false;
						} 
						else {
							$Mk[$i]['Kegiatan'] .= ', '.$data[$j]['Kegiatan'];
							$Mk[$i]['JumlahKredit'] += $data[$j]['JumlahKredit'];
						}
					} 
				}
			}
			for ($i=0; $i < count($Mk); $i++) {
				if ($Mk[$i]['JumlahKredit'] > 10) {
					if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '0.5 & 0.25';
						$Mk[$i]['JumlahKredit'] = 5+(($Mk[$i]['JumlahKredit']-10)*0.25);
					} else {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '1 & 0.5';
						$Mk[$i]['JumlahKredit'] = 10+(($Mk[$i]['JumlahKredit']-10)*0.5);
					}
					$Mk[$i]['Satuan'] = '10 sks Pertama & 2 sks Berikutnya';
				} else {
					if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '0.5';
						$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit']*0.5;
					} else {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '1';
						$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit'];
					}
					$Mk[$i]['Satuan'] = '10 sks Pertama';
				}
			}
			array_splice($Data['Pendidikan'],0,0,$Mk);
			usort($Data['Pendidikan'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			$Data['Penelitian'] = array_merge($Data['Penelitian'],$this->db->query("SELECT * FROM `RealisasiPenelitian` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
			usort($Data['Penelitian'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			$Data['Pengabdian'] = array_merge($Data['Pengabdian'],$this->db->query("SELECT * FROM `RealisasiPengabdian` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
			usort($Data['Pengabdian'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			$Data['Penunjang'] = array_merge($Data['Penunjang'],$this->db->query("SELECT * FROM `RealisasiPenunjang` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
			usort($Data['Penunjang'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			$Data['KreditPendidikan1a'] += $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND1'"." AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->row_array()['Kredit'];
			$Data['KreditPendidikan1b'] += $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND2'"." AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->row_array()['Kredit'];
			$Data['KreditPenelitian'] += $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->row_array()['Kredit'];
			$Data['KreditPengabdian'] += $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->row_array()['Kredit'];
			$Data['KreditPenunjang'] += $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->row_array()['Kredit'];
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Pendidikan = array();
			foreach ($Tampung as $key) {
				if (empty($Data['UsulPendidikan'][$key['IdKegiatan']])) {
					$Data['UsulPendidikan'][$key['IdKegiatan']] = $key['Kredit'];
				} else {
					$Data['UsulPendidikan'][$key['IdKegiatan']] += $key['Kredit'];
				}
			}
			$Mengajar = 0;
			foreach ($Mk as $key) {
				$Mengajar += $key['JumlahKredit'];
			}
			$Data['Mengajar'] += $Mengajar;
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Penelitian = array();
			foreach ($Tampung as $key) {
				if (empty($Data['UsulPenelitian'][$key['IdKegiatan']])) {
					$Data['UsulPenelitian'][$key['IdKegiatan']] = $key['Kredit'];
				} else {
					$Data['UsulPenelitian'][$key['IdKegiatan']] += $key['Kredit'];
				}
			}
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Pengabdian = array();
			foreach ($Tampung as $key) {
				if (empty($Data['UsulPengabdian'][$key['IdKegiatan']])) {
					$Data['UsulPengabdian'][$key['IdKegiatan']] = $key['Kredit'];
				} else {
					$Data['UsulPengabdian'][$key['IdKegiatan']] += $key['Kredit'];
				}
			}
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Penunjang = array();
			foreach ($Tampung as $key) {
				if (empty($Data['UsulPenunjang'][$key['IdKegiatan']])) {
					$Data['UsulPenunjang'][$key['IdKegiatan']] = $key['Kredit'];
				} else {
					$Data['UsulPenunjang'][$key['IdKegiatan']] += $key['Kredit'];
				}
			}
			// merge
			if (($Tahun[1] - $Tahun[0]) > 1) {
				$Data['Pendidikan'] = array_merge($Data['Pendidikan'],$this->db->query("SELECT * FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1)." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1))->result_array();
				$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1))->result_array();
				$Mk = array();
				for ($i=0; $i < count($Sortir); $i++) { 
					$Cek = true;
					for ($j=0; $j < count($data); $j++) {
						if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
							if ($Cek) {
								$Mk[$i] = $data[$j];
								$Cek = false;
							} 
							else {
								$Mk[$i]['Kegiatan'] .= ', '.$data[$j]['Kegiatan'];
								$Mk[$i]['JumlahKredit'] += $data[$j]['JumlahKredit'];
							}
						} 
					}
				}
				for ($i=0; $i < count($Mk); $i++) {
					if ($Mk[$i]['JumlahKredit'] > 10) {
						if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
							$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
							$Mk[$i]['Kredit'] = '0.5 & 0.25';
							$Mk[$i]['JumlahKredit'] = 5+(($Mk[$i]['JumlahKredit']-10)*0.25);
						} else {
							$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
							$Mk[$i]['Kredit'] = '1 & 0.5';
							$Mk[$i]['JumlahKredit'] = 10+(($Mk[$i]['JumlahKredit']-10)*0.5);
						}
						$Mk[$i]['Satuan'] = '10 sks Pertama & 2 sks Berikutnya';
					} else {
						if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
							$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
							$Mk[$i]['Kredit'] = '0.5';
							$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit']*0.5;
						} else {
							$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
							$Mk[$i]['Kredit'] = '1';
							$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit'];
						}
						$Mk[$i]['Satuan'] = '10 sks Pertama';
					}
				}
				array_splice($Data['Pendidikan'],0,0,$Mk);
				usort($Data['Pendidikan'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
				$Data['Penelitian'] = array_merge($Data['Penelitian'],$this->db->query("SELECT * FROM `RealisasiPenelitian` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1)." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				usort($Data['Penelitian'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
				$Data['Pengabdian'] = array_merge($Data['Pengabdian'],$this->db->query("SELECT * FROM `RealisasiPengabdian` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1)." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				usort($Data['Pengabdian'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
				$Data['Penunjang'] = array_merge($Data['Penunjang'],$this->db->query("SELECT * FROM `RealisasiPenunjang` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1)." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				usort($Data['Penunjang'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
				$Data['KreditPendidikan1a'] += $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND1'"." AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1))->row_array()['Kredit'];
				$Data['KreditPendidikan1b'] += $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND2'"." AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1))->row_array()['Kredit'];
				for ($i=0; $i < count($Data['Pendidikan']); $i++) {
					if ($Data['Pendidikan'][$i]['IdKegiatan'] != 'PND1' && $Data['Pendidikan'][$i]['IdKegiatan'] != 'PND2') {
						$Data['KreditPendidikan2'] += $Data['Pendidikan'][$i]['JumlahKredit'];
					}
				}
				$Data['KreditPenelitian'] += $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1))->row_array()['Kredit'];
				$Data['KreditPengabdian'] += $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1))->row_array()['Kredit'];
				$Data['KreditPenunjang'] += $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1))->row_array()['Kredit'];
				$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1)." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
				$Pendidikan = array();
				foreach ($Tampung as $key) {
					if (empty($Data['UsulPendidikan'][$key['IdKegiatan']])) {
						$Data['UsulPendidikan'][$key['IdKegiatan']] = $key['Kredit'];
					} else {
						$Data['UsulPendidikan'][$key['IdKegiatan']] += $key['Kredit'];
					}
				}
				$Mengajar = 0;
				foreach ($Mk as $key) {
					$Mengajar += $key['JumlahKredit'];
				}
				$Data['Mengajar'] += $Mengajar;
				$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1)." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
				$Penelitian = array();
				foreach ($Tampung as $key) {
					if (empty($Data['UsulPenelitian'][$key['IdKegiatan']])) {
						$Data['UsulPenelitian'][$key['IdKegiatan']] = $key['Kredit'];
					} else {
						$Data['UsulPenelitian'][$key['IdKegiatan']] += $key['Kredit'];
					}
				}
				$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1)." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
				$Pengabdian = array();
				foreach ($Tampung as $key) {
					if (empty($Data['UsulPengabdian'][$key['IdKegiatan']])) {
						$Data['UsulPengabdian'][$key['IdKegiatan']] = $key['Kredit'];
					} else {
						$Data['UsulPengabdian'][$key['IdKegiatan']] += $key['Kredit'];
					}
				}
				$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1)." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
				$Penunjang = array();
				foreach ($Tampung as $key) {
					if (empty($Data['UsulPenunjang'][$key['IdKegiatan']])) {
						$Data['UsulPenunjang'][$key['IdKegiatan']] = $key['Kredit'];
					} else {
						$Data['UsulPenunjang'][$key['IdKegiatan']] += $key['Kredit'];
					}
				}
			}

		} else if ($Semester[0] == 'Ganjil' && $Semester[1] == 'Ganjil') {
			$Data['Pendidikan'] = $this->db->query("SELECT * FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1)." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1))->result_array();
			$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1))->result_array();
			$Mk = array();
			for ($i=0; $i < count($Sortir); $i++) { 
				$Cek = true;
				for ($j=0; $j < count($data); $j++) {
					if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
						if ($Cek) {
							$Mk[$i] = $data[$j];
							$Cek = false;
						} 
						else {
							$Mk[$i]['Kegiatan'] .= ', '.$data[$j]['Kegiatan'];
							$Mk[$i]['JumlahKredit'] += $data[$j]['JumlahKredit'];
						}
					} 
				}
			}
			for ($i=0; $i < count($Mk); $i++) {
				if ($Mk[$i]['JumlahKredit'] > 10) {
					if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '0.5 & 0.25';
						$Mk[$i]['JumlahKredit'] = 5+(($Mk[$i]['JumlahKredit']-10)*0.25);
					} else {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '1 & 0.5';
						$Mk[$i]['JumlahKredit'] = 10+(($Mk[$i]['JumlahKredit']-10)*0.5);
					}
					$Mk[$i]['Satuan'] = '10 sks Pertama & 2 sks Berikutnya';
				} else {
					if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '0.5';
						$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit']*0.5;
					} else {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '1';
						$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit'];
					}
					$Mk[$i]['Satuan'] = '10 sks Pertama';
				}
			}
			array_splice($Data['Pendidikan'],0,0,$Mk);
			usort($Data['Pendidikan'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			$Data['Penelitian'] = $this->db->query("SELECT * FROM `RealisasiPenelitian` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1)." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Data['Pengabdian'] = $this->db->query("SELECT * FROM `RealisasiPengabdian` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1)." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Data['Penunjang'] = $this->db->query("SELECT * FROM `RealisasiPenunjang` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1)." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Data['KreditPendidikan1a'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND1'"." AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1))->row_array()['Kredit'];
			$Data['KreditPendidikan1b'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND2'"." AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1))->row_array()['Kredit'];
			$Data['KreditPenelitian'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1))->row_array()['Kredit'];
			$Data['KreditPengabdian'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1))->row_array()['Kredit'];
			$Data['KreditPenunjang'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1))->row_array()['Kredit'];
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1)." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Pendidikan = array();
			foreach ($Tampung as $key) {
				$Pendidikan[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPendidikan'] = $Pendidikan;
			$Mengajar = 0;
			foreach ($Mk as $key) {
				$Mengajar += $key['JumlahKredit'];
			}
			$Data['Mengajar'] = $Mengajar;
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1)." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Penelitian = array();
			foreach ($Tampung as $key) {
				$Penelitian[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPenelitian'] = $Penelitian;
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1)." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Pengabdian = array();
			foreach ($Tampung as $key) {
				$Pengabdian[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPengabdian'] = $Pengabdian;
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1)." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Penunjang = array();
			foreach ($Tampung as $key) {
				$Penunjang[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPenunjang'] = $Penunjang;
			// merge
			$Data['Pendidikan'] = array_merge($Data['Pendidikan'],$this->db->query("SELECT * FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
			$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->result_array();
			$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->result_array();
			$Mk = array();
			for ($i=0; $i < count($Sortir); $i++) { 
				$Cek = true;
				for ($j=0; $j < count($data); $j++) {
					if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
						if ($Cek) {
							$Mk[$i] = $data[$j];
							$Cek = false;
						} 
						else {
							$Mk[$i]['Kegiatan'] .= ', '.$data[$j]['Kegiatan'];
							$Mk[$i]['JumlahKredit'] += $data[$j]['JumlahKredit'];
						}
					} 
				}
			}
			for ($i=0; $i < count($Mk); $i++) {
				if ($Mk[$i]['JumlahKredit'] > 10) {
					if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '0.5 & 0.25';
						$Mk[$i]['JumlahKredit'] = 5+(($Mk[$i]['JumlahKredit']-10)*0.25);
					} else {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '1 & 0.5';
						$Mk[$i]['JumlahKredit'] = 10+(($Mk[$i]['JumlahKredit']-10)*0.5);
					}
					$Mk[$i]['Satuan'] = '10 sks Pertama & 2 sks Berikutnya';
				} else {
					if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '0.5';
						$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit']*0.5;
					} else {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '1';
						$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit'];
					}
					$Mk[$i]['Satuan'] = '10 sks Pertama';
				}
			}
			array_splice($Data['Pendidikan'],0,0,$Mk);
			usort($Data['Pendidikan'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			$Data['Penelitian'] = array_merge($Data['Penelitian'],$this->db->query("SELECT * FROM `RealisasiPenelitian` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
			usort($Data['Penelitian'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			$Data['Pengabdian'] = array_merge($Data['Pengabdian'],$this->db->query("SELECT * FROM `RealisasiPengabdian` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
			usort($Data['Pengabdian'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			$Data['Penunjang'] = array_merge($Data['Penunjang'],$this->db->query("SELECT * FROM `RealisasiPenunjang` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
			usort($Data['Penunjang'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			$Data['KreditPendidikan1a'] += $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND1'"." AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->row_array()['Kredit'];
			$Data['KreditPendidikan1b'] += $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND2'"." AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->row_array()['Kredit'];
			for ($i=0; $i < count($Data['Pendidikan']); $i++) {
				if ($Data['Pendidikan'][$i]['IdKegiatan'] != 'PND1' && $Data['Pendidikan'][$i]['IdKegiatan'] != 'PND2') {
					$Data['KreditPendidikan2'] += $Data['Pendidikan'][$i]['JumlahKredit'];
				}
			}
			$Data['KreditPenelitian'] += $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->row_array()['Kredit'];
			$Data['KreditPengabdian'] += $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->row_array()['Kredit'];
			$Data['KreditPenunjang'] += $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->row_array()['Kredit'];
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Pendidikan = array();
			foreach ($Tampung as $key) {
				if (empty($Data['UsulPendidikan'][$key['IdKegiatan']])) {
					$Data['UsulPendidikan'][$key['IdKegiatan']] = $key['Kredit'];
				} else {
					$Data['UsulPendidikan'][$key['IdKegiatan']] += $key['Kredit'];
				}
			}
			$Mengajar = 0;
			foreach ($Mk as $key) {
				$Mengajar += $key['JumlahKredit'];
			}
			$Data['Mengajar'] += $Mengajar;
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Penelitian = array();
			foreach ($Tampung as $key) {
				if (empty($Data['UsulPenelitian'][$key['IdKegiatan']])) {
					$Data['UsulPenelitian'][$key['IdKegiatan']] = $key['Kredit'];
				} else {
					$Data['UsulPenelitian'][$key['IdKegiatan']] += $key['Kredit'];
				}
			}
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Pengabdian = array();
			foreach ($Tampung as $key) {
				if (empty($Data['UsulPengabdian'][$key['IdKegiatan']])) {
					$Data['UsulPengabdian'][$key['IdKegiatan']] = $key['Kredit'];
				} else {
					$Data['UsulPengabdian'][$key['IdKegiatan']] += $key['Kredit'];
				}
			}
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Penunjang = array();
			foreach ($Tampung as $key) {
				if (empty($Data['UsulPenunjang'][$key['IdKegiatan']])) {
					$Data['UsulPenunjang'][$key['IdKegiatan']] = $key['Kredit'];
				} else {
					$Data['UsulPenunjang'][$key['IdKegiatan']] += $key['Kredit'];
				}
			}
		} else if ($Semester[0] == 'Genap' && $Semester[1] == 'Genap') {
			$Data['Pendidikan'] = $this->db->query("SELECT * FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array();
			$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array();
			$Mk = array();
			for ($i=0; $i < count($Sortir); $i++) { 
				$Cek = true;
				for ($j=0; $j < count($data); $j++) {
					if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
						if ($Cek) {
							$Mk[$i] = $data[$j];
							$Cek = false;
						} 
						else {
							$Mk[$i]['Kegiatan'] .= ', '.$data[$j]['Kegiatan'];
							$Mk[$i]['JumlahKredit'] += $data[$j]['JumlahKredit'];
						}
					} 
				}
			}
			for ($i=0; $i < count($Mk); $i++) {
				if ($Mk[$i]['JumlahKredit'] > 10) {
					if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '0.5 & 0.25';
						$Mk[$i]['JumlahKredit'] = 5+(($Mk[$i]['JumlahKredit']-10)*0.25);
					} else {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '1 & 0.5';
						$Mk[$i]['JumlahKredit'] = 10+(($Mk[$i]['JumlahKredit']-10)*0.5);
					}
					$Mk[$i]['Satuan'] = '10 sks Pertama & 2 sks Berikutnya';
				} else {
					if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '0.5';
						$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit']*0.5;
					} else {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '1';
						$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit'];
					}
					$Mk[$i]['Satuan'] = '10 sks Pertama';
				}
			}
			array_splice($Data['Pendidikan'],0,0,$Mk);
			usort($Data['Pendidikan'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			$Data['Penelitian'] = $this->db->query("SELECT * FROM `RealisasiPenelitian` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Data['Pengabdian'] = $this->db->query("SELECT * FROM `RealisasiPengabdian` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Data['Penunjang'] = $this->db->query("SELECT * FROM `RealisasiPenunjang` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array();
			$Data['KreditPendidikan1a'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND1'"." AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->row_array()['Kredit'];
			$Data['KreditPendidikan1b'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND2'"." AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->row_array()['Kredit'];
			$Data['KreditPenelitian'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->row_array()['Kredit'];
			$Data['KreditPengabdian'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->row_array()['Kredit'];
			$Data['KreditPenunjang'] = $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->row_array()['Kredit'];
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Pendidikan = array();
			foreach ($Tampung as $key) {
				$Pendidikan[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPendidikan'] = $Pendidikan;
			$Mengajar = 0;
			foreach ($Mk as $key) {
				$Mengajar += $key['JumlahKredit'];
			}
			$Data['Mengajar'] = $Mengajar;
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Penelitian = array();
			foreach ($Tampung as $key) {
				$Penelitian[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPenelitian'] = $Penelitian;
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Pengabdian = array();
			foreach ($Tampung as $key) {
				$Pengabdian[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPengabdian'] = $Pengabdian;
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Penunjang = array();
			foreach ($Tampung as $key) {
				$Penunjang[$key['IdKegiatan']] = $key['Kredit'];
			}
			$Data['UsulPenunjang'] = $Penunjang;
			// merge
			$Data['Pendidikan'] = array_merge($Data['Pendidikan'],$this->db->query("SELECT * FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
			$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1])->result_array();
			$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1])->result_array();
			$Mk = array();
			for ($i=0; $i < count($Sortir); $i++) { 
				$Cek = true;
				for ($j=0; $j < count($data); $j++) {
					if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
						if ($Cek) {
							$Mk[$i] = $data[$j];
							$Cek = false;
						} 
						else {
							$Mk[$i]['Kegiatan'] .= ', '.$data[$j]['Kegiatan'];
							$Mk[$i]['JumlahKredit'] += $data[$j]['JumlahKredit'];
						}
					} 
				}
			}
			for ($i=0; $i < count($Mk); $i++) {
				if ($Mk[$i]['JumlahKredit'] > 10) {
					if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '0.5 & 0.25';
						$Mk[$i]['JumlahKredit'] = 5+(($Mk[$i]['JumlahKredit']-10)*0.25);
					} else {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '1 & 0.5';
						$Mk[$i]['JumlahKredit'] = 10+(($Mk[$i]['JumlahKredit']-10)*0.5);
					}
					$Mk[$i]['Satuan'] = '10 sks Pertama & 2 sks Berikutnya';
				} else {
					if ($Mk[$i]['Jabatan'] == 'Asisten Ahli') {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '0.5';
						$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit']*0.5;
					} else {
						$Mk[$i]['Volume'] = $Mk[$i]['JumlahKredit'];
						$Mk[$i]['Kredit'] = '1';
						$Mk[$i]['JumlahKredit'] = $Mk[$i]['JumlahKredit'];
					}
					$Mk[$i]['Satuan'] = '10 sks Pertama';
				}
			}
			array_splice($Data['Pendidikan'],0,0,$Mk);
			usort($Data['Pendidikan'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			$Data['Penelitian'] = array_merge($Data['Penelitian'],$this->db->query("SELECT * FROM `RealisasiPenelitian` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
			usort($Data['Penelitian'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			$Data['Pengabdian'] = array_merge($Data['Pengabdian'],$this->db->query("SELECT * FROM `RealisasiPengabdian` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
			usort($Data['Pengabdian'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			$Data['Penunjang'] = array_merge($Data['Penunjang'],$this->db->query("SELECT * FROM `RealisasiPenunjang` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
			usort($Data['Penunjang'], function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			$Data['KreditPendidikan1a'] += $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND1'"." AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1])->row_array()['Kredit'];
			$Data['KreditPendidikan1b'] += $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND2'"." AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1])->row_array()['Kredit'];
			for ($i=0; $i < count($Data['Pendidikan']); $i++) {
				if ($Data['Pendidikan'][$i]['IdKegiatan'] != 'PND1' && $Data['Pendidikan'][$i]['IdKegiatan'] != 'PND2') {
					$Data['KreditPendidikan2'] += $Data['Pendidikan'][$i]['JumlahKredit'];
				}
			}
			$Data['KreditPenelitian'] += $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1])->row_array()['Kredit'];
			$Data['KreditPengabdian'] += $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1])->row_array()['Kredit'];
			$Data['KreditPenunjang'] += $this->db->query("SELECT SUM(JumlahKredit) as Kredit FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1])->row_array()['Kredit'];
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Pendidikan = array();
			foreach ($Tampung as $key) {
				if (empty($Data['UsulPendidikan'][$key['IdKegiatan']])) {
					$Data['UsulPendidikan'][$key['IdKegiatan']] = $key['Kredit'];
				} else {
					$Data['UsulPendidikan'][$key['IdKegiatan']] += $key['Kredit'];
				}
			}
			$Mengajar = 0;
			foreach ($Mk as $key) {
				$Mengajar += $key['JumlahKredit'];
			}
			$Data['Mengajar'] += $Mengajar;
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Penelitian = array();
			foreach ($Tampung as $key) {
				if (empty($Data['UsulPenelitian'][$key['IdKegiatan']])) {
					$Data['UsulPenelitian'][$key['IdKegiatan']] = $key['Kredit'];
				} else {
					$Data['UsulPenelitian'][$key['IdKegiatan']] += $key['Kredit'];
				}
			}
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Pengabdian = array();
			foreach ($Tampung as $key) {
				if (empty($Data['UsulPengabdian'][$key['IdKegiatan']])) {
					$Data['UsulPengabdian'][$key['IdKegiatan']] = $key['Kredit'];
				} else {
					$Data['UsulPengabdian'][$key['IdKegiatan']] += $key['Kredit'];
				}
			}
			$Tampung = $this->db->query("SELECT SUM(JumlahKredit) as Kredit,IdKegiatan FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1]." GROUP BY IdKegiatan ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4)")->result_array();
			$Penunjang = array();
			foreach ($Tampung as $key) {
				if (empty($Data['UsulPenunjang'][$key['IdKegiatan']])) {
					$Data['UsulPenunjang'][$key['IdKegiatan']] = $key['Kredit'];
				} else {
					$Data['UsulPenunjang'][$key['IdKegiatan']] += $key['Kredit'];
				}
			}
		}
		$Data['Filter'] = $Semester[0].'_'.$Tahun[0].'_'.$Semester[1].'_'.$Tahun[1];
		$this->load->view('ExcelPO-PAK',$Data);
	}

	public function Lampiran(){
		$NIP = $this->session->userdata('NIP');
		$Semester = explode('-',$this->uri->segment('3'));
		$Tahun = explode('-',$this->uri->segment('4'));
		$Kegiatan = $this->uri->segment('5');
		$Data = array();
		if ($Kegiatan != 'Pendidikan') {
			if ($Semester[0] == $Semester[1] && $Tahun[0] == $Tahun[1]) {
				$Data = array_merge($Data,$this->db->query("SELECT IdKegiatan,Bukti FROM Realisasi".$Kegiatan."  WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
			} else if ($Tahun[0] == $Tahun[1]) {
				$Data = array_merge($Data,$this->db->query("SELECT IdKegiatan,Bukti FROM Realisasi".$Kegiatan."  WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
			} else if ($Semester[0] == 'Ganjil' && $Semester[1] == 'Genap') {
				$Data = array_merge($Data,$this->db->query("SELECT IdKegiatan,Bukti FROM Realisasi".$Kegiatan."  WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
			} else if ($Semester[0] == 'Genap' && $Semester[1] == 'Ganjil') {
				$Data = array_merge($Data,$this->db->query("SELECT IdKegiatan,Bukti FROM Realisasi".$Kegiatan."  WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				$Data = array_merge($Data,$this->db->query("SELECT IdKegiatan,Bukti FROM Realisasi".$Kegiatan."  WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				if (($Tahun[1] - $Tahun[0]) > 1) {
					$Data = array_merge($Data,$this->db->query("SELECT IdKegiatan,Bukti FROM Realisasi".$Kegiatan."  WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1)." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				}
				usort($Data, function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			} else if ($Semester[0] == 'Ganjil' && $Semester[1] == 'Ganjil') {
				$Data = array_merge($Data,$this->db->query("SELECT IdKegiatan,Bukti FROM Realisasi".$Kegiatan."  WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1)." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				$Data = array_merge($Data,$this->db->query("SELECT IdKegiatan,Bukti FROM Realisasi".$Kegiatan."  WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				usort($Data, function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			} else if ($Semester[0] == 'Genap' && $Semester[1] == 'Genap') {
				$Data = array_merge($Data,$this->db->query("SELECT IdKegiatan,Bukti FROM Realisasi".$Kegiatan."  WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				$Data = array_merge($Data,$this->db->query("SELECT IdKegiatan,Bukti FROM Realisasi".$Kegiatan."  WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				usort($Data, function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			}
		} 
		else {
			if ($Semester[0] == $Semester[1] && $Tahun[0] == $Tahun[1]) {
				$Data = array_merge($Data,$this->db->query("SELECT * FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array();
				$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array();
				$Mk = array();
				for ($i=0; $i < count($Sortir); $i++) { 
					$Cek = true;
					for ($j=0; $j < count($data); $j++) {
						if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
							if ($Cek) {
								$Mk[$i] = $data[$j];
								$Cek = false;
							} 
						} 
					}
				}
				array_splice($Data,0,0,$Mk);
				usort($Data, function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			} else if ($Tahun[0] == $Tahun[1]) {
				$Data = array_merge($Data,$this->db->query("SELECT * FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun = ".$Tahun[0])->result_array();
				$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun = ".$Tahun[0])->result_array();
				$Mk = array();
				for ($i=0; $i < count($Sortir); $i++) { 
					$Cek = true;
					for ($j=0; $j < count($data); $j++) {
						if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
							if ($Cek) {
								$Mk[$i] = $data[$j];
								$Cek = false;
							} 
						} 
					}
				}
				array_splice($Data,0,0,$Mk);
				usort($Data, function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			} else if ($Semester[0] == 'Ganjil' && $Semester[1] == 'Genap') {
				$Data = array_merge($Data,$this->db->query("SELECT * FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1])->result_array();
				$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1])->result_array();
				$Mk = array();
				for ($i=0; $i < count($Sortir); $i++) { 
					$Cek = true;
					for ($j=0; $j < count($data); $j++) {
						if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
							if ($Cek) {
								$Mk[$i] = $data[$j];
								$Cek = false;
							} 
						} 
					}
				}
				array_splice($Data,0,0,$Mk);
				usort($Data, function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			} else if ($Semester[0] == 'Genap' && $Semester[1] == 'Ganjil') {
				$Data = array_merge($Data,$this->db->query("SELECT * FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array();
				$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array();
				$Mk = array();
				for ($i=0; $i < count($Sortir); $i++) { 
					$Cek = true;
					for ($j=0; $j < count($data); $j++) {
						if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
							if ($Cek) {
								$Mk[$i] = $data[$j];
								$Cek = false;
							} 
						} 
					}
				}
				array_splice($Data,0,0,$Mk);
				// merge
				$Data = array_merge($Data,$this->db->query("SELECT * FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->result_array();
				$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->result_array();
				$Mk = array();
				for ($i=0; $i < count($Sortir); $i++) { 
					$Cek = true;
					for ($j=0; $j < count($data); $j++) {
						if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
							if ($Cek) {
								$Mk[$i] = $data[$j];
								$Cek = false;
							} 
						} 
					}
				}
				array_splice($Data,0,0,$Mk);
				usort($Data, function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
				if (($Tahun[1] - $Tahun[0]) > 1) {
					$Data = array_merge($Data,$this->db->query("SELECT IdKegiatan,Bukti FROM Realisasi".$Kegiatan."  WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1)." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
					// merge
					$Data = array_merge($Data,$this->db->query("SELECT * FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1)." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
					$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1))->result_array();
					$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1))->result_array();
					$Mk = array();
					for ($i=0; $i < count($Sortir); $i++) { 
						$Cek = true;
						for ($j=0; $j < count($data); $j++) {
							if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
								if ($Cek) {
									$Mk[$i] = $data[$j];
									$Cek = false;
								} 
							} 
						}
					}
					array_splice($Data,0,0,$Mk);
					usort($Data, function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
				}
			} else if ($Semester[0] == 'Ganjil' && $Semester[1] == 'Ganjil') {
				$Data = array_merge($Data,$this->db->query("SELECT * FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1)." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1))->result_array();
				$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1))->result_array();
				$Mk = array();
				for ($i=0; $i < count($Sortir); $i++) { 
					$Cek = true;
					for ($j=0; $j < count($data); $j++) {
						if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
							if ($Cek) {
								$Mk[$i] = $data[$j];
								$Cek = false;
							} 
						} 
					}
				}
				array_splice($Data,0,0,$Mk);
				// merge
				$Data = array_merge($Data,$this->db->query("SELECT * FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->result_array();
				$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->result_array();
				$Mk = array();
				for ($i=0; $i < count($Sortir); $i++) { 
					$Cek = true;
					for ($j=0; $j < count($data); $j++) {
						if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
							if ($Cek) {
								$Mk[$i] = $data[$j];
								$Cek = false;
							} 
						} 
					}
				}
				array_splice($Data,0,0,$Mk);
				usort($Data, function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			} else if ($Semester[0] == 'Genap' && $Semester[1] == 'Genap') {
				$Data = array_merge($Data,$this->db->query("SELECT IdKegiatan,Bukti FROM Realisasi".$Kegiatan."  WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				$Data = array_merge($Data,$this->db->query("SELECT IdKegiatan,Bukti FROM Realisasi".$Kegiatan."  WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				
				$Data = array_merge($Data,$this->db->query("SELECT * FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array();
				$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array();
				$Mk = array();
				for ($i=0; $i < count($Sortir); $i++) { 
					$Cek = true;
					for ($j=0; $j < count($data); $j++) {
						if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
							if ($Cek) {
								$Mk[$i] = $data[$j];
								$Cek = false;
							} 
						} 
					}
				}
				array_splice($Data,0,0,$Mk);
				// merge
				$Data = array_merge($Data,$this->db->query("SELECT * FROM `RealisasiPendidikan` WHERE NIP = ".$NIP." AND JumlahKredit != 0 AND IdKegiatan != 'PND3' AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1]." ORDER BY SUBSTR(IdKegiatan FROM 1 FOR 3), CAST(SUBSTR(IdKegiatan FROM 4) AS UNSIGNED), SUBSTR(IdKegiatan FROM 4), Kode ASC")->result_array());
				$Sortir = $this->db->query("SELECT DISTINCT Semester,Tahun FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1])->result_array();
				$data = $this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND IdKegiatan = 'PND3' AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1])->result_array();
				$Mk = array();
				for ($i=0; $i < count($Sortir); $i++) { 
					$Cek = true;
					for ($j=0; $j < count($data); $j++) {
						if ($Sortir[$i]['Semester'] == $data[$j]['Semester'] && $Sortir[$i]['Tahun'] == $data[$j]['Tahun']) {
							if ($Cek) {
								$Mk[$i] = $data[$j];
								$Cek = false;
							} 
						} 
					}
				}
				array_splice($Data,0,0,$Mk);
				usort($Data, function($a, $b) {return strnatcmp($a['IdKegiatan'], $b['IdKegiatan']);});
			}
		}
		echo json_encode($Data);
	}

	public function BKD(){
		$NIP = $this->session->userdata('NIP');
		$Semester = explode('-',$this->uri->segment('3'));
		$Tahun = explode('-',$this->uri->segment('4'));
		$Data['Pendidikan'] = $Data['Penelitian'] =  $Data['Pengabdian'] = $Data['Penunjang'] = array();
		if ($Semester[0] == $Semester[1] && $Tahun[0] == $Tahun[1]) {
			$Data['Pendidikan'] = array_merge($Data['Pendidikan'],$this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array());
			$Data['Penelitian'] = array_merge($Data['Penelitian'],$this->db->query("SELECT * FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array());
			$Data['Pengabdian'] = array_merge($Data['Pengabdian'],$this->db->query("SELECT * FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array());
			$Data['Penunjang'] = array_merge($Data['Penunjang'],$this->db->query("SELECT * FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array());
		} else if ($Tahun[0] == $Tahun[1]) {
			$Data['Pendidikan'] = array_merge($Data['Pendidikan'],$this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun = ".$Tahun[0])->result_array());
			$Data['Penelitian'] = array_merge($Data['Penelitian'],$this->db->query("SELECT * FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun = ".$Tahun[0])->result_array());
			$Data['Pengabdian'] = array_merge($Data['Pengabdian'],$this->db->query("SELECT * FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun = ".$Tahun[0])->result_array());
			$Data['Penunjang'] = array_merge($Data['Penunjang'],$this->db->query("SELECT * FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun = ".$Tahun[0])->result_array());
		} else if ($Semester[0] == 'Ganjil' && $Semester[1] == 'Genap') {
			$Data['Pendidikan'] = array_merge($Data['Pendidikan'],$this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1])->result_array());
			$Data['Penelitian'] = array_merge($Data['Penelitian'],$this->db->query("SELECT * FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1])->result_array());
			$Data['Pengabdian'] = array_merge($Data['Pengabdian'],$this->db->query("SELECT * FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1])->result_array());
			$Data['Penunjang'] = array_merge($Data['Penunjang'],$this->db->query("SELECT * FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1])->result_array());
		} else if ($Semester[0] == 'Genap' && $Semester[1] == 'Ganjil') {
			$Data['Pendidikan'] = array_merge($Data['Pendidikan'],$this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array());
			$Data['Penelitian'] = array_merge($Data['Penelitian'],$this->db->query("SELECT * FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array());
			$Data['Pengabdian'] = array_merge($Data['Pengabdian'],$this->db->query("SELECT * FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array());
			$Data['Penunjang'] = array_merge($Data['Penunjang'],$this->db->query("SELECT * FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array());
			$Data['Pendidikan'] = array_merge($Data['Pendidikan'],$this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->result_array());
			$Data['Penelitian'] = array_merge($Data['Penelitian'],$this->db->query("SELECT * FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->result_array());
			$Data['Pengabdian'] = array_merge($Data['Pengabdian'],$this->db->query("SELECT * FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->result_array());
			$Data['Penunjang'] = array_merge($Data['Penunjang'],$this->db->query("SELECT * FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->result_array());
			if (($Tahun[1] - $Tahun[0]) > 1) {
				$Data['Pendidikan'] = array_merge($Data['Pendidikan'],$this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1))->result_array());
				$Data['Penelitian'] = array_merge($Data['Penelitian'],$this->db->query("SELECT * FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1))->result_array());
				$Data['Pengabdian'] = array_merge($Data['Pengabdian'],$this->db->query("SELECT * FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1))->result_array());
				$Data['Penunjang'] = array_merge($Data['Penunjang'],$this->db->query("SELECT * FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1))->result_array());
			}
		} else if ($Semester[0] == 'Ganjil' && $Semester[1] == 'Ganjil') {
			$Data['Pendidikan'] = array_merge($Data['Pendidikan'],$this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1))->result_array());
			$Data['Penelitian'] = array_merge($Data['Penelitian'],$this->db->query("SELECT * FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1))->result_array());
			$Data['Pengabdian'] = array_merge($Data['Pengabdian'],$this->db->query("SELECT * FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1))->result_array());
			$Data['Penunjang'] = array_merge($Data['Penunjang'],$this->db->query("SELECT * FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1))->result_array());
			$Data['Pendidikan'] = array_merge($Data['Pendidikan'],$this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->result_array());
			$Data['Penelitian'] = array_merge($Data['Penelitian'],$this->db->query("SELECT * FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->result_array());
			$Data['Pengabdian'] = array_merge($Data['Pengabdian'],$this->db->query("SELECT * FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->result_array());
			$Data['Penunjang'] = array_merge($Data['Penunjang'],$this->db->query("SELECT * FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->result_array());
		} else if ($Semester[0] == 'Genap' && $Semester[1] == 'Genap') {
			$Data['Pendidikan'] = array_merge($Data['Pendidikan'],$this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array());
			$Data['Penelitian'] = array_merge($Data['Penelitian'],$this->db->query("SELECT * FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array());
			$Data['Pengabdian'] = array_merge($Data['Pengabdian'],$this->db->query("SELECT * FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array());
			$Data['Penunjang'] = array_merge($Data['Penunjang'],$this->db->query("SELECT * FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array());
			$Data['Pendidikan'] = array_merge($Data['Pendidikan'],$this->db->query("SELECT * FROM RealisasiPendidikan WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1])->result_array());
			$Data['Penelitian'] = array_merge($Data['Penelitian'],$this->db->query("SELECT * FROM RealisasiPenelitian WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1])->result_array());
			$Data['Pengabdian'] = array_merge($Data['Pengabdian'],$this->db->query("SELECT * FROM RealisasiPengabdian WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1])->result_array());
			$Data['Penunjang'] = array_merge($Data['Penunjang'],$this->db->query("SELECT * FROM RealisasiPenunjang WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1])->result_array());
		} 
		$Data['Filter'] = $Semester[0].'_'.$Tahun[0].'_'.$Semester[1].'_'.$Tahun[1];
		$this->load->view('ExcelBKD',$Data);
	}

	public function LampiranBKD(){
		$NIP = $this->session->userdata('NIP');
		$Semester = explode('-',$this->uri->segment('3'));
		$Tahun = explode('-',$this->uri->segment('4'));
		$Kegiatan = $this->uri->segment('5');
		$Data = array();
		if ($Semester[0] == $Semester[1] && $Tahun[0] == $Tahun[1]) {
			$Data = array_merge($Data,$this->db->query("SELECT Bukti FROM Realisasi".$Kegiatan." WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array());
		} else if ($Tahun[0] == $Tahun[1]) {
			$Data = array_merge($Data,$this->db->query("SELECT Bukti FROM Realisasi".$Kegiatan." WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun = ".$Tahun[0])->result_array());
		} else if ($Semester[0] == 'Ganjil' && $Semester[1] == 'Genap') {
			$Data = array_merge($Data,$this->db->query("SELECT Bukti FROM Realisasi".$Kegiatan." WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun >= ".$Tahun[0]." AND Tahun <= ".$Tahun[1])->result_array());
		} else if ($Semester[0] == 'Genap' && $Semester[1] == 'Ganjil') {
			$Data = array_merge($Data,$this->db->query("SELECT Bukti FROM Realisasi".$Kegiatan." WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array());
			$Data = array_merge($Data,$this->db->query("SELECT Bukti FROM Realisasi".$Kegiatan." WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->result_array());
			if (($Tahun[1] - $Tahun[0]) > 1) {
				$Data = array_merge($Data,$this->db->query("SELECT Bukti FROM Realisasi".$Kegiatan." WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".($Tahun[1]-1))->result_array());
			}
		} else if ($Semester[0] == 'Ganjil' && $Semester[1] == 'Ganjil') {
			$Data = array_merge($Data,$this->db->query("SELECT Bukti FROM Realisasi".$Kegiatan." WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun >= ".$Tahun[0]." AND Tahun <= ".($Tahun[1]-1))->result_array());
			$Data = array_merge($Data,$this->db->query("SELECT Bukti FROM Realisasi".$Kegiatan." WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[1]."' AND Tahun = ".$Tahun[1])->result_array());
		} else if ($Semester[0] == 'Genap' && $Semester[1] == 'Genap') {
			$Data = array_merge($Data,$this->db->query("SELECT Bukti FROM Realisasi".$Kegiatan." WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Semester = '".$Semester[0]."' AND Tahun = ".$Tahun[0])->result_array());
			$Data = array_merge($Data,$this->db->query("SELECT Bukti FROM Realisasi".$Kegiatan." WHERE NIP = ".$NIP." AND KreditBkd != 0"." AND Tahun >= ".($Tahun[0]+1)." AND Tahun <= ".$Tahun[1])->result_array());
		} 
		echo json_encode($Data);
	}

	public function RekapMBKM(){
		$Data['Dosen'] = $this->db->query("SELECT NIP,Nama FROM Dosen")->result_array();
		$Data['MBKM'] = $this->db->query("SELECT mbkm.*,mahasiswa.Nama,kodewilayah.Nama AS Kabupaten FROM mbkm,mahasiswa,kodewilayah WHERE mbkm.NIM=mahasiswa.NIM AND mbkm.Kabupaten=kodewilayah.Kode AND Status NOT LIKE '%Ditolak%' ORDER BY Tanggal ASC")->result_array();
    $this->load->view('ExcelRekapMBKM',$Data); 
	}

	public function PlotMBKM(){
		$Data['Halaman'] = 'Validasi';
		$Data['SubMenu'] = 'PlotMBKM';
		$Data['Dosen'] = $this->db->query("SELECT NIP,Nama FROM Dosen")->result_array();
		$Data['MBKM'] = $this->db->query("SELECT mbkm.*,mahasiswa.Nama,kodewilayah.Nama AS Kabupaten FROM mbkm,mahasiswa,kodewilayah WHERE mbkm.NIM=mahasiswa.NIM AND mbkm.Kabupaten=kodewilayah.Kode AND Status NOT LIKE '%Ditolak%' ORDER BY Tanggal ASC")->result_array();
		$this->load->view('Header',$Data);
    $this->load->view('PlotMBKM',$Data); 
	}

	public function ValidasiPlotMBKM(){
		$this->db->where('NIM', $_POST['NIM']);
		$this->db->update('mbkm',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menyimpnan Data!';
		}
	}

	public function DosenPembimbing(){
		$Data['Halaman'] = 'Validasi';
		$Data['SubMenu'] = 'DosenPembimbing';
		$Data['DosenPembimbing'] = $this->db->query("SELECT * FROM mahasiswa where StatusProposal = 'Menunggu Persetujuan KPS' or StatusProposal LIKE 'Ditolak Oleh Pembimbing%'")->result_array();
		$Data['Dosen'] = $this->db->query("SELECT NIP,Nama FROM Dosen")->result_array();
		$Belum = $this->db->query("SELECT NIPPembimbing,NamaPembimbing,COUNT(NIPPembimbing) AS Jumlah FROM `mahasiswa` WHERE NIPPembimbing != '' AND StatusProposal = 'Menunggu Persetujuan Pembimbing' GROUP BY NIPPembimbing")->result_array();
		$Aktif = $this->db->query("SELECT NIPPembimbing,NamaPembimbing,COUNT(NIPPembimbing) AS Jumlah FROM `mahasiswa` WHERE StatusProposal = 'Disetujui Pembimbing' AND NilaiSkripsi1 = '' AND NilaiSkripsi2 = '' AND NilaiSkripsi3 = '' GROUP BY NIPPembimbing")->result_array();
		$Lulus = $this->db->query("SELECT NIPPembimbing,NamaPembimbing,COUNT(NIPPembimbing) AS Jumlah FROM `mahasiswa` WHERE StatusProposal = 'Disetujui Pembimbing' AND NilaiSkripsi1 != '' AND NilaiSkripsi2 != '' AND NilaiSkripsi3 != '' GROUP BY NIPPembimbing")->result_array();
		$NIP = $this->db->query("SELECT NIP,Nama FROM Dosen")->result_array();
		$Data['Bimbingan'] = array();
		for ($i=0; $i < count($NIP); $i++) { 
			$Temp = array();array_push($Temp,$NIP[$i]['Nama']);
			for ($j=0; $j < count($Belum); $j++) { 
				if ($NIP[$i]['NIP'] == $Belum[$j]['NIPPembimbing']) {
					array_push($Temp,$Belum[$j]['Jumlah']);
				}
			}
			if (count($Temp) == 1) { array_push($Temp,0); }
			for ($k=0; $k < count($Aktif); $k++) { 
				if ($NIP[$i]['NIP'] == $Aktif[$k]['NIPPembimbing']) {
					array_push($Temp,$Aktif[$k]['Jumlah']);
				}
			}
			if (count($Temp) == 2) { array_push($Temp,0); }
			for ($l=0; $l < count($Lulus); $l++) { 
				if ($NIP[$i]['NIP'] == $Lulus[$l]['NIPPembimbing']) {
					array_push($Temp,$Lulus[$l]['Jumlah']);
				}
			}
			if (count($Temp) == 3) { array_push($Temp,0); }
			array_push($Data['Bimbingan'],$Temp);
		}
    $this->load->view('Header',$Data);
    $this->load->view('_DosenPembimbing',$Data); 
	}

	public function ValidasiUjianProposal(){ 
		$Data['Halaman'] = 'Validasi';
		$Data['SubMenu'] = 'ValidasiUjianProposal';
		$Data['UjianProposal'] = $this->db->query("SELECT * FROM mahasiswa where StatusUjianProposal = 'Menunggu Persetujuan KPS' or StatusPengujiProposal1 LIKE 'Ditolak%' or StatusPengujiProposal2 LIKE 'Ditolak%'")->result_array();
		$Data['Dosen'] = $this->db->query("SELECT NIP,Nama FROM Dosen")->result_array();
		$Penguji1 = $this->db->query("SELECT Dosen.Nama,mahasiswa.PengujiProposal1,COUNT(mahasiswa.PengujiProposal1) AS Jumlah FROM `Dosen`,`mahasiswa` WHERE mahasiswa.PengujiProposal1 = Dosen.NIP AND PengujiProposal1 != '' GROUP BY PengujiProposal1")->result_array();
		$Penguji2 = $this->db->query("SELECT Dosen.Nama,mahasiswa.PengujiProposal2,COUNT(mahasiswa.PengujiProposal2) AS Jumlah FROM `Dosen`,`mahasiswa` WHERE mahasiswa.PengujiProposal2 = Dosen.NIP AND PengujiProposal2 != '' GROUP BY PengujiProposal2")->result_array();
		$Penguji3 = $this->db->query("SELECT Dosen.Nama,mahasiswa.NIPPembimbing,COUNT(mahasiswa.NIPPembimbing) AS Jumlah FROM `Dosen`,`mahasiswa` WHERE mahasiswa.NIPPembimbing = Dosen.NIP AND (PengujiProposal1 != '' OR PengujiProposal2 != '') GROUP BY NIPPembimbing")->result_array();
		$Data['NamaDosen'] = array();$Data['JumlahMenguji'] = array();
		foreach ($Penguji1 as $key) {
			if (isset($Data['NamaDosen'][$key['PengujiProposal1']])) {
				$Data['JumlahMenguji'][$key['PengujiProposal1']] += $key['Jumlah'];
			} else {
				$Data['NamaDosen'][$key['PengujiProposal1']] = $key['Nama'];
				$Data['JumlahMenguji'][$key['PengujiProposal1']] = $key['Jumlah'];
			}
		}
		foreach ($Penguji2 as $key) {
			if (isset($Data['NamaDosen'][$key['PengujiProposal2']])) {
				$Data['JumlahMenguji'][$key['PengujiProposal2']] += $key['Jumlah'];
			} else {
				$Data['NamaDosen'][$key['PengujiProposal2']] = $key['Nama'];
				$Data['JumlahMenguji'][$key['PengujiProposal2']] = $key['Jumlah'];
			}
		}
		foreach ($Penguji3 as $key) {
			if (isset($Data['NamaDosen'][$key['NIPPembimbing']])) {
				$Data['JumlahMenguji'][$key['NIPPembimbing']] += $key['Jumlah'];
			} else {
				$Data['NamaDosen'][$key['NIPPembimbing']] = $key['Nama'];
				$Data['JumlahMenguji'][$key['NIPPembimbing']] = $key['Jumlah'];
			}
		}
    $this->load->view('Header',$Data);
    $this->load->view('ValidasiUjianProposal',$Data); 
	}

	public function ValidasiPengujiProposal(){
		$Data['Halaman'] = 'ValidasiDosen';
		$Data['SubMenu'] = 'ValidasiPengujiProposal';
		$Data['PengujiProposal'] = array();
		$Penguji1 = $this->db->query("SELECT * FROM mahasiswa where StatusUjianProposal = 'Menunggu Persetujuan Penguji' AND PengujiProposal1 = "."'".$this->session->userdata('NIP')."' AND StatusPengujiProposal1 = ''")->result_array();
		$Penguji2 = $this->db->query("SELECT * FROM mahasiswa where StatusUjianProposal = 'Menunggu Persetujuan Penguji' AND PengujiProposal2 = "."'".$this->session->userdata('NIP')."' AND StatusPengujiProposal2 = ''")->result_array();
		for ($i=0; $i < count($Penguji1); $i++) { 
			array_push($Data['PengujiProposal'],$Penguji1[$i]);
		}
		for ($i=0; $i < count($Penguji2); $i++) { 
			array_push($Data['PengujiProposal'],$Penguji2[$i]);
		}
    $this->load->view('Header',$Data);
    $this->load->view('ValidasiPengujiProposal',$Data); 
	}

	public function ValidasiPengujiSkripsi(){
		$Data['Halaman'] = 'ValidasiDosen';
		$Data['SubMenu'] = 'ValidasiPengujiSkripsi';
		$Data['PengujiSkripsi'] = array();
		$Penguji1 = $this->db->query("SELECT * FROM mahasiswa where StatusUjianSkripsi = 'Menunggu Persetujuan Penguji' AND PengujiSkripsi1 = "."'".$this->session->userdata('NIP')."' AND StatusPengujiSkripsi1 = ''")->result_array();
		$Penguji2 = $this->db->query("SELECT * FROM mahasiswa where StatusUjianSkripsi = 'Menunggu Persetujuan Penguji' AND PengujiSkripsi2 = "."'".$this->session->userdata('NIP')."' AND StatusPengujiSkripsi2 = ''")->result_array();
		for ($i=0; $i < count($Penguji1); $i++) { 
			array_push($Data['PengujiSkripsi'],$Penguji1[$i]);
		}
		for ($i=0; $i < count($Penguji2); $i++) { 
			array_push($Data['PengujiSkripsi'],$Penguji2[$i]);
		}
    $this->load->view('Header',$Data);
    $this->load->view('ValidasiPengujiSkripsi',$Data); 
	}
	
	public function PengujiProposal(){
		$Data['Halaman'] = 'Menilai';
		$Data['SubMenu'] = 'PengujiProposal';
		$Data['PengujiProposal'] = array();
		$Penguji1 = $this->db->query("SELECT * FROM mahasiswa where StatusPengujiProposal1 = 'Setuju' AND StatusPengujiProposal2 = 'Setuju' AND PengujiProposal1 = "."'".$this->session->userdata('NIP')."'"." AND NilaiProposal1 = ''")->result_array();
		$Penguji2 = $this->db->query("SELECT * FROM mahasiswa where StatusPengujiProposal1 = 'Setuju' AND StatusPengujiProposal2 = 'Setuju' AND PengujiProposal2 = "."'".$this->session->userdata('NIP')."'"." AND NilaiProposal2 = ''")->result_array();
		$Penguji3 = $this->db->query("SELECT * FROM mahasiswa where StatusPengujiProposal1 = 'Setuju' AND StatusPengujiProposal2 = 'Setuju' AND NIPPembimbing = "."'".$this->session->userdata('NIP')."'"." AND NilaiProposal3 = ''")->result_array();
		for ($i=0; $i < count($Penguji1); $i++) { 
			array_push($Data['PengujiProposal'],$Penguji1[$i]);
		}
		for ($i=0; $i < count($Penguji2); $i++) { 
			array_push($Data['PengujiProposal'],$Penguji2[$i]);
		}
		for ($i=0; $i < count($Penguji3); $i++) { 
			array_push($Data['PengujiProposal'],$Penguji3[$i]);
		}
    $this->load->view('Header',$Data);
    $this->load->view('PengujiProposal',$Data); 
	}

	public function PengujiSkripsi(){
		$Data['Halaman'] = 'Menilai';
		$Data['SubMenu'] = 'PengujiSkripsi';
		$Data['PengujiSkripsi'] = array();
		$Penguji1 = $this->db->query("SELECT * FROM mahasiswa where StatusPengujiSkripsi1 = 'Setuju' AND StatusPengujiSkripsi2 = 'Setuju' AND PengujiSkripsi1 = "."'".$this->session->userdata('NIP')."'"." AND NilaiSkripsi1 = ''")->result_array();
		$Penguji2 = $this->db->query("SELECT * FROM mahasiswa where StatusPengujiSkripsi1 = 'Setuju' AND StatusPengujiSkripsi2 = 'Setuju' AND PengujiSkripsi2 = "."'".$this->session->userdata('NIP')."'"." AND NilaiSkripsi2 = ''")->result_array();
		$Penguji3 = $this->db->query("SELECT * FROM mahasiswa where StatusPengujiSkripsi1 = 'Setuju' AND StatusPengujiSkripsi2 = 'Setuju' AND NIPPembimbing = "."'".$this->session->userdata('NIP')."'"." AND NilaiSkripsi3 = ''")->result_array();
		for ($i=0; $i < count($Penguji1); $i++) { 
			array_push($Data['PengujiSkripsi'],$Penguji1[$i]);
		}
		for ($i=0; $i < count($Penguji2); $i++) { 
			array_push($Data['PengujiSkripsi'],$Penguji2[$i]);
		}
		for ($i=0; $i < count($Penguji3); $i++) { 
			array_push($Data['PengujiSkripsi'],$Penguji3[$i]);
		}
    $this->load->view('Header',$Data);
    $this->load->view('PengujiSkripsi',$Data); 
	}

	public function GetRevisiProposal(){
		$DosenPenguji = $this->db->query("SELECT PengujiProposal1,PengujiProposal2,NIPPembimbing,CatatanProposal1,CatatanProposal2,CatatanProposal3 FROM mahasiswa where NIM = ".$_POST['NIM'])->row_array();
		if ($DosenPenguji['PengujiProposal1'] == $this->session->userdata('NIP')) {
			echo $DosenPenguji['CatatanProposal1'];
		} else if ($DosenPenguji['PengujiProposal2'] == $this->session->userdata('NIP')) {
			echo $DosenPenguji['CatatanProposal2'];
		} else if ($DosenPenguji['NIPPembimbing'] == $this->session->userdata('NIP')) {
			echo $DosenPenguji['CatatanProposal3'];
		} 
	}

	public function UpdateRevisiProposal(){
		$DosenPenguji = $this->db->query("SELECT PengujiProposal1,PengujiProposal2,NIPPembimbing FROM mahasiswa where NIM = ".$_POST['NIM'])->row_array();
		if ($DosenPenguji['PengujiProposal1'] == $this->session->userdata('NIP')) {
			$_POST['CatatanProposal1'] = $_POST['Catatan'];unset($_POST['Catatan']);
		} else if ($DosenPenguji['PengujiProposal2'] == $this->session->userdata('NIP')) {
			$_POST['CatatanProposal2'] = $_POST['Catatan'];unset($_POST['Catatan']);
		} else if ($DosenPenguji['NIPPembimbing'] == $this->session->userdata('NIP')) {
			$_POST['CatatanProposal3'] = $_POST['Catatan'];unset($_POST['Catatan']);
		} 
    $this->db->where('NIM', $_POST['NIM']);
		$this->db->update('mahasiswa',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menyimpnan Data!';
		}
	}
	
	public function MenilaiProposal(){
		$Data['PengujiProposal'] = $this->db->query("SELECT PengujiProposal1,PengujiProposal2,NIPPembimbing FROM mahasiswa where NIM = ".$_POST['NIM'])->row_array();
		if ($Data['PengujiProposal']['PengujiProposal1'] == $this->session->userdata('NIP')) {
			$_POST['NilaiProposal1'] = $_POST['Nilai'];unset($_POST['Nilai']);
		} else if ($Data['PengujiProposal']['PengujiProposal2'] == $this->session->userdata('NIP')) {
			$_POST['NilaiProposal2'] = $_POST['Nilai'];unset($_POST['Nilai']);
		} else if ($Data['PengujiProposal']['NIPPembimbing'] == $this->session->userdata('NIP')) {
			$_POST['NilaiProposal3'] = $_POST['Nilai'];unset($_POST['Nilai']);
		} 
    $this->db->where('NIM', $_POST['NIM']);
		$this->db->update('mahasiswa',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menyimpnan Data!';
		}
	}

	public function GetRevisiSkripsi(){
		$DosenPenguji = $this->db->query("SELECT PengujiSkripsi1,PengujiSkripsi2,NIPPembimbing,CatatanSkripsi1,CatatanSkripsi2,CatatanSkripsi3 FROM mahasiswa where NIM = ".$_POST['NIM'])->row_array();
		if ($DosenPenguji['PengujiSkripsi1'] == $this->session->userdata('NIP')) {
			echo $DosenPenguji['CatatanSkripsi1'];
		} else if ($DosenPenguji['PengujiSkripsi2'] == $this->session->userdata('NIP')) {
			echo $DosenPenguji['CatatanSkripsi2'];
		} else if ($DosenPenguji['NIPPembimbing'] == $this->session->userdata('NIP')) {
			echo $DosenPenguji['CatatanSkripsi3'];
		} 
	}

	public function UpdateRevisiSkripsi(){
		$DosenPenguji = $this->db->query("SELECT PengujiSkripsi1,PengujiSkripsi2,NIPPembimbing FROM mahasiswa where NIM = ".$_POST['NIM'])->row_array();
		if ($DosenPenguji['PengujiSkripsi1'] == $this->session->userdata('NIP')) {
			$_POST['CatatanSkripsi1'] = $_POST['Catatan'];unset($_POST['Catatan']);
		} else if ($DosenPenguji['PengujiSkripsi2'] == $this->session->userdata('NIP')) {
			$_POST['CatatanSkripsi2'] = $_POST['Catatan'];unset($_POST['Catatan']);
		} else if ($DosenPenguji['NIPPembimbing'] == $this->session->userdata('NIP')) {
			$_POST['CatatanSkripsi3'] = $_POST['Catatan'];unset($_POST['Catatan']);
		} 
    $this->db->where('NIM', $_POST['NIM']);
		$this->db->update('mahasiswa',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menyimpnan Data!';
		}
	}

	public function MenilaiSkripsi(){
		$Data['PengujiSkripsi'] = $this->db->query("SELECT PengujiSkripsi1,PengujiSkripsi2,NIPPembimbing FROM mahasiswa where NIM = ".$_POST['NIM'])->row_array();
		if ($Data['PengujiSkripsi']['PengujiSkripsi1'] == $this->session->userdata('NIP')) {
			$_POST['NilaiSkripsi1'] = $_POST['Nilai'];unset($_POST['Nilai']);
		} else if ($Data['PengujiSkripsi']['PengujiSkripsi2'] == $this->session->userdata('NIP')) {
			$_POST['NilaiSkripsi2'] = $_POST['Nilai'];unset($_POST['Nilai']);
		} else if ($Data['PengujiSkripsi']['NIPPembimbing'] == $this->session->userdata('NIP')) {
			$_POST['NilaiSkripsi3'] = $_POST['Nilai'];unset($_POST['Nilai']);
		} 
    $this->db->where('NIM', $_POST['NIM']);
		$this->db->update('mahasiswa',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menyimpnan Data!';
		}
	}

	public function RekapDosenPembimbing(){
		$this->load->library('Pdf');
		$Data['Mhs'] = $this->db->query("SELECT * FROM `mahasiswa` WHERE NIPPembimbing != '' ORDER BY NIPPembimbing")->result_array();
		$this->load->view('RekapDosenPembimbing',$Data);
	}

	public function TerimaMengujiSkripsi(){
		$Data['PengujiSkripsi'] = $this->db->query("SELECT PengujiSkripsi1,PengujiSkripsi2 FROM mahasiswa where NIM = ".$_POST['NIM'])->row_array();
		if ($Data['PengujiSkripsi']['PengujiSkripsi1'] == $this->session->userdata('NIP')) {
			$_POST['StatusPengujiSkripsi1'] = 'Setuju';
		} else if ($Data['PengujiSkripsi']['PengujiSkripsi2'] == $this->session->userdata('NIP')) {
			$_POST['StatusPengujiSkripsi2'] = 'Setuju';
		} 
    $this->db->where('NIM', $_POST['NIM']);
		$this->db->update('mahasiswa',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menyimpnan Data!';
		}
	}

	public function TolakMengujiSkripsi(){
		$Data['PengujiSkripsi'] = $this->db->query("SELECT PengujiSkripsi1,PengujiSkripsi2 FROM mahasiswa where NIM = ".$_POST['NIM'])->row_array();
		if ($Data['PengujiSkripsi']['PengujiSkripsi1'] == $this->session->userdata('NIP')) {
			$_POST['StatusPengujiSkripsi1'] = 'Ditolak Karena '.$_POST['Alasan'];
		} else if ($Data['PengujiSkripsi']['PengujiSkripsi2'] == $this->session->userdata('NIP')) {
			$_POST['StatusPengujiSkripsi2'] = 'Ditolak Karena '.$_POST['Alasan'];
		} 
		unset($_POST['Alasan']);
    $this->db->where('NIM', $_POST['NIM']);
		$this->db->update('mahasiswa',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menyimpnan Data!';
		}
	}

	public function TerimaMengujiProposal(){
		$Data['PengujiProposal'] = $this->db->query("SELECT PengujiProposal1,PengujiProposal2 FROM mahasiswa where NIM = ".$_POST['NIM'])->row_array();
		if ($Data['PengujiProposal']['PengujiProposal1'] == $this->session->userdata('NIP')) {
			$_POST['StatusPengujiProposal1'] = 'Setuju';
		} else if ($Data['PengujiProposal']['PengujiProposal2'] == $this->session->userdata('NIP')) {
			$_POST['StatusPengujiProposal2'] = 'Setuju';
		} 
    $this->db->where('NIM', $_POST['NIM']);
		$this->db->update('mahasiswa',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menyimpnan Data!';
		}
	}

	public function TolakMengujiProposal(){
		$Data['PengujiProposal'] = $this->db->query("SELECT PengujiProposal1,PengujiProposal2 FROM mahasiswa where NIM = ".$_POST['NIM'])->row_array();
		if ($Data['PengujiProposal']['PengujiProposal1'] == $this->session->userdata('NIP')) {
			$_POST['StatusPengujiProposal1'] = 'Ditolak Karena '.$_POST['Alasan'];
		} else if ($Data['PengujiProposal']['PengujiProposal2'] == $this->session->userdata('NIP')) {
			$_POST['StatusPengujiProposal2'] = 'Ditolak Karena '.$_POST['Alasan'];
		} 
		unset($_POST['Alasan']);
    $this->db->where('NIM', $_POST['NIM']);
		$this->db->update('mahasiswa',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menyimpnan Data!';
		}
	} 

	public function TerimaBimbingan(){
		$_POST['TanggalDisetujuiPembimbing'] = date("Y-m-d");
    $this->db->where('NIM', $_POST['NIM']);
		$this->db->update('mahasiswa',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menyimpnan Data!';
		}
	}

	public function KPSMemilihPengujiProposal(){
		if ($_POST['PengujiProposal1'] != '') {
			$_POST['StatusPengujiProposal1'] = '';
		} else {
			unset($_POST['PengujiProposal1']);
		}
		if ($_POST['PengujiProposal2'] != '') {
			$_POST['StatusPengujiProposal2'] = '';
		} else {
			unset($_POST['PengujiProposal2']);
		}
    $this->db->where('NIM', $_POST['NIM']);
		$this->db->update('mahasiswa',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menyimpnan Data!';
		}
	}

	public function ValidasiProposal(){
    $this->db->where('NIM', $_POST['NIM']);
		$this->db->update('mahasiswa',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menyimpnan Data!';
		}
	}

	public function UpdateBimbingan(){
    $this->db->where('Id', $_POST['Id']);
		$this->db->update('bimbingan',$_POST);
		echo '1';
	}

	public function ValidasiBimbingan(){
		$Data['Halaman'] = 'ValidasiDosen';
		$Data['SubMenu'] = 'ValidasiBimbingan';
		$Data['DosenPembimbing'] = $this->db->query("SELECT * FROM mahasiswa where StatusProposal = 'Menunggu Persetujuan Pembimbing' AND NIPPembimbing = "."'".$this->session->userdata('NIP')."'")->result_array();
    $this->load->view('Header',$Data);
    $this->load->view('ValidasiBimbingan',$Data); 
	}

	public function SesiBimbingan(){
		$this->session->set_userdata('NIMBimbingan', $_POST['NIMBimbingan']);
		$this->session->set_userdata('NamaBimbingan', $_POST['NamaBimbingan']);
	}

	public function InputMengajar(){
		if($this->db->get_where('mengajar', array('KodeMK' => $_POST['KodeMK']))->num_rows() === 0){
			$_POST['NIP'] = $this->session->userdata('NIP');
			$_POST['Status'] = 0;$_POST['Tahun'] = date("Y");
			$this->db->insert('mengajar',$_POST);
			if ($this->db->affected_rows()){
				echo '1';
			} else {
				echo 'Gagal Input Data!'; 
			}
		} else {
			echo 'Mata Kuliah Sudah Ada!'; 
		}
	}

	public function InputSoal(){
		$this->db->where('Id', $_POST['Id']);
		$this->db->update('mengajar',$_POST);
		echo '1';
	}

	public function DokumenEvaluasi(){
		$Data['Halaman'] = 'Jamu';
		$Data['SubMenu'] = 'DokumenEvaluasi';
		$Data['Data'] = $this->db->get('evaluasi')->result_array();
    $this->load->view('Header',$Data);
    $this->load->view('Evaluasi',$Data); 
	}

	public function InputDokumen(){
		$NamaDokumen = date('Ymd',time()).substr(password_hash('NamaDokumen', PASSWORD_DEFAULT),7,7);
		$NamaDokumen = str_replace("/","E",$NamaDokumen);
		$NamaDokumen = str_replace(".","F",$NamaDokumen);
		move_uploaded_file($_FILES['Bukti']['tmp_name'], "Evaluasi/".$NamaDokumen.".pdf");
		$_POST['Bukti'] = $NamaDokumen.".pdf";
		$this->db->insert('evaluasi',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Input Data!'; 
		}
	}

	public function EditDokumen(){
		if (count($_FILES) == 0) {
			unset($_POST['_Bukti']);unset($_POST['Bukti']);
      $this->db->where('Id', $_POST['Id']);
			$this->db->update('evaluasi',$_POST);
			echo '1';
    } else {
      unlink('Evaluasi/'.$_POST['_Bukti']);
			unset($_POST['_Bukti']);
			$NamaDokumen = date('Ymd',time()).substr(password_hash('NamaDokumen', PASSWORD_DEFAULT),7,7);
			$NamaDokumen = str_replace("/","E",$NamaDokumen);
			$NamaDokumen = str_replace(".","F",$NamaDokumen);
			move_uploaded_file($_FILES['Bukti']['tmp_name'], "Evaluasi/".$NamaDokumen.".pdf");
			$_POST['Bukti'] = $NamaDokumen.".pdf";
			$this->db->where('Id', $_POST['Id']);
			$this->db->update('evaluasi',$_POST);
			echo '1';
		}
	}

	public function HapusDokumen(){
		$this->db->delete('evaluasi', array('Id' => $_POST['Id']));
		if ($this->db->affected_rows()){
			unlink('Evaluasi/'.$_POST['Bukti']);
			echo '1';
		} else {
			echo 'Gagal Menghapus Data!';
		}
	}

	public function ValidasiSoal(){
		$Data['Halaman'] = 'Jamu';
		$Data['SubMenu'] = 'ValidasiSoal';
		$NIP = $this->session->userdata('NIP');
		$Data['Soal'] = $this->db->query("SELECT mengajar.*,rps.NamaMK,rps.BobotMK,rps.Semester,Dosen.Nama FROM mengajar,rps,Dosen where mengajar.KodeMK=rps.KodeMK AND mengajar.NIP=Dosen.NIP AND (mengajar.SoalUTS != '' OR mengajar.SoalUAS != '')")->result_array();
    $this->load->view('Header',$Data);
    $this->load->view('ValidasiSoal',$Data); 
	}

	public function RPS(){
		$Data['Halaman'] = 'Mengajar';
		$Data['SubMenu'] = '';
		$NIP = $this->session->userdata('NIP');
		$Data['Mengajar'] = $this->db->query('SELECT rps.KodeMK,rps.NamaMK,rps.BobotMK,rps.Semester,mengajar.Id,mengajar.Status,mengajar.Tahun FROM rps,mengajar WHERE mengajar.KodeMK=rps.KodeMK AND mengajar.NIP='.$NIP)->result_array();
		$Data['RPS'] = $this->db->query('SELECT KodeMK,NamaMK,BobotMK,Semester FROM `rps` ORDER BY Semester ASC')->result_array();
		// $Bulan = date("m");
		// if (intval($Bulan[1]) < 8) {
		// 	$Data['RPS'] = $this->db->query('SELECT KodeMK,NamaMK,BobotMK,Semester FROM `rps` WHERE (Semester % 2) = 0 ORDER BY Semester ASC')->result_array();
		// } else {
		// 	$Data['RPS'] = $this->db->query('SELECT KodeMK,NamaMK,BobotMK,Semester FROM `rps` WHERE (Semester % 2) > 0 ORDER BY Semester ASC')->result_array();
		// }
    $this->load->view('Header',$Data);
    $this->load->view('MengajarRPS',$Data); 
	}

	public function PlotRPS(){
		$Data['Halaman'] = 'Validasi';
		$Data['SubMenu'] = 'PlotRPS';
		$Data['RPS'] = $this->db->query("SELECT rps.KodeMK,rps.NamaMK,rps.BobotMK,rps.Semester,mengajar.Id,mengajar.Status,Dosen.Nama FROM rps,mengajar,Dosen WHERE mengajar.KodeMK=rps.KodeMK AND mengajar.NIP=Dosen.NIP")->result_array();
		$this->load->view('Header',$Data);
    $this->load->view('PlotRPS',$Data); 
	}

	public function HapusRPS(){
		$this->db->delete('mengajar', array('Id' => $_POST['Id']));
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menghapus!';
		}
	}

	public function UpdateRPS(){
		if($this->db->get_where('rps', array('KodeMK' => $_POST['KodeMK']))->num_rows() === 0 || ($_POST['KodeMK'] == $_POST['KodeMKLama'])){
			$this->db->where('KodeMK',$_POST['KodeMKLama']);
			unset($_POST['KodeMKLama']);
			$this->db->update('rps', $_POST);
			echo '1';
		} else {
			echo "Data RPS Dengan Kode MK ".$_POST['KodeMK']." Sudah Ada!";
		}
	}

	public function ValidasiRPS(){
		$_POST['Status'] = 1;
		$this->db->where('Id',$_POST['Id']);
		$this->db->update('mengajar', $_POST);
		echo '1';
	}

	public function KPSValidasiRPS(){
		$_POST['Status'] = 3;
		$this->db->where('Id',$_POST['Id']);
		$this->db->update('mengajar', $_POST);
		echo '1';
	}

	public function KPSTolakRPS(){
		$_POST['Status'] = 2;
		$this->db->where('Id',$_POST['Id']);
		$this->db->update('mengajar', $_POST);
		echo '1';
	}

	public function GetRPS($KodeMK){
    echo json_encode($this->db->get_where('rps', array('KodeMK' => $KodeMK))->row_array());
	}

	public function GetSoal($Id){
		echo json_encode($this->db->query("SELECT * FROM mengajar WHERE Id=".$Id)->row_array());	
	}

	public function Soal($Id,$Jenis){
		$Data['Soal'] = $this->db->query("SELECT mengajar.*,Dosen.Nama,rps.NamaMK,rps.Semester FROM mengajar,Dosen,rps WHERE mengajar.Id=".$Id." and mengajar.KodeMK=rps.KodeMK and mengajar.NIP=Dosen.NIP")->row_array();
		$Data['Jenis'] = $Jenis;
		$this->load->library('Pdf');
		$this->load->view('Soal',$Data);
	}

	public function UnduhRPS($KodeMK){
		$Data['RPS'] = $this->db->get_where("rps", array('KodeMK' => $KodeMK))->row_array();
		$Dosen = $this->db->query("SELECT Dosen.Nama,Dosen.QRCode FROM mengajar,Dosen WHERE mengajar.NIP=Dosen.NIP AND mengajar.KodeMK='".$KodeMK."' AND mengajar.Status=3")->result_array();
		$Data['Dosen1'] = $Dosen[0]['Nama'];
		$Data['QRCode1'] = $Dosen[0]['QRCode'];
		if (count($Dosen) > 1) { 
			$Data['Dosen2'] = $Dosen[1]['Nama']; 
			$Data['QRCode2'] = $Dosen[1]['QRCode'];
		}
		$this->load->library('Pdf');
		$this->load->view('PDFRPS',$Data);
		// $this->load->view('ExcelRPS',$Data);
	}

	public function BimbinganSkripsi(){
		$Data['Halaman'] = 'Bimbingan Skripsi';
		$Data['SubMenu'] = '';
		$Data['Bimbingan'] = $this->db->query("SELECT * FROM mahasiswa WHERE StatusProposal = 'Disetujui Pembimbing' AND NIPPembimbing = "."'".$this->session->userdata('NIP')."'")->result_array(); 
		$Data['DataBimbingan'] = array();
		if ($this->session->userdata('NIMBimbingan') != '') {
			$Data['DataBimbingan'] = $this->db->query("SELECT * FROM bimbingan WHERE NIM = ".$this->session->userdata('NIMBimbingan'))->result_array(); 
			$Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa WHERE NIM = ".$this->session->userdata('NIMBimbingan'))->row_array(); 
		} else if (count($Data['Bimbingan']) > 0) {
			$Data['DataBimbingan'] = $this->db->query("SELECT * FROM bimbingan WHERE NIM = ".$Data['Bimbingan'][0]['NIM'])->result_array(); 
			$Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa WHERE NIM = ".$Data['Bimbingan'][0]['NIM'])->row_array(); 
		}
    $this->load->view('Header',$Data);
    $this->load->view('BimbinganSkripsi',$Data); 
	}

	public function NilaiProposal(){
		$Data['Halaman'] = 'Nilai';
		$Data['SubMenu'] = 'NilaiProposal';
		$NIP = $this->session->userdata('NIP');
		$Data['RekapNilai'] = $this->db->query("SELECT * FROM mahasiswa where NilaiProposal1 != '' AND NilaiProposal2 != '' AND NilaiProposal3 != '' AND (NIPPembimbing = '".$NIP."' OR PengujiProposal1 = '".$NIP."' OR PengujiProposal2 = '".$NIP."')")->result_array();
    $this->load->view('Header',$Data);
    $this->load->view('NilaiProposal',$Data); 
	}

	public function NilaiSkripsi(){
		$Data['Halaman'] = 'Nilai';
		$Data['SubMenu'] = 'NilaiSkripsi';
		$NIP = $this->session->userdata('NIP');
		$Data['RekapNilai'] = $this->db->query("SELECT * FROM mahasiswa where NilaiSkripsi1 != '' AND NilaiSkripsi2 != '' AND NilaiSkripsi3 != '' AND (NIPPembimbing = '".$NIP."' OR PengujiSkripsi1 = '".$NIP."' OR PengujiSkripsi2 = '".$NIP."')")->result_array();
    $this->load->view('Header',$Data);
    $this->load->view('NilaiSkripsi',$Data); 
	}

	public function RekapSkripsi(){
		$Data['Halaman'] = 'Rekap Skripsi';
		$Data['SubMenu'] = '';
		$Data['RekapNilai'] = $this->db->query("SELECT * FROM mahasiswa where NilaiSkripsi1 != '' AND NilaiSkripsi2 != '' AND NilaiSkripsi3 != ''")->result_array();
    $this->load->view('Header',$Data);
    $this->load->view('RekapSkripsiKPS',$Data); 
	}
	
	public function RekapMahasiswa($Status){
		$Data['Halaman'] = 'Rekap Mahasiswa';
		$Data['SubMenu'] = '';
		if ($Status == '1') {
			$Data['Rekap'] = $this->db->query("SELECT NIM,Nama,NamaPembimbing FROM mahasiswa where NilaiSkripsi1 != '' AND NilaiSkripsi2 != '' AND NilaiSkripsi3 != ''")->result_array();
			$Data['Status'] = 'Sudah Ujian Skripsi';	
		} else if ($Status == '2') {
			$Data['Rekap'] = $this->db->query("SELECT NIM,Nama,NamaPembimbing FROM mahasiswa where NilaiProposal1 != '' AND NilaiProposal2 != '' AND NilaiProposal3 != '' AND StatusUjianSkripsi = ''")->result_array();
			$Data['Status'] = 'Sudah Ujian Proposal';	
		} else if ($Status == '3') {
			$Data['Rekap'] = $this->db->query("SELECT NIM,Nama,NamaPembimbing FROM mahasiswa where StatusProposal = 'Disetujui Pembimbing' AND StatusUjianProposal = '' AND StatusUjianSkripsi = ''")->result_array();
			$Data['Status'] = 'Mendapat Dosen Pembimbing';
		} else if ($Status == '4') {
			$Data['Rekap'] = $this->db->query("SELECT NIM,Nama,NamaPembimbing FROM mahasiswa where StatusProposal = 'Menunggu Persetujuan Pembimbing'")->result_array();
			$Data['Status'] = 'Menunggu Validasi Pembimbing';
		} else if ($Status == '5') {
			$Data['Rekap'] = $this->db->query("SELECT NIM,Nama,NamaPembimbing FROM mahasiswa where StatusProposal = 'Menunggu Persetujuan KPS' OR StatusProposal LIKE '%Ditolak Oleh Pembimbing%'")->result_array();
			$Data['Status'] = 'Menunggu Validasi KPS';
		} else if ($Status == '6') {
			$Data['Rekap'] = $this->db->query("SELECT NIM,Nama,NamaPembimbing FROM mahasiswa where StatusProposal = 'Diajukan'")->result_array();
			$Data['Status'] = 'Menunggu Validasi Admin';
		} else if ($Status == '7') {
			$Data['Rekap'] = $this->db->query("SELECT NIM,Nama,NamaPembimbing FROM mahasiswa where StatusProposal = ''")->result_array();
			$Data['Status'] = 'Belum Mengajukan Pembimbing';
		}
    $this->load->view('Header',$Data);
    $this->load->view('RekapMahasiswa',$Data); 
	}
	
	public function BeritaAcaraUjianProposal($NIM){
		$this->load->library('Pdf');
		$Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa WHERE NIM = ".$NIM)->row_array();
		$Tanggal = explode("-",$Data['Mhs']['TanggalUjianProposal']);$Data['Tanggal'] = $Tanggal[2].' - '.$Tanggal[1].' - '.$Tanggal[0];
		$Data['Ketua'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal1'])->row_array()['QRCode'];
		$Data['Anggota'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal2'])->row_array()['QRCode'];
		$Data['NamaKetua'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal1'])->row_array()['Nama'];
		$Data['NamaAnggota'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal2'])->row_array()['Nama'];
		$Data['Sekretaris'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['NIPPembimbing'])->row_array()['QRCode'];
		$Bobot = array(5,3.75,2.5,2.5,2.5,5,3.75);
		$RekapNilai = explode("$",$Data['Mhs']['NilaiProposal1']);
		$NilaiKetuaPenguji = 0;
		for ($i=0; $i < count($Bobot); $i++) { 
			$NilaiKetuaPenguji += $Bobot[$i]*(float)$RekapNilai[$i];
		}
		$RekapNilai = explode("$",$Data['Mhs']['NilaiProposal2']);
		$NilaiAnggotaPenguji = 0;
		for ($i=0; $i < count($Bobot); $i++) { 
			$NilaiAnggotaPenguji += $Bobot[$i]*(float)$RekapNilai[$i];
		}
		$RekapNilai = explode("$",$Data['Mhs']['NilaiProposal3']);
		$NilaiSekretaris = 0;
		for ($i=0; $i < count($Bobot); $i++) { 
			$NilaiSekretaris += $Bobot[$i]*(float)$RekapNilai[$i];
		}
		$Data['Nilai'] = number_format(((0.3*$NilaiKetuaPenguji)+(0.3*$NilaiAnggotaPenguji)+(0.4*$NilaiSekretaris)),2,",",".");
		$this->load->view('BeritaAcaraUjianProposal',$Data);
	}

	public function ExcelUjianProposal($NIM){
		$this->load->library('Pdf');
		$Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa WHERE NIM = ".$NIM)->row_array();
		$Data['NamaKetua'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal1'])->row_array()['Nama'];
		$Data['NamaAnggota'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal2'])->row_array()['Nama'];
		$Bobot = array(5,3.75,2.5,2.5,2.5,5,3.75);
		$RekapNilai = explode("$",$Data['Mhs']['NilaiProposal1']);
		$NilaiKetuaPenguji = 0;
		for ($i=0; $i < count($Bobot); $i++) { 
			$NilaiKetuaPenguji += $Bobot[$i]*(float)$RekapNilai[$i];
		}
		$RekapNilai = explode("$",$Data['Mhs']['NilaiProposal2']);
		$NilaiAnggotaPenguji = 0;
		for ($i=0; $i < count($Bobot); $i++) { 
			$NilaiAnggotaPenguji += $Bobot[$i]*(float)$RekapNilai[$i];
		}
		$RekapNilai = explode("$",$Data['Mhs']['NilaiProposal3']);
		$NilaiSekretaris = 0;
		for ($i=0; $i < count($Bobot); $i++) { 
			$NilaiSekretaris += $Bobot[$i]*(float)$RekapNilai[$i];
		}
		$Data['Nilai'] = number_format(((0.3*$NilaiKetuaPenguji)+(0.3*$NilaiAnggotaPenguji)+(0.4*$NilaiSekretaris)),2,",",".");
		$this->load->view('ExcelUjianProposal',$Data);
	}

	public function BeritaAcaraUjianSkripsi($NIM){
		$this->load->library('Pdf');
		$Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa WHERE NIM = ".$NIM)->row_array();
		$Tanggal = explode("-",$Data['Mhs']['TanggalUjianSkripsi']);$Data['Tanggal'] = $Tanggal[2].' - '.$Tanggal[1].' - '.$Tanggal[0];
		$Data['Ketua'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal1'])->row_array()['QRCode'];
		$Data['Anggota'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal2'])->row_array()['QRCode'];
		$Data['NamaKetua'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal1'])->row_array()['Nama'];
		$Data['NamaAnggota'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal2'])->row_array()['Nama'];
		$Data['Sekretaris'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['NIPPembimbing'])->row_array()['QRCode'];
		$Bobot = array(5,3.75,2.5,2.5,2.5,5,3.75);
		$RekapNilai = explode("$",$Data['Mhs']['NilaiProposal1']);
		$NilaiKetuaPenguji = 0;
		for ($i=0; $i < count($Bobot); $i++) { 
			$NilaiKetuaPenguji += $Bobot[$i]*(float)$RekapNilai[$i];
		}
		$RekapNilai = explode("$",$Data['Mhs']['NilaiProposal2']);
		$NilaiAnggotaPenguji = 0;
		for ($i=0; $i < count($Bobot); $i++) { 
			$NilaiAnggotaPenguji += $Bobot[$i]*(float)$RekapNilai[$i];
		}
		$RekapNilai = explode("$",$Data['Mhs']['NilaiProposal3']);
		$NilaiSekretaris = 0;
		for ($i=0; $i < count($Bobot); $i++) { 
			$NilaiSekretaris += $Bobot[$i]*(float)$RekapNilai[$i];
		}
		$NilaiProposal = (0.3*$NilaiKetuaPenguji)+(0.3*$NilaiAnggotaPenguji)+(0.4*$NilaiSekretaris);
		$Bobot = array(2.5,2.5,2,2,2,2.5,2.5,2,2.5,2.5,2);
		$RekapNilai = explode("$",$Data['Mhs']['NilaiSkripsi1']);
		$NilaiKetuaPenguji = 0;
		for ($i=0; $i < count($Bobot); $i++) { 
			$NilaiKetuaPenguji += $Bobot[$i]*(float)$RekapNilai[$i];
		}
		$RekapNilai = explode("$",$Data['Mhs']['NilaiSkripsi2']);
		$NilaiAnggotaPenguji = 0;
		for ($i=0; $i < count($Bobot); $i++) { 
			$NilaiAnggotaPenguji += $Bobot[$i]*(float)$RekapNilai[$i];
		}
		$RekapNilai = explode("$",$Data['Mhs']['NilaiSkripsi3']);
		$NilaiSekretaris = 0;
		for ($i=0; $i < count($Bobot); $i++) { 
			$NilaiSekretaris += $Bobot[$i]*(float)$RekapNilai[$i];
		}
		$NilaiSkripsi = (0.3*$NilaiKetuaPenguji)+(0.3*$NilaiAnggotaPenguji)+(0.4*$NilaiSekretaris);
		$Data['Nilai'] = number_format(((0.3*$NilaiProposal)+(0.7*$NilaiSkripsi)),2,",",".");
		if ($Data['Nilai'] >= 80) {
			$Data['Nilai'] .= ' (A)';
		} else if ($Data['Nilai'] > 75) {
			$Data['Nilai'] .= ' (B+)';
		} else if ($Data['Nilai'] > 70) {
			$Data['Nilai'] .= ' (B)';
		} else if ($Data['Nilai'] > 65) {
			$Data['Nilai'] .= ' (C+)';
		} else if ($Data['Nilai'] > 60) {
			$Data['Nilai'] .= ' (C)';
		} else if ($Data['Nilai'] > 55) {
			$Data['Nilai'] .= ' (D+)';
		} else if ($Data['Nilai'] > 50) {
			$Data['Nilai'] .= ' (D)';
		} else {
			$Data['Nilai'] .= ' (E)';
		}
		$this->load->view('BeritaAcaraUjianSkripsi',$Data);
	}

	public function ExcelUjianSkripsi($NIM){
		$this->load->library('Pdf');
		$Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa WHERE NIM = ".$NIM)->row_array();
		$Data['NamaKetua'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiSkripsi1'])->row_array()['Nama'];
		$Data['NamaAnggota'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiSkripsi2'])->row_array()['Nama'];
		$Bobot = array(5,3.75,2.5,2.5,2.5,5,3.75);
		$RekapNilai = explode("$",$Data['Mhs']['NilaiProposal1']);
		$NilaiKetuaPenguji = 0;
		for ($i=0; $i < count($Bobot); $i++) { 
			$NilaiKetuaPenguji += $Bobot[$i]*(float)$RekapNilai[$i];
		}
		$RekapNilai = explode("$",$Data['Mhs']['NilaiProposal2']);
		$NilaiAnggotaPenguji = 0;
		for ($i=0; $i < count($Bobot); $i++) { 
			$NilaiAnggotaPenguji += $Bobot[$i]*(float)$RekapNilai[$i];
		}
		$RekapNilai = explode("$",$Data['Mhs']['NilaiProposal3']);
		$NilaiSekretaris = 0;
		for ($i=0; $i < count($Bobot); $i++) { 
			$NilaiSekretaris += $Bobot[$i]*(float)$RekapNilai[$i];
		}
		$NilaiProposal = (0.3*$NilaiKetuaPenguji)+(0.3*$NilaiAnggotaPenguji)+(0.4*$NilaiSekretaris);
		$Data['NilaiProposal'] = $NilaiProposal;
		$Bobot = array(2.5,2.5,2,2,2,2.5,2.5,2,2.5,2.5,2);
		$RekapNilai = explode("$",$Data['Mhs']['NilaiSkripsi1']);
		$NilaiKetuaPenguji = 0;
		for ($i=0; $i < count($Bobot); $i++) { 
			$NilaiKetuaPenguji += $Bobot[$i]*(float)$RekapNilai[$i];
		}
		$RekapNilai = explode("$",$Data['Mhs']['NilaiSkripsi2']);
		$NilaiAnggotaPenguji = 0;
		for ($i=0; $i < count($Bobot); $i++) { 
			$NilaiAnggotaPenguji += $Bobot[$i]*(float)$RekapNilai[$i];
		}
		$RekapNilai = explode("$",$Data['Mhs']['NilaiSkripsi3']);
		$NilaiSekretaris = 0;
		for ($i=0; $i < count($Bobot); $i++) { 
			$NilaiSekretaris += $Bobot[$i]*(float)$RekapNilai[$i];
		}
		$NilaiSkripsi = (0.3*$NilaiKetuaPenguji)+(0.3*$NilaiAnggotaPenguji)+(0.4*$NilaiSekretaris);
		$Data['NilaiSkripsi'] = $NilaiSkripsi;
		$Data['Nilai'] = number_format(((0.3*$NilaiProposal)+(0.7*$NilaiSkripsi)),2,",",".");
		if ($Data['Nilai'] >= 80) {
			$Data['Nilai'] .= ' (A)';
		} else if ($Data['Nilai'] > 75) {
			$Data['Nilai'] .= ' (B+)';
		} else if ($Data['Nilai'] > 70) {
			$Data['Nilai'] .= ' (B)';
		} else if ($Data['Nilai'] > 65) {
			$Data['Nilai'] .= ' (C+)';
		} else if ($Data['Nilai'] > 60) {
			$Data['Nilai'] .= ' (C)';
		} else if ($Data['Nilai'] > 55) {
			$Data['Nilai'] .= ' (D+)';
		} else if ($Data['Nilai'] > 50) {
			$Data['Nilai'] .= ' (D)';
		} else {
			$Data['Nilai'] .= ' (E)';
		}
		$this->load->view('ExcelUjianSkripsi',$Data);
	}

	public function PersetujuanUjianProposal($NIM){
		$this->load->library('Pdf');
		$Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa WHERE NIM = ".$NIM)->row_array();
		$Tanggal = explode("-",$Data['Mhs']['TanggalUjianProposal']);$Data['Tanggal'] = $Tanggal[2].' - '.$Tanggal[1].' - '.$Tanggal[0];
		$Data['Ketua'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal1'])->row_array()['QRCode'];
		$Data['Anggota'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal2'])->row_array()['QRCode'];
		$Data['NamaKetua'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal1'])->row_array()['Nama'];
		$Data['NamaAnggota'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal2'])->row_array()['Nama'];
		$Data['Sekretaris'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['NIPPembimbing'])->row_array()['QRCode'];
		$this->load->view('PersetujuanUjianProposal',$Data);
	}

	public function PersetujuanUjianSkripsi($NIM){
		$this->load->library('Pdf');
		$Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa WHERE NIM = ".$NIM)->row_array();
		$Tanggal = explode("-",$Data['Mhs']['TanggalUjianSkripsi']);$Data['Tanggal'] = $Tanggal[2].' - '.$Tanggal[1].' - '.$Tanggal[0];
		$Data['Ketua'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal1'])->row_array()['QRCode'];
		$Data['Anggota'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal2'])->row_array()['QRCode'];
		$Data['NamaKetua'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal1'])->row_array()['Nama'];
		$Data['NamaAnggota'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal2'])->row_array()['Nama'];
		$Data['Sekretaris'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['NIPPembimbing'])->row_array()['QRCode'];
		$this->load->view('PersetujuanUjianSkripsi',$Data);
	}
}
