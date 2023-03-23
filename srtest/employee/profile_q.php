

<?php
//include("profile.php");
include ("../connection.php");
if(isset($_POST['submit']))
{    
     
	$fname= $_POST['fname'];
	$lname= $_POST['lname'];
	$dob = $_POST['dob'];
	//$gender= $_POST['gender'];
	$email= $_POST['email'];
	$phone = $_POST['phone'];
	$nic=$_POST['nic'];
	$occupation = $_POST['occupation'];
	$discription=$_POST['discription'];



	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="../profile/";
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($file);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);
	
	$sql = "update employee set fname='$fname', lname= '$lname', dob='$dob', email='$email', phone='$phone' , occupation='$occupation', discription='$discription'  where nic='$nic'";
		
		mysqli_query($con,$sql);
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{ 
		
		$sql2 = "update employee set image='$final_file', Itype='$file_type', size='$file_size' where nic='$nic'";
		
		mysqli_query($con,$sql2);
	
		?>
        
		<script>
		alert('Profile Picture and details updated');
        window.location.href='work_home.php?success';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Details Updated');
        window.location.href='work_home.php?fail';
        </script>
		<?php
	}
	
	
}
?>