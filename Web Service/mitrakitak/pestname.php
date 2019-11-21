<?php

	header("Content-Type:application/json");
	include_once "connect.php";

	if(!empty($_GET['cnm'])){
		$cnm = $_GET['cnm'];
		$vnm = $_GET['vnm'];
		$ptype = $_GET['ptype'];
		$cid=0;
		$vid=0;

		$query = "SELECT crop_id FROM crop where crop_name='".$cnm."'";
		$res = mysql_query($query);
		while($rows = mysql_fetch_assoc($res)) { 
			$cid = $rows['crop_id']; 
		}

		$query = "SELECT variety_id FROM variety where crop_id=".$cid." and variety_name='".$vnm."'";
		$res = mysql_query($query);
		while($rows = mysql_fetch_assoc($res)) { 
			$vid = $rows['variety_id']; 
		}

		$query = "SELECT pest_id,pest_name FROM pests where crop_id=".$cid." and variety_id=".$vid." and pest_type='".$ptype."'";
		$res = mysql_query($query);

		$data_array = array(); 

		$data_array = [
    	[
      		"pest_id"   => "0",
      		"pest_name"   => "Select Pest"
    	]
		];

		while($rows =mysql_fetch_assoc($res)) { 
			$data_array[] = $rows; 
		}

	}

	$json_response = json_encode(array('pestname' => $data_array));
	echo $json_response;
?>