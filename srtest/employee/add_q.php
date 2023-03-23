		
<?php
include("add.php");
include_once '../connection.php';
if(isset($_POST['submit']))
{    
     
	$id= $_POST['id'];
	$status= $_POST['status'];
	$date = $_POST['date'];
	$time= $_POST['time'];
	$status_id= $_POST['status_id'];

	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="upload/";
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	

	
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		$sql2="INSERT INTO status_report(status, date, time, attachment,type,size) VALUES('$status', '$date','$time','$final_file','$file_type','$new_size')";
		
			$sql1="insert into work_status (work_id, status_id) values ('$id', '$status_id')";
		
		
		mysqli_query($con,$sql2);
			mysqli_query($con, $sql1);
	
	
		?>
		<script>
		alert('successfully uploaded');
        window.location.href='work_home.php?success';
        </script>
		<?php
	}
	else
	{
		
			$sql="INSERT INTO status_report(status, date, time) VALUES('$status', '$date','$time')";
			
			$sql3="insert into work_status (work_id, status_id) values ('$id', '$status_id')";
			mysqli_query($con,$sql);
			mysqli_query($con, $sql3);
	
		
		?>
        
		<script>
		alert('Upload status without attachment');
        window.location.href='work_home.php?fail';
        </script>
		<?php
	}
}
?>