<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Mahasiswa</title>
		<link rel="shortcut icon" href="<?=base_url('img/favicon.ico')?>" type="image/x-icon">
    <link href="<?=base_url('vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('vendors/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('build/css/custom.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('bootstrap/datatables-bs4/css/dataTables.bootstrap4.css')?>" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <?php if ($Mhs['Foto'] == '') { ?>
                    <img src="<?=base_url('img/Profil.jpg')?>" alt="Avatar" class="img-circle profile_img">
                  <?php	} else { ?>
                    <img src="<?=base_url('FotoMhs/'.$Mhs['Foto'])?>" alt="FotoMhs" class="img-circle profile_img">
                  <?php } ?>
              </div>
              <div class="profile_info">
                <span class="font-weight-bold"><?=$this->session->userdata('NIM')?></span>
                <h2 class="font-weight-bold"><?=$this->session->userdata('Nama')?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
									<li><a href="<?=base_url('Mhs/Profil')?>"><i class="fa fa-user"></i> <b>Profil</b> </a></li>
                </ul>
                <ul class="nav side-menu">
									<li><a href="<?=base_url('Mhs/DosPem')?>"><i class="fa fa-users"></i> <b>Dosen Pembimbing</b> </a></li>
                </ul>
                <ul class="nav side-menu">
									<li><a href="<?=base_url('Mhs/UjianProposal')?>"><i class="fa fa-book"></i> <b>Ujian Proposal</b> </a></li>
                </ul>
                <ul class="nav side-menu">
									<li><a href="<?=base_url('Mhs/UjianSkripsi')?>"><i class="fa fa-book"></i> <b>Ujian Skripsi</b> </a></li>
                </ul>
								<ul class="nav side-menu">
									<li><a href="<?=base_url('SMD/MhsSignOut')?>"><i class="fa fa-sign-out"></i> <b>Keluar</b> </a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu bg-warning">
            <div class="nav toggle ml-1">
              &nbsp;&nbsp;<a id="menu_toggle"><i class="fa fa-bars text-white"></i></a>
            </div>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
				<div class="right_col bg-success" role="main" style="overflow-x: hidden;">
					<div class="">
            <div class="clearfix"></div>