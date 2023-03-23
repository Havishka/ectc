<?php session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
{
    //echo "User Logged in, " . $_SESSION['username'] . "!";
	$namesession=$_SESSION['nic'];
} 
else 
{
    echo "Please log in first to use the system.";
	header("location:login.php");
} 

	 	
?>