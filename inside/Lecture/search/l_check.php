<?php
include('connection.php');
session_start();
$user_check=$_SESSION['name'];


$ses_sql = mysqli_query($con,"SELECT f_name FROM lecture_reg WHERE username='$user_check'");

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);


?>