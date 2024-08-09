<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mhs extends CI_Controller {

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('AkunMhs') != 'Mhs') {
			redirect(base_url('SMD/TA'));
		} 
	}
 
  public function Profil(){ 
		$Data['Mhs'] = $this->db->query("SELECT Foto FROM mahasiswa WHERE NIM = ".$this->session->userdata('NIM'))->row_array();
		$this->load->view('Mhs/Header',$Data); 
		$this->load->view('Mhs/Profil',$Data); 
	}

	public function MBKM(){ 
		$Data['Mhs'] = $this->db->query("SELECT Foto FROM mahasiswa WHERE NIM = ".$this->session->userdata('NIM'))->row_array();
		$Data['Dosen'] = $this->db->query("SELECT NIP,Nama FROM Dosen")->result_array();
		$Data['MBKM'] = $this->db->query("SELECT * FROM mbkm WHERE NIM = ".$this->session->userdata('NIM'))->row_array();
		$Data['Provinsi'] = $this->db->query("SELECT * FROM `kodewilayah` WHERE length(Kode) = 2")->result_array();
		if ($Data['MBKM']['Kabupaten'] != "") {
			$Data['Kabupaten'] = $this->db->query("SELECT * FROM `kodewilayah` WHERE Kode LIKE '".$Data['MBKM']['Provinsi'].".%' AND length(Kode) = 5")->result_array();
		} else {
			$Data['Kabupaten'] = $this->db->query("SELECT * FROM `kodewilayah` WHERE Kode LIKE '35.%' AND length(Kode) = 5")->result_array();
		}
    
		$this->load->view('Mhs/Header',$Data); 
		$this->load->view('Mhs/MBKM',$Data); 
	}

	function ListKabupaten(){
    $Kabupaten = $this->db->query("SELECT * FROM `kodewilayah` WHERE Kode LIKE "."'".$_POST['Kode'].".%"."' AND length(Kode) = 5")->result_array();
    $OpsiKabupaten = "";
    foreach ($Kabupaten as $key) {
      $OpsiKabupaten .= "<option value='".$key['Kode']."'>".$key['Nama']."</option>";
    }
    echo $OpsiKabupaten;
  }

	public function DaftarMBKM(){
		$CekMBKM = $this->db->get_where('mbkm', array('NIM' => $this->session->userdata('NIM')));
		if ($CekMBKM->num_rows() == 0){
			$_POST['NIM'] = $this->session->userdata('NIM');
			$this->db->insert('mbkm',$_POST);
			if ($this->db->affected_rows()){
				echo '1';
			} else {
				echo 'Gagal Menyimpan Data!';
			}
		} else {
			unset($_POST['Status']);
			$this->db->where('NIM', $this->session->userdata('NIM'));
			$this->db->update('mbkm',$_POST);
			echo '1';
		}
	}

	public function AjukanMBKM(){
		$_POST['NIM'] = $this->session->userdata('NIM');
		$this->db->where('NIM', $this->session->userdata('NIM'));
		$this->db->update('mbkm',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menyimpan Data!';
		}
	}

	public function DosPem(){ 
		$Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa WHERE NIM = ".$this->session->userdata('NIM'))->row_array();
		$Data['Bimbingan'] = $this->db->query("SELECT * FROM bimbingan WHERE NIM = ".$this->session->userdata('NIM'))->result_array();
		$this->load->view('Mhs/Header',$Data); 
		$this->load->view('Mhs/DosPem',$Data); 
	}

	public function UjianProposal(){ 
		$Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa WHERE NIM = ".$this->session->userdata('NIM'))->row_array();
		$Data['KetuaPenguji'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = "."'".$Data['Mhs']['PengujiProposal1']."'")->row_array()['Nama'];
		$Data['AnggotaPenguji'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = "."'".$Data['Mhs']['PengujiProposal2']."'")->row_array()['Nama'];
		$this->load->view('Mhs/Header',$Data); 
		$this->load->view('Mhs/UjianProposal',$Data); 
	}

	public function UjianSkripsi(){ 
		$Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa WHERE NIM = ".$this->session->userdata('NIM'))->row_array();
		$Data['KetuaPenguji'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = "."'".$Data['Mhs']['PengujiSkripsi1']."'")->row_array()['Nama'];
		$Data['AnggotaPenguji'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = "."'".$Data['Mhs']['PengujiSkripsi2']."'")->row_array()['Nama'];
		$this->load->view('Mhs/Header',$Data); 
		$this->load->view('Mhs/UjianSkripsi',$Data); 
	}

	public function UpdateRevisi(){
    $this->db->where('NIM', $this->session->userdata('NIM'));
		$this->db->update('mahasiswa',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menyimpnan Data!';
		}
	}

	public function InputUjianSkripsi(){
		$NamaAdministrasi = date('Ymd',time()).substr(password_hash('Administrasi', PASSWORD_DEFAULT),7,7);
		$NamaAdministrasi = str_replace("/","E",$NamaAdministrasi);
		$NamaAdministrasi = str_replace(".","F",$NamaAdministrasi);
		move_uploaded_file($_FILES['Administrasi']['tmp_name'], "Proposal/".$NamaAdministrasi.".pdf");
		$_POST['Administrasi'] = $NamaAdministrasi.".pdf";
    $NamaRevisiProposalBimbingan = date('Ymd',time()).substr(password_hash('RevisiProposalBimbingan', PASSWORD_DEFAULT),7,7);
		$NamaRevisiProposalBimbingan = str_replace("/","E",$NamaRevisiProposalBimbingan);
		$NamaRevisiProposalBimbingan = str_replace(".","F",$NamaRevisiProposalBimbingan);
		move_uploaded_file($_FILES['RevisiProposalBimbingan']['tmp_name'], "Proposal/".$NamaRevisiProposalBimbingan.".pdf");
    $_POST['RevisiProposalBimbingan'] = $NamaRevisiProposalBimbingan.".pdf";
    $NamaToeflSertifikat = date('Ymd',time()).substr(password_hash('ToeflSertifikat', PASSWORD_DEFAULT),7,7);
		$NamaToeflSertifikat = str_replace("/","E",$NamaToeflSertifikat);
		$NamaToeflSertifikat = str_replace(".","F",$NamaToeflSertifikat);
		move_uploaded_file($_FILES['ToeflSertifikat']['tmp_name'], "Proposal/".$NamaToeflSertifikat.".pdf");
		$_POST['ToeflSertifikat'] = $NamaToeflSertifikat.".pdf";
		$_POST['StatusUjianSkripsi'] = 'Diajukan';
		$this->db->where('NIM', $this->session->userdata('NIM'));
		$this->db->update('mahasiswa',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menyimpan Data!';
		}
	}

	public function EditUjianSkripsi(){
		if (count($_FILES) == 0) {
      $this->db->where('NIM', $this->session->userdata('NIM'));
			$this->db->update('mahasiswa',$_POST);
			echo '1';
    } else if (count($_FILES) > 0) {
      if (!empty($_POST['_Administrasi_'])) {
				unlink('Proposal/'.$_POST['_Administrasi_']);
				unset($_POST['_Administrasi_']);
				$NamaAdministrasi = date('Ymd',time()).substr(password_hash('Administrasi', PASSWORD_DEFAULT),7,7);
        $NamaAdministrasi = str_replace("/","E",$NamaAdministrasi);
        $NamaAdministrasi = str_replace(".","F",$NamaAdministrasi);
        move_uploaded_file($_FILES['Administrasi']['tmp_name'], "Proposal/".$NamaAdministrasi.".pdf");
        $_POST['Administrasi'] = $NamaAdministrasi.".pdf";
			}
      if (!empty($_POST['_RevisiProposalBimbingan_'])) {
				unlink('Proposal/'.$_POST['_RevisiProposalBimbingan_']);
				unset($_POST['_RevisiProposalBimbingan_']);
				$NamaRevisiProposalBimbingan = date('Ymd',time()).substr(password_hash('RevisiProposalBimbingan', PASSWORD_DEFAULT),7,7);
        $NamaRevisiProposalBimbingan = str_replace("/","E",$NamaRevisiProposalBimbingan);
        $NamaRevisiProposalBimbingan = str_replace(".","F",$NamaRevisiProposalBimbingan);
        move_uploaded_file($_FILES['RevisiProposalBimbingan']['tmp_name'], "Proposal/".$NamaRevisiProposalBimbingan.".pdf");
        $_POST['RevisiProposalBimbingan'] = $NamaRevisiProposalBimbingan.".pdf";
			}
			if (!empty($_POST['_ToeflSertifikat_'])) {
				unlink('Proposal/'.$_POST['_ToeflSertifikat_']);
				unset($_POST['_ToeflSertifikat_']);
				$NamaToeflSertifikat = date('Ymd',time()).substr(password_hash('ToeflSertifikat', PASSWORD_DEFAULT),7,7);
        $NamaToeflSertifikat = str_replace("/","E",$NamaToeflSertifikat);
        $NamaToeflSertifikat = str_replace(".","F",$NamaToeflSertifikat);
        move_uploaded_file($_FILES['ToeflSertifikat']['tmp_name'], "Proposal/".$NamaToeflSertifikat.".pdf");
        $_POST['ToeflSertifikat'] = $NamaToeflSertifikat.".pdf";
			}
			$this->db->where('NIM', $this->session->userdata('NIM'));
			$this->db->update('mahasiswa',$_POST);
			echo '1';
		}
	}

	public function AjukanUjianSkripsi(){
		if (count($_FILES) == 0) {
			$_POST['StatusUjianSkripsi'] = 'Diajukan';
      $this->db->where('NIM', $this->session->userdata('NIM'));
			$this->db->update('mahasiswa',$_POST);
			echo '1';
    } else if (count($_FILES) > 0) {
      if (!empty($_POST['_Administrasi_'])) {
				unlink('Proposal/'.$_POST['_Administrasi_']);
				unset($_POST['_Administrasi_']);
				$NamaAdministrasi = date('Ymd',time()).substr(password_hash('Administrasi', PASSWORD_DEFAULT),7,7);
        $NamaAdministrasi = str_replace("/","E",$NamaAdministrasi);
        $NamaAdministrasi = str_replace(".","F",$NamaAdministrasi);
        move_uploaded_file($_FILES['Administrasi']['tmp_name'], "Proposal/".$NamaAdministrasi.".pdf");
        $_POST['Administrasi'] = $NamaAdministrasi.".pdf";
			}
      if (!empty($_POST['_RevisiProposalBimbingan_'])) {
				unlink('Proposal/'.$_POST['_RevisiProposalBimbingan_']);
				unset($_POST['_RevisiProposalBimbingan_']);
				$NamaRevisiProposalBimbingan = date('Ymd',time()).substr(password_hash('RevisiProposalBimbingan', PASSWORD_DEFAULT),7,7);
        $NamaRevisiProposalBimbingan = str_replace("/","E",$NamaRevisiProposalBimbingan);
        $NamaRevisiProposalBimbingan = str_replace(".","F",$NamaRevisiProposalBimbingan);
        move_uploaded_file($_FILES['RevisiProposalBimbingan']['tmp_name'], "Proposal/".$NamaRevisiProposalBimbingan.".pdf");
        $_POST['RevisiProposalBimbingan'] = $NamaRevisiProposalBimbingan.".pdf";
			}
			if (!empty($_POST['_ToeflSertifikat_'])) {
				unlink('Proposal/'.$_POST['_ToeflSertifikat_']);
				unset($_POST['_ToeflSertifikat_']);
				$NamaToeflSertifikat = date('Ymd',time()).substr(password_hash('ToeflSertifikat', PASSWORD_DEFAULT),7,7);
        $NamaToeflSertifikat = str_replace("/","E",$NamaToeflSertifikat);
        $NamaToeflSertifikat = str_replace(".","F",$NamaToeflSertifikat);
        move_uploaded_file($_FILES['ToeflSertifikat']['tmp_name'], "Proposal/".$NamaToeflSertifikat.".pdf");
        $_POST['ToeflSertifikat'] = $NamaToeflSertifikat.".pdf";
			}
			$_POST['StatusUjianSkripsi'] = 'Diajukan';
			$this->db->where('NIM', $this->session->userdata('NIM'));
			$this->db->update('mahasiswa',$_POST);
			echo '1';
		}
	}

	public function InputUjianProposal(){
		$NamaKartuBimbinganProposal = date('Ymd',time()).substr(password_hash('KartuBimbinganProposal', PASSWORD_DEFAULT),7,7);
		$NamaKartuBimbinganProposal = str_replace("/","E",$NamaKartuBimbinganProposal);
		$NamaKartuBimbinganProposal = str_replace(".","F",$NamaKartuBimbinganProposal);
		move_uploaded_file($_FILES['KartuBimbinganProposal']['tmp_name'], "Proposal/".$NamaKartuBimbinganProposal.".pdf");
		$_POST['KartuBimbinganProposal'] = $NamaKartuBimbinganProposal.".pdf";
		$NamaPlagiasiProposal = date('Ymd',time()).substr(password_hash('PlagiasiProposal', PASSWORD_DEFAULT),7,7);
		$NamaPlagiasiProposal = str_replace("/","E",$NamaPlagiasiProposal);
		$NamaPlagiasiProposal = str_replace(".","F",$NamaPlagiasiProposal);
		move_uploaded_file($_FILES['PlagiasiProposal']['tmp_name'], "Proposal/".$NamaPlagiasiProposal.".pdf");
		$_POST['PlagiasiProposal'] = $NamaPlagiasiProposal.".pdf";
		$_POST['StatusUjianProposal'] = 'Diajukan';
		$this->db->where('NIM', $this->session->userdata('NIM'));
		$this->db->update('mahasiswa',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menyimpan Data!';
		}
	}

	public function EditUjianProposal(){
		if (count($_FILES) == 0) {
      $this->db->where('NIM', $this->session->userdata('NIM'));
			$this->db->update('mahasiswa',$_POST);
			echo '1';
    } else if (count($_FILES) > 0) {
      if (!empty($_POST['_KartuBimbingan_'])) {
				unlink('Proposal/'.$_POST['_KartuBimbingan_']);
				unset($_POST['_KartuBimbingan_']);
				$NamaKartuBimbingan = date('Ymd',time()).substr(password_hash('KartuBimbingan', PASSWORD_DEFAULT),7,7);
				$NamaKartuBimbingan = str_replace("/","E",$NamaKartuBimbingan);
				$NamaKartuBimbingan = str_replace(".","F",$NamaKartuBimbingan);
				move_uploaded_file($_FILES['KartuBimbingan']['tmp_name'], "Proposal/".$NamaKartuBimbingan.".pdf");
				$_POST['KartuBimbinganProposal'] = $NamaKartuBimbingan.".pdf";
			}
			if (!empty($_POST['_Plagiasi_'])) {
				unlink('Proposal/'.$_POST['_Plagiasi_']);
				unset($_POST['_Plagiasi_']);
				$NamaPlagiasi = date('Ymd',time()).substr(password_hash('Plagiasi', PASSWORD_DEFAULT),7,7);
				$NamaPlagiasi = str_replace("/","E",$NamaPlagiasi);
				$NamaPlagiasi = str_replace(".","F",$NamaPlagiasi);
				move_uploaded_file($_FILES['Plagiasi']['tmp_name'], "Proposal/".$NamaPlagiasi.".pdf");
				$_POST['PlagiasiProposal'] = $NamaPlagiasi.".pdf";
			}
			$this->db->where('NIM', $this->session->userdata('NIM'));
			$this->db->update('mahasiswa',$_POST);
			echo '1';
		}
	}

	public function AjukanUjianProposal(){
		if (count($_FILES) == 0) {
			$_POST['StatusUjianProposal'] = 'Diajukan';
      $this->db->where('NIM', $this->session->userdata('NIM'));
			$this->db->update('mahasiswa',$_POST);
			echo '1';
    } else if (count($_FILES) > 0) {
      if (!empty($_POST['_KartuBimbingan_'])) {
				unlink('Proposal/'.$_POST['_KartuBimbingan_']);
				unset($_POST['_KartuBimbingan_']);
				$NamaKartuBimbingan = date('Ymd',time()).substr(password_hash('KartuBimbingan', PASSWORD_DEFAULT),7,7);
				$NamaKartuBimbingan = str_replace("/","E",$NamaKartuBimbingan);
				$NamaKartuBimbingan = str_replace(".","F",$NamaKartuBimbingan);
				move_uploaded_file($_FILES['KartuBimbingan']['tmp_name'], "Proposal/".$NamaKartuBimbingan.".pdf");
				$_POST['KartuBimbinganProposal'] = $NamaKartuBimbingan.".pdf";
			}
			if (!empty($_POST['_Plagiasi_'])) {
				unlink('Proposal/'.$_POST['_Plagiasi_']);
				unset($_POST['_Plagiasi_']);
				$NamaPlagiasi = date('Ymd',time()).substr(password_hash('Plagiasi', PASSWORD_DEFAULT),7,7);
				$NamaPlagiasi = str_replace("/","E",$NamaPlagiasi);
				$NamaPlagiasi = str_replace(".","F",$NamaPlagiasi);
				move_uploaded_file($_FILES['Plagiasi']['tmp_name'], "Proposal/".$NamaPlagiasi.".pdf");
				$_POST['PlagiasiProposal'] = $NamaPlagiasi.".pdf";
			}
			$_POST['StatusUjianProposal'] = 'Diajukan';
			$this->db->where('NIM', $this->session->userdata('NIM'));
			$this->db->update('mahasiswa',$_POST);
			echo '1';
		}
	}

	public function GantiPassword(){
		$this->db->where('NIM', $this->session->userdata('NIM'));
		$this->db->update('mahasiswa',array('Password' => password_hash($_POST['Password'], PASSWORD_DEFAULT)));	
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Mengganti Password!';
		}
	}

	public function Foto(){
		$Tipe = pathinfo($_FILES['Foto']['name'],PATHINFO_EXTENSION);
		$NamaFoto = date('Ymd',time()).substr(password_hash('Foto', PASSWORD_DEFAULT),7,3);
		$NamaFoto = str_replace("/","E",$NamaFoto);
		$NamaFoto = str_replace(".","F",$NamaFoto);
		move_uploaded_file($_FILES['Foto']['tmp_name'], "FotoMhs/".$NamaFoto.'.'.$Tipe);
		if ($_POST['NamaFoto'] != '') { unlink('FotoMhs/'.$_POST['NamaFoto']); }
		$this->db->where('NIM', $this->session->userdata('NIM'));
		$this->db->update('mahasiswa',array('Foto' => $NamaFoto.'.'.$Tipe));
		echo '1';
	}

	public function LogBook(){
		$Tipe = pathinfo($_FILES['LogBook']['name'],PATHINFO_EXTENSION);
		$NamaLogBook = date('Ymd',time()).substr(password_hash('LogBook', PASSWORD_DEFAULT),7,3);
		$NamaLogBook = str_replace("/","E",$NamaLogBook);
		$NamaLogBook = str_replace(".","F",$NamaLogBook);
		move_uploaded_file($_FILES['LogBook']['tmp_name'], "LogBookMBKM/".$NamaLogBook.'.'.$Tipe);
		if ($_POST['_LogBook'] != '') { unlink('LogBookMBKM/'.$_POST['_LogBook']); }
		$this->db->where('NIM', $this->session->userdata('NIM'));
		$this->db->update('mbkm',array('LogBook' => $NamaLogBook.'.'.$Tipe));
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Update Log Book!';
		}
	}

	public function PersetujuanPembimbing(){
		$this->load->library('Pdf');
		$Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa WHERE NIM = ".$this->session->userdata('NIM'))->row_array();
		$Tanggal = explode("-",$Data['Mhs']['TanggalDisetujuiPembimbing']);$Data['Tanggal'] = $Tanggal[2].' - '.$Tanggal[1].' - '.$Tanggal[0];
		$Data['QRCode'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['NIPPembimbing'])->row_array()['QRCode'];
		$this->load->view('PersetujuanPembimbing',$Data);
	}

	public function BeritaAcaraUjianProposal(){
		$this->load->library('Pdf');
		$Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa WHERE NIM = ".$this->session->userdata('NIM'))->row_array();
		$Tanggal = explode("-",$Data['Mhs']['TanggalUjianProposal']);$Data['Tanggal'] = $Tanggal[2].' - '.$Tanggal[1].' - '.$Tanggal[0];
		$Data['Ketua'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal1'])->row_array()['QRCode'];
		$Data['Anggota'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal2'])->row_array()['QRCode'];
		$Data['NamaKetua'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal1'])->row_array()['Nama'];
		$Data['NamaAnggota'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal2'])->row_array()['Nama'];
		$Data['Sekretaris'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['NIPPembimbing'])->row_array()['QRCode'];
		$Bobot = array(5,3.75,2.5,2.5,2.5,5,3.75);
		$_Bobot = array(2.5,2.5,3,3,2,3,5,2.5,1.5);
		$_Bobot_ = array(4,1.5,4,4,3,4,1.5,3);
		$RekapNilai = explode("$",$Data['Mhs']['NilaiProposal1']);
		$NilaiKetuaPenguji = 0;
		if (count($RekapNilai) == 7) {
			for ($i=0; $i < count($Bobot); $i++) { 
				$NilaiKetuaPenguji += $Bobot[$i]*(float)$RekapNilai[$i];
			}
		} else if (count($RekapNilai) == 8) {
			for ($i=0; $i < count($_Bobot_); $i++) { 
				$NilaiKetuaPenguji += $_Bobot_[$i]*(float)$RekapNilai[$i];
			}
		} else {
			for ($i=0; $i < count($_Bobot); $i++) { 
				$NilaiKetuaPenguji += $_Bobot[$i]*(float)$RekapNilai[$i];
			}
		}
		$RekapNilai = explode("$",$Data['Mhs']['NilaiProposal2']);
		$NilaiAnggotaPenguji = 0;
		if (count($RekapNilai) == 7) {
			for ($i=0; $i < count($Bobot); $i++) { 
				$NilaiAnggotaPenguji += $Bobot[$i]*(float)$RekapNilai[$i];
			}
		} else if (count($RekapNilai) == 8) {
			for ($i=0; $i < count($_Bobot_); $i++) { 
				$NilaiAnggotaPenguji += $_Bobot_[$i]*(float)$RekapNilai[$i];
			}
		} else {
			for ($i=0; $i < count($_Bobot); $i++) { 
				$NilaiAnggotaPenguji += $_Bobot[$i]*(float)$RekapNilai[$i];
			}
		}
		$RekapNilai = explode("$",$Data['Mhs']['NilaiProposal3']);
		$NilaiSekretaris = 0;
		if (count($RekapNilai) == 7) {
			for ($i=0; $i < count($Bobot); $i++) { 
				$NilaiSekretaris += $Bobot[$i]*(float)$RekapNilai[$i];
			}
		} else if (count($RekapNilai) == 8) {
			for ($i=0; $i < count($_Bobot_); $i++) { 
				$NilaiSekretaris += $_Bobot_[$i]*(float)$RekapNilai[$i];
			}
		} else {
			for ($i=0; $i < count($_Bobot); $i++) { 
				$NilaiSekretaris += $_Bobot[$i]*(float)$RekapNilai[$i];
			}
		}
		$Data['Nilai'] = number_format(((0.3*$NilaiKetuaPenguji)+(0.3*$NilaiAnggotaPenguji)+(0.4*$NilaiSekretaris)),2,",",".");
		$this->load->view('BeritaAcaraUjianProposal',$Data);
	}

	public function BeritaAcaraUjianSkripsi(){
		$this->load->library('Pdf');
		$Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa WHERE NIM = ".$this->session->userdata('NIM'))->row_array();
		$Tanggal = explode("-",$Data['Mhs']['TanggalUjianSkripsi']);$Data['Tanggal'] = $Tanggal[2].' - '.$Tanggal[1].' - '.$Tanggal[0];
		$Data['Ketua'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal1'])->row_array()['QRCode'];
		$Data['Anggota'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal2'])->row_array()['QRCode'];
		$Data['NamaKetua'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal1'])->row_array()['Nama'];
		$Data['NamaAnggota'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal2'])->row_array()['Nama'];
		$Data['Sekretaris'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['NIPPembimbing'])->row_array()['QRCode'];
		$Bobot = array(5,3.75,2.5,2.5,2.5,5,3.75);
		$_Bobot = array(2.5,2.5,3,3,2,3,5,2.5,1.5);
		$_Bobot_ = array(4,1.5,4,4,3,4,1.5,3);
		$RekapNilai = explode("$",$Data['Mhs']['NilaiProposal1']);
		$NilaiKetuaPenguji = 0;
		if (count($RekapNilai) == 7) {
			for ($i=0; $i < count($Bobot); $i++) { 
				$NilaiKetuaPenguji += $Bobot[$i]*(float)$RekapNilai[$i];
			}
		} else if (count($RekapNilai) == 8) {
			for ($i=0; $i < count($_Bobot_); $i++) { 
				$NilaiKetuaPenguji += $_Bobot_[$i]*(float)$RekapNilai[$i];
			}
		} else {
			for ($i=0; $i < count($_Bobot); $i++) { 
				$NilaiKetuaPenguji += $_Bobot[$i]*(float)$RekapNilai[$i];
			}
		}
		$RekapNilai = explode("$",$Data['Mhs']['NilaiProposal2']);
		$NilaiAnggotaPenguji = 0;
		if (count($RekapNilai) == 7) {
			for ($i=0; $i < count($Bobot); $i++) { 
				$NilaiAnggotaPenguji += $Bobot[$i]*(float)$RekapNilai[$i];
			}
		} else if (count($RekapNilai) == 8) {
			for ($i=0; $i < count($_Bobot_); $i++) { 
				$NilaiAnggotaPenguji += $_Bobot_[$i]*(float)$RekapNilai[$i];
			}
		} else {
			for ($i=0; $i < count($_Bobot); $i++) { 
				$NilaiAnggotaPenguji += $_Bobot[$i]*(float)$RekapNilai[$i];
			}
		}
		$RekapNilai = explode("$",$Data['Mhs']['NilaiProposal3']);
		$NilaiSekretaris = 0;
		if (count($RekapNilai) == 7) {
			for ($i=0; $i < count($Bobot); $i++) { 
				$NilaiSekretaris += $Bobot[$i]*(float)$RekapNilai[$i];
			}
		} else if (count($RekapNilai) == 8) {
			for ($i=0; $i < count($_Bobot_); $i++) { 
				$NilaiSekretaris += $_Bobot_[$i]*(float)$RekapNilai[$i];
			}
		} else {
			for ($i=0; $i < count($_Bobot); $i++) { 
				$NilaiSekretaris += $_Bobot[$i]*(float)$RekapNilai[$i];
			}
		}
		$NilaiProposal = (0.3*$NilaiKetuaPenguji)+(0.3*$NilaiAnggotaPenguji)+(0.4*$NilaiSekretaris);
		$Bobot = array(2.5,2.5,2,2,2,2.5,2.5,2,2.5,2.5,2);
		$_Bobot = array(2.5,2.5,3,3,2,3,5,2.5,1.5);
		$_Bobot_ = array(2.5,1.5,2.5,2.5,2,3,5,1.5,1.5,3);
		$RekapNilai = explode("$",$Data['Mhs']['NilaiSkripsi1']);
		$NilaiKetuaPenguji = 0;
		if (count($RekapNilai) == 11) {
			for ($i=0; $i < count($Bobot); $i++) { 
				$NilaiKetuaPenguji += $Bobot[$i]*(float)$RekapNilai[$i];
			}
		} else if (count($RekapNilai) == 10) {
			for ($i=0; $i < count($_Bobot_); $i++) { 
				$NilaiKetuaPenguji += $_Bobot_[$i]*(float)$RekapNilai[$i];
			}
		} else {
			for ($i=0; $i < count($_Bobot); $i++) { 
				$NilaiKetuaPenguji += $_Bobot[$i]*(float)$RekapNilai[$i];
			}
		}
		$RekapNilai = explode("$",$Data['Mhs']['NilaiSkripsi2']);
		$NilaiAnggotaPenguji = 0;
		if (count($RekapNilai) == 11) {
			for ($i=0; $i < count($Bobot); $i++) { 
				$NilaiAnggotaPenguji += $Bobot[$i]*(float)$RekapNilai[$i];
			}
		} else if (count($RekapNilai) == 10) {
			for ($i=0; $i < count($_Bobot_); $i++) { 
				$NilaiAnggotaPenguji += $_Bobot_[$i]*(float)$RekapNilai[$i];
			}
		} else {
			for ($i=0; $i < count($_Bobot); $i++) { 
				$NilaiAnggotaPenguji += $_Bobot[$i]*(float)$RekapNilai[$i];
			}
		}
		$RekapNilai = explode("$",$Data['Mhs']['NilaiSkripsi3']);
		$NilaiSekretaris = 0;
		if (count($RekapNilai) == 11) {
			for ($i=0; $i < count($Bobot); $i++) { 
				$NilaiSekretaris += $Bobot[$i]*(float)$RekapNilai[$i];
			}
		} else if (count($RekapNilai) == 10) {
			for ($i=0; $i < count($_Bobot_); $i++) { 
				$NilaiSekretaris += $_Bobot_[$i]*(float)$RekapNilai[$i];
			}
		} else {
			for ($i=0; $i < count($_Bobot); $i++) { 
				$NilaiSekretaris += $_Bobot[$i]*(float)$RekapNilai[$i];
			}
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

	public function PersetujuanUjianProposal(){
		$this->load->library('Pdf');
		$Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa WHERE NIM = ".$this->session->userdata('NIM'))->row_array();
		$Tanggal = explode("-",$Data['Mhs']['TanggalUjianProposal']);$Data['Tanggal'] = $Tanggal[2].' - '.$Tanggal[1].' - '.$Tanggal[0];
		$Data['Ketua'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal1'])->row_array()['QRCode'];
		$Data['Anggota'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal2'])->row_array()['QRCode'];
		$Data['NamaKetua'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal1'])->row_array()['Nama'];
		$Data['NamaAnggota'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiProposal2'])->row_array()['Nama'];
		$Data['Sekretaris'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['NIPPembimbing'])->row_array()['QRCode'];
		$this->load->view('PersetujuanUjianProposal',$Data);
	}

	public function PersetujuanUjianSkripsi(){
		$this->load->library('Pdf');
		$Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa WHERE NIM = ".$this->session->userdata('NIM'))->row_array();
		$Tanggal = explode("-",$Data['Mhs']['TanggalUjianSkripsi']);$Data['Tanggal'] = $Tanggal[2].' - '.$Tanggal[1].' - '.$Tanggal[0];
		$Data['Ketua'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiSkripsi1'])->row_array()['QRCode'];
		$Data['Anggota'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiSkripsi2'])->row_array()['QRCode'];
		$Data['NamaKetua'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiSkripsi1'])->row_array()['Nama'];
		$Data['NamaAnggota'] = $this->db->query("SELECT Nama FROM Dosen WHERE NIP = ".$Data['Mhs']['PengujiSkripsi2'])->row_array()['Nama'];
		$Data['Sekretaris'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['NIPPembimbing'])->row_array()['QRCode'];
		$this->load->view('PersetujuanUjianSkripsi',$Data);
	}
	
	public function KartuBimbingan(){
		$this->load->library('Pdf');
		$Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa WHERE NIM = ".$this->session->userdata('NIM'))->row_array();
		$Data['Bimbingan'] = $this->db->query("SELECT TanggalBimbingan,PoinBimbingan FROM bimbingan WHERE NIM = ".$this->session->userdata('NIM'))->result_array();
		$Awal = explode("-",$Data['Bimbingan'][0]['TanggalBimbingan']);$Data['Awal'] = $Awal[2].' - '.$Awal[1].' - '.$Awal[0];
		$Akhir = explode("-",$Data['Bimbingan'][count($Data['Bimbingan'])-1]['TanggalBimbingan']);$Data['Akhir'] = $Akhir[2].' - '.$Akhir[1].' - '.$Akhir[0];
		$Data['QRCode'] = $this->db->query("SELECT QRCode FROM Dosen WHERE NIP = ".$Data['Mhs']['NIPPembimbing'])->row_array()['QRCode'];
		$this->load->view('KartuBimbingan',$Data);
  }

	public function InputBimbingan(){
		$NamaFileBimbingan = date('Ymd',time()).substr(password_hash('FileBimbingan', PASSWORD_DEFAULT),7,7);
		$NamaFileBimbingan = str_replace("/","E",$NamaFileBimbingan);
		$NamaFileBimbingan = str_replace(".","F",$NamaFileBimbingan);
		move_uploaded_file($_FILES['FileBimbingan']['tmp_name'], "Proposal/".$NamaFileBimbingan.".pdf");
		$_POST['FileBimbingan'] = $NamaFileBimbingan.".pdf";
		$_POST['NIM'] = $this->session->userdata('NIM');
		$this->db->insert('bimbingan',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menyimpan Data!';
		}
	}

	public function EditBimbingan(){
		if (count($_FILES) == 0) {
      $this->db->where('Id', $_POST['Id']);
			$this->db->update('bimbingan',$_POST);
			echo '1';
    } else if (count($_FILES) > 0) {
      if (!empty($_POST['_FileBimbingan_'])) {
				unlink('Proposal/'.$_POST['_FileBimbingan_']);
				unset($_POST['_FileBimbingan_']);
				$NamaFileBimbingan = date('Ymd',time()).substr(password_hash('FileBimbingan', PASSWORD_DEFAULT),7,7);
				$NamaFileBimbingan = str_replace("/","E",$NamaFileBimbingan);
				$NamaFileBimbingan = str_replace(".","F",$NamaFileBimbingan);
				move_uploaded_file($_FILES['FileBimbingan']['tmp_name'], "Proposal/".$NamaFileBimbingan.".pdf");
				$_POST['FileBimbingan'] = $NamaFileBimbingan.".pdf";
			}
			$this->db->where('Id', $_POST['Id']);
			$this->db->update('bimbingan',$_POST);
			echo '1';
		}
	}

	public function HapusBimbingan(){
		$this->db->delete('bimbingan', array('Id' => $_POST['Id']));
		if ($this->db->affected_rows()){
			unlink('Proposal/'.$_POST['FileBimbingan']);
			echo '1';
		} else {
			echo 'Gagal Menghapus';
		}
	}

	public function InputProposal(){
		$NamaPersetujuanJudul = date('Ymd',time()).substr(password_hash('PersetujuanJudul', PASSWORD_DEFAULT),7,7);
		$NamaPersetujuanJudul = str_replace("/","E",$NamaPersetujuanJudul);
		$NamaPersetujuanJudul = str_replace(".","F",$NamaPersetujuanJudul);
		move_uploaded_file($_FILES['PersetujuanJudul']['tmp_name'], "Proposal/".$NamaPersetujuanJudul.".pdf");
		$_POST['PersetujuanJudul'] = $NamaPersetujuanJudul.".pdf";
		$NamaKRS = date('Ymd',time()).substr(password_hash('KRS', PASSWORD_DEFAULT),7,7);
		$NamaKRS = str_replace("/","E",$NamaKRS);
		$NamaKRS = str_replace(".","F",$NamaKRS);
		move_uploaded_file($_FILES['KRS']['tmp_name'], "Proposal/".$NamaKRS.".pdf");
		$_POST['KRS'] = $NamaKRS.".pdf";
		$NamaTranskrip = date('Ymd',time()).substr(password_hash('Transkrip', PASSWORD_DEFAULT),7,7);
		$NamaTranskrip = str_replace("/","E",$NamaTranskrip);
		$NamaTranskrip = str_replace(".","F",$NamaTranskrip);
		move_uploaded_file($_FILES['Transkrip']['tmp_name'], "Proposal/".$NamaTranskrip.".pdf");
		$_POST['Transkrip'] = $NamaTranskrip.".pdf";
		$NamaProposal = date('Ymd',time()).substr(password_hash('Proposal', PASSWORD_DEFAULT),7,7);
		$NamaProposal = str_replace("/","E",$NamaProposal);
		$NamaProposal = str_replace(".","F",$NamaProposal);
		move_uploaded_file($_FILES['DraftProposal']['tmp_name'], "Proposal/".$NamaProposal.".pdf");
		$_POST['DraftProposal'] = $NamaProposal.".pdf";
		$_POST['TanggalProposal'] = date("Y-m-d");
		$_POST['StatusProposal'] = 'Diajukan';
		$this->db->where('NIM', $this->session->userdata('NIM'));
		$this->db->update('mahasiswa',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menyimpan Data!';
		}
	}

	public function EditProposal(){
		if (count($_FILES) == 0) {
      $this->db->where('NIM', $this->session->userdata('NIM'));
			$this->db->update('mahasiswa',$_POST);
			echo '1';
    } else if (count($_FILES) > 0) {
			if (!empty($_POST['_PersetujuanJudul_'])) {
				unlink('Proposal/'.$_POST['_PersetujuanJudul_']);
				unset($_POST['_PersetujuanJudul_']);
				$NamaPersetujuanJudul = date('Ymd',time()).substr(password_hash('PersetujuanJudul', PASSWORD_DEFAULT),7,7);
				$NamaPersetujuanJudul = str_replace("/","E",$NamaPersetujuanJudul);
				$NamaPersetujuanJudul = str_replace(".","F",$NamaPersetujuanJudul);
				move_uploaded_file($_FILES['PersetujuanJudul']['tmp_name'], "Proposal/".$NamaPersetujuanJudul.".pdf");
				$_POST['PersetujuanJudul'] = $NamaPersetujuanJudul.".pdf";
			}
      if (!empty($_POST['_KRS_'])) {
				unlink('Proposal/'.$_POST['_KRS_']);
				unset($_POST['_KRS_']);
				$NamaKRS = date('Ymd',time()).substr(password_hash('KRS', PASSWORD_DEFAULT),7,7);
				$NamaKRS = str_replace("/","E",$NamaKRS);
				$NamaKRS = str_replace(".","F",$NamaKRS);
				move_uploaded_file($_FILES['KRS']['tmp_name'], "Proposal/".$NamaKRS.".pdf");
				$_POST['KRS'] = $NamaKRS.".pdf";
			}
			if (!empty($_POST['_Transkrip_'])) {
				unlink('Proposal/'.$_POST['_Transkrip_']);
				unset($_POST['_Transkrip_']);
				$NamaTranskrip = date('Ymd',time()).substr(password_hash('Transkrip', PASSWORD_DEFAULT),7,7);
				$NamaTranskrip = str_replace("/","E",$NamaTranskrip);
				$NamaTranskrip = str_replace(".","F",$NamaTranskrip);
				move_uploaded_file($_FILES['Transkrip']['tmp_name'], "Proposal/".$NamaTranskrip.".pdf");
				$_POST['Transkrip'] = $NamaTranskrip.".pdf";
			}
			if (!empty($_POST['_DraftPoposal_'])) {
				unlink('Proposal/'.$_POST['_DraftPoposal_']);
				unset($_POST['_DraftPoposal_']);
				$NamaProposal = date('Ymd',time()).substr(password_hash('Proposal', PASSWORD_DEFAULT),7,7);
				$NamaProposal = str_replace("/","E",$NamaProposal);
				$NamaProposal = str_replace(".","F",$NamaProposal);
				move_uploaded_file($_FILES['DraftProposal']['tmp_name'], "Proposal/".$NamaProposal.".pdf");
				$_POST['DraftProposal'] = $NamaProposal.".pdf";
      }
			$this->db->where('NIM', $this->session->userdata('NIM'));
			$this->db->update('mahasiswa',$_POST);
			echo '1';
		}
	}

	public function AjukanProposal(){
		if (count($_FILES) == 0) {
			$this->db->where('NIM', $this->session->userdata('NIM'));
			$_POST['StatusProposal'] = 'Diajukan';
			$this->db->update('mahasiswa',$_POST);
			echo '1';
    } else if (count($_FILES) > 0) {
			if (!empty($_POST['_PersetujuanJudul_'])) {
				unlink('Proposal/'.$_POST['_PersetujuanJudul_']);
				unset($_POST['_PersetujuanJudul_']);
				$NamaPersetujuanJudul = date('Ymd',time()).substr(password_hash('PersetujuanJudul', PASSWORD_DEFAULT),7,7);
				$NamaPersetujuanJudul = str_replace("/","E",$NamaPersetujuanJudul);
				$NamaPersetujuanJudul = str_replace(".","F",$NamaPersetujuanJudul);
				move_uploaded_file($_FILES['PersetujuanJudul']['tmp_name'], "Proposal/".$NamaPersetujuanJudul.".pdf");
				$_POST['PersetujuanJudul'] = $NamaPersetujuanJudul.".pdf";
			}
      if (!empty($_POST['_KRS_'])) {
				unlink('Proposal/'.$_POST['_KRS_']);
				unset($_POST['_KRS_']);
				$NamaKRS = date('Ymd',time()).substr(password_hash('KRS', PASSWORD_DEFAULT),7,7);
				$NamaKRS = str_replace("/","E",$NamaKRS);
				$NamaKRS = str_replace(".","F",$NamaKRS);
				move_uploaded_file($_FILES['KRS']['tmp_name'], "Proposal/".$NamaKRS.".pdf");
				$_POST['KRS'] = $NamaKRS.".pdf";
			}
			if (!empty($_POST['_Transkrip_'])) {
				unlink('Proposal/'.$_POST['_Transkrip_']);
				unset($_POST['_Transkrip_']);
				$NamaTranskrip = date('Ymd',time()).substr(password_hash('Transkrip', PASSWORD_DEFAULT),7,7);
				$NamaTranskrip = str_replace("/","E",$NamaTranskrip);
				$NamaTranskrip = str_replace(".","F",$NamaTranskrip);
				move_uploaded_file($_FILES['Transkrip']['tmp_name'], "Proposal/".$NamaTranskrip.".pdf");
				$_POST['Transkrip'] = $NamaTranskrip.".pdf";
			}
			if (!empty($_POST['_DraftPoposal_'])) {
				unlink('Proposal/'.$_POST['_DraftPoposal_']);
				unset($_POST['_DraftPoposal_']);
				$NamaProposal = date('Ymd',time()).substr(password_hash('Proposal', PASSWORD_DEFAULT),7,7);
				$NamaProposal = str_replace("/","E",$NamaProposal);
				$NamaProposal = str_replace(".","F",$NamaProposal);
				move_uploaded_file($_FILES['DraftProposal']['tmp_name'], "Proposal/".$NamaProposal.".pdf");
				$_POST['DraftProposal'] = $NamaProposal.".pdf";
			}
			$_POST['TanggalProposal'] = date("Y-m-d");
			$_POST['StatusProposal'] = 'Diajukan';
			$this->db->where('NIM', $this->session->userdata('NIM'));
			$this->db->update('mahasiswa',$_POST);
			echo '1';
		}
	}

	public function ListRPS(){
		$Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa WHERE NIM = ".$this->session->userdata('NIM'))->row_array();
		$Data['RPS'] = $this->db->query('SELECT rps.KodeMK,rps.NamaMK,rps.BobotMK,rps.Semester,mengajar.Status,mengajar.Tahun FROM rps,mengajar WHERE mengajar.KodeMK=rps.KodeMK AND mengajar.Status=3 GROUP BY mengajar.KodeMK')->result_array();
    $this->load->view('Mhs/Header',$Data);
    $this->load->view('Mhs/ListRPS',$Data); 
	}
}