<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller {

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
		$this->db->update('RencanaPendidikan', 
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
		$KreditBkd = '';
		$Cek = True;
		if ($_POST['IdKegiatan'] == 'PND1') {
			$Satuan = '1/periode penilaian'; $Volume = $_POST['Volume'];  $JumlahKredit = $_POST['Volume']*$_POST['KreditPND1']; $Kredit = $_POST['KreditPND1'];
		}
		else if ($_POST['IdKegiatan'] == 'PND2') {
			$Satuan = ''; $Volume = $_POST['Volume']; $JumlahKredit = $_POST['Volume']*3; $Kredit = '3';
		}
		else if ($_POST['IdKegiatan'] == 'PND3') { 
			$Satuan = '10 sks Pertama';$Kredit = '1';$JumlahKredit = $_POST['KreditPAK'];$Volume = $_POST['Volume'];$KreditBkd = $_POST['KreditBKD'];
		}
		else if ($_POST['IdKegiatan'] == 'PND4') {
			$Satuan = ''; $Volume = $KreditBkd = $JumlahKredit = $Kredit = '1';
		}
		else if ($_POST['IdKegiatan'] == 'PND5') {
			$Satuan = ''; $Volume = $JumlahKredit = $Kredit = '1'; $KreditBkd = $_POST['KreditBKD'];
		}
		else if ($_POST['IdKegiatan'] == 'PND6') {
			$Volume = $_POST['Volume'];
			if ($_POST['JenisPembimbing'] == '1') {
				if ($_POST['JenisBimbingan'] == '1') {
					if ($this->db->query("SELECT * FROM `realisasipendidikan` WHERE NIP=".$NIP." AND IdKegiatan='PND6' AND Semester="."'".$_POST['Semester']."'"." AND Tahun=".$_POST['Tahun']." AND Kode LIKE '1/1/%'")->row_array()['Volume'] > 4 || $_POST['Volume'] > 4) {
						$Satuan = '4 lulusan / semester';
						$JumlahKredit = $_POST['Volume']*2;
						$Kredit = '8';
						$KreditBkd = '';
					} else {
						$Cek = false;
						echo 'Maksimal 4 lulusan / semester';
					}
				}
				else if ($_POST['JenisBimbingan'] == '2') {
					$Satuan = '6 lulusan / semester';
					$_POST['Volume'] > 6 ? $JumlahKredit = 3 : $JumlahKredit = $_POST['Volume']*0.5;
					$Kredit = '3';
					if ($_POST['Volume'] == 2) {
						$KreditBkd = 0.5;
					} else {
						$KreditBkd = round(($_POST['Volume']/3),2);
					}
				}
				else if ($_POST['JenisBimbingan'] == '3') {
					$Satuan = '8 lulusan / semester';
					$_POST['Volume'] > 8 ? $JumlahKredit = 1 : $JumlahKredit = $_POST['Volume']*0.125;
					$Kredit = '1';
					$KreditBkd = round(($_POST['Volume']/6),2);
				}
			}
			else {
				if ($_POST['JenisBimbingan'] == '1') {
					$Satuan = '4 lulusan / semester';
					$_POST['Volume'] > 4 ? $JumlahKredit = 6 : $JumlahKredit = $_POST['Volume']*1.5;
					$Kredit = '6';
					$KreditBkd = '';
				}
				else if ($_POST['JenisBimbingan'] == '2') {
					$Satuan = '6 lulusan / semester';
					$_POST['Volume'] > 6 ? $JumlahKredit = 2 : $JumlahKredit = round($_POST['Volume']/3,2);
					$Kredit = '2';
					if ($_POST['Volume'] == 2) {
						$KreditBkd = 0.5;
					} else {
						$KreditBkd = round(($_POST['Volume']/3),2);
					}
				}
				else if ($_POST['JenisBimbingan'] == '3') {
					$Satuan = '8 lulusan / semester';
					$_POST['Volume'] > 8 ? $JumlahKredit = 0.5 : $JumlahKredit = $_POST['Volume']*0.0625;
					$Kredit = '0.5';
					$KreditBkd = round(($_POST['Volume']/6),2);
				}
			}
		}
		else if ($_POST['IdKegiatan'] == 'PND7') {
			$Volume = $_POST['Volume'];
			if ($_POST['JenisPenguji'] == '1') {
				$Satuan = '4 lulusan / semester';
				$_POST['Volume'] > 4 ? $JumlahKredit = 1 : $JumlahKredit = $_POST['Volume']*0.25;
				$Kredit = '1';
			}
			else {
				$Satuan = '8 lulusan / semester';
				$_POST['Volume'] > 8 ? $JumlahKredit = 0.5 : $JumlahKredit = $_POST['Volume']*0.0625;
				$Kredit = '0.5';
			}
			$_POST['JenisUjian'] == '1' ? $KreditBkd = round(($_POST['Volume']/4),2) : $KreditBkd = round(($_POST['Volume']/3),2);
		}
		else if ($_POST['IdKegiatan'] == 'PND8') {
			$Volume = $_POST['Volume'];
			$Satuan = '2 kegiatan / semester';
			$_POST['Volume'] > 2 ? $JumlahKredit = 2 : $JumlahKredit = $_POST['Volume'];
			$Kredit = '2';
			$KreditBkd = '';
		}
		else if ($_POST['IdKegiatan'] == 'PND9') {
			$Volume = $_POST['Volume'];
			$Satuan = '1 mata kuliah / semester';
			$JumlahKredit = 2;
			$Kredit = '2';
			$KreditBkd = '2';
		}
		else if ($_POST['IdKegiatan'] == 'PND10') {
			$Volume = $_POST['Volume'];
			if ($_POST['BahanPengajaran'] == '1') {
				$Satuan = '1 buku/tahun';
				$JumlahKredit = 20;
				$Kredit = '20';
			}
			else {
				$Satuan = '1 produk  / semester';
				$JumlahKredit = 5;
				$Kredit = '5';
			}
			$KreditBkd = '2';
		}
		else if ($_POST['IdKegiatan'] == 'PND11') {
			$Volume = $_POST['Volume'];
			$Satuan = '2 orasi / semester';
			$_POST['Volume'] > 2 ? $JumlahKredit = 5 : $JumlahKredit = $_POST['Volume']*2.5;
			$Kredit = '5';
			if ($Jabatan == 'Profesor') {
				if ($_POST['TingkatOrasi'] == '1') {
					$KreditBkd = '3';
				} else if ($_POST['TingkatOrasi'] == '2') {
					$KreditBkd = '5';
				} else if ($_POST['TingkatOrasi'] == '3') {
					$KreditBkd = '6';
				}
			} else {
				$KreditBkd = '1';
			}
		}
		else if ($_POST['IdKegiatan'] == 'PND12') {
			$Volume = $_POST['Volume'];
			$Satuan = '1 jabatan / semester';
			$JumlahKredit = $_POST['JenisPND12'];
			$Kredit = $_POST['JenisPND12'];
			$KreditBkd = $_POST['KreditBKD'];
		}
		else if ($_POST['IdKegiatan'] == 'PND13') {
			$Volume = $_POST['Volume'];
			if ($_POST['JenisPND13'] == '1') {
				$Satuan = '1 Orang';
				$JumlahKredit = 2;
				$Kredit = '2';
			}
			else {
				$Satuan = '1 Orang';
				$JumlahKredit = 1;
				$Kredit = '1';
			}
			$KreditBkd = $_POST['Volume']/4;
		}
		else if ($_POST['IdKegiatan'] == 'PND14') {
			$Volume = $_POST['Volume'];
			if ($_POST['JenisPND14'] == '1') {
				$Satuan = '1 Orang';
				$JumlahKredit = 5;
				$Kredit = '5';
			}
			else {
				$Satuan = '1 Orang';
				$JumlahKredit = 4;
				$Kredit = '4';
			}
			$KreditBkd = '';
		}
		else if ($_POST['IdKegiatan'] == 'PND15') {
			$Volume = $_POST['Volume'];
			$Satuan = '';
			$JumlahKredit = $_POST['JenisPND15'];
			$Kredit = $_POST['JenisPND15'];
			$KreditBkd = '1';
		}
		else if ($_POST['IdKegiatan'] == 'PND16') {
			$Volume = $_POST['Volume'];
			$Satuan = '';
			$JumlahKredit = '';
			$Kredit = '';
			$KreditBkd = $_POST['KreditBKD'];
		}
		else if ($_POST['IdKegiatan'] == 'PND17') {
			$Volume = $_POST['Volume'];
			$Satuan = '';
			$JumlahKredit = '';
			$Kredit = '';
			$KreditBkd = $_POST['KreditBKD']*$Volume;
		}
		else if ($_POST['IdKegiatan'] == 'PND18' || $_POST['IdKegiatan'] == 'PND19') {
			$Volume = $_POST['Volume'];
			$Satuan = '';
			$JumlahKredit = '';
			$Kredit = '';
			$KreditBkd = $_POST['Volume']*0.2;
		}
		if ($Cek) {
			$Pdf = count($_FILES);
			if ($Pdf > 0) {
				if ($this->CekBukti($Pdf)){
					$Tipe = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
					$NamaPdf = date('Ymd',time()).substr(password_hash('Pendidikan', PASSWORD_DEFAULT),7,7);
					$NamaPdf = str_replace("/","E",$NamaPdf);
					$NamaPdf = str_replace(".","F",$NamaPdf);
					move_uploaded_file($_FILES['file']['tmp_name'], "Pendidikan/".$NamaPdf.'.'.$Tipe);
					$this->db->insert('RealisasiPendidikan',
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
														'Satuan' => $Satuan,
														'Volume' => $Volume,
														'Kredit' => $Kredit,
														'JumlahKredit' => floatval(number_format((float)$JumlahKredit,2)),
														'KreditBkd' => floatval(number_format((float)$KreditBkd,2)),
														'Bukti' => $NamaPdf.'.'.$Tipe));
					if ($this->db->affected_rows()){
						$this->session->set_userdata('IdKegiatanPendidikan', $_POST['IdKegiatan']);
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
	}

	public function CekBukti($file){
		$Tipe = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
		$valid_extensions = array("pdf");
		if(!in_array(strtolower($Tipe),$valid_extensions)) {
			return false;
		} 
		return true;
	}

	public function EditRealisasi(){
		$Pdf = count($_FILES);
		if ($Pdf > 0) {
			if ($this->CekBukti($Pdf)){
				$Tipe = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
				$NamaPdf = date('Ymd',time()).substr(password_hash('Pendidikan', PASSWORD_DEFAULT),7,7);
				$NamaPdf = str_replace("/","F",$NamaPdf);
				$NamaPdf = str_replace(".","F",$NamaPdf);
				move_uploaded_file($_FILES['file']['tmp_name'], "Pendidikan/".$NamaPdf.'.'.$Tipe);
				if($_POST['Bukti'] != ''){
					unlink('Pendidikan/'.$_POST['Bukti']);
				}
				$this->db->where('No', $_POST['No']);
				$this->db->update('RealisasiPendidikan',
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
			$this->db->update('RealisasiPendidikan',
										array('Jenjang' => $_POST['Homebase'], 
													'Semester' => $_POST['Semester'], 
													'Tahun' => $_POST['Tahun'], 
													'SK' => htmlentities($_POST['SK']),
													'Kegiatan' => htmlentities($_POST['Kegiatan']),
													'TanggalKegiatan' => htmlentities($_POST['TanggalKegiatan'])));
			echo '1';
		}
	}

	public function HapusRealisasi(){
		$this->db->delete('RealisasiPendidikan', array('No' => $_POST['No']));
		if($_POST['Bukti'] != ''){
			unlink('Pendidikan/'.$_POST['Bukti']);
		}
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Menghapus';
		}
	}
}