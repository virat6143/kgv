<?php

	include_once "connect.php";

	function get_id($usrnm,$pwd){
		$qr = "select * from scientist where sc_emailid='".$usrnm."' and sc_password='".$pwd."'";
		$qry=mysql_query($qr);

		while($ar=mysql_fetch_assoc($qry)){

			if($ar["sc_emailid"]==$usrnm){
				return $ar["sc_id"];
				break;
			}

		}

	}
?>