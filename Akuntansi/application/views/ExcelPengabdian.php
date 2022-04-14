<?php
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Pengabdian_'.$Filter.'.xls');
?>
<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="ProgId" content="Excel.Sheet"/>
  <meta name="Generator" content="WPS Office ET"/>
<style>
 @page
	{margin:0.50in 0.30in 0.50in 0.30in;
	mso-header-margin:0.30in;
	mso-footer-margin:0.30in;
	mso-horizontal-page-align:center;}
tr
	{mso-height-source:auto;
	mso-ruby-visibility:none;}
col
	{mso-width-source:auto;
	mso-ruby-visibility:none;}
br
	{mso-data-placement:same-cell;}
.font1
	{
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Calibri";
	mso-generic-font-family:auto;
	mso-font-charset:134;}
.font2
	{
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Calibri";
	mso-generic-font-family:auto;
	mso-font-charset:134;}
.font3
	{
	font-size:10.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:"Arial";
	mso-generic-font-family:auto;
	mso-font-charset:134;}
.font4
	{
	font-size:10.0pt;
	font-weight:700;
	font-style:normal;
	text-decoration:none;
	font-family:"Arial";
	mso-generic-font-family:auto;
	mso-font-charset:134;}
.style0
	{mso-number-format:"General";
	text-align:general;
	vertical-align:bottom;
	white-space:nowrap;
	mso-rotate:0;
	color:#000000;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri;
	mso-font-charset:134;
	border:none;
	mso-protection:locked visible;
	mso-style-name:"Normal";
	mso-style-id:0;}
.style16
	{mso-number-format:"General";
	text-align:general;
	vertical-align:bottom;
	white-space:nowrap;
	mso-rotate:0;
	color:#000000;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri;
	mso-font-charset:134;
	border:none;
	mso-protection:locked visible;
	mso-style-name:"Normal 2";}
td
	{mso-style-parent:style0;
	padding-top:1px;
	padding-right:1px;
	padding-left:1px;
	mso-ignore:padding;
	mso-number-format:"General";
	text-align:general;
	vertical-align:bottom;
	white-space:nowrap;
	mso-rotate:0;
	color:#000000;
	font-size:11.0pt;
	font-weight:400;
	font-style:normal;
	text-decoration:none;
	font-family:Calibri;
	mso-font-charset:134;
	border:none;
	mso-protection:locked visible;}
.xl66
	{mso-style-parent:style0;
	mso-pattern:auto none;
	background:#D0CECE;
	
	font-size:10.0pt;
	mso-font-charset:134;}
.xl67
	{mso-style-parent:style0;
	mso-pattern:auto none;
	background:#D0CECE;
	
	font-size:10.0pt;
	font-weight:700;
	mso-font-charset:134;}
.xl68
	{mso-style-parent:style0;
	text-align:center;
	
	font-size:10.0pt;
	mso-font-charset:134;}
.xl69
	{mso-style-parent:style0;
	mso-number-format:"\@";
	text-align:right;
	vertical-align:middle;
	
	font-size:10.0pt;
	mso-font-charset:134;}
.xl70
	{mso-style-parent:style0;
	
	font-size:10.0pt;
	mso-font-charset:134;}
.xl71
	{mso-style-parent:style0;
	text-align:center;
	
	font-size:10.0pt;
	mso-font-charset:134;}
.xl72
	{mso-style-parent:style0;
	
	font-size:10.0pt;
	mso-font-charset:134;}
.xl73
	{mso-style-parent:style16;
	text-align:left;
	
	font-size:10.0pt;
	font-family:Arial;
	mso-font-charset:134;}
.xl74
	{mso-style-parent:style0;
	vertical-align:middle;
	
	font-size:10.0pt;
	mso-font-charset:134;}
.xl75
	{mso-style-parent:style0;
	text-align:center;
	
	font-size:10.0pt;
	font-weight:700;
	font-family:Arial;
	mso-font-charset:134;}
.xl76
	{mso-style-parent:style0;
	text-align:left;
	
	font-size:10.0pt;
	font-family:Arial;
	mso-font-charset:134;}
.xl77
	{mso-style-parent:style0;
	text-align:left;
	padding-left:54px;
	mso-char-indent-count:2;
	
	font-size:10.0pt;
	font-family:Arial;
	mso-font-charset:134;}
.xl78
	{mso-style-parent:style0;
	
	font-size:10.0pt;
	font-family:Arial;
	mso-font-charset:134;}
.xl79
	{mso-style-parent:style0;
	text-align:left;
	padding-left:54px;
	mso-char-indent-count:2;
	
	font-size:10.0pt;
	mso-font-charset:134;}
.xl80
	{mso-style-parent:style0;
	text-align:left;
	
	font-size:10.0pt;
	mso-font-charset:134;}
.xl81
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	white-space:normal;
	mso-pattern:auto none;
	background:#D0CECE;
	
	font-size:10.0pt;
	font-weight:700;
	font-family:Arial;
	mso-font-charset:134;
	border:.5pt solid ;}
.xl82
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	mso-pattern:auto none;
	background:#D0CECE;
	
	font-size:10.0pt;
	font-weight:700;
	font-family:Arial;
	mso-font-charset:134;
	border-left:.5pt solid ;
	border-top:.5pt solid ;
	border-right:.5pt solid ;}
.xl83
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	white-space:normal;
	mso-pattern:auto none;
	background:#D0CECE;
	
	font-size:10.0pt;
	font-style:italic;
	font-family:Arial;
	mso-font-charset:134;
	border:.5pt solid ;}
.xl84
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	white-space:normal;
	mso-pattern:auto none;
	background:#D0CECE;
	
	font-size:10.0pt;
	font-weight:700;
	font-style:italic;
	font-family:Times New Roman;
	mso-font-charset:134;
	border:.5pt solid ;}
.xl85
	{mso-style-parent:style0;
	text-align:left;
	vertical-align:middle;
	white-space:normal;
	mso-pattern:auto none;
	background:#D0CECE;
	
	font-size:10.0pt;
	font-weight:700;
	font-style:italic;
	font-family:Arial;
	mso-font-charset:134;
	border:.5pt solid ;}
.xl86
	{mso-style-parent:style0;
	text-align:justify;
	vertical-align:middle;
	white-space:normal;
	mso-pattern:auto none;
	background:#D0CECE;
	
	font-size:10.0pt;
	font-weight:700;
	font-style:italic;
	font-family:Arial;
	mso-font-charset:134;
	border:.5pt solid ;}
.xl87
	{mso-style-parent:style0;
	text-align:left;
	vertical-align:middle;
	white-space:normal;
	mso-pattern:auto none;
	background:#D0CECE;
	
	font-size:10.0pt;
	font-weight:700;
	font-family:Arial;
	mso-font-charset:134;
	border:.5pt solid ;}
.xl88
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:top;
	white-space:normal;
	
	font-size:10.0pt;
	font-family:Arial;
	mso-font-charset:134;
	border:.5pt solid ;}
.xl89
	{mso-style-parent:style0;
	vertical-align:top;
	white-space:normal;
	
	font-size:10.0pt;
	font-family:Arial;
	mso-font-charset:134;
	border-left:.5pt solid ;
	border-top:.5pt solid ;
	border-bottom:.5pt solid ;}
.xl90
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	white-space:normal;
	
	font-size:10.0pt;
	font-family:Arial;
	mso-font-charset:134;
	border:.5pt solid ;}
.xl91
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	white-space:normal;
	
	font-size:10.0pt;
	font-family:Arial;
	mso-font-charset:134;
	border:.5pt solid ;}
.xl92
	{mso-style-parent:style0;
	vertical-align:middle;
	white-space:normal;
	mso-pattern:auto none;
	background:#D0CECE;
	
	font-size:10.0pt;
	font-weight:700;
	font-family:Arial;
	mso-font-charset:134;
	border-left:.5pt solid ;}
.xl93
	{mso-style-parent:style0;
	vertical-align:middle;
	white-space:normal;
	mso-pattern:auto none;
	background:#D0CECE;
	
	font-size:10.0pt;
	font-weight:700;
	font-family:Arial;
	mso-font-charset:134;
	border-left:.5pt solid ;
	border-bottom:.5pt solid ;}
.xl94
	{mso-style-parent:style0;
	mso-number-format:"\@";
	text-align:right;
	
	font-size:10.0pt;
	mso-font-charset:134;}
.xl95
	{mso-style-parent:style0;
	text-align:left;
	padding-left:54px;
	mso-char-indent-count:2;
	
	font-size:10.0pt;
	font-weight:700;
	mso-font-charset:134;}
.xl96
	{mso-style-parent:style16;
	
	font-size:10.0pt;
	mso-font-charset:134;}
.xl97
	{mso-style-parent:style16;
	
	font-family:Bookman Old Style;
	mso-font-charset:134;}
.xl98
	{mso-style-parent:style16;
	vertical-align:middle;
	
	font-family:Bookman Old Style;
	mso-font-charset:134;}
.xl99
	{mso-style-parent:style16;
	text-align:left;
	
	font-size:10.0pt;
	mso-font-charset:134;}
.xl100
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	white-space:normal;
	mso-pattern:auto none;
	background:#D0CECE;
	
	font-size:10.0pt;
	font-weight:700;
	font-family:Arial;
	mso-font-charset:134;
	border-left:.5pt solid ;
	border-top:.5pt solid ;
	border-right:.5pt solid ;}
.xl101
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	
	font-size:10.0pt;
	font-family:Arial;
	mso-font-charset:134;
	border:.5pt solid ;}
.xl102
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	white-space:normal;
	mso-pattern:auto none;
	background:#D0CECE;
	
	font-size:10.0pt;
	font-weight:700;
	mso-font-charset:134;
	border-right:.5pt solid ;
	border-bottom:.5pt solid ;}
.xl103
	{mso-style-parent:style53;
	mso-number-format:"General";;
	text-align:center;
	vertical-align:middle;
	mso-pattern:auto none;
	background:#D0CECE;
	font-size:10.0pt;
	font-weight:700;
	font-family:Arial;
	border-left:.5pt solid ;}
.xl104
	{mso-style-parent:style0;
	text-align:center;
	vertical-align:middle;
	white-space:normal;
	mso-pattern:auto none;
	background:#D0CECE;
	
	font-size:10.0pt;
	font-weight:700;
	mso-font-charset:134;
	border-left:.5pt solid ;
	border-right:.5pt solid ;
	border-bottom:.5pt solid ;}
.xl105
	{mso-style-parent:style0;
	vertical-align:middle;
	white-space:normal;
	mso-pattern:auto none;
	background:#D0CECE;
	
	font-size:10.0pt;
	font-weight:700;
	mso-font-charset:134;
	border-left:.5pt solid ;
	border-bottom:.5pt solid ;}
.xl106
	{mso-style-parent:style0;
	text-align:left;
	vertical-align:middle;
	
	font-size:10.0pt;
	font-weight:700;
	font-family:Arial;
	mso-font-charset:134;}
.xl108
	{mso-style-parent:style0;
	
	vertical-align:middle;
	font-size:10.0pt;
	font-weight:700;
	font-family:Arial;
	mso-font-charset:134;}
 </style>
   <xml>
    <x:ExcelWorkbook>
     <x:ExcelWorksheets>
      <x:ExcelWorksheet>
       <x:Name>Pengabdian</x:Name>
       <x:WorksheetOptions>
        <x:Selected/>
        <x:Panes>
         <x:Pane>
          <x:Number>3</x:Number>
          <x:ActiveCol>0</x:ActiveCol>
          <x:ActiveRow>0</x:ActiveRow>
         </x:Pane>
        </x:Panes>
        <x:ProtectContents>False</x:ProtectContents>
        <x:ProtectObjects>False</x:ProtectObjects>
        <x:ProtectScenarios>False</x:ProtectScenarios>
        <x:ShowPageBreakZoom/>
        <x:PageBreakZoom>88</x:PageBreakZoom>
        <x:Zoom>110</x:Zoom>
        <x:Print>
         <x:ValidPrinterInfo/>
         <x:PaperSizeIndex>300</x:PaperSizeIndex>
         <x:Scale>68</x:Scale>
         <x:VerticalResolution>-3</x:VerticalResolution>
        </x:Print>
       </x:WorksheetOptions>
      </x:ExcelWorksheet>
     </x:ExcelWorksheets>
     <x:ProtectStructure>False</x:ProtectStructure>
     <x:ProtectWindows>False</x:ProtectWindows>
     <x:SelectedSheets>0</x:SelectedSheets>
     <x:WindowHeight>7695</x:WindowHeight>
     <x:WindowWidth>20490</x:WindowWidth>
    </x:ExcelWorkbook>
    <x:ExcelName>
     <x:Name>Print_Area</x:Name>
     <x:SheetIndex>1</x:SheetIndex>
     <x:Formula>=Pengabdian!$A$1:$I$150</x:Formula>
    </x:ExcelName>
    <x:ExcelName>
     <x:Name>Print_Titles</x:Name>
     <x:SheetIndex>1</x:SheetIndex>
     <x:Formula>=Pengabdian!$37:$38</x:Formula>
    </x:ExcelName>
   </xml>
 </head>
 <body link="blue" vlink="purple" class="xl70">
  <table width="2822.53" border="0" cellpadding="0" cellspacing="0" style='width:2116.90pt;border-collapse:collapse;table-layout:fixed;'>
   <col width="28.53" class="xl68" style='mso-width-source:userset;mso-width-alt:913;'/>
   <col width="397.67" class="xl69" style='mso-width-source:userset;mso-width-alt:12725;'/>
   <col width="116.53" class="xl70" style='mso-width-source:userset;mso-width-alt:3729;'/>
   <col width="93.67" class="xl70" style='mso-width-source:userset;mso-width-alt:2997;'/>
   <col width="86.87" class="xl68" style='mso-width-source:userset;mso-width-alt:2779;'/>
   <col width="72" span="2" class="xl68" style='mso-width-source:userset;mso-width-alt:2304;'/>
   <col width="122.27" class="xl68" style='mso-width-source:userset;mso-width-alt:3912;'/>
   <col width="0" class="xl68" style='display:none;mso-width-source:userset;mso-width-alt:2304;'/>
   <col width="96" class="xl70" style='mso-width-source:userset;mso-width-alt:3072;'/>
   <col width="355.40" class="xl70" style='mso-width-source:userset;mso-width-alt:11372;'/>
   <col width="72" span="7" class="xl70" style='mso-width-source:userset;mso-width-alt:2304;'/>
   <col width="73.13" span="238" class="xl70" style='mso-width-source:userset;mso-width-alt:2340;'/>
   <tr height="22" style='height:16.50pt;'>
    <td class="xl71" height="22" width="28.53" style='height:16.50pt;width:21.40pt;'></td>
    <td class="xl69" width="397.67" style='width:298.25pt;'></td>
    <td class="xl72" width="116.53" style='width:87.40pt;'></td>
    <td class="xl73" width="93.67" style='width:70.25pt;' x:str>SALINAN<font class="font3"><span style='mso-spacerun:yes;'>&nbsp;</span></font></td>
    <td class="xl71" width="86.87" style='width:65.15pt;'></td>
    <td class="xl96" width="72" style='width:54.00pt;'></td>
    <td class="xl97" width="72" style='width:54.00pt;'></td>
    <td class="xl98" width="122.27" style='width:91.70pt;'></td>
    <td class="xl98" width="0" style='width:0.00pt;'></td>
    <td class="xl72" width="96" style='width:72.00pt;'></td>
    <td width="355.40" style='width:266.55pt;'></td>
    <td width="72" style='width:54.00pt;'></td>
    <td width="72" style='width:54.00pt;'></td>
    <td width="72" style='width:54.00pt;'></td>
    <td width="72" style='width:54.00pt;'></td>
    <td width="72" style='width:54.00pt;'></td>
    <td width="72" style='width:54.00pt;'></td>
    <td width="72" style='width:54.00pt;'></td>
    <td class="xl72" width="73.13" style='width:54.85pt;'></td>
    <td class="xl72" width="73.13" style='width:54.85pt;'></td>
    <td class="xl72" width="73.13" style='width:54.85pt;'></td>
    <td class="xl72" width="73.13" style='width:54.85pt;'></td>
    <td class="xl72" width="73.13" style='width:54.85pt;'></td>
    <td class="xl72" width="73.13" style='width:54.85pt;'></td>
    <td class="xl72" width="73.13" style='width:54.85pt;'></td>
    <td class="xl72" width="73.13" style='width:54.85pt;'></td>
    <td class="xl70" width="73.13" style='width:54.85pt;'></td>
    <td class="xl70" width="73.13" style='width:54.85pt;'></td>
    <td class="xl70" width="73.13" style='width:54.85pt;'></td>
    <td class="xl70" width="73.13" style='width:54.85pt;'></td>
   </tr>
   <tr height="22" style='height:16.50pt;'>
    <td class="xl71" height="22" style='height:16.50pt;'></td>
    <td class="xl69"></td>
    <td class="xl72"></td>
    <td class="xl73" x:str>LAMPIRAN IV</td>
    <td class="xl71"></td>
    <td class="xl96"></td>
    <td class="xl97"></td>
    <td class="xl98"></td>
    <td class="xl98"></td>
    <td class="xl72"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="22" style='height:16.50pt;'>
    <td class="xl71" height="22" style='height:16.50pt;'></td>
    <td class="xl69"></td>
    <td class="xl72"></td>
    <td class="xl73" colspan="2" style='mso-ignore:colspan;' x:str>PERATURAN BERSAMA</td>
    <td class="xl96"></td>
    <td class="xl97"></td>
    <td class="xl98"></td>
    <td class="xl98"></td>
    <td class="xl72"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="22" style='height:16.50pt;'>
    <td class="xl71" height="22" style='height:16.50pt;'></td>
    <td class="xl69"></td>
    <td class="xl72"></td>
    <td class="xl73" colspan="4" style='mso-ignore:colspan;' x:str>MENTERI PENDIDIKAN DAN KEBUDAYAAN DAN</td>
    <td class="xl98"></td>
    <td class="xl98"></td>
    <td class="xl72"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl70"></td>
    <td class="xl70" colspan="2" style='mso-ignore:colspan;'></td>
    <td class="xl70"></td>
   </tr>
   <tr height="22" style='height:16.50pt;'>
    <td class="xl71" height="22" style='height:16.50pt;'></td>
    <td class="xl69"></td>
    <td class="xl72"></td>
    <td class="xl73" colspan="4" style='mso-ignore:colspan;' x:str>KEPALA BADAN KEPEGAWAIAN NEGARA<font class="font3"><span style='mso-spacerun:yes;'>&nbsp;</span></font></td>
    <td class="xl98"></td>
    <td class="xl98"></td>
    <td class="xl72"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="22" style='height:16.50pt;'>
    <td class="xl71" height="22" style='height:16.50pt;'></td>
    <td class="xl69"></td>
    <td class="xl72"></td>
    <td class="xl73" colspan="2" style='mso-ignore:colspan;' x:str>NOMOR : 4/VIII/PB/2014</td>
    <td class="xl96"></td>
    <td class="xl97"></td>
    <td class="xl98"></td>
    <td class="xl98"></td>
    <td class="xl72"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="22" style='height:16.50pt;'>
    <td class="xl71" height="22" style='height:16.50pt;'></td>
    <td class="xl69"></td>
    <td class="xl72"></td>
    <td class="xl73" colspan="2" style='mso-ignore:colspan;' x:str>NOMOR : 24 TAHUN 2014</td>
    <td class="xl96"></td>
    <td class="xl97"></td>
    <td class="xl98"></td>
    <td class="xl98"></td>
    <td class="xl72"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="22" style='height:16.50pt;'>
    <td class="xl71" height="22" style='height:16.50pt;'></td>
    <td class="xl69"></td>
    <td class="xl72"></td>
    <td class="xl73" x:str>TENTANG</td>
    <td class="xl71"></td>
    <td class="xl96"></td>
    <td class="xl97"></td>
    <td class="xl98"></td>
    <td class="xl98"></td>
    <td class="xl72"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="22" style='height:16.50pt;'>
    <td class="xl71" height="22" style='height:16.50pt;'></td>
    <td class="xl69"></td>
    <td class="xl72"></td>
    <td class="xl73" colspan="4" style='mso-ignore:colspan;' x:str>KETENTUAN PELAKSANAAN PERATURAN MENTERI<font class="font3"><span style='mso-spacerun:yes;'>&nbsp;</span></font></td>
    <td class="xl99"></td>
    <td class="xl98"></td>
    <td class="xl72"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="22" style='height:16.50pt;'>
    <td class="xl71" height="22" style='height:16.50pt;'></td>
    <td class="xl69"></td>
    <td class="xl72"></td>
    <td class="xl73" colspan="5" style='mso-ignore:colspan;' x:str>PENDAYAGUNAAN APARATUR NEGARA DAN REFORMASI</td>
    <td class="xl98"></td>
    <td class="xl72"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="22" style='height:16.50pt;'>
    <td class="xl72" height="22" style='height:16.50pt;'></td>
    <td class="xl74"></td>
    <td class="xl72"></td>
    <td class="xl73" x:str>BIROKRASI<font class="font3"><span style='mso-spacerun:yes;'>&nbsp; </span></font><font class="font3">NOMOR 17 TAHUN 2013 TENTANG JABATAN</font></td>
    <td class="xl99"></td>
    <td class="xl99"></td>
    <td class="xl99"></td>
    <td class="xl99"></td>
    <td class="xl98"></td>
    <td class="xl72"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="22" style='height:16.50pt;'>
    <td class="xl72" height="22" style='height:16.50pt;'></td>
    <td class="xl74"></td>
    <td class="xl72"></td>
    <td class="xl73" colspan="4" style='mso-ignore:colspan;' x:str>FUNGSIONAL<font class="font3"><span style='mso-spacerun:yes;'>&nbsp; </span></font><font class="font3">DOSEN DAN ANGKA KREDITNYA,</font><font class="font3"><span style='mso-spacerun:yes;'>&nbsp;</span></font></td>
    <td class="xl98"></td>
    <td class="xl98"></td>
    <td class="xl72"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="22" style='height:16.50pt;'>
    <td class="xl72" height="22" style='height:16.50pt;'></td>
    <td class="xl74"></td>
    <td class="xl72"></td>
    <td class="xl73" colspan="5" style='mso-ignore:colspan;' x:str>SEBAGAIMANA<font class="font3"><span style='mso-spacerun:yes;'>&nbsp; </span></font><font class="font3">TELAH DIUBAH DENGAN PERATURAN</font><font class="font3"><span style='mso-spacerun:yes;'>&nbsp;</span></font></td>
    <td class="xl98"></td>
    <td class="xl72"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="22" style='height:16.50pt;'>
    <td class="xl72" height="22" style='height:16.50pt;'></td>
    <td class="xl74"></td>
    <td class="xl72"></td>
    <td class="xl73" colspan="5" style='mso-ignore:colspan;' x:str>MENTERI PENDAYAGUNAAN APARATUR NEGARA DAN<font class="font3"><span style='mso-spacerun:yes;'>&nbsp;</span></font></td>
    <td class="xl98"></td>
    <td class="xl72"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="22" style='height:16.50pt;'>
    <td class="xl72" height="22" style='height:16.50pt;'></td>
    <td class="xl74"></td>
    <td class="xl72"></td>
    <td class="xl73" colspan="4" style='mso-ignore:colspan;' x:str>REFORMASI BIROKRASI REPUBLIK INDONESIA<font class="font3"><span style='mso-spacerun:yes;'>&nbsp;</span></font></td>
    <td class="xl98"></td>
    <td class="xl98"></td>
    <td class="xl72"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="22" style='height:16.50pt;'>
    <td class="xl72" height="22" style='height:16.50pt;'></td>
    <td class="xl74"></td>
    <td class="xl72"></td>
    <td class="xl73" colspan="2" style='mso-ignore:colspan;' x:str>NOMOR 46 TAHUN 2013</td>
    <td class="xl96"></td>
    <td class="xl97"></td>
    <td class="xl98"></td>
    <td class="xl98"></td>
    <td class="xl72"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl72" height="19" style='height:14.25pt;'></td>
    <td class="xl74"></td>
    <td class="xl72" colspan="2" style='mso-ignore:colspan;'></td>
    <td class="xl72" colspan="4" style='mso-ignore:colspan;'></td>
    <td class="xl71"></td>
    <td class="xl72"></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl72" colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl75" height="19" colspan="9" style='height:14.25pt;border-right:none;border-bottom:none;' x:str>SURAT PERNYATAAN</td>
    <td class="xl72"></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl72" colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl75" height="19" colspan="9" style='height:14.25pt;border-right:none;border-bottom:none;' x:str>MELAKSANAKAN<font class="font4"><span style='mso-spacerun:yes;'>&nbsp; </span></font><font class="font4">PENGABDIAN</font><font class="font4"><span style='mso-spacerun:yes;'>&nbsp; </span></font><font class="font4">KEPADA</font><font class="font4"><span style='mso-spacerun:yes;'>&nbsp; </span></font><font class="font4">MASYARAKAT</font></td>
    <td class="xl72"></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl72" colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl71" height="19" style='height:14.25pt;'></td>
    <td class="xl69"></td>
    <td class="xl72" colspan="2" style='mso-ignore:colspan;'></td>
    <td class="xl71" colspan="5" style='mso-ignore:colspan;'></td>
    <td class="xl72"></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl72" colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl76" height="19" colspan="5" style='height:14.25pt;border-right:none;border-bottom:none;' x:str>Yang bertanda tangan<font class="font3"><span style='mso-spacerun:yes;'>&nbsp; </span></font><font class="font3">di bawah ini :</font></td>
    <td class="xl71" colspan="4" style='mso-ignore:colspan;'></td>
    <td class="xl72"></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl72" colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl77" height="19" colspan="2" style='height:14.25pt;mso-ignore:colspan;' x:str><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;</span><font class="font3">Nama</font><font class="font3"><span style='mso-spacerun:yes;'>&nbsp;</span></font></td>
    <td class="xl78" colspan="2" style='mso-ignore:colspan;' x:str>: Dr. Mohtar Rasyid, S.E.,M.Sc</td>
    <td class="xl80" colspan="3" style='border-right:none;border-bottom:none;'></td>
    <td class="xl71" colspan="2" style='mso-ignore:colspan;'></td>
    <td class="xl72"></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl72" colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl77" height="19" style='height:14.25pt;' x:str><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;</span><font class="font3">NIP</font></td>
    <td class="xl79"></td>
    <td class="xl78" colspan="2" style='mso-ignore:colspan;' x:str>: NIP. 197604152003121001</td>
    <td class="xl80" colspan="2" style='border-right:none;border-bottom:none;'></td>
    <td class="xl72"></td>
    <td class="xl71" colspan="2" style='mso-ignore:colspan;'></td>
    <td class="xl72"></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl72" colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl77" height="19" style='height:14.25pt;' x:str><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;</span><font class="font3">Pangkat / Gol. Ruang</font></td>
    <td class="xl79"></td>
    <td class="xl78" x:str>: Penata / IIIc</td>
    <td class="xl72"></td>
    <td class="xl80" colspan="2" style='border-right:none;border-bottom:none;'></td>
    <td class="xl71" colspan="3" style='mso-ignore:colspan;'></td>
    <td class="xl72"></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl72" colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl77" height="19" style='height:14.25pt;' x:str><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;</span><font class="font3">Jabatan Fungsional</font></td>
    <td class="xl79"></td>
    <td class="xl78" x:str>: Lektor</td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl71"></td>
    <td class="xl71"></td>
    <td class="xl71"></td>
    <td class="xl71"></td>
    <td class="xl72"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl77" height="19" style='height:14.25pt;' x:str><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;</span><font class="font3">Unit Kerja</font></td>
    <td class="xl79"></td>
    <td class="xl78" colspan="4" style='mso-ignore:colspan;' x:str>: Fakultas Ekonomi dan Bisnis Universitas Trunojoyo Madura<font class="font3"><span style='mso-spacerun:yes;'>&nbsp;</span></font></td>
    <td class="xl72"></td>
    <td class="xl71"></td>
    <td class="xl71"></td>
    <td class="xl72"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl79" height="19" style='height:14.25pt;'></td>
    <td class="xl69"></td>
    <td class="xl80"></td>
    <td class="xl79"></td>
    <td class="xl71" colspan="5" style='mso-ignore:colspan;'></td>
    <td class="xl72"></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl72" colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl77" height="19" style='height:14.25pt;' x:str><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;</span><font class="font3">Menyatakan bahwa ;</font></td>
    <td class="xl79"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl71"></td>
    <td class="xl71"></td>
    <td class="xl71"></td>
    <td class="xl71"></td>
    <td class="xl71"></td>
    <td class="xl72"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl77" height="19" colspan="2" style='height:14.25pt;mso-ignore:colspan;' x:str><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;</span><font class="font3">Nama</font><font class="font3"><span style='mso-spacerun:yes;'>&nbsp;</span></font></td>
    <td class="xl78" colspan="2" style='mso-ignore:colspan;' x:str>: <?=$Profil['Nama']?></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl71"></td>
    <td class="xl71"></td>
    <td class="xl71"></td>
    <td class="xl72"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl77" height="19" style='height:14.25pt;' x:str><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;</span><font class="font3">NIP</font></td>
    <td class="xl79"></td>
    <td class="xl76" colspan="4" style='border-right:none;border-bottom:none;' x:str="': 197508092008121003">: <?=$Profil['NIP']?></td>
    <td class="xl71" colspan="3" style='mso-ignore:colspan;'></td>
    <td class="xl72"></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl72" colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl77" height="19" style='height:14.25pt;' x:str><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;</span><font class="font3">Pangkat / Gol. Ruang</font></td>
    <td class="xl79"></td>
    <td class="xl76" colspan="4" style='border-right:none;border-bottom:none;' x:str>: <?=$Profil['Pangkat'].' / '.'('.$Profil['Golongan'].')'?></td>
    <td class="xl71" colspan="3" style='mso-ignore:colspan;'></td>
    <td class="xl72"></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl72" colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl77" height="19" style='height:14.25pt;' x:str><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;</span><font class="font3">Jabatan Fungsional</font></td>
    <td class="xl79"></td>
    <td class="xl76" colspan="4" style='border-right:none;border-bottom:none;' x:str>: <?=$Profil['Jabatan']?></td>
    <td class="xl71" colspan="3" style='mso-ignore:colspan;'></td>
    <td class="xl72"></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl72" colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl77" height="19" style='height:14.25pt;' x:str><span style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp;&nbsp;</span><font class="font3">Unit Kerja</font></td>
    <td class="xl79"></td>
    <td class="xl78" colspan="4" style='mso-ignore:colspan;' x:str>: Fakultas Ekonomi dan Bisnis Universitas Trunojoyo Madura<font class="font3"><span style='mso-spacerun:yes;'>&nbsp;</span></font></td>
    <td class="xl72"></td>
    <td class="xl71"></td>
    <td class="xl71"></td>
    <td class="xl72"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl72"></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl79" height="19" style='height:14.25pt;'></td>
    <td class="xl74"></td>
    <td class="xl72" colspan="2" style='mso-ignore:colspan;'></td>
    <td class="xl72" colspan="3" style='mso-ignore:colspan;'></td>
    <td class="xl71" colspan="2" style='mso-ignore:colspan;'></td>
    <td class="xl72"></td>
    <td colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl72" colspan="8" style='mso-ignore:colspan;'></td>
    <td class="xl70" colspan="4" style='mso-ignore:colspan;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl76" height="19" colspan="8" style='height:14.25pt;border-right:none;border-bottom:none;' x:str>Telah melaksanakan kegiatan pengabdian kepada masyarakat sebagai berikut :</td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl80" height="19" style='height:14.25pt;'></td>
   </tr>
   <tr height="51" class="xl66" style='height:38.25pt;'>
    <td class="xl81" height="51" style='height:38.25pt;' x:str>No</td>
    <td class="xl81" x:str>Uraian Kegiatan</td>
    <td class="xl81" x:str>Tanggal</td>
    <td class="xl82" x:str>Satuan Hasil<font class="font4"><span style='mso-spacerun:yes;'>&nbsp;</span></font></td>
    <td class="xl100" x:str>Jumlah Volume Kegiatan</td>
    <td class="xl100" x:str>Angka Kredit</td>
    <td class="xl81" x:str>Jumlah Angka Kredit</td>
    <td class="xl81" x:str>Ket./ bukti fisik</td>
   </tr>
   <tr height="19" class="xl66" style='height:14.25pt;'>
    <td class="xl83" height="19" style='height:14.25pt;' x:num>1</td>
    <td class="xl83" x:num>2</td>
    <td class="xl83" x:num>3</td>
    <td class="xl83" x:num>4</td>
    <td class="xl83" x:num>5</td>
    <td class="xl83" x:num>6</td>
    <td class="xl83" x:num>7</td>
    <td class="xl83" x:num>8</td>
   </tr>
   <?php 
    $Huruf = 'A'; $Lampiran = $No = 1; $Editor1 = $Editor2 = $Dasar1 = $Dasar2 = $Dasar3 = true; $SubTotal = $Total = 0; $JenisTingkat1 = $JenisTingkat2 = true;
    $PNB1 = $PNB2 = $PNB3 = $PNB4 = $PNB5 = $PNB6 = $PNB7 = true; $Tingkat1 = $Tingkat2 = $Tingkat3 = $Tingkat4 = $Tingkat5 = $Tingkat6 = $Tingkat7 = true;
   ?>
  <?php for ($i=0; $i < count($Pengabdian); $i++) { ?>
    <?php if ($Pengabdian[$i]['IdKegiatan'] == 'PNB1') { ?>
      <?php if ($PNB1) { $PNB1 = false; $No = 1;?>
        <tr class="xl66" style='mso-height-source:userset;'>
          <td style="text-align: center;" class="xl86" x:str><?=$Huruf++?></td>
          <td class="xl87" colspan="7" style='border-right:.5pt solid ;border-bottom:.5pt solid ;' x:str>Menduduki jabatan pimpinan pada lembaga pemerintahan / pejabat negara yang harus dibebaskan dari jabatan organiknya tiap semester.</td>
        </tr>
      <?php } ?>
        <tr style='mso-height-source:userset;'>
          <td class="xl88" x:num><?=$No++?></td>
          <td class="xl89" x:str><?=$Pengabdian[$i]['Kegiatan']?></td>
          <td class="xl90" x:str><?=$Pengabdian[$i]['TanggalKegiatan']?></td>
          <td class="xl91" x:str><?=$Pengabdian[$i]['Satuan']?></td>
          <td class="xl101" x:num><?=$Pengabdian[$i]['Volume']?></td>
          <td class="xl91" x:str><?=str_replace('.',',',$Pengabdian[$i]['Kredit'])?></td>
          <td class="xl91" x:num><?=str_replace('.',',',$Pengabdian[$i]['JumlahKredit'])?></td>
          <td class="xl91" x:str>Lampiran 3.<?=$Lampiran++?></td>
        </tr>
      <?php $SubTotal += $Pengabdian[$i]['JumlahKredit'];  $Total += $Pengabdian[$i]['JumlahKredit'];?>
      <?php if ($i+1 == count($Pengabdian)) { ?>  
        <tr style='mso-height-source:userset;height:18pt;'>
          <td class="xl88" colspan="6" style="text-align: center;font-weight: bold;vertical-align: middle;">Sub Total</td>
          <td class="xl88" style="font-weight: bold;vertical-align: middle;"><?=str_replace('.',',',$SubTotal)?></td>
          <td class="xl88"></td>
        </tr>
      <?php } else if ($Pengabdian[$i+1]['IdKegiatan'] != $Pengabdian[$i]['IdKegiatan']) { ?>
        <tr style='mso-height-source:userset;height:18pt;'>
          <td class="xl88" colspan="6" style="text-align: center;font-weight: bold;vertical-align: middle;">Sub Total</td>
          <td class="xl88" style="font-weight: bold;vertical-align: middle;"><?=str_replace('.',',',$SubTotal)?></td>
          <td class="xl88"></td>
        </tr>
      <?php $SubTotal = 0; } ?>
    <?php } else if ($Pengabdian[$i]['IdKegiatan'] == 'PNB2') { ?>
      <?php if ($PNB2) { $PNB2 = false; $No = 1;?>
        <tr class="xl66" style='mso-height-source:userset;'>
          <td style="text-align: center;" class="xl86" x:str><?=$Huruf++?></td>
          <td class="xl87" colspan="7" style='border-right:.5pt solid ;border-bottom:.5pt solid ;' x:str>Melaksanakan pengembangan hasil pendidikan, dan penelitian yang dapat dimanfaatkan oleh masyarakat / industry setiap program.</td>
        </tr>
      <?php } ?>
        <tr style='mso-height-source:userset;'>
          <td class="xl88" x:num><?=$No++?></td>
          <td class="xl89" x:str><?=$Pengabdian[$i]['Kegiatan']?></td>
          <td class="xl90" x:str><?=$Pengabdian[$i]['TanggalKegiatan']?></td>
          <td class="xl91" x:str><?=$Pengabdian[$i]['Satuan']?></td>
          <td class="xl101" x:num><?=$Pengabdian[$i]['Volume']?></td>
          <td class="xl91" x:str><?=str_replace('.',',',$Pengabdian[$i]['Kredit'])?></td>
          <td class="xl91" x:num><?=str_replace('.',',',$Pengabdian[$i]['JumlahKredit'])?></td>
          <td class="xl91" x:str>Lampiran 3.<?=$Lampiran++?></td>
        </tr>
        <?php $SubTotal += $Pengabdian[$i]['JumlahKredit'];  $Total += $Pengabdian[$i]['JumlahKredit'];?>
      <?php if ($i+1 == count($Pengabdian)) { ?>  
        <tr style='mso-height-source:userset;height:18pt;'>
          <td class="xl88" colspan="6" style="text-align: center;font-weight: bold;vertical-align: middle;">Sub Total</td>
          <td class="xl88" style="font-weight: bold;vertical-align: middle;"><?=str_replace('.',',',$SubTotal)?></td>
          <td class="xl88"></td>
        </tr>
      <?php } else if ($Pengabdian[$i+1]['IdKegiatan'] != $Pengabdian[$i]['IdKegiatan']) { ?>
        <tr style='mso-height-source:userset;height:18pt;'>
          <td class="xl88" colspan="6" style="text-align: center;font-weight: bold;vertical-align: middle;">Sub Total</td>
          <td class="xl88" style="font-weight: bold;vertical-align: middle;"><?=str_replace('.',',',$SubTotal)?></td>
          <td class="xl88"></td>
        </tr>
      <?php $SubTotal = 0; } ?>
      <?php } else if ($Pengabdian[$i]['IdKegiatan'] == 'PNB3') { ?>
        <?php if ($PNB3) { $PNB3 = false; $No = 1;?>
        <tr class="xl66" style='mso-height-source:userset;'>
          <td style="text-align: center;" class="xl86" x:str><?=$Huruf++?></td>
          <td class="xl87" colspan="7" style='border-right:.5pt solid ;border-bottom:.5pt solid ;' x:str>Memberi pelayanan kepada masyarakat atau kegiatan lain yang menunjang pelaksanaan tugas pemerintahan dan pembangunan</td>
        </tr>
      <?php } ?>
      <?php if ((int) $Pengabdian[$i]['Kode'] < 4 && $JenisTingkat1) { $JenisTingkat1 = false;$No = 1; ?>
        <tr class="xl66" style='mso-height-source:userset;'>
          <td style="text-align: center;" class="xl86" x:str></td>
          <td class="xl87" colspan="7" style='border-right:.5pt solid ;border-bottom:.5pt solid ;' x:str>1) Dalam satu semester atau lebih :</td>
        </tr>
      <?php } else if ((int) $Pengabdian[$i]['Kode'] > 3 && $JenisTingkat2) { $JenisTingkat2 = false;$No = 1; ?>
        <tr class="xl66" style='mso-height-source:userset;'>
          <td style="text-align: center;" class="xl86" x:str></td>
          <td class="xl87" colspan="7" style='border-right:.5pt solid ;border-bottom:.5pt solid ;' x:str>2) Kurang dari satu semester dan minimal satu bulan</td>
        </tr>
      <?php } ?>
      <?php if ($Pengabdian[$i]['Kode'] == '1' && $Tingkat1) { $Tingkat1 = false;$No = 1; ?>
        <tr class="xl66" style='mso-height-source:userset;'>
          <td style="text-align: center;" class="xl86" x:str></td>
          <td class="xl87" colspan="7" style='border-right:.5pt solid ;border-bottom:.5pt solid ;' x:str>a) Tingkat Internasional, tiap program</td>
        </tr>
      <?php } else if ($Pengabdian[$i]['Kode'] == '2' && $Tingkat2) { $Tingkat2 = false;$No = 1; ?>
        <tr class="xl66" style='mso-height-source:userset;'>
          <td style="text-align: center;" class="xl86" x:str></td>
          <td class="xl87" colspan="7" style='border-right:.5pt solid ;border-bottom:.5pt solid ;' x:str>b) Tingkat Nasional, tiap program</td>
        </tr>
      <?php } else if ($Pengabdian[$i]['Kode'] == '3' && $Tingkat3) { $Tingkat3 = false;$No = 1; ?>
        <tr class="xl66" style='mso-height-source:userset;'>
          <td style="text-align: center;" class="xl86" x:str></td>
          <td class="xl87" colspan="7" style='border-right:.5pt solid ;border-bottom:.5pt solid ;' x:str>c) Tingkat Lokal, tiap program</td>
        </tr>
      <?php } else if ($Pengabdian[$i]['Kode'] == '4' && $Tingkat4) { $Tingkat4 = false;$No = 1; ?>
        <tr class="xl66" style='mso-height-source:userset;'>
          <td style="text-align: center;" class="xl86" x:str></td>
          <td class="xl87" colspan="7" style='border-right:.5pt solid ;border-bottom:.5pt solid ;' x:str>a) Tingkat Internasional, tiap program</td>
        </tr>
      <?php } else if ($Pengabdian[$i]['Kode'] == '5' && $Tingkat5) { $Tingkat5 = false;$No = 1; ?>
        <tr class="xl66" style='mso-height-source:userset;'>
          <td style="text-align: center;" class="xl86" x:str></td>
          <td class="xl87" colspan="7" style='border-right:.5pt solid ;border-bottom:.5pt solid ;' x:str>b) Tingkat Nasional, tiap program</td>
        </tr>
      <?php } else if ($Pengabdian[$i]['Kode'] == '6' && $Tingkat6) { $Tingkat6 = false;$No = 1; ?>
        <tr class="xl66" style='mso-height-source:userset;'>
          <td style="text-align: center;" class="xl86" x:str></td>
          <td class="xl87" colspan="7" style='border-right:.5pt solid ;border-bottom:.5pt solid ;' x:str>c) Tingkat Lokal, tiap program</td>
        </tr>
      <?php } else if ($Pengabdian[$i]['Kode'] == '7' && $Tingkat7) { $Tingkat7 = false;$No = 1; ?>
        <tr class="xl66" style='mso-height-source:userset;'>
          <td style="text-align: center;" class="xl86" x:str></td>
          <td class="xl87" colspan="7" style='border-right:.5pt solid ;border-bottom:.5pt solid ;' x:str>d) Insidental, tiap program</td>
        </tr>
      <?php } ?>
        <tr style='mso-height-source:userset;'>
          <td class="xl88" x:num><?=$No++?></td>
          <td class="xl89" x:str><?=$Pengabdian[$i]['Kegiatan']?></td>
          <td class="xl90" x:str><?=$Pengabdian[$i]['TanggalKegiatan']?></td>
          <td class="xl91" x:str><?=$Pengabdian[$i]['Satuan']?></td>
          <td class="xl101" x:num><?=$Pengabdian[$i]['Volume']?></td>
          <td class="xl91" x:str><?=str_replace('.',',',$Pengabdian[$i]['Kredit'])?></td>
          <td class="xl91" x:num><?=str_replace('.',',',$Pengabdian[$i]['JumlahKredit'])?></td>
          <td class="xl91" x:str>Lampiran 3.<?=$Lampiran++?></td>
        </tr>
        <?php $SubTotal += $Pengabdian[$i]['JumlahKredit'];  $Total += $Pengabdian[$i]['JumlahKredit'];?>
      <?php if ($i+1 == count($Pengabdian)) { ?>  
        <tr style='mso-height-source:userset;height:18pt;'>
          <td class="xl88" colspan="6" style="text-align: center;font-weight: bold;vertical-align: middle;">Sub Total</td>
          <td class="xl88" style="font-weight: bold;vertical-align: middle;"><?=str_replace('.',',',$SubTotal)?></td>
          <td class="xl88"></td>
        </tr>
      <?php } else if ($Pengabdian[$i+1]['IdKegiatan'] == $Pengabdian[$i]['IdKegiatan']) { ?>
        <?php if ($Pengabdian[$i]['Kode'] != $Pengabdian[$i+1]['Kode']) { ?>  
          <tr style='mso-height-source:userset;height:18pt;'>
            <td class="xl88" colspan="6" style="text-align: center;font-weight: bold;vertical-align: middle;">Sub Total</td>
            <td class="xl88" style="font-weight: bold;vertical-align: middle;"><?=str_replace('.',',',$SubTotal)?></td>
            <td class="xl88"></td>
          </tr>
        <?php $SubTotal = 0; } ?>
      <?php } else if ($Pengabdian[$i+1]['IdKegiatan'] != $Pengabdian[$i]['IdKegiatan']) { ?>
        <tr style='mso-height-source:userset;height:18pt;'>
          <td class="xl88" colspan="6" style="text-align: center;font-weight: bold;vertical-align: middle;">Sub Total</td>
          <td class="xl88" style="font-weight: bold;vertical-align: middle;"><?=str_replace('.',',',$SubTotal)?></td>
          <td class="xl88"></td>
        </tr>
      <?php $SubTotal = 0; } ?>
      <?php } else if ($Pengabdian[$i]['IdKegiatan'] == 'PNB4') { ?>
        <?php if ($PNB4) { $PNB4 = false; $No = 1;?>
        <tr class="xl66" style='mso-height-source:userset;'>
          <td style="text-align: center;" class="xl86" x:str><?=$Huruf++?></td>
          <td class="xl87" colspan="7" style='border-right:.5pt solid ;border-bottom:.5pt solid ;' x:str>Memberi latihan / penyuluhan / penataran / ceramah pada masyarakat, terjadwal / terprogram :</td>
        </tr>
      <?php } ?>
      <?php if ($Pengabdian[$i]['Kode'] == '1' && $Dasar1) { $Dasar1 = false;$No = 1; ?>
        <tr class="xl66" style='mso-height-source:userset;'>
          <td style="text-align: center;" class="xl86" x:str></td>
          <td class="xl87" colspan="7" style='border-right:.5pt solid ;border-bottom:.5pt solid ;' x:str>a) Tingkat Internasional tiap program</td>
        </tr>
      <?php } else if ($Pengabdian[$i]['Kode'] == '2' && $Dasar2) { $Dasar2 = false;$No = 1; ?>
        <tr class="xl66" style='mso-height-source:userset;'>
          <td style="text-align: center;" class="xl86" x:str></td>
          <td class="xl87" colspan="7" style='border-right:.5pt solid ;border-bottom:.5pt solid ;' x:str>b) Tingkat Nasional, tiap program</td>
        </tr>
      <?php } else if ($Pengabdian[$i]['Kode'] == '3' && $Dasar3) { $Dasar3 = false;$No = 1; ?>
        <tr class="xl66" style='mso-height-source:userset;'>
          <td style="text-align: center;" class="xl86" x:str></td>
          <td class="xl87" colspan="7" style='border-right:.5pt solid ;border-bottom:.5pt solid ;' x:str>c) Tingkat Lokal, tiap program</td>
        </tr>
      <?php } ?>
        <tr style='mso-height-source:userset;'>
          <td class="xl88" x:num><?=$No++?></td>
          <td class="xl89" x:str><?=$Pengabdian[$i]['Kegiatan']?></td>
          <td class="xl90" x:str><?=$Pengabdian[$i]['TanggalKegiatan']?></td>
          <td class="xl91" x:str><?=$Pengabdian[$i]['Satuan']?></td>
          <td class="xl101" x:num><?=$Pengabdian[$i]['Volume']?></td>
          <td class="xl91" x:str><?=str_replace('.',',',$Pengabdian[$i]['Kredit'])?></td>
          <td class="xl91" x:num><?=str_replace('.',',',$Pengabdian[$i]['JumlahKredit'])?></td>
          <td class="xl91" x:str>Lampiran 3.<?=$Lampiran++?></td>
        </tr>
        <?php $SubTotal += $Pengabdian[$i]['JumlahKredit'];  $Total += $Pengabdian[$i]['JumlahKredit'];?>
      <?php if ($i+1 == count($Pengabdian)) { ?>  
        <tr style='mso-height-source:userset;height:18pt;'>
          <td class="xl88" colspan="6" style="text-align: center;font-weight: bold;vertical-align: middle;">Sub Total</td>
          <td class="xl88" style="font-weight: bold;vertical-align: middle;"><?=str_replace('.',',',$SubTotal)?></td>
          <td class="xl88"></td>
        </tr>
      <?php } else if ($Pengabdian[$i+1]['IdKegiatan'] == $Pengabdian[$i]['IdKegiatan']) { ?>
        <?php if ($Pengabdian[$i]['Kode'] != $Pengabdian[$i+1]['Kode']) { ?>  
          <tr style='mso-height-source:userset;height:18pt;'>
            <td class="xl88" colspan="6" style="text-align: center;font-weight: bold;vertical-align: middle;">Sub Total</td>
            <td class="xl88" style="font-weight: bold;vertical-align: middle;"><?=str_replace('.',',',$SubTotal)?></td>
            <td class="xl88"></td>
          </tr>
        <?php $SubTotal = 0; } ?>
      <?php } else if ($Pengabdian[$i+1]['IdKegiatan'] != $Pengabdian[$i]['IdKegiatan']) { ?>
        <tr style='mso-height-source:userset;height:18pt;'>
          <td class="xl88" colspan="6" style="text-align: center;font-weight: bold;vertical-align: middle;">Sub Total</td>
          <td class="xl88" style="font-weight: bold;vertical-align: middle;"><?=str_replace('.',',',$SubTotal)?></td>
          <td class="xl88"></td>
        </tr>
      <?php $SubTotal = 0; } ?>
    <?php } else if ($Pengabdian[$i]['IdKegiatan'] == 'PNB5') { ?>
      <?php if ($PNB5) { $PNB5 = false; $No = 1;?>
        <tr class="xl66" style='mso-height-source:userset;'>
          <td style="text-align: center;" class="xl86" x:str><?=$Huruf++?></td>
          <td class="xl87" colspan="7" style='border-right:.5pt solid ;border-bottom:.5pt solid ;' x:str>Membuat / menulis karya pengabdian pada masyarakat yang tidak dipublikasikan,tiap karya</td>
        </tr>
      <?php } ?>
        <tr style='mso-height-source:userset;'>
          <td class="xl88" x:num><?=$No++?></td>
          <td class="xl89" x:str><?=$Pengabdian[$i]['Kegiatan']?></td>
          <td class="xl90" x:str><?=$Pengabdian[$i]['TanggalKegiatan']?></td>
          <td class="xl91" x:str><?=$Pengabdian[$i]['Satuan']?></td>
          <td class="xl101" x:num><?=$Pengabdian[$i]['Volume']?></td>
          <td class="xl91" x:str><?=str_replace('.',',',$Pengabdian[$i]['Kredit'])?></td>
          <td class="xl91" x:num><?=str_replace('.',',',$Pengabdian[$i]['JumlahKredit'])?></td>
          <td class="xl91" x:str>Lampiran 3.<?=$Lampiran++?></td>
        </tr>
        <?php $SubTotal += $Pengabdian[$i]['JumlahKredit'];  $Total += $Pengabdian[$i]['JumlahKredit'];?>
      <?php if ($i+1 == count($Pengabdian)) { ?>  
        <tr style='mso-height-source:userset;height:18pt;'>
          <td class="xl88" colspan="6" style="text-align: center;font-weight: bold;vertical-align: middle;">Sub Total</td>
          <td class="xl88" style="font-weight: bold;vertical-align: middle;"><?=str_replace('.',',',$SubTotal)?></td>
          <td class="xl88"></td>
        </tr>
      <?php } else if ($Pengabdian[$i+1]['IdKegiatan'] != $Pengabdian[$i]['IdKegiatan']) { ?>
        <tr style='mso-height-source:userset;height:18pt;'>
          <td class="xl88" colspan="6" style="text-align: center;font-weight: bold;vertical-align: middle;">Sub Total</td>
          <td class="xl88" style="font-weight: bold;vertical-align: middle;"><?=str_replace('.',',',$SubTotal)?></td>
          <td class="xl88"></td>
        </tr>
      <?php $SubTotal = 0; } ?>
    <?php } else if ($Pengabdian[$i]['IdKegiatan'] == 'PNB6') { ?>
      <?php if ($PNB6) { $PNB6 = false; $No = 1;?>
        <tr class="xl66" style='mso-height-source:userset;'>
          <td style="text-align: center;" class="xl86" x:str><?=$Huruf++?></td>
          <td class="xl87" colspan="7" style='border-right:.5pt solid ;border-bottom:.5pt solid ;' x:str>Hasil kegiatan pengabdian kepada masyarakat yang dipublikasikan di sebuah berkala / jurnal pengabdian kepada masyarakat atau teknologi tepat guna, merupakan diseminasi dari luaran program kegiatan pengabdian kepada masyarakat, tiap karya</td>
        </tr>
      <?php } ?>
        <tr style='mso-height-source:userset;'>
          <td class="xl88" x:num><?=$No++?></td>
          <td class="xl89" x:str><?=$Pengabdian[$i]['Kegiatan']?></td>
          <td class="xl90" x:str><?=$Pengabdian[$i]['TanggalKegiatan']?></td>
          <td class="xl91" x:str><?=$Pengabdian[$i]['Satuan']?></td>
          <td class="xl101" x:num><?=$Pengabdian[$i]['Volume']?></td>
          <td class="xl91" x:str><?=str_replace('.',',',$Pengabdian[$i]['Kredit'])?></td>
          <td class="xl91" x:num><?=str_replace('.',',',$Pengabdian[$i]['JumlahKredit'])?></td>
          <td class="xl91" x:str>Lampiran 3.<?=$Lampiran++?></td>
        </tr>
        <?php $SubTotal += $Pengabdian[$i]['JumlahKredit'];  $Total += $Pengabdian[$i]['JumlahKredit'];?>
      <?php if ($i+1 == count($Pengabdian)) { ?>  
        <tr style='mso-height-source:userset;height:18pt;'>
          <td class="xl88" colspan="6" style="text-align: center;font-weight: bold;vertical-align: middle;">Sub Total</td>
          <td class="xl88" style="font-weight: bold;vertical-align: middle;"><?=str_replace('.',',',$SubTotal)?></td>
          <td class="xl88"></td>
        </tr>
      <?php } else if ($Pengabdian[$i+1]['IdKegiatan'] != $Pengabdian[$i]['IdKegiatan']) { ?>
        <tr style='mso-height-source:userset;height:18pt;'>
          <td class="xl88" colspan="6" style="text-align: center;font-weight: bold;vertical-align: middle;">Sub Total</td>
          <td class="xl88" style="font-weight: bold;vertical-align: middle;"><?=str_replace('.',',',$SubTotal)?></td>
          <td class="xl88"></td>
        </tr>
      <?php $SubTotal = 0; } ?>
    <?php } else if ($Pengabdian[$i]['IdKegiatan'] == 'PNB7') { ?>
      <?php if ($PNB7) { $PNB7 = false; $No = 1;?>
        <tr class="xl66" style='mso-height-source:userset;'>
          <td style="text-align: center;" class="xl86" x:str><?=$Huruf++?></td>
          <td class="xl87" colspan="7" style='border-right:.5pt solid ;border-bottom:.5pt solid ;' x:str>Berperan serta aktif dalam pengelolaan jurnal ilmiah (per tahun)*</td>
        </tr>
      <?php } ?>
      <?php if ($Pengabdian[$i]['Kode'] == '1' && $Editor1) { $Editor1 = false;$No = 1; ?>
        <tr class="xl66" style='mso-height-source:userset;'>
          <td style="text-align: center;" class="xl86" x:str></td>
          <td class="xl87" colspan="7" style='border-right:.5pt solid ;border-bottom:.5pt solid ;' x:str>a. Editor / dewan penyunting / dewan redaksi  jurnal ilmiah internasional</td>
        </tr>
      <?php } else if ($Pengabdian[$i]['Kode'] == '2' && $Editor2) { $Editor2 = false;$No = 1; ?>
        <tr class="xl66" style='mso-height-source:userset;'>
          <td style="text-align: center;" class="xl86" x:str></td>
          <td class="xl87" colspan="7" style='border-right:.5pt solid ;border-bottom:.5pt solid ;' x:str>b. Editor/ dewan penyunting/ dewan redaksi  jurnal ilmiah nasional</td>
        </tr>
      <?php } ?>
        <tr style='mso-height-source:userset;'>
          <td class="xl88" x:num><?=$No++?></td>
          <td class="xl89" x:str><?=$Pengabdian[$i]['Kegiatan']?></td>
          <td class="xl90" x:str><?=$Pengabdian[$i]['TanggalKegiatan']?></td>
          <td class="xl91" x:str><?=$Pengabdian[$i]['Satuan']?></td>
          <td class="xl101" x:num><?=$Pengabdian[$i]['Volume']?></td>
          <td class="xl91" x:str><?=str_replace('.',',',$Pengabdian[$i]['Kredit'])?></td>
          <td class="xl91" x:num><?=str_replace('.',',',$Pengabdian[$i]['JumlahKredit'])?></td>
          <td class="xl91" x:str>Lampiran 3.<?=$Lampiran++?></td>
        </tr>
        <?php $SubTotal += $Pengabdian[$i]['JumlahKredit'];  $Total += $Pengabdian[$i]['JumlahKredit'];?>
        <?php if ($i+1 == count($Pengabdian)) { ?>  
        <tr style='mso-height-source:userset;height:18pt;'>
          <td class="xl88" colspan="6" style="text-align: center;font-weight: bold;vertical-align: middle;">Sub Total</td>
          <td class="xl88" style="font-weight: bold;vertical-align: middle;"><?=str_replace('.',',',$SubTotal)?></td>
          <td class="xl88"></td>
        </tr>
      <?php } else if ($Pengabdian[$i+1]['IdKegiatan'] == $Pengabdian[$i]['IdKegiatan']) { ?>
        <?php if ($Pengabdian[$i]['Kode'] != $Pengabdian[$i+1]['Kode']) { ?>  
          <tr style='mso-height-source:userset;height:18pt;'>
            <td class="xl88" colspan="6" style="text-align: center;font-weight: bold;vertical-align: middle;">Sub Total</td>
            <td class="xl88" style="font-weight: bold;vertical-align: middle;"><?=str_replace('.',',',$SubTotal)?></td>
            <td class="xl88"></td>
          </tr>
        <?php $SubTotal = 0; } ?>
      <?php } else if ($Pengabdian[$i+1]['IdKegiatan'] != $Pengabdian[$i]['IdKegiatan']) { ?>
        <tr style='mso-height-source:userset;height:18pt;'>
          <td class="xl88" colspan="6" style="text-align: center;font-weight: bold;vertical-align: middle;">Sub Total</td>
          <td class="xl88" style="font-weight: bold;vertical-align: middle;"><?=str_replace('.',',',$SubTotal)?></td>
          <td class="xl88"></td>
        </tr>
      <?php $SubTotal = 0; } ?>
    <?php }} ?>
   <tr height="20" class="xl66" style='height:15.00pt;mso-height-source:userset;mso-height-alt:300;'>
    <td class="xl92" height="20" colspan="4" style='height:15.00pt;border-right:none;border-bottom:none;' x:str>Total Angka Kredit</td>
    <td class="xl102" colspan="2" rowspan="2" style='border-right:.5pt solid ;border-bottom:.5pt solid ;'></td>
    <td class="xl103"><?=str_replace('.',',',$Total)?></td>
    <td class="xl104" rowspan="2" style='border-right:.5pt solid ;border-bottom:.5pt solid ;'></td>
   </tr>
   <tr height="20" class="xl66" style='height:15.00pt;mso-height-source:userset;mso-height-alt:300;'>
    <td class="xl93" height="20" colspan="4" style='height:15.00pt;border-right:none;border-bottom:.5pt solid ;' x:str>Bidang III – Pengabdian Kepada Masyarakat</td>
    <td class="xl105"></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl72" height="19" style='height:14.25pt;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl78" height="19" colspan="3" style='height:14.25pt;mso-ignore:colspan;' x:str>Demikian pernyataan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl71" height="19" style='height:14.25pt;'></td>
    <td class="xl94"></td>
    <td class="xl72" colspan="2" style='mso-ignore:colspan;'></td>
    <td class="xl106" x:str>Bangkalan,</td>
   </tr>
   <tr height="20" style='height:15.00pt;mso-height-source:userset;mso-height-alt:350;'>
    <td class="xl72" height="20" style='height:15.00pt;'></td>
    <td class="xl95"></td>
    <td class="xl72" colspan="2" style='mso-ignore:colspan;'></td>
    <td class="xl108" colspan="4" style='mso-ignore:colspan;' x:str>Wakil Dekan 1 Fakultas Ekonomi dan Bisnis</td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl72" height="19" style='height:14.25pt;'></td>
   </tr>
   <tr height="19" style='height:14.25pt;'>
    <td class="xl72" height="19" style='height:14.25pt;'></td>
   </tr>
	 <tr height="19" style='height:14.25pt;'>
    <td class="xl72" height="19" style='height:14.25pt;'></td>
   </tr>
	 <tr height="20" style='height:15.00pt;mso-height-source:userset;mso-height-alt:350;'>
    <td class="xl72" height="20" style='height:15.00pt;'></td>
    <td class="xl95"></td>
    <td class="xl72" colspan="2" style='mso-ignore:colspan;'></td>
    <td class="xl108" colspan="4" style='mso-ignore:colspan;' x:str>Dr. Mohtar Rasyid, S.E.,M.Sc.</td>
   </tr>
	 <tr height="20" style='height:15.00pt;mso-height-source:userset;mso-height-alt:350;'>
    <td class="xl72" height="20" style='height:15.00pt;'></td>
    <td class="xl95"></td>
    <td class="xl72" colspan="2" style='mso-ignore:colspan;'></td>
    <td class="xl108" colspan="4" style='mso-ignore:colspan;' x:str>NIP. 197604152003121001</td>
   </tr>
  </table>
 </body>
</html>