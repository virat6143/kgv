<?php

include "connect.php";
session_start();

$txtFDt1=$_POST["txtFDt"];
$cash_ad=$_POST["cashad"];
$p_name=$_POST["pname"];
$ad_info=$_POST["adinfo"];
$ad_price=$_POST["adprice"];


$qrvv="update adversitment set txtFDt='$txtFDt1',cashad='$cash_ad',pname='$p_name',adinfo='$ad_info',adprice='$ad_price' where a_id='".$_POST["cashaaad"]."'";

if(mysqli_query($con,$qrvv))
{
        header("location:ad_ment.php?arr=1");
}	
else
{

}       



?>