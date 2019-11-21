<?php

include 'connect.php';
$qrydelete="delete from subscriber where sub_id=".$_GET["id"];

if(mysqli_query($con,$qrydelete))
{
header("Location:subscriber.php");
}
else
{
	mysqli_error();
}
?>