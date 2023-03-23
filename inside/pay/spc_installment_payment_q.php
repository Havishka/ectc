<?php
include("../connection.php");


    $std_id = $_POST['std_idxxx'];
   	$course_id = $_POST['selecCID'];
    $mypaid = $_POST['mypaid'];
	$paydate = $_POST['item23']; 
	$youshouldpay = $_POST['ins1xx']; 
	$login_namez = $_POST['login_name'];
$receipt_number = $_POST['receipt_number'];
//echo "$youshouldpay";

if(($youshouldpay) >= $mypaid)
{
	//insert to payment receipt
	$query21="insert into payment_receipt(receipt_number, pr_date, pr_std_id, pr_course_id, payment,issuedBy) values('$receipt_number', '$paydate', '$std_id', '$course_id','$mypaid','$login_namez')";
	$result21 = mysqli_query($con, $query21);
	
	
	if (!($result21 ))
	{
  	echo("SQL : " . mysqli_error($con));
	}
	else
	{
	//echo("Payment adding Successful");
	echo "<script>alert('Payment adding Successful'); window.location.href = '../index.php?tab=payment_home'; </script>";
	
	}
	
}

else
{
	echo "<script>alert('System Rollback, Your Payment is higher than required.'); window.location.href = '../index.php?tab=payment_home'; </script>";
}


?>