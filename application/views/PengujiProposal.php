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
                        <table id="TabelUjianProposal" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th style="width: 4%;" class="text-center align-middle">No</th>
                              <th style="width: 12%;" class="align-middle">NIM</th>
                              <th style="width: 22%;" class="align-middle">Nama</th>
                              <th style="width: 25%;" class="align-middle">Dosen Pembimbing</th>
                              <th style="width: 10%;" class="align-middle">Tanggal Ujian</th>
                              <th style="width: 7%;" class="text-center align-middle">Nilai</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($PengujiProposal as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['NIM']?></td>
                                <td class="align-middle"><?=$key['Nama']?></td>
                                <td class="align-middle"><?=$key['NamaPembimbing']?></td>
                                <td class="align-middle"><?=$key['TanggalUjianProposal']?></td>
                                <td class="text-center align-middle">
                                  <button CekData="<?=$key['NIM']."|".$key['Nama']."|".$key['TanggalUjianProposal']."|".$key['Konsentrasi']?>" class="btn btn-sm btn-warning CekData"><i class="fas fa-edit"></i></button>
                                  <a href="<?=base_url('Dashboard/PersetujuanUjianProposal/'.$key['NIM'])?>" class="btn btn-sm btn-danger"><i class="fas fa-file-pdf"></i></a>
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
										<b>Form Penilaian Ujian Proposal Skripsi</b>
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
													</div>
                        </div>
                        <div class="col-lg-5 my-1">
													<div class="input-group input-group-sm mb-0">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Tanggal Ujian Proposal</b></label>
														</div>
														<input class="form-control form-control-sm" type="date" id="TanggalUjianProposal" value="<?=date('Y-m-d')?>" disabled>
													</div>
												</div>
												<div class="col-7 my-1"> 
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Konsentrasi</b></label>
														</div>
														<select class="custom-select custom-select-sm" id="Konsentrasi" disabled>										
															<option value="Perencanaan Pembangunan">Perencanaan Pembangunan</option>
															<option value="Ekonomi Publik">Ekonomi Publik</option>
															<option value="Ekonomi Moneter & Perbankan">Ekonomi Moneter & Perbankan</option>
														</select>
													</div>
                        </div>
                        <div class="col-12 my-1">
                          <div class="row">
                            <div class="col-11">
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-light"><b>Latar Belakang</b></label>
                                </div>
                                <select class="custom-select custom-select-sm" id="LatarBelakang">										
                                  <option value="0"></option><option value="1">1. Tidak terdapat/mampu menuliskan & menjelaskan urgensi serta riset gap penelitian</option>
                                  <option value="2">2. Dapat menjelaskan/menuliskan Urgensi/gap riset penelitian namun masih sangat lemah/tidak fokus/implisit/tidak didukung dengan empiris maupun teoritis</option>
                                  <option value="3">3. Dapat menjelaskan/menuliskan Urgensi/gap riset penelitian dengan baik/fokus/eksplisit namun masih belum didukung data/empiris</option>
                                  <option value="4">4. Dapat menjelaskan/menuliskan Urgensi/gap riset penelitian dengan baik/fokus/eksplisit didukung data/empiris</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-1">
                              <input class="form-control form-control-sm" type="text" id="_LatarBelakang" placeholder="0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1"> 
                          <div class="row">
                            <div class="col-11">
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-light"><b>Rumusan Permasalahan</b></label>
                                </div>
                                <select class="custom-select custom-select-sm" id="RumusanPermasalahan">										
                                  <option value="0"></option><option value="1">1. Menyimpang dari latar belakang </option>
                                  <option value="2">2. Sesuai dengan latar belakang, namun belum fokus</option>
                                  <option value="3">3. Sudah fokus namun belum/dituliskan dinyatakan dengan benar</option>
                                  <option value="4">4. Sudah fokus & telah dinyatakan/dituliskan dengan benar</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-1">
                              <input class="form-control form-control-sm" type="text" id="_RumusanPermasalahan" placeholder="0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1"> 
                          <div class="row">
                            <div class="col-11">
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-light"><b>Teori Penunjang</b></label>
                                </div>
                                <select class="custom-select custom-select-sm" id="TeoriPenunjang">										
                                  <option value="0"></option><option value="1">1. Tidak menyebutkan teori apa pun</option>
                                  <option value="2">2. Menyebutkan teori namun tidak relevan dengan topik penelitian</option>
                                  <option value="3">3. Menyebutkan teori & relevan, namun masih kurang/belum terstruktur</option>
                                  <option value="4">4. Menyebutkan teori yang relevan & terstruktur</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-1">
                              <input class="form-control form-control-sm" type="text" id="_TeoriPenunjang" placeholder="0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1"> 
                          <div class="row">
                            <div class="col-11">
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-light"><b>Penelitian Terdahulu</b></label>
                                </div>
                                <select class="custom-select custom-select-sm" id="PenelitianTerdahulu">										
                                  <option value="0"></option><option value="1">1. Tidak ada penelitian terdahulu</option>
                                  <option value="2">2. Ada tapi tidak relevan</option>
                                  <option value="3">3. Ada & Relevan namun sumber terbatas ( hanya berasal dari salah satu jenis misal Skripsi)</option>
                                  <option value="4">4. Ada & relevan serta sumber beragam (Skripsi, jurnal, dll)</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-1">
                              <input class="form-control form-control-sm" type="text" id="_PenelitianTerdahulu" placeholder="0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1"> 
                          <div class="row">
                            <div class="col-11">
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-light"><b>Kerangka Fikir</b></label>
                                </div>
                                <select class="custom-select custom-select-sm" id="KerangkaFikir">										
                                  <option value="0"></option><option value="1">1. Tidak ada kerangka fikir</option>
                                  <option value="2">2. Ada tapi tidak relevan & tidak sistematis</option>
                                  <option value="3">3. Ada tapi kurang relevan & sistematis</option>
                                  <option value="4">4. Ada & relevan serta sistematis</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-1">
                              <input class="form-control form-control-sm" type="text" id="_KerangkaFikir" placeholder="0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1"> 
                          <div class="row">
                            <div class="col-11">
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-light"><b>Fokus Penelitian</b></label>
                                </div>
                                <select class="custom-select custom-select-sm" id="FokusPenelitin">										
                                  <option value="0"></option><option value="1">1. Tidak Dijelaskan/disebutkan</option>
                                  <option value="2">2. Ada, namun tidak jelas / tidak fokus</option>
                                  <option value="3">3. Ada & fokus, belum disertai instumen penelitian</option>
                                  <option value="4">4. Ada, fokus & disertai instumen penelitian</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-1">
                              <input class="form-control form-control-sm" type="text" id="_FokusPenelitin" placeholder="0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1"> 
                          <div class="row">
                            <div class="col-11">
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-light"><b>Alat Analisis</b></label>
                                </div>
                                <select class="custom-select custom-select-sm" id="AlatAnalisis">										
                                  <option value="0"></option><option value="1">1. Tidak disebutkan</option>
                                  <option value="2">2. Disebutkan, namun tidak sesuai dengan tujuan penelitian</option>
                                  <option value="3">3. Disebutkan & sesuai dgn tujuan penelitian, namun belum lengkap</option>
                                  <option value="4">4. Disebutkan, sesuai dgn tujuan penelitian, & sudah lengkap</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-1">
                              <input class="form-control form-control-sm" type="text" id="_AlatAnalisis" placeholder="0">
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-12">
													<div class="input-group input-group-sm"> 
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Catatan Penguji</b></label>
														</div>
														<textarea class="form-control" id="CatatanPenguji" rows="3"></textarea>
													</div>
												</div>
												<div class="col-12 my-1">
                          <div class="input-group input-group-sm">
                            <button type="button" class="btn btn-primary" id="ValidasiProposal"><b>SIMPAN PENILAIAN&nbsp;<div id="LoadingValidasi" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
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
					$("#TanggalUjianProposal").val(Pisah[2])
          $("#Konsentrasi").val(Pisah[3])
					$('#ModalValidasiProposal').modal("show")
        })
        
        $("#ValidasiProposal").click(function() {
          var Mhs = { NIM: $("#NIM").val(),
                      Nilai: $("#LatarBelakang").val()+"$"+$("#RumusanPermasalahan").val()+"$"+ $("#TeoriPenunjang").val()+"$"+ $("#PenelitianTerdahulu").val()
                                +"$"+ $("#KerangkaFikir").val()+"$"+ $("#FokusPenelitin").val()+"$"+ $("#AlatAnalisis").val(), 
                      Catatan: $("#CatatanPenguji").val() }
          var Konfirmasi = confirm("Yakin Ingin Menyimpan Penilaian?"); 
      		if (Konfirmasi == true) {
            $("#ValidasiProposal").attr("disabled", true); 
            $("#LoadingValidasi").show();                             
            $.post(BaseURL+"Dashboard/MenilaiProposal", Mhs).done(function(Respon) {
              if (Respon == '1') {
                window.location = BaseURL + "Dashboard/PengujiProposal"
              } else {
                alert(Respon)
                $("#ValidasiProposal").attr("disabled", false); 
                $("#LoadingValidasi").hide();                             
              }
            })
          }
        })

        $('#TabelUjianProposal').DataTable( {
					// dom:'lfrtip',
					"ordering": false,
          "lengthMenu": [[ 10, 20, 30, -1 ],[ 10, 20, 30, "All"]],
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