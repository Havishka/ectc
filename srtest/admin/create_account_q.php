<?php 
include("create_account.php");

	include("../connection.php"); 
	include("../encrypt_password.php"); 

	$nic = $_POST['nic'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
	$gender = $_POST['gender'];
    $email = $_POST['email']; 
	$password = $_POST['password'];
	$encrypted = encryptIt( $password );
	$type = $_POST['type'];
	
 
$query="insert into employee(nic, fname, lname, gender, email, password, type) values('$nic', '$fname', '$lname', '$gender','$email', '$encrypted','$type')";

/*
echo "$nic";
echo "$fname";
echo "$email";
echo "$type";
*/

$result =  mysqli_query($con, $query);

if(!$result)
{
	echo("error :".mysqli_error($con));
}
if ($result)
			{
				
				//echo "yay";
			//echo("Error : " . mysqli_error($con));
			
		

				if($type =='Admin')
					{
					$query1="insert into super_admin (a_nic) 
					values ( '$nic')";				
					$result1 =  mysqli_query($con, $query1);
					
					if (!($result1))
						{
						echo("Error : " . mysqli_error($con));
						}  
  
					else
						{
						echo("Account creation was Successful");
						echo "<script>alert('Account creation was Successful'); window.location.href = 'create_account.php'; </script>";			
						}
  

					}

				elseif($type=='Supervisor')
					{
					$query2="insert into supervisor (s_nic) 
					values('$nic')";
	
					$result2 =  mysqli_query($con, $query2);	
					if (!($result2))
						{
						echo("Error : " . mysqli_error($con));
						}  
  
						else
						{
						echo("Account creation was Successful");
						echo "<script>alert('Account creation was Successful'); window.location.href = 'create_account.php'; </script>";
				
						}
						
					}
					
				elseif($type=='Employee')
					{
					$query3="insert into worker(w_nic) 
					values('$nic')";
	
					$result3 =  mysqli_query($con, $query3);	
					if (!($result3))
						{
						echo("Error : " . mysqli_error($con));
						}  
  
						else
						{
						echo("Account creation was Successful");
						echo "<script>alert('Account creation was Successful'); window.location.href = 'create_account.php'; </script>";
				
						}

					}
			

	}

  


?> 
<?php 
	mysqli_close($con);
?>