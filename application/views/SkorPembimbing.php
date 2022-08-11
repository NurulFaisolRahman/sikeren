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
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <div class="card my-1 bg-success">
            <div class="card-body p-2 text-light">
              <div class="table-responsive">
                <table class="table table-sm table-bordered table-striped">
                  <thead class="bg-danger">
                    <tr style="font-size: 10pt;" class="text-light text-center">
                      <th class="align-middle">No</th>
                      <th class="align-middle">NIP</th>
                      <th class="align-middle">Dosen</th>
                      <th class="align-middle">Skor</th>
                      <th class="align-middle">Kriteria</th>
                      <th class="align-middle">Jumlah Responden</th>
                    </tr>
                  </thead>
                  <tbody style="font-size: 12px;" class="bg-primary">
                  <?php $No = 1; $Total = 0; for ($i=0; $i < count($ListDosen); $i++) { $Total += $ListDosen[$i][4]; ?>
                    <tr class="text-light align-middle">
                      <td class="align-middle"><b><?=$No++?></b></td>
                      <td class="align-middle"><b><?=$ListDosen[$i][0]?></b></td>
                      <td class="align-middle"><b><?=$ListDosen[$i][1]?></b></td>
                      <td class="align-middle"><b><?=number_format($ListDosen[$i][2],2)?></b></td>
                      <td class="align-middle"><b><?=$ListDosen[$i][3]?></b></td>
                      <td class="align-middle"><b><?=$ListDosen[$i][4]?></b></td>
                    </tr>
                  <?php } ?>
                    <tr style="font-size: 10pt;" class="text-light text-center bg-danger">
                      <th colspan="4" class="align-middle"></th>
                      <th class="align-middle">Total</th>
                      <th class="align-middle"><?=$Total?> Responden</th>
                    </tr>
                  </tbody>
                </table>
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
  </body>
</html>