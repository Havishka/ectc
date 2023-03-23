
<?php
//include("a_view.php");
include_once '../connection.php';
if(isset($_POST['submit']))
{    
    $a_id=$_POST['a_id']; 
	
	$status= $_POST['status'];
	$date = $_POST['date'];
	$time= $_POST['time'];
	$com_id=$_POST['com_id'];
	$sts_id=$_POST['sts_id'];
	
	$comment= $_POST['comment'];
	
	$work_id= $_POST['work_id'];

	
	
	$sts_id=$_POST['sts_id'];
	//$file = rand(1000,100000)."-".$_FILES['file']['name'];
    //$file_loc = $_FILES['file']['tmp_name'];
	//$file_size = $_FILES['file']['size'];
	//$file_type = $_FILES['file']['type'];
	//$folder="upload/";
	
	// new file size in KB
	//$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
//	$new_file_name = strtolower($file);
	// make file name in lower case
	
	//$final_file=str_replace(' ','-',$new_file_name);
	
	//if(move_uploaded_file($file_loc,$folder.$final_file))
	
		$sql="INSERT INTO comments(reply , super_c_id) VALUES('$comment', '$a_id' )";
		
		$sql1="insert into comment_status (com_id, status_id) values ('$com_id', '$sts_id')";
		
		//$sql2="insert into supervisor_comment (s_id, com_id) values ('$s_id', '$com_id')";
		
		$sql3="insert into work_comment(work_id, com_id) values ('$work_id', '$com_id')";
		
		mysqli_query($con,$sql);
		mysqli_query($con, $sql1);
		//mysqli_query($con, $sql2);
		mysqli_query($con, $sql3);
		?>
		<script>
		alert('successfully uploaded');
        window.location.href='admin_home.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error while uploading file');
        window.location.href='admin_home.php?fail';
        </script>
		<?php
	}

?>