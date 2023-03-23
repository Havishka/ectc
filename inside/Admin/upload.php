<?php

session_start();

include('../connection.php');





	// Cover Image file upload
	$imagebox=$_FILES['file1'];
    $ifile = rand(1000,100000)."-".$_FILES['file1']['name'];
    $ifile_loc = $_FILES['file1']['tmp_name'];
	$ifile_size = $_FILES['file1']['size'];
	$ifile_type = $_FILES['file1']['type'];
	$ifolder="M_ADMIN/users_profile_images/";
	
	if (($ifile_type == 'image/jpeg') || ($ifile_type == 'image/jpg')|| ($ifile_type == 'image/gif') || ($ifile_type == 'image/png') || ($ifile_type == 'image/x-png'))
	 				{
	 
	 
	 
	 
	 
							
    							// new file size in KB
								$inew_size = $ifile_size/1024;  
								// make file name in lower case
								$inew_file_name = strtolower($ifile);
								// make file name in lower case
								$ifinal_file=str_replace(' ','-',$inew_file_name);
	
	




	

								if (file_exists("M_ADMIN/users_profile_images/".$_SESSION['profileimg'])) {
										
									
								 unlink("M_ADMIN/users_profile_images/".$_SESSION['profileimg']);//delete old pic
								 
									
								}
									
									
									
									//move upload to folder
									
									 if(move_uploaded_file($ifile_loc,$ifolder.$ifinal_file))
										{
												$sql = "UPDATE admin SET profile='$ifinal_file' WHERE username='".$_SESSION['username']."'";
															
																					if ($con->query($sql) === TRUE) {
																						$_SESSION['msgfromupload']='<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success! Profile image changed.</strong>
</div>';
																						
																					} else {
																						$_SESSION['msgfromupload']='<div class="alert alert-warning" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Connection error! "'.$conn->error.'" </strong>.
</div>';
																					}
																					
																					
																					
																					$con->close();
																								
																						
																					
										}
							
	
					}
   								

?>














