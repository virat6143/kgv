 <?php

 include 'connect.php';

 echo"<pre>";
 print_r($_POST);
 echo"</pre>";

 $email=$_POST["txtemail"];
 $pass=$_POST["txtpassv"];

 $qr="select * from adminlog where email='".$email."'";
 $aa= mysqli_query($con,$qr);
 $t=mysqli_num_rows($aa);
 echo $t;
if($t==1)
{

  
    $qry="update adminlog set password='$pass' where email='$email'";
    mysqli_query($con,$qry);
    echo $qry;
    header("Location:changepass_admin.php?erro=1");

 }
else
{
    header("Location:changepass_admin.php?errr=1");
}

?> 
