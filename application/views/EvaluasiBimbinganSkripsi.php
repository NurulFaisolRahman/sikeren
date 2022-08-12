<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="<?=base_url('img/favicon.ico')?>" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=base_url('bootstrap/css/bootstrap.min.css')?>">
    <title>Evaluasi PBM</title>
    <style type="text/css">
      #Opsi {
        color: #FF0000;text-shadow: -0.7px -0.7px 0 #fff, 0.7px -0.7px 0 #fff, -0.7px 0.7px 0 #fff, 0.7px 0.7px 0 #fff;
      }
    </style>
  </head>
  <body>
  <?php $Question = array('1. Pembimbing melakukan pembimbingan secara teratur atau terjadwal misal 1 kali dalam seminggu?',
                          '2. Pembimbing memberikan waktu yang cukup untuk berkonsultasi?',
                          '3. Pembimbing menguasai topik penelitian mahasiswa?',
                          '4. Pembimbing menguasai standar penulisan skripsi?',
                          '5. Pembimbing menguasai teknik penulisan referensi yang benar?',
                          '6. Pembimbing mendorong mahasiswa mencari referensi yang lebih luas mengenai topik penelitian?',
                          '7. Pembimbing mengarahkan dalam penulisan skripsi?',
                          '8. Pembimbing memberikan semangat kepada mahasiswa untuk menyelesaikan skripsi?',
                          '9. Pembimbingan memonitor perkembangan skripsi?',
                          '10. Fasilitas pembimbingan menggunakan SIKEREN membantu dalam penyelesaian skripsi?'); 
  ?>
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <div class="card my-1 bg-danger">
            <div class="card-body p-2 text-light">
              <p class="font-weight-bold" style="font-size: 25px;">Kuesioner Kepuasan Layanan Pembimbingan Skripsi</p>
              <p class="text-justify">Dalam rangka meningkatkan mutu bimbingan skripsi, Anda dimohon memberikan penilaian terhadap kinerja dosen pembimbing dalam proses BIMBINGAN SKRIPSI secara objektif dan jujur sesuai dengan yang anda alami. Jawaban yang Anda berikan tidak ada hubungannya dengan penilaian akhir prestasi belajar Anda.</p>
              <p class="text-justify font-weight-bold my-1">SEMUA PERTANYAAN WAJIB DI ISI *</p>
              <p class="text-justify font-weight-bold my-0">Skor Penilaian :  (1) Sangat Tidak Baik (2) Tidak Baik (3) Cukup Baik (4) Baik (5) Sangat Baik</p>
              <div class="row">
                <div class="col-lg-4 my-1">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <label class="input-group-text bg-primary text-light"><b>NIM</b></label>
                    </div>
                    <input class="form-control form-control-sm" type="text" id="NIM" data-inputmask='"mask": "999999999999"' data-mask>
                  </div>
                </div>
                <?php for ($i=0; $i < count($Question); $i++) { ?>
                  <div class="col-lg-12 my-1">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                        <label class="input-group-text bg-primary text-light text-wrap text-left"><b><?=$Question[$i]?></b></label>
                      </div>
                    </div>
                  </div>
                  <div class="container-fluid" id="NilaiDosen<?=$i?>">
                    <div class="row">
                      <div class="col-lg-auto my-1">
                        <div class="input-group input-group-sm d-flex justify-content-center">
                          <div class="input-group-prepend">
                            <label class="input-group-text bg-primary text-light"><b>Penilaian Anda</b></label>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-auto d-flex align-items-center my-1">
                        <div class="input-group input-group-sm d-flex justify-content-center">
                          <?php for ($j=1; $j < 6; $j++) { ?>
                            <div class="form-check form-check-inline mx-3">
                              <input class="form-check-input" type="radio" name="Input<?=$i?>" id="I<?=$i.$j?>" value="<?=$j?>">
                              <label class="form-check-label font-weight-bold" for="I<?=$i.$j?>"><?=$j?></label>
                            </div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div> 
                <?php } ?>
                <div class="col-lg-12 my-1">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <label class="input-group-text bg-primary text-light text-wrap text-left"><b>11. Mohon menuliskan saran/kritik bagi pengembangan proses pembimbingan skripsi</b></label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 mt-1">
                  <div class="form-group">
                    <textarea class="form-control" id="Saran" rows="2"></textarea>
                  </div>
                </div>
                <div class="col-12">
                  <button type="button" class="btn btn-primary" id="Kirim"><b>Kirim</b></button>
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
    <script src="<?=base_url('bootstrap/inputmask/min/jquery.inputmask.bundle.min.js')?>"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('[data-mask]').inputmask()
        var BaseURL = '<?=base_url()?>'
        $("#Kirim").click(function() {
          if (isNaN($("#NIM").val()) || $("#NIM").val() === "") {
            alert('Mohon Input NIM 12 Digit Angka!')
          } else {
            Tampung = []
            for (let i = 0; i < 10; i++) {
              if ($("input[name='Input"+i+"']:checked").val() == undefined) {
                alert('Pertanyaan Nomer '+(i+1)+' Wajib Di isi!')
                return true
              } else {
                Tampung.push($("input[name='Input"+i+"']:checked").val())
              }
            }
            var Nilai = Tampung.join("|")
            var Data = { NIM: $("#NIM").val(),
                         Nilai: Nilai,
                         Saran: $("#Saran").val()}
            var Konfirmasi = confirm("Yakin Ingin Menyimpan Penilaian?"); 
            if (Konfirmasi == true) {                         
              $("#Kirim").prop('disabled', true);
              $.post(BaseURL+"SMD/InputEvaluasiBimbinganSkripsi", Data).done(function(Respon) {
                if (Respon == '1') {
                  alert('Terima Kasih Telah Mengisi Kuisioner :)')
                  window.location = BaseURL + "SMD/EvaluasiBimbinganSkripsi"
                } else {
                  alert(Respon)
                  $("#Kirim").prop('disabled', false);
                }
              })
            }
          }
        })
      })
    </script>
  </body>
</html>