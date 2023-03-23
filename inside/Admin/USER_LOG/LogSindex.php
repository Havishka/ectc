<?php
include("../connection.php");


if(!isset($_GET['dlt'])){
	
	$man='';
	
}





if(isset($_GET['dlt'])){

//$sqlbr = "SELECT * FROM branch WHERE branch_id='".$_GET['dlt']."'";




$sqlbr = "
SELECT branch.name AS n , branch_per.percentage AS ptg ,branch.branch_id AS bidd
FROM branch
JOIN branch_per ON branch.branch_id = branch_per.branch_per_id
WHERE branch_per.branch_per_id='".$_GET['dlt']."'
;

 ";
 
 
 /*
SELECT percentage AS ptg, 	
branch_per_id AS bid
FROM branch_per
WHERE branch_per_id='".$_GET['dlt']."'

*/


$result2 = $con->query($sqlbr);
							
	if ($result2->num_rows > 0) {
						
						// output data of each row
						while($row = $result2->fetch_assoc()) {
							
						$man='<div class="container" id="c">
																		
																		 <form action="" method="post">
																		
																	
																	  <div class="panel-group">
																		
																		<div class="panel panel-primary">
																		  <div class="panel-heading"><h2><i class="fa fa-cog" aria-hidden="true"></i>&nbsp;Manage Branch: '.$_GET['dlt'].' : '.$row["n"].'</h2></div>
																		  <div class="panel-body">
																		  
																		  <div class="form-group">
																		  <label for="cname">Branch name:</label>
					 <input type="hidden" class="form-control" id="bidd" placeholder="Coursename" name="bidd" value="'.$row["bidd"].'">													  <input type="text" class="form-control" id="cname" placeholder="Branch name" name="cname" value="'.$row["n"].'">
																		</div>
																		<div class="form-group">
																		  <label for="dur">Percentage: %</label>
																		  
																		  
																		  
																		  
																		  
																		  
																		  
																		  
																		  <input type="text" class="form-control" id="dur" placeholder="Enter Percentage without Percentage mark %" name="p" value="'.$row["ptg"].'">
																		</div>
																		
																		
																		
																		
																		
																		
																		
																		  
																		  <center><input type="submit" value="Update changes" name="updatebrnc" class="btn btn-danger btn-lg"/><input type="submit" value="Cancel" name="canc" class="btn btn-warning btn-lg"/></center>
																		  
																		
																		  
																		  </div>
																		</div>
																				
																				 </form> <script>document.getElementById("newinser").disabled = true;</script></div>
																				 
																				 
																				 

																				  ';
																				  
	
	
	
						}}}
	
	
	
	
	






if(isset($_POST['subrnch'])){
	
	$branchname=$_POST['bnnn'];
	// to branch_per
	$presentage=$_POST['presnt'];
	
	
	
	$sql = "INSERT INTO branch (name)
VALUES ('$branchname')";

if ($con->query($sql) === TRUE) {
	
	
			 $sqlcount = "SELECT MAX(branch_id) AS max FROM branch";
								 $resultv = $con->query($sqlcount);
								 
								 if ($resultv->num_rows > 0) {
									
									while($row = $resultv->fetch_assoc()) {
												
												$nextID= $row["max"];
												$date=date("Y-m-d");
												$sessusr=$_SESSION['username'];
	
	
	
													$sqlins = "INSERT INTO branch_per(branch_per_id,percentage,date,editedBy)
										VALUES ('$nextID','$presentage','$date','$sessusr')";
										
										
										
										     
												if ($con->query($sqlins) === TRUE) {
													
													$msg='<div class="alert alert-success">
													  <strong>Success! New branch added successfully</strong>
													  
													  
													  
													 
													</div>';
													echo ' <script>
													 self.location = "index.php?tab=branch"; 
													  </script>';
													
												}else{
													$msg='<div class="alert alert-danger">
													  <strong>ERROR! Creation of branch failed!</strong>
													</div>';
													
													echo ' <script>
													 self.location = "index.php?tab=branch"; 
													  </script>';
													
												}
													
													
	
	
					
														
									






									}
								 }






} else {

	$msg='<div class="alert alert-success">
  <strong>"Error: "' . $sql . '"<br>"' . $con->error.'"</strong>
</div>

';
}

$con->close();
}





if(isset($_POST['updatebrnc'])){
	
	
	
	
	
	
	
	$bname=$_POST['cname'];
	$p = $_POST['p'];
	$dte= date("Y-m-d");
	
	$bide = $_POST['bidd'];
	$sessn = $_SESSION['username'];
	
	
	
	if($bname&&$p){
	
	
				$sqlx = "UPDATE branch_per SET percentage='$p' ,date='$dte',editedBy='$sessn' WHERE branch_per_id='$bide'";
				
				
				if ($con->query($sqlx) === TRUE) {
					echo "Record updated successfully";
					
					echo"<script>
	
window.location = 'index.php?tab=branch';</script>";
					
				} else {
					echo "Error updating record: " . $con->error;
				}
				
				
				
				
					$sqly = "UPDATE branch SET 	name='$bname' WHERE branch_id='$bide'";
				
				
				if ($con->query($sqly) === TRUE) {
					echo "Record updated successfully";
					
				
					
				} else {
					echo "Error updating record: " . $con->error;
				}
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				$con->close();
					
	
	}else{
		
		
	echo "fill all the fields";	
		
	}
	
	
	
}

if(isset($_POST['canc'])){
	
	echo"<script>
	


window.location = 'index.php?tab=branch';</script>";
	
	
	$msg="";
	
}
?>

<!DOCTYPE HTML>
<html>
<title>Ajax table - edit delete add rows with Ajax - InfoTuts</title>
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="Admin/M_BRANCH/style.css" />


    
<script>


$("#alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#alert").slideUp(500);
});

 
</script>
<style>
.w3-button {width:150px;}
</style>


<style>

.frmSearch {position:relative;border: 1px solid #a8d4b1;background-color: #F3F3F3;margin: 2px 0px;padding:20px;border-radius:4px;}
#country-list{list-style:none;margin-top:-90px;padding:0;width:220px;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px; border: #a8d4b1 1px solid;border-radius:4px;}
#other-box{padding: 10px; border: #a8d4b1 1px solid;border-radius:4px;}
#other-long-box{padding: 10px; border: #a8d4b1 1px solid;border-radius:4px; width:100%;}



</style>


 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

</head>
<body>
<div id="mhead">Log Histroy</div>


<div class="frmSearch">


<p>
  <?php echo $msg;?></p>

  
  
  
  
  
  
  <script>
  
  $(document).ready(function(){    
    loadstation();
	
	 loadstationol();
});

function loadstation(){
    $("#station_data").load("Admin/USER_LOG/p.php");
    setTimeout(loadstation, 1000);
}





function loadstationol(){
//var date = $('#datepicker').datepicker({ dateFormat: 'yyyy-mm-dd' }).val();
var date= document.getElementById('datepicker').value;

    $("#station_dataold").load("Admin/USER_LOG/pold.php?date="+date);
    setTimeout(loadstationol, 1000);
}</script>
  


  
  
  <table width="100%" border="0" align="center" cellpadding="13" cellspacing="13">
  <tr>
    <td width="50%" height="293" align="left" valign="top" style="padding:12px;"><div class="panel panel-default"  style="padding:3px;">
    	<div class="panel-heading" style="font-size:18px;">Today <?php echo date("Y-m-d");?>  <img src="Admin/USER_LOG/loading.gif" width="42" height="42"></div>
    	<div class="panel-body">
    		
            
            
            
            
            
            <div id="station_data"><div>
    	</div>
    	<div class="panel-footer"><?php echo date("Y-m-d");?></div>
</div></td>
    <td width="53%" align="center" valign="top" style="padding:12px;">
    <div class="panel panel-default" style="padding:3px;">
    	
    	 
              	<div class="panel-heading" style="font-size:18px;">Select date 
   	              <input type="text" id="datepicker" onClick="loadstationol();"  ></div>
    	    
    	

<div class="panel-body">
    		
            
            
            
            
            
            <div align="left">
            
             <div id="station_dataold"><div>
             
             
            

          </div>
    	</div>
    	<div class="panel-footer">
    	  <div align="left">-----</div>
    	</div>
</div>
    

      </td>
  </tr>
</table>

  
  <hr style="border: 0; 
  height: 1px; 
  background-image: -webkit-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -moz-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -ms-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
  background-image: -o-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0); ">

</body>
</html>
