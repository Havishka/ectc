<?php
/*
Author: Javed Ur Rehman
Website: http://www.allphptricks.com/
*/

//require('db.php');
include("../connection.php");
$id=$_REQUEST['id'];
$query = "DELETE FROM student_group WHERE std_id=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

$givv=$_SESSION['grpid'];
header("Location: ../index.php?tab=regrp&&ref=3231&&grpid='".$givv."'"); 
?>