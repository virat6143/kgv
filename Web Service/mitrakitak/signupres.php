<?php

	include_once "connect.php";

	function get_ins($scnm,$scinm,$sctype,$sceid,$pwd){

		$qr = "insert into scientist (sc_name,sc_institution,sc_ofCrop,sc_emailid,sc_password) values(".$scnm.",".$scinm.",".$sctype.",".$sceid.",".$pwd.");";

		$qry=mysql_query($qr);

		if($qry)
			$st = "Inserted";
		else
			$st = "Not Inserted";

		return $st;

	}

//http://localhost/mitrakitak/signup.php?scnm=%22Valay%20Patel%22&scinm=%22AAU%22&sceid=%22vp@aau.in%22&pwd=%2212345%22
?>
