<?php  
	 	
	include("../connection.php"); 	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?php include("header.php");?>
<head>
<title>Home page – My Website</title>
<meta http-equiv="description" content="page description" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<style type="text/css">@import "styles.css";</style>


<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"> </script>

  <!-- <script type="text/javascript" src="reg/jquery-1.9.1.js"></script>-->
<script type="text/javascript">
$(document).ready(function(){
	$('#nic').keyup(function(){
		var nic = $('#nic').val();
		if(nic.length > 2) {
			$('#username_availability_result').html('Loading..');
			var post_string = 'nic='+nic;
			$.ajax({
				type : 'POST',
				data : post_string,
				url  : 'username-check.php',
				success: function(responseText){
					if(responseText == 0){
						$('#username_availability_result').html('<span class="success">Not registered yet</span>');
					}
					else if(responseText > 0){
						$('#username_availability_result').html('<span class="error">This Nic already registered</span>');
						alert("Person already exist in our database.");
						
						
						 document.getElementById('nic').value = "";
					}
					else{
						alert('Problem with mysql query');
						
					}
				}
			});
		}else{
			$('#username_availability_result').html('');
		}
	});
});
</script>

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

<?php include("sidebar.php");?>
<!--main content start-->
<section id="main-content">
	<section class=" wrapper">
		<div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Employee
                            <span class="tools pull-right">      
                             </span>
                        </header>
						
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="contact-form" method="post" action="create_account_q" novalidate="novalidate" data-toggle="validator">
                                    <div class="form-group ">
                                        <label for="username" class="control-label col-lg-3">NIC</label>
                                        <div class="col-lg-6">
                                            <input onkeyup="getpassword();" class="form-control " id="nic" name="nic" type="text" pattern="[0-9]{9}[vVxX]" maxlength="10" data-error="Invalide NIC number" onKeyUp="validate('nic', this.value)" required>																				
											<div class="help-block with-errors"></div>
											<div class="username_availability_result" id="username_availability_result"></div>
										</div>
                                    </div>
									
									<div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">Firstname</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="fname" name="fname" type="text" data-minlength="2" data-error="must enter minimum of 2 characters" required>
											<div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="lastname" class="control-label col-lg-3">Lastname</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="lname" name="lname" type="text" data-minlength="2" data-error="must enter minimum of 2 characters" required>
											<div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    
									
									<div class="form-group ">
                                        <label for="gender" class="control-label col-lg-3">Gender</label>
                                        <div class="col-lg-6">
                                           <select class="form-control m-bot15" name="gender" required>
												<option value="" readonly >Select</option>
												<option value="Male">Male</option>
												<option value="Female">female</option>
												</select>
                                        </div>
                                    </div>
									
									<div class="form-group ">
                                        <label for="type" class="control-label col-lg-3">Type</label>
                                        <div class="col-lg-6">
                                           <select class="form-control m-bot15" name="type" required>
												<option value="" readonly >Select type</option>
												<option value="Admin" >Admin</option>
												<option value="Supervisor">Supervisor </option>
												<option value="Employee">Employee</option>
                            </select>
                                        </div>
                                    </div>
									
									
                                    <div class="form-group ">
                                        <label for="password" class="control-label col-lg-3">Password</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="password" name="password" type="password"  readonly>
											
										</div>
                                    </div>
									
									<script>
function getpassword()
{
	var a = document.getElementById('nic').value;
    var yourpw = a; 

    //display the result
    document.getElementById('password').value = yourpw;
 
}
</script>
                                    
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-3">Email</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="email" name="email" type="email" data-error="This email address is invalid" required>
											<div class="help-block with-errors"></div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit" >Save</button>
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
