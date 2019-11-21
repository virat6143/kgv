<?php

include "connect.php";

$bid=$_GET["bookid"];
$res=mysqli_query($con,"select *  from book where b_id=$bid");
$data=mysqli_fetch_array($res); 
$ab=$data["bbh"];
$abb=$data["bno"];
echo "$ab|$abb";

?>