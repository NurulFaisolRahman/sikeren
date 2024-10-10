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
                        <table id="TabelRevisi" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th style="width: 4%;" class="text-center align-middle">No</th>
                              <th style="width: 25%;" class="align-middle">Pembimbing</th>
                              <th style="width: 25%;" class="align-middle">Mahasiswa</th>
                              <th style="width: 30%;" class="align-middle">Alasan</th>
                              <th style="width: 5%;" class="text-center align-middle">Validasi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($Retur as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['Pembimbing']?></td>
                                <td class="align-middle"><?=$key['Nama']?></td>
                                <td class="align-middle"><?=$key['Alasan']?></td>
                                <td class="text-center align-middle">
                                  <button Retur="<?=$key['NIM']."|".$key['NIP']."|".$key['Id']?>" class="btn btn-sm btn-primary Retur" data-toggle="tooltip" data-placement="top" title="Validasi"><i class="fas fa-edit"></i></button>
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
        var BaseURL = '<?=base_url()?>';

        $('#TabelRetur').DataTable( {
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

        $(document).on("click",".Retur",function(){
					var Data = $(this).attr('Retur')
					var Pisah = Data.split("|")
          var Data = { NIM: Pisah[0],
                       NIP: Pisah[1],
                       Id: Pisah[2] }
          $.post(BaseURL+"Dashboard/KPSReturBimbingan", Data).done(function(Respon) {
            if (Respon == '1') {
              alert('Retur Bimbingan Berhasil')
              window.location = BaseURL + "Dashboard/ReturBimbinganKPS"
            }
          })    
        })

			})
		</script>
  </body>
</html>