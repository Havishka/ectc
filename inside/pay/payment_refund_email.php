<?php

//if somehow admin email failed , as a redirect.
$sendto="noreply@caddcentre.lk";
$senn="defaultcadd";

require '../Emails/smtp/class.phpmailer.php';

//session_start();

	 $namemanager = $_SESSION['namemanager'];
	 $emailmanager = $_SESSION['emailmanager'];

$sendto=$emailmanager;
$senn=$namemanager;

	$_SESSION['studentname'] = $studentname;
	//$_SESSION['cid'] = $cid;
	$_SESSION['nic'] = $nic;
	$_SESSION['c_name'] = $c_name;
	$_SESSION['issuedb'] = $issuedb;
	$_SESSION['gotday'] = $gotday;
	$_SESSION['remark'] = $remark;
	$_SESSION['refundam'] = $refundam;

$mail = new PHPMailer;

$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'gator4081.hostgator.com'; 
$mail->Host = 'mail.caddcentre.lk'; 

                // Specify main and backup server
$mail->Port = 25;                                // Set the SMTP port
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'noreply@caddcentre.lk';                // SMTP username
$mail->Password = 'ectc';     // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'noreply@caddcentre.lk';
$mail->FromName = 'Cadd Centre - Student Refund Notice';


$mail->AddAddress($sendto, $senn);  // Add a recipient


$mail->IsHTML(true);                                  // Set email format to HTML 

$mail->Subject = 'Cadd Centre Refund Notice';
$mail->Body    = '<html>
<head>
<style type="text/css">
body table tr {
	font-family: Arial, Helvetica, sans-serif;
}
body table tr {
	font-family: Georgia, "Times New Roman", Times, serif;
}
</style>
</head>
<body>

<br>
<table width="657" height="78" align="center" cellpadding="10">
<tr>
  <td width="649" height="72" bgcolor="#BADCFF"><div align="" style="width: 100%; padding:5px; font-family: Georgia, "Times New Roman", Times, serif; font-size: 24px; color: #000;">
<p style="color: #F00; font-size: 25px;" align="center">CADD CENTRE - STUDENT COURSE FEE REFUND NOTICE</p>

<HR>
<p>Hello, '.$namemanager.' </p>
<p>Student Course Fee Refund Notice </p>
<p style="color: #F00; font-size: 19px;">Course Fee Refund Information</p>

<table align="center" cellpadding="10">
<thead>
<tr>

<th>Student Name</th>
<th>NIC</th>
<th>Course Name</th>
<th>Refunded Date</th>
<th>Reason</th>
<th>Refunded Amount</th>
<th>Refund Hanled By</th>

</tr>
</thead>
<tbody>	

<td>'.$studentname.'</td>
<td>'.$nic.'</td>
<td>'.$c_name.'</td>
<td>'.$gotday.'</td>
<td>'.$remark.'</td>
<td>'.$refundam.'</td>
<td>'.$issuedb.'</td>

</tbody>
</table>

<br>




<p>This is a system generated message.</p>
<p>&nbsp;</p>
<p>Thank you.</p>
<p>www.caddcentre.lk/sys1</p>
<P>'.date("Y-m-d").'</p>
<p>&nbsp;</p>
</div></td>
  </tr>
</table>

</body>
</html>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->Send()) {
   $fmsg= 'Confirmation could not be sent.';
   $fmsg.='Mailer Error: ' . $mail->ErrorInfo;
   //exit;
   echo "<script>alert('Refund Success!, Email notification NOT send. Check your internet connection!'); window.location.href = '../index.php?tab=payment_refund'; </script>";
}
else
{
	//echo "yay!";
	echo "<script>alert('Refund Sucess.'); window.location.href = '../index.php?tab=payment_refund'; </script>";
}

?>