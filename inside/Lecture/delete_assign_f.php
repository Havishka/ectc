<?php

include 'connection.php';

$err = '';
if (isset($_POST['id'])) {
    $id =  $_POST['id'];
    $sql = "delete from c_assign WHERE id=$id";
    if (mysqli_query($con, $sql))
        echo 1;
    else
        $err = "Cannot delete. This is in use!";
    exit;
}
echo 0;
exit;

?>