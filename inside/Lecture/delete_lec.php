<?php
 // Include config file
include 'connection.php';

$err = '';
if (isset($_POST['id'])) {
    $id =  $_POST['id'];
    $sql = "DELETE FROM lecture_reg WHERE id='$id'";
    if (mysqli_query($con, $sql))
        echo 1;
    else
        $err = "Cannot delete. This Designation is in use!";
    exit;
}
echo 0;
exit;

//  $id=$_GET['id'];
//  echo $id;

//  $sql = "delete from lecture_reg WHERE id=$id";

//  if ($con->query($sql) === TRUE) {
//     echo "<script>alert('Successfully removed!');</script>";
//     echo "<script>window.location.href ='../index.php?tab=manage_lec'</script>";
//   } else {
//     echo "<script>alert('Error occured!');</script>". $con->error;
//     echo "<script>window.location.href ='../index.php?tab=manage_lec'</script>";
//   }
  
//   $conn->close();
?>