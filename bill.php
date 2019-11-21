<?php
include"connect.php";
include 'TCPDF-master\tcpdf.php';

session_start();

class mypdf extends TCPDF
{


	function header1()
	{  
		
		$this->Ln(10);
		$date= date("d/m/Y");
		$this->SetLink('https://fonts.googleapis.com/css?family=Tangerine','',14);
		$this->Image('aau.gif',6);
		$this->SetFont('shruti','',14);
		$this->Ln(5);
		$this->SetFont('shruti','',14);
		$this->cell(276,10,'આણંદ કૃિષ  યુિનવિસટી',0,0,'C');
		$this->Ln(9);
		$this->SetFont('shruti','',12);
		$this->cell(276,10,'કચેરીમાં નાણાં ભરવાનું પતક',0,0,'C');
		$this->Ln();
		$this->Cell(0, 5, 'કેન્દ્:આણંદ',0, false, 'R', 0, '', 0, false, 'T', 'M');
		$this->Ln(10);
		$this->Cell(0, 5, 'નં._____________',0, false, 'R', 0, '', 0, false, 'T', 'M');
		$this->Ln(8);
		$this->SetFont('shruti','',12);
		$this->Cell(0, 5, 'પ્િત',0, false, 'L', 0, '', 0, false, 'T', 'M');
		$this->Ln();
		$this->Cell(0, 5, 'શ્રી, િહસાબી અિધકારી (કેશ) એ.એ.યુ,આણંદ.',0, false, 'L', 0, '', 0, false, 'T', 'M');
		
		$this->SetFont('times','',14);
		$this->Cell(0,5,$date,0, false, 'R', 0, '', 0, true, '', '');
		$this->Ln(20);

		$this->SetFont('shruti','',12);
		$this->cell(20,10,'અ.નં.',1,0,'C');
		$this->cell(100,10,'માલની િવગત',1,0,'C');
		$this->cell(40,10,'નંગ',1,0,'C');
		$this->cell(40,10,'દર(રૂિપયા)',1,0,'C');
		$this->cell(40,10,'િકંમત(રૂિપયા)',1,0,'C');
		
		$this->Ln();


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
			$this->cell(20,10,$rid=$data["r_id"],1,0,'L');
			$this->SetFont('shruti','',12);
			$this->cell(100,10,$cu=$data["bname"],1,0,'L');
			$this->SetFont('times','',12);
			$this->cell(40,10,$qut=$data["book_qut"],1,0,'L');
			$this->cell(40,10,$jt=$data["price"],1,0,'L');
			$this->cell(40,10,$tot=$data["total_amount"],1,0,'L');
			$this->Ln();
		}

	}

	function footer()
	{   
		$this->Ln(10);
		$date= date("d/m/Y");
		$this->SetFont('shruti',14);
		$this->Cell(0, 5, 'નાણાં ભરનારની સહી ક્ષેત્ર વ્યવસ્થાપન ઉપર જણાવેલ િવગતના કુલ નાણાં રૂિપયા_________ મળ્યા છે.',0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Ln();
		$this->cell(276,10,'જે કચેરીની કેશબુક પાના નં ___________________ ઉપર નોંધ કરેલ છે.',0,0,'L');
		$this->Ln(20);
        $this->SetFont('shruti',14);
		$this->cell(15,10,'તારીખ:',0,0,'L');		
		$this->SetFont('times','',12);
		$this->cell(30,10,$date,0,0,'L');
		$this->SetFont('shruti',14);
		$this->Cell(0, 5, 'નાણાં સ્વીકારનાર ની સહી _________________',0, false, 'R', 0, '', 0, false, 'T', 'M');
	}


}
$pdf = new mypdf();
$pdf->AddPage('L', 'mm', 'A5',0);
$pdf->header1();
$pdf->viewTable($con);
$pdf->footer();
$pdf->Output();

?>