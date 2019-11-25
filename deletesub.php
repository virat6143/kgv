<?php

include 'connect.php';
$qrydelete="delete from subscriber where sub_id=".$_GET["id"];

if(mysqli_query($con,$qrydelete))
{
header("Location:subscriber.php?delete=1");
}
else
{
	mysqli_error();
}
?>