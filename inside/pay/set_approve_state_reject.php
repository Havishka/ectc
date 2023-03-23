<?php  
	include("../connection.php");	
	
	$nic=$_GET['nic'];
	$course_id=$_GET['course_id'];
	$studentID=$_GET['std_id'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
	
  <script src="pay/js/jquery-1.12.4.js"></script>
  <script src="pay/js/jquery-ui.js"></script>

  
  
  	<link rel="stylesheet" href="pay/css/datepicker.css">
	<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#item').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });

			 $(document).ready(function () {
                
                $('#item22').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });	
			
			$(document).ready(function () {
                
                $('#item23').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });

			
	</script>

	<script src="pay/js/bootstrap-datepicker.js"></script>
	
	
	
  </head>

  <body class="nav-md">


			<?php

				//check any user action
			//	$action = isset( $_POST['action'] ) ? $_POST['action'] : "";
				/*
				$query = "SELECT * FROM student s, student_course sc, course c, payment p 
				WHERE s.std_id=sc.std_id and c.course_id=sc.course_id and s.nic='$nic' and sc.course_id= '$course_id'
				limit 0,1";
		*/
	$query = " SELECT * FROM student s, payment p, course c, student_branch sb, branch b, student_course sc where s.std_id = sb.std_id and sb.branch_id=b.branch_id and sc.course_id=p.course_id and s.std_id=p.std_id and p.approvalState='F' and s.std_id=sc.std_id and sc.course_id=c.course_id and p.std_id ='$studentID' and p.course_id ='$course_id' order by b.name asc , p.course_id  ";
		

		
				//execute the query
				$result = $con->query( $query );
				//get the result
				$row = $result->fetch_assoc();
				//assign the result to certain variable so our html form will be filled up with values
					
					$fname = $row['fname'];
					$lname = $row['lname'];
					$nic = $row['nic'];
					$std_id = $row['std_id'];
					$regDate = $row['regDate'];
					$c_name = $row['c_name'];
					$course_id = $row['course_id'];
					$course_fee = $row['course_fee'];
					$discount_given = $row['discount'];
					

			?>
			
			
			<?php

			
			$sql="select * from student s, student_pre_course spc where s.nic=spc.nic and spc.nic ='$nic'";
	
    $q=mysqli_query($con,$sql);
	$num_results = $q->num_rows;
	if( $num_results > 0)
	{
		//echo "yay";
			        $row = $q->fetch_assoc();
					$count_course = $row['count_course'];
					$previousCourses = $count_course - 1;
					//echo "$count_course";
	}
	else
	{
		//echo "not yay";
		$previousCourses = 0;
	}
	/*
	$sql1="select * from student_group sg , student_group_tot sgt where sgt.group_id=sg.group_id and sg.std_id='$studentID' and sg.course_id='$course_id'";
	*/
	
	$sql1="select sgt.numMembers from student_group sg, student_group_tot sgt where sgt.group_id=sg.group_id and sg.std_id='$studentID' and sg.course_id='$course_id' ";
	$qx=mysqli_query($con,$sql);
	$num_resultsx = $qx->num_rows;
	if( $num_resultsx > 0)
	{

					$groupSt = "Student registered in a group";
	}
	else
	{
		//echo "not yay111";
		$groupSt = "";
	}
	
			
			
			?>
			
			
			
		  
		  
      

            <div class="clearfix"></div>
			
			<div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" method="post" action="pay/set_approval_state_reject_q.php">
 

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name='name' value='<?php echo $fname; echo" "; echo $lname;  ?>' disabled >
                        </div>
                      </div>
					  
		
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> NIC :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name='nic' value='<?php echo $nic;  ?>' readonly="readonly" >
						  
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Registration Date :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name='regDate' class="form-control" value='<?php echo $regDate;  ?>' disabled>								  
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Course Name :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name='c_name' class="form-control" value='<?php echo $c_name;  ?>' readonly="readonly" >	
							
                        </div>
                      </div>
					  
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Course Fee :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name='course_fee' id='course_fee' class="form-control" value='<?php echo $course_fee;  ?>' readonly="readonly" >	
							
                        </div>
                      </div>
					  
					  	    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">No of Courses Student Has Done Ealiyer:</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="form-control"  type="text" name="nof" id="nof" value='<?php echo $previousCourses; ?>' readonly="readonly" >	
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Previously Given Discount :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="form-control"  type="text" name="txt3" id="txt3" value='<?php echo $discount_given; ?>' readonly="readonly">	
                        </div>
                      </div>
	  	  
					  <br>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Reason for Discount Rejection :</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea class="form-control" rows="3" placeholder='Add the Reason' type="remark" name="remark"></textarea>
                        </div>
                      </div>
					  
				
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Max Discount Permitted :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="form-control"  type="number" name="max_disc_per" id="max_disc_per" value="0" >	
						  
							
                        </div>
                      </div>
					  
				
						
						<input type='hidden' name='cid' value='<?php echo $course_id ?>' />
						<input type='hidden' name='sid' value='<?php echo $studentID ?>' />
				<!-- so that we could identify what record is to be updated 
						<input type='hidden' name='action' value='update' />-->
						<?php echo $groupSt ?>
						<br>
						<div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <input type='submit' value='Add New Discount' class="btn btn-success" />
						  <button class="btn btn-primary" onClick="document.location.href='index.php?tab=discountapr'" type="button" >Go Back</button>  
                          
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
            
              </div>

            </div>
			
         
        </div>
    
  </body>
</html>
