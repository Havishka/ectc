<?php
include("../connection.php");

        $scb_aid = $_POST['scb_aid'];
		$course_id = $_POST['course_id'];
		$branch_id = $_POST['branch_id'];
		$startdate = $_POST['startdate'];
		$enddate = $_POST['enddate'];
		$state = $_POST['state'];
		$remarks = $_POST['remarks'];
	    $todayis = date("Y-m-d");
		$login_name = $_POST['login_name'];
		

$scb_other="Batch got Edited by $login_name on $todayis";

$query="update student_course_batch set scb_branch_id='$branch_id', scb_course_id='$course_id', batch_start_date='$startdate',batch_end_date='$enddate', batch_state='$state' ,batch_remarks='$remarks', scb_other='$scb_other' where scb_aid='$scb_aid' ";
$result = mysqli_query($con, $query);

if (!($result ))
  {
  	echo("SQL : " . mysqli_error($con));
  }
else
  {
	echo "<script>alert('Batch updated successfully!'); window.location.href = '../index.php?tab=batch_reg'; </script>";

  }
