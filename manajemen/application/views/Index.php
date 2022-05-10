<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=base_url('bootstrap/css/bootstrap.min.css')?>"> 
    <link rel="stylesheet" href="<?=base_url('fontawesome/css/all.min.css')?>">
    <title>SIKEREN</title>
    <style>
      ul { list-style-type: none; }

      a {
        color: #b63b4d;
        text-decoration: none;
      }

      .accordion {
        width: 100%;
        max-width: 360px;
        margin: 30px auto 20px;
        background: #FFF;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
      }

      .accordion .link {
        cursor: pointer;
        display: block;
        padding: 15px 15px 15px 42px;
        color: #4D4D4D;
        font-size: 14px;
        font-weight: 700;
        border-bottom: 1px solid #CCC;
        position: relative;
        -webkit-transition: all 0.4s ease;
        -o-transition: all 0.4s ease;
        transition: all 0.4s ease;
      }

      .accordion li:last-child .link { border-bottom: 0; }

      .accordion li i {
        position: absolute;
        top: 7px;
        left: 12px;
        font-size: 18px;
        color: #595959;
        -webkit-transition: all 0.4s ease;
        -o-transition: all 0.4s ease;
        transition: all 0.4s ease;
      }

      .accordion li i.fa-chevron-down {
        right: 12px;
        left: auto;
        font-size: 16px;
      }

      .accordion li.open .link { color: #b63b4d; }

      .accordion li.open i { color: #b63b4d; }

      .accordion li.open i.fa-chevron-down {
        -webkit-transform: rotate(180deg);
        -ms-transform: rotate(180deg);
        -o-transform: rotate(180deg);
        transform: rotate(180deg);
      }

      .submenu {
        display: none;
        background: #FFFF00;
        font-size: 14px;
      }

      .submenu li { border-bottom: 1px solid #ffffff; }

      .submenu a {
        display: block;
        text-decoration: none;
        color: #000000;
        padding: 2px;
        padding-left: 42px;
        -webkit-transition: all 0.25s ease;
        -o-transition: all 0.25s ease;
        transition: all 0.25s ease;
      }

      .submenu a:hover {
        background: #00F;
        color: #FFF;
      }
      </style>
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid mb-0" style="background-image: url(<?=base_url('img/Header.jpg')?>);background-repeat: no-repeat;background-size: cover;height: 265px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 d-flex justify-content-center">
            <img src="<?=base_url('img/LogoUTM.png')?>" alt="Logo UTM" width="200">
          </div>
          <div class="col-lg-9">
            <h2 class="font-weight-bold mt-2" style="color: #0000FF;text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;">Sistem Informasi Kinerja dan Rencana Kerja</h2>
            <h2 class="font-weight-bold" style="color: #FF0000;text-shadow: -1px -1px 0 #ff0, 1px -1px 0 #ff0, -1px 1px 0 #ff0, 1px 1px 0 #ff0;">Jurusan Akuntansi</h2>
            <h2 class="font-weight-bold" style="color: #FFFF00;text-shadow: -1px -1px 0 #f00, 1px -1px 0 #f00, -1px 1px 0 #f00, 1px 1px 0 #f00;">Fakultas Ekonomi dan Bisnis</h2>
            <h2 class="font-weight-bold" style="color: #000000;text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;">Universitas Trunojoyo Madura</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row bg-success py-2">
        <div class="col-lg-3 col-sm-12 text-center">
          <div class="card m-3">
            <div class="card-header bg-warning border border-light"><button data-toggle="modal" data-target="#ModalSignIn" class="btn btn-sm btn-primary font-weight-bold text-white border border-light">SIGN IN ADMIN</button></div>
            <div class="card-body bg-primary text-light border border-light py-3">
              <a href="#" data-toggle="modal" data-target="#ModalSignIn"><img class="my-2" src="<?=base_url('img/Admin.png')?>" alt="Admin" width="81%"></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12 text-center">
          <div class="card m-3">
            <div class="card-header bg-warning border border-light"><button data-toggle="modal" data-target="#ModalSignIn" class="btn btn-sm btn-primary font-weight-bold text-white border border-light">SIGN IN DOSEN</button></div>
            <div class="card-body bg-primary text-light border border-light py-3">
              <a href="#" data-toggle="modal" data-target="#ModalSignIn"><img class="my-2" src="<?=base_url('img/Dosen.png')?>" alt="Dosen" width="81%"></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12 text-center">
          <div class="card m-3">
            <div class="card-header bg-warning border border-light"><button data-toggle="modal" data-target="#ModalMhs" class="btn btn-sm btn-primary font-weight-bold text-white border border-light">KUISIONER MAHASISWA</button></div>
            <div class="card-body bg-primary text-light border border-light py-3">
              <a href="#" data-toggle="modal" data-target="#ModalMhs"><img class="my-2" src="<?=base_url('img/Mhs.png')?>" alt="Mahasiswa" width="81%"></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12 text-center">
          <div class="card m-3">
            <div class="card-header bg-warning border border-light"><a href="<?=base_url('SMD/EvaluasiPBM')?>" class="btn btn-sm btn-primary font-weight-bold text-white border border-light">KUISIONER EVALUASI PBM</a></div>
            <div class="card-body bg-primary text-light border border-light py-3">
              <a href="<?=base_url('SMD/EvaluasiPBM')?>"><img class="my-2" src="<?=base_url('img/PBM.png')?>" alt="PBM" width="81%"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="bg-danger">
      <div class="inner">
        <p class="text-center py-1" style="color: #ffffff;"><b>Copyright © 2021 SIKEREN Jurusan Akuntansi FEB UTM</b></p>
      </div>
    </footer>
    <div class="modal fade" id="ModalSignIn">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-transparent">
          <div class="modal-body">
            <div class="container">
							<div class="row d-flex justify-content-center">
								<div class="col-lg-9 col-sm-12 my-1">
                  <div class="card border border-light">
                    <div class="card-body bg-danger">
                      <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-primary text-light"><b>Username</b></span>
                        </div>
                        <input type="text" class="form-control" id="nip">
                      </div>
                      <div class="input-group input-group-sm mb-2">
                        <div class="input-group-prepend">
                          <span class="input-group-text bg-primary text-light"><b>Password</b></span>
                        </div>
                        <input type="password" class="form-control" id="sandi">
                      </div>
                      <div class="btn btn-primary text-light d-flex justify-content-center mt-3" id="Masuk"><b>SIGN IN</b></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalMhs">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-transparent">
          <div class="modal-body">
            <div class="container-fluid">
							<div class="row d-flex justify-content-center">
								<div class="col-sm-12 my-1">
                  <ul class="list-group">
                    <li class="list-group-item bg-primary py-1"><a class="text-white font-weight-bold" href="<?=base_url('SMD/Kuisioner/KepuasanMahasiswa')?>">1. Kepuasan Terhadap Proses Pendidikan</a></li>
                    <li class="list-group-item bg-primary py-1"><a class="text-white font-weight-bold" href="<?=base_url('SMD/Kuisioner/PrestasiMahasiswa')?>">2. Prestasi Akademik & Non Akademik</a></li>
                    <li class="list-group-item bg-primary py-1"><a class="text-white font-weight-bold" href="<?=base_url('SMD/Kuisioner/PublikasiMahasiswa')?>">3. Publikasi Ilmiah</a></li>
                    <li class="list-group-item bg-primary py-1"><a class="text-white font-weight-bold" href="<?=base_url('SMD/Kuisioner/SitasiMahasiswa')?>">4. Karya Ilmiah Yang Disitasi</a></li>
                    <li class="list-group-item bg-primary py-1"><a class="text-white font-weight-bold" href="<?=base_url('SMD/Kuisioner/PatenMahasiswa')?>">5. HKI (Paten, Paten Sederhana)</a></li>
                    <li class="list-group-item bg-primary py-1"><a class="text-white font-weight-bold" href="<?=base_url('SMD/Kuisioner/HKIMahasiswa')?>">6. HKI (Hak Cipta, Desain Produk Industri, dll.)</a></li>
                    <li class="list-group-item bg-primary py-1"><a class="text-white font-weight-bold" href="<?=base_url('SMD/Kuisioner/KaryaMahasiswa')?>">7. Teknologi Tepat Guna, Produk, Karya Seni, Rekayasa Sosial</a></li>
                    <li class="list-group-item bg-primary py-1"><a class="text-white font-weight-bold" href="<?=base_url('SMD/Kuisioner/BukuMahasiswa')?>">8. Buku ber-ISBN, Book Chapter</a></li>
                    <li class="list-group-item bg-primary py-1"><a class="text-white font-weight-bold" href="<?=base_url('SMD/Kuisioner/Alumni')?>">9. Alumni Yang Telah Bekerja</a></li>
                    <li class="list-group-item bg-primary py-1"><a class="text-white font-weight-bold" href="<?=base_url('SMD/Kuisioner/PenggunaLulusan')?>">10. Pengguna Lulusan</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="<?=base_url('bootstrap/js/jquery.min.js')?>"></script>
    <script src="<?=base_url('bootstrap/js/popper.min.js')?>" ></script>
    <script src="<?=base_url('bootstrap/js/bootstrap.min.js')?>"></script>
    <script>
      var BaseURL = '<?=base_url()?>'
      jQuery(document).ready(function($) {
        "use strict";
        $('#nip').keypress(function(event){
          var keycode = (event.keyCode ? event.keyCode : event.which);
          if(keycode == '13'){
            event.preventDefault();
            document.getElementById("Masuk").click();  
          }
        });
        $('#sandi').keypress(function(event){
          var keycode = (event.keyCode ? event.keyCode : event.which);
          if(keycode == '13'){
            event.preventDefault();
            document.getElementById("Masuk").click();  
          }
        });
        $("#Masuk").click(function() {
          var Akun = { NIP: $("#nip").val(),
                       Password: $("#sandi").val() }
          if (isNaN($("#nip").val())) {
            $.post(BaseURL+"SMD/AdminMasuk", Akun).done(function(Respon) {
              if (Respon == '1') {
                window.location = BaseURL + "Admin/AkunDosen" 
              }
              else {
                alert(Respon)
              }
            })
          } 
          else {
            $.post(BaseURL+"SMD/Masuk", Akun).done(function(Respon) {
              if (Respon == '1') {
                window.location = BaseURL + "Dashboard/Profil"
              }
              else {
                alert(Respon)
              }
            })
          }                      
        })
      })
    </script>
  </body>
</html>