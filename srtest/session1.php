<?php session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
{
    //echo "User Logged in, " . $_SESSION['username'] . "!";
	$namesession=$_SESSION['nic'];
	
	$sql = "SELECT nic,type FROM employee WHERE nic='$namesession'";
	
	$result = mysqli_query($con,$sql) or die(mysql_error());
	$rows = mysqli_num_rows($result);
	
	if ($rows !=  1) 
	{
	echo "Please log in first to use the system.";
	header("location:login.php");	
		
	}

	
} 

	 	
?>