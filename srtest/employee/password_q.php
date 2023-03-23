<?php 
	
	include("../connection.php"); 
	include("../encrypt_password.php"); 

	$nic = $_POST['nic'];
	$query6="select password as sys from employee where nic='$nic'";

$result22 = mysqli_query($con, $query6);

while($rows=mysqli_fetch_array($result22))
{
$password8=$rows['sys'];
}
	
	
	//$password = $_POST['password'];
	$Opassword = $_POST['Opassword'];
	$Npassword = $_POST['Npassword'];
	$Rpassword = $_POST['Rpassword'];
	$Oencrypted = encryptIt( $Opassword );
	$Nencrypted = encryptIt( $Npassword );
	echo"$password8";
	echo '<br>';
	echo "yay";
	echo '<br>';
	echo"old encripted $Oencrypted";
	echo '<br>';
	echo "got this old pw $Opassword";
	
	$gotthisdb = 'nGMxe/VCqcKxgMTVFMQSFO0IUevB9JHi22JFtvtl/H8=';
		echo '<br>';
	echo "gotgotthisdb $gotthisdb";

	
	if('$password8'== '$Oencrypted'){
		$query = "UPDATE employee SET password='$Nencrypted'
		WHERE nic='$nic' ";
		$result = mysqli_query($con, $query); 
	
	}

if(!($result22)){
echo" error".mysqli_error($con);
}

if(!($result)){
echo" error2".mysqli_error($con);
}


			

?> 
<?php 
	mysqli_close($con);
?>