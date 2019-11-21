<?php

	header("Content-Type:application/json");
	include_once "connect.php";

	if(!empty($_GET['fphno'])){
		$qes = $_GET['qes'];
		$fphno = $_GET['fphno'];

		$qr = "insert into questions (farmer_phno,question,asked_date) values('$fphno','$qes',CURDATE());";

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