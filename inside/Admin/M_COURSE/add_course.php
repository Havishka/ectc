<?php
header('Content-Type: application/json');

require_once ('../../connection.php');

$exists = false;
$responce = array();
$result = true;
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $course = $_POST['c_name'];
	$fee = $_POST['course_fee'];
	$duration = $_POST['duration'];

    $DBcourse = "SELECT * FROM course where c_name = '$course'";
    $resultb = mysqli_query($con, $DBcourse);
    if (!$resultb || mysqli_num_rows($resultb) < 1) {
        $sql = "INSERT into course (c_name,course_fee,duration,state) values('$course','$fee','$duration','T')";
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
?>