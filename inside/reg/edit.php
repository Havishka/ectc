<?php 
	include("../connection.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
                 
  <?php

if(isset($_POST['updte'])){

								$newcourseidd=$_POST['course_id'];
								$stdid=$_POST['studentid'];
								
								$ccc=$_POST['idsend'];
								
								//echo $ccc;

								//course duration
								
									$gotdur=$_POST['sc_duration'];
									if($gotdur == 'deflt')
									{
													$sqlscd=mysqli_query($con,"SELECT duration FROM course where course_id='$newcourseidd'");
													if(mysqli_num_rows($sqlscd)){
														while($rs=mysqli_fetch_array($sqlscd)){
														 $sc_duration =  $rs['duration'];
													  }
													}
									}
									else
									{
										$sc_duration = $_POST['sc_duration'];
									}
									
										$sql = "UPDATE student_course SET course_id='".$newcourseidd."', course_dur='".$sc_duration."' , std_id='".$stdid."' WHERE std_course_id='".$ccc."'";
										
										if ($con->query($sql) === TRUE) {
											echo "  Record updated successfully";
											echo"
											
											<script>window.location.replace('index.php?tab=updatestd');
								</script>
											
											
											";
											
										} else {
											echo "Error updating record: " . $con->error;
										}
										
										$con->close();
										
}



if(isset($_POST['dlte'])){

//echo "Helloooo delete ";

}
//check any user action

$action = isset( $_POST['action'] ) ? $_POST['action'] : "";

if($action == "update"){ //if the user hit the submit button

//write our update query

//$mysqli->real_escape_string() function helps us prevent attacks such as SQL injection

$query = "update student

set

std_id = '".$con->real_escape_string($_POST['std_id'])."',

fname = '".$con->real_escape_string($_POST['fname'])."',

lname = '".$con->real_escape_string($_POST['lname'])."',

dob = '".$con->real_escape_string($_POST['dob'])."',

gender  = '".$con->real_escape_string($_POST['gender'])."',

occupation = '".$con->real_escape_string($_POST['occ'])."',

email = '".$con->real_escape_string($_POST['email'])."',

mobile = '".$con->real_escape_string($_POST['phone'])."',

nic = '".$con->real_escape_string($_POST['nic'])."',

regDate = '".$con->real_escape_string($_POST['regDate'])."',

address = '".$con->real_escape_string($_POST['address'])."',

regFee = '".$con->real_escape_string($_POST['regFee'])."'


where nic='".$con->real_escape_string($_REQUEST['nic'])."'";

//execute the query

if( $con->query($query) ) {

//if updating the record was successful
      
echo "<div class='daterror'><div class='alert alert-success' role='alert'>Student details are successfully updated! <strong><span class='glyphicon glyphicon-ok'></strong></div></div>";
$query = "select * from student where nic='".$con->real_escape_string($_REQUEST['edit'])."'";

//execute the query

$result = $con->query( $query );

//get number of rows returned

$num_results = $result->num_rows;

//this will link us to our add.php to create new record
echo "<br>";


if( $num_results > 0){ //it means there's already a database record




//creating new table row per record


//just preparing the edit link to edit the record//end table

}else{

//if database table is empty

echo "No records found.";

}


}else{

//if unable to update new record

echo "Database Error: Unable to update record.";

}

}

//select the specific database record to update

$querycc = "select * from  student

where nic='".$con->real_escape_string($_REQUEST['edit'])."'

limit 0,1";

//execute the query

$resultcc = $con->query( $querycc );

//get the result

$rowc = $resultcc->fetch_assoc();

//assign the result to certain variable so our html form will be filled up with values

$std_id= $rowc['std_id'];
$fname = $rowc['fname'];
$lname = $rowc['lname'];

$dob = $rowc['dob'];

$gender = $rowc['gender'];

$occupation = $rowc['occupation'];

$email = $rowc['email'];

$phone = $rowc['mobile'];

$nic = $rowc['nic'];

$regDate = $rowc['regDate'];

$address = $rowc['address'];


$regFee = $rowc['regFee'];

?>
<br>
<!--we have our html form here where user information will be entered-->

<table width="393" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="96" height="67" align="left" valign="middle"><button type="button" class="btn btn-warning" onClick="location.href='index.php?tab=updatestd'">< Back</button></td>
    <td width="297" align="left" valign="middle"><h2><ul><li> Update Student</li></ul></h2></td>
  </tr>
</table>
<p>&nbsp;</p>
<hr>
  <br>
  <br>
  <br>
  <form class="form-horizontal" method="post" action="#" >
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Student No :</label>
      <div class="col-sm-4">
        <input type='text' class="form-control" name='std_id' value='<?php echo $std_id;  ?>' readonly />
      </div>
    </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">First Name. :</label>
    <div class="col-sm-4">
      <input type='text' class="form-control" name='fname' value='<?php echo $fname;  ?>' />
    </div>
    </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Last Name:</label>
    <div class="col-sm-4">
      <input type='text' class="form-control" name='lname' value='<?php echo $lname;  ?>' />
    </div>
    </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Date of Birth :</label>
    <div class="col-sm-4">
  <input type='text' name='dob' class="form-control" value='<?php echo $dob;  ?>' />
    </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Gender :</label>
    <!--  <div class="col-sm-4">
  <input type='text' name='gender' class="form-control" value='<?php echo $gender;  ?>' />
      </div>-->
	       <div class="col-sm-4">
                          <select id="gender" class="form-control" name="gender">
                                <option selected value='<?php echo $gender;  ?>'><?php 
								//echo $gender; 
if($gender=='male')
{
	echo "Male - Selected";
}
else if ($gender=='female')
{
	echo "Female - Selected";
}
else
	echo "Not Selected";

								?></option>
                           								<option value="male">Male</option>
                                                        <option value="female">Female</option>
                                     </select>
                        </div>
	  
	  
	  
    </div>
  <div class="form-group">
  <label class="control-label col-sm-2" for="email">Email :</label>
    <div class="col-sm-4">
  <input type='text' name='email' class="form-control" value='<?php echo $email;  ?>' /></td>
    </div>
    </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Occupation :</label>
    <div class="col-sm-4"> 
  <input type='text' name='occ'class="form-control" value='<?php echo $occupation;  ?>'/>
    </div>
    </div>
    
    
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">NIC :</label>
    <div class="col-sm-4"> 
  <input type='text' name='nic'class="form-control" value='<?php echo $nic;  ?>' readonly/>
    </div>
    </div>
    
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Address :</label>
    <div class="col-sm-4"> 
  <input type='text' name='address' class="form-control" value='<?php echo $address;  ?>' />
  </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Phone :</label>
      <div class="col-sm-4"> 
  <input type='text' name='phone' class="form-control" value='<?php echo $phone;  ?>' />
  </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Registration Date:</label>
      <div class="col-sm-4"> 
  <input type='text' name='regDate' class="form-control" value='<?php echo $regDate;  ?>' />
  </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Registration Fee:</label>
      <div class="col-sm-4"> 
  <input type='text' name='regFee' class="form-control" value='<?php echo $regFee;?>' />
  </div>
    </div>
    
    
  <!-- so that we could identify what record is to be updated-->
    
  <input type='hidden' name='nic' value='<?php echo $nic?>' />
    
  <!-- we will set the action to update--> 
    
  <input type='hidden' name='action' value='update' />
    
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input class="btn btn-primary" type='submit' value='Edit' />
    </div>
    </div>
  </form>
  
  <br>
  
  <br>
  
  <hr>
  
  <br>
  <br>
 
  
  
  <div class="form-group">
  
   
    <div class="col-sm-offset-2 col-sm-10">
    
     <h2><u>Courses Student Have Registered and Still Able to Transfer!</u><br>
    </h2>
     <table width="65%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="30" bgcolor="#FFFFCC" style="padding: 10px; color: #000; font-size: 16px; font-weight: bold;">Date</td>
        <td bgcolor="#FFFFCC"  style="padding: 10px; color: #000000; font-weight: bold; font-size: 16px;">Course</td>
		<td bgcolor="#FFFFCC"  style="padding: 10px; color: #000000; font-weight: bold; font-size: 16px;">Duration Override</td>
		<td bgcolor="#FFFFCC"  style="padding: 10px; color: #000000; font-weight: bold; font-size: 16px;"></td>
      </tr>
      
      <?php
      
      $sql = "SELECT std_course_id,course_id, sc_date FROM student_course WHERE std_id='$std_id'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$courseid=$row["course_id"];
		$adte=$row["sc_date"];
		
		//check for payment 
		    $sql32 = "SELECT * FROM payment WHERE std_id='$std_id' and course_id='$courseid'";
			$result32 = $con->query($sql32);

			if (!($result32->num_rows > 0)) {
			
		//end payment

		//$std_course_idd=$row["std_course_id"];
		//Course
		
			$ciddd="";	

				$sqlc = "SELECT c_name,course_id FROM course WHERE course_id='$courseid' ";
				$resultc = $con->query($sqlc);
				
				if ($resultc->num_rows > 0) {
					// output data of each row
					while($rowv = $resultc->fetch_assoc()) {
						
					//query
					$sqlv=mysqli_query($con,"SELECT c_name,course_id AS allc FROM course where state='T' ");
					if(mysqli_num_rows($sqlv)){
					$select= '<select id="branch" class="form-control" name="course_id"><option selected disabled>Please select..</option>';
					
					while($rs=mysqli_fetch_array($sqlv)){
						
						if($rowv['course_id']==$rs['allc']){
							 $select.='<option value="'.$rs['allc'].'"  selected>'.$rs['c_name'].'</option>';
							 
							  $iddd="<input type='hidden' value='".$row["std_course_id"]."' name='idsend'>";
							 
							 //$iddd=$row["std_course_id"];

						}else{
							 $select.='<option value="'.$rs['allc'].'">'.$rs['c_name'].'</option>';
							 $iddd="<input type='hidden' value='".$row["std_course_id"]."' name='idsend'>";
						}
					  }
					}
					$select.='</select>';
					//echo $select;

			//echo $std_course_idd;	
						
		echo "<form method='post' action=''><tr><td style='padding:20px;' bgcolor='#FFFFCC'>".$adte."'</td>
        <td style='padding:20px' bgcolor='#1066bc'>
		
		".$select."   ".$iddd." 
        </td>
		<td>
		<select id='sc_duration' class='form-control' name='sc_duration'  required>
                                <option selected  value='deflt'>Normal Duration</option>
                           								<option value='3'>Special - 3 Months</option>
                                                        <option value='2'>Special - 2 Months</option>
														<option value='1.5'>Special - 1 1/2 Months</option>
														<option value='1'>Special - 1 Month</option>
                                     </select>
		</td>
        <td style='padding:20px'> $iddd
		
		<input type='hidden' name='studentid' value='".$std_id."'>
		
			<input type='hidden' name='coid' value='".$ciddd."'>
			
		
		
		<input type='submit' value='Update' name = 'updte' class='btn btn-primary'></td>
        <td style='padding:20px'><input type='hidden' value='Delete' name = 'dlte'></td></td></tr></form><br>";
		
		
			
					}
					
				
				} else {
					echo "0 results";
}
		

    }}
} else {
    echo "0 results";
}
      ?>
      

    </table>
    <p>&nbsp;</p>
    </div>
  </div>
  </body>
</html>
