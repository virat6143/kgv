<?php

	header("Content-Type:application/json");
	include ("cropres.php");
	if(!empty($_GET['usrnm'])){
		$usrnm = $_GET['usrnm'];
		$pwd = $_GET['pwd'];
		$id = get_id($usrnm,$pwd);

		if(empty($id)){
			deliver_response(200,"id not found",NULL);
		}
		else
			deliver_response(200,"id found",$id);
	}
	else
		deliver_response(400,"Invalid Request",NULL);

	function deliver_response($status,$status_message,$data){

		header("HTTP/1.1 $status $status_message");

		$response['status']=$status;
		$response['status_message']=$status_message;
		$response['data']=$data;

		$json_response = json_encode($response);
		echo $json_response;

	}
//http://localhost/mitrakitak/croprep.php?usrnm=nab&pwd=12345
?>