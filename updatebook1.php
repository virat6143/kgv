<?php

include "connect.php";
session_start();
	
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

        $qr="update book set bname='$b_name',bsr='$b_sr',bno='$b_no',bbh='$b_bbh',date='$b_date',bstatus='$b_st',printing='$b_printing',p_date='$bp_date',total_bookno='$b_total_bookno',total_kharch='$b_total_kharch' where b_id='".$_POST["vcc"]."'";
     
        if(mysqli_query($con,$qr))
        {
        	header("location:bookinfo.php?arr=1");
        }	
        else
        {

        }
	 

?>