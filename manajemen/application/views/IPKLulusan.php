<div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-sm-12 my-2 ">    
                    <button type="button" class="btn btn-primary text-light mb-2" data-toggle="modal" data-target="#ModalInputIPKLulusan"><i class="fa fa-plus"></i> <b>Input Data</b></button> 
                      <div class="table-responsive mb-2">
                        <table id="TabelIPKLulusan" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th class="text-center align-middle" rowspan="2">No</th>
                              <th class="text-center align-middle" rowspan="2">Homebase</th>
                              <th class="text-center align-middle" rowspan="2">Tahun Lulus</th>
                              <th class="text-center align-middle" rowspan="2">Jumlah Lulusan</th>
                              <th class="text-center align-middle" rowspan="2">Aksi</th>
                              <th class="text-center align-middle" colspan="3">Indeks Prestasi Kumulatif</th>
                            </tr>
                            <tr>
                              <th class="text-center align-middle">Min</th>
                              <th class="text-center align-middle">Rata-rata</th>
                              <th class="text-center align-middle">Maks</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($IPKLulusan as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="text-center align-middle"><?=$key['Homebase']?></td>
                                <td class="text-center align-middle"><?=$key['Tahun']?></td>
                                <td class="text-center align-middle"><?=$key['JumlahLulusan']?></td>
                                <td class="text-center align-middle">
                                  <button Edit="<?=$key['Homebase']."|".$key['Tahun']."|".$key['JumlahLulusan']."|".$key['Min']."|".$key['Average']."|".$key['Max']?>" class="btn btn-sm btn-warning Edit"><i class="fas fa-edit"></i></button>
                                  <button Hapus="<?=$key['Homebase']."|".$key['Tahun']?>" class="btn btn-sm btn-danger Hapus"><i class="fas fa-trash"></i></button>  
                                </td> 
                                <td class="text-center align-middle"><?=str_replace(".",",",$key['Min'])?></td>
                                <td class="text-center align-middle"><?=str_replace(".",",",$key['Average'])?></td>
                                <td class="text-center align-middle"><?=str_replace(".",",",$key['Max'])?></td>
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
    <div class="modal fade" id="ModalInputIPKLulusan">
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
                      <span class="input-group-text bg-primary"><b>Tahun Lulus</b></span>
                    </div>
                    <input type="text" class="form-control" id="tahun" data-inputmask='"mask": "9999"' data-mask value="20"> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Jumlah Lulusan</b></span>
                    </div>
                    <input type="text" class="form-control" id="JumlahLulusan" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>IPK Minimal</b></span>
                    </div>
                    <input type="text" class="form-control" id="Min" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>IPK Rata-rata</b></span>
                    </div>
                    <input type="text" class="form-control" id="Average" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>IPK Maksimal</b></span>
                    </div>
                    <input type="text" class="form-control" id="Max" placeholder="0"> 
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="InputIPKLulusan"><b>Simpan</b></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalEditIPKLulusan">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body">
            <div class="container">
							<div class="row">
              <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Homebase</b></span>
                    </div>
                    <input type="hidden" class="form-control" id="homebaselama"> 
                    <select class="custom-select" id="Edithomebase">
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Tahun Lulus</b></span>
                    </div>
                    <input type="hidden" class="form-control" id="tahunlama">
                    <input type="text" class="form-control" id="Edittahun" data-inputmask='"mask": "9999"' data-mask value="20"> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Jumlah Lulusan</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditJumlahLulusan" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>IPK Minimal</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditMin" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>IPK Rata-rata</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditAverage" placeholder="0"> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>IPK Maksimal</b></span>
                    </div>
                    <input type="text" class="form-control" id="EditMax" placeholder="0"> 
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="UpdateIPKLulusan"><b>Simpan</b></button>
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

        $("#InputIPKLulusan").click(function() {
          if (isNaN($("#tahun").val()) || $("#tahun").val() == "") {
            alert('Input Tahun Belum Benar!')
          } else if (isNaN(parseInt($("#JumlahLulusan").val()))) {
            alert('Input Jumlah Lulusan Belum Benar, Mohon Input Angka Saja!')
          } else if (isNaN(parseFloat($("#Min").val().replace(",",".")))) {
            alert('Input IPK Minimal Belum Benar, Mohon Input Desimal 2 Digit Dibelakang Koma!')
          } else if (isNaN(parseFloat($("#Average").val().replace(",",".")))) {
            alert('Input IPK Rata-rata Belum Benar, Mohon Input Desimal 2 Digit Dibelakang Koma!')
          } else if (isNaN(parseFloat($("#Max").val().replace(",",".")))) {
            alert('Input IPK Maksimal Belum Benar, Mohon Input Desimal 2 Digit Dibelakang Koma!')
          } else {
            var fd = new FormData()
						fd.append('Homebase',$("#homebase").val())
						fd.append('Tahun',$("#tahun").val())
						fd.append('JumlahLulusan',parseInt($("#JumlahLulusan").val()))
            fd.append('Min',parseFloat($("#Min").val().replace(",",".")))
						fd.append('Average',parseFloat($("#Average").val().replace(",",".")))
            fd.append('Max',parseFloat($("#Max").val().replace(",",".")))
            $.ajax({
							url: BaseURL+'Admin/InputIPKLulusan',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Admin/IPKLulusan"
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
					$('#homebaselama').val(Pisah[0])
          $('#Edithomebase').val(Pisah[0])
          $('#tahunlama').val(Pisah[1])
					$('#Edittahun').val(Pisah[1])
          $('#EditJumlahLulusan').val(Pisah[2])
					$("#EditMin").val(Pisah[3])
          $('#EditAverage').val(Pisah[4])
					$("#EditMax").val(Pisah[5])
          $('#ModalEditIPKLulusan').modal("show")
				}) 

				$("#UpdateIPKLulusan").click(function() {
					if (isNaN($("#Edittahun").val()) || $("#Edittahun").val() == "") {
            alert('Input Tahun Belum Benar!')
          } else if (isNaN(parseInt($("#EditJumlahLulusan").val()))) {
            alert('Input Jumlah Lulusan Belum Benar, Mohon Input Angka Saja!')
          } else if (isNaN(parseFloat($("#EditMin").val().replace(",",".")))) {
            alert('Input IPK Minimal Belum Benar, Mohon Input Desimal 2 Digit Dibelakang Koma!')
          } else if (isNaN(parseFloat($("#EditAverage").val().replace(",",".")))) {
            alert('Input IPK Rata-rata Belum Benar, Mohon Input Desimal 2 Digit Dibelakang Koma!')
          } else if (isNaN(parseFloat($("#EditMax").val().replace(",",".")))) {
            alert('Input IPK Maksimal Belum Benar, Mohon Input Desimal 2 Digit Dibelakang Koma!')
          } else {
            var fd = new FormData()
						fd.append('Homebase',$("#Edithomebase").val())
            fd.append('HomebaseLama',$("#homebaselama").val())
						fd.append('Tahun',$("#Edittahun").val())
            fd.append('TahunLama',$("#tahunlama").val())
						fd.append('JumlahLulusan',parseInt($("#EditJumlahLulusan").val()))
            fd.append('Min',parseFloat($("#EditMin").val().replace(",",".")))
						fd.append('Average',parseFloat($("#EditAverage").val().replace(",",".")))
            fd.append('Max',parseFloat($("#EditMax").val().replace(",",".")))
            $.ajax({
							url: BaseURL+'Admin/UpdateIPKLulusan',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Admin/IPKLulusan"
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
						$.post(BaseURL+"Admin/HapusIPKLulusan", Hapus).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + "Admin/IPKLulusan"
							} else {
								alert(Respon)
							}
						})
					}
				})

        $('#TabelIPKLulusan').DataTable( {
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