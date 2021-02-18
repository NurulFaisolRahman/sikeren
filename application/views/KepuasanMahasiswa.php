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
        <div class="col-lg-6 col-sm-12">
          <div style="background-color: yellow;" class="card">
            <div class="card-header bg-danger text-light">
              <b>Kuisioner Kepuasan Mahasiswa Terhadap Proses Pendidikan</b>
            </div>
            <div class="card-body border border-primary">
              <div class="container-fluid">
                <div class="row my-1">
                  <div class="col-lg-4 col-sm-12 my-1">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                        <label class="input-group-text bg-primary text-light"><b>NIM</b></label>
                      </div>
                      <input class="form-control form-control-sm" type="text" id="NIM" data-inputmask='"mask": "999999999999"' data-mask>
                    </div>
                  </div> 
                  <div class="col-lg-8 col-sm-12 my-1"> 
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
                  <?php 
                    $Tanya = array('Keandalan (reliability) : kemampuan dosen, tenaga kependidikan, dan pengelola dalam memberikan pelayanan.',
                                      'Daya tanggap (responsiveness) : kemauan dari dosen, tenaga kependidikan, dan pengelola dalam membantu mahasiswa dan memberikan jasa dengan cepat.',
                                      'Kepastian (assurance) : kemampuan dosen, tenaga kependidikan, dan pengelola untuk memberi keyakinan kepada mahasiswa bahwa pelayanan yang diberikan telah sesuai dengan ketentuan.',
                                      'Empati (empathy) : kesediaan/kepedulian dosen, tenaga kependidikan, dan pengelola untuk memberi perhatian kepada mahasiswa.',
                                      'Tangible : penilaian mahasiswa terhadap kecukupan, aksesibitas, kualitas sarana dan prasarana.'); 
                    $Opsi = array('Sangat Baik','Baik','Cukup','Kurang');
                  ?>
                  <?php for ($j=0; $j < count($Tanya); $j++) { ?>
                    <div class="col-sm-12 my-1">
                      <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                          <p class="input-group-text bg-primary text-light text-justify text-wrap"><b><?=($j+1).'. '.$Tanya[$j]?></b></p>
                        </div>
                      </div>
                    </div> 
                    <?php for ($i=0; $i < 4; $i++) { ?>
                    <div class="col-lg-3 my-1">
                      <div class="input-group input-group-sm ml-2"> 
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="Input<?=($j+1)?>" id="I<?=($j+1).$i?>" value="<?=($i+1)?>">
                          <label style="font-size: 14px;" class="form-check-label font-weight-bold" for="I<?=($j+1).$i?>"><?=$Opsi[$i]?></label>
                        </div>
                      </div>
                    </div> 
                    <?php } ?>
                  <?php } ?>
                  <div class="col-12 text-center my-1">
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
          } else if ($("input[name='Input1']:checked").val() == undefined) {
            alert('Pertanyaan Nomer 1 Wajib Di Isi!')
          } else if ($("input[name='Input2']:checked").val() == undefined) {
            alert('Pertanyaan Nomer 2 Wajib Di Isi!')
          } else if ($("input[name='Input3']:checked").val() == undefined) {
            alert('Pertanyaan Nomer 3 Wajib Di Isi!')
          } else if ($("input[name='Input4']:checked").val() == undefined) {
            alert('Pertanyaan Nomer 4 Wajib Di Isi!')
          } else if ($("input[name='Input5']:checked").val() == undefined) {
            alert('Pertanyaan Nomer 5 Wajib Di Isi!')
          } else {
            Poin = ""
            for (let i = 1; i <= 5; i++) {
              Poin += $("input[name='Input"+i+"']:checked").val()
              if (i < 5) {
                Poin += '|'
              } 
            }
            var Data = { NIM: $("#NIM").val(),
                         Homebase: $("#Homebase").val(),
                         Poin: Poin,
                         Tahun: new Date().getFullYear()}
            $.post(BaseURL+"SMD/InputKuisioner/KepuasanMahasiswa", Data).done(function(Respon) {
              if (Respon == '1') {
                alert('Terima Kasih Telah Mengisi Kuisioner :)')
                window.location = BaseURL + "SMD/Kuisioner/KepuasanMahasiswa"
              } else {
                alert(Respon)
              }
            })
          }
        })
      })
    </script>
  </body>
</html>