<div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-12 mt-2">
                      <button class="btn btn-primary" data-toggle="modal" data-target="#ModalListDosenPembimbing"><b>List Dosen Pembimbing</b></button>  
                      <a class="btn btn-success" href="<?=base_url('Dashboard/RekapDosenPembimbing')?>"><b>Rekap Dosen Pembimbing</b></a>  
                    </div>
                    <div class="col-sm-12 my-2 ">    
                      <div class="table-responsive mb-2">
                        <table id="TabelDosenPembimbing" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th style="width: 4%;" class="text-center align-middle">No</th>
                              <th style="width: 12%;" class="align-middle">NIM</th>
                              <th style="width: 20%;" class="align-middle">Nama</th>
                              <th class="align-middle">Judul Proposal</th>
                              <th style="width: 15%;" class="align-middle">Status</th>
                              <th style="width: 7%;" class="text-center align-middle">Cek Data</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($DosenPembimbing as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['NIM']?></td>
                                <td class="align-middle"><?=$key['Nama']?></td>
                                <td class="align-middle"><?=$key['JudulProposal']?></td>
                                <td class="align-middle"><?=$key['StatusProposal']?></td>
                                <td class="text-center align-middle">
                                  <button CekData="<?=$key['NIM']."|".$key['Nama']."|".$key['Gender']."|".$key['Alamat']."|".$key['HP']."|".$key['Konsentrasi']."|".$key['JudulProposal']."|".$key['NIPPembimbing']?>" class="btn btn-sm btn-warning CekData"><i class="fas fa-edit"></i></button>
                                  <button LihatProposal="<?=base_url('Proposal/'.$key['DraftProposal'])?>" class="btn btn-sm btn-danger LihatProposal"><i class="fas fa-file-pdf"></i></button>  
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
    <div class="modal fade" id="ModalValidasiProposal">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-success">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
									<div class="card-header bg-danger text-light mt-2">
										<b>Form Pengajuan Dosen Pembimbing Skripsi</b>
									</div>
									<div class="card-body border border-primary bg-warning">
										<div class="container-fluid">
											<div class="row">
												<div class="col-4 my-1">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>NIM</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="NIM" disabled>
													</div>
												</div>
												<div class="col-8 my-1">
													<div class="input-group input-group-sm"> 
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Nama</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="Nama" disabled>
													</div>
												</div>
												<div class="col-4 my-1">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Jenis Kelamin</b></label>
														</div>
														<select class="custom-select custom-select-sm" id="Gender" disabled>								
															<option value="Laki-Laki">Laki-Laki</option>
															<option value="Perempuan">Perempuan</option>
														</select>
													</div>
												</div>
												<div class="col-8 my-1"> 
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Alamat</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="Alamat" disabled>
													</div>
												</div>
												<div class="col-4 my-1">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Telpon/HP</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="HP" disabled>
													</div>
												</div>
												<div class="col-8 my-1"> 
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Konsentrasi</b></label>
														</div>
														<select class="custom-select custom-select-sm" id="Konsentrasi" disabled>										
															<option value="Perencanaan Pembangunan">Perencanaan Pembangunan</option>
															<option value="Ekonomi Publik">Ekonomi Publik</option>
															<option value="Ekonomi Moneter & Perbankan">Ekonomi Moneter & Perbankan</option>
														</select>
													</div>
												</div>
												<div class="col-12 my-1">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Judul Proposal</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="JudulProposal" disabled>
													</div>
                        </div>
                        <div class="col-12 my-1"> 
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Pilih Dosen Pembimbing</b></label>
                            </div>
                            <select class="custom-select custom-select-sm" id="DosenPembimbing">										
                              <?php foreach ($Dosen as $key) { ?>
                                <option value="<?=$key['NIP']?>"><?=$key['Nama']?></option>
                              <?php } ?>
														</select>
													</div>
												</div>
												<div class="col-12 my-1">
                          <div class="input-group input-group-sm">
                            <button type="button" class="btn btn-sm btn-primary" id="ValidasiProposal"><b>VALIDASI&nbsp;<div id="LoadingValidasi" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
                            <button type="button" class="btn btn-sm btn-danger" id="TolakProposal"><b>DITOLAK&nbsp;<div id="LoadingDitolak" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
                            <input class="form-control form-control-sm" type="text" id="Penolakan" placeholder="Alasan Ditolak">
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
    <div class="modal fade" id="ModalListDosenPembimbing">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-primary">
          <div class="modal-body">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" style="width: 10%;" class="text-center">No</th>
                    <th scope="col">Nama Dosen</th>
                    <th scope="col" style="width: 10%;" class="text-center">Jumlah</th>
                  </tr>
                  <tbody>
                    <?php $No = 1; foreach ($Bimbingan as $key) { ?>
                      <tr>
                        <th class="text-center"><?=$No++?></th>
                        <td><?=$key['NamaPembimbing']?></td>
                        <td class="text-center"><?=$key['Jumlah']?></td>
                      </tr>
                    <?php } ?>
                </thead>
              </table>
            </div>
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

        $(document).on("click",".CekData",function(){
					var Data = $(this).attr('CekData')
					var Pisah = Data.split("|")
					$("#NIM").val(Pisah[0])
					$("#Nama").val(Pisah[1])
					$("#Gender").val(Pisah[2])
					$("#Alamat").val(Pisah[3])
					$("#HP").val(Pisah[4])
					$("#Konsentrasi").val(Pisah[5])
          $("#JudulProposal").val(Pisah[6])
          if (Pisah[7] != '') {
            $("#DosenPembimbing").val(Pisah[7])
          }
					$('#ModalValidasiProposal').modal("show")
        })
        
        $("#ValidasiProposal").click(function() {
          var Mhs = { NIM: $("#NIM").val(),
                      NIPPembimbing: $("#DosenPembimbing").val(),
                      NamaPembimbing:  $("#DosenPembimbing option:selected").text(),
                      StatusProposal: 'Menunggu Persetujuan Pembimbing' }
          $("#ValidasiProposal").attr("disabled", true); 
          $("#LoadingValidasi").show();                             
          $.post(BaseURL+"Dashboard/ValidasiProposal", Mhs).done(function(Respon) {
            if (Respon == '1') {
              window.location = BaseURL + "Dashboard/DosenPembimbing"
            } else {
              alert(Respon)
              $("#ValidasiProposal").attr("disabled", false); 
              $("#LoadingValidasi").hide();                             
            }
          })
        })

        $("#TolakProposal").click(function() {
          var Mhs = { NIM: $("#NIM").val(),
                      StatusProposal: 'Ditolak Oleh KPS Karena '+ $("#Penolakan").val()}
          $("#TolakProposal").attr("disabled", true); 
          $("#LoadingDitolak").show();                             
          $.post(BaseURL+"Dashboard/ValidasiProposal", Mhs).done(function(Respon) {
            if (Respon == '1') {
              window.location = BaseURL + "Dashboard/DosenPembimbing"
            } else {
              alert(Respon)
              $("#TolakProposal").attr("disabled", false); 
              $("#LoadingDitolak").hide();                             
            }
          })
        })
        
        $(document).on("click",".LihatProposal",function(){
					var Path = $(this).attr('LihatProposal')
          $('#PathProposal').attr('src',Path)		
          $('#ModalProposal').modal("show")
				}) 

        $('#TabelDosenPembimbing').DataTable( {
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