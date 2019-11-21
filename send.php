<?php
require 'PHPMailer\phpmailer\PHPMailerAutoload.php';
include("connect.php");

$id=$_GET['userid'];
$qry="select * from userreg where u_id='".$id."'";
$rs=mysqli_query($con,$qry);
$row=mysqli_num_rows($rs);
if($row==1)
{

$data=mysqli_fetch_assoc($rs);
$mail1=$data['uem'];
echo $mail1;
	

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
	$email=$mail1;
	$mail->addAddress($email,'Virat');  
			$mail->Body    = "
				<div style='height:150px;background-color:#ffffff;padding:10px;'>
					<div style='padding-top:10px;'>
						<h3>પબ્લિકેશન સ્ટોક મેનેજમેન્ટ સિસ્ટમ મા સ્વાગત છે.</h3><hr>
						<b><b><br>
						યુઝર તમે રજીસ્ટર થઇ ચુક્યા તમે લોગીન કરી શકો 
					</div>
				</div>
			";
		if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
				
				
			}
			else
			{
				
				header("location:fetch_user.php");
			}
}

	else
  {
	header("location:fetch_user.php");
  }


?>