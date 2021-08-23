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
			<div class="wrap-login100 border border-primary" style="width: 800px;">
				<div class="login100-form-title" style="background-image: url(<?=base_url('img/Skripsi.jpg')?>);">
					<span class="login100-form-title-1">
            Nilai Sidang Skripsi
					</span>
				</div>
				<div class="card">
					<div class="card-body bg-primary">
						<div class="container">
							<div class="row">
								<div class="col-sm-12 col-lg-4">
									<div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text bg-danger text-light"><b>NIM</b></span>
										</div>
										<input type="text" class="form-control" id="NIM" placeholder="Input NIM">
									</div>
                </div>
                <div class="col-sm-12 col-lg-8">
									<div class="btn btn-sm btn-danger" id="Lihat"><b>Lihat Nilai</b></div>
                </div>
                <div class="col-sm-12 col-lg-8">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <label class="input-group-text bg-danger text-light"><b>Nama</b></label>
                    </div>
                    <input type="text" class="form-control" id="Nama" disabled>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-lg-4">
                    <div class="card border border-light">
                      <div class="card-header border border-light bg-danger text-center p-1"><b class="text-light" id="Nilai1" style="font-size: 14px;">Nilai Penguji 1 = ?</b></div>
                      <div class="card-body border border-light bg-warning p-1">
                        <div class="input-group input-group-sm">
                          <textarea class="p-1" style="font-size: 13px;" name="Catatan" id="Catatan1" cols="15" rows="10" placeholder="Catatan :"></textarea>
                        </div>
                      </div>
                      <div class="card-footer border border-light bg-danger text-center p-1"><b class="text-light" id="Penguji1" style="font-size: 13px;">Penguji 1</b></div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-lg-4">
                    <div class="card border border-light">
                      <div class="card-header border border-light bg-danger text-center p-1"><b class="text-light" id="Nilai2" style="font-size: 14px;">Nilai Penguji 2 = ?</b></div>
                      <div class="card-body border border-light bg-warning p-1">
                        <div class="input-group input-group-sm">
                          <textarea class="p-1" style="font-size: 13px;" name="Catatan" id="Catatan2" cols="15" rows="10" placeholder="Catatan :"></textarea>
                        </div>
                      </div>
                      <div class="card-footer border border-light bg-danger text-center p-1"><b class="text-light" id="Penguji2" style="font-size: 13px;">Penguji 2</b></div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-lg-4">
                    <div class="card border border-light">
                      <div class="card-header border border-light bg-danger text-center p-1"><b class="text-light" id="Nilai3" style="font-size: 14px;">Nilai Penguji 3 = ?</b></div>
                      <div class="card-body border border-light bg-warning p-1">
                        <div class="input-group input-group-sm">
                          <textarea class="p-1" style="font-size: 13px;" name="Catatan" id="Catatan3" cols="15" rows="10" placeholder="Catatan :"></textarea>
                        </div>
                      </div>
                      <div class="card-footer border border-light bg-danger text-center p-1"><b class="text-light" id="Penguji3" style="font-size: 13px;">Penguji 3</b></div>
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
	<script src="<?=base_url('bootstrap/main.js')?>"></script>
	<script>
		var BaseURL = '<?=base_url()?>'
		jQuery(document).ready(function($) {
			"use strict";
			$("#Lihat").click(function() {
				var Skripsi = { NIM: $("#NIM").val() }
        $.post(BaseURL+"Skripsi/LihatNilai", Skripsi).done(function(Respon) {
          if (Respon == '1') {
            alert("Data Tidak Ditemukan!")
          }
          else {
            var Data = JSON.parse(Respon)
            $("#Nama").val(Data.Nama)
            $("#Nilai1").html('Nilai Penguji 1 = '+ Data.Nilai1)
            $("#Nilai2").html('Nilai Penguji 2 = '+ Data.Nilai2)
            $("#Nilai3").html('Nilai Penguji 3 = '+ Data.Nilai3)
            $("#Catatan1").html('Catatan : '+ Data.Catatan1)
            $("#Catatan2").html('Catatan : '+ Data.Catatan2)
            $("#Catatan3").html('Catatan : '+ Data.Catatan3)
            $("#Penguji1").html(Data.Penguji1)
            $("#Penguji2").html(Data.Penguji2)
            $("#Penguji3").html(Data.Penguji3)
          }
        })                   
			})	
		})
	</script>
</body>
</html>