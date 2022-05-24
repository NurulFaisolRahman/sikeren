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
                        <table id="TabelBimbingan" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th style="width: 4%;" class="text-center align-middle">No</th>
                              <th style="width: 10%;">NIM</th>
                              <th style="width: 15%;">Nama</th>
                              <th>Tanggal</th>
                              <th>Poin Bimbingan</th>
                              <th>Catatan Dosen</th>
                              <th style="width: 7%;text-align: center;">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($Bimbingan as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['NIM']?></td>
                                <td class="align-middle"><?=$key['Nama']?></td>
                                <td class="align-middle"><?=$key['TanggalBimbingan']?></td>
                                <td class="align-middle"><?=$key['PoinBimbingan']?></td>
                                <td class="align-middle"><?=$key['CatatanDosen']?></td>
                                <td class="text-center align-middle">
                                  <button UpdateBimbingan="<?=$key['Id'].'|'.$key['CatatanMahasiswa'].'|'.$key['CatatanDosen']?>" class="btn btn-sm btn-warning UpdateBimbingan"><i class="fas fa-edit"></i></button>  
                                  <button LihatProposal="<?=base_url('Proposal/'.$key['FileBimbingan'])?>" class="btn btn-sm btn-danger LihatProposal"><i class="fas fa-file-pdf"></i></button>  
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
    <div class="modal fade" id="ModalUpdateBimbingan">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-success">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
									<div class="card-header bg-danger text-light mt-2">
										<b>Form Kartu Bimbingan Skripsi</b>
									</div>
									<div class="card-body border border-primary bg-warning">
										<div class="container-fluid">
											<div class="row">
                        <div class="col-lg-12 my-1">
													<div class="input-group input-group-sm"> 
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Catatan Mahasiswa</b></label>
														</div>
														<textarea class="form-control" id="CatatanMahasiswa" rows="3"></textarea>
													</div>
												</div>
                        <div class="col-lg-12 my-1">
													<div class="input-group input-group-sm"> 
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Catatan Dosen</b></label>
														</div>
														<textarea class="form-control" id="CatatanDosen" rows="3"></textarea>
													</div>
                        </div>
                        <input class="form-control" type="hidden" id="IdBimbingan">
												<div class="col-lg-12">
													<button type="button" class="btn btn-primary mb-2" id="UpdateBimbingan"><b>SIMPAN&nbsp;<div id="LoadingUpdateBimbingan" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
												</div>
											</div>
										</div>
									</div>
								</div>
              </div>
            </div>
          </div>
        </div>
      </div>
		</div>
    <div class="modal fade" id="ModalProposal">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathProposal" src="" type="application/pdf" width="100%" height="520"/>
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
    <script src="<?=base_url('bootstrap/js/Borang.js')?>"></script>
		<script>
			jQuery(document).ready(function($) {
				"use strict";
        var BaseURL = '<?=base_url()?>';
        
        $(document).on("click",".LihatProposal",function(){
					var Path = $(this).attr('LihatProposal')
          $('#PathProposal').attr('src',Path)		
          $('#ModalProposal').modal("show")
				}) 

        $("#UpdateBimbingan").click(function() {
					var Catatan = {Id: $("#IdBimbingan").val(),CatatanDosen: $("#CatatanDosen").val()}
          $("#UpdateBimbingan").attr("disabled", true);                              
					$("#LoadingUpdateBimbingan").show();
      		$.post(BaseURL+"Dashboard/UpdateBimbingan", Catatan).done(function(Respon) {
            if (Respon == '1') {
              window.location = BaseURL + "Dashboard/BimbinganSkripsi"
            } else {
              alert(Respon)
              $("#UpdateBimbingan").attr("disabled", false);                              
					    $("#LoadingUpdateBimbingan").hide();
            }
          })
				})

        $(document).on("click",".UpdateBimbingan",function(){
					var Data = $(this).attr('UpdateBimbingan')
					var Pisah = Data.split("|")
					$("#IdBimbingan").val(Pisah[0])
					$("#CatatanMahasiswa").val(Pisah[1])
					$("#CatatanDosen").val(Pisah[2])
					$('#ModalUpdateBimbingan').modal("show")
				})
        
        $('#TabelBimbingan').DataTable( {
					// dom:'lfrtip',
					"ordering": false,
          "lengthMenu": [[ 5, 10, 20, 30, -1 ],[ 5, 10, 20, 30, "All" ]],
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