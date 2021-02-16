<div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-sm-12 my-2 ">    
                    <button type="button" class="btn btn-primary text-light mb-2" data-toggle="modal" data-target="#ModalInputMahasiswaBaru"><i class="fa fa-plus"></i> <b>Input Data</b></button> 
                      <div class="table-responsive mb-2">
                        <table id="TabelMahasiswaBaru" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th class="text-center align-middle" rowspan="2">No</th>
                              <th class="text-center align-middle" rowspan="2">Home<br>base</th>
                              <th class="text-center align-middle" rowspan="2">Tahun</th>
                              <th class="text-center align-middle" rowspan="2">Aksi</th>
                              <th class="text-center align-middle" rowspan="2">Daya<br>Tampung</th>
                              <th class="text-center align-middle" colspan="2">Jumlah<br>Calon Mahasiswa</th>
                              <th class="text-center align-middle" colspan="2">Jumlah<br>Mahasiswa Baru</th>
                              <th class="text-center align-middle" colspan="2">Jumlah<br>Mahasiswa Aktif</th> 
                            </tr>
                            <tr>
                              <th class="text-center align-middle">Pendaftar</th>
                              <th class="text-center align-middle">Lulus<br>Seleksi</th>
                              <th class="text-center align-middle">Reguler</th>
                              <th class="text-center align-middle">Transfer</th>
                              <th class="text-center align-middle">Reguler</th>
                              <th class="text-center align-middle">Transfer</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($MahasiswaBaru as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="text-center align-middle"><?=$key['Homebase']?></td>
                                <td class="text-center align-middle"><?=$key['Tahun']?></td>
                                <td class="text-center align-middle">
                                  <button Edit="<?=$key['Homebase']."|".$key['Tahun']."|".$key['DayaTampung']."|".$key['MhsPendaftar']."|".$key['MhsLulus']."|".$key['MhsBaruReguler']."|".$key['MhsBaruTransfer']."|".$key['MhsAktifReguler']."|".$key['MhsAktifTransfer']?>" class="btn btn-sm btn-warning Edit"><i class="fas fa-edit"></i></button>
                                  <button Hapus="<?=$key['Homebase']."|".$key['Tahun']?>" class="btn btn-sm btn-danger Hapus"><i class="fas fa-trash"></i></button>  
                                </td> 
                                <td class="text-center align-middle"><?=$key['DayaTampung']?></td>
                                <td class="text-center align-middle"><?=$key['MhsPendaftar']?></td>
                                <td class="text-center align-middle"><?=$key['MhsLulus']?></td>
                                <td class="text-center align-middle"><?=$key['MhsBaruReguler']?></td>
                                <td class="text-center align-middle"><?=$key['MhsBaruTransfer']?></td>
                                <td class="text-center align-middle"><?=$key['MhsAktifReguler']?></td>
                                <td class="text-center align-middle"><?=$key['MhsAktifTransfer']?></td>
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
    <div class="modal fade" id="ModalInputMahasiswaBaru">
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
                      <span class="input-group-text bg-primary"><b>Tahun</b></span>
                    </div>
                    <input type="text" class="form-control" id="tahun" data-inputmask='"mask": "9999"' data-mask value="20"> 
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Daya Tampung</b></span>
                    </div>
                    <input type="text" class="form-control" id="DayaTampung" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Jumlah Calon Mahasiswa</b></span>
                    </div>
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success"><b>Pendaftar</b></span>
                    </div>
                    <input type="text" class="form-control" id="Pendaftar" placeholder="0"> 
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success"><b>Lulus Seleksi</b></span>
                    </div>
                    <input type="text" class="form-control" id="Lulus" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Jumlah Mahasiswa Baru</b></span>
                    </div>
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success"><b>Reguler</b></span>
                    </div>
                    <input type="text" class="form-control" id="MhsBaruReguler" placeholder="0"> 
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success"><b>Transfer</b></span>
                    </div>
                    <input type="text" class="form-control" id="MhsBaruTransfer" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Jumlah Mahasiswa Aktif</b></span>
                    </div>
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success"><b>Reguler</b></span>
                    </div>
                    <input type="text" class="form-control" id="MhsAktifReguler" placeholder="0"> 
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success"><b>Transfer</b></span>
                    </div>
                    <input type="text" class="form-control" id="MhsAktifTransfer" placeholder="0"> 
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="InputMahasiswaBaru"><b>Simpan</b></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalEditMahasiswaBaru">
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
                    <input type="hidden" class="form-control" id="homebaseLama"> 
                    <select class="custom-select" id="Edithomebase">
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Tahun</b></span>
                    </div>
                    <input type="hidden" class="form-control" id="tahunLama"> 
                    <input type="text" class="form-control" id="Edittahun" data-inputmask='"mask": "9999"' data-mask value="20"> 
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Daya Tampung</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditDayaTampung" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Jumlah Calon Mahasiswa</b></span>
                    </div>
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success"><b>Pendaftar</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditPendaftar" placeholder="0"> 
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success"><b>Lulus Seleksi</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditLulus" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Jumlah Mahasiswa Baru</b></span>
                    </div>
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success"><b>Reguler</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditMhsBaruReguler" placeholder="0"> 
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success"><b>Transfer</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditMhsBaruTransfer" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Jumlah Mahasiswa Aktif</b></span>
                    </div>
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success"><b>Reguler</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditMhsAktifReguler" placeholder="0"> 
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success"><b>Transfer</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditMhsAktifTransfer" placeholder="0"> 
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="UpdateMahasiswaBaru"><b>Simpan</b></button>
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

        $("#InputMahasiswaBaru").click(function() {
          if (isNaN($("#tahun").val())) {
            alert('Input Tahun Belum Benar!')
          } else if (isNaN(parseInt($("#DayaTampung").val()))) {
            alert('Input Daya Tampung Belum Benar!')
          } else if (isNaN(parseInt($("#Pendaftar").val()))) {
            alert('Input Pendaftar Belum Benar!')
          } else if (isNaN(parseInt($("#Lulus").val()))) {
            alert('Input Lulus Belum Benar!')
          } else if (isNaN(parseInt($("#MhsBaruReguler").val()))) {
            alert('Input Jumlah Mahasiswa Baru Reguler Belum Benar!')
          } else if (isNaN(parseInt($("#MhsBaruTransfer").val()))) {
            alert('Input Jumlah Mahasiswa Baru Transfer Belum Benar!')
          } else if (isNaN(parseInt($("#MhsAktifReguler").val()))) {
            alert('Input Jumlah Mahasiswa Aktif Reguler Belum Benar!')
          } else if (isNaN(parseInt($("#MhsAktifTransfer").val()))) {
            alert('Input Jumlah Mahasiswa Aktif Transfer Belum Benar!')
          } else {
            var fd = new FormData()
						fd.append('Homebase',$("#homebase").val())
						fd.append('Tahun',$("#tahun").val())
            fd.append('DayaTampung',$("#DayaTampung").val())
            fd.append('MhsPendaftar',parseInt($("#Pendaftar").val()))
						fd.append('MhsLulus',parseInt($("#Lulus").val()))
						fd.append('MhsBaruReguler',parseInt($("#MhsBaruReguler").val()))
						fd.append('MhsBaruTransfer',parseInt($("#MhsBaruTransfer").val()))
            fd.append('MhsAktifReguler',parseInt($("#MhsAktifReguler").val()))
            fd.append('MhsAktifTransfer',parseInt($("#MhsAktifTransfer").val()))
            $.ajax({
							url: BaseURL+'Admin/InputMahasiswaBaru',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Admin/MahasiswaBaru"
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
					$('#homebaseLama').val(Pisah[0])
          $('#Edithomebase').val(Pisah[0])
          $('#tahunLama').val(Pisah[1])
					$('#Edittahun').val(Pisah[1])
					$("#EditDayaTampung").val(Pisah[2])
          $("#EditPendaftar").val(Pisah[3])
					$('#EditLulus').val(Pisah[4])
					$("#EditMhsBaruReguler").val(Pisah[5])
					$('#EditMhsBaruTransfer').val(Pisah[6])
					$('#EditMhsAktifReguler').val(Pisah[7])
          $('#EditMhsAktifTransfer').val(Pisah[8])
          $('#ModalEditMahasiswaBaru').modal("show")
				}) 

				$("#UpdateMahasiswaBaru").click(function() {
					if (isNaN($("#Edittahun").val())) {
            alert('Input Tahun Belum Benar!')
          } else if (isNaN(parseInt($("#EditDayaTampung").val()))) {
            alert('Input Daya Tampung Belum Benar!')
          } else if (isNaN(parseInt($("#EditPendaftar").val()))) {
            alert('Input Pendaftar Belum Benar!')
          } else if (isNaN(parseInt($("#EditLulus").val()))) {
            alert('Input Lulus Belum Benar!')
          } else if (isNaN(parseInt($("#EditMhsBaruReguler").val()))) {
            alert('Input Jumlah Mahasiswa Baru Reguler Belum Benar!')
          } else if (isNaN(parseInt($("#EditMhsBaruTransfer").val()))) {
            alert('Input Jumlah Mahasiswa Baru Transfer Belum Benar!')
          } else if (isNaN(parseInt($("#EditMhsAktifReguler").val()))) {
            alert('Input Jumlah Mahasiswa Aktif Reguler Belum Benar!')
          } else if (isNaN(parseInt($("#EditMhsAktifTransfer").val()))) {
            alert('Input Jumlah Mahasiswa Aktif Transfer Belum Benar!')
          } else {
            var fd = new FormData()
						fd.append('HomebaseLama',$("#homebaseLama").val())
            fd.append('Homebase',$("#Edithomebase").val())
						fd.append('Tahun',$("#Edittahun").val())
						fd.append('TahunLama',$("#tahunLama").val())
            fd.append('DayaTampung',$("#EditDayaTampung").val())
            fd.append('MhsPendaftar',parseInt($("#EditPendaftar").val()))
						fd.append('MhsLulus',parseInt($("#EditLulus").val()))
						fd.append('MhsBaruReguler',parseInt($("#EditMhsBaruReguler").val()))
						fd.append('MhsBaruTransfer',parseInt($("#EditMhsBaruTransfer").val()))
            fd.append('MhsAktifReguler',parseInt($("#EditMhsAktifReguler").val()))
            fd.append('MhsAktifTransfer',parseInt($("#EditMhsAktifTransfer").val()))
            $.ajax({
							url: BaseURL+'Admin/UpdateMahasiswaBaru',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Admin/MahasiswaBaru"
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
						$.post(BaseURL+"Admin/HapusMahasiswaBaru", Hapus).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + "Admin/MahasiswaBaru"
							} else {
								alert(Respon)
							}
						})
					}
				})

        $('#TabelMahasiswaBaru').DataTable( {
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