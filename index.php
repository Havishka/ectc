<?php


include('login.php'); // Include Login Script

if ((isset($_SESSION['username']) != '')) {
    header('Location: inside/index.php?tab=home');
}
if ((isset($_SESSION['reset'])) && (!isset($_SESSION['successstatus']))) {
    header('Location: reset.php?t=' . $_SESSION['reset'] . '');
} elseif ((isset($_SESSION['reset'])) && (isset($_SESSION['successstatus']))) {
    unset($_SESSION['reset']);
}







if ((isset($_POST['req']))) {
    if (!isset($_SESSION['catRandNum'])) {
        $str = 'caddcentresriCADDlankathis_KR_v_4555!XCV!!_2_';
        $sesstoken = str_shuffle($str);
        $_SESSION['reset'] = $sesstoken;




        echo '<script>self.location="reset.php?t=' . $_SESSION['reset'] . '";</script>';
    } else {
        echo $_SESSION['reset'];

        echo '<script>self.location="reset.php?t=' . $_SESSION['reset'] . '";</script>';
    }
}

?>



<?php
function GeraHash($qtd)
{
    //Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
    $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
    $QuantidadeCaracteres = strlen($Caracteres);
    $QuantidadeCaracteres--;

    $Hash = null;
    for ($x = 1; $x <= $qtd; $x++) {
        $Posicao = rand(0, $QuantidadeCaracteres);
        $Hash .= substr($Caracteres, $Posicao, 1);
    }

    return $Hash;
}


//echo GeraHash(30);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="images/logo.jpg">
	<title>ECTC | PDP</title>









	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!--
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans);
.btn { display: inline-block; *display: inline; *zoom: 1; padding: 4px 10px 4px; margin-bottom: 0; font-size: 13px; line-height: 18px; color: #333333; text-align: center;text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75); vertical-align: middle; background-color: #f5f5f5; background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6); background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6)); background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6); background-image: -o-linear-gradient(top, #ffffff, #e6e6e6); background-image: linear-gradient(top, #ffffff, #e6e6e6); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0); border-color: #e6e6e6 #e6e6e6 #e6e6e6; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border: 1px solid #e6e6e6; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); cursor: pointer; *margin-left: .3em; }
.btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] { background-color: #e6e6e6; }
.btn-large { padding: 9px 14px; font-size: 15px; line-height: normal; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
.btn:hover { color: #333333; text-decoration: none; background-color: #e6e6e6; background-position: 0 -15px; -webkit-transition: background-position 0.1s linear; -moz-transition: background-position 0.1s linear; -ms-transition: background-position 0.1s linear; -o-transition: background-position 0.1s linear; transition: background-position 0.1s linear; }
.btn-primary, .btn-primary:hover { text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); color: #ffffff; }
.btn-primary.active { color: rgba(255, 255, 255, 0.75); }
.btn-primary { background-color: #4a77d4; background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4); background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4)); background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4); background-image: -o-linear-gradient(top, #6eb6de, #4a77d4); background-image: linear-gradient(top, #6eb6de, #4a77d4); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);  border: 1px solid #3762bc; text-shadow: 1px 1px 1px rgba(0,0,0,0.4); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5); }
.btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] { filter: none; background-color: #4a77d4; }
.btn-block { width: 100%; display:block; }

* { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }

html { width: 100%; height:100%; overflow:hidden; }

body { 
	width: 100%;
	height:100%;
	font-family: 'Open Sans', sans-serif;
	background: #a50d93;
	


	
/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#3f4c6b+0,3f4c6b+100;Blue+Grey+Flat */
background: #3f4c6b; /* Old browsers */
background: -moz-linear-gradient(top, #3f4c6b 0%, #3f4c6b 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, #3f4c6b 0%,#3f4c6b 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, #3f4c6b 0%,#3f4c6b 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3f4c6b', endColorstr='#3f4c6b',GradientType=0 ); /* IE6-9 */
	
}
.login { 
	position: absolute;
	top: 50%;
	left: 50%;
	margin: -150px 0 0 -150px;
	width:300px;
	height:300px;
}
.login h1 { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }

input { 
	width: 100%; 
	margin-bottom: 10px; 
	background: rgba(0,0,0,0.3);
	border: none;
	outline: none;
	padding: 10px;
	font-size: 13px;
	color: #fff;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
	border: 1px solid rgba(0,0,0,0.3);
	border-radius: 4px;
	box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
	-webkit-transition: box-shadow .5s ease;
	-moz-transition: box-shadow .5s ease;
	-o-transition: box-shadow .5s ease;
	-ms-transition: box-shadow .5s ease;
	transition: box-shadow .5s ease;
}
input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }



hr.style1{
	border-top: 1px solid #8c8b8b;
}















  </style>






-->






	<link href="http://fonts.googleapis.com/css?family=Kotta+One|Cantarell:400,700" rel="stylesheet" type="text/css">
	<!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

	<!-- Not required: presentational-only.css only contains CSS for prettifying the demo -->
	<link rel="stylesheet" href="presentational-only/presentational-only.css">

	<!-- responsive-full-background-image.css stylesheet contains the code you want -->
	<link rel="stylesheet" href="responsive-full-background-image.css">

	<!-- Not required: jquery.min.js and presentational-only.js is only used to demonstrate scrolling behavior of the viewport  -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="presentational-only/presentational-only.js"></script>


	<style>
		@import url(https://fonts.googleapis.com/css?family=Open+Sans);

		.btn {
			display: inline-block;
			*display: inline;
			*zoom: 1;
			padding: 4px 10px 4px;
			margin-bottom: 0;
			font-size: 13px;
			line-height: 18px;
			color: #333333;
			text-align: center;
			text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
			vertical-align: middle;
			background-color: #f5f5f5;
			background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6);
			background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6);
			background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6));
			background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
			background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
			background-image: linear-gradient(top, #ffffff, #e6e6e6);
			background-repeat: repeat-x;
			filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0);
			border-color: #e6e6e6 #e6e6e6 #e6e6e6;
			border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
			border: 1px solid #e6e6e6;
			-webkit-border-radius: 4px;
			-moz-border-radius: 4px;
			border-radius: 4px;
			-webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
			-moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
			box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
			cursor: pointer;
			*margin-left: .3em;
		}

		.btn:hover,
		.btn:active,
		.btn.active,
		.btn.disabled,
		.btn[disabled] {
			background-color: #e6e6e6;
		}

		.btn-large {
			padding: 9px 14px;
			font-size: 15px;
			line-height: normal;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
		}

		.btn:hover {
			color: #333333;
			text-decoration: none;
			background-color: #e6e6e6;
			background-position: 0 -15px;
			-webkit-transition: background-position 0.1s linear;
			-moz-transition: background-position 0.1s linear;
			-ms-transition: background-position 0.1s linear;
			-o-transition: background-position 0.1s linear;
			transition: background-position 0.1s linear;
		}

		.btn-primary,
		.btn-primary:hover {
			text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
			color: #ffffff;
		}

		.btn-primary.active {
			color: rgba(255, 255, 255, 0.75);
		}

		.btn-primary {
			background-color: #4a77d4;
			background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4);
			background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4);
			background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4));
			background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4);
			background-image: -o-linear-gradient(top, #6eb6de, #4a77d4);
			background-image: linear-gradient(top, #6eb6de, #4a77d4);
			background-repeat: repeat-x;
			filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);
			border: 1px solid #3762bc;
			text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.4);
			box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5);
		}

		.btn-primary:hover,
		.btn-primary:active,
		.btn-primary.active,
		.btn-primary.disabled,
		.btn-primary[disabled] {
			filter: none;
			background-color: #4a77d4;
		}

		.btn-block {
			width: 100%;
			display: block;
		}

		* {
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			-ms-box-sizing: border-box;
			-o-box-sizing: border-box;
			box-sizing: border-box;
		}

		html {
			width: 100%;
			height: 100%;
			overflow: hidden;
		}

		body {
			width: 100%;
			height: 100%;
			font-family: 'Open Sans', sans-serif;

		}

		a:hover {
			color: #B60A21;
			text-decoration: none;
		}

		.login {
			position: absolute;
			top: 40%;
			left: 50%;
			margin: -150px 0 0 -150px;
			width: 310px;
			height: auto;
			background: #2b5876;
			/* fallback for old browsers */
			background: -webkit-linear-gradient(to right, #4e4376, #2b5876);
			/* Chrome 10-25, Safari 5.1-6 */
			background: linear-gradient(to right, #4e4376, #2b5876);
			/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

			border-radius: 15px;
		}

		.login h1 {
			color: #fff;
			text-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
			letter-spacing: 3px;
			text-align: center;
		}

		input {
			width: 100%;
			margin-bottom: 10px;
			background: rgba(0, 0, 0, 0.3);
			border: none;
			outline: none;
			padding: 10px;
			font-size: 13px;
			color: #fff;
			text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.3);
			border: 1px solid rgba(0, 0, 0, 0.3);
			border-radius: 4px;
			box-shadow: inset 0 -5px 45px rgba(100, 100, 100, 0.2), 0 1px 1px rgba(255, 255, 255, 0.2);
			-webkit-transition: box-shadow .5s ease;
			-moz-transition: box-shadow .5s ease;
			-o-transition: box-shadow .5s ease;
			-ms-transition: box-shadow .5s ease;
			transition: box-shadow .5s ease;
		}

		input:focus {
			box-shadow: inset 0 -5px 45px rgba(100, 100, 100, 0.4), 0 1px 1px rgba(255, 255, 255, 0.2);
		}
	</style>
















</head>



<body>
	<!-- <nav class="navbar" id="top">
    <div class="inner">
      <a href="http://caddcentre.lk//" target="_blank">WWW.CADDCENTRE.LK</a>
    </div>
  </nav> -->


	<header class="container">

		<section class="content">

			<br>
			<div class="login">

				<br>
				<center><img src="images/logo.jpg" width="306"></center>




				<h3 style="color:#900;"><?php if (isset($_SESSION['successstatus'])) {
				    echo $_SESSION['successstatus'];
				} ?></h3>


				<br>


				<form method="post" action="" style="padding:10px;">
					<input type="text" name="username" placeholder="Username" required="required" />
					<br>

					<input type="password" name="password" placeholder="Password" required="required" />

					<button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Login</button>



					<h3>
						<div align="center" style="color:white; font-size:16px; ">
							<?php echo $error; ?>
						</div>
					</h3>

					<button class="btn-large" style="background-color:#B60A21;width:100%; "
						onclick="location.href = 'inside/Lecture/login.php';"><i class="fa fa-sign-in"
							aria-hidden="true"></i>>> Lecturer Login </button>

				</form>







				<br><br>






				<!--     
    <form action="" method="post">
    
    <input type="submit" value="Forgot password?" name="req">
    
    
    </form> -->




			</div>



			<!-- Some content to demonstrate viewport scrolling behavior -->


	</header>

</body>

</html>