<?php

	header("Content-Type:application/json");
	include ("signupres.php");
	if(!empty($_GET['scnm'])){
		$scnm = $_GET['scnm'];
		$scinm = $_GET['scinm'];
		$sctype = $_GET['sctype'];
		$sceid = $_GET['sceid'];
		$pwd = $_GET['pwd'];
		$id = get_ins($scnm,$scinm,$sctype,$sceid,$pwd);

		if($id=="Inserted"){
			deliver_response(200,"Inserted",NULL);
		}
		else
			deliver_response(200,"Data not Inserted",mysql_error());
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

?>