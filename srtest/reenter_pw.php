<html>
<head>
<?php session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
{
    //echo "User Logged in, " . $_SESSION['username'] . "!";
	$namesession=$_SESSION['nic'];
} 
else 
{
    echo "Please log in first to use the system.";
	header("location:login.php");
} 
	include("connection.php");
	
	 	
?>
<title>E-wis</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content=""/>

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
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="reg-w3">
 
<div class="w3layouts-main">
	<h2>Change Your Password</h2>
		<form action="reenter_pw_q.php" method="post">
			<input type="text" class="ggg" name="nic" value="<?php echo $_SESSION['nic']; ?>" required="" readonly>			
			<input type="password" class="ggg" name="password" id="password" placeholder="PASSWORD" required="">
			<input type="password" class="ggg" name="password1" id="password1" placeholder="RE ENTER PASSWORD" required="">

				<div class="clearfix"></div>
				<input type="submit" value="submit" id="btnSubmit" onclick="return Validate()" >
		</form>
		
		<script type="text/javascript">
        function Validate() {
            var password = document.getElementById("password").value;
            var password1 = document.getElementById("password1").value;
            if (password != password1) {
                alert("Password do not match.");
                return false;
            }
            return true;
        }
    </script>
		
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
