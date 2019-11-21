<?php

include "connect.php";
 session_start();	
 $s_rec=$_POST["sub_rec"];
 $s_no=$_POST["sub_no"];
 $s_name=$_POST["sub_name"];
 $s_type=$_POST["sub_type1"];
 $s_start=$_POST["sub_start"];
 $s_end=$_POST["sub_end"];
 $s_addr=$_POST["sub_addr"];
 $s_mob=$_POST["sub_mob"];
 //$s_district1=$_POST["sub_district"];
 $s_village1=$_POST["sub_village"];
 $s_pincode=$_POST["sub_pincode"];


        $qr="update subscriber set sub_rec='$s_rec',sub_no='$s_no',sub_name='$s_name',sub_type='$s_type',sub_start='$s_start',sub_end='$s_end',sub_addr='$s_addr',sub_mob='$s_mob',sub_village='$s_village1',sub_pincode='$s_pincode' where sub_id='".$_POST["vccc"]."'";
     
        if(mysqli_query($con,$qr))
        {
        	header("location:subscriber.php?arr=1");

        }	
        else
        {

        }
	 

?>