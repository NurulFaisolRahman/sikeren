							<div class="row">
								<div class="col-sm-12">
									<button id="FormMBKM" type="button" class="btn btn-sm btn-primary border-white" MBKM="<?=$MBKM['Jenis']."|".$MBKM['Konsentrasi']."|".$MBKM['Instansi']."|".$MBKM['NamaInstansi']."|".$MBKM['Provinsi']."|".$MBKM['Kabupaten']."|".$MBKM['IPK']?>"><b>Form MBKM</b></button>
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
														<th scope="col" style="width: 17%;">Jenis MBKM</th>
														<th scope="col" style="width: 17%;">Konsentrasi</th>
														<th scope="col" style="width: 17%;">Instansi</th>
														<!-- <th scope="col" style="width: 27%;">Dosen Pembimbing Lapangan</th> -->
														<th scope="col" style="width: 10%;">Status</th>
														<th scope="col" style="width: 3%;">Log Book</th>
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
														<td style="vertical-align: middle;"><?=$MBKM['Jenis']?></td>
														<td style="vertical-align: middle;"><?=$MBKM['Konsentrasi']?></td>
														<td style="vertical-align: middle;"><?=$MBKM['Instansi']?></td>
														<!-- <td style="vertical-align: middle;"><?=$NamaDosen[$MBKM['Dosen']]?></td> -->
														<td style="vertical-align: middle;"><?=$MBKM['Status']?></td>
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
															<label class="input-group-text bg-danger text-light"><b>Jenis MBKM</b></label>
														</div>
														<select class="custom-select custom-select-sm" id="Jenis">										
															<option value="Magang / PKL">Magang / PKL</option>
															<option value="Penelitian / Riset">Penelitian / Riset</option>
															<option value="Proyek Kemanusiaan">Proyek Kemanusiaan</option>
															<option value="Studi Proyek Independen">Studi Proyek Independen</option>
															<option value="Membangun Desa / KKNT">Membangun Desa / KKNT</option>
														</select>
													</div>
													<pre class="text-danger mb-0"><b>Kuota Mahasiswa Magang 150, Riset 40, Lainnya 10</b></pre>
												</div>
												<div class="col-lg-12 mb-1"> 
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-danger text-light"><b>Konsentrasi</b></label>
														</div>
														<select class="custom-select custom-select-sm" id="Konsentrasi" onchange="Konsentrasi()">										
															<option value="Perencanaan Pembangunan">Perencanaan Pembangunan</option>
															<option value="Ekonomi Publik">Ekonomi Publik</option>
															<option value="Ekonomi Moneter & Perbankan">Ekonomi Moneter & Perbankan</option>
														</select>
													</div>
												</div>
												<div class="col-lg-12 mb-1"> 
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-danger text-light"><b>Instansi</b></label>
														</div>
														<select class="custom-select custom-select-sm" id="Instansi">
														<option value="Badan Perencanaan Nasional/Provinsi/Kabupaten/Kota">Badan Perencanaan Nasional/Provinsi/Kabupaten/Kota</option>
														<option value="Dinas Provinsi/Kabupaten/Kota Bidang Ekonomi">Dinas Provinsi/Kabupaten/Kota Bidang Ekonomi</option>
														<option value="Lembaga Riset Konsultan Bidang Ekonomi">Lembaga Riset Konsultan Bidang Ekonomi</option>
														<option value="Bank Indonesia">Bank Indonesia</option>
														<option value="Lainnya">Lainnya</option>
														</select>
													</div>
												</div>
												<div class="col-lg-12 mb-1">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-danger text-light"><b>Nama Instansi</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="NamaInstansi" placeholder="Isi Nama Instansi">
													</div>
													<pre class="text-danger mb-0"><b>Selain Magang/PKL, Nama Instansi Isi LPPM UTM</b></pre>
												</div>
												<div class="col-sm-12 mb-1"> 
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-danger text-white"><b>Provinsi</b></label>
														</div>
														<select class="custom-select" id="Provinsi">  
															<?php foreach ($Provinsi as $key) { ?>
																<option value="<?=$key['Kode']?>" <?=$key['Kode']==35?'selected':'';?>><?=$key['Nama']?></option> 
															<?php } ?>                  
														</select>
													</div>
                        </div>
												<div class="col-sm-12 mb-1">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-danger text-white"><b>Kabupaten</b></label>
														</div>
														<select class="custom-select" id="Kabupaten">  
															<?php foreach ($Kabupaten as $key) { ?>
																<option value="<?=$key['Kode']?>" <?=$key['Kode']=='35.26'?'selected':'';?>><?=$key['Nama']?></option> 
															<?php } ?>                  
														</select>
													</div>
												</div>
												<div class="col-lg-12 mb-1">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-danger text-light"><b>IPK Mahasiswa</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="IPK" placeholder="Isi Nilai IPK">
													</div>
												</div>
												<div class="col-lg-12">
													<button type="button" class="btn btn-sm btn-primary" id="DaftarMBKM"><b>SIMPAN&nbsp;<div id="LoadingInput" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
													<?php $Pisah = explode(" ",$MBKM['Status']); if ($Pisah[0] == 'Ditolak') { ?>
														<button type="button" class="btn btn-sm btn-danger" id="AjukanProposal"><b>AJUKAN LAGI&nbsp;<div id="LoadingAjukan" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
													<?php } ?>
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
			function Konsentrasi() {
				if ($("#Konsentrasi").val() == 'Ekonomi Moneter & Perbankan') {
					$("#Instansi").html('<option value="Bank Indonesia">Bank Indonesia</option><option value="Lembaga Keuangan Perbankan">Lembaga Keuangan Perbankan</option><option value="Lembaga Keuangan Bukan Bank">Lembaga Keuangan Bukan Bank</option><option value="Lembaga Riset Perbankan">Lembaga Riset Perbankan</option><option value="Lainnya">Lainnya</option>')
				} else {
					$("#Instansi").html('<option value="Badan Perencanaan Nasional/Provinsi/Kabupaten/Kota">Badan Perencanaan Nasional/Provinsi/Kabupaten/Kota</option><option value="Dinas Provinsi/Kabupaten/Kota Bidang Ekonomi">Dinas Provinsi/Kabupaten/Kota Bidang Ekonomi</option><option value="Lembaga Riset Konsultan Bidang Ekonomi">Lembaga Riset Konsultan Bidang Ekonomi</option><option value="Bank Indonesia">Bank Indonesia</option><option value="Lainnya">Lainnya</option>')
				}
			}

			$(document).ready(function(){
				var BaseURL = '<?=base_url()?>' 

				$("#AjukanProposal").click(function() {
          $.post(BaseURL+"Mhs/AjukanMBKM").done(function(Respon) {
            window.location = BaseURL + "Mhs/MBKM"
          }) 
				})

				$("#Provinsi").change(function (){
          var Kabupaten = { Kode: $("#Provinsi").val() }
          $.post(BaseURL+"Mhs/ListKabupaten", Kabupaten).done(function(Respon) {
            $('#Kabupaten').html(Respon)
          }) 
        }) 

				$(document).on("click",".LihatLogBook",function(){
					var Path = $(this).attr('LihatLogBook')
          $('#PathLogBook').attr('src',Path)		
          $('#ModalLogBook').modal("show")
				})

				$("#FormMBKM").click(function() {
					var Data = $(this).attr('MBKM')
					var Pisah = Data.split("|")
					if (Pisah[0] != "") {
						$("#Jenis").val(Pisah[0])
					}
					if (Pisah[1] != "") {
						$("#Konsentrasi").val(Pisah[1])
					}
					if (Pisah[2] != "") {
						if (Pisah[1] == 'Ekonomi Moneter & Perbankan') {
							$("#Instansi").html('<option value="Bank Indonesia">Bank Indonesia</option><option value="Lembaga Keuangan Perbankan">Lembaga Keuangan Perbankan</option><option value="Lembaga Keuangan Bukan Bank">Lembaga Keuangan Bukan Bank</option><option value="Lembaga Riset Perbankan">Lembaga Riset Perbankan</option><option value="Lainnya">Lainnya</option>')
						} else {
							$("#Instansi").html('<option value="Badan Perencanaan Nasional/Provinsi/Kabupaten/Kota">Badan Perencanaan Nasional/Provinsi/Kabupaten/Kota</option><option value="Dinas Provinsi/Kabupaten/Kota Bidang Ekonomi">Dinas Provinsi/Kabupaten/Kota Bidang Ekonomi</option><option value="Lembaga Riset Konsultan Bidang Ekonomi">Lembaga Riset Konsultan Bidang Ekonomi</option><option value="Bank Indonesia">Bank Indonesia</option><option value="Lainnya">Lainnya</option>')
						}
						$("#Instansi").val(Pisah[2])
					}
					if (Pisah[3] != "") {
						$("#NamaInstansi").val(Pisah[3])
					}
					if (Pisah[4] != "") {
						$("#Provinsi").val(Pisah[4])
					}
					if (Pisah[5] != "") {
						$("#Kabupaten").val(Pisah[5])
					}
					if (Pisah[6] != "") {
						$("#IPK").val(Pisah[6])
					}
					$('#ModalFormMBKM').modal("show")
				})

				$("#DaftarMBKM").click(function() {
					if ($("#NamaInstansi").val() === "") {
						alert('Nama Instansi Tidak Boleh Kosong')
					} else if ($("#IPK").val() === "") {
						alert('IPK Tidak Boleh Kosong')
					} else {
						var fd = new FormData()
						fd.append('Jenis',$("#Jenis").val())
						fd.append('Konsentrasi',$("#Konsentrasi").val())
						fd.append('Instansi',$("#Instansi").val())
						fd.append('NamaInstansi',$("#NamaInstansi").val())
						fd.append('Provinsi',$("#Provinsi").val())
						fd.append('Kabupaten',$("#Kabupaten").val())
						fd.append('IPK',$("#IPK").val())
						fd.append('Status','Diajukan')
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
									alert('Form MBKM Berhasil Di Simpan!')
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
								alert('Update Log Book Berhasil')
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