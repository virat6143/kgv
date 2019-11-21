<?php

	header("Content-Type:application/json");
	include_once "connect.php";

	if(!empty($_GET['fnm'])){
		$fnm = $_GET['fnm'];
		$fphno = $_GET['fphno'];
		$fcity = $_GET['fcity'];

		$qr = "insert into farmer (farmer_phno,farmer_name,city) values('".$fphno."','".$fnm."','".$fcity."');";

		$qry=mysql_query($qr);

		if($qry){
			deliver_response(200,"Inserted",NULL);
		}
		else
			deliver_response(200,"Data not Inserted",mysql_error());

	}

		function deliver_response($status,$status_message,$data){

		header("HTTP/1.1 $status $status_message");

		$response['status']=$status;
		$response['status_message']=$status_message;
		$response['data']=$data;

		$json_response = json_encode($response);
		echo $json_response;

	}

?>