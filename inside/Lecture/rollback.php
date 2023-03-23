<?php
//  // Include config file
//  include 'connection.php';


//  $id=$_GET['id'];
//  echo $id;

//  $sql = "update t_time set approval='Not Approved' WHERE id=$id";

//  if ($con->query($sql) === TRUE) {
//    echo "<script>alert('Lecture coverage rolled back successfully!');</script>";
//   echo "<script>window.location.href ='../index.php?tab=approve_lecs'</script>";
//   } else {
//     echo "<script>alert('Error occured!');</script>". $con->error;
//     // echo "<script>window.location.href ='approve.php'</script>";
//   }

//   $con->close();


require_once ('../../connection.php');

$err = '';
if (isset($_POST['id'])) {
    $id =  $_POST['id'];
    $sql = "update t_time set approval='Not Approved' WHERE id=$id";
    if (mysqli_query($con, $sql))
        echo 1;
    else
        $err = "Cannot rollback.!";
    exit;
}
echo 0;
exit;

?>
