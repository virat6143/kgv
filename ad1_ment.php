<?php
include 'connect.php';

$txtFDt1=$_POST["txtFDt"];
$cash_ad=$_POST["cashad"];
$p_name=$_POST["pname"];
$ad_info=$_POST["adinfo"];
$ad_price=$_POST["adprice"];


$qry112="insert into adversitment(txtFDt,cashad,pname,adinfo,adprice) VALUES ('$txtFDt1','$cash_ad','$p_name','$ad_info','$ad_price')";

$rs112=mysqli_query($con,$qry112);
if($rs112)
{

	header("Location:ad_ment.php?success=1");

}
else
{

	echo mysqli_error();
}


?>

