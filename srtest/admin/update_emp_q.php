<?php 
	
	include("update.php");
	


	$nic = $_POST['nic'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
	$type = $_POST['type'];
	$type1 = $_POST['type1'];
    $dob = $_POST['dob'];
	$email = $_POST['email']; 
	$phone = $_POST['phone'];
	$occupation = $_POST['occupation'];
	//$state = $_POST['state'];
	$discription=$_POST['discription'];
	
	if(isset($_POST['state'])){
		
		$state='F';
	}
	else
	{		
		$state='T';
	}
	
	
	if(($type1 == 'Supervisor')&&($type == 'Admin'))
	 {
		 
		 
		 $query1 = "DELETE FROM supervisor WHERE s_nic='$nic' ";
		 echo"test";
		 $result1 =  mysqli_query($con, $query1);
		 
		 $query2="insert into super_admin (a_nic) values ( '$nic')";
		 $result2 =  mysqli_query($con, $query2);
		 
		$query = "UPDATE employee SET 
		fname='$fname', 
		lname='$lname', 
		dob=(case when '$dob' = '' then dob else '$dob' end),
		email='$email',
		phone=(case when '$phone' = '' then phone else '$phone' end) , 
		occupation=(case when '$occupation' = '' then occupation else '$occupation' end),
		discription=(case when '$discription' = '' then discription else '$discription' end),
		type='$type' ,
		state='$state'
		WHERE nic='$nic' ";
		$result = mysqli_query($con, $query); 
		
		
			if (!($result))
			{
			echo("Error : " . mysqli_error($con));
			}  
		
		else
		{
		echo("\n Account Updated and change $nic from Supervisor to Admin Successful");
		echo "<script>alert('Account Updated and change $nic from Supervisor to Admin Successful'); window.location.href = 'update.php'; </script>";
		//header("Location: admin_home.php");
		}
		 
		 
	 }
	 
	 elseif(($type1 == 'Employee')&&($type == 'Supervisor'))
	 {
		  $query4 = "DELETE FROM worker WHERE w_nic='$nic' ";
		 echo"test";
		 $result4 =  mysqli_query($con, $query4);
		 
		 $query5="insert into supervisor (s_nic) values ( '$nic')";
		 $result5 =  mysqli_query($con, $query5);
		 
		$query6 = "UPDATE employee SET 
		fname='$fname', 
		lname='$lname', 
		dob=(case when '$dob' = '' then dob else '$dob' end),
		email='$email',
		phone=(case when '$phone' = '' then phone else '$phone' end) , 
		occupation=(case when '$occupation' = '' then occupation else '$occupation' end),
		discription=(case when '$discription' = '' then discription else '$discription' end),
		type='$type' ,
		state='$state'
		WHERE nic='$nic' ";
		$result6 = mysqli_query($con, $query6); 
		
		
			if (!($result6))
			{
			echo("Error : " . mysqli_error($con));
			}  
		
		else
		{
		echo("\nAccount Updated and change $nic from Employee to Supervisor Successful");
		echo "<script>alert('Account Updated and change $nic from Employee to Supervisor Successful'); window.location.href = 'update.php'; </script>";
		//header("Location: admin_home.php");
		}
	 }

	 elseif(($type1 == 'Employee')&&($type == 'Admin'))
	 {
		  $query7 = "DELETE FROM worker WHERE w_nic='$nic' ";
		 echo"test";
		 $result7 =  mysqli_query($con, $query7);
		 
		 $query8="insert into super_admin (a_nic) values ( '$nic')";
		 $result8 =  mysqli_query($con, $query8);
		 
		$query9 = "UPDATE employee SET 
		fname='$fname', 
		lname='$lname', 
		dob=(case when '$dob' = '' then dob else '$dob' end),
		email='$email',
		phone=(case when '$phone' = '' then phone else '$phone' end) , 
		occupation=(case when '$occupation' = '' then occupation else '$occupation' end),
		discription=(case when '$discription' = '' then discription else '$discription' end),
		type='$type' ,
		state='$state'
		WHERE nic='$nic' ";
		$result9 = mysqli_query($con, $query9); 
		
		
			if (!($result9))
			{
			echo("Error : " . mysqli_error($con));
			}  
		
		else
		{
		echo("\nAccount Updated and change $nic from Employee to Admin Successful");
		echo "<script>alert('Account Updated and change $nic from Employee to Admin Successful'); window.location.href = 'update.php'; </script>";
		//header("Location: admin_home.php");
		}
	 }
	 
	 else
	 {
		$query10 = "UPDATE employee SET 
		fname='$fname', 
		lname='$lname', 
		dob=(case when '$dob' = '' then dob else '$dob' end),
		email='$email',
		phone=(case when '$phone' = '' then phone else '$phone' end) , 
		occupation=(case when '$occupation' = '' then occupation else '$occupation' end),
		discription=(case when '$discription' = '' then discription else '$discription' end),
		type='$type' ,
		state='$state'
		WHERE nic='$nic' ";
		$result10 = mysqli_query($con, $query10); 
		
		if (!($result10))
			{
			echo("Error : " . mysqli_error($con));
			}  
		
		else
		{
		echo("\nAccount Update was Successful");
		echo "<script>alert('Account Update was Successful'); window.location.href = 'update.php'; </script>";
		//header("Location: admin_home.php");
		}
		 
	 }

	/*	
		
			if (!($result))
			{
			echo("Error : " . mysqli_error($con));
			}  
		
		else
		{
		echo("\nAccount Update was Successful");
		echo "<script>alert('Account Update was Successful'); window.location.href = 'admin_home.php'; </script>";
		//header("Location: admin_home.php");
		}
  
*/
 
?> 
<?php 
	mysqli_close($con);
?>