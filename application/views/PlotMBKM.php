<div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-sm-12 my-2 ">  
                      <a class="btn btn-success mb-1" href="<?=base_url('Dashboard/RekapMBKM')?>"><b>Excel Rekap MBKM</b></a>  
                      <div class="table-responsive mb-2">
                        <table id="TabelDosenPembimbing" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th style="width: 4%;" class="text-center align-middle">No</th>
                              <th style="width: 5%;" class="align-middle">NIM</th>
                              <th style="width: 25%;" class="align-middle">Nama</th>
                              <th style="width: 20%;" class="align-middle">Dosen Pembimbing Lapangan</th>
                              <th style="width: 5%;" class="text-center align-middle">Nama Instansi</th>
                              <th style="width: 5%;" class="text-center align-middle">Tanggal</th>
                              <th style="width: 5%;" class="text-center align-middle">Status</th>
                              <th style="width: 5%;" class="text-center align-middle">Plot</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                              $NamaDosen = array();
                              foreach ($Dosen as $key) { 
                                $NamaDosen[$key['NIP']] = $key['Nama'];
                              } 
                            ?>
                            <?php $No = 1; foreach ($MBKM as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['NIM']?></td>
                                <td class="align-middle"><?=$key['Nama']?></td>
                                <?php if (!empty($key['Dosen'])) { ?>
                                  <td class="align-middle"><?=$NamaDosen[$key['Dosen']]?></td>
                                <?php } else { ?>
                                  <td class="align-middle"></td>
                                <?php } ?>
                                <td class="align-middle"><?=$key['NamaInstansi']?></td>
                                <td class="align-middle"><?=$key['Tanggal']?></td>
                                <td class="align-middle"><?=$key['Status']?></td>
                                <td class="text-center align-middle">
                                  <button CekData="<?=$key['NIM']."|".$key['Nama']."|".$key['Jenis']."|".$key['Konsentrasi']."|".$key['Instansi']."|".$key['NamaInstansi']."|".$key['Kabupaten']."|".$key['IPK'].$key['Dosen']?>" class="btn btn-sm btn-primary CekData"><i class="fas fa-edit"></i></button>
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
    <div class="modal fade" id="ModalPlotMBKM">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-success">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
									<div class="card-header bg-danger text-light mt-2">
										<b>Ploting Dosen Pembimbing Lapangan</b>
									</div>
									<div class="card-body border border-primary bg-warning">
										<div class="container-fluid">
											<div class="row">
												<div class="col-12 my-1">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>NIM</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="NIM" disabled>
													</div>
												</div>
												<div class="col-12 my-1">
													<div class="input-group input-group-sm"> 
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Nama</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="Nama" disabled>
													</div>
												</div>
												<div class="col-lg-12 my-1"> 
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Jenis MBKM</b></label>
                            </div>
                            <input class="form-control form-control-sm" type="text" id="Jenis" disabled>
													</div>
												</div>
												<div class="col-lg-12 my-1"> 
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Konsentrasi</b></label>
                            </div>
                            <input class="form-control form-control-sm" type="text" id="Konsentrasi" disabled>
													</div>
												</div>
												<div class="col-lg-12 my-1"> 
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Instansi</b></label>
                            </div>
                            <input class="form-control form-control-sm" type="text" id="Instansi" disabled>
													</div>
												</div>
												<div class="col-lg-12 my-1">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Nama Instansi</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="NamaInstansi" disabled>
													</div>
												</div>
												<div class="col-sm-12 my-1">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-white"><b>Lokasi MBKM</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="Kabupaten" disabled>
													</div>
												</div>
												<div class="col-lg-12 my-1">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>IPK Mahasiswa</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="IPK" disabled>
													</div>
												</div>
                        <div class="col-12 my-1"> 
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Pilih Dosen Pembimbing</b></label>
                            </div>
                            <select class="custom-select custom-select-sm" id="DosenPembimbing">										
                              <?php foreach ($Dosen as $key) { ?>
                                <option value="<?=$key['NIP']?>"><?=$key['Nama']?></option>
                              <?php } ?>
														</select>
													</div>
												</div>
												<div class="col-12 my-1">
                          <div class="input-group input-group-sm">
                            <button type="button" class="btn btn-sm btn-primary" id="ValidasiPlotMBKM"><b>VALIDASI&nbsp;<div id="LoadingValidasi" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
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
					$("#Jenis").val(Pisah[2])
					$("#Konsentrasi").val(Pisah[3])
					$("#Instansi").val(Pisah[4])
          $("#NamaInstansi").val(Pisah[5])
					$("#Kabupaten").val(Pisah[6])
					$("#IPK").val(Pisah[7])
          if (Pisah[10] != '') {
            $("#DosenPembimbing").val(Pisah[8])
          }
					$('#ModalPlotMBKM').modal("show")
        })
        
        $("#ValidasiPlotMBKM").click(function() {
          var Mhs = { NIM: $("#NIM").val(),
                      Dosen: $("#DosenPembimbing").val(),
                      Status: 'Divalidasi' }
          var Konfirmasi = confirm("Yakin Ingin Validasi?"); 
      		if (Konfirmasi == true) {
            $("#ValidasiPlotMBKM").attr("disabled", true); 
            $("#LoadingValidasi").show();                             
            $.post(BaseURL+"Dashboard/ValidasiPlotMBKM", Mhs).done(function(Respon) {
              if (Respon == '1') {
                window.location = BaseURL + "Dashboard/PlotMBKM"
              } else {
                alert(Respon)
                $("#ValidasiPlotMBKM").attr("disabled", false); 
                $("#LoadingValidasi").hide();                             
              }
            })
          }
        })

        $("#TolakProposal").click(function() {
          var Mhs = { NIM: $("#NIM").val(),
                      Dosen: $("#DosenPembimbing").val(),
                      Status: 'Ditolak Karena '+ $("#Penolakan").val()}
          var Konfirmasi = confirm("Yakin Ingin Validasi?"); 
      		if (Konfirmasi == true) {
            $("#TolakProposal").attr("disabled", true); 
            $("#LoadingDitolak").show();                             
            $.post(BaseURL+"Dashboard/ValidasiPlotMBKM", Mhs).done(function(Respon) {
              if (Respon == '1') {
                window.location = BaseURL + "Dashboard/PlotMBKM"
              } else {
                alert(Respon)
                $("#TolakProposal").attr("disabled", false); 
                $("#LoadingDitolak").hide();                             
              }
            })
          }
        })

        $('#TabelDosenPembimbing').DataTable( {
					// dom:'lfrtip',
					"ordering": true,
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