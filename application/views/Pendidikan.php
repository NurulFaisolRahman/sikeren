<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
					<div class="col-sm-12 mt-2">
						<ul class="nav nav-pills mb-2 border border-warning rounded bg-light" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link <?php if($this->session->userdata('SubPendidikan') == 'Rencana'){echo 'active';} ?>" id="pills-Rencana-tab" data-toggle="pill" href="#pills-Rencana" role="tab" aria-controls="pills-Rencana" aria-selected="true"><b>Rencana</b></a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?php if($this->session->userdata('SubPendidikan') == 'Realisasi'){echo 'active';} ?>" id="pills-Realisasi-tab" data-toggle="pill" href="#pills-Realisasi" role="tab" aria-controls="pills-Realisasi" aria-selected="false"><b>Realisasi</b></a>
							</li>
						</ul>
						<div class="tab-content border border-warning rounded bg-light" id="pills-tabContent">
							<div class="tab-pane fade <?php if($this->session->userdata('SubPendidikan') == 'Rencana'){echo 'show active';} ?>" id="pills-Rencana" role="tabpanel" aria-labelledby="pills-Rencana-tab">
								<?php include 'RencanaPendidikan.php'; ?>
							</div>
							<div class="tab-pane fade <?php if($this->session->userdata('SubPendidikan') == 'Realisasi'){echo 'show active';} ?>" id="pills-Realisasi" role="tabpanel" aria-labelledby="pills-Realisasi-tab">
								<?php include 'RealisasiPendidikan.php'; ?>
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
			var EditJabatanRencanaPendidikan = ''
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
				});

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
				});

				$('[data-mask]').inputmask()

				$("#pills-Rencana-tab").click(function() {
					var Data = {SubPendidikan: 'Rencana'}
					$.post(BaseURL+"Dashboard/SubPendidikan", Data)
				})

				$("#pills-Realisasi-tab").click(function() {
					var Data = {SubPendidikan: 'Realisasi'}
					$.post(BaseURL+"Dashboard/SubPendidikan", Data)
				})

				$(document).on("click",".EditRencanaPendidikan",function(){
					var Data = $(this).attr('EditRencanaPendidikan')
					var Pisah = Data.split("/")
					$("#NoEditRencana").val(Pisah[0])
					$("#EditJenjangRencanaPendidikan").val(Pisah[2])
					$("#JenjangLama").val(Pisah[2])
					$("#EditSemesterRencanaPendidikan").val(Pisah[3])
					$("#SemesterLama").val(Pisah[3])
					$("#EditTahunRencanaPendidikan").val(Pisah[4])
					$("#TahunLama").val(Pisah[4])
					var PisahKode = Pisah[5].split("|")
					if (PisahKode[0] == '1') {
						$('#EditDoktor').attr('checked', true)	
						$("#EditKreditSekolah").html(200)
					} else if (PisahKode[0] == '2') {
						$('#EditMagister').attr('checked', true)
						$("#EditKreditSekolah").html(150)
					}
					if (PisahKode[1] == '1') {
						$('#EditDiklat').attr('checked', true)	
						$("#EditKreditDiklat").html(3)
					}
					$('#EditMengajar').val(PisahKode[2])
					EditJabatanRencanaPendidikan = Pisah[1]
					if (Pisah[1] != "Asisten Ahli") {
						if (PisahKode[2] > 10) {
							$("#EditKreditMengajar").html(10+((PisahKode[2]-10)*0.5))
						} else {
							$("#EditKreditMengajar").html(PisahKode[2])
						}	
					} else {
						if (PisahKode[2] > 10) {
							$("#EditKreditMengajar").html(5+((PisahKode[2]-10)*0.25))
						} else {
							$("#EditKreditMengajar").html(PisahKode[2]*0.5)
						}	
					}
					if (PisahKode[3] == '1') {
						$('#EditBimbingSeminar').attr('checked', true)	
						$("#EditKreditBimbingSeminar").html(1)
					}
					if (PisahKode[4] == '1') {
						$('#EditBimbingKKN').attr('checked', true)	
						$("#EditKreditBimbingKKN").html(1)
					}
					$("#EditDisertasiUtama").val(PisahKode[5])
					$("#EditKreditDisertasiUtama").html(PisahKode[5]*2)
					$("#EditTesisUtama").val(PisahKode[6])
					$("#EditKreditTesisUtama").html(PisahKode[6]*0.5)
					$("#EditSkripsiUtama").val(PisahKode[7])
					$("#EditKreditSkripsiUtama").html(PisahKode[7]*0.125)
					$("#EditDisertasiPendamping").val(PisahKode[8])
					$("#EditKreditDisertasiPendamping").html(PisahKode[8]*1.5)
					$("#EditTesisPendamping").val(PisahKode[9])
					$("#EditKreditTesisPendamping").html((PisahKode[9]*2/6).toFixed(2))
					$("#EditSkripsiPendamping").val(PisahKode[10])
					$("#EditKreditSkripsiPendamping").html(PisahKode[10]*0.0625)					
					$("#EditPengujiUtama").val(PisahKode[11])
					$("#EditKreditPengujiUtama").html(PisahKode[11]*0.25)
					$("#EditAnggotaPenguji").val(PisahKode[12])
					$("#EditKreditAnggotaPenguji").html(PisahKode[12]*0.0625)
					$("#EditMembinaKegiatan").val(PisahKode[13])
					$("#EditKreditMembinaKegiatan").html(PisahKode[13])
					$("#EditMengembangkanProgram").val(PisahKode[14])
					$("#EditKreditMengembangkanProgram").html(PisahKode[14]*2)
					$("#EditBukuAjar").val(PisahKode[15])
					$("#EditKreditBukuAjar").html(PisahKode[15]*20)
					$("#EditProdukPengajaran").val(PisahKode[16])
					$("#EditKreditProdukPengajaran").html(PisahKode[16]*5)
					$("#EditOrasi").val(PisahKode[17])
					$("#EditKreditOrasi").html(PisahKode[17]*2.5)
					if (Pisah[1] == "Lektor Kepala" || Pisah[1] == "Profesor") {
						$("#EditPembimbingPencangkokan").val(PisahKode[18])
						$("#EditKreditPembimbingPencangkokan").html(PisahKode[18]*2)
						$("#EditPembimbingReguler").val(PisahKode[19])
						$("#EditKreditPembimbingReguler").html(PisahKode[19])
						$("#EditDetasering").val(PisahKode[20])
						$("#EditKreditDetasering").html(PisahKode[20]*5)
						$("#EditPencangkokan").val(PisahKode[21])
						$("#EditKreditPencangkokan").html(PisahKode[24]*4)
					} 
					if (PisahKode[22] == '1') {
						$('#EditRektor').attr('checked', true)	
						$("#EditKreditRektor").html(6)
					}
					else if (PisahKode[23] == '1') {
						$('#EditWakilRektor').attr('checked', true)	
						$("#EditKreditWakilRektor").html(5)
					}
					else if (PisahKode[24] == '1') {
						$('#EditKetua').attr('checked', true)	
						$("#EditKreditKetua").html(4)
					}
					else if (PisahKode[25] == '1') {
						$('#EditPembantuKetua').attr('checked', true)	
						$("#EditKreditPembantuKetua").html(4)
					}
					else if (PisahKode[26] == '1') {
						$('#EditDirekturAkademi').attr('checked', true)	
						$("#EditKreditDirekturAkademi").html(4)
					}
					else if (PisahKode[27] == '1') {
						$('#EditPembantuDirekturPoliteknik').attr('checked', true)	
						$("#EditKreditPembantuDirekturPoliteknik").html(3)
					}
					else if (PisahKode[28] == '1') {
						$('#EditPembantuDirekturAkademi').attr('checked', true)	
						$("#EditKreditPembantuDirekturAkademi").html(3)
					}
					else if (PisahKode[29] == '1') {
						$('#EditSekretaris').attr('checked', true)	
						$("#EditKreditSekretaris").html(3)
					}
					$("#EditPengembangan960").val(PisahKode[30])
					$("#EditKreditPengembangan960").html(PisahKode[30]*15)
					$("#EditPengembangan641").val(PisahKode[31])
					$("#EditKreditPengembangan641").html(PisahKode[31]*9)
					$("#EditPengembangan481").val(PisahKode[32])
					$("#EditKreditPengembangan481").html(PisahKode[32]*6)
					$("#EditPengembangan161").val(PisahKode[33])
					$("#EditKreditPengembangan161").html(PisahKode[33]*3)
					$("#EditPengembangan81").val(PisahKode[34])
					$("#EditKreditPengembangan81").html(PisahKode[34]*2)
					$("#EditPengembangan30").val(PisahKode[35])
					$("#EditKreditPengembangan30").html(PisahKode[35]*1)					
					$("#EditPengembangan10").val(PisahKode[36])
					$("#EditKreditPengembangan10").html(PisahKode[36]*0.5)
					$("#EditRencanaTotalKredit").html(Pisah[6])
					$("#TargetKajur").val(Pisah[7])
					$('#ModalEditRencanaPendidikan').modal("show");
				});

				$('#SimpanEditRencanaPendidikan').click(function() {
					var EditSekolah = parseFloat(document.getElementById('EditKreditSekolah').innerHTML)
					var EditDiklat = parseFloat(document.getElementById('EditKreditDiklat').innerHTML)
					var EditMengajar = parseFloat(document.getElementById('EditKreditMengajar').innerHTML)
					var EditBimbingSeminar = parseFloat(document.getElementById('EditKreditBimbingSeminar').innerHTML)
					var EditBimbingKKN = parseFloat(document.getElementById('EditKreditBimbingKKN').innerHTML)
					var EditDisertasiUtama = parseFloat(document.getElementById('EditKreditDisertasiUtama').innerHTML)
					var EditTesisUtama = parseFloat(document.getElementById('EditKreditTesisUtama').innerHTML)
					var EditSkripsiUtama = parseFloat(document.getElementById('EditKreditSkripsiUtama').innerHTML)
					var EditDisertasiPendamping = parseFloat(document.getElementById('EditKreditDisertasiPendamping').innerHTML)
					var EditTesisPendamping = parseFloat(document.getElementById('EditKreditTesisPendamping').innerHTML)
					var EditSkripsiPendamping = parseFloat(document.getElementById('EditKreditSkripsiPendamping').innerHTML)
					var EditPengujiUtama = parseFloat(document.getElementById('EditKreditPengujiUtama').innerHTML)
					var EditAnggotaPenguji = parseFloat(document.getElementById('EditKreditAnggotaPenguji').innerHTML)
					var EditMembinaKegiatan = parseFloat(document.getElementById('EditKreditMembinaKegiatan').innerHTML)
					var EditMengembangkanProgram = parseFloat(document.getElementById('EditKreditMengembangkanProgram').innerHTML)
					var EditBukuAjar = parseFloat(document.getElementById('EditKreditBukuAjar').innerHTML)
					var EditProdukPengajaran = parseFloat(document.getElementById('EditKreditProdukPengajaran').innerHTML)
					var EditOrasi = parseFloat(document.getElementById('EditKreditOrasi').innerHTML)
					var EditRektor = parseFloat(document.getElementById('EditKreditRektor').innerHTML)
					var EditWakilRektor = parseFloat(document.getElementById('EditKreditWakilRektor').innerHTML)
					var EditKetua = parseFloat(document.getElementById('EditKreditKetua').innerHTML)
					var EditPembantuKetua = parseFloat(document.getElementById('EditKreditPembantuKetua').innerHTML)
					var EditDirekturAkademi = parseFloat(document.getElementById('EditKreditDirekturAkademi').innerHTML)
					var EditPembantuDirekturPoliteknik = parseFloat(document.getElementById('EditKreditPembantuDirekturPoliteknik').innerHTML)
					var EditPembantuDirekturAkademi = parseFloat(document.getElementById('EditKreditPembantuDirekturAkademi').innerHTML)
					var EditSekretaris = parseFloat(document.getElementById('EditKreditSekretaris').innerHTML)
					var EditPembimbingPencangkokan = 0
					var EditPembimbingReguler = 0
					var EditDetasering = 0
					var EditPencangkokan = 0
					var EditCekJabatan = document.getElementById('EditKreditPembimbingPencangkokan')
					if (EditCekJabatan) {
						EditPembimbingPencangkokan = parseFloat(document.getElementById('EditKreditPembimbingPencangkokan').innerHTML)
						EditPembimbingReguler = parseFloat(document.getElementById('EditKreditPembimbingReguler').innerHTML)
						EditDetasering = parseFloat(document.getElementById('EditKreditDetasering').innerHTML)
						EditPencangkokan = parseFloat(document.getElementById('EditKreditPencangkokan').innerHTML)	
					}
					var EditPengembangan960 = parseFloat(document.getElementById('EditKreditPengembangan960').innerHTML)
					var EditPengembangan641 = parseFloat(document.getElementById('EditKreditPengembangan641').innerHTML)
					var EditPengembangan481 = parseFloat(document.getElementById('EditKreditPengembangan481').innerHTML)
					var EditPengembangan161 = parseFloat(document.getElementById('EditKreditPengembangan161').innerHTML)
					var EditPengembangan81 = parseFloat(document.getElementById('EditKreditPengembangan81').innerHTML)
					var EditPengembangan30 = parseFloat(document.getElementById('EditKreditPengembangan30').innerHTML)
					var EditPengembangan10 = parseFloat(document.getElementById('EditKreditPengembangan10').innerHTML)
					var EditTotalKreditRencana = EditSekolah + EditDiklat + EditMengajar + EditBimbingSeminar + EditBimbingKKN + EditDisertasiUtama + EditTesisUtama + EditSkripsiUtama + EditDisertasiPendamping + EditTesisPendamping + EditSkripsiPendamping + EditPengujiUtama + EditAnggotaPenguji + EditMembinaKegiatan + EditMengembangkanProgram + EditBukuAjar + EditProdukPengajaran + EditOrasi + EditRektor + EditWakilRektor + EditKetua + EditPembantuKetua + EditDirekturAkademi + EditPembantuDirekturPoliteknik + EditPembantuDirekturAkademi + EditSekretaris + EditPembimbingPencangkokan + EditPembimbingReguler + EditDetasering + EditPencangkokan + EditPengembangan960 + EditPengembangan641 + EditPengembangan481 + EditPengembangan161 + EditPengembangan81 + EditPengembangan30 + EditPengembangan10
					var EditKodeSekolah = 0
					var EditKodeDiklat = 0
					if (document.getElementById('EditDoktor').checked){
						var EditKodeSekolah = 1
					} 
					if (document.getElementById('EditMagister').checked){
						var EditKodeSekolah = 2
					}
					if (document.getElementById('EditDiklat').checked){
						var EditKodeDiklat = 1
					}
					var EditKodeRencana = ''+EditKodeSekolah+'|'+EditKodeDiklat+'|'+($('#EditMengajar').val() == ''? 0 : parseInt($('#EditMengajar').val()))
														+'|'+(document.getElementById('EditBimbingSeminar').checked ? 1 : 0)
														+'|'+(document.getElementById('EditBimbingKKN').checked ? 1 : 0)
														+'|'+($('#EditDisertasiUtama').val() == ''? 0 : parseInt($('#EditDisertasiUtama').val()))
														+'|'+($('#EditTesisUtama').val() == ''? 0 : parseInt($('#EditTesisUtama').val()))
														+'|'+($('#EditSkripsiUtama').val() == ''? 0 : parseInt($('#EditSkripsiUtama').val()))
														+'|'+($('#EditDisertasiPendamping').val() == ''? 0 : parseInt($('#EditDisertasiPendamping').val()))
														+'|'+($('#EditTesisPendamping').val() == ''? 0 : parseInt($('#EditTesisPendamping').val()))
														+'|'+($('#EditSkripsiPendamping').val() == ''? 0 : parseInt($('#EditSkripsiPendamping').val()))
														+'|'+($('#EditPengujiUtama').val() == ''? 0 : parseInt($('#EditPengujiUtama').val()))
														+'|'+($('#EditAnggotaPenguji').val() == ''? 0 : parseInt($('#EditAnggotaPenguji').val()))
														+'|'+($('#EditMembinaKegiatan').val() == ''? 0 : parseInt($('#EditMembinaKegiatan').val()))
														+'|'+($('#EditMengembangkanProgram').val() == ''? 0 : parseInt($('#EditMengembangkanProgram').val()))
														+'|'+($('#EditBukuAjar').val() == ''? 0 : parseInt($('#EditBukuAjar').val()))
														+'|'+($('#EditProdukPengajaran').val() == ''? 0 : parseInt($('#EditProdukPengajaran').val()))
														+'|'+($('#EditOrasi').val() == ''? 0 : parseInt($('#EditOrasi').val()))
					if (EditCekJabatan) {
						EditKodeRencana = EditKodeRencana+'|'+($('#EditPembimbingPencangkokan').val() == ''? 0 : parseInt($('#EditPembimbingPencangkokan').val()))
														+'|'+($('#EditPembimbingReguler').val() == ''? 0 : parseInt($('#EditPembimbingReguler').val()))
														+'|'+($('#EditDetasering').val() == ''? 0 : parseInt($('#EditDetasering').val()))
														+'|'+($('#EditPencangkokan').val() == ''? 0 : parseInt($('#EditPencangkokan').val()))
					}
					else {
						EditKodeRencana = EditKodeRencana+'|'+0+'|'+0+'|'+0+'|'+0
					}
					EditKodeRencana = EditKodeRencana +'|'+(document.getElementById('EditRektor').checked ? 1 : 0)
														+'|'+(document.getElementById('EditWakilRektor').checked ? 1 : 0)
														+'|'+(document.getElementById('EditKetua').checked ? 1 : 0)
														+'|'+(document.getElementById('EditPembantuKetua').checked ? 1 : 0)
														+'|'+(document.getElementById('EditDirekturAkademi').checked ? 1 : 0)
														+'|'+(document.getElementById('EditPembantuDirekturPoliteknik').checked ? 1 : 0)
														+'|'+(document.getElementById('EditPembantuDirekturAkademi').checked ? 1 : 0)
														+'|'+(document.getElementById('EditSekretaris').checked ? 1 : 0)
														+'|'+($('#EditPengembangan960').val() == ''? 0 : parseInt($('#EditPengembangan960').val()))
														+'|'+($('#EditPengembangan641').val() == ''? 0 : parseInt($('#EditPengembangan641').val()))
														+'|'+($('#EditPengembangan481').val() == ''? 0 : parseInt($('#EditPengembangan481').val()))
														+'|'+($('#EditPengembangan161').val() == ''? 0 : parseInt($('#EditPengembangan161').val()))
														+'|'+($('#EditPengembangan81').val() == ''? 0 : parseInt($('#EditPengembangan81').val()))
														+'|'+($('#EditPengembangan30').val() == ''? 0 : parseInt($('#EditPengembangan30').val()))
														+'|'+($('#EditPengembangan10').val() == ''? 0 : parseInt($('#EditPengembangan10').val()))
					var EditDataRencanaPendidikan = {No:$("#NoEditRencana").val(),Jenjang:$('#EditJenjangRencanaPendidikan').val(),Semester:$('#EditSemesterRencanaPendidikan').val(),
																			 Tahun:$('#EditTahunRencanaPendidikan').val(),Kode:EditKodeRencana,Total:EditTotalKreditRencana}
					if (EditTotalKreditRencana < $('#TargetKajur').val()) {
						alert('Belum Memenuhi Target Kajur Yaitu '+$('#TargetKajur').val())
					} 
					else {
						$.post(BaseURL+'Pendidikan/EditRencana', EditDataRencanaPendidikan).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + 'Dashboard/Pendidikan'
							} else {
								alert(Respon)
							}
						})
					}
				})

				$("#TombolEditRencanaTotalKredit").click(function() {
					var EditKreditSekolah = parseFloat(document.getElementById('EditKreditSekolah').innerHTML)
					var EditKreditDiklat = parseFloat(document.getElementById('EditKreditDiklat').innerHTML)
					var EditKreditMengajar = parseFloat(document.getElementById('EditKreditMengajar').innerHTML)
					var EditKreditBimbingSeminar = parseFloat(document.getElementById('EditKreditBimbingSeminar').innerHTML)
					var EditKreditBimbingKKN = parseFloat(document.getElementById('EditKreditBimbingKKN').innerHTML)
					var EditKreditDisertasiUtama = parseFloat(document.getElementById('EditKreditDisertasiUtama').innerHTML)
					var EditKreditTesisUtama = parseFloat(document.getElementById('EditKreditTesisUtama').innerHTML)
					var EditKreditSkripsiUtama = parseFloat(document.getElementById('EditKreditSkripsiUtama').innerHTML)
					var EditKreditDisertasiPendamping = parseFloat(document.getElementById('EditKreditDisertasiPendamping').innerHTML)
					var EditKreditTesisPendamping = parseFloat(document.getElementById('EditKreditTesisPendamping').innerHTML)
					var EditKreditSkripsiPendamping = parseFloat(document.getElementById('EditKreditSkripsiPendamping').innerHTML)
					var EditKreditPengujiUtama = parseFloat(document.getElementById('EditKreditPengujiUtama').innerHTML)
					var EditKreditAnggotaPenguji = parseFloat(document.getElementById('EditKreditAnggotaPenguji').innerHTML)
					var EditKreditMembinaKegiatan = parseFloat(document.getElementById('EditKreditMembinaKegiatan').innerHTML)
					var EditKreditMengembangkanProgram = parseFloat(document.getElementById('EditKreditMengembangkanProgram').innerHTML)
					var EditKreditBukuAjar = parseFloat(document.getElementById('EditKreditBukuAjar').innerHTML)
					var EditKreditProdukPengajaran = parseFloat(document.getElementById('EditKreditProdukPengajaran').innerHTML)
					var EditKreditOrasi = parseFloat(document.getElementById('EditKreditOrasi').innerHTML)
					var EditKreditRektor = parseFloat(document.getElementById('EditKreditRektor').innerHTML)
					var EditKreditWakilRektor = parseFloat(document.getElementById('EditKreditWakilRektor').innerHTML)
					var EditKreditKetua = parseFloat(document.getElementById('EditKreditKetua').innerHTML)
					var EditKreditPembantuKetua = parseFloat(document.getElementById('EditKreditPembantuKetua').innerHTML)
					var EditKreditDirekturAkademi = parseFloat(document.getElementById('EditKreditDirekturAkademi').innerHTML)
					var EditKreditPembantuDirekturPoliteknik = parseFloat(document.getElementById('EditKreditPembantuDirekturPoliteknik').innerHTML)
					var EditKreditPembantuDirekturAkademi = parseFloat(document.getElementById('EditKreditPembantuDirekturAkademi').innerHTML)
					var EditKreditSekretaris = parseFloat(document.getElementById('EditKreditSekretaris').innerHTML)
					var EditKreditPembimbingPencangkokan = 0
					var EditKreditPembimbingReguler = 0
					var EditKreditDetasering = 0
					var EditKreditPencangkokan = 0
					var EditCekJabatan = document.getElementById('EditKreditPembimbingPencangkokan')
					if (EditCekJabatan) {
						EditKreditPembimbingPencangkokan = parseFloat(document.getElementById('EditKreditPembimbingPencangkokan').innerHTML)
						EditKreditPembimbingReguler = parseFloat(document.getElementById('EditKreditPembimbingReguler').innerHTML)
						EditKreditDetasering = parseFloat(document.getElementById('EditKreditDetasering').innerHTML)
						EditKreditPencangkokan = parseFloat(document.getElementById('EditKreditPencangkokan').innerHTML)	
					}
					var EditKreditPengembangan960 = parseFloat(document.getElementById('EditKreditPengembangan960').innerHTML)
					var EditKreditPengembangan641 = parseFloat(document.getElementById('EditKreditPengembangan641').innerHTML)
					var EditKreditPengembangan481 = parseFloat(document.getElementById('EditKreditPengembangan481').innerHTML)
					var EditKreditPengembangan161 = parseFloat(document.getElementById('EditKreditPengembangan161').innerHTML)
					var EditKreditPengembangan81 = parseFloat(document.getElementById('EditKreditPengembangan81').innerHTML)
					var EditKreditPengembangan30 = parseFloat(document.getElementById('EditKreditPengembangan30').innerHTML)
					var EditKreditPengembangan10 = parseFloat(document.getElementById('EditKreditPengembangan10').innerHTML)
					document.getElementById('EditRencanaTotalKredit').innerHTML = EditKreditSekolah + EditKreditDiklat + EditKreditMengajar + EditKreditBimbingSeminar + EditKreditBimbingKKN + EditKreditDisertasiUtama + EditKreditTesisUtama + EditKreditSkripsiUtama + EditKreditDisertasiPendamping + EditKreditTesisPendamping + EditKreditSkripsiPendamping + EditKreditPengujiUtama + EditKreditAnggotaPenguji + EditKreditMembinaKegiatan + EditKreditMengembangkanProgram + EditKreditBukuAjar + EditKreditProdukPengajaran + EditKreditOrasi + EditKreditRektor + EditKreditWakilRektor + EditKreditKetua + EditKreditPembantuKetua + EditKreditDirekturAkademi + EditKreditPembantuDirekturPoliteknik + EditKreditPembantuDirekturAkademi + EditKreditSekretaris + EditKreditPembimbingPencangkokan + EditKreditPembimbingReguler + EditKreditDetasering + EditKreditPencangkokan + EditKreditPengembangan960 + EditKreditPengembangan641 + EditKreditPengembangan481 + EditKreditPengembangan161 + EditKreditPengembangan81 + EditKreditPengembangan30 + EditKreditPengembangan10
				})

				$("#LihatRealisasi").click(function() {
					var Data = {ID: $("#IdKegiatanPendidikan").val()}
					$.post(BaseURL+"Dashboard/LihatRealisasiPendidikan", Data).done(function(Respon) {
						window.location = BaseURL + "Dashboard/Pendidikan"
					})
				})

				$("#TambahRealisasiPendidikan").click(function() {
					var MengajarS1 = [[1, 1.5, 2],
													 [0.5, 0.75, 1],
													 [0.33, 0.5, 0.67],
													 [0.25, 0.38, 0.5],
													 [0.2, 0.3, 0.4]];
					var MengajarS2 = [[1, 1.5],
												   [0.5, 0.75],
													 [0.33, 0.5],
													 [0.25, 0.37]];
					var KKN = [[1, 1.5, 2],
										[0.5, 0.75, 1],
										[0.25, 0.5, 0.75]];
					if (isNaN($("#TahunRealisasi").val()) || $("#TahunRealisasi").val() == "") {
						alert('Input Tahun Belum Benar!')
					} else if (isNaN(parseInt($("#Volume").val())) || $("#Volume").val() == "") {
						alert('Input Volume kegiatan/sks/mhs Belum Benar!')
					} 
					else {
						var fd = new FormData()
						fd.append("file", $('#Bukti')[0].files[0])
						fd.append('Homebase',$("#JenisRealisasi").val())
						fd.append('Semester',$("#SemesterRealisasi").val())
						fd.append('Tahun',$("#TahunRealisasi").val())
						fd.append('IdKegiatan',$("#InputIdKegiatanPendidikan").val())
						fd.append('SK',$("#SK").val())
						fd.append('Kegiatan',$("#Uraian").val())		 
						fd.append('TanggalKegiatan',$("#TanggalKegiatan").val())
						fd.append('Volume',parseInt($("#Volume").val()))
						if ($("#InputIdKegiatanPendidikan").val() == 'PND1') {
							$("#KreditPND1").val() == 200? fd.append('Kode','0') : fd.append('Kode','1')
							fd.append('KreditPND1',$("#KreditPND1").val())
						}
						else if ($("#InputIdKegiatanPendidikan").val() == 'PND2' || $("#InputIdKegiatanPendidikan").val() == 'PND4' || $("#InputIdKegiatanPendidikan").val() == 'PND8' || $("#InputIdKegiatanPendidikan").val() == 'PND9') {
							fd.append('Kode','0')
						} 
						else if ($("#InputIdKegiatanPendidikan").val() == 'PND3') {
							if ($("#JenjangMengajar").val() == 'S1') {
								fd.append('KreditBKD',(MengajarS1[$("#JumlahDosen").val()][$("#JumlahMhs").val()])*$("#JumlahKelas").val())	
							} else if ($("#JenjangMengajar").val() == 'S2') {
								fd.append('KreditBKD',(MengajarS2[$("#JumlahDosen").val()][$("#JumlahMhs").val()])*$("#JumlahKelas").val())
							}  else if ($("#JenjangMengajar").val() == 'S3') {
								fd.append('KreditBKD',(MengajarS2[$("#JumlahDosen").val()][$("#JumlahMhs").val()])*$("#JumlahKelas").val())
							} else if ($("#JenjangMengajar").val() == 'S4') {
								fd.append('KreditBKD',(MengajarS2[$("#JumlahDosen").val()][$("#JumlahMhs").val()])*$("#JumlahKelas").val())
							}
							fd.append('KreditPAK',parseInt($("#Volume").val()))
							fd.append('Kode','0')
						}
						else if ($("#InputIdKegiatanPendidikan").val() == 'PND5') {
							fd.append('KreditBKD',(KKN[$("#JumlahDosenKKN").val()][$("#JumlahMhsKKN").val()]))
							fd.append('Kode','0')
						}
						else if ($("#InputIdKegiatanPendidikan").val() == 'PND6') {
							fd.append('JenisPembimbing',$("#JenisPembimbing").val())
							fd.append('JenisBimbingan',$("#JenisBimbingan").val())			
							fd.append('Kode',($("#JenisPembimbing").val()+'/'+$("#JenisBimbingan").val()+'/'+$("#LingkupPND6").val()))				
						}
						else if ($("#InputIdKegiatanPendidikan").val() == 'PND7') {
							fd.append('JenisPenguji',$("#JenisPenguji").val())
							fd.append('JenisUjian',$("#JenisUjian").val())
							fd.append('Kode',$("#JenisPenguji").val())
						}
						else if ($("#InputIdKegiatanPendidikan").val() == 'PND10') {
							fd.append('BahanPengajaran',$("#BahanPengajaran").val())
							fd.append('Kode',$("#BahanPengajaran").val())
						}
						else if ($("#InputIdKegiatanPendidikan").val() == 'PND11') {
							fd.append('TingkatOrasi',$("#TingkatOrasi").val())
							fd.append('Kode',0)
						}
						else if ($("#InputIdKegiatanPendidikan").val() == 'PND12') {
							fd.append('Kode',$("#JenisPND12").val())
							var JenisPND12 = $("#JenisPND12").val()
							if (JenisPND12 == 1) {
								fd.append('JenisPND12',6) 
								fd.append('KreditBKD',12)
							} else if (JenisPND12 == 2) {
								fd.append('JenisPND12',5)
								fd.append('KreditBKD',10)
							} else if (JenisPND12 == 3) {
								fd.append('JenisPND12',5)
								fd.append('KreditBKD',8)
							} else if (JenisPND12 == 4) {
								fd.append('JenisPND12',4)
								fd.append('KreditBKD',6)
							} else if (JenisPND12 == 5) {
								fd.append('JenisPND12','')
								fd.append('KreditBKD',6)
							} else if (JenisPND12 == 6) {
								fd.append('JenisPND12',3)
								fd.append('KreditBKD',6)
							} 
						}
						else if ($("#InputIdKegiatanPendidikan").val() == 'PND13') {
							fd.append('JenisPND13',$("#JenisPND13").val())
							fd.append('Kode',$("#JenisPND13").val())
						}
						else if ($("#InputIdKegiatanPendidikan").val() == 'PND14') {
							fd.append('JenisPND14',$("#JenisPND14").val())
							fd.append('Kode',$("#JenisPND14").val())
						}
						else if ($("#InputIdKegiatanPendidikan").val() == 'PND15') {
							fd.append('Kode',$("#JenisPND15").val())
							var JenisPND15 = $("#JenisPND15").val()
							if (JenisPND15 == 1) {
								fd.append('JenisPND15',15)
							} else if (JenisPND15 == 2) {
								fd.append('JenisPND15',9)
							} else if (JenisPND15 == 3) {
								fd.append('JenisPND15',6)
							} else if (JenisPND15 == 4) {
								fd.append('JenisPND15',3)
							} else if (JenisPND15 == 5) {
								fd.append('JenisPND15',2)
							} else if (JenisPND15 == 6) {
								fd.append('JenisPND15',1)
							} else if (JenisPND15 == 7) {
								fd.append('JenisPND15',0.5)
							} 
						}
						else if ($("#InputIdKegiatanPendidikan").val() == 'PND16') {
							fd.append('KreditBKD',(MengajarS2[$("#JumlahDosenPraktikum").val()][$("#JumlahMhsPraktikum").val()]*$("#JumlahKelasPraktikum").val()))
							fd.append('Kode',0)
						}
						else if ($("#InputIdKegiatanPendidikan").val() == 'PND17') {
							fd.append('KreditBKD',$("#Koordinator").val())
							fd.append('Kode',0)
						}
						else if ($("#InputIdKegiatanPendidikan").val() == 'PND18' || $("#InputIdKegiatanPendidikan").val() == 'PND19') {
							fd.append('Kode',0)
						}
						$.ajax({
							url: BaseURL+'Pendidikan/InputRealisasi',
							type: 'post',
							data: fd,
							contentType: false,
            	processData: false,
							beforeSend: function(){
								$("#LoadingInput").show();
							},
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Dashboard/Pendidikan"
								}
								else {
									alert(Respon)
									$("#LoadingInput").hide();
								}
							}
						});
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
					$('#EditRealisasiPendidikan').modal("show")
				});

				$("#CancelBukti").click(function() {
					$("#EditBukti").val("")
				})

				$("#UpdateRealisasiPendidikan").click(function() {
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
						url: BaseURL+'Pendidikan/EditRealisasi',
						type: 'post',
						data: fd,
						contentType: false, 
						processData: false,
						beforeSend: function(){
							$("#LoadingUpdate").show();
						},
						success: function(Respon){
							if (Respon == '1') {
								window.location = BaseURL + "Dashboard/Pendidikan"
							}
							else {
								alert(Respon)
								$("#LoadingUpdate").hide();
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
						$.post(BaseURL+"Pendidikan/HapusRealisasi", Hapus).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + "Dashboard/Pendidikan"
							} else {
								alert(Respon)
							}
						});
					}
				});
			});

			function InputIdKegiatanPendidikan() {
				if ($("#InputIdKegiatanPendidikan").val() == 'PND1') {
					document.getElementById("OpsiPND1").style.display = 'block'
					document.getElementById("OpsiPND3").style.display = 'none'
					document.getElementById("OpsiPND5").style.display = 'none'
					document.getElementById("OpsiPND6").style.display = 'none'
					document.getElementById("OpsiPND7").style.display = 'none'
					document.getElementById("OpsiPND10").style.display = 'none'
					document.getElementById("OpsiPND11").style.display = 'none'
					document.getElementById("OpsiPND12").style.display = 'none'
					document.getElementById("OpsiPND13").style.display = 'none'
					document.getElementById("OpsiPND14").style.display = 'none'
					document.getElementById("OpsiPND15").style.display = 'none'
					document.getElementById("OpsiPND16").style.display = 'none'
					document.getElementById("OpsiPND17").style.display = 'none'
				}
				else if ($("#InputIdKegiatanPendidikan").val() == 'PND3') {
					document.getElementById("OpsiPND1").style.display = 'none'
					document.getElementById("OpsiPND3").style.display = 'block'
					document.getElementById("OpsiPND5").style.display = 'none'
					document.getElementById("OpsiPND6").style.display = 'none'
					document.getElementById("OpsiPND7").style.display = 'none'
					document.getElementById("OpsiPND10").style.display = 'none'
					document.getElementById("OpsiPND11").style.display = 'none'
					document.getElementById("OpsiPND12").style.display = 'none'
					document.getElementById("OpsiPND13").style.display = 'none'
					document.getElementById("OpsiPND14").style.display = 'none'
					document.getElementById("OpsiPND15").style.display = 'none'
					document.getElementById("OpsiPND16").style.display = 'none'
					document.getElementById("OpsiPND17").style.display = 'none'
				}
				else if ($("#InputIdKegiatanPendidikan").val() == 'PND5') {
					document.getElementById("OpsiPND1").style.display = 'none'
					document.getElementById("OpsiPND3").style.display = 'none'
					document.getElementById("OpsiPND5").style.display = 'block'
					document.getElementById("OpsiPND6").style.display = 'none'
					document.getElementById("OpsiPND7").style.display = 'none'
					document.getElementById("OpsiPND10").style.display = 'none'
					document.getElementById("OpsiPND11").style.display = 'none'
					document.getElementById("OpsiPND12").style.display = 'none'
					document.getElementById("OpsiPND13").style.display = 'none'
					document.getElementById("OpsiPND14").style.display = 'none'
					document.getElementById("OpsiPND15").style.display = 'none'
					document.getElementById("OpsiPND16").style.display = 'none'
					document.getElementById("OpsiPND17").style.display = 'none'
				}
				else if ($("#InputIdKegiatanPendidikan").val() == 'PND6') {
					document.getElementById("OpsiPND1").style.display = 'none'
					document.getElementById("OpsiPND3").style.display = 'none'
					document.getElementById("OpsiPND5").style.display = 'none'
					document.getElementById("OpsiPND6").style.display = 'block'
					document.getElementById("OpsiPND7").style.display = 'none'
					document.getElementById("OpsiPND10").style.display = 'none'
					document.getElementById("OpsiPND11").style.display = 'none'
					document.getElementById("OpsiPND12").style.display = 'none'
					document.getElementById("OpsiPND13").style.display = 'none'
					document.getElementById("OpsiPND14").style.display = 'none'
					document.getElementById("OpsiPND15").style.display = 'none'
					document.getElementById("OpsiPND16").style.display = 'none'
					document.getElementById("OpsiPND17").style.display = 'none'
				}
				else if ($("#InputIdKegiatanPendidikan").val() == 'PND7') {
					document.getElementById("OpsiPND1").style.display = 'none'
					document.getElementById("OpsiPND3").style.display = 'none'
					document.getElementById("OpsiPND5").style.display = 'none'
					document.getElementById("OpsiPND6").style.display = 'none'
					document.getElementById("OpsiPND7").style.display = 'block'
					document.getElementById("OpsiPND10").style.display = 'none'
					document.getElementById("OpsiPND11").style.display = 'none'
					document.getElementById("OpsiPND12").style.display = 'none'
					document.getElementById("OpsiPND13").style.display = 'none'
					document.getElementById("OpsiPND14").style.display = 'none'
					document.getElementById("OpsiPND15").style.display = 'none'
					document.getElementById("OpsiPND16").style.display = 'none'
					document.getElementById("OpsiPND17").style.display = 'none'
				}
				else if ($("#InputIdKegiatanPendidikan").val() == 'PND10') {
					document.getElementById("OpsiPND1").style.display = 'none'
					document.getElementById("OpsiPND3").style.display = 'none'
					document.getElementById("OpsiPND5").style.display = 'none'
					document.getElementById("OpsiPND6").style.display = 'none'
					document.getElementById("OpsiPND7").style.display = 'none'
					document.getElementById("OpsiPND10").style.display = 'block'
					document.getElementById("OpsiPND11").style.display = 'none'
					document.getElementById("OpsiPND12").style.display = 'none'
					document.getElementById("OpsiPND13").style.display = 'none'
					document.getElementById("OpsiPND14").style.display = 'none'
					document.getElementById("OpsiPND15").style.display = 'none'
					document.getElementById("OpsiPND16").style.display = 'none'
					document.getElementById("OpsiPND17").style.display = 'none'
				}
				else if ($("#InputIdKegiatanPendidikan").val() == 'PND11') {
					document.getElementById("OpsiPND1").style.display = 'none'
					document.getElementById("OpsiPND3").style.display = 'none'
					document.getElementById("OpsiPND5").style.display = 'none'
					document.getElementById("OpsiPND6").style.display = 'none'
					document.getElementById("OpsiPND7").style.display = 'none'
					document.getElementById("OpsiPND10").style.display = 'none'
					document.getElementById("OpsiPND11").style.display = 'block'
					document.getElementById("OpsiPND12").style.display = 'none'
					document.getElementById("OpsiPND13").style.display = 'none'
					document.getElementById("OpsiPND14").style.display = 'none'
					document.getElementById("OpsiPND15").style.display = 'none'
					document.getElementById("OpsiPND16").style.display = 'none'
					document.getElementById("OpsiPND17").style.display = 'none'
				}
				else if ($("#InputIdKegiatanPendidikan").val() == 'PND12') {
					document.getElementById("OpsiPND1").style.display = 'none'
					document.getElementById("OpsiPND3").style.display = 'none'
					document.getElementById("OpsiPND5").style.display = 'none'
					document.getElementById("OpsiPND6").style.display = 'none'
					document.getElementById("OpsiPND7").style.display = 'none'
					document.getElementById("OpsiPND10").style.display = 'none'
					document.getElementById("OpsiPND11").style.display = 'none'
					document.getElementById("OpsiPND12").style.display = 'block'
					document.getElementById("OpsiPND13").style.display = 'none'
					document.getElementById("OpsiPND14").style.display = 'none'
					document.getElementById("OpsiPND15").style.display = 'none'
					document.getElementById("OpsiPND16").style.display = 'none'
					document.getElementById("OpsiPND17").style.display = 'none'
				}
				else if ($("#InputIdKegiatanPendidikan").val() == 'PND13') {
					document.getElementById("OpsiPND1").style.display = 'none'
					document.getElementById("OpsiPND3").style.display = 'none'
					document.getElementById("OpsiPND5").style.display = 'none'
					document.getElementById("OpsiPND6").style.display = 'none'
					document.getElementById("OpsiPND7").style.display = 'none'
					document.getElementById("OpsiPND10").style.display = 'none'
					document.getElementById("OpsiPND11").style.display = 'none'
					document.getElementById("OpsiPND12").style.display = 'none'
					document.getElementById("OpsiPND13").style.display = 'block'
					document.getElementById("OpsiPND14").style.display = 'none'
					document.getElementById("OpsiPND15").style.display = 'none'
					document.getElementById("OpsiPND16").style.display = 'none'
					document.getElementById("OpsiPND17").style.display = 'none'
				}
				else if ($("#InputIdKegiatanPendidikan").val() == 'PND14') {
					document.getElementById("OpsiPND1").style.display = 'none'
					document.getElementById("OpsiPND3").style.display = 'none'
					document.getElementById("OpsiPND5").style.display = 'none'
					document.getElementById("OpsiPND6").style.display = 'none'
					document.getElementById("OpsiPND7").style.display = 'none'
					document.getElementById("OpsiPND10").style.display = 'none'
					document.getElementById("OpsiPND11").style.display = 'none'
					document.getElementById("OpsiPND12").style.display = 'none'
					document.getElementById("OpsiPND13").style.display = 'none'
					document.getElementById("OpsiPND14").style.display = 'block'
					document.getElementById("OpsiPND15").style.display = 'none'
					document.getElementById("OpsiPND16").style.display = 'none'
					document.getElementById("OpsiPND17").style.display = 'none'
				}
				else if ($("#InputIdKegiatanPendidikan").val() == 'PND15') {
					document.getElementById("OpsiPND1").style.display = 'none'
					document.getElementById("OpsiPND3").style.display = 'none'
					document.getElementById("OpsiPND5").style.display = 'none'
					document.getElementById("OpsiPND6").style.display = 'none'
					document.getElementById("OpsiPND7").style.display = 'none'
					document.getElementById("OpsiPND10").style.display = 'none'
					document.getElementById("OpsiPND11").style.display = 'none'
					document.getElementById("OpsiPND12").style.display = 'none'
					document.getElementById("OpsiPND13").style.display = 'none'
					document.getElementById("OpsiPND14").style.display = 'none'
					document.getElementById("OpsiPND15").style.display = 'block'
					document.getElementById("OpsiPND16").style.display = 'none'
					document.getElementById("OpsiPND17").style.display = 'none'
				}
				else if ($("#InputIdKegiatanPendidikan").val() == 'PND16') {
					document.getElementById("OpsiPND1").style.display = 'none'
					document.getElementById("OpsiPND3").style.display = 'none'
					document.getElementById("OpsiPND5").style.display = 'none'
					document.getElementById("OpsiPND6").style.display = 'none'
					document.getElementById("OpsiPND7").style.display = 'none'
					document.getElementById("OpsiPND10").style.display = 'none'
					document.getElementById("OpsiPND11").style.display = 'none'
					document.getElementById("OpsiPND12").style.display = 'none'
					document.getElementById("OpsiPND13").style.display = 'none'
					document.getElementById("OpsiPND14").style.display = 'none'
					document.getElementById("OpsiPND15").style.display = 'none'
					document.getElementById("OpsiPND16").style.display = 'block'
					document.getElementById("OpsiPND17").style.display = 'none'
				}
				else if ($("#InputIdKegiatanPendidikan").val() == 'PND17') {
					document.getElementById("OpsiPND1").style.display = 'none'
					document.getElementById("OpsiPND3").style.display = 'none'
					document.getElementById("OpsiPND5").style.display = 'none'
					document.getElementById("OpsiPND6").style.display = 'none'
					document.getElementById("OpsiPND7").style.display = 'none'
					document.getElementById("OpsiPND10").style.display = 'none'
					document.getElementById("OpsiPND11").style.display = 'none'
					document.getElementById("OpsiPND12").style.display = 'none'
					document.getElementById("OpsiPND13").style.display = 'none'
					document.getElementById("OpsiPND14").style.display = 'none'
					document.getElementById("OpsiPND15").style.display = 'none'
					document.getElementById("OpsiPND16").style.display = 'none'
					document.getElementById("OpsiPND17").style.display = 'block'
				}
				else {
					document.getElementById("OpsiPND1").style.display = 'none'
					document.getElementById("OpsiPND3").style.display = 'none'
					document.getElementById("OpsiPND5").style.display = 'none'
					document.getElementById("OpsiPND6").style.display = 'none'
					document.getElementById("OpsiPND7").style.display = 'none'
					document.getElementById("OpsiPND10").style.display = 'none'
					document.getElementById("OpsiPND11").style.display = 'none'
					document.getElementById("OpsiPND12").style.display = 'none'
					document.getElementById("OpsiPND13").style.display = 'none'
					document.getElementById("OpsiPND14").style.display = 'none'
					document.getElementById("OpsiPND15").style.display = 'none'
					document.getElementById("OpsiPND16").style.display = 'none'
					document.getElementById("OpsiPND17").style.display = 'none'
				}
			}

			function EditDoktor() {
				if (document.getElementById('EditDoktor').checked){
					document.getElementById('EditKreditSekolah').innerHTML = 200
					document.getElementById('EditMagister').disabled = true
				} else {
					document.getElementById('EditKreditSekolah').innerHTML = 0
					document.getElementById('EditMagister').disabled = false
				}
			}

			function EditMagister() {
				if (document.getElementById('EditMagister').checked){
					document.getElementById('EditKreditSekolah').innerHTML = 150
					document.getElementById('EditDoktor').disabled = true
				} else {
					document.getElementById('EditKreditSekolah').innerHTML = 0
					document.getElementById('EditDoktor').disabled = false
				}
			}

			function EditDiklat() {
				if (document.getElementById('EditDiklat').checked){
					document.getElementById('EditKreditDiklat').innerHTML = 3
				} else {
					document.getElementById('EditKreditDiklat').innerHTML = 0
				}
			}

			function EditMengajar() {
				var jabatan = EditJabatanRencanaPendidikan
				if (jabatan != 'Asisten Ahli'){
					if (parseInt($('#EditMengajar').val()) <= 10) {
						document.getElementById('EditKreditMengajar').innerHTML = parseInt($('#EditMengajar').val())
					} else if(parseInt($('#EditMengajar').val()) > 10){
						document.getElementById('EditKreditMengajar').innerHTML = 10+(0.5*(parseInt($('#EditMengajar').val())-10))						
					} else {
						document.getElementById('EditKreditMengajar').innerHTML = 0
					}
				} 
				else {
					if (parseInt($('#EditMengajar').val()) <= 10) {
						document.getElementById('EditKreditMengajar').innerHTML = parseInt($('#EditMengajar').val())*0.5
					} else if(parseInt($('#EditMengajar').val()) > 10){
						document.getElementById('EditKreditMengajar').innerHTML = 5+(0.25*(parseInt($('#EditMengajar').val())-10))
					} else {
						document.getElementById('EditKreditMengajar').innerHTML = 0
					}
				}
			}

			function EditBimbingSeminar() {
				if (document.getElementById('EditBimbingSeminar').checked){
					document.getElementById('EditKreditBimbingSeminar').innerHTML = 1
				} else {
					document.getElementById('EditKreditBimbingSeminar').innerHTML = 0
				}
			}

			function EditBimbingKKN() {
				if (document.getElementById('EditBimbingKKN').checked){
					document.getElementById('EditKreditBimbingKKN').innerHTML = 1
				} else {
					document.getElementById('EditKreditBimbingKKN').innerHTML = 0
				}
			}

			function EditDisertasiUtama() {
				if (isNaN(parseInt($('#EditDisertasiUtama').val()))) {
					document.getElementById('EditKreditDisertasiUtama').innerHTML = 0
				} else {
					document.getElementById('EditKreditDisertasiUtama').innerHTML = parseInt($('#EditDisertasiUtama').val())*2
				}
			}

			function EditTesisUtama() {
				if (isNaN(parseInt($('#EditTesisUtama').val()))) {
					document.getElementById('EditKreditTesisUtama').innerHTML = 0
				} else {
					document.getElementById('EditKreditTesisUtama').innerHTML = parseInt($('#EditTesisUtama').val())*0.5
				}
			}

			function EditSkripsiUtama() {
				if (isNaN(parseInt($('#EditSkripsiUtama').val()))) {
					document.getElementById('EditKreditSkripsiUtama').innerHTML = 0
				} else {
					document.getElementById('EditKreditSkripsiUtama').innerHTML = parseInt($('#EditSkripsiUtama').val())*0.125
				}
			}

			function EditDisertasiPendamping() {
				if (isNaN(parseInt($('#EditDisertasiPendamping').val()))) {
					document.getElementById('EditKreditDisertasiPendamping').innerHTML = 0
				} else {
					document.getElementById('EditKreditDisertasiPendamping').innerHTML = parseInt($('#EditDisertasiPendamping').val())*1.5
				}
			}

			function EditTesisPendamping() {
				if (isNaN(parseInt($('#EditTesisPendamping').val()))) {
					document.getElementById('EditKreditTesisPendamping').innerHTML = 0
				} else {
					document.getElementById('EditKreditTesisPendamping').innerHTML = (parseInt($('#EditTesisPendamping').val())*2/6).toFixed(2)
				}
			}

			function EditSkripsiPendamping() {
				if (isNaN(parseInt($('#EditSkripsiPendamping').val()))) {
					document.getElementById('EditKreditSkripsiPendamping').innerHTML = 0
				} else {
					document.getElementById('EditKreditSkripsiPendamping').innerHTML = parseInt($('#EditSkripsiPendamping').val())*0.0625
				}
			}

			function EditPengujiUtama() {
				if (isNaN(parseInt($('#EditPengujiUtama').val()))) {
					document.getElementById('EditKreditPengujiUtama').innerHTML = 0
				} else {
					document.getElementById('EditKreditPengujiUtama').innerHTML = parseInt($('#EditPengujiUtama').val())/4	
				}
			}

			function EditAnggotaPenguji() {
				if (isNaN(parseInt($('#EditAnggotaPenguji').val()))) {
					document.getElementById('EditKreditAnggotaPenguji').innerHTML = 0
				} else {
					document.getElementById('EditKreditAnggotaPenguji').innerHTML = parseInt($('#EditAnggotaPenguji').val())/8
				}
			}

			function EditMembinaKegiatan() {
				if (isNaN(parseInt($('#EditMembinaKegiatan').val()))) {
					document.getElementById('EditKreditMembinaKegiatan').innerHTML = 0
				} else {
					document.getElementById('EditKreditMembinaKegiatan').innerHTML = parseInt($('#EditMembinaKegiatan').val())
				}
			}

			function EditMengembangkanProgram() {
				if (isNaN(parseInt($('#EditMengembangkanProgram').val()))) {
					document.getElementById('EditKreditMengembangkanProgram').innerHTML = 0
				} else {
					document.getElementById('EditKreditMengembangkanProgram').innerHTML = parseInt($('#EditMengembangkanProgram').val())*2
				}
			}

			function EditBukuAjar() {
				if (isNaN(parseInt($('#EditBukuAjar').val()))) {
					document.getElementById('EditKreditBukuAjar').innerHTML = 0
				} else {
					document.getElementById('EditKreditBukuAjar').innerHTML = parseInt($('#EditBukuAjar').val())*20
				}
			}

			function EditProdukPengajaran() {
				if (isNaN(parseInt($('#EditProdukPengajaran').val()))) {
					document.getElementById('EditKreditProdukPengajaran').innerHTML = 0
				} else {
					document.getElementById('EditKreditProdukPengajaran').innerHTML = parseInt($('#EditProdukPengajaran').val())*5
				}
			}

			function EditOrasi() {
				if (isNaN(parseInt($('#EditOrasi').val()))) {
					document.getElementById('EditKreditOrasi').innerHTML = 0
				} else {
					document.getElementById('EditKreditOrasi').innerHTML = parseInt($('#EditOrasi').val())*2.5
				}
			}

			function EditRektor() {
				if (document.getElementById('EditRektor').checked){
					document.getElementById('EditKreditRektor').innerHTML = 6
          document.getElementById('EditWakilRektor').disabled = true
          document.getElementById('EditKetua').disabled = true
          document.getElementById('EditPembantuKetua').disabled = true
          document.getElementById('EditDirekturAkademi').disabled = true
          document.getElementById('EditPembantuDirekturPoliteknik').disabled = true
          document.getElementById('EditPembantuDirekturAkademi').disabled = true
          document.getElementById('EditSekretaris').disabled = true
        } else {
          document.getElementById('EditKreditRektor').innerHTML = 0
          document.getElementById('EditWakilRektor').disabled = false
          document.getElementById('EditKetua').disabled = false
          document.getElementById('EditPembantuKetua').disabled = false
          document.getElementById('EditDirekturAkademi').disabled = false
          document.getElementById('EditPembantuDirekturPoliteknik').disabled = false
          document.getElementById('EditPembantuDirekturAkademi').disabled = false
          document.getElementById('EditSekretaris').disabled = false
				}
			}

			function EditWakilRektor() {
				if (document.getElementById('EditWakilRektor').checked){
					document.getElementById('EditKreditWakilRektor').innerHTML = 5
          document.getElementById('EditRektor').disabled = true
          document.getElementById('EditKetua').disabled = true
          document.getElementById('EditPembantuKetua').disabled = true
          document.getElementById('EditDirekturAkademi').disabled = true
          document.getElementById('EditPembantuDirekturPoliteknik').disabled = true
          document.getElementById('EditPembantuDirekturAkademi').disabled = true
          document.getElementById('EditSekretaris').disabled = true
        } else {
          document.getElementById('EditKreditWakilRektor').innerHTML = 0
          document.getElementById('EditRektor').disabled = false
          document.getElementById('EditKetua').disabled = false
          document.getElementById('EditPembantuKetua').disabled = false
          document.getElementById('EditDirekturAkademi').disabled = false
          document.getElementById('EditPembantuDirekturPoliteknik').disabled = false
          document.getElementById('EditPembantuDirekturAkademi').disabled = false
          document.getElementById('EditSekretaris').disabled = false
				}
			}

			function EditKetua() {
				if (document.getElementById('EditKetua').checked){
					document.getElementById('EditKreditKetua').innerHTML = 4
          document.getElementById('EditWakilRektor').disabled = true
          document.getElementById('EditRektor').disabled = true
          document.getElementById('EditPembantuKetua').disabled = true
          document.getElementById('EditDirekturAkademi').disabled = true
          document.getElementById('EditPembantuDirekturPoliteknik').disabled = true
          document.getElementById('EditPembantuDirekturAkademi').disabled = true
          document.getElementById('EditSekretaris').disabled = true
        } else {
          document.getElementById('EditKreditKetua').innerHTML = 0
          document.getElementById('EditWakilRektor').disabled = false
          document.getElementById('EditRektor').disabled = false
          document.getElementById('EditPembantuKetua').disabled = false
          document.getElementById('EditDirekturAkademi').disabled = false
          document.getElementById('EditPembantuDirekturPoliteknik').disabled = false
          document.getElementById('EditPembantuDirekturAkademi').disabled = false
          document.getElementById('EditSekretaris').disabled = false
				}
			}

			function EditPembantuKetua() {
				if (document.getElementById('EditPembantuKetua').checked){
					document.getElementById('EditKreditPembantuKetua').innerHTML = 4
          document.getElementById('EditWakilRektor').disabled = true
          document.getElementById('EditKetua').disabled = true
          document.getElementById('EditRektor').disabled = true
          document.getElementById('EditDirekturAkademi').disabled = true
          document.getElementById('EditPembantuDirekturPoliteknik').disabled = true
          document.getElementById('EditPembantuDirekturAkademi').disabled = true
          document.getElementById('EditSekretaris').disabled = true
        } else {
          document.getElementById('EditKreditPembantuKetua').innerHTML = 0
          document.getElementById('EditWakilRektor').disabled = false
          document.getElementById('EditKetua').disabled = false
          document.getElementById('EditRektor').disabled = false
          document.getElementById('EditDirekturAkademi').disabled = false
          document.getElementById('EditPembantuDirekturPoliteknik').disabled = false
          document.getElementById('EditPembantuDirekturAkademi').disabled = false
          document.getElementById('EditSekretaris').disabled = false
				}
			}

			function EditDirekturAkademi() {
				if (document.getElementById('EditDirekturAkademi').checked){
					document.getElementById('EditKreditDirekturAkademi').innerHTML = 4
          document.getElementById('EditWakilRektor').disabled = true
          document.getElementById('EditKetua').disabled = true
          document.getElementById('EditPembantuKetua').disabled = true
          document.getElementById('EditRektor').disabled = true
          document.getElementById('EditPembantuDirekturPoliteknik').disabled = true
          document.getElementById('EditPembantuDirekturAkademi').disabled = true
          document.getElementById('EditSekretaris').disabled = true
        } else {
          document.getElementById('EditKreditDirekturAkademi').innerHTML = 0
          document.getElementById('EditWakilRektor').disabled = false
          document.getElementById('EditKetua').disabled = false
          document.getElementById('EditPembantuKetua').disabled = false
          document.getElementById('EditRektor').disabled = false
          document.getElementById('EditPembantuDirekturPoliteknik').disabled = false
          document.getElementById('EditPembantuDirekturAkademi').disabled = false
          document.getElementById('EditSekretaris').disabled = false
				}
			}

			function EditPembantuDirekturPoliteknik() {
				if (document.getElementById('EditPembantuDirekturPoliteknik').checked){
					document.getElementById('EditKreditPembantuDirekturPoliteknik').innerHTML = 3
          document.getElementById('EditWakilRektor').disabled = true
          document.getElementById('EditKetua').disabled = true
          document.getElementById('EditPembantuKetua').disabled = true
          document.getElementById('EditDirekturAkademi').disabled = true
          document.getElementById('EditRektor').disabled = true
          document.getElementById('EditPembantuDirekturAkademi').disabled = true
          document.getElementById('EditSekretaris').disabled = true
        } else {
          document.getElementById('EditKreditPembantuDirekturPoliteknik').innerHTML = 0
          document.getElementById('EditWakilRektor').disabled = false
          document.getElementById('EditKetua').disabled = false
          document.getElementById('EditPembantuKetua').disabled = false
          document.getElementById('EditDirekturAkademi').disabled = false
          document.getElementById('EditRektor').disabled = false
          document.getElementById('EditPembantuDirekturAkademi').disabled = false
          document.getElementById('EditSekretaris').disabled = false
				}
			}

			function EditPembantuDirekturAkademi() {
				if (document.getElementById('EditPembantuDirekturAkademi').checked){
					document.getElementById('EditKreditPembantuDirekturAkademi').innerHTML = 3
          document.getElementById('EditWakilRektor').disabled = true
          document.getElementById('EditKetua').disabled = true
          document.getElementById('EditPembantuKetua').disabled = true
          document.getElementById('EditDirekturAkademi').disabled = true
          document.getElementById('EditPembantuDirekturPoliteknik').disabled = true
          document.getElementById('EditRektor').disabled = true
          document.getElementById('EditSekretaris').disabled = true
        } else {
          document.getElementById('EditKreditPembantuDirekturAkademi').innerHTML = 0
          document.getElementById('EditWakilRektor').disabled = false
          document.getElementById('EditKetua').disabled = false
          document.getElementById('EditPembantuKetua').disabled = false
          document.getElementById('EditDirekturAkademi').disabled = false
          document.getElementById('EditPembantuDirekturPoliteknik').disabled = false
          document.getElementById('EditRektor').disabled = false
          document.getElementById('EditSekretaris').disabled = false
				}
			}

			function EditSekretaris() {
				if (document.getElementById('EditSekretaris').checked){
					document.getElementById('EditKreditSekretaris').innerHTML = 3
          document.getElementById('EditWakilRektor').disabled = true
          document.getElementById('EditKetua').disabled = true
          document.getElementById('EditPembantuKetua').disabled = true
          document.getElementById('EditDirekturAkademi').disabled = true
          document.getElementById('EditPembantuDirekturPoliteknik').disabled = true
          document.getElementById('EditPembantuDirekturAkademi').disabled = true
          document.getElementById('EditRektor').disabled = true
        } else {
          document.getElementById('EditKreditSekretaris').innerHTML = 0
          document.getElementById('EditWakilRektor').disabled = false
          document.getElementById('EditKetua').disabled = false
          document.getElementById('EditPembantuKetua').disabled = false
          document.getElementById('EditDirekturAkademi').disabled = false
          document.getElementById('EditPembantuDirekturPoliteknik').disabled = false
          document.getElementById('EditPembantuDirekturAkademi').disabled = false
          document.getElementById('EditRektor').disabled = false
				}
			}

			function EditPembimbingPencangkokan() {
				if (isNaN(parseInt($('#EditPembimbingPencangkokan').val()))) {
					document.getElementById('EditKreditPembimbingPencangkokan').innerHTML = 0
				} else {
					document.getElementById('EditKreditPembimbingPencangkokan').innerHTML = parseInt($('#EditPembimbingPencangkokan').val())*2
				}
			}

			function EditPembimbingReguler() {
				if (isNaN(parseInt($('#EditPembimbingReguler').val()))) {
					document.getElementById('EditKreditPembimbingReguler').innerHTML = 0
				} else {
					document.getElementById('EditKreditPembimbingReguler').innerHTML = parseInt($('#EditPembimbingReguler').val())
				}
			}

			function EditDetasering() {
				if (isNaN(parseInt($('#EditDetasering').val()))) {
					document.getElementById('EditKreditDetasering').innerHTML = 0
				} else {
					document.getElementById('EditKreditDetasering').innerHTML = parseInt($('#EditDetasering').val())*5
				}
			}

			function EditPencangkokan() {
				if (isNaN(parseInt($('#EditPencangkokan').val()))) {
					document.getElementById('EditKreditPencangkokan').innerHTML = 0
				} else {
					document.getElementById('EditKreditPencangkokan').innerHTML = parseInt($('#EditPencangkokan').val())*4
				}
			}

			function EditPengembangan960() {
				if (isNaN(parseInt($('#EditPengembangan960').val()))) {
					document.getElementById('EditKreditPengembangan960').innerHTML = 0
				} else {
					document.getElementById('EditKreditPengembangan960').innerHTML = parseInt($('#EditPengembangan960').val())*15
				}
			}

			function EditPengembangan641() {
				if (isNaN(parseInt($('#EditPengembangan641').val()))) {
					document.getElementById('EditKreditPengembangan641').innerHTML = 0
				} else {
					document.getElementById('EditKreditPengembangan641').innerHTML = parseInt($('#EditPengembangan641').val())*9
				}
			}

			function EditPengembangan481() {
				if (isNaN(parseInt($('#EditPengembangan481').val()))) {
					document.getElementById('EditKreditPengembangan481').innerHTML = 0
				} else {
					document.getElementById('EditKreditPengembangan481').innerHTML = parseInt($('#EditPengembangan481').val())*6
				}
			}

			function EditPengembangan161() {
				if (isNaN(parseInt($('#EditPengembangan161').val()))) {
					document.getElementById('EditKreditPengembangan161').innerHTML = 0
				} else {
					document.getElementById('EditKreditPengembangan161').innerHTML = parseInt($('#EditPengembangan161').val())*3
				}
			}

			function EditPengembangan81() {
				if (isNaN(parseInt($('#EditPengembangan81').val()))) {
					document.getElementById('EditKreditPengembangan81').innerHTML = 0
				} else {
					document.getElementById('EditKreditPengembangan81').innerHTML = parseInt($('#EditPengembangan81').val())*2
				}
			}

			function EditPengembangan30() {
				if (isNaN(parseInt($('#EditPengembangan30').val()))) {
					document.getElementById('EditKreditPengembangan30').innerHTML = 0
				} else {
					document.getElementById('EditKreditPengembangan30').innerHTML = parseInt($('#EditPengembangan30').val())*1
				}
			}

			function EditPengembangan10() {
				if (isNaN(parseInt($('#EditPengembangan10').val()))) {
					document.getElementById('EditKreditPengembangan10').innerHTML = 0
				} else {
					document.getElementById('EditKreditPengembangan10').innerHTML = parseInt($('#EditPengembangan10').val())*0.5
				}
			}
		</script>
	</body>
</html>