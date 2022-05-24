<?php 
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  $pdf->SetFont('times', 12);
  $pdf->setPrintHeader(false);  
  $pdf->setPrintFooter(false);         
  $pdf->setLeftMargin(10);
  $pdf->SetAuthor('nurulfaisolrahman@gmail.com');
  $pdf->SetDisplayMode('real', 'default');
  $pdf->AddPage('P', 'A4');
  $html = '
  <style>
    table,tr,td{
    }
  </style>
<table>
  <tr>
    <td></td>
  </tr> 
  <tr>
    <td></td>
  </tr> 
  <tr>
    <td rowspan="8" style="width:8%;"></td>
    <td rowspan="8" style="width:20%;text-align:center;"><img src="img/LogoUTM.png" alt="Logo UTM"></td>
    <td style="width:64%;"></td>
    <td rowspan="8" style="width:8%;"></td>
  </tr> 
  <tr>
    <td style="width:64%;"><p style="text-align:center;margin:20px;"><b>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN</b></p></td>
  </tr>
  <tr>
    <td style="width:64%;"><p style="text-align:center;margin:20px;"><b>RISET DAN TEKNOLOGI </b></p></td>
  </tr>
  <tr>
    <td><p style="text-align:center;"><b>UNIVERSITAS TRUNOJOYO MADURA</b></p></td>
  </tr>
  <tr>
    <td><p style="text-align:center;"><b>FAKULTAS EKONOMI DAN BISNIS</b></p></td>
  </tr>
  <tr>
    <td><p style="text-align:center;">Jl. Raya Telang, PO. Box. 2 Kamal, Bangkalan – Madura</p></td>
  </tr>
  <tr>
    <td><p style="text-align:center;">Telp : (031) 3011146, Fax. (031) 3011506</p></td>
  </tr>
  <tr>
    <td><p style="text-align:center;">Laman : www.trunojoyo.ac.id</p></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><hr></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="3"><p>Lampiran : 1 Eksemplar</p></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="3"><p>Perihal : Surat Persetujuan Membimbing</p></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><p><br>Kepada Yth :<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dosen Program Studi S1 Ekonomi Pembangunan<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fakultas Ekonomi dan Bisnis Universitas Trunojoyo Madura</p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><p><br>Sehubungan dengan Pengajuan Dosen Pembimbing Skripsi atas :</p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><p><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama : '.$Mhs['Nama'].'</p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIM : '.$Mhs['NIM'].'</p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Judul : '.$Mhs['JudulProposal'].'</p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><p><br>Maka saya menyetujui untuk menjadi pembimbing dari mahasiswa diatas</p></td>
    <td></td>
  </tr>
</table>
<table>
  <tr>
    <td style="width:55%;"></td>
    <td style="width:45%;"><p><br><br><br>Bangkalan,</p></td> 
  </tr>
  <tr>
    <td></td>
    <td><img src="img/'.$QRCode.'" alt="Signature" width="70px"></td>
  </tr>
  <tr>
    <td></td>
    <td><p>'.explode("$",$Mhs['DosenPembimbing'])[1].'</p></td>
  </tr>
  <tr>
    <td></td>
    <td><p>NIP : '.explode("$",$Mhs['DosenPembimbing'])[0].'</p></td>
  </tr>
</table>
';
  $pdf->writeHTML($html, true, false, true, false, '');
  $pdf->Output('SuratPersetujuanPembimbing.pdf', 'I');
 ?>