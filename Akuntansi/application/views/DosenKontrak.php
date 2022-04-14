<div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-sm-12 my-2 ">    
                    <button type="button" class="btn btn-primary text-light mb-2" data-toggle="modal" data-target="#ModalInputDosenKontrak"><i class="fa fa-plus"></i> <b>Input Data</b></button> 
                      <div class="table-responsive mb-2">
                        <table id="TabelDosenKontrak" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th class="text-center align-middle">No</th>
                              <th class="text-center align-middle">Homebase</th>
                              <th class="text-center align-middle">NIDN / NIDK</th>
                              <th class="align-middle">Nama Dosen Kontrak</th>
                              <th class="text-center align-middle">Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($DosenKontrak as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="text-center align-middle"><?=$key['Homebase']?></td>
                                <td class="text-center align-middle"><?=$key['NIDN']?></td>
                                <td class="align-middle"><?=$key['Nama']?></td>
                                <td class="text-center align-middle">
                                  <button Edit="<?=$key['Homebase']."$".$key['NIDN']."$".$key['Nama']."$".$key['S2']."$".$key['BidangKeahlian']."$".$key['JabatanAkademik']."$".$key['SertifikatPendidik']."$".$key['SertifikatKompetensi']."$".$key['MengajarPS']."$".$key['KesesuaianBidang']."$".$key['Bukti']?>" class="btn btn-sm btn-warning Edit"><i class="fas fa-edit"></i></button>
                                  <button Hapus="<?=$key['NIDN']."|".$key['Bukti']?>" class="btn btn-sm btn-danger Hapus"><i class="fas fa-trash"></i></button>  
                                  <button LihatSertifikat="<?=base_url('DosenKontrak/'.$key['Bukti'])?>" class="btn btn-sm btn-primary LihatSertifikat"><i class="fas fa-download"></i></button>  
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
    <div class="modal fade" id="ModalInputDosenKontrak">
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
                    <select class="custom-select" id="homebase">
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>NIDN / NIDK</b></span>
                    </div>
                    <input type="text" class="form-control" id="nidn" placeholder="10 Digit Angka"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Nama Dosen Kontrak</b></span>
                    </div>
                    <input type="text" class="form-control" id="nama" placeholder="Input Nama + Gelar"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Pendidikan Pasca Sarjana</b></span>
                    </div>
                    <input type="text" class="form-control" id="pascasarjana"> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Bidang Keahlian</b></span>
                    </div>
                    <input type="text" class="form-control" id="bidangkeahlian"> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Jabatan Akademik</b></span>
                    </div>
                    <select class="custom-select" id="jabatanakademik">
                      <option value="Tenaga Pengajar">Tenaga Pengajar</option>
                      <option value="Asisten Ahli">Asisten Ahli</option>
                      <option value="Lektor">Lektor</option>
                      <option value="Lektor Kepala">Lektor Kepala</option>
                      <option value="Guru Besar">Guru Besar</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Kesesuaian Bidang Keahlian dengan Mata Kuliah yang Diampu</b></span>
                    </div>
                    <select class="custom-select" id="kesesuaian">
                      <option value="Sesuai">Sesuai</option>
                      <option value="Tidak Sesuai">Tidak Sesuai</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Sertifikat Pendidik Profesional</b></span>
                    </div>
                    <input type="text" class="form-control" id="sertifikatpendidik" placeholder="Input Nomor Sertifikat"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Sertifikat Kompetensi/Profesi</b></span>
                    </div>
                    <input type="text" class="form-control" id="sertifikatkompetensi" placeholder="Input Bidang Sertifikasi & Lembaga Penerbit"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text bg-primary"><b>Upload Bukti Sertifikat</b></span>
										</div>
										<input class="form-control" type="file" id="BuktiSertifikat">
                  </div>
                  <pre class="text-danger mb-1"><b>Bukti Yang Diupload Dalam Format Pdf</b></pre>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Mata Kuliah Yang Diampu Pada Program Studi S1</b></span>
                    </div>
                    <?php 
										$MK1 = array('Pendidikan Agama','Bahasa Inggris','PTE Makro','Pengantar Akuntansi','Mentalitas & Kreatifitas','Matematika Ekonomi 1','PPKN','PTE Mikro');
										$MK2 = array('Bahasa Indonesia','Sosiologi Kritis','TE Makro I','Pengantar Bisnis & Manajemen','SPE','Matematika Ekonomi II','Statistik I','TE Mikro I');
										$MK3 = array('TE Makro II','Islam & Ekonomi','Pengantar Ekonomi Pembangunan','Koperasi & Kewirausahaan','ESDA & Lingkungan','Ekonomi Kependudukan','Statistik II','TE Mikro II');
										$MK4 = array('Masalah Kebijakan Pembangunan','Ekonomi Pembangunan','Ekonomi Publik','Ekonomi Moneter','SDM & Ketenagakerjaan','Aplikasi Komputasi Ekonomi','Ekonomi Industri');
										$MK5 = array('Perekonomian Indonesia','Perencanaan Pembangunan','Ekonomi Kelembagaan','Bank Lembaga Keuangan','Metodologi Penelitian','Ekonomi Moneter Lanjutan','Studi Kebanksentralan','Ekonomi Regional','Keuangan Daerah','Ekonomi Publik Lanjutan');
										$MK6 = array('Ekonomi Internasional','Ekonomi Perkotaan & Transportasi','Ekonometrika','Evaluasi Proyek','Analisis Pasar Keuangan','Ekonomi Perbankan','Manajemen Keuangan Daerah','Perencanaan Strategis','Analisa Kebijakan Publik','Penganggaran Sektor Publik');
										$MK7 = array('Seminar Ekonomi Moneter & Perbankan','Ekonomi Politik','Ekonomi Pedesaan & Pertanian','Ekonomi Moneter Internasional','Islam & Ekonomi','BLK Syariah');
									?>
									<?php for ($j=1; $j <= 7; $j++) { ?>
									<div class="input-group input-group-sm mt-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success"><b>Semester <?=$j?></b></span>
                    </div>
									</div>
                    <?php for ($i=0; $i < count(${'MK'.$j}); $i++) { ?>
                    <div class="col-sm-6">
                      <label class="checkbox-inline"><input type="checkbox" name="MKS1" value="<?=${'MK'.$j}[$i]?>">&nbsp;<?=${'MK'.$j}[$i]?></label>
                    </div>
									<?php }} ?>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Mata Kuliah Yang Diampu Pada Program Studi S2</b></span>
                    </div>
                    <?php 
										$MK1 = array('Teori Ekonomi Makro Intermediate','Teori Ekonomi Mikro Intermediate','Ekonomi Syariah','Sejarah Pemikiran Ekonomi','Ekonometrika Terapan');
										$MK2 = array('Metode penelitian kuantitatif','Metode penelitian kualitatif','Perencanaan Pembangunan dan Penganggaran Daerah','Ekonomi Kelautan dan Maritim (Blue Economy)','Teknik dan analisis dalam perencanaan pembangunan daerah','Pemikiran Ekonomi Islam','Kelembagaan Keuangan Syariah');
										$MK3 = array('Analisis Daya Dukung Wilayah Pesisir dan Pulau-Pulau Kecil','Evaluasi Dampak Lingkungan','Pemetaan Potensi Pesisir dan Pulau-Pulau kecil','Manajemen Keuangan Daerah','Evaluasi Dampak Kebijakan Publik','Ekonomi Politik dan Kelembagaan','Etika Ekonomi Islam','Hukum Ekonomi Islam','Metode Riset Ekonomi Syariah');
									?>
									<?php for ($j=1; $j <= 3; $j++) { ?>
									<div class="input-group input-group-sm mt-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success"><b>Semester <?=$j?></b></span>
                    </div>
									</div>
                    <?php for ($i=0; $i < count(${'MK'.$j}); $i++) { ?>
                    <div class="col-sm-6">
                      <label class="checkbox-inline"><input type="checkbox" name="MKS2" value="<?=${'MK'.$j}[$i]?>">&nbsp;<?=${'MK'.$j}[$i]?></label>
                    </div>
									<?php }} ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="InputDosenKontrak"><b>Simpan</b></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalEditDosenKontrak">
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
                    <select class="custom-select" id="Edithomebase">
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>NIDN / NIDK</b></span>
                    </div>
                    <input type="hidden" class="form-control" id="nidnLama"> 
                    <input type="text" class="form-control" id="Editnidn"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Nama Dosen Kontrak</b></span>
                    </div>
                    <input type="text" class="form-control" id="Editnama"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Pendidikan Pasca Sarjana</b></span>
                    </div>
                    <input type="text" class="form-control" id="Editpascasarjana"> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Bidang Keahlian</b></span>
                    </div>
                    <input type="text" class="form-control" id="Editbidangkeahlian"> 
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Jabatan Akademik</b></span>
                    </div>
                    <select class="custom-select" id="Editjabatanakademik">
                      <option value="Tenaga Pengajar">Tenaga Pengajar</option>
                      <option value="Asisten Ahli">Asisten Ahli</option>
                      <option value="Lektor">Lektor</option>
                      <option value="Lektor Kepala">Lektor Kepala</option>
                      <option value="Guru Besar">Guru Besar</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Kesesuaian Bidang Keahlian dengan Mata Kuliah yang Diampu</b></span>
                    </div>
                    <select class="custom-select" id="Editkesesuaian">
                      <option value="Sesuai">Sesuai</option>
                      <option value="Tidak Sesuai">Tidak Sesuai</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Sertifikat Pendidik Profesional</b></span>
                    </div>
                    <input type="text" class="form-control" id="Editsertifikatpendidik" placeholder="Input Nomor Sertifikat"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Sertifikat Kompetensi/Profesi</b></span>
                    </div>
                    <input type="text" class="form-control" id="Editsertifikatkompetensi" placeholder="Input Bidang Sertifikasi & Lembaga Penerbit"> 
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
										<div class="input-group-prepend">
											<span class="input-group-text bg-primary"><b>Upload Bukti Sertifikat</b></span>
										</div>
                    <input class="form-control" type="hidden" id="BuktiSertifikatLama">
                    <input class="form-control" type="file" id="EditBuktiSertifikat">
                    <div class="input-group-prepend">
											<button class="input-group-text bg-primary" id="CancelEditBuktiSertifikat"><b>X</b></button>
										</div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Mata Kuliah Yang Diampu Pada Program Studi Yang Diakreditasi</b></span>
                    </div>
                    <?php 
										$MK1 = array('Pendidikan Agama','Bahasa Inggris','PTE Makro','Pengantar Akuntansi','Mentalitas & Kreatifitas','Matematika Ekonomi 1','PPKN','PTE Mikro');
										$MK2 = array('Bahasa Indonesia','Sosiologi Kritis','TE Makro I','Pengantar Bisnis & Manajemen','SPE','Matematika Ekonomi II','Statistik I','TE Mikro I');
										$MK3 = array('TE Makro II','Islam & Ekonomi','Pengantar Ekonomi Pembangunan','Koperasi & Kewirausahaan','ESDA & Lingkungan','Ekonomi Kependudukan','Statistik II','TE Mikro II');
										$MK4 = array('Masalah Kebijakan Pembangunan','Ekonomi Pembangunan','Ekonomi Publik','Ekonomi Moneter','SDM & Ketenagakerjaan','Aplikasi Komputasi Ekonomi','Ekonomi Industri');
										$MK5 = array('Perekonomian Indonesia','Perencanaan Pembangunan','Ekonomi Kelembagaan','Bank Lembaga Keuangan','Metodologi Penelitian','Ekonomi Moneter Lanjutan','Studi Kebanksentralan','Ekonomi Regional','Keuangan Daerah','Ekonomi Publik Lanjutan');
										$MK6 = array('Ekonomi Internasional','Ekonomi Perkotaan & Transportasi','Ekonometrika','Evaluasi Proyek','Analisis Pasar Keuangan','Ekonomi Perbankan','Manajemen Keuangan Daerah','Perencanaan Strategis','Analisa Kebijakan Publik','Penganggaran Sektor Publik');
										$MK7 = array('Seminar Ekonomi Moneter & Perbankan','Ekonomi Politik','Ekonomi Pedesaan & Pertanian','Ekonomi Moneter Internasional','Islam & Ekonomi','BLK Syariah');
									?>
									<?php for ($j=1; $j <= 7; $j++) { ?>
									<div class="input-group input-group-sm mt-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success"><b>Semester <?=$j?></b></span>
                    </div>
									</div>
                    <?php for ($i=0; $i < count(${'MK'.$j}); $i++) { ?>
                    <div class="col-sm-6">
                      <label class="checkbox-inline"><input type="checkbox" id="Edit<?=${'MK'.$j}[$i]?>" name="EditMKS1" value="<?=${'MK'.$j}[$i]?>">&nbsp;<?=${'MK'.$j}[$i]?></label>
                    </div>
									<?php }} ?>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Mata Kuliah Yang Diampu Pada Program Studi S2</b></span>
                    </div>
                  <?php 
										$MK1 = array('Teori Ekonomi Makro Intermediate','Teori Ekonomi Mikro Intermediate','Ekonomi Syariah','Sejarah Pemikiran Ekonomi','Ekonometrika Terapan');
										$MK2 = array('Metode penelitian kuantitatif','Metode penelitian kualitatif','Perencanaan Pembangunan dan Penganggaran Daerah','Ekonomi Kelautan dan Maritim (Blue Economy)','Teknik dan analisis dalam perencanaan pembangunan daerah','Pemikiran Ekonomi Islam','Kelembagaan Keuangan Syariah');
										$MK3 = array('Analisis Daya Dukung Wilayah Pesisir dan Pulau-Pulau Kecil','Evaluasi Dampak Lingkungan','Pemetaan Potensi Pesisir dan Pulau-Pulau kecil','Manajemen Keuangan Daerah','Evaluasi Dampak Kebijakan Publik','Ekonomi Politik dan Kelembagaan','Etika Ekonomi Islam','Hukum Ekonomi Islam','Metode Riset Ekonomi Syariah');
									?>
									<?php for ($j=1; $j <= 3; $j++) { ?>
									<div class="input-group input-group-sm mt-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-success"><b>Semester <?=$j?></b></span>
                    </div>
									</div>
                    <?php for ($i=0; $i < count(${'MK'.$j}); $i++) { ?>
                    <div class="col-sm-6">
                      <label class="checkbox-inline"><input type="checkbox" id="Edit<?=${'MK'.$j}[$i]?>" name="EditMKS2" value="<?=${'MK'.$j}[$i]?>">&nbsp;<?=${'MK'.$j}[$i]?></label>
                    </div>
									<?php }} ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="UpdateDosenKontrak"><b>Simpan</b></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalSertifikat">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h5 class="modal-title font-weight-bold">Sertifikat Dosen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <embed id="PathSertifikat" src="" type="application/pdf" width="100%" height="400"/>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
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
        
        $(document).on("click",".LihatSertifikat",function(){
					var Path = $(this).attr('LihatSertifikat')
          $('#PathSertifikat').attr('src',Path)		
          $('#ModalSertifikat').modal("show")
				}) 

        $("#InputDosenKontrak").click(function() {
          if ($("#nidn").val().length != 10 || isNaN($("#nidn").val())) {
            alert('Input NIDN/NIDK Belum Benar!')
          } else if ($("#nama").val() === "") {
            alert('Mohon Isi Nama + Gelar!')
          } else {
            var fd = new FormData()
						fd.append('Homebase',$("#homebase").val())
            fd.append('NIDN',$("#nidn").val())
						fd.append('Nama',$("#nama").val())
						fd.append('S2',$("#pascasarjana").val())
            fd.append('BidangKeahlian',$("#bidangkeahlian").val())
            fd.append('JabatanAkademik',$("#jabatanakademik").val())
            fd.append('KesesuaianBidang',$("#kesesuaian").val())
            fd.append('SertifikatPendidik',$("#sertifikatpendidik").val())
            fd.append('SertifikatKompetensi',$("#sertifikatkompetensi").val())
            fd.append("BuktiSertifikat", $('#BuktiSertifikat')[0].files[0])
            var MengajarPS = ""
            if ($("#homebase").val() == "S1") {
              $.each($("input[name='MKS1']:checked"), function(){
                if (MengajarPS == "") {
                  MengajarPS = MengajarPS + $(this).val()
                } else {
                  MengajarPS = MengajarPS + "|" + $(this).val()
                }
              })
              fd.append('MengajarPS',MengajarPS)
            } else {
              $.each($("input[name='MKS2']:checked"), function(){
                if (MengajarPS == "") {
                  MengajarPS = MengajarPS + $(this).val()
                } else {
                  MengajarPS = MengajarPS + "|" + $(this).val()
                }
              })
              fd.append('MengajarPS',MengajarPS)
            }
            $.ajax({
							url: BaseURL+'Admin/InputDosenKontrak',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Admin/DosenKontrak"
								}
								else {
									alert(Respon)
								}
							}
						})
          }
        })

        $("#CancelEditBuktiSertifikat").click(function() {
					$("#EditBuktiSertifikat").val("")
				})

        $(document).on("click",".Edit",function(){
					var Data = $(this).attr('Edit')
					var Pisah = Data.split("$");
					$('#Edithomebase').val(Pisah[0])
          $('#nidnLama').val(Pisah[1])
          $('#Editnidn').val(Pisah[1])
          $('#Editnama').val(Pisah[2])
          $('#Editpascasarjana').val(Pisah[3])
					$("#Editbidangkeahlian").val(Pisah[4])
					$('#Editjabatanakademik').val(Pisah[5])
          $('#Editkesesuaian').val(Pisah[9])
          $('#Editsertifikatpendidik').val(Pisah[6])
					$("#Editsertifikatkompetensi").val(Pisah[7])
          $.each($("input[name='EditMKS1']:checked"), function(){
            $(this).prop('checked',false)
          })
          $.each($("input[name='EditMKS2']:checked"), function(){
            $(this).prop('checked',false)
          })
          var PisahMK = Pisah[8].split("|")
          for (let i = 0; i < PisahMK.length; i++) {
            $("input[id='Edit"+PisahMK[i]+"']").prop('checked',true)
          }
          $('#BuktiSertifikatLama').val(Pisah[10])
          $('#ModalEditDosenKontrak').modal("show")
				}) 

				$("#UpdateDosenKontrak").click(function() {
					if ($("#Editnidn").val().length != 10 || isNaN($("#Editnidn").val())) {
            alert('Input NIDN/NIDK Belum Benar!')
          } else if ($("#Editnama").val() === "") {
            alert('Mohon Isi Nama + Gelar!')
          } else {
            var fd = new FormData()
            fd.append('Homebase',$("#Edithomebase").val())
            fd.append('NIDNLama',$("#nidnLama").val())
						fd.append('NIDN',$("#Editnidn").val())
						fd.append('Nama',$("#Editnama").val())
						fd.append('S2',$("#Editpascasarjana").val())
            fd.append('BidangKeahlian',$("#Editbidangkeahlian").val())
						fd.append('JabatanAkademik',$("#Editjabatanakademik").val())
            fd.append('SertifikatPendidik',$("#Editsertifikatpendidik").val())
            fd.append('SertifikatKompetensi',$("#Editsertifikatkompetensi").val())
            fd.append('BuktiSertifikatLama',$("#BuktiSertifikatLama").val())
            fd.append("BuktiSertifikat", $('#EditBuktiSertifikat')[0].files[0])
            var MengajarPS = ""
            if ($("#Edithomebase").val() == "S1") {
              $.each($("input[name='EditMKS1']:checked"), function(){
                if (MengajarPS == "") {
                  MengajarPS = MengajarPS + $(this).val()
                } else {
                  MengajarPS = MengajarPS + "|" + $(this).val()
                }
              })
            }
            else {
              $.each($("input[name='EditMKS2']:checked"), function(){
                if (MengajarPS == "") {
                  MengajarPS = MengajarPS + $(this).val()
                } else {
                  MengajarPS = MengajarPS + "|" + $(this).val()
                }
              })
            }
						fd.append('MengajarPS',MengajarPS)
						fd.append('KesesuaianBidang',$("#Editkesesuaian").val())
            $.ajax({
							url: BaseURL+'Admin/UpdateDosenKontrak',
							type: 'post',
							data: fd,
							contentType: false,
							processData: false,
							success: function(Respon){
								if (Respon == '1') {
									window.location = BaseURL + "Admin/DosenKontrak"
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
					var Hapus = {NIDN: Pisah[0],Bukti: Pisah[1]}
					var Konfirmasi = confirm("Yakin Ingin Menghapus?");
      		if (Konfirmasi == true) {
						$.post(BaseURL+"Admin/HapusDosenKontrak", Hapus).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + "Admin/DosenKontrak"
							} else {
								alert(Respon)
							}
						})
					}
				})

        $('#TabelDosenKontrak').DataTable( {
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