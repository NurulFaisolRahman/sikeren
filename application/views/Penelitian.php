<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
					<div class="col-sm-12 mt-2">
						<ul class="nav nav-pills mb-2 border border-warning rounded bg-light" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link <?php if($this->session->userdata('SubPenelitian') == 'Rencana'){echo 'active';} ?>" id="pills-Rencana-tab" data-toggle="pill" href="#pills-Rencana" role="tab" aria-controls="pills-Rencana" aria-selected="true"><b>Rencana</b></a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?php if($this->session->userdata('SubPenelitian') == 'Realisasi'){echo 'active';} ?>" id="pills-Realisasi-tab" data-toggle="pill" href="#pills-Realisasi" role="tab" aria-controls="pills-Realisasi" aria-selected="false"><b>Realisasi</b></a>
							</li>
						</ul>
						<div class="tab-content border border-warning rounded bg-light" id="pills-tabContent">
							<div class="tab-pane fade <?php if($this->session->userdata('SubPenelitian') == 'Rencana'){echo 'show active';} ?>" id="pills-Rencana" role="tabpanel" aria-labelledby="pills-Rencana-tab">
								<?php include 'RencanaPenelitian.php'; ?>
							</div>
							<div class="tab-pane fade <?php if($this->session->userdata('SubPenelitian') == 'Realisasi'){echo 'show active';} ?>" id="pills-Realisasi" role="tabpanel" aria-labelledby="pills-Realisasi-tab">
								<?php include 'RealisasiPenelitian.php'; ?>
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
					var Data = {SubPenelitian: 'Rencana'}
					$.post(BaseURL+"Dashboard/SubPenelitian", Data)
				})

				$("#pills-Realisasi-tab").click(function() {
					var Data = {SubPenelitian: 'Realisasi'}
					$.post(BaseURL+"Dashboard/SubPenelitian", Data)
				})

				$(document).on("click",".EditRencanaPenelitian",function(){
          <?php $Kredit = array(40,20,15,10,40,30,20,25,25,20,15,10,10,20,15,10,7,30,25,15,10,10,5,5,3,10,5,1,2,15,10,60,50,40,30,20,15); ?>
					var Data = $(this).attr('EditRencanaPenelitian')
					var Pisah = Data.split("/")
					$("#NoEditRencana").val(Pisah[0])
					$("#EditJenjangRencanaPenelitian").val(Pisah[2])
					$("#JenjangLama").val(Pisah[2])
					$("#EditSemesterRencanaPenelitian").val(Pisah[3])
					$("#SemesterLama").val(Pisah[3])
					$("#EditTahunRencanaPenelitian").val(Pisah[4])
					$("#TahunLama").val(Pisah[4])
					var PisahKode = Pisah[5].split("|")
          <?php 
            for ($i = 1; $i <= 37 ; $i++) {
              echo "if (PisahKode[".($i-1)."] == '1') {\n";
              echo "$('#EditRencanaPNL".$i."').attr('checked', true)\n";	
              echo "$('#EditRencanaKreditPNL".$i."').html(".$Kredit[$i-1].")\n}\n";
            } 
          ?>
					$("#EditRencanaTotalKredit").html(Pisah[6])
					$("#TargetKajur").val(Pisah[7])
					$('#ModalEditRencanaPenelitian').modal("show");
				})

				$("#TombolEditRencanaTotalKredit").click(function() {
					<?php 
            $TotalEditRencana = "document.getElementById('EditRencanaTotalKredit').innerHTML = ";
            for ($i = 1; $i <= 37 ; $i++) {
              echo "var EditRencanaPNL".$i." = parseInt(document.getElementById('EditRencanaKreditPNL".$i."').innerHTML)\n";
              if ($i == 37) {
                $TotalEditRencana .= "EditRencanaPNL".$i;
              } else {
                $TotalEditRencana .= "EditRencanaPNL".$i."+";
              }
            }            
            echo $TotalEditRencana;
          ?>
				})
				
				$("#SimpanEditRencanaPenelitian").click(function() {
          <?php 
            $EditTotalKreditRencana = "var EditTotalKreditRencana = ";
            $EditKodeRencana = "var EditKodeRencana = ''+";
            for ($i = 1; $i <= 37 ; $i++) {
              echo "var EditRencanaPNL".$i." = parseInt(document.getElementById('EditRencanaKreditPNL".$i."').innerHTML)\n";
              if ($i == 37) {
                $EditTotalKreditRencana .= "EditRencanaPNL".$i;
                $EditKodeRencana .= "(document.getElementById('EditRencanaPNL".$i."').checked ? 1 : 0)\n";
              } else {
                $EditTotalKreditRencana .= "EditRencanaPNL".$i."+";
                $EditKodeRencana .= "(document.getElementById('EditRencanaPNL".$i."').checked ? 1 : 0)+'|'+";
              }
            }            
            echo $EditTotalKreditRencana."\n";
            echo $EditKodeRencana;
          ?>
					var EditDataRencanaPenelitian = {No:$("#NoEditRencana").val(),Jenjang:$("#EditJenjangRencanaPenelitian").val(),Semester:$("#EditSemesterRencanaPenelitian").val(),
																			 Tahun:$("#EditTahunRencanaPenelitian").val(),Kode:EditKodeRencana,Total:EditTotalKreditRencana}
					if (EditTotalKreditRencana < $('#TargetKajur').val()) {
						alert('Belum Memenuhi Target Kajur Yaitu '+$('#TargetKajur').val())
					} 
					else {
						$.post(BaseURL+"Penelitian/EditRencana", EditDataRencanaPenelitian).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + "Dashboard/Penelitian"
							} else {
								alert(Respon)
							}
						})
					}
				})

				$("#LihatRealisasi").click(function() {
					var Data = {ID: $("#IdKegiatanPenelitian").val()}
					$.post(BaseURL+"Dashboard/LihatRealisasiPenelitian", Data).done(function(Respon) {
						window.location = BaseURL + "Dashboard/Penelitian"
					})
				})

				$("#Point2").change(function (){
          if ($("#Point2").val() == 11) {
						document.getElementById("JenisPNL2").style.display = 'block'
					} else {
						document.getElementById("JenisPNL2").style.display = 'none'
					}
        })

				function Tambah() {
					var PNL15 = [[2, 3, 6],
										   [0.5, 1, 2], 
									     [0.3, 0.5, 1]];
					var fd = new FormData()
					fd.append("file", $('#Bukti')[0].files[0])
					fd.append('Homebase',$("#JenisRealisasi").val())
					fd.append('Semester',$("#SemesterRealisasi").val())
					fd.append('Tahun',$("#TahunRealisasi").val())
					fd.append('IdKegiatan',$("#InputIdKegiatanPenelitian").val())
					fd.append('Ke',$("#Ke").val())		
					fd.append('Dari',$("#Dari").val())		
					fd.append('Penulis',$("#Ke").val()+'/'+$("#Dari").val())		
					fd.append('SK',$("#SK").val())
					fd.append('Kegiatan',$("#Uraian").val())		
					fd.append('Volume',parseInt($("#Volume").val()))
					fd.append('TanggalKegiatan',$("#TanggalKegiatan").val())	
					if ($("#InputIdKegiatanPenelitian").val() == 'PNL1') {
						fd.append('Kode',$("#Point1").val())
						fd.append('Biaya',$("#SumberPembiayaan").val())
					}
					else if ($("#InputIdKegiatanPenelitian").val() == 'PNL2') {
						if ($("#Point2").val() == 11) {
							if ($("#TingkatPNL2").val() == 2) {
								fd.append('Kode',12)		
							} else if ($("#TingkatPNL2").val() == 3) {
								fd.append('Kode',13)		
							} else {
								fd.append('Kode',$("#Point2").val())		
							}
						} else {
							fd.append('Kode',$("#Point2").val())		
						}			
						fd.append('Biaya',$("#SumberPembiayaan").val())
					}
					else if ($("#InputIdKegiatanPenelitian").val() == 'PNL3') {
						fd.append('Kode',0)				
						fd.append('Biaya',$("#SumberPembiayaan").val())
					}
					else if ($("#InputIdKegiatanPenelitian").val() == 'PNL6') {
						fd.append('Kode',$("#Point6").val())
						fd.append('Biaya',$("#SumberPembiayaan").val())
					}
					else if ($("#InputIdKegiatanPenelitian").val() == 'PNL7') {
						fd.append('Kode',$("#Point7").val())
						fd.append('Biaya',$("#SumberPembiayaan").val())
					}
					else if ($("#InputIdKegiatanPenelitian").val() == 'PNL8') {
						fd.append('Kode',$("#Point8").val())
						fd.append('Biaya',$("#SumberPembiayaan").val())
					}
					else if ($("#InputIdKegiatanPenelitian").val() == 'PNL9') {
						if ($("#SebagaiPNL9").val() == 1) {
							fd.append('KreditBKD',$("#ProgresPNL9").val()*2)
						} else {
							fd.append('KreditBKD',$("#ProgresPNL9").val())
						}
						fd.append('Kode','0')
						fd.append('Biaya',$("#SumberPembiayaan").val())
					}
					else if ($("#InputIdKegiatanPenelitian").val() == 'PNL10') {
						fd.append('KreditBKD',$("#ProgresPNL10").val()*4)
						fd.append('Kode','0')
						fd.append('Biaya',$("#SumberPembiayaan").val())
					}
					else if ($("#InputIdKegiatanPenelitian").val() == 'PNL11') {
						if ($("#JenisPNL11").val() == '1') {
							fd.append('KreditBKD',$("#ProgresPNL11").val()*3)	
						} else {
							fd.append('KreditBKD',$("#ProgresPNL11").val()*$("#JenisPNL11").val())
						}
						fd.append('Kode','0')
						fd.append('Biaya',$("#SumberPembiayaan").val())
					}
					else if ($("#InputIdKegiatanPenelitian").val() == 'PNL12') {
						if ($("#JenisPNL11").val() == '1') {
							fd.append('KreditBKD',$("#ProgresPNL11").val()*5)	
						} else {
							fd.append('KreditBKD',$("#ProgresPNL11").val()*$("#JenisPNL11").val())
						}
						fd.append('Kode','0')
						fd.append('Biaya',$("#SumberPembiayaan").val())
					}
					else if ($("#InputIdKegiatanPenelitian").val() == 'PNL14') {
						fd.append('KreditBKD',$("#ProgresPNL14").val()*$("#JenisPNL14").val())
						fd.append('Kode',$("#JenisPNL14").val())
						fd.append('Biaya',$("#SumberPembiayaan").val())
					}
					else if ($("#InputIdKegiatanPenelitian").val() == 'PNL15') {
						fd.append('KreditBKD',(PNL15[$("#JenisPNL15").val()][$("#LingkupPNL15").val()]))
						if ($("#JenisPNL15").val() == 0) {
							if ($("#LingkupPNL15").val() == 0) {
								fd.append('Kode','1')
							} else if ($("#LingkupPNL15").val() == 1) {
								fd.append('Kode','2')
							} else {
								fd.append('Kode','3')	
							}
						} else {
							fd.append('Kode','0')	
						}
						fd.append('Biaya',$("#SumberPembiayaan").val())
					}
					else if ($("#InputIdKegiatanPenelitian").val() == 'PNL16') {
						fd.append('KreditBKD',$("#LingkupPNL16").val())
						fd.append('Kode','0')
						fd.append('Biaya',$("#SumberPembiayaan").val())
					}
					else if ($("#InputIdKegiatanPenelitian").val() == 'PNL17') {
						fd.append('KreditBKD',$("#ProgresPNL17").val()*$("#JenisPNL17").val())
						fd.append('Kode','0')
						fd.append('Biaya',$("#SumberPembiayaan").val())
					}
					else {
						fd.append('Kode','0')
						fd.append('Biaya','0')
					}
					$.ajax({
						url: BaseURL+'Penelitian/InputRealisasi',
						type: 'post',
						data: fd,
						contentType: false,
						processData: false,
						success: function(Respon){
							if (Respon == '1') {
								window.location = BaseURL + "Dashboard/Penelitian"
							}
							else {
								alert(Respon)
							}
						}
					});
				}

				$("#TambahRealisasiPenelitian").click(function() {
					if ($("#InputIdKegiatanPenelitian").val() != 'PNL13' && $("#InputIdKegiatanPenelitian").val() != 'PNL18' && $("#InputIdKegiatanPenelitian").val() != 'PNL19' && $("#InputIdKegiatanPenelitian").val() != 'PNL20' && $("#InputIdKegiatanPenelitian").val() != 'PNL21' && $("#InputIdKegiatanPenelitian").val() != 'PNL22') {
						if (isNaN(parseInt($("#Ke").val())) || isNaN(parseInt($("#Dari").val())) || parseInt($("#Ke").val()) > parseInt($("#Dari").val())) {
							alert('Input Penulis Belum Benar')
						} 
						else if (isNaN(parseInt($("#Volume").val()))) {
							alert('Volume Kegiatan Belum Benar!')
						}	
						else {
							Tambah()
						}
					}
					else if (isNaN(parseInt($("#Volume").val()))) {
						alert('Volume Kegiatan Belum Benar!')
					}
					else {
						Tambah()
					}
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
					$('#EditRealisasiPenelitian').modal("show")
				});

				$("#CancelBukti").click(function() {
					$("#EditBukti").val("")
				})

				$("#UpdateRealisasiPenelitian").click(function() {
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
						url: BaseURL+'Penelitian/EditRealisasi',
						type: 'post',
						data: fd,
						contentType: false,
						processData: false,
						success: function(Respon){
							if (Respon == '1') {
								window.location = BaseURL + "Dashboard/Penelitian"
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
						$.post(BaseURL+"Penelitian/HapusRealisasi", Hapus).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + "Dashboard/Penelitian"
							} else {
								alert(Respon)
							}
						});
					}
				});
			})

			function InputIdKegiatanPenelitian() {
				if ($("#InputIdKegiatanPenelitian").val() == 'PNL1') {
					document.getElementById("OpsiPNL1").style.display = 'block'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'block'
					document.getElementById("OpsiPNL2").style.display = 'none'
					document.getElementById("OpsiPNL6").style.display = 'none'
					document.getElementById("OpsiPNL7").style.display = 'none'
					document.getElementById("OpsiPNL8").style.display = 'none'
					document.getElementById("OpsiPNL9").style.display = 'none'
					document.getElementById("OpsiPNL10").style.display = 'none'
					document.getElementById("OpsiPNL11").style.display = 'none'
					document.getElementById("OpsiPNL14").style.display = 'none'
					document.getElementById("OpsiPNL15").style.display = 'none'
					document.getElementById("OpsiPNL16").style.display = 'none'
					document.getElementById("OpsiPNL17").style.display = 'none'
					document.getElementById("OpsiPenulis").style.display = 'block'
				} else if ($("#InputIdKegiatanPenelitian").val() == 'PNL2') {
					document.getElementById("OpsiPNL1").style.display = 'none'
					document.getElementById("OpsiPNL2").style.display = 'block'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'block'
					document.getElementById("OpsiPNL6").style.display = 'none'
					document.getElementById("OpsiPNL7").style.display = 'none'
					document.getElementById("OpsiPNL8").style.display = 'none'
					document.getElementById("OpsiPNL9").style.display = 'none'
					document.getElementById("OpsiPNL10").style.display = 'none'
					document.getElementById("OpsiPNL11").style.display = 'none'
					document.getElementById("OpsiPNL14").style.display = 'none'
					document.getElementById("OpsiPNL15").style.display = 'none'
					document.getElementById("OpsiPNL16").style.display = 'none'
					document.getElementById("OpsiPNL17").style.display = 'none'
					document.getElementById("OpsiPenulis").style.display = 'block'
				} else if ($("#InputIdKegiatanPenelitian").val() == 'PNL3') {
					document.getElementById("OpsiPNL1").style.display = 'none'
					document.getElementById("OpsiPNL2").style.display = 'none'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'block'
					document.getElementById("OpsiPNL6").style.display = 'none'
					document.getElementById("OpsiPNL7").style.display = 'none'
					document.getElementById("OpsiPNL8").style.display = 'none'
					document.getElementById("OpsiPNL9").style.display = 'none'
					document.getElementById("OpsiPNL10").style.display = 'none'
					document.getElementById("OpsiPNL11").style.display = 'none'
					document.getElementById("OpsiPNL14").style.display = 'none'
					document.getElementById("OpsiPNL15").style.display = 'none'
					document.getElementById("OpsiPNL16").style.display = 'none'
					document.getElementById("OpsiPNL17").style.display = 'none'
					document.getElementById("OpsiPenulis").style.display = 'block'
				} else if ($("#InputIdKegiatanPenelitian").val() == 'PNL4' || $("#InputIdKegiatanPenelitian").val() == 'PNL5') {
					document.getElementById("OpsiPNL1").style.display = 'none'
					document.getElementById("OpsiPNL2").style.display = 'none'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'none'
					document.getElementById("OpsiPNL6").style.display = 'none'
					document.getElementById("OpsiPNL7").style.display = 'none'
					document.getElementById("OpsiPNL8").style.display = 'none'
					document.getElementById("OpsiPNL9").style.display = 'none'
					document.getElementById("OpsiPNL10").style.display = 'none'
					document.getElementById("OpsiPNL11").style.display = 'none'
					document.getElementById("OpsiPNL14").style.display = 'none'
					document.getElementById("OpsiPNL15").style.display = 'none'
					document.getElementById("OpsiPNL16").style.display = 'none'
					document.getElementById("OpsiPNL17").style.display = 'none'
					document.getElementById("OpsiPenulis").style.display = 'block'
				} else if ($("#InputIdKegiatanPenelitian").val() == 'PNL6') {
					document.getElementById("OpsiPNL1").style.display = 'none'
					document.getElementById("OpsiPNL2").style.display = 'none'
					document.getElementById("OpsiPNL6").style.display = 'block'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'block'
					document.getElementById("OpsiPNL7").style.display = 'none'
					document.getElementById("OpsiPNL8").style.display = 'none'
					document.getElementById("OpsiPNL9").style.display = 'none'
					document.getElementById("OpsiPNL10").style.display = 'none'
					document.getElementById("OpsiPNL11").style.display = 'none'
					document.getElementById("OpsiPNL14").style.display = 'none'
					document.getElementById("OpsiPNL15").style.display = 'none'
					document.getElementById("OpsiPNL16").style.display = 'none'
					document.getElementById("OpsiPNL17").style.display = 'none'
					document.getElementById("OpsiPenulis").style.display = 'block'
				} else if ($("#InputIdKegiatanPenelitian").val() == 'PNL7') {
					document.getElementById("OpsiPNL1").style.display = 'none'
					document.getElementById("OpsiPNL2").style.display = 'none'
					document.getElementById("OpsiPNL6").style.display = 'none'
					document.getElementById("OpsiPNL7").style.display = 'block'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'block'
					document.getElementById("OpsiPNL8").style.display = 'none'
					document.getElementById("OpsiPNL9").style.display = 'none'
					document.getElementById("OpsiPNL10").style.display = 'none'
					document.getElementById("OpsiPNL11").style.display = 'none'
					document.getElementById("OpsiPNL14").style.display = 'none'
					document.getElementById("OpsiPNL15").style.display = 'none'
					document.getElementById("OpsiPNL16").style.display = 'none'
					document.getElementById("OpsiPNL17").style.display = 'none'
					document.getElementById("OpsiPenulis").style.display = 'block'
				} else if ($("#InputIdKegiatanPenelitian").val() == 'PNL8') {
					document.getElementById("OpsiPNL1").style.display = 'none'
					document.getElementById("OpsiPNL2").style.display = 'none'
					document.getElementById("OpsiPNL6").style.display = 'none'
					document.getElementById("OpsiPNL7").style.display = 'none'
					document.getElementById("OpsiPNL8").style.display = 'block'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'block'
					document.getElementById("OpsiPNL9").style.display = 'none'
					document.getElementById("OpsiPNL10").style.display = 'none'
					document.getElementById("OpsiPNL11").style.display = 'none'
					document.getElementById("OpsiPNL14").style.display = 'none'
					document.getElementById("OpsiPNL15").style.display = 'none'
					document.getElementById("OpsiPNL16").style.display = 'none'
					document.getElementById("OpsiPNL17").style.display = 'none'
					document.getElementById("OpsiPenulis").style.display = 'block'
				} else if ($("#InputIdKegiatanPenelitian").val() == 'PNL9') {
					document.getElementById("OpsiPNL1").style.display = 'none'
					document.getElementById("OpsiPNL2").style.display = 'none'
					document.getElementById("OpsiPNL6").style.display = 'none'
					document.getElementById("OpsiPNL7").style.display = 'none'
					document.getElementById("OpsiPNL8").style.display = 'none'
					document.getElementById("OpsiPNL9").style.display = 'block'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'block'
					document.getElementById("OpsiPNL10").style.display = 'none'
					document.getElementById("OpsiPNL11").style.display = 'none'
					document.getElementById("OpsiPNL14").style.display = 'none'
					document.getElementById("OpsiPNL15").style.display = 'none'
					document.getElementById("OpsiPNL16").style.display = 'none'
					document.getElementById("OpsiPNL17").style.display = 'none'
					document.getElementById("OpsiPenulis").style.display = 'block'
				} else if ($("#InputIdKegiatanPenelitian").val() == 'PNL10') {
					document.getElementById("OpsiPNL1").style.display = 'none'
					document.getElementById("OpsiPNL2").style.display = 'none'
					document.getElementById("OpsiPNL6").style.display = 'none'
					document.getElementById("OpsiPNL7").style.display = 'none'
					document.getElementById("OpsiPNL8").style.display = 'none'
					document.getElementById("OpsiPNL9").style.display = 'none'
					document.getElementById("OpsiPNL10").style.display = 'block'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'block'
					document.getElementById("OpsiPNL11").style.display = 'none'
					document.getElementById("OpsiPNL14").style.display = 'none'
					document.getElementById("OpsiPNL15").style.display = 'none'
					document.getElementById("OpsiPNL16").style.display = 'none'
					document.getElementById("OpsiPNL17").style.display = 'none'
					document.getElementById("OpsiPenulis").style.display = 'block'
				} else if ($("#InputIdKegiatanPenelitian").val() == 'PNL11' || $("#InputIdKegiatanPenelitian").val() == 'PNL12') {
					document.getElementById("OpsiPNL1").style.display = 'none'
					document.getElementById("OpsiPNL2").style.display = 'none'
					document.getElementById("OpsiPNL6").style.display = 'none'
					document.getElementById("OpsiPNL7").style.display = 'none'
					document.getElementById("OpsiPNL8").style.display = 'none'
					document.getElementById("OpsiPNL9").style.display = 'none'
					document.getElementById("OpsiPNL10").style.display = 'none'
					document.getElementById("OpsiPNL11").style.display = 'block'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'block'
					document.getElementById("OpsiPNL14").style.display = 'none'
					document.getElementById("OpsiPNL15").style.display = 'none'
					document.getElementById("OpsiPNL16").style.display = 'none'
					document.getElementById("OpsiPNL17").style.display = 'none'
					document.getElementById("OpsiPenulis").style.display = 'block'
				} else if ($("#InputIdKegiatanPenelitian").val() == 'PNL13') {
					document.getElementById("OpsiPNL1").style.display = 'none'
					document.getElementById("OpsiPNL2").style.display = 'none'
					document.getElementById("OpsiPNL6").style.display = 'none'
					document.getElementById("OpsiPNL7").style.display = 'none'
					document.getElementById("OpsiPNL8").style.display = 'none'
					document.getElementById("OpsiPNL9").style.display = 'none'
					document.getElementById("OpsiPNL10").style.display = 'none'
					document.getElementById("OpsiPNL11").style.display = 'none'
					document.getElementById("OpsiPNL14").style.display = 'none'
					document.getElementById("OpsiPNL15").style.display = 'none'
					document.getElementById("OpsiPNL16").style.display = 'none'
					document.getElementById("OpsiPNL17").style.display = 'none'
					document.getElementById("OpsiPenulis").style.display = 'none'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'none'
				} else if ($("#InputIdKegiatanPenelitian").val() == 'PNL14') {
					document.getElementById("OpsiPNL1").style.display = 'none'
					document.getElementById("OpsiPNL2").style.display = 'none'
					document.getElementById("OpsiPNL6").style.display = 'none'
					document.getElementById("OpsiPNL7").style.display = 'none'
					document.getElementById("OpsiPNL8").style.display = 'none'
					document.getElementById("OpsiPNL9").style.display = 'none'
					document.getElementById("OpsiPNL10").style.display = 'none'
					document.getElementById("OpsiPNL11").style.display = 'none'
					document.getElementById("OpsiPNL14").style.display = 'block'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'block'
					document.getElementById("OpsiPNL15").style.display = 'none'
					document.getElementById("OpsiPNL16").style.display = 'none'
					document.getElementById("OpsiPNL17").style.display = 'none'
					document.getElementById("OpsiPenulis").style.display = 'block'
				} else if ($("#InputIdKegiatanPenelitian").val() == 'PNL15') {
					document.getElementById("OpsiPNL1").style.display = 'none'
					document.getElementById("OpsiPNL2").style.display = 'none'
					document.getElementById("OpsiPNL6").style.display = 'none'
					document.getElementById("OpsiPNL7").style.display = 'none'
					document.getElementById("OpsiPNL8").style.display = 'none'
					document.getElementById("OpsiPNL9").style.display = 'none'
					document.getElementById("OpsiPNL10").style.display = 'none'
					document.getElementById("OpsiPNL11").style.display = 'none'
					document.getElementById("OpsiPNL14").style.display = 'none'
					document.getElementById("OpsiPNL15").style.display = 'block'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'block'
					document.getElementById("OpsiPNL16").style.display = 'none'
					document.getElementById("OpsiPNL17").style.display = 'none'
					document.getElementById("OpsiPenulis").style.display = 'block'
				} else if ($("#InputIdKegiatanPenelitian").val() == 'PNL16') {
					document.getElementById("OpsiPNL1").style.display = 'none'
					document.getElementById("OpsiPNL2").style.display = 'none'
					document.getElementById("OpsiPNL6").style.display = 'none'
					document.getElementById("OpsiPNL7").style.display = 'none'
					document.getElementById("OpsiPNL8").style.display = 'none'
					document.getElementById("OpsiPNL9").style.display = 'none'
					document.getElementById("OpsiPNL10").style.display = 'none'
					document.getElementById("OpsiPNL11").style.display = 'none'
					document.getElementById("OpsiPNL14").style.display = 'none'
					document.getElementById("OpsiPNL15").style.display = 'none'
					document.getElementById("OpsiPNL16").style.display = 'block'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'block'
					document.getElementById("OpsiPNL17").style.display = 'none'
					document.getElementById("OpsiPenulis").style.display = 'block'
				} else if ($("#InputIdKegiatanPenelitian").val() == 'PNL17') {
					document.getElementById("OpsiPNL1").style.display = 'none'
					document.getElementById("OpsiPNL2").style.display = 'none'
					document.getElementById("OpsiPNL6").style.display = 'none'
					document.getElementById("OpsiPNL7").style.display = 'none'
					document.getElementById("OpsiPNL8").style.display = 'none'
					document.getElementById("OpsiPNL9").style.display = 'none'
					document.getElementById("OpsiPNL10").style.display = 'none'
					document.getElementById("OpsiPNL11").style.display = 'none'
					document.getElementById("OpsiPNL14").style.display = 'none'
					document.getElementById("OpsiPNL15").style.display = 'none'
					document.getElementById("OpsiPNL16").style.display = 'none'
					document.getElementById("OpsiPNL17").style.display = 'block'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'block'
					document.getElementById("OpsiPenulis").style.display = 'block'
				} else if ($("#InputIdKegiatanPenelitian").val() == 'PNL18' || $("#InputIdKegiatanPenelitian").val() == 'PNL19' || $("#InputIdKegiatanPenelitian").val() == 'PNL20' || $("#InputIdKegiatanPenelitian").val() == 'PNL21' || $("#InputIdKegiatanPenelitian").val() == 'PNL22') {
					document.getElementById("OpsiPNL1").style.display = 'none'
					document.getElementById("OpsiPNL2").style.display = 'none'
					document.getElementById("OpsiPNL6").style.display = 'none'
					document.getElementById("OpsiPNL7").style.display = 'none'
					document.getElementById("OpsiPNL8").style.display = 'none'
					document.getElementById("OpsiPNL9").style.display = 'none'
					document.getElementById("OpsiPNL10").style.display = 'none'
					document.getElementById("OpsiPNL11").style.display = 'none'
					document.getElementById("OpsiPNL14").style.display = 'none'
					document.getElementById("OpsiPNL15").style.display = 'none'
					document.getElementById("OpsiPNL16").style.display = 'none'
					document.getElementById("OpsiPNL17").style.display = 'none'
					document.getElementById("OpsiPenulis").style.display = 'none'
					document.getElementById("OpsiSumberPembiayaan").style.display = 'none'
				} 
			}

      <?php 
        $Kredit = array(40,20,15,10,40,30,20,25,25,20,15,10,10,20,15,10,20,30,25,15,10,10,5,5,3,10,5,1,2,15,10,60,50,40,30,20,15);
        for ($i = 1; $i <= 37 ; $i++) {
          echo "function EditRencanaPNL".$i."() {document.getElementById('EditRencanaPNL".$i."').checked? document.getElementById('EditRencanaKreditPNL".$i."').innerHTML = ".$Kredit[$i-1]." : document.getElementById('EditRencanaKreditPNL".$i."').innerHTML = 0}";
        }
      ?>
    </script>
  </body>
</html>