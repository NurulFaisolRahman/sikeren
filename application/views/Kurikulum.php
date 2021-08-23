<div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-sm-12 my-2 ">    
                    <button type="button" class="btn btn-primary text-light mb-2" data-toggle="modal" data-target="#ModalInputKurikulum"><i class="fa fa-plus"></i> <b>Input Kurikulum</b></button> 
                      <div class="table-responsive mb-2">
                        <table id="TabelKurikulum" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th class="text-center align-middle">No</th>
                              <th class="align-middle">Homebase</th>
                              <th class="align-middle">Semester</th>
                              <th class="align-middle">Kode MK</th>
                              <th class="align-middle">Nama Mata Kuliah</th>
                              <th class="align-middle">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($Kurikulum as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['Homebase']?></td>
                                <td class="align-middle"><?=$key['Semester']?></td>
                                <td class="align-middle"><?=$key['KodeMK']?></td>
                                <td class="align-middle"><?=$key['NamaMK']?></td>
                                <td class="align-middle">
                                  <button Edit="<?=$key['Id']."|".$key['Homebase']."|".$key['Semester']."|".$key['KodeMK']."|".$key['NamaMK']."|".$key['KompetensiMK']."|".$key['Kuliah']."|".$key['Seminar']."|".$key['Praktikum']."|".$key['Jam']."|".$key['Dokumen']."|".$key['Bukti']."|".$key['Unit']?>" class="btn btn-sm btn-warning Edit"><i class="fas fa-edit"></i></button>
                                  <button Hapus="<?=$key['Id']."|".$key['Bukti']?>" class="btn btn-sm btn-danger Hapus"><i class="fas fa-trash"></i></button>  
                                  <button LihatSertifikat="<?=base_url('Kurikulum/'.$key['Bukti'])?>" class="btn btn-sm btn-primary LihatSertifikat"><i class="fas fa-download"></i></button>  
                                </td> 
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div> 
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <div class="modal fade" id="ModalInputKurikulum">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-sm-4">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Homebase</b></span>
                    </div>
                    <select class="custom-select" id="homebase">
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Semester</b></span>
                    </div>
                    <select class="custom-select" id="semester">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Kode Matakuliah</b></span>
                    </div>
                    <input type="text" class="form-control" id="kode"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Nama Matakuliah</b></span>
                    </div>
                    <input type="text" class="form-control" id="nama"> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Matakuliah Kompetensi</b></span>
                    </div>
                    <select class="custom-select" id="kompetensi">
                      <option value="1">Ya</option>
                      <option value="2">Tidak</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Bobot Kuliah/Responsi/Tutorial (SKS)</b></span>
                    </div>
                    <input type="text" class="form-control" id="kuliah" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary" ><b>Bobot Seminar (SKS)</b></span>
                    </div>
                    <input type="text" class="form-control" id="seminar" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Bobot Praktikum/Praktik Lapangan (SKS)</b></span>
                    </div>
                    <input type="text" class="form-control" id="praktikum" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Konversi Kredit ke Jam</b></span>
                    </div>
                    <input type="text" class="form-control" id="jam" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-8">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Dokumen</b></span>
                    </div>
                    <input type="text" class="form-control" id="dokumen" placeholder="Nama Dokumen Rencana Pembelajaran Yang Digunakan"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Capaian Pembelajaran</b></span>
                    </div>
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-danger"><b>Sikap</b></span>
                    </div>
                    <select class="custom-select" id="sikap">
                      <option value="1">Ya</option>
                      <option value="2">Tidak</option>
                    </select>
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-danger"><b>Pengetahuan</b></span>
                    </div>
                    <select class="custom-select" id="pengetahuan">
                      <option value="1">Ya</option>
                      <option value="2">Tidak</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Capaian Pembelajaran</b></span>
                    </div>
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-danger"><b>Keterampilan Umum</b></span>
                    </div>
                    <select class="custom-select" id="umum">
                      <option value="1">Ya</option>
                      <option value="2">Tidak</option>
                    </select>
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-danger"><b>Keterampilan Khusus</b></span>
                    </div>
                    <select class="custom-select" id="khusus">
                      <option value="1">Ya</option>
                      <option value="2">Tidak</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text bg-primary"><b>Upload RPS</b></span>
										</div>
										<input class="form-control" type="file" id="bukti">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Unit Penyelenggara</b></span>
                    </div>
                    <input type="text" class="form-control" id="unit"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <pre class="text-danger"><b>Bukti Yang Diupload Dalam Format Pdf</b></pre>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="InputKurikulum"><b>Simpan</b></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalEditKurikulum">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-warning">
        <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-sm-4">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Homebase</b></span>
                    </div>
                    <input type="hidden" class="form-control" id="Id"> 
                    <select class="custom-select" id="Edithomebase">
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Semester</b></span>
                    </div>
                    <select class="custom-select" id="Editsemester">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Kode Matakuliah</b></span>
                    </div>
                    <input type="text" class="form-control" id="Editkode"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Nama Matakuliah</b></span>
                    </div>
                    <input type="text" class="form-control" id="Editnama"> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Matakuliah Kompetensi</b></span>
                    </div>
                    <select class="custom-select" id="Editkompetensi">
                      <option value="1">Ya</option>
                      <option value="2">Tidak</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Bobot Kuliah/Responsi/Tutorial (SKS)</b></span>
                    </div>
                    <input type="text" class="form-control" id="Editkuliah" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary" ><b>Bobot Seminar (SKS)</b></span>
                    </div>
                    <input type="text" class="form-control" id="Editseminar" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Bobot Praktikum/Praktik Lapangan (SKS)</b></span>
                    </div>
                    <input type="text" class="form-control" id="Editpraktikum" placeholder="0"> 
                  </div>
                <div class="col-sm-4">
                </div>
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Konversi Kredit ke Jam</b></span>
                    </div>
                    <input type="text" class="form-control" id="Editjam" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-8">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Dokumen</b></span>
                    </div>
                    <input type="text" class="form-control" id="Editdokumen" placeholder="Nama Dokumen Rencana Pembelajaran Yang Digunakan"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Capaian Pembelajaran</b></span>
                    </div>
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-danger"><b>Sikap</b></span>
                    </div>
                    <select class="custom-select" id="Editsikap">
                      <option value="1">Ya</option>
                      <option value="2">Tidak</option>
                    </select>
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-danger"><b>Pengetahuan</b></span>
                    </div>
                    <select class="custom-select" id="Editpengetahuan">
                      <option value="1">Ya</option>
                      <option value="2">Tidak</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Capaian Pembelajaran</b></span>
                    </div>  
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-danger"><b>Keterampilan Umum</b></span>
                    </div>
                    <select class="custom-select" id="Editumum">
                      <option value="1">Ya</option>
                      <option value="2">Tidak</option>
                    </select>
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-danger"><b>Keterampilan Khusus</b></span>
                    </div>
                    <select class="custom-select" id="Editkhusus">
                      <option value="1">Ya</option>
                      <option value="2">Tidak</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text bg-primary"><b>Upload RPS</b></span>
                    </div>
                    <input class="form-control" type="hidden" id="buktiLama">
										<input class="form-control" type="file" id="Editbukti">
                    <div class="input-group-prepend">
                      <button class="input-group-text bg-primary" id="CancelEditBuktiKurikulum"><b>X</b></button>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Unit Penyelenggara</b></span>
                    </div>
                    <input type="text" class="form-control" id="Editunit"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <pre class="text-danger"><b>Bukti Yang Diupload Dalam Format Pdf</b></pre>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="UpdateKurikulum"><b>Simpan</b></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalSertifikat">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathSertifikat" src="" type="application/pdf" width="100%" height="520"/>
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
    <script src="<?=base_url('bootstrap/js/Borang.js')?>"></script>
		<script>
			jQuery(document).ready(function($) {
				"use strict";

				$('[data-mask]').inputmask()

				var BaseURL = '<?=base_url()?>'; 

        $(document).on("click",".LihatSertifikat",function(){
					var Path = $(this).attr('LihatSertifikat')
          $('#PathSertifikat').attr('src',Path)		
          $('#ModalSertifikat').modal("show")
				}) 

        $("#InputKurikulum").click(function() {
          if ($("#kode").val() == '') {
            alert('Mohon Input Kode Matakuliah!')
          } else if ($("#nama").val() == '') {
            alert('Mohon Input Nama Matakuliah!')
          } else if (isNaN(parseInt($("#kuliah").val()))) {
            alert('Input Bobot Kuliah/Responsi/Tutorial Hanya Angka!')
          } else if (isNaN(parseInt($("#seminar").val()))) {
            alert('Input Bobot Seminar Hanya Angka!')
          } else if (isNaN(parseInt($("#praktikum").val()))) {
            alert('Input Bobot Praktikum/Praktik Lapangan Hanya Angka!')
          } else if (isNaN(parseInt($("#jam").val()))) {
            alert('Input Konversi Kredit ke Jam Hanya Angka!')
          } else if ($("#dokumen").val() == '') {
            alert('Mohon Input Nama Dokumen!')
          } else if ($("#unit").val() == '') {
            alert('Mohon Input Unit Penyelenggara!')
          } else {
            var fd = new FormData()
						fd.append('Homebase',$("#homebase").val())
            fd.append('Semester',$("#semester").val())
						fd.append('KodeMK',$("#kode").val())
						fd.append('NamaMK',$("#nama").val())
						fd.append('KompetensiMK',$("#kompetensi").val()+'$'+$("#sikap").val()+'$'+$("#pengetahuan").val()+'$'+$("#umum").val()+'$'+$("#khusus").val())
						fd.append('Kuliah',$("#kuliah").val())
            fd.append('Seminar',$("#seminar").val())
            fd.append('Praktikum',$("#praktikum").val())
            fd.append('Jam',$("#jam").val())
            fd.append('Dokumen',$("#dokumen").val())
            fd.append('Unit',$("#unit").val())
            fd.append("Bukti", $('#bukti')[0].files[0])
            $.ajax({
							url: BaseURL+'Admin/InputKurikulum',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Admin/Kurikulum"
								}
								else {
									alert(Respon)
								}
							}
						})
          }
        })

        $("#CancelEditBuktiKurikulum").click(function() {
					$("#Editbukti").val("")
				})

        $(document).on("click",".Edit",function(){
					var Data = $(this).attr('Edit')
					var Pisah = Data.split("|");
					$('#Id').val(Pisah[0])
          $('#Edithomebase').val(Pisah[1])
					$('#Editsemester').val(Pisah[2])
					$("#Editkode").val(Pisah[3])
					$('#Editnama').val(Pisah[4])
          var Pecah = Pisah[5].split("$");
					$("#Editkompetensi").val(Pecah[0])
          $("#Editsikap").val(Pecah[1])
          $("#Editpengetahuan").val(Pecah[2])
          $("#Editumum").val(Pecah[3])
          $("#Editkhusus").val(Pecah[4])
					$('#Editkuliah').val(Pisah[6])
					$('#Editseminar').val(Pisah[7])
          $('#Editpraktikum').val(Pisah[8])
          $('#Editjam').val(Pisah[9])
          $('#Editdokumen').val(Pisah[10])
          $('#buktiLama').val(Pisah[11])
          $('#Editunit').val(Pisah[12])
          $('#ModalEditKurikulum').modal("show")
				}) 

				$("#UpdateKurikulum").click(function() {
					if ($("#Editkode").val() == '') {
            alert('Mohon Input Kode Matakuliah!')
          } else if ($("#Editnama").val() == '') {
            alert('Mohon Input Nama Matakuliah!')
          } else if (isNaN(parseInt($("#Editkuliah").val()))) {
            alert('Input Bobot Kuliah/Responsi/Tutorial Hanya Angka!')
          } else if (isNaN(parseInt($("#Editseminar").val()))) {
            alert('Input Bobot Seminar Hanya Angka!')
          } else if (isNaN(parseInt($("#Editpraktikum").val()))) {
            alert('Input Bobot Praktikum/Praktik Lapangan Hanya Angka!')
          } else if (isNaN(parseInt($("#Editjam").val()))) {
            alert('Input Konversi Kredit ke Jam Hanya Angka!')
          } else if ($("#Editdokumen").val() == '') {
            alert('Mohon Input Nama Dokumen!')
          } else if ($("#Editunit").val() == '') {
            alert('Mohon Input Unit Penyelenggara!')
          } else {
            var fd = new FormData()
            fd.append('Id',$("#Id").val())
						fd.append('Homebase',$("#Edithomebase").val())
            fd.append('Semester',$("#Editsemester").val())
						fd.append('KodeMK',$("#Editkode").val())
						fd.append('NamaMK',$("#Editnama").val())
						fd.append('KompetensiMK',$("#Editkompetensi").val()+'$'+$("#Editsikap").val()+'$'+$("#Editpengetahuan").val()+'$'+$("#Editumum").val()+'$'+$("#Editkhusus").val())
						fd.append('Kuliah',$("#Editkuliah").val())
            fd.append('Seminar',$("#Editseminar").val())
            fd.append('Praktikum',$("#Editpraktikum").val())
            fd.append('Jam',$("#Editjam").val())
            fd.append('Dokumen',$("#Editdokumen").val())
            fd.append('Unit',$("#Editunit").val())
            fd.append('BuktiLama',$("#buktiLama").val())
            fd.append("Bukti", $('#Editbukti')[0].files[0])
            $.ajax({
							url: BaseURL+'Admin/UpdateKurikulum',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Admin/Kurikulum"
								}
								else {
									alert(Respon)
								}
							}
						})
          }
				})

        $(document).on("click",".Hapus",function(){
					var Data = $(this).attr('Hapus')
					var Pisah = Data.split("|");
					var Hapus = {Id: Pisah[0],Bukti: Pisah[1]}
					var Konfirmasi = confirm("Yakin Ingin Menghapus?");
      		if (Konfirmasi == true) {
						$.post(BaseURL+"Admin/HapusKurikulum", Hapus).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + "Admin/Kurikulum"
							} else {
								alert(Respon)
							}
						})
					}
				})

        $('#TabelKurikulum').DataTable( {
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
			})
		</script>
  </body>
</html>