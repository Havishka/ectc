<?php
include("../connection.php");


    $std_id = $_POST['std_idxxx'];
   	$course_id = $_POST['selecCID'];
    $mypaid = $_POST['mypaid'];
	$paydate = $_POST['item23']; 
	$login_namez = $_POST['login_name'];
    $receipt_number = $_POST['receipt_number'];
	
/*
	echo "im in";
	echo " $std_id  n $course_id $mypaid $paydate";
	*/
	
$inst1Tot=0;
$inst2Tot=0;
$inst3Tot=0;
$instCorrect=0;
$instRem=0;
$instRem2=0;
$installment_1x=0;
$installment_2x=0;
$installment_3x=0;
$magic='T'; //to avoid over payment making receipt
	
//get the related course installments	
$query96 = "SELECT * from course_installment where course_id='$course_id' ";
$result96 = $con->query( $query96 );
$num_results96 = $result96->num_rows;
if( $num_results96 > 0)
{
while( $row96 = $result96->fetch_assoc() ){
extract($row96);
$installment_01 = $installment_01;
$installment_02 = $installment_02;
$installment_03 = $installment_03;
}
}	
		
//get the students old installments so far	
$query99 = "SELECT * from payment_installment where std_id='$std_id' and course_id='$course_id' ";
$result99 = $con->query( $query99 );
$num_results99 = $result99->num_rows;
if( $num_results99 > 0)
{
while( $row99 = $result99->fetch_assoc() ){
extract($row99);
$installment_1 = $installment_1;
$installment_2 = $installment_2;
$installment_3 = $installment_3;
}
}

//get the students total payment 	
$query97 = "SELECT * from payment where std_id='$std_id' and course_id='$course_id' ";
$result97 = $con->query( $query97 );
$num_results97 = $result97->num_rows;
if( $num_results97 > 0)
{
while( $row97 = $result97->fetch_assoc() ){
extract($row97);
$tot_amount = $tot_amount;
}
}

$installment_3R = $tot_amount - ($installment_01 + $installment_02);
//echo " $std_id  n $installment_3 jj  $installment_1 $installment_2";

//sent the payment correctly
if(($installment_03!=null && $installment_03!=0 ))
{
if(($installment_1+$installment_2+$installment_3) < $tot_amount)
{

//$instRem = $mypaid - ($installment_01 - $installment_1); //amount st paid - amount needed to the installment = extra cash
//$instCorrect = $mypaid - $instRem;

$installment_1y = $installment_1 + $mypaid;

	if($installment_1y > $installment_01)
	{
		$instRem = $installment_1y - $installment_01;
		$installment_1x = $installment_01;
		
			if((($installment_2 + $instRem) > $installment_02) )
			{
				$instRem2 = ($instRem + $installment_2) - $installment_02;
				$installment_2x = $installment_02;
				
					if($instRem2 <= $installment_3R)
					{
						$installment_3x = $installment_3 + $instRem2 ;
					}
					else
					{
						$magic='F';
						echo "Your Payment has exceeded the amount required to pay for the course";
						$installment_1x = $installment_1;
						$installment_2x = $installment_2;
						$installment_3x = $installment_3;
						echo "<script>alert('System Rollback, Your Payment has been exceeded the amount required to pay for the coursexx'); window.location.href = '../index.php?tab=payment_home'; </script>";
					
					}
			}
			else
			{
				$installment_2x = $installment_2 + $instRem;
			
			}
		
	}
	else
	{
		$installment_1x = $installment_1y;
	}
	
}

else
					{
						$magic='F';
						$installment_1x = $installment_1;
						$installment_2x = $installment_2;
						$installment_3x = $installment_3;
						echo "<script>alert('System Rollback, Your Payment is already completed.'); window.location.href = '../index.php?tab=payment_home'; </script>";
					}
}

//solution to blank installment 3

else
{
if(($installment_1+$installment_2+$installment_3) < $tot_amount)
{

//$instRem = $mypaid - ($installment_01 - $installment_1); //amount st paid - amount needed to the installment = extra cash
//$instCorrect = $mypaid - $instRem;

$installment_1y = $installment_1 + $mypaid;

	if($installment_1y > $installment_01)
	{
		$instRem = $installment_1y - $installment_01;
		$installment_1x = $installment_01;
		
			if((($installment_2 + $instRem) > $installment_02))
			{
				$instRem2 = ($instRem + $installment_2) - $installment_02;
				$installment_2x = $installment_02;
				
					if($instRem2 <= $installment_3R)
					{
						$installment_3x = $installment_3 + $instRem2 ;
					}
					else
					{
						$magic='F';
						echo "Your Payment has exceeded the amount required to pay for the course";
						$installment_1x = $installment_1;
						$installment_2x = $installment_2;
						$installment_3x = $installment_3;
						echo "<script>alert('System Rollback, Your Payment has exceeded the amount required to pay for the course'); window.location.href = '../index.php?tab=payment_home'; </script>";
					
					}
			}
			else if((($installment_1x+ $installment_2 + $instRem) > $tot_amount))
			{
					{
						$magic='F';
						echo "The Payment has exceeded the amount required to pay for the course";
						$installment_1x = $installment_1;
						$installment_2x = $installment_2;
						$installment_3x = $installment_3;
						echo "<script>alert('System Rollback, Your Payment has exceeded the amount required to pay for the course'); window.location.href = '../index.php?tab=payment_home'; </script>";
					
					}
			}
			else
			{
				$installment_2x = $installment_2 + $instRem;
					//$installment_2x = '1212';
			}
		
	}
	else
	{
		$installment_1x = $installment_1y;
	}
	
}

else
					{
						$magic='F';
						$installment_1x = $installment_1;
						$installment_2x = $installment_2;
						$installment_3x = $installment_3;
						echo "<script>alert('System Rollback, Your Payment is already completed.'); window.location.href = '../index.php?tab=payment_home'; </script>";
						
					}
}






/*	
$query="insert into payment_installment(l_pay_date, std_id, course_id, installment_1, installment_2, installment_3) values ('$paydate','$std_id','$course_id','$installment_1x','$installment_2x','$installment_3x')";
*/


$query="update payment_installment set l_pay_date = '$paydate', installment_1 = '$installment_1x', installment_2 = '$installment_2x', installment_3 = '$installment_3x' where std_id='$std_id' and course_id='$course_id' ";
$result = mysqli_query($con, $query);

if($magic=='T' && ((($installment_1+$installment_2+$installment_3) < $tot_amount) || ((($installment_1+$installment_2+$installment_3) < $tot_amount) && ($instRem2 <= $installment_3R))))
{
//insert to payment receipt
$query21="insert into payment_receipt(receipt_number, pr_date, pr_std_id, pr_course_id, payment,issuedBy) values('$receipt_number', '$paydate', '$std_id', '$course_id','$mypaid','$login_namez')";
$result21 = mysqli_query($con, $query21);
}

if (!($result ))
  {
  	echo("SQL : " . mysqli_error($con));
  }
else
  {
	//echo("Payment adding Successful");
	echo "<script>alert('Payment adding Successful'); window.location.href = '../index.php?tab=payment_home'; </script>";
		//header("Location: pay1.php.php");
  }

?>