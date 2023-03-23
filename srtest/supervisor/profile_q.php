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

<?php
include('profile.php');
include_once '../connection.php';
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
        window.location.href='sup_home.php';
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('Details Updated');
        window.location.href='sup_home.php';
        </script>
		<?php
	}
	
	
}
?>

<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>