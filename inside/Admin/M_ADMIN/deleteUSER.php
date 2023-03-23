<?php
session_start();
include_once("../../../connection.php");


$password =$_GET['mode'];
  
			
	
			
	$sql = "SELECT * FROM admin";
	$result = $con->query($sql);
				if ($result->num_rows > 0) {
								 while($row = $result->fetch_assoc()) {
								$id=$row["admin_id"];
								//$id = stripslashes($password);
								//$id = mysqli_real_escape_string($db, $id);
								$idd = $id;
								
								
								if($password==$idd){
											$sql = "DELETE FROM admin WHERE admin_id='".$id."'";
										
										if ($con->query($sql) === TRUE) {
											$msg ="Record deleted successfully";
											echo "<script> window.location.href = '../../index.php?tab=manage_admin&&msg=success'; </script>";	
											
											
											
											
											  		           //---update log---===================================================/
																
																
																$nm=$row["name"];
																$details=''.$nm.'`s account deleted!';
																
																$sqCl = "INSERT INTO log (log_admin_id,start_time,end_time,date,log_details)
																VALUES ('".$_SESSION['username']."','".time()."','uptdaccount','".date("Y-m-d")."','".$details."')";
																
																if ($con->query($sqCl) === TRUE) {
																	echo "log updated";
																} else {
																	echo "Error: " . $sqCl . "<br>" . $con->error;
																}
																															
																//====================================================================
											
											
											
											
											
											
											
										} else {
											$msg ="Error deleting record: " . $conn->error;
											echo "<script> window.location.href = '../../index.php?tab=manage_admin&&&&msg=unsuccess'; </script>";	
										}
							
								}else{
									
									$msg ="Error deleting: ";
									
								}
								
					
				
				
				
						}
				
	}
			
 






?>
