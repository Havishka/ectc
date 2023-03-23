
<?php

include("../connection.php");

$err = '';
if (isset($_GET['id'])) {
    $id =  $_GET['id'];
    $sql = "UPDATE lec_pay SET approve = 'Approved' Where id='$id'";
    if (mysqli_query($con, $sql))
        echo 1;
    else
        $err = "Cannot approve...!";
    exit;
}
echo 0;
exit;

?>