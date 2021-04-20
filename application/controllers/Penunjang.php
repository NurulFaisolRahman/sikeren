<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penunjang extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('Akun') != 'Dosen'){
			if ($this->session->userdata('Akun') == 'Admin') {
				redirect(base_url('Admin/AkunDosen'));
			} 
			else {
				redirect(base_url());
			}
		}
	}

	public function EditRencana(){		
		$this->db->where('No', $_POST['No']);
		$this->db->update('RencanaPenunjang', 
								array('Jenjang' => $_POST['Jenjang'],
											'Semester' => $_POST['Semester'],
											'Tahun' => $_POST['Tahun'],
											'KodeRencana' => $_POST['Kode'],
											'TotalKredit' => $_POST['Total']));
		echo '1';
	}

	public function InputRealisasi(){
		$NIP = $this->session->userdata('NIP');
		$Jabatan = $this->session->userdata('Jabatan');
		$Volume = $_POST['Volume'];
		$KreditBkd = '';
		if ($_POST['IdKegiatan'] == 'PNJ1') {
			if ($_POST['Kode'] == '1') {
				$JumlahKredit = 3;
				$Kredit = 3;
			}
			else if ($_POST['Kode'] == '2') {
				$JumlahKredit = 2;
				$Kredit = 2;
			}
		}
		else if ($_POST['IdKegiatan'] == 'PNJ2') {
			if ($_POST['Kode'] == '1') {
				$JumlahKredit = 3;
				$Kredit = 3;
			}
			else if ($_POST['Kode'] == '2') {
				$JumlahKredit = 2;
				$Kredit = 2;
			} 
			else if ($_POST['Kode'] == '3') {
				$JumlahKredit = 2;
				$Kredit = 2;
			}
			else if ($_POST['Kode'] == '4') {
				$JumlahKredit = 1;
				$Kredit = 1;
			}
		}
		else if ($_POST['IdKegiatan'] == 'PNJ3') {
			if ($_POST['Kode'] == '1') {
				$JumlahKredit = 2;
				$Kredit = 2;
			}
			else if ($_POST['Kode'] == '2') {
				$JumlahKredit = 1;
				$Kredit = 1;
			}
			else if ($_POST['Kode'] == '3') {
				$JumlahKredit = 0.5;
				$Kredit = 0.5;
			}
			else if ($_POST['Kode'] == '4') {
				$JumlahKredit = 1.5;
				$Kredit = 1.5;
			}
			else if ($_POST['Kode'] == '5') {
				$JumlahKredit = 1;
				$Kredit = 1;
			}
			else {
				$JumlahKredit = 0.5;
				$Kredit = 0.5;
			}
		}
		else if ($_POST['IdKegiatan'] == 'PNJ4') {
			$JumlahKredit = 1;
			$Kredit = 1;
		}
		else if ($_POST['IdKegiatan'] == 'PNJ5') {
			if ($_POST['Kode'] == '1') {
				$JumlahKredit = 3;
				$Kredit = 3;
			}
			else if ($_POST['Kode'] == '2') {
				$JumlahKredit = 2;
				$Kredit = 2;
			}
		}
		else if ($_POST['IdKegiatan'] == 'PNJ6') {
			if ($_POST['Kode'] < 4) {
				$JumlahKredit = 3;
				$Kredit = 3;
			}
			else if ($_POST['Kode'] < 7) {
				$JumlahKredit = 2;
				$Kredit = 2;
			}
			else if ($_POST['Kode'] == 7) {
				$JumlahKredit = 2;
				$Kredit = 2;
			}
			else if ($_POST['Kode'] == 8) {
				$JumlahKredit = 1;
				$Kredit = 1;
			}
		}
		else if ($_POST['IdKegiatan'] == 'PNJ7') {
			if ($_POST['Kode'] == '1') {
				$JumlahKredit = 3;
				$Kredit = 3;
			}
			else if ($_POST['Kode'] == '2') {
				$JumlahKredit = 2;
				$Kredit = 2;
			}
			else if ($_POST['Kode'] == '3') {
				$JumlahKredit = 1;
				$Kredit = 1;
			}
			else if ($_POST['Kode'] == '4') {
				$JumlahKredit = 5;
				$Kredit = 5;
			}
			else if ($_POST['Kode'] == '5') {
				$JumlahKredit = 3;
				$Kredit = 3;
			}
			else {
				$JumlahKredit = 1;
				$Kredit = 1;
			}
		}
		else if ($_POST['IdKegiatan'] == 'PNJ8') {
			$JumlahKredit = 5;
			$Kredit = 5;
		}
		else if ($_POST['IdKegiatan'] == 'PNJ9') {
			if ($_POST['Kode'] == '1') {
				$JumlahKredit = 5;
				$Kredit = 5;
			}
			else if ($_POST['Kode'] == '2') {
				$JumlahKredit = 3;
				$Kredit = 3;
			}
			else {
				$JumlahKredit = 1;
				$Kredit = 1;
			}
		}
		else if ($_POST['IdKegiatan'] == 'PNJ10') {
			$JumlahKredit = 0.5;
			$Kredit = 0.5;
		}
		else if ($_POST['IdKegiatan'] == 'PNJ11') {
			$JumlahKredit = '';
			$Kredit = '';
			$KreditBkd = number_format(($Volume/12),2);
		}
		else if ($_POST['IdKegiatan'] == 'PNJ12') {
			$Volume = 1;
			$JumlahKredit = '';
			$Kredit = '';
			$KreditBkd = $_POST['KreditBKD'];
		}
		$Pdf = count($_FILES);
		if ($Pdf > 0) {
			if ($this->CekBukti($Pdf)){
				$Tipe = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
				$NamaPdf = date('Ymd',time()).substr(password_hash('Penunjang', PASSWORD_DEFAULT),7,7);
				$NamaPdf = str_replace("/","F",$NamaPdf);
				$NamaPdf = str_replace(".","F",$NamaPdf);
				move_uploaded_file($_FILES['file']['tmp_name'], "Penunjang/".$NamaPdf.'.'.$Tipe);
				$this->db->insert('RealisasiPenunjang',
										array('NIP' => $NIP, 
													'Jabatan' => $Jabatan, 
													'Jenjang' => $_POST['Homebase'], 
													'Semester' => $_POST['Semester'], 
													'Tahun' => $_POST['Tahun'], 
													'IdKegiatan' => $_POST['IdKegiatan'],
													'Kode' => $_POST['Kode'],
													'SK' => htmlentities($_POST['SK']),
													'Kegiatan' => htmlentities($_POST['Kegiatan']),
													'TanggalKegiatan' => htmlentities($_POST['TanggalKegiatan']),
													'Volume' => $Volume,
													'Kredit' => $Kredit,
													'JumlahKredit' => number_format((float)$JumlahKredit,2),
													'KreditBkd' => number_format((float)$KreditBkd,2),
													'Bukti' => $NamaPdf.'.'.$Tipe));
				if ($this->db->affected_rows()){
					$this->session->set_userdata('IdKegiatanPenunjang', $_POST['IdKegiatan']);
					echo '1';
				} else {
					echo 'Gagal Menyimpan';
				}
			}
			else {
				echo 'Bukti Hanya Boleh PDF!';
			}
		} 
		else {
			echo 'Wajib Upload Bukti!';
		}
	}

	public function EditRealisasi(){
		$Pdf = count($_FILES);
		if ($Pdf > 0) {
			if ($this->CekBukti($Pdf)){
				$Tipe = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
				$NamaPdf = date('Ymd',time()).substr(password_hash('Penunjang', PASSWORD_DEFAULT),7,7);
				$NamaPdf = str_replace("/","F",$NamaPdf);
				$NamaPdf = str_replace(".","F",$NamaPdf);
				move_uploaded_file($_FILES['file']['tmp_name'], "Penunjang/".$NamaPdf.'.'.$Tipe);
				if($_POST['Bukti'] != ''){
					unlink('Penunjang/'.$_POST['Bukti']);
				}
				$this->db->where('No', $_POST['No']);
				$this->db->update('RealisasiPenunjang',
											array('Jenjang' => $_POST['Homebase'], 
														'Semester' => $_POST['Semester'], 
														'Tahun' => $_POST['Tahun'], 
														'SK' => htmlentities($_POST['SK']),
														'Kegiatan' => htmlentities($_POST['Kegiatan']),
														'TanggalKegiatan' => htmlentities($_POST['TanggalKegiatan']),
														'Bukti' => $NamaPdf.'.'.$Tipe));
				echo '1';
			}
			else {
				echo 'Bukti Hanya Boleh PDF!';
			}
		} 
		else {
			$this->db->where('No', $_POST['No']);
			$this->db->update('RealisasiPenunjang',
										array('Jenjang' => $_POST['Homebase'], 
													'Semester' => $_POST['Semester'], 
													'Tahun' => $_POST['Tahun'], 
													'SK' => htmlentities($_POST['SK']),
													'Kegiatan' => htmlentities($_POST['Kegiatan']),
													'TanggalKegiatan' => htmlentities($_POST['TanggalKegiatan'])));
			echo '1';
		}
	}

	public function CekBukti($file){
		$Tipe = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
		$valid_extensions = array("pdf");
		if(!in_array(strtolower($Tipe),$valid_extensions)) {
			return false;
		} 
		return true;
	}

	public function HapusRealisasi(){
		$this->db->delete('RealisasiPenunjang', array('No' => $_POST['No']));
		if($_POST['Bukti'] != ''){
			unlink('Penunjang/'.$_POST['Bukti']);
		}
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menghapus';
		}
	}
}