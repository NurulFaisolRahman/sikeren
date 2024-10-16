<?php 
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  $pdf->SetFont('times', 12);
  $pdf->setPrintHeader(false);  
  $pdf->setPrintFooter(false);         
  $pdf->setLeftMargin(10);
  $pdf->setTopMargin(5);
  $pdf->setRightMargin(5);
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
    <td style="width:64%;"><p style="text-align:center;margin:20px;"><b>KEMENTERIAN PENDIDIKAN KEBUDAYAAN</b></p></td>
  </tr>
  <tr>
    <td style="width:64%;"><p style="text-align:center;margin:20px;"><b>RISET DAN TEKNOLOGI</b></p></td>
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
    <td colspan="2"><p style="text-align:center;font-size:20px;"><b>BERITA ACARA</b></p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><p style="text-align:center;font-size:20px;"><b>REVISI NILAI UJIAN</b></p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><p><br>Pada Tanggal '.$Tanggal.' Telah Di Setujui Revisi Nilai Ujian Mahasiswa :</p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><p><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIM : '.$Ganti[0]['NIM'].'</p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama : '.$Ganti[0]['Nama'].'</p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><p><br>Alasan Revisi Nilai : '.$Ganti[0]['Alasan'].'</p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2" style="text-align:right;"><p><br>Bangkalan, '.$Tanggal.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br></p></td>
    <td></td>
  </tr>
</table>
<table cellpadding="7">
  <tr>
    <td style="width:8%;"></td>
    <td style="width:64%;"><p><br><br>Penguji : '.$Ganti[0]['Penguji'].'</p></td>
    <td style="width:20%;"><p><img src="img/'.$Ganti[0]['QRCode'].'" alt="ttd1" width="70px"></p></td>
    <td style="width:8%;"></td>
  </tr>
  <tr>
    <td></td>
    <td><p><br><br>Koorprodi : '."Titov Chuk's Mayvani, SE., ME.".'</p></td>
    <td><p><img src="img/22.png" alt="ttd2" width="70px"></p></td>
    <td></td>
  </tr>
</table>';
  $pdf->writeHTML($html, true, false, true, false, '');
  $pdf->Output('Berita_Acara_Ganti_Pembimbing.pdf', 'I');
 ?>