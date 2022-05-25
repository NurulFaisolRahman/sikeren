<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('AkunAdmin') != 'Admin'){
			redirect(base_url());
		}
	}
 
  public function AkunDosen(){
		$Data['Halaman'] = 'Dosen';
		$Data['SubMenu'] = 'Dosen PNS';
		$Data['Kajur'] = $this->db->query('SELECT Dosen.NIP,Dosen.Nama,Akun.JenisAkun FROM Akun,Dosen WHERE Akun.NIP=Dosen.NIP')->result_array();
		$Data['Dosen'] = $this->db->get('Dosen')->result_array();
    $this->load->view('HeaderAdmin',$Data);
    $this->load->view('AkunDosen',$Data); 
	}
	
	public function KerjaSama(){
		$Data['Halaman'] = 'Prodi';
		$Data['SubMenu'] = 'Kerja Sama';
		$Data['KerjaSama'] = $this->db->query("SELECT * FROM KerjaSama")->result_array();
    $this->load->view('HeaderAdmin',$Data);
    $this->load->view('KerjaSama',$Data); 
  }

	public function InputKerjaSama(){
		if (count($_FILES) > 0) {
			if ($this->CekBukti($_FILES)){
				$NamaPdf = date('Ymd',time()).substr(password_hash('KerjaSama', PASSWORD_DEFAULT),7,7);
				$NamaPdf = str_replace("/","E",$NamaPdf);
				$NamaPdf = str_replace(".","F",$NamaPdf);
				move_uploaded_file($_FILES['BuktiKerjaSama']['tmp_name'], "KerjaSama/".$NamaPdf.".pdf");
				$BuktiKerjaSama = $NamaPdf.".pdf";
				$this->db->insert('KerjaSama',
									array('Mitra' => htmlentities($_POST['Mitra']), 
												'Homebase' => $_POST['Homebase'], 
												'Tingkat' => $_POST['Tingkat'], 
												'Bidang' => $_POST['Bidang'], 
												'Judul' => htmlentities($_POST['Judul']), 
												'Manfaat' => htmlentities($_POST['Manfaat']), 
												'Waktu' => htmlentities($_POST['Waktu']), 
												'Tahun' => $_POST['Tahun'], 
												'Expired' => $_POST['Expired'], 
												'KerjaSama' => htmlentities($_POST['KerjaSama']),
												'Bukti' => $BuktiKerjaSama));
				echo '1';
			} else {
				echo 'Upload Bukti Kerja Sama Hanya Boleh PDF!';
			}
		} else {
			echo 'Mohon Upload Bukti Kerja Sama Berupa PDF!';
		}
	}

	public function UpdateKerjaSama(){
		if ($this->CekBukti($_FILES)){
			$BuktiKerjaSama = $_POST['BuktiKerjaSamaLama'];
			if (isset($_FILES['BuktiKerjaSama'])) {
				if($BuktiKerjaSama != ''){
					unlink('KerjaSama/'.$BuktiKerjaSama);
				} 
				$NamaPdf = date('Ymd',time()).substr(password_hash('KerjaSama', PASSWORD_DEFAULT),7,7);
				$NamaPdf = str_replace("/","E",$NamaPdf);
				$NamaPdf = str_replace(".","F",$NamaPdf);
				move_uploaded_file($_FILES['BuktiKerjaSama']['tmp_name'], "KerjaSama/".$NamaPdf.".pdf");
				$BuktiKerjaSama = $NamaPdf.".pdf";
			}
			$this->db->where('Id', $_POST['Id']);
			$this->db->update('KerjaSama',
								array('Mitra' => htmlentities($_POST['Mitra']), 
											'Homebase' => $_POST['Homebase'],
											'Tingkat' => $_POST['Tingkat'], 
											'Bidang' => $_POST['Bidang'], 
											'Judul' => htmlentities($_POST['Judul']), 
											'Manfaat' => htmlentities($_POST['Manfaat']), 
											'Waktu' => htmlentities($_POST['Waktu']), 
											'Tahun' => $_POST['Tahun'], 
											'Expired' => $_POST['Expired'], 
											'KerjaSama' => htmlentities($_POST['KerjaSama']),
											'Bukti' => $BuktiKerjaSama));
			echo '1';
		} else {
			echo 'Upload Bukti Kerja Sama Hanya Boleh PDF!';
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

	public function HapusKerjaSama(){
		$this->db->delete('KerjaSama', array('Id' => $_POST['Id']));
		if ($this->db->affected_rows()){
			unlink('KerjaSama/'.$_POST['Bukti']);
			echo '1';
		} else {
			echo 'Gagal Menghapus';
		}
	}

	public function DosenPembimbing(){
		$Data['Halaman'] = 'Mahasiswa';
		$Data['SubMenu'] = 'Dosen Pembimbing';
		$Data['DosenPembimbing'] = $this->db->query("SELECT * FROM mahasiswa where StatusProposal = 'Diajukan'")->result_array();
    $this->load->view('HeaderAdmin',$Data);
    $this->load->view('DosenPembimbing',$Data); 
	}

	public function UjianProposal(){
		$Data['Halaman'] = 'Mahasiswa';
		$Data['SubMenu'] = 'Ujian Proposal';
		$Data['UjianProposal'] = $this->db->query("SELECT * FROM mahasiswa where StatusUjianProposal = 'Diajukan'")->result_array();
    $this->load->view('HeaderAdmin',$Data);
    $this->load->view('UjianProposalAdmin',$Data); 
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
	
	public function ValidasiUjianProposal(){
    $this->db->where('NIM', $_POST['NIM']);
		$this->db->update('mahasiswa',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menyimpnan Data!';
		}
	}

	public function MahasiswaBaru(){
		$Data['Halaman'] = 'Mahasiswa';
		$Data['SubMenu'] = 'Mahasiswa Baru';
		$Data['MahasiswaBaru'] = $this->db->query("SELECT * FROM MahasiswaBaru")->result_array();
    $this->load->view('HeaderAdmin',$Data);
    $this->load->view('MahasiswaBaru',$Data); 
	}

	public function InputMahasiswaBaru(){
		if($this->db->get_where('MahasiswaBaru', array('Homebase' => $_POST['Homebase'],'Tahun' => $_POST['Tahun']))->num_rows() === 0){
			$this->db->insert('MahasiswaBaru',$_POST);
			echo '1';
		} else {
			echo "Data Mahasiswa Baru Homebase ".$_POST['Homebase']." & Tahun ".$_POST['Tahun']." Sudah Ada!";
		}
	}

	public function UpdateMahasiswaBaru(){
		if($this->db->get_where('MahasiswaBaru', array('Homebase' => $_POST['Homebase'],'Tahun' => $_POST['Tahun']))->num_rows() === 0 || ($_POST['Homebase'] == $_POST['HomebaseLama'] && $_POST['Tahun'] == $_POST['TahunLama'])){
			$this->db->where('Homebase',$_POST['HomebaseLama']);
			$this->db->where('Tahun',$_POST['TahunLama']);
			unset($_POST['HomebaseLama']); unset($_POST['TahunLama']); 
			$this->db->update('MahasiswaBaru', $_POST);
			echo '1';
		} else {
			echo "Data Mahasiswa Baru Homebase ".$_POST['Homebase']." & Tahun ".$_POST['Tahun']." Sudah Ada!";
		}
	}
	
	public function HapusMahasiswaBaru(){
		$this->db->delete('MahasiswaBaru', array('Homebase' => $_POST['Homebase'],'Tahun' => $_POST['Tahun']));
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menghapus';
		}
	}

	public function MahasiswaAsing(){
		$Data['Halaman'] = 'Mahasiswa';
		$Data['SubMenu'] = 'Mahasiswa Asing';
		$Data['MahasiswaAsing'] = $this->db->query("SELECT * FROM MahasiswaAsing")->result_array();
    $this->load->view('HeaderAdmin',$Data);
    $this->load->view('MahasiswaAsing',$Data); 
	}

	public function InputMahasiswaAsing(){
		if($this->db->get_where('MahasiswaAsing', array('Homebase' => $_POST['Homebase'],'Tahun' => $_POST['Tahun']))->num_rows() === 0){
			$this->db->insert('MahasiswaAsing',$_POST);
			echo '1';
		} else {
			echo "Data Mahasiswa Asing Homebase ".$_POST['Homebase']." & Tahun ".$_POST['Tahun']." Sudah Ada!";
		}
	}

	public function UpdateMahasiswaAsing(){
		if($this->db->get_where('MahasiswaAsing', array('Homebase' => $_POST['Homebase'],'Tahun' => $_POST['Tahun']))->num_rows() === 0 || ($_POST['Homebase'] == $_POST['HomebaseLama'] && $_POST['Tahun'] == $_POST['TahunLama'])){
			$this->db->where('Homebase',$_POST['HomebaseLama']);
			$this->db->where('Tahun',$_POST['TahunLama']);
			unset($_POST['HomebaseLama']); unset($_POST['TahunLama']); 
			$this->db->update('MahasiswaAsing', $_POST);
			echo '1';
		} else {
			echo "Data Mahasiswa Asing Homebase ".$_POST['Homebase']." & Tahun ".$_POST['Tahun']." Sudah Ada!";
		}
	}
	
	public function HapusMahasiswaAsing(){
		$this->db->delete('MahasiswaAsing', array('Homebase' => $_POST['Homebase'],'Tahun' => $_POST['Tahun']));
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menghapus';
		}
	}

	public function PenggunaanDana(){
		$Data['Halaman'] = 'Prodi';
		$Data['SubMenu'] = 'Penggunaan Dana';
		$Data['PenggunaanDana'] = $this->db->query("SELECT * FROM PenggunaanDana")->result_array();
    $this->load->view('HeaderAdmin',$Data);
    $this->load->view('PenggunaanDana',$Data); 
	}

	public function InputPenggunaanDana(){
		if($this->db->get_where('PenggunaanDana', array('Homebase' => $_POST['Homebase'],'Tahun' => $_POST['Tahun']))->num_rows() === 0){
			$this->db->insert('PenggunaanDana',$_POST);
			echo '1';
		} else {
			echo "Data Penggunaan Dana Dengan Homebase ".$_POST['Homebase']." Dan Tahun ".$_POST['Tahun']." Sudah Ada!";
		}
	}
	
	public function UpdatePenggunaanDana(){
		if($this->db->get_where('PenggunaanDana', array('Homebase' => $_POST['Homebase'],'Tahun' => $_POST['Tahun']))->num_rows() === 0 || ($_POST['Homebase'] == $_POST['HomebaseLama'] && $_POST['Tahun'] == $_POST['TahunLama'])){
			$this->db->where('Homebase',$_POST['HomebaseLama']);
			$this->db->where('Tahun',$_POST['TahunLama']);
			unset($_POST['HomebaseLama']); unset($_POST['TahunLama']); 
			$this->db->update('PenggunaanDana', $_POST);
			echo '1';
		} else {
			echo "Data Penggunaan Dana Dengan Homebase ".$_POST['Homebase']." Dan Tahun ".$_POST['Tahun']." Sudah Ada!";
		}
	}
	
	public function HapusPenggunaanDana(){
		$this->db->delete('PenggunaanDana', array('Homebase' => $_POST['Homebase'],'Tahun' => $_POST['Tahun']));
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menghapus';
		}
	}

	public function PenelitianDosenMhs(){
		$Data['Halaman'] = 'Dosen';
		$Data['SubMenu'] = 'Penelitian';
		$Data['PenelitianDosenMhs'] = $this->db->get("PenelitianDosenMhs")->result_array();
    $this->load->view('HeaderAdmin',$Data);
    $this->load->view('PenelitianDosenMhs',$Data); 
	}

	public function InputPenelitianDosenMhs(){
		if (count($_FILES) > 0) {
			if ($this->CekBukti($_FILES)){
				$NamaPdf = date('Ymd',time()).substr(password_hash('PenelitianDosenMhs', PASSWORD_DEFAULT),7,7);
				$NamaPdf = str_replace("/","E",$NamaPdf);
				$NamaPdf = str_replace(".","F",$NamaPdf);
				move_uploaded_file($_FILES['Bukti']['tmp_name'], "PenelitianDosenMhs/".$NamaPdf.".pdf");
				$_POST['Bukti'] = $NamaPdf.".pdf";
				$this->db->insert('PenelitianDosenMhs',$_POST);
				if ($this->db->affected_rows()){
					echo '1';
				} else {
					echo 'Gagal Input Data!';
				}
			} else {
				echo 'Upload Bukti Hanya Boleh PDF!';
			}
		} else {
			echo 'Mohon Upload Bukti Berupa PDF!';
		}
	}

	public function UpdatePenelitianDosenMhs(){
		if ($this->CekBukti($_FILES)){
			$Bukti = $_POST['BuktiLama'];
			if (isset($_FILES['Bukti'])) {
				if($Bukti != ''){
					unlink('PenelitianDosenMhs/'.$Bukti);
				} 
				$NamaPdf = date('Ymd',time()).substr(password_hash('PenelitianDosenMhs', PASSWORD_DEFAULT),7,7);
				$NamaPdf = str_replace("/","E",$NamaPdf);
				$NamaPdf = str_replace(".","F",$NamaPdf);
				move_uploaded_file($_FILES['Bukti']['tmp_name'], "PenelitianDosenMhs/".$NamaPdf.".pdf");
				$Bukti = $NamaPdf.".pdf";
			}
			$this->db->where('Id',$_POST['Id']);
			unset($_POST['Id']); 
			unset($_POST['BuktiLama']); 
			$_POST['Bukti'] = $Bukti;
			$this->db->update('PenelitianDosenMhs', $_POST);
			echo '1';
		} else {
			echo 'Upload Bukti Hanya Boleh PDF!';
		}
	}

	public function HapusPenelitianDosenMhs(){
		$this->db->delete('PenelitianDosenMhs', array('Id' => $_POST['Id']));
		if ($this->db->affected_rows()){
			unlink('PenelitianDosenMhs/'.$_POST['Bukti']);
			echo '1';
		} else {
			echo 'Gagal Menghapus';
		}
	}

	public function PkMDosenMhs(){
		$Data['Halaman'] = 'Dosen';
		$Data['SubMenu'] = 'Pengabdian';
		$Data['PkMDosenMhs'] = $this->db->get("PkMDosenMhs")->result_array();
    $this->load->view('HeaderAdmin',$Data);
    $this->load->view('PkMDosenMhs',$Data); 
	}

	public function InputPkMDosenMhs(){
		if (count($_FILES) > 0) {
			if ($this->CekBukti($_FILES)){
				$NamaPdf = date('Ymd',time()).substr(password_hash('PkMDosenMhs', PASSWORD_DEFAULT),7,7);
				$NamaPdf = str_replace("/","E",$NamaPdf);
				$NamaPdf = str_replace(".","F",$NamaPdf);
				move_uploaded_file($_FILES['Bukti']['tmp_name'], "PkMDosenMhs/".$NamaPdf.".pdf");
				$_POST['Bukti'] = $NamaPdf.".pdf";
				$this->db->insert('PkMDosenMhs',$_POST);
				if ($this->db->affected_rows()){
					echo '1';
				} else {
					echo 'Gagal Input Data!';
				}
			} else {
				echo 'Upload Bukti Hanya Boleh PDF!';
			}
		} else {
			echo 'Mohon Upload Bukti Berupa PDF!';
		}
	}

	public function UpdatePkMDosenMhs(){
		if ($this->CekBukti($_FILES)){
			$Bukti = $_POST['BuktiLama'];
			if (isset($_FILES['Bukti'])) {
				if($Bukti != ''){
					unlink('PkMDosenMhs/'.$Bukti);
				} 
				$NamaPdf = date('Ymd',time()).substr(password_hash('PkMDosenMhs', PASSWORD_DEFAULT),7,7);
				$NamaPdf = str_replace("/","E",$NamaPdf);
				$NamaPdf = str_replace(".","F",$NamaPdf);
				move_uploaded_file($_FILES['Bukti']['tmp_name'], "PkMDosenMhs/".$NamaPdf.".pdf");
				$Bukti = $NamaPdf.".pdf";
			}
			$this->db->where('Id',$_POST['Id']);
			unset($_POST['Id']); 
			unset($_POST['BuktiLama']); 
			$_POST['Bukti'] = $Bukti;
			$this->db->update('PkMDosenMhs', $_POST);
			echo '1';
		} else {
			echo 'Upload Bukti Hanya Boleh PDF!';
		}
	}

	public function HapusPkMDosenMhs(){
		$this->db->delete('PkMDosenMhs', array('Id' => $_POST['Id']));
		if ($this->db->affected_rows()){
			unlink('PkMDosenMhs/'.$_POST['Bukti']);
			echo '1';
		} else {
			echo 'Gagal Menghapus';
		}
	}

	public function RujukanTesis(){
		$Data['Halaman'] = 'Dosen';
		$Data['SubMenu'] = 'Rujukan Tesis';
		$Data['RujukanTesis'] = $this->db->get("RujukanTesis")->result_array();
    $this->load->view('HeaderAdmin',$Data);
    $this->load->view('RujukanTesis',$Data); 
	}

	public function InputRujukanTesis(){
		if (count($_FILES) > 0) {
			if ($this->CekBukti($_FILES)){
				$NamaPdf = date('Ymd',time()).substr(password_hash('RujukanTesis', PASSWORD_DEFAULT),7,7);
				$NamaPdf = str_replace("/","E",$NamaPdf);
				$NamaPdf = str_replace(".","F",$NamaPdf);
				move_uploaded_file($_FILES['Bukti']['tmp_name'], "RujukanTesis/".$NamaPdf.".pdf");
				$_POST['Bukti'] = $NamaPdf.".pdf";
				$this->db->insert('RujukanTesis',$_POST);
				if ($this->db->affected_rows()){
					echo '1';
				} else {
					echo 'Gagal Input Data!';
				}
			} else {
				echo 'Upload Bukti Hanya Boleh PDF!';
			}
		} else {
			echo 'Mohon Upload Bukti Berupa PDF!';
		}
	}

	public function UpdateRujukanTesis(){
		if ($this->CekBukti($_FILES)){
			$Bukti = $_POST['BuktiLama'];
			if (isset($_FILES['Bukti'])) {
				if($Bukti != ''){
					unlink('RujukanTesis/'.$Bukti);
				} 
				$NamaPdf = date('Ymd',time()).substr(password_hash('RujukanTesis', PASSWORD_DEFAULT),7,7);
				$NamaPdf = str_replace("/","E",$NamaPdf);
				$NamaPdf = str_replace(".","F",$NamaPdf);
				move_uploaded_file($_FILES['Bukti']['tmp_name'], "RujukanTesis/".$NamaPdf.".pdf");
				$Bukti = $NamaPdf.".pdf";
			}
			$this->db->where('Id',$_POST['Id']);
			unset($_POST['Id']); 
			unset($_POST['BuktiLama']); 
			$_POST['Bukti'] = $Bukti;
			$this->db->update('RujukanTesis', $_POST);
			echo '1';
		} else {
			echo 'Upload Bukti Hanya Boleh PDF!';
		}
	}

	public function HapusRujukanTesis(){
		$this->db->delete('RujukanTesis', array('Id' => $_POST['Id']));
		if ($this->db->affected_rows()){
			unlink('RujukanTesis/'.$_POST['Bukti']);
			echo '1';
		} else {
			echo 'Gagal Menghapus';
		}
	}

	public function Integrasi(){
		$Data['Halaman'] = 'Dosen';
		$Data['SubMenu'] = 'Integrasi';
		$Data['Integrasi'] = $this->db->get("Integrasi")->result_array();
    $this->load->view('HeaderAdmin',$Data);
    $this->load->view('Integrasi',$Data); 
	}

	public function InputIntegrasi(){
		if (count($_FILES) > 0) {
			if ($this->CekBukti($_FILES)){
				$NamaPdf = date('Ymd',time()).substr(password_hash('Integrasi', PASSWORD_DEFAULT),7,7);
				$NamaPdf = str_replace("/","E",$NamaPdf);
				$NamaPdf = str_replace(".","F",$NamaPdf);
				move_uploaded_file($_FILES['Bukti']['tmp_name'], "Integrasi/".$NamaPdf.".pdf");
				$_POST['Bukti'] = $NamaPdf.".pdf";
				$this->db->insert('Integrasi',$_POST);
				if ($this->db->affected_rows()){
					echo '1';
				} else {
					echo 'Gagal Input Data!';
				}
			} else {
				echo 'Upload Bukti Hanya Boleh PDF!';
			}
		} else {
			echo 'Mohon Upload Bukti Berupa PDF!';
		}
	}

	public function UpdateIntegrasi(){
		if ($this->CekBukti($_FILES)){
			$Bukti = $_POST['BuktiLama'];
			if (isset($_FILES['Bukti'])) {
				if($Bukti != ''){
					unlink('Integrasi/'.$Bukti);
				} 
				$NamaPdf = date('Ymd',time()).substr(password_hash('Integrasi', PASSWORD_DEFAULT),7,7);
				$NamaPdf = str_replace("/","E",$NamaPdf);
				$NamaPdf = str_replace(".","F",$NamaPdf);
				move_uploaded_file($_FILES['Bukti']['tmp_name'], "Integrasi/".$NamaPdf.".pdf");
				$Bukti = $NamaPdf.".pdf";
			}
			$this->db->where('Id',$_POST['Id']);
			unset($_POST['Id']); 
			unset($_POST['BuktiLama']); 
			$_POST['Bukti'] = $Bukti;
			$this->db->update('Integrasi', $_POST);
			echo '1';
		} else {
			echo 'Upload Bukti Hanya Boleh PDF!';
		}
	}

	public function HapusIntegrasi(){
		$this->db->delete('Integrasi', array('Id' => $_POST['Id']));
		if ($this->db->affected_rows()){
			unlink('Integrasi/'.$_POST['Bukti']);
			echo '1';
		} else {
			echo 'Gagal Menghapus';
		}
	}

	public function SitasiDTPS(){
		$Data['Halaman'] = 'Dosen';
		$Data['SubMenu'] = 'Sitasi Dosen';
		$Data['SitasiDTPS'] = $this->db->get("SitasiDTPS")->result_array();
    $this->load->view('HeaderAdmin',$Data);
    $this->load->view('SitasiDTPS',$Data); 
	}

	public function InputSitasiDTPS(){
		$this->db->insert('SitasiDTPS',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Input Data!';
		}
	}

	public function UpdateSitasiDTPS(){
		$this->db->where('Id',$_POST['Id']);
		$this->db->update('SitasiDTPS', $_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Update Data!';
		}
	}

	public function HapusSitasiDTPS(){
		$this->db->delete('SitasiDTPS', array('Id' => $_POST['Id']));
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menghapus';
		}
	}

	public function InfoAkademik(){
		$Data['Halaman'] = 'Prodi';
		$Data['SubMenu'] = 'Info Akademik';
		$Data['InfoAkademik'] = $this->db->get("InfoAkademik")->result_array();
    $this->load->view('HeaderAdmin',$Data);
    $this->load->view('InfoAkademik',$Data); 
	}

	public function InputInfoAkademik(){
		if($this->db->get_where('InfoAkademik', array('Homebase' => $_POST['Homebase'],'Tahun' => $_POST['Tahun']))->num_rows() === 0){
			$this->db->insert('InfoAkademik',$_POST);
			echo '1';
		} else {
			echo "Data Info Akademik Homebase ".$_POST['Homebase']." & Tahun ".$_POST['Tahun']." Sudah Ada!";
		}
	}

	public function UpdateInfoAkademik(){
		if($this->db->get_where('InfoAkademik', array('Homebase' => $_POST['Homebase'],'Tahun' => $_POST['Tahun']))->num_rows() === 0 || ($_POST['Homebase'] == $_POST['HomebaseLama'] && $_POST['Tahun'] == $_POST['TahunLama'])){
			$this->db->where('Homebase',$_POST['HomebaseLama']);
			$this->db->where('Tahun',$_POST['TahunLama']);
			unset($_POST['HomebaseLama']); unset($_POST['TahunLama']); 
			$this->db->update('InfoAkademik', $_POST);
			echo '1';
		} else {
			echo "Data Info Akademik Homebase ".$_POST['Homebase']." & Tahun ".$_POST['Tahun']." Sudah Ada!";
		}
	}

	public function HapusInfoAkademik(){
		$this->db->delete('InfoAkademik', array('Homebase' => $_POST['Homebase'],'Tahun' => $_POST['Tahun']));
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menghapus';
		}
	}
	
	public function Kurikulum(){
		$Data['Halaman'] = 'Prodi';
		$Data['SubMenu'] = 'Kurikulum';
		$Data['Kurikulum'] = $this->db->get("Kurikulum")->result_array();
    $this->load->view('HeaderAdmin',$Data);
    $this->load->view('Kurikulum',$Data); 
	}

	public function InputKurikulum(){
		if (count($_FILES) > 0) {
			if ($this->CekBukti($_FILES)){
				$NamaPdf = date('Ymd',time()).substr(password_hash('Kurikulum', PASSWORD_DEFAULT),7,7);
				$NamaPdf = str_replace("/","E",$NamaPdf);
				$NamaPdf = str_replace(".","F",$NamaPdf);
				move_uploaded_file($_FILES['Bukti']['tmp_name'], "Kurikulum/".$NamaPdf.".pdf");
				$_POST['Bukti'] = $NamaPdf.".pdf";
				$this->db->insert('Kurikulum',$_POST);
				if ($this->db->affected_rows()){
					echo '1';
				} else {
					echo 'Gagal Input Data!';
				}
			} else {
				echo 'Upload Bukti Hanya Boleh PDF!';
			}
		} else {
			echo 'Mohon Upload Bukti Berupa PDF!';
		}
	}

	public function UpdateKurikulum(){
		if ($this->CekBukti($_FILES)){
			$Bukti = $_POST['BuktiLama'];
			if (isset($_FILES['Bukti'])) {
				if($Bukti != ''){
					unlink('Kurikulum/'.$Bukti);
				} 
				$NamaPdf = date('Ymd',time()).substr(password_hash('Kurikulum', PASSWORD_DEFAULT),7,7);
				$NamaPdf = str_replace("/","E",$NamaPdf);
				$NamaPdf = str_replace(".","F",$NamaPdf);
				move_uploaded_file($_FILES['Bukti']['tmp_name'], "Kurikulum/".$NamaPdf.".pdf");
				$Bukti = $NamaPdf.".pdf";
			}
			$this->db->where('Id',$_POST['Id']);
			unset($_POST['Id']); 
			unset($_POST['BuktiLama']); 
			$_POST['Bukti'] = $Bukti;
			$this->db->update('Kurikulum', $_POST);
			echo '1';
		} else {
			echo 'Upload Bukti Hanya Boleh PDF!';
		}
	}

	public function HapusKurikulum(){
		$this->db->delete('Kurikulum', array('Id' => $_POST['Id']));
		if ($this->db->affected_rows()){
			unlink('Kurikulum/'.$_POST['Bukti']);
			echo '1';
		} else {
			echo 'Gagal Menghapus';
		}
	}

	public function RPS(){
		$Data['Halaman'] = 'Prodi';
		$Data['SubMenu'] = 'RPS';
		$Data['RPS'] = $this->db->query('SELECT Homebase,KodeMK,NamaMK,Semester FROM `rps`')->result_array();
    $this->load->view('HeaderAdmin',$Data);
		$this->load->view('RPS',$Data);
	}

	public function InputRPS(){
		if($this->db->get_where('rps', array('KodeMK' => $_POST['KodeMK']))->num_rows() === 0){
			$this->db->insert('rps',$_POST);
			if ($this->db->affected_rows()){
				echo '1';
			} else {
				echo 'Gagal Input Data RPS!'; 
			}
		} else {
			echo 'Mata Kuliah Dengan Kode '.$_POST['KodeMK'].' Sudah Ada!'; 
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

	public function HapusRPS(){
		$this->db->delete('rps', array('KodeMK' => $_POST['KodeMK']));
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menghapus!';
		}
	}

	public function GetRPS($KodeMK){
    echo json_encode($this->db->get_where('rps', array('KodeMK' => $KodeMK))->row_array());
	}
	
	public function IPKLulusan(){
		$Data['Halaman'] = 'Mahasiswa';
		$Data['SubMenu'] = 'IPK Lulusan';
		$Data['IPKLulusan'] = $this->db->get("IPKLulusan")->result_array();
    $this->load->view('HeaderAdmin',$Data);
    $this->load->view('IPKLulusan',$Data); 
	}

	public function InputIPKLulusan(){
		if($this->db->get_where('IPKLulusan', array('Homebase' => $_POST['Homebase'],'Tahun' => $_POST['Tahun']))->num_rows() === 0){
			$this->db->insert('IPKLulusan',$_POST);
			echo '1';
		} else {
			echo "Data IPK Lulusan Dengan Homebase ".$_POST['Homebase']." Dan Tahun ".$_POST['Tahun']." Sudah Ada!";
		}
	}
	
	public function UpdateIPKLulusan(){
		if($this->db->get_where('IPKLulusan', array('Homebase' => $_POST['Homebase'],'Tahun' => $_POST['Tahun']))->num_rows() === 0 || ($_POST['Homebase'] == $_POST['HomebaseLama'] && $_POST['Tahun'] == $_POST['TahunLama'])){
			$this->db->where('Homebase',$_POST['HomebaseLama']);
			$this->db->where('Tahun',$_POST['TahunLama']);
			unset($_POST['HomebaseLama']); unset($_POST['TahunLama']); 
			$this->db->update('IPKLulusan', $_POST);
			echo '1';
		} else {
			echo "Data IPK Lulusan Dengan Homebase ".$_POST['Homebase']." Dan Tahun ".$_POST['Tahun']." Sudah Ada!";
		}
	}
	
	public function HapusIPKLulusan(){
		$this->db->delete('IPKLulusan', array('Homebase' => $_POST['Homebase'],'Tahun' => $_POST['Tahun']));
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menghapus';
		}
	}
	
	public function DosenKontrak(){
		$Data['Halaman'] = 'Dosen';
		$Data['SubMenu'] = 'Dosen Kontrak';
		$Data['DosenKontrak'] = $this->db->query("SELECT * FROM DosenKontrak")->result_array();
    $this->load->view('HeaderAdmin',$Data);
    $this->load->view('DosenKontrak',$Data); 
	}

	public function InputDosenKontrak(){
		if($this->db->get_where('DosenKontrak', array('NIDN' => $_POST['NIDN']))->num_rows() === 0){
			if (count($_FILES) > 0) {
				if ($this->CekBukti($_FILES)){
					$NamaPdf = date('Ymd',time()).substr(password_hash('DosenKontrak', PASSWORD_DEFAULT),7,7);
					$NamaPdf = str_replace("/","E",$NamaPdf);
					$NamaPdf = str_replace(".","F",$NamaPdf);
					move_uploaded_file($_FILES['BuktiSertifikat']['tmp_name'], "DosenKontrak/".$NamaPdf.".pdf");
					$_POST['Bukti'] = $NamaPdf.".pdf";
					$this->db->insert('DosenKontrak',$_POST);
					echo '1';
				} else {
					echo 'Upload Bukti Sertifikat Hanya Boleh PDF!';
				}
			} else {
				echo 'Mohon Upload Bukti Sertifikat Berupa PDF!';
			}
		} else {
			echo "Data Dosen Kontrak Dengan NIDN ".$_POST['NIDN']." Sudah Ada!";
		}
	}

	public function UpdateDosenKontrak(){
		if($this->db->get_where('DosenKontrak', array('NIDN' => $_POST['NIDN']))->num_rows() === 0 || ($_POST['NIDN'] == $_POST['NIDNLama'])){
			if ($this->CekBukti($_FILES)){
				$BuktiSertifikat = $_POST['BuktiSertifikatLama'];
				if (isset($_FILES['BuktiSertifikat'])) {
					if($BuktiSertifikat != ''){
						unlink('DosenKontrak/'.$BuktiSertifikat);
					} 
					$NamaPdf = date('Ymd',time()).substr(password_hash('DosenKontrak', PASSWORD_DEFAULT),7,7);
					$NamaPdf = str_replace("/","E",$NamaPdf);
					$NamaPdf = str_replace(".","F",$NamaPdf);
					move_uploaded_file($_FILES['BuktiSertifikat']['tmp_name'], "DosenKontrak/".$NamaPdf.".pdf");
					$BuktiSertifikat = $NamaPdf.".pdf";
				}
				$this->db->where('NIDN',$_POST['NIDNLama']);
				unset($_POST['NIDNLama']); 
				unset($_POST['BuktiSertifikat']); 
				unset($_POST['BuktiSertifikatLama']); 
				$_POST['Bukti'] = $BuktiSertifikat;
				$this->db->update('DosenKontrak', $_POST);
				echo '1';
			} else {
				echo 'Upload Bukti Sertifikat Hanya Boleh PDF!';
			}
		} else {
			echo "Data Dosen Kontrak Dengan NIDN ".$_POST['NIDN']." Sudah Ada!";
		}
	}

	public function HapusDosenKontrak(){
		$this->db->delete('DosenKontrak', array('NIDN' => $_POST['NIDN']));
		if ($this->db->affected_rows()){
			unlink('DosenKontrak/'.$_POST['Bukti']);
			echo '1';
		} else {
			echo 'Gagal Menghapus';
		}
	}

	public function PrestasiMhs(){
		$Data['Halaman'] = 'Mahasiswa';
		$Data['SubMenu'] = 'Prestasi Mahasiswa';
		$Data['PrestasiMhs'] = $this->db->query("SELECT * FROM PrestasiMahasiswa")->result_array();
    $this->load->view('HeaderAdmin',$Data);
    $this->load->view('PrestasiMhs',$Data); 
	}

	public function Daftar(){
		if($this->db->get_where('Dosen', array('NIP' => $_POST['NIP']))->num_rows() === 0){
			$this->db->insert('Dosen',array('Homebase' => $_POST['Homebase'], 
																			'NIP' => $_POST['NIP'], 
																			'KreditLama' => 0,
																			'Semester' => 'Ganjil', 
																			'Tahun' => 0, 
																			'Rektor' => 'Dr. Drs. Ec. H. Muh. Syarif M.Si|1963113020011210012',
																			'KetuaPAK' => 'Ir. Muhammad Fakhry MP.|196208141988031003',
																			'Dekan' => 'Dr. H. Pribanus Wantara M.M|196012031988111001',
																			'WakilDekan' => 'Dr. Mohtar Rasyid S.E., M.Sc|197604152003121001|Penata/IIIc|Lektor',
																			'Nama' => htmlentities($_POST['Nama'])));
			$this->db->insert('Akun',array('NIP' => $_POST['NIP'],'Password' => password_hash($_POST['NIP'], PASSWORD_DEFAULT),'JenisAkun' => '1'));
			echo '1';
		} else{
			echo "Akun Dosen Dengan NIP ".$_POST['NIP']." Sudah Ada!";
		}
	}

	public function Kajur(){
		$this->db->where('JenisAkun', 2);
		$this->db->update('Akun',array('JenisAkun' => 1));
		$this->db->where('NIP', $_POST['NIP']);
		$this->db->update('Akun',array('JenisAkun' => 2));
	}

	public function DTPS(){
		$DTPS = $this->db->query("SELECT BuktiPendidik,BuktiKompetensi FROM Dosen")->result_array();
		echo json_encode($DTPS);
	}

	public function LampiranKerjaSama(){
		$Bidang = $this->uri->segment('3');
		$KerjaSama = $this->db->get_where('KerjaSama', array('Bidang' => $Bidang))->result_array();
		echo json_encode($KerjaSama);
	}
	
	public function Borang(){
		$TS = $this->uri->segment('3');
		$Homebase = $this->uri->segment('4'); 
		$Data['Homebase'] = $Homebase;
		$Data['Tahun'] = $TS;
		$Data['IPKLulusan'] = array();
		for ($i=($TS-2); $i <= $TS; $i++) { 
			$IPKLulusan = $this->db->query("SELECT * FROM IPKLulusan WHERE Homebase = '".$Homebase."' AND Tahun = ".$i)->row_array();	
			$IPKLulusan == '' ? array_push($Data['IPKLulusan'],array(0,0,0,0)) : array_push($Data['IPKLulusan'],array($IPKLulusan['JumlahLulusan'],$IPKLulusan['Min'],$IPKLulusan['Average'],$IPKLulusan['Max']));
		}
		$Data['PenggunaanDana'] = array(array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),
																		array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),
																		array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),
																		array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),
																		array(0,0,0,0,0,0,0,0)); 
		$x = 0; $y = 4;
		for ($i=($TS-2); $i <= $TS; $i++) { 
			$Dana = $this->db->query("SELECT * FROM PenggunaanDana WHERE Homebase = '".$Homebase."' AND Tahun = ".$i)->result_array();	
			if (count($Dana) == 1) {
				$Pisah = explode("/",$Dana[0]['Dosen']);
				$Data['PenggunaanDana'][0][$x] = $Pisah[0];
				$Data['PenggunaanDana'][0][$y] = $Pisah[1];
				$Pisah = explode("/",$Dana[0]['TenagaKependidikan']);
				$Data['PenggunaanDana'][1][$x] = $Pisah[0];
				$Data['PenggunaanDana'][1][$y] = $Pisah[1];
				$Pisah = explode("/",$Dana[0]['OperasionalPembelajaran']);
				$Data['PenggunaanDana'][2][$x] = $Pisah[0];
				$Data['PenggunaanDana'][2][$y] = $Pisah[1];
				$Pisah = explode("/",$Dana[0]['OperasionalTidakLangsung']);
				$Data['PenggunaanDana'][3][$x] = $Pisah[0];
				$Data['PenggunaanDana'][3][$y] = $Pisah[1];
				$Pisah = explode("/",$Dana[0]['OperasionalKemahasiswaan']);
				$Data['PenggunaanDana'][4][$x] = $Pisah[0];
				$Data['PenggunaanDana'][4][$y] = $Pisah[1];
				$Pisah = explode("/",$Dana[0]['Penelitian']);
				$Data['PenggunaanDana'][6][$x] = $Pisah[0];
				$Data['PenggunaanDana'][6][$y] = $Pisah[1];
				$Pisah = explode("/",$Dana[0]['PkM']);
				$Data['PenggunaanDana'][7][$x] = $Pisah[0];
				$Data['PenggunaanDana'][7][$y] = $Pisah[1];
				$Pisah = explode("/",$Dana[0]['SDM']);
				$Data['PenggunaanDana'][9][$x] = $Pisah[0];
				$Data['PenggunaanDana'][9][$y] = $Pisah[1];
				$Pisah = explode("/",$Dana[0]['Sarana']);
				$Data['PenggunaanDana'][10][$x] = $Pisah[0];
				$Data['PenggunaanDana'][10][$y] = $Pisah[1];
				$Pisah = explode("/",$Dana[0]['Prasarana']);
				$Data['PenggunaanDana'][11][$x] = $Pisah[0];
				$Data['PenggunaanDana'][11][$y] = $Pisah[1];
			}
			$x+=1;$y+=1;
		}
		$Data['KerjaSamaPendidikan'] = $this->db->query("SELECT * FROM `KerjaSama` WHERE Bidang='Pendidikan' AND Homebase="."'".$Homebase."'"." AND Tahun <= ".$TS." AND Tahun > ".($TS-3))->result_array(); 
		$Data['KerjaSamaPenelitian'] = $this->db->query("SELECT * FROM `KerjaSama` WHERE Bidang='Penelitian' AND Homebase="."'".$Homebase."'"." AND Tahun <= ".$TS." AND Tahun > ".($TS-3))->result_array(); 
		$Data['KerjaSamaPengabdian'] = $this->db->query("SELECT * FROM `KerjaSama` WHERE Bidang='Pengabdian' AND Homebase="."'".$Homebase."'"." AND Tahun <= ".$TS." AND Tahun > ".($TS-3))->result_array(); 
		$Data['MahasiswaBaru'] = array(); 
		for ($i = $TS; $i > ($TS-5); $i--) { 
			$Tampung = $this->db->query("SELECT * FROM MahasiswaBaru WHERE Homebase = '".$Homebase."' AND Tahun = ".$i)->row_array();		
			$Tampung == '' ? array_push($Data['MahasiswaBaru'],array(0,0,0,0,0,0,0)) : array_push($Data['MahasiswaBaru'],array($Tampung['DayaTampung'],$Tampung['MhsPendaftar'],$Tampung['MhsLulus'],$Tampung['MhsBaruReguler'],$Tampung['MhsBaruTransfer'],$Tampung['MhsAktifReguler'],$Tampung['MhsAktifTransfer']));
		}
		$Data['HomebaseMahasiswaAsing'] = $Homebase == 'S1' ? 'S1 Ekonomi Pembangunan' : 'S2 Ilmu Ekonomi'; 
		$Data['MahasiswaAsing'] = array(); 
		for ($i = ($TS-2); $i <= $TS; $i++) { 
			$Tampung = $this->db->query("SELECT * FROM MahasiswaAsing WHERE Homebase = '".$Data['HomebaseMahasiswaAsing']."' AND Tahun = ".$i)->row_array();		
			$Tampung == '' ? array_push($Data['MahasiswaAsing'],array(0,0,0)) : array_push($Data['MahasiswaAsing'],array($Tampung['MhsAktif'],$Tampung['MhsFull'],$Tampung['MhsPart']));
		}
		$Data['MhsLulus'] = array(); 
		for ($i = ($TS-4); $i < ($TS-1); $i++) { 
			$Tampung = $this->db->query("SELECT * FROM InfoAkademik WHERE Homebase = '".$Homebase."' AND Tahun = ".$i)->row_array();		
			$Tampung == '' ? array_push($Data['MhsLulus'],0) : array_push($Data['MhsLulus'],array_sum(explode("$",$Tampung['MhsLulus'])));
		}
		$Data['MhsDiterima'] = array(); 
		$Data['MhsLulusan'] = array(); 
		$Data['RataStudi'] = array(); 
		$Homebase == 'S1' ? $Ts = $TS-6 : $Ts = $TS-3;
		$Homebase == 'S1' ? $tS = $TS-2 : $tS = $TS;
		for ($i = $Ts; $i < $tS; $i++) { 
			$Tampung = $this->db->query("SELECT * FROM InfoAkademik WHERE Homebase = '".$Homebase."' AND Tahun = ".$i)->row_array();		
			$Tampung == '' ? array_push($Data['MhsDiterima'],0) : array_push($Data['MhsDiterima'],$Tampung['MhsMasuk']);
		}
		for ($i = $Ts; $i < $tS; $i++) { 
			$Tampung = $this->db->query("SELECT * FROM InfoAkademik WHERE Homebase = '".$Homebase."' AND Tahun = ".$i)->row_array();		
			$Tampung == '' ? array_push($Data['RataStudi'],0) : array_push($Data['RataStudi'],$Tampung['MasaStudi']);
		}
		for ($i = $Ts; $i < $tS; $i++) { 
			$Tampung = $this->db->query("SELECT * FROM InfoAkademik WHERE Homebase = '".$Homebase."' AND Tahun = ".$i)->row_array();		
			$Tampung == '' ? array_push($Data['MhsLulusan'],array(0,0,0,0)) : array_push($Data['MhsLulusan'],explode("$",$Tampung['MhsLulus']));
		}
		$KepuasanMhs = $this->db->query("SELECT * FROM KepuasanMahasiswa WHERE Homebase = '".$Homebase."' AND Tahun = ".$TS)->result_array();
		$Data['KepuasanMhs'] = array(array(0,0,0,0),array(0,0,0,0),array(0,0,0,0),array(0,0,0,0),array(0,0,0,0),array(0,0,0,0)); 
		count($KepuasanMhs) > 0 ? $Data['KepuasanMhs'][5][0] = count($KepuasanMhs) : $Data['KepuasanMhs'][5][0] = 1;
		for ($i=0; $i < count($KepuasanMhs); $i++) { 
			$Pisah = explode("|",$KepuasanMhs[$i]['Poin']);
			$Data['KepuasanMhs'][0][$Pisah[0]-1] += 1;
			$Data['KepuasanMhs'][1][$Pisah[1]-1] += 1;
			$Data['KepuasanMhs'][2][$Pisah[2]-1] += 1;
			$Data['KepuasanMhs'][3][$Pisah[3]-1] += 1;
			$Data['KepuasanMhs'][4][$Pisah[4]-1] += 1;
		}
		$Data['JumlahTanggapan'] = array(); 
		for ($i = ($TS-4); $i < ($TS-1); $i++) { 
			$Tampung = $this->db->query("SELECT * FROM PenggunaLulusan WHERE Homebase = '".$Homebase."' AND Tahun = ".$i)->result_array();		
			$Tampung == '' ? array_push($Data['JumlahTanggapan'],0) : array_push($Data['JumlahTanggapan'],count($Tampung));
		}
		$Data['TungguKerja'] = array(); 
		$Data['BidangKerja'] = array(); 
		$Data['TingkatKerja'] = array(); 
		for ($i = ($TS-4); $i < ($TS-1); $i++) { 
			$Tampung = array();
			for ($j=1; $j <= 3; $j++) { 
				array_push($Tampung,count($this->db->query("SELECT * FROM Alumni WHERE Homebase = '".$Homebase."' AND Tahun = ".$i." AND TungguKerja = ".$j)->result_array()));		
			}
			array_push($Tampung,array_sum($Tampung));
			array_push($Data['TungguKerja'],$Tampung);
			$Tampung = array();
			for ($j=1; $j <= 3; $j++) { 
				array_push($Tampung,count($this->db->query("SELECT * FROM Alumni WHERE Homebase = '".$Homebase."' AND Tahun = ".$i." AND BidangKerja = ".$j)->result_array()));		
			}
			array_push($Tampung,array_sum($Tampung));
			array_push($Data['BidangKerja'],$Tampung);
			$Tampung = array();
			for ($j=1; $j <= 3; $j++) { 
				array_push($Tampung,count($this->db->query("SELECT * FROM Alumni WHERE Homebase = '".$Homebase."' AND Tahun = ".$i." AND TingkatKerja = ".$j)->result_array()));		
			}
			array_push($Tampung,array_sum($Tampung));
			array_push($Data['TingkatKerja'],$Tampung);
		}
		$PenggunaLulusan = $this->db->query("SELECT * FROM PenggunaLulusan WHERE Homebase = '".$Homebase."' AND Tahun = ".$TS)->result_array();
		$Data['PenggunaLulusan'] = array(array(0,0,0,0),array(0,0,0,0),array(0,0,0,0),array(0,0,0,0),array(0,0,0,0),array(0,0,0,0),array(0,0,0,0),array(0,0,0,0)); 
		count($PenggunaLulusan) > 0 ? $Data['PenggunaLulusan'][7][0] = count($PenggunaLulusan) : $Data['PenggunaLulusan'][7][0] = 1;
		for ($i=0; $i < count($PenggunaLulusan); $i++) { 
			$Pisah = explode("|",$PenggunaLulusan[$i]['Poin']);
			$Data['PenggunaLulusan'][0][$Pisah[0]-1] += 1;
			$Data['PenggunaLulusan'][1][$Pisah[1]-1] += 1;
			$Data['PenggunaLulusan'][2][$Pisah[2]-1] += 1;
			$Data['PenggunaLulusan'][3][$Pisah[3]-1] += 1;
			$Data['PenggunaLulusan'][4][$Pisah[4]-1] += 1;
			$Data['PenggunaLulusan'][5][$Pisah[5]-1] += 1;
			$Data['PenggunaLulusan'][6][$Pisah[6]-1] += 1;
		}
		$Data['PrestasiAkademik'] = $this->db->query("SELECT * FROM PrestasiMahasiswa WHERE JenisPrestasi=1 AND Homebase = '".$Homebase."' AND TahunPrestasi > ".($TS-5)." AND TahunPrestasi <= ".$TS)->result_array();
		$Data['PrestasiNonAkademik'] = $this->db->query("SELECT * FROM PrestasiMahasiswa WHERE JenisPrestasi=2 AND Homebase = '".$Homebase."' AND TahunPrestasi > ".($TS-5)." AND TahunPrestasi <= ".$TS)->result_array();
		$Data['EWMP'] = array();
		if ($Homebase == 'S1') {
			foreach ($this->db->get('Dosen')->result_array() as $key) {
				$EWMP = array();
				array_push($EWMP,$key['Nama']);array_push($EWMP,$key['KesesuaianKompetensi']);
				array_push($EWMP,$this->db->query("SELECT SUM(JumlahKredit) AS sks FROM RealisasiPendidikan WHERE Jenjang = '".$Homebase."' AND NIP = ".$key['NIP']." AND Tahun = ".$TS." AND IdKegiatan = 'PND3' AND Kode = '0'")->row_array()['sks']);
				array_push($EWMP,$this->db->query("SELECT SUM(JumlahKredit) AS sks FROM RealisasiPendidikan WHERE Jenjang = '".$Homebase."' AND NIP = ".$key['NIP']." AND Tahun = ".$TS." AND IdKegiatan = 'PND3' AND Kode = '1'")->row_array()['sks']);
				array_push($EWMP,$this->db->query("SELECT SUM(JumlahKredit) AS sks FROM RealisasiPendidikan WHERE Jenjang = '".$Homebase."' AND NIP = ".$key['NIP']." AND Tahun = ".$TS." AND IdKegiatan = 'PND3' AND Kode = '2'")->row_array()['sks']);
				array_push($EWMP,$this->db->query("SELECT SUM(JumlahKredit) AS sks FROM RealisasiPenelitian WHERE Jenjang = '".$Homebase."' AND NIP = ".$key['NIP']." AND Tahun = ".$TS)->row_array()['sks']);
				array_push($EWMP,$this->db->query("SELECT SUM(JumlahKredit) AS sks FROM RealisasiPengabdian WHERE Jenjang = '".$Homebase."' AND NIP = ".$key['NIP']." AND Tahun = ".$TS)->row_array()['sks']);
				array_push($EWMP,$this->db->query("SELECT SUM(JumlahKredit) AS sks FROM RealisasiPenunjang WHERE Jenjang = '".$Homebase."' AND NIP = ".$key['NIP']." AND Tahun = ".$TS)->row_array()['sks']);
				array_push($Data['EWMP'],$EWMP);
			}
		} else {
			foreach ($this->db->get_where('Dosen',array('Homebase' => 'S2'))->result_array() as $key) {
				$EWMP = array();
				array_push($EWMP,$key['Nama']);array_push($EWMP,$key['KesesuaianKompetensi']);
				array_push($EWMP,$this->db->query("SELECT SUM(JumlahKredit) AS sks FROM RealisasiPendidikan WHERE Jenjang = '".$Homebase."' AND NIP = ".$key['NIP']." AND Tahun = ".$TS." AND IdKegiatan = 'PND3' AND Kode = '0'")->row_array()['sks']);
				array_push($EWMP,$this->db->query("SELECT SUM(JumlahKredit) AS sks FROM RealisasiPendidikan WHERE Jenjang = '".$Homebase."' AND NIP = ".$key['NIP']." AND Tahun = ".$TS." AND IdKegiatan = 'PND3' AND Kode = '1'")->row_array()['sks']);
				array_push($EWMP,$this->db->query("SELECT SUM(JumlahKredit) AS sks FROM RealisasiPendidikan WHERE Jenjang = '".$Homebase."' AND NIP = ".$key['NIP']." AND Tahun = ".$TS." AND IdKegiatan = 'PND3' AND Kode = '2'")->row_array()['sks']);
				array_push($EWMP,$this->db->query("SELECT SUM(JumlahKredit) AS sks FROM RealisasiPenelitian WHERE Jenjang = '".$Homebase."' AND NIP = ".$key['NIP']." AND Tahun = ".$TS)->row_array()['sks']);
				array_push($EWMP,$this->db->query("SELECT SUM(JumlahKredit) AS sks FROM RealisasiPengabdian WHERE Jenjang = '".$Homebase."' AND NIP = ".$key['NIP']." AND Tahun = ".$TS)->row_array()['sks']);
				array_push($EWMP,$this->db->query("SELECT SUM(JumlahKredit) AS sks FROM RealisasiPenunjang WHERE Jenjang = '".$Homebase."' AND NIP = ".$key['NIP']." AND Tahun = ".$TS)->row_array()['sks']);
				array_push($Data['EWMP'],$EWMP);
			}
		}
		$Data['Dosen'] = array();
		if ($Homebase == 'S1') {
			$Data['Dosen'] = $this->db->get('Dosen')->result_array();
			for ($i=0; $i < count($Data['Dosen']); $i++) { 
				$PS = $PSLain = "";
				$mk = $this->db->query("SELECT Kode,Kegiatan FROM `RealisasiPendidikan` WHERE NIP=".$Data['Dosen'][$i]['NIP']." AND Jenjang="."'".$Homebase."' AND Tahun <= ".$TS." AND Tahun > ".($TS-3))->result_array();
				for ($j=0; $j < count($mk); $j++) { 
					if ($mk[$j]['Kode']==0) {
						$PS .= $mk[$j]['Kegiatan'];
						$PS .= ', ';
					} else {
						$PSLain .= $mk[$j]['Kegiatan'];
						$PS .= ', ';
					}
				}
				$Data['Dosen'][$i]['PS'] = $PS;
				$Data['Dosen'][$i]['PSLain'] = $PSLain;
			}
		} else {
			$Data['Dosen'] = $this->db->get_where('Dosen',array('Homebase' => 'S2'))->result_array();
			for ($i=0; $i < count($Data['Dosen']); $i++) { 
				$PS = $PSLain = "";
				$mk = $this->db->query("SELECT Kode,Kegiatan FROM `RealisasiPendidikan` WHERE NIP=".$Data['Dosen'][$i]['NIP']." AND Jenjang="."'".$Homebase."' AND Tahun <= ".$TS." AND Tahun > ".($TS-3))->result_array();
				for ($j=0; $j < count($mk); $j++) { 
					if ($mk[$j]['Kode']==0) {
						$PS .= $mk[$j]['Kegiatan'];
						$PS .= ', ';
					} else {
						$PSLain .= $mk[$j]['Kegiatan'];
						$PSLain .= ', ';
					}
				}
				$Data['Dosen'][$i]['PS'] = $PS;
				$Data['Dosen'][$i]['PSLain'] = $PSLain;
			}
		} 
		$Data['SitasiDTPS'] = $this->db->query("SELECT * FROM `SitasiDTPS` WHERE Homebase="."'".$Homebase."'"." AND Tahun <= ".$TS." AND Tahun > ".($TS-3))->result_array(); 
		$Data['Kurikulum'] = $this->db->query("SELECT * FROM `Kurikulum` WHERE Homebase="."'".$Homebase."'")->result_array(); 
		$Data['Integrasi'] = $this->db->query("SELECT * FROM `Integrasi` WHERE Homebase="."'".$Homebase."'"." AND Tahun <= ".$TS." AND Tahun > ".($TS-3))->result_array(); 
		$Data['PenelitianDosenMhs'] = $this->db->query("SELECT * FROM `PenelitianDosenMhs` WHERE Homebase="."'".$Homebase."'"." AND Tahun <= ".$TS." AND Tahun > ".($TS-3))->result_array(); 
		$Homebase == 'S1' ? $Data['RujukanTesis'] = array() : $Data['RujukanTesis'] = $this->db->query("SELECT * FROM `RujukanTesis` WHERE Tahun <= ".$TS." AND Tahun > ".($TS-3))->result_array(); 
		$Homebase == 'S1' ? $Data['PkMDosenMhs'] = $this->db->query("SELECT * FROM `PkMDosenMhs` WHERE Tahun <= ".$TS." AND Tahun > ".($TS-3))->result_array() : $Data['PkMDosenMhs'] = array();
		$Data['PublikasiMahasiswa'] = array();
		for ($j = 1; $j < 11; $j++) { 
			$Jumlah = array(); $Total = 0;
			for ($i = ($TS-2); $i <= $TS; $i++) { 
				$Tampung = $this->db->query("SELECT COUNT(*) as Jumlah FROM PublikasiMahasiswa WHERE Homebase="."'".$Homebase."' AND Jenis=".$j." AND Tahun = ".$i)->row_array()['Jumlah'];		
				$Tampung == '' ? array_push($Jumlah,0) : array_push($Jumlah,$Tampung);
				$Tampung == '' ? $Total += 0 : $Total += $Tampung;
			}
			array_push($Jumlah,$Total);
			array_push($Data['PublikasiMahasiswa'],$Jumlah);
		}	
		$Data['SitasiMahasiswa'] = $this->db->query("SELECT * FROM `SitasiMahasiswa` WHERE Homebase="."'".$Homebase."'"." AND Tahun <= ".$TS." AND Tahun > ".($TS-3))->result_array(); 
		$Data['PatenMahasiswa'] = $this->db->query("SELECT * FROM `PatenMahasiswa` WHERE Homebase="."'".$Homebase."'"." AND Tahun <= ".$TS." AND Tahun > ".($TS-3))->result_array(); 
		$Data['HKIMahasiswa'] = $this->db->query("SELECT * FROM `HKIMahasiswa` WHERE Homebase="."'".$Homebase."'"." AND Tahun <= ".$TS." AND Tahun > ".($TS-3))->result_array(); 
		$Data['KaryaMahasiswa'] = $this->db->query("SELECT * FROM `KaryaMahasiswa` WHERE Homebase="."'".$Homebase."'"." AND Tahun <= ".$TS." AND Tahun > ".($TS-3))->result_array(); 
		$Data['BukuMahasiswa'] = $this->db->query("SELECT * FROM `BukuMahasiswa` WHERE Homebase="."'".$Homebase."'"." AND Tahun <= ".$TS." AND Tahun > ".($TS-3))->result_array(); 
		$Data['DosenKontrak'] = $this->db->get_where('DosenKontrak',array('Homebase' => $Homebase))->result_array();
		$Data['DPU'] = array();
		$DPUDistinct = $this->db->query("SELECT DISTINCT(NIP) FROM RealisasiPendidikan WHERE IdKegiatan='PND6' AND Tahun <= ".$TS." AND Tahun > ".($TS-3))->result_array();
		foreach ($DPUDistinct as $key) {
			$Dosen = array();
			array_push($Dosen,$this->db->query("SELECT Nama FROM Dosen WHERE NIP = ".$key['NIP'])->row_array()['Nama']);
			if ($Homebase == 'S1') {
				for ($i = ($TS-2); $i <= $TS; $i++) { 
					$Tampung = $this->db->query("SELECT SUM(Volume) as Total FROM `RealisasiPendidikan` WHERE IdKegiatan = 'PND6' AND Kode LIKE '%1' AND NIP = ".$key['NIP']. " AND Tahun = ".$i)->row_array()['Total'];
					$Tampung == '' ? array_push($Dosen,0) : array_push($Dosen,$Tampung);
				}	
				for ($i = ($TS-2); $i <= $TS; $i++) {  
					$Tampung = $this->db->query("SELECT SUM(Volume) as Total FROM `RealisasiPendidikan` WHERE IdKegiatan = 'PND6' AND Kode LIKE '%2' AND NIP = ".$key['NIP']. " AND Tahun = ".$i)->row_array()['Total'];
					$Tampung == '' ? array_push($Dosen,0) : array_push($Dosen,$Tampung);
				}	
			} else {
				for ($i = ($TS-2); $i <= $TS; $i++) {  
					$Tampung = $this->db->query("SELECT SUM(Volume) as Total FROM `RealisasiPendidikan` WHERE IdKegiatan = 'PND6' AND Kode LIKE '%2' AND NIP = ".$key['NIP']. " AND Tahun = ".$i)->row_array()['Total'];
					$Tampung == '' ? array_push($Dosen,0) : array_push($Dosen,$Tampung);
				}	
				for ($i = ($TS-2); $i <= $TS; $i++) { 
					$Tampung = $this->db->query("SELECT SUM(Volume) as Total FROM `RealisasiPendidikan` WHERE IdKegiatan = 'PND6' AND Kode LIKE '%1' AND NIP = ".$key['NIP']. " AND Tahun = ".$i)->row_array()['Total'];
					$Tampung == '' ? array_push($Dosen,0) : array_push($Dosen,$Tampung);
				}	
			}
			array_push($Data['DPU'],$Dosen);
		}
		$Data['PenelitianDTPS'] = array();
		for ($j = 1; $j <= 3; $j++) { 
			$Jumlah = array(); $Total = 0;
			for ($i = ($TS-2); $i <= $TS; $i++) { 
				$Tampung = $this->db->query("SELECT SUM(Volume) as Volume FROM RealisasiPenelitian WHERE Jenjang="."'".$Homebase."' AND Kode LIKE '%".$j."' AND Tahun = ".$i)->row_array()['Volume'];		
				$Tampung == '' ? array_push($Jumlah,0) : array_push($Jumlah,$Tampung);
				$Tampung == '' ? $Total += 0 : $Total += $Tampung;
			}
			array_push($Jumlah,$Total);
			array_push($Data['PenelitianDTPS'],$Jumlah);
		}	
		$Data['PengabdianDTPS'] = array();
		for ($j = 1; $j <= 3; $j++) { 
			$Jumlah = array(); $Total = 0;
			for ($i = ($TS-2); $i <= $TS; $i++) { 
				$Tampung = $this->db->query("SELECT SUM(Volume) as Volume FROM RealisasiPengabdian WHERE Jenjang="."'".$Homebase."' AND Kode LIKE '%".$j."' AND Tahun = ".$i)->row_array()['Volume'];		
				$Tampung == '' ? array_push($Jumlah,0) : array_push($Jumlah,$Tampung);
				$Tampung == '' ? $Total += 0 : $Total += $Tampung;
			}
			array_push($Jumlah,$Total);
			array_push($Data['PengabdianDTPS'],$Jumlah);
		}	
		$Data['BukuISBN'] = $this->db->query("SELECT Kegiatan,Tahun FROM `RealisasiPenelitian` WHERE Jenjang="."'".$Homebase."' AND IdKegiatan = 'PNL4' OR IdKegiatan = 'PNL5' OR IdKegiatan = 'PNL11' OR IdKegiatan = 'PNL12' AND Tahun <= ".$TS." AND Tahun > ".($TS-3))->result_array();		
		foreach ($this->db->query("SELECT Kegiatan,Tahun FROM `RealisasiPenelitian` WHERE Jenjang="."'".$Homebase."' AND IdKegiatan = 'PNL1' AND Kode LIKE '1%' OR IdKegiatan = 'PNL1' AND Kode LIKE '2%' AND Tahun <= ".$TS." AND Tahun > ".($TS-3))->result_array() as $key => $value) {
			array_push($Data['BukuISBN'],$value);
		}
		$Data['Paten'] = $this->db->query("SELECT Kegiatan,Tahun FROM `RealisasiPenelitian` WHERE Jenjang="."'".$Homebase."' AND IdKegiatan = 'PNL6' OR IdKegiatan = 'PNL17' AND Tahun <= ".$TS." AND Tahun > ".($TS-3))->result_array();		
		$Data['TepatGuna'] = $this->db->query("SELECT Kegiatan,Tahun FROM `RealisasiPengabdian` WHERE Jenjang="."'".$Homebase."' AND IdKegiatan = 'PNB6' AND Tahun <= ".$TS." AND Tahun > ".($TS-3))->result_array();		
		$Data['HakCipta'] = $this->db->query("SELECT Kegiatan,Tahun FROM `RealisasiPenelitian` WHERE Jenjang="."'".$Homebase."' AND IdKegiatan = 'PNL6' AND Tahun <= ".$TS." AND Tahun > ".($TS-3))->result_array();		
		$Data['Rekognisi'] = array();

		foreach ($this->db->query("SELECT Dosen.Nama,Dosen.BidangKeahlian,RealisasiPenunjang.Kode,RealisasiPenunjang.Tahun FROM Dosen,RealisasiPenunjang WHERE RealisasiPenunjang.NIP=Dosen.NIP AND Jenjang="."'".$Homebase."' AND RealisasiPenunjang.IdKegiatan = 'PNJ6' AND RealisasiPenunjang.Tahun <= ".$TS." AND RealisasiPenunjang.Tahun > ".($TS-3))->result_array() as $key => $value) {
			if ($value['Kode'][0] == 1 || $value['Kode'][0] == 4) {
				$value['Kode'] = 3;
			} else if ($value['Kode'][0] == 2 || $value['Kode'][0] == 5) {
				$value['Kode'] = 2;
			} else {
				$value['Kode'] = 1;
			}
			$value['Bukti'] = 'Pertemuan Ilmiah';
			array_push($Data['Rekognisi'],$value);
		}
		foreach ($this->db->query("SELECT Dosen.Nama,Dosen.BidangKeahlian,RealisasiPengabdian.Kode,RealisasiPengabdian.Tahun FROM Dosen,RealisasiPengabdian WHERE RealisasiPengabdian.NIP=Dosen.NIP AND Jenjang="."'".$Homebase."' AND RealisasiPengabdian.IdKegiatan = 'PNB7' AND RealisasiPengabdian.Tahun <= ".$TS." AND RealisasiPengabdian.Tahun > ".($TS-3))->result_array() as $key => $value) {
			$value['Kode'][0] == 1 ? $value['Kode'] = 3 : $value['Kode'] = 2 ;
			$value['Bukti'] = 'Editor / Mitra Bestari';
			array_push($Data['Rekognisi'],$value);
		}
		foreach ($this->db->query("SELECT Dosen.Nama,Dosen.BidangKeahlian,RealisasiPengabdian.Kode,RealisasiPengabdian.Tahun FROM Dosen,RealisasiPengabdian WHERE RealisasiPengabdian.NIP=Dosen.NIP AND Jenjang="."'".$Homebase."' AND RealisasiPengabdian.IdKegiatan = 'PNB3' AND RealisasiPengabdian.Tahun <= ".$TS." AND RealisasiPengabdian.Tahun > ".($TS-3))->result_array() as $key => $value) {
			if ($value['Kode'][0] == 1 || $value['Kode'][0] == 4) {
				$value['Kode'] = 3;
			} else if ($value['Kode'][0] == 2 || $value['Kode'][0] == 5) {
				$value['Kode'] = 2;
			} else {
				$value['Kode'] = 1;
			}
			$value['Bukti'] = 'Staf Ahli / Narasumber';
			array_push($Data['Rekognisi'],$value);
		}
		foreach ($this->db->query("SELECT Dosen.Nama,Dosen.BidangKeahlian,RealisasiPenunjang.Kode,RealisasiPenunjang.Tahun FROM Dosen,RealisasiPenunjang WHERE RealisasiPenunjang.NIP=Dosen.NIP AND Jenjang="."'".$Homebase."' AND RealisasiPenunjang.IdKegiatan = 'PNJ7' AND RealisasiPenunjang.Tahun <= ".$TS." AND RealisasiPenunjang.Tahun > ".($TS-3))->result_array() as $key => $value) {
			if ($value['Kode'][0] == 4) {
				$value['Kode'] = 3;
			} else if ($value['Kode'][0] == 5) {
				$value['Kode'] = 2;
			} else if ($value['Kode'][0] == 6) {
				$value['Kode'] = 1;
			}
			$value['Bukti'] = 'Penghargaan Atas Prestasi';
			array_push($Data['Rekognisi'],$value);
		}
		$Data['Publikasi'] = array();
		$KodePublikasi = array(3,5,8);
		for ($j = 0; $j < 3; $j++) { 
			$Jumlah = array(); $Total = 0;
			for ($i = ($TS-2); $i <= $TS; $i++) { 
				$Tampung = $this->db->query("SELECT COUNT(*) as Volume FROM RealisasiPenelitian WHERE Jenjang="."'".$Homebase."' AND IdKegiatan = 'PNL14' AND Kode LIKE '".$KodePublikasi[$j]."%' AND Tahun = ".$i)->row_array()['Volume'];		
				if ($j == 1) {
					$Tampung += $this->db->query("SELECT COUNT(*) as Volume FROM RealisasiPenelitian WHERE Jenjang="."'".$Homebase."' AND IdKegiatan = 'PNL1' AND Tahun = ".$i." AND (Kode LIKE '8%' OR Kode LIKE '9%' OR Kode LIKE '10%' OR Kode LIKE '11%')")->row_array()['Volume'];		
				}
				$Tampung == '' ? array_push($Jumlah,0) : array_push($Jumlah,$Tampung);
				$Tampung == '' ? $Total += 0 : $Total += $Tampung;
			}
			array_push($Jumlah,$Total);
			array_push($Data['Publikasi'],$Jumlah);
		}	
		for ($j = 0; $j < 1; $j++) { 
			$Jumlah = array(); $Total = 0;
			for ($i = ($TS-2); $i <= $TS; $i++) { 
				$Tampung = $this->db->query("SELECT COUNT(*) as Volume FROM RealisasiPenelitian WHERE Jenjang="."'".$Homebase."' AND IdKegiatan = 'PNL1' AND Tahun = ".$i." AND (Kode LIKE '5%' OR Kode LIKE '6%')")->row_array()['Volume'];		
				$Tampung == '' ? array_push($Jumlah,0) : array_push($Jumlah,$Tampung);
				$Tampung == '' ? $Total += 0 : $Total += $Tampung;
			}
			array_push($Jumlah,$Total);
			array_push($Data['Publikasi'],$Jumlah);
		}	
		for ($j = 1; $j <= 3; $j++) { 
			$Jumlah = array(); $Total = 0;
			for ($i = ($TS-2); $i <= $TS; $i++) { 
				$Tampung = $this->db->query("SELECT COUNT(*) as Volume FROM RealisasiPenelitian WHERE Jenjang="."'".$Homebase."' AND IdKegiatan = 'PNL15' AND Tahun = ".$i." AND Kode LIKE '".$j."%'")->row_array()['Volume'];		
				$Tampung == '' ? array_push($Jumlah,0) : array_push($Jumlah,$Tampung);
				$Tampung == '' ? $Total += 0 : $Total += $Tampung;
			}
			array_push($Jumlah,$Total);
			array_push($Data['Publikasi'],$Jumlah);
		}	
		for ($j = 11; $j <= 13; $j++) { 
			$Jumlah = array(); $Total = 0;
			for ($i = ($TS-2); $i <= $TS; $i++) { 
				$Tampung = $this->db->query("SELECT COUNT(*) as Volume FROM RealisasiPenelitian WHERE Jenjang="."'".$Homebase."' AND IdKegiatan = 'PNL2' AND Tahun = ".$i." AND Kode LIKE '".$j."%'")->row_array()['Volume'];		
				$Tampung == '' ? array_push($Jumlah,0) : array_push($Jumlah,$Tampung);
				$Tampung == '' ? $Total += 0 : $Total += $Tampung;
			}
			array_push($Jumlah,$Total);
			array_push($Data['Publikasi'],$Jumlah);
		}	
		$this->load->view('ExcelBorang',$Data);  
  } 
}