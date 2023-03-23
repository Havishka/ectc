<?php
include("../connection.php");


    $sid = $_POST['sid'];
   	$cid = $_POST['cid'];
	$correctpay = $_POST['correctpay'];
	$gotday = $_POST['gotday']; 
	$remark = $_POST['remark']; 
	$prid = $_POST['prid']; 
	$issuedb = $_POST['issuedb'];
	$payold = $_POST['payold'];
	  $todayis = date("Y-m-d");
	$spc = " on $todayis  ";
	$rem = $issuedb.$spc.$remark;
	//echo $correctpay;
	//echo $sid;
	
	
	
	//fix to transfer full payment plans as speical plans
	
	
	$queryfix="select * from payment where type='FullPay' and std_id='$sid' and course_id='$cid' ";
	$resultfix = mysqli_query($con, $queryfix);
	$num_resultsfix = $resultfix->num_rows;
	
	if( $num_resultsfix > 0)
	{
		$query88="update payment set type='SPC' where std_id='$sid' and course_id='$cid'";
		$result88 = mysqli_query($con, $query88);
	}
	

	$query21="update payment_receipt set payment='$correctpay', pr_date='$gotday', issuedBy='$rem' where pr_id='$prid'";
	$result21 = mysqli_query($con, $query21);

	$query22="select * from payment_installment where std_id='$sid' and course_id='$cid' ";
	$result22 = mysqli_query($con, $query22);
	$num_results22 = $result22->num_rows;
	
	if( $num_results22 > 0)
	{
		//echo "captured payment";
		//echo "<script>alert('captured payment'); </script>";
		while( $row96 = $result22->fetch_assoc() ){
			extract($row96);
			$installment_1 = $installment_1;
			$installment_2 = $installment_2;
			$installment_3 = $installment_3;
		}
		
		//check installment plan payment info
		if((($installment_3) > 0) && ($installment_2!=0) && ($installment_1!=0))
		{
			if(($installment_3 - $payold) > 0)
			{
				$installment_3 = $installment_3 - $payold + $correctpay;
			}
			else
			{
				$installment_2 = $installment_2 + $installment_3 - $payold + $correctpay  ;
				$installment_3 = 0;
			}
		}
		
		else if((($installment_2) > 0) && ($installment_3==0) && ($installment_1!=0))
		{
			if(($installment_2 - $payold) > 0)
			{
				$installment_2 = $installment_2 - $payold + $correctpay;
			}
			else
			{
				$installment_1 = $installment_1 + $installment_2 - $payold + $correctpay ;
				$installment_2 = 0;
			}
		}
		
		else if((($installment_1) > 0) && ($installment_3==0) && ($installment_2==0))
		{
				$installment_1 = $installment_1 - $payold + $correctpay;
		}
		
		
		//finally update paymentinstallment
		
		
		$query="update payment_installment set l_pay_date= '$gotday',installment_1='$installment_1' , installment_2 = '$installment_2', installment_3 ='$installment_3' where std_id='$sid' and course_id='$cid'";
		$result = mysqli_query($con, $query);
		
		if (!(($result) ))
			{
				echo("Error in Installment Correcting : " . mysqli_error($con));
			}
		
	}
	
	if (!(($result21) ))
	{
		echo("SQL : " . mysqli_error($con));
	}
	else
	{
		echo "<script>alert('Payment Error Corrected'); window.location.href = '../index.php?tab=paymenterror'; </script>";
	}

?>