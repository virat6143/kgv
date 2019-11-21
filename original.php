<?php
include"connect.php";
session_start();

include 'TCPDF-master\tcpdf.php';


ob_start();

class mypdf extends TCPDF
{

  function header1()
  {  

    $this->Ln(10);
    $date= date("d/m/Y");
    $this->Image('aau.gif',6);
    $this->SetFont('times','',14);
    $this->cell(276,10,'Original Copy',0,0,'C');
    $this->Ln(9);
    $this->SetFont('shruti','',12);
    $this->cell(276,10,'િવસ્તરણ િશષણ િનયામકની કચેરી,યુિનવિસટી ભવન',0,0,'C');
    $this->Ln();
    $this->cell(276,10,'આણંદ કૃિષ યુિનવિસટી ,આણંદ -૩૮૮૧૧૦',0,0,'C');
    $this->Ln();
    $this->Ln(10);
  }
  function head()
  {
   $this->Ln(15);
   $this->SetFont('shruti','',12);
   $this->cell(20,10,'અ.નં.',1,0,'C');
   $this->cell(80,10,'માલની િવગત',1,0,'C');
   $this->cell(40,10,'નંગ',1,0,'C');
   $this->cell(40,10,'દર(રૂિપયા)',1,0,'C');
   $this->cell(40,10,'પોસ્ટલ ચાર્જ',1,0,'C');
   $this->cell(30,10,'િકંમત(રૂિપયા)',1,0,'C');
   $this->Ln();
 }


 function viewTable22($con)
 {
  $this->SetFont('times','',12);
  $qry="select * from receipt INNER JOIN district ON receipt.cust_dist=district.d_id INNER JOIN taluka on receipt.cust_tal=taluka.t_id WHERE receipt.r_id='".$_SESSION['rid']."'";
  $rs=mysqli_query($con,$qry);
  while($data=mysqli_fetch_assoc($rs))
  {
    $this->SetFont('shruti','',12);
    $this->Cell(0, 5, 'કેશ મેમો નં: '.$memono=$data["memo_no"],0, false, 'R', 0, '', 0, false, 'T', 'M');
    $this->Ln();
    $this->Cell(0, 5, 'મેમો ટાઇપ: '.$memotype=$data["memo_type"],0, false, 'R', 0, '', 0, false, 'T', 'M');
    $this->Ln();
    $this->cell(200,10,'નામ: '.$custname=$data["cust_name"],1,0,'L');
    $this->Ln();
    $this->cell(200,10,'સરનામું: '.$addr=$data["cust_addr"],1,0,'L');
    $this->Ln();
    $this->cell(200,10,'જિલ્લો: '.$dist=$data["district_name"],1,0,'L');
    $this->Ln();
    $this->cell(200,10,'તાલુકો: '.$taluka=$data["t_name"],1,0,'L');
    $this->Ln();
    $this->cell(200,10,'ગામનું નામ: '.$village=$data["cust_village"],1,0,'L');

  }

}
function viewTable($con)
{
  $this->SetFont('times','',12);
  $qry="select * FROM `receipt_details`INNER JOIN book on receipt_details.b_id=book.b_id INNER JOIN receipt on receipt_details.r_id=receipt.r_id where receipt.r_id='".$_SESSION['rid']."'";
  $rs=mysqli_query($con,$qry);
  $count=1;
  while($data=mysqli_fetch_assoc($rs))
  {

    $this->SetFont('times','',12);
    $this->cell(20,10,$rid=$count,1,0,'L');
    $this->SetFont('shruti','',12);
    $this->cell(80,10,$cu=$data["bname"],1,0,'L');
    $this->SetFont('times','',12);
    $this->cell(40,10,$qut=$data["book_qut"],1,0,'L');
    $this->cell(40,10,$jt=$data["price"],1,0,'L');
    $this->cell(40,10,$pos=$data["postal_charge"],1,0,'L');
    $this->cell(30,10,$tot=$data["sub_to"],1,0,'L');
    $this->Ln();
    $count ++;
  }

}

function tot($con)
{
  $this->SetFont('times','',12);
  $qry="select * from receipt INNER JOIN district ON receipt.cust_dist=district.d_id INNER JOIN taluka on receipt.cust_tal=taluka.t_id WHERE receipt.r_id='".$_SESSION['rid']."'";
  $rs=mysqli_query($con,$qry);
  while($data=mysqli_fetch_assoc($rs))
  {
   $this->SetFont('shruti','',12);
   $this->cell(250,10,'ટોટલ ભાવ : '.$dist=$data["total_amount"],1,0,'L');
 }

}

function footer()
{   
  $this->Ln(10);
  $date= date("d/m/Y");
  $this->SetFont('shruti',14);
  $this->cell(15,10,'જાહેરાત:',0,0,'L');    
  $this->Ln();
  $this->SetFont('shruti',14);
  $this->cell(15,10,'તારીખ:',0,0,'L');    
  $this->SetFont('times','',12);
  $this->cell(30,10,$date,0,0,'L');
  $this->SetFont('shruti',14);
  $this->Cell(0, 5, 'નાણાં લેનારની સહી _________________',0, false, 'R', 0, '', 0, false, 'T', 'M');
}


}
$pdf = new mypdf();
$pdf->AddPage('L', 'mm', 'A4',0);
$pdf->header1();
$pdf->viewTable22($con);
$pdf->head();
$pdf->viewTable($con);
$pdf->tot($con);
$pdf->footer();
ob_end_clean();
$pdf->Output('Original.pdf', "D");

?>