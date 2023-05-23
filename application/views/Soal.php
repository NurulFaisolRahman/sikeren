<?php 
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  $pdf->SetFont('times', 12);
  $pdf->setPrintHeader(FALSE);  
  $pdf->setPrintFooter(TRUE);         
  $pdf->setLeftMargin(10);
  $pdf->setRightMargin(10);
  $pdf->SetAuthor('nurulfaisolrahman@gmail.com');
  $pdf->SetDisplayMode('real', 'default');
  $pdf->SetAutoPageBreak(TRUE, 10);
  $pdf->SetFooterMargin(10);
  $pdf->AddPage('P', 'A4');
  if ($Soal['Semester'] % 2 == 0) {
    $SMT = 'GENAP '.($Soal['Tahun']-1).'/'.$Soal['Tahun'];
  } else {
    $SMT = 'GASAL '.$Soal['Tahun'].'/'.$Soal['Tahun']+1;
  }
  if ($Jenis == 'TENGAH') {
    $Ujian = '<td style="width:55%;">: '.$Soal['NamaMK'].'<br>: '.$Soal['Nama'].'<br>: '.$Soal['SifatUTS'].'<br>: '.$Soal['WaktuUTS'].'<br>: '.$Soal['CatatanUTS'].'</td>';
    $SOAL = $Soal['SoalUTS'];
  } else {
    $Ujian = '<td style="width:55%;">: '.$Soal['NamaMK'].'<br>: '.$Soal['Nama'].'<br>: '.$Soal['SifatUAS'].'<br>: '.$Soal['WaktuUAS'].'<br>: '.$Soal['CatatanUAS'].'</td>';
    $SOAL = $Soal['SoalUAS'];
  }
  $html = '<table border="0">
  <tr>
    <td rowspan="2" style="width:5%;"></td>
    <td rowspan="2" style="width:20%;text-align:center;"><img src="img/LogoUTM.png" width="100" alt="Logo UTM"></td>
    <td style="width:55%;"></td>
    <td style="width:20%;"></td>
  </tr> 
  <tr>
    <td style="width:75%;"><p style="margin:20px;"><b>KEMENTERIAN RISET TEKNOLOGI DAN PENDIDIKAN TINGGI<br>UNIVERSITAS TRUNOJOYO MADURA<br>FAKULTAS EKONOMI DAN BISNIS<br>JURUSAN ILMU EKONOMI<br>PROGRAM STUDI EKONOMI PEMBANGUNAN</b></p></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><hr></td>
  </tr>
  <tr>
    <td style="text-align:center;" colspan="3"><b>UJIAN '.$Jenis.' SEMESTER '.$SMT.'</b></td>
  </tr>
  <br>
  <tr>
    <td></td>
    <td><b>Mata Kuliah<br>Dosen Pengampu<br>Sifat Ujian<br>Waktu Ujian<br>Catatan</b></td>'.$Ujian.'<td style="width:20%;"><img src="img/24.png" width="70" alt="Logo UTM"></td>
  </tr>
  <br>
  <tr>
    <td></td>
    <td colspan="3">'.$SOAL.'</td>
  </tr>
</table>';
  $pdf->writeHTML($html, true, false, true, false, '');
  $pdf->Output('Soal.pdf', 'I');
 ?>