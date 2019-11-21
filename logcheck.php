<?php
include ('connect.php');
session_start();

if(isset($_POST['submit']))
{
	$unm=trim($_POST["a_username"]);
	$pwd=$_POST["a_password"];
	
	$qry="select * from adminlog where email='".$unm."' && password='".$pwd."'";
	$rs=mysqli_query($con,$qry);
	$data=mysqli_num_rows($rs);
	while($row=mysqli_fetch_assoc($rs))
	{
		$admin=$row['username'];
	}
	if($data==1){
		$_SESSION["auname"] = $admin;
		header("location:home.php");
	}

	if($data!=1)
	{
		$qry2="select * from userreg where uem='".$unm."' && upassword='".$pwd."' && status=1";	
		//echo  $qry2;
		$rs1=mysqli_query($con,$qry2);
		$data2=mysqli_num_rows($rs1); 
     
	while($row=mysqli_fetch_assoc($rs1))
	 {
	    $user=$row['uname'];
	    $uid=$row['u_id'];
	 }
		
		if($data2==1){
			header("location:home.php");
			$_SESSION["uname"] = $user;
			setcookie('uid',$uid);
		}
		else
		{
			header("location:index.php?err=1");
		}
	}
	else
	{
	
	}
	
}

?>