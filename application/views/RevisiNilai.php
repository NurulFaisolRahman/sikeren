<div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-12 mt-2">
                      <button class="btn btn-warning text-white" data-toggle="modal" data-target="#ModalRevisiNilaiProposal"><b>Revisi Nilai Proposal</b></button>
                      <button class="btn btn-danger text-white" data-toggle="modal" data-target="#ModalRevisiNilaiSkripsi"><b>Revisi Nilai Skripsi</b></button>
                    </div>
                    <div class="col-sm-12 my-2 ">    
                      <div class="table-responsive mb-2">
                        <table id="TabelRevisi" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th style="width: 4%;" class="text-center align-middle">No</th>
                              <th style="width: 12%;" class="align-middle">NIM</th>
                              <th style="width: 22%;" class="align-middle">Nama</th>
                              <th style="width: 7%;" class="text-center align-middle">Revisi</th>
                              <th style="width: 25%;" class="align-middle">Alasan</th>
                              <th style="width: 7%;" class="text-center align-middle">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($Revisi as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['NIM']?></td>
                                <td class="align-middle"><?=$key['Nama']?></td>
                                <td class="text-center align-middle"><?=$key['Revisi']?></td>
                                <td class="align-middle"><?=$key['Alasan']?></td>
                                <td class="text-center align-middle"><?=$key['Status']?></td>
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
    <div class="modal fade" id="ModalRevisiNilaiProposal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-success">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
									<div class="card-header bg-danger text-light mt-2">
										<b>Revisi Nilai Proposal</b>
									</div>
									<div class="card-body border border-primary bg-warning">
										<div class="container-fluid">
											<div class="row">
												<div class="col-12 my-1">
                          <input class="form-control" type="hidden" id="NIP" value="<?=$this->session->userdata('NIP')?>">
													<div class="input-group input-group-sm"> 
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Mahasiswa</b></label>
														</div>
														<select class="custom-select custom-select-sm" id="NIMProposal">							
                              <?php foreach ($Proposal as $key) { ?>
                                <option value="<?=$key['NIM']?>"><?=$key['Nama']?></option>
                              <?php } ?>
                            </select>
													</div>
                        </div>
                        <div class="col-lg-12">
                          <div class="input-group input-group-sm"> 
                            <div class="input-group-prepend">
                              <label class="input-group-text bg-primary text-light"><b>Alasan</b></label>
                            </div>
                            <textarea class="form-control" id="AlasanProposal" rows="3"></textarea>
                          </div>
                        </div>
                        <div class="col-12 my-1">
                          <div class="input-group input-group-sm">
                            <button type="button" class="btn btn-primary" id="RevisiNilaiProposal"><b>AJUKAN REVISI&nbsp;<div id="LoadingRevisiNilaiProposal" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
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
    <div class="modal fade" id="ModalRevisiNilaiSkripsi">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-success">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
									<div class="card-header bg-danger text-light mt-2">
										<b>Revisi Nilai Skripsi</b>
									</div>
									<div class="card-body border border-primary bg-warning">
										<div class="container-fluid">
											<div class="row">
												<div class="col-12 my-1">
													<div class="input-group input-group-sm"> 
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Mahasiswa</b></label>
														</div>
														<select class="custom-select custom-select-sm" id="NIMSkripsi">							
                              <?php foreach ($Skripsi as $key) { ?>
                                <option value="<?=$key['NIM']?>"><?=$key['Nama']?></option>
                              <?php } ?>
                            </select>
													</div>
                        </div>
                        <div class="col-lg-12">
                          <div class="input-group input-group-sm"> 
                            <div class="input-group-prepend">
                              <label class="input-group-text bg-primary text-light"><b>Alasan</b></label>
                            </div>
                            <textarea class="form-control" id="AlasanSkripsi" rows="3"></textarea>
                          </div>
                        </div>
                        <div class="col-12 my-1">
                          <div class="input-group input-group-sm">
                            <button type="button" class="btn btn-primary" id="RevisiNilaiSkripsi"><b>AJUKAN REVISI&nbsp;<div id="LoadingRevisiNilaiSkripsi" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
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

        $("#RevisiNilaiProposal").click(function() {
          if ($("#AlasanProposal").val() == '') {
            alert('Wajib Input Alasan Revisi Nilai!')
          } else {
            var Data = { NIP: $("#NIP").val(),
                         NIM: $("#NIMProposal").val(),
                         Revisi: 'Proposal',
                         Alasan: $("#AlasanProposal").val(),
                         Status: 'Diajukan' }
            var Konfirmasi = confirm("Apakah Data Revisi Nilai Sudah Benar?"); 
            if (Konfirmasi == true) {
              $("#RevisiNilaiProposal").attr("disabled", true); 
              $("#LoadingRevisiNilaiProposal").show();                             
              $.post(BaseURL+"Dashboard/AjukanRevisi", Data).done(function(Respon) {
                if (Respon == '1') {
                  alert('Revisi Berhasil Di Ajukan')
                  window.location = BaseURL + "Dashboard/RevisiNilai"
                } else {
                  alert(Respon)
                  $("#RevisiNilaiProposal").attr("disabled", false); 
                  $("#LoadingRevisiNilaiProposal").hide();                             
                }
              })
            }
          }
        })

        $("#RevisiNilaiSkripsi").click(function() {
          if ($("#AlasanSkripsi").val() == '') {
            alert('Wajib Input Alasan Revisi Nilai!')
          } else {
            var Data = { NIP: $("#NIP").val(),
                         NIM: $("#NIMSkripsi").val(),
                         Revisi: 'Skripsi',
                         Alasan: $("#AlasanSkripsi").val(),
                         Status: 'Diajukan' }
            var Konfirmasi = confirm("Apakah Data Revisi Nilai Sudah Benar?"); 
            if (Konfirmasi == true) {
              $("#RevisiNilaiSkripsi").attr("disabled", true); 
              $("#LoadingRevisiNilaiSkripsi").show();                             
              $.post(BaseURL+"Dashboard/AjukanRevisi", Data).done(function(Respon) {
                if (Respon == '1') {
                  alert('Revisi Berhasil Di Ajukan')
                  window.location = BaseURL + "Dashboard/RevisiNilai"
                } else {
                  alert(Respon)
                  $("#RevisiNilaiSkripsi").attr("disabled", false); 
                  $("#LoadingRevisiNilaiSkripsi").hide();                             
                }
              })
            }
          }
        })

			})
		</script>
  </body>
</html>