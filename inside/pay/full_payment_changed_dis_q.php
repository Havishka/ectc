<?php
include("../connection.php");


    $std_id = $_POST['std_idxxx'];
   	$course_id = $_POST['selecCID'];

	//$paydate = $_POST['item23']; 
	//$youshouldpay = $_POST['ins1xx']; 
	//$login_namez = $_POST['login_name']; 
	$tot_amount = $_POST['tot_amount']; 
	$receipt = $_POST['receiptid']; 
	//echo $receipt;

	$query="update payment set approvalState= 'TT' where std_id = '$std_id' and course_id ='$course_id'";
	$result = mysqli_query($con, $query);
	
	$query21="update payment_receipt set payment='$tot_amount' where pr_id='$receipt'";
	$result21 = mysqli_query($con, $query21);
	
	if (!(($result21) && ($result) ))
	{
  	echo("SQL : " . mysqli_error($con));
	}
	else
	{
	//echo("Payment adding Successful");
	echo "<script>alert('Full Payment Completed'); window.location.href = '../index.php?tab=payment_home'; </script>";
	
	}

?>