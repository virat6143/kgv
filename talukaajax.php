<?php

include "connect.php";
$district=$_GET["district"];
$taluka=$_GET["taluka"];

echo $district."-".$taluka;
if($district!="" && $taluka!="")
{
$res=mysqli_query($con,"select *  from village where d_id=$district and t_id=$taluka");

echo "<option value=''>----પસંદ કરો----</option>";
while ($data=mysqli_fetch_array($res)) 
{
  echo "<option value='".$data["v_id"]."'>".$data["name"]."</option>";
}

}
?>