<?php
include('connection.php');
session_start();
$user_check=$_SESSION['username'];


$ses_sql = mysqli_query($db,"SELECT username,name,level,branch_id,password,profile FROM admin WHERE username='$user_check' ");

$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_user=$row['username'];
$login_name=$row['name'];
$le=$row['level'];
$bid=$row['branch_id'];
$thisuserpass=$row['password'];



//session variables
$_SESSION['profileimg']=$row['profile'];



if(!isset($user_check))
{
header("Location: ../index.php");
}
?>