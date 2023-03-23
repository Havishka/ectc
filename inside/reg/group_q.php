<?php
include("../connection.php");


	
   
	$groupNo= $_POST['groupNo'];
	
	
	$course_id = $_POST['course_id'];
	
	$branch_id= $_POST['branch_id'];
	$memNo = $_POST['memNo'];
	
	
   // $branch = $_POST['branch'];
	//$courseName = $_POST['courseName'];
	
	
	//$type = $_POST['type'];
	//$groupNum = $_POST['groupNum'];
	


$query1="insert into student_group_tot ( group_id, g_course_id, numMembers, g_branch_id ) values ( '$groupNo', '$course_id', '$memNo' ,'$branch_id')";

//$query2="insert into student_group ( std_id, branch_id) values ( '$sysID', '$branch_id')";

//$query3="insert into student_course ( std_id ,course_id ,regNo) values ( '$sysID', '$course' , '$regNo')";

$result = mysqli_query($con, $query1);
 
//$result= mysqli_query($con, $query2);

//$result = mysqli_query($con, $query3);



if (!($result ))
  {
  	echo("Database Error : " . mysqli_error($con));
  }
else
  {
	echo("Student creation was Successful");
	echo "<script>alert('Group creation was Successful'); window.location.href = 'group1.php'; </script>";
		//header("Location: RegHome.php");
  }

?>

