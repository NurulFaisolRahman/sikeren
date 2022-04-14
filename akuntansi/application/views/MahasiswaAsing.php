<div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-sm-12 my-2 ">    
                    <button type="button" class="btn btn-primary text-light mb-2" data-toggle="modal" data-target="#ModalInputMahasiswaAsing"><i class="fa fa-plus"></i> <b>Input Data</b></button> 
                      <div class="table-responsive mb-2">
                        <table id="TabelMahasiswaAsing" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th class="text-center align-middle">No</th>
                              <th class="text-center align-middle">Homebase</th>
                              <th class="text-center align-middle">Tahun</th>
                              <th class="text-center align-middle">Jumlah Mahasiswa<br>Aktif</th>
                              <th class="text-center align-middle">Jumlah Mahasiswa<br>Full Time</th>
                              <th class="text-center align-middle">Jumlah Mahasiswa<br>Part Time</th>
                              <th class="text-center align-middle">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($MahasiswaAsing as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="text-center align-middle"><?=$key['Homebase']?></td>
                                <td class="text-center align-middle"><?=$key['Tahun']?></td>
                                <td class="text-center align-middle"><?=$key['MhsAktif']?></td>
                                <td class="text-center align-middle"><?=$key['MhsFull']?></td>
                                <td class="text-center align-middle"><?=$key['MhsPart']?></td>
                                <td class="text-center align-middle">
                                  <button Edit="<?=$key['Homebase']."|".$key['Tahun']."|".$key['MhsAktif']."|".$key['MhsFull']."|".$key['MhsPart']?>" class="btn btn-sm btn-warning Edit"><i class="fas fa-edit"></i></button>
                                  <button Hapus="<?=$key['Homebase']."|".$key['Tahun']?>" class="btn btn-sm btn-danger Hapus"><i class="fas fa-trash"></i></button>  
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
    <div class="modal fade" id="ModalInputMahasiswaAsing">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-sm-8">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Homebase</b></span>
                    </div>
                    <select class="custom-select" id="homebase">
                      <option value="S1 Ekonomi Pembangunan">S1 Ekonomi Pembangunan</option>
                      <option value="S2 Ilmu Ekonomi">S2 Ilmu Ekonomi</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
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
                      <span class="input-group-text bg-primary"><b>Jumlah Mahasiswa Aktif</b></span>
                    </div>
                    <input type="text" class="form-control" id="MhsAktif" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Jumlah Mahasiswa Asing Full Time</b></span>
                    </div>
                    <input type="text" class="form-control" id="MhsFull" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Jumlah Mahasiswa Asing Part Time</b></span>
                    </div>
                    <input type="text" class="form-control" id="MhsPart" placeholder="0"> 
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="InputMahasiswaAsing"><b>Simpan</b></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalEditMahasiswaAsing">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-sm-8">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Homebase</b></span>
                    </div>
                    <input type="hidden" class="form-control" id="HomebaseLama"> 
                    <select class="custom-select" id="Edithomebase">
                      <option value="S1 Ekonomi Pembangunan">S1 Ekonomi Pembangunan</option>
                      <option value="S2 Ilmu Ekonomi">S2 Ilmu Ekonomi</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Tahun</b></span>
                    </div>
                    <input type="hidden" class="form-control" id="TahunLama"> 
                    <input type="text" class="form-control" id="Edittahun" data-inputmask='"mask": "9999"' data-mask value="20"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Jumlah Mahasiswa Aktif</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditMhsAktif" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Jumlah Mahasiswa Asing Full Time</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditMhsFull" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Jumlah Mahasiswa Asing Part Time</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditMhsPart" placeholder="0"> 
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="UpdateMahasiswaAsing"><b>Simpan</b></button>
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

        $("#InputMahasiswaAsing").click(function() {
          if (isNaN($("#tahun").val())) {
            alert('Input Tahun Belum Benar!')
          } else if (isNaN(parseInt($("#MhsAktif").val()))) {
            alert('Input Jumlah Mahasiswa Aktif Belum Benar!')
          } else if (isNaN(parseInt($("#MhsFull").val()))) {
            alert('Input Jumlah Mahasiswa Asing Full Time Belum Benar!')
          } else if (isNaN(parseInt($("#MhsPart").val()))) {
            alert('Input Jumlah Mahasiswa Asing Part Time Belum Benar!')
          } else {
            var fd = new FormData()
						fd.append('Homebase',$("#homebase").val())
						fd.append('Tahun',$("#tahun").val())
						fd.append('MhsAktif',parseInt($("#MhsAktif").val()))
            fd.append('MhsFull',parseInt($("#MhsFull").val()))
						fd.append('MhsPart',parseInt($("#MhsPart").val()))
            $.ajax({
							url: BaseURL+'Admin/InputMahasiswaAsing',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Admin/MahasiswaAsing"
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
					$('#HomebaseLama').val(Pisah[0])
          $('#Edithomebase').val(Pisah[0])
          $('#TahunLama').val(Pisah[1])
					$('#Edittahun').val(Pisah[1])
          $('#EditMhsAktif').val(Pisah[2])
					$("#EditMhsFull").val(Pisah[3])
					$('#EditMhsPart').val(Pisah[4])
          $('#ModalEditMahasiswaAsing').modal("show")
				}) 

				$("#UpdateMahasiswaAsing").click(function() {
					if (isNaN($("#Edittahun").val())) {
            alert('Input Tahun Belum Benar!')
          } else if (isNaN(parseInt($("#EditMhsAktif").val()))) {
            alert('Input Jumlah Mahasiswa Aktif Belum Benar!')
          } else if (isNaN(parseInt($("#EditMhsFull").val()))) {
            alert('Input Jumlah Mahasiswa Asing Full Time Belum Benar!')
          } else if (isNaN(parseInt($("#EditMhsPart").val()))) {
            alert('Input Jumlah Mahasiswa Asing Part Time Belum Benar!')
          } else {
            var fd = new FormData()
						fd.append('HomebaseLama',$("#HomebaseLama").val())
            fd.append('Homebase',$("#Edithomebase").val())
						fd.append('Tahun',$("#Edittahun").val())
						fd.append('TahunLama',$("#TahunLama").val())
            fd.append('MhsAktif',parseInt($("#EditMhsAktif").val()))
            fd.append('MhsFull',parseInt($("#EditMhsFull").val()))
						fd.append('MhsPart',parseInt($("#EditMhsPart").val()))
            $.ajax({
							url: BaseURL+'Admin/UpdateMahasiswaAsing',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Admin/MahasiswaAsing"
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
					var Hapus = {Homebase: Pisah[0],Tahun: Pisah[1]}
					var Konfirmasi = confirm("Yakin Ingin Menghapus?"); 
      		if (Konfirmasi == true) {
						$.post(BaseURL+"Admin/HapusMahasiswaAsing", Hapus).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + "Admin/MahasiswaAsing"
							} else {
								alert(Respon)
							}
						})
					}
				})

        $('#TabelMahasiswaAsing').DataTable( {
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