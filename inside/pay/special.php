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
				
				$query = "SELECT s.fname,s.lname, s.nic, s.std_id, s.regDate, c.c_name, c.course_id ,c.course_fee  FROM student s, student_course sc, course c
				WHERE s.std_id=sc.std_id and c.course_id=sc.course_id and s.nic='$nicGOT' and sc.course_id= '$course_idGOT'
				limit 0,1";

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

			?>
		  
		  
            <div class="page-title">
              <div class="title_left">
                <h3>Add Special Payment</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
			
			<div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" method="post"  action="pay/special_q.php">
 

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name='name' value='<?php echo $fname; echo" "; echo $lname;  ?>' readonly="readonly" >
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Type :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name='type' value='SPC' readonly="readonly" >
                        </div>
                      </div>
					  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> NIC :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name='nic' value='<?php echo $nic;  ?>' readonly="readonly" >
						  
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Student ID :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name='std_id' id='std_id' value='<?php echo $std_id;  ?>' readonly="readonly">
						  
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Register Date :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name='regDate' class="form-control" value='<?php echo $regDate; ?>' readonly="readonly">								  
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Course Name :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name='c_name' class="form-control" value='<?php echo $c_name; ?>' readonly="readonly" >	
							
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Course ID :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name='course_id' class="form-control" value='<?php echo $course_id;  ?>' readonly="readonly" >	
							
                        </div>
                      </div>
					  
				
					  
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Course Fee :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="cfee" id="cfee" class="form-control"  onkeyup="getspecialc_fee()" value='<?php echo $course_fee; ?>'  readonly="readonly" >	
						
                        </div>
                      </div>
					  
					   <script>
		function getdiscount() {
            var txtFirstNumberValue = document.getElementById('specialprice').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue/100);
            
			if (!isNaN(result)) 
			{
                document.getElementById('txt3').value = result;
				getfullc_fee();
				
            }
        }
</script>
<script>
function getfullc_fee()
{
	var txtFirstNumberValue = document.getElementById('specialprice').value;
    var txtdis = document.getElementById('txt3').value;
    var fullfee = txtFirstNumberValue - txtdis; 
                          
 
    //display the result
    document.getElementById('totalPrice').value = fullfee;
 
}
</script>
<script>
					    function checkdiscount() 
						{
						var b = document.getElementById('txt2').value;
						var x = parseFloat(b);
						var y = parseFloat(20);
						
					var mu = document.getElementById('specialprice').value;
						var gotdiscount = document.getElementById('txt3').value;
						
						var re = parseFloat(mu) /5;
						//var res = parseFloat(mu) / parseFloat(b);
						
							if((x>100)||(x<0))
							{
									alert("Invalid Discount Percentage");
								    document.getElementById('txt2').value = '0';
									getdiscount();
							}
								//else if (x>y) 
								else if (gotdiscount>re) 
							{
							alert("Payment Discount Level requires Management Permission.");
							}
						}
						</script>
					   
					   
					   
					   
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Special Course Fee:</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input  type="text" onkeyup="getdiscount();" name='specialprice' id="specialprice" class="form-control" value='<?php echo $course_fee; ?>'  >	
						
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Discount as % :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="form-control" onkeyup="getdiscount(); checkdiscount();"  type="number" min="0" max="100" name="txt2" id="txt2" value="0" >	
							
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Your Discount :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="form-control"  type="text" name="txt3" id="txt3" value="" readonly="readonly" >	
						  
							
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">New Course Fee : </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="form-control" type="text" name="totalPrice" id="totalPrice"  value="" readonly="readonly" >	
							
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Reason for Discount :</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea class="form-control" rows="3" name="remark" placeholder='Add the reason'></textarea>
                        </div>
                      </div>
					  
					  	  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Payment Date :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="item23" id="item23" value="<?php echo date("Y-m-d"); ?>">								  
                        </div>
                      </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Receipt Number :</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" name='receipt_number' id='receipt_number' class="form-control" placeholder="Type Receipt Number if Any" maxlength="50">
                            </div>
                        </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Initial Payment :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" name="last" id="last" class="form-control" value='' min="0" required onkeyup="getdiscount();">	
							
                        </div>
                      </div>
					  
					  
                      

					
					  
						<!-- so that we could identify what record is to be updated -->
						<input type='hidden' name='nic' value='<?php echo $nic ?>' />
						<!-- we will set the action to update -->
						<input type='hidden' name='action' value='update' />
						<input type='hidden' name='login_name' value='<?php echo $login_name ?>' />
						
						<div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <input type='submit' value='Pay' class="btn btn-success" />
						    <button class="btn btn-primary" onClick="document.location.href='index.php?tab=payment_home'" type="button" >Go Back</button>  
                          
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
            
              </div>

            </div>
 
  </body>
</html>
