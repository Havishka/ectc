<?php 
	include("recoverpw.php");
	include("../connection.php"); 
	include("../encrypt_password.php"); 

	$nic = $_POST['nic'];
	$password = $_POST['password'];
	$encrypted = encryptIt( $password );

$query = "UPDATE employee SET 
		password='$encrypted'
		WHERE nic='$nic' ";
		$result = mysqli_query($con, $query); 

$result =  mysqli_query($con, $query);

if(!$result)
{
	echo("error :".mysqli_error($con));
}

else
						{
						echo("Your Password reset Successful");
						echo "<script>alert('Your Password reset Successful'); window.location.href = 'recoverpw.php'; </script>";			
						}
			


?> 
<?php 
	mysqli_close($con);
?>