<?php
 // Include config file
include 'connection.php';

 $scb_aid=$_GET['scb_aid'];
 echo $scb_aid;

 $sql = "delete from student_course_batch WHERE scb_aid=$scb_aid";

 if ($con->query($sql) === TRUE) {
    echo "<script>alert('Successfully deleted!');</script>";
   echo "<script>window.location.href = '../index.php?tab=batch_reg'</script>";
  } else {
    echo "<script>alert('Error occured!');</script>". $con->error;
 echo "<script>window.location.href = '../index.php?tab=batch_reg'</script>";
  }
  
  $con->close();



?>