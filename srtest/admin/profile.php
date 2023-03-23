
<?php

include("header.php");
include("sidebar.php");
include("footer.php");
?>


<!DOCTYPE html><head>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="../css/bootstrap-imageupload.css" rel="stylesheet">
        
        <style>
          

            .imageupload {
                margin: 20px 0;
            }
        </style>
</head>

<!--header end-->

<!--sidebar start-->

<!--sidebar end-->
<!--main content start-->

          <?php
			
			//include database connection

            //select the specific database record to update


$query= "select * from employee where nic='".$con->real_escape_string($_SESSION['nic'])."'";

//execute the query

$result = $con->query( $query );

//get the result

$row = $result->fetch_assoc();

//assign the result to certain variable so our html form will be filled up with values
//$work_id= $row['work_id'];
$fname=$row['fname'];
$lname=$row['lname'];
$gender=$row['gender'];
$dob= $row['dob'];
$nic=$row['nic'];

$email = $row['email'];

$phone = $row['phone'];

$occupation = $row['occupation'];

$discription = $row['discription'];

$type= $row['type'];





?>

        
        <section id="main-content">
	<section class=" wrapper">
   <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                          My Profile
                        </header>
                        <div class="panel-body">
                            <div class="position-center">  
                            
                   <form role="form-horizontal" method="post" action="profile_q.php" name="form1" id="form1" enctype="multipart/form-data" >
                    
                   
                                  
                                   <style>
								   img.resize{
								   width:150px;
								   height:200px;
								   }
								   </style>
                                     <span class="photo"><center><img alt="" class="resize" style=""  src="../profile/<?php echo $image; ?>"></center></span>
                              
                                    
                                  <div class="form-group ">
                                    <label for="to" class="">First Name</label>
                                    <input type="text"  id="fname" class="form-control" name="fname" value='<?php echo $fname; ?> ' >
                                    
                                </div>
                                
                                 <div class="form-group ">
                                    <label for="to" class="">Last Name</label>
                                    <input type="text"  id="lname" class="form-control"   name="lname" value='<?php echo $lname; ?> ' >
                                    
                                </div>
                                
                                    <div class="form-group ">
                                    <label for="to" class="">NIC</label>
                                    <input type="text"  id="nic" class="form-control"   name="nic" value='<?php echo $nic; ?> ' >
                                    
                                </div>
                                
                                 <div class="form-group ">
                                    <label for="to" class="">DOB</label>
                                    <input type="text"  id="dob" class="form-control"   name="dob" value='<?php echo $dob; ?> ' >
                                    
                                </div>
                                
                                 <div class="form-group ">
                                    <label for="to" class="">Email</label>
                                    <input type="text"  id="email" class="form-control"   name="email" value='<?php echo $email; ?> ' >
                                    
                                </div>
                                
                                  <div class="form-group ">
                                    <label for="to" class="">Phone</label>
                                    <input type="text"  id="email" class="form-control"   name="phone" value='<?php echo $phone; ?> ' >
                                    
                                </div>
                                
                                     <div class="form-group ">
                                    <label for="to" class="">Occupation</label>
                                    <input type="text"  id="email" class="form-control"   name="occupation" value='<?php echo $occupation; ?> ' >
                                    
                                </div>
                                
                                     <div class="form-group ">
                                    <label for="to" class="">Description</label>
                                    <input type="text"  id="email" class="form-control"   name="discription" value='<?php echo $discription; ?> ' >
                                    
                                </div>
                                
                                
                                     <div class="imageupload panel panel-default">
                				<div class="panel-heading clearfix">
                   						 <h3 class="panel-title pull-left">Change Profile Picture</h3>
                				</div>
                                
                         		<div class="file-tab panel-body">
                            		<label class="btn btn-default btn-file">
                        				<span>Browse</span>
                                            <!-- The file is stored here. -->
                        					<input type="file" class="default" id="file" name="file">
                                    </label>
                                </div>
                                
                         </div>
                                
                    <div class="form-group">
								<input name="submit" type="submit" value="Upload" />
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

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="crossorigin="anonymous"></script>
       
        <script src="../js/bootstrap-imageupload.js"></script>

        <script>
            var $imageupload = $('.imageupload');
            $imageupload.imageupload();

            $('#imageupload-disable').on('click', function() {
                $imageupload.imageupload('disable');
                $(this).blur();
            })

            $('#imageupload-enable').on('click', function() {
                $imageupload.imageupload('enable');
                $(this).blur();
            })

            $('#imageupload-reset').on('click', function() {
                $imageupload.imageupload('reset');
                $(this).blur();
            });
        </script>
