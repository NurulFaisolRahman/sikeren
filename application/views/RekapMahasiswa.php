<div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-6 mt-2">
                      <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                          <label class="input-group-text bg-primary text-light"><b>Status Mahasiswa</b></label>
                        </div>
                        <select class="custom-select custom-select-sm" id="Status">					
                            <option value="1" <?=$this->uri->segment('3')=='1' ? 'selected' : '';?>>Sudah Ujian Skripsi</option>
                            <option value="2" <?=$this->uri->segment('3')=='2' ? 'selected' : '';?>>Sudah Ujian Proposal</option>
                            <option value="3" <?=$this->uri->segment('3')=='3' ? 'selected' : '';?>>Mendapat Dosen Pembimbing</option>
                            <option value="4" <?=$this->uri->segment('3')=='4' ? 'selected' : '';?>>Menunggu Validasi Pembimbing</option>
                            <option value="5" <?=$this->uri->segment('3')=='5' ? 'selected' : '';?>>Menunggu Validasi KPS</option>
                            <option value="6" <?=$this->uri->segment('3')=='6' ? 'selected' : '';?>>Menunggu Validasi Admin</option>
                            <option value="7" <?=$this->uri->segment('3')=='7' ? 'selected' : '';?>>Belum Mengajukan Pembimbing</option>
                        </select>
                        <div class="input-group-prepend">
                          <label class="input-group-text bg-danger text-light" id="Lihat"><b>Lihat Data</b></label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12 my-2 ">    
                      <div class="table-responsive mb-2">
                        <table id="TabelUjianSkripsi" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th style="width: 4%;" class="text-center align-middle">No</th>
                              <th style="width: 12%;" class="align-middle">NIM</th>
                              <th style="width: 20%;" class="align-middle">Nama</th>
                              <th class="align-middle">Dosen Pembimbing</th>
                              <th class="align-middle">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($Rekap as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['NIM']?></td>
                                <td class="align-middle"><?=$key['Nama']?></td>
                                <td class="align-middle"><?=$key['NamaPembimbing']?></td>
                                <td class="align-middle"><?=$Status?></td>
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

        $("#Lihat").click(function() {
          window.location = BaseURL + "Dashboard/RekapMahasiswa/"+$("#Status").val()
				})

        $('#TabelUjianSkripsi').DataTable( {
					// dom:'lfrtip',
					"ordering": false,
          "lengthMenu": [[ 10, 20, 30, -1 ],[ 10, 20, 30, "All"]],
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