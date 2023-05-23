<?php 
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  $pdf->SetFont('times', 12);
  $pdf->setPrintHeader(FALSE);  
  $pdf->setPrintFooter(TRUE);         
  $pdf->setLeftMargin(10);
  $pdf->setRightMargin(10);
  $pdf->SetAuthor('nurulfaisolrahman@gmail.com');
  $pdf->SetDisplayMode('real', 'default');
  $pdf->AddPage('P', 'A4');
  $html = '<table border="0">
  <tr>
    <td rowspan="2" style="width:5%;"></td>
    <td rowspan="2" style="width:20%;text-align:center;"><img src="img/LogoUTM.png" width="100" alt="Logo UTM"></td>
    <td style="width:75%;"></td>
  </tr> 
  <tr>
    <td style="width:75%;"><p style="margin:20px;"><b>KEMENTERIAN RISET TEKNOLOGI DAN PENDIDIKAN TINGGI<br>UNIVERSITAS TRUNOJOYO MADURA<br>FAKULTAS EKONOMI DAN BISNIS<br>JURUSAN ILMU EKONOMI<br>PROGRAM STUDI EKONOMI PEMBANGUNAN</b></p></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><hr></td>
  </tr>
  <tr>
    <td style="text-align:center;" colspan="3"><b>UJIAN TENGAH SEMESTER GENAP 2022/2023</b></td>
  </tr>
  <br>
  <tr>
    <td></td>
    <td><b>Kelas<br>Mata Kuliah<br>Dosen Pengampu<br>Sifat Ujian<br>Waktu Ujian<br>Catatan</b></td>
    <td>:<br>:<br>:<br>: '.$Soal['SifatUTS'].'<br>: '.$Soal['WaktuUTS'].'<br>: '.$Soal['CatatanUTS'].'</td>
  </tr>
  <br>
  <tr>
    <td></td>
    <td colspan="2">'.$Soal['SoalUTS'].'</td>
  </tr>
</table>';
  $pdf->writeHTML($html, true, false, true, false, '');
  $pdf->Output('Soal.pdf', 'I');
 ?>