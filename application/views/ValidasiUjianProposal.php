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
                        <table id="TabelUjianProposal" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th style="width: 4%;" class="text-center align-middle">No</th>
                              <th style="width: 12%;" class="align-middle">NIM</th>
                              <th style="width: 20%;" class="align-middle">Nama</th>
                              <th class="align-middle">Dosen Pembimbing</th>
                              <th style="width: 15%;" class="align-middle">Status</th>
                              <th style="width: 7%;" class="text-center align-middle">Validasi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($UjianProposal as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['NIM']?></td>
                                <td class="align-middle"><?=$key['Nama']?></td>
                                <td class="align-middle"><?=$key['NamaPembimbing']?></td>
                                <td class="align-middle"><?=$key['StatusUjianProposal'].' : <br>1. '.$key['StatusPengujiProposal1'].'<br>2. '.$key['StatusPengujiProposal2']?></td>
                                <td class="text-center align-middle">
                                  <button CekData="<?=$key['NIM']."|".$key['Nama']."|".$key['TanggalUjianProposal']."|".$key['Konsentrasi']."|".$key['PengujiProposal1']."|".$key['PengujiProposal2']."|".$key['StatusPengujiProposal1']."|".$key['StatusPengujiProposal2']?>" class="btn btn-sm btn-warning CekData"><i class="fas fa-edit"></i></button>
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
										<b>Form Pengajuan Dosen Penguji Proposal Skripsi</b>
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
                        <div class="col-lg-5 my-1">
													<div class="input-group input-group-sm mb-0">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Tanggal Ujian Proposal</b></label>
														</div>
														<input class="form-control form-control-sm" type="date" id="TanggalUjianProposal" value="<?=date('Y-m-d')?>" disabled>
													</div>
												</div>
												<div class="col-7 my-1"> 
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
															<label class="input-group-text bg-primary text-light"><b>Pilih Ketua Penguji</b></label>
                            </div>
                            <select class="custom-select custom-select-sm" id="KetuaPenguji">										
                              <?php foreach ($Dosen as $key) { ?>
                                <option value="<?=$key['NIP']?>"><?=$key['Nama']?></option>
                              <?php } ?>
														</select>
													</div>
                        </div>
                        <div class="col-12 my-1"> 
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Pilih Anggota Penguji</b></label>
                            </div>
                            <select class="custom-select custom-select-sm" id="AnggotaPenguji">										
                              <?php foreach ($Dosen as $key) { ?>
                                <option value="<?=$key['NIP']?>"><?=$key['Nama']?></option>
                              <?php } ?>
														</select>
													</div>
												</div>
												<div class="col-12 my-1">
                          <div class="input-group input-group-sm">
                            <button type="button" class="btn btn-sm btn-primary" id="ValidasiProposal"><b>VALIDASI&nbsp;<div id="LoadingValidasi" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
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
          $("#TanggalUjianProposal").val(Pisah[2])
					$("#Konsentrasi").val(Pisah[3])
          if (Pisah[4] != '') {
            $("#KetuaPenguji").val(Pisah[4])  
          }
          if (Pisah[5] != '') {
            $("#AnggotaPenguji").val(Pisah[5])
          }
          if (Pisah[6] == 'Setuju') {
            $("#KetuaPenguji").attr("disabled", true);   
          }
          if (Pisah[7] == 'Setuju') {
            $("#AnggotaPenguji").attr("disabled", true);   
          }
					$('#ModalValidasiProposal').modal("show")
        })
        
        $("#ValidasiProposal").click(function() {
          var Mhs = { NIM: $("#NIM").val(),
                      PengujiProposal1: $("#KetuaPenguji").prop("disabled") == true ? '' : $("#KetuaPenguji").val(),
                      PengujiProposal2: $("#AnggotaPenguji").prop("disabled") == true ? '' : $("#AnggotaPenguji").val(),
                      StatusUjianProposal: 'Menunggu Persetujuan Penguji' }
          $("#ValidasiProposal").attr("disabled", true); 
          $("#LoadingValidasi").show();                             
          $.post(BaseURL+"Dashboard/KPSMemilihPengujiProposal", Mhs).done(function(Respon) {
            if (Respon == '1') {
              window.location = BaseURL + "Dashboard/ValidasiUjianProposal"
            } else {
              alert(Respon)
              $("#ValidasiProposal").attr("disabled", false); 
              $("#LoadingValidasi").hide();                             
            }
          })
        })

        $('#TabelUjianProposal').DataTable( {
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