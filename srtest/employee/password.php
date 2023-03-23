<?php  
	 	
	include("../connection.php");
	include("header.php"); 


$query6="select password from employee where nic='$namesession'";

$result = mysqli_query($con, $query6);

while($rows=mysqli_fetch_array($result))
{
$password=$rows['password'];
}
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>Home page – My Website</title>
<meta http-equiv="description" content="page description" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<style type="text/css">@import "../css/styles.css";</style>


<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"> </script>

  <!-- <script type="text/javascript" src="reg/jquery-1.9.1.js"></script>-->


<style type="text/css">

.success{
	color:#009900;
}
.error{
	color:#FF0000;
}
.talign_right{
	text-align:right;
}
.username_availability_result{
	display:block;
	width:auto;
	float:left;
	
}


</style>


</head>
<body>


<!--main content start-->
<section id="main-content">
	<section class=" wrapper">
		<div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Recover Password
                            <span class="tools pull-right">      
                             </span>
                        </header>
						
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="contact-form" method="post" action="password_q.php" novalidate="novalidate" data-toggle="validator">
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-3">NIC</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="nic" name="nic" type="text"  value="<?php echo
											($_SESSION['nic']) ?>" readonly="readonly">																				
											
										</div>
                                    </div>
									
									<div class="form-group ">
                                        <div class="col-lg-6">
                                            <input class="form-control " id="password" name="password" type="hidden"  value="<?php echo
											$password; ?>" >
											
										</div>
                                    </div>
	
	
                                     
                                    <div class="form-group ">
                                        <label class="control-label col-lg-3">Old Password</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="O_password" name="O_password" type="text" onkeyup="getencryptIt();" value="" >
											
										</div>
                                    </div>
								
                                     <div class="form-group ">
                                        <label  class="control-label col-lg-3">New Password</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="N_password" name="N_password" type="text"  >
											
										</div>
                                    </div>
                                    
                                      <div class="form-group ">
                                        <label class="control-label col-lg-3">Re enter Password</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="R_password" name="R_password" type="text"  >
											
										</div>
                                    </div>
                          
                          
                          	
		<script type="text/javascript">
        function ValidateRe() {
            var password1 = document.getElementById("N_password").value;
            var password2 = document.getElementById("R_password").value;
            if (password1 != password2) {
                alert("Password do not match.");
                return false;
            }
            return true;
        }
		</script>
		
		
		
		<script type="text/javascript">
        function Validate() {
            var password3 = document.getElementById("password").value;
            var password4 = document.getElementById("O_encrypted").value;
            if (password3 != password4) {
                alert("Your old password do not match.");
                return false;
            }
            return true;
        }
		</script>
		
                                    


                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit" onClick="return ValidateRe()" >Save</button>
                                            <button class="btn btn-default" type="reset">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </section>
 <!-- footer -->
		 
  <!-- / footer -->
</section>

<!--main content end-->
</section>
<?php include("footer.php");?>
</body>
</html>
