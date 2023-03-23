<?php

require_once ('../../connection.php');

$err = '';
if (isset($_POST['id'])) {
    $id =  $_POST['id'];
    $sql = "UPDATE lec_pay SET finalize = NULL Where id='$id'";
    if (mysqli_query($con, $sql))
        echo 1;
    else
        $err = "Cannot rollback....!";
    exit;
}
echo 0;
exit;


?>

