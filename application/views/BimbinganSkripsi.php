<div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row">
                    <div class="col-5 mt-2">
                      <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                          <label class="input-group-text bg-primary text-light"><b>Bimbingan</b></label>
                        </div>
                        <select class="custom-select custom-select-sm" id="Bimbingan">					
                          <?php foreach ($Bimbingan as $key) { if ($key['NilaiSkripsi1']=='' || $key['NilaiSkripsi2']=='' || $key['NilaiSkripsi3']=='') { ?>
                            <option value="<?=$key['NIM']?>" <?=$this->session->userdata('NIMBimbingan')==$key['NIM'] ? 'selected' : '';?>><?=$key['Nama']?></option>
                          <?php } } ?>
                        </select>
                        <div class="input-group-prepend">
                          <label class="input-group-text bg-danger text-light" id="Lihat"><b>Lihat</b></label>
                        </div>
                      </div>
                    </div>
                    <div class="col-7 mt-2">
                      <div class="input-group input-group-sm">
                        <div class="input-group-prepend">
                          <label class="input-group-text bg-warning text-white" id="ReturBimbingan"><b class="text-white">Retur Bimbingan</b></label>
                        </div>
                      </div>
                    </div>
                    <?php if (count($Bimbingan) > 0) { ?>
                    <div class="col-sm-5">
                      <div class="row">
                        <div class="col-lg-4 col-sm-4 d-flex justify-content-center pl-0 pr-0">
                          <label for="InputFoto">
                            <?php if ($Mhs['Foto'] == '') { ?>
                              <img src="<?=base_url('img/Profil.jpg')?>" alt="..." class="img-circle profile_img mt-2" width="120px;">
                            <?php	} else { ?>
                              <img src="<?=base_url('FotoMhs/'.$Mhs['Foto'])?>" class="mt-2" width="120px">
                            <?php } ?>
                          </label>
                        </div>
                        <div class="col-lg-8 col-sm-8">
                          <div class="row">
                            <div class="col-12 my-1 mb-1 pl-0">
                              <div class="input-group input-group-sm"> 
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-white"><b>NIM</b></label>
                                </div>
                                <input type="text" class="form-control form-control-sm" value="<?=$Mhs['NIM']?>" disabled>
                              </div>
                            </div>
                            <div class="col-12 mb-1 pl-0">
                              <div class="input-group input-group-sm"> 
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-white"><b>Nama</b></label>
                                </div>
                                <input type="text" class="form-control form-control-sm" value="<?=$Mhs['Nama']?>" disabled>
                              </div>
                            </div>
                            <div class="col-12 mb-1 pl-0">
                              <div class="input-group input-group-sm"> 
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-white"><b>Kontak</b></label>
                                </div>
                                <input type="text" class="form-control form-control-sm" value="<?=$Mhs['HP']?>" disabled>
                              </div>
                            </div>
                            <div class="col-12 pl-0">
                              <div class="input-group input-group-sm"> 
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-white"><b>Status</b></label>
                                </div>
                                <?php 
                                  $Status = '';
                                  if ($Mhs['NilaiSkripsi1'] != '' && $Mhs['NilaiSkripsi2'] != '' && $Mhs['NilaiSkripsi3'] != '') {
                                    $Status = 'Sudah Ujian Skripsi';
                                  } else if ($Mhs['NilaiProposal1'] != '' && $Mhs['NilaiProposal3'] != '' && $Mhs['NilaiProposal3'] != '') {
                                    $Status = 'Sudah Ujian Proposal';
                                  } else {
                                    $Status = 'Belum Ujian Proposal';
                                  } 
                                ?>
                                <input type="text" class="form-control form-control-sm" value="<?=$Status?>" disabled>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-7 mt-1">    
                      <div class="table-responsive">
                        <table id="TabelReturBimbingan" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr style="font-size: 12px;" class="text-white">
                              <th style="width: 4%;" class="text-center align-middle">No</th>
                              <th style="width: 35%;">Mahasiswa</th>
                              <th>Alasan Retur</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($Retur as $key) { ?>
                              <tr style="font-size: 12px;">
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['Nama']?></td>
                                <td class="align-middle"><?=$key['Alasan']?></td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div> 
                    </div>
                    <?php } ?>
                    <div class="col-sm-12 my-2 ">    
                      <div class="table-responsive mb-2">
                        <table id="TabelBimbingan" class="table table-bordered table-striped">
                          <thead class="bg-primary">
                            <tr>
                              <th style="width: 4%;" class="text-center align-middle">No</th>
                              <th>Tanggal Bimbingan</th>
                              <th>Catatan Mahasiswa</th>
                              <th>Catatan Dosen</th>
                              <th style="width: 7%;text-align: center;">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($DataBimbingan as $key) { ?>
                              <tr>
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['TanggalBimbingan']?></td>
                                <td class="align-middle"><?=$key['CatatanMahasiswa']?></td>
                                <td class="align-middle"><?=$key['CatatanDosen']?></td>
                                <td class="text-center align-middle">
                                  <button UpdateBimbingan="<?=$key['Id'].'|'.$key['CatatanMahasiswa'].'|'.$key['CatatanDosen'].'|'.$key['PoinBimbingan']?>" class="btn btn-sm btn-warning UpdateBimbingan"><i class="fas fa-edit"></i></button>
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
															<label class="input-group-text bg-primary text-light"><b>Poin Bimbingan</b></label>
														</div>
														<textarea class="form-control" id="PoinBimbingan" rows="2"></textarea>
													</div>
												</div>
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
														<textarea class="form-control" id="CatatanDosen" rows="3" placeholder="Input Catatan Bimbingan"></textarea>
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
    <div class="modal fade" id="ModalReturBimbingan">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
									<div class="card-header bg-warning text-light mt-2">
										<b class="text-white">Retur Bimbingan</b>
									</div>
									<div class="card-body border border-warning">
										<div class="container-fluid">
											<div class="row mt-1">
                        <div class="col-12 mt-1">
                          <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                              <label class="input-group-text bg-warning"><b class="text-light">Bimbingan</b></label>
                            </div>
                            <input class="form-control" type="hidden" id="NIP" value="<?=$this->session->userdata('NIP')?>">
                            <select class="custom-select custom-select-sm" id="MhsBimbingan">					
                              <?php foreach ($Bimbingan as $key) { if ($key['NilaiSkripsi1']=='' || $key['NilaiSkripsi2']=='' || $key['NilaiSkripsi3']=='') { ?>
                                <option value="<?=$key['NIM']?>"><?=$key['Nama']?></option>
                              <?php } } ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-12 mt-1">
                          <div class="input-group input-group-sm"> 
                            <div class="input-group-prepend">
                              <label class="input-group-text bg-warning"><b class="text-light">Alasan</b></label>
                            </div>
                            <textarea class="form-control" id="AlasanRetur" rows="3"></textarea>
                          </div>
                        </div>
                        <div class="col-12 my-1">
                          <div class="input-group input-group-sm">
                            <button type="button" class="btn btn-primary" id="ReturMhsBimbingan"><b>Retur Bimbingan&nbsp;<div id="LoadingReturMhsBimbingan" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
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
        
        $(document).on("click",".LihatProposal",function(){
					var Path = $(this).attr('LihatProposal')
          $('#PathProposal').attr('src',Path)		
          $('#ModalProposal').modal("show")
				}) 

        $("#Lihat").click(function() {
          if ($("#Bimbingan").val() == null) {
            alert('Belum Ada Bimbingan!')
          } else {
            var Data = {NIMBimbingan: $("#Bimbingan").val(),NamaBimbingan: $("#Bimbingan option:selected").text()}
            $.post(BaseURL+"Dashboard/SesiBimbingan", Data).done(function(Respon) {
              window.location = BaseURL + "Dashboard/BimbinganSkripsi"
            })
          }
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
          $("#PoinBimbingan").val(Pisah[3])
					$('#ModalUpdateBimbingan').modal("show")
				})

        $("#ReturBimbingan").click(function() {
          $('#ModalReturBimbingan').modal("show")
				})

        $("#ReturMhsBimbingan").click(function() {
					if ($("#AlasanRetur").val() == '') {
            alert('Wajib Input Alasan!')
          } else {
            var Data = { NIP: $("#NIP").val(),
                         NIM: $("#MhsBimbingan").val(),
                         Alasan: $("#AlasanRetur").val(),
                         Status: 'Diajukan' }
            var Konfirmasi = confirm("Apakah Data Yang Di Pilih Sudah Benar?"); 
            if (Konfirmasi == true) {
              $("#ReturMhsBimbingan").attr("disabled", true); 
              $("#LoadingReturMhsBimbingan").show();                             
              $.post(BaseURL+"Dashboard/ReturBimbingan", Data).done(function(Respon) {
                if (Respon == '1') {
                  alert('Retur Mahasiswa Bimbingan Di Ajukan')
                  window.location = BaseURL + "Dashboard/BimbinganSkripsi"
                } else {
                  alert(Respon)
                  $("#ReturMhsBimbingan").attr("disabled", false); 
                  $("#LoadingReturMhsBimbingan").hide();                             
                }
              })
            }
          }
				})
			})
		</script>
  </body>
</html>