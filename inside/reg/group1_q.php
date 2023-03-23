<?php
include("../connection.php");





    $fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
    $nic = $_POST['nic'];
	$regDate = $_POST['regDate'];
    $address = $_POST['address'];
	$course = $_POST['course'];
	$regFee= $_POST['regFee'];
	$branch_id= $_POST['branch_id'];
	$sysID= $_POST['sysID'];
	$groupID= $_POST['groupID'];
	$dob=$_POST['dob'];
	$occ=$_POST['occ'];
	$gender=$_POST['gender'];
	
	
   // $branch = $_POST['branch'];
	//$courseName = $_POST['courseName'];
	
	
	//$type = $_POST['type'];
	//$groupNum = $_POST['groupNum'];
	


$query1="insert into student( fname,lname, nic, email, mobile, address ,regDate , regFee,  dob, gender, occupation) values ( '$fname', '$lname', '$nic', '$email', '$phone','$address','$regDate' , '$regFee','$dob', '$gender', '$occ' )";

$query2="insert into student_branch ( std_id, branch_id) values ( '$sysID', '$branch_id')";

$query3="insert into student_course ( std_id ,course_id ) values ( '$sysID', '$course')";

$query4="insert into student_group (group_id, course_id, std_id) values ('$groupID', '$course' , '$sysID')";

$result = mysqli_query($con, $query1);
 
$result= mysqli_query($con, $query2);

$result = mysqli_query($con, $query3);

$result = mysqli_query($con, $query4);



if (!($result ))
  {
  	echo("Database Error : " . mysqli_error($con));
  }
else
  {
	echo("Student creation was Successful");
	echo "<script>alert('Student creation was Successful'); window.location.href = 'group1.php'; </script>";
		//header("Location: RegHome.php");
  }
  
  
  
  

?>