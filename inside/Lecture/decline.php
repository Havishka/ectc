<?php
 // Include config file
//  include 'connection.php';

//  $id=$_GET['id'];
//  echo $id;
//  $sql = "update t_time set approval='Declined' WHERE id=$id";

//  if ($con->query($sql) === TRUE) {
//    echo "<script>alert('Lecture coverage rejected!');</script>";
//   echo "<script>window.location.href ='../index.php?tab=approve_lecs'</script>";
//   } else {
//     echo "<script>alert('Error occured!');</script>". $con->error;
//     // echo "<script>window.location.href ='approve.php'</script>";
//   }

//   $con->close();


include 'connection.php';

$err = '';
if (isset($_GET['id'])) {
    $id =  $_GET['id'];
    $sql = "UPDATE t_time set approval='Declined' WHERE id=$id";
    if (mysqli_query($con, $sql))
        echo 1;
    else
        $err = "Cannot delete. This Designation is in use!";
    exit;
}
echo 0;
exit;
  ?>