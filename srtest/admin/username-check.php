<?php
	include "../connection.php";	
	$user_name = $con->real_escape_string($_POST['nic']);
	$sqlUser='SELECT nic FROM employee WHERE nic = "'.$user_name.'"';
	$resUser=$con->query($sqlUser);
	if($resUser === false) {
		trigger_error('Error: ' . $con->error, E_USER_ERROR);
	} else {
		echo $rows_returned = $resUser->num_rows;
	}
	
?>