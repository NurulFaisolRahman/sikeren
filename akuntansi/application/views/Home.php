<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>SMD</title>
    <style type="text/css">
      html,
      body,
      header,
      #intro {
          height: 100vh;
      }
      body{
        overflow: auto;
      }
      #intro {
        background: url(img/monitoring.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
      }
      #Judul {
        background-color: rgba(0, 128, 255, 0.8);
      }
      #Merah {
        color: #ff0000;
      }
    </style>
  </head>
  <body>
    <header id="intro">
      <div class="d-flex align-items-center h-100">
        <div class="container">
          <div class="row justify-content-sm-center">
            <div class="col-sm-6">
              <div class="d-flex align-items-center h-100">
                <div class="container-fluid">
                  <div class="row">
                    <div id="Judul" class="col-sm-12 mb-1">
                    <h3 id="Merah" class="text-center mt-1"><b>SISTEM MONITORING DOSEN</b></h3>
                    <h3 class="text-center text-warning"><b>JURUSAN ILMU EKONOMI</b></h3>
                    <h4 class="text-center text-light"><b>UNIVERSITAS TRUNOJOYO MADURA</b></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="d-flex align-items-center h-100">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-sm-8">
                        <div class="card">
                          <div class="card-header bg-warning"><b class="text-primary">AUTENTIKASI</b></div>
                          <div class="card-body bg-primary">
                            <div class="input-group input-group-sm mb-2">
                              <div class="input-group-prepend">
                                <span class="input-group-text bg-warning text-primary"><b>Username</b></span>
                              </div>
                              <input type="text" class="form-control" id="nip">
                            </div>
                            <div class="input-group input-group-sm mb-2">
                              <div class="input-group-prepend">
                                <span class="input-group-text bg-warning text-primary"><b>Password</b></span>
                              </div>
                              <input type="password" class="form-control" id="sandi">
                            </div>
                            <div class="btn btn-danger d-flex justify-content-center" id="Masuk"><b>Masuk</b></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/popper.min.js" ></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <script>
      
      var BaseURL = '<?=base_url()?>'
      
      jQuery(document).ready(function($) {
        "use strict";
        
        $('[data-mask]').inputmask()

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