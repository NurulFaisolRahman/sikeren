    <link href="<?=base_url('summernote/summernote-bs4.min.css')?>" rel="stylesheet">
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
                        <table id="TabelRPS" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th class="text-center align-middle">No</th>
                              <th class="align-middle">Kode MK</th>
                              <th class="align-middle">Nama Mata Kuliah</th>
                              <th class="align-middle">Bobot</th>
                              <th class="align-middle">Semester</th>
                              <th class="align-middle text-center">Tahun</th>
                              <th style="width: 4%;" class="text-center align-middle">RPS</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($RPS as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['KodeMK']?></td>
                                <td class="align-middle"><?=$key['NamaMK']?></td>
                                <td class="align-middle"><?=$key['BobotMK'].' sks'?></td>
                                <td class="align-middle"><?=$key['Semester']?></td>
                                <td class="align-middle text-center"><?=$key['Tahun']?></td>
                                <td class="text-center align-middle">
                                  <button Unduh="<?=$key['KodeMK']?>" class="btn btn-sm btn-success Unduh"><i class="fas fa-download"></i></button> 
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
    <script src="<?=base_url('bootstrap/inputmask/min/jquery.inputmask.bundle.min.js')?>"></script>
    <script src="<?=base_url("summernote/summernote-bs4.min.js")?>"></script>
    <script src="<?=base_url("sumernote/summernote-image-attributes.js")?>"></script>
    <script src="<?=base_url("sumernote/lang/es-ES.js")?>"></script>
    <script src="<?=base_url('bootstrap/js/Borang.js')?>"></script>
		<script>
      $(document).ready(function(){
        var BaseURL = '<?=base_url()?>'
        
        $('#TabelRPS').DataTable( {
					// dom:'lfrtip',
					"ordering": false,
          "lengthMenu": [ [5, 10, 20, 30, -1], [5, 10, 20, 30, "All"] ],
					"language": {
						"paginate": {
							'previous': '<b class="text-primary"><</b>',
							'next': '<b class="text-primary">></b>'
						}
					}
        })
        
        $(document).on("click",".Unduh",function(){
          window.location = BaseURL + "Dashboard/UnduhRPS/" + $(this).attr('Unduh')
				})
      })
    </script>
  </body>
</html>