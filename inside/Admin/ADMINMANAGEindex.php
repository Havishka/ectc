<?php
include("../connection.php");

$x=0;

if(isset($_GET["edt"])){+
	
	
	
	
	
	
	
	$sqlbb = "SELECT name,admin_id,email,branch_id,level,username  FROM admin WHERE admin_id='".$_GET["edt"]."'";
$resultbb = $con->query($sqlbb);

if ($resultbb->num_rows > 0) {

    while($row = $resultbb->fetch_assoc()) {
		
		
		$rdt='<div class="container" id="c">
																		
																		 <form action="" method="post">
																		
																	
																	  <div class="panel-group">
																		
																		<div class="panel panel-primary">
																		  <div class="panel-heading"><h2><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Manage user:-'.$row["name"].':('.$row["username"].')</h2></div>
																		  <div class="panel-body">
																		  
																		  <div class="form-group">
																		  <label for="cname">Full name:</label>
					 													  <input type="text" class="form-control" id="cname" placeholder="Enter user full name" name="Ename" value="'.$row["name"].'">
																		</div>
																		<div class="form-group">
																		  <label for="dur">Email :</label>
																		  
																		  <input type="email"  class="form-control" id="dur" placeholder="Enter user email" name="EM" value="'.$row["email"].'">
																		</div>
																		<div class="form-group">
																		  <label for="dur">Level :</label>
																		  
																		  <input type="text" class="form-control" placeholder="Enter level number" name="levl" value="'.$row["level"].'">
																		  <p style="color:red;">(  3 - Basic | 2 - Branch manager | 1 : Top level )</p>
																		  
					
														  
																			</div>
																		<div class="form-group">
																		  <label for="dur">Branch id :</label>
																		  
																		  <input type="text" class="form-control" id="search-box" placeholder="Enter branch name or branch id" name="BRNC" value="'.$row["branch_id"].'">
																		</div>
																		
																		  <input type="hidden"  name="click" value="'.$row["admin_id"].'">
																		
																		
																		
																		  
																		  <center><input type="submit" value="Update changes" name="updateuser" class="btn btn-danger btn-lg"/><a href="index.php?tab=manage_admin" target="_self" class="btn btn-warning btn-lg">Cancel</a></center>
																		  
																		
																		  
																		  </div>
																		</div>
																				
																				 </form> <script>document.getElementById("newinser").disabled = true;</script></div>
																				 
																				 
																				 

																				  ';
																				  
																				  
																				  
																				  
        
		
		
		
		
    }
} else {
    echo "0 results";
}


}else{
	
	
$rdt="";	
	
	
}











if(isset($_GET["msg"])){
$s=$_GET['msg'];

		if($s=="success"){
			
		$msg='<div class="alert alert-success">
		  <strong>Success!</strong> Operation success.
		</div>';
		}else if($s=="unsuccess"){
			
						$msg='<div class="alert alert-warning">
  <strong>Warning!</strong> Indicates a warning that might need attention.
</div>';
		}
		
}else{
	
	
}

//$msg='';
if(isset($_POST['crteusr'])){



    $nn = $_POST['n'];
	$ee = $_POST['e'];
	$uu = $_POST['u'];
	$bb = $_POST['b'];
 	$ll = $_POST['level'];
	$pp = md5("cadd");

	
	
		// Cover Image file upload
	$imagebox=$_FILES['file1'];
    $ifile = rand(1000,100000)."-".$_FILES['file1']['name'];
    $ifile_loc = $_FILES['file1']['tmp_name'];
	$ifile_size = $_FILES['file1']['size'];
	$ifile_type = $_FILES['file1']['type'];
	$ifolder="Admin/M_ADMIN/users_profile_images/";
	
	if (($ifile_type == 'image/jpeg') || ($ifile_type == 'image/jpg')|| ($ifile_type == 'image/gif') || ($ifile_type == 'image/png') || ($ifile_type == 'image/x-png'))
	 				{
	
	
	// new file size in KB
								$inew_size = $ifile_size/1024;  
								// make file name in lower case
								$inew_file_name = strtolower($ifile);
								// make file name in lower case
								$ifinal_file=str_replace(' ','-',$inew_file_name);
	
	
	
							if(move_uploaded_file($ifile_loc,$ifolder.$ifinal_file))
																	{
												$queryin="insert into admin(admin_id,name,email,username,branch_id,level,password,profile) values (null,'$nn','$ee','$uu', '$bb','$ll','$pp','$ifinal_file')";
															
												$resultd = mysqli_query($con, $queryin);
 


										
															if (!($resultd ))
															  {
																echo("Database Error : " . mysqli_error($con));
																
																$msg='<div class="alert alert-danger">
															  <strong>ERROR!</strong> Database error!.
															</div>';
															  }
															else
															  {
																
																$msg='<div class="alert alert-success" role="alert">
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															  <strong>Success!</strong> You have been signed in successfully!
															</div>';
																	
															  }
					  
												}
																					
																							
																								
																								
																								
																								
																						
																					}else if (empty($_FILES['file1']['name'])) {






		$queryin="insert into admin(admin_id,name,email,username,branch_id,level,password,profile) values (null,'$nn','$ee','$uu', '$bb','$ll','$pp','')";
															
												$resultd = mysqli_query($con, $queryin);
 


										
															if (!($resultd ))
															  {
																echo("Database Error : " . mysqli_error($con));
																
																$msg='<div class="alert alert-danger">
															  <strong>ERROR!</strong> Database error!.
															</div>';
															  }
															else
															  {
																
																$msg='<div class="alert alert-success" role="alert">
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															  <strong>Success!</strong> You have been signed in successfully!
															</div>';
																	
															  }
					  
												
																						
																						
																						
																						
																					}
	
	
	
}



  // update changes
  
  
  
  
  
  
  if(isset($_POST['updateuser'])){
	  
	  
	  
	  
	  
    $nn = $_POST['Ename'];
	$ee = $_POST['EM'];
	$uu = $_POST['BRNC'];

 	$ll = $_POST['levl'];
	$idx = $_POST['click'];
	
	




$sqlg = "SELECT branch_id FROM branch WHERE branch_id='".$uu."'";
$resultg = $con->query($sqlg);

if ($resultg->num_rows > 0) {




						if($ll==1||$ll==2||$ll==3){
					
										
										$queryup="UPDATE admin SET name='$nn' ,email='$ee' ,branch_id='$uu' ,level='$ll' WHERE admin_id='$idx'";
										
										
										
										
										$resultup = mysqli_query($con, $queryup);
										 
										
										
										
										if (!($resultup ))
										  {
											echo("Database Error : " . mysqli_error($con));
											
											$msg='<div class="alert alert-danger" role="alert">
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										  <strong>Unsuccess!</strong>Database Error 
										</div>';
										  }
										else
										  {
											  
											  
											
											$msg='<div class="alert alert-success" role="alert">
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										  <strong>Changes update successful!</strong> 
										</div>';
										
										
										
										 echo "<script> window.location.href = 'index.php?tab=manage_admin'; </script>";
										
										
												
										  }
										  
						  
						  
						  
						  
						  
						}else{
							
							$msg='<div class="alert alert-danger" role="alert">
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										  <strong>Level Invalid!</strong>
										</div>';
							
							
						}
	  
	  
	  
  			}else{
				
				
				$msg='<div class="alert alert-danger" role="alert">
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										  <strong>Invalid branch id!</strong>
										</div>';
				
			}
	  
	  
  }
  
  
  

















					
					
		/*			
 
 if(isset($_POST['submitauth'])){
						  
						  
	 if(empty($_POST["username"]) || empty($_POST["password"]))
		{
			$error = "Both fields are required.";
		}else
		{
			
			
			if(($_POST["username"])==($_SESSION['username'])){
			
			// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];

			// To protect from MySQL injection
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($db, $username);
			$password = mysqli_real_escape_string($db, $password);
			$password = md5($password);
			
			//Check username and password from database
			$sql="SELECT admin_id FROM admin WHERE username='".$_SESSION['username']."' and password='$password'";
			$result=mysqli_query($db,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			//If username and password exist in our database then create a session.
			//Otherwise echo error.
			
			if(mysqli_num_rows($result) == 1)
			{
				
				
				$_SESSION['editadminuser']=$_POST['click'];
				
				
				$_SESSION['tempUser']   = rand();
				
				
				
echo "<script> window.location.href = 'userprofile.php'; </script>";		
				
			}else
			{
				
 echo "<script> window.location.href = '../logout.php?msg=301'; </script>";
//header('Location: logout.php');
   die();
				
			}
			
	}else{
				
				$msg = '<div class="alert alert-warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Invalid username!</strong> Try again with correct username.
</div>';
				
				
			}
			
		}
						  
						  
 }
		*/				  
 ?>  
<!DOCTYPE HTML>
<html>
<title>Ajax table - edit delete add rows with Ajax - InfoTuts</title>
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

<style>
.w3-button {width:150px;}
</style>




<script>

window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
</script>















<style>

.frmSearch {position:relative;border: 1px solid #a8d4b1;background-color: #F3F3F3;margin: 2px 0px;padding:20px;border-radius:4px;}
#country-list{list-style:none;margin-top:-90px;padding:0;width:220px;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px; border: #a8d4b1 1px solid;border-radius:4px;}
#other-box{padding: 10px; border: #a8d4b1 1px solid;border-radius:4px;}



hr.style16 { 
border: 0; 
  height: 1px; 
  background-image: -webkit-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -moz-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -ms-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -o-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
}
.success{
	
	
	color:green;
	font-size:15px;
	
}
.error{
	
	
	color:red;
	font-size:15px;
	
}
</style>
<link rel="stylesheet" type="text/css" href="Admin/style.css" />
</head>
<body>





<div id="mhead">
Manage administration</div>
<div class="x_content">
                    <br />
  
                    
                    
                    
                </div>


<div class="frmSearch">


<br>
<?php echo $msg;?>

<br>
<script>


function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#pimg')
                        .attr('src', e.target.result)
                        .width(200)
                        ;
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
		
		</script>
        
        <script type="text/javascript">
$(document).ready(function(){
	$('#u1').keyup(function(){
		var u1 = $('#u1').val();
		if(u1.length > 2) {
			$('#username_availability_result').html('Loading..');
			var post_string = 'nic1='+u1;
			$.ajax({
				type : 'POST',
				data : post_string,
				url  : 'Admin/M_ADMIN/username-check.php',
				success: function(responseText){
					if(responseText == 0){
						$('#username_availability_result').html('<span class="success" >Username availabele to register</span>');
					}
					else if(responseText > 0){
						$('#username_availability_result').html('<span class="error">This USERNAME already registered</span>');
						//reset nictext
						//alert("Username alredy  Registered");
						document.getElementById('u1').value = "";
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
<form action="index.php?tab=manage_admin" method="post" enctype="multipart/form-data">

<br>
<table style="width:850px auto;" border="0" align="center" cellpadding="10" cellspacing="10">
  <tr>
    <td width="218" bgcolor="#FFFFFF"><div style="border-style: dashed;width:auto; border-color: #F00; padding:10px;"><br>
    <label>jpeg | jpg | png| gif</label><input type='file' class="btn btn-warning" name="file1" id="file1" onChange="readURL(this);">
    <br>
    <p align="center"><img src="Admin/M_ADMIN/user.png" alt="your image" width="100%"  class="img-thumbnail" id="pimg"  /></p></div></td>
    <td width="231" align="center" valign="top" bgcolor="#FFFFFF" style="padding:10px;"><div class="form-group">
                            <label>Full name </label>
							
                          <input type="text" name="n" class="form-control"/ value=""  required>
                            
                        </div><br>
                    
                        <div class="form-group">
                            <label>Email  </label>
                            <input type="email" name="e"  class="form-control" required>
                        </div>
                        <br>
                         <div class="form-group">
                            <label>Username </label>
                            <input type="text" name="u" id="u1" class="form-control" required>
                            <div class="username_availability_result" id="username_availability_result"></div>
                        </div>
      </td>
    <td width="280" align="center" valign="top"  bgcolor="#FFFFFF" style="padding:10px;"> <div class="form-group">
                            <label>Branch</label>
                            <br>
                            <?php   
				
					
					//query
					$sql=mysqli_query($con,"SELECT branch_id,name FROM branch");
					if(mysqli_num_rows($sql)){
					$select= '<select id="branch" class="form-control" name="b"><option selected disabled>Please select..</option>';
					
					while($rs=mysqli_fetch_array($sql)){
						  $select.='<option value="'.$rs['branch_id'].'">'.$rs['name'].'</option>';
					  }
					}
					$select.='</select>';
					echo $select;
?>
                            
                            
 							                   
                      </div><br><div class="form-group">
                          <p>
                            <label>Level</label>
                            <select name="level" class="form-control">
                              <option value="3">Basic </option>
                              <option value="2">Branch Manager</option>
                              <option value="1">Top level</option>
                              
                            </select>
                          </p></div>
                          <br>
                          <div class="form-group">
                          <p>
                            <label>Password</label>
                            <p align="center" style="font-size:16px; font-family:Georgia, 'Times New Roman', Times, serif; font-style:italic;  ">&#8226 <u>Default password is :<span style="color:#F00;">cadd</span> </u></p>
                          </p></div>
                      
      </td>
  </tr>
</table>
<div class="form-content">
                <div class="row">
                 <div class="col-md-3">
                       
  </div>
					
					
                   
					
                    
	<div class="col-md-3">
                       
    </div>
                    
    <div class="col-md-3">
                     
    </div>
      <br>
            <br> <p align="center"> <button type="submit" class="btn btn-primary  btn-lg" name="crteusr"  ><span class="glyphicon glyphicon-user"></span> Insert new user</button></p>

    <hr class="style16">
    
    
  <div class="col-md-3"><br>

</form>
<div></div>
</div>





<style>

#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>










<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>


<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "Admin/M_ADMIN/readCountry.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>

<br>
<br>
<span class="frmSearch1"><?php echo $rdt;?></span><br><br><br><br>
<div id="suggesstion-box" align="center"></div>
<br>
<h2> <u>Level 2 and 3</u> </h2>
<br>
<table  border="1" class="table table-striped" width="100%">
  <tr>
   <th  width="05%">profile</th>
    <th  width="20%">Full name</th>
     <th  width="20%">Username</th>
    <th  width="20%">Email</th>
      <th  width="160">branch_id</th>
    <th  width="100">Level</th>
  </tr>

<?php

$sql = "SELECT * FROM admin WHERE level NOT IN ('1') ORDER BY admin_id DESC";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	
	$r=0;
				$c=0;
    while($row = $result->fetch_assoc()) {
				
				$trgtid = $row["admin_id"];
				
				if(empty($row['profile'])){
					
					$img = '<img src="Admin/M_ADMIN/user.png" alt="Mountain View" style="width:100%;">';
					
				}else{
					
					
					$img = '<img src="Admin/M_ADMIN/users_profile_images/'. $row["profile"].'" style="width:100%;">';
					
				}
				
				
				
				$c++;
				
				echo '<form action="" method="post"><tr><td>'.$img.'</td><td style="color:black; font-size:19px;"  >
											  
											' . $row["name"].'</td>    <td style="color:black; font-size:19px;">'. $row["username"].'</td><td style="color:black; font-size:19px;">
											'.$row["email"].'</td><td style="color:black; font-size:19px;">
											'.$row["branch_id"].'
											</td><td style="color:black; font-size:19px;">
											'.$row["level"].'</td><td>
										
									<a href="index.php?tab=manage_admin&&edt='.$row["admin_id"].'" class="btn btn-warning">Manage user
	</a>			
										</td></form><td>
											
											
									 
											
									
    <a href="javascript:delete_records('.$row["admin_id"].')"><button type="button" class="btn btn-danger" style="width:100%;">Delete User</button></a><br/>
</td><br></tr>';
		
    		}
	
echo ' ';	
} else {
    echo "0 results";
}


?>


</table>

<br>
<h2><u> Top level</u> </h2>
<br>
<table  border="1" class="table table-striped" width="100%">
  <tr>
   <th  width="05%">profile</th>
    <th  width="20%">Full name</th>
     <th  width="20%">Username</th>
    <th  width="20%">Email</th>
      <th  width="160">branch_id</th>
    <th  width="100">Level</th>
  </tr>

<?php

$sqll = "SELECT * FROM admin WHERE level IN ('1') ORDER BY admin_id DESC";
$resultl = $con->query($sqll);

if ($resultl->num_rows > 0) {
    // output data of each row
	
	$r=0;
				$c=0;
    while($row = $resultl->fetch_assoc()) {
				
				$trgtid = $row["admin_id"];
				
				if(empty($row['profile'])){
					
					$img = '<img src="Admin/M_ADMIN/user.png" alt="Mountain View" style="width:100%;">';
					
				}else{
					
					
					$img = '<img src="Admin/M_ADMIN/users_profile_images/'. $row["profile"].'" style="width:100%;">';
					
				}
				
				
				
				$c++;
				
				echo '<form action="" method="post"><tr><td>'.$img.'</td><td style="color:black; font-size:19px;"  >
											  
											' . $row["name"].'</td>    <td style="color:black; font-size:19px;">'. $row["username"].'</td><td style="color:black; font-size:19px;">
											'.$row["email"].'</td><td style="color:black; font-size:19px;">
											'.$row["branch_id"].'
											</td><td style="color:black; font-size:19px;">
											'.$row["level"].'</td><td>
										
									<a href="index.php?tab=manage_admin&&edt='.$row["admin_id"].'" class="btn btn-warning">Manage user
	</a>			
										</td></form><td>
											
											
									 
											
									
    <a href="javascript:delete_records('.$row["admin_id"].')"><button type="button" class="btn btn-danger" style="width:100%;">Delete User</button></a><br/>
</td><br></tr>';
		
    		}
	
echo ' ';	
} else {
    echo "0 results";
}


?>


</table>









<script>
function edit(p1) {
	
    alert("dsds"+p1);
	
	
	
	
	
	
}

function dedit(p1) {
	
    alert("dsds"+p1);
	
	
	$('#modele').modal('show');
	
	
	
}

</script>



<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
function delete_records(intValue) 
{  //alert(intValue);
   //var conf= confirm("Do you really want delete?");
   if (confirm("Do you really want delete?")) {
	   
	  
	    window.location.href='Admin/M_ADMIN/deleteUSER.php?mode='+intValue;
	  
    }else{
    return;
    }
}
</script>


<?php

function testfun($d,$con)
{
   echo "Your test function on button click is working";
   
   
   
   
   
   
   
		  $sql = "DELETE FROM admin WHERE admin_id='".$d."'";
		
		if ($con->query($sql) === TRUE) {
			$msg = '<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Unsuccess!</strong>Database Error 
</div>';
			
		} else {
			echo "Error deleting record: " . $con->error;
		} 
		
		
		
		
   
}



if(array_key_exists('tst',$_POST)){
	
	
	echo "<script>
	var answer = confirm ('Are you sure you want to delete from the database?');
if (answer==0)
{





}

</script>";
	
 //testfun($_POST['aid'],$con);
   
   

   
}
?>
 <!-- Delete Modal -->
  <div class="modal fade" id="delete" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 



	<!-- Modal -->
 <div class="modal fade" id="modele" role="dialog">
<div class="modal-dialog">
										
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"></button>
<h4 class="modal-title">System need authentication!</h4>
</div>
<div class="modal-body">
                       
                  <form class="login-form" method="post" action="index.php?tab=manage_admin">
    <div class="form-group ">
                            <div class="col-xs-12" align="center">
                            <label>Username</label>
                              <input name="username" type="text" class="input" size="25" required  placeholder="Username" autocomplete="off"/>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
    <div class="form-group">
                            <div class="col-xs-12" align="center">
                             <label>Password</label>
                              <input  name="password" type="password" class="input" size="25" placeholder="Password" autocomplete="off"/>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="col-xs-12" align="center">
    <input type="submit" name="submitauth" value="Continue" style="font-size:13pt;color:white;background-color:green;border:2px solid  #F30;padding:9px" />
    
                    </div>                 
                                                        
                                                        
                                                        
</form>
												
		<br>
									
									
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										  </div>
										  
										</div>
									  </div>
  
  
  
  
  
  
  <!--
  
 


-->
  
</body>
</html>
