<?php

session_start();

if(isset($_SESSION['auname']) )
{	
	unset($_SESSION['auname']);
	unset($_SESSION['id']);
	header("location:index.php?ar");
	
}
if(isset($_SESSION['uname']) )
{	
	unset($_SESSION['uname']);
	header("location:index.php?ar");
	
}
?>
