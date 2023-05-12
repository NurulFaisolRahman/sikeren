<div class="container-fluid">
  <div class="row">
    <div class="col-sm-auto mt-1 mb-1">
      <button type="button" id="LihatRealisasi" class="btn btn-primary mb-1"><i class="fa fa-eye"></i><b> Lihat</b></button>
      <button type="button" class="btn btn-danger text-light mb-1" data-toggle="modal" data-target="#InputRealisasiPenelitian"><i class="fa fa-plus"></i> <b>Input</b></button>            
    </div>   
    <div class="col-sm-9 mt-1 mb-1">
      <div class="input-group mb-1">
        <div class="input-group-prepend">
          <label class="input-group-text bg-warning"><i class="fa fa-tasks"></i><b>&nbsp;Kegiatan</b></label>
        </div>
        <?php 
          $Kegiatan = array('Menghasilkan karya ilmiah sesuai dengan bidang ilmunya',
          'Hasil penelitian atau hasil pemikiran yang didesiminasikan',
          'Hasil penelitian atau pemikiran atau kerjasama industri yang tidak dipublikasikan (tersimpan dalam perpustakaan) yang dilakukan secara melembaga',
          'Menerjemahkan/menyadur buku ilmiah yang diterbitkan (ber ISBN)',
          'Mengedit/menyunting karya ilmiah dalam bentuk buku yang diterbitkan (ber ISBN)',
          'Membuat rancangan dan karya teknologi yang dipatenkan atau seni yang terdaftar di HaKI secara nasional atau internasional',
          'Membuat rancangan dan karya teknologi yang tidak dipatenkan; rancangan dan karya seni monumental yang tidak terdaftar di HaKI tetapi telah dipresentasikan pada forum teragenda',
          'Membuat rancangan dan karya seni yang tidak terdaftar HaKI',
          'Keterlibatan dalam 1 judul penelitian/pembuatan karya seni/teknologi yang dilakukan oleh kelompok',
          'Ketua Pelaksanaan penelitian/pembuatan karya seni/teknologi mandiri',
          'Menulis 1 judul buku yang akan diterbitkan dalam waktu maksimal 4 semester',
          'Menulis 1 judul buku internasional(berbahasa & diedarkan secara internasional minimal 3 negara)',
          'Sebagai asesor beban kerja dosen & evaluasi pelaksanaan tri dharma',
          'Menulis jurnal ilmiah',
          'Menulis artikel ilmiah',
          'Membuat 1 naskah monografi yang diterbitkan',
          'Memperoleh hak paten minimal 3 Negara',
          'Tugas belajar untuk akta mengajar sama dengan 6 sks',
          'Pekerti tatap muka dan tugas mandiri',
          'Magang Dosen Muda',
          'AA tatap muka dan tugas mandiri',
          'Mendiskusikan (menyebarluaskan) temuan karya teknologi/seni Khusus Jabatan Profesor');
        ?>
        <select class="custom-select" id="IdKegiatanPenelitian">
          <?php $Id = 1; foreach ($Kegiatan as $key) { $ID = 'PNL'.$Id;?>
            <option value="<?='PNL'.$Id++?>" <?php if ($this->session->userdata('IdKegiatanPenelitian') == $ID) {
              echo 'selected';
            } ?>><?=$key?></option>
          <?php } ?>
        </select>
      </div>
    </div> 
  </div>
  <div class="container-fluid">
    <div class="table-responsive mb-2">
      <table id="TabelRealisasi" class="table table-bordered table-striped">
        <thead class="bg-warning">
          <tr>
            <th class="align-middle text-center">No</th>
            <th class="align-middle text-center">Home<br>base</th>
            <th class="align-middle text-center">Seme<br>ster</th>
            <th class="align-middle text-center">Tahun</th>
            <th class="align-middle">Uraian Kegiatan</th>
            <th class="align-middle text-center">Tanggal</th>
            <th class="align-middle text-center">Bukti</th>
            <th class="align-middle text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $Total = 0; $No = 1; foreach ($Realisasi as $key) { ?>
            <tr>	
            <td class="text-center align-middle" style="width: 4%;"><?=$No++?></td>
            <td class="text-center align-middle" style="width: 6%;"><?=$key['Jenjang']?></td>
            <td class="text-center align-middle" style="width: 6%;"><?=$key['Semester']?></td>
            <td class="text-center align-middle" style="width: 6%;"><?=$key['Tahun']?></td>
            <td class="align-middle" style="width: 51%;"><?='Berdasarkan '.$key['SK'].' '.$key['Kegiatan']?></td>
            <td class="text-center align-middle" style="width: 15%;"><?=$key['TanggalKegiatan']?></td>
            <td class="text-center align-middle" style="width: 4%;"><?php if ($key['Bukti'] != '') { ?>
              <button LihatBukti="<?=base_url('Penelitian/'.$key['Bukti'])?>" class="btn btn-sm btn-primary LihatBukti"><i class="fas fa-download"></i></button>
              <?php } ?></td>
            <td class="text-center align-middle" style="width: 8%;">                          
              <button EditRealisasi="<?=$key['No']."|".$key['Jenjang']."|".$key['Semester']."|".$key['Tahun']."|".$key['SK']."|".$key['Kegiatan']."|".$key['TanggalKegiatan']."|".$key['Bukti']?>" class="btn btn-sm btn-warning EditRealisasi"><i class="fas fa-edit"></i></button>
              <button HapusRealisasi="<?=$key['No']."|".$key['Bukti']?>" class="btn btn-sm btn-danger HapusRealisasi"><i class="fas fa-trash"></i></button>
            </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="modal fade" id="InputRealisasiPenelitian">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content bg-warning">
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                  <label class="input-group-text bg-primary"><b>Homebase</b></label>
                </div>
                <select class="custom-select" id="JenisRealisasi">										
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                  <label class="input-group-text bg-primary"><b>Semester</b></label>
                </div>
                <select class="custom-select" id="SemesterRealisasi">										
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                  <label class="input-group-text bg-primary"><b>Tahun</b></label>
                </div>
                <input class="form-control" type="text" id="TahunRealisasi"  data-inputmask='"mask": "9999"' data-mask value="20">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-primary"><b>Kegiatan</b></span>
                </div>
                <select class="custom-select" id="InputIdKegiatanPenelitian" onchange="InputIdKegiatanPenelitian()">
                <?php $Id = 1; foreach ($Kegiatan as $key) { ?>
                    <option value="<?='PNL'.$Id++?>"><?=$key?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNL1">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Jenis</b></span>
                  </div>
                  <select class="custom-select" id="Point1">
                    <option value="1">Hasil penelitian yang dipublikasikan dalam bentuk buku referensi</option>
                    <option value="2">Hasil penelitian yang dipublikasikan dalam bentuk Monograf</option>
                    <option value="3">Hasil penelitian dalam buku yang dipublikasikan dan berisi berbagai tulisan dari berbagai penulis (book chapter) Internasional</option>
                    <option value="4">Hasil penelitian dalam buku yang dipublikasikan dan berisi berbagai tulisan dari berbagai penulis (book chapter) Nasional</option>
                    <option value="5">Hasil penelitian yang dipublikasikan dalam bentuk Jurnal internasional bereputasi (terindeks pada database internasional bereputasi dan berfaktor dampak)</option>
                    <option value="6">Hasil penelitian yang dipublikasikan dalam bentuk Jurnal internasional terindeks pada basis data internasional bereputasi</option>
                    <option value="7">Hasil penelitian yang dipublikasikan dalam bentuk Jurnal internasionalterindekspada basis data internasional di luar kategori 2)</option>
                    <option value="8">Hasil penelitian yang dipublikasikan dalam bentuk Jurnal Nasional terakreditasiDikti/Jurnal nasional terakreditasi Kemenristekdiktiperingkat 1 dan 2</option>
                    <option value="9">Hasil penelitian yang dipublikasikan dalam bentuk Jurnal Nasional berbahasa Inggris/bahasa resmi (PBB) terindeks pada basis data yang diakui Kemenristekdikti, contoh : CABI/ICI, Jurnal nasional terakreditasi peringkat 3 dan 4</option>
                    <option value="10">Hasil penelitian yang dipublikasikan dalam bentuk Jurnal Nasional berbahasa Indonesia terindeks pada basis datayang diakui Kemenristekdikti, contoh : akreditasi peringkat 5 dan 6</option>
                    <option value="11">Hasil penelitian yang dipublikasikan dalam bentuk Jurnal Nasional</option>
                    <option value="12">Hasil penelitian yang dipublikasikan dalam bentuk Jurnal ilmiah yang ditulis dalam Bahasa Resmi PBB namun tidak memenuhi syarat-syarat sebagai jurnal ilmiah internasional</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNL2" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Jenis</b></span>
                  </div>
                  <select class="custom-select" id="Point2">
                    <option value="1">Dipresentasikan secara oral dan dimuat dalam prosiding yang dipublikasikan (ber ISSN/ISBN) Internasional terindeks pada Scimagojr & Scopus</option>
                    <option value="2">Dipresentasikan secara oral dan dimuat dalam prosiding yang dipublikasikan (ber ISSN/ISBN) Internasional terindeks pada SCOPUS, IEEE Explore, SPIE</option>
                    <option value="3">Dipresentasikan secara oral dan dimuat dalam prosiding yang dipublikasikan (ber ISSN/ISBN) Internasional</option>
                    <option value="4">Dipresentasikan secara oral dan dimuat dalam prosiding yang dipublikasikan (ber ISSN/ISBN) Nasional</option>
                    <option value="5">Disajikan dalam bentuk poster & dimuat dalam prosiding yang dipublikasikan Internasional</option>
                    <option value="6">Disajikan dalam bentuk poster & dimuat dalam prosiding yang dipublikasikan Nasional</option>
                    <option value="7">Disajikan dalam seminar/simposium/lokakarya, tetapi tidak dimuat dalam prosiding yang dipublikasikan Internasional</option>
                    <option value="8">Disajikan dalam seminar/simposium/lokakarya, tetapi tidak dimuat dalam prosiding yang dipublikasikan Nasional</option>
                    <option value="9">Hasil penelitian/pemikiran yang tidak disajikan dalam seminar/simposium/lokakarya, tetapi dimuat dalam prosiding Internasional</option>
                    <option value="10">Hasil penelitian/pemikiran yang tidak disajikan dalam seminar/simposium/lokakarya, tetapi dimuat dalam prosiding Nasional</option>
                    <option value="11">Hasil penelitian/pemikiran yang disajikan dalam koran/majalah populer/umum</option>
                  </select>
                </div>
                <div id="JenisPNL2" style="display: none;">
                  <div class="input-group input-group-sm mb-1">
                    <div class="input-group-prepend">
                      <span class="input-group-text bg-primary"><b>Tingkat</b></span>
                    </div>
                    <select class="custom-select" id="TingkatPNL2">
                      <option value="1">Wilayah</option>
                      <option value="2">Nasional</option>
                      <option value="3">Internasional</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNL6" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Jenis</b></span>
                  </div>
                  <select class="custom-select" id="Point6">
                    <option value="1">Internasional yang sudah diimplementasikan di industri (paling sedikit diakui oleh 4 Negara)</option>
                    <option value="2">Internasional (paling sedikit diakui oleh 4 Negara)</option>
                    <option value="3">Nasional (yang sudah diimplementasikan di industri)</option>
                    <option value="4">Nasional</option>
                    <option value="5">Nasional, dalam bentuk paten sederhana yang telah memiliki sertifikat dari Direktorat Jenderal Kekayaan Intelektual, Kemenkumham</option>
                    <option value="6">Karya buku, desain industri, indikasi geografis yang telah memiliki sertifikat dari Direktorat Jenderal Kekayaan Intelektual, Kemenkumham</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNL7" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Tingkat</b></span>
                  </div>
                  <select class="custom-select" id="Point7">
                    <option value="1">Tingkat Internasional</option>
                    <option value="2">Tingkat Nasional</option>
                    <option value="3">Tingkat Lokal</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNL8" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Tingkat</b></span>
                  </div>
                  <select class="custom-select" id="Point8">
                    <option value="1"><b>Internasional</b> Sebagai Komposer/Penulis Naskah/Sutradara/Perancang/Pencipta/Penggubah/Kameramen/Animator/Kurator/Editor Audio-Visual</option>
                    <option value="2"><b>Nasional</b> Sebagai Komposer/Penulis Naskah/Sutradara/Perancang/Pencipta/Penggubah/Kameramen/Animator/Kurator/Editor Audio-Visual</option>
                    <option value="3"><b>Lokal</b> Sebagai Komposer/Penulis Naskah/Sutradara/Perancang/Pencipta/Penggubah/Kameramen/Animator/Kurator/Editor Audio-Visual</option>
                    <option value="4"><b>Internasional</b> Sebagai Penata Arstistik/Penata Musik/Penata Rias/PenataBusana/Penata Tari/Penata Lampu/Penata Suara/Penata Panggung/Ilustrator Foto/Kunduktor</option>
                    <option value="5"><b>Nasional</b> Sebagai Penata Arstistik/Penata Musik/Penata Rias/PenataBusana/Penata Tari/Penata Lampu/Penata Suara/Penata Panggung/Ilustrator Foto/Kunduktor</option>
                    <option value="6"><b>Lokal</b> Sebagai Penata Arstistik/Penata Musik/Penata Rias/PenataBusana/Penata Tari/Penata Lampu/Penata Suara/Penata Panggung/Ilustrator Foto/Kunduktor</option>
                    <option value="7"><b>Internasional</b> Sebagai Pemusik/Pengrawit/Penari/Dalang/Pemeran/Pengarah Acara Televisi/Pelaksana Perancangan/Pendisplay Pameran/Pembuat FotoDokumentasi/Pewarta Foto/Pembawa Acara/Reporter/RedakturPelaksana</option>
                    <option value="8"><b>Nasional</b> Sebagai Pemusik/Pengrawit/Penari/Dalang/Pemeran/Pengarah Acara Televisi/Pelaksana Perancangan/Pendisplay Pameran/Pembuat FotoDokumentasi/Pewarta Foto/Pembawa Acara/Reporter/RedakturPelaksana</option>
                    <option value="9"><b>Lokal</b> Sebagai Pemusik/Pengrawit/Penari/Dalang/Pemeran/Pengarah Acara Televisi/Pelaksana Perancangan/Pendisplay Pameran/Pembuat FotoDokumentasi/Pewarta Foto/Pembawa Acara/Reporter/RedakturPelaksana</option>
                    <option value="10"><b>Internasional</b> Sebagai Penulis Naskah Drama/Novel</option>
                    <option value="11"><b>Nasional</b> Sebagai Penulis Naskah Drama/Novel</option>
                    <option value="12"><b>Lokal</b> Sebagai Penulis Naskah Drama/Novel</option>
                    <option value="13"><b>Internasional</b> Sebagai Penulis Buku Kumpulan Cerpen</option>
                    <option value="14"><b>Nasional</b> Sebagai Penulis Buku Kumpulan Cerpen</option>
                    <option value="15"><b>Lokal</b> Sebagai Penulis Buku Kumpulan Cerpen</option>
                    <option value="16"><b>Internasional</b> Sebagai Penulis Buku Kumpulan Puisi</option>
                    <option value="17"><b>Nasional</b> Sebagai Penulis Buku Kumpulan Puisi</option>
                    <option value="18"><b>Lokal</b> Sebagai Penulis Buku Kumpulan Puisi</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNL9" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Sebagai</b></span>
                  </div>
                  <select class="custom-select" id="SebagaiPNL9">
                    <option value="1">Ketua</option>
                    <option value="2">Anggota</option>
                  </select>
                </div>
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Progres</b></span>
                  </div>
                  <select class="custom-select" id="ProgresPNL9">
                    <option value="0.2">Proposal penelitian</option>
                    <option value="0.3">Persiapan penelitian</option>
                    <option value="0.5">Pengumpulan data</option>
                    <option value="0.6">Analisa data</option>
                    <option value="0.85">Penulisan laporan</option>
                    <option value="1">Penulisan artikel ilmiah(terpublikasi)</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNL10" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Progres</b></span>
                  </div>
                  <select class="custom-select" id="ProgresPNL10">
                    <option value="0.2">Proposal penelitian</option>
                    <option value="0.3">Persiapan penelitian</option>
                    <option value="0.5">Pengumpulan data</option>
                    <option value="0.6">Analisa data</option>
                    <option value="0.85">Penulisan laporan</option>
                    <option value="1">Penulisan artikel ilmiah(terpublikasi)</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNL11" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Opsi</b></span>
                  </div>
                  <select class="custom-select" id="JenisPNL11">
                    <option value="1">Menulis 1 judul buku/bahan ajar utuh Ber ISBN</option>
                    <option value="1.8">Menulis 1 judul buku/bahan ajar, ada editor</option>
                    <option value="1.2">Kontributor untuk 1 buku utuh, tidak tiap chapter</option>
                    <option value="2">Menulis Modul/Diktat/BahanAjar oleh 1 Dosen (Tidak diterbitkan, tetapi digunakan oleh mahasiswa)</option>
                  </select>
                </div>
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Progres</b></span>
                  </div>
                  <select class="custom-select" id="ProgresPNL11">
                    <option value="0.1">Bab Pendahuluan</option>
                    <option value="0.6">Bab Isi Buku</option>
                    <option value="0.75">Bab Penutup & Referensi</option>
                    <option value="0.85">Persetujuan Penerbit</option>
                    <option value="1">Proses pencetakan selesai</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNL14" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Jenis</b></span>
                  </div>
                  <select class="custom-select" id="JenisPNL14">
                    <option value="3">jurnal/proseding tidak terakreditasi(lokal)</option>
                    <option value="5">jurnal terakreditasi(nasional)</option>
                    <option value="8">jurnal terakreditasi internasional(bhs internasional)</option>
                  </select>
                </div>
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Progres</b></span>
                  </div>
                  <select class="custom-select" id="ProgresPNL14">
                    <option value="0.1">submit</option>
                    <option value="0.3">Perbaikan/revisi</option>
                    <option value="0.4">Sudah Revisi</option>
                    <option value="0.9">Diterima (tapi belum terbit)</option>
                    <option value="1">Dicetak (terbit)</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNL15" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Jenis</b></span>
                  </div>
                  <select class="custom-select" id="JenisPNL15">
                    <option value="0">presentasi ilmiah</option>
                    <option value="1">poster</option>
                    <option value="2">majalah/koran</option>
                  </select>
                </div>
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Lingkup</b></span>
                  </div>
                  <select class="custom-select" id="LingkupPNL15">
                    <option value="0">Lokal/Regional</option>
                    <option value="1">Nasional</option>
                    <option value="2">Internasional</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNL16" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Lingkup</b></span>
                  </div>
                  <select class="custom-select" id="LingkupPNL16">
                    <option value="0.75">Kalangan sendiri</option>
                    <option value="1.5">Nasional</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNL17" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Jenis</b></span>
                  </div>
                  <select class="custom-select" id="JenisPNL17">
                    <option value="3">Proses pengurusan paten sederhana</option>
                    <option value="4">Proses pengurusan paten biasa</option>
                    <option value="5">Proses pengurusan paten internasional</option>
                  </select>
                </div>
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Progres</b></span>
                  </div>
                  <select class="custom-select" id="ProgresPNL17">
                    <option value="0.1">Pendaftaran</option>
                    <option value="0.3">Pemeriksaan Substantif</option>
                    <option value="0.6">Uji publik</option>
                    <option value="1">Sertifikat</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiSumberPembiayaan">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Sumber Pembiayaan</b></span>
                  </div>
                  <select class="custom-select" id="SumberPembiayaan">
                    <option value="1">Didalam Perguruan Tinggi / Mandiri</option>
                    <option value="2">Lembaga Dalam Negeri (Diluar Perguruan Tinggi)</option>
                    <option value="3">Lembaga Luar Negeri</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPenulis">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Penulis Ke</b></span>
                  </div>
                  <input class="form-control" type="text" id="Ke" data-inputmask='"mask": "9"' data-mask placeholder="1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Dari</b></span>
                  </div>
                  <input class="form-control" type="text" id="Dari" data-inputmask='"mask": "9"' data-mask placeholder="1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Penulis</b></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-primary"><b>Volume kegiatan/sks/mhs</b></span>
                </div>
                <input class="form-control" type="text" id="Volume" data-inputmask='"mask": "99"' data-mask>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-primary"><b>Surat Tugas/SK</b></span>
                </div>
                <input class="form-control" type="text" id="SK" value="Surat Tugas / SK">
              </div>
            </div>
            <div class="col-sm-12">
              <pre class="text-danger"><b>Volume Kegiatan Merujuk Pada Konteks Kegiatan</b></pre>
            </div>
            <div class="col-sm-12">
              <div class="input-group input-group-sm mb-1">
                <span class="input-group-text bg-primary"><b>Uraian<br>Kegiatan</b></span>
                <textarea class="form-control" id="Uraian" rows="2"></textarea>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-primary"><b>Tanggal Kegiatan</b></span>
                </div>
                <input class="form-control" type="text" id="TanggalKegiatan">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-primary"><b>Bukti</b></span>
                </div>
                <input class="form-control" type="file" id="Bukti">
              </div>
            </div>
            <div class="col-sm-12">
              <pre class="text-danger"><b>Bukti Berupa Pdf & Wajib Menyertakan Surat Tugas/SK</b></pre>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
        <div id="LoadingInput" class="spinner-border text-success" role="status" style="display: none;"></div>
        <button type="submit" class="btn btn-success" id="TambahRealisasiPenelitian"><b>Simpan</b></button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="EditRealisasiPenelitian">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content bg-warning">
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-sm-4">
              <div class="input-group input-group-sm mb-1"> 
                <div class="input-group-prepend">
                  <label class="input-group-text bg-primary"><b>Homebase</b></label>
                </div>
                <input class="form-control" type="hidden" id="EditNoRealisasi">
                <input class="form-control" type="hidden" id="EditBuktiRealisasi">
                <select class="custom-select" id="EditJenisRealisasi">										
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                  <label class="input-group-text bg-primary"><b>Semester</b></label>
                </div>
                <select class="custom-select" id="EditSemesterRealisasi">										
                    <option value="Ganjil">Ganjil</option>
                    <option value="Genap">Genap</option>
                </select>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                  <label class="input-group-text bg-primary"><b>Tahun</b></label>
                </div>
                <input class="form-control" type="text" id="EditTahunRealisasi"  data-inputmask='"mask": "9999"' data-mask value="20">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-primary"><b>Surat Tugas/SK</b></span>
                </div>
                <input class="form-control" type="text" id="EditSK">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="input-group input-group-sm mb-1">
                <span class="input-group-text bg-primary"><b>Uraian<br>Kegiatan</b></span>
                <textarea class="form-control" id="EditUraian" rows="2"></textarea>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-primary"><b>Tanggal Kegiatan</b></span>
                </div>
                <input class="form-control" type="text" id="EditTanggalKegiatan">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-group input-group-sm mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-primary"><b>Bukti</b></span>
                </div>
                <input class="form-control" type="file" id="EditBukti">
                <div class="input-group-prepend">
                  <button class="input-group-text bg-primary" id="CancelBukti"><b>X</b></button>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <pre class="text-danger"><b>Bukti Berupa Pdf & Wajib Menyertakan Surat Tugas/SK</b></pre>
            </div>
          </div>
        </div>
      </div>  
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Tutup</b></button>
        <div id="LoadingUpdate" class="spinner-border text-success" role="status" style="display: none;"></div>
        <button type="submit" class="btn btn-success" id="UpdateRealisasiPenelitian"><b>Simpan</b></button>
      </div>
    </div>
  </div>
</div>