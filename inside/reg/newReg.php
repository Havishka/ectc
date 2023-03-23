<?php 
	include("../connection.php");


	
?>
<?php 


$query3="select max(std_id)+1 as sys from student";

$result = mysqli_query($con, $query3);

while($rows=mysqli_fetch_array($result))
{
$systemID=$rows['sys'];
}

?>
<?php


if(isset($_POST['submit'])){

    $fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
    $nic = $_POST['nic'];
	
    $address = $_POST['address'];
	$course_id = $_POST['course_id'];
	$regFee= $_POST['regFee'];
	
	$sysID= $_POST['sysID'];
	$dob=$_POST['dob'];
	$occ=$_POST['occ'];
	$gender=$_POST['gender'];
	
	$newcoursereg=$_POST['newcoursereg'];
	
	
   // $branch = $_POST['branch'];
	//$courseName = $_POST['courseName'];
	
	
	//$type = $_POST['type'];
	//$groupNum = $_POST['groupNum'];
	$newdate = date("Y-m-d");
	
			//duration override
		$gotdur=$_POST['sc_duration'];
	if($gotdur == 'deflt')
	{
					$sqlscd=mysqli_query($con,"SELECT duration FROM course where course_id='$course_id'");
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
	


//$query1="insert into student( fname,lname, nic, email, mobile, address ,regDate , regFee, dob, gender, occupation) values ( '$fname', '$lname', '$nic', '$email', '$phone','$address','$regDate' , '$regFee' , '$dob', '$gender', '$occ' )";

//$query2="insert into student_branch ( std_id, branch_id) values ( '$sysID', '$branch_id')";

$query3="insert into student_course ( std_id ,course_id , sc_date, course_dur) values ( '$sysID', '$course_id','$newcoursereg','$sc_duration' )";

//"insert into student_course ( std_id ,course_id, sc_date) values ( '$sysID', '$course_id','$regDate' )";

//$result = mysqli_query($con, $query1);
 
//$result= mysqli_query($con, $query2);

$result = mysqli_query($con, $query3);

$query4="SELECT * FROM student_pre_course WHERE nic='$nic'";
$result = mysqli_query($con, $query4);

while($rows=mysqli_fetch_array($result))
{
$count=$rows['count_course'];
}

				   $result23 = $con->query( $query4 );
				   $num_results23 = $result23->num_rows;
					if($num_results23 > 0)
					{
							$countnew = $count + 1;
							$sql24 = "update student_pre_course set nic='$nic', last_course_id= '$course_id', count_course='$countnew' where nic='$nic'" ; //update table studentpre course . 
							
							$result24 = $con->query( $sql24 );
					}
					else
					{
						$countnew = 1;
						$sql25 = "insert into student_pre_course(nic,last_course_id,count_course) values('$nic','$course_id','$countnew')"; //insert table studentpre course . 
						$result25 = $con->query( $sql25 );
					}



				if (!($result ))
				  {
					echo("Database Error : " . mysqli_error($con));
				  }
				else
				  {
					
					echo "<script>alert('Student Successfully added to new course.'); window.location.href = 'index.php?tab=all'; </script>";
						//header("Location: RegHome.php");
				  }
  
  
  
  
  
}else{
	
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container"><!-- top navigation --><!-- /top navigation -->

        <!-- page content -->
     

      </div>

            <div class="clearfix"></div>
           

 </div>

  <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_content">
      <br />
                    
       <?php
			
			//include database connection

            //select the specific database record to update

$query = "select * from student

where nic='".$con->real_escape_string($_REQUEST['nic'])."'

limit 0,1";

//execute the query

$result = $con->query( $query );

//get the result

$row = $result->fetch_assoc();

//assign the result to certain variable so our html form will be filled up with values
$fname = $row['fname'];
$lname = $row['lname'];

$email = $row['email'];

$address = $row['address'];

$phone = $row['mobile'];

$nic = $row['nic'];
$regFee =$row['regFee'];

$dob=$row['dob'];

$gender=$row['gender'];

$occ=$row['occupation'];

$std_id=$row['std_id'];


?>
<br>
<!--we have our html form here where user information will be entered-->
<div class="eee">
<table width="393" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="96" height="67" align="left" valign="middle"><button type="button" class="btn btn-warning" onclick="location.href='index.php?tab=all'">< Back</button></td>
    <td width="297" align="left" valign="middle"><h2><ul><li><h2>New Course Registration</h2></li></ul></h2></td>
  </tr>
</table>

<br>
<br>
<br>

<form class="form-horizontal form-label-left input_mask" method="post" action="index.php?tab=all&&nic=<?php echo $_GET['nic'];?>">

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">First Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" placeholder="First Name" required name="fname" value="<?php echo $fname;?>" readonly=="readonly">
                           <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                    </div>
                      
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Name</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="Last Name" required name="lname" value="<?php echo $lname;?>" readonly=="readonly">
                         <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>

	<div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Date of Birth</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="DD/MM/YYYY" required name="dob" value="<?php echo $dob;?>" readonly=="readonly">
                         <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
          </div>
                      
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="Occupation" required name="gender" value="<?php echo $gender;?>" readonly=="readonly">
                      </div>
                    </div>
                      
                     <div class="form-group">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12">Occupation</label>
                       <div class="col-md-9 col-sm-9 col-xs-12">
                         <input type="text" class="form-control" placeholder="Occupation" required name="occ" value="<?php echo $occ;?>" readonly=="readonly">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                       </div>
                    </div>
                      
				  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="Email" required name="email" value="<?php echo $email;?>" readonly=="readonly">
                         <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
                      </div>
                </div>
                      
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact No</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="Phone" required name="phone" value="<?php echo $phone;?>" readonly=="readonly">
                         <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>
                     

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">NIC</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="NIC" required name="nic" value="<?php echo $nic;?>" readonly=="readonly">
                         <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>

				  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Student ID</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="Student ID" required name="sysID" value="<?php echo $std_id;?>" readonly=="readonly">
                         <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>
                </div>
                     
                

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="Address" required name="address" value="<?php echo $address;?>"readonly=="readonly">
                         <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>
					
					           <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Registration Fee</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" placeholder="Registration Fee" required name="regFee" value="<?php echo $regFee;?>" readonly=="readonly">
                         <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>
                      </div>
                    </div>
                      
                     <div class="form-group">
     <label class="control-label col-md-3 col-sm-3 col-xs-12">Course*</label>
           <div class="col-md-9 col-sm-9 col-xs-12">
   <?php   
				
					
					//query
					//must be sure not to show couses already registered student
					//$sql=mysqli_query($con,"SELECT c_name,course_id FROM course where state='T' ");
					
	$sql=mysqli_query($con,"SELECT c_name,course_id FROM course where state='T' and course_id not in (select course_id from student_course where std_id='$std_id')");
					
					
					if(mysqli_num_rows($sql)){
					$select= '<select id="branch" class="form-control" required name="course_id"><option selected disabled>Please select..</option>';
					
					while($rs=mysqli_fetch_array($sql)){
						  $select.='<option value="'.$rs['course_id'].'">'.$rs['c_name'].'</option>';
					  }
					}
					$select.='</select>';
					echo $select;
?>
    </div>
	
		<!-- newly added to course fasttrack -->
	
	   <label class="control-label col-md-3 col-sm-3 col-xs-12">Duration Override</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <select id="sc_duration" class="form-control" name="sc_duration">
                                <option selected  value="deflt">Normal Duration</option>
                           								<option value="3">Special - 3 Months</option>
                                                        <option value="2">Special - 2 Months</option>
														<option value="1.5">Special - 1 1/2 Months</option>
														<option value="1">Special - 1 Month</option>
                                     </select>
                        </div>
						
	<!-- end newly added to course fasttrack -->
	
	     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">New Course Registration Date<span class="required"></span>
                        </label>
						
                        <div class="col-md-9 col-sm-9 col-xs-12">
                      
						     <div class='input-group date' id='myDatepicker2'>
                          <input type="text" class="form-control" name="newcoursereg" placeholder="New Course Registration Date" value="<?php echo date("Y-m-d"); ?>" >
                             <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
						
						
                      </div>
					  </div>

	
  </div>
                   
                       
                      
                      
         
                      
                         
                          
                          
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                
					     <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
                      </div>
                    </div>

        </form>
      </div>
                
      </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content --><!-- /footer content -->
      </div>
    </div>

  
  
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
  
  
  
    
    <!-- Initialize datetimepicker -->
<script>
    $('#myDatepicker').datetimepicker();
    
    $('#myDatepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    
    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });
    
    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();
    
    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });
    
    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });
    
    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>

  
  </body>
</html>

