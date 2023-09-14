<div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-sm-12 my-2 ">    
                      <div class="table-responsive mb-2">
                        <table id="TabelDosenPembimbing" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th style="width: 4%;" class="text-center align-middle">No</th>
                              <th style="width: 12%;" class="align-middle">NIM</th>
                              <th style="width: 20%;" class="align-middle">Nama</th>
                              <th class="align-middle">Dosen Pembimbing</th>
                              <th style="width: 12%;" class="align-middle">Tanggal Ujian</th>
                              <th style="width: 5%;" class="align-middle text-center">Aksi</th>
                              <th class="text-center align-middle">Cek Data</th>
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
                                <td class="align-middle text-center">
                                  <button CekData="<?=$key['NIM'].'|'.$key['Nama'].'|'.$key['PengujiProposal1'].'|'.$key['PengujiProposal2']?>" class="btn btn-sm btn-warning CekData"><i class="fas fa-edit"></i></button>
                                </td>
                                <td class="text-center align-middle">
                                  <button LihatAdministrasi="<?=base_url('Proposal/'.$key['Administrasi'])?>" class="btn btn-sm btn-primary LihatAdministrasi"><i class="fas fa-file-pdf"></i></button>  
                                  <button LihatRevisiProposalBimbingan="<?=base_url('Proposal/'.$key['RevisiProposalBimbingan'])?>" class="btn btn-sm btn-success LihatRevisiProposalBimbingan"><i class="fas fa-file-pdf"></i></button>  
                                  <button LihatToeflSertifikat="<?=base_url('Proposal/'.$key['ToeflSertifikat'])?>" class="btn btn-sm btn-danger LihatToeflSertifikat"><i class="fas fa-file-pdf"></i></button>  
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
    <div class="modal fade" id="ModalValidasiProposal">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-success">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
									<div class="card-header bg-danger text-light mt-2">
										<b>Form Pengajuan Ujian Skripsi</b>
									</div>
									<div class="card-body border border-primary bg-warning">
										<div class="container-fluid">
											<div class="row">
												<div class="col-4 my-1">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>NIM</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="NIM" disabled>
													</div>
												</div>
												<div class="col-8 my-1">
													<div class="input-group input-group-sm"> 
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Nama</b></label>
														</div>
                            <input class="form-control form-control-sm" type="text" id="Nama" disabled>
                            <input class="form-control form-control-sm" type="hidden" id="PengujiSkripsi1"> 
                            <input class="form-control form-control-sm" type="hidden" id="PengujiSkripsi2">
													</div>
												</div>
												<div class="col-12 my-1">
                          <div class="input-group input-group-sm">
                            <button type="button" class="btn btn-sm btn-primary" id="ValidasiProposal"><b>VALIDASI&nbsp;<div id="LoadingValidasi" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
                            <button type="button" class="btn btn-sm btn-danger" id="TolakProposal"><b>DITOLAK&nbsp;<div id="LoadingDitolak" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
                            <input class="form-control form-control-sm" type="text" id="Penolakan" placeholder="Alasan Ditolak">
                          </div>
												</div>
											</div>
										</div>
									</div>
								</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalAdministrasi">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathAdministrasi" src="" type="application/pdf" width="100%" height="520"/>
          </div>
        </div>
      </div>
    </div>
		<div class="modal fade" id="ModalRevisiProposalBimbingan">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathRevisiProposalBimbingan" src="" type="application/pdf" width="100%" height="520"/>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalToeflSertifikat">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathToeflSertifikat" src="" type="application/pdf" width="100%" height="520"/>
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

        $(document).on("click",".CekData",function(){
					var Data = $(this).attr('CekData')
					var Pisah = Data.split("|")
					$("#NIM").val(Pisah[0])
          $("#Nama").val(Pisah[1])
          $("#PengujiSkripsi1").val(Pisah[2])
          $("#PengujiSkripsi2").val(Pisah[3])
					$('#ModalValidasiProposal').modal("show")
        })
        
        $("#ValidasiProposal").click(function() {
          var Mhs = { NIM: $("#NIM").val(),
                      PengujiSkripsi1: $("#PengujiSkripsi1").val(),
                      PengujiSkripsi2: $("#PengujiSkripsi2").val(),
                      StatusUjianSkripsi: 'Menunggu Persetujuan KPS' }
          var Konfirmasi = confirm("Yakin Ingin Validasi Data?"); 
      		if (Konfirmasi == true) {
            $("#ValidasiProposal").attr("disabled", true); 
            $("#LoadingValidasi").show();                             
            $.post(BaseURL+"Admin/ValidasiUjianProposal", Mhs).done(function(Respon) {
              if (Respon == '1') {
                window.location = BaseURL + "Admin/UjianSkripsi"
              } else {
                alert(Respon)
                $("#ValidasiProposal").attr("disabled", false); 
                $("#LoadingValidasi").hide();                             
              }
            })
          }
        })

        $("#TolakProposal").click(function() {
          var Mhs = { NIM: $("#NIM").val(),
                      StatusUjianSkripsi: 'Ditolak Oleh Admin Karena '+ $("#Penolakan").val()}
          var Konfirmasi = confirm("Yakin Ingin Menolak?"); 
      		if (Konfirmasi == true) {
            $("#TolakProposal").attr("disabled", true); 
            $("#LoadingDitolak").show();                             
            $.post(BaseURL+"Admin/ValidasiUjianProposal", Mhs).done(function(Respon) {
              if (Respon == '1') {
                window.location = BaseURL + "Admin/UjianSkripsi"
              } else {
                alert(Respon)
                $("#TolakProposal").attr("disabled", false); 
                $("#LoadingDitolak").hide();                             
              }
            })
          }
        })
        
        $(document).on("click",".LihatAdministrasi",function(){
					var Path = $(this).attr('LihatAdministrasi')
          $('#PathAdministrasi').attr('src',Path)		
          $('#ModalAdministrasi').modal("show")
				}) 

				$(document).on("click",".LihatRevisiProposalBimbingan",function(){
					var Path = $(this).attr('LihatRevisiProposalBimbingan')
          $('#PathRevisiProposalBimbingan').attr('src',Path)		
          $('#ModalRevisiProposalBimbingan').modal("show")
				}) 

        $(document).on("click",".LihatToeflSertifikat",function(){
					var Path = $(this).attr('LihatToeflSertifikat')
          $('#PathToeflSertifikat').attr('src',Path)		
          $('#ModalToeflSertifikat').modal("show")
				}) 

        $('#TabelDosenPembimbing').DataTable( {
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