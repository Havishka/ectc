<?php
include("../connection.php");


    $std_id = $_POST['std_id'];
   	$course_id = $_POST['c_id'];
    $yourdis = $_POST['txt3'];
	$totalPrice = $_POST['your_fA'];
	$type = $_POST['type'];
    $paydate = $_POST['item23']; 
	$inst_pay = $_POST['inst_pay'];
	$remark=$_POST['remark'];
	$discountperx=$_POST['txt2'];
	$login_namez = $_POST['login_name']; 
	$course_fee_ori = $_POST['course_fee'];
    $receipt_number = $_POST['receipt_number'];
	//new
	$c_name = $_POST['c_name'];
	$name = $_POST['name'];
	$nic = $_POST['nic'];
	
	
	if($discountperx>20)
	{
		$approvalState='F'; //so need approval
	}
	else
	{
		$approvalState='T';
	}
	
	if(($course_fee_ori/5) < $yourdis )
	{
		$approvalState='F';
	}	
	else
	{
		$approvalState='T';
	}
/*
echo "approval state";	
echo $approvalState;
echo "course fee";
echo $course_fee_ori;
echo "given discount";
echo $yourdis;
echo "discount percentage";
echo ($course_fee_ori/5);
*/
//approvalState //, '$approvalState'

//$query="insert into payment(std_id,course_id, yourdis, totalPrice,type,paydate,remark)values('$std_id', '$course_id','$discount','$tot_amount','$type' ,'$pay_date', '$discount_remark')";
/*
echo ($course_fee_ori/5);
echo "youd is";
echo ($yourdis);
echo $approvalState;
*/




$query="insert into payment(std_id,course_id, discount, tot_amount,type,pay_date,discount_remark,approvalState)
values('$std_id', '$course_id','$yourdis','$totalPrice','$type' ,'$paydate', '$remark', '$approvalState')";

$query1="insert into payment_receipt(receipt_number, pr_date, pr_std_id,pr_course_id, payment,issuedBy)
values('$receipt_number', '$paydate', '$std_id','$course_id','$inst_pay','$login_namez')";

$query2="insert into payment_installment(l_pay_date, std_id,course_id, installment_1)
values('$paydate', '$std_id','$course_id','$inst_pay')";

$result = mysqli_query($con, $query);
$result1 = mysqli_query($con, $query1);
$result2 = mysqli_query($con, $query2);

if (!($result ) && !($result1)&&!($result2))
  {
  	echo("Database Error : " . mysqli_error($con));
  }
else
  {
	echo("Payment Successful");
	//new function to sent a email if approval needed
if($approvalState=='F')
{
		$sel_queryz="select name,email from admin where username='admin' ";
		$resultz = mysqli_query($con,$sel_queryz);
		if($rowz = mysqli_fetch_assoc($resultz)){
			$namemanager=$rowz["name"];
			$emailmanager=$rowz["email"];
		}
	
	session_start();
	$_SESSION['std_id'] = $std_id;
	$_SESSION['course_id'] = $course_id;
	$_SESSION['yourdis'] = $yourdis;
	$_SESSION['course_fee_ori'] = $course_fee_ori;
	$_SESSION['remark'] = $remark;
	$_SESSION['login_namez'] = $login_namez;
	$_SESSION['paydate'] = $paydate;
	$_SESSION['inst_pay'] = $inst_pay;
	$_SESSION['c_name'] = $c_name;
	$_SESSION['name'] = $name;
	$_SESSION['nic'] = $nic;
	
		$_SESSION['namemanager'] = $namemanager;
		$_SESSION['emailmanager'] = $emailmanager;
		
	include "set_approval_state_email.php";
}
	echo "<script>alert('Payment was Successful'); window.location.href = '../index.php?tab=payment_home'; </script>";
  }
?>