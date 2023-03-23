<?php

include 'connection.php';

$err = '';
if (isset($_GET['id'])) {
    $id =  $_GET['id'];
    $sql = "UPDATE t_time set approval='Approved' WHERE id=$id";
    if (mysqli_query($con, $sql))
        echo 1;
    else
        $err = "Cannot approve. This is in use!";
    exit;
}
echo 0;
exit;
?>
