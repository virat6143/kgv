 <?php

 include 'connect.php';

 echo"<pre>";
 print_r($_POST);
 echo"</pre>";

 $email=$_POST["txtemail"];
 //$oldpass=$_POST["txtopass"];
 $pass=$_POST["txtpass"];

 $qr="select * from userreg where uem='".$email."'";
 $aa= mysqli_query($con,$qr);
 $t=mysqli_num_rows($aa);
 echo $t;
if($t==1)
{

  
    $qry="update userreg set upassword='$pass' where uem='$email'";
    mysqli_query($con,$qry);
    echo $qry;
    header("Location:changepass_user.php?erro=1");

 }
else
{
    header("Location:changepass_user.php?errr=1");
}

?> 
