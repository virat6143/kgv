<?php
	include "connect.php";
	$qry="update  book set status=1 where b_id=".$_GET["id"];
	mysqli_query($con,$qry);
	header("Location: bookinfo.php?delete=1");

?>