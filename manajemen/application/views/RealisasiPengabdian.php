<div class="container-fluid">
  <div class="row">
    <div class="col-sm-auto mt-1 mb-1">
      <button type="button" id="LihatRealisasi" class="btn btn-primary mb-1"><i class="fa fa-eye"></i><b> Lihat</b></button>
      <button type="button" class="btn btn-danger text-light mb-1" data-toggle="modal" data-target="#InputRealisasiPengabdian"><i class="fa fa-plus"></i> <b>Input</b></button>            
    </div>   
    <div class="col-sm-9 mt-1 mb-1">
      <div class="input-group mb-1">
        <div class="input-group-prepend">
          <label class="input-group-text bg-warning"><i class="fa fa-tasks"></i><b>&nbsp;Kegiatan</b></label>
        </div>
        <?php 
          $Kegiatan = array('Menduduki jabatan pimpinan pada lembaga pemerintahan/pejabat negara yang harus dibebaskan dari jabatan organiknya tiap semester',
          'Melaksanakan pengembangan hasil pendidikan, dan penelitian yang dapat dimanfaatkan oleh masyarakat/industry setiap program',
          'Memberi latihan/penyuluhan/penataran/narasumber/instruktur/ceramah pada masyarakat, terjadwal/terprogram',
          'Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas pemerintahan dan pembangunan',
          'Membuat/menulis karya pengabdian pada masyarakat',
          'Hasil kegiatan pengabdian kepada masyarakat yang dipublikasikan di sebuah jurnal/teknologi tepat guna, merupakan diseminasi dari luaran program kegiatan pengabdian kepada masyarakat, tiap karya',
          'Berperan serta aktif dalam pengelolaan jurnal ilmiah (per tahun)');
        ?>
        <select class="custom-select" id="IdKegiatanPengabdian">
          <?php $Id = 1; foreach ($Kegiatan as $key) { $ID = 'PNB'.$Id;?>
            <option value="<?='PNB'.$Id++?>" <?php if ($this->session->userdata('IdKegiatanPengabdian') == $ID) {
              echo 'selected';
            } ?>><?=$key?></option>
          <?php } ?>
          <option value="PNB8" <?php if ($this->session->userdata('IdKegiatanPengabdian') == "PNB8") {
              echo 'selected';
            } ?>>Suatu kegiatan yang setara dengan 50 jam kerja per semester(disetujui pimpinan & tercatat)</option>
          <option value="PNB9" <?php if ($this->session->userdata('IdKegiatanPengabdian') == "PNB9") {
              echo 'selected';
            } ?>>Reviewer insidental kegiatan(Bedah buku,tim penilai pustakawan/dosen/mahasiswa/karyawan/laboran berprestasi,reviewer artikel ilmiah,hibah pengajaran) </option>
          <option value="PNB10" <?php if ($this->session->userdata('IdKegiatanPengabdian') == "PNB10") {
              echo 'selected';
            } ?>>Reviewer terstruktur (minimal 2 semester) </option>  
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
              <button LihatBukti="<?=base_url('Pengabdian/'.$key['Bukti'])?>" class="btn btn-sm btn-primary LihatBukti"><i class="fas fa-download"></i></button>
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
<div class="modal fade" id="InputRealisasiPengabdian">
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
                <select class="custom-select" id="InputIdKegiatanPengabdian" onchange="InputIdKegiatanPengabdian()">
                <?php $Id = 1; foreach ($Kegiatan as $key) { ?>
                    <option value="<?='PNB'.$Id++?>"><?=$key?></option>
                  <?php } ?>
                  <option value="PNB8">Suatu kegiatan yang setara dengan 50 jam kerja per semester(disetujui pimpinan & tercatat)</option>
                <option value="PNB9">Reviewer insidental kegiatan(Bedah buku,tim penilai pustakawan/dosen/mahasiswa/karyawan/laboran berprestasi,reviewer artikel ilmiah,hibah pengajaran)</option>
                <option value="PNB10">Reviewer terstruktur (minimal 2 semester) </option>  
                </select>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNB3" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Tingkat</b></span>
                  </div>
                  <select class="custom-select" id="Tingkat">
                    <option value="1">Dalam 1 semester/lebih Tingkat Internasional tiap program</option>
                    <option value="2">Dalam 1 semester/lebih Tingkat Nasional tiap program</option>
                    <option value="3">Dalam 1 semester/lebih Tingkat Lokal tiap program</option>
                    <option value="4">Kurang dari 1 semester dan minimal 1 bulan Tingkat Internasional tiap program</option>
                    <option value="5">Kurang dari 1 semester dan minimal 1 bulan Tingkat Nasional tiap program</option>
                    <option value="6">Kurang dari 1 semester dan minimal 1 bulan Tingkat Lokal tiap program</option>
                    <option value="7">Kurang dari 1 semester dan minimal 1 bulan Insidental tiap program</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNB4" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Dasar</b></span>
                  </div>
                  <select class="custom-select" id="Dasar">
                    <option value="1">Berdasarkan bidang keahlian, tiap program</option>
                    <option value="2">Berdasarkan penugasan lembaga perguruan tinggi, tiap program</option>
                    <option value="3">Berdasarkan fungsi/jabatan tiap program</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNB5" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Jenis</b></span>
                  </div>
                  <select class="custom-select" id="JenisPNB5">
                    <option value="3">Publikasi Ber ISBN</option>
                    <option value="2">Tidak Dipublikasi</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNB7" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Peran</b></span>
                  </div>
                  <select class="custom-select" id="Peran">
                    <option value="1">Editor/dewan penyunting/dewan redaksi jurnal ilmiah internasional</option>
                    <option value="2">Editor/dewan penyunting/dewan redaksi jurnal ilmiah nasional</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNB8" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Progres</b></span>
                  </div>
                  <select class="custom-select" id="Proposal">
                    <option value="0.2">Proposal Pengabdian</option>
                    <option value="0.3">Persiapan Pengabdian</option>
                    <option value="0.7">Pelaksanaan kegiatan</option>
                    <option value="1">Penulisan laporan</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiPNB10" style="display: none;">
                <div class="input-group input-group-sm mb-1">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary"><b>Tingkat</b></span>
                  </div>
                  <select class="custom-select" id="TingkatPNB10">
                    <option value="0.5">Lokal</option>
                    <option value="1">Nasional</option>
                    <option value="1.5">Internasional</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div id="OpsiSumberPembiayaan" style="display: none;">
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
        <button type="submit" class="btn btn-success" id="TambahRealisasiPengabdian"><b>Simpan</b></button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="EditRealisasiPengabdian">
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
        <button type="submit" class="btn btn-success" id="UpdateRealisasiPengabdian"><b>Simpan</b></button>
      </div>
    </div>
  </div>
</div>