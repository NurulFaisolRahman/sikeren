<div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-sm-12 my-2 ">    
                      <button class="btn btn-primary text-white mb-1" data-toggle="modal" data-target="#ModalGantiDosenPenguji"><b>Ganti Dosen Penguji</b></button>
                      <div class="table-responsive mb-2">
                        <table id="TabelUjianSkripsi" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th style="width: 4%;" class="text-center align-middle">No</th>
                              <th style="width: 12%;" class="align-middle">NIM</th>
                              <th style="width: 20%;" class="align-middle">Nama</th>
                              <th class="align-middle">Dosen Pembimbing</th>
                              <th style="width: 10%;" class="align-middle">Tanggal Ujian</th>
                              <th style="width: 15%;" class="align-middle">Status</th>
                              <th style="width: 7%;" class="text-center align-middle">Validasi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($UjianSkripsi as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['NIM']?></td>
                                <td class="align-middle"><?=$key['Nama']?></td>
                                <td class="align-middle"><?=$key['NamaPembimbing']?></td>
                                <td class="align-middle"><?=$key['TanggalUjianSkripsi']?></td>
                                <td class="align-middle"><?=$key['StatusUjianSkripsi']?></td>
                                <td class="text-center align-middle">
                                  <button Validasi="<?=$key['NIM']?>" class="btn btn-sm btn-primary Validasi"><i class="fas fa-check"></i></button>
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
    <div class="modal fade" id="ModalGantiDosenPenguji">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body text-white">
            <div class="input-group input-group-sm mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text bg-primary text-light"><b>Pilih Mahasiswa</b></span>
              </div>
              <select class="custom-select custom-select-sm" id="_NIM">										
                <option value="">Pilih Mahasiswa</option>
                <?php foreach ($Mhs as $key) { ?>
                  <option value="<?=$key['NIM'].'|'.$key['PengujiSkripsi1'].'|'.$key['PengujiSkripsi2']?>"><?=$key['Nama'].' => '.$key['NIM']?></option>
                <?php } ?>
              </select>
            </div>
            <div class="input-group input-group-sm mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text bg-primary text-light"><b>Dosen Penguji 1</b></span>
              </div>
              <select class="custom-select custom-select-sm" id="_PengujiSkripsi1">	
                <option value=""></option>									
                <?php foreach ($Dosen as $key) { ?>
                  <option value="<?=$key['NIP']?>"><?=$key['Nama']?></option>
                <?php } ?>
              </select>
            </div>
            <div class="input-group input-group-sm mb-2">
              <div class="input-group-prepend">
                <span class="input-group-text bg-primary text-light"><b>Dosen Penguji 2</b></span>
              </div>
              <select class="custom-select custom-select-sm" id="_PengujiSkripsi2">	
                <option value=""></option>									
                <?php foreach ($Dosen as $key) { ?>
                  <option value="<?=$key['NIP']?>"><?=$key['Nama']?></option>
                <?php } ?>
              </select>
            </div>
            <button type="button" class="btn btn-danger" id="_Ganti"><b>GANTI&nbsp;<div id="LoadingGanti" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
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
    <script src="<?=base_url('bootstrap/js/Borang.js')?>"></script>
		<script>
			jQuery(document).ready(function($) {
				"use strict";
        var BaseURL = '<?=base_url()?>';

        $("#_NIM").on( "change", function() {
          alert( "Data Yang Dipilih Sudah Benar?");
          var Mhs = $("#_NIM").val()
          var Penguji = Mhs.split("|")
          $("#_PengujiSkripsi1").val(Penguji[1])
          $("#_PengujiSkripsi2").val(Penguji[2])
        });

        $("#_Ganti").click(function() {
          if ($("#_NIM").val()=="") {
            alert('Pilih Mahasiswa!')
          } else if ($("#_PengujiSkripsi1").val()=="") {
            alert('Pilih Dosen Penguji 1')
          } else if ($("#_PengujiSkripsi2").val()=="") {
            alert('Pilih Dosen Penguji 2')
          } else {
            var Mhs = { NIM: $("#_NIM").val().split("|")[0],
                        PengujiSkripsi1: $("#_PengujiSkripsi1").val(),
                        PengujiSkripsi2: $("#_PengujiSkripsi2").val() }
            var Konfirmasi = confirm("Yakin Ingin Mengganti?"); 
            if (Konfirmasi == true) {
              $("#_Ganti").attr("disabled", true); 
              $("#LoadingGanti").show();                             
              $.post(BaseURL+"Dashboard/GantiPenguji  ", Mhs).done(function(Respon) {
                if (Respon == '1') {
                  alert('Dosen Penguji Berhasil Di Ganti!')
                  window.location = BaseURL + "Dashboard/ValidasiUjianSkripsi"
                } else {
                  alert(Respon)
                  $("#_Ganti").attr("disabled", false); 
                  $("#LoadingGanti").hide();                             
                }
              })
            } 
          }
        })
        
        $(document).on("click",".Validasi",function(){
          var Mhs = { NIM: $(this).attr('Validasi'),
                      StatusUjianSkripsi: 'Menunggu Persetujuan Pembimbing' }
          var Konfirmasi = confirm("Yakin Ingin Validasi?"); 
      		if (Konfirmasi == true) {
            $.post(BaseURL+"Dashboard/KPSValidasiUjianSkripsi", Mhs).done(function(Respon) {
              if (Respon == '1') {
                window.location = BaseURL + "Dashboard/ValidasiUjianSkripsi"
              } else {
                alert(Respon)                        
              }
            })
          }
        })

        $('#TabelUjianSkripsi').DataTable( {
					// dom:'lfrtip',
					"ordering": false,
          "lengthMenu": [[ 5, 10, 20, 30, -1 ],[ 5, 10, 20, 30, "All"]],
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