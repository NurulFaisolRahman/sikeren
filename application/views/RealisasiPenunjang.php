<div class="container-fluid">
  <div class="row">
    <div class="col-sm-auto mt-1 mb-1">
      <button type="button" id="LihatRealisasi" class="btn btn-primary mb-1"><i class="fa fa-eye"></i><b> Lihat</b></button>
      <button type="button" class="btn btn-danger text-light mb-1" data-toggle="modal" data-target="#InputRealisasiPenunjang"><i class="fa fa-plus"></i> <b>Input</b></button>       
    </div>  
    <div class="col-sm-auto mt-1 mb-1">
      <div class="input-group mb-1">
        <div class="input-group-prepend">
          <label class="input-group-text bg-warning"><i class="fa fa-tasks"></i><b>&nbsp;Kegiatan</b></label>
        </div>
        <?php 
          $Kegiatan = array('Menjadi anggota dalam suatu Panitia / Badan pada Perguruan Tinggi',
          'Menjadi anggota panitia / badan pada lembaga pemerintah',
          'Menjadi anggota organisasi profesi',
          'Mewakili Perguruan Tinggi / Lembaga Pemerintah duduk dalam Panitia Antar Lembaga, tiap kepanitiaan',
          'Menjadi anggota delegasi Nasional ke pertemuan Internasional',
          'Berperan serta aktif dalam pertemuan ilmiah',
          'Mendapat tanda jasa / penghargaan',
          'Menulis buku pelajaran SLTA ke bawah yang diterbitkan dan diedarkan secara nasional',
          'Mempunyai prestasi di bidang olahraga/ Humaniora',
          'Keanggotaan dalam tim penilai jabatan akademik dosen (tiap semester)');
        ?>
        <select class="custom-select" id="IdKegiatanPenunjang">
            <option value="PNJ11" <?php if ($this->session->userdata('IdKegiatanPenunjang') == "PNJ11") {
              echo 'selected';
            } ?>>Bimbingan akademik(perwalian) / Konseling</option>
            <option value="PNJ12" <?php if ($this->session->userdata('IdKegiatanPenunjang') == "PNJ12") {
              echo 'selected';
            } ?>>Menjabat Posisi Tertentu</option>
          <?php $Id = 1; foreach ($Kegiatan as $key) { $ID = 'PNJ'.$Id;?>
            <option value="<?='PNJ'.$Id++?>" <?php if ($this->session->userdata('IdKegiatanPenunjang') == $ID) {
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
              <button LihatBukti="<?=base_url('Penunjang/'.$key['Bukti'])?>" class="btn btn-sm btn-primary LihatBukti"><i class="fas fa-download"></i></button>
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
<div class="modal fade" id="InputRealisasiPenunjang">
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
                <select class="custom-select" id="InputIdKegiatanPenunjang" onchange="InputIdKegiatanPenunjang()">
                  <option value="PNJ11">Bimbingan akademik(perwalian) / Konseling</option>
                  <option value="PNJ12">Menjabat Posisi Tertentu</option>
                  <?php $Id = 1; foreach ($Kegiatan as $key) { ?>
                    <option value="<?='PNJ'.$Id++?>"><?=$key?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNJ12" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Sebagai</b></span>
                  </div>
                  <select class="custom-select" id="JabatanBKD">
                    <option value="1">Pembina kegiatan mahasiswa(UKM,PKM,LKTI,BEM,SenatMahasiswa,HMJ)</option>
                    <option value="1">Ketua Organisasi sosial intern(pengurus koperasi,dharma wanita,takmir masjid kampus/sejenisnya</option>
                    <option value="0.75">Wakil Ketua/Sekretaris/Bendahara Organisasi sosial intern(pengurus koperasi,dharma wanita,takmir masjid kampus/sejenisnya</option>
                    <option value="0.5">Seksi/Anggota Organisasi sosial intern(pengurus koperasi,dharma wanita,takmir masjid kampus/sejenisnya</option>
                    <option value="1">Panitia Ad Hoc (umur panitia minimal 1 semester)</option>
                    <option value="0.5">Panitia Ad Hoc (bersifat insidental)</option>
                    <option value="0.2">Berperan aktif dalam seminar sebagai peserta seminar Lokal/Regional</option>
                    <option value="0.3">Berperan aktif dalam seminar sebagai peserta seminar Nasional</option>
                    <option value="0.5">Berperan aktif dalam seminar sebagai peserta seminar Internasional</option>
                    <option value="4">Ketua P3AI,PJM,SPI,PAK,Perencanaan,UPL</option>
                    <option value="3">Sekretaris P3AI,PJM,SPI,PAK,Perencanaan,UPL</option>
                    <option value="2">Anggota P3AI,PJM,SPI,PAK,Perencanaan,UPL</option>
                    <option value="4">Sekretaris LPPM</option>
                    <option value="2">Ketua Pusat Studi Universitas/Fakultas</option>
                    <option value="2">Ketua BINAP/Dewan Kehormatan</option>
                    <option value="1">Anggota BINAP/Dewan Kehormatan</option>
                    <option value="4">Ketua Program studi</option>
                    <option value="3">Sekretaris Program studi</option>
                    <option value="3">Kepala Laboratorium/Studio</option>
                    <option value="3">Koordinator MKDU/Humas/Biro Hukum</option>
                    <option value="2">Ketua bagian/Konsentrasi</option>
                    <option value="4">Sekretaris Senat Universitas</option>
                    <option value="2">Anggota Senat Universitas</option>
                    <option value="4">Sekretaris Senat Fakultas</option>
                    <option value="2">Anggota Senat Fakultas</option>
                    <option value="2">Ketua Unit Kewirausahaan</option>
                    <option value="2">Pengelola Perpustakaan</option>
                    <option value="1">Pengelola Ruang Baca</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNJ1" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Panitia</b></span>
                  </div>
                  <select class="custom-select" id="PanitiaUniversitas">
                    <option value="1">Sebagai Ketua/Wakil Ketua merangkap Anggota, tiap tahun</option>
                    <option value="2">Sebagai Anggota, tiap tahun</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNJ2" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Panitia</b></span>
                  </div>
                  <select class="custom-select" id="PanitiaLembagaPemerintah">
                    <option value="1">Panitia Pusat, sebagai Ketua/Wakil Ketua, tiap kepanitiaan</option>
                    <option value="2">Panitia Pusat, sebagai Anggota, tiap kepanitiaan</option>
                    <option value="3">Panitia Daerah, sebagai Ketua/Wakil Ketua, tiap kepanitiaan</option>
                    <option value="4">Panitia Daerah, sebagai Anggota, tiap kepanitiaan</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNJ3" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Tingkat</b></span>
                  </div>
                  <select class="custom-select" id="AnggotaProfesi">
                    <option value="1">Tingkat Internasional, sebagai Pengurus, tiap periode jabatan</option>
                    <option value="2">Tingkat Internasional, Anggota atas permintaan, tiap periode jabatan</option>
                    <option value="3">Tingkat Internasional, Anggota, tiap periode jabatan</option>
                    <option value="4">Tingkat Nasional, sebagai Pengurus, tiap periode jabatan</option>
                    <option value="5">Tingkat Nasional, Anggota atas permintaan, tiap periode jabatan</option>
                    <option value="6">Tingkat Nasional, Anggota, tiap periode jabatan</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNJ5" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Panitia</b></span>
                  </div>
                  <select class="custom-select" id="AnggotaDelegasi">
                    <option value="1">Sebagai Ketua delegasi, tiap kegiatan</option>
                    <option value="2">Sebagai Anggota, tiap kegiatan</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNJ6" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Tingkat</b></span>
                  </div>
                  <select class="custom-select" id="PeranIlmiah">
                    <option value="1">Tingkat Internasional sebagai Ketua, tiap kegiatan</option>
                    <option value="2">Tingkat Nasional sebagai Ketua, tiap kegiatan</option>
                    <option value="3">Tingkat Regional sebagai Ketua, tiap kegiatan</option>
                    <option value="4">Tingkat Internasional sebagai Anggota/peserta, tiap kegiatan</option>
                    <option value="5">Tingkat Nasional sebagai Anggota/peserta, tiap kegiatan</option>
                    <option value="6">Tingkat Regional sebagai Anggota/peserta, tiap kegiatan</option>
                    <option value="7">Di lingkungan Perguruan Tinggi sebagai Ketua, tiap kegiatan</option>
                    <option value="8">Di lingkungan Perguruan Tinggi sebagai Anggota/peserta, tiap kegiatan</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNJ7" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Penghargaan</b></span>
                  </div>
                  <select class="custom-select" id="Penghargaan">
                    <option value="1">Penghargaan/tanda jasa Satya lencana 30 tahun</option>
                    <option value="2">Penghargaan/tanda jasa Satya lencana 20 tahun</option>
                    <option value="3">Penghargaan/tanda jasa Satya lencana 10 tahun</option>
                    <option value="4">Tingkat Internasional, tiap tanda jasa/penghargaan</option>
                    <option value="5">Tingkat Nasional, tiap tanda jasa/penghargaan</option>
                    <option value="6">Tingkat Daerah/Lokal, tiap tanda jasa/penghargaan</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNJ8" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Jenis Buku</b></span>
                  </div>
                  <select class="custom-select" id="Buku">
                    <option value="1">Buku SMTA atau setingkat, tiap buku</option>
                    <option value="2">Buku SMTP atau setingkat, tiap buku</option>
                    <option value="3">Buku SD atau setingkat, tiap buku</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNJ9" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Tingkat</b></span> 
                  </div>
                  <select class="custom-select" id="Humaniora">
                    <option value="1"> Tingkat Internasional, tiap piagam/medali</option>
                    <option value="2"> Nasional, tiap piagam/medali</option>
                    <option value="3">Tingkat Daerah/Lokal, tiap piagam/medali</option>
                  </select>
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
                <input class="form-control" type="text" id="SK">
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
        <button type="submit" class="btn btn-success" id="TambahRealisasiPenunjang"><b>Simpan</b></button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="EditRealisasiPenunjang">
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
        <button type="submit" class="btn btn-success" id="UpdateRealisasiPenunjang"><b>Simpan</b></button>
      </div>
    </div>
  </div>
</div>