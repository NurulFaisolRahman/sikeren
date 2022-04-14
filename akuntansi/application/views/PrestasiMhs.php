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
                        <table id="TabelPrestasiMahasiswa" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th class="text-center align-middle">No</th>
                              <th class="align-middle text-center">Home<br>base</th>
                              <th class="align-middle text-center">Jenis<br>Prestasi</th>
                              <th class="align-middle">Nama Kegiatan</th>
                              <th class="align-middle text-center">Prestasi Tahun</th>
                              <th class="align-middle">Prestasi Tingkat</th>
                              <th class="align-middle">Prestasi Yang Dicapai</th>
                              <th class="align-middle">Sertifikat</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($PrestasiMhs as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle text-center"><?=$key['Homebase']?></td>
                                <td class="align-middle text-center"><?=$key['JenisPrestasi']==1?'Akademik':'Non Akademik';?></td>
                                <td class="align-middle"><?=$key['NamaPrestasi']?></td>
                                <td class="align-middle text-center"><?=$key['TahunPrestasi']?></td>
                                <td class="align-middle"><?=$key['TingkatPrestasi']==1?'Lokal/Wilayah':($key['TingkatPrestasi']==2?'Nasional':'Internasional');?></td>
                                <td class="align-middle"><?=$key['CapaianPrestasi']?></td>
                                <td class="align-middle">
                                  <button LihatSertifikat="<?=base_url('PrestasiMahasiswa/'.$key['Bukti'])?>" class="btn btn-sm btn-primary LihatSertifikat"><i class="fas fa-download"></i></button>  
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
    <div class="modal fade" id="ModalSertifikat">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h5 class="modal-title font-weight-bold">Bukti Sertifikat</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <embed id="PathSertifikat" src="" type="application/pdf" width="100%" height="400"/>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
          </div>
        </div>
      </div>
    </div>
    <script src="<?=base_url('bootstrap/js/jquery.min.js')?>"></script>
    <script src="<?=base_url('bootstrap/js/popper.min.js')?>" ></script>
    <script src="<?=base_url('bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('bootstrap/js/adminlte.min.js')?>"></script>
    <script src="<?=base_url('bootstrap/datatables/jquery.dataTables.js')?>"></script>
		<script src="<?=base_url('bootstrap/datatables-bs4/js/dataTables.bootstrap4.js')?>"></script>
    <script src="<?=base_url('bootstrap/inputmask/min/jquery.inputmask.bundle.min.js')?>"></script>
    <script src="<?=base_url('bootstrap/js/Borang.js')?>"></script>
		<script>
			jQuery(document).ready(function($) {
				"use strict";

        $(document).on("click",".LihatSertifikat",function(){
					var Path = $(this).attr('LihatSertifikat')
          $('#PathSertifikat').attr('src',Path)		
          $('#ModalSertifikat').modal("show")
        }) 
        
        $('#TabelPrestasiMahasiswa').DataTable( {
					// dom:'lfrtip',
					"ordering": false,
          "lengthMenu": [ 5, 10, 20, 30 ],
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