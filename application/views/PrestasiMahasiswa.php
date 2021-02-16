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
        <div class="col-sm-6">
          <div style="background-color: yellow;" class="card">
            <div class="card-header bg-danger text-light">
              <b>Kuisioner Prestasi Mahasiswa</b>
            </div>
            <div class="card-body border border-primary">
              <div class="container-fluid">
                <div class="row my-3">
                  <div class="col-sm-6 my-1"> 
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                        <label class="input-group-text bg-primary text-light"><b>Program Studi</b></label>
                      </div>
                      <select class="custom-select custom-select-sm" id="Homebase">										
                        <option value="S1">S1 Ekonomi Pembangunan</option>
                        <option value="S2">S2 Ilmu Ekonomi</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6 my-1">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                        <label class="input-group-text bg-primary text-light"><b>Jenis Prestasi</b></label>
                      </div>
                      <select class="custom-select" id="JenisPrestasi">                    
                        <option value="1">Prestasi Akademik</option>
                        <option value="2">Prestasi Non Akademik</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-3 my-1">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                        <label class="input-group-text bg-primary text-light"><b>NIM</b></label>
                      </div>
                      <input class="form-control form-control-sm" type="text" id="NIM" data-inputmask='"mask": "999999999999"' data-mask>
                    </div>
                  </div> 
                  <div class="col-sm-5 my-1">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                        <label class="input-group-text bg-primary text-light"><b>Prestasi Tingkat</b></label>
                      </div>
                      <select class="custom-select" id="TingkatPrestasi">                    
                        <option value="1">Lokal/Wilayah</option>
                        <option value="2">Nasional</option>
                        <option value="3">Internasional</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4 my-1">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                        <label class="input-group-text bg-primary text-light"><b>Prestasi Tahun</b></label>
                      </div>
                      <input class="form-control form-control-sm" type="text" id="TahunPrestasi" data-inputmask='"mask": "9999"' data-mask value="20">
                    </div>
                  </div>
                  <div class="col-sm-12 my-1">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                        <label class="input-group-text bg-primary text-light"><b>Nama Kegiatan</b></label>
                      </div>
                      <input class="form-control form-control-sm" type="text" id="NamaPrestasi">
                    </div>
                  </div> 
                  <div class="col-sm-12 my-1">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                        <label class="input-group-text bg-primary text-light"><b>Prestasi Yang Dicapai</b></label>
                      </div>
                      <input class="form-control form-control-sm" type="text" id="CapaianPrestasi">
                    </div>
                  </div>
                  <div class="col-sm-12 my-1">
                    <div class="input-group input-group-sm mb-2">
                      <div class="input-group-prepend">
                        <span class="input-group-text bg-primary text-primary"><b>Upload Sertifikat Prestasi</b></span>
                      </div>
                      <input class="form-control" type="file" id="Bukti">
                    </div>
                    <pre class="text-danger mb-1"><b>File Yang Diupload Dalam Format Pdf</b></pre>
                  </div>  
                  <div class="col-sm-auto">
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
          } else if (isNaN($("#TahunPrestasi").val()) || $("#TahunPrestasi").val() === "") {
            alert('Input Tahun Prestasi Hanya Boleh 4 Digit Angka!')
          } else if ($("#NamaPrestasi").val() === "") {
            alert('Input Nama Prestasi Tidak Boleh Kosong!')
          } else if ($("#CapaianPrestasi").val() === "") {
            alert('Input Capaian Prestasi Tidak Boleh Kosong!')
          } else {
            var fd = new FormData()
						fd.append('Homebase',$("#Homebase").val())
            fd.append('NIM',$("#NIM").val())
            fd.append('JenisPrestasi',$("#JenisPrestasi").val())
            fd.append('NamaPrestasi',$("#NamaPrestasi").val())
            fd.append('TingkatPrestasi',$("#TingkatPrestasi").val())
            fd.append('CapaianPrestasi',$("#CapaianPrestasi").val())
            fd.append('TahunPrestasi',$("#TahunPrestasi").val())
            fd.append("Bukti", $('#Bukti')[0].files[0])
            $.ajax({
							url: BaseURL+'SMD/InputKuisioner/PrestasiMahasiswa',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
                  alert('Terima Kasih Telah Mengisi Kuisioner :)')
									window.location = BaseURL + "SMD/Kuisioner/PrestasiMahasiswa"
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