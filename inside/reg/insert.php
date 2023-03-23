<?php
//insert.php
//$connect = mysqli_connect("localhost", "root", "", "cadd_db");
include "../connection.php";
$connect = $con;
if(isset($_POST["fname"]))
{
 $fname = $_POST["fname"];
 $lname = $_POST["lname"];
 $branch = $_POST["branch"];
 $course = $_POST["course"];
 $query = '';
 for($count = 0; $count<count($fname); $count++)
 {
  $fname_clean = mysqli_real_escape_string($connect, $fname[$count]);
  $lname_clean = mysqli_real_escape_string($connect, $lname[$count]);
  $course_clean = mysqli_real_escape_string($connect, $course[$count]);
  $branch_clean = mysqli_real_escape_string($connect, $branch[$count]);
  if($fname_clean != '' && $lname_clean != '' && $branch_clean != '' && $course_clean != '')
  {
   $query .= '
   INSERT INTO item(fname, lname, course, branch) 
   VALUES("'.$fname_clean.'", "'.$lname_clean.'", "'.$course_clean.'", "'.$branch_clean.'"); 
   ';
  }
 }
 if($query != '')
 {
  if(mysqli_multi_query($connect, $query))
  {
   echo 'Item Data Inserted';
  }
  else
  {
   echo 'Error';
  }
 }
 else
 {
  echo 'All Fields are Required';
 }
}
?>

