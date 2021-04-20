<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
					<div class="col-sm-12 mt-2">
						<ul class="nav nav-pills mb-2 border border-warning rounded bg-light" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link <?php if($this->session->userdata('SubPengabdian') == 'Rencana'){echo 'active';} ?>" id="pills-Rencana-tab" data-toggle="pill" href="#pills-Rencana" role="tab" aria-controls="pills-Rencana" aria-selected="true"><b>Rencana</b></a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?php if($this->session->userdata('SubPengabdian') == 'Realisasi'){echo 'active';} ?>" id="pills-Realisasi-tab" data-toggle="pill" href="#pills-Realisasi" role="tab" aria-controls="pills-Realisasi" aria-selected="false"><b>Realisasi</b></a>
							</li>
						</ul>
						<div class="tab-content border border-warning rounded bg-light" id="pills-tabContent">
							<div class="tab-pane fade <?php if($this->session->userdata('SubPengabdian') == 'Rencana'){echo 'show active';} ?>" id="pills-Rencana" role="tabpanel" aria-labelledby="pills-Rencana-tab">
								<?php include 'RencanaPengabdian.php'; ?>
							</div>
							<div class="tab-pane fade <?php if($this->session->userdata('SubPengabdian') == 'Realisasi'){echo 'show active';} ?>" id="pills-Realisasi" role="tabpanel" aria-labelledby="pills-Realisasi-tab">
								<?php include 'RealisasiPengabdian.php'; ?>
							</div>
						</div>
					</div>
        </div>
      </div>
    </section>
    </div>
		</div>
		<div class="modal fade" id="ModalBukti">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathBukti" src="" type="application/pdf" width="100%" height="520"/>
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
    <script src="<?=base_url('bootstrap/inputmask/min/jquery.inputmask.bundle.min.js')?>"></script>
    <script>
			jQuery(document).ready(function($) {
				"use strict";
				var BaseURL = '<?=base_url()?>';

				$(document).on("click",".LihatBukti",function(){
					var Path = $(this).attr('LihatBukti')
          $('#PathBukti').attr('src',Path)		
          $('#ModalBukti').modal("show")
				}) 

				$("#PanduanPAK").click(function() {
          $('#JudulPanduan').html('Panduan PO-PAK')
					$('#PathPanduan').attr('src',BaseURL+'Panduan/PAK.pdf')		
          $('#ModalPanduan').modal("show")
				}) 

				$("#PanduanBKD").click(function() {
          $('#JudulPanduan').html('Panduan BKD')
					$('#PathPanduan').attr('src',BaseURL+'Panduan/BKD.pdf')		
          $('#ModalPanduan').modal("show")
				}) 

				$("#pak").click(function() {
					if (isNaN($('#DariTahun').val()) || $('#DariTahun').val() == "") {
						alert('Input Tahun Dari Semester Belum Benar!')
					} else if (isNaN($('#HinggaTahun').val()) || $('#HinggaTahun').val() == "") {
						alert('Input Tahun Hingga Semester Belum Benar!')
					} else if ($('#DariTahun').val() > $('#HinggaTahun').val()) {
						alert('Input Tahun Dari Semester Harus Lebih Kecil Atau Sama Dengan Input Tahun Hingga Semester!')
					}	else {
						window.location = BaseURL + 'Dashboard/PAK/'+($('#DariSemester').val()+'-'+$('#HinggaSemester').val())+'/'+($('#DariTahun').val()+'-'+$('#HinggaTahun').val())
						if (document.getElementById("BuktiExcel").checked) {
							var PAK = ['Pendidikan','Penelitian','Pengabdian','Penunjang']
							for (let i = 1; i < 5; i++) {
								$.post(BaseURL+"Dashboard"+"/Lampiran/"+($('#DariSemester').val()+'-'+$('#HinggaSemester').val())+'/'+($('#DariTahun').val()+'-'+$('#HinggaTahun').val())+'/'+PAK[i-1]).done(function(Respon) {
									var array = JSON.parse(Respon)
									var NomorLampiran = 1
									array.forEach(function(object) {
										if (object.Bukti != null) {
											$('#LampiranPAK').attr('href',BaseURL+PAK[i-1]+'/'+object.Bukti)		
											$('#LampiranPAK').attr('Download','Lampiran '+i+'.'+NomorLampiran+'.pdf') 
											$('#LampiranPAK')[0].click()
										}
										NomorLampiran++;
									})
								}) 	
							}	
						}
					}
				})

				$("#bkd").click(function() {
					if (isNaN($('#DariTahun').val()) || $('#DariTahun').val() == "") {
						alert('Input Tahun Dari Semester Belum Benar!')
					} else if (isNaN($('#HinggaTahun').val()) || $('#HinggaTahun').val() == "") {
						alert('Input Tahun Hingga Semester Belum Benar!')
					} else if ($('#DariTahun').val() > $('#HinggaTahun').val()) {
						alert('Input Tahun Dari Semester Harus Lebih Kecil Atau Sama Dengan Input Tahun Hingga Semester!')
					}	else {
						window.location = BaseURL + 'Dashboard/BKD/'+($('#DariSemester').val()+'-'+$('#HinggaSemester').val())+'/'+($('#DariTahun').val()+'-'+$('#HinggaTahun').val())
						if (document.getElementById("BuktiExcel").checked) {
							var PAK = ['Pendidikan','Penelitian','Pengabdian','Penunjang']
							for (let i = 1; i < 5; i++) {
								$.post(BaseURL+"Dashboard"+"/LampiranBKD/"+($('#DariSemester').val()+'-'+$('#HinggaSemester').val())+'/'+($('#DariTahun').val()+'-'+$('#HinggaTahun').val())+'/'+PAK[i-1]).done(function(Respon) {
									var array = JSON.parse(Respon)
									var NomorLampiran = 1
									array.forEach(function(object) {
										if (object.Bukti != null) {
											$('#LampiranPAK').attr('href',BaseURL+PAK[i-1]+'/'+object.Bukti)		
											$('#LampiranPAK').attr('Download','Lampiran '+i+'.'+NomorLampiran+'.pdf') 
											$('#LampiranPAK')[0].click()
										}
										NomorLampiran++;
									})
								}) 	
							}
						}	
					}
				}) 

				$('#TabelRencana').DataTable( {
					// dom:'lfrtip',
					"ordering": false,
					"lengthMenu": [ 5, 10, 20, 30 ],
					"language": {
						"paginate": {
							'previous': '<b class="text-primary"><</b>',
							'next': '<b class="text-primary">></b>'
						}
					}
				})

				$('#TabelRealisasi').DataTable( {
					// dom:'lfrtip',
					"ordering": false,
					"lengthMenu": [ 5, 10, 20, 30 ],
					"language": {
						"paginate": {
							'previous': '<b class="text-primary"><</b>',
							'next': '<b class="text-primary">></b>'
						}
					}
				})

				$('[data-mask]').inputmask()

				$("#pills-Rencana-tab").click(function() {
					var Data = {SubPengabdian: 'Rencana'}
					$.post(BaseURL+"Dashboard/SubPengabdian", Data)
				})

				$("#pills-Realisasi-tab").click(function() {
					var Data = {SubPengabdian: 'Realisasi'}
					$.post(BaseURL+"Dashboard/SubPengabdian", Data)
				})

				$(document).on("click",".EditRencanaPengabdian",function(){
          <?php  $Kredit = array(5.5,3,4,3,2,3,2,1,1,1.5,1,0.5,3,5,1,0.5); ?>
					var Data = $(this).attr('EditRencanaPengabdian')
					var Pisah = Data.split("/")
					$("#NoEditRencana").val(Pisah[0])
					$("#EditJenjangRencanaPengabdian").val(Pisah[2])
					$("#JenjangLama").val(Pisah[2])
					$("#EditSemesterRencanaPengabdian").val(Pisah[3])
					$("#SemesterLama").val(Pisah[3])
					$("#EditTahunRencanaPengabdian").val(Pisah[4])
					$("#TahunLama").val(Pisah[4])
					var PisahKode = Pisah[5].split("|")
          <?php 
            for ($i = 1; $i <= 16 ; $i++) {
              echo "if (PisahKode[".($i-1)."] == '1') {\n";
              echo "$('#EditRencanaPNB".$i."').attr('checked', true)\n";	
              echo "$('#EditRencanaKreditPNB".$i."').html(".$Kredit[$i-1].")\n}\n";
            } 
          ?>
					$("#EditRencanaTotalKredit").html(Pisah[6])
					$("#TargetKajur").val(Pisah[7])
					$('#ModalEditRencanaPengabdian').modal("show");
				})

				$("#TombolEditRencanaTotalKredit").click(function() {
					<?php 
            $TotalEditRencana = "document.getElementById('EditRencanaTotalKredit').innerHTML = ";
            for ($i = 1; $i <= 16 ; $i++) {
              echo "var EditRencanaPNB".$i." = parseFloat(document.getElementById('EditRencanaKreditPNB".$i."').innerHTML)\n";
              if ($i == 16) {
                $TotalEditRencana .= "EditRencanaPNB".$i;
              } else {
                $TotalEditRencana .= "EditRencanaPNB".$i."+";
              }
            }            
            echo $TotalEditRencana;
          ?>
				})
				
				$("#SimpanEditRencanaPengabdian").click(function() {
          <?php 
            $EditTotalKreditRencana = "var EditTotalKreditRencana = ";
            $EditKodeRencana = "var EditKodeRencana = ''+";
            for ($i = 1; $i <= 16 ; $i++) {
              echo "var EditRencanaPNB".$i." = parseFloat(document.getElementById('EditRencanaKreditPNB".$i."').innerHTML)\n";
              if ($i == 16) {
                $EditTotalKreditRencana .= "EditRencanaPNB".$i;
                $EditKodeRencana .= "(document.getElementById('EditRencanaPNB".$i."').checked ? 1 : 0)\n";
              } else {
                $EditTotalKreditRencana .= "EditRencanaPNB".$i."+";
                $EditKodeRencana .= "(document.getElementById('EditRencanaPNB".$i."').checked ? 1 : 0)+'|'+";
              }
            }            
            echo $EditTotalKreditRencana."\n";
            echo $EditKodeRencana;
          ?>
					var EditDataRencanaPengabdian = {No:$("#NoEditRencana").val(),Jenjang:$("#EditJenjangRencanaPengabdian").val(),Semester:$("#EditSemesterRencanaPengabdian").val(),
																			 Tahun:$("#EditTahunRencanaPengabdian").val(),Kode:EditKodeRencana,Total:EditTotalKreditRencana}
					if (EditTotalKreditRencana < $('#TargetKajur').val()) {
						alert('Belum Memenuhi Target Kajur Yaitu '+$('#TargetKajur').val())
					} 
					else {
						$.post(BaseURL+"Pengabdian/EditRencana", EditDataRencanaPengabdian).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + "Dashboard/Pengabdian"
							} else {
								alert(Respon)
							}
						})
					}
				})

				$("#LihatRealisasi").click(function() {
					var Data = {ID: $("#IdKegiatanPengabdian").val()}
					$.post(BaseURL+"Dashboard/LihatRealisasiPengabdian", Data).done(function(Respon) {
						window.location = BaseURL + "Dashboard/Pengabdian"
					})
				})

				$("#TambahRealisasiPengabdian").click(function() {
					if (isNaN(parseInt($("#Volume").val()))) {
						alert('Volume Kegiatan Belum Benar!')
					} 
					else {
						var fd = new FormData()
						fd.append("file", $('#Bukti')[0].files[0])
						fd.append('Homebase',$("#JenisRealisasi").val())
						fd.append('Semester',$("#SemesterRealisasi").val())
						fd.append('Tahun',$("#TahunRealisasi").val())
						fd.append('IdKegiatan',$("#InputIdKegiatanPengabdian").val())
						fd.append('SK',$("#SK").val())
						fd.append('Kegiatan',$("#Uraian").val())		
						fd.append('Volume',parseInt($("#Volume").val()))
						fd.append('TanggalKegiatan',$("#TanggalKegiatan").val())	
						if ($("#InputIdKegiatanPengabdian").val() == 'PNB3') {
							fd.append('Kode',$("#Tingkat").val())
							fd.append('Biaya',$("#SumberPembiayaan").val())
						}
						else if ($("#InputIdKegiatanPengabdian").val() == 'PNB4') {
							fd.append('Kode',$("#Dasar").val())				
							fd.append('Biaya',$("#SumberPembiayaan").val())
						}
						else if ($("#InputIdKegiatanPengabdian").val() == 'PNB5') {
							fd.append('KreditBKD',$("#JenisPNB5").val())		
							fd.append('Kode',0)				
							fd.append('Biaya',$("#SumberPembiayaan").val())
						}
						else if ($("#InputIdKegiatanPengabdian").val() == 'PNB7') {
							fd.append('Kode',$("#Peran").val())
							fd.append('Biaya',$("#SumberPembiayaan").val())
						}
						else if ($("#InputIdKegiatanPengabdian").val() == 'PNB8') {
							fd.append('Proposal',$("#Proposal").val())
							fd.append('Kode','0')
							fd.append('Biaya',$("#SumberPembiayaan").val())
						}
						else if ($("#InputIdKegiatanPengabdian").val() == 'PNB10') {
							fd.append('KreditBKD',$("#TingkatPNB10").val())
							fd.append('Kode','0')
							fd.append('Biaya',$("#SumberPembiayaan").val())
						}
						else {
							if ($("#InputIdKegiatanPengabdian").val() == 'PNB1') {
								fd.append('Biaya','0')
							} else {
								fd.append('Biaya',$("#SumberPembiayaan").val())
							}
							fd.append('Kode','0')
						}
						$.ajax({
							url: BaseURL+'Pengabdian/InputRealisasi',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							beforeSend: function(){
								$("#LoadingInput").show();
							},
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Dashboard/Pengabdian"
								}
								else {
									alert(Respon)
								}
							}
						});
					}
          return false
				})
				
				$(document).on("click",".EditRealisasi",function(){
					var Data = $(this).attr('EditRealisasi')
					var Pisah = Data.split("|");
					$('#EditNoRealisasi').val(Pisah[0])
					Pisah[1] == 'S1'? $('#EditJenisRealisasi').val('S1') : $('#EditJenisRealisasi').val('S2')
					Pisah[2] == 'Ganjil'? $('#EditSemesterRealisasi').val('Ganjil') : $('#EditSemesterRealisasi').val('Genap')
					$('#EditTahunRealisasi').val(Pisah[3])
					$("#EditSK").val(Pisah[4])
					$('#EditUraian').val(Pisah[5])
					$("#EditTanggalKegiatan").val(Pisah[6])
					$('#EditBuktiRealisasi').val(Pisah[7])
					$('#EditRealisasiPengabdian').modal("show") 
				});

				$("#CancelBukti").click(function() {
					$("#EditBukti").val("")
				})

				$("#UpdateRealisasiPengabdian").click(function() {
					var fd = new FormData()
					fd.append("file", $('#EditBukti')[0].files[0])
					fd.append('No',$("#EditNoRealisasi").val())
					fd.append('Homebase',$("#EditJenisRealisasi").val())
					fd.append('Semester',$("#EditSemesterRealisasi").val())
					fd.append('Tahun',$("#EditTahunRealisasi").val())
					fd.append('SK',$("#EditSK").val())
					fd.append('Kegiatan',$("#EditUraian").val())		
					fd.append('TanggalKegiatan',$("#EditTanggalKegiatan").val())
					fd.append('Bukti',$("#EditBuktiRealisasi").val())
					$.ajax({
						url: BaseURL+'Pengabdian/EditRealisasi',
						type: 'post',
						data: fd,
						contentType: false,
						processData: false,
						beforeSend: function(){
							$("#LoadingUpdate").show();
						},
						success: function(Respon){
							if (Respon == '1') {
								window.location = BaseURL + "Dashboard/Pengabdian"
							}
							else {
								alert(Respon)
							}
						}
					});
				});

				$(document).on("click",".HapusRealisasi",function(){
					var Data = $(this).attr('HapusRealisasi')
					var Pisah = Data.split("|");
					var Hapus = {No: Pisah[0],Bukti: Pisah[1]}
					var Konfirmasi = confirm("Yakin Ingin Menghapus?");
      		if (Konfirmasi == true) {
						$.post(BaseURL+"Pengabdian/HapusRealisasi", Hapus).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + "Dashboard/Pengabdian"
							} else {
								alert(Respon)
							}
						});
					}
				});
			})

			function InputIdKegiatanPengabdian() {
				if ($("#InputIdKegiatanPengabdian").val() == 'PNB3') { 
					document.getElementById("OpsiPNB3").style.display = 'block'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'block'
					document.getElementById("OpsiPNB4").style.display = 'none'
					document.getElementById("OpsiPNB5").style.display = 'none'
					document.getElementById("OpsiPNB7").style.display = 'none'
					document.getElementById("OpsiPNB8").style.display = 'none'
					document.getElementById("OpsiPNB10").style.display = 'none'
				} else if ($("#InputIdKegiatanPengabdian").val() == 'PNB4') {
					document.getElementById("OpsiPNB3").style.display = 'none'
					document.getElementById("OpsiPNB4").style.display = 'block'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'block'
					document.getElementById("OpsiPNB5").style.display = 'none'
					document.getElementById("OpsiPNB7").style.display = 'none'
					document.getElementById("OpsiPNB8").style.display = 'none'
					document.getElementById("OpsiPNB10").style.display = 'none'
				} else if ($("#InputIdKegiatanPengabdian").val() == 'PNB5') {
					document.getElementById("OpsiPNB3").style.display = 'none'
					document.getElementById("OpsiPNB4").style.display = 'none'
					document.getElementById("OpsiPNB5").style.display = 'block'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'block'
					document.getElementById("OpsiPNB7").style.display = 'none'
					document.getElementById("OpsiPNB8").style.display = 'none'
					document.getElementById("OpsiPNB10").style.display = 'none'
				} else if ($("#InputIdKegiatanPengabdian").val() == 'PNB7') {
					document.getElementById("OpsiPNB3").style.display = 'none'
					document.getElementById("OpsiPNB4").style.display = 'none'
					document.getElementById("OpsiPNB5").style.display = 'none'
					document.getElementById("OpsiPNB7").style.display = 'block'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'block'
					document.getElementById("OpsiPNB8").style.display = 'none'
					document.getElementById("OpsiPNB10").style.display = 'none'
				} else if ($("#InputIdKegiatanPengabdian").val() == 'PNB8') {
					document.getElementById("OpsiPNB3").style.display = 'none'
					document.getElementById("OpsiPNB4").style.display = 'none'
					document.getElementById("OpsiPNB5").style.display = 'none'
					document.getElementById("OpsiPNB7").style.display = 'none'
					document.getElementById("OpsiPNB8").style.display = 'block'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'block'
					document.getElementById("OpsiPNB10").style.display = 'none'
				} else if ($("#InputIdKegiatanPengabdian").val() == 'PNB10') {
					document.getElementById("OpsiPNB3").style.display = 'none'
					document.getElementById("OpsiPNB4").style.display = 'none'
					document.getElementById("OpsiPNB5").style.display = 'none'
					document.getElementById("OpsiPNB7").style.display = 'none'
					document.getElementById("OpsiPNB8").style.display = 'none'
					document.getElementById("OpsiPNB10").style.display = 'block'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'block'
				} else {
					if ($("#InputIdKegiatanPengabdian").val() == 'PNB1') {
						document.getElementById("OpsiSumberPembiayaan").style.display = 'none'
					} else {
						document.getElementById("OpsiSumberPembiayaan").style.display = 'block'
					}
					document.getElementById("OpsiPNB3").style.display = 'none'
					document.getElementById("OpsiPNB4").style.display = 'none'
					document.getElementById("OpsiPNB5").style.display = 'none'
					document.getElementById("OpsiPNB7").style.display = 'none'
					document.getElementById("OpsiPNB8").style.display = 'none'
					document.getElementById("OpsiPNB10").style.display = 'none'
				}
			}

      <?php 
        $Kredit = array(5.5,3,4,3,2,3,2,1,1,1.5,1,0.5,3,5,1,0.5);
        for ($i = 1; $i <= 16 ; $i++) {
          echo "function EditRencanaPNB".$i."() {document.getElementById('EditRencanaPNB".$i."').checked? document.getElementById('EditRencanaKreditPNB".$i."').innerHTML = ".$Kredit[$i-1]." : document.getElementById('EditRencanaKreditPNB".$i."').innerHTML = 0}";
        }
      ?>
    </script>
  </body>
</html>