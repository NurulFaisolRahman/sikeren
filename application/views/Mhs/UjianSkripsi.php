							<div class="row p-2">
								<div class="col-12">
									<?php if ($Mhs['StatusUjianSkripsi'] == "") { ?>
										<button type="button" class="btn btn-sm btn-primary border-white mb-2" data-toggle="modal" data-target="#ModalInputUjianSkripsi"><b>Ajukan Ujian Skripsi</b></button>
									<?php } else { ?>
										<button Edit="<?=$Mhs['Administrasi']."|".$Mhs['IjazahKHS']."|".$Mhs['RevisiProposalBimbingan']."|".$Mhs['ToeflSertifikat']."|".$Mhs['TanggalUjianSkripsi']?>" class="btn btn-sm btn-warning border-light Edit text-white"><i class="fa fa-edit"> <b>Edit Data Pengajuan Ujian Skripsi</b></i></button>
									<?php } ?>
									<?php if ($Mhs['StatusPengujiSkripsi1'] == 'Setuju' && $Mhs['StatusPengujiSkripsi2'] == 'Setuju') { ?>
										<a href="<?=base_url('Mhs/PersetujuanUjianSkripsi')?>" class="btn btn-sm border-light btn-sm btn-danger"><i class="fa fa-file-pdf-o"> <b>Undangan Ujian Skripsi</b></i></a>  
									<?php } ?>
								</div>
								<div class="col-12">
									<div class="card-header bg-danger text-light">
										<b>Status Pengajuan Ujian Skripsi</b>
									</div>
									<div class="card-body border border-light bg-warning p-2">
										<div class="table-responsive">
											<table class="table table-bordered bg-danger text-white mb-0">
												<thead>
													<tr>
														<th scope="col" style="width: 7%;text-align: center;">Tanggal</th>
														<th scope="col" style="width: 15%;">Status</th>
														<th scope="col" style="width: 10%;text-align: center;">Data</th>
														<th scope="col" style="width: 25%;">Ketua Penguji</th>
														<th scope="col" style="width: 25%;">Anggota Penguji</th>
													</tr>
												</thead>
												<tbody class="bg-primary">
													<?php if ($Mhs['StatusUjianSkripsi'] != "") { ?>
														<tr>
															<td style="vertical-align: middle;text-align: center;"><?=$Mhs['TanggalUjianSkripsi']?></td>
															<td style="vertical-align: middle;"><?=$Mhs['StatusUjianSkripsi'].'<br>1. '.$Mhs['StatusPengujiSkripsi1'].'<br>2. '.$Mhs['StatusPengujiSkripsi2']?></td>
															<td style="text-align: center;vertical-align: middle;">
																<button LihatAdministrasi="<?=base_url('Proposal/'.$Mhs['Administrasi'])?>" class="btn btn-sm btn-primary border-light LihatAdministrasi"><i class="fa fa-file-pdf-o"></i></button>  
																<button LihatIjazahKHS="<?=base_url('Proposal/'.$Mhs['IjazahKHS'])?>" class="btn btn-sm btn-warning border-light LihatIjazahKHS"><i class="fa fa-file-pdf-o"></i></button>  
																<button LihatRevisiProposalBimbingan="<?=base_url('Proposal/'.$Mhs['RevisiProposalBimbingan'])?>" class="btn btn-sm btn-success border-light LihatRevisiProposalBimbingan"><i class="fa fa-file-pdf-o"></i></button>  
																<button LihatToeflSertifikat="<?=base_url('Proposal/'.$Mhs['ToeflSertifikat'])?>" class="btn btn-sm btn-danger border-light LihatToeflSertifikat"><i class="fa fa-file-pdf-o"></i></button>  
															</td>
															<td style="vertical-align: middle;"><?=$KetuaPenguji?></td>
															<td style="vertical-align: middle;"><?=$AnggotaPenguji?></td>
														</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="col-12">
									<?php if ($Mhs['StatusPengujiSkripsi1'] == 'Setuju' && $Mhs['StatusPengujiSkripsi2'] == 'Setuju') { ?>
										<a href="<?=base_url('Mhs/BeritaAcaraUjianSkripsi')?>" class="btn btn-sm border-light btn-sm btn-danger mt-4"><i class="fa fa-file-pdf-o"> <b>Berita Acara Ujian Skripsi</b></i></a>  
									<?php } ?>
									<div class="card-header bg-danger text-light mt-2">
										<b>Status Ujian Skripsi Skripsi</b>
									</div>
									<div class="card-body border border-light bg-warning p-2">
										<div class="table-responsive">
											<table class="table table-bordered bg-primary text-white mb-0">
												<thead>
													<tr>
														<th scope="col" style="width: 30%;vertical-align: middle;">Catatan Ketua Penguji</th>
														<th scope="col" style="width: 30%;vertical-align: middle;">Catatan Anggota Penguji</th>
														<th scope="col" style="width: 30%;vertical-align: middle;">Catatan Sekretaris</th>
														<th scope="col" style="width: 6%;text-align: center;vertical-align: middle;">Nilai</th>
													</tr>
												</thead>
												<tbody class="bg-danger">
													<tr>
														<td style="vertical-align: middle;"><?=$Mhs['CatatanSkripsi1']?></td>
														<td style="vertical-align: middle;"><?=$Mhs['CatatanSkripsi2']?></td>
														<td style="vertical-align: middle;"><?=$Mhs['CatatanSkripsi3']?></td>
														<td style="text-align: center;vertical-align: middle;">
													
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
		<div class="modal fade" id="ModalInputUjianSkripsi">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-success">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
									<div class="card-header bg-danger text-light mt-2">
										<b>Form Pengajuan Ujian Skripsi</b>
									</div>
									<div class="card-body border border-primary bg-warning">
										<div class="container-fluid">
											<div class="row">
												<div class="col-lg-12">
													<div class="input-group input-group-sm mb-0">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Upload Berkas Administrasi</b></span>
														</div>
														<input class="form-control" type="file" id="Administrasi">
													</div>
													<pre class="text-danger mb-0"><b>* Wajib Upload FC Kwitansi Pembayaran Skripsi (Non UKT) & Bebas Administrasi Dalam Format Pdf</b></pre>
												</div>  
												<div class="col-lg-12">
													<div class="input-group input-group-sm mb-0">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Upload Ijazah Terakhir & Seluruh KHS</b></span>
														</div>
														<input class="form-control" type="file" id="IjazahKHS">
													</div>
													<pre class="text-danger mb-0"><b>* Wajib Upload FC Ijazah Terakhir (SMA/Sederajat) & Seluruh KHS Dalam Format Pdf</b></pre>
												</div>  
												<div class="col-lg-12">
													<div class="input-group input-group-sm mb-0">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Upload Lembar Revisi Proposal & Kartu Bimbingan</b></span>
														</div>
														<input class="form-control" type="file" id="RevisiProposalBimbingan">
													</div>
													<pre class="text-danger mb-0"><b>* Wajib Upload Lembar Revisi Proposal & Kartu Bimbingan Dalam Format Pdf</b></pre>
												</div>  
												<div class="col-lg-12">
													<div class="input-group input-group-sm mb-0">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Upload Sertifikat Toefl & 10 Sertifikat Kegiatan</b></span>
														</div>
														<input class="form-control" type="file" id="ToeflSertifikat">
													</div>
													<pre class="text-danger mb-0"><b>* Wajib Upload Sertifikat Toefl Skor Minimal 450 & 10 Sertifikat Kegiatan Dalam Format Pdf</b></pre>
												</div>  
												<div class="col-lg-6">
													<div class="input-group input-group-sm mb-0">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Tanggal Ujian Skripsi</b></label>
														</div>
														<input class="form-control form-control-sm" type="date" id="TanggalUjianSkripsi" value="<?=date('Y-m-d')?>">
													</div>
												</div>
												<pre class="text-danger mb-0 ml-3"><b>* Minimal 1 Minggu Setelah Mengajukan & Konsultasi Dengan Dosen Pembimbing</b></pre>
												<div class="col-lg-12">
													<button type="button" class="btn btn-sm btn-primary" id="InputUjianSkripsi"><b>AJUKAN&nbsp;<div id="LoadingInput" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
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
		<div class="modal fade" id="ModalEditUjianSkripsi">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-success">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
									<div class="card-header bg-danger text-light mt-2">
										<b>Form Pengajuan Ujian Skripsi</b>
									</div>
									<div class="card-body border border-primary bg-warning">
										<div class="container-fluid">
											<div class="row">
											<div class="col-lg-12">
													<div class="input-group input-group-sm mb-0">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Update Berkas Administrasi</b></span>
														</div>
														<input class="form-control" type="file" id="_Administrasi">
														<input class="form-control" type="hidden" id="_Administrasi_">
													</div>
													<pre class="text-danger mb-0"><b>* Wajib Upload FC Kwitansi Pembayaran Skripsi (Non UKT) & Bebas Administrasi Dalam Format Pdf</b></pre>
												</div>  
												<div class="col-lg-12">
													<div class="input-group input-group-sm mb-0">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Update Ijazah Terakhir & Seluruh KHS</b></span>
														</div>
														<input class="form-control" type="file" id="_IjazahKHS">
														<input class="form-control" type="hidden" id="_IjazahKHS_">
													</div>
													<pre class="text-danger mb-0"><b>* Wajib Upload FC Ijazah Terakhir (SMA/Sederajat) & Seluruh KHS Dalam Format Pdf</b></pre>
												</div>  
												<div class="col-lg-12">
													<div class="input-group input-group-sm mb-0">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Update Lembar Revisi Proposal & Kartu Bimbingan</b></span>
														</div>
														<input class="form-control" type="file" id="_RevisiProposalBimbingan">
														<input class="form-control" type="hidden" id="_RevisiProposalBimbingan_">
													</div>
													<pre class="text-danger mb-0"><b>* Wajib Upload Lembar Revisi Proposal & Kartu Bimbingan Dalam Format Pdf</b></pre>
												</div>  
												<div class="col-lg-12">
													<div class="input-group input-group-sm mb-0">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Update Sertifikat Toefl & 10 Sertifikat Kegiatan</b></span>
														</div>
														<input class="form-control" type="file" id="_ToeflSertifikat">
														<input class="form-control" type="hidden" id="_ToeflSertifikat_">
													</div>
													<pre class="text-danger mb-0"><b>* Wajib Upload Sertifikat Toefl Skor Minimal 450 & 10 Sertifikat Kegiatan Dalam Format Pdf</b></pre>
												</div>  
												<div class="col-lg-6">
													<div class="input-group input-group-sm mb-0">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Tanggal Ujian Skripsi</b></label>
														</div>
														<input class="form-control form-control-sm" type="date" id="_TanggalUjianSkripsi" value="<?=date('Y-m-d')?>">
													</div>
												</div>
												<pre class="text-danger mb-0 ml-3"><b>* Minimal 1 Minggu Setelah Mengajukan & Konsultasi Dengan Dosen Pembimbing</b></pre>
												<div class="col-lg-12">
													<button type="button" class="btn btn-sm btn-primary" id="EditUjianSkripsi"><b>UPDATE&nbsp;<div id="LoadingEdit" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
													<?php $Pisah = explode(" ",$Mhs['StatusUjianSkripsi']); if ($Pisah[0] == 'Ditolak') { ?>
														<button type="button" class="btn btn-sm btn-danger" id="AjukanUjianSkripsi"><b>AJUKAN LAGI&nbsp;<div id="LoadingAjukan" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
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
		<div class="modal fade" id="ModalAdministrasi">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathAdministrasi" src="" type="application/pdf" width="100%" height="520"/>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalIjazahKHS">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathIjazahKHS" src="" type="application/pdf" width="100%" height="520"/>
          </div>
        </div>
      </div>
		</div>
		<div class="modal fade" id="ModalRevisiProposalBimbingan">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathRevisiProposalBimbingan" src="" type="application/pdf" width="100%" height="520"/>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalToeflSertifikat">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathToeflSertifikat" src="" type="application/pdf" width="100%" height="520"/>
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

				$(document).on("click",".LihatAdministrasi",function(){
					var Path = $(this).attr('LihatAdministrasi')
          $('#PathAdministrasi').attr('src',Path)		
          $('#ModalAdministrasi').modal("show")
				}) 

        $(document).on("click",".LihatIjazahKHS",function(){
					var Path = $(this).attr('LihatIjazahKHS')
          $('#PathIjazahKHS').attr('src',Path)		
          $('#ModalIjazahKHS').modal("show")
				}) 

				$(document).on("click",".LihatRevisiProposalBimbingan",function(){
					var Path = $(this).attr('LihatRevisiProposalBimbingan')
          $('#PathRevisiProposalBimbingan').attr('src',Path)		
          $('#ModalRevisiProposalBimbingan').modal("show")
				}) 

        $(document).on("click",".LihatToeflSertifikat",function(){
					var Path = $(this).attr('LihatToeflSertifikat')
          $('#PathToeflSertifikat').attr('src',Path)		
          $('#ModalToeflSertifikat').modal("show")
				}) 

				$("#InputUjianSkripsi").click(function() {
					if (!$('#Administrasi')[0].files[0]) {
						alert('Wajib Input Administrasi!')
					} else if ($('#Administrasi')[0].files[0].type != "application/pdf") {
						alert('Input Administrasi Wajib Pdf!')
					} else if (!$('#IjazahKHS')[0].files[0]) {
						alert('Wajib Input Ijazah Terakhir & Seluruh KHS!')
					} else if ($('#IjazahKHS')[0].files[0].type != "application/pdf") {
						alert('Input Ijazah Terakhir & Seluruh KHS Wajib Pdf!')
					} else if (!$('#RevisiProposalBimbingan')[0].files[0]) {
						alert('Wajib Input Lembar Revisi Proposal & Kartu Bimbingan!')
					} else if ($('#RevisiProposalBimbingan')[0].files[0].type != "application/pdf") {
						alert('Input Lembar Revisi Proposal & Kartu Bimbingan Wajib Pdf!')
					} else if (!$('#ToeflSertifikat')[0].files[0]) {
						alert('Wajib Input Sertifikat Toefl & 10 Sertifikat Kegiatan!')
					} else if ($('#ToeflSertifikat')[0].files[0].type != "application/pdf") {
						alert('Input Sertifikat Toefl & 10 Sertifikat Kegiatan Wajib Pdf!')
					} else if ($("#TanggalUjianSkripsi").val() === "") {
						alert('Input Tanggal Ujian Skripsi Tidak Boleh Kosong!')
					} else {
						var fd = new FormData()
						fd.append('TanggalUjianSkripsi',$("#TanggalUjianSkripsi").val())
						fd.append("Administrasi",$('#Administrasi')[0].files[0])
						fd.append("IjazahKHS",$('#IjazahKHS')[0].files[0])
						fd.append("RevisiProposalBimbingan",$('#RevisiProposalBimbingan')[0].files[0])
						fd.append("ToeflSertifikat",$('#ToeflSertifikat')[0].files[0])
						$.ajax({
							url: BaseURL+'Mhs/InputUjianSkripsi',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							beforeSend: function(){
								$("#InputUjianSkripsi").attr("disabled", true);                              
								$("#LoadingInput").show();
							},
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Mhs/UjianSkripsi"
								}
								else {
									alert(Respon)
									$("#LoadingInput").hide();
									$("#InputUjianSkripsi").attr("disabled", false);                              
								}
							}
						})
					}
				})
				$(document).on("click",".Edit",function(){
					var Data = $(this).attr('Edit')
					var Pisah = Data.split("|")
					$("#_Administrasi_").val(Pisah[0])
					$("#_IjazahKHS_").val(Pisah[1])
					$("#_RevisiProposalBimbingan_").val(Pisah[2])
					$("#_ToeflSertifikat_").val(Pisah[3])
					$("#_TanggalUjianSkripsi").val(Pisah[4])
					$('#ModalEditUjianSkripsi').modal("show")
				})
				
				$("#EditUjianSkripsi").click(function() {
					if (!$('#_Administrasi')[0].files[0] == false && $('#_Administrasi')[0].files[0].type != "application/pdf") {
						alert('Update Berkas Administrasi Wajib Pdf!')
					} else if (!$('#_IjazahKHS')[0].files[0] == false && $('#_IjazahKHS')[0].files[0].type != "application/pdf") {
						alert('Update Ijazah Terakhir & Seluruh KHS Wajib Pdf!')
					} else if (!$('#_RevisiProposalBimbingan')[0].files[0] == false && $('#_RevisiProposalBimbingan')[0].files[0].type != "application/pdf") {
						alert('Update Lembar Revisi Proposal & Kartu Bimbingan Wajib Pdf!')
					} else if (!$('#_ToeflSertifikat')[0].files[0] == false && $('#_ToeflSertifikat')[0].files[0].type != "application/pdf") {
						alert('Update Sertfikat Toefl & 10 Sertifikat Kegiatan Wajib Pdf!')
					} else if ($("#_TanggalUjianSkripsi").val() === "") {
						alert('Input Tanggal Ujian Skripsi Tidak Boleh Kosong!')
					} else {
						var fd = new FormData()
						fd.append('TanggalUjianSkripsi',$("#_TanggalUjianSkripsi").val())
						if (!$('#_Administrasi')[0].files[0] == false) {
							fd.append("Administrasi",$('#_Administrasi')[0].files[0])
							fd.append('_Administrasi_',$("#_Administrasi_").val())
						}
						if (!$('#_IjazahKHS')[0].files[0] == false) {
							fd.append("IjazahKHS",$('#_IjazahKHS')[0].files[0])
							fd.append('_IjazahKHS_',$("#_IjazahKHS_").val())
						}
						if (!$('#_RevisiProposalBimbingan')[0].files[0] == false) {
							fd.append("RevisiProposalBimbingan",$('#_RevisiProposalBimbingan')[0].files[0])
							fd.append('_RevisiProposalBimbingan_',$("#_RevisiProposalBimbingan_").val())
						}
						if (!$('#_ToeflSertifikat')[0].files[0] == false) {
							fd.append("ToeflSertifikat",$('#_ToeflSertifikat')[0].files[0])
							fd.append('_ToeflSertifikat_',$("#_ToeflSertifikat_").val())
						}
						$.ajax({
							url: BaseURL+'Mhs/EditUjianSkripsi',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							beforeSend: function(){
								$("#EditUjianSkripsi").attr("disabled", true);                              
								$("#LoadingEdit").show();
							},
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Mhs/UjianSkripsi"
								}
								else {
									alert(Respon)
									$("#LoadingEdit").hide();
									$("#EditUjianSkripsi").attr("disabled", false);                              
								}
							}
						})
					}
				})

				$("#AjukanUjianSkripsi").click(function() {
					if (!$('#_Administrasi')[0].files[0] == false && $('#_Administrasi')[0].files[0].type != "application/pdf") {
						alert('Update Berkas Administrasi Wajib Pdf!')
					} else if (!$('#_IjazahKHS')[0].files[0] == false && $('#_IjazahKHS')[0].files[0].type != "application/pdf") {
						alert('Update Ijazah Terakhir & Seluruh KHS Wajib Pdf!')
					} else if (!$('#_RevisiProposalBimbingan')[0].files[0] == false && $('#_RevisiProposalBimbingan')[0].files[0].type != "application/pdf") {
						alert('Update Lembar Revisi Proposal & Kartu Bimbingan Wajib Pdf!')
					} else if (!$('#_ToeflSertifikat')[0].files[0] == false && $('#_ToeflSertifikat')[0].files[0].type != "application/pdf") {
						alert('Update Sertfikat Toefl & 10 Sertifikat Kegiatan Wajib Pdf!')
					} else if ($("#_TanggalUjianSkripsi").val() === "") {
						alert('Input Tanggal Ujian Skripsi Tidak Boleh Kosong!')
					} else {
						var fd = new FormData()
						fd.append('TanggalUjianSkripsi',$("#_TanggalUjianSkripsi").val())
						if (!$('#_Administrasi')[0].files[0] == false) {
							fd.append("Administrasi",$('#_Administrasi')[0].files[0])
							fd.append('_Administrasi_',$("#_Administrasi_").val())
						}
						if (!$('#_IjazahKHS')[0].files[0] == false) {
							fd.append("IjazahKHS",$('#_IjazahKHS')[0].files[0])
							fd.append('_IjazahKHS_',$("#_IjazahKHS_").val())
						}
						if (!$('#_RevisiProposalBimbingan')[0].files[0] == false) {
							fd.append("RevisiProposalBimbingan",$('#_RevisiProposalBimbingan')[0].files[0])
							fd.append('_RevisiProposalBimbingan_',$("#_RevisiProposalBimbingan_").val())
						}
						if (!$('#_ToeflSertifikat')[0].files[0] == false) {
							fd.append("ToeflSertifikat",$('#_ToeflSertifikat')[0].files[0])
							fd.append('_ToeflSertifikat_',$("#_ToeflSertifikat_").val())
						}
						$.ajax({
							url: BaseURL+'Mhs/AjukanUjianSkripsi',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							beforeSend: function(){
								$("#EditUjianSkripsi").attr("disabled", true);                              
								$("#LoadingEdit").show();
							},
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Mhs/UjianSkripsi"
								}
								else {
									alert(Respon)
									$("#LoadingEdit").hide();
									$("#EditUjianSkripsi").attr("disabled", false);                              
								}
							}
						})
					}
				})
			})
		</script>
  </body>
</html>