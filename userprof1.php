<?php

include "connect.php";
session_start();
	

 $u1_name=$_POST["uname"];
 $u1_mob=$_POST["umob"];
 $u1_em=$_POST["uem"];
 $u1_add=$_POST["uadd"];
 $us_pin=$_POST["pin"];

        $qr="update userreg set uname='$u1_name',umob='$u1_mob',uem='$u1_em',uadd='$u1_add',pin='$us_pin' where u_id='"
        .$_COOKIE['uid']."'";
     
        if(mysqli_query($con,$qr))
        {
        	header("location:profupuser.php?success=1");
        }	
        else
        {

        }
	 

?>