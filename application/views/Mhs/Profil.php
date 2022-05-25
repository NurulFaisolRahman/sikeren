							<div class="row p-3">
								<div class="col-2 d-flex justify-content-center pl-0 pr-0">
									<label for="InputFoto">
										<?php if ($Mhs['Foto'] == '') { ?>
											<img src="<?=base_url('img/Profil.jpg')?>" alt="..." class="img-circle profile_img mt-1" width="130px;">
										<?php	} else { ?>
											<img src="<?=base_url('FotoMhs/'.$Mhs['Foto'])?>" class="mt-1" width="130px" height="130px">
										<?php } ?>
									</label>
									<input type="file" id="InputFoto" style="display:none" onchange="Foto()"/> 
									<input type="hidden" id="NamaFoto" value="<?=$Mhs['Foto']?>">
								</div>
								<div class="col-4">
									<div class="row">
										<div class="col-12 my-1 pl-0">
											<div class="input-group input-group-sm"> 
												<div class="input-group-prepend">
													<label class="input-group-text bg-danger text-white"><b>NIM</b></label>
												</div>
												<input type="text" class="form-control form-control-sm" value="<?=$this->session->userdata('NIM')?>">
											</div>
										</div>
										<div class="col-12 my-1 pl-0">
											<div class="input-group input-group-sm"> 
												<div class="input-group-prepend">
													<label class="input-group-text bg-danger text-white"><b>Nama</b></label>
												</div>
												<input type="text" class="form-control form-control-sm" value="<?=$this->session->userdata('Nama')?>">
											</div>
										</div>
										<div class="col-12 my-1 pl-0">
											<div class="input-group input-group-sm"> 
												<input type="password" class="form-control form-control-sm" id="Password" placeholder="Isi Untuk Mengganti Password">
												<div class="input-group-prepend">
													<label class="input-group-text bg-primary text-white" id="GantiPassword"><b>Simpan</b></label>
												</div>
											</div>
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

    <script src="<?=base_url("vendors/jquery/dist/jquery.min.js")?>"></script>
   	<script src="<?=base_url("vendors/bootstrap/dist/js/bootstrap.bundle.min.js")?>"></script>
		<script src="<?=base_url("build/js/custom.min.js")?>"></script>
		<script>
			$(document).ready(function(){
				var BaseURL = '<?=base_url()?>'  
				$("#GantiPassword").click(function() {
					if ($("#Password").val() === "") {
						alert('Password Tidak Boleh Kosong')
					} else {
						var Password = { Password: $("#Password").val() }
						$.post(BaseURL+"Mhs/GantiPassword", Password).done(function(Respon) {
							if (Respon == '1') {
								alert('Password Berhasil Di Ganti!')
								window.location = BaseURL + "Mhs/Profil"
							} else {
								alert(Respon)
							}
						})
					}
				})
			})

			function Foto() {
				var Tipe = ["image/png","image/jpeg","image/jpg"]
				if (!Tipe.includes($('#InputFoto')[0].files[0].type)) {
					alert('Mohon Input Foto jpg/png')
				} else {
					var BaseURL = '<?=base_url()?>';
					var fd = new FormData()
					fd.append("Foto", $('#InputFoto')[0].files[0])
					fd.append("NamaFoto", $('#NamaFoto').val())
					$.ajax({
						url: BaseURL+'Mhs/Foto',
						type: 'post',
						data: fd,
						contentType: false,
						processData: false,
						success: function(Respon){
							if (Respon == '1') {
								window.location = BaseURL + "Mhs/Profil"
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