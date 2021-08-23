<!DOCTYPE html>
<html lang="en">
<head>
	<title>Daftar Sidang</title>
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
				<div class="login100-form-title" style="background-image: url(<?=base_url('img/Skripsi.jpg')?>);">
					<span class="login100-form-title-1">
						Form Pendaftaran Agar Dosen Penguji Dapat Menginput Nilai dan Catatan Sidang Skripsi
					</span>
				</div>

				<div class="card">
					<div class="card-body bg-primary">
						<div class="container">
							<div class="row d-flex justify-content-center">
								<div class="col-sm-12 col-lg-8">
									<div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text bg-danger text-light"><b>NIM</b></span>
										</div>
										<input type="text" class="form-control" id="NIM" placeholder="Input NIM">
									</div>
								</div>
								<div class="col-sm-12 col-lg-8">
									<div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text bg-danger text-light"><b>Nama</b></span>
										</div>
										<input type="text" class="form-control" id="Nama" placeholder="Input Nama">
									</div>
								</div>
								<div class="col-sm-12 col-lg-8">
									<div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text bg-danger text-light"><b>Penguji 1</b></span>
										</div>
										<input type="text" class="form-control" id="Penguji1" placeholder="Input Nama Dosen Penguji 1">
									</div>
								</div>
								<div class="col-sm-12 col-lg-8">
									<div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text bg-danger text-light"><b>Penguji 2</b></span>
										</div>
										<input type="text" class="form-control" id="Penguji2" placeholder="Input Nama Dosen Penguji 2">
									</div>
								</div>
								<div class="col-sm-12 col-lg-8">
									<div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text bg-danger text-light"><b>Penguji 3</b></span>
										</div>
										<input type="text" class="form-control" id="Penguji3" placeholder="Input Nama Dosen Penguji 3">
									</div>
								</div>
								<div class="col-sm-12 col-lg-8 text-center">
									<div class="btn btn-danger" id="Daftar"><b>Daftar</b></div>
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
			$("#Daftar").click(function() {
				if (isNaN($("#NIM").val()) || $("#NIM").val() == "" || $("#NIM").val().length != 12) {
					alert("Input NIM Wajib 12 Angka!")
				} else if ($("#Nama").val() == "") {
					alert("Input Nama Tidak Boleh Kosong!")
				} else if ($("#Penguji1").val() == "") {
					alert("Input Nama Dosen Penguji 1 Tidak Boleh Kosong!")
				} else if ($("#Penguji2").val() == "") {
					alert("Input Nama Dosen Penguji 2 Tidak Boleh Kosong!")
				} else if ($("#Penguji3").val() == "") {
					alert("Input Nama Dosen Penguji 3 Tidak Boleh Kosong!")
				} else {
					var Skripsi = { NIM: $("#NIM").val(),
										 			Nama: $("#Nama").val(),
													Penguji1: $("#Penguji1").val(),
													Penguji2: $("#Penguji2").val(),
													Penguji3: $("#Penguji3").val() }
					$.post(BaseURL+"Skripsi/InputMahasiswa", Skripsi).done(function(Respon) {
						if (Respon == '1') {
							alert("Setelah berhasil mendaftar, anda akan dialihkan ke halaman input nilai dan catatan bagi dosen penguji. Copy link URL pada address bar kemudian share kepada dosen penguji!")
							window.location = BaseURL + "Skripsi/InputNilai/"+$("#NIM").val()
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