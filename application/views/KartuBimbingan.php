<?php 
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  $pdf->SetFont('times', 12);
  $pdf->setPrintHeader(false);  
  $pdf->setPrintFooter(false);         
  $pdf->setLeftMargin(10);
  $pdf->SetAuthor('nurulfaisolrahman@gmail.com');
  $pdf->SetDisplayMode('real', 'default');
  $pdf->AddPage('P', 'A4');
  $DataBimbingan = '';$No = 1;
  foreach ($Bimbingan as $key) {
    $DataBimbingan .= '<tr><td style="text-align:center;border:solid black 1px;">'.$No++.'</td> 
    <td style="border:solid black 1px;">&nbsp;'.$key['TanggalBimbingan'].'</td> 
    <td style="border:solid black 1px;">&nbsp;'.$key['PoinBimbingan'].'</td></tr>'; 
  }
  $html = '
  <style>
    table,tr,td{ 
    }
    .Tabel { border:solid black 1px;}
  </style>
<table>
  <tr>
    <td rowspan="8" style="width:7%;"></td>
    <td rowspan="8" style="width:20%;text-align:center;"><img src="img/LogoUTM.png" alt="Logo UTM"></td>
    <td style="width:64%;"></td>
    <td rowspan="8" style="width:7%;"></td>
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
    <td colspan="2"><p style="text-align:center;">KARTU KONSULTASI BIMBINGAN SKRIPSI</p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><p style="text-align:center;">FAKULTAS EKONOMI DAN BISNIS UNIVERSITAS TRUNOJOYO MADURA</p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><p><br>Nama : '.$Mhs['Nama'].'</p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><p>NIM : '.$Mhs['NIM'].'</p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><p>Prodi : Ekonomi Pembangunan</p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><p>Judul : '.$Mhs['JudulProposal'].'</p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><p>Dosen Pembimmbing : '.$DosenPembimbing.'</p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><p>Tanggal Bimbingan Dari : '.$Awal.' s/d '.$Akhir.'</p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2">
      <span><br>
        <table style="border:solid black 1px;">
          <tr>
            <td style="width:6%;text-align:center;border:solid black 1px;">No</td> 
            <td style="width:27%;border:solid black 1px;">&nbsp;Tanggal Konsultasi</td> 
            <td style="width:67%;border:solid black 1px;">&nbsp;Masalah Yang Dibicarakan</td> 
          </tr>'.$DataBimbingan.'
        </table>
      </span>
    </td>
    <td></td>
  </tr>
</table>
<table>
  <tr>
    <td style="width:55%;"></td>
    <td style="width:45%;"><p><br><br><br>Dosen Pembimbing,</p></td> 
  </tr>
  <tr>
    <td></td>
    <td><img src="img/'.$QRCode.'" alt="Signature" width="70px"></td>
  </tr>
  <tr>
    <td></td>
    <td><p>'.$DosenPembimbing.'</p></td>
  </tr>
  <tr>
    <td></td>
    <td><p>NIP : '.$NIP.'</p></td>
  </tr>
</table>
';
  $pdf->writeHTML($html, true, false, true, false, '');
  $pdf->Output('KartuBimbingan.pdf', 'I');
 ?>