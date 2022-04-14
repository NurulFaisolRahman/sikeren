<div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-sm-12 my-2 ">    
                    <button type="button" class="btn btn-primary text-light mb-2" data-toggle="modal" data-target="#ModalInputPenelitianDosenMhs"><i class="fa fa-plus"></i> <b>Input Data</b></button> 
                      <div class="table-responsive mb-2">
                        <table id="TabelPenelitianDosenMhs" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th class="text-center align-middle" style="width: 5%;">No</th>
                              <th class="text-center align-middle" style="width: 10%;">Homebase</th>
                              <th class="text-center align-middle">Nama Dosen</th>
                              <th class="text-center align-middle">Nama Mahasiswa</th>
                              <th class="text-center align-middle">Judul</th>
                              <th class="text-center align-middle">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($PenelitianDosenMhs as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="text-center align-middle"><?=$key['Homebase']?></td>
                                <td class="text-center align-middle"><?=$key['Dosen']?></td>
                                <td class="text-center align-middle"><?=$key['Mhs']?></td>
                                <td class="text-center align-middle"><?=$key['Judul']?></td>
                                <td class="text-center align-middle">
                                  <button Edit="<?=$key['Id']."|".$key['Dosen']."|".$key['Tema']."|".$key['Mhs']."|".$key['Judul']."|".$key['Tahun']."|".$key['Bukti']."|".$key['Homebase']?>" class="btn btn-sm btn-warning Edit"><i class="fas fa-edit"></i></button>
                                  <button Hapus="<?=$key['Id']."|".$key['Bukti']?>" class="btn btn-sm btn-danger Hapus"><i class="fas fa-trash"></i></button>  
                                  <button LihatSertifikat="<?=base_url('PenelitianDosenMhs/'.$key['Bukti'])?>" class="btn btn-sm btn-primary LihatSertifikat"><i class="fas fa-download"></i></button>  
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
    <div class="modal fade" id="ModalInputPenelitianDosenMhs">
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
                    <input type="text" class="form-control" id="Tahun" data-inputmask='"mask": "9999"' data-mask value="20"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Nama Dosen</b></span>
                    </div>
                    <input type="text" class="form-control" id="Dosen" placeholder="Input Nama Dosen"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Tema</b></span>
                    </div>
                    <input type="text" class="form-control" id="Tema" placeholder="Input Tema Penelitian sesuai Roadmap"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Nama Mahasiswa</b></span>
                    </div>
                    <input type="text" class="form-control" id="Mhs" placeholder="Input Nama Mahasiswa">  
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Judul Kegiatan</b></span>
                    </div>
                    <input type="text" class="form-control" id="Judul" placeholder="Input Judul Kegiatan"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text bg-primary"><b>Bukti</b></span>
										</div>
										<input class="form-control" type="file" id="Bukti">
                  </div>
                  <pre class="text-danger"><b>Bukti Yang Diupload Dalam Format Pdf</b></pre>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="InputPenelitianDosenMhs"><b>Simpan</b></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalEditPenelitianDosenMhs">
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
                    <input type="text" class="form-control" id="EditTahun" data-inputmask='"mask": "9999"' data-mask value="20"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Nama Dosen</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditDosen" placeholder="Input Nama Dosen"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Tema</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditTema" placeholder="Input Tema Penelitian sesuai Roadmap"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Nama Mahasiswa</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditMhs" placeholder="Input Nama Mahasiswa">  
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Judul Kegiatan</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditJudul" placeholder="Input Judul Kegiatan"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text bg-primary"><b>Bukti</b></span>
                    </div>
                    <input class="form-control" type="hidden" id="Id">
                    <input class="form-control" type="hidden" id="BuktiLama">
                    <input class="form-control" type="file" id="EditBukti">
                    <div class="input-group-prepend">
                      <button class="input-group-text bg-primary" id="CancelPenelitianDosenMhs"><b>X</b></button>
                    </div>
                  </div>
                  <pre class="text-danger"><b>Bukti Yang Diupload Dalam Format Pdf</b></pre>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="UpdatePenelitianDosenMhs"><b>Simpan</b></button>
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

        $(document).on("click",".LihatSertifikat",function(){
					var Path = $(this).attr('LihatSertifikat')
          $('#PathSertifikat').attr('src',Path)		
          $('#ModalSertifikat').modal("show")
				}) 

        $("#CancelPenelitianDosenMhs").click(function() {
					$("#EditBukti").val("")
				})

        $("#InputPenelitianDosenMhs").click(function() {
          if (isNaN($("#Tahun").val()) || $("#Tahun").val() == "") {
            alert('Input Tahun Belum Benar!')
          } else if ($("#Dosen").val() == "") {
            alert('Mohon Input Nama Dosen!')
          } else if ($("#Tema").val() == "" ) {
            alert('Mohon Input Tema!')
          } else if ($("#Mhs").val() == "" ) {
            alert('Mohon Input Nama Mahasiswa!')
          } else if ($("#Judul").val() == "" ) {
            alert('Mohon Input Judul Kegiatan!')
          } else {
            var fd = new FormData()
            fd.append('Homebase',$("#homebase").val())
						fd.append('Dosen',$("#Dosen").val())
						fd.append('Tema',$("#Tema").val())
            fd.append('Mhs',$("#Mhs").val())
            fd.append('Judul',$("#Judul").val())
						fd.append('Tahun',$("#Tahun").val())
            fd.append("Bukti", $('#Bukti')[0].files[0])
            $.ajax({
							url: BaseURL+'Admin/InputPenelitianDosenMhs',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Admin/PenelitianDosenMhs"
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
          $('#EditDosen').val(Pisah[1])
					$('#EditTema').val(Pisah[2])
          $('#EditMhs').val(Pisah[3])
					$("#EditJudul").val(Pisah[4])
					$('#EditTahun').val(Pisah[5])
          $('#BuktiLama').val(Pisah[6])
          $('#Edithomebase').val(Pisah[7])
          $('#ModalEditPenelitianDosenMhs').modal("show")
				}) 

				$("#UpdatePenelitianDosenMhs").click(function() {
					if (isNaN($("#EditTahun").val()) || $("#EditTahun").val() == "") {
            alert('Input Tahun Belum Benar!')
          } else if ($("#EditDosen").val() == "") {
            alert('Mohon Input Nama Dosen!')
          } else if ($("#EditTema").val() == "" ) {
            alert('Mohon Input Tema!')
          } else if ($("#EditMhs").val() == "" ) {
            alert('Mohon Input Nama Mahasiswa!')
          } else if ($("#EditJudul").val() == "" ) {
            alert('Mohon Input Judul Kegiatan!')
          } else {
            var fd = new FormData()
            fd.append('Id',$("#Id").val())
            fd.append('Homebase',$("#Edithomebase").val())
						fd.append('Dosen',$("#EditDosen").val())
						fd.append('Tema',$("#EditTema").val())
            fd.append('Mhs',$("#EditMhs").val())
            fd.append('Judul',$("#EditJudul").val())
						fd.append('Tahun',$("#EditTahun").val())
            fd.append('BuktiLama',$("#BuktiLama").val())
            fd.append("Bukti", $('#EditBukti')[0].files[0])
            $.ajax({
							url: BaseURL+'Admin/UpdatePenelitianDosenMhs',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Admin/PenelitianDosenMhs"
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
						$.post(BaseURL+"Admin/HapusPenelitianDosenMhs", Hapus).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + "Admin/PenelitianDosenMhs"
							} else {
								alert(Respon)
							}
						})
					}
				})

        $('#TabelPenelitianDosenMhs').DataTable( {
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