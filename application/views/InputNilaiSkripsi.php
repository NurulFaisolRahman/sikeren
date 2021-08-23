<!DOCTYPE html>
<html lang="en">
<head>
	<title>Input Nilai</title>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?=base_url('img/favicon.ico')?>" type="image/x-icon">
  <link rel="stylesheet" href="<?=base_url('bootstrap/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('bootstrap/util.css')?>">
  <link rel="stylesheet" href="<?=base_url('bootstrap/main.css')?>">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 border border-primary">
				<div class="login100-form-title" style="background-image: url(../../img/Skripsi.jpg);">
					<span class="login100-form-title-1">
            Form Input Nilai Sidang Skripsi
					</span>
				</div>
				<div class="card">
					<div class="card-body bg-primary">
						<div class="container">
							<div class="row d-flex justify-content-center">
                <div class="col-sm-12 col-lg-4">
                  <div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text bg-danger text-light"><b>NIM</b></span>
                    </div>
										<input type="text" class="form-control" id="NIM" value="<?=$Mhs['NIM']?>" disabled>
									</div>
                </div>
                <div class="col-sm-12 col-lg-8">
                  <div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text bg-danger text-light"><b>Nama</b></span>
                    </div>
										<input type="text" class="form-control" value="<?=$Mhs['Nama']?>" disabled>
									</div>
                </div>
								<div class="col-sm-12 col-lg-4">
									<div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text bg-danger text-light"><b>Nilai</b></span>
										</div>
										<input type="text" class="form-control" id="Nilai" placeholder="Input Nilai">
									</div>
                </div>
                <div class="col-sm-12 col-lg-8">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <label class="input-group-text bg-danger text-light"><b>Penguji Ke</b></label>
                    </div>
                    <select class="custom-select" id="Penguji">  
                      <option value="1">Penguji 1</option>
                      <option value="2">Penguji 2</option>
                      <option value="3">Penguji 3</option>
                    </select>
                  </div>
                </div>
								<div class="col-sm-12">
									<div class="input-group input-group-sm mb-2">
										<textarea class="p-1" style="font-size: 13px;" name="Catatan" id="Catatan" cols="43" rows="10" placeholder=" Input Catatan"></textarea>
									</div>
								</div>
								<div class="col-sm-12 col-lg-8 text-center">
									<div class="btn btn-danger" id="Simpan"><b>Simpan</b></div>
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
	<script src="<?=base_url('bootstrap/main.js')?>"></script>
	<script>
		var BaseURL = '<?=base_url()?>'
		jQuery(document).ready(function($) {
			"use strict";
			$("#Simpan").click(function() {
				if (isNaN($("#Nilai").val()) || $("#Nilai").val() == "" || $("#Nilai").val() > 100) {
					alert("Input Nilai Belum Benar. Maksimal 100!")
				} else {
					var Skripsi = { NIM: $("#NIM").val(),
                          Nilai: $("#Nilai").val(),
                          Penguji: $("#Penguji").val(),
                          Catatan: $("#Catatan").val() }
					$.post(BaseURL+"Skripsi/Update", Skripsi).done(function(Respon) {
						if (Respon == '1') {
							window.location = BaseURL + "Skripsi/Nilai/"
						}
						else {
							alert(Respon)
						}
					})
				}                      
			})	
		})
	</script>
</body>
</html>