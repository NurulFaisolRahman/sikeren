<div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-sm-12 my-2 ">    
                    <button type="button" class="btn btn-primary text-light mb-2" data-toggle="modal" data-target="#ModalInputIntegrasi"><i class="fa fa-plus"></i> <b>Input Data</b></button> 
                      <div class="table-responsive mb-2">
                        <table id="TabelIntegrasi" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th class="text-center align-middle" style="width: 5%;">No</th>
                              <th class="text-center align-middle" style="width: 10%;">Homebase</th>
                              <th class="text-center align-middle">Nama Dosen</th>
                              <th class="text-center align-middle">Mata Kuliah</th>
                              <th class="text-center align-middle">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($Integrasi as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="text-center align-middle"><?=$key['Homebase']?></td>
                                <td class="text-center align-middle"><?=$key['Dosen']?></td>
                                <td class="text-center align-middle"><?=$key['MK']?></td>
                                <td class="text-center align-middle">
                                  <button Edit="<?=$key['Id']."|".$key['Homebase']."|".$key['Judul']."|".$key['Dosen']."|".$key['MK']."|".$key['Integrasi']."|".$key['Tahun']."|".$key['Bukti']?>" class="btn btn-sm btn-warning Edit"><i class="fas fa-edit"></i></button>
                                  <button Hapus="<?=$key['Id']."|".$key['Bukti']?>" class="btn btn-sm btn-danger Hapus"><i class="fas fa-trash"></i></button>  
                                  <button LihatSertifikat="<?=base_url('Integrasi/'.$key['Bukti'])?>" class="btn btn-sm btn-primary LihatSertifikat"><i class="fas fa-download"></i></button>  
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
    <div class="modal fade" id="ModalInputIntegrasi">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-sm-6">
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
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Tahun</b></span>
                    </div>
                    <input type="text" class="form-control" id="tahun" data-inputmask='"mask": "9999"' data-mask value="20"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Judul</b></span>
                    </div>
                    <input type="text" class="form-control" id="judul" placeholder="Integrasi Kegiatan Penelitan/PkM dalam Pembelajaran"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Nama Dosen</b></span>
                    </div>
                    <input type="text" class="form-control" id="dosen" placeholder="Input Nama Dosen"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Mata Kuliah</b></span>
                    </div>
                    <input type="text" class="form-control" id="mk" placeholder="Input Nama Mata Kuliah Yang Terintegrasi">  
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Bentuk Integrasi</b></span>
                    </div>
                    <input type="text" class="form-control" id="integrasi"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text bg-primary"><b>Upload Bukti</b></span>
										</div>
										<input class="form-control" type="file" id="bukti">
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
            <button type="submit" class="btn btn-success" id="InputIntegrasi"><b>Simpan</b></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalEditIntegrasi">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-warning">
        <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Homebase</b></span>
                    </div>
                    <select class="custom-select" id="Edithomebase">
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Tahun</b></span>
                    </div>
                    <input type="text" class="form-control" id="Edittahun" data-inputmask='"mask": "9999"' data-mask value="20"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Judul</b></span>
                    </div>
                    <input type="text" class="form-control" id="Editjudul" placeholder="Integrasi Kegiatan Penelitan/PkM dalam Pembelajaran"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Nama Dosen</b></span>
                    </div>
                    <input type="text" class="form-control" id="Editdosen" placeholder="Input Nama Dosen"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Mata Kuliah</b></span>
                    </div>
                    <input type="text" class="form-control" id="Editmk" placeholder="Input Nama Mata Kuliah Yang Terintegrasi">  
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Bentuk Integrasi</b></span>
                    </div>
                    <input type="text" class="form-control" id="Editintegrasi"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text bg-primary"><b>Upload Bukti</b></span>
                    </div>
                    <input type="hidden" class="form-control" id="Id">
                    <input type="hidden" class="form-control" id="buktiLama"> 
                    <input class="form-control" type="file" id="Editbukti">
                    <div class="input-group-prepend">
                      <button class="input-group-text bg-primary" id="CancelIntegrasi"><b>X</b></button>
                    </div>
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
            <button type="submit" class="btn btn-success" id="UpdateIntegrasi"><b>Simpan</b></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalSertifikat">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h5 class="modal-title font-weight-bold">Sertifikat Dosen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <embed id="PathSertifikat" src="" type="application/pdf" width="100%" height="400"/>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
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

        $('#integrasi').tooltip({'trigger':'focus', 'title': 'Bentu Integrasi dapat berupa tambahan materi perkuliahan, studi kasus, Bab/SubBab dalam buku ajar, atau lainnya yang relevan'});

        $(document).on("click",".LihatSertifikat",function(){
					var Path = $(this).attr('LihatSertifikat')
          $('#PathSertifikat').attr('src',Path)		
          $('#ModalSertifikat').modal("show")
				}) 

        $("#CancelIntegrasi").click(function() {
					$("#Editbukti").val("")
				})

        $("#InputIntegrasi").click(function() {
          if (isNaN($("#tahun").val()) || $("#tahun").val() == "") {
            alert('Input Tahun Belum Benar!')
          } else if ($("#judul").val() == "" ) {
            alert('Mohon Input Judul!')
          } else if ($("#dosen").val() == "" ) {
            alert('Mohon Input Nama Dosen!')
          } else if ($("#mk").val() == "" ) {
            alert('Mohon Input Mata Kuliah!')
          } else if ($("#integrasi").val() == "" ) {
            alert('Mohon Input Bentuk Integrasi!')
          } else {
            var fd = new FormData()
						fd.append('Homebase',$("#homebase").val())
						fd.append('Tahun',$("#tahun").val())
						fd.append('Judul',$("#judul").val())
            fd.append('Dosen',$("#dosen").val())
            fd.append('MK',$("#mk").val())
						fd.append('Integrasi',$("#integrasi").val())
            fd.append("Bukti", $('#bukti')[0].files[0])
            $.ajax({
							url: BaseURL+'Admin/InputIntegrasi',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Admin/Integrasi"
								}
								else {
									alert(Respon)
								}
							}
						})
          }
        })

        $(document).on("click",".Edit",function(){
					var Data = $(this).attr('Edit')
					var Pisah = Data.split("|");
          $('#Id').val(Pisah[0])
          $('#Edithomebase').val(Pisah[1])
          $('#Editjudul').val(Pisah[2])
					$('#Editdosen').val(Pisah[3])
          $('#Editmk').val(Pisah[4])
					$("#Editintegrasi").val(Pisah[5])
					$('#Edittahun').val(Pisah[6])
          $('#buktiLama').val(Pisah[7])
          $('#ModalEditIntegrasi').modal("show")
				}) 

				$("#UpdateIntegrasi").click(function() {
					if (isNaN($("#Edittahun").val()) || $("#Edittahun").val() == "") {
            alert('Input Tahun Belum Benar!')
          } else if ($("#Editjudul").val() == "" ) {
            alert('Mohon Input Judul!')
          } else if ($("#Editdosen").val() == "" ) {
            alert('Mohon Input Nama Dosen!')
          } else if ($("#Editmk").val() == "" ) {
            alert('Mohon Input Mata Kuliah!')
          } else if ($("#Editintegrasi").val() == "" ) {
            alert('Mohon Input Bentuk Integrasi!')
          } else {
            var fd = new FormData()
            fd.append('Id',$("#Id").val())
						fd.append('Homebase',$("#Edithomebase").val())
						fd.append('Tahun',$("#Edittahun").val())
						fd.append('Judul',$("#Editjudul").val())
            fd.append('Dosen',$("#Editdosen").val())
            fd.append('MK',$("#Editmk").val())
						fd.append('Integrasi',$("#Editintegrasi").val())
            fd.append('BuktiLama',$("#buktiLama").val())
            fd.append("Bukti", $('#Editbukti')[0].files[0])
            $.ajax({
							url: BaseURL+'Admin/UpdateIntegrasi',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Admin/Integrasi"
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
						$.post(BaseURL+"Admin/HapusIntegrasi", Hapus).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + "Admin/Integrasi"
							} else {
								alert(Respon)
							}
						})
					}
				})

        $('#TabelIntegrasi').DataTable( {
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