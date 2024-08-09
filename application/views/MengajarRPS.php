    <link href="<?=base_url('summernote/summernote-bs4.min.css')?>" rel="stylesheet">
    <div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row"> 
              <div class="col-sm-12 mt-2">
                <button type="button" class="btn btn-primary text-light mb-1" data-toggle="modal" data-target="#ModalInputMengajar"><i class="fa fa-plus"></i> <b>INPUT RPS</b></button>
                <div class="container-fluid border border-warning rounded bg-light">
                  <div class="row align-items-center">
                    <div class="col-sm-12 my-2 ">    
                      <div class="table-responsive mb-2">
                        <table id="TabelRPS" class="table table-bordered table-striped">
                          <thead class="bg-warning">
                            <tr>
                              <th class="text-center align-middle">No</th>
                              <th class="align-middle">Kode MK</th>
                              <th class="align-middle">Nama Mata Kuliah</th>
                              <th class="align-middle">Bobot</th>
                              <th class="align-middle">Semester</th>
                              <th class="align-middle text-center">Tahun</th>
                              <th style="width: 7%;" class="text-center align-middle">Edit</th>
                              <th style="width: 4%;" class="text-center align-middle">RPS</th>
                              <th class="text-center align-middle">UTS</th>
                              <th class="text-center align-middle">UAS</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $No = 1; foreach ($Mengajar as $key) { ?>
                              <tr>	
                                <td class="text-center align-middle"><?=$No++?></td>
                                <td class="align-middle"><?=$key['KodeMK']?></td>
                                <td class="align-middle"><?=$key['NamaMK']?></td>
                                <td class="align-middle"><?=$key['BobotMK'].' sks'?></td>
                                <td class="align-middle"><?=$key['Semester']?></td>
                                <td class="align-middle text-center"><?=$key['Tahun']?></td>
                                <td class="text-center align-middle">
                                  <button Edit="<?=$key['KodeMK']?>" class="btn btn-sm btn-warning Edit"><i class="fas fa-edit"></i></button>
                                  <button Hapus="<?=$key['Id']?>" class="btn btn-sm btn-danger Hapus"><i class="fas fa-trash"></i></button>  
                                </td> 
                                <td class="text-center align-middle">
                                  <?php if ($key['Status'] == 0 || $key['Status'] == 2) { ?>
                                    <button Valid="<?=$key['Id']?>" class="btn btn-sm btn-primary Valid"><i class="fas fa-check"></i></button> 
                                  <?php } else if ($key['Status'] == 1) { ?>
                                    <button class="btn btn-sm btn-warning"><i class="fas fa-spinner"></i></button> 
                                  <?php } else if ($key['Status'] == 3) { ?>
                                    <button Unduh="<?=$key['KodeMK']?>" class="btn btn-sm btn-success Unduh"><i class="fas fa-download"></i></button> 
                                  <?php } ?>
                                </td>
                                <td class="text-center align-middle">
                                  <?php if ($key['Status'] == 3) { ?>
                                    <button UTS="<?=$key['Id']?>" class="btn btn-sm btn-primary UTS"><i class="fas fa-edit"></i></button>
                                    <button SoalUTS="<?=$key['Id']?>" class="btn btn-sm btn-warning SoalUTS"><i class="fas fa-eye"></i></button>
                                  <?php } ?>
                                </td> 
                                <td class="text-center align-middle">
                                  <?php if ($key['Status'] == 3) { ?>
                                    <button UAS="<?=$key['Id']?>" class="btn btn-sm btn-danger UAS"><i class="fas fa-edit"></i></button>
                                    <button SoalUAS="<?=$key['Id']?>" class="btn btn-sm btn-warning SoalUAS"><i class="fas fa-eye"></i></button>
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
    <div class="modal fade" id="ModalInputMengajar">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body">
            <div class="container">
							<div class="row">
                <div class="col-12">
                  <div class="input-group input-group-sm mb-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Mata Kuliah</b></span>
                    </div>
                    <select class="custom-select" id="MengajarMK">
                      <?php foreach ($RPS as $key) { ?>
                        <option value="<?=$key['KodeMK']?>"><?=$key['NamaMK']?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-success" id="InputMengajar"><b>Simpan <div id="LoadingInputMengajar" class="spinner-border spinner-border-sm text-white" style="display: none;" role="status"></div></b></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalEditRPS">
      <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body bg-primary">
            <div class="container">
              <div class="row my-1">
                <div class="col-12 my-1">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <tr style="font-weight: bold;">
                          <td>Homebase</td>
                          <td style="width: 30%;">Nama Mata Kuliah</td>
                          <td>Kode Mata Kuliah</td>
                          <td>Bobot (sks)</td>
                          <td>Semester</td>
                          <td style="width: 20%;">Tanggal Penyusunan</td>
                        </tr>
                        <tr>
                          <td>
                            <select class="custom-select custom-select-sm" id="EditHomebaseRPS">
                              <option value="S1">S1</option>
                              <!-- <option value="S2">S2</option> -->
                            </select>
                          </td>
                          <input class="form-control form-control-sm" type="hidden" id="KodeMKLama">
                          <td><input class="form-control form-control-sm" type="text" id="EditNamaMK"></td>
                          <td><input class="form-control form-control-sm" type="text" id="EditKodeMK" disabled></td>
                          <td><input class="form-control form-control-sm" type="text" id="EditBobotMK"></td>
                          <td><input class="form-control form-control-sm" type="text" id="EditSemester"></td>
                          <td><input class="form-control form-control-sm" type="text" id="EditTanggalPenyusunan"></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <tr style="font-weight: bold;">
                          <td>Otorisasi</td>
                          <td>Koordinator Pengembang RPS</td>
                          <td>Koordinator Bidang Keahlian</td>
                          <td>Koordinator Program Studi</td>
                        </tr>
                        <tr>
                          <td><input class="form-control form-control-sm" type="text" id="EditOtorisasi"></td>
                          <td><input class="form-control form-control-sm" type="text" id="EditKoordinatorPengembang"></td>
                          <td><input class="form-control form-control-sm" type="text" id="EditKoordinatorBidang"></td>
                          <td><input class="form-control form-control-sm" type="text" id="EditKaprodi"></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <tr style="font-weight: bold;">
                          <td style="width: 20%;" rowspan="4">Capaian Pembelajaran (CP)</td>
                          <td>CPL-Prodi (Capaian Pembelajaran Lulusan Program Studi) Yang Di Bebankan Pada Mata Kuliah</td>
                        </tr>
                        <tr>
                          <td><textarea class="form-control form-control-sm" id="EditCPL" rows="15"></textarea></td>
                        </tr>
                        <tr style="font-weight: bold;">
                          <td>CPMK (Capaian Pembelajaran Mata Kuliah)</td>
                        </tr>
                        <tr>
                          <td><textarea class="form-control form-control-sm" id="EditCPM" rows="7"></textarea></td>
                        </tr>
                        <tr>
                          <td><b>Deskripsi Singkat Mata Kuliah</b></td>
                          <td><textarea class="form-control form-control-sm" id="EditDeskripsi" rows="3"></textarea></td>
                        </tr>
                        <tr>
                          <td><b>Sub CPMK</b></td>
                          <td><textarea class="form-control form-control-sm" id="EditBahanKajian" rows="10"></textarea></td>
                        </tr>
                        <tr style="font-weight: bold;">
                          <td style="width: 20%;" rowspan="4">Daftar Referensi</td>
                          <td>Referensi Utama</td>
                        </tr>
                        <tr>
                          <td><textarea class="form-control form-control-sm" id="EditReferensiUtama" rows="3"></textarea></td>
                        </tr>
                        <tr style="font-weight: bold;">
                          <td>Referensi Pendudukung</td>
                        </tr>
                        <tr>
                          <td><textarea class="form-control form-control-sm" id="EditReferensiPendudukung" rows="3"></textarea></td>
                        </tr>
                        <!-- <tr>
                          <td><b>Nama Dosen Pengampu</b></td>
                          <td><textarea class="form-control form-control-sm" id="EditDosenPengampu" rows="3"></textarea></td>
                        </tr> -->
                        <tr>
                          <td><b>Mata Kuliah Prasyarat (Jika Ada)</b></td>
                          <td><textarea class="form-control form-control-sm" id="EditMKPrasyarat" rows="1"></textarea></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
                        <tr style="font-weight: bold;" class="text-center">
                          <td rowspan="2" style="width: 5%;vertical-align: middle;">Minggu Ke</td>
                          <td rowspan="2" style="width: 17%;vertical-align: middle;">Sub-CPMK (Kemampuan<br>Akhir Yang Di Rencanakan)</td>
                          <td rowspan="2" style="width: 14%;vertical-align: middle;">Bahan Kajian<br>(Materi Pembelajaran)</td>
                          <td rowspan="2" style="width: 20%;vertical-align: middle;">Bentuk & Metode Pembelajaran [Media & Sumber Belajar]</td>
                          <td rowspan="2" style="width: 5%;vertical-align: middle;">Estimasi Waktu</td>
                          <td rowspan="2" style="width: 15%;vertical-align: middle;">Pengalaman Belajar Mahasiswa (Penugasan)</td>
                          <td colspan="3" class="text-center">Penilaian</td>
                        </tr>
                        <tr>
                          <td class="text-center" style="width: 10%;"><b>Kriteria & Bentuk</b></td>
                          <td class="text-center" style="vertical-align: middle;"><b>Indikator</b></td>
                          <td class="text-center" style="width: 4%;"><b>Bobot (%)</b></td>
                        </tr>
                        <?php for ($i=1; $i < 17; $i++) { ?>
                          <tr>
                            <td class="text-center"><b><?=$i?></b></td>
                            <td>
                              <textarea class="form-control form-control-sm" id="EditSubCPMK<?=$i?>" rows="10"></textarea>
                              <div class="row">
                                <div class="col-4">
                                  <?php for ($j=1; $j <= 5; $j++) { ?>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="<?='A'.$i.$j?>" name="EditA<?=$i?>" id="EditA<?=$i.$j?>">
                                      <label class="form-check-label" for="EditA<?=$i.$j?>"><?='A'.$j?></label>
                                    </div>
                                  <?php } ?>
                                </div>
                                <div class="col-4">
                                  <?php for ($j=1; $j <= 6; $j++) { ?>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="<?='C'.$i.$j?>" name="EditC<?=$i?>" id="EditC<?=$i.$j?>">
                                      <label class="form-check-label" for="EditC<?=$i.$j?>"><?='C'.$j?></label>
                                    </div>
                                  <?php } ?>
                                </div>
                                <div class="col-4">
                                  <?php for ($j=1; $j <= 5; $j++) { ?>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" value="<?='P'.$i.$j?>" name="EditP<?=$i?>" id="EditP<?=$i.$j?>">
                                      <label class="form-check-label" for="EditP<?=$i.$j?>"><?='P'.$j?></label>
                                    </div>
                                  <?php } ?>
                                </div>
                              </div>
                            </td>
                            <td><textarea class="form-control form-control-sm" id="EditMateriPembelajaran<?=$i?>" rows="10"></textarea></td>
                            <td><textarea class="form-control form-control-sm" id="EditMetodePembelajaran<?=$i?>" rows="10"></textarea></td>
                            <td><input type="text" class="form-control form-control-sm" id="EditEstimasiWaktu<?=$i?>"></td>
                            <td><textarea class="form-control form-control-sm" id="EditPenugasan<?=$i?>" rows="10"></textarea></td>
                            <td><textarea class="form-control form-control-sm" id="EditKriteria<?=$i?>" rows="10"></textarea></td>
                            <td><textarea class="form-control form-control-sm" id="EditIndikator<?=$i?>" rows="10"></textarea></td>
                            <td><input type="text" class="form-control form-control-sm" id="EditBobot<?=$i?>"></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <b>Metode Pembelajaran : CK (Ceramah Kuliah), SCL (Student Center Learning), SGD (Student Grup Discussion), PK (Presentasi Kelompok), PI (Presentasi Individu),
                  PBL (Problem Base Learning)</b><br>
                    <b class="text-warning">1. RUBRIK PENILAIAN TUGAS</b>
                      <div class="table-responsive mt-2">
                        <table class="table table-bordered">
                          <tbody>
                            <tr style="font-weight: bold;">
                              <td colspan="3">BENTUK TUGAS</td>
                              <td colspan="4">WAKTU PENGERJAAN TUGAS</td>
                            </tr>
                            <tr>
                              <td colspan="3"><input class="form-control form-control-sm" type="text" id="_BentukTugas"></td>
                              <td colspan="4"><input class="form-control form-control-sm" type="text" id="_WaktuTugas"></td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td colspan="7">JUDUL TUGAS</td>
                            </tr>
                            <tr>
                              <td colspan="7"><input class="form-control form-control-sm" type="text" id="_JudulTugas"></td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td colspan="7">SUB CAPAIAN PEMBELAJARAN MATA KULIAH</td>
                            </tr>
                            <tr>
                              <td colspan="7"><textarea class="form-control form-control-sm" id="_SubTugas" rows="4"></textarea></td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td colspan="7">DESKRIPSI TUGAS</td>
                            </tr>
                            <tr>
                              <td colspan="7"><textarea class="form-control form-control-sm" id="_DeskripsiTugas" rows="4"></textarea></td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td colspan="7">METODE PENGERJAAN TUGAS</td>
                            </tr>
                            <tr>
                              <td colspan="7"><textarea class="form-control form-control-sm" id="_MetodeTugas" rows="4"></textarea></td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td colspan="7">BENTUK DAN FORMAT LUARAN</td>
                            </tr>
                            <tr>
                              <td colspan="7"><textarea class="form-control form-control-sm" id="_FormatTugas" rows="4"></textarea></td>
                            </tr>
                            <!-- <tr style="font-weight: bold;">
                              <td colspan="7">INDIKATOR, KRITERIA DAN BOBOT PENILAIAN</td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td>Dimensi</td>
                              <td>Skor</td>
                              <td>Sangat Baik</td>
                              <td>Baik</td>
                              <td>Cukup</td>
                              <td>Bobot</td>
                              <td>Nilai Akhir</td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td></td>
                              <td></td>
                              <td>80-100</td>
                              <td>70-79</td>
                              <td>60-69</td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td>Makalah</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>1. Kualitas Data</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>10%</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>2. Ketepatan Penghitungan</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>20%</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>3. Kualitas interptertasi Analisa Data</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>20%</td>
                              <td></td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td>Presentasi</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>1. Kualitas Presentasi (Visual Dan Oral)</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>20%</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>2. Kemampuan Menjawab Pertanyaan</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>20%</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>3. Kerjasama</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>10%</td>
                              <td></td>
                            </tr> -->
                            <tr style="font-weight: bold;">
                              <td colspan="7">JADWAL PELAKSANAAN</td>
                            </tr><tr>
                              <td colspan="7"><input class="form-control form-control-sm" type="text" id="_JadwalTugas"></td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td colspan="7">LAIN_LAIN</td>
                            </tr>
                            <tr>
                              <td colspan="7"><textarea class="form-control form-control-sm" id="_LainTugas" rows="2"></textarea></td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td colspan="7">DAFTAR RUJUKAN</td>
                            </tr>
                            <tr>
                              <td colspan="7"><textarea class="form-control form-control-sm" id="_RujukanTugas" rows="2"></textarea></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <b class="text-warning">2. RUBRIK PENILAIAN TUGAS</b>
                      <div class="table-responsive mt-2">
                        <table class="table table-bordered">
                          <tbody>
                            <tr style="font-weight: bold;">
                              <td colspan="3">BENTUK TUGAS</td>
                              <td colspan="4">WAKTU PENGERJAAN TUGAS</td>
                            </tr>
                            <tr>
                              <td colspan="3"><input class="form-control form-control-sm" type="text" id="_BentukTugas2"></td>
                              <td colspan="4"><input class="form-control form-control-sm" type="text" id="_WaktuTugas2"></td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td colspan="7">JUDUL TUGAS</td>
                            </tr>
                            <tr>
                              <td colspan="7"><input class="form-control form-control-sm" type="text" id="_JudulTugas2"></td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td colspan="7">SUB CAPAIAN PEMBELAJARAN MATA KULIAH</td>
                            </tr>
                            <tr>
                              <td colspan="7"><textarea class="form-control form-control-sm" id="_SubTugas2" rows="4"></textarea></td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td colspan="7">DESKRIPSI TUGAS</td>
                            </tr>
                            <tr>
                              <td colspan="7"><textarea class="form-control form-control-sm" id="_DeskripsiTugas2" rows="4"></textarea></td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td colspan="7">METODE PENGERJAAN TUGAS</td>
                            </tr>
                            <tr>
                              <td colspan="7"><textarea class="form-control form-control-sm" id="_MetodeTugas2" rows="4"></textarea></td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td colspan="7">BENTUK DAN FORMAT LUARAN</td>
                            </tr>
                            <tr>
                              <td colspan="7"><textarea class="form-control form-control-sm" id="_FormatTugas2" rows="4"></textarea></td>
                            </tr>
                            <!-- <tr style="font-weight: bold;">
                              <td colspan="7">INDIKATOR, KRITERIA DAN BOBOT PENILAIAN</td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td>Dimensi</td>
                              <td>Skor</td>
                              <td>Sangat Baik</td>
                              <td>Baik</td>
                              <td>Cukup</td>
                              <td>Bobot</td>
                              <td>Nilai Akhir</td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td></td>
                              <td></td>
                              <td>80-100</td>
                              <td>70-79</td>
                              <td>60-69</td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td>Makalah</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>1. Kualitas Data</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>10%</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>2. Ketepatan Penghitungan</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>20%</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>3. Kualitas interptertasi Analisa Data</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>20%</td>
                              <td></td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td>Presentasi</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>1. Kualitas Presentasi (Visual Dan Oral)</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>20%</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>2. Kemampuan Menjawab Pertanyaan</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>20%</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>3. Kerjasama</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>10%</td>
                              <td></td>
                            </tr> -->
                            <tr style="font-weight: bold;">
                              <td colspan="7">JADWAL PELAKSANAAN</td>
                            </tr><tr>
                              <td colspan="7"><input class="form-control form-control-sm" type="text" id="_JadwalTugas2"></td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td colspan="7">LAIN_LAIN</td>
                            </tr>
                            <tr>
                              <td colspan="7"><textarea class="form-control form-control-sm" id="_LainTugas2" rows="2"></textarea></td>
                            </tr>
                            <tr style="font-weight: bold;">
                              <td colspan="7">DAFTAR RUJUKAN</td>
                            </tr>
                            <tr>
                              <td colspan="7"><textarea class="form-control form-control-sm" id="_RujukanTugas2" rows="2"></textarea></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-4">
                      <b class="text-warning">RUBRIK PENILAIAN AKHIR</b>
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <tbody>
                            <tr style="font-weight: bold;">
                              <td style="width: 70%;">Unsur Penilaian</td>
                              <td style="width: 30%;">Bobot (%)</td>
                            </tr>
                            <tr>
                              <td>Unsur Sikap</td>
                              <td><input class="form-control form-control-sm" type="text" id="_Sikap"></td>
                            </tr>
                            <tr>
                              <td>Tugas</td>
                              <td><input class="form-control form-control-sm" type="text" id="_Tugas"></td>
                            </tr>
                            <tr>
                              <td>UTS & UAS</td>
                              <td><input class="form-control form-control-sm" type="text" id="_Ujian"></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                <button type="submit" class="btn btn-danger d-flex mx-auto" id="EditRPS"><b>Simpan <div id="LoadingEdit" class="spinner-border spinner-border-sm text-white" style="display: none;" role="status"></div></b></button>
              </div>                              
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalSoal" data-backdrop="static">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-warning">
          <div class="modal-body" style="height: 500px;">
            <div class="container">
							<div class="row">
                <input class="form-control form-control-sm" type="hidden" id="IdSoal">
								<div class="col-sm-4">
                  <div class="input-group input-group-sm mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white"><b>Jenis Soal</b></span>
                    </div>
                    <select class="custom-select" id="Jenis" disabled>
                      <option value="UTS">UTS</option>
											<option value="UAS">UAS</option>
                    </select>
                  </div>
								</div>
								<div class="col-sm-4">
                  <div class="input-group input-group-sm mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white"><b>Sifat Ujian</b></span>
                    </div>
                    <input type="text" class="form-control" id="Sifat"> 
                  </div>
								</div>
                <div class="col-sm-4">
                  <div class="input-group input-group-sm mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white"><b>Waktu Ujian</b></span>
                    </div>
                    <input type="text" class="form-control" id="Waktu"> 
                  </div>
								</div>
                <div class="col-sm-6">
                  <div class="input-group input-group-sm mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white"><b>Mata Kuliah</b></span>
                    </div>
                    <select class="custom-select" id="SoalMK" disabled>
                      <?php foreach ($Mengajar as $key) { if ($key['Status'] == 3) { ?>
                        <option value="<?=$key['KodeMK']?>"><?=$key['NamaMK']?></option>
                      <?php }} ?>
                    </select>
                  </div>
								</div>
								<div class="col-sm-6">
                  <div class="input-group input-group-sm mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary text-white"><b>Catatan</b></span>
                    </div>
                    <input type="text" class="form-control" id="Catatan"> 
                  </div>
								</div>
								<div class="col-sm-12">
                  <textarea id="Soal"></textarea>
                </div>
                <div class="col-sm-12 mt-0">
                  <div class="input-group input-group-sm">
                    <textarea style="width: 100%;" id="CatatanSoal" rows="3" placeholder="Catatan Koreksi Mengenai Soal"></textarea>
                  </div>
								</div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
            <button type="submit" class="btn btn-primary" id="InputSoal"><b>Simpan <div id="LoadingInputSoal" class="spinner-border spinner-border-sm text-white" style="display: none;" role="status"></div></b></button>
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
    <script src="<?=base_url("summernote/summernote-bs4.min.js")?>"></script>
    <script src="<?=base_url("sumernote/summernote-image-attributes.js")?>"></script>
    <script src="<?=base_url("sumernote/lang/es-ES.js")?>"></script>
    <script src="<?=base_url('bootstrap/js/Borang.js')?>"></script>
		<script>
      $(document).ready(function(){
        var BaseURL = '<?=base_url()?>'
        
        $('#Soal').summernote({
            height: 250,
            imageAttributes: {
              icon: '<i class="note-icon-pencil"/>',
              figureClass: 'figureClass',
              figcaptionClass: 'captionClass',
              captionText: 'Caption Goes Here.',
              manageAspectRatio: true // true = Lock the Image Width/Height, Default to true
            },
            lang: 'en-US',
            popover: {
                image: [
                  ['remove', ['removeMedia']],
                  ['custom', ['imageAttributes']],
                ],
            },
            toolbar: [ ['image', ['picture']] ]
        }); 

        $('#TabelRPS').DataTable( {
					// dom:'lfrtip',
					"ordering": false,
          "lengthMenu": [ [5, 10, 20, 30, -1], [5, 10, 20, 30, "All"] ],
					"language": {
						"paginate": {
							'previous': '<b class="text-primary"><</b>',
							'next': '<b class="text-primary">></b>'
						}
					}
        })

        $(document).on("click",".SoalUTS",function(){
					window.location = BaseURL + "Dashboard/Soal/" + $(this).attr('SoalUTS') + "/TENGAH"
        })
        
        $(document).on("click",".SoalUAS",function(){
					window.location = BaseURL + "Dashboard/Soal/" + $(this).attr('SoalUAS') + "/AKHIR"
				})

        $("#InputMengajar").click(function() {
          var RPS = { KodeMK: $("#MengajarMK").val() }
          $("#InputMengajar").attr("disabled", true);                              
          $("#LoadingInputMengajar").show();
          $.post(BaseURL+"Dashboard/InputMengajar", RPS).done(function(Respon) {
            if (Respon == '1') {
              alert('Data Berhasil Di Simpan!')
              window.location = BaseURL + "Dashboard/RPS"
            } else {
              alert(Respon)
              $("#LoadingInputMengajar").hide();
              $("#InputMengajar").attr("disabled", false);   
            }
          })
        })

        $(document).on("click",".UTS",function(){
					$.post(BaseURL+"Dashboard/GetSoal/"+$(this).attr('UTS')).done(function(Respon) {
            var Data = JSON.parse(Respon)
            $("#IdSoal").val(Data.Id)
            $("#Jenis").val('UTS')
            $("#Sifat").val(Data.SifatUTS)
            $("#Waktu").val(Data.WaktuUTS)
            $("#SoalMK").val(Data.KodeMK)
            $("#Catatan").val(Data.CatatanUTS)
            $('#Soal').summernote('code',Data.SoalUTS);
            $("#CatatanSoal").val(Data.EvaluasiUTS)
            $("#ModalSoal").modal('show')
					})
				})

        $(document).on("click",".UAS",function(){
					$.post(BaseURL+"Dashboard/GetSoal/"+$(this).attr('UAS')).done(function(Respon) {
            var Data = JSON.parse(Respon)
            $("#IdSoal").val(Data.Id)
            $("#Jenis").val('UAS')
            $("#Sifat").val(Data.SifatUAS)
            $("#Waktu").val(Data.WaktuUAS)
            $("#SoalMK").val(Data.KodeMK)
            $("#Catatan").val(Data.CatatanUAS)
            $('#Soal').summernote('code',Data.SoalUAS);
            $("#CatatanSoal").val(Data.EvaluasiUAS)
            $("#ModalSoal").modal('show')
					})
				})

        $("#InputSoal").click(function() {
          Jenis = $("#Jenis").val()
          if (Jenis == 'UTS') {
            var Soal = { Id: $("#IdSoal").val(),
                      SifatUTS: $("#Sifat").val(),
                      WaktuUTS: $("#Waktu").val(),
                      CatatanUTS: $("#Catatan").val(),
                      SoalUTS: $("#Soal").val() }
          } else {
            var Soal = { Id: $("#IdSoal").val(),
                      SifatUAS: $("#Sifat").val(),
                      WaktuUAS: $("#Waktu").val(),
                      CatatanUAS: $("#Catatan").val(),
                      SoalUAS: $("#Soal").val() }
          }
          $("#InputSoal").attr("disabled", true);                              
          $("#LoadingInputSoal").show();
          $.post(BaseURL+"Dashboard/InputSoal", Soal).done(function(Respon) {
            if (Respon == '1') {
              alert('Data Berhasil Di Simpan!')
              window.location = BaseURL + "Dashboard/RPS"
            } else {
              alert(Respon)
              $("#LoadingInputSoal").hide();
              $("#InputSoal").attr("disabled", false);   
            }
          })
        })

        $(document).on("click",".Edit",function(){
          $.post(BaseURL+"Dashboard/GetRPS/"+$(this).attr('Edit')).done(function(Respon) {
            var Data = JSON.parse(Respon)
            $("#EditHomebaseRPS").val(Data.Homebase)
            $("#EditNamaMK").val(Data.NamaMK)
            $("#KodeMKLama").val(Data.KodeMK)
            $("#EditKodeMK").val(Data.KodeMK)
            $("#EditBobotMK").val(Data.BobotMK)
            $("#EditSemester").val(Data.Semester)
            $("#EditTanggalPenyusunan").val(Data.TanggalPenyusunan)
            $("#EditOtorisasi").val(Data.Otorisasi)
            $("#EditKoordinatorPengembang").val(Data.KoordinatorPengembang)
            $("#EditKoordinatorBidang").val(Data.KoordinatorBidang)
            $("#EditKaprodi").val(Data.Kaprodi)
            $("#EditCPL").val(Data.CPL.split("<br/>").join("\n"))
            $("#EditCPM").val(Data.CPM.split("<br/>").join("\n"))
            $("#EditDeskripsi").val(Data.Deskripsi.split("<br/>").join("\n"))
            $("#EditBahanKajian").val(Data.BahanKajian.split("<br/>").join("\n"))
            $("#EditReferensiUtama").val(Data.ReferensiUtama.split("<br/>").join("\n"))
            $("#EditReferensiPendudukung").val(Data.ReferensiPendudukung.split("<br/>").join("\n"))
            // $("#EditDosenPengampu").val(Data.DosenPengampu.split("<br/>").join("\n"))
            $("#EditMKPrasyarat").val(Data.MKPrasyarat.split("<br/>").join("\n"))
            var Minggu = []
            Minggu[0] = Data.Minggu1.split('$')
            Minggu[1] = Data.Minggu2.split('$')
            Minggu[2] = Data.Minggu3.split('$')
            Minggu[3] = Data.Minggu4.split('$')
            Minggu[4] = Data.Minggu5.split('$')
            Minggu[5] = Data.Minggu6.split('$')
            Minggu[6] = Data.Minggu7.split('$')
            Minggu[7] = Data.Minggu8.split('$')
            Minggu[8] = Data.Minggu9.split('$')
            Minggu[9] = Data.Minggu10.split('$')
            Minggu[10] = Data.Minggu11.split('$')
            Minggu[11] = Data.Minggu12.split('$')
            Minggu[12] = Data.Minggu13.split('$')
            Minggu[13] = Data.Minggu14.split('$')
            Minggu[14] = Data.Minggu15.split('$')
            Minggu[15] = Data.Minggu16.split('$')
            for (let i = 1; i < 17; i++) {
              $("#EditSubCPMK"+i).val(Minggu[i-1][0].split('|')[0].split("<br/>").join("\n"))
              T = Minggu[i-1][0].split('|')
              for (let j = 1; j < T.length; j++) {
                if (T[j] != "") {
                  $("#Edit"+T[j]).attr('checked', true);
                }
              }
              $("#EditMateriPembelajaran"+i).val(Minggu[i-1][1].split("<br/>").join("\n"))
              $("#EditMetodePembelajaran"+i).val(Minggu[i-1][2].split("<br/>").join("\n"))
              $("#EditEstimasiWaktu"+i).val(Minggu[i-1][3].split("<br/>").join("\n"))
              $("#EditPenugasan"+i).val(Minggu[i-1][4].split("<br/>").join("\n"))
              $("#EditKriteria"+i).val(Minggu[i-1][5].split("<br/>").join("\n"))
              $("#EditIndikator"+i).val(Minggu[i-1][6].split("<br/>").join("\n"))
              $("#EditBobot"+i).val(Minggu[i-1][7].split("<br/>").join("\n"))
            }
            $("#_BentukTugas").val(Data.Tugas.split('$')[0])
            $("#_WaktuTugas").val(Data.Tugas.split('$')[1])
            $("#_JudulTugas").val(Data.Tugas.split('$')[2])
            $("#_SubTugas").val(Data.Tugas.split('$')[3].split("<br/>").join("\n"))
            $("#_DeskripsiTugas").val(Data.Tugas.split('$')[4].split("<br/>").join("\n"))
            $("#_MetodeTugas").val(Data.Tugas.split('$')[5].split("<br/>").join("\n"))
            $("#_FormatTugas").val(Data.Tugas.split('$')[6].split("<br/>").join("\n"))
            $("#_JadwalTugas").val(Data.Tugas.split('$')[7])
            $("#_LainTugas").val(Data.Tugas.split('$')[8].split("<br/>").join("\n"))
            $("#_RujukanTugas").val(Data.Tugas.split('$')[9].split("<br/>").join("\n"))
            $("#_BentukTugas2").val(Data.Tugas.split('$')[10])
            $("#_WaktuTugas2").val(Data.Tugas.split('$')[11])
            $("#_JudulTugas2").val(Data.Tugas.split('$')[12])
            $("#_SubTugas2").val(Data.Tugas.split('$')[13].split("<br/>").join("\n"))
            $("#_DeskripsiTugas2").val(Data.Tugas.split('$')[14].split("<br/>").join("\n"))
            $("#_MetodeTugas2").val(Data.Tugas.split('$')[15].split("<br/>").join("\n"))
            $("#_FormatTugas2").val(Data.Tugas.split('$')[16].split("<br/>").join("\n"))
            $("#_JadwalTugas2").val(Data.Tugas.split('$')[17])
            $("#_LainTugas2").val(Data.Tugas.split('$')[18].split("<br/>").join("\n"))
            $("#_RujukanTugas2").val(Data.Tugas.split('$')[19].split("<br/>").join("\n"))
            $("#_Sikap").val(Data.Bobot.split('$')[0])
            $("#_Tugas").val(Data.Bobot.split('$')[1])
            $("#_Ujian").val(Data.Bobot.split('$')[2])
            $('#ModalEditRPS').modal("show")
          })
				})

        $("#EditRPS").click(function() {
					if ($("#EditKodeMK").val() === "") {
            alert('Input Kode Mata Kuliah Tidak Boleh Kosong!')
          } else if (/\s/g.test($("#EditKodeMK").val())) {
            alert('Kode Mata Kuliah Tidak Boleh Ada Spasi!')
          } else {
            var Minggu = []
            for (let i = 1; i < 17; i++) {
              var A = []
              $.each($("input[name='EditA"+i+"']:checked"), function(){
                A.push($(this).val())
              })
              var C = []
              $.each($("input[name='EditC"+i+"']:checked"), function(){
                C.push($(this).val())
              })
              var P = []
              $.each($("input[name='EditP"+i+"']:checked"), function(){
                P.push($(this).val())
              })
              Minggu[i] = $("#EditSubCPMK"+i).val()+'|'+A.join("|")+'|'+C.join("|")+'|'+P.join("|")+'$'+$("#EditMateriPembelajaran"+i).val().split("\n").join("<br/>")+'$'+$("#EditMetodePembelajaran"+i).val().split("\n").join("<br/>")+'$'+$("#EditEstimasiWaktu"+i).val().split("\n").join("<br/>")+'$'+$("#EditPenugasan"+i).val().split("\n").join("<br/>")+'$'+$("#EditKriteria"+i).val().split("\n").join("<br/>")+'$'+$("#EditIndikator"+i).val().split("\n").join("<br/>")+'$'+$("#EditBobot"+i).val().split("\n").join("<br/>")
              var Nugas = []
              Nugas.push($("#_BentukTugas").val())
              Nugas.push($("#_WaktuTugas").val())
              Nugas.push($("#_JudulTugas").val())
              Nugas.push($("#_SubTugas").val().split("\n").join("<br/>"))
              Nugas.push($("#_DeskripsiTugas").val().split("\n").join("<br/>"))
              Nugas.push($("#_MetodeTugas").val().split("\n").join("<br/>"))
              Nugas.push($("#_FormatTugas").val().split("\n").join("<br/>"))
              Nugas.push($("#_JadwalTugas").val())
              Nugas.push($("#_LainTugas").val().split("\n").join("<br/>"))
              Nugas.push($("#_RujukanTugas").val().split("\n").join("<br/>"))
              Nugas.push($("#_BentukTugas2").val())
              Nugas.push($("#_WaktuTugas2").val())
              Nugas.push($("#_JudulTugas2").val())
              Nugas.push($("#_SubTugas2").val().split("\n").join("<br/>"))
              Nugas.push($("#_DeskripsiTugas2").val().split("\n").join("<br/>"))
              Nugas.push($("#_MetodeTugas2").val().split("\n").join("<br/>"))
              Nugas.push($("#_FormatTugas2").val().split("\n").join("<br/>"))
              Nugas.push($("#_JadwalTugas2").val())
              Nugas.push($("#_LainTugas2").val().split("\n").join("<br/>"))
              Nugas.push($("#_RujukanTugas2").val().split("\n").join("<br/>"))
              var Tugas = Nugas.join('$')
              var Bobot = $("#_Sikap").val() + '$' + $("#_Tugas").val() + '$' + $("#_Ujian").val()
            }
            var RPS = { Homebase: $("#EditHomebaseRPS").val(),
                        NamaMK: $("#EditNamaMK").val(),
                        KodeMK: $("#EditKodeMK").val(),
                        KodeMKLama: $("#KodeMKLama").val(),
                        BobotMK: $("#EditBobotMK").val(),
                        Semester: $("#EditSemester").val(),
                        TanggalPenyusunan: $("#EditTanggalPenyusunan").val(),
                        Otorisasi: $("#EditOtorisasi").val(),
                        KoordinatorPengembang: $("#EditKoordinatorPengembang").val(),
                        KoordinatorBidang: $("#EditKoordinatorBidang").val(),
                        Kaprodi: $("#EditKaprodi").val(),
                        CPL: $("#EditCPL").val().split("\n").join("<br/>"),
                        CPM: $("#EditCPM").val().split("\n").join("<br/>"),
                        Deskripsi: $("#EditDeskripsi").val().split("\n").join("<br/>"),
                        BahanKajian: $("#EditBahanKajian").val().split("\n").join("<br/>"),
                        ReferensiUtama: $("#EditReferensiUtama").val().split("\n").join("<br/>"),
                        ReferensiPendudukung: $("#EditReferensiPendudukung").val().split("\n").join("<br/>"),
                        // DosenPengampu: $("#EditDosenPengampu").val().split("\n").join("<br/>"),
                        MKPrasyarat: $("#EditMKPrasyarat").val().split("\n").join("<br/>"),
                        Tugas: Tugas, Bobot: Bobot,
                        Minggu1: Minggu[1],Minggu9: Minggu[9],
                        Minggu2: Minggu[2],Minggu10: Minggu[10],
                        Minggu3: Minggu[3],Minggu11: Minggu[11],
                        Minggu4: Minggu[4],Minggu12: Minggu[12],
                        Minggu5: Minggu[5],Minggu13: Minggu[13],
                        Minggu6: Minggu[6],Minggu14: Minggu[14],
                        Minggu7: Minggu[7],Minggu15: Minggu[15],
                        Minggu8: Minggu[8],Minggu16: Minggu[16] }
            $("#EditRPS").attr("disabled", true);                              
            $("#LoadingEdit").show();
            $.post(BaseURL+"Dashboard/UpdateRPS", RPS).done(function(Respon) {
              if (Respon == '1') {
                alert('Data RPS Berhasil Di Update!')
                window.location = BaseURL + "Dashboard/RPS"
              } else {
                alert(Respon)
                $("#LoadingEdit").hide();
                $("#EditRPS").attr("disabled", false);   
              }
            })
          }
				})

        $(document).on("click",".Valid",function(){
					var Valid = {Id: $(this).attr('Valid')}
          var Konfirmasi = confirm("Yakin Ingin Validasi RPS?");
      		if (Konfirmasi == true) {
            $.post(BaseURL+"Dashboard/ValidasiRPS", Valid).done(function(Respon) {
              if (Respon == '1') {
                window.location = BaseURL + "Dashboard/RPS"
              } else {
                alert(Respon)
              }
            })
          }
				})

        $(document).on("click",".Hapus",function(){
					var Hapus = {Id: $(this).attr('Hapus')}
					var Konfirmasi = confirm("Yakin Ingin Menghapus?");
      		if (Konfirmasi == true) {
						$.post(BaseURL+"Dashboard/HapusRPS", Hapus).done(function(Respon) {
							if (Respon == '1') {
								window.location = BaseURL + "Dashboard/RPS"
							} else {
								alert(Respon)
							}
						})
					}
				})

        $(document).on("click",".Unduh",function(){
          window.location = BaseURL + "SMD/UnduhRPS/" + $(this).attr('Unduh')
				})
      })
    </script>
  </body>
</html>