<?php  
	include("../connection.php");	

	$course_id=$_GET['course_id'];
	$std_id=$_GET['std_id'];
	
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

	
		$query = "SELECT * FROM student s, payment p, course c, student_branch sb, branch b, student_course sc where s.std_id = sb.std_id and sb.branch_id=b.branch_id and sc.course_id=p.course_id and s.std_id=p.std_id  and s.std_id=sc.std_id and sc.course_id=c.course_id and p.std_id ='$std_id' and p.course_id ='$course_id' ";

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
					
					$sc_date = $row['sc_date'];
					$type = $row['type'];
					$tot_amount = $row['tot_amount'];
					$discount = $row['discount'];
					$discount_remark = $row['discount_remark'];
					$approvalState = $row['approvalState'];
					
					$registeredbranch = $row['branch_id'];
					
				//	$pr_id = $row['pr_id'];
				//	$pr_date = $row['pr_date'];
				//	$pr_std_id = $row['pr_std_id'];
				//	$pr_course_id = $row['pr_course_id'];
					//$payment = $row['payment'];
				//	$issuedBy = $row['issuedBy'];
				
				
$paidAm = 0;
$my_query = mysqli_query($con, "SELECT * FROM payment_receipt pr where pr.pr_std_id='$std_id' and pr.pr_course_id='$course_id'") or die(mysqli_error($con));
while( $row22 = $my_query->fetch_assoc() ){
extract($row22);
$paidAm = $paidAm + $payment;
}

			?>
			
			<?php
			if(isset($_POST['submit'])){

		$sid = $_POST['sid'];
     	$cid = $_POST['cid'];
		$nic = $_POST['nic'];
		$c_name = $_POST['c_name'];
		$issuedb = $_POST['issuedb'];
		$gotday = $_POST['gotday']; 
		$remark = $_POST['remark']; 
		$refundam = $_POST['refundam']; 
		$studentname = $_POST['name']; 
		$sc_date = $_POST['sc_date']; 
		$type = $_POST['type']; 
		$tot_amount = $_POST['tot_amount']; 
		$discount = $_POST['discount']; 
		$discount_remark = $_POST['discount_remark']; 
		$approvalState = $_POST['approvalState']; 
		$registeredbranch = $_POST['registeredbranch']; 
		
		//echo "$gotday $sid $remark $refundam $issuedb";
		
		//remove data from student_course and payment, payment_installment,payment_receipt
		

		//add to log before delete
		$query1="insert into payment_refund_log ( r_nic, r_std_id , r_course_id ,r_branch_id, refund_amount ,refund_date, refund_reason, refund_handledby ,old_course_reg_date , old_payment_type, old_total_course_fee, old_discount, old_discount_reason, old_discount_approval_state) values ('$nic', '$sid', '$cid' ,'$registeredbranch','$refundam','$gotday','$remark','$issuedb' ,'$sc_date','$type','$tot_amount','$discount','$discount_remark','$approvalState')";					
		$result1 = mysqli_query($con, $query1);
		

		
		//refund_log_id
$rflid = 0;
$queryx="select max(refund_id) as sysx from payment_refund_log";
$resultx = mysqli_query($con, $queryx);
while($rows=mysqli_fetch_array($resultx))
{
$rflid=$rows['sysx'];
}

		//clone all payment receipts
$my_clone = mysqli_query($con, "SELECT * FROM payment_receipt pr where pr.pr_std_id='$sid' and pr.pr_course_id='$cid'") or die(mysqli_error($con));
while( $row27 = $my_clone->fetch_assoc() ){
extract($row27);
$receipt_number = $receipt_number ;
$pr_id = $pr_id ;
$pr_date = $pr_date ;
$pr_std_id = $pr_std_id ;
$pr_course_id = $pr_course_id ;
$payment = $payment ;
$issuedBy = $issuedBy ;

	$clone_pay_q="insert into payment_receipt_refund_log (r_pr_id,refund_log_id, r_receipt_number, r_pr_date, r_pr_std_id, r_pr_course_id, r_payment, r_issuedby) values('$pr_id', '$rflid','$receipt_number', '$pr_date', '$pr_std_id' ,'$pr_course_id','$payment','$issuedBy')";
	$result_clone = mysqli_query($con, $clone_pay_q);

}
		
		if(!(($result1) && ($result_clone)))
		{
			echo("Internal Error Occured! Unable to refund! : " . mysqli_error($con));
		}
			
		
		else
		{

	$queryfix="select * from payment_installment where std_id='$sid' and course_id='$cid' ";
	$resultfix = mysqli_query($con, $queryfix);
	$num_resultsfix = $resultfix->num_rows;
	
	if( $num_resultsfix > 0)
	{
		$query88="DELETE FROM payment_installment WHERE std_id='$sid' and course_id='$cid'";
		$result88 = mysqli_query($con, $query88);
	}
				
	
	$query = "DELETE FROM payment WHERE std_id='$sid' and course_id='$cid'"; 
	$result = mysqli_query($con,$query) or die ( mysqli_error());		
				
	//$query2 = "DELETE FROM payment_receipt WHERE pr_std_id='$sid' and pr_course_id='$cid'"; 
	//$result2 = mysqli_query($con,$query2) or die ( mysqli_error());		
	
	//delete all payment receipts
$my_query = mysqli_query($con, "SELECT * FROM payment_receipt pr where pr.pr_std_id='$sid' and pr.pr_course_id='$cid'") or die(mysqli_error($con));
while( $row22 = $my_query->fetch_assoc() ){
extract($row22);
$pr_id = $pr_id ;

$del_rec_q = mysqli_query($con, "DELETE FROM payment_receipt WHERE pr_id='$pr_id' ") or die(mysqli_error($con));
}


	$query29 = "DELETE FROM student_course WHERE std_id='$sid' and course_id='$cid'"; 
	$result29 = mysqli_query($con,$query29) or die ( mysqli_error());	
	
	
	
//delete student from groups and batches if found in any
	$queryd1="select * from student_course_batch_info scbi, student_course_batch scb where scb.scb_aid=scbi.batch_id and scbi.bi_std_id='$sid' and scb.scb_course_id='$cid' ";
	$resultd1 = mysqli_query($con, $queryd1);
	$num_resultsd1 = $resultd1->num_rows;
	
	if( $num_resultsd1 > 0)
	{
		while($rows=mysqli_fetch_array($resultd1))
		{
				$batch_idx=$rows['batch_id'];
		}
		$query88="DELETE FROM student_course_batch_info WHERE bi_std_id='$sid' and batch_id='$batch_idx'";
		$result88 = mysqli_query($con, $query88);
	}
	
	$queryd2="select * from student_group where std_id='$sid' and course_id='$cid' ";
	$resultd2 = mysqli_query($con, $queryd2);
	$num_resultsd2 = $resultd2->num_rows;
	
	if( $num_resultsd2 > 0)
	{
		$query87="DELETE FROM student_group WHERE std_id='$sid' and course_id='$cid'";
		$result87 = mysqli_query($con, $query87);
	}
	
	
	
	if (!(($result1) && ($result) && ($result29)))
	{
		echo("SQL : " . mysqli_error($con));
	}
	else
	{
		//send refund notice to admin email
		$sel_queryz="select name,email from admin where username='admin' ";
		$resultz = mysqli_query($con,$sel_queryz);
		if($rowz = mysqli_fetch_assoc($resultz)){
			$namemanager=$rowz["name"];
			$emailmanager=$rowz["email"];
		}
	
	//session_start();
	$_SESSION['studentname'] = $studentname;
	//$_SESSION['cid'] = $cid;
	$_SESSION['nic'] = $nic;
	$_SESSION['c_name'] = $c_name;
	$_SESSION['issuedb'] = $issuedb;
	$_SESSION['gotday'] = $gotday;
	$_SESSION['remark'] = $remark;
	$_SESSION['refundam'] = $refundam;

	$_SESSION['namemanager'] = $namemanager;
	$_SESSION['emailmanager'] = $emailmanager;
		
	include "pay/payment_refund_email.php";
		
	
		
		//
		echo "<script>alert('Payment Refund Success'); window.location.href = '../index.php?tab=payment_refund'; </script>";
	}
	
}
	
	
	
	
			}
			
			?>
			
			

            <div class="clearfix"></div>
			
			<div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <br />
					
					<h2>*Refund process cannot be undone.</h2>
					<h5>*Refund process will remove the course registration and payment information. Student details will be kept in the system.</h5>
                    <form class="form-horizontal form-label-left input_mask" method="post" action="#">
 

 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Name :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name='name' value='<?php echo $fname; echo" "; echo $lname;  ?>' readonly="readonly" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> NIC :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name='nic' value='<?php echo $nic;  ?>' readonly="readonly" >
						  
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Course Name :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name='c_name' class="form-control" value='<?php echo $c_name;  ?>' readonly="readonly" >	
							
                        </div>
                      </div>
					  
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Payment:</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name='paidAmtot' id='paidAmtot' class="form-control" value='<?php echo $paidAm;  ?>' readonly="readonly" >	
							
                        </div>
                      </div>
					  

					  <br>
					  	  

					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Refund Info:</span>
                        </label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <textarea class="form-control"  placeholder='Summary of the Reason' type="remark" name="remark" maxlength="500" required></textarea>
                        </div>
                      </div>

					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Refund Date :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control" name="gotday" id="gotday" value='<?php echo date("Y-m-d");  ?>'  \>								  
                        </div>
                      </div>
					  
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Refundable Amount :</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input class="form-control" type="text" name="refundam" id="refundam" value='<?php echo $paidAm; ?>' readonly="readonly">	
                        </div>
                      </div>
				
		
						<input type='hidden' name='cid' value='<?php echo $course_id ?>' />
						<input type='hidden' name='sid' value='<?php echo $std_id ?>' />

						<input type='hidden' name='issuedb' value='<?php echo $login_name ?>' />
						
						<input type='hidden' name='sc_date' value='<?php echo $sc_date ?>' />
						<input type='hidden' name='type' value='<?php echo $type ?>' />
						<input type='hidden' name='tot_amount' value='<?php echo $tot_amount ?>' />
						<input type='hidden' name='discount' value='<?php echo $discount ?>' />
						<input type='hidden' name='discount_remark' value='<?php echo $discount_remark ?>' />
						<input type='hidden' name='approvalState' value='<?php echo $approvalState ?>' />
						<input type='hidden' name='registeredbranch' value='<?php echo $registeredbranch ?>' />

						<br>
						<div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <input type='submit' name='submit' value='Refund Payment' class="btn btn-danger" onClick="javascript:return confirm('Are you sure you want to refund?');" data-toggle="tooltip" title="This will force the student out of any existing batches, groups and course registration. (All Receipts will be transferred to refund table.)"/>
						  <button class="btn btn-primary" onClick="document.location.href='index.php?tab=payment_refund'" type="button"  >Go Back</button>  
                          
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