<?php

//if somehow admin email failed , as a redirect.
$sendto="noreply@caddcentre.lk";
$senn="defaultcadd";

require '../../Emails/smtp/class.phpmailer.php';

//session_start();

	 $namemanager = $_SESSION['namemanager'];
	 $emailmanager = $_SESSION['emailmanager'];

$sendto=$emailmanager;
$senn=$namemanager;


	$std_id = $_SESSION['std_id'];
	$course_id = $_SESSION['course_id'];
	$yourdis = $_SESSION['yourdis'];
	$course_fee_ori = $_SESSION['course_fee_ori'];
	$remark = $_SESSION['remark'];
	$login_namez = $_SESSION['login_namez'];
	$paydate = $_SESSION['paydate'];
	//$inst_pay = $_SESSION['inst_pay'];
	$name = $_SESSION['name'];
	$nic = $_SESSION['nic'];
	$c_name = $_SESSION['c_name'];

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
$mail->FromName = 'Cadd Centre - Discount Approval';


$mail->AddAddress($sendto, $senn);  // Add a recipient
//$mail->AddAddress('myemail@gmail.com');               // Name is optional

$mail->IsHTML(true);                                  // Set email format to HTML 

$mail->Subject = 'Cadd Centre Discount Approval Required Notice';
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
<p style="color: #F00; font-size: 25px;" align="center">CADD CENTRE DISCOUNT APPROVAL</p>

<HR>
<p>Hello, '.$namemanager.' </p>
<p>Discount Approval is required.</p>
<p style="color: #F00; font-size: 19px;">Discount Information</p>

<table align="center" cellpadding="10">
<thead>
<tr>

<th>Student Name</th>
<th>NIC</th>
<th>Course Name</th>
<th>Course Fee</th>
<th>Given Discount</th>
<th>Reason</th>
<th>Send By</th>

</tr>
</thead>
<tbody>	

<td>'.$name.'</td>
<td>'.$nic.'</td>
<td>'.$c_name.'</td>
<td>'.$course_fee_ori.'</td>
<td>'.$yourdis.'</td>
<td>'.$remark.'</td>
<td>'.$login_namez.'</td>

</tbody>
</table>

<br>

<p>
Before approving, make sure you have logged in to the system with your user credentials.
</p>
<p>

<a href="caddcentre.lk/sys1/inside/index.php?tab=approvediscount&&nic='.$nic.'&&course_id='.$course_id.'&&std_id='.$std_id.'&&loginis='.$namemanager.'">Approve Discount </a>

</p>


<p>To view all discount approvals/ Reject discount</p>
<p>

<a href="caddcentre.lk/sys1/inside/index.php?tab=discountapr">View all </a>

</p>
<p>&nbsp;</p>
<p>Thank you.</p>
<p>System,</p>
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
    //caddcentre.lk/sys1/inside/ --> localhost/CADDSYS/inside/
   echo "<script>alert('Payment Added!, Email notification NOT send. Check your internet connection!'); window.location.href = '../index.php?tab=payment_home'; </script>";
}
else
{
	//echo "yay!";
	echo "<script>alert('Email notification has been send to management level.'); window.location.href = '../index.php?tab=payment_home'; </script>";
}

?>