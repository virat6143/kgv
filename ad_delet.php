<?php
	include "connect.php";
	$qry111="delete from adversitment where a_id=".$_GET["id"];
	mysqli_query($con,$qry111);
	header("Location: ad_ment.php?delete=1");

?>