<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="<?=base_url('img/favicon.ico')?>" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../bootstrap/css/adminlte.min.css">
    <title>Kuisioner Mahasiswa</title>
  </head>
  <body>
    <div class="container-fluid p-3">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
          <div style="background-color: yellow;" class="card">
            <div class="card-header bg-danger text-light">
              <b>Kuisioner Karya Ilmiah Mahasiswa (S2 Ilmu Ekonomi) yang Disitasi</b>
            </div>
            <div class="card-body border border-primary">
              <div class="container-fluid">
                <div class="row my-1">
                  <div class="col-lg-4 my-1">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                        <label class="input-group-text bg-primary text-light"><b>NIM</b></label>
                      </div>
                      <input class="form-control form-control-sm" type="text" id="NIM" data-inputmask='"mask": "999999999999"' data-mask>
                    </div>
                  </div>
                  <div class="col-lg-8 my-1">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-primary"><b>Nama</b></span>
                      </div>
                      <input type="text" class="form-control" id="Nama" placeholder="Input Nama Mahasiswa"> 
                    </div>
                  </div>
                  <div class="col-lg-12 my-1">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-primary"><b>Judul</b></span>
                      </div>
                      <input type="text" class="form-control" id="Judul" placeholder="Jurnal, Volume, Tahun, Nomor, Halaman"> 
                    </div>
                  </div>
                  <div class="col-lg-3 my-1">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend"> 
                        <label class="input-group-text bg-primary text-light"><b>Tahun</b></label>
                      </div>
                      <input class="form-control form-control-sm" type="text" id="Tahun" data-inputmask='"mask": "9999"' data-mask value="20">
                    </div>
                  </div>
                  <div class="col-lg-3 my-1">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-primary"><b>Jumlah Sitasi</b></span>
                      </div>
                      <input type="text" class="form-control" id="Jumlah" placeholder="0"> 
                    </div>
                  </div>
                  <div class="col-lg-6 my-1">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-primary text-primary"><b>Bukti</b></span>
                      </div>
                      <input class="form-control" type="file" id="Bukti">
                    </div>
                    <pre class="text-danger"><b>Bukti Dalam Format Pdf!</b></pre>
                  </div>
                  <div class="col-lg-12">
                    <button type="button" class="btn btn-danger" id="Kirim"><b>Kirim</b></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="../../bootstrap/js/jquery.min.js"></script>
    <script src="../../bootstrap/js/popper.min.js" ></script>
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../bootstrap/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('[data-mask]').inputmask()
        var BaseURL = '<?=base_url()?>'
        $("#Kirim").click(function() {
          if (isNaN($("#NIM").val()) || $("#NIM").val() === "") {
            alert('Input NIM Hanya Boleh 12 Digit Angka!')
          } else if ($("#Nama").val() === "") {
            alert('Input Nama Tidak Boleh Kosong!')
          } else if ($("#Judul").val() === "") {
            alert('Input Judul Tidak Boleh Kosong!')
          } else if (isNaN($("#Tahun").val()) || $("#Tahun").val() === "") {
            alert('Input Tahun Belum Benar!')
          } else if (isNaN(parseInt($("#Jumlah").val())) || $("#Jumlah").val() === "") {
            alert('Input Jumlah Sitasi Belum Benar!')
          } else {
            var fd = new FormData()
						fd.append('Homebase','S2')
            fd.append('NIM',$("#NIM").val())
            fd.append('Nama',$("#Nama").val())
            fd.append('Judul',$("#Judul").val())
            fd.append('Tahun',$("#Tahun").val())
            fd.append('Jumlah',$("#Jumlah").val())
            fd.append("Bukti", $('#Bukti')[0].files[0])
            $.ajax({
							url: BaseURL+'SMD/InputKuisioner/SitasiMahasiswa',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
                  alert('Terima Kasih Telah Mengisi Kuisioner :)')
									window.location = BaseURL + "SMD/Kuisioner/SitasiMahasiswa"
								}
								else {
									alert(Respon)
								}
							}
						})
          }
        })
      })
    </script>
  </body>
</html>