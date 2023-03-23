<?php
 // Include config file
//  include '../../connection.php';


//  $id=$_GET['id'];
//  echo $id;

//  $sql = "delete from branch WHERE branch_id=$id";

//  if ($con->query($sql) === TRUE) {
//     echo "<script>alert('Branch removed successfully!');</script>";
//     echo "<script>window.location.href ='../../index.php?tab=branch'</script>";
//   } else {
//     echo "<script>alert('Error occured!');</script>". $con->error;
//     // echo "<script>window.location.href ='approve.php'</script>";
//   }
  
//   $conn->close();

require_once ('../../connection.php');

$err = '';
if (isset($_POST['id'])) {
    $id =  $_POST['id'];
    $sql = "DELETE FROM branch WHERE branch_id='$id'";
    if (mysqli_query($con, $sql))
        echo 1;
    else
        $err = "Cannot delete. This Designation is in use!";
    exit;
}
echo 0;
  ?>