<?php
require 'PHPMailer\phpmailer\PHPMailerAutoload.php';
include "connect.php";
$ml=$_GET["no"];
$rs=mysqli_query($con,$qry1);
$qry1="update userreg set status='1' where u_id=".$_GET["no"];
$rs=mysqli_query($con,$qry1);
if($rs)
{

  header("Location:send.php?userid=$ml");

}
else
{

  echo mysqli_error($con);
}
?>
