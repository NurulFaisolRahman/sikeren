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
                              <th style="width: 25%;" class="align-middle">Penguji</th>
                              <th style="width: 25%;" class="align-middle">Mahasiswa</th>
                              <th style="width: 7%;" class="text-center align-middle">Revisi</th>
                              <th style="width: 30%;" class="align-middle">Alasan</th>
                              <th style="width: 5%;" class="text-center align-middle">Validasi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($Revisi as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['Penguji']?></td>
                                <td class="align-middle"><?=$key['Nama']?></td>
                                <td class="text-center align-middle"><?=$key['Revisi']?></td>
                                <td class="align-middle"><?=$key['Alasan']?></td>
                                <td class="text-center align-middle">
                                  <?php if ($key['Status'] == 'Diajukan') { ?>
                                    <button Revisi="<?=$key['NIM']."|".$key['Revisi']."|".$key['NIP']."|".$key['Id']?>" class="btn btn-sm btn-primary Revisi" data-toggle="tooltip" data-placement="top" title="Validasi"><i class="fas fa-edit"></i></button>
                                    <button Tolak="<?=$key['Id']?>" class="btn btn-sm btn-warning Tolak" data-toggle="tooltip" data-placement="top" title="Tolak"><i class="fas fa-times"></i></button>
                                  <?php } else if ($key['Status'] == 'Disetujui') { ?>
                                    <a href="<?=base_url('Dashboard/BeritaAcaraRevisiNilai/'.$key['Id'])?>" class="btn btn-sm btn-success"><i class="fas fa-file-pdf"></i></a>
                                  <?php } else if ($key['Status'] == 'Ditolak') { ?>
                                    <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Ditolak"><i class="fas fa-times"></i></button> 
                                  <?php } ?>
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

        $('#TabelRevisi').DataTable( {
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

        $(document).on("click",".Revisi",function(){
					var Data = $(this).attr('Revisi')
					var Pisah = Data.split("|")
          var Data = { NIM: Pisah[0],
                       Revisi: Pisah[1],
                       Penguji: Pisah[2],
                       Id: Pisah[3] }
          var Konfirmasi = confirm("Apakah Data Yang Di Pilih Sudah Benar Untuk Di Validasi?"); 
          if (Konfirmasi == true) {
            $.post(BaseURL+"Dashboard/RevisiNilaiUjian", Data).done(function(Respon) {
              if (Respon == '1') {
                alert('Revisi Nilai Berhasil Di Validasi')
                window.location = BaseURL + "Dashboard/RevisiNilaiKPS"
              }
            })    
          }
        })

        $(document).on("click",".Tolak",function(){
					var Data = { Id: $(this).attr('Tolak') }
          var Konfirmasi = confirm("Apakah Data Yang Di Pilih Sudah Benar Untuk Di Tolak?"); 
          if (Konfirmasi == true) {
            $.post(BaseURL+"Dashboard/TolakRevisiNilaiUjian", Data).done(function(Respon) {
              if (Respon == '1') {
                alert('Revisi Nilai Berhasil Di Tolak')
                window.location = BaseURL + "Dashboard/RevisiNilaiKPS"
              }
            })    
          }
        })

			})
		</script>
  </body>
</html>