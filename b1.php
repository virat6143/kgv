<?php

include "connect.php";

$bid1=$_GET["bookid1"];
$res=mysqli_query($con,"select *  from book where b_id=$bid1");
$data=mysqli_fetch_array($res); 
$ab=$data["bbh"];
$abb=$data["bno"];
echo "$ab|$abb";

?>