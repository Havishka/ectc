<?php 
	include("../session.php"); 	
	include("../connection.php");
	
		$query9="select type from employee where nic='$namesession'";
	
	$result = mysqli_query($con, $query9);

	while( $row = $result->fetch_assoc() )
		{
		extract($row);
	
			$typex=$type;
		}
$rows = mysqli_num_rows($result);
	if ($rows == 1){
			 if (($typex =='Employee')||($typex =='Admin'))
				{
				
				echo "<script>alert('Please login first!!!'); window.location.href = '../login.php'; </script>";
				}
				
				
			 
	
	}
	 	
?>

<?php 


$query4="select fname as sys from employee where nic='".$con->real_escape_string($_SESSION['nic'])."'";

$result = mysqli_query($con, $query4);

while($rows=mysqli_fetch_array($result))
{
$name=$rows['sys'];
}

?>

<?php 


$query3="select max(com_id)+1 as sys from comments";

$result = mysqli_query($con, $query3);

while($rows=mysqli_fetch_array($result))
{
$com_id=$rows['sys'];
}

?>

<?php 


$query1="select sId as sys from supervisor where s_nic='".$con->real_escape_string($_SESSION['nic'])."'";

$result = mysqli_query($con, $query1);

while($rows=mysqli_fetch_array($result))
{
$s_id=$rows['sys'];
}

?>
<?php 


$query2="select fname as sys from employee where nic='".$con->real_escape_string($_SESSION['nic'])."'";

$result = mysqli_query($con, $query2);

while($rows=mysqli_fetch_array($result))
{
$name=$rows['sys'];
}

?>

<?php 


$query5="select image as sys from employee where nic='".$con->real_escape_string($_SESSION['nic'])."'";

$result = mysqli_query($con, $query5);

while($rows=mysqli_fetch_array($result))
{
$image=$rows['sys'];
}

?>
<!DOCTYPE html>
<head>
<title>ewis</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />

<script type="application/x-javascript"> 
addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="../css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="../css/style.css" rel='stylesheet' type='text/css' />
<link href="../css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="../css/font.css" type="text/css"/>
<link href="../css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="../js/jquery2.0.3.min.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="index.html" class="logo">
        EWIS
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- settings start -->
        <!-- settings end -->
        
        <!-- inbox dropdown start
        <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-important">4</span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <li>
                    <p class="red">You have 4 Mails</p>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="images/3.png"></span>
                                <span class="subject">
                                <span class="from">Jonathan Smith</span>
                                <span class="time">Just now</span>
                                </span>
                                <span class="message">
                                    Hello, this is an example msg.
                                </span>
                    </a>
                </li>
                
                <li>
                    <a href="#">See all messages</a>
                </li>
            </ul>
        </li>
        <!-- inbox dropdown end -->
        <!-- notification dropdown start-->
           
        <!-- notification dropdown end -->
    </ul>
    <!--  notification end -->
</div>

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
          
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                 <img alt="" src="../profile/<?php echo $image; ?>">
                <span class="username"><?php echo $name;?></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="profile.php"><i class=" fa fa-suitcase"></i>Profile</a></li>
				<li><a href="password.php"><i class=" fa fa-suitcase"></i>Change Password</a></li>
                <li><a href="../logout.php"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>