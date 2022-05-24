<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mhs extends CI_Controller {

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('AkunMhs') != 'Mhs') {
			redirect(base_url('SMD/SIDP'));
		} 
	}
 
  public function Profil(){ 
		// $Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa")->result_array();
		$this->load->view('Mhs/Header'); 
		$this->load->view('Mhs/Profil'); 
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
		$NamaFoto = date('Ymd',time()).substr(password_hash('Foto', PASSWORD_DEFAULT),7,3).'.'.$Tipe;
		$NamaFoto = str_replace("/","E",$NamaFoto);
		$NamaFoto = str_replace(".","F",$NamaFoto);
		move_uploaded_file($_FILES['Foto']['tmp_name'], "FotoMhs/".$NamaFoto);
		if ($_POST['NamaFoto'] != '') { unlink('FotoDosen/'.$_POST['NamaFoto']); }
		$this->db->where('NIM', $this->session->userdata('NIM'));
		$this->db->update('mahasiswa',array('Foto' => $NamaFoto));
	}

	public function PersetujuanPembimbing(){
		$this->load->library('Pdf');
		$Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa WHERE NIM = ".$this->session->userdata('NIM'))->row_array();
		$Data['QRCode'] = $this->db->query("SELECT QRCode FROM dosen WHERE NIP = ".explode("$",$Data['Mhs']['DosenPembimbing'])[0])->row_array()['QRCode'];
		$this->load->view('PersetujuanPembimbing',$Data);
	}
	
	public function KartuBimbingan(){
		$this->load->library('Pdf');
		$Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa WHERE NIM = ".$this->session->userdata('NIM'))->row_array();
		$Data['Bimbingan'] = $this->db->query("SELECT TanggalBimbingan,PoinBimbingan FROM bimbingan WHERE NIM = ".$this->session->userdata('NIM'))->result_array();
		$Awal = explode("-",$Data['Bimbingan'][0]['TanggalBimbingan']);$Data['Awal'] = $Awal[2].'-'.$Awal[1].'-'.$Awal[0];
		$Akhir = explode("-",$Data['Bimbingan'][count($Data['Bimbingan'])-1]['TanggalBimbingan']);$Data['Akhir'] = $Akhir[2].'-'.$Akhir[1].'-'.$Akhir[0];
		$DosenPembimbing = $this->db->query("SELECT DosenPembimbing FROM mahasiswa WHERE NIM = ".$this->session->userdata('NIM'))->row_array()['DosenPembimbing'];
		$Data['NIP'] = explode("$",$DosenPembimbing)[0];$Data['DosenPembimbing'] = explode("$",$DosenPembimbing)[1];
		$Data['QRCode'] = $this->db->query("SELECT QRCode FROM dosen WHERE NIP = ".explode("$",$Data['Mhs']['DosenPembimbing'])[0])->row_array()['QRCode'];
		$this->load->view('KartuBimbingan',$Data);
  }

	public function DosPem(){ 
		$Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa WHERE NIM = ".$this->session->userdata('NIM'))->row_array();
		$Data['Bimbingan'] = $this->db->query("SELECT * FROM bimbingan WHERE NIM = ".$this->session->userdata('NIM'))->result_array();
		$this->load->view('Mhs/Header',$Data); 
		$this->load->view('Mhs/DosPem',$Data); 
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
			$_POST['StatusProposal'] = 'Diajukan';
			$this->db->where('NIM', $this->session->userdata('NIM'));
			$this->db->update('mahasiswa',$_POST);
			echo '1';
		}
	}
}