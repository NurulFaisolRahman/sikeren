							<div class="row">
								<div class="col-sm-12">
									<button id="FormMBKM" type="button" class="btn btn-sm btn-primary border-white" MBKM="<?=$MBKM['Konsentrasi']."|".$MBKM['Lokasi']."|".$MBKM['Instansi']?>"><b>Form MBKM</b></button>
									<?php if (!empty($MBKM['Dosen'])) { ?>
										<button type="button" class="btn btn-sm btn-danger border-white"><b>Update Log Book</b></button>
										<input id="LogBook" type="file" onchange="LogBook()"/>
										<input type="hidden" id="_LogBook" value="<?=$MBKM['LogBook']?>">
									<?php } ?>
									<div class="card-header bg-danger text-light">
										<b>Informasi MBKM</b>
									</div>
									<div class="card-body border border-light bg-warning p-2">
										<div class="table-responsive">
											<table class="table table-bordered bg-danger text-white mb-0">
												<thead>
													<tr>
														<th scope="col" style="width: 17%;">Konsentrasi</th>
														<th scope="col" style="width: 27%;">Dosen Pembimbing Lapangan</th>
														<th scope="col" style="width: 17%;">Lokasi MBKM</th>
														<th scope="col">Nama Instansi</th>
														<th scope="col" style="width: 8%;">Log Book</th>
													</tr>
												</thead>
												<tbody class="bg-primary">
													<?php 
                            $NamaDosen = array();
														foreach ($Dosen as $key) { 
															$NamaDosen[$key['NIP']] = $key['Nama'];
														} 
													?>
													<tr>
														<td style="vertical-align: middle;"><?=$MBKM['Konsentrasi']?></td>
														<td style="vertical-align: middle;"><?=$NamaDosen[$MBKM['Dosen']]?></td>
														<td style="vertical-align: middle;"><?=$MBKM['Lokasi']?></td>
														<td style="vertical-align: middle;"><?=$MBKM['Instansi']?></td>
														<td style="text-align: center;">
														<?php if (!empty($MBKM['LogBook'])) { ?>
															<button LihatLogBook="<?=base_url('LogBookMBKM/'.$MBKM['LogBook'])?>" class="btn btn-sm btn-danger border-light LihatLogBook"><i class="fa fa-file-pdf-o"></i></button>  
														<?php } ?>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
            </div>
          </div> 
        </div>
        <!-- /page content -->
      </div>
		</div>
		<style type="text/css">
			.input-group{margin-bottom: 3px;}
		</style>
		<div class="modal fade" id="ModalFormMBKM">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-success">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
									<div class="card-header bg-danger text-light mt-2">
										<b>Form MBKM</b>
									</div>
									<div class="card-body border border-primary bg-warning">
										<div class="container-fluid">
											<div class="row">
												<div class="col-lg-12 mb-1"> 
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-danger text-light"><b>Konsentrasi</b></label>
														</div>
														<select class="custom-select custom-select-sm" id="Konsentrasi">										
															<option value="Perencanaan Pembangunan">Perencanaan Pembangunan</option>
															<option value="Ekonomi Publik">Ekonomi Publik</option>
															<option value="Ekonomi Moneter & Perbankan">Ekonomi Moneter & Perbankan</option>
														</select>
													</div>
												</div>
												<div class="col-lg-12 my-1">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-danger text-light"><b>Lokasi MBKM</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="Lokasi" placeholder="Isi Nama Kabupaten">
													</div>
												</div>
												<div class="col-lg-12 my-1">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-danger text-light"><b>Nama Instansi</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="Instansi" placeholder="Isi Nama Instansi">
													</div>
												</div>
												<div class="col-lg-12">
													<button type="button" class="btn btn-sm btn-primary" id="DaftarMBKM"><b>SIMPAN&nbsp;<div id="LoadingInput" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
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
		<div class="modal fade" id="ModalLogBook">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathLogBook" src="" type="application/pdf" width="100%" height="520"/>
          </div>
        </div>
      </div>
    </div>
    <script src="<?=base_url("vendors/jquery/dist/jquery.min.js")?>"></script>
   	<script src="<?=base_url("vendors/bootstrap/dist/js/bootstrap.bundle.min.js")?>"></script>
		<script src="<?=base_url("build/js/custom.min.js")?>"></script>
		<script>
			$(document).ready(function(){
				var BaseURL = '<?=base_url()?>'  

				$(document).on("click",".LihatLogBook",function(){
					var Path = $(this).attr('LihatLogBook')
          $('#PathLogBook').attr('src',Path)		
          $('#ModalLogBook').modal("show")
				})

				$("#FormMBKM").click(function() {
					var Data = $(this).attr('MBKM')
					var Pisah = Data.split("|")
					if (Pisah[0] != "") {
						$("#Konsentrasi").val(Pisah[0])	
					}
					$("#Lokasi").val(Pisah[1])
					$("#Instansi").val(Pisah[2])
					$('#ModalFormMBKM').modal("show")
				})

				$("#DaftarMBKM").click(function() {
					if ($("#Lokasi").val() === "") {
						alert('Input Lokasi MBKM Tidak Boleh Kosong!')
					} else if ($("#Instansi").val() === "") {
						alert('Input Instansi Tidak Boleh Kosong')
					} else {
						var fd = new FormData()
						fd.append('Konsentrasi',$("#Konsentrasi").val())
						fd.append('Lokasi',$("#Lokasi").val())
						fd.append('Instansi',$("#Instansi").val())
						$.ajax({
							url: BaseURL+'Mhs/DaftarMBKM',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							beforeSend: function(){
								$("#DaftarMBKM").attr("disabled", true);                              
								$("#LoadingInput").show();
							},
							success: function(Respon){
								if (Respon == '1') {
									alert('Update Log Book Berhasil')
									window.location = BaseURL + "Mhs/MBKM"
								}
								else {
									alert(Respon)
									$("#LoadingInput").hide();
									$("#DaftarMBKM").attr("disabled", false);                              
								}
							}
						})
					}
				})

			})

			function LogBook() {
				if ($('#LogBook')[0].files[0].type != "application/pdf") {
					alert('Log Book Wajib PDF')
				} else {
					var BaseURL = '<?=base_url()?>';
					var fd = new FormData()
					fd.append("LogBook", $('#LogBook')[0].files[0])
					fd.append("_LogBook", $('#_LogBook').val())
					$.ajax({
						url: BaseURL+'Mhs/LogBook',
						type: 'post',
						data: fd,
						contentType: false,
						processData: false,
						success: function(Respon){
							if (Respon == '1') {
								window.location = BaseURL + "Mhs/MBKM"
							}
							else {
								alert(Respon)
							}
						}
					})
				}
			}
		</script>
  </body>
</html>