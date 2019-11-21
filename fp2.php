<?php
require 'PHPMailer\phpmailer\PHPMailerAutoload.php';
include("connect.php");
$mail=trim($_POST["email"]);
$qry="select * from adminlog where email='$mail'";
$rs=mysqli_query($con,$qry);
$row=mysqli_num_rows($rs);

//user pass forget
$qrry="select * from userreg where uem='$mail'";
$rrs=mysqli_query($con,$qrry);
$roow=mysqli_num_rows($rrs);
if($row==1)
{

$data=mysqli_fetch_assoc($rs);
$Username=$data["email"];
$Password=$data["password"];

	

		$mail = new PHPMailer;                              
		$mail->isSMTP();                                      
		$mail->Host = 'smtp.gmail.com';  
		$mail->SMTPAuth = true;                               
		$mail->Username = 'viratchaudharycv6143@gmail.com';                 
		$mail->Password = 'virat6143';                           
		$mail->SMTPSecure = 'tls';                            
		$mail->Port = 587; 
		$mail->SMTPAuth=true;                                   
		$mail->setFrom('viratchaudharycv6143@gmail.com', 'Virat Chaudhary');
		$mail->isHTML(true);                                
		$mail->Subject = 'Publication Stock Management System???';
		

	echo"<pre>";
	print_r($_POST);
	echo"</pre>";
	$email=$_POST['email'];
	$mail->addAddress($email,'Virat');  
			$mail->Body    = "
				<div style='height:150px;background-color:#ffffff;padding:10px;'>
					<div style='padding-top:10px;'>
						<h3>તમારુ પબ્લિકેશન સ્ટોક મેનેજમેન્ટ સિસ્ટમ મા સ્વાગત છે.</h3><hr>
						<b><b><br>
						યુઝરનેમ: $Username<br>
						પાસવર્ડ: $Password<br>
					</div>
				</div>
			";
		if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;	
			}
			else
			{
				
				header("location:forgotps.php?error=1");
			}
}
elseif ($roow==1) {
$data1=mysqli_fetch_assoc($rrs);
$Username1=$data1["usname"];
$Password1=$data1["upassword"];

		$mail = new PHPMailer;                              
		$mail->isSMTP();                                      
		$mail->Host = 'smtp.gmail.com';  
		$mail->SMTPAuth = true;                               
		$mail->Username = 'viratchaudharycv6143@gmail.com';                 
		$mail->Password = 'virat6143';                           
		$mail->SMTPSecure = 'tls';                            
		$mail->Port = 587; 
		$mail->SMTPAuth=true;                                   
		$mail->setFrom('viratchaudharycv6143@gmail.com', 'Virat Chaudhary');
		$mail->isHTML(true);                                
		$mail->Subject = 'Publication Stock Management System???';
		

	echo"<pre>";
	print_r($_POST);
	echo"</pre>";
	$email=$_POST['email'];
	$mail->addAddress($email,'Virat');  
			$mail->Body    = "
				<div style='height:150px;background-color:#ffffff;padding:10px;'>
					<div style='padding-top:10px;'>
						<h3>તમારુ પબ્લિકેશન સ્ટોક મેનેજમેન્ટ સિસ્ટમ મા સ્વાગત છે.</h3><hr>
						<b><b><br>
						યુઝરનેમ:$Username1<br>
						પાસવર્ડ:$Password1<br>
					</div>
				</div>
			";
		if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
				
				
			}
			else
			{
				
				header("location:forgotps.php?error=1");
			}
}else
  {
	header("location:forgotps.php?error=0");
  }


?>