<?php
include("../connection.php");

	$course_idGOT=$_POST['cid'];
	$studentID=$_POST['sid'];
	$max_disc_per=$_POST['max_disc_per'];
	$remark=$_POST['remark'];
	$course_fee=$_POST['course_fee'];
	
	$newtotAmount = $course_fee - $max_disc_per;
	/*
echo "remark $remark";
echo "$course_idGOT   std it is $studentID";
echo "total amount $newtotAmount";

*/

/*
$query="update payment set approvalState= 'R' where std_id = '$studentID' and course_id ='$course_idGOT'";
*/


$query="update payment set discount='$max_disc_per' , tot_amount ='$newtotAmount', discount_remark ='$remark', approvalState= 'TC' where std_id = '$studentID' and course_id ='$course_idGOT'";

$result = mysqli_query($con, $query);


if (!($result))
  {
  	echo("Database Error : " . mysqli_error($con));
  }
else
  {
	echo "<script>alert('Discount Modified'); window.location.href = '../index.php?tab=discountapr'; </script>";
  }

?>