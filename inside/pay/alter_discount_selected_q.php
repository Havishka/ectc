<?php
include("../connection.php");


	$course_idGOT=$_POST['cid'];
	$studentID=$_POST['sid'];
	$max_disc_per=$_POST['max_disc_per'];
	$remark=$_POST['remark'];
	//$course_fee=$_POST['course_fee'];
	$newpayalterdate=$_POST['item23'];
	$predisc=$_POST['predisc'];
	$tot_amount_old=$_POST['tot_amount_old'];
	
	
	$newtotAmount = $tot_amount_old + $predisc - $max_disc_per; 


//echo "$newtotAmount";


$query="update payment set discount='$max_disc_per' , tot_amount ='$newtotAmount', discount_remark ='$remark', approvalState= 'TC', pay_date='$newpayalterdate' where std_id = '$studentID' and course_id ='$course_idGOT'";

$result = mysqli_query($con, $query);


if (!($result))
  {
  	echo("Database Error : " . mysqli_error($con));
  }
else
  {
	echo "<script>alert('Discount Modified'); window.location.href = '../index.php?tab=alterdiscount'; </script>";
  }

?>