<?php
	include "connect.php";
	$qry="delete from userreg where u_id=".$_GET["id"];
	mysqli_query($con,$qry);
	header("Location: fetch_user.php");

?>