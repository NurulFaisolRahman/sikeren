<?php 
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  $pdf->SetFont('times', 12);
  $pdf->setPrintHeader(TRUE);  
  $pdf->setPrintFooter(TRUE);         
  $pdf->setLeftMargin(10);
  $pdf->setRightMargin(10);
  $pdf->SetAuthor('nurulfaisolrahman@gmail.com');
  $pdf->SetDisplayMode('real', 'default');
  $pdf->SetAutoPageBreak(TRUE, 10);
  $pdf->SetFooterMargin(10);
  $pdf->AddPage('L', 'A4');
  if (isset($Dosen4)) {
    $Dosen = ' 1. '.$Dosen1.' <br>2. '.$Dosen2.' <br>3. '.$Dosen3.' 4. '.$Dosen4;
    $Satu = '<td style="width:25%;text-align:center;">Dosen Pengampu<br><img src="img/'.$QRCode1.'" width="50" alt="Dosen1"><br>'.$Dosen1.'</td>';
    $Dua = '<td style="width:25%;text-align:center;">Dosen Pengampu<br><img src="img/'.$QRCode2.'" width="50" alt="Dosen2"><br>'.$Dosen2.'</td>';
    $Tiga = '<td style="width:25%;text-align:center;">Dosen Pengampu<br><img src="img/'.$QRCode3.'" width="50" alt="Dosen2"><br>'.$Dosen3.'</td>';
    $Empat = '<td style="width:25%;text-align:center;">Dosen Pengampu<br><img src="img/'.$QRCode4.'" width="50" alt="Dosen2"><br>'.$Dosen4.'</td>';
    $KPS = '<td style="width:33.3%;text-align:center;">Koorprodi<br><img src="img/22.png" width="50" alt="Koorprodi"><br>Titov Chuk'."'s".' Mayvani, SE., ME.</td>';
  } else if (isset($Dosen3)) {
    $Dosen = ' 1. '.$Dosen1.' <br>2. '.$Dosen2.' <br>3. '.$Dosen3;
    $Satu = '<td style="width:33.3%;text-align:center;">Dosen Pengampu<br><img src="img/'.$QRCode1.'" width="50" alt="Dosen1"><br>'.$Dosen1.'</td>';
    $Dua = '<td style="width:33.3%;text-align:center;">Dosen Pengampu<br><img src="img/'.$QRCode2.'" width="50" alt="Dosen2"><br>'.$Dosen2.'</td>';
    $Tiga = '<td style="width:33.3%;text-align:center;">Dosen Pengampu<br><img src="img/'.$QRCode3.'" width="50" alt="Dosen2"><br>'.$Dosen3.'</td>';
    $Empat = '';
    $KPS = '<td style="width:33.3%;text-align:center;">Koorprodi<br><img src="img/22.png" width="50" alt="Koorprodi"><br>Titov Chuk'."'s".' Mayvani, SE., ME.</td>';
  } else if (isset($Dosen2)) {
    $Dosen = ' 1. '.$Dosen1.' <br>2. '.$Dosen2;
    $Satu = '<td style="width:25%;text-align:center;">Dosen Pengampu<br><img src="img/'.$QRCode1.'" width="50" alt="Dosen1"><br>'.$Dosen1.'</td>';
    $Dua = '<td style="width:25%;text-align:center;"></td>';
    $Tiga = '<td style="width:25%;text-align:center;"></td>';
    $Empat = '<td style="width:25%;text-align:center;">Dosen Pengampu<br><img src="img/'.$QRCode2.'" width="50" alt="Dosen2"><br>'.$Dosen2.'</td>';
    $KPS = '<td style="width:33.3%;text-align:center;">Koorprodi<br><img src="img/22.png" width="50" alt="Koorprodi"><br>Titov Chuk'."'s".' Mayvani, SE., ME.</td>';
  } else if (isset($Dosen1)) {
    $Dosen = ' 1. '.$Dosen1;
    $Satu = '<td style="width:25%;text-align:center;">Dosen Pengampu<br><img src="img/'.$QRCode1.'" width="50" alt="Dosen1"><br>'.$Dosen1.'</td>';
    $Dua = '<td style="width:25%;text-align:center;"></td>';
    $Tiga = '<td style="width:25%;text-align:center;"></td>';
    $Empat = '<td style="width:25%;text-align:center;"></td>';
    $KPS = '<td style="width:33.3%;text-align:center;">Koorprodi<br><img src="img/22.png" width="50" alt="Koorprodi"><br>Titov Chuk'."'s".' Mayvani, SE., ME.</td>';
  } else {
    $Dosen = '';
    $Satu = '<td style="width:25%;text-align:center;"></td>';
    $Dua = '<td style="width:25%;text-align:center;"></td>';
    $Tiga = '<td style="width:25%;text-align:center;"></td>';
    $Empat = '<td style="width:25%;text-align:center;"></td>';
    $KPS = '';
  }
  $Deskripsi = '<table border="1" cellpadding="2" nobr="true">
    <tr>
      <td style="width:20%;text-align:center;"><img src="img/LogoUTM.png" width="120" alt="Logo UTM"></td>
      <td style="width:80%;"><p style="text-align:center;font-size:20px;"><br><b>UNIVERSITAS TRUNOJOYO MADURA<br>FAKULTAS EKONOMI DAN BISNIS<br>EKONOMI PEMBANGUNAN</b></p></td>
    </tr>
    <tr>
      <td colspan="2"><b style="text-align:center;font-size:12px;">RENCANA PEMBELAJARAN SEMESTER (RPS)</b></td>
    </tr>
    <tr style="font-weight:bold;text-align:center;">
      <td style="width:25%;">Mata Kuliah</td>
      <td style="width:18.75%;">Kode MK</td>
      <td style="width:18.75%;">Bobot (sks)</td>
      <td style="width:18.75%;">Semester</td>
      <td style="width:18.75%;">Tanggal Penyusunan</td>
    </tr>
    <tr style="text-align:center;">
      <td style="width:25%;">'.$RPS['NamaMK'].'</td>
      <td style="width:18.75%;">'.$RPS['KodeMK'].'</td>
      <td style="width:18.75%;">'.$RPS['BobotMK'].'</td>
      <td style="width:18.75%;">'.$RPS['Semester'].'</td>
      <td style="width:18.75%;">'.$RPS['TanggalPenyusunan'].'</td>
    </tr>
    <tr style="font-weight:bold;text-align:center;">
      <td style="width:25%;">Otorisasi</td>
      <td style="width:25%;">Dosen Pengembang RPS</td>
      <td style="width:25%;">Koordinator Bidang Keahlian</td>
      <td style="width:25%;">Ketua Program Studi</td>
    </tr>
    <tr style="text-align:center;">
      <td style="width:25%;"></td>
      <td style="width:25%;">'.$RPS['KoordinatorPengembang'].'</td>
      <td style="width:25%;">'.$RPS['KoordinatorBidang'].'</td>
      <td style="width:25%;">'.$RPS['Kaprodi'].'</td>
    </tr>
    <tr style="font-weight:bold;">
      <td rowspan="4" style="width:20%;">Capaian Pembelajaran (CP)</td>
      <td style="width:80%;">Capaian Pembelajaran Lulusan Program Studi Yang Di Bebankan Pada Mata Kuliah</td>
    </tr>
    <tr>
      <td style="width:80%;">'.$RPS['CPL'].'</td>
    </tr>
    <tr rowspan="4" style="font-weight:bold;">
      <td style="width:80%;">CPMK (Capaian Pembelajaran Mata Kuliah)</td>
    </tr>
    <tr>
      <td style="width:80%;">'.$RPS['CPM'].'</td>
    </tr>
    <tr>
      <td style="width:20%;"><b>Deskripsi Singkat</b></td>
      <td style="width:80%;">'.$RPS['Deskripsi'].'</td>
    </tr>
    <tr>
      <td style="width:20%;"><b>Bahan Kajian / Materi</b></td>
      <td style="width:80%;">'.$RPS['BahanKajian'].'</td>
    </tr>
    <tr style="font-weight:bold;">
      <td rowspan="4" style="width:20%;">Daftar Referensi</td>
      <td style="width:80%;">Referensi Utama</td>
    </tr>
    <tr>
      <td style="width:80%;">'.$RPS['ReferensiUtama'].'</td>
    </tr>
    <tr rowspan="4" style="font-weight:bold;">
      <td style="width:80%;">Referensi Pendukung</td>
    </tr>
    <tr>
      <td style="width:80%;">'.$RPS['ReferensiPendudukung'].'</td>
    </tr>
    <tr>
      <td style="width:20%;"><b>Dosen Pengampu</b></td>
      <td style="width:80%;">'.$Dosen.'</td>
    </tr>
    <tr>
      <td style="width:20%;"><b>Mata Kuliah Prasyarat</b></td>
      <td style="width:80%;">'.$RPS['MKPrasyarat'].'</td>
    </tr>
  </table>';
  $pdf->writeHTML($Deskripsi, true, false, true, false, '');
  $Materi = '<br pagebreak="true"/><table border="1" cellpadding="1">
    <tr style="font-weight:bold;text-align:center;">
      <td style="width:6%;">Minggu</td>
      <td style="width:15%;">Sub CPMK</td>
      <td style="width:19%;">Bahan Kajian</td>
      <td style="width:15%;">Metode</td>
      <td style="width:5%;">Waktu</td>
      <td style="width:15%;">Penugasan</td>
      <td style="width:10%;">Kriteria</td>
      <td style="width:10%;">Indikator</td>
      <td style="width:5%;">Bobot</td>
    </tr>';
  $Data = explode("$",$RPS['Minggu1']); $CPM = explode("|",$Data[0]); $CP = ""; for ($i=1; $i < count($CPM); $i++) { if ($CPM[$i] != "") { $CP .= $CPM[$i][0].$CPM[$i][2].'<br/>'; } }
  $Materi .= '<tr>
      <td style="text-align:center;">1</td>
      <td>'.$CPM[0].'<br/><b>'.$CP.'</b></td>
      <td>'.$Data[1].'</td>
      <td>'.$Data[2].'</td>
      <td style="text-align:center;">'.$Data[3].'</td>
      <td>'.$Data[4].'</td>
      <td>'.$Data[5].'</td>
      <td>'.$Data[6].'</td>
      <td style="text-align:center;">'.$Data[7].'</td>
    </tr>';
  $Data = explode("$",$RPS['Minggu2']); $CPM = explode("|",$Data[0]); $CP = ""; for ($i=1; $i < count($CPM); $i++) { if ($CPM[$i] != "") { $CP .= $CPM[$i][0].$CPM[$i][2].'<br/>'; } }
  $Materi .= '<tr>
      <td style="text-align:center;">2</td>
      <td>'.$CPM[0].'<br/><b>'.$CP.'</b></td>
      <td>'.$Data[1].'</td>
      <td>'.$Data[2].'</td>
      <td style="text-align:center;">'.$Data[3].'</td>
      <td>'.$Data[4].'</td>
      <td>'.$Data[5].'</td>
      <td>'.$Data[6].'</td>
      <td style="text-align:center;">'.$Data[7].'</td>
    </tr>';
  $Data = explode("$",$RPS['Minggu3']); $CPM = explode("|",$Data[0]); $CP = ""; for ($i=1; $i < count($CPM); $i++) { if ($CPM[$i] != "") { $CP .= $CPM[$i][0].$CPM[$i][2].'<br/>'; } }
  $Materi .= '<tr>
      <td style="text-align:center;">3</td>
      <td>'.$CPM[0].'<br/><b>'.$CP.'</b></td>
      <td>'.$Data[1].'</td>
      <td>'.$Data[2].'</td>
      <td style="text-align:center;">'.$Data[3].'</td>
      <td>'.$Data[4].'</td>
      <td>'.$Data[5].'</td>
      <td>'.$Data[6].'</td>
      <td style="text-align:center;">'.$Data[7].'</td>
    </tr>';
  $Data = explode("$",$RPS['Minggu4']); $CPM = explode("|",$Data[0]); $CP = ""; for ($i=1; $i < count($CPM); $i++) { if ($CPM[$i] != "") { $CP .= $CPM[$i][0].$CPM[$i][2].'<br/>'; } }
  $Materi .= '<tr>
      <td style="text-align:center;">4</td>
      <td>'.$CPM[0].'<br/><b>'.$CP.'</b></td>
      <td>'.$Data[1].'</td>
      <td>'.$Data[2].'</td>
      <td style="text-align:center;">'.$Data[3].'</td>
      <td>'.$Data[4].'</td>
      <td>'.$Data[5].'</td>
      <td>'.$Data[6].'</td>
      <td style="text-align:center;">'.$Data[7].'</td>
    </tr>';
  $Data = explode("$",$RPS['Minggu5']); $CPM = explode("|",$Data[0]); $CP = ""; for ($i=1; $i < count($CPM); $i++) { if ($CPM[$i] != "") { $CP .= $CPM[$i][0].$CPM[$i][2].'<br/>'; } }
  $Materi .= '<tr>
      <td style="text-align:center;">5</td>
      <td>'.$CPM[0].'<br/><b>'.$CP.'</b></td>
      <td>'.$Data[1].'</td>
      <td>'.$Data[2].'</td>
      <td style="text-align:center;">'.$Data[3].'</td>
      <td>'.$Data[4].'</td>
      <td>'.$Data[5].'</td>
      <td>'.$Data[6].'</td>
      <td style="text-align:center;">'.$Data[7].'</td>
    </tr>';
  $Data = explode("$",$RPS['Minggu6']); $CPM = explode("|",$Data[0]); $CP = ""; for ($i=1; $i < count($CPM); $i++) { if ($CPM[$i] != "") { $CP .= $CPM[$i][0].$CPM[$i][2].'<br/>'; } }
  $Materi .= '<tr>
      <td style="text-align:center;">6</td>
      <td>'.$CPM[0].'<br/><b>'.$CP.'</b></td>
      <td>'.$Data[1].'</td>
      <td>'.$Data[2].'</td>
      <td style="text-align:center;">'.$Data[3].'</td>
      <td>'.$Data[4].'</td>
      <td>'.$Data[5].'</td>
      <td>'.$Data[6].'</td>
      <td style="text-align:center;">'.$Data[7].'</td>
    </tr>';
  $Data = explode("$",$RPS['Minggu7']); $CPM = explode("|",$Data[0]); $CP = ""; for ($i=1; $i < count($CPM); $i++) { if ($CPM[$i] != "") { $CP .= $CPM[$i][0].$CPM[$i][2].'<br/>'; } }
  $Materi .= '<tr>
      <td style="text-align:center;">7</td>
      <td>'.$CPM[0].'<br/><b>'.$CP.'</b></td>
      <td>'.$Data[1].'</td>
      <td>'.$Data[2].'</td>
      <td style="text-align:center;">'.$Data[3].'</td>
      <td>'.$Data[4].'</td>
      <td>'.$Data[5].'</td>
      <td>'.$Data[6].'</td>
      <td style="text-align:center;">'.$Data[7].'</td>
    </tr>';
  $Data = explode("$",$RPS['Minggu8']); $CPM = explode("|",$Data[0]); $CP = ""; for ($i=1; $i < count($CPM); $i++) { if ($CPM[$i] != "") { $CP .= $CPM[$i][0].$CPM[$i][2].'<br/>'; } }
  $Materi .= '<tr>
      <td style="text-align:center;">8</td>
      <td>'.$CPM[0].'<br/><b>'.$CP.'</b></td>
      <td>'.$Data[1].'</td>
      <td>'.$Data[2].'</td>
      <td style="text-align:center;">'.$Data[3].'</td>
      <td>'.$Data[4].'</td>
      <td>'.$Data[5].'</td>
      <td>'.$Data[6].'</td>
      <td style="text-align:center;">'.$Data[7].'</td>
    </tr>';
  $Data = explode("$",$RPS['Minggu9']); $CPM = explode("|",$Data[0]); $CP = ""; for ($i=1; $i < count($CPM); $i++) { if ($CPM[$i] != "") { $CP .= $CPM[$i][0].$CPM[$i][2].'<br/>'; } }
  $Materi .= '<tr>
      <td style="text-align:center;">9</td>
      <td>'.$CPM[0].'<br/><b>'.$CP.'</b></td>
      <td>'.$Data[1].'</td>
      <td>'.$Data[2].'</td>
      <td style="text-align:center;">'.$Data[3].'</td>
      <td>'.$Data[4].'</td>
      <td>'.$Data[5].'</td>
      <td>'.$Data[6].'</td>
      <td style="text-align:center;">'.$Data[7].'</td>
    </tr>';
  $Data = explode("$",$RPS['Minggu10']); $CPM = explode("|",$Data[0]); $CP = ""; for ($i=1; $i < count($CPM); $i++) { if ($CPM[$i] != "") { $CP .= $CPM[$i][0].$CPM[$i][3].'<br/>'; } }
  $Materi .= '<tr>
      <td style="text-align:center;">10</td>
      <td>'.$CPM[0].'<br/><b>'.$CP.'</b></td>
      <td>'.$Data[1].'</td>
      <td>'.$Data[2].'</td>
      <td style="text-align:center;">'.$Data[3].'</td>
      <td>'.$Data[4].'</td>
      <td>'.$Data[5].'</td>
      <td>'.$Data[6].'</td>
      <td style="text-align:center;">'.$Data[7].'</td>
    </tr>';
  $Data = explode("$",$RPS['Minggu11']); $CPM = explode("|",$Data[0]); $CP = ""; for ($i=1; $i < count($CPM); $i++) { if ($CPM[$i] != "") { $CP .= $CPM[$i][0].$CPM[$i][3].'<br/>'; } }
  $Materi .= '<tr>
      <td style="text-align:center;">11</td>
      <td>'.$CPM[0].'<br/><b>'.$CP.'</b></td>
      <td>'.$Data[1].'</td>
      <td>'.$Data[2].'</td>
      <td style="text-align:center;">'.$Data[3].'</td>
      <td>'.$Data[4].'</td>
      <td>'.$Data[5].'</td>
      <td>'.$Data[6].'</td>
      <td style="text-align:center;">'.$Data[7].'</td>
    </tr>';
  $Data = explode("$",$RPS['Minggu12']); $CPM = explode("|",$Data[0]); $CP = ""; for ($i=1; $i < count($CPM); $i++) { if ($CPM[$i] != "") { $CP .= $CPM[$i][0].$CPM[$i][3].'<br/>'; } }
  $Materi .= '<tr>
      <td style="text-align:center;">12</td>
      <td>'.$CPM[0].'<br/><b>'.$CP.'</b></td>
      <td>'.$Data[1].'</td>
      <td>'.$Data[2].'</td>
      <td style="text-align:center;">'.$Data[3].'</td>
      <td>'.$Data[4].'</td>
      <td>'.$Data[5].'</td>
      <td>'.$Data[6].'</td>
      <td style="text-align:center;">'.$Data[7].'</td>
    </tr>';
  $Data = explode("$",$RPS['Minggu13']); $CPM = explode("|",$Data[0]); $CP = ""; for ($i=1; $i < count($CPM); $i++) { if ($CPM[$i] != "") { $CP .= $CPM[$i][0].$CPM[$i][3].'<br/>'; } }
  $Materi .= '<tr>
      <td style="text-align:center;">13</td>
      <td>'.$CPM[0].'<br/><b>'.$CP.'</b></td>
      <td>'.$Data[1].'</td>
      <td>'.$Data[2].'</td>
      <td style="text-align:center;">'.$Data[3].'</td>
      <td>'.$Data[4].'</td>
      <td>'.$Data[5].'</td>
      <td>'.$Data[6].'</td>
      <td style="text-align:center;">'.$Data[7].'</td>
    </tr>';
  $Data = explode("$",$RPS['Minggu14']); $CPM = explode("|",$Data[0]); $CP = ""; for ($i=1; $i < count($CPM); $i++) { if ($CPM[$i] != "") { $CP .= $CPM[$i][0].$CPM[$i][3].'<br/>'; } }
  $Materi .= '<tr>
      <td style="text-align:center;">14</td>
      <td>'.$CPM[0].'<br/><b>'.$CP.'</b></td>
      <td>'.$Data[1].'</td>
      <td>'.$Data[2].'</td>
      <td style="text-align:center;">'.$Data[3].'</td>
      <td>'.$Data[4].'</td>
      <td>'.$Data[5].'</td>
      <td>'.$Data[6].'</td>
      <td style="text-align:center;">'.$Data[7].'</td>
    </tr>';
  $Data = explode("$",$RPS['Minggu15']); $CPM = explode("|",$Data[0]); $CP = ""; for ($i=1; $i < count($CPM); $i++) { if ($CPM[$i] != "") { $CP .= $CPM[$i][0].$CPM[$i][3].'<br/>'; } }
  $Materi .= '<tr>
      <td style="text-align:center;">15</td>
      <td>'.$CPM[0].'<br/><b>'.$CP.'</b></td>
      <td>'.$Data[1].'</td>
      <td>'.$Data[2].'</td>
      <td style="text-align:center;">'.$Data[3].'</td>
      <td>'.$Data[4].'</td>
      <td>'.$Data[5].'</td>
      <td>'.$Data[6].'</td>
      <td style="text-align:center;">'.$Data[7].'</td>
    </tr>';
  $Data = explode("$",$RPS['Minggu16']); $CPM = explode("|",$Data[0]); $CP = ""; for ($i=1; $i < count($CPM); $i++) { if ($CPM[$i] != "") { $CP .= $CPM[$i][0].$CPM[$i][3].'<br/>'; } }
  $Materi .= '<tr>
      <td style="text-align:center;">16</td>
      <td>'.$CPM[0].'<br/><b>'.$CP.'</b></td>
      <td>'.$Data[1].'</td>
      <td>'.$Data[2].'</td>
      <td style="text-align:center;">'.$Data[3].'</td>
      <td>'.$Data[4].'</td>
      <td>'.$Data[5].'</td>
      <td>'.$Data[6].'</td>
      <td style="text-align:center;">'.$Data[7].'</td>
    </tr>';
  $Materi .= '</table><br pagebreak="true"/>';
  $pdf->writeHTML($Materi, true, false, true, false, '');
  $Nugas = explode("$",$RPS['Tugas']);
  $Tugas = '<h4>1. RUBRIK PENILAIAN TUGAS</h4><table cellpadding="2" border="1">
    <tr style="font-weight:bold;">
      <td style="width:60%;"> BENTUK TUGAS</td>
      <td style="width:40%;"> WAKTU PENGERJAAN TUGAS</td>
    </tr>
    <tr>
      <td style="width:60%;"> '.$Nugas[0].'</td>
      <td style="width:40%;"> '.$Nugas[1].'</td>
    </tr>
    <tr style="font-weight:bold;">
      <td colspan="2"> JUDUL TUGAS</td>
    </tr>
    <tr>
      <td colspan="2"> '.$Nugas[2].'</td>
    </tr>
    <tr style="font-weight:bold;">
      <td colspan="2"> SUB CAPAIAN PEMBELAJARAN MATA KULIAH</td>
    </tr>
    <tr>
      <td colspan="2">'.$Nugas[3].'</td>
    </tr>
    <tr style="font-weight:bold;">
      <td colspan="2"> DESKRIPSI TUGAS</td>
    </tr>
    <tr>
      <td colspan="2">'.$Nugas[4].'</td>
    </tr>
    <tr style="font-weight:bold;">
      <td colspan="2"> METODE PENGERJAAN TUGAS</td>
    </tr>
    <tr>
      <td colspan="2">'.$Nugas[5].'</td>
    </tr>
    <tr style="font-weight:bold;">
      <td colspan="2"> BENTUK DAN FORMAT LUARAN</td>
    </tr>
    <tr>
      <td colspan="2">'.$Nugas[6].'</td>
    </tr>
    <tr style="font-weight:bold;">
      <td colspan="2"> JADWAL PELAKSANAAN</td>
    </tr>
    <tr>
      <td colspan="2">'.$Nugas[7].'</td>
    </tr>
    <tr style="font-weight:bold;">
      <td colspan="2"> LAIN LAIN</td>
    </tr>
    <tr>
      <td colspan="2">'.$Nugas[8].'</td>
    </tr>
    <tr style="font-weight:bold;">
      <td colspan="2"> DAFTAR RUJUKAN</td>
    </tr>
    <tr>
      <td colspan="2">'.$Nugas[9].'</td>
    </tr>
  </table><br pagebreak="true"/><h4>2. RUBRIK PENILAIAN TUGAS</h4><table cellpadding="2" border="1">
  <tr style="font-weight:bold;">
    <td style="width:60%;"> BENTUK TUGAS</td>
    <td style="width:40%;"> WAKTU PENGERJAAN TUGAS</td>
  </tr>
  <tr>
    <td style="width:60%;"> '.$Nugas[10].'</td>
    <td style="width:40%;"> '.$Nugas[11].'</td>
  </tr>
  <tr style="font-weight:bold;">
    <td colspan="2"> JUDUL TUGAS</td>
  </tr>
  <tr>
    <td colspan="2"> '.$Nugas[12].'</td>
  </tr>
  <tr style="font-weight:bold;">
    <td colspan="2"> SUB CAPAIAN PEMBELAJARAN MATA KULIAH</td>
  </tr>
  <tr>
    <td colspan="2">'.$Nugas[13].'</td>
  </tr>
  <tr style="font-weight:bold;">
    <td colspan="2"> DESKRIPSI TUGAS</td>
  </tr>
  <tr>
    <td colspan="2">'.$Nugas[14].'</td>
  </tr>
  <tr style="font-weight:bold;">
    <td colspan="2"> METODE PENGERJAAN TUGAS</td>
  </tr>
  <tr>
    <td colspan="2">'.$Nugas[15].'</td>
  </tr>
  <tr style="font-weight:bold;">
    <td colspan="2"> BENTUK DAN FORMAT LUARAN</td>
  </tr>
  <tr>
    <td colspan="2">'.$Nugas[16].'</td>
  </tr>
  <tr style="font-weight:bold;">
    <td colspan="2"> JADWAL PELAKSANAAN</td>
  </tr>
  <tr>
    <td colspan="2">'.$Nugas[17].'</td>
  </tr>
  <tr style="font-weight:bold;">
    <td colspan="2"> LAIN LAIN</td>
  </tr>
  <tr>
    <td colspan="2">'.$Nugas[18].'</td>
  </tr>
  <tr style="font-weight:bold;">
    <td colspan="2"> DAFTAR RUJUKAN</td>
  </tr>
  <tr>
    <td colspan="2">'.$Nugas[19].'</td>
  </tr>
</table>';
  $pdf->writeHTML($Tugas, true, false, true, false, '');
  $Validasi = '<br pagebreak="true"/><b>Metode Pembelajaran : CK (Ceramah Kuliah), SCL (Student Center Learning), SGD (Student Grup Discussion), PK (Presentasi Kelompok), <br> PI (Presentasi Individu),
  PBL (Problem Base Learning)</b><h6></h6><table cellpadding="2" border="1" style="font-weight:bold;">
    <tr>
      <td style="text-align:center;">(C1)<br>Mengingat</td>
      <td style="text-align:center;">(C2)<br>Memahami</td>
      <td style="text-align:center;">(C3)<br>Menerapkan</td>
      <td style="text-align:center;">(C4)<br>Menganalisis</td>
      <td style="text-align:center;">(C5)<br>Mengevaluasi</td>
      <td style="text-align:center;">(C6)<br>Menciptakan</td>
    </tr>
  </table><br><br><table cellpadding="2" border="1" style="font-weight:bold;">
    <tr>
      <td style="text-align:center;">(A1)<br>Menerima</td>
      <td style="text-align:center;">(A2)<br>Merespon</td>
      <td style="text-align:center;">(A3)<br>Menilai</td>
      <td style="text-align:center;">(A4)<br>Mengelola</td>
      <td style="text-align:center;">(A5)<br>Karakterisasi</td>
    </tr>
  </table>
  <br><br><table cellpadding="2" border="1" style="font-weight:bold;">
    <tr>
      <td style="text-align:center;">(P1)<br>Meniru</td>
      <td style="text-align:center;">(P2)<br>Manipulasi</td>
      <td style="text-align:center;">(P3)<br>Presisi</td>
      <td style="text-align:center;">(P4)<br>Artikulasi</td>
      <td style="text-align:center;">(P5)<br>Naturalisasi</td>
    </tr>
  </table>
  <br><br>
  <table cellpadding="2">
    <tr style="font-size:8pt;">
      '.$Satu.$Dua.$Tiga.$Empat.'
    </tr><tr><td></td></tr>
    <tr style="font-size:8pt;">
      <td style="width:33.3%;text-align:center;"></td>
      '.$KPS.'
      <td style="width:33.3%;text-align:center;"></td>
    </tr>
  </table>';
  $pdf->writeHTML($Validasi, true, false, true, false, '');
  $pdf->Output('RPS_'.$RPS['NamaMK'].'.pdf', 'I');
 ?>