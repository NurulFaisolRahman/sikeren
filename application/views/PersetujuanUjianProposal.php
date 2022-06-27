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
    <td colspan="2"><p style="text-align:center;"><b>PERSETUJUAN UJIAN PROPOSAL SKRIPSI</b></p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="3"><p><br>Yang Bertanda Tangan Dibawah ini, Tim Penguji Ujian Proposal Skripsi Bagi Mahasiswa : </p></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="3" style="line-height: 200%;"><p>Nama : '.$Mhs['Nama'].'</p></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="3"><p>NIM : '.$Mhs['NIM'].'</p></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="3"><p>Jurusan : Ilmu Ekonomi</p></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="3"><p>Program Studi : Ekonomi Pembangunan</p></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="3"><p>Konsentrasi : '.$Mhs['Konsentrasi'].'</p></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="3"><p>Judul Skripsi : '.$Mhs['JudulProposal'].'</p></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="3"><p><br>Yang Akan Dilaksanakan Pada : </p></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="3"><p>Tanggal : '.$Tanggal.'</p></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="3"><p>Jam : 08.00 - Selesai</p></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="3"><p>Tempat : Ruang Sidang EP</p></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2">
      <span><br>
        <table style="border:solid black 1px;" cellpadding="5">
          <tr>
            <td style="width:7%;border:solid black 1px;text-align:center;">No</td> 
            <td style="width:68%;border:solid black 1px;">&nbsp;Nama Tim Penguji</td> 
            <td style="width:24%;text-align:center;border:solid black 1px;">&nbsp;Tanda Tangan</td> 
          </tr>
          <tr>
            <td style="width:7%;border:solid black 1px;text-align:center;">1</td> 
            <td style="width:68%;border:solid black 1px;">&nbsp;Ketua Penguji : <br>&nbsp;'.$NamaKetua.'</td> 
            <td style="width:24%;text-align:center;border:solid black 1px;padding:5px;"><img src="img/'.$Ketua.'" alt="ttd1" width="40px"></td> 
          </tr>
          <tr>
            <td style="width:7%;border:solid black 1px;text-align:center;">2</td> 
            <td style="width:68%;border:solid black 1px;">&nbsp;Anggota Penguji : <br>&nbsp;'.$NamaAnggota.'</td>
            <td style="width:24%;text-align:center;border:solid black 1px;padding:5px;"><img src="img/'.$Anggota.'" alt="ttd1" width="40px"></td> 
          </tr>
          <tr>
            <td style="width:7%;border:solid black 1px;text-align:center;">3</td> 
            <td style="width:68%;border:solid black 1px;">&nbsp;Pembimbing : <br>&nbsp;'.$Mhs['NamaPembimbing'].'</td> 
            <td style="width:24%;text-align:center;border:solid black 1px;padding:5px;"><img src="img/'.$Sekretaris.'" alt="ttd1" width="40px"></td> 
          </tr>
        </table>
      </span>
    </td>
    <td></td>
  </tr>
</table>
<table>
  <tr>
    <td style="width:55%;"></td>
    <td style="width:45%;"><p>Bangkalan,<br>Koordinator Program Studi</p></td> 
  </tr>
  <tr>
    <td></td>
    <td><img src="img/22.png" alt="SignatureKPS" width="50px"></td>
  </tr>
  <tr>
    <td></td>
    <td><p>Titov Chuk'."'".'s Mayvani, SE., ME.</p></td>
  </tr>
  <tr>
    <td></td>
    <td><p>NIP. 198303282015041001</p></td>
  </tr>
</table>
';
  $pdf->writeHTML($html, true, false, true, false, '');
  $pdf->Output('Undangan_Ujian_Proposal.pdf', 'I');
 ?>