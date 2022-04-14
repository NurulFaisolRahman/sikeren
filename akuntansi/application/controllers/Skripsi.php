<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Skripsi extends CI_Controller {
 
  public function Daftar(){ 
    $this->load->view('DaftarSkripsi');
	}

	public function InputNilai($NIM){ 
		if($this->db->get_where("Skripsi", array('NIM' => $NIM))->num_rows() === 0){
			echo "<script>alert('Data NIM ".$NIM." Tidak Ditemukan!')</script>";
		}
		else {
			$Data['Mhs'] = $this->db->get_where("Skripsi", array('NIM' => $NIM))->row_array();
			$this->load->view('InputNilaiSkripsi',$Data);
		}
    
	}

	public function Nilai(){ 
		$this->load->view('NilaiSkripsi');
	}

	public function LihatNilai(){ 
		if($this->db->get_where("Skripsi", array('NIM' => $_POST['NIM']))->num_rows() === 0){
			echo "1";
		}
		else {
			echo json_encode($this->db->get_where("Skripsi", array('NIM' => $_POST['NIM']))->row_array());
		}
	}

	public function InputMahasiswa(){
		if($this->db->get_where("Skripsi", array('NIM' => $_POST['NIM']))->num_rows() === 0){
			$this->db->insert("Skripsi",$_POST);
			if ($this->db->affected_rows()){
				echo '1';
			} else {
				echo 'Gagal Menyimpnan';
			}
		}
		else {
			echo 'Data NIM '.$_POST['NIM'].' Sudah Terdaftar!';
		}
	}

	public function Update(){
		$this->db->where('NIM', $_POST['NIM']);
		if ($_POST['Penguji'] == 1) {
			$this->db->update("Skripsi",
			array('Nilai1' => $_POST['Nilai'],
						'Catatan1' => $_POST['Catatan']));
		} else if ($_POST['Penguji'] == 2) {
			$this->db->update("Skripsi",
			array('Nilai2' => $_POST['Nilai'],
						'Catatan2' => $_POST['Catatan']));
		} else {
			$this->db->update("Skripsi",
			array('Nilai3' => $_POST['Nilai'],
						'Catatan3' => $_POST['Catatan']));
		}		
		echo '1';
	}
}