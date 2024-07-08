<div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-sm-12 my-2 ">    
                      <div class="table-responsive mb-2">
                        <table id="TabelValidasi" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th style="width: 4%;" class="text-center align-middle">No</th>
                              <th style="width: 8%;" class="align-middle">NIM</th>
                              <th style="width: 15%;" class="align-middle">Nama</th>
                              <th style="width: 15%;" class="align-middle">Pembimbing</th>
                              <th style="width: 15%;" class="align-middle">Penguji 1</th>
                              <th style="width: 15%;" class="align-middle">Penguji 2</th>
                              <th style="width: 15%;" class="align-middle">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; $NamaDosen = array(); foreach ($Dosen as $key) { $NamaDosen[$key['NIP']] = $key['Nama']; } foreach ($Info as $key) { ?>
                              <tr style="font-size: 12px;">	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['NIM']?></td>
                                <td class="align-middle"><?=$key['Nama']?></td>
                                <td class="align-middle"><?=$key['NamaPembimbing']?></td>
                                <td class="align-middle"><?=$key['PengujiSkripsi1'] != '' ? $NamaDosen[$key['PengujiSkripsi1']] : '';?></td>
                                <td class="align-middle"><?=$key['PengujiSkripsi2'] != '' ? $NamaDosen[$key['PengujiSkripsi2']] : '';?></td>
                                <?php 
                                  $Penguji3 = $key['StatusUjianSkripsi'] == 'Menunggu Persetujuan Pembimbing' ? 'Belum Validasi' : ($key['NilaiSkripsi3'] == '' ? 'Belum Menilai' : 'Sudah Menilai');
                                  $Penguji1 = $key['StatusPengujiSkripsi1'] == '' ? 'Belum Validasi' : ($key['NilaiSkripsi1'] == '' ? 'Belum Menilai' : 'Sudah Menilai');
                                  $Penguji2 = $key['StatusPengujiSkripsi2'] == '' ? 'Belum Validasi' : ($key['NilaiSkripsi2'] == '' ? 'Belum Menilai' : 'Sudah Menilai');
                                ?>
                                <td class="align-middle"><?=$key['StatusUjianSkripsi'].' : <br> 1. Pembimbing '.$Penguji3.' <br> 2. Penguji 1 '.$Penguji1.' <br> 3. Penguji 2 '.$Penguji2?></td>
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
        </section>
      </div>
    </div>
    <script src="<?=base_url('bootstrap/js/jquery.min.js')?>"></script>
    <script src="<?=base_url('bootstrap/js/popper.min.js')?>" ></script>
    <script src="<?=base_url('bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('bootstrap/js/adminlte.min.js')?>"></script>
    <script src="<?=base_url('bootstrap/datatables/jquery.dataTables.js')?>"></script>
		<script src="<?=base_url('bootstrap/datatables-bs4/js/dataTables.bootstrap4.js')?>"></script>
    <script src="<?=base_url('bootstrap/js/Borang.js')?>"></script>
		<script>
			jQuery(document).ready(function($) {
				"use strict";
        var BaseURL = '<?=base_url()?>';

        $('#TabelValidasi').DataTable( {
					// dom:'lfrtip',
					"ordering": false,
          "lengthMenu": [[ 5, 10, 20, 30, -1 ],[ 5, 10, 20, 30, "All"]],
					"language": {
						"paginate": {
							'previous': '<b class="text-primary"><</b>',
							'next': '<b class="text-primary">></b>'
						}
					}
				})
			})
		</script>
  </body>
</html>