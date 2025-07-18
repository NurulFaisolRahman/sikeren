							<div class="row p-2">
								<div class="col-12">
									<?php if ($Mhs['StatusUjianProposal'] == "") { ?>
										<button type="button" class="btn btn-sm btn-primary border-white mb-2" data-toggle="modal" data-target="#ModalInputUjianProposal"><b>Ajukan Ujian Proposal</b></button>
									<?php } else { ?>
										<button Edit="<?=$Mhs['KartuBimbinganProposal']."|".$Mhs['PlagiasiProposal']."|".$Mhs['TanggalUjianProposal']?>" class="btn btn-sm btn-warning border-light Edit text-white"><i class="fa fa-edit"> <b>Edit Data Pengajuan Ujian Proposal</b></i></button>
									<?php } ?>
									<a href="<?=base_url('Panduan/BeritaAcaraKehadiranUjianProposal.docx')?>" class="btn btn-sm border-light btn-sm btn-warning mb-2"><i class="fa fa-file-word-o"> <b>BA Ujian Proposal</b></i></a>
									<?php if ($Mhs['StatusPengujiProposal1'] == 'Setuju' && $Mhs['StatusPengujiProposal2'] == 'Setuju') { ?>
										<a href="<?=base_url('Mhs/PersetujuanUjianProposal')?>" class="btn btn-sm border-light btn-sm btn-danger"><i class="fa fa-file-pdf-o"> <b>Undangan Ujian Proposal</b></i></a>  
									<?php } ?>
								</div>
								<div class="col-12">
									<div class="card-header bg-danger text-light">
										<b>Status Pengajuan Ujian Proposal</b>
									</div>
									<div class="card-body border border-light bg-light p-2">
										<b class="text-danger">Maksimal Revisi 3 Bulan</b>
										<div class="table-responsive">
											<table class="table table-bordered bg-danger text-white mb-0">
												<thead>
													<tr>
														<th scope="col" style="width: 7%;text-align: center;">Tanggal</th>
														<th scope="col" style="width: 15%;">Status</th>
														<th scope="col" style="width: 10%;text-align: center;">Data</th>
														<th scope="col" style="width: 25%;">Penguji 1</th>
														<th scope="col" style="width: 25%;">Penguji 2</th>
													</tr>
												</thead>
												<tbody class="bg-primary">
												<?php if ($Mhs['StatusUjianProposal'] != "") { ?>
														<tr>
															<td style="vertical-align: middle;text-align: center;"><?=$Mhs['TanggalUjianProposal']?></td>
															<?php 
																$Penguji3 = $Mhs['StatusUjianProposal'] == 'Menunggu Persetujuan Pembimbing' ? 'Belum Validasi' : ($Mhs['NilaiProposal3'] == '' ? 'Belum Menilai' : 'Sudah Menilai');
																$Penguji1 = $Mhs['StatusPengujiProposal1'] == '' ? 'Belum Validasi' : ($Mhs['NilaiProposal1'] == '' ? 'Belum Menilai' : 'Sudah Menilai');
																$Penguji2 = $Mhs['StatusPengujiProposal2'] == '' ? 'Belum Validasi' : ($Mhs['NilaiProposal2'] == '' ? 'Belum Menilai' : 'Sudah Menilai');
															?>
															<td style="vertical-align: middle;"><?=$Mhs['StatusUjianProposal'].' : <br> 1. Pembimbing '.$Penguji3.' <br> 2. Penguji 1 '.$Penguji1.' <br> 3. Penguji 2 '.$Penguji2?></td>
															<td style="text-align: center;vertical-align: middle;">
																<button LihatKartuBimbingan="<?=base_url('Proposal/'.$Mhs['KartuBimbinganProposal'])?>" class="btn btn-sm btn-danger border-light LihatKartuBimbingan"><i class="fa fa-file-pdf-o"></i></button>  
																<button LihatPlagiasi="<?=base_url('Proposal/'.$Mhs['PlagiasiProposal'])?>" class="btn btn-sm btn-warning border-light LihatPlagiasi"><i class="fa fa-file-pdf-o"></i></button>  
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
									<?php if ($Mhs['NilaiProposal1'] != '' && $Mhs['NilaiProposal2'] != '' && $Mhs['NilaiProposal3'] != '' && $Mhs['NIM'] != '160231100128' && $Mhs['NIM'] != '160231100148' && $Mhs['NIM'] != '160231100135' && $Mhs['NIM'] != '170231100149') { ?>
										<a href="<?=base_url('Mhs/BeritaAcaraUjianProposal')?>" class="btn btn-sm border-light btn-sm btn-danger mt-4"><i class="fa fa-file-pdf-o"> <b>Berita Acara Ujian Proposal</b></i></a>  
									<?php } ?>
									<div class="card-header bg-danger text-light mt-2">
										<b>Status Ujian Proposal Skripsi</b>
									</div>
									<div class="card-body border border-light bg-light p-2">
										<div class="table-responsive">
											<table class="table table-bordered bg-primary text-white mb-0">
											<button type="button" class="btn btn-sm btn-warning border-white mb-2" CatatanRevisi="<?=$Mhs['CatatanProposal1'].'|'.$Mhs['CatatanProposal2'].'|'.$Mhs['CatatanProposal3']?>" id="Revisi"><b>Input Catatan Revisi</b></button>
												<thead>
													<tr>
														<th scope="col" style="width: 30%;vertical-align: middle;">Catatan Ketua Penguji (Penguji 1)</th>
														<th scope="col" style="width: 30%;vertical-align: middle;">Catatan Anggota Penguji (Penguji 2)</th>
														<th scope="col" style="width: 30%;vertical-align: middle;">Catatan Sekretaris (Dosen Pembimbing)</th>
													</tr>
												</thead>
												<tbody class="bg-danger">
													<tr>
														<td style="vertical-align: middle;"><?=$Mhs['CatatanProposal1']?></td>
														<td style="vertical-align: middle;"><?=$Mhs['CatatanProposal2']?></td>
														<td style="vertical-align: middle;"><?=$Mhs['CatatanProposal3']?></td>
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
		<div class="modal fade" id="ModalRevisi">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-success">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
									<div class="card-header bg-danger text-light mt-2">
										<b>Form Catatan Revisi Ujian Proposal</b>
									</div>
									<div class="card-body border border-primary bg-warning">
										<div class="container-fluid">
											<div class="row">
                        <div class="col-lg-12">
                          <div class="input-group input-group-sm"> 
                            <div class="input-group-prepend">
                              <label class="input-group-text bg-primary text-light"><b>Catatan Penguji 1</b></label>
                            </div>
                            <textarea class="form-control" id="CatatanPenguji1" rows="4"></textarea>
                          </div>
												</div>
												<div class="col-lg-12">
                          <div class="input-group input-group-sm"> 
                            <div class="input-group-prepend">
                              <label class="input-group-text bg-primary text-light"><b>Catatan Penguji 2</b></label>
                            </div>
                            <textarea class="form-control" id="CatatanPenguji2" rows="4"></textarea>
                          </div>
												</div>
												<div class="col-lg-12">
                          <div class="input-group input-group-sm"> 
                            <div class="input-group-prepend">
                              <label class="input-group-text bg-primary text-light"><b>Catatan Penguji 3</b></label>
                            </div>
                            <textarea class="form-control" id="CatatanPenguji3" rows="4"></textarea>
                          </div>
                        </div>
                        <div class="col-12 mt-1">
                          <div class="input-group input-group-sm">
                            <button type="button" class="btn btn-danger" id="ValidasiRevisi"><b>SIMPAN CATATAN&nbsp;<div id="LoadingRevisi" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
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
		<div class="modal fade" id="ModalInputUjianProposal">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-success">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
									<div class="card-header bg-danger text-light mt-2">
										<b>Form Pengajuan Ujian Proposal</b>
									</div>
									<div class="card-body border border-primary bg-warning">
										<div class="container-fluid">
											<div class="row">
												<div class="col-lg-12">
													<pre class="text-danger mb-0"><b>* Wajib Membawa Form Berita Acara Kehadiran Ujian Proposal</b></pre>
													<div class="input-group input-group-sm mb-0">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Upload Kartu Bimbingan</b></span>
														</div>
														<input class="form-control" type="file" id="KartuBimbingan">
													</div>
													<pre class="text-danger mb-0"><b>* Wajib Upload Kartu Bimbingan Minimal 3x Dalam Format Pdf</b></pre>
												</div>  
												<div class="col-lg-12">
													<div class="input-group input-group-sm mb-0">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Upload Lampiran Cek Plagiasi</b></span>
														</div>
														<input class="form-control" type="file" id="Plagiasi">
													</div>
													<pre class="text-danger mb-0"><b>* Wajib Upload Lampiran Cek Plagiasi (Bab 1 15%, Bab 2 & 3 30%) Dalam Format Pdf</b></pre>
												</div>  
												<div class="col-lg-6">
													<div class="input-group input-group-sm mb-0">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Tanggal Ujian Proposal</b></label>
														</div>
														<input class="form-control form-control-sm" type="date" id="TanggalUjianProposal" value="<?=date('Y-m-d')?>">
													</div>
												</div>
												<pre class="text-danger mb-0 ml-3"><b>* Minimal 1 Minggu Setelah Mengajukan & Konsultasi Dengan Dosen Pembimbing<br>* Mohon Ditunggu Saat Loading Hingga Selesai</b></pre>
												<div class="col-lg-12">
													<button type="button" class="btn btn-sm btn-primary" id="InputUjianProposal"><b>AJUKAN&nbsp;<div id="LoadingInput" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
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
		<div class="modal fade" id="ModalEditUjianProposal">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-success">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
									<div class="card-header bg-danger text-light mt-2">
										<b>Edit Form Pengajuan Ujian Proposal</b>
									</div>
									<div class="card-body border border-primary bg-warning">
										<div class="container-fluid">
											<div class="row">
												<div class="col-lg-12">
													<pre class="text-danger mb-0"><b>* Wajib Membawa Form Berita Acara Kehadiran Ujian Proposal</b></pre>
													<div class="input-group input-group-sm mb-0">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Update Kartu Bimbingan</b></span>
														</div>
														<input class="form-control" type="file" id="_KartuBimbingan">
														<input class="form-control" type="hidden" id="_KartuBimbingan_">
													</div>
													<pre class="text-danger mb-0"><b>* Wajib Upload Kartu Bimbingan Minimal 3x Dalam Format Pdf</b></pre>
												</div>  
												<div class="col-lg-12">
													<div class="input-group input-group-sm mb-0">
														<div class="input-group-prepend">
															<span class="input-group-text bg-primary text-light"><b>Update Lampiran Cek Plagiasi</b></span>
														</div>
														<input class="form-control" type="file" id="_Plagiasi">
														<input class="form-control" type="hidden" id="_Plagiasi_">
													</div>
													<pre class="text-danger mb-0"><b>* Wajib Upload Lampiran Cek Plagiasi (Bab 1 15%, Bab 2 & 3 30%) Dalam Format Pdf</b></pre>
												</div>  
												<div class="col-lg-6">
													<div class="input-group input-group-sm mb-0">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Tanggal Ujian Proposal</b></label>
														</div>
														<input class="form-control form-control-sm" type="date" id="_TanggalUjianProposal" value="<?=date('Y-m-d')?>" disabled>
													</div>
												</div>
												<pre class="text-danger mb-0 ml-3"><b>* Minimal 1 Minggu Setelah Mengajukan & Konsultasi Dengan Dosen Pembimbing<br>* Mohon Ditunggu Saat Loading Hingga Selesai</b></pre>
												<div class="col-lg-12">
													<button type="button" class="btn btn-sm btn-primary" id="EditUjianProposal"><b>UPDATE&nbsp;<div id="LoadingEdit" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
													<?php $Pisah = explode(" ",$Mhs['StatusUjianProposal']); if ($Pisah[0] == 'Ditolak') { ?>
														<button type="button" class="btn btn-sm btn-danger" id="AjukanUjianProposal"><b>AJUKAN LAGI&nbsp;<div id="LoadingAjukan" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
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
		<div class="modal fade" id="ModalKartuBimbingan">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathKartuBimbingan" src="" type="application/pdf" width="100%" height="520"/>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalPlagiasi">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathPlagiasi" src="" type="application/pdf" width="100%" height="520"/>
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

				$(document).on("click",".LihatKartuBimbingan",function(){
					var Path = $(this).attr('LihatKartuBimbingan')
          $('#PathKartuBimbingan').attr('src',Path)		
          $('#ModalKartuBimbingan').modal("show")
				}) 

        $(document).on("click",".LihatPlagiasi",function(){
					var Path = $(this).attr('LihatPlagiasi')
          $('#PathPlagiasi').attr('src',Path)		
          $('#ModalPlagiasi').modal("show")
				}) 

				$("#InputUjianProposal").click(function() {
					if (!$('#KartuBimbingan')[0].files[0]) {
						alert('Wajib Input Kartu Bimbingan!')
					} else if ($('#KartuBimbingan')[0].files[0].type != "application/pdf") {
						alert('Input Kartu Bimbingan Wajib Pdf!')
					} else if (!$('#Plagiasi')[0].files[0]) {
						alert('Wajib Input Lampiran Plagiasi!')
					} else if ($('#Plagiasi')[0].files[0].type != "application/pdf") {
						alert('Input Lampiran Plagiasi Wajib Pdf!')
					} else if ($("#TanggalUjianProposal").val() === "") {
						alert('Input Tanggal Ujian Proposal Tidak Boleh Kosong!')
					} else {
						var fd = new FormData()
						fd.append('TanggalUjianProposal',$("#TanggalUjianProposal").val())
						fd.append("KartuBimbinganProposal",$('#KartuBimbingan')[0].files[0])
						fd.append("PlagiasiProposal",$('#Plagiasi')[0].files[0])
						$.ajax({
							url: BaseURL+'Mhs/InputUjianProposal',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							beforeSend: function(){
								$("#InputUjianProposal").attr("disabled", true);                              
								$("#LoadingInput").show();
							},
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Mhs/UjianProposal"
								}
								else {
									alert(Respon)
									$("#LoadingInput").hide();
									$("#InputUjianProposal").attr("disabled", false);                              
								}
							}
						})
					}
				})
				$(document).on("click",".Edit",function(){
					var Data = $(this).attr('Edit')
					var Pisah = Data.split("|")
					$("#_KartuBimbingan_").val(Pisah[0])
					$("#_Plagiasi_").val(Pisah[1])
					$("#_TanggalUjianProposal").val(Pisah[2])
					$('#ModalEditUjianProposal').modal("show")
				})
				
				$("#EditUjianProposal").click(function() {
					if (!$('#_KartuBimbingan')[0].files[0] == false && $('#_KartuBimbingan')[0].files[0].type != "application/pdf") {
						alert('Update Kartu Bimbingan Wajib Pdf!')
					} else if (!$('#_Plagiasi')[0].files[0] == false && $('#_Plagiasi')[0].files[0].type != "application/pdf") {
						alert('Update Lampiran Plagiasi Wajib Pdf!')
					} else if ($("#_TanggalUjianProposal").val() === "") {
						alert('Input Tanggal Ujian Proposal Tidak Boleh Kosong!')
					} else {
						var fd = new FormData()
						fd.append('TanggalUjianProposal',$("#_TanggalUjianProposal").val())
						if (!$('#_KartuBimbingan')[0].files[0] == false) {
							fd.append("KartuBimbingan",$('#_KartuBimbingan')[0].files[0])
							fd.append('_KartuBimbingan_',$("#_KartuBimbingan_").val())
						}
						if (!$('#_Plagiasi')[0].files[0] == false) {
							fd.append("Plagiasi",$('#_Plagiasi')[0].files[0])
							fd.append('_Plagiasi_',$("#_Plagiasi_").val())
						}
						$.ajax({
							url: BaseURL+'Mhs/EditUjianProposal',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							beforeSend: function(){
								$("#EditUjianProposal").attr("disabled", true);                              
								$("#LoadingEdit").show();
							},
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Mhs/UjianProposal"
								}
								else {
									alert(Respon)
									$("#LoadingEdit").hide();
									$("#EditUjianProposal").attr("disabled", false);                              
								}
							}
						})
					}
				})

				$("#Revisi").click(function() {
					var Data = $(this).attr('CatatanRevisi')
					var Pisah = Data.split("|")
					$("#CatatanPenguji1").val(Pisah[0])
					$("#CatatanPenguji2").val(Pisah[1])
					$("#CatatanPenguji3").val(Pisah[2])
					$('#ModalRevisi').modal("show")
				})
				
				$("#ValidasiRevisi").click(function() {
          var Revisi = { CatatanProposal1: $("#CatatanPenguji1").val(),
												 CatatanProposal2: $("#CatatanPenguji2").val(),
                         CatatanProposal3: $("#CatatanPenguji3").val() }
          var Konfirmasi = confirm("Yakin Ingin Menyimpan Catatan?"); 
      		if (Konfirmasi == true) {
            $("#ValidasiRevisi").attr("disabled", true); 
            $("#LoadingRevisi").show();                             
            $.post(BaseURL+"Mhs/UpdateRevisi", Revisi).done(function(Respon) {
              if (Respon == '1') {
                window.location = BaseURL + "Mhs/UjianProposal"
              } else {
                alert(Respon)
                $("#ValidasiRevisi").attr("disabled", false); 
                $("#LoadingRevisi").hide();                             
              }
            })
          }
        })

				$("#AjukanUjianProposal").click(function() {
					if (!$('#_KartuBimbingan')[0].files[0] == false && $('#_KartuBimbingan')[0].files[0].type != "application/pdf") {
						alert('Update Kartu Bimbingan Wajib Pdf!')
					} else if (!$('#_Plagiasi')[0].files[0] == false && $('#_Plagiasi')[0].files[0].type != "application/pdf") {
						alert('Update Lampiran Plagiasi Wajib Pdf!')
					} else if ($("#_TanggalUjianProposal").val() === "") {
						alert('Input Tanggal Ujian Proposal Tidak Boleh Kosong!')
					} else {
						var fd = new FormData()
						fd.append('TanggalUjianProposal',$("#_TanggalUjianProposal").val())
						if (!$('#_KartuBimbingan')[0].files[0] == false) {
							fd.append("KartuBimbingan",$('#_KartuBimbingan')[0].files[0])
							fd.append('_KartuBimbingan_',$("#_KartuBimbingan_").val())
						}
						if (!$('#_Plagiasi')[0].files[0] == false) {
							fd.append("Plagiasi",$('#_Plagiasi')[0].files[0])
							fd.append('_Plagiasi_',$("#_Plagiasi_").val())
						}
						$.ajax({
							url: BaseURL+'Mhs/AjukanUjianProposal',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							beforeSend: function(){
								$("#EditUjianProposal").attr("disabled", true);                              
								$("#LoadingAjukan").show();
							},
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Mhs/UjianProposal"
								}
								else {
									alert(Respon)
									$("#LoadingAjukan").hide();
									$("#EditUjianProposal").attr("disabled", false);                              
								}
							}
						})
					}
				})
			})
		</script>
  </body>
</html>