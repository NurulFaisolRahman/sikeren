<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Mhs extends CI_Controller {

	function __construct(){
		parent::__construct();
		if ($this->session->userdata('Akun') != 'Mhs') {
			redirect(base_url('SMD/SIDP'));
		} 
	}
 
  public function Profil(){ 
		// $Data['Mhs'] = $this->db->query("SELECT * FROM mahasiswa")->result_array();
		$this->load->view('Mhs/Header'); 
		$this->load->view('Mhs/Profil'); 
	}

	public function DosPem(){ 
		$this->load->view('Mhs/Header'); 
		$this->load->view('Mhs/DosPem'); 
	}

	public function InputProposal(){
		$this->db->insert('mahasiswa',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menyimpnan Data!';
		}
	}

	public function EditProposal(){
		$this->db->where('NIM', $_POST['NIM']);
		$this->db->update('mahasiswa');
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Update Data!';
		}
	}

	public function HapusProposal(){
		$this->db->delete('mahasiswa', array('NIM' => $_POST['NIM']));
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menghapus Data!';
		}
	}
}