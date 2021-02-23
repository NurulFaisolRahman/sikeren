<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
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
    <div class="jumbotron jumbotron-fluid mb-0" style="background-image: url(<?=base_url('img/Header.png')?>);background-repeat: no-repeat;background-size: cover;padding-top: 2rem;padding-bottom: 2rem;">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 d-flex justify-content-center">
            <img src="<?=base_url('img/LogoUTM.png')?>" alt="Logo UTM" width="200">
          </div>
          <div class="col-lg-9">
            <!-- <h1 class="font-weight-bold" style="color: #FFFF00;text-shadow: -1.5px -1.5px 0 #f00, 1.5px -1.5px 0 #f00, -1.5px 1.5px 0 #f00, 1.5px 1.5px 0 #f00;font-family: Verdana;">SIKEREN</h1> -->
            <h2 class="font-weight-bold mt-2" style="color: #0000FF;text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;">Sistem Informasi Kinerja dan Rencana Kerja</h2>
            <h2 class="font-weight-bold" style="color: #FF0000;text-shadow: -1px -1px 0 #ff0, 1px -1px 0 #ff0, -1px 1px 0 #ff0, 1px 1px 0 #ff0;">Jurusan Ilmu Ekonomi</h2>
            <h2 class="font-weight-bold" style="color: #FFFF00;text-shadow: -1px -1px 0 #f00, 1px -1px 0 #f00, -1px 1px 0 #f00, 1px 1px 0 #f00;">Fakultas Ekonomi dan Bisnis</h2>
            <h2 class="font-weight-bold" style="color: #000000;text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;">Universitas Trunojoyo Madura</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row bg-success">
        <div class="col-lg-3 col-sm-12 text-center">
          <div class="card m-3">
            <div class="card-header bg-warning border border-light"><button type="button" class="btn btn-sm btn-primary font-weight-bold text-white border border-light">SIGN IN ADMIN</button></div>
            <div class="card-body bg-primary text-light border border-light">
              <a href=""><img class="my-2" src="<?=base_url('img/Admin.png')?>" alt="Admin" width="81%"></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12 text-center">
          <div class="card m-3">
            <div class="card-header bg-warning border border-light"><button type="button" class="btn btn-sm btn-primary font-weight-bold text-white border border-light">SIGN IN DOSEN</button></div>
            <div class="card-body bg-primary text-light border border-light">
              <a href=""><img class="my-2" src="<?=base_url('img/Dosen.png')?>" alt="Dosen" width="81%"></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12 text-center">
          <div class="card m-3">
            <div class="card-header bg-warning border border-light"><button type="button" class="btn btn-sm btn-primary font-weight-bold text-white border border-light">KUISIONER MAHASISWA</button></div>
            <div class="card-body bg-primary text-light border border-light">
              <a href=""><img class="my-2" src="<?=base_url('img/Mhs.png')?>" alt="Mahasiswa" width="81%"></a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12 text-center">
          <div class="card m-3">
            <div class="card-header bg-warning border border-light"><button type="button" class="btn btn-sm btn-primary font-weight-bold text-white border border-light">KUISIONER EVALUASI PBM</button></div>
            <div class="card-body bg-primary text-light border border-light">
              <a href=""><img class="my-2" src="<?=base_url('img/PBM.png')?>" alt="PBM" width="81%"></a>
            </div>
          </div>
        </div>
        <!-- <div class="col-lg-3 bg-danger" style="border-style: outset;border-color: yellow;">
          <ul style="padding: 0;" id="accordion" class="accordion my-3">
            <li class="open">
              <div class="link text-primary" style="padding-top: 5px;padding-bottom: 5px;"><i class="text-primary fa fa-tasks"></i>Kuisioner Mahasiswa<i class="text-primary fa fa-chevron-down"></i></div>
              <ul style="padding: 0;max-height: 170px;overflow: scroll;" class="submenu font-weight-bold bg-warning mx-0">
                <li><a href="<?=base_url('SMD/Kuisioner/KepuasanMahasiswa')?>">Kepuasan Terhadap Proses Pendidikan</a></li>
                <li><a href="<?=base_url('SMD/Kuisioner/PrestasiMahasiswa')?>">Prestasi Akademik & Non Akademik</a></li>
                <li><a href="<?=base_url('SMD/Kuisioner/PublikasiMahasiswa')?>">Publikasi Ilmiah</a></li>
                <li><a href="<?=base_url('SMD/Kuisioner/SitasiMahasiswa')?>">Karya Ilmiah Yang Disitasi</a></li>
                <li><a href="<?=base_url('SMD/Kuisioner/PatenMahasiswa')?>">HKI (Paten, Paten Sederhana)</a></li>
                <li><a href="<?=base_url('SMD/Kuisioner/HKIMahasiswa')?>">HKI (Hak Cipta, Desain Produk Industri, dll.)</a></li>
                <li><a href="<?=base_url('SMD/Kuisioner/KaryaMahasiswa')?>">Teknologi Tepat Guna, Produk, Karya Seni, Rekayasa Sosial</a></li>
                <li><a href="<?=base_url('SMD/Kuisioner/BukuMahasiswa')?>">Buku ber-ISBN, Book Chapter</a></li>
                <li><a href="<?=base_url('SMD/Kuisioner/Alumni')?>">Alumni Yang Telah Bekerja</a></li>
              </ul>
            </li> -->
            <!-- <li>
              <div class="link text-primary" style="padding-top: 5px;padding-bottom: 5px;"><i class="text-primary fa fa-tasks"></i>Menu 2<i class="text-primary fa fa-chevron-down"></i></div>
            </li> -->
          <!-- </ul>
        </div>
        <div class="col-lg-9 d-flex align-items-center bg-primary" style="border-style: outset;border-color: yellow;">
          <div class="container-fluid">
          <div class="row my-2">
            <div class="col-lg-4 my-1">
              <div class="card border border-light">
                <div class="card-header bg-light font-weight-bold text-primary">SIGN IN DOSEN</div>
                <div class="card-body bg-danger">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-light"><b>NIP</b></span>
                    </div>
                    <input type="text" class="form-control" id="nip">
                  </div>
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-light"><b>Password</b></span>
                    </div>
                    <input type="password" class="form-control" id="sandi">
                  </div>
                  <div class="btn btn-primary text-light d-flex justify-content-center" id="Masuk"><b>SIGN IN</b></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 my-1">
              <div class="card border border-light">
                <div class="card-header bg-light font-weight-bold text-primary">S1 Ekonomi Pembangunan</div>
                <div class="card-body bg-danger text-light">
                  <h5 class="card-title font-weight-bold">Kunjungi Website</h5>
                  <p class="card-text"><a class="btn btn-primary font-weight-bold text-white" href="http://ie.trunojoyo.ac.id/ep/">http://ie.trunojoyo.ac.id/ep/</a></p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 my-1">
              <div class="card border border-light">
                <div class="card-header bg-light font-weight-bold text-primary">S2 Ilmu Ekonomi</div>
                <div class="card-body bg-danger text-light">
                  <h5 class="card-title font-weight-bold">Kunjungi Website</h5>
                  <p class="card-text"><a class="btn btn-primary font-weight-bold text-white" href="http://ie.trunojoyo.ac.id/mie/">http://ie.trunojoyo.ac.id/mie/</a></p>
                </div>
              </div>
            </div>
          </div>
          </div> 
        </div> -->
      </div>
    </div>
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/popper.min.js" ></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
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
      $(function() {
        var Accordion = function(el, multiple) {
          this.el = el || {};
          this.multiple = multiple || false;
          var links = this.el.find('.link');
          links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
        }
        Accordion.prototype.dropdown = function(e) {
          var $el = e.data.el;
            $this = $(this),
            $next = $this.next();
          $next.slideToggle();
          $this.parent().toggleClass('open');
          if (!e.data.multiple) {
            $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
          };
        }	
        var accordion = new Accordion($('#accordion'), false);
      });
    </script>
  </body>
</html>