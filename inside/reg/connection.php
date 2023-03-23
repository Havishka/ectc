<?php
	$con=mysqli_connect("localhost","root","ectc","ectc_lec");   //create connection
	
	if(mysqli_connect_errno())
	{
		echo "Failed to connect to database".mysqli_connect_error();
	}
	
	/*else
	{
		echo "Connected to databasae";
	}
	*/
?>
