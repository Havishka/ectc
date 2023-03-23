<?php  
	include("../connection.php");	
	
	$pr_id=$_GET['pr_id'];
	$pr_course_id=$_GET['pr_course_id'];
	$pr_std_id=$_GET['pr_std_id'];
	

//echo $pr_id;
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
			$(document).ready(function () {
                
                $('#gotday').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });
			
	</script>

	<script src="pay/js/bootstrap-datepicker.js"></script>
	
	
	
  </head>

  <body class="nav-md">


			<?php

	
		$query = "SELECT * FROM student s, payment p, course c, student_branch sb, branch b, student_course sc, payment_receipt pr where s.std_id = sb.std_id and sb.branch_id=b.branch_id and sc.course_id=p.course_id and s.std_id=p.std_id and s.std_id=pr.pr_std_id and sc.course_id=pr.pr_course_id and s.std_id=sc.std_id and sc.course_id=c.course_id and pr.pr_std_id ='$pr_std_id' and pr.pr_course_id ='$pr_course_id' and pr.pr_id='$pr_id' ";

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
					$discount_remark = $row['discount_remark'];
					$tot_amount_old = $row['tot_amount'];
					
					$pr_id = $row['pr_id'];
					$pr_date = $row['pr_date'];
					$pr_std_id = $row['pr_std_id'];
					$pr_course_id = $row['pr_course_id'];
					$payment = $row['payment'];
					$issuedBy = $row['issuedBy'];

			?>
			
			

            <div class="clearfix"></div>
			
			<div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" method="post" action="pay/paymenterrorfix_q.php">
 

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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Payment Date (old):</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name='pr_date' class="form-control" value='<?php echo $pr_date;  ?>' disabled>								  
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Course Name :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name='c_name' class="form-control" value='<?php echo $c_name;  ?>' readonly="readonly" >	
							
                        </div>
                      </div>
					  
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Fee:</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name='tot_amount_old' id='tot_amount_old' class="form-control" value='<?php echo $tot_amount_old;  ?>' readonly="readonly" >	
							
                        </div>
                      </div>
					  

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Paid Amount (old) :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="form-control" type="text" name="payold" id="payold" value='<?php echo $payment; ?>' readonly="readonly">	
                        </div>
                      </div>
	  	  
					  <br>
					  	    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Correct Payment Date :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="gotday" id="gotday" value='<?php echo $pr_date;  ?>'  \>								  
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Additional Info (Optional):</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea class="form-control" rows="3" placeholder='Additional Info Summary' type="remark" name="remark" maxlength="50"></textarea>
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Corrected Payment</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="form-control" type="number" name="correctpay" id="correctpay" min="0" >	
						  
							
                        </div>
                      </div>
					  
				
						<input type='hidden' name='prid' value='<?php echo $pr_id ?>' />
						<input type='hidden' name='cid' value='<?php echo $pr_course_id ?>' />
						<input type='hidden' name='sid' value='<?php echo $pr_std_id ?>' />

						<input type='hidden' name='issuedb' value='<?php echo $login_name ?>' />

				
						<br>
						<div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <input type='submit' value='Fix Payment' class="btn btn-success" />
						  <button class="btn btn-primary" onClick="document.location.href='index.php?tab=paymenterror'" type="button" >Go Back</button>  
                          
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