<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SMD extends CI_Controller {

	public function index(){
		$this->load->view('Index.php');
	}

	public function RekapSkripsi(){
		$Data['Mhs'] = $this->db->query("SELECT * FROM `mahasiswa` WHERE `TanggalUjianSkripsi` > '2023-07-31' ORDER BY TanggalUjianSkripsi DESC")->result_array();
		$Data['Dosen'] = $this->db->query("SELECT NIP,Nama FROM `Dosen`")->result_array();
		$this->load->view('RekapSkripsi',$Data);
	}

	public function PBM(){
		$Data['PBM'] = $this->db->get('EvaluasiPBM')->result_array();
		$this->load->view('ExcelPBM.php',$Data);
	}

	public function MhsMasuk(){
		$CekLogin = $this->db->get_where('mahasiswa', array('NIM' => htmlentities($_POST['NIM'])));
		if($CekLogin->num_rows() == 0){
			echo "NIM Tidak Terdaftar!";
		}
		else{
			$Akun = $CekLogin->row_array();
			if (password_verify($_POST['Password'], $Akun['Password'])) {
				$Session = array('AkunMhs' => 'Mhs',
												 'NIM' => $_POST['NIM'],
												 'Nama' => $Akun['Nama']);
				$this->session->set_userdata($Session);
				echo '1';
			} else {
				echo "Password Salah!";
			}
		}
	}

	public function CariMahasiswa(){
		$Mhs = $this->db->get_where('mahasiswa', array('NIM' => $_POST['NIM']))->row_array();
		if (isset($Mhs) == 1) {
			if ($Mhs['NilaiSkripsi1'] != '' && $Mhs['NilaiSkripsi2'] != '' && $Mhs['NilaiSkripsi3'] != '') {
				echo $Mhs['Nama'].'|Sudah Ujian Skripsi';	
			} else if ($Mhs['NilaiProposal1'] != '' && $Mhs['NilaiProposal2'] != '' && $Mhs['NilaiProposal3'] != '') {
				echo $Mhs['Nama'].'|Sudah Ujian Proposal';	
			} else if ($Mhs['StatusProposal'] == 'Disetujui Pembimbing' && $Mhs['StatusUjianProposal'] == '' && $Mhs['StatusUjianSkripsi'] == '') {
				echo $Mhs['Nama'].'|Mendapat Dosen Pembimbing';
			} else if ($Mhs['StatusProposal'] == 'Menunggu Persetujuan Pembimbing') {
				echo $Mhs['Nama'].'|Menunggu Validasi Pembimbing';
			} else if ($Mhs['StatusProposal'] == 'Menunggu Persetujuan KPS') {
				echo $Mhs['Nama'].'|Menunggu Validasi KPS';
			} else if ($Mhs['StatusProposal'] == 'Diajukan') {
				echo $Mhs['Nama'].'|Menunggu Validasi Admin';
			} else if ($Mhs['StatusProposal'] == '') {
				echo $Mhs['Nama'].'|Belum Mengajukan Pembimbing';
			}
		} else {
			echo '1';
		}
	}

	public function MhsDaftar(){
		if ($this->db->get_where('mahasiswa',array('NIM' => $_POST['NIM']))->num_rows() === 0) {
			$_POST['Password'] = password_hash($_POST['Password'], PASSWORD_DEFAULT);
			$this->db->insert('mahasiswa',$_POST);
			if ($this->db->affected_rows()){
				$Session = array('AkunMhs' => 'Mhs',
												 'NIM' => $_POST['NIM'],
												 'Nama' => $_POST['Nama']);
				$this->session->set_userdata($Session);
				echo '1';
			} else {
				echo 'Gagal Daftar Akun!'; 
			}
		} else {
			echo 'Akun Mahasiswa Dengan NIM '.$_POST['NIM'].' Sudah Terdaftar!'; 
		}
	}

	public function MhsSignOut(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function SkorPembimbing(){
		$ListDosen = $this->db->query('SELECT Dosen.Nama,Dosen,COUNT(Dosen) AS Jumlah FROM `EvaluasiPembimbing`,`Dosen` WHERE EvaluasiPembimbing.Dosen=Dosen.NIP GROUP BY Dosen')->result_array();
		$Data['ListDosen'] = array();
		foreach ($ListDosen as $key) {
			$Temp = array();
			array_push($Temp,$key['Dosen']);
			array_push($Temp,$key['Nama']);
			$Mhs = $this->db->get_where('EvaluasiPembimbing', array('Dosen' => $key['Dosen']))->result_array();
			$Nilai = 0;
			for ($i=0; $i < count($Mhs); $i++) { 
				$Split = explode("|",$Mhs[$i]['Nilai']);
				$Nilai += array_sum($Split);
			}
			$Skor = $Nilai/count($Mhs)/10;
			array_push($Temp,$Skor);
			if ($Skor > 4.2) {
				array_push($Temp,'SB');
			} else if ($Skor > 3.4) {
				array_push($Temp,'B');
			} else if ($Skor > 2.6) {
				array_push($Temp,'C');
			} else if ($Skor > 1.8) {
				array_push($Temp,'K');
			} else {
				array_push($Temp,'Br');
			} 
			array_push($Temp,$key['Jumlah']);
			array_push($Data['ListDosen'],$Temp);
		}
		$this->load->view('SkorPembimbing',$Data);
	}

	public function EvaluasiBimbinganSkripsi(){
		$this->load->view('EvaluasiBimbinganSkripsi');
	}

	public function InputEvaluasiBimbinganSkripsi(){
		if ($this->db->get_where('EvaluasiPembimbing', array('NIM' => $_POST['NIM']))->num_rows() == 0) {
			if ($this->db->get_where('mahasiswa', array('NIM' => $_POST['NIM']))->row_array()['NIPPembimbing'] != '') {
				$_POST['Dosen'] = $this->db->get_where('mahasiswa', array('NIM' => $_POST['NIM']))->row_array()['NIPPembimbing'];
				$this->db->insert('EvaluasiPembimbing',$_POST);
				if ($this->db->affected_rows()){
					echo '1';
				} else {
					echo 'Gagal Mengirim Kuisioner!';
				}
			} else {
				echo 'NIM '.$_POST['NIM'].' Belum Memiliki Dosen Pembimbing!';
			}
		} else {
			echo 'NIM '.$_POST['NIM'].' Sudah Mengisi Kuisioner!';
		}
	}

	public function EvaluasiPBM(){
		$this->load->view('EvaluasiPBM');
	}

	public function TA(){
		if ($this->session->userdata('Akun') == 'Mhs') {
			redirect(base_url('Mhs/Profil'));
		} else {
			redirect(base_url());
		}
	}

	public function InputEvaluasiPBM(){
		$this->db->insert('EvaluasiPBM',$_POST);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Mengirim Kuisioner!'; 
		}
	}

public function Kuisioner($Jenis){
		if ($Jenis == 'KepuasanMahasiswa') {
			$this->load->view('KepuasanMahasiswa');
		} else if ($Jenis == 'PrestasiMahasiswa') {
			$this->load->view('PrestasiMahasiswa');
		} else if ($Jenis == 'PublikasiMahasiswa') {
			$this->load->view('PublikasiMahasiswa');
		} else if ($Jenis == 'SitasiMahasiswa') {
			$this->load->view('SitasiMahasiswa');
		} else if ($Jenis == 'PatenMahasiswa') {
			$this->load->view('PatenMahasiswa');
		} else if ($Jenis == 'HKIMahasiswa') { 
			$this->load->view('HKIMahasiswa');
		} else if ($Jenis == 'KaryaMahasiswa') {
			$this->load->view('KaryaMahasiswa');
		} else if ($Jenis == 'BukuMahasiswa') {
			$this->load->view('BukuMahasiswa');
		} else if ($Jenis == 'PenggunaLulusan') {
			$this->load->view('PenggunaLulusan');
		} else if ($Jenis == 'Alumni') {
			$this->load->view('Alumni');
		} 
	}

	public function InsertKuisioner($Tabel,$Data){
		$this->db->insert($Tabel,$Data);
		if ($this->db->affected_rows()){
			echo '1';
		} else {
			echo 'Gagal Mengirim Kuisioner!'; 
		}
	}

	public function InputKuisioner($Jenis){
		if ($Jenis == 'KepuasanMahasiswa') {
			if ($this->db->get_where('KepuasanMahasiswa', array('NIM' => $_POST['NIM']))->num_rows() === 0) {
				$this->InsertKuisioner('KepuasanMahasiswa',$_POST);
			} else {
				echo 'Data Kuisioner Kepuasan Mahasiswa Dengan NIM '.$_POST['NIM'].' Sudah Ada!';
			}
		} else if ($Jenis == 'PenggunaLulusan') {
			$this->InsertKuisioner('PenggunaLulusan',$_POST);
		} else if ($Jenis == 'Alumni') {
			if ($this->db->get_where('Alumni', array('NIM' => $_POST['NIM']))->num_rows() === 0) {
				$this->InsertKuisioner('Alumni',$_POST);
			} else {
				echo 'Data Kuisioner Alumni Dengan NIM '.$_POST['NIM'].' Sudah Ada!';
			}
		} else if ($Jenis == 'PrestasiMahasiswa') {
			$_POST['NamaPrestasi'] = htmlentities($_POST['NamaPrestasi']);
			$_POST['CapaianPrestasi'] = htmlentities($_POST['CapaianPrestasi']);
			if (count($_FILES) > 0) {
				if ($this->CekBukti($_FILES)){
					$NamaPdf = date('Ymd',time()).substr(password_hash('Prestasi', PASSWORD_DEFAULT),7,7);
					$NamaPdf = str_replace("/","E",$NamaPdf);
					$NamaPdf = str_replace(".","F",$NamaPdf);
					move_uploaded_file($_FILES['Bukti']['tmp_name'], "PrestasiMahasiswa/".$NamaPdf.".pdf");
					$_POST['Bukti'] = $NamaPdf.".pdf";
					$this->db->insert('PrestasiMahasiswa',$_POST);
					echo '1';
				} else {
					echo 'Upload Sertifikat Prestasi Hanya Boleh PDF!';
				}
			} else {
				echo 'Mohon Upload Sertifikat Prestasi Berupa PDF!';
			}
		} else if ($Jenis == 'PublikasiMahasiswa') {
			$_POST['Judul'] = htmlentities($_POST['Judul']);
			if (count($_FILES) > 0) {
				if ($this->CekBukti($_FILES)){
					$NamaPdf = date('Ymd',time()).substr(password_hash('PublikasiMahasiswa', PASSWORD_DEFAULT),7,7);
					$NamaPdf = str_replace("/","E",$NamaPdf);
					$NamaPdf = str_replace(".","F",$NamaPdf);
					move_uploaded_file($_FILES['Bukti']['tmp_name'], "PublikasiMahasiswa/".$NamaPdf.".pdf");
					$_POST['Bukti'] = $NamaPdf.".pdf";
					$this->db->insert('PublikasiMahasiswa',$_POST);
					echo '1';
				} else {
					echo 'Upload File Bukti Hanya Boleh PDF!';
				}
			} else {
				echo 'Mohon Upload Bukti Berupa PDF!';
			}
		} else if ($Jenis == 'SitasiMahasiswa') {
			$_POST['Judul'] = htmlentities($_POST['Judul']);
			if (count($_FILES) > 0) {
				if ($this->CekBukti($_FILES)){
					$NamaPdf = date('Ymd',time()).substr(password_hash('SitasiMahasiswa', PASSWORD_DEFAULT),7,7);
					$NamaPdf = str_replace("/","E",$NamaPdf);
					$NamaPdf = str_replace(".","F",$NamaPdf);
					move_uploaded_file($_FILES['Bukti']['tmp_name'], "SitasiMahasiswa/".$NamaPdf.".pdf");
					$_POST['Bukti'] = $NamaPdf.".pdf";
					$this->db->insert('SitasiMahasiswa',$_POST);
					echo '1';
				} else {
					echo 'Upload File Bukti Hanya Boleh PDF!';
				}
			} else {
				echo 'Mohon Upload Bukti Berupa PDF!';
			}
		} else if ($Jenis == 'PatenMahasiswa') {
			$_POST['Judul'] = htmlentities($_POST['Judul']);
			if (count($_FILES) > 0) {
				if ($this->CekBukti($_FILES)){
					$NamaPdf = date('Ymd',time()).substr(password_hash('Paten', PASSWORD_DEFAULT),7,7);
					$NamaPdf = str_replace("/","E",$NamaPdf);
					$NamaPdf = str_replace(".","F",$NamaPdf);
					move_uploaded_file($_FILES['Bukti']['tmp_name'], "PatenMahasiswa/".$NamaPdf.".pdf");
					$_POST['Bukti'] = $NamaPdf.".pdf";
					$this->db->insert('PatenMahasiswa',$_POST);
					echo '1';
				} else {
					echo 'Upload File Bukti Hanya Boleh PDF!';
				}
			} else {
				echo 'Mohon Upload Bukti Berupa PDF!';
			}
		} else if ($Jenis == 'HKIMahasiswa') {
			$_POST['Judul'] = htmlentities($_POST['Judul']);
			if (count($_FILES) > 0) {
				if ($this->CekBukti($_FILES)){
					$NamaPdf = date('Ymd',time()).substr(password_hash('HKI', PASSWORD_DEFAULT),7,7);
					$NamaPdf = str_replace("/","E",$NamaPdf);
					$NamaPdf = str_replace(".","F",$NamaPdf);
					move_uploaded_file($_FILES['Bukti']['tmp_name'], "HKIMahasiswa/".$NamaPdf.".pdf");
					$_POST['Bukti'] = $NamaPdf.".pdf";
					$this->db->insert('HKIMahasiswa',$_POST);
					echo '1';
				} else {
					echo 'Upload File Bukti Hanya Boleh PDF!';
				}
			} else {
				echo 'Mohon Upload Bukti Berupa PDF!';
			}
		} else if ($Jenis == 'KaryaMahasiswa') {
			$_POST['Judul'] = htmlentities($_POST['Judul']);
			if (count($_FILES) > 0) {
				if ($this->CekBukti($_FILES)){
					$NamaPdf = date('Ymd',time()).substr(password_hash('Karya', PASSWORD_DEFAULT),7,7);
					$NamaPdf = str_replace("/","E",$NamaPdf);
					$NamaPdf = str_replace(".","F",$NamaPdf);
					move_uploaded_file($_FILES['Bukti']['tmp_name'], "KaryaMahasiswa/".$NamaPdf.".pdf");
					$_POST['Bukti'] = $NamaPdf.".pdf";
					$this->db->insert('KaryaMahasiswa',$_POST);
					echo '1';
				} else {
					echo 'Upload File Bukti Hanya Boleh PDF!';
				}
			} else {
				echo 'Mohon Upload Bukti Berupa PDF!';
			}
		} else if ($Jenis == 'BukuMahasiswa') {
			$_POST['Judul'] = htmlentities($_POST['Judul']);
			if (count($_FILES) > 0) {
				if ($this->CekBukti($_FILES)){
					$NamaPdf = date('Ymd',time()).substr(password_hash('Buku', PASSWORD_DEFAULT),7,7);
					$NamaPdf = str_replace("/","E",$NamaPdf);
					$NamaPdf = str_replace(".","F",$NamaPdf);
					move_uploaded_file($_FILES['Bukti']['tmp_name'], "BukuMahasiswa/".$NamaPdf.".pdf");
					$_POST['Bukti'] = $NamaPdf.".pdf";
					$this->db->insert('BukuMahasiswa',$_POST);
					echo '1';
				} else {
					echo 'Upload File Bukti Hanya Boleh PDF!';
				}
			} else {
				echo 'Mohon Upload Bukti Berupa PDF!';
			}
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

	public function Masuk(){
		$CekLogin = $this->db->get_where('Akun', array('NIP' => htmlentities($_POST['NIP'])));
		if($CekLogin->num_rows() == 0){
			echo "NIP Salah";
		}
		else{
			$Akun = $CekLogin->row_array();
			if (password_verify($_POST['Password'], $Akun['Password'])) {
				$Jabatan = $this->db->get_where('Dosen', array('NIP' => $_POST['NIP']))->row_array();
				$Session = array('AkunDosen' => 'Dosen',
												 'NIP' => $_POST['NIP'], 
												 'Jabatan' => $Jabatan['Jabatan'], 
												 'IdKegiatanPendidikan' => 'PND1',
												 'IdKegiatanPenelitian' => 'PNL1',
												 'IdKegiatanPengabdian' => 'PNB1',
												 'IdKegiatanPenunjang' => 'PNJ1',
												 'SubPendidikan' => 'Rencana',
												 'SubPenelitian' => 'Rencana',
												 'SubPengabdian' => 'Rencana',
												 'SubPenunjang' => 'Rencana',
												 'NIMBimbingan' => '',
												 'NamaBimbingan' => '');
				if ($Akun['JenisAkun'] == 2) {
					$Session['Kajur'] = true;
				} else if ($Akun['JenisAkun'] == 3) {
					$Session['Kaprodi'] = true; 
				} else if ($Akun['JenisAkun'] == 4) {
					$Session['Jamu'] = true; 
				}
				$this->session->set_userdata($Session);
				echo '1';
			} else {
				echo "Password Salah";
			}
		}
	}

	public function AdminMasuk(){
		$CekLogin = $this->db->get_where('Admin', array('Username' => htmlentities($_POST['NIP'])));
		if($CekLogin->num_rows() == 0){
			echo "Username Admin Salah!";
		}
		else{
			$Akun = $CekLogin->row_array();
			if (password_verify($_POST['Password'], $Akun['Password'])) {
				$Session = array('AkunAdmin' => 'Admin','Role' => $Akun['Role']);
				$this->session->set_userdata($Session);
				if ($Akun['Role'] == 1) {
					echo '1';
				} else if ($Akun['Role'] == 2) {
					echo '2';
				} else if ($Akun['Role'] == 3) {
					echo '3';
				} else if ($Akun['Role'] == 4) {
					$NIP = '198303282015041001';
					$Jabatan = $this->db->get_where('Dosen', array('NIP' => $NIP))->row_array();
					$Session = array('AkunDosen' => 'Dosen',
													'NIP' => $NIP, 
													'Jabatan' => $Jabatan['Jabatan'], 
													'IdKegiatanPendidikan' => 'PND1',
													'IdKegiatanPenelitian' => 'PNL1',
													'IdKegiatanPengabdian' => 'PNB1',
													'IdKegiatanPenunjang' => 'PNJ1',
													'SubPendidikan' => 'Realisasi',
													'SubPenelitian' => 'Realisasi',
													'SubPengabdian' => 'Realisasi',
													'SubPenunjang' => 'Realisasi');
					$this->session->set_userdata($Session);
					echo '4';
				}
			} else {
				echo "Password Salah";
			}
		}
	}

	public function SignOut(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
