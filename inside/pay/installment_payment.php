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
				
					$query = "SELECT s.fname,s.lname, s.nic, s.std_id, s.regDate, c_name, c.course_fee, p.tot_amount, c.course_id, sc.sc_date FROM student s, payment p, student_course sc, course c
				WHERE s.std_id=p.std_id and s.std_id=sc.std_id and  c.course_id=sc.course_id and p.type='HalfPay' and p.course_id=sc.course_id and s.nic='$nicGOT' and sc.course_id='$course_idGOT' ";
				
				
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
					$sc_date =$row['sc_date'];
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
                    <form class="form-horizontal form-label-left input_mask" method="post" action="pay/installment_payment_q.php">
 

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name='name' value='<?php echo $fname; echo " "; echo $lname;  ?>' disabled >
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Type :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name='type' value='HalfPay' disabled >
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
						
						$query3="select installment_01 as sys1 from course_installment where course_id='$course_idGOT'";
						$result = mysqli_query($con, $query3);
						while($rows=mysqli_fetch_array($result))
							{
							$ins1=$rows['sys1'];
							}

						?>
					  </script>
					  
					  <script>
					  <?php 
					
					
					$remainPay2 = 0;
					$remainPayment = 0;
						$query3="select installment_02 as sys2, installment_03 as sys3 from course_installment where course_id='$course_idGOT'";
						$result = mysqli_query($con, $query3);
						while($rows=mysqli_fetch_array($result))
							{
							$ins2=$rows['sys2'];
							$ins3=$rows['sys3'];
							}
						//	echo "$ins2 $ins2";
							
							$remainPay1 = $ins1;
							if($ins2==null || $ins2==0)
							{
								//$remainPay1 = $tot_amount - $ins1;
								//$remainPayment = 500;
								
							}
							//if($ins2!=null && $ins2!=0)
							else if(($ins2!==null && $ins2!==0) && ($ins3!=null && $ins3!=0 ))
							{
							$remainPay2 = $ins2;
							$remainPayment = $tot_amount - ($ins1+$ins2) ;
							}
							else if(($ins2!==null && $ins2!==0) && ($ins3==null || $ins3==0 ))
							{
							$remainPay2 = $tot_amount - ($ins1);
							}


							/*
							if($ins3!=null && $ins3!=0 )
							{
								//$remainPayment = $tot_amount - ($ins1+$ins2);
								//$remainPayment = 500;
								
								$remainPayment = $tot_amount - ($ins1+$ins2);
							}*/
							
						

//$remainPayment = $tot_amount - ($ins1+$ins2);
						?>
					  </script>
					  

					  
					  <div class="form-group"  >
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Installments You Should Pay :</label>
                        <div class=" ">
						 
						 <span class="inlineinput">
                          <input type="text" style='display: inline; width: 120px;' name='ins1' class="form-control" value='<?php echo $ins1; ?>' disabled>	
						 </span>
						  
						 <span class="inlineinput">
						  <input type="text" style='display: inline; width: 120px;'name='ins2' class="form-control" value='<?php echo $remainPay2; ?>'disabled>
						 </span>
						 
						 <span class="inlineinput">
						  <input type="text" style='display: inline; width: 120px;' name='ins3' class="form-control" value='<?php echo $remainPayment; ?>'disabled>
						 </span>
                        </div>
                      </div>


					  
		<!--			  
//get the students course installments			-->

<?php

/*
$query99 = "SELECT * FROM student s, payment p, payment_installment pi,course c,student_course sc, course_installment ci where s.std_id=p.std_id and s.std_id=sc.std_id and sc.course_id=c.course_id and s.std_id=pi.std_id and sc.course_id=ci.course_id and pi.l_pay_date='".$mydate2."' and p.type='HalfPay' order by  p.course_id  ";
*/
//echo "$std_id";

$totIns1=0;
$totIns2=0;
$totIns3=0;

$query99 = "SELECT * from payment_installment where std_id='$std_id' and course_id='$selecCID' "; //mnxx
$result99 = $con->query( $query99 );
$num_results99 = $result99->num_rows;
if( $num_results99 > 0)
{
while( $row99 = $result99->fetch_assoc() ){
extract($row99);
//extract row
$installment_1 = $installment_1;
$installment_2 = $installment_2;
$installment_3 = $installment_3;
/*
$installment_1 = row['installment_1'];
$installment_2 = row['installment_2'];
$installment_3 = row['installment_3'];
*/


}
}
//echo "test test test $installment_1x";
$remainingBal=$tot_amount - ($installment_1+$installment_2+$installment_3);
$totIns1 = $totIns1 + $installment_1;
$totIns2 = $totIns2 + $installment_2;
$totIns3 = $totIns3 + $installment_3;

//should check course duration /3 + regdate not exceed 
//course duration in months -> convert to days
//calculate the installment due dates
//$month = 6;

//get course duration
//echo "yay yay yay $selecCID";
$query95 = "SELECT * from course c, course_installment ci where c.course_id=ci.course_id and c.course_id = '$selecCID' ";
$result95 = $con->query( $query95 );
$num_results95 = $result95->num_rows;
if( $num_results95 > 0)
while( $row95 = $result95->fetch_assoc() ){
extract($row95);
//extract row
$duration=$duration;
$installment_01 = $installment_01;
$installment_02 = $installment_02;
$installment_03 = $installment_03;


}


//
$month = $duration;
$days = $month * 30;            

$daysPerInstallment = (int)($days/3);;
$daysPerInstallment2 = $daysPerInstallment * 2;
$daysPerInstallment3 = $daysPerInstallment * 3;
//echo $daysPerInstallment3;

$dbdate = $sc_date; //$today = date ("Y-m-d");
$duedateIns1 = date ("Y-m-d", strtotime ($dbdate ."+$daysPerInstallment days"));
$duedateIns2 = date ("Y-m-d", strtotime ($dbdate ."+$daysPerInstallment2 days"));
$duedateIns3 = date ("Y-m-d", strtotime ($dbdate ."+$daysPerInstallment3 days"));
$todayis = date("Y-m-d"); //current date


?>






					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Your Installments So far : </label>
                        <div class=" ">
						 
						 <span class="inlineinput">
                          <input type="text" style='display: inline; width: 120px;' name='myins1' class="form-control" value='<?php echo $installment_1 ;?>' disabled>	
						 </span>
						  
						 <span class="inlineinput">
						  <input type="text" style='display: inline; width: 120px;'name='myins2' class="form-control" value='<?php echo $installment_2 ;?>'disabled>
						 </span>
						 
						 <span class="inlineinput">
						  <input type="text" style='display: inline; width: 120px;'name='myins3' class="form-control" value='<?php echo $installment_3 ;?>'disabled>
						 </span>
						  
                        </div>
                      </div>
					  
					    	  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Remaining Payment :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
            
							<input type="text" class="form-control" name="rem" id="rem" value='<?php echo $tot_amount - ($installment_1 + $installment_2 + $installment_3);?>'disabled \>
                        </div>
                      </div>
					  
					  	  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Payment Date :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="item23" id="item23" placeholder="Choose Month..." value="<?php echo date("Y-m-d"); ?>"  \>								  
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
            <?php
			echo "*INFORMATION";
			echo "" ."<br>". "Due Date Installment 1: $duedateIns1
			" ."<br>". "Due Date Installment 2: $duedateIns2 
			" ."<br>". "Due Date Installment 3: $duedateIns3
			" ."<br>". "Today: $todayis";
			
			?>
  
	
  </body>
</html>
