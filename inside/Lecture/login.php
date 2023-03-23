


<html>
<head>
    <title>ECTC | PDP</title>
    <link rel="icon" type="image/png" href="../../images/logo.jpg">
<style>

body {
    font-family: "Lato", sans-serif;
}



.main-head{
    height: 150px;
    background: #FFF;
   
}

.sidenav {
    height: 100%;
    background-color: #003366;
    overflow-x: hidden;
    padding-top: 20px;
}


.main {
    padding: 0px 10px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
}

@media screen and (max-width: 450px) {
    .login-form{
        margin-top: 10%;
    }

    .register-form{
        margin-top: 10%;
    }
}

@media screen and (min-width: 768px){
    .main{
        margin-left: 40%; 
    }

    .sidenav{
        width: 40%;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
    }

    .login-form{
        margin-top: 80%;
    }

    .register-form{
        margin-top: 20%;
    }
}


.login-main-text{
    margin-top: 20%;
    padding: 60px;
    color: #fff;
}

.login-main-text h2{
    font-weight: 300;
}

.btn-black{
    background-color: #000 !important;
    color: #fff;
}

</style>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>

<div class="sidenav">
         <div class="login-main-text">
             <img src="../../images/logo.jpg" height="20%" width="35%">
             <br><br><br>
            <h2>ECTC | PDP<br> Lecturer Login Page</h2>
           
         </div>
      </div>
      <div class="main" >
         <div class="col-md-6 col-sm-12">
            <div class="login-form">

               <form method="POST" action="includes/log.php" style="width: 700;padding-left:50%">
                  <div class="form-group">
                     <label>Username</label>
                     <input type="text" class="form-control" name="username" placeholder="User Name" required>
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" name="password" placeholder="Password" required>
                  </div>
                  <button type="submit" name="login" class="btn btn-primary" style="background-color:#003366; color:#fff">Login</button>
                  <!-- <button type="submit" class="btn btn-danger" name="submit" onclick="location.href = '';" > Cancel </button>  -->
                  <input type="button" class="btn btn-primary" onclick="location.href='\index.php';" value="Back" style="background-color:#003366; color:#fff"/>
                  <!--<button type="submit" class="btn btn-secondary">Register</button>-->
               </form>
            </div>
         </div>
      </div>



</body>

</html>