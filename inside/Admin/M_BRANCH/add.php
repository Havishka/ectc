<?php
header('Content-Type: application/json');

require_once ('../../connection.php');

$exists = false;
$responce = array();
$result = true;
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $branch = $_POST['branch'];

    $DBbranch = "SELECT * FROM branch WHERE name = '$branch'";
    $resultb = mysqli_query($con, $DBbranch);
    if (!$resultb || mysqli_num_rows($resultb) < 1) {
        $sql = "INSERT INTO `branch`(`name` ) VALUES ('$branch')";
        $sql_add = mysqli_query($con, $sql);

        if (!$sql_add) {
            $result = false;
            $message .= " Error Sql : (" . mysqli_errno($con) . ") " . mysqli_error($con) . ". ";
        }
        $responce['result'] = $result;
        $responce['message'] = $message;
        echo (json_encode($responce));
    } else {
        $exists = true;
        $responce['exists'] = $exists;
        echo (json_encode($responce));
    }
    mysqli_close($con);
}
