<?php  
	include("../connection.php");	
	
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

		
				
	$nic=$_GET['nic'];
	$course_id=$_GET['course_id'];
	//echo "yay";
	/*echo $nic;
	echo $course_id;*/
				
				

				//check any user action
				$action = isset( $_POST['action'] ) ? $_POST['action'] : "";
				
				$query = "SELECT s.fname,s.lname, s.nic, s.std_id, s.regDate, c.c_name, c.course_id, c.course_fee  FROM student s, student_course sc, course c
				WHERE s.std_id=sc.std_id and c.course_id=sc.course_id and s.nic='$nic' and sc.course_id= '$course_id'
				limit 0,1";
				
				/*
				$query = "SELECT s.fname,s.lname, s.nic, s.std_id, s.regDate, c.c_name, c.course_id, c.course_fee  FROM student s, student_course sc, course c
				WHERE s.std_id=sc.std_id and c.course_id=sc.course_id and s.nic='".$con->real_escape_string($_REQUEST['nic'])."' and sc.course_id= '".$con->real_escape_string($_REQUEST['c_id'])."'
				limit 0,1";
				*/

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
		  
		  
      

            <div class="clearfix"></div>
			
			<div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" method="post" action="pay/Instpay_q.php">
 

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name='name' value='<?php echo $fname; echo " "; echo $lname;  ?>' readonly="readonly" >
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Type :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name='type' value='HalfPay' readonly="readonly" >
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
                          <input type="text" class="form-control" name='std_id' value='<?php echo $std_id;  ?>' readonly="readonly">
						  
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
                          <input type="text" name='c_name' class="form-control" value='<?php echo $c_name;  ?>' readonly="readonly" >	
							
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Course ID :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="c_id" id="c_id" class="form-control" value='<?php echo $course_id;  ?>' readonly="readonly" >	
							
                        </div>
                      </div>
					  
	
		<?php
		
		  $query="select ci.installment_03,ci.installment_01,ci.installment_02 from course_installment ci ,course c, student_course sc, student s 
		  where ci.course_id=c.course_id and ci.course_id=sc.course_id and sc.std_id=s.std_id and 
		  ci.course_id='$course_id' and s.nic='$nic' ";
		  
		  //
		  
		  $result = mysqli_query($con, $query);
		  while($rows=mysqli_fetch_array($result))
				{	
				$ins1=$rows['installment_01'];
				$ins2=$rows['installment_02'];			
				$ins3=$rows['installment_03'];
				
				
				
				}
		 
		?>
					  
		<?php
					 
		  if($ins3!=null && $ins3!=0 )
			{
				$cou = "<input type='hidden' name='countins' value='3' />";
				
			   $installmentone=" <div class='form-group'  >
                        <label class='control-label col-md-3 col-sm-3 col-xs-12'>Installment :</label>
                        <div class=''>
						 
						 <span class='inlineinput'>
                          <input type='text' style='display: inline; width: 120px;' name='ins1' class='form-control' value='$ins1' readonly='readonly'>	
						 </span>
						  
						 <span class='inlineinput'>
						  <input type='text' style='display: inline; width: 120px;'name='ins2' class='form-control' value='$ins2'readonly='readonly'>
						 </span>
						 
						 <span class='inlineinput'>
						  <input type='text' style='display: inline; width: 120px;' name='txt1' id='txt1' onkeyup='getdiscount();' class='form-control' value='$ins3'readonly='readonly'>
						 </span>
                        </div>
                      </div>";
						 
						 
						 
						$disc="<script>
						function getdiscount() 
						{
						var txtFirstNumberValue = document.getElementById('txt1').value;
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
								var txtFirstNumberValue = document.getElementById('txt1').value;
								var txtdis = document.getElementById('txt3').value;
								var fullfee = txtFirstNumberValue - txtdis; 
                          
 
								//display the result
								document.getElementById('totalPrice').value = fullfee;
 
							}
					</script>"; 
					

						$final="<div class='form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12'>Your Installments :</label>
                        <div class=' '>
						 
						 <span class='inlineinput'>
                          <input type='text' style='display: inline; width: 120px;' name='ins1' class='form-control' value=' $ins1' readonly='readonly'>	
						 </span>
						  
						 <span class='inlineinput'>
						  <input type='text' style='display: inline; width: 120px;'name='ins2' class='form-control' value='$ins2' readonly='readonly'>
						 </span>
						 
						 <span class='inlineinput'>
						  <input type='text' style='display: inline; width: 120px;' name='totalPrice' id='totalPrice' class='form-control' value='' readonly='readonly'>
						  
						  
                        </div>
                      </div>";


			}
			else if($ins2!=null && $ins2!=0 )
			{
			  
			 $installmentone=" <div class='form-group'  >
                        <label class='control-label col-md-3 col-sm-3 col-xs-12'>Installment :</label>
                        <div class=''>
						 
						 <span class='inlineinput'>
                          <input type='text' style='display: inline; width: 120px;' name='ins1' class='form-control' value='$ins1' readonly='readonly'>	
						 </span>
						  
						 <span class='inlineinput'>
						  <input type='text' style='display: inline; width: 120px;'name='ins2'  id='ins2' class='form-control' onkeyup='getdiscount();' value='$ins2'readonly='readonly'>
						 </span>
						 
						
                        </div>
                      </div>";
						 
						 
						 
						$disc="<script>
						function getdiscount() 
						{
						var txtFirstNumberValue = document.getElementById('ins2').value;
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
								var txtFirstNumberValue = document.getElementById('ins2').value;
								var txtdis = document.getElementById('txt3').value;
								var fullfee = txtFirstNumberValue - txtdis; 
                          
 
								//display the result
								document.getElementById('totalPrice2').value = fullfee;
 
							}
					</script>";
						 

						$final="<div class='form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12'>Your Installments :</label>
                        <div class=' '>
						 
						 <span class='inlineinput'>
                          <input type='text' style='display: inline; width: 120px;' name='ins1' class='form-control' value=' $ins1' readonly='readonly'>	
						 </span>
						  
						 <span class='inlineinput'>
						  <input type='text' style='display: inline; width: 120px;' name='totalPrice2' id='totalPrice2' class='form-control'  value='$ins2' readonly='readonly'>
						   
						 </span>
						 
						 
                      </div>";
			  
			}
		  
		  else if($ins1!=null && $ins1!=0 )
			{
			  
			   $installmentone=" <div class='form-group'  >
                        <label class='control-label col-md-3 col-sm-3 col-xs-12'>Installment :</label>
                        <div class=''>
						 
						 <span class='inlineinput'>
                          <input type='text' style='display: inline; width: 120px;' name='ins1' class='form-control'  name='ins1' id='ins1' value='$ins1' readonly='readonly'>	
						 </span>
						  
						
                        </div>
                      </div>";
						 
						 
						 
						$disc="<script>
						function getdiscount() 
						{
						var txtFirstNumberValue = document.getElementById('ins1').value;
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
								var txtFirstNumberValue = document.getElementById('ins1').value;
								var txtdis = document.getElementById('txt3').value;
								var fullfee = txtFirstNumberValue - txtdis; 
                          
 
								//display the result
								document.getElementById('totalPrice1').value = fullfee;
 
							}
					</script>";
						 
						 
						$final="<div class='form-group'>
                        <label class='control-label col-md-3 col-sm-3 col-xs-12'>Your Installments :</label>
                        <div class=' '>
						 
						 <span class='inlineinput'>
                          <input type='text' style='display: inline; width: 120px;' name='totalPrice1' id='totalPrice1' class='form-control' value=' $ins1' readonly='readonly'>	
						 </span>
						  
						 
                      </div>";
			  
			}

			?>				
					  
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Course Fee :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input  onkeydown="updateNewFee()" type="number" name='course_fee' id='course_fee' class="form-control" value='<?php echo $course_fee;  ?>' readonly="readonly" >	
							
                        </div>
                      </div>
					  
					  <script>
					  
					  <?php 
						
					
						
						$query3="select installment_01 as sys1 from course_installment where course_id='$course_id'";
						$result = mysqli_query($con, $query3);
						while($rows=mysqli_fetch_array($result))
							{
							$ins1=$rows['sys1'];
							}

						?>
					  </script>
					  
					  <script>
					  <?php 
					
						$query3="select installment_02 as sys2 from course_installment where course_id='$course_id'";
						$result = mysqli_query($con, $query3);
						while($rows=mysqli_fetch_array($result))
							{
							$ins2=$rows['sys2'];
							}

						?>
					  </script>
					  
					  <script>
					  <?php 
						
						$query3="select installment_03 as sys3 from course_installment where course_id='$course_id'";
						$result = mysqli_query($con, $query3);
						while($rows=mysqli_fetch_array($result))
							{
							$ins3=$rows['sys3'];
							}

						?>
					  </script>
					  
					  
					  <?php echo $disc;?>
					  
					  
					  <?php echo $installmentone;?>
					  	  
				 <!-- checking if discount will be entered as amount or percentage -->
				<label class="col-md-3 col-sm-3 col-xs-12 control-label">Discount Input Type :
                </label>

                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="radio">
                            <label>
                              <input type="radio" checked="" value="option1" id="aspercentage" name="optionsRadios" onClick="checkdiskinput()" > As Percentage
                            </label>
                          </div>
                          <div class="radio">
                            <label>
                              <input type="radio" value="option2" id="asamount" name="optionsRadios" onClick="checkdiskinput()"> As Amount
                            </label>
                          </div>
                        </div>
						<br><br>

					
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Discount as % :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="form-control" onkeyup="getdiscount(); f_amount(); checkdiscount(); " type="number" name="txt2" id="txt2" value="0">	
							
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Your Discount :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="form-control" type="number" name="txt3" id="txt3" value="" readonly onkeyup="f_amount(); checkdisamount();" >	
                        </div>
                      </div>
					  
					  <?php echo $final;?>
					  	  
					  <br>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Reason for Discount :</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea class="form-control" rows="3" placeholder='Add the Reason' type="remark" name="remark"></textarea>
                        </div>
                      </div>
					  
					  <script>
					  function f_amount() 
						{
						var a = document.getElementById('course_fee').value;
						var b = document.getElementById('txt3').value;
						var re = parseFloat(a) - parseFloat(b);
            
						if (!isNaN(re)) 
							{
							document.getElementById('your_fA').value = re;
							}
						}
						</script>
						
						<script>
					    function checkdiscount() 
						{
						var b = document.getElementById('txt2').value;
						var x = parseFloat(b);
						var y = parseFloat(20);
						
						var mu = document.getElementById('course_fee').value;
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
						
						  <script>
					  function checkdiskinput() 
						{
							if(document.getElementById('aspercentage').checked) {
								//alert("as percentage selected");
								document.getElementById('txt2').style.display = 'block';
								document.getElementById('txt3').readOnly = true;
							}
							
							else if(document.getElementById('asamount').checked) {
								//alert("Discount input as amount Selected");
								document.getElementById('txt2').style.display = 'none';
								document.getElementById('txt3').readOnly = false;
								document.getElementById('txt3').required = true;
							}
						}
						</script>
						
						 <script>
					  function checkdisamount() 
						{
							var g = document.getElementById('course_fee').value;
							var h = document.getElementById('txt3').value;
							var ie = (parseFloat(g) / 5) - parseFloat(h); //find amount is higher than 20percent
							
							var x = parseFloat(g);
							var y = parseFloat(h);

								if((ie >= 0))
								{
									//alert("okay amount disc");
									//document.getElementById('totalPrice').value = -h ;
									getfullc_fee();
									magic();
								}
								else
								{
									if(y > x)
									{
										alert("Invalid Discount Amount!!!");
										//document.getElementById('txt3').value = '0';
										document.getElementById('txt3').value = '0';
									}
									else
									{
									getfullc_fee();
									alert("Given discount amount required management level approval.");
									magic();
									}
								}	
						}
						</script>
						
				
					 <script>
					  function fixnodiscount() 
						{
								if(document.getElementById('aspercentage').checked)
								{
											getdiscount(); f_amount();
								}
						}
						</script>
						
							  <script>
					  function setyourinstbyamount() 
						{
							if(document.getElementById('asamount').checked) {
							
								
							}
						}
						</script>
						
						  <script>
					  function magic() 
						{

							if ($('#totalPrice').length > 0) {
								var q = document.getElementById('totalPrice').value;
								var l = parseFloat(q);
								
								if((l<0))
								{
									alert("Too high discount allocated, advised to use Special Payment Plan!");
								}

							//alert("called");
							}
							
							if ($('#totalPrice2').length > 0) {
								var w = document.getElementById('totalPrice2').value;
								var k = parseFloat(w);
								
								if((k<0))
								{
									alert("Too high discount allocated, advised to use Special Payment Plan!");
								}
								
							//alert("calledxx");
							}
							
							if ($('#totalPrice1').length > 0) {
								var e = document.getElementById('totalPrice1').value;
								var j = parseFloat(e);
								
								if((j<0))
								{
									alert("Too high discount allocated, advised to use Special Payment Plan!");
								}
							}
						}
						</script>
					
					
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Final Course Fee :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="form-control"  type="text" name="your_fA" id="your_fA" value="" readonly >	
						  
							
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Initial Payment :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="number" name='inst_pay' id='inst_pay' class="form-control" value='' onkeyup="fixnodiscount(); " required>
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
			
         
        </div>
    
  </body>
</html>
