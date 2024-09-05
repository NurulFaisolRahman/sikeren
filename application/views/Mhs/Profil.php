							<div class="row p-3">
								<div class="col-2 d-flex justify-content-center pl-0 pr-0">
									<label for="InputFoto">
										<?php if ($Mhs['Foto'] == '') { ?>
											<img src="<?=base_url('img/Profil.jpg')?>" alt="..." class="img-circle profile_img mt-1" width="130px;">
										<?php	} else { ?>
											<img src="<?=base_url('FotoMhs/'.$Mhs['Foto'])?>" class="mt-1" width="130px" height="130px">
										<?php } ?>
									</label>
									<input type="file" id="InputFoto" style="display:none" onchange="Foto()"/> 
									<input type="hidden" id="NamaFoto" value="<?=$Mhs['Foto']?>">
								</div>
								<div class="col-4">
									<div class="row">
										<div class="col-12 my-1 pl-0">
											<div class="input-group input-group-sm"> 
												<div class="input-group-prepend">
													<label class="input-group-text bg-danger text-white"><b>NIM</b></label>
												</div>
												<input type="text" class="form-control form-control-sm" value="<?=$this->session->userdata('NIM')?>">
											</div>
										</div>
										<div class="col-12 my-1 pl-0">
											<div class="input-group input-group-sm"> 
												<div class="input-group-prepend">
													<label class="input-group-text bg-danger text-white"><b>Nama</b></label>
												</div>
												<input type="text" class="form-control form-control-sm" value="<?=$this->session->userdata('Nama')?>">
											</div>
										</div>
										<div class="col-12 my-1 pl-0">
											<div class="input-group input-group-sm"> 
												<input type="password" class="form-control form-control-sm" id="Password" placeholder="Isi Untuk Mengganti Password">
												<div class="input-group-prepend">
													<label class="input-group-text bg-primary text-white" id="GantiPassword"><b>Simpan</b></label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
            </div>
          </div> 
        </div>
        <!-- /page content -->
      </div>
		</div>
		<div class="modal fade" id="Kuisioner" data-keyboard="false">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
					<div class="card-header bg-primary text-light">
						<b>MOHON MAHASISWA MENGISI KUISIONER DULU (BISA MENGISI LEBIH DARI SATU)</b>
					</div>
          <div class="modal-body bg-warning">
						<div class="container">
							<div class="row">
								<div class="col-12">
									<div id="accordion">
										<div class="card">
											<div class="card-header py-0" id="headingOne">
												<h5 class="mb-0">
													<button class="btn btn-link collapsed my-0 pl-0 text-danger" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
														<b>Kuisioner Kepuasan Mahasiswa Terhadap Proses Pendidikan</b>
													</button>
												</h5>
											</div>
											<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
												<div class="card-body border border-primary bg-danger m-2">
													<div class="container">
														<div class="row">
															<div class="col-lg-4 col-sm-12 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>NIM</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="NIMKepuasan" value="<?=$this->session->userdata('NIM')?>" disabled>
																</div>
															</div> 
															<div class="col-lg-8 col-sm-12 mt-1"> 
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Program Studi</b></label>
																	</div>
																	<select class="custom-select custom-select-sm" id="HomebaseKepuasan" disabled>										
																		<option value="S1">S1 Ekonomi Pembangunan</option>
																		<option value="S2">S2 Ilmu Ekonomi</option>
																	</select>
																</div>
															</div> 
															<?php 
																$Tanya = array('Keandalan (reliability) : kemampuan dosen, tenaga kependidikan, dan pengelola dalam memberikan pelayanan.',
																									'Daya tanggap (responsiveness) : kemauan dari dosen, tenaga kependidikan, dan pengelola dalam membantu mahasiswa dan memberikan jasa dengan cepat.',
																									'Kepastian (assurance) : kemampuan dosen, tenaga kependidikan, dan pengelola untuk memberi keyakinan kepada mahasiswa bahwa pelayanan yang diberikan telah sesuai dengan ketentuan.',
																									'Empati (empathy) : kesediaan/kepedulian dosen, tenaga kependidikan, dan pengelola untuk memberi perhatian kepada mahasiswa.',
																									'Tangible : penilaian mahasiswa terhadap kecukupan, aksesibitas, kualitas sarana dan prasarana.'); 
																$Opsi = array('Sangat Baik','Baik','Cukup','Kurang');
															?>
															<?php for ($j=0; $j < count($Tanya); $j++) { ?>
																<div class="col-sm-12 mt-1">
																	<div class="input-group input-group-sm">
																		<div class="input-group-prepend">
																			<p class="input-group-text bg-primary text-light text-justify text-wrap"><b><?=($j+1).'. '.$Tanya[$j]?></b></p>
																		</div>
																	</div>
																</div> 
																<?php for ($i=0; $i < 4; $i++) { ?>
																<div class="col-lg-3 mt-1">
																	<div class="input-group input-group-sm ml-2"> 
																		<div class="form-check form-check-inline">
																			<input class="form-check-input" type="radio" name="Input<?=($j+1)?>" id="I<?=($j+1).$i?>" value="<?=($i+1)?>">
																			<label style="font-size: 14px;" class="form-check-label font-weight-bold text-white" for="I<?=($j+1).$i?>"><?=$Opsi[$i]?></label>
																		</div>
																	</div>
																</div> 
																<?php } ?>
															<?php } ?>
															<div class="col-12 text-center mt-1">
																<button type="button" class="btn btn-primary" id="KirimKepuasan"><b>Kirim</b></button>
															</div> 
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header py-0" id="headingTwo">
												<h5 class="mb-0">
													<button class="btn btn-link collapsed my-0 pl-0 text-danger" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
														<b>Kuisioner Prestasi Mahasiswa</b>
													</button>
												</h5>
											</div>
											<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
												<div class="card-body border border-primary bg-danger m-2">
													<div class="container">
														<div class="row">
															<div class="col-lg-6 mt-1"> 
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Program Studi</b></label>
																	</div>
																	<select class="custom-select custom-select-sm" id="HomebasePrestasi" disabled>										
																		<option value="S1">S1 Ekonomi Pembangunan</option>
																		<option value="S2">S2 Ilmu Ekonomi</option>
																	</select>
																</div>
															</div>
															<div class="col-lg-6 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Jenis Prestasi</b></label>
																	</div>
																	<select class="custom-select" id="JenisPrestasi">                    
																		<option value="1">Prestasi Akademik</option>
																		<option value="2">Prestasi Non Akademik</option>
																	</select>
																</div>
															</div>
															<div class="col-lg-3 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>NIM</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="NIMPrestasi" value="<?=$this->session->userdata('NIM')?>" disabled>
																</div>
															</div> 
															<div class="col-lg-5 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Prestasi Tingkat</b></label>
																	</div>
																	<select class="custom-select" id="TingkatPrestasi">                    
																		<option value="1">Lokal/Wilayah</option>
																		<option value="2">Nasional</option>
																		<option value="3">Internasional</option>
																	</select>
																</div>
															</div>
															<div class="col-lg-4 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Prestasi Tahun</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="TahunPrestasi" data-inputmask='"mask": "9999"' data-mask value="20">
																</div>
															</div>
															<div class="col-lg-12 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Nama Kegiatan</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="NamaPrestasi">
																</div>
															</div> 
															<div class="col-lg-12 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Prestasi Yang Dicapai</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="CapaianPrestasi">
																</div>
															</div>
															<div class="col-lg-12 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<span class="input-group-text bg-primary text-light"><b>Bukti PDF</b></span>
																	</div>
																	<input class="form-control" type="file" id="BuktiPrestasi">
																</div>
															</div>  
															<div class="col-sm-auto">
																<button type="button" class="btn btn-primary" id="KirimPrestasi"><b>Kirim</b></button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header py-0" id="headingThree">
												<h5 class="mb-0">
													<button class="btn btn-link collapsed my-0 pl-0 text-danger" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
														<b>Kuisioner Publikasi Ilmiah Mahasiswa</b>
													</button>
												</h5>
											</div>
											<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
												<div class="card-body border border-primary bg-danger m-2">
													<div class="container">
														<div class="row">
															<div class="col-lg-4 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>NIM</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="NIMPublikasi" value="<?=$this->session->userdata('NIM')?>" disabled>
																</div>
															</div>
															<div class="col-lg-8 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<span class="input-group-text bg-primary text-light"><b>Nama</b></span>
																	</div>
																	<input type="text" class="form-control" id="NamaPublikasi" placeholder="Input Nama Mahasiswa"> 
																</div>
															</div>
															<div class="col-lg-7 mt-1"> 
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Program Studi</b></label>
																	</div>
																	<select class="custom-select custom-select-sm" id="HomebasePublikasi" disabled>										
																		<option value="S1">S1 Ekonomi Pembangunan</option>
																		<option value="S2">S2 Ilmu Ekonomi</option>
																	</select>
																</div>
															</div>
															<div class="col-lg-5 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend"> 
																		<label class="input-group-text bg-primary text-light"><b>Tahun Publikasi</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="TahunPublikasi" data-inputmask='"mask": "9999"' data-mask value="20">
																</div>
															</div>
															<div class="col-lg-12 mt-1"> 
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Jenis Publikasi</b></label>
																	</div>
																	<select class="custom-select custom-select-sm" id="JenisPublikasi" autocomplete="off"> 										
																		<option value="1">Jurnal penelitian tidak terakreditasi</option>
																		<option value="2">Jurnal penelitian nasional terakreditasi</option>
																		<option value="3">Jurnal penelitian internasional</option>
																		<option value="4">Jurnal penelitian internasional bereputasi</option>
																		<option value="5">Seminar wilayah/lokal/perguruan tinggi</option>
																		<option value="6">Seminar nasional</option>
																		<option value="7">Seminar internasional</option>
																		<option value="8">Tulisan di media massa wilayah</option>
																		<option value="9">Tulisan di media massa nasional</option>
																		<option value="10">Tulisan di media massa internasional</option>
																	</select>
																</div>
															</div>
															<div class="col-lg-6 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<span class="input-group-text bg-primary text-light"><b>Judul</b></span>
																	</div>
																	<input type="text" class="form-control" id="JudulPublikasi" placeholder="Input Judul Publikasi"> 
																</div>
															</div>
															<div class="col-lg-6 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<span class="input-group-text bg-primary text-light"><b>Bukti PDF</b></span>
																	</div>
																	<input class="form-control" type="file" id="BuktiPublikasi">
																</div>
															</div>
															<div class="col-lg-12">
																<button type="button" class="btn btn-primary" id="KirimPublikasi"><b>Kirim</b></button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header py-0" id="headingFour">
												<h5 class="mb-0">
													<button class="btn btn-link collapsed my-0 pl-0 text-danger" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
														<b>Kuisioner Mahasiswa HKI (Paten, Paten Sederhana)</b>
													</button>
												</h5>
											</div>
											<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
												<div class="card-body border border-primary bg-danger m-2">
													<div class="container">
														<div class="row">
															<div class="col-lg-4 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>NIM</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="NIMPaten" value="<?=$this->session->userdata('NIM')?>" disabled>
																</div>
															</div>
															<div class="col-lg-8 mt-1"> 
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Program Studi</b></label>
																	</div>
																	<select class="custom-select custom-select-sm" id="HomebasePaten" disabled>										
																		<option value="S1">S1 Ekonomi Pembangunan</option>
																		<option value="S2">S2 Ilmu Ekonomi</option>
																	</select>
																</div>
															</div>
															<div class="col-lg-9 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Judul</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="JudulPaten">
																</div>
															</div>
															<div class="col-lg-3 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Tahun</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="TahunPaten" data-inputmask='"mask": "9999"' data-mask value="20">
																</div>
															</div> 
															<div class="col-lg-12 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<span class="input-group-text bg-primary text-light"><b>Bukti PDF</b></span>
																	</div>
																	<input class="form-control" type="file" id="BuktiPaten">
																</div>
															</div>  
															<div class="col-lg-12">
																<button type="button" class="btn btn-primary" id="KirimPaten"><b>Kirim</b></button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header py-0" id="headingFive">
												<h5 class="mb-0">
													<button class="btn btn-link collapsed my-0 pl-0 text-danger" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
														<b>Kuisioner Mahasiswa HKI (Hak Cipta, Desain Produk Industri, dll)</b>
													</button>
												</h5>
											</div>
											<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
												<div class="card-body border border-primary bg-danger m-2">
													<div class="container">
														<div class="row">
															<div class="col-lg-4 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>NIM</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="NIMHKI" value="<?=$this->session->userdata('NIM')?>" disabled>
																</div>
															</div>
															<div class="col-lg-8 mt-1"> 
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Program Studi</b></label>
																	</div>
																	<select class="custom-select custom-select-sm" id="HomebaseHKI" disabled>										
																		<option value="S1">S1 Ekonomi Pembangunan</option>
																		<option value="S2">S2 Ilmu Ekonomi</option>
																	</select>
																</div>
															</div>
															<div class="col-lg-9 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Judul</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="JudulHKI">
																</div>
															</div>
															<div class="col-lg-3 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Tahun</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="TahunHKI" data-inputmask='"mask": "9999"' data-mask value="20">
																</div>
															</div> 
															<div class="col-lg-12 m1-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<span class="input-group-text bg-primary text-light"><b>Bukti PDF</b></span>
																	</div>
																	<input class="form-control" type="file" id="BuktiHKI">
																</div>
															</div>  
															<div class="col-lg-12">
																<button type="button" class="btn btn-primary" id="KirimHKI"><b>Kirim</b></button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header py-0" id="headingSix">
												<h5 class="mb-0">
													<button class="btn btn-link collapsed my-0 pl-0 text-danger" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
														<b>Kuisioner Mahasiswa (Teknologi Tepat Guna, Produk, Karya Seni, Rekayasa Sosial)</b>
													</button>
												</h5>
											</div>
											<div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
												<div class="card-body border border-primary bg-danger m-2">
													<div class="container">
														<div class="row">
															<div class="col-lg-4 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>NIM</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="NIMKarya" value="<?=$this->session->userdata('NIM')?>" disabled>
																</div>
															</div>
															<div class="col-lg-8 mt-1"> 
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Program Studi</b></label>
																	</div>
																	<select class="custom-select custom-select-sm" id="HomebaseKarya" disabled>										
																		<option value="S1">S1 Ekonomi Pembangunan</option>
																		<option value="S2">S2 Ilmu Ekonomi</option>
																	</select>
																</div>
															</div>
															<div class="col-lg-9 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Judul</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="JudulKarya">
																</div>
															</div>
															<div class="col-lg-3 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Tahun</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="TahunKarya" data-inputmask='"mask": "9999"' data-mask value="20">
																</div>
															</div> 
															<div class="col-lg-12 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<span class="input-group-text bg-primary text-light"><b>Bukti PDF</b></span>
																	</div>
																	<input class="form-control" type="file" id="BuktiKarya">
																</div>
															</div>  
															<div class="col-lg-12">
																<button type="button" class="btn btn-primary" id="KirimKarya"><b>Kirim</b></button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="card">
											<div class="card-header py-0" id="headingSeven">
												<h5 class="mb-0">
													<button class="btn btn-link collapsed my-0 pl-0 text-danger" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
														<b>Kuisioner Mahasiswa (Buku ber-ISBN, Book Chapter)</b>
													</button>
												</h5>
											</div>
											<div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
												<div class="card-body border border-primary bg-danger m-2">
													<div class="container">
														<div class="row">
															<div class="col-lg-4 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>NIM</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="NIMBuku" value="<?=$this->session->userdata('NIM')?>" disabled>
																</div>
															</div>
															<div class="col-lg-8 mt-1"> 
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Program Studi</b></label>
																	</div>
																	<select class="custom-select custom-select-sm" id="HomebaseBuku" disabled>										
																		<option value="S1">S1 Ekonomi Pembangunan</option>
																		<option value="S2">S2 Ilmu Ekonomi</option>
																	</select>
																</div>
															</div>
															<div class="col-lg-9 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Judul Buku</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="JudulBuku">
																</div>
															</div>
															<div class="col-lg-3 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Tahun</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="TahunBuku" data-inputmask='"mask": "9999"' data-mask value="20">
																</div>
															</div> 
															<div class="col-lg-12 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<span class="input-group-text bg-primary text-light"><b>Bukti</b></span>
																	</div>
																	<input class="form-control" type="file" id="BuktiBuku">
																</div>
															</div>  
															<div class="col-lg-12">
																<button type="button" class="btn btn-primary" id="KirimBuku"><b>Kirim</b></button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="card"> 
											<div class="card-header py-0" id="headingEight">
												<h5 class="mb-0">
													<button class="btn btn-link collapsed my-0 pl-0 text-danger" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
														<b>Kuisioner Alumni Yang Telah Bekerja</b>
													</button>
												</h5>
											</div>
											<div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
												<div class="card-body border border-primary bg-danger m-2">
													<div class="container">
														<div class="row">
															<div class="col-lg-8 mt-1"> 
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Program Studi</b></label>
																	</div>
																	<select class="custom-select custom-select-sm" id="HomebaseAlumni" disabled>										
																		<option value="S1">S1 Ekonomi Pembangunan</option>
																		<option value="S2">S2 Ilmu Ekonomi</option>
																	</select>
																</div>
															</div>
															<div class="col-lg-4 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Alumni Tahun</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="TahunAlumni" data-inputmask='"mask": "9999"' data-mask value="20">
																</div>
															</div>
															<div class="col-lg-4 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>NIM</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="NIMAlumni" value="<?=$this->session->userdata('NIM')?>" disabled>
																</div>
															</div> 
															<div class="col-lg-8 mt-1">
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Nama</b></label>
																	</div>
																	<input class="form-control form-control-sm" type="text" id="NamaAlumni" placeholder="Input Nama">
																</div>
															</div> 
															<div class="col-lg-12 mt-1"> 
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light text-wrap text-justify"><b>Waktu Tunggu Mendapatkan Pekerjaan (WT)</b></label>
																	</div>
																	<select class="custom-select custom-select-sm" id="TungguKerjaAlumni">										
																		<option value="1">WT < 6 bulan</option>
																		<option value="2">6 ≤ WT ≤ 18 bulan</option>
																		<option value="3">WT > 18 bulan</option>
																	</select>
																</div>
															</div>
															<div class="col-lg-12 mt-1"> 
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light"><b>Tingkat Kesesuaian Bidang Pekerjaan</b></label>
																	</div>
																	<select class="custom-select custom-select-sm" id="BidangKerjaAlumni">										
																		<option value="1">Rendah</option>
																		<option value="2">Sedang</option>
																		<option value="3">Tinggi</option>
																	</select>
																</div>
															</div>
															<div class="col-lg-12 mt-1"> 
																<div class="input-group input-group-sm">
																	<div class="input-group-prepend">
																		<label class="input-group-text bg-primary text-light text-wrap text-justify"><b>Tingkat / Ukuran Tempat Kerja / Berwirausaha</b></label>
																	</div>
																	<select class="custom-select custom-select-sm" id="TingkatKerjaAlumni">										
																		<option value="1">Lokal/Wilayah/Berwirausaha tidak Berbadan Hukum</option>
																		<option value="2">Nasional/Berwirausaha Berbadan Hukum</option>
																		<option value="3">Multinasiona/Internasional</option>
																	</select>
																</div>
															</div>
															<div class="col-lg-12">
																<button type="button" class="btn btn-primary" id="KirimAlumni"><b>Kirim</b></button>
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
      </div>
    </div>
    <script src="<?=base_url("vendors/jquery/dist/jquery.min.js")?>"></script>
   	<script src="<?=base_url("vendors/bootstrap/dist/js/bootstrap.bundle.min.js")?>"></script>
		<script src="<?=base_url("build/js/custom.min.js")?>"></script>
		<script>
			$(document).ready(function(){
				var BaseURL = '<?=base_url()?>'  
				alert('Mohon Update Email Di Menu Dosen Pembimbing di Form Data Proposal Guna Antisipasi Lupa Password, Abaikan Jika Sudah.')
				// $("#Kuisioner").modal("show");

				$("#KirimKepuasan").click(function() {
          if (isNaN($("#NIMKepuasan").val()) || $("#NIMKepuasan").val().length != 12) {
            alert('Input NIM Hanya Boleh 12 Digit Angka!')
          } else if ($("input[name='Input1']:checked").val() == undefined) {
            alert('Pertanyaan Nomer 1 Wajib Di Isi!')
          } else if ($("input[name='Input2']:checked").val() == undefined) {
            alert('Pertanyaan Nomer 2 Wajib Di Isi!')
          } else if ($("input[name='Input3']:checked").val() == undefined) {
            alert('Pertanyaan Nomer 3 Wajib Di Isi!')
          } else if ($("input[name='Input4']:checked").val() == undefined) {
            alert('Pertanyaan Nomer 4 Wajib Di Isi!')
          } else if ($("input[name='Input5']:checked").val() == undefined) {
            alert('Pertanyaan Nomer 5 Wajib Di Isi!')
          } else {
            Poin = ""
            for (let i = 1; i <= 5; i++) {
              Poin += $("input[name='Input"+i+"']:checked").val()
              if (i < 5) {
                Poin += '|'
              } 
            }
            var Data = { NIM: $("#NIMKepuasan").val(),
                         Homebase: $("#HomebaseKepuasan").val(),
                         Poin: Poin,
                         Tahun: new Date().getFullYear()}
            $.post(BaseURL+"SMD/InputKuisioner/KepuasanMahasiswa", Data).done(function(Respon) {
              if (Respon == '1') {
                alert('Terima Kasih Telah Mengisi Kuisioner :)')
								window.location = BaseURL + "Mhs/Profil"
              } else {
                alert(Respon)
              }
            })
          }
        })

				$("#KirimPrestasi").click(function() {
          if (isNaN($("#NIMPrestasi").val()) || $("#NIMPrestasi").val().length != 12) {
            alert('Input NIM Hanya Boleh 12 Digit Angka!')
          } else if (isNaN($("#TahunPrestasi").val()) || $("#TahunPrestasi").val().length != 4) {
            alert('Input Tahun Prestasi Hanya Boleh 4 Digit Angka!')
          } else if ($("#NamaPrestasi").val() === "") {
            alert('Input Nama Prestasi Tidak Boleh Kosong!')
          } else if ($("#CapaianPrestasi").val() === "") {
            alert('Input Capaian Prestasi Tidak Boleh Kosong!')
          } else {
            var fd = new FormData()
						fd.append('Homebase',$("#HomebasePrestasi").val())
            fd.append('NIM',$("#NIMPrestasi").val())
            fd.append('JenisPrestasi',$("#JenisPrestasi").val())
            fd.append('NamaPrestasi',$("#NamaPrestasi").val())
            fd.append('TingkatPrestasi',$("#TingkatPrestasi").val())
            fd.append('CapaianPrestasi',$("#CapaianPrestasi").val())
            fd.append('TahunPrestasi',$("#TahunPrestasi").val())
            fd.append("Bukti", $('#BuktiPrestasi')[0].files[0])
            $.ajax({
							url: BaseURL+'SMD/InputKuisioner/PrestasiMahasiswa',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
                  alert('Terima Kasih Telah Mengisi Kuisioner :)')
									window.location = BaseURL + "Mhs/Profil"
								}
								else {
									alert(Respon)
								}
							}
						})
          }
        })

				$("#KirimPublikasi").click(function() {
          if (isNaN($("#NIMPublikasi").val()) || $("#NIMPublikasi").val().length != 12) {
            alert('Input NIM Hanya Boleh 12 Digit Angka!')
          } else if ($("#NamaPublikasi").val() === "") {
            alert('Input Nama Tidak Boleh Kosong!')
          } else if (isNaN($("#TahunPublikasi").val()) || $("#TahunPublikasi").val().length != 4) {
            alert('Input Tahun Hanya Boleh 4 Digit Angka!')
          } else if ($("#JudulPublikasi").val() === "") {
            alert('Input Judul Tidak Boleh Kosong!')
          } else {
            var fd = new FormData()
						fd.append('Homebase',$("#HomebasePublikasi").val())
            fd.append('NIM',$("#NIMPublikasi").val())
            fd.append('Nama',$("#NamaPublikasi").val())
            fd.append('Judul',$("#JudulPublikasi").val())
            fd.append('Tahun',$("#TahunPublikasi").val())
            fd.append('Jenis',$("#JenisPublikasi").val())
            fd.append("Bukti", $('#BuktiPublikasi')[0].files[0])
            $.ajax({
							url: BaseURL+'SMD/InputKuisioner/PublikasiMahasiswa',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
                  alert('Terima Kasih Telah Mengisi Kuisioner :)')
									window.location = BaseURL + "Mhs/Profil"
								}
								else {
									alert(Respon)
								}
							}
						})
          }
        })

				$("#KirimPaten").click(function() {
          if (isNaN($("#NIMPaten").val()) || $("#NIMPaten").val().length != 12) {
            alert('Input NIM Hanya Boleh 12 Digit Angka!')
          } else if ($("#JudulPaten").val() === "") {
            alert('Input Judul Tidak Boleh Kosong!')
          } else if (isNaN($("#TahunPaten").val()) || $("#TahunPaten").val().length != 4) {
            alert('Input Tahun Hanya Boleh 4 Digit!')
          } else {
            var fd = new FormData()
						fd.append('Homebase',$("#HomebasePaten").val())
            fd.append('NIM',$("#NIMPaten").val())
            fd.append('Judul',$("#JudulPaten").val())
            fd.append('Tahun',$("#TahunPaten").val())
            fd.append("Bukti", $('#BuktiPaten')[0].files[0])
            $.ajax({
							url: BaseURL+'SMD/InputKuisioner/PatenMahasiswa',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
                  alert('Terima Kasih Telah Mengisi Kuisioner :)')
									window.location = BaseURL + "Mhs/Profil"
								}
								else {
									alert(Respon)
								}
							}
						})
          }
        })

				$("#KirimHKI").click(function() {
          if (isNaN($("#NIMHKI").val()) || $("#NIMHKI").val().length != 12) {
            alert('Input NIM Hanya Boleh 12 Digit Angka!')
          } else if ($("#JudulHKI").val() === "") {
            alert('Input Judul Tidak Boleh Kosong!')
          } else if (isNaN($("#TahunHKI").val()) || $("#TahunHKI").val().length != 4) {
            alert('Input Tahun Belum Benar!')
          } else {
            var fd = new FormData()
						fd.append('Homebase',$("#HomebaseHKI").val())
            fd.append('NIM',$("#NIMHKI").val())
            fd.append('Judul',$("#JudulHKI").val())
            fd.append('Tahun',$("#TahunHKI").val())
            fd.append("Bukti", $('#BuktiHKI')[0].files[0])
            $.ajax({
							url: BaseURL+'SMD/InputKuisioner/HKIMahasiswa',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
                  alert('Terima Kasih Telah Mengisi Kuisioner :)')
									window.location = BaseURL + "Mhs/Profil"
								}
								else {
									alert(Respon)
								}
							}
						})
          }
        })

				$("#KirimKarya").click(function() {
          if (isNaN($("#NIMKarya").val()) || $("#NIMKarya").val().length != 12) {
            alert('Input NIM Hanya Boleh 12 Digit Angka!')
          } else if ($("#JudulKarya").val() === "") {
            alert('Input Judul Tidak Boleh Kosong!')
          } else if (isNaN($("#TahunKarya").val()) || $("#TahunKarya").val().length != 4) {
            alert('Input Tahun Belum Benar!')
          } else {
            var fd = new FormData()
						fd.append('Homebase',$("#HomebaseKarya").val())
            fd.append('NIM',$("#NIMKarya").val())
            fd.append('Judul',$("#JudulKarya").val())
            fd.append('Tahun',$("#TahunKarya").val())
            fd.append("Bukti", $('#BuktiKarya')[0].files[0])
            $.ajax({
							url: BaseURL+'SMD/InputKuisioner/KaryaMahasiswa',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
                  alert('Terima Kasih Telah Mengisi Kuisioner :)')
									window.location = BaseURL + "Mhs/Profil"
								}
								else {
									alert(Respon)
								}
							}
						})
          }
        })

				$("#KirimBuku").click(function() {
          if (isNaN($("#NIMBuku").val()) || $("#NIMBuku").val().length != 12) {
            alert('Input NIM Hanya Boleh 12 Digit Angka!')
          } else if ($("#JudulBuku").val() === "") {
            alert('Input Judul Buku Tidak Boleh Kosong!')
          } else if (isNaN($("#TahunBuku").val()) || $("#TahunBuku").val().length != 4) {
            alert('Input Tahun Belum Benar!')
          } else {
            var fd = new FormData()
						fd.append('Homebase',$("#HomebaseBuku").val())
            fd.append('NIM',$("#NIMBuku").val())
            fd.append('Judul',$("#JudulBuku").val())
            fd.append('Tahun',$("#TahunBuku").val())
            fd.append("Bukti", $('#BuktiBuku')[0].files[0])
            $.ajax({
							url: BaseURL+'SMD/InputKuisioner/BukuMahasiswa',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
                  alert('Terima Kasih Telah Mengisi Kuisioner :)')
									window.location = BaseURL + "Mhs/Profil"
								}
								else {
									alert(Respon)
								}
							}
						})
          }
        })

				$("#KirimAlumni").click(function() {
          if (isNaN($("#TahunAlumni").val()) || $("#TahunAlumni").val().length != 4) {
            alert('Input Tahun Belum Benar!')
          } else if (isNaN($("#NIMAlumni").val()) || $("#NIMAlumni").val().length != 12) {
            alert('Input NIM Hanya Boleh 12 Digit Angka!')
          } else if ($("#NamaAlumni").val() === "") {
            alert('Input Nama Tidak Boleh Kosong!')
          } else {
            var fd = new FormData()
						fd.append('Homebase',$("#HomebaseAlumni").val())
            fd.append('NIM',$("#NIMAlumni").val())
            fd.append('Nama',$("#NamaAlumni").val())
            fd.append('Tahun',$("#TahunAlumni").val())
            fd.append('TungguKerja',$("#TungguKerjaAlumni").val())
            fd.append('BidangKerja',$("#BidangKerjaAlumni").val())
            fd.append('TingkatKerja',$("#TingkatKerjaAlumni").val())
            $.ajax({
							url: BaseURL+'SMD/InputKuisioner/Alumni',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
                  alert('Terima Kasih Telah Mengisi Kuisioner :)')
									window.location = BaseURL + "Mhs/Profil"
								}
								else {
									alert(Respon)
								}
							}
						})
          }
        })

				$("#GantiPassword").click(function() {
					if ($("#Password").val() === "") {
						alert('Password Tidak Boleh Kosong')
					} else {
						var Password = { Password: $("#Password").val() }
						$.post(BaseURL+"Mhs/GantiPassword", Password).done(function(Respon) {
							if (Respon == '1') {
								alert('Password Berhasil Di Ganti!')
								window.location = BaseURL + "Mhs/Profil"
							} else {
								alert(Respon)
							}
						})
					}
				})
			})

			function Foto() {
				var Tipe = ["image/png","image/jpeg","image/jpg"]
				if (!Tipe.includes($('#InputFoto')[0].files[0].type)) {
					alert('Mohon Input Foto jpg/png')
				} else {
					var BaseURL = '<?=base_url()?>';
					var fd = new FormData()
					fd.append("Foto", $('#InputFoto')[0].files[0])
					fd.append("NamaFoto", $('#NamaFoto').val())
					$.ajax({
						url: BaseURL+'Mhs/Foto',
						type: 'post',
						data: fd,
						contentType: false,
						processData: false,
						success: function(Respon){
							if (Respon == '1') {
								window.location = BaseURL + "Mhs/Profil"
							}
							else {
								alert(Respon)
							}
						}
					})
				}
			}
		</script>
  </body>
</html>