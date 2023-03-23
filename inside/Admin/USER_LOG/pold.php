<?php
include ("../../connection.php");

session_start();


//$datereqest=$_GET['date'];
$datereqest= new DateTime($_GET['date']);
$dte= date("Y-m-d");
	//WHERE date='".datereqest."' ORDER BY log_id DESC
	
	if($_GET['date']!=""){
	
	
			
	$sql = "SELECT * FROM log WHERE date='".$datereqest->format('Y-m-d')."' ORDER BY log_id DESC  ";
	
	}else if($_GET['date']==""){
	
	
	$sql = "SELECT * FROM log WHERE date NOT IN ('".$dte."') ORDER BY log_id DESC  LIMIT 20";
	
	}
	
	
	
	
	
			
			
			
			
			$result = $con->query($sql);
			
			if ($result->num_rows > 0) {
				

				
								while($row = $result->fetch_assoc()) {
								$timee=$row["end_time"];
								$logusername=$row["log_admin_id"];
								$dttee=$row["date"];		
									
							
							
							
							$sqlv = "SELECT name,level,profile FROM admin WHERE username='".$logusername."'";
							$resultv = $con->query($sqlv);
							
					
								// output data of each row
								while($rowx = $resultv->fetch_assoc()) {
									
									if($rowx['profile']==NULL){
									
									$imglink="Admin/M_ADMIN/users_profile_images/user.png";
									
									
									}else{
									
									$imglink="Admin/M_ADMIN/users_profile_images/'".$rowx['profile']."'";
									
									
									}
									//echo $datereqest;
									
									
									echo '<div class="media">
    <div class="media-left">
      <img src="Admin/M_ADMIN/users_profile_images/'.$rowx['profile'].'" class="media-object" style="width:60px">
    </div>
    <div class="media-body">
      <h5 class="media-heading" style="color:black"><b>'. $rowx["name"]. ' : '.$logusername.' : level '.$rowx["level"].' ( '.$dttee.'  )</b></h5>
      <p style="color:red">' . $row["log_details"]. '</p>
    </div>
  </div>
  <hr>';
									
									
								}
														
							
							
							
							
							
						
									
									
								}
								
							
								
								
			} else {
				echo "0 results";
			}
			
			
			mysqli_close($con);




?>