<?php

	header("Content-Type:application/json");
	include_once "connect.php";

	if(!empty($_GET['cnm'])){
		$cnm = $_GET['cnm'];
		$cid=0;

		$query = "SELECT crop_id FROM crop where crop_name='".$cnm."'";
		//echo $query;
		$res = mysql_query($query);
		while($rows = mysql_fetch_assoc($res)) { 
			$cid = $rows['crop_id']; 
			//echo $cid;
		}

		$query = "SELECT * FROM variety where crop_id=".$cid;
		$res = mysql_query($query);

		$data_array = array(); 

		$data_array = [
    	[
      		"crop_id"   => "0",
      		"variety_id"   => "0",
      		"variety_name"   => "Select Variety of ".$cnm
    	]
		];

		while($rows =mysql_fetch_assoc($res)) { 
			$data_array[] = $rows; 
		}

	}

	$json_response = json_encode(array('variety' => $data_array));
	echo $json_response;
?>