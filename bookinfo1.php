<?php
include 'connect.php';

$b_name=$_POST["bname"];
$b_sr=$_POST["bsr"];
$b_no=$_POST["bno"];
$b_bbh=$_POST["bbh"];
$b_date=$_POST["date"];
$b_st=$_POST["bstatus"];

$b_printing=$_POST["printing"];
$bp_date=$_POST["p_date"];
$b_total_bookno=$_POST["total_bookno"];
$b_total_kharch=$_POST["total_kharch"];

$qry="insert into book(bname,bsr,bno,bbh,date,bstatus,printing,p_date,total_bookno,total_kharch) VALUES ('$b_name','$b_sr','$b_no','$b_bbh','$b_date','$b_st','$b_printing','$bp_date','$b_total_bookno','$b_total_kharch')";

$rs=mysqli_query($con,$qry);
if($rs)
{

	header("Location:bookinfo.php?success=1");

}
else
{

	echo mysqli_error();
}


?>

