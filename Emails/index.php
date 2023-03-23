<?php
require 'smtp/class.phpmailer.php';

$mail = new PHPMailer;

$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'gator4081.hostgator.com'; 
$mail->Host = 'mail.caddcentre.lk'; 

                // Specify main and backup server
$mail->Port = 25;                                // Set the SMTP port
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'noreply@caddcentre.lk';                // SMTP username
$mail->Password = 'ectc';                  // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'noreply@caddcentre.lk';
$mail->FromName = 'Your From name';
$mail->AddAddress('chinthakavishwa99@gmail.com', 'Josh Adams');  // Add a recipient
$mail->AddAddress('chinthakavishwa99@gmail.com');               // Name is optional

$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Hellooooo';
$mail->Body    = 'This is the HTML message body <strong>in bold!</strong>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo 'Message has been sent';