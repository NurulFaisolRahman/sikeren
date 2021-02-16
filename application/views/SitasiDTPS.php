<div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-sm-12 my-2 ">    
                    <button type="button" class="btn btn-primary text-light mb-2" data-toggle="modal" data-target="#ModalInputSitasiDTPS"><i class="fa fa-plus"></i> <b>Input Karya Ilmiah DTPS Yang Di Sitasi</b></button> 
                      <div class="table-responsive mb-2">
                        <table id="TabelSitasiDTPS" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th class="text-center align-middle">No</th>
                              <th class="text-center align-middle">Home<br>base</th>
                              <th class="text-center align-middle">Nama Dosen</th>
                              <th class="text-center align-middle">Judul Artikel</th>
                              <th class="text-center align-middle">URL</th>
                              <th class="text-center align-middle">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($SitasiDTPS as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="text-center align-middle"><?=$key['Homebase']?></td>
                                <td class="text-center align-middle"><?=$key['Nama']?></td>
                                <td class="text-center align-middle"><?=$key['Judul']?></td>
                                <td class="text-center align-middle"><?=$key['URL']?></td>
                                <td class="text-center align-middle">
                                  <button Edit="<?=$key['Id']."|".$key['Homebase']."|".$key['Nama']."|".$key['Judul']."|".$key['Jumlah']."|".$key['Tahun']."|".$key['URL']?>" class="btn btn-sm btn-warning Edit"><i class="fas fa-edit"></i></button>
                                  <button Hapus="<?=$key['Id']?>" class="btn btn-sm btn-danger Hapus"><i class="fas fa-trash"></i></button>  
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
    <div class="modal fade" id="ModalInputSitasiDTPS">
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
                <div class="col-sm-7">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Nama</b></span>
                    </div>
                    <input type="text" class="form-control" id="namadosen" placeholder="Input Nama Dosen"> 
                  </div>
                </div>
                <div class="col-sm-5">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Jumlah Sitasi</b></span>
                    </div>
                    <input type="text" class="form-control" id="jumlahsitasi" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Judul</b></span>
                    </div>
                    <input type="text" class="form-control" id="judul" placeholder="Input Jurnal, Volume, Tahun, Nomor, Halaman">  
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>URL</b></span>
                    </div>
                    <input type="text" class="form-control" id="url" placeholder="Input URL Artikel/Jurnal Yang Disitasi"> 
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="InputSitasiDTPS"><b>Simpan</b></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalEditSitasiDTPS">
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
                    <input type="hidden" id="EditId"> 
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
                <div class="col-sm-7">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Nama</b></span>
                    </div>
                    <input type="text" class="form-control" id="Editnamadosen" placeholder="Input Nama Dosen"> 
                  </div>
                </div>
                <div class="col-sm-5">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Jumlah Sitasi</b></span>
                    </div>
                    <input type="text" class="form-control" id="Editjumlahsitasi" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Judul</b></span>
                    </div>
                    <input type="text" class="form-control" id="Editjudul" placeholder="Input Jurnal, Volume, Tahun, Nomor, Halaman"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>URL</b></span>
                    </div>
                    <input type="text" class="form-control" id="Editurl" placeholder="Input URL Artikel/Jurnal Yang Disitasi"> 
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="UpdateSitasiDTPS"><b>Simpan</b></button>
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

        $("#InputSitasiDTPS").click(function() {
          if (isNaN($("#tahun").val()) || $("#tahun").val() == "") {
            alert('Input Tahun Belum Benar!')
          } else if ($("#namadosen").val() == "" ) {
            alert('Mohon Input Nama Dosen!')
          } else if (isNaN(parseInt($("#jumlahsitasi").val()))) {
            alert('Input Jumlah Sitasi Belum Benar!')
          } else if ($("#judul").val() == "" ) {
            alert('Mohon Input Judul!')
          } else if ($("#url").val() == "" ) {
            alert('Mohon Input URL!')
          } else {
            var fd = new FormData()
						fd.append('Homebase',$("#homebase").val())
						fd.append('Tahun',$("#tahun").val())
						fd.append('Judul',$("#judul").val())
            fd.append('Jumlah',parseInt($("#jumlahsitasi").val()))
            fd.append('Nama',$("#namadosen").val())
						fd.append('URL',$("#url").val())
            $.ajax({
							url: BaseURL+'Admin/InputSitasiDTPS',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Admin/SitasiDTPS"
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
          $('#EditId').val(Pisah[0])
          $('#Edithomebase').val(Pisah[1])
          $('#Editnamadosen').val(Pisah[2])
					$('#Editjudul').val(Pisah[3])
          $('#Editjumlahsitasi').val(Pisah[4])
					$("#Edittahun").val(Pisah[5])
					$('#Editurl').val(Pisah[6])
          $('#ModalEditSitasiDTPS').modal("show")
				}) 

				$("#UpdateSitasiDTPS").click(function() {
					if (isNaN($("#Edittahun").val()) || $("#Edittahun").val() == "") {
            alert('Input Tahun Belum Benar!')
          } else if ($("#Editnamadosen").val() == "" ) {
            alert('Mohon Input Nama Dosen!')
          } else if (isNaN(parseInt($("#Editjumlahsitasi").val()))) {
            alert('Input Jumlah Sitasi Belum Benar!')
          } else if ($("#Editjudul").val() == "" ) {
            alert('Mohon Input Judul!')
          } else if ($("#Editurl").val() == "" ) {
            alert('Mohon Input URL!')
          } else {
            var fd = new FormData()
            fd.append('Id',$("#EditId").val())
						fd.append('Homebase',$("#Edithomebase").val())
						fd.append('Tahun',$("#Edittahun").val())
						fd.append('Judul',$("#Editjudul").val())
            fd.append('Jumlah',parseInt($("#Editjumlahsitasi").val()))
            fd.append('Nama',$("#Editnamadosen").val())
						fd.append('URL',$("#Editurl").val())
            $.ajax({
							url: BaseURL+'Admin/UpdateSitasiDTPS',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Admin/SitasiDTPS"
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
					var Hapus = {Id: Data}
					var Konfirmasi = confirm("Yakin Ingin Menghapus?"); 
      		if (Konfirmasi == true) {
						$.post(BaseURL+"Admin/HapusSitasiDTPS", Hapus).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + "Admin/SitasiDTPS"
							} else {
								alert(Respon)
							}
						})
					}
				})

        $('#TabelSitasiDTPS').DataTable( {
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