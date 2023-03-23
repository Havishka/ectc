<!DOCTYPE html>
<head>
<title>logIn</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> 
addEventListener("load", function() 
{ 
setTimeout(hideURLbar, 0); 
}, false); 
function hideURLbar()
{ 
window.scrollTo(0,1); 
} 
</script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="../css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="../css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"> </script>
</head>
<body>
<?php 
	include("connection.php"); 
    include("encrypt_password.php"); 

    $nic = $_POST['nic'];
    $password = $_POST['password'];
	$passcheck = encryptIt( $password );
	$result_v = mysqli_query($con,"SELECT * FROM employee WHERE nic='$nic' and state='T'") or die(mysql_error());
	
	$pass=encryptIt($nic);
	
	$rows_v = mysqli_num_rows($result_v);
	if ($rows_v != 1)
	{
		echo("Wrong NIC Number. Try Again!!!");
		echo "<script>alert('Wrong NIC Number!! or Your account has been expired'); window.location.href = 'login.php'; </script>";
    }
	else
	{
	
	
	$sql = "SELECT nic,type FROM employee WHERE nic='$nic' and password='$passcheck' ";
	$result = mysqli_query($con,$sql) or die(mysql_error());
	while( $row = $result->fetch_assoc() )
		{
		extract($row);
	
			$typex=$type;
		}	
	$rows = mysqli_num_rows($result);
	if ($rows == 1) 
		{
			
			
				//chk 4 def pw
				$sql2 = "SELECT * FROM employee WHERE nic='$nic' and password='$pass'";
				$result2 = mysqli_query($con,$sql2) or die(mysql_error());
	
				$rows2 = mysqli_num_rows($result2);
					if ($rows2 == 1)
					{
					session_start();
					$_SESSION['loggedin'] = true;
					$_SESSION['nic'] = $nic;
					
					header("Location: reenter_pw.php");	
					}
					
					else
					{
						
					echo("Login success");
		
		
					session_start();
					$_SESSION['loggedin'] = true;
					$_SESSION['nic'] = $nic;
						if($typex=='Admin')
						{
							//header("Location: lecturer_home.php");
							header("Location: admin/admin_home.php");
						}
						elseif($typex=='Supervisor')
						{
							header("Location: supervisor/sup_home.php");
						}
						elseif($typex=='Employee')
						{
							header("Location: employee/work_home.php");
						}
					}
		}
else
{

	//header("Location: login.php");
	echo "<script>alert('Wrong Password.'); window.location.href = 'login.php'; </script>";
}
	}
	
	
?>
		
</div>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>

