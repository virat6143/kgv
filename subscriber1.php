<?php
include 'connect.php';
 $datee=$_POST["sdatee"];
 $s_rec=$_POST["sub_rec"];
 $s_no=$_POST["sub_no"];
 $s_name=$_POST["sub_name"];
 $s_type=$_POST["sub_type"];
 $s_start=$_POST["sub_start"];
 $s_end=$_POST["sub_end"];
 $s_addr=$_POST["sub_addr"];
 $s_mob=$_POST["sub_mob"];
 $s_district1=$_POST["sub_district"];
 $s_taluka1=$_POST["sub_taluka"];
 $s_village1=$_POST["sub_village"];
 $s_pincode=$_POST["sub_pincode"];

 $qry="insert into subscriber(sdatee,sub_rec,sub_no,sub_name,sub_type,sub_start,sub_end,sub_addr,sub_mob,sub_district,sub_taluka,sub_village,sub_pincode) VALUES ('$datee','$s_rec','$s_no','$s_name','$s_type','$s_start','$s_end','$s_addr','$s_mob','$s_district1','$s_taluka1','$s_village1','$s_pincode')";
echo $qry;

$rs=mysqli_query($con,$qry);
if($rs)
{

	header("Location:subscriber.php?success=1");

}
else
{

	echo mysqli_error($con);
}
?>

