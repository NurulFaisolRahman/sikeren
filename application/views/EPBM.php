<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="<?=base_url('img/favicon.ico')?>" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Menggunakan Bootstrap 5 CDN untuk Responsive Design Modern -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Evaluasi PBM - FEB UTM</title>
    <style type="text/css">
        body {
            background-color: #f4f7fb;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #2b3a4a;
            padding-bottom: 80px;
        }
        
        /* Header & Cards */
        .header-card {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(30, 60, 114, 0.15);
            border: none;
            overflow: hidden;
            position: relative;
        }
        .header-card::before {
            content: "";
            position: absolute;
            top: -50%; left: -50%; width: 200%; height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 60%);
            z-index: 0;
        }
        .header-card .card-body {
            position: relative;
            z-index: 1;
        }
        .card-custom {
            background: #ffffff;
            border-radius: 16px;
            border: none;
            box-shadow: 0 8px 30px rgba(0,0,0,0.06);
            margin-bottom: 24px;
        }

        /* Form Inputs */
        .input-group-text.bg-primary {
            background-color: #e2e8f0 !important;
            border-color: #cbd5e1 !important;
            color: #1e293b;
            font-weight: 700;
            min-width: 140px;
        }
        .form-control, .form-select {
            border-color: #cbd5e1;
            padding: 0.7rem 1rem;
            font-size: 1rem;
        }
        .form-control:focus, .form-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25);
        }

        /* Typography & Layout */
        .section-title {
            background-color: #e0e7ff;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 700;
            color: #3730a3;
            margin-top: 10px;
            margin-bottom: 10px;
            border-left: 6px solid #4f46e5;
            font-size: 1.05rem;
            line-height: 1.4;
        }
        .question-text {
            font-size: 1.05rem;
            font-weight: 600;
            margin-bottom: 18px;
            color: #0f172a;
            line-height: 1.5;
        }
        .question-container {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 24px;
            margin-bottom: 20px;
            transition: all 0.2s ease;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        }
        .question-container:hover {
            box-shadow: 0 5px 20px rgba(0,0,0,0.06);
            border-color: #cbd5e1;
        }

        /* Scale & Buttons (Mobile Optimized) */
        .likert-group {
            display: flex;
            gap: 6px;
            width: 100%;
            justify-content: space-between;
        }
        .likert-group .btn {
            flex: 1;
            font-weight: 700;
            font-size: 1.1rem;
            border-radius: 10px;
            padding: 12px 0;
            transition: all 0.2s;
            border: 2px solid #e2e8f0;
            color: #64748b;
            background: #f8fafc;
        }
        
        /* Interactive coloring for scale 1 to 5 */
        .btn-check:checked + .btn[for$="_V1"] { background-color: #ef4444; border-color: #ef4444; color: white; transform: scale(1.05); }
        .btn-check:checked + .btn[for$="_V2"] { background-color: #f97316; border-color: #f97316; color: white; transform: scale(1.05); }
        .btn-check:checked + .btn[for$="_V3"] { background-color: #eab308; border-color: #eab308; color: white; transform: scale(1.05); }
        .btn-check:checked + .btn[for$="_V4"] { background-color: #3b82f6; border-color: #3b82f6; color: white; transform: scale(1.05); }
        .btn-check:checked + .btn[for$="_V5"] { background-color: #10b981; border-color: #10b981; color: white; transform: scale(1.05); }

        .likert-group .btn:hover {
            background-color: #e2e8f0;
            border-color: #94a3b8;
        }

        .dosen-label {
            font-size: 0.95rem;
            font-weight: 700;
            color: #4f46e5;
            margin-bottom: 12px;
            background: #e0e7ff;
            padding: 6px 14px;
            border-radius: 8px;
            display: inline-block;
        }

        /* Legend */
        .legend-box {
            background: #ffffff;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 10px;
        }
        .legend-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-weight: 600;
            font-size: 0.95rem;
            color: #334155;
        }
        .legend-badge {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            color: white;
            font-weight: bold;
            margin-right: 12px;
            font-size: 1.1rem;
        }
        .bg-v1 { background-color: #ef4444; }
        .bg-v2 { background-color: #f97316; }
        .bg-v3 { background-color: #eab308; }
        .bg-v4 { background-color: #3b82f6; }
        .bg-v5 { background-color: #10b981; }

        /* Submit Button */
        .btn-submit {
            background-color: #2563eb;
            border: none;
            padding: 16px;
            font-size: 1.15rem;
            border-radius: 12px;
            transition: all 0.3s;
        }
        .btn-submit:hover {
            background-color: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(37, 99, 235, 0.2);
        }

        /* Mobile Adjustments */
        @media (max-width: 576px) {
            .card-custom { padding: 20px !important; }
            .question-container { padding: 18px; }
            .question-text { font-size: 1rem; }
            .likert-group { gap: 4px; }
            .likert-group .btn { padding: 10px 0; font-size: 1rem; }
            .input-group-text.bg-primary { min-width: 100px; font-size: 0.9rem; }
            .section-title { font-size: 0.95rem; }
            .legend-item { font-size: 0.85rem; }
            .legend-badge { width: 28px; height: 28px; font-size: 1rem; }
        }
    </style>
</head>
<body>

<?php 
// ARRAY DATA MATA KULIAH S1
$MK_S1 = array('SMT 1 - PENGANTAR AKUNTANSI I','SMT 1 - BAHASA INGGRIS EKONOMI','SMT 1 - MATEMATIKA EKONOMI I','SMT 1 - MENTALITAS','SMT 1 - PENDIDIKAN KEWARGANEGARAAN','SMT 1 - PENGANTAR TEORI EKONOMI MAKRO','SMT 1 - PENGANTAR TEORI EKONOMI MIKRO','SMT 1 - PENDIDIKAN AGAMA ISLAM','SMT 1 - PENDIDIKAN AGAMA KRISTEN','SMT 1 - PENDIDIKAN AGAMA KATHOLIK','SMT 1 - PENDIDIKAN AGAMA HINDU','SMT 1 - PENDIDIKAN AGAMA BUDHA','SMT 1 - PENDIDIKAN AGAMA KHONGHUCHU','SMT 2 - MATEMATIKA EKONOMI II','SMT 2 - PENGANTAR MANAJEMEN DAN BISNIS','SMT 2 - SEJARAH PEMIKIRAN EKONOMI','SMT 2 - SOSIOLOGI KRITIS','SMT 2 - STATISTIK I','SMT 2 - TEORI EKONOMI MAKRO I','SMT 2 - TEORI EKONOMI MIKRO I','SMT 2 - BAHASA INDONESIA','SMT 3 - ASPEK HUKUM BISNIS','SMT 3 - EKONOMI KEPENDUDUKAN','SMT 3 - EKONOMI SDA DAN LINGKUNGAN','SMT 3 - PENGANTAR EKONOMI PEMBANGUNAN','SMT 3 - STATISTIK II','SMT 3 - TEORI EKONOMI MAKRO II','SMT 3 - TEORI EKONOMI MIKRO II','SMT 3 - KOPERASI DAN KEWIRAUSAHAAN','SMT 3 - ISLAM DAN EKONOMI','SMT 3 - MASALAH DAN KEBIJAKAN PEMBANGUNAN','SMT 4 - APLIKASI KOMPUTASI EKONOMI','SMT 4 - EKONOMI INDUSTRI','SMT 4 - EKONOMI MONETER','SMT 4 - EKONOMI PEMBANGUNAN','SMT 4 - EKONOMI PUBLIK','SMT 4 - ESDM DAN KETENAGAKERJAAN','SMT 5 - BANK DAN LEMBAGA KEUANGAN','SMT 5 - METODOLOGI PENELITIAN','SMT 5 - PEREKONOMIAN INDONESIA','SMT 5 - PERENCANAAN PEMBANGUNAN','SMT 5 - EKONOMI KELEMBAGAAN','SMT 5 - EKONOMI MONETER LANJUTAN (KONS. MONETER DAN PERBANKAN)','SMT 5 - STUDI KEBANKSENTRALAN (KONS. EK MONETER DAN PERBANKAN)','SMT 5 - EKONOMI REGIONAL (KONS. PERENCANAAN PEMBANGUNAN)','SMT 5 - KEUANGAN DAERAH (KONS PERENCANAAN PEMBANGUNAN)','SMT 5 - KEUANGAN DAERAH (KONS EK PUBLIK)','SMT 5 - EKONOMI PUBLIK LANJUTAN (KONS EK. PUBLIK)','SMT 6 - EKONOMETRIKA','SMT 6 - EKONOMI INTERNASIONAL','SMT 6 - EKONOMI PERKOTAAN DAN TRANSPORTASI','SMT 6 - EVALUASI PROYEK','SMT 6 - MANAJEMEN KEUANGAN DAERAH (KONS PERENCANAAN PEMBANGUNAN)','SMT 6 - PERENCANAAN STRATEGIS (KONS PERENCANAAN PEMBANGUNAN)','SMT 6 - ANALISA PASAR KEUANGAN (KONS MONETER DAN PERBANKAN)','SMT 6 - EKONOMI PERBANKAN (KONS MONETER DAN PERBANKAN)','SMT 6 - ANALISA KEBUTUHAN PUBLIK (KONS EK PUBLIK)','SMT 6 - PENGANGGARAN SEKTOR PUBLIK (KONS EK PUBLIK)','SMT 7 - SEMINAR EKONOMI MONETER DAN PERBANKAN (KONS EK. MONETER DAN PERBANKAN)','SMT 7 - SEMINAR PERENCANAAN PEMBANGUNAN (KONS PERENCANAAN PEMBANGUNAN)','SMT 7 - SEMINAR EKONOMI PUBLIK (KONS EK PUBLIK)','SMT 7 - EKONOMI POLITIK (MATKUL PILIHAN)','SMT 7 - EKONOMI PERDESAAN DAN PERTANIAN (MATKUL PILIHAN)','SMT 7 - EKONOMI MONETER INTERNASIONAL (MATKUL PILIHAN)','SMT 7 - ISLAM DAN EKONOMI (MATKUL PILIHAN)','SMT 7 - BADAN LEMBAGA KEUANGAN SYARIAH (MATKUL PILIHAN)','SMT 7 - KKN');

// ARRAY DATA MATA KULIAH S2
$MK_S2 = array('SMT 1 - EKONOMI MIKRO LANJUTAN','SMT 1 - EKONOMI MAKRO LANJUTAN','SMT 1 - METODE PENELITIAN KUANTITATIF','SMT 1 - METODE PENELITIAN KUALITATIF','SMT 1 - EKONOMETRIKA TERAPAN','SMT 2 - KEBIJAKAN PEMBANGUNAN EKONOMI','SMT 2 - EKONOMI INTERNASIONAL','SMT 2 - EKONOMI KELEMBAGAAN','SMT 2 - EKONOMI PUBLIK','SMT 2 - PERENCANAAN DAN PENGANGGARAN PEMBANGUNAN DAERAH','SMT 2 - TEKNIK ANALISIS PERENCANAAN PEMBANGUNAN EKONOMI REGIONAL','SMT 2 - PEMBANGUNAN EKONOMI LOKAL & PERENCANAAN PARTISIPATIF','SMT 2 - EKONOMI KELAUTAN DAN MARITIM','SMT 2 - ANALISIS DAYA DUKUNG WILAYAH PESISIR & PULAU KECIL','SMT 2 - PEMETAAN POTENSI WILAYAH PESISIR & PULAU KECIL','SMT 2 - EKONOMI SYARIAH','SMT 2 - PEMIKIRAN EKONOMI ISLAM','SMT 2 - KELEMBAGAAN KEUANGAN SYARIAH','SMT 3 - FILOSOFI ILMU EKONOMI','SMT 3 - FIQIH EKONOMI','SMT 3 - METODE RISET EKONOMI SYARIAH');

// ARRAY DOSEN
$Dosen = array('ABDUR ROHMAN, S. Ag, MEI, Dr.','ACHDIAR REDY SETIAWAN, S.E., MSA., Ak., CA','ADI DARMAWAN ERVANTO, S.E.,M.A.,Ak.,CA','AHMAD KAMIL, S.E., M.Ec. Dev','AHMAD MUZAWWIR S, M.Pd.I','ALEXANDER ANGGONO, SE., M.Si., Ph.D','ALVIN S. PRASETYO, S.E., M.SE.','AMBARIYANTO, S.E., M.Si.','ATIK EMILIA SULA, S.E., M.Ak.','ALIFAH ROKHMAH IDIALIS, SE., M.Sc','ANDRI WIJANARKO, SE, ME','ALVIN SUGENG PRASETYO, S.E., M.SE.','ANIS WULANDARI, SE., MSA., AK.,CA','ANITA CAROLINA, SE., MBusAdv., AK., QIA.,CA','ANITA KRISTINA, S.E., M.Si ,Dr.','ANUGRAHINI IRAWATI, Dra., MM','APRILINA SUSANDINI, SE., MSM','ARDI HAMZAH, SE., MSI., AK','ARIE SETYO DWI PURNOMO S.PD., M.SC.','BAMBANG HARYADI, DR. SE., MSI., AK.,CA','BAMBANG SUDARSONO, Drs., M.M','BONDAN SATRIAWAN, SE., M.Econ, ST','BOY SINGGIH GITAYUDA, S.E.,MM','CITRA NURHAYATI, SE., MA., Ak., CA','CHAIRUL ANAM, Drs Ec., M.Kes, Dr.','CITRA LUTFIA, S.E., M.A.','CRISANTY SUTRITYANINGTYAS TITIK, S.E., M.E.','DIAH WAHYUNINGSIH, S.E., M.Si ,Dr.','ECHSAN GANI, SE., M.Si','EMI RAHMAWATI, SE., MSI','ENI SRI RAHAYUNINGSIH, S.E., M.E, Dr.','ERFAN MUHAMMAD, S.E., M.Ak., CPA','EVALIATI AMANIYAH, SE., MSM','FAIDAL S.E., M.M','FARIYANA KUSUMAWATI, SE., MSI','FATHOR AS, SE., MM','FITRI AHMAD KURNIAWAN, SE, M.AK, AK, CA','FRIDA FANANI ROHMA, S.AKUN., M.SC.','GATOT HERU PRANJOTO, SE., MM','GITA ARASY HARWIDA, SE., MTax., AK., QIA.,CA','HABIBULLAH, S.E., M.Akun','HADI PURNOMO, SE.,MM','HANIF YUSUF SEPUTRO S.PD., M.AK.','HELMI BUYUNG AULIA SAFRIZAL, ST.,SE.,MMT','HENNY OKTAVIANTI, SE., M.Si.','HERY PURWANTO, S.PT., ME.','HERRY YULISTIYO, SE., M.Si','IMAM AGUS FAISOL, SE., M.Ak','DARUL ISLAM, S.E., M.M.','IRIANI ISMAIL, Dra., M.M., Dr.','JAKFAR SADIK, SE., ME','JUNAIDI, SE., MSI., AK.,CA','KHYSH NUSRI LEAPATRA CHAMALINDA, S.E., M.Akun','KURNIYATI INDAHSARI, M.Si, Dr.','MERIE SATYA ANGRAINI, S.E., M. AK.','MOCHAMAD REZA ADIYANTO S.P., M.M.','MOHAMAD TAMBRIN, Drs., MM','MOHAMMAD ARIEF, S.E., M.M., Dr.','MOHAMMAD YASKUN, S.E., M.M.','MOHTAR RASYID, S.E., M.Si, Dr.','MUDJI KUSWINARNO, Drs. Ec., M.Si','MUH. SYARIF, Drs. Ec, M.Si, Dr.','MUHAMMAD ALKIROM WILDAN, S.E., M.Si. Dr.',"MUHAMMAD ASIM ASY'ARI SE.,M.Ak.",'MUHAMMAD SYAM KUSUFI, S.E., M.Sc.','MUHAMMAD ZAINURI, Ir., M. Sc., Prof. Dr.','MUKHAMMAD BAHKRUDDIN, M.Pd. I','NIZARUL ALIM, SE., M.Si., Ak,Prof. Dr.','NORITA VIBRIYANTO, S.E, M.Si','NUR AZIZAH, SE., MM','NURITA ANDRIANI, Ir., M.M., Dr.','NUR HAYATI, S.E., MSA., Ak.,DR QIA., CA','PRASETYO NUGROHO, S.Pi.,MM','PRASETYONO, SE., MSI., AK, Dr.','PRIBANUS WANTARA, Drs.,MM, Dr.','PURNAMAWATI, SE, M.Si','RAHAYU DEWI ZAKIYAH RF, S.E., M.AKUN.','RIFAI AFIN, S.E, M.Sc','RIS YUWONO YUDHO NUGROHO, S.E., M.Si','RITA YULIANA, SE., M.SA., Ak., CA, Dr.','RM. MOCH. WISPANDONO, S.E., M.S, Dr.','ROBIATUL AULIYAH, SE, MSA','R. JOHNNY HADI RAHARJO, SE., MM','SANIMAN, SE., M.PSDM','SARIYANI, S.E., M.SE.','SELAMET JOKO U, SE., ME','SITI MUSYAROFAH, SE., M.Si., Ak, Dr.','SUMARTO, S.E., M.E','SUTIKNO, S.E., M.E, Dr.','SUYONO, S.E.,M.S.M','SAMSUKI, S.E., M.SM.','TARJO, S.E, M.Si, Dr., CFE','TITO IM. RAHMAN HAKIM, S.E., M.S.A.',"TITOV CHUK'S MAYVANI, SE., ME",'USWATUN HASANAH, S.E.,M.Sc','MIFTAHUL JANNAH, S.E., M.SC','YAHYA SURYA WINATA, S.E., M.Si, Dr.','YUDHI PRASETYA MADA, SE., MM','YUFITA, S.E., M.E.','YUNI RIMAWATI, SE., MSAk.,Ak.,CA','YUSTINA CHRISMARDANI, S.Si., MM','VIDI HADYARTI, S.M., M.M.','WIDITA KURNIASARI, S.E., M.E,DR','ZAKIK, SE., M.Si');
?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-9 col-md-11">
            
            <!-- Header Card -->
            <div class="card header-card mb-4">
                <div class="card-body text-center py-5">
                    <h2 class="font-weight-bold mb-3">Evaluasi Proses Belajar Mengajar</h2>
                    <h5 class="mb-4"><b>Fakultas Ekonomi dan Bisnis (FEB) UTM</b></h5>
                    <p class="mb-0 mx-auto" style="max-width: 700px; font-size: 0.95rem; font-weight: 300; line-height: 1.6;">
                        Survey ini untuk melihat kepuasan layanan pembelajaran untuk semua Mata Kuliah yang diambil pada setiap program Studi. Mahasiswa wajib mengisi survey ini untuk setiap Mata kuliah pada pertemuan terakhir (pertemuan 14). <br>
                        Hasil survey akan dijadikan bahan evaluasi untuk setiap Mata kuliah pada setiap Program Studi untuk melakukan perbaikan pelaksanaan perkuliahan. *
                    </p>
                </div>
            </div>

            <!-- Form Container -->
            <div class="card card-custom p-4 p-md-5">
                <div class="alert alert-danger fw-bold border-0 bg-danger text-white mb-4" role="alert">
                    * SEMUA ISIAN WAJIB DIISI
                </div>
                
                <div class="row g-4">
                    <!-- Identitas -->
                    <div class="col-md-6">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-primary">NIM</span>
                            <input class="form-control" type="text" id="NIM" data-inputmask='"mask": "999999999999"' data-mask placeholder="12 Digit Angka">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-primary">Nama</span>
                            <input class="form-control" type="text" id="Nama" placeholder="Nama Lengkap">
                        </div>
                    </div>

                    <!-- Program Studi ditambahkan di sini -->
                    <div class="col-md-6">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-primary">Program Studi</span>
                            <select class="form-select" id="ProgramStudi">
                                <option value="" disabled selected>Pilih Program Studi</option>                  
                                <option value="S1 Ekonomi Pembangunan">S1 Ekonomi Pembangunan</option>
                                <option value="S2 Ilmu Ekonomi">S2 Ilmu Ekonomi</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-primary">Semester</span>
                            <select class="form-select" id="Semester">
                                <option value="" disabled selected>Pilih Semester</option>                  
                                <?php for($s=1; $s<=14; $s++) echo "<option value='$s'>Semester $s</option>"; ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-primary">Mata Kuliah</span>
                            <select class="form-select" id="MataKuliah">
                                <!-- Option akan diisi oleh JavaScript berdasarkan Program Studi -->
                                <option value="" disabled selected>Pilih Program Studi Terlebih Dahulu</option> 
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-primary">Dosen</span>
                            <select class="form-select" id="JumlahDosen">
                                <option value="1">1 Dosen Mengajar</option>  
                                <option value="2">2 Dosen Mengajar</option>
                                <option value="3">3 Dosen Mengajar</option>
                                <option value="4">4 Dosen Mengajar</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Daftar Dosen Dinamis -->
                <div id="DaftarDosenContainer" class="mt-1"></div>

                <hr class="my-3" style="border-color: #cbd5e1;">

                <!-- Legend / Keterangan Nilai 1 - 5 -->
                <div class="legend-box shadow-sm">
                    <h5 class="fw-bold text-dark">Keterangan Skala Penilaian:</h5>
                    <div class="row g-2">
                        <div class="col-md-4 col-sm-6"><div class="legend-item"><div class="legend-badge bg-v1">1</div> Sangat Tidak Puas</div></div>
                        <div class="col-md-4 col-sm-6"><div class="legend-item"><div class="legend-badge bg-v2">2</div> Tidak Puas</div></div>
                        <div class="col-md-4 col-sm-6"><div class="legend-item"><div class="legend-badge bg-v3">3</div> Cukup / Netral</div></div>
                        <div class="col-md-4 col-sm-6"><div class="legend-item"><div class="legend-badge bg-v4">4</div> Puas</div></div>
                        <div class="col-md-4 col-sm-6"><div class="legend-item"><div class="legend-badge bg-v5">5</div> Sangat Puas</div></div>
                    </div>
                </div>

                <!-- Kontainer Pertanyaan Dinamis akan dirender oleh JS disini -->
                <div id="KuesionerContainer"></div>

                <!-- Form Saran -->
                <div class="section-title">F. Saran Pengembangan PBM</div>
                <div class="mb-3">
                    <label for="Saran" class="form-label fw-bold" style="font-size: 1.05rem; color: #1e293b;">16. Mohon menuliskan saran bagi pengembangan proses belajar mengajar di FEB UTM:</label>
                    <textarea class="form-control form-control-lg" id="Saran" rows="5" placeholder="Ketik saran, kritik, dan masukan Anda di sini..."></textarea>
                </div>

                <div class="d-grid">
                    <button type="button" class="btn btn-submit btn-primary text-white fw-bold" id="Kirim">Submit Kuesioner</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        // Inisialisasi Input Mask
        $('[data-mask]').inputmask();
        var BaseURL = '<?=base_url()?>';
        
        // Data array dari PHP diteruskan ke JS
        var DosenList = <?= json_encode($Dosen) ?>;
        var mkS1List = <?= json_encode($MK_S1) ?>;
        var mkS2List = <?= json_encode($MK_S2) ?>;
        
        // Filter Mata Kuliah berdasarkan Pilihan Program Studi
        $("#ProgramStudi").change(function() {
            var prodi = $(this).val();
            var mkSelect = $("#MataKuliah");
            
            // Kosongkan dan set default option
            mkSelect.empty();
            mkSelect.append('<option value="" disabled selected>Pilih Mata Kuliah</option>');
            
            var options = [];
            if(prodi === "S1 Ekonomi Pembangunan") {
                options = mkS1List;
            } else if(prodi === "S2 Ilmu Ekonomi") {
                options = mkS2List;
            }
            
            // Populate select option
            $.each(options, function(index, value) {
                mkSelect.append('<option value="'+value+'">'+value+'</option>');
            });
        });

        // Data Pertanyaan Sesuai Gambar (Diperbarui Skala 1-5 & Penomoran)
        var Q_PBM = [
            { cat: "A. Kemampuan memberikan pelayanan sesuai dengan yang dijanjikan secara handal dan akurat", text: "1. Dosen mengajar sesuai dengan Rencana Pembelajaran Semester (RPS)" },
            { cat: "A. Kemampuan memberikan pelayanan sesuai dengan yang dijanjikan secara handal dan akurat", text: "2. Dosen memenuhi kontrak kuliah sesuai dengan yang telah disepakati" },
            { cat: "A. Kemampuan memberikan pelayanan sesuai dengan yang dijanjikan secara handal dan akurat", text: "3. Dosen menggunakan metode pembelajaran kolaboratif (melibatkan mahasiswa secara aktif dalam PBL)" },
            { cat: "B. Kesediaan membantu pelanggan dan memberikan pelayanan dengan cepat", text: "4. Dosen berkenan untuk merespon pertanyaan mahasiswa dengan cepat dan tepat" },
            { cat: "B. Kesediaan membantu pelanggan dan memberikan pelayanan dengan cepat", text: "5. Dosen berkenan untuk memberikan bantuan terkait dengan kesulitan yang dirasakan oleh mahasiswa dalam pembelajaran" },
            { cat: "C. Kompetensi personil unit/biro dalam memberikan pelayanan, memberikan rasa yakin dan percaya", text: "6. Dosen sangat berkompeten di matakuliah yang diajarkan" },
            { cat: "C. Kompetensi personil unit/biro dalam memberikan pelayanan, memberikan rasa yakin dan percaya", text: "7. Dosen menjelaskan materi pembelajaran dengan sangat baik" },
            { cat: "C. Kompetensi personil unit/biro dalam memberikan pelayanan, memberikan rasa yakin dan percaya", text: "8. Dosen tidak membeda-bedakan latar belakang pendidikan, sosial, ekonomi, budaya, bahasa, jalur penerimaan mahasiswa, dan kebutuhan khusus mahasiswa" },
            { cat: "D. Memberikan perhatian yang tulus dan bersifat pribadi kepada pelanggan", text: "9. Dosen bersedia untuk meluangkan waktu membantu mahasiswa yang mengalami kesulitan dalam proses pembelajaran" },
            { cat: "E. Fasilitas fisik, perlengkapan, pegawai, dan sarana komunikasi", text: "10. Materi ajar yang disampaikan oleh dosen disajikan dengan cara yang menarik dan kreatif" },
            { cat: "E. Fasilitas fisik, perlengkapan, pegawai, dan sarana komunikasi", text: "11. Materi yang disampaikan bukan hanya textbook tetapi juga menggunakan artikel-artikel terkait dengan matakuliah" },
            { cat: "E. Fasilitas fisik, perlengkapan, pegawai, dan sarana komunikasi", text: "12. Dosen berpenampilan rapi" },
            { cat: "E. Fasilitas fisik, perlengkapan, pegawai, dan sarana komunikasi", text: "13. Ruang perkuliahan dilengkapi dengan fasilitas yang mendukung kenyamanan" },
            { cat: "E. Fasilitas fisik, perlengkapan, pegawai, dan sarana komunikasi", text: "14. Staf tenaga kependidikan memberikan layanan yang baik dalam mendukung pembelajaran" },
            { cat: "E. Fasilitas fisik, perlengkapan, pegawai, dan sarana komunikasi", text: "15. Pembelajaran dapat dilakukan secara: online, offline dan hybrid" }
        ];

        function renderForm() {
            var jml = parseInt($("#JumlahDosen").val());
            
            // 1. Render Dropdown Dosen
            var htmlDosen = '';
            for (let i = 1; i <= jml; i++) {
                htmlDosen += `
                <div class="row g-3 mt-1 align-items-center">
                    <div class="col-md-6">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-primary">Dosen ${i}</span>
                            <select class="form-select select-dosen" id="Dosen${i}">
                                <option value="Lain">-- Pilih Dosen ${i} --</option>`;
                for (let j = 0; j < DosenList.length; j++) {
                    htmlDosen += `<option value="${DosenList[j]}">${DosenList[j]}</option>`;
                }
                htmlDosen += `
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control form-control-lg border-primary" type="text" id="Dosen${i}Lain" placeholder="Ketik Jika Dosen Lainnya ">
                    </div>
                </div>`;
            }
            $("#DaftarDosenContainer").html(htmlDosen);

            // 2. Render Kuesioner
            var htmlQ = '';
            var currentCat = '';

            // Render Pertanyaan Dosen (Q1 - Q15) dilooping sesuai Jumlah Dosen
            for(let i=0; i < Q_PBM.length; i++) {
                if(Q_PBM[i].cat !== currentCat) {
                    currentCat = Q_PBM[i].cat;
                    htmlQ += `<div class="section-title">${currentCat}</div>`;
                }
                
                htmlQ += `<div class="question-container">
                            <div class="question-text">${Q_PBM[i].text}</div>
                            <div class="row g-4">`;
                
                for(let d=1; d<=jml; d++) {
                    htmlQ += `<div class="${jml > 1 ? 'col-md-6' : 'col-12'}">
                                <span class="dosen-label">Penilaian Dosen ${d}</span>
                                <div class="likert-group">`;
                    // Loop 1 hingga 5 (Sangat Tidak Puas - Sangat Puas)
                    for(let v=1; v<=5; v++) {
                        let idRadio = `Q${i}_D${d}_V${v}`;
                        let nameRadio = `Input${i}${d}`;
                        htmlQ += `<input type="radio" class="btn-check" name="${nameRadio}" id="${idRadio}" value="${v}">
                                  <label class="btn" for="${idRadio}">${v}</label>`;
                    }
                    htmlQ += `  </div>
                              </div>`;
                }
                htmlQ += `  </div>
                          </div>`;
            }
            
            $("#KuesionerContainer").html(htmlQ);
        }

        // Trigger render saat halaman dimuat dan saat dropdown jumlah dosen berubah
        renderForm();
        $("#JumlahDosen").change(renderForm);

        // Logic Pengiriman Form
        $("#Kirim").click(function() {
            var jml = parseInt($("#JumlahDosen").val());

            // Validasi Data Diri
            if (isNaN($("#NIM").val()) || $("#NIM").val() === "") {
                alert('NIM Wajib Diisi (Hanya Angka)!'); $("#NIM").focus(); return false;
            }
            if ($("#Nama").val() === "") {
                alert('Nama Wajib Diisi!'); $("#Nama").focus(); return false;
            }
            // Validasi Program Studi
            if ($("#ProgramStudi").val() === null) {
                alert('Program Studi Wajib Dipilih!'); $("#ProgramStudi").focus(); return false;
            }
            if ($("#Semester").val() === null) {
                alert('Semester Wajib Dipilih!'); $("#Semester").focus(); return false;
            }
            if ($("#MataKuliah").val() === null) {
                alert('Mata Kuliah Wajib Dipilih!'); $("#MataKuliah").focus(); return false;
            }

            // Validasi Dosen
            var DaftarDosenArray = [];
            for(let i=1; i<=jml; i++) {
                let dLain = $("#Dosen"+i+"Lain").val();
                let dSel = $("#Dosen"+i).val();
                if(dSel === "Lain" && dLain === "") {
                    alert("Nama Dosen " + i + " Wajib Diisi!"); $("#Dosen"+i+"Lain").focus(); return false;
                }
                DaftarDosenArray.push(dSel === "Lain" ? dLain : dSel);
            }
            var DaftarDosenStr = DaftarDosenArray.join("|");

            // Validasi & Collecting Poin Dosen (15 Pertanyaan)
            var PoinDosenStr = "";
            for (let i = 0; i < Q_PBM.length; i++) { 
                for (let j = 1; j <= jml; j++) {
                    let val = $(`input[name='Input${i}${j}']:checked`).val();
                    if (val == undefined) {
                        alert(`Mohon lengkapi penilaian untuk Pertanyaan No.${i+1} pada Dosen ${j}!`); return false;
                    }
                    PoinDosenStr += val;
                    if (j < jml) PoinDosenStr += '|';
                }
                if (i < Q_PBM.length - 1) PoinDosenStr += '$';
            }

            if ($("#Saran").val() === "") {
                alert('Mohon mengisi kolom Saran Pengembangan PBM!'); $("#Saran").focus(); return false;
            }

            // Setup Payload Data
            var DataPayload = { 
                ProgramStudi: $("#ProgramStudi").val(), // Menyisipkan data Program Studi ke Payload
                NIM: $("#NIM").val(),
                Nama: $("#Nama").val(),
                Semester: $("#Semester").val(),
                MataKuliah: $("#MataKuliah").val(),
                DaftarDosen: DaftarDosenStr,
                PoinDosen: PoinDosenStr,
                Saran: $("#Saran").val()
            };

            // Proses AJAX Pengiriman
            let btn = $(this);
            btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Mengirim...');
            
            $.post(BaseURL + "SMD/InputEPBM", DataPayload).done(function(Respon) {
                if (Respon == '1') {
                    alert('Terima Kasih Telah Mengisi Kuesioner PBM.');
                    window.location = BaseURL + "SMD/EPBM";
                } else {
                    alert("Terjadi Kendala: " + Respon);
                    btn.prop('disabled', false).text('Kirim Kuesioner');
                }
            }).fail(function() {
                alert("Terjadi kesalahan koneksi server. Pastikan internet Anda stabil.");
                btn.prop('disabled', false).text('Kirim Kuesioner');
            });
        });
    });
</script>
</body>
</html>