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
                        <table id="TabelUjianSkripsi" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th style="width: 4%;" class="text-center align-middle">No</th>
                              <th style="width: 12%;" class="align-middle">NIM</th>
                              <th style="width: 22%;" class="align-middle">Nama</th>
                              <th style="width: 25%;" class="align-middle">Dosen Pembimbing</th>
                              <th style="width: 10%;" class="align-middle">Tanggal Ujian</th>
                              <th style="width: 7%;" class="text-center align-middle">File</th>
                              <th style="width: 7%;" class="text-center align-middle">Menilai</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($PengujiSkripsi as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['NIM']?></td>
                                <td class="align-middle"><?=$key['Nama']?></td>
                                <td class="align-middle"><?=$key['NamaPembimbing']?></td>
                                <td class="align-middle"><?=$key['TanggalUjianSkripsi']?></td>
                                <td class="text-center align-middle">
                                  <button LihatProposal="<?=base_url('Proposal/'.$key['RevisiProposalBimbingan'])?>" class="btn btn-sm btn-danger LihatProposal"><i class="fas fa-file-pdf"></i></button>
                                  <button Revisi="<?=$key['NIM']."|".$key['Nama']?>" class="btn btn-sm btn-primary Revisi" data-toggle="tooltip" data-placement="top" title="Catatan Revisi"><i class="fas fa-edit"></i></button>
                                </td> 
                                <td class="text-center align-middle">
                                <?php if ($key['JenisSkripsi'] == 'Skripsi') { ?>
                                  <button CekData="<?=$key['NIM']."|".$key['Nama']."|".$key['TanggalUjianSkripsi']."|".$key['Konsentrasi']?>" class="btn btn-sm btn-warning CekData" data-toggle="tooltip" data-placement="top" title="Menilai Skripsi"><i class="fas fa-edit"></i></button>
                                <?php } else if ($key['JenisSkripsi'] == 'Artikel') { ?>
                                  <button CekArtikel="<?=$key['NIM']."|".$key['Nama']."|".$key['TanggalUjianSkripsi']."|".$key['Konsentrasi']?>" class="btn btn-sm btn-success CekArtikel" data-toggle="tooltip" data-placement="top" title="Menilai Artikel"><i class="fas fa-edit"></i></button>
                                <?php } else { ?>
                                  <button CekData="<?=$key['NIM']."|".$key['Nama']."|".$key['TanggalUjianSkripsi']."|".$key['Konsentrasi']?>" class="btn btn-sm btn-warning CekData" data-toggle="tooltip" data-placement="top" title="Menilai Skripsi"><i class="fas fa-edit"></i></button>
                                  <button CekArtikel="<?=$key['NIM']."|".$key['Nama']."|".$key['TanggalUjianSkripsi']."|".$key['Konsentrasi']?>" class="btn btn-sm btn-success CekArtikel" data-toggle="tooltip" data-placement="top" title="Menilai Artikel"><i class="fas fa-edit"></i></button>
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
    <div class="modal fade" id="ModalProposal">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-body">
            <embed id="PathProposal" src="" type="application/pdf" width="100%" height="520"/>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalRevisi">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-success">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
									<div class="card-header bg-danger text-light mt-2">
										<b>Form Catatan Revisi Ujian Skripsi</b>
									</div>
									<div class="card-body border border-primary bg-warning">
										<div class="container-fluid">
											<div class="row">
                        <div class="col-4 my-1">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>NIM</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="_NIM" disabled>
													</div>
												</div>
												<div class="col-8 my-1">
													<div class="input-group input-group-sm"> 
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Nama</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="_Nama" disabled>
													</div>
                        </div>
                        <div class="col-lg-12">
                          <div class="input-group input-group-sm"> 
                            <div class="input-group-prepend">
                              <label class="input-group-text bg-primary text-light"><b>Catatan Revisi</b></label>
                            </div>
                            <textarea class="form-control" id="CatatanPenguji" rows="3"></textarea>
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
    <div class="modal fade" id="ModalValidasiSkripsi">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-success">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
									<div class="card-header bg-danger text-light mt-2">
										<b>Form Penilaian Ujian Skripsi</b>
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
															<label class="input-group-text bg-primary text-light"><b>Tanggal Ujian Skripsi</b></label>
														</div>
														<input class="form-control form-control-sm" type="date" id="TanggalUjianSkripsi" value="<?=date('Y-m-d')?>" disabled>
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
                            <div class="col-10">
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
                            <div class="col-2">
                              <input class="form-control form-control-sm" type="text" id="_LatarBelakang" value="0.0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1"> 
                          <div class="row">
                            <div class="col-10">
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
                            <div class="col-2">
                              <input class="form-control form-control-sm" type="text" id="_RumusanPermasalahan" value="0.0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1"> 
                          <div class="row">
                            <div class="col-10">
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
                            <div class="col-2">
                              <input class="form-control form-control-sm" type="text" id="_TeoriPenunjang" value="0.0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1"> 
                          <div class="row">
                            <div class="col-10">
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
                            <div class="col-2">
                              <input class="form-control form-control-sm" type="text" id="_PenelitianTerdahulu" value="0.0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1"> 
                          <div class="row">
                            <div class="col-10">
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
                            <div class="col-2">
                              <input class="form-control form-control-sm" type="text" id="_KerangkaFikir" value="0.0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1"> 
                          <div class="row">
                            <div class="col-10">
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
                            <div class="col-2">
                              <input class="form-control form-control-sm" type="text" id="_FokusPenelitin" value="0.0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1"> 
                          <div class="row">
                            <div class="col-10">
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
                            <div class="col-2">
                              <input class="form-control form-control-sm" type="text" id="_AlatAnalisis" value="0.0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1"> 
                          <div class="row">
                            <div class="col-10">
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-light"><b>Gambaran Umum Penelitian</b></label>
                                </div>
                                <select class="custom-select custom-select-sm" id="GambaranPenelitian">										
                                  <option value="0"></option><option value="1">1. Tidak disebutkan</option>
                                  <option value="2">2. Disebutkan namun tidak sesuai dengan tujuan penelitian</option>
                                  <option value="3">3. Disebutkan namun tidak lengkap dan sesuai</option>
                                  <option value="4">4. Disebutkan lengkap dan sesuai</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-2">
                              <input class="form-control form-control-sm" type="text" id="_GambaranPenelitian" value="0.0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1"> 
                          <div class="row">
                            <div class="col-10">
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-light"><b>Analisis Data</b></label>
                                </div>
                                <select class="custom-select custom-select-sm" id="AnalisisData">										
                                  <option value="0"></option><option value="1">1. Analisis tidak sesuai dengan metodologi</option>
                                  <option value="2">2. Analisis sesuai dengan metodologi namun hasil kurang sesuai dengan tujuan penelitian</option>
                                  <option value="3">3. Analisis sesuai metodologi, hasil sesuai tujuan penelitian, namun deskripsi kurang memadai</option>
                                  <option value="4">4. Analisis sesuai metodologi, hasil sesuai tujuan penelitian dan deskripsi memadai</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-2">
                              <input class="form-control form-control-sm" type="text" id="_AnalisisData" value="0.0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1"> 
                          <div class="row">
                            <div class="col-10">
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-light"><b>Kesimpulan</b></label>
                                </div>
                                <select class="custom-select custom-select-sm" id="Kesimpulan">										
                                  <option value="0"></option><option value="1">1. Tidak sesuai dengan hasil analisis tujuan penelitian</option>
                                  <option value="2">2. Sesuai dengan tujuan penelitian namun tidak fokus dan tidak lengkap</option>
                                  <option value="3">3. Sesuai dengan tujuan penelitian fokus namun tidak lengkap</option>
                                  <option value="4">4. Sesuai dengan tujuan penelitian, fokus dan lengkap</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-2">
                              <input class="form-control form-control-sm" type="text" id="_Kesimpulan" value="0.0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1"> 
                          <div class="row">
                            <div class="col-10">
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-light"><b>Saran</b></label>
                                </div>
                                <select class="custom-select custom-select-sm" id="Saran">										
                                  <option value="0"></option><option value="1">1. Tidak ada</option>
                                  <option value="2">2. Ada namun tidak sesuai</option>
                                  <option value="3">3. Ada sesuai namun tidak lengkap</option>
                                  <option value="4">4. Ada, sesuai dan lengkap</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-2">
                              <input class="form-control form-control-sm" type="text" id="_Saran" value="0.0">
                            </div>
                          </div>
                        </div>
												<div class="col-12 my-1">
                          <div class="input-group input-group-sm">
                            <button type="button" class="btn btn-primary" id="ValidasiSkripsi"><b>SIMPAN PENILAIAN&nbsp;<div id="LoadingValidasi" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
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
    <div class="modal fade" id="ModalValidasiArtikel">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-success">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
									<div class="card-header bg-danger text-light mt-2">
										<b>Form Penilaian Ujian Artikel</b>
									</div>
									<div class="card-body border border-primary bg-warning">
										<div class="container-fluid">
											<div class="row">
												<div class="col-4 my-1">
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>NIM</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="NIM_" disabled>
													</div>
												</div>
												<div class="col-8 my-1">
													<div class="input-group input-group-sm"> 
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Nama</b></label>
														</div>
														<input class="form-control form-control-sm" type="text" id="Nama_" disabled>
													</div>
                        </div>
                        <div class="col-lg-5 my-1">
													<div class="input-group input-group-sm mb-0">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Tanggal Ujian Skripsi</b></label>
														</div>
														<input class="form-control form-control-sm" type="date" id="TanggalUjianSkripsi_" value="<?=date('Y-m-d')?>" disabled>
													</div>
												</div>
												<div class="col-7 my-1"> 
													<div class="input-group input-group-sm">
														<div class="input-group-prepend">
															<label class="input-group-text bg-primary text-light"><b>Konsentrasi_</b></label>
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
                            <div class="col-10">
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-light"><b>Kemutakhiran & Keterbaruan Artikel</b></label>
                                </div>
                                <select class="custom-select custom-select-sm" id="Artikel">										
                                  <option value="0">Klik Disini</option><option value="1">1. Artikel tidak dapat menunjukan kemutakhiran penelitian dan keterbaruan (novelti)</option>
                                  <option value="2">2. Artikel kurang dapat menunjukan kemutakhiran penelitian dan keterbaruan (novelti)</option>
                                  <option value="3">3. Artikel kurang dapat menunjukan kemutakhiran penelitian dan keterbaruan (novelti)</option>
                                  <option value="4">4. Artikel dapat menunjukan kemutakhiran penelitian dan keterbaruan (novelti)</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-2">
                              <input class="form-control form-control-sm" type="text" id="_Artikel" value="0.0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1">
                          <div class="row">
                            <div class="col-10">
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-light"><b>Abstrak</b></label>
                                </div>
                                <select class="custom-select custom-select-sm" id="AbstrakArtikel">										
                                  <option value="0">Klik Disini</option><option value="1">1. Tidak Ada Abstrak</option>
                                  <option value="2">2. Ada namun tidak sesuai dengan inti isi Artikel</option>
                                  <option value="3">3. Ada isi lengkap namun masih kurang fokus </option>
                                  <option value="4">4. Ada isi lengkap, sesuai isi dan fokus telah dinyatakan/dituliskan dengan benar</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-2">
                              <input class="form-control form-control-sm" type="text" id="_AbstrakArtikel" value="0.0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1">
                          <div class="row">
                            <div class="col-10">
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-light"><b>Pendahuluan/tujuan penelitian/urgensi penelitian</b></label>
                                </div>
                                <select class="custom-select custom-select-sm" id="PendahuluanArtikel">										
                                  <option value="0">Klik Disini</option><option value="1">1. Tidak terdapat / mampu menuliskan dan menjelaskan urgensi, riset gap penelitian, dan tujuan penelitian</option>
                                  <option value="2">2. dapat menjelaskan/menuliskan Urgensi/gap riset penelitian/tujuan penelitian namun masih sangat lemah/tidak fokus/implisit/tidak didukung dengan empiris maupun teoritis</option>
                                  <option value="3">3. dapat menjelaskan/menuliskan Urgensi/gap riset penelitian dengan baik/fokus/eksplisit namun masih belum didukung data/empiris</option>
                                  <option value="4">4. dapat menjelaskan/menuliskan Urgensi/gap riset penelitian/tujuan penelitian dengan baik/fokus/eksplisit didukung data/empiris</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-2">
                              <input class="form-control form-control-sm" type="text" id="_PendahuluanArtikel" value="0.0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1">
                          <div class="row">
                            <div class="col-10">
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-light"><b>Study Literatur/refrensi</b></label>
                                </div>
                                <select class="custom-select custom-select-sm" id="LiteraturArtikel">										
                                  <option value="0">Klik Disini</option><option value="1">1. Tidak ada refrensi dan tidak melakukan Sintesa Literatur</option>
                                  <option value="2">2. ada refrensi dan melakukan sintesa literatur namun tidak relevan dgn topik penelitian</option>
                                  <option value="3">3. terdapat refrensi dan melakukan sintesa literatur , namun masih kurang/belum terstruktur sesuai enelitin</option>
                                  <option value="4">4. terdapat refrensi dan melakukan sintesa literatur relevan dan terstruktur sesuai penelitian</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-2">
                              <input class="form-control form-control-sm" type="text" id="_LiteraturArtikel" value="0.0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1">
                          <div class="row">
                            <div class="col-10">
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-light"><b>Komposisi refrensi</b></label>
                                </div>
                                <select class="custom-select custom-select-sm" id="KomposisiArtikel">										
                                  <option value="0">Klik Disini</option><option value="1">1. Penggunaan referensi primer < 30%</option>
                                  <option value="2">2. Penggunaan referensi primer 30- 49%</option>
                                  <option value="3">3. Penggunaan referensi primer 50-79%</option>
                                  <option value="4">4. Penggunaan referensi primer sebanyak 80%</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-2">
                              <input class="form-control form-control-sm" type="text" id="_KomposisiArtikel" value="0.0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1">
                          <div class="row">
                            <div class="col-10">
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-light"><b>Metodologi Penelitian</b></label>
                                </div>
                                <select class="custom-select custom-select-sm" id="MetodologiArtikel">										
                                  <option value="0">Klik Disini</option><option value="1">1. Tidak Dijelaskan/disebutkan alat analisa </option>
                                  <option value="2">2. disebutkan alat analisa, namun tidak jelas / tidak fokus</option>
                                  <option value="3">3. Disebutkan alat analisa namun belum terlalu lengkap/ tidak terlalu fokus dan tidak terlalu tepat sesuai tujuan penelitian</option>
                                  <option value="4">4. Dijelaskan cukup baik, lengkap, fokus dan disertai instumen penelitian yang tepat sesuai tujuan penelitian</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-2">
                              <input class="form-control form-control-sm" type="text" id="_MetodologiArtikel" value="0.0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1">
                          <div class="row">
                            <div class="col-10">
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-light"><b>Pembahasan dan Analisis Data</b></label>
                                </div>
                                <select class="custom-select custom-select-sm" id="PembahasanArtikel">										
                                  <option value="0">Klik Disini</option><option value="1">1. Analisis tidak sesuai dengan metodologi</option>
                                  <option value="2">2. Analisis dan pembahasan kurang mendalam, kurang sesuai dengan metodologi  dan tujuan penelitian</option>
                                  <option value="3">3. Analisis dan pembahasan dilakukan cukup mendalam sesuai metodologi, cukup hasil sesuai tujuan penelitian, namun deskripsi kurang memadai</option>
                                  <option value="4">4. Analisis dan pembahasan sangat mendalam, sudah sesuai metodologi, hasil sesuai tujuan penelitian dan deskripsi memadai</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-2">
                              <input class="form-control form-control-sm" type="text" id="_PembahasanArtikel" value="0.0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1">
                          <div class="row">
                            <div class="col-10">
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-light"><b>Kesimpulan dan keterbatasan penelitian</b></label>
                                </div>
                                <select class="custom-select custom-select-sm" id="KesimpulanArtikel">										
                                  <option value="0">Klik Disini</option><option value="1">1. tidak sesuai dengan hasil analisis tujuan penelitian dan tidak dijelaskan keterbatasan penelitian</option>
                                  <option value="2">2. sesuai dengan tujuan penelitian namun tidak fokus dan tidak lengkap dan tidak dijelaskan keterbatasan peneltiian</option>
                                  <option value="3">3. Sesuai dengan tujuan penelitian fokus namun tidak lengkap keterbatasan penelitian tidak dijelaskan</option>
                                  <option value="4">4. Sesuai dengan tujuan penelitian, fokus, lengkap dan keterbatasan penelitian dijelaskan</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-2">
                              <input class="form-control form-control-sm" type="text" id="_KesimpulanArtikel" value="0.0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1">
                          <div class="row">
                            <div class="col-10">
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-light"><b>Sistematika Daftar Pustaka</b></label>
                                </div>
                                <select class="custom-select custom-select-sm" id="DapusArtikel">										
                                  <option value="0">Klik Disini</option><option value="1">1. Tidak sesuai Sesuai dgn standart menggunakan APA Style</option>
                                  <option value="2">2. Kurang sesuai Sesuai dgn standart menggunakan APA Style</option>
                                  <option value="3">3. Cukup sesuai Sesuai dgn standart menggunakan APA Style</option>
                                  <option value="4">4. Sangat sesuai Sesuai dgn standart menggunakan APA Style</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-2">
                              <input class="form-control form-control-sm" type="text" id="_DapusArtikel" value="0.0">
                            </div>
                          </div>
                        </div>
                        <div class="col-12 my-1">
                          <div class="row">
                            <div class="col-10">
                              <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                  <label class="input-group-text bg-primary text-light"><b>Publikasi</b></label>
                                </div>
                                <select class="custom-select custom-select-sm" id="PublikasiArtikel">										
                                  <option value="0">Klik Disini</option><option value="1">1. Sinta 6</option>
                                  <option value="2">2. Sinta 5</option>
                                  <option value="3">3. sinta 3 dan 4</option>
                                  <option value="4">4. sinta 1 dan 2 / Scopus</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-2">
                              <input class="form-control form-control-sm" type="text" id="_PublikasiArtikel" value="0.0">
                            </div>
                          </div>
                        </div>
												<div class="col-12 my-1">
                          <div class="input-group input-group-sm">
                            <button type="button" class="btn btn-primary" id="ValidasiArtikel"><b>SIMPAN PENILAIAN&nbsp;<div id="LoadingArtikel" class="spinner-border spinner-border-sm text-white" role="status" style="display: none;"></div></b></button>
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

        $('#TabelUjianSkripsi').DataTable( {
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

        $(document).on("click",".LihatProposal",function(){
					var Path = $(this).attr('LihatProposal')
          $('#PathProposal').attr('src',Path)		
          $('#ModalProposal').modal("show")
				})

        $(document).on("click",".Revisi",function(){
					var Data = $(this).attr('Revisi')
					var Pisah = Data.split("|")
					$("#_NIM").val(Pisah[0])
					$("#_Nama").val(Pisah[1])
          var NIM = { NIM: Pisah[0] }
          $.post(BaseURL+"Dashboard/GetRevisiSkripsi", NIM).done(function(Respon) {
            $("#CatatanPenguji").val(Respon)
            $('#ModalRevisi').modal("show")
          })    
        })

        $(document).on("click",".CekData",function(){
					var Data = $(this).attr('CekData')
					var Pisah = Data.split("|")
					$("#NIM").val(Pisah[0])
					$("#Nama").val(Pisah[1])
					$("#TanggalUjianSkripsi").val(Pisah[2])
          $("#Konsentrasi").val(Pisah[3])
					$('#ModalValidasiSkripsi').modal("show")
        })

        $(document).on("click",".CekArtikel",function(){
					var Data = $(this).attr('CekArtikel')
					var Pisah = Data.split("|")
					$("#NIM_").val(Pisah[0])
					$("#Nama_").val(Pisah[1])
					$("#TanggalUjianSkripsi_").val(Pisah[2])
          $("#Konsentrasi_").val(Pisah[3])
					$('#ModalValidasiArtikel').modal("show")
        })
        
        $("#ValidasiSkripsi").click(function() {
          if ($("#_LatarBelakang").val() == 0 || isNaN($("#_LatarBelakang").val()) || $("#_LatarBelakang").val() > 4 || $("#_LatarBelakang").val().match(/^ *$/) !== null) {
            alert('Input Nilai Latar Belakang Belum Benar')
          } else if ($("#_RumusanPermasalahan").val() == 0 || isNaN($("#_RumusanPermasalahan").val()) || $("#_RumusanPermasalahan").val() > 4 || $("#_RumusanPermasalahan").val().match(/^ *$/) !== null) {
            alert('Input Nilai Rumusan Permasalahan Belum Benar')
          } else if ($("#_TeoriPenunjang").val() == 0 || isNaN($("#_TeoriPenunjang").val()) || $("#_TeoriPenunjang").val() > 4 || $("#_TeoriPenunjang").val().match(/^ *$/) !== null) {
            alert('Input Nilai Teori Penunjang Belum Benar')
          } else if ($("#_PenelitianTerdahulu").val() == 0 || isNaN($("#_PenelitianTerdahulu").val()) || $("#_PenelitianTerdahulu").val() > 4 || $("#_PenelitianTerdahulu").val().match(/^ *$/) !== null) {
            alert('Input Nilai Penelitian Terdahulu Belum Benar')
          } else if ($("#_KerangkaFikir").val() == 0 || isNaN($("#_KerangkaFikir").val()) || $("#_KerangkaFikir").val() > 4 || $("#_KerangkaFikir").val().match(/^ *$/) !== null) {
            alert('Input Nilai Kerangka Fikir Belum Benar')
          } else if ($("#_FokusPenelitin").val() == 0 || isNaN($("#_FokusPenelitin").val()) || $("#_FokusPenelitin").val() > 4 || $("#_FokusPenelitin").val().match(/^ *$/) !== null) {
            alert('Input Nilai Fokus Penelitin Belum Benar')
          } else if ($("#_AlatAnalisis").val() == 0 || isNaN($("#_AlatAnalisis").val()) || $("#_AlatAnalisis").val() > 4 || $("#_AlatAnalisis").val().match(/^ *$/) !== null) {
            alert('Input Nilai Alat Analisis Belum Benar')
          } else if ($("#_GambaranPenelitian").val() == 0 || isNaN($("#_GambaranPenelitian").val()) || $("#_GambaranPenelitian").val() > 4 || $("#_GambaranPenelitian").val().match(/^ *$/) !== null) {
            alert('Input Nilai Gambaran Penelitian Belum Benar')
          } else if ($("#_AnalisisData").val() == 0 || isNaN($("#_AnalisisData").val()) || $("#_AnalisisData").val() > 4 || $("#_AnalisisData").val().match(/^ *$/) !== null) {
            alert('Input Nilai Analisis Data Belum Benar')
          } else if ($("#_Kesimpulan").val() == 0 || isNaN($("#_Kesimpulan").val()) || $("#_Kesimpulan").val() > 4 || $("#_Kesimpulan").val().match(/^ *$/) !== null) {
            alert('Input Nilai Kesimpulan Belum Benar')
          } else if ($("#_Saran").val() == 0 || isNaN($("#_Saran").val()) || $("#_Saran").val() > 4 || $("#_Saran").val().match(/^ *$/) !== null) {
            alert('Input Nilai Saran Belum Benar')
          } else {
            var Mhs = { NIM: $("#NIM").val(),
                      Nilai: $("#_LatarBelakang").val().replace(/\s/g, "")+"$"+$("#_RumusanPermasalahan").val().replace(/\s/g, "")+"$"+$("#_TeoriPenunjang").val().replace(/\s/g, "")+"$"+$("#_PenelitianTerdahulu").val().replace(/\s/g, "")
                                +"$"+$("#_KerangkaFikir").val().replace(/\s/g, "")+"$"+$("#_FokusPenelitin").val().replace(/\s/g, "")+"$"+$("#_AlatAnalisis").val().replace(/\s/g, "")+"$"+$("#_GambaranPenelitian").val().replace(/\s/g, "")+"$"
                                +$("#_AnalisisData").val().replace(/\s/g, "")+"$"+ $("#_Kesimpulan").val().replace(/\s/g, "")+"$"+$("#_Saran").val().replace(/\s/g, "") }
            var Konfirmasi = confirm("Yakin Ingin Menyimpan Penilaian?"); 
            if (Konfirmasi == true) {
              $("#ValidasiSkripsi").attr("disabled", true); 
              $("#LoadingValidasi").show();                             
              $.post(BaseURL+"Dashboard/MenilaiSkripsi", Mhs).done(function(Respon) {
                if (Respon == '1') {
                  window.location = BaseURL + "Dashboard/PengujiSkripsi"
                } else {
                  alert(Respon)
                  $("#ValidasiSkripsi").attr("disabled", false); 
                  $("#LoadingValidasi").hide();                             
                }
              })
            } 
          }
        })

        $("#ValidasiArtikel").click(function() {
          if ($("#_Artikel").val() == 0 || isNaN($("#_Artikel").val()) || $("#_Artikel").val() > 4 || $("#_Artikel").val().match(/^ *$/) !== null) {
            alert('Input Nilai Kemutakhiran dan Keterbaruan Artikel Belum Benar')
          } else if ($("#_AbstrakArtikel").val() == 0 || isNaN($("#_AbstrakArtikel").val()) || $("#_AbstrakArtikel").val() > 4 || $("#_AbstrakArtikel").val().match(/^ *$/) !== null) {
            alert('Input Nilai Abstrak Artikel Belum Benar')
          } else if ($("#_PendahuluanArtikel").val() == 0 || isNaN($("#_PendahuluanArtikel").val()) || $("#_PendahuluanArtikel").val() > 4 || $("#_PendahuluanArtikel").val().match(/^ *$/) !== null) {
            alert('Input Nilai Pendahuluan/tujuan penelitian/urgensi penelitian Belum Benar')
          } else if ($("#_LiteraturArtikel").val() == 0 || isNaN($("#_LiteraturArtikel").val()) || $("#_LiteraturArtikel").val() > 4 || $("#_LiteraturArtikel").val().match(/^ *$/) !== null) {
            alert('Input Nilai Study Literatur/refrensi Belum Benar')
          } else if ($("#_KomposisiArtikel").val() == 0 || isNaN($("#_KomposisiArtikel").val()) || $("#_KomposisiArtikel").val() > 4 || $("#_KomposisiArtikel").val().match(/^ *$/) !== null) {
            alert('Input Nilai Komposisi refrensi Belum Benar')
          } else if ($("#_MetodologiArtikel").val() == 0 || isNaN($("#_MetodologiArtikel").val()) || $("#_MetodologiArtikel").val() > 4 || $("#_MetodologiArtikel").val().match(/^ *$/) !== null) {
            alert('Input Nilai Metodologi Penelitian Belum Benar')
          } else if ($("#_PembahasanArtikel").val() == 0 || isNaN($("#_PembahasanArtikel").val()) || $("#_PembahasanArtikel").val() > 4 || $("#_PembahasanArtikel").val().match(/^ *$/) !== null) {
            alert('Input Nilai Pembahasan dan Analisis Data Belum Benar')
          } else if ($("#_KesimpulanArtikel").val() == 0 || isNaN($("#_KesimpulanArtikel").val()) || $("#_KesimpulanArtikel").val() > 4 || $("#_KesimpulanArtikel").val().match(/^ *$/) !== null) {
            alert('Input Nilai Kesimpulan dan keterbatasan penelitian Belum Benar')
          } else if ($("#_DapusArtikel").val() == 0 || isNaN($("#_DapusArtikel").val()) || $("#_DapusArtikel").val() > 4 || $("#_DapusArtikel").val().match(/^ *$/) !== null) {
            alert('Input Nilai Sistematika Daftar Pustaka Belum Benar')
          } else if ($("#_PublikasiArtikel").val() == 0 || isNaN($("#_PublikasiArtikel").val()) || $("#_PublikasiArtikel").val() > 4 || $("#_PublikasiArtikel").val().match(/^ *$/) !== null) {
            alert('Input Nilai Publikasi Artikel Belum Benar')
          } else {
            var Mhs = { NIM: $("#NIM_").val(),
                      Nilai: $("#_Artikel").val().replace(/\s/g, "")+"$"+$("#_AbstrakArtikel").val().replace(/\s/g, "")+"$"+ $("#_PendahuluanArtikel").val().replace(/\s/g, "")+"$"+ $("#_LiteraturArtikel").val().replace(/\s/g, "")
                                +"$"+ $("#_KomposisiArtikel").val().replace(/\s/g, "")+"$"+ $("#_MetodologiArtikel").val().replace(/\s/g, "")+"$"+ $("#_PembahasanArtikel").val().replace(/\s/g, "")+"$"+ $("#_KesimpulanArtikel").val().replace(/\s/g, "")+"$"+$("#_DapusArtikel").val().replace(/\s/g, "")+"$"+$("#_PublikasiArtikel").val().replace(/\s/g, "") }
            var Konfirmasi = confirm("Yakin Ingin Menyimpan Penilaian?"); 
            if (Konfirmasi == true) {
              $("#ValidasiArtikel").attr("disabled", true); 
              $("#LoadingArtikel").show();                             
              $.post(BaseURL+"Dashboard/MenilaiSkripsi", Mhs).done(function(Respon) {
                if (Respon == '1') {
                  window.location = BaseURL + "Dashboard/PengujiSkripsi"
                } else {
                  alert(Respon)
                  $("#ValidasiArtikel").attr("disabled", false); 
                  $("#LoadingArtikel").hide();                             
                }
              })
            } 
          }
        })

			})
		</script>
  </body>
</html>