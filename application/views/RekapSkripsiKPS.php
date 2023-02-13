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
                        <table id="TabelUjianSkripsi" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th style="width: 4%;" class="text-center align-middle">No</th>
                              <th style="width: 12%;" class="align-middle">NIM</th>
                              <th class="align-middle">Nama</th>
                              <th class="align-middle">Dosen Pembimbing</th>
                              <th class="align-middle">Tanggal Ujian</th>
                              <th class="align-middle">Semester Tahun Ajaran</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($RekapNilai as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['NIM']?></td>
                                <td class="align-middle"><?=$key['Nama']?></td>
                                <td class="align-middle"><?=$key['NamaPembimbing']?></td>
                                <td class="align-middle"><?=$key['TanggalUjianSkripsi']?></td>
                                <td class="align-middle">
                                  <?php $Bulan = explode("-",$key['TanggalUjianSkripsi']) ;
                                  if (intval($Bulan[1]) < 8) {
                                    if (intval($Bulan[1]) < 2) {
                                      echo 'GANJIL '.(intval($Bulan[0])-1).'/'.intval($Bulan[0]);
                                    } else {
                                      echo 'GENAP '.(intval($Bulan[0])-1).'/'.intval($Bulan[0]);
                                    }
                                  } else {
                                    if (intval($Bulan[1]) < 2) {
                                      echo 'GENAP '.intval($Bulan[0]).'/'.(intval($Bulan[0])+1);
                                    } else {
                                      echo 'GANJIL '.intval($Bulan[0]).'/'.(intval($Bulan[0])+1);
                                    }
                                  }
                                   ?>
                                  </td>
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

        $('#TabelUjianSkripsi').DataTable( {
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