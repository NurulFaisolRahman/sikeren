							<div class="row">
								<div class="col-sm-9">
									<div class="card-header bg-danger text-light mt-2">
										<b>Form Pengajuan Dosen Pembimbing Skripsi</b>
									</div>
									<div class="card-body border border-primary bg-warning">
										<div class="container-fluid">
											<div class="row">
												<div class="col-lg-4">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>NIM</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="NIM" value="<?=$this->session->userdata('NIM')?>" disabled>
													</div>
												</div>
												<div class="col-lg-8">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Nama</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="NIM" value="<?=$this->session->userdata('Nama')?>" disabled>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Jenis Kelamin</b></label>
														</div>
														<select class="custom-select custom-select-sm" id="Gender">								
															<option value="Laki-Laki">Laki-Laki</option>
															<option value="Perempuan">Perempuan</option>
														</select>
													</div>
												</div>
												<div class="col-lg-8"> 
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Alamat</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="Alamat">
													</div>
												</div>
												<div class="col-lg-4">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Telpon/HP</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="HP">
													</div>
												</div>
												<div class="col-lg-8"> 
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Konsentrasi</b></label>
														</div>
														<select class="custom-select custom-select-sm" id="Konsentrasi">										
															<option value="Perencanaan Pembangunan">Perencanaan Pembangunan</option>
															<option value="Ekonomi Publik">Ekonomi Publik</option>
															<option value="Ekonomi Moneter">Ekonomi Moneter</option>
														</select>
													</div>
												</div>
												<div class="col-lg-12">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Judul Proposal</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="JudulProposal">
													</div>
												</div>
												<div class="col-lg-12">
													<div class="input-group input-group-sm mb-2">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Draft Proposal</b></span>
														</div>
														<input class="form-control" type="file" id="Bukti">
													</div>
													<pre class="text-danger mb-1"><b>Draft Proposal Dalam Format Pdf</b></pre>
												</div>  
												<div class="col-lg-12">
													<button type="button" class="btn btn-sm btn-primary" id="Kirim"><b>AJUKAN</b></button>
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
						$.post(BaseURL+"Admin/GantiPassword", Password).done(function(Respon) {
							if (Respon == '1') {
								alert('Password Berhasil Di Ganti!')
								window.location = BaseURL + "Admin"
							} else {
								alert(Respon)
							}
						})
					}
				})
			})
		</script>
  </body>
</html>