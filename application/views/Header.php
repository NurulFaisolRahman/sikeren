<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="<?=base_url('img/favicon.ico')?>" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=base_url('bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('fontawesome/css/all.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('bootstrap/css/adminlte.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('bootstrap/datatables-bs4/css/dataTables.bootstrap4.css')?>">
    <title><?=$Halaman?></title>
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-success">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-light" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <button id="PanduanPAK" class="btn btn-danger"><i class="fas fa-book"> Panduan PO-PAK</i></button>
          </li>
        </ul>
        <ul class="navbar-nav ml-1">
          <li class="nav-item">
					  <button id="PanduanBKD" class="btn btn-primary"><i class="fas fa-book"> Panduan BKD</i></button>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <a class="nav-link" href="<?=base_url('SMD/SignOut')?>">
            <i class="fas fa-user-lock text-light"><span class="text-light"> Logout</span></i>
          </a>
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link bg-success">
        <img src="<?=base_url('img/apple-touch-icon.png')?>"
            alt="LogoUTM"
            class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-bold">Dashboard</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">      
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?=base_url("Dashboard/Profil")?>" class="nav-link <?php if ($Halaman == "Profil") { echo "active";} ?>">
                    <i class="nav-icon fas fa-user"></i>
                    <p><b>Profil</b></p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?php if ($Halaman == "ValidasiDosen") { echo "menu-open"; } ?>">
                  <a href="#" class="nav-link <?php if ($Halaman == "ValidasiDosen") { echo "active"; } ?>">
                  <i class="nav-icon fas fa-tasks"></i>
                  <p>
                  <?php 
                    $Bimbingan = $this->db->query("SELECT * FROM mahasiswa where StatusProposal = 'Menunggu Persetujuan Pembimbing' AND NIPPembimbing = "."'".$this->session->userdata('NIP')."'")->result_array();
                    $Proposal = $this->db->query("SELECT * FROM mahasiswa where (StatusUjianProposal = 'Disetujui Pembimbing' AND PengujiProposal1 = "."'".$this->session->userdata('NIP')."' AND StatusPengujiProposal1 = '') OR (StatusUjianProposal = 'Disetujui Pembimbing' AND PengujiProposal2 = "."'".$this->session->userdata('NIP')."' AND StatusPengujiProposal2 = '') OR (StatusUjianProposal = 'Menunggu Persetujuan Pembimbing' AND NIPPembimbing = "."'".$this->session->userdata('NIP')."')")->result_array();
                    $Skripsi = $this->db->query("SELECT * FROM mahasiswa where (StatusUjianSkripsi = 'Disetujui Pembimbing' AND PengujiSkripsi1 = "."'".$this->session->userdata('NIP')."' AND StatusPengujiSkripsi1 = '') OR (StatusUjianSkripsi = 'Disetujui Pembimbing' AND PengujiSkripsi2 = "."'".$this->session->userdata('NIP')."' AND StatusPengujiSkripsi2 = '') OR (StatusUjianSkripsi = 'Menunggu Persetujuan Pembimbing' AND NIPPembimbing = "."'".$this->session->userdata('NIP')."')")->result_array();
                  ?>
                  <b>Validasi <span class="badge badge-danger"><?=count($Bimbingan)+count($Proposal)+count($Skripsi)?></span></b>
                    <i class="right fas fa-angle-left"></i>
                  </p>
                  </a>
                  <?php
                    $JenisKegiatan = array("ValidasiBimbingan","ValidasiPengujiProposal","ValidasiPengujiSkripsi");
                    $NamaKegiatan = array("Pembimbing","Ujian Proposal","Ujian Skripsi");
                    $Icon = array("users","users","users");
                  ?>
                  <?php for ($i=0; $i < count($JenisKegiatan); $i++) {?>
                  <ul class="nav nav-treeview <ml-1></ml-3>">
                      <li class="nav-item">
                      <a href="<?=base_url("Dashboard/").$JenisKegiatan[$i]?>" class="nav-link <?php if ($SubMenu == $JenisKegiatan[$i]) { echo "active"; } ?>">
                          <i class="fas fa-<?=$Icon[$i]?> nav-icon text-primary"></i>
                          <p class="font-weight-bold text-primary"><?=$NamaKegiatan[$i]?></p>
                      </a>
                      </li>
                  </ul>
                  <?php } ?>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url("Dashboard/BimbinganSkripsi")?>" class="nav-link <?php if ($Halaman == "Bimbingan Skripsi") { echo "active";} ?>">
                    <i class="nav-icon fas fa-users"></i>
                    <p><b>Mhs Bimbingan</b></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url("Dashboard/RPS")?>" class="nav-link <?php if ($Halaman == "Mengajar") { echo "active";} ?>">
                    <i class="nav-icon fas fa-book"></i>
                    <p><b>RPS Mengajar</b></p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?=base_url("Dashboard/ListRPS")?>" class="nav-link <?php if ($Halaman == "List RPS") { echo "active";} ?>">
                    <i class="nav-icon fas fa-book"></i>
                    <p><b>LIST RPS</b></p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?php if ($Halaman == "Menilai") { echo "menu-open"; } ?>">
                  <a href="#" class="nav-link <?php if ($Halaman == "Menilai") { echo "active"; } ?>">
                  <i class="nav-icon fas fa-tasks"></i>
                  <p>
                    <?php 
                      $_Proposal = $this->db->query("SELECT * FROM mahasiswa where StatusPengujiProposal1 = 'Setuju' AND StatusPengujiProposal2 = 'Setuju' AND (PengujiProposal1 = "."'".$this->session->userdata('NIP')."'"." AND NilaiProposal1 = '' OR PengujiProposal2 = "."'".$this->session->userdata('NIP')."'"." AND NilaiProposal2 = '' OR NIPPembimbing = "."'".$this->session->userdata('NIP')."'"." AND NilaiProposal3 = '')")->result_array();
                      $_Skripsi = $this->db->query("SELECT * FROM mahasiswa where StatusPengujiSkripsi1 = 'Setuju' AND StatusPengujiSkripsi2 = 'Setuju' AND (PengujiSkripsi1 = "."'".$this->session->userdata('NIP')."'"." AND NilaiSkripsi1 = '' OR PengujiSkripsi2 = "."'".$this->session->userdata('NIP')."'"." AND NilaiSkripsi2 = '' OR NIPPembimbing = "."'".$this->session->userdata('NIP')."'"." AND NilaiSkripsi3 = '')")->result_array();
                    ?>
                    <b>Menilai <span class="badge badge-danger"><?=count($_Proposal)+count($_Skripsi)?></span></b>
                    <i class="right fas fa-angle-left"></i>
                  </p>
                  </a>
                  <?php
                    $JenisKegiatan = array("PengujiProposal","PengujiSkripsi");
                    $NamaKegiatan = array("Ujian Proposal","Ujian Skripsi");
                    $Icon = array("users","users");
                  ?>
                  <?php for ($i=0; $i < count($JenisKegiatan); $i++) {?>
                  <ul class="nav nav-treeview <ml-1></ml-3>">
                      <li class="nav-item">
                      <a href="<?=base_url("Dashboard/").$JenisKegiatan[$i]?>" class="nav-link <?php if ($SubMenu == $JenisKegiatan[$i]) { echo "active"; } ?>">
                          <i class="fas fa-<?=$Icon[$i]?> nav-icon text-primary"></i>
                          <p class="font-weight-bold text-primary"><?=$NamaKegiatan[$i]?></p>
                      </a>
                      </li>
                  </ul>
                  <?php } ?>
                </li>
                <li class="nav-item has-treeview <?php if ($Halaman == "Nilai") { echo "menu-open"; } ?>">
                  <a href="#" class="nav-link <?php if ($Halaman == "Nilai") { echo "active"; } ?>">
                  <i class="nav-icon fas fa-tasks"></i>
                  <p>
                    <b>Rekap Ujian</b>
                    <i class="right fas fa-angle-left"></i>
                  </p>
                  </a>
                  <?php
                    $JenisKegiatan = array("NilaiProposal","NilaiSkripsi");
                    $NamaKegiatan = array("Ujian Proposal","Ujian Skripsi");
                    $Icon = array("users","users");
                  ?>
                  <?php for ($i=0; $i < count($JenisKegiatan); $i++) {?>
                  <ul class="nav nav-treeview <ml-1></ml-3>">
                      <li class="nav-item">
                      <a href="<?=base_url("Dashboard/").$JenisKegiatan[$i]?>" class="nav-link <?php if ($SubMenu == $JenisKegiatan[$i]) { echo "active"; } ?>">
                          <i class="fas fa-<?=$Icon[$i]?> nav-icon text-primary"></i>
                          <p class="font-weight-bold text-primary"><?=$NamaKegiatan[$i]?></p>
                      </a>
                      </li>
                  </ul>
                  <?php } ?>
                </li>
                <?php if ($this->session->userdata('Jamu')) { ?> 
                  <li class="nav-item has-treeview <?php if ($Halaman == "Jamu") { echo "menu-open"; } ?>">
                    <a href="#" class="nav-link <?php if ($Halaman == "Jamu") { echo "active"; } ?>">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>
                      <b>Jaminan Mutu</b>
                      <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <?php
                      $JenisKegiatan = array("ValidasiSoal","DokumenEvaluasi");
                      $NamaKegiatan = array("Validasi Soal","Dokumen Evaluasi");
                      $Icon = array("sticky-note","book");
                    ?>
                    <?php for ($i=0; $i < count($JenisKegiatan); $i++) {?>
                    <ul class="nav nav-treeview <ml-1></ml-3>">
                        <li class="nav-item">
                        <a href="<?=base_url("Dashboard/").$JenisKegiatan[$i]?>" class="nav-link <?php if ($SubMenu == $JenisKegiatan[$i]) { echo "active"; } ?>">
                            <i class="fas fa-<?=$Icon[$i]?> nav-icon text-primary"></i>
                            <p class="font-weight-bold text-primary"><?=$NamaKegiatan[$i]?></p>
                        </a>
                        </li>
                    </ul>
                    <?php } ?>
                  </li>
                <?php } ?>
                <?php if ($this->session->userdata('Kaprodi')) { ?> 
                  <li class="nav-item has-treeview <?php if ($Halaman == "Validasi") { echo "menu-open"; } ?>">
                    <a href="#" class="nav-link <?php if ($Halaman == "Validasi") { echo "active"; } ?>">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>
                      <?php 
                        $Validasi1 = $this->db->query("SELECT * FROM mahasiswa where StatusProposal = 'Menunggu Persetujuan KPS' or StatusProposal LIKE 'Ditolak Oleh Pembimbing%'")->result_array();
                        $Validasi2 = $this->db->query("SELECT * FROM mahasiswa where StatusUjianProposal = 'Menunggu Persetujuan KPS' or StatusUjianProposal = 'Ditolak Pembimbing' or StatusPengujiProposal1 LIKE 'Ditolak%' or StatusPengujiProposal2 LIKE 'Ditolak%'")->result_array();
                        $Validasi3 = $this->db->query("SELECT * FROM mahasiswa where StatusUjianSkripsi = 'Menunggu Persetujuan KPS' or StatusUjianSkripsi = 'Ditolak Pembimbing'")->result_array();
                      ?>
                      <b>Validasi KPS <span class="badge badge-danger"><?=count($Validasi1)+count($Validasi2)+count($Validasi3)?></b>
                      <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <?php
                      // $JenisKegiatan = array("DosenPembimbing","ValidasiUjianProposal","PlotMBKM");
                      // $NamaKegiatan = array("Dosen Pembimbing","Penguji Proposal","DPL MBKM");
                      $JenisKegiatan = array("DosenPembimbing","ValidasiUjianProposal","ValidasiUjianSkripsi","PlotRPS","PlotMBKM");
                      $NamaKegiatan = array("Pembimbing","Ujian Proposal","Ujian Skripsi","Validasi RPS","DPL MBKM");
                      // $Icon = array("users","users","users");
                      $Icon = array("users","users","users","book","users");
                    ?>
                    <?php for ($i=0; $i < count($JenisKegiatan); $i++) { ?>
                    <ul class="nav nav-treeview <ml-1></ml-3>">
                        <li class="nav-item">
                        <a href="<?=base_url("Dashboard/").$JenisKegiatan[$i]?>" class="nav-link <?php if ($SubMenu == $JenisKegiatan[$i]) { echo "active"; } ?>">
                            <i class="fas fa-<?=$Icon[$i]?> nav-icon text-primary"></i>
                            <p class="font-weight-bold text-primary"><?=$NamaKegiatan[$i]?></p>
                        </a>
                        </li>
                    </ul>
                    <?php } ?>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url("Dashboard/RekapMahasiswa/1")?>" class="nav-link <?php if ($Halaman == "Rekap Mahasiswa") { echo "active";} ?>">
                    <i class="nav-icon fas fa-users"></i>
                    <p><b>Rekap Data</b></p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url("Dashboard/RekapSkripsi")?>" class="nav-link <?php if ($Halaman == "Rekap Skripsi") { echo "active";} ?>">
                    <i class="nav-icon fas fa-book"></i>
                    <p><b>Rekap Skripsi</b></p>
                    </a>
                  </li>
                <?php } ?>
                <li class="nav-item has-treeview <?php if ($Halaman == "Kegiatan") { echo "menu-open"; } ?>">
                    <a href="#" class="nav-link <?php if ($Halaman == "Kegiatan") { echo "active"; } ?>">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>
                      <b>Kegiatan</b>
                      <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <?php
                      $JenisKegiatan = array("Pendidikan","Penelitian","Pengabdian","Penunjang");
                      $Icon = array("graduation-cap","search-plus","users","chart-line");
                    ?>
                    <?php for ($i=0; $i < count($JenisKegiatan); $i++) {?>
                    <ul class="nav nav-treeview <ml-1></ml-3>">
                        <li class="nav-item">
                        <a href="<?=base_url("Dashboard/").$JenisKegiatan[$i]?>" class="nav-link <?php if ($SubMenu == $JenisKegiatan[$i]) { echo "active"; } ?>">
                            <i class="fas fa-<?=$Icon[$i]?> nav-icon text-primary"></i>
                            <p class="font-weight-bold text-primary"><?=$JenisKegiatan[$i]?></p>
                        </a>
                        </li>
                    </ul>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link" data-toggle="modal" data-target="#Excel">
                    <i class="nav-icon fas fa-file-excel"></i>
                    <p><b>Excel</b></p>
                    </a>
                </li>
                <?php if ($this->session->userdata('Kajur')) { ?> 
                  <li class="nav-item has-treeview <?php if ($Halaman == "Monitoring") { echo "menu-open"; } ?>">
                    <a href="#" class="nav-link <?php if ($Halaman == "Monitoring") { echo "active"; } ?>">
                    <i class="nav-icon fas fa-tasks"></i>
                    <p>
                      <b>Monitoring</b>
                      <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <?php for ($i=0; $i < count($JenisKegiatan); $i++) {?>
                    <ul class="nav nav-treeview <ml-1></ml-3>">
                        <li class="nav-item">
                        <a href="<?=base_url("Kajur/Monitoring/".$JenisKegiatan[$i])?>" class="nav-link <?php if ($SubMenu == 'Monitoring '.$JenisKegiatan[$i]) { echo "active";} ?>">
                            <i class="fas fa-<?=$Icon[$i]?> nav-icon text-primary"></i>
                            <p class="font-weight-bold text-primary"><?=$JenisKegiatan[$i]?></p>
                        </a>
                        </li>
                    </ul>
                    <?php } ?>
                    <ul class="nav nav-treeview <ml-1></ml-3>">
                        <li class="nav-item">
                        <a href="<?=base_url("Kajur/KreditDosen")?>" class="nav-link <?php if ($SubMenu == 'Kredit Dosen') { echo "active";} ?>">
                            <i class="fa fa-credit-card nav-icon"></i>
                            <p class="font-weight-bold">Kredit Dosen</p>
                        </a>
                        </li>
                    </ul>
                  </li>
                <?php } ?>
            </ul>
        </nav>
        </div>
    </aside>
    <div class="modal fade" id="ModalPanduan">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathPanduan" src="" type="application/pdf" width="100%" height="520"/>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="Excel">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <label class="input-group-text bg-primary"><b>Dari Semester</b></label>
              </div>
              <select class="custom-select" id="DariSemester">										
                <option value="Ganjil">Ganjil</option>
                <option value="Genap">Genap</option>
              </select>
              <div class="input-group-prepend">
                <label class="input-group-text bg-primary"><b>Tahun</b></label>
              </div>
              <input class="form-control" type="text" id="DariTahun"  data-inputmask='"mask": "9999"' value="20" data-mask>
            </div>
            <div class="input-group mt-2">
              <div class="input-group-prepend">
                <label class="input-group-text bg-primary"><b>Hingga Semester</b></label>
              </div>
              <select class="custom-select" id="HinggaSemester">										
                <option value="Ganjil">Ganjil</option>
                <option value="Genap">Genap</option>
              </select>
              <div class="input-group-prepend">
                <label class="input-group-text bg-primary"><b>Tahun</b></label>
              </div>
              <input class="form-control" type="text" id="HinggaTahun"  data-inputmask='"mask": "9999"' value="20" data-mask>
            </div>
            <input class="mt-3" type="checkbox" id="BuktiExcel">
            <label class="font-weight-bold text-dark" for="BuktiExcel"> Download Beserta Lampiran</label>
            <a id="LampiranPAK" href="LampiranPAK" download="LampiranPAK"></a>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-primary" id="pak"><b>Download PAK</b></button>
            <button type="submit" class="btn btn-success" id="bkd"><b>Download BKD</b></button>
          </div>
        </div>
      </div>
    </div>