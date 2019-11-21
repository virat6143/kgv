<?php

	header("Content-Type:application/json");
	include_once "connect.php";

	$query = "SELECT * FROM pesticide";
	$res = mysql_query($query);

	$data_array = array(); 

	$data_array = [
    [
      "pesticide_id"   => "0",
      "pesticide_name"   => "Select Pesticide"
    ]
	];

	while($rows =mysql_fetch_assoc($res)) { 
		$data_array[] = $rows; 

	}

	$json_response = json_encode(array('pesticideslist' => $data_array));
	echo $json_response;
?>