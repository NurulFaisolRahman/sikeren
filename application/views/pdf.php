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
    <td rowspan="7" style="width:8%;"></td>
    <td rowspan="7" style="width:20%;text-align:center;"><img src="img/LogoUTM.png" alt="Logo UTM"></td>
    <td style="width:64%;"></td>
    <td rowspan="7" style="width:8%;"></td>
  </tr> 
  <tr>
    <td style="width:64%;"><p style="text-align:center;margin:20px;"><b>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI </b></p></td>
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
    <td colspan="3"><p style="text-align:right;"><br>Tanggal : '.date("d-m-Y").'</p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="3"><p><br>Kepada Yth,<br>Bapak / Ibu<br>Di Tempat</p></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><p><br><br>Dengan hormat,<br>Melalui surat ini, kami menyatakan bahwa yang tercantum dibawah ini :</p></td>
    <td></td>
  </tr>
  <tr>
    <td colspan="4"></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><p>Nama	: '.$this->session->userdata('NamaDosen').'</p></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td colspan="2"><p>NIP : '.$this->session->userdata('NIPDosen').'</p></td>
    <td></td>
  </tr>
</table>
<table>
  <tr>
    <td rowspan="6" style="width:8%;"></td>
    <td style="width:84%;"><p style="text-align:justify;"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berdasarkan evaluasi sistem, hasil kinerja yang telah diinput masih terdapat penilaian kinerja yang belum memenuhi target yang ditetapkan pada bidang sebagai berikut :</p></td>
    <td rowspan="6" style="width:8%;"></td>
  </tr>
  <tr>
    <td><p style="text-align:justify;"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. Bidang Pendidikan Semester Genap Tahun 2021</p></td>
  </tr>
  <tr>
    <td><p style="text-align:justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. Bidang Penelitian Semester Genap Tahun 2021</p></td>
  </tr>
  <tr>
    <td><p style="text-align:justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. Bidang Pengabdian Semester Genap Tahun 2021</p></td>
  </tr>
  <tr>
    <td><p style="text-align:justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. Bidang Penunjang Semester Genap Tahun 2021</p></td>
  </tr>
  <tr>
    <td><p style="text-align:justify;"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat pemberitahuan ini kami buat. Mohon yang bersangkutan segera untuk melengkapi target yang belum memenuhi. Atas perhatiannya kami sampaikan terima kasih.</p></td>
  </tr>
</table>  
<table>
  <tr>
    <td style="width:55%;"></td>
    <td style="width:45%;"><p><br><br><br>Bangkalan,</p></td> 
  </tr>
  <tr>
    <td></td>
    <td><p>Ketua Jurusan Ilmu Ekonomi</p></td>
  </tr>
  <tr>
    <td></td>
    <td><img src="img/ttd.png" alt="Signature" width="100px"></td>
  </tr>
  <tr>
    <td></td>
    <td><p>Dr. Sutikno, S.E., M.E</p></td>
  </tr>
  <tr>
    <td></td>
    <td><p>NIP. 197508092008121003</p></td>
  </tr>
</table>
';
  $pdf->writeHTML($html, true, false, true, false, '');
  $pdf->Output('tes.pdf', 'I');
 ?>