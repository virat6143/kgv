<?php

	header("Content-Type:application/json");
	include_once "connect.php";

	$query = "SELECT * FROM crop";
	$res = mysql_query($query);

	$data_array = array(); 

	$data_array = [
    [
      "crop_id"   => "0",
      "crop_name"   => "Select Crop"
    ]
	];

	while($rows =mysql_fetch_assoc($res)) { 
		$data_array[] = $rows; 

	}

	$json_response = json_encode(array('crop' => $data_array));
	echo $json_response;
?>