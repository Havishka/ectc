<?php
include("../connection.php");


   	$nicGOT=$_GET['nic'];
	$course_idGOT=$_GET['course_id'];
	$studentID=$_GET['std_id'];
	
	
	
	
	
	/*max_disc_per remark*/

//echo $nicGOT;
//echo $studentID;

			

$query="update payment set approvalState= 'T' where std_id = '$studentID' and course_id ='$course_idGOT'";

$result = mysqli_query($con, $query);


if (!($result))
  {
  	echo("Database Error : " . mysqli_error($con));
  }
else
  {
	echo "<script>alert('Discount Approval was Successful'); window.location.href = 'index.php?tab=discountapr'; </script>";
  }

?>