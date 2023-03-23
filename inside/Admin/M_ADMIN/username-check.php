<?php


		include "../../connection.php";	
	$user_name = $con->real_escape_string($_POST['nic1']);
	$sqlUser='SELECT username FROM admin WHERE username = "'.$user_name.'"';
	$resUser=$con->query($sqlUser);
	if($resUser === false) {
		trigger_error('Error: ' . $con->error, E_USER_ERROR);
	} else {
		echo $rows_returned = $resUser->num_rows;
	}
	
?>