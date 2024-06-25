<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="<?=base_url('img/favicon.ico')?>" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=base_url('bootstrap/css/bootstrap.min.css')?>">
    <title>Rekap Skripsi</title>
    <style type="text/css">
      .table td, .table th {
        padding: 2px;
      }
    </style>
  </head>
  <body>
  <?php $NamaDosen = array(); foreach ($Dosen as $key) { $NamaDosen[$key['NIP']] = $key['Nama']; } ?>
    <div class="container-fluid">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-12">
          <div class="card my-1 bg-success">
            <div class="card-body p-2 text-light">
              <p class="font-weight-bold mb-1 text-center" style="font-size: 25px;">Rekap Ujian Skripsi Semester Genap 2023/2024 </p>
              <div class="row">
                <div class="col-lg-12">
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead style="font-size: 15px;" class="bg-warning">
                        <tr>
                          <th rowspan="2" style="width: 40px;" class="text-center align-middle">No</th>
                          <th rowspan="2" style="width: 200px;" class="text-center align-middle">NIM & Nama</th>
                          <th colspan="3" class="text-center align-middle">Ujian Proposal</th>
                          <th colspan="3" class="text-center align-middle">Ujian Skripsi</th>
                        </tr>
                        <tr class="text-center align-middle">
                          <th>Penguji 1</th>
                          <th>Penguji 2</th>
                          <th>Penguji 3</th>
                          <th>Penguji 1</th>
                          <th>Penguji 2</th>
                          <th>Penguji 3</th>
                        </tr>
                      </thead>
                      <tbody style="font-size: 12px;" class="bg-white">
                        <?php $No = 1; foreach ($Mhs as $key) { ?>
                          <tr class="text-dark font-weight-bold">	
                            <td rowspan="2" class="text-center align-middle"><?=$No++?></td>
                            <td rowspan="2" class="align-middle bg-primary"><b class="text-white"><?=$key['NIM']?></b><br><b class="text-white"><?=$key['Nama']?></b></td>
                            <th colspan="3" class="text-center align-middle text-white bg-primary"><?='Tanggal Ujian Proposal : '.date('d-m-Y',strtotime($key['TanggalUjianProposal']))?></th>
                            <th colspan="3" class="text-center align-middle text-white bg-primary"><?='Tanggal Ujian Skripsi : '.date('d-m-Y',strtotime($key['TanggalUjianSkripsi']))?></th>
                          </tr>
                          <tr class="text-dark font-weight-bold">	
                            <?php if ($key['NilaiProposal1'] == '') { ?>
                              <td class='text-center text-danger align-middle'><?=$NamaDosen[$key['PengujiProposal1']]?></td>
                            <?php } else { ?>
                              <td class='text-center text-success align-middle'><?=$NamaDosen[$key['PengujiProposal1']]?></td>
                            <?php } ?>
                            <?php if ($key['NilaiProposal2'] == '') { ?>
                              <td class='text-center text-danger align-middle'><?=$NamaDosen[$key['PengujiProposal2']]?></td>
                            <?php } else { ?>
                              <td class='text-center text-success align-middle'><?=$NamaDosen[$key['PengujiProposal2']]?></td>
                            <?php } ?>
                            <?php if ($key['NilaiProposal3'] == '') { ?>
                              <td class='text-center text-danger align-middle'><?=$key['NamaPembimbing']?></td>
                            <?php } else { ?>
                              <td class='text-center text-success align-middle'><?=$key['NamaPembimbing']?></td>
                            <?php } ?>
                            <?php if ($key['NilaiSkripsi1'] == '') { ?>
                              <td class='text-center text-danger align-middle'><?=$NamaDosen[$key['PengujiSkripsi1']]?></td>
                            <?php } else { ?>
                              <td class='text-center text-success align-middle'><?=$NamaDosen[$key['PengujiSkripsi1']]?></td>
                            <?php } ?>
                            <?php if ($key['NilaiSkripsi2'] == '') { ?>
                              <td class='text-center text-danger align-middle'><?=$NamaDosen[$key['PengujiSkripsi2']]?></td>
                            <?php } else { ?>
                              <td class='text-center text-success align-middle'><?=$NamaDosen[$key['PengujiSkripsi2']]?></td>
                            <?php } ?>
                            <?php if ($key['NilaiSkripsi3'] == '') { ?>
                              <td class='text-center text-danger align-middle'><?=$key['NamaPembimbing']?></td>
                            <?php } else { ?>
                              <td class='text-center text-success align-middle'><?=$key['NamaPembimbing']?></td>
                            <?php } ?>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div> 
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
  </body>
</html>