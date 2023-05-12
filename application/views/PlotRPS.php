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
                              <th class="align-middle">Nama Dosen</th>
                              <th class="align-middle">Kode MK</th>
                              <th class="align-middle">Nama Mata Kuliah</th>
                              <th class="align-middle">Bobot</th>
                              <th class="align-middle">Semester</th>
                              <th class="align-middle">Validasi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($RPS as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['Nama']?></td>
                                <td class="align-middle"><?=$key['KodeMK']?></td>
                                <td class="align-middle"><?=$key['NamaMK']?></td>
                                <td class="align-middle"><?=$key['BobotMK'].' sks'?></td>
                                <td class="align-middle"><?=$key['Semester']?></td>
                                <td class="align-middle">
                                  <?php if ($key['Status'] == 1) { ?>
                                    <button Valid="<?=$key['Id']?>" class="btn btn-sm btn-primary Valid"><i class="fas fa-check"></i></button> 
                                  <?php } else if ($key['Status'] == 3) { ?>
                                    <button Unduh="<?=$key['KodeMK']?>" class="btn btn-sm btn-success Unduh"><i class="fas fa-download"></i></button> 
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
    <div class="modal fade" id="ModalInputMengajar">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Mata Kuliah</b></span>
                    </div>
                    <select class="custom-select" id="MK">
                      <?php foreach ($RPS as $key) { ?>
                        <option value="<?=$key['KodeMK']?>"><?=$key['NamaMK']?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="InputMengajar"><b>Simpan <div id="LoadingInputMengajar" class="spinner-border spinner-border-sm text-white" style="display: none;" role="status"></div></b></button>
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

        $(document).on("click",".Valid",function(){
					var Valid = {Id: $(this).attr('Valid')}
					$.post(BaseURL+"Dashboard/KPSValidasiRPS", Valid).done(function(Respon) {
            if (Respon == '1') {
              window.location = BaseURL + "Dashboard/PlotRPS"
            } else {
              alert(Respon)
            }
          })
				})

        $(document).on("click",".Unduh",function(){
          window.location = BaseURL + "Dashboard/UnduhRPS/" + $(this).attr('Unduh')
				})
      })
    </script>
  </body>
</html>