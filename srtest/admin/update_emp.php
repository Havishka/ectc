<?php  
	
	include("../connection.php"); 	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>E-wis</title>
<meta http-equiv="description" content="page description" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<style type="text/css">@import "styles.css";</style>
</head>

<body>
<?php include("header.php");?>
<?php include("sidebar.php");?>

<?php

$myid = $_GET['nic'];



$query = "select nic,fname,lname,gender,dob,email,phone,occupation,type,state,image,discription from employee where nic='$myid'";
$result =  mysqli_query($con, $query);

WHILE ($rows = mysqli_fetch_array($result))
{
       $nic = $rows['nic'];
	   $fname = $rows['fname'];
       $lname = $rows['lname'];
       $gender = $rows['gender'];
       $dob = $rows['dob']; 
		$email = $rows['email']; 
		$phone = $rows['phone']; 
		$occupation = $rows['occupation']; 
		$type = $rows['type']; 
		$state = $rows['state'];
		$image=$rows['image'];
		$discription=$rows['discription'];
		
		
		
}


?>

<section id="main-content">
	<section class=" wrapper">
		
		
           <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <?php echo "You are about to update $myid Account" ; ?>
                            <span class="tools pull-right">
                                
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal "  method="post" novalidate="novalidate" action="update_emp_q.php">
								
								<div class="form-group ">
									 <style>
								   img.resize{
								   width:150px;
								   height:150px;
								   }
								   </style>
                                     <span class="photo"><center><img alt="" class="resize" style=""  src="../profile/<?php echo $image; ?>"></center></span>
                               </div>
									
                                    <div class="form-group ">
                                        <label for="nic" class="control-label col-lg-3">NIC Number</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="nic" name="nic" type="text" value="<?php echo $myid; ?>" readonly>
                                        </div>
                                    </div>
									
									
									
									
									<div class="form-group ">
                                        <label for="firstname" class="control-label col-lg-3">First name </label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="fname" name="fname" type="text" value="<?php echo $fname; ?>">
                                        </div>
                                    </div>
									

									
                                    <div class="form-group ">
                                        <label for="lname" class="control-label col-lg-3">Lastname</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="lname" name="lname" type="text" value="<?php echo $lname; ?>">
                                        </div>
                                    </div>
									
									<div class="form-group ">
                                        <label for="gender" class="control-label col-lg-3">Gender</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="gender" name="gender" type="text" value="<?php echo $gender; ?>" readonly>
                                        </div>
                                    </div>
									
									<div class="">
                                        
                                        <div class="">
                                            <input class=" form-control" id="type1" name="type1" type="hidden" value="<?php echo $type; ?>" readonly>
                                        </div>
                                    </div>
									<?php
									if($type != 'Admin')
									{
									
									
									echo"<div class='form-group '>";
                                    echo"<label for='type' class='control-label col-lg-3'>Type</label>";
                                    echo"<div class='col-lg-6'>";
                                    echo"<select class='form-control m-bot15' name='type' id='type'>";
												
											echo"<option value='' ><?php echo $type; ?> </option>";
											echo"<option value='Admin' >Admin</option>";
											echo"<option value='Supervisor'>Supervisor </option>";
											echo"<option value='Employee'>Employee</option>";
											echo"</select>";
                                        echo"</div>";
                                    echo"</div>";
									}
									?>
									
                                    <div class="form-group ">
                                        <label for="dob" class="control-label col-lg-3">Date of birth </label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="dob" name="dob" type="text" value="<?php echo $dob; ?>">
                                        </div>
                                    </div>
									
									
									
                                    <div class="form-group ">
                                        <label for="email" class="control-label col-lg-3">E-mail</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="email" name="email" type="email" value="<?php echo $email; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="phone" class="control-label col-lg-3">Phone Number</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="phone" name="phone" type="text" value="<?php echo $phone; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="occupation" class="control-label col-lg-3">Occupation</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="occupation" name="occupation" type="text" value="<?php echo $occupation; ?>">
                                        </div>
                                    </div>
									
									<div class="form-group ">
                                        <label for="occupation" class="control-label col-lg-3">Discription</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="discription" name="discription" type="text" value="<?php echo $discription; ?>" readonly >
                                        </div>
                                    </div>
									
									<?php
									
									if($state =='F')
									{
										
										
									echo"<div class='alert alert-success' role='alert'>";
										echo"<strong>This account has been disable !</strong> ";
									echo"</div>";
									
									echo"<div class='form-group '>";
                                        echo"<label for='agree' class='control-label col-lg-3 col-sm-3'>Disable account</label>";
                                        echo"<div class='col-lg-6 col-sm-9'>";
                                            echo"<input type='checkbox' style='width: 20px' class='checkbox form-control' id='state' name='state' value='T' checked>";
                                        echo"</div>";
                                    echo"</div>";
											
									}
									
									else
									{
										echo"<div class='form-group '>";
                                        echo"<label for='agree' class='control-label col-lg-3 col-sm-3'>Disable account</label>";
                                        echo"<div class='col-lg-6 col-sm-9'>";
                                            echo"<input type='checkbox' style='width: 20px' class='checkbox form-control' id='state' name='state' value='F'>";
                                        echo"</div>";
                                    echo"</div>";
									}
									
									?>
									
                                    
										
										
                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit" name="submit" value="submit">Save</button>
                                            <button class="btn btn-default" type="button">Cancel</button>
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
