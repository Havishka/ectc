<?php  
	include("../connection.php");	
	
	$nicGOT=$_GET['nic'];
	$course_idGOT=$_GET['course_id'];
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
				$action = isset( $_POST['action'] ) ? $_POST['action'] : "";
				/*
				$query = "SELECT s.fname,s.lname, s.nic, s.std_id, s.regDate, c_name, c.course_fee, p.tot_amount FROM student s, payment p, student_course sc, course c
				WHERE s.std_id=p.std_id and s.std_id=sc.std_id and  c.course_id=sc.course_id and p.type='HalfPay' and s.nic='".$con->real_escape_string($_REQUEST['nic'])."' and sc.course_id= '".$con->real_escape_string($_REQUEST['c_id'])."' ";
				*/
				
					$query = "SELECT s.fname,s.lname, s.nic, s.std_id, s.regDate, c_name, c.course_fee, p.tot_amount, c.course_id FROM student s, payment p, student_course sc, course c
				WHERE s.std_id=p.std_id and s.std_id=sc.std_id and  c.course_id=sc.course_id and p.type='SPC' and s.nic='$nicGOT' and sc.course_id= '$course_idGOT' and p.course_id= '$course_idGOT'";
				
				
				//$selecCID ='".$con->real_escape_string($_REQUEST['c_id'])."';

				//execute the query //p.type='HalfPay' and
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
					$tot_amount = $row['tot_amount'];
					$selecCID = $row['course_id'];
			?>
		  
		  
            <div class="page-title">
              <div class="title_left">
                <h3>Add Installment Payments</h3>
              </div>

  
            </div>

            <div class="clearfix"></div>
			
			<div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" method="post" action="pay/spc_installment_payment_q.php">
 

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name='name' value='<?php echo $fname; echo " "; echo $lname;  ?>' disabled >
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Type :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name='type' value='Special' disabled >
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> NIC :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name='nic' value='<?php echo $nic;  ?>' disabled >
						  
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Student ID :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name='std_idxxx' value='<?php echo $std_id;  ?>' readonly />
						  
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Register Date :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name='regDate' class="form-control" value='<?php echo $regDate;  ?>' disabled>								  
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Course Name :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name='c_name' class="form-control" value='<?php echo $c_name;  ?>' disabled >	
							
                        </div>
                      </div>

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Amount to be Paid :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" name='tot_amount' class="form-control" value='<?php echo $tot_amount;  ?>' disabled >	
							
                        </div>
                      </div>
					  
		
					  
					  <script>
					  <?php 
					
$mypayment = 0;
$query99 = "SELECT * from payment_receipt where pr_std_id='$std_id' and pr_course_id='$selecCID' "; //mnxx
$result99 = $con->query( $query99 );
$num_results99 = $result99->num_rows;
if( $num_results99 > 0)
{
while( $row99 = $result99->fetch_assoc() ){
extract($row99);
$mypayment = $mypayment+$payment;
}
}
	
	$remainPayment =	$tot_amount - $mypayment;
	
	
	
						?>
					  </script>
					  

					  
					  <div class="form-group"  >
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">You Should Pay :</label>
                        <div class=" ">
						 
						 <span class="inlineinput">
                          <input type="text" style='display: inline; width: 120px;' name='ins1xx' class="form-control" value='<?php echo $remainPayment; ?>' readonly>	
						 </span>
						  
                        </div>
                      </div>


					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Your Payments So far : </label>
                        <div class=" ">
						 
						 <span class="inlineinput">
                          <input type="text" style='display: inline; width: 120px;' name='myins1' class="form-control" value='<?php echo $mypayment ;?>' disabled>	
						 </span>
						  
			
						  
                        </div>
                      </div>
					  
					  	  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Payment Date :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="item23" id="item23" value="<?php echo date("Y-m-d"); ?>"  \>								  
                        </div>
                      </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Receipt Number :</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" name='receipt_number' id='receipt_number' class="form-control" placeholder="Type Receipt Number if Any" maxlength="50">
                            </div>
                        </div>

					  	  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Payment :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
            
							<input type="number" class="form-control" name="mypaid" id="mypaid" placeholder="Enter your Payment" min="0" required \>
                        </div>
                      </div>
					  
					 
					  
						<!-- so that we could identify what record is to be updated -->
						<input type='hidden' name='selecCID' value='<?php echo $selecCID ?>' />
						<!-- we will set the action to update -->
						<input type='hidden' name='action' value='update' />
						<input type='hidden' name='login_name' value='<?php echo $login_name ?>' />
						
						<div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <input type='submit' value='Pay' class="btn btn-success" />
                          <button class="btn btn-primary" onClick="document.location.href='index.php?tab=payment_home'" type="button">Cancel</button>
                        </div>
						
						
                      </div>

                    </form>
				
					
                  </div>
                </div>
    
              </div>

            </div>
       
   
	
  </body>
</html>
