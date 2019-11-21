<?php

	header("Content-Type:application/json");
	include_once "connect.php";

	if(!empty($_GET['fphno'])){
		$fphno = $_GET['fphno'];
		$fname="";
		$fcity="";

		$query = "SELECT * FROM farmer where farmer_phno='".$fphno."'";
		//echo $query;
		$res = mysql_query($query);
		while($rows = mysql_fetch_assoc($res)) { 
			$fname = $rows['farmer_name']; 
			$fcity = $rows['city']; 
			//echo $cid;
		}

		if(mysql_num_rows($res)!=0)
			deliver_response(200,"Found",$fname,$fcity);
		else
			deliver_response(200,"Data not Found",NULL,NULL);

	}

	function deliver_response($status,$status_message,$fname,$fcity){

		header("HTTP/1.1 $status $status_message");

		$response['status']=$status;
		$response['status_message']=$status_message;
		$response['fname']=$fname;
		$response['fcity']=$fcity;

		$json_response = json_encode($response);
		echo $json_response;

	}
?>