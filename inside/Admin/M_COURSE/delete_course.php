<?php
 // Include config file
//  include '../../connection.php';


//  $id=$_GET['id'];
//  echo $id;

//  $sql = "delete from course WHERE course_id=$id";

//  if ($con->query($sql) === TRUE) {
//     echo "<script>alert('Course removed successfully!');</script>";
//     echo "<script>window.location.href ='../../index.php?tab=all_course'</script>";
//   } else {
//     echo "<script>alert('Error occured!');</script>". $con->error;
//     // echo "<script>window.location.href ='approve.php'</script>";
//   }
  
//   $conn->close();
require_once ('../../connection.php');

$err = '';
if (isset($_POST['id'])) {
    $id =  $_POST['id'];
    $sql = "delete from course WHERE course_id=$id";
    if (mysqli_query($con, $sql))
        echo 1;
    else
        $err = "Cannot delete.!";
    exit;
}
echo 0;
exit;
?>