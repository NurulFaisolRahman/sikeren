<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="<?=base_url('img/favicon.ico')?>" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=base_url('bootstrap/css/bootstrap.min.css')?>">
    <title>Evaluasi PBM</title>
    <style type="text/css">
      #Opsi {
        color: #FF0000;text-shadow: -0.7px -0.7px 0 #fff, 0.7px -0.7px 0 #fff, -0.7px 0.7px 0 #fff, 0.7px 0.7px 0 #fff;
      }
    </style>
  </head>
  <body>
  <?php $MK = array('SMT 1 - PENGANTAR AKUNTANSI I','SMT 1 - BAHASA INGGRIS EKONOMI',
                    'SMT 1 - MATEMATIKA EKONOMI I','SMT 1 - MENTALITAS',
                    'SMT 1 - PENDIDIKAN KEWARGANEGARAAN','SMT 1 - PENGANTAR TEORI EKONOMI MAKRO',
                    'SMT 1 - PENGANTAR TEORI EKONOMI MIKRO','SMT 1 - PENDIDIKAN AGAMA ISLAM',
                    'SMT 1 - PENDIDIKAN AGAMA KRISTEN','SMT 1 - PENDIDIKAN AGAMA KATHOLIK',
                    'SMT 1 - PENDIDIKAN AGAMA HINDU','SMT 1 - PENDIDIKAN AGAMA BUDHA',
                    'SMT 1 - PENDIDIKAN AGAMA KHONGHUCHU','SMT 2 - MATEMATIKA EKONOMI II',
                    'SMT 2 - PENGANTAR MANAJEMEN DAN BISNIS','SMT 2 - SEJARAH PEMIKIRAN EKONOMI',
                    'SMT 2 - SOSIOLOGI KRITIS','SMT 2 - STATISTIK I',
                    'SMT 2 - TEORI EKONOMI MAKRO I','SMT 2 - TEORI EKONOMI MIKRO I',
                    'SMT 2 - BAHASA INDONESIA','SMT 3 - ASPEK HUKUM BISNIS',
                    'SMT 3 - EKONOMI KEPENDUDUKAN','SMT 3 - EKONOMI SDA DAN LINGKUNGAN',
                    'SMT 3 - PENGANTAR EKONOMI PEMBANGUNAN','SMT 3 - STATISTIK II',
                    'SMT 3 - TEORI EKONOMI MAKRO II','SMT 3 - TEORI EKONOMI MIKRO II',
                    'SMT 3 - KOPERASI DAN KEWIRAUSAHAAN','SMT 3 - ISLAM DAN EKONOMI',
                    'SMT 4 - APLIKASI KOMPUTASI EKONOMI','SMT 4 - EKONOMI INDUSTRI',
                    'SMT 4 - EKONOMI MONETER','SMT 4 - EKONOMI PEMBANGUNAN',
                    'SMT 4 - EKONOMI PUBLIK','SMT 4 - ESDM DAN KETENAGAKERJAAN',
                    'SMT 4 - MASALAH DAN KEBIJAKAN PEMBANGUNAN','SMT 5 - BANK DAN LEMBAGA KEUANGAN',
                    'SMT 5 - METODOLOGI PENELITIAN','SMT 5 - PEREKONOMIAN INDONESIA',
                    'SMT 5 - PERENCANAAN PEMBANGUNAN','SMT 5 - EKONOMI KELEMBAGAAN',
                    'SMT 5 - EKONOMI MONETER LANJUTAN (KONS. MONETER DAN PERBANKAN)','SMT 5 - STUDI KEBANKSENTRALAN (KONS. EK MONETER DAN PERBANKAN)',
                    'SMT 5 - EKONOMI REGIONAL (KONS. PERENCANAAN PEMBANGUNAN)','SMT 5 - KEUANGAN DAERAH (KONS PERENCANAAN PEMBANGUNAN)',
                    'SMT 5 - KEUANGAN DAERAH (KONS EK PUBLIK)','SMT 5 - EKONOMI PUBLIK LANJUTAN (KONS EK. PUBLIK)',
                    'SMT 6 - EKONOMETRIKA','SMT 6 - EKONOMI INTERNASIONAL',
                    'SMT 6 - EKONOMI PERKOTAAN DAN TRANSPORTASI','SMT 6 - EVALUASI PROYEK',
                    'SMT 6 - MANAJEMEN KEUANGAN DAERAH (KONS PERENCANAAN PEMBANGUNAN)','SMT 6 - PERENCANAAN STRATEGIS (KONS PERENCANAAN PEMBANGUNAN)',
                    'SMT 6 - ANALISA PASAR KEUANGAN (KONS MONETER DAN PERBANKAN)','SMT 6 - EKONOMI PERBANKAN (KONS MONETER DAN PERBANKAN)',
                    'SMT 6 - ANALISA KEBUTUHAN PUBLIK (KONS EK PUBLIK)','SMT 6 - PENGANGGARAN SEKTOR PUBLIK (KONS EK PUBLIK)',
                    'SMT 7 - SEMINAR EKONOMI MONETER DAN PERBANKAN (KONS EK. MONETER DAN PERBANKAN)','SMT 7 - SEMINAR PERENCANAAN PEMBANGUNAN (KONS PERENCANAAN PEMBANGUNAN)',
                    'SMT 7 - SEMINAR EKONOMI PUBLIK (KONS EK PUBLIK)','SMT 7 - EKONOMI POLITIK (MATKUL PILIHAN)',
                    'SMT 7 - EKONOMI PERDESAAN DAN PERTANIAN (MATKUL PILIHAN)','SMT 7 - EKONOMI MONETER INTERNASIONAL (MATKUL PILIHAN)',
                    'SMT 7 - ISLAM DAN EKONOMI (MATKUL PILIHAN)','SMT 7 - BADAN LEMBAGA KEUANGAN SYARIAH (MATKUL PILIHAN)','SMT 7 - KKN'); 
        $Dosen = array('ABDUR ROHMAN, S. Ag, MEI, Dr.','ACHDIAR REDY SETIAWAN, S.E., MSA., Ak., CA','ADI DARMAWAN ERVANTO,S.E.,M.A.,Ak.,CA',
                        'AHMAD KAMIL, S.E., M.Ec. Dev','AHMAD MUZAWWIR S, M.Pd.I','ALEXANDER ANGGONO, SE., M.Si., Ph.D',
                        'ALVIN S. PRASETYO, S.E., M.SE.','ATIK EMILIA SULA, S.E., M.Ak.','ALIFAH ROKHMAH IDIALIS, SE., M.Sc',
                        'ANDRI WIJANARKO, SE, ME','ALVIN SUGENG PRASETYO, S.E., M.SE.','ANIS WULANDARI, SE., MSA., AK.,CA',
                        'ANITA CAROLINA, SE., MBusAdv., AK., QIA.,CA','ANITA KRISTINA, S.E., M.Si ,Dr.','ANUGRAHINI IRAWATI, Dra., MM',
                        'APRILINA SUSANDINI, SE., MSM','ARDI HAMZAH, SE., MSI., AK','ARIE SETYO DWI PURNOMO S.PD., M.SC.',
                        'BAMBANG HARYADI, DR. SE., MSI., AK.,CA','BAMBANG SUDARSONO, Drs., M.M','BONDAN SATRIAWAN, SE., M.Econ, ST',
                        'BOY SINGGIH GITAYUDA, S.E.,MM','CITRA NURHAYATI, SE., MA., Ak., CA','CHAIRUL ANAM, Drs Ec., M.Kes, Dr.',
                        'CITRA LUTFIA, S.E., M.A.','CRISANTY SUTRITYANINGTYAS TITIK, S.E., M.E.',
                        'DIAH WAHYUNINGSIH, S.E., M.Si ,Dr.','ECHSAN GANI, SE., M.Si','EMI RAHMAWATI, SE., MSI',
                        'ENI SRI RAHAYUNINGSIH, S.E., M.E, Dr.','ERFAN MUHAMMAD, S.E., M.Ak., CPA','EVALIATI AMANIYAH, SE., MSM',
                        'FAIDAL S.E., M.M','FARIYANA KUSUMAWATI, SE., MSI','FATHOR AS, SE., MM',
                        'FITRI AHMAD KURNIAWAN, SE, M.AK, AK, CA','FRIDA FANANI ROHMA, S.AKUN., M.SC.','GATOT HERU PRANJOTO, SE., MM',
                        'GITA ARASY HARWIDA, SE., MTax., AK., QIA.,CA','HABIBULLAH, S.E., M.Akun','HADI PURNOMO, SE.,MM',
                        'HANIF YUSUF SEPUTRO S.PD., M.AK.','HELMI BUYUNG AULIA SAFRIZAL, ST.,SE.,MMT','HENNY OKTAVIANTI, SE., M.Si.',
                        'HERY PURWANTO, S.PT., ME.','HERRY YULISTIYO, SE., M.Si','IMAM AGUS FAISOL, SE., M.Ak',
                        'DARUL ISLAM, S.E., M.M.','IRIANI ISMAIL, Dra., M.M., Dr.','JAKFAR SADIK, SE., ME',
                        'JUNAIDI, SE., MSI., AK.,CA','KHYSH NUSRI LEAPATRA CHAMALINDA , S.E., M.Akun','KURNIYATI INDAHSARI, M.Si, Dr.',
                        'MERIE SATYA ANGRAINI, S.E., M. AK.','MOCHAMAD REZA ADIYANTO S.P., M.M.','MOHAMAD TAMBRIN, Drs., MM',
                        'MOHAMMAD ARIEF, S.E., M.M., Dr.','MOHAMMAD YASKUN, S.E., M.M.','MOHTAR RASYID, S.E., M.Si, Dr.',
                        'MUDJI KUSWINARNO, Drs. Ec., M.Si','MUH. SYARIF, Drs. Ec, M.Si, Dr.','MUHAMMAD ALKIROM WILDAN, S.E., M.Si. Dr.',
                        "MUHAMMAD ASIM ASY'ARI SE.,M.Ak.",'MUHAMMAD SYAM KUSUFI, S.E., M.Sc.','MUHAMMAD ZAINURI, Ir., M. Sc., Prof. Dr.',
                        'MUKHAMMAD BAHKRUDDIN, M.Pd. I','NIZARUL ALIM, SE., M.Si., Ak,Prof. Dr.','NORITA VIBRIYANTO, S.E, M.Si',
                        'NUR AZIZAH, SE., MM','NURITA ANDRIANI, Ir., M.M., Dr.','NUR HAYATI, S.E., MSA., Ak.,DR QIA., CA',
                        'PRASETYO NUGROHO, S.Pi.,MM','PRASETYONO, SE., MSI., AK, Dr.','PRIBANUS WANTARA, Drs.,MM, Dr.',
                        'PURNAMAWATI, SE, M.Si','RAHAYU DEWI ZAKIYAH RF, S.E., M.AKUN.','RIFAI AFIN, S.E, M.Sc',
                        'RIS YUWONO YUDHO NUGROHO, S.E., M.Si','RITA YULIANA, SE., M.SA., Ak., CA, Dr.','RM. MOCH. WISPANDONO, S.E., M.S, Dr.',
                        'ROBIATUL AULIYAH, SE, MSA','R. JOHNNY HADI RAHARJO, SE., MM','SANIMAN, SE., M.PSDM',
                        'SARIYANI, S.E., M.SE.','SELAMET JOKO U, SE., ME','SITI MUSYAROFAH, SE., M.Si., Ak, Dr.',
                        'SUMARTO, S.E., M.E','SUTIKNO, S.E., M.E, Dr.','SUYONO, S.E.,M.S.M',
                        'SAMSUKI, S.E., M.SM.','TARJO, S.E, M.Si, Dr., CFE','TITO IM. RAHMAN HAKIM, S.E., M.S.A.',
                        "TITOV CHUK'S MAYVANI, SE., ME",'USWATUN HASANAH, S.E.,M.Sc','MIFTAHUL JANNAH, S.E., M.SC',
                        'YAHYA SURYA WINATA, S.E., M.Si, Dr.','YUDHI PRASETYA MADA, SE., MM','YUFITA, S.E., M.E.',
                        'YUNI RIMAWATI, SE., MSAk.,Ak.,CA','YUSTINA CHRISMARDANI, S.Si., MM','VIDI HADYARTI, S.M., M.M.',
                        'WIDITA KURNIASARI, S.E., M.E,DR','ZAKIK, SE., M.Si');
  ?>
  <?php $Question = array('1. Seberapa jelas rencana pembelajaran / kontrak? <span id="Opsi">(1) Tidak Pernah Dijelaskan (2) Dijelaskan Dengan Lisan (3) Dijelaskan Tertulis dibahan Kuliah (4) Dijelaskan Tertulis, Tercetak dan Dibagikan<span>',
                          '2. Apakah rencana pembelajaran / kontrak tersebut terlaksana dengan baik? <span id="Opsi">(1) Tidak Tahu Karena tidak dijelaskan (2) Terlaksana < 50% (3) Terlaksana 50% - 80% (4) Terlaksana ≥ 80%',
                          '3. Ketepatan waktu mulai dan mengakhiri kuliah (kedisiplinan)? <span id="Opsi">(1) Selalu tidak tepat waktu (2) Jarang tepat waktu (3) Sering tepat waktu (4) (hampir) selalu tepat waktu',
                          '4. Kejelasan penyampaian materi dan jawaban terhadap pertanyaan di kelas? <span id="Opsi">(1) Sangat tidak jelas (2) Tidak jelas (3) Jelas (4) Sangat jelas',
                          '5. Rata-rata lama diskusi / kerja kelompok / praktek / presentasi mahasiswa? <span id="Opsi">(1) Sangat sedikit < 10% (2) Sedikit 10% - 30% (3) Banyak 30% - 40% (4) Sangat banyak ≥ 40%',
                          '6. Intensitas pemberian tugas? <span id="Opsi">(1) Sangat sedikit < 20% pertemuan (2) Sedikit 20% - 50% petemuan (3) Banyak 50% - 80% pertemuan (4) Sangat banyak ≥ 80% pertemuan',
                          '7. Seberapa besar manfaat tugas yg diberikan? <span id="Opsi">(1) Sangat tidak bermanfaat (2) Sedikit menambah kemampuan (3) Banyak menambah kemampuan (4) Sangat banyak menambah kemampuan',
                          '8. Apakah ada pembahasan terhadap tugas yang diberikan? <span id="Opsi">(1) Tidak pernah dibahas (2) Dibahas secara umum (3) Dibahas secara rinci (4) Dibahas, tugas dikoreksi, dikembalikan',
                          '9. Kesesuaian materi ujian dan atau tugas dengan materi kuliah? <span id="Opsi">(1) Tidak sesuai sama sekali (2) Yang sesuai < 50% (3) Yang sesuai 50% - 80% (4) Sangat sesuai ≥ 80% sesuai',
                          '10. Transparansi / objektifitas sistem penilaian yang diberikan dosen? <span id="Opsi">(1) Sangat Tidak transparan (2) Tidak transparan / objektif (3) Transparan / objektif (4) Sangat transparan dan objektif',
                          '11. Seberapa banyak Anda mendapat materi dari jurnal / hasil penelitian / informasi baru / konteks nyata saat ini? <span id="Opsi">(1) Sangat Kurang (2) Kurang (3) Banyak (4) Sangat banyak',
                          '12. Penguasaan dosen akan isu-isu mutakhir dalam bidang yang diajarkan? <span id="Opsi">(1) Sangat Kurang (2) Kurang (3) Banyak (4) Sangat banyak',
                          '13. Kemampuan menerima kritik, saran, dan pendapat orang lain? <span id="Opsi">(1) Sangat tidak bisa menerima (2) Tidak bisa menerima (3) Bisa menerima (4) Sangat bisa menerima (Terbuka)',
                          '14. Kesabaran, kemampuan menahan emosi saat mengajar / mendidik? <span id="Opsi">(1) Sangat tidak sabar (2) Tidak sabar (3) Sabar (4) Sangat sabar',
                          '15. Kemampuan dosen meningkatkan motivasi / minat belajar mahasiswa? <span id="Opsi">(1) Sangat tidak bisa memotivasi (2) Tidak bisa memotivasi (3) Mudah memotivasi (4) Sangat memotivasi',
                          '16. Bagaimana Kejelasan Penyampaian materi melalui daring? <span id="Opsi">(1) Sangat Kurang Jelas (2) Kurang Jelas (3) Cukup Jelas (4) Sangat Jelas',
                          '17. Rencana Pembelajaran terlaksana dengan Baik? <span id="Opsi">(1) Sangat Kurang Terlaksana (2) Terlaksana < 50% (3) Terlaksana > 50% (4) Terlaksana > 80%',
                          '18. Intensitas Pemberian tugas Selama LFH (Learn From Home)? <span id="Opsi">(1) Sangat Kurang (2) Kurang (3) Cukup (4) Sangat Cukup',
                          '20. Perlengkapan kuliah (Bangku, papan tulis, spidol, penghapus, kipas angin, LCD)? <span id="Opsi">(1) Sangat kurang (2) Kurang (3) Memadai (4) Sangat Memadai',
                          '21. Kondisi ruang kuliah (kerapian, kebersihan, penerangan, ketenangan, dan kenyamanan)? <span id="Opsi">(1) Sangat kurang (2) Kurang (3) Memadai (4) Sangat Memadai',
                          '22. Layanan petugas administrasi (daftar hadir dan kunci ruangan)? <span id="Opsi">(1) Sangat kurang (2) Kurang (3) Memadai (4) Sangat Memadai',
                          '23. Layanan perpustakaan dan/atau ruang baca FE? <span id="Opsi">(1) Sangat kurang (2) Kurang (3) Memadai (4) Sangat Memadai',
                          '24. Kondisi toilet ? <span id="Opsi">(1) Sangat kurang (2) Kurang (3) Memadai (4) Sangat Memadai',
                          '25. Layanan pengumuman / informasi? <span id="Opsi">(1) Sangat kurang (2) Kurang (3) Memadai (4) Sangat Memadai',
                          '26. Layanan wifi ? <span id="Opsi">(1) Sangat kurang (2) Kurang (3) Memadai (4) Sangat Memadai',
                          '27. Penyediaan / Ketersediaan berita acara dan presensi perkuliahan? <span id="Opsi">(1) Sangat kurang (2) Kurang (3) Memadai (4) Sangat Memadai',
                          '28. Penyediaan kelengkapan administrasi UTS / UAS? <span id="Opsi">(1) Sangat kurang (2) Kurang (3) Memadai (4) Sangat Memadai',
                          '29. Kecepatan Pelayanan administrasi oleh petugas? <span id="Opsi">(1) Sangat kurang (2) Kurang (3) Memadai (4) Sangat Memadai',
                          '30. Keramahan dalam pelayanan administrasi akademik? <span id="Opsi">(1) Sangat kurang (2) Kurang (3) Memadai (4) Sangat Memadai',
                          '31. Berapa rata-rata penggunaan paket data setiap pertemuan perkuliahan? <span id="Opsi">(1) 100 Mb - 200 Mb (2) 200 Mb - 500 Mb (3) 500 mb - 1 Gb (4) 1 Gb'); 
  ?>
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <div class="card my-1 bg-danger">
            <div class="card-body p-2 text-light">
              <p class="font-weight-bold" style="font-size: 25px;">Evaluasi Proses Belajar Mengajar S1 Ekonomi Pembangunan Semester Ganjil 2020/2021</p>
              <p class="text-justify">Berilah penilaian secara jujur, objektif, dan penuh tanggung jawab terhadap dosen Saudara. Informasi yang Saudara berikan hanya akan dipergunakan dalam proses PBM dan tidak akan berpengaruh terhadap nilai akhir mata kuliah yang Anda tempuh.</p>
              <p class="text-justify font-weight-bold">SEMUA PERTANYAAN WAJIB DI ISI *</p>
              <div class="row">
                <div class="col-lg-3 col-sm-12 my-1">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <label class="input-group-text bg-primary text-light"><b>NIM</b></label>
                    </div>
                    <input class="form-control form-control-sm" type="text" id="NIM" data-inputmask='"mask": "999999999999"' data-mask>
                  </div>
                </div>
                <div class="col-lg-5 col-sm-12 my-1">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <label class="input-group-text bg-primary text-light"><b>Nama</b></label>
                    </div>
                    <input class="form-control form-control-sm" type="text" id="Nama">
                  </div>
                </div>
                <div class="col-lg-4 col-sm-12 my-1">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <label class="input-group-text bg-primary text-light"><b>Semester</b></label>
                    </div>
                    <select class="custom-select custom-select-sm" id="Semester">										
                      <option value="1">Semester 1</option>
                      <option value="2">Semester 2</option>
                      <option value="3">Semester 3</option>
                      <option value="4">Semester 4</option>
                      <option value="5">Semester 5</option>
                      <option value="6">Semester 6</option>
                      <option value="7">Semester 7</option>
                      <option value="8">Semester 8</option>
                      <option value="9">Semester 9</option>
                      <option value="10">Semester 10</option>
                      <option value="11">Semester 11</option>
                      <option value="12">Semester 12</option>
                      <option value="13">Semester 13</option>
                      <option value="14">Semester 14</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-12 col-sm-12 my-1">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <label class="input-group-text bg-primary text-light"><b>Mata Kuliah</b></label>
                    </div>
                    <select class="custom-select custom-select-sm" id="MataKuliah">	
                      <?php for ($i=0; $i < count($MK); $i++) { ?>
                        <option value="<?=$MK[$i]?>"><?=$MK[$i]?></option>
                      <?php } ?>									
                    </select>
                  </div>
                </div>
                <div class="col-sm-12 my-1">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <label class="input-group-text bg-primary text-light"><b>Dosen Yang Mengajar</b></label>
                    </div>
                    <select class="custom-select custom-select-sm" id="JumlahDosen">
                      <option value="1">1 Dosen</option>	
                      <option value="2">2 Dosen</option>
                      <option value="3">3 Dosen</option>
                      <option value="4">4 Dosen</option>
                    </select>
                  </div>
                </div>
                <div class="container-fluid" id="DaftarDosen">
                  <?php for ($j=1; $j <= 1; $j++) { ?>
                    <div class="row">
                      <div class="col-lg-6 col-sm-12 my-1">
                        <div class="input-group input-group-sm">
                          <div class="input-group-prepend">
                            <label class="input-group-text bg-primary text-light"><b>Dosen <?=$j?></b></label>
                          </div>
                          <select class="custom-select custom-select-sm" id="Dosen<?=$j?>">
                            <option value="Lain">Pilih Dosen <?=$j?></option>	
                            <?php for ($i=0; $i < count($Dosen); $i++) { ?>
                              <option value="<?=$Dosen[$i]?>"><?=$Dosen[$i]?></option>
                            <?php } ?>									
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-6 col-sm-12 my-1">
                        <div class="input-group input-group-sm">
                          <input class="form-control form-control-sm" type="text" id="Dosen<?=$j?>Lain" placeholder="Sebutkan Jika Dosen Yang Lain">
                        </div>
                      </div>
                    </div>
                  <?php } ?>									
                </div>
                <?php for ($i=0; $i < 18; $i++) { ?>
                  <div class="col-lg-12 col-sm-12 my-1">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                        <label class="input-group-text bg-primary text-light text-wrap text-left"><b><?=$Question[$i]?></b></label>
                      </div>
                    </div>
                  </div>
                  <div class="container-fluid" id="NilaiDosen<?=$i?>">
                    <div class="row">
                      <?php for ($k=1; $k <= 1; $k++) { ?>
                        <div class="col-lg-auto col-sm-12 my-1">
                          <div class="input-group input-group-sm d-flex justify-content-center">
                            <div class="input-group-prepend">
                              <label class="input-group-text bg-primary text-light"><b>Nilai Untuk Dosen <?=$k?></b></label>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-auto col-sm-12 d-flex align-items-center my-1">
                          <div class="input-group input-group-sm d-flex justify-content-center">
                            <?php for ($j=1; $j < 5; $j++) { ?>
                              <div class="form-check form-check-inline mx-3">
                                <input class="form-check-input" type="radio" name="Input<?=$i.$k?>" id="I<?=$i.$j.$k?>" value="<?=$j?>">
                                <label class="form-check-label font-weight-bold" for="I<?=$i.$j.$k?>"><?=$j?></label>
                              </div>
                            <?php } ?>
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                  </div> 
                <?php } ?>
                <div class="col-sm-12 my-1">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <label class="input-group-text bg-primary text-light text-wrap text-left"><b>19. Penggunaan Aplikasi Pembelajaran Dalam Mata Kuliah Ini? <span id="Opsi">(Bisa Pilih Lebih dari satu jawaban)</span></b></label>
                    </div>
                  </div>
                </div>
                <div class="container-fluid" id="AplikasiDosen">
                  <div class="row">
                    <?php for ($k=1; $k <= 1; $k++) { ?>
                      <div class="col-lg-auto col-sm-12 my-1">
                        <div class="input-group input-group-sm d-flex justify-content-center">
                          <div class="input-group-prepend">
                            <label class="input-group-text bg-primary text-light"><b>Aplikasi Yang Digunakan Dosen <?=$k?></b></label>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 my-1">
                        <?php $App = array('WA Grup','Edmodo','Google Class','Schoology','Youtube','Zoom Cloud Meeting','Google Meet'); ?>
                        <?php for ($j=0; $j < count($App); $j++) { ?>
                          <div class="form-check my-2 ml-3">
                            <input class="form-check-input" type="checkbox" value="<?=$App[$j]?>" name="App<?=$k?>" id="App<?=$k.$j?>">
                            <label class="form-check-label" for="App<?=$k.$j?>"><?=$App[$j]?></label>
                          </div>
                        <?php } ?>
                      </div>
                      <div class="col-lg-6 col-sm-12 mb-2 ml-3">
                        <div class="input-group input-group-sm">
                          <input class="form-control form-control-sm" type="text" id="AppLain<?=$k?>" placeholder="Sebutkan Jika Ada Aplikasi Lainnya">
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div> 
                <?php for ($i=18; $i < count($Question); $i++) { ?>
                  <div class="col-lg-12 col-sm-12 my-1">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend">
                        <label class="input-group-text bg-primary text-light text-wrap text-left"><b><?=$Question[$i]?></b></label>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-auto col-sm-12 d-flex align-items-center my-1">
                    <div class="input-group input-group-sm d-flex justify-content-center">
                      <?php for ($j=1; $j < 5; $j++) { ?>
                        <div class="form-check form-check-inline mx-3">
                          <input class="form-check-input" type="radio" name="PBM<?=$i?>" id="PBM<?=$i.$j?>" value="<?=$j?>">
                          <label class="form-check-label font-weight-bold" for="PBM<?=$i.$j?>"><?=$j?></label>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="col-4"></div>
                <?php } ?>
                <div class="col-sm-12 my-1">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <label class="input-group-text bg-primary text-light text-wrap text-left"><b>32. Kendala Dalam Penggunaan Metode Daring? (Bisa Pilih Lebih dari satu jawaban)</b></label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 my-1">
                  <?php $Kendala = array('Kondisi Signal / Jaringan Seluler','Biaya Paket Data','Kapasitas Handphone'); ?>
                  <?php for ($j=0; $j < count($Kendala); $j++) { ?>
                    <div class="form-check my-2 ml-3">
                      <input class="form-check-input" type="checkbox" value="<?=$Kendala[$j]?>" name="Kendala" id="Kendala<?=$j?>">
                      <label class="form-check-label" for="Kendala<?=$j?>"><?=$Kendala[$j]?></label>
                    </div>
                  <?php } ?>
                </div>
                <div class="col-lg-6 col-sm-12 mb-2 ml-3">
                  <div class="input-group input-group-sm">
                    <input class="form-control form-control-sm" type="text" id="KendalaLain" placeholder="Sebutkan Jika Ada Kendala Lainnya">
                  </div>
                </div>
                <div class="col-lg-12 col-sm-12 my-1">
                  <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                      <label class="input-group-text bg-primary text-light text-wrap text-left"><b>33. Mohon menuliskan saran bagi pengembangan proses belajar mengajar di FEB UTM</b></label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 my-1">
                  <div class="form-group">
                    <textarea class="form-control" id="Saran" rows="2"></textarea>
                  </div>
                </div>
                <div class="col-12 my-1">
                  <button type="button" class="btn btn-primary" id="Kirim"><b>Kirim</b></button>
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
    <script src="<?=base_url('bootstrap/inputmask/min/jquery.inputmask.bundle.min.js')?>"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('[data-mask]').inputmask()
        var BaseURL = '<?=base_url()?>'
        var Dosen = ['ABDUR ROHMAN, S. Ag, MEI, Dr.','ACHDIAR REDY SETIAWAN, S.E., MSA., Ak., CA','ADI DARMAWAN ERVANTO,S.E.,M.A.,Ak.,CA',
                        'AHMAD KAMIL, S.E., M.Ec. Dev','AHMAD MUZAWWIR S, M.Pd.I','ALEXANDER ANGGONO, SE., M.Si., Ph.D',
                        'ALVIN S. PRASETYO, S.E., M.SE.','ATIK EMILIA SULA, S.E., M.Ak.','ALIFAH ROKHMAH IDIALIS, SE., M.Sc',
                        'ANDRI WIJANARKO, SE, ME','ALVIN SUGENG PRASETYO, S.E., M.SE.','ANIS WULANDARI, SE., MSA., AK.,CA',
                        'ANITA CAROLINA, SE., MBusAdv., AK., QIA.,CA','ANITA KRISTINA, S.E., M.Si ,Dr.','ANUGRAHINI IRAWATI, Dra., MM',
                        'APRILINA SUSANDINI, SE., MSM','ARDI HAMZAH, SE., MSI., AK','ARIE SETYO DWI PURNOMO S.PD., M.SC.',
                        'BAMBANG HARYADI, DR. SE., MSI., AK.,CA','BAMBANG SUDARSONO, Drs., M.M','BONDAN SATRIAWAN, SE., M.Econ, ST',
                        'BOY SINGGIH GITAYUDA, S.E.,MM','CITRA NURHAYATI, SE., MA., Ak., CA','CHAIRUL ANAM, Drs Ec., M.Kes, Dr.',
                        'CITRA LUTFIA, S.E., M.A.','CRISANTY SUTRITYANINGTYAS TITIK, S.E., M.E.',
                        'DIAH WAHYUNINGSIH, S.E., M.Si ,Dr.','ECHSAN GANI, SE., M.Si','EMI RAHMAWATI, SE., MSI',
                        'ENI SRI RAHAYUNINGSIH, S.E., M.E, Dr.','ERFAN MUHAMMAD, S.E., M.Ak., CPA','EVALIATI AMANIYAH, SE., MSM',
                        'FAIDAL S.E., M.M','FARIYANA KUSUMAWATI, SE., MSI','FATHOR AS, SE., MM',
                        'FITRI AHMAD KURNIAWAN, SE, M.AK, AK, CA','FRIDA FANANI ROHMA, S.AKUN., M.SC.','GATOT HERU PRANJOTO, SE., MM',
                        'GITA ARASY HARWIDA, SE., MTax., AK., QIA.,CA','HABIBULLAH, S.E., M.Akun','HADI PURNOMO, SE.,MM',
                        'HANIF YUSUF SEPUTRO S.PD., M.AK.','HELMI BUYUNG AULIA SAFRIZAL, ST.,SE.,MMT','HENNY OKTAVIANTI, SE., M.Si.',
                        'HERY PURWANTO, S.PT., ME.','HERRY YULISTIYO, SE., M.Si','IMAM AGUS FAISOL, SE., M.Ak',
                        'DARUL ISLAM, S.E., M.M.','IRIANI ISMAIL, Dra., M.M., Dr.','JAKFAR SADIK, SE., ME',
                        'JUNAIDI, SE., MSI., AK.,CA','KHYSH NUSRI LEAPATRA CHAMALINDA , S.E., M.Akun','KURNIYATI INDAHSARI, M.Si, Dr.',
                        'MERIE SATYA ANGRAINI, S.E., M. AK.','MOCHAMAD REZA ADIYANTO S.P., M.M.','MOHAMAD TAMBRIN, Drs., MM',
                        'MOHAMMAD ARIEF, S.E., M.M., Dr.','MOHAMMAD YASKUN, S.E., M.M.','MOHTAR RASYID, S.E., M.Si, Dr.',
                        'MUDJI KUSWINARNO, Drs. Ec., M.Si','MUH. SYARIF, Drs. Ec, M.Si, Dr.','MUHAMMAD ALKIROM WILDAN, S.E., M.Si. Dr.',
                        "MUHAMMAD ASIM ASY'ARI SE.,M.Ak.",'MUHAMMAD SYAM KUSUFI, S.E., M.Sc.','MUHAMMAD ZAINURI, Ir., M. Sc., Prof. Dr.',
                        'MUKHAMMAD BAHKRUDDIN, M.Pd. I','NIZARUL ALIM, SE., M.Si., Ak,Prof. Dr.','NORITA VIBRIYANTO, S.E, M.Si',
                        'NUR AZIZAH, SE., MM','NURITA ANDRIANI, Ir., M.M., Dr.','NUR HAYATI, S.E., MSA., Ak.,DR QIA., CA',
                        'PRASETYO NUGROHO, S.Pi.,MM','PRASETYONO, SE., MSI., AK, Dr.','PRIBANUS WANTARA, Drs.,MM, Dr.',
                        'PURNAMAWATI, SE, M.Si','RAHAYU DEWI ZAKIYAH RF, S.E., M.AKUN.','RIFAI AFIN, S.E, M.Sc',
                        'RIS YUWONO YUDHO NUGROHO, S.E., M.Si','RITA YULIANA, SE., M.SA., Ak., CA, Dr.','RM. MOCH. WISPANDONO, S.E., M.S, Dr.',
                        'ROBIATUL AULIYAH, SE, MSA','R. JOHNNY HADI RAHARJO, SE., MM','SANIMAN, SE., M.PSDM',
                        'SARIYANI, S.E., M.SE.','SELAMET JOKO U, SE., ME','SITI MUSYAROFAH, SE., M.Si., Ak, Dr.',
                        'SUMARTO, S.E., M.E','SUTIKNO, S.E., M.E, Dr.','SUYONO, S.E.,M.S.M',
                        'SAMSUKI, S.E., M.SM.','TARJO, S.E, M.Si, Dr., CFE','TITO IM. RAHMAN HAKIM, S.E., M.S.A.',
                        "TITOV CHUK'S MAYVANI, SE., ME",'USWATUN HASANAH, S.E.,M.Sc','MIFTAHUL JANNAH, S.E., M.SC',
                        'YAHYA SURYA WINATA, S.E., M.Si, Dr.','YUDHI PRASETYA MADA, SE., MM','YUFITA, S.E., M.E.',
                        'YUNI RIMAWATI, SE., MSAk.,Ak.,CA','YUSTINA CHRISMARDANI, S.Si., MM','VIDI HADYARTI, S.M., M.M.',
                        'WIDITA KURNIASARI, S.E., M.E,DR','ZAKIK, SE., M.Si']
        var App = ['WA Grup','Edmodo','Google Class','Schoology','Youtube','Zoom Cloud Meeting','Google Meet']
        var JumlahDosen = $("#JumlahDosen").val()
        $("#JumlahDosen").change(function (){
          JumlahDosen = $("#JumlahDosen").val() 
          var DaftarDosen = ''
          for (let i = 1; i <= JumlahDosen; i++) {
            DaftarDosen += '<div class="row"><div class="col-lg-6 col-sm-12 my-1"><div class="input-group input-group-sm">'
            DaftarDosen += '<div class="input-group-prepend"><label class="input-group-text bg-primary text-light"><b>Dosen '+i+'</b></label></div>'
            DaftarDosen += '<select class="custom-select custom-select-sm" id="Dosen'+i+'"><option value="Lain">Pilih Dosen '+i+'</option>'
            for (let j = 0; j < Dosen.length; j++) {
              DaftarDosen += '<option value="'+Dosen[j]+'">'+Dosen[j]+'</option>'
            }
            DaftarDosen += '</select></div></div><div class="col-lg-6 col-sm-12 my-1"><div class="input-group input-group-sm">'
            DaftarDosen += '<input class="form-control form-control-sm" type="text" id="Dosen'+i+'Lain" placeholder="Sebutkan Jika Dosen Yang Lain">'
            DaftarDosen += '</div></div></div>'
          }
          $("#DaftarDosen").html(DaftarDosen)
          for (let k = 0; k < 18; k++) {
            var NilaiDosen = ''
            for (let i = 1; i <= JumlahDosen; i++) {
              NilaiDosen += '<div class="row"><div class="col-lg-auto col-sm-12 my-1"><div class="input-group input-group-sm d-flex justify-content-center">'
              NilaiDosen += '<div class="input-group-prepend"><label class="input-group-text bg-primary text-light"><b>Nilai Untuk Dosen '+i+'</b></label>'
              NilaiDosen += '</div></div></div><div class="col-lg-auto col-sm-12 d-flex align-items-center my-1"><div class="input-group input-group-sm d-flex justify-content-center">'
              for (let j = 1; j <= 4; j++) {
                NilaiDosen += '<div class="form-check form-check-inline mx-3">'
                NilaiDosen += '<input class="form-check-input" type="radio" name="Input'+k+i+'" id="I'+k+j+i+'" value="'+j+'">'
                NilaiDosen += '<label class="form-check-label font-weight-bold" for="I'+k+j+i+'">'+j+'</label></div>'
              }
              NilaiDosen += '</div></div></div>'
            }
            $("#NilaiDosen"+k).html(NilaiDosen)
          }
          var AplikasiDosen = ''
          for (let i = 1; i <= JumlahDosen; i++) {
            AplikasiDosen += '<div class="row"><div class="col-lg-auto col-sm-12 my-1"><div class="input-group input-group-sm d-flex justify-content-center">'
            AplikasiDosen += '<div class="input-group-prepend"><label class="input-group-text bg-primary text-light"><b>Aplikasi Yang Digunakan Dosen '+i+'</b></label>'
            AplikasiDosen += '</div></div></div><div class="col-sm-12 my-1">'
            for (let j = 0; j < App.length; j++) {
              AplikasiDosen += '<div class="form-check my-2 ml-3">'
              AplikasiDosen += '<input class="form-check-input" type="checkbox" value="'+App[j]+'" name="App'+i+'" id="App'+i+j+'">'
              AplikasiDosen += '<label class="form-check-label" for="App'+i+j+'">'+App[j]+'</label></div>'
            }
            AplikasiDosen += '</div><div class="col-lg-6 col-sm-12 mb-2 ml-3"><div class="input-group input-group-sm">'
            AplikasiDosen += '<input class="form-control form-control-sm" type="text" id="AppLain'+i+'" placeholder="Sebutkan Jika Ada Aplikasi Lainnya"></div></div></div>'
          }
          $("#AplikasiDosen").html(AplikasiDosen)
        })
        $("#Kirim").click(function() {
          if (isNaN($("#NIM").val()) || $("#NIM").val() === "") {
            alert('NIM Hanya Boleh 12 Digit Angka!')
          } else {
            DaftarDosen = ""
            if ($("#Dosen1").val()=="Lain" && $("#Dosen1Lain").val() == "") {
              alert("Input Dosen 1 Wajib Di Isi!")
              return true
            } else if ($("#Dosen1").val()=="Lain" || $("#Dosen1Lain").val() != "") {
              DaftarDosen += $("#Dosen1Lain").val()
            } else {
              DaftarDosen += $("#Dosen1").val()
            }
            if ($("#Dosen2").val() != undefined) {
              if ($("#Dosen2").val()=="Lain" && $("#Dosen2Lain").val() == "") {
                alert("Input Dosen 2 Wajib Di Isi!")
                return true
              } else if ($("#Dosen2").val()=="Lain" || $("#Dosen2Lain").val() != "") {
                DaftarDosen += ("|"+$("#Dosen2Lain").val())
              } else {
                DaftarDosen += ("|"+$("#Dosen2").val())
              } 
              if ($("#Dosen3").val() != undefined) {
                if ($("#Dosen3").val()=="Lain" && $("#Dosen3Lain").val() == "") {
                  alert("Input Dosen 3 Wajib Di Isi!")
                  return true
                } else if ($("#Dosen3").val()=="Lain" || $("#Dosen3Lain").val() != "") {
                  DaftarDosen += ("|"+$("#Dosen3Lain").val())
                } else {
                  DaftarDosen += ("|"+$("#Dosen3").val())
                } 
                if ($("#Dosen4").val() != undefined) {
                  if ($("#Dosen4").val()=="Lain" && $("#Dosen4Lain").val() == "") {
                    alert("Input Dosen 4 Wajib Di Isi!")
                    return true
                  } else if ($("#Dosen4").val()=="Lain" || $("#Dosen4Lain").val() != "") {
                    DaftarDosen += ("|"+$("#Dosen4Lain").val())
                  } else {
                    DaftarDosen += ("|"+$("#Dosen4").val())
                  } 
                }
              }
            }
            for (let i = 0; i < 18; i++) {
              for (let j = 1; j <= JumlahDosen; j++) {
                if ($("input[name='Input"+i+j+"']:checked").val() == undefined) {
                  alert('Pertanyaan Nomer '+(i+1)+', Nilai Untuk Dosen '+j+' Wajib Di Isi!')
                  return true
                } 
              }
            }
            AppDosen = ""
            var Tampung = []
            $.each($("input[name='App1']:checked"), function(){
              Tampung.push($(this).val())
            })
            if ($("#AppLain1").val() != "") {
              Tampung.push($("#AppLain1").val())
            }
            if (!Tampung.length) {
              alert("Pertanyaan Nomer 19, Untuk Dosen 1 Wajib Di Isi!")
              return true
            } else {
              AppDosen = Tampung.join("|")
            }
            for (let i = 2; i <= JumlahDosen; i++) {
              Tampung = []
              $.each($("input[name='App"+i+"']:checked"), function(){
                Tampung.push($(this).val())
              })
              if ($("#AppLain"+i).val() != "") {
                Tampung.push($("#AppLain"+i).val())
              }
              if (!Tampung.length) {
                alert("Pertanyaan Nomer 19, Untuk Dosen "+i+" Wajib Di Isi!")
                return true
              } else {
                AppDosen += ("$"+Tampung.join("|"))
              }
            }
            Tampung = []
            for (let i = 18; i < 30; i++) {
              if ($("input[name='PBM"+i+"']:checked").val() == undefined) {
                alert('Pertanyaan Nomer '+(i+2)+', Wajib Di Isi!')
                return true
              } else {
                Tampung.push($("input[name='PBM"+i+"']:checked").val())
              }
            }
            var PBM = Tampung.join("|")
            var Kendala = ""
            Tampung = []
            $.each($("input[name='Kendala']:checked"), function(){
              Tampung.push($(this).val())
            })
            if ($("#KendalaLain").val() != "") {
              Tampung.push($("#KendalaLain").val())
            }
            if (!Tampung.length) {
              alert("Pertanyaan Nomer 32 Wajib Di Isi!")
              return true
            } else {
              Kendala += Tampung.join("|")
            }
            PoinDosen = ""
            for (let i = 0; i < 18; i++) {
              for (let j = 1; j <= $("#JumlahDosen").val(); j++) {
                PoinDosen += $("input[name='Input"+i+j+"']:checked").val()
                if (j < $("#JumlahDosen").val()) { PoinDosen += '|' }   
              }
              if (i < 17) { PoinDosen += '$' } 
            }
            var Data = { NIM: $("#NIM").val(),
                         Nama: $("#Nama").val(),
                         Semester: $("#Semester").val(),
                         MataKuliah: $("#MataKuliah").val(),
                         JumlahDosen: $("#JumlahDosen").val(),
                         DaftarDosen: DaftarDosen,
                         PoinDosen: PoinDosen,
                         AppDosen: AppDosen,
                         PBM: PBM,
                         Kendala: Kendala,
                         Saran: $("#Saran").val(),
                         SMT: "Ganjil",
                         Tahun: "2020" }
            $("#Kirim").prop('disabled', true);
            $.post(BaseURL+"SMD/InputEvaluasiPBM", Data).done(function(Respon) {
              if (Respon == '1') {
                alert('Terima Kasih Telah Mengisi Kuisioner :)')
                window.location = BaseURL + "SMD/EvaluasiPBM"
              } else {
                alert(Respon)
              }
            })
          }
        })
      })
    </script>
  </body>
</html>