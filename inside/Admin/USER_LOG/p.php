<?php
include ("../../connection.php");

session_start();
$dte=  date("Y-m-d");
	$time= time();		
			$sql = "SELECT * FROM log WHERE date='".$dte."' ORDER BY log_id DESC";
			$result = $con->query($sql);
			
			if ($result->num_rows > 0) {
				

				
								while($row = $result->fetch_assoc()) {
								$timee=$row["end_time"];
								$logusername=$row["log_admin_id"];
									$get_time= $row['start_time'];
									$difff= $time - $get_time; //seconds
									switch(1)
									
										{
									
										case ($difff<60):
										$countt=$difff;
										if ($countt==0)
										$countt="a moment";
										else if ($countt==1)
										$suffixx="second";
										else
										$suffixx= "seconds";
									
									
										break;
									
										case ($difff>60 && $difff < 3600):
										$countt=floor ($difff/60);
										
										if ($countt==1)
										$suffixx="minute";
										else
										$suffixx= "minutes";
									
									
										break;
										
										case ($difff>3600 && $difff < 86400):
										$countt=floor ($difff/3600);
										
										if ($countt==1)
										$suffixx="hour";
										else
										$suffixx= "hours";
									
									
										break;
										
										case ($difff>86400 && $difff < 2629743):
										$countt=floor ($difff/86400);
										
										if ($countt==1)
										$suffixx="Day";
										else
										$suffixx= "Days";
									
									
										break;
										
										case ($difff>2629743 && $difff < 31556926):
										$countt=floor ($difff/2629743);
										
										if ($countt==1)
										$suffixx="month";
										else
										$suffixx= "months";
										break;
										
										case ($difff>31556926):
										$countt=floor ($difff/31556926);
										
										if ($countt==1)
										$suffixx="year";
										else
										$suffixx= "years";
										break;
									
										}

							
							
							
							
							$sqlv = "SELECT name,level,profile FROM admin WHERE username='".$logusername."'";
							$resultv = $con->query($sqlv);
							
					
								// output data of each row
								while($rowx = $resultv->fetch_assoc()) {
									
									if($rowx['profile']==NULL){
									
									$imglink="Admin/M_ADMIN/users_profile_images/user.png";
									
									
									}else{
									
									$imglink="Admin/M_ADMIN/users_profile_images/'".$rowx['profile']."'";
									
									
									}
									
									
									
									echo '<div class="media">
    <div class="media-left">
      <img src="Admin/M_ADMIN/users_profile_images/'.$rowx['profile'].'" class="media-object" style="width:60px">
    </div>
    <div class="media-body">
      <h5 class="media-heading" style="color:black"><b>'. $rowx["name"]. ' : '.$logusername.' : level '.$rowx["level"].' ( '.$countt.' '.$suffixx.' ago )</b></h6>
      <p style="color:red">' . $row["log_details"]. '</p>
    </div>
  </div>
  <hr>';
									
									
								}
														
							
							
							
							
							
							
							
							/*
							
							
							
									echo "<div class='well well-danger' >
									
									
									
									( " . $row["log_admin_id"]. " )
									
									" . $row["log_details"]. "
									 |
									".$countt." ".$suffixx." ago</div><br>";
									
									
									
								*/	
									
									
								}
								
							
								
								
			} else {
				echo "0 results";
			}
			
			
			mysqli_close($con);


?>