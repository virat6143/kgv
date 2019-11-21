<?php  

include 'connect.php';
if(isset($_POST["mob1"]))
{
 
 $querymob = "SELECT * FROM userreg WHERE umob = '".$_POST["mob1"]."'";
 $resultmob = mysqli_query($con, $querymob);
 echo mysqli_num_rows($resultmob);
}
?>