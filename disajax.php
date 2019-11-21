<?php

include "connect.php";
$district=$_GET["district"];

echo "<option value=''>----પસંદ કરો----</option>";
if($district!="")
{
$res=mysqli_query($con,"select *  from taluka where d_id=$district");


while ($data=mysqli_fetch_array($res)) 
{
  echo "<option value='".$data["t_id"]."'>".$data["t_name"]."</option>";
}

}
?>