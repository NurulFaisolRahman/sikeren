<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengabdian extends CI_Controller {

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
		$this->db->update('RencanaPengabdian', 
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
		if ($_POST['IdKegiatan'] == 'PNB1') {
			$JumlahKredit = 5.5;
			$Kredit = 5.5;
		}
		else if ($_POST['IdKegiatan'] == 'PNB2') {
			$JumlahKredit = 3;
			$Kredit = 3;
		}
		else if ($_POST['IdKegiatan'] == 'PNB3') {
			if ($_POST['Kode'] == '1') {
				$JumlahKredit = 4;
				$Kredit = 4;
			}
			else if ($_POST['Kode'] == '2') {
				$JumlahKredit = 3;
				$Kredit = 3;
			}
			else if ($_POST['Kode'] == '3') {
				$JumlahKredit = 2;
				$Kredit = 2;
			}
			else if ($_POST['Kode'] == '4') {
				$JumlahKredit = 3;
				$Kredit = 3;
			}
			else if ($_POST['Kode'] == '5') {
				$JumlahKredit = 2;
				$Kredit = 2;
			}
			else {
				$JumlahKredit = 1;
				$Kredit = 1;
			}
			$Jabatan == 'Profesor' ? $KreditBkd = '3' : $KreditBkd = '0.2';
		}
		else if ($_POST['IdKegiatan'] == 'PNB4') {
			if ($_POST['Kode'] == '1') {
				$JumlahKredit = 1.5;
				$Kredit = 1.5;
			}
			else if ($_POST['Kode'] == '2') {
				$JumlahKredit = 1;
				$Kredit = 1;
			}
			else if ($_POST['Kode'] == '3') {
				$JumlahKredit = 0.5;
				$Kredit = 0.5;
			}
			$KreditBkd = '0.2';
		}
		else if ($_POST['IdKegiatan'] == 'PNB5') {
			$JumlahKredit = 3;
			$Kredit = 3;
			$KreditBkd = $_POST['KreditBKD'];
		}
		else if ($_POST['IdKegiatan'] == 'PNB6') {
			$JumlahKredit = 5;
			$Kredit = 5;
		}
		else if ($_POST['IdKegiatan'] == 'PNB7') {
			if ($_POST['Kode'] == '1') {
				$JumlahKredit = 1;
				$Kredit = 1;
			}
			else if ($_POST['Kode'] == '2') {
				$JumlahKredit = 0.5;
				$Kredit = 0.5;
			}
		}
		else if ($_POST['IdKegiatan'] == 'PNB8') {
			$JumlahKredit = $Kredit = '';
			$KreditBkd = $_POST['Proposal'];
		}
		else if ($_POST['IdKegiatan'] == 'PNB9') {
			$JumlahKredit = $Kredit = '';
			$KreditBkd = '0.2';
		}
		else if ($_POST['IdKegiatan'] == 'PNB10') {
			$JumlahKredit = $Kredit = '';
			$KreditBkd = $_POST['KreditBKD'];
		}
		$Pdf = count($_FILES);
		if ($Pdf > 0) {
			if ($this->CekBukti($Pdf)){
				$Tipe = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
				$NamaPdf = date('Ymd',time()).substr(password_hash('Pengabdian', PASSWORD_DEFAULT),7,7);
				$NamaPdf = str_replace("/","F",$NamaPdf);
				$NamaPdf = str_replace(".","F",$NamaPdf);
				move_uploaded_file($_FILES['file']['tmp_name'], "Pengabdian/".$NamaPdf.'.'.$Tipe);
				$this->db->insert('RealisasiPengabdian',
										array('NIP' => $NIP, 
													'Jabatan' => $Jabatan, 
													'Jenjang' => $_POST['Homebase'], 
													'Semester' => $_POST['Semester'], 
													'Tahun' => $_POST['Tahun'], 
													'IdKegiatan' => $_POST['IdKegiatan'],
													'Kode' => $_POST['Kode'].'/'.$_POST['Biaya'],
													'SK' => htmlentities($_POST['SK']),
													'Kegiatan' => htmlentities($_POST['Kegiatan']),
													'TanggalKegiatan' => htmlentities($_POST['TanggalKegiatan']),
													'Volume' => $Volume,
													'Kredit' => $Kredit,
													'JumlahKredit' => floatval(number_format($JumlahKredit,2)),
													'KreditBkd' => floatval(number_format($KreditBkd,2)),
													'Bukti' => $NamaPdf.'.'.$Tipe));
				if ($this->db->affected_rows()){
					$this->session->set_userdata('IdKegiatanPengabdian', $_POST['IdKegiatan']);
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
				$NamaPdf = date('Ymd',time()).substr(password_hash('Pengabdian', PASSWORD_DEFAULT),7,7);
				$NamaPdf = str_replace("/","F",$NamaPdf);
				$NamaPdf = str_replace(".","F",$NamaPdf);
				move_uploaded_file($_FILES['file']['tmp_name'], "Pengabdian/".$NamaPdf.'.'.$Tipe);
				if($_POST['Bukti'] != ''){
					unlink('Pengabdian/'.$_POST['Bukti']);
				}
				$this->db->where('No', $_POST['No']);
				$this->db->update('RealisasiPengabdian',
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
			$this->db->update('RealisasiPengabdian',
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
		$this->db->delete('RealisasiPengabdian', array('No' => $_POST['No']));
		if($_POST['Bukti'] != ''){
			unlink('Pengabdian/'.$_POST['Bukti']);
		}
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menghapus';
		}
	}
}