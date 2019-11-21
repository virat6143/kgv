<?php
include 'connect.php';
session_start();
$d_date=$_POST["r_date"];
$m_type=$_POST["memo_type"];
$m_no=$_POST["memo_no"];
$custt_name=$_POST["cust_name"];
$dist_1=$_POST["cust_dist"];
$taluka_1=$_POST["cust_tal"];
$village_1=$_POST["cust_village"];
$cust_add=$_POST["cust_addr"];
$custt_mob=$_POST["cust_mob"];
$sub_tot=$_POST["sub_total"];
$p_charge=$_POST["postal_charge"];
echo " total alll ".$tot=$_POST["total_amount"];
$b_qut=$_POST["book_qut"];
$b_price=$_POST["price"];

$bid=$_POST["bname"];

$stok=$_POST["stock"];

$limit = count($b_qut);

 $qry="insert into receipt(r_date,memo_type,memo_no,cust_name,cust_village,cust_addr,cust_mob,total_amount,cust_dist,cust_tal) VALUES ('$d_date','$m_type','$m_no','$custt_name','$village_1','$cust_add','$custt_mob','$tot','$dist_1','$taluka_1')";
 
 $rs=(mysqli_query($con,$qry));
 
 $last_id = $con->insert_id;
 
 $_SESSION['rid']=$last_id; 

for($i=0;$i<$limit;$i++)
{
	
 	$qry2="insert into receipt_details(r_id,b_id,book_qut,price,sub_to,postal_charge) VALUES ('$last_id','$bid[$i]','$b_qut[$i]','$b_price[$i]','$sub_tot[$i]','$p_charge[$i]')";

 	echo $qry2;
 	$w=mysqli_query($con,$qry2);

}

	header("Location:placeorder.php?success=1");

?>