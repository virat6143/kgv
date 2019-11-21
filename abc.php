<?php  

include 'connect.php';
if(isset($_POST["user_name"]))
{
 
 $query = "SELECT * FROM subscriber WHERE sub_mob = '".$_POST["user_name"]."'";
 $result = mysqli_query($con, $query);
 echo mysqli_num_rows($result);
}
?>