      <div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-sm-12 my-2 ">    
                    <button type="button" class="btn btn-primary text-light mb-2" data-toggle="modal" data-target="#ModalAkunDosen"><i class="fa fa-plus"></i> <b>Akun Dosen</b></button>
                    <button type="button" class="btn btn-danger text-light mb-2" data-toggle="modal" data-target="#ModalKajur"><i class="fa fa-user"></i> <b>Kepala Jurusan</b></button> 
                      <div class="table-responsive mb-2">
                        <table id="TabelAkunDosen" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th class="text-center align-middle">No</th>
                              <th class="align-middle">NIP</th>
                              <th class="align-middle">Nama</th>
                              <th class="align-middle">Sertifikat</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($Dosen as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['NIP']?></td>
                                <td class="align-middle"><?=$key['Nama']?></td>
                                <td class="align-middle">
                                  <?php if ($key['Sertifikat'] != "") { ?>
                                    <button LihatSertifikat="<?=base_url('DTPS/'.$key['Sertifikat'])?>" class="btn btn-sm btn-primary LihatSertifikat"><i class="fas fa-download"></i></button>  
                                  <?php } ?>
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
    <div class="modal fade" id="ModalSertifikat">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathSertifikat" src="" type="application/pdf" width="100%" height="520"/>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalAkunDosen">
      <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body">
            <div class="container">
							<div class="row">
								<div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Homebase</b></span>
                    </div>
                    <select class="custom-select" id="HomebaseDosen">
                      <option value="D3">D3</option>
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                    </select>
                  </div>
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>Nama</b></span>
                    </div>
                    <input type="text" class="form-control" id="Nama" placeholder="Input Nama + Gelar">
                  </div>
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-primary"><b>NIP</b></span>
                    </div>
                    <input type="text" class="form-control" id="NIP" data-inputmask='"mask": "999999999999999999"' data-mask>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="Daftar"><b>Simpan</b></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalKajur">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body">
            <div class="input-group mb-1">
              <div class="input-group-prepend">
                <label class="input-group-text bg-primary"><b>Kajur</b></label>
              </div>
              <select class="custom-select" id="Kajur">										
                <?php foreach ($Kajur as $key) { ?>
                  <option value="<?=$key['NIP']?>" <?php if ($key['JenisAkun'] == 2) { echo 'selected'; } ?> ><?=$key['Nama']?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="Simpan"><b>Simpan</b></button>
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

        $('#TabelAkunDosen').DataTable( {
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
        
        $("#Simpan").click(function() {
          var Kajur = { NIP: $("#Kajur").val() }
          $.post("Kajur", Kajur).done(function(Respon) {
            window.location = "AkunDosen"
          })
        })

        $(document).on("click",".LihatSertifikat",function(){
					var Path = $(this).attr('LihatSertifikat')
          $('#PathSertifikat').attr('src',Path)		
          $('#ModalSertifikat').modal("show")
				}) 

				$("#Daftar").click(function() {
          if (isNaN($("#NIP").val()) || $("#NIP").val() == "") {
            alert('Mohon Isi NIP 18 Angka!')
          } else if ($("#Nama").val() === "") {
            alert('Mohon Isi Nama + Gelar!')
          } else {
            var Akun = { NIP: $("#NIP").val(),
                         Nama: $("#Nama").val(),
                         Homebase: $("#HomebaseDosen").val() }
            $.post(BaseURL+"Admin/Daftar", Akun).done(function(Respon) {
              if (Respon == '1') {
                alert('Akun Dosen Dengan NIP '+$("#NIP").val()+' & Password '+$("#NIP").val()+' Berhasil Di Tambahkan!')
                window.location = BaseURL + "Admin/AkunDosen"
              }
              else {
                alert(Respon)
              }
            })
          }
        })
			})
    </script>
  </body>
</html>