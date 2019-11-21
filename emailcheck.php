<?php  

include 'connect.php';
if(isset($_POST["email"]))
{
 
 $queryemail = "SELECT * FROM userreg WHERE uem = '".$_POST["email"]."'";
 $resultemail = mysqli_query($con, $queryemail);
 echo mysqli_num_rows($resultemail);
}
?>