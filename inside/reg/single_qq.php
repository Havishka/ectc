<?php
include "../connection.php";

    $fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
    $nic = $_POST['nic'];
	$regDate = $_POST['regDate'];
    $address = $_POST['address'];
	$course_id = $_POST['course_id'];
	$regFee= $_POST['regFee'];
	$branch_id= $_POST['branch_id'];
	$sysID= $_POST['sysID'];
	$dob=$_POST['dob'];
	$occ=$_POST['occ'];
	$gender=$_POST['gender'];
	
   // $branch = $_POST['branch'];
	//$courseName = $_POST['courseName'];
	
	
	//$type = $_POST['type'];
	//$groupNum = $_POST['groupNum'];
	


$query1="insert into student( fname,lname, nic, email, mobile, address ,regDate , regFee, dob, gender, occupation) values ( '$fname', '$lname', '$nic', '$email', '$phone','$address','$regDate' , '$regFee' , '$dob', '$gender', '$occ' )";

$query2="insert into student_branch ( std_id, branch_id) values ( '$sysID', '$branch_id')";

$query3="insert into student_course ( std_id ,course_id ) values ( '$sysID', '$course_id' )";

$result = mysqli_query($con, $query1);
 
$result= mysqli_query($con, $query2);

$result = mysqli_query($con, $query3);


$query5="insert into student_phone (student_id, phone) values ('$sysID', '$phone')";
$result5= mysqli_query($con, $query5);


$query4="SELECT * FROM student_pre_course WHERE nic='$nic'";
$result = mysqli_query($con, $query4);

while($rows=mysqli_fetch_array($result))
{
$count=$rows['count_course'];
}

   $result23 = $con->query( $query4 );
   $num_results23 = $result23->num_rows;
   	if($num_results23 > 0)
	{
			$countnew = $count + 1;
			$sql24 = "update student_pre_course set nic='$nic', last_course_id= '$course_id', count_course='$countnew' where nic='$nic'" ; //update table studentpre course . 
			
			$result24 = $con->query( $sql24 );
	}
	else
	{
		$countnew = 1;
		$sql25 = "insert into student_pre_course(nic,last_course_id,count_course) values('$nic','$course_id','$countnew')"; //insert table studentpre course . 
	    $result25 = $con->query( $sql25 );
	}

if (!($result ))
  {
  	echo("Database Error : " . mysqli_error($con));
  }
else
  {
	echo("Student creation was Successful");
	echo "<script>alert('Student creation was Successful'); window.location.href = 'single.php'; </script>";
		//header("Location: RegHome.php");
  }

?>