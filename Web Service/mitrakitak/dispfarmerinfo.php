<?php

	header("Content-Type:application/json");
	include_once "connect.php";

	if(!empty($_GET['fphno'])){
		$fphno = $_GET['fphno'];
		$city = $_GET['city'];
		$crop = $_GET['crop'];
		$var = $_GET['var'];
		$prcrop = $_GET['prcrop'];
		$dos = $_GET['dos'];
		$cstage = $_GET['cstage'];
		$ptype = $_GET['ptype'];
		$pname = $_GET['pname'];
		$pstage = $_GET['pstage'];
		$paffec = $_GET['paffec'];
		$infper = $_GET['infper'];
		$appesti = $_GET['appesti'];
		$comm = $_GET['comm'];
		$cid=0;
		$vid=0;
		$pnid=0;
		$piid=0;
		$rcount=0;
		$pestiname="";
		$fdid=0;

		$data_array = array(); 

		$query = "SELECT crop_id FROM crop where crop_name='".$crop."'";
		//echo $query."\n";
		$res = mysql_query($query);
		while($rows = mysql_fetch_assoc($res)) { 
			//$data_array[] = $rows; 
			$cid = $rows['crop_id']; 
		}

		$query = "SELECT variety_id FROM variety where variety_name='".$var."'";
		//echo $query."\n";

		$res = mysql_query($query);
		while($rows =mysql_fetch_assoc($res)) { 
			$vid = $rows['variety_id']; 
			//$data_array[] = $rows; 

		}

		$query = "SELECT pest_id FROM pests where crop_id=".$cid." and variety_id=".$vid." and pest_name='".$pname."' and pest_type='".$ptype."'";
		//echo $query."\n";

		$res = mysql_query($query);
		while($rows =mysql_fetch_assoc($res)) { 
			$pnid = $rows['pest_id']; 
			//$data_array[] = $rows; 

		}

		$query = "SELECT pesticide_id FROM pesticide where pesticide_name='".$appesti."'";
		//echo $query."\n";

		$res = mysql_query($query);
		while($rows =mysql_fetch_assoc($res)) { 
			$piid = $rows['pesticide_id'];
			//$data_array[] = $rows; 
 
		}


		$qr = "INSERT INTO farm_data(farmer_phno, city, crop_id, variety_id, previous_crop, sown_days, crop_stage, pest_type, observed_pest, pest_stage, part_affected, infestation_percentage, applied_pesticide_id, comments) VALUES ('$fphno','$city',$cid,$vid,'$prcrop',$dos,'$cstage','$ptype','$pname','$pstage','$paffec',$infper,$piid,'$comm')";
		//echo $qr;
		$qry=mysql_query($qr);

		if($qry){
			$query = "SELECT p_id,pesticide_id,recommended_dosage,additional_info FROM pest_info WHERE crop_id=$cid and variety_id=$vid and pest_id=$pnid and part_affected='$paffec' and pest_stage='$pstage' and pest_type='$ptype' and crop_stage='$cstage'";
			$res = mysql_query($query);
			$rcount=mysql_num_rows($res);
			if($rcount!=0){
				while($rows =mysql_fetch_assoc($res)) { 
					$data_array[] =$rows;
				}

				foreach($data_array as $i => $item) {
					if($data_array[$i]['pesticide_id']!=""){
						$query = "SELECT pesticide_name FROM pesticide where pesticide_id=".$data_array[$i]['pesticide_id'];
						$rs = mysql_query($query);
						while($inf =mysql_fetch_assoc($rs)) { 
							$pestiname = $inf['pesticide_name'];
							$data_array[$i]['pesticide_id']=$pestiname;
						}
					}
				}

				//SELECT `sr_no` FROM farm_data WHERE `farmer_phno`=8128659080 ORDER BY `sr_no` DESC LIMIT 1;


				// $query = "SELECT sr_no FROM farm_data WHERE farmer_phno=$fphno ORDER BY sr_no DESC LIMIT 1";
				// $res = mysql_query($query);
				// while($rows =mysql_fetch_assoc($res)) { 
				// 	$fdid = $rows;
				// 	array_push($data_array,$fdid);
				// }


			}
			else{
				$data_array = [
    			[
      				"p_id"   => "0"
    			]
				];
			}

		}
		else{
			$data_array = [
    			[
      				"msg"   => "Not Inserted"
    			]
				];			
		}


	}

	$json_response = json_encode(array('finfo' => $data_array));
	echo $json_response;

	//http://localhost/mitrakitak/dispfarmerinfo.php?fphno=8128659080&city=Vadodara&crop=Okra&var=OK-1&prcrop=Wheat&dos=29&cstage=Vegetative&ptype=Sucking&pname=Aphid&pstage=Adult&paffec=Leaves&infper=20&appesti=Acetamiprid 20% SP&comm=The crop lbjrfbrfb4rbr3rf b4rhb4h4rb bvbvb rvbrlvbfvbf bvrfbvbv fmbvfl vhfbv v
?>