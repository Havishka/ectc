<?php

include("../connection.php");

$gid=$_REQUEST['gid'];
//$conf = 0;

$query = "DELETE FROM student_group WHERE group_id='$gid'"; 

$result = mysqli_query($con,$query) or die ( mysqli_error());

$query2 = "DELETE FROM student_group_tot WHERE group_id='$gid'"; 

$result2 = mysqli_query($con,$query2) or die ( mysqli_error());


//echo "$conf";
echo "Success";
header("Location: ../index.php?tab=regrp"); 
?>