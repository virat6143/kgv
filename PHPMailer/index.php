<?php
require 'phpmailer\PHPMailerAutoload.php';
$mail = new PHPMailer;

//$mail->SMTPDebug = 4;                               

$mail->isSMTP();                                      
$mail->Host = 'smtp.gmail.com';  
$mail->SMTPAuth = true;                               
$mail->Username = 'patelnigam4599@student.aau.in';                 
$mail->Password = '12894000';                           
$mail->SMTPSecure = 'tls';                            
$mail->Port = 587;                                    

$mail->setFrom('patelnigam4599@student.aau.in', 'Nigam Patel');
$mail->addAddress('meetladani12@gmail.com', 'Reciver');                  

$mail->isHTML(true);                                
$mail->Subject = 'PHPMailer Message...';
$mail->Body    = '<h1>This is the HTML message body <b>in bold!</b></h1>';


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>