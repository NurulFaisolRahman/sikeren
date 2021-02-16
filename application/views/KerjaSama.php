<div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-sm-12 my-2 ">    
                    <button type="button" class="btn btn-primary text-light mb-2" data-toggle="modal" data-target="#ModalInputKerjaSama"><i class="fa fa-plus"></i> <b>Input Kerjasama</b></button> 
                      <div class="table-responsive mb-2">
                        <table id="TabelKerjaSama" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th class="text-center align-middle">No</th>
                              <th class="align-middle">Homebase</th>
                              <th class="align-middle">Judul</th>
                              <th class="align-middle">Bidang</th>
                              <th class="align-middle">Tahun</th>
                              <th class="align-middle">Expired</th>
                              <th class="align-middle">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($KerjaSama as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['Homebase']?></td>
                                <td class="align-middle"><?=$key['Judul']?></td>
                                <td class="align-middle"><?=$key['Bidang']?></td>
                                <td class="align-middle"><?=$key['Tahun']?></td>
                                <td class="align-middle"><?=$key['Expired']?></td>
                                <td class="align-middle">
                                  <button Edit="<?=$key['Id']."|".$key['Mitra']."|".$key['Tingkat']."|".$key['Bidang']."|".$key['Judul']."|".$key['Manfaat']."|".$key['Waktu']."|".$key['Tahun']."|".$key['KerjaSama']."|".$key['Bukti']."|".$key['Homebase']."|".$key['Expired']?>" class="btn btn-sm btn-warning Edit"><i class="fas fa-edit"></i></button>
                                  <button Hapus="<?=$key['Id']."|".$key['Bukti']?>" class="btn btn-sm btn-danger Hapus"><i class="fas fa-trash"></i></button>  
                                  <button LihatSertifikat="<?=base_url('KerjaSama/'.$key['Bukti'])?>" class="btn btn-sm btn-primary LihatSertifikat"><i class="fas fa-download"></i></button>  
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
    <div class="modal fade" id="ModalInputKerjaSama">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body">
            <div class="container">
							<div class="row">
								<div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Lembaga Mitra</b></span>
                    </div>
                    <input type="text" class="form-control" id="Mitra">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Homebase</b></span>
                    </div>
                    <select class="custom-select" id="HomebaseKerjaSama">
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Tingkat</b></span>
                    </div>
                    <select class="custom-select" id="Tingkat">
                      <option value="Internasional">Internasional</option>
                      <option value="Nasional">Nasional</option>
                      <option value="Lokal">Lokal</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Bidang</b></span>
                    </div>
                    <select class="custom-select" id="Bidang">
                      <option value="Pendidikan">Pendidikan</option>
                      <option value="Penelitian">Penelitian</option>
                      <option value="Pengabdian">Pengabdian</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Tahun Kerjasama</b></span>
                    </div>
                    <input type="text" class="form-control" id="TahunKerjasama" data-inputmask='"mask": "9999"' data-mask value="20"> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Tahun Berakhirnya Kerjasama</b></span>
                    </div>
                    <input type="text" class="form-control" id="Expired" data-inputmask='"mask": "9999"' data-mask value="20"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Judul Kegiatan Kerjasama</b></span>
                    </div>
                    <input type="text" class="form-control" id="Judul"> 
                  </div>
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Manfaat Bagi Program Studi</b></span>
                    </div>
                    <input type="text" class="form-control" id="Manfaat"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Waktu & Durasi</b></span>
                    </div>
                    <input type="text" class="form-control" id="Waktu"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Bukti Kerjasama</b></span>
                    </div>
                    <input type="text" class="form-control" id="KerjaSama">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text bg-primary"><b>Upload Bukti</b></span>
										</div>
										<input class="form-control" type="file" id="BuktiKerjaSama">
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
            <button type="submit" class="btn btn-success" id="InputKerjaSama"><b>Simpan</b></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalEditKerjaSama">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body">
            <div class="container">
							<div class="row">
								<div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Lembaga Mitra</b></span>
                    </div>
                    <input type="hidden" class="form-control" id="IdKerjaSama">
                    <input type="text" class="form-control" id="EditMitra">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Homebase</b></span>
                    </div>
                    <select class="custom-select" id="EditHomebaseKerjaSama">
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Tingkat</b></span>
                    </div>
                    <select class="custom-select" id="EditTingkat">
                      <option value="Internasional">Internasional</option>
                      <option value="Nasional">Nasional</option>
                      <option value="Lokal">Lokal</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Bidang</b></span>
                    </div>
                    <select class="custom-select" id="EditBidang">
                      <option value="Pendidikan">Pendidikan</option>
                      <option value="Penelitian">Penelitian</option>
                      <option value="Pengabdian">Pengabdian</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Tahun Kerjasama</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditTahunKerjasama" data-inputmask='"mask": "9999"' data-mask value="20"> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Tahun Berakhirnya Kerjasama</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditExpired" data-inputmask='"mask": "9999"' data-mask value="20"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Judul Kegiatan Kerjasama</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditJudul"> 
                  </div>
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Manfaat Bagi Program Studi</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditManfaat"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Waktu & Durasi</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditWaktu"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Bukti Kerjasama</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditKerjaSama" placeholder="Surat Perjanjian Kerjasama">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text bg-primary"><b>Upload Bukti</b></span>
										</div>
                    <input class="form-control" type="hidden" id="BuktiKerjaSamaLama">
                    <input class="form-control" type="file" id="EditBuktiKerjaSama">
                    <div class="input-group-prepend">
											<button class="input-group-text bg-primary" id="CancelEditBuktiKerjaSama"><b>X</b></button>
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
            <button type="submit" class="btn btn-success" id="UpdateKerjaSama"><b>Simpan</b></button>
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

        $('#KerjaSama').tooltip({'trigger':'focus', 'title': 'Bukti kerjasama dapat berupa Surat Penugasan, Surat Perjanjian KerjaSama, Bukti-bukti pelaksanaan (laporan,hasil kerjasama), atau bukti lain yang relevan. Dokumen MoU, MoA, Dokumen Sejenis yang memayungi pelaksanaan kerjasama, tidak dapat dijadikan bukti realisasi kerjasama'});

        $("#InputKerjaSama").click(function() {
          if ($("#Mitra").val() == '') {
            alert('Mohon Isi Lembaga Mitra!')
          } else if (isNaN($("#TahunKerjasama").val())) {
            alert('Input Tahun Kerjasama Belum Benar!')
          } else if (isNaN($("#Expired").val())) {
            alert('Input Tahun Berakhirnya Kerjasama Belum Benar!')
          } else if ($("#Judul").val() == '') {
            alert('Mohon Isi Judul Kerjasama!')
          } else if ($("#Manfaat").val() == '') {
            alert('Mohon Isi Manfaat Bagi Program Studi!')
          } else if ($("#Waktu").val() == '') {
            alert('Mohon Isi Waktu & Durasi!')
          } else if ($("#KerjaSama").val() == '') {
            alert('Mohon Isi Bukti Kerjasama!')
          } else {
            var fd = new FormData()
						fd.append('Mitra',$("#Mitra").val())
            fd.append('Homebase',$("#HomebaseKerjaSama").val())
						fd.append('Tingkat',$("#Tingkat").val())
						fd.append('Bidang',$("#Bidang").val())
						fd.append('Judul',$("#Judul").val())
						fd.append('Manfaat',$("#Manfaat").val())
						fd.append('Waktu',$("#Waktu").val())
            fd.append('Tahun',$("#TahunKerjasama").val())
            fd.append('Expired',$("#Expired").val())
            fd.append('KerjaSama',$("#KerjaSama").val())
            fd.append("BuktiKerjaSama", $('#BuktiKerjaSama')[0].files[0])
            $.ajax({
							url: BaseURL+'Admin/InputKerjaSama',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Admin/KerjaSama"
								}
								else {
									alert(Respon)
								}
							}
						})
          }
        })

        $("#CancelEditBuktiKerjaSama").click(function() {
					$("#EditBuktiKerjaSama").val("")
				})

        $(document).on("click",".Edit",function(){
					var Data = $(this).attr('Edit')
					var Pisah = Data.split("|");
					$('#IdKerjaSama').val(Pisah[0])
          $('#EditMitra').val(Pisah[1])
					$('#EditTingkat').val(Pisah[2])
					$("#EditBidang").val(Pisah[3])
					$('#EditJudul').val(Pisah[4])
					$("#EditManfaat").val(Pisah[5])
					$('#EditWaktu').val(Pisah[6])
					$('#EditExpired').val(Pisah[11])
          $('#EditKerjaSama').val(Pisah[8])
          $('#BuktiKerjaSamaLama').val(Pisah[9])
          $('#EditHomebaseKerjaSama').val(Pisah[10])
          $('#EditTahunKerjasama').val(Pisah[7])
          $('#ModalEditKerjaSama').modal("show")
				}) 

				$("#UpdateKerjaSama").click(function() {
					if ($("#EditMitra").val() == '') {
            alert('Mohon Isi Lembaga Mitra!')
          } else if (isNaN($("#EditTahunKerjasama").val())) {
            alert('Input Tahun Kerjasama Belum Benar!')
          } else if (isNaN($("#EditExpired").val())) {
            alert('Input Tahun Berakhirnya Kerjasama Belum Benar!')
          } else if ($("#EditJudul").val() == '') {
            alert('Mohon Isi Judul Kerjasama!')
          } else if ($("#EditManfaat").val() == '') {
            alert('Mohon Isi Manfaat Bagi Program Studi!')
          } else if ($("#EditWaktu").val() == '') {
            alert('Mohon Isi Waktu & Durasi!')
          } else if ($("#EditKerjaSama").val() == '') {
            alert('Mohon Isi Bukti Kerjasama!')
          } else {
            var fd = new FormData()
						fd.append('Id',$("#IdKerjaSama").val())
            fd.append('Homebase',$("#EditHomebaseKerjaSama").val())
            fd.append('Mitra',$("#EditMitra").val())
						fd.append('Tingkat',$("#EditTingkat").val())
						fd.append('Bidang',$("#EditBidang").val())
						fd.append('Judul',$("#EditJudul").val())
						fd.append('Manfaat',$("#EditManfaat").val())
						fd.append('Waktu',$("#EditWaktu").val())
            fd.append('Tahun',$("#EditTahunKerjasama").val())
            fd.append('Expired',$("#EditExpired").val())
            fd.append('KerjaSama',$("#EditKerjaSama").val())
            fd.append('BuktiKerjaSamaLama',$("#BuktiKerjaSamaLama").val())
            fd.append("BuktiKerjaSama", $('#EditBuktiKerjaSama')[0].files[0])
            $.ajax({
							url: BaseURL+'Admin/UpdateKerjaSama',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Admin/KerjaSama"
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
						$.post(BaseURL+"Admin/HapusKerjaSama", Hapus).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + "Admin/KerjaSama"
							} else {
								alert(Respon)
							}
						})
					}
				})

        $('#TabelKerjaSama').DataTable( {
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