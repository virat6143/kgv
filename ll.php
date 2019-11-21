<?php

include("connect.php");
include 'TCPDF-master\tcpdf.php';
$colname_year = "-1";
if (isset($_GET['year'])) {
  $colname_year = $_GET['year'];
}
//I DO include Mr. Asuni's credits in my file, but it's left out here for brevity's sake.
//----------------

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('whoever you are');
$pdf->SetTitle('what you want to call it');
$pdf->SetSubject('your subject');
$pdf->SetKeywords('TCPDF, PDF, HHMWC, QR, CODE');
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// set some language-dependent strings

$pdf->setLanguageArray($l);
// --------------
// add a page
$pdf->AddPage();
// set the font
$pdf->SetFont('helvetica', '', 10);
// set style for barcode
$style = array(
    'border' => 2,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);
// connect to database
require_once('../../../Connections/con1.php');
mysql_select_db($database_con1, $con1); // Get needed records from database
$query_info = sprintf("select regkey, name1, name2, company, city, state, volunteer, meal, choice, golf from convregis where (name1<>'Anonymous Donation' and print='0' and completed='Yes' and hold='0' and year=%s) order by name2, name1 ASC", GetSQLValueString($colname_year, "text"));
$info = mysql_query($query_info, $con1) or die(mysql_error());
$num_fields = mysql_num_fields($info);
$j=0; // the field number
$x=1; // the record number
while($row = mysql_fetch_array($info)) { 
  for($j=0; $j<$num_fields; $j++) {
     $name = mysql_field_name($info, $j);
     $object[$x][$name] = $row[$name];
  }
  $x++; // get next record set
}
//set variables for placement of QR CODE and text lines
$size=40; // mm size of QRCODE / H = QR-CODE Best error correction
$qrlm=40; // left margin of code on left
$qrlm2=140; // left margin of code on right
$qrvm=40; // vertical placement (how far down the page) of BOTH codes on first row
$l=20; // left margin of text, left side
$l2=120; // left margin of text, right side
$y=15; // vertical placement (how far down the page) of BOTH texts on first row
// There will be two records per row - there will be three rows
$ii = count($object); // total number of record rows to do
for($i=1; $i<=$ii; $i++) {    //$object[$i]['field_name'] / this sets $i = $x above
    if ($i<=$ii) {
        $codeurl = "https:clientwebsiteaddress/attend.php?regkey=".$object[$i]['regkey'];
        ///write the QR CODE
        $pdf->write2DBarcode($codeurl, 'QRCODE,H', $qrlm, $qrvm, $size, $size, $style, 'N');
        // the QR CODE, when scanned by a smartphone at the convention's
        //registration packet pickup table, triggers an update to the
        //database in the attend.php page, setting a registrant to "in attendance" 
        $regkey=$object[$i]['regkey']; //assign row data to a variable and manipulate as needed
        $fullname=strtoupper($object[$i]['name2']).", ".strtoupper($object[$i]['name1']);
        $vol=$object[$i]['volunteer'];
        $company=strtoupper($object[$i]['company']);
        $city=$object[$i]['city'];
        $state=$object[$i]['state'];
         $meal=$object[$i]['meal'];
         $golf=$object[$i]['golf'];
         if ($golf<>"1") {
             $golf=" ";
             } else {
             $golf="GOLF";
         }
         if ($meal<>"1") {
             $meal=" ";
            } else {
            $meal="MEAL: ".strtoupper($object[$i]['choice']);
        }
        if ($meal<>" ") {
            $mealgolf=$meal."        /       ".$golf;
            } else {
            $mealgolf=$golf;
        }
        //write the lines of text
        $pdf->Text($l, $y, $fullname.'               '.$vol);
        $pdf->Text($l, $y+5, $regkey.'               '.$city.', '.$state);
        $pdf->Text($l, $y+10, $company);
        $pdf->Text($l, $y+15, $mealgolf);
        $i++; // get next record
        if ($i<=$ii) {
            $codeurl2 = "https:clientwebsiteaddress/attend.php?regkey=".$object[$i]['regkey'];
            $pdf->write2DBarcode($codeurl2, 'QRCODE,H', $qrlm2, $qrvm, $size, $size, $style, 'N');
            $regkey2=$object[$i]['regkey'];
            $fullname2=strtoupper($object[$i]['name2']).", ".strtoupper($object[$i]['name1']);
            $vol2=$object[$i]['volunteer'];
            $company2=strtoupper($object[$i]['company']);
            $city2=$object[$i]['city'];
             $state2=$object[$i]['state'];
            $meal2=$object[$i]['meal'];
            $golf2=$object[$i]['golf'];
            if ($golf2<>"1") {
                    $golf2=" ";
                    } else {
                    $golf2="GOLF";
            }
            if ($meal2<>"1") {
                $meal2=" ";
                } else {
                $meal2="MEAL: ".strtoupper($object[$i]['choice']);
            }
            if ($meal2<>" ") {
                $mealgolf2=$meal2."        /       ".$golf2;
                } else {
                $mealgolf2=$golf2;
            }
            $pdf->Text($l2, $y, $fullname2.'               '.$vol2);
            $pdf->Text($l2, $y+5, $regkey2.'               '.$city2.', '.$state2);
            $pdf->Text($l2, $y+10, $company2);
            $pdf->Text($l2, $y+15, $mealgolf2);
            $qrvm=$qrvm+85; $y=$y+85; // add 85 mm drop to vertical alignment of qrcodes
            if($i<=$ii and $qrvm>210) {  //no more room on this page but more records to do
                $qrvm=40; // reset qrcode vertical alignment
                $y=15; // reset where texts write
                $pdf->AddPage();
            }
        }
    }
} // end of PDF (no more records to do)
$pdf->Output($year.'EnvelopeLabels.pdf', 'I'); //Close and output PDF document
?>
