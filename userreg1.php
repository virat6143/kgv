<?php

include "connect.php";


 $u_name=$_POST["uname"];
 $u_mob=$_POST["umob"];
 $u_em=$_POST["uem"];
 $u_add=$_POST["uadd"];
 $u_password=$_POST["upassword"];
 $u_district=$_POST["district"];
 $u_t_name=$_POST["t_name"];
 $u_v_name=$_POST["v_name"];
 $u_pin=$_POST["pin"];

 $qry="insert into userreg(uname,umob,uem,uadd,upassword,district,t_name,v_name,pin) VALUES ('$u_name','$u_mob','$u_em','$u_add','$u_password','$u_district','$u_t_name','$u_v_name','$u_pin')";
 echo $qry;

$rs=mysqli_query($con,$qry);
if($rs)
{

	header("Location:userreg.php?success=1");

}
else
{

	echo mysqli_error($con);
}

?>