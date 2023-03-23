<?php
	include '../connection.php';
	
$mydate2 = $_POST['item85']; //from
$mydate1 = $_POST['item86']; //to	
$mydate3 = $_POST['item86']; //to
$student_batch = $_POST['batches_fd']; //batch batches_fd  student_batch
//$course22 = $_POST['item88']; //course
$payment_state = $_POST['payment_state']; //payment_state //2uncompleted //1completed


//$branch22='%';
//$payment_state $student_batch

$my_query24 = mysqli_query($con, "SELECT batch_start_date,scb_course_id,scb_branch_id from student_course_batch where scb_aid='$student_batch' ") or die(mysqli_error($con));

while( $row24 = $my_query24->fetch_assoc() ){
extract($row24);
		$datexx = $batch_start_date;
		$batch_c_id = $scb_course_id;
		$scb_course_id = $scb_course_id;
		$branch22 = $scb_branch_id;
		//
		$sel_queryz="select c_name from course where course_id='$scb_course_id' ";
		$resultz = mysqli_query($con,$sel_queryz);
		if($rowz = mysqli_fetch_assoc($resultz)){
			$c_name=$rowz["c_name"];
		}
		$gotmonth = date('F, Y',strtotime($datexx));
		$uniqueBatchName = "$student_batch, $c_name : $gotmonth Intake";
}

//echo "branch is $branch22  ,got course id $batch_c_id , batch id $student_batch , batchname $uniqueBatchName    ";
?>
<!DOCTYPE html>
<html lang="en">


  <body class="nav-md">


			<!-- new new new -->
			 <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>CADD CENTER - REPORT<small>Student Payment Information By Batch <?php echo $uniqueBatchName; ?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
               
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
					
<?php



//view summary final
if(isset($_POST["batchsummary"]))   
{

echo "<style>
		.lowerthan100{
 background-color:red;
 color:white;   
}
.higherthan100{
 background-color:white;   
 color:red;
}
 .lowert{
 background-color:blue;
 color:white;   
 }
 .fullcomplete{
 background-color:LimeGreen;
 color:black;   
 }
 .instnotstarted{
 background-color:GreenYellow;
 color:black;   
 }
 .needattention{
 background-color:OrangeRed;
 color:black;   
 }
 .pastdue{
 background-color:red;
 color:white;   
 }
 .stillpaying{
 background-color:Yellow;
 color:black;   
 }
 .installmentcomplete{
 background-color:LightGreen;
 color:black;   
 }
 
</style>";

$remainingtotal=0;
$total_fee = 0;
$total_rem = 0;
$total_complete = 0;
$total_timepd = 0;

//$query22 = "SELECT * FROM course c where c.state='T' and course_id = '$batch_c_id' ";
//$query22 = "SELECT * from student s, student_course sc, payment p course_id = '$batch_c_id' ";

//$payment_state $student_batch
// , student_course_batch_info scbi
//s.std_id = scbi.bi_std_id
// scbi.batch_id='$student_batch' and

//,student_course_batch scb
// scb.scb_aid= scbi.batch_id  and       
// scb_course_id  scb_branch_id
//and scb.scb_course_id like '$course22' and scb.scb_branch_id like '$branch22'

$query22 = "SELECT * FROM student s, payment p, course c, student_branch sb,student_course sc, student_course_batch_info scbi, student_course_batch scb where s.std_id = scbi.bi_std_id and scb.scb_aid=scbi.batch_id and s.std_id = sb.std_id and sb.branch_id=scb.scb_branch_id and sc.course_id=p.course_id and s.std_id=p.std_id and s.std_id=sc.std_id and sc.course_id=c.course_id and sc.course_id ='$scb_course_id' and scbi.batch_id='$student_batch' order by s.lname  ";

/*
SELECT * FROM student s, payment p, course c, student_branch sb,student_course sc, student_course_batch_info scbi, student_course_batch scb where s.std_id = scbi.bi_std_id and scb.scb_aid=scbi.batch_id and s.std_id = sb.std_id and sb.branch_id=scb.scb_branch_id and sc.course_id=p.course_id and s.std_id=p.std_id and s.std_id=sc.std_id and sc.course_id=c.course_id and sc.course_id ='2' and scbi.batch_id='2' order by s.lname 

*/


$result22 = $con->query( $query22 );
$num_results22 = $result22->num_rows;

if( $num_results22 > 0)
{ 
      echo "    <div class='clearfix'></div>";
               echo "   </div>";
             echo "     <div class='x_content'>";
            echo "<p class='text-muted font-13 m-b-30'>SUMMARY OF THE BATCH FOR SELECTED TIME PERIOD</p>";
               echo "     <table id='datatable' class='table table-striped table-bordered'>";
                   echo "   <thead>";
					echo "<tr>";


echo "<th>Student Name</th>";
echo "<th>NIC</th>";
echo "<th>Mobile Number</th>";
echo "<th>Total Fee</th>";
echo "<th>Paid Amount Total</th>";
echo "<th>Remaining Balance</th>";
echo "<th>Paid Amount On Selected Time Period</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";		

$totalF = 0;

while( $row2 = $result22->fetch_assoc() ){
extract($row2);
echo "<tr>";


echo "<td>{$fname}  {$lname}</td>";
echo "<td>{$nic}</td>";
echo "<td>{$mobile}</td>";
echo "<td>{$tot_amount}</td>";


$collectallpay=0;

$my_querycp = mysqli_query($con, "SELECT * FROM payment_receipt pr where pr.pr_std_id='$std_id' and pr.pr_course_id='$course_id'  ") or die(mysqli_error($con));

while( $rowcp = $my_querycp->fetch_assoc() ){
extract($rowcp);
$collectallpay = $collectallpay + $payment;
}

echo "<td>{$collectallpay}</td>";

$remainingtotal = $tot_amount - $collectallpay;

$total_rem = $total_rem + $remainingtotal;


if($total_rem<=0)
echo "<td class='fullcomplete'>{$remainingtotal}</td>";

else
echo "<td class='stillpaying'>{$remainingtotal}</td>";

$total_fee = $total_fee + $tot_amount;
$total_complete = $total_complete + $collectallpay;

$paidAm=0;

$my_query = mysqli_query($con, "SELECT * FROM payment_receipt pr where pr.pr_std_id='$std_id' and pr.pr_course_id='$course_id' and pr.pr_date BETWEEN '" . $mydate2 . "' AND  '" . $mydate1 . "' ") or die(mysqli_error($con));

while( $row22 = $my_query->fetch_assoc() ){
extract($row22);
$paidAm = $paidAm + $payment;
}
$total_timepd = $total_timepd + $paidAm;

echo "<td class='installmentcomplete'>{$paidAm}</td>";


echo "</tr>";

}
echo "<tr>";
echo "<td class='instnotstarted'>TOTAL IN LKR</td>";
echo "<td class='instnotstarted'></td>";
echo "<td class='instnotstarted'></td>";
echo "<td class='instnotstarted'>{$total_fee}</td>";
echo "<td class='instnotstarted'>{$total_complete}</td>";
echo "<td class='instnotstarted'>{$total_rem}</td>";
echo "<td class='instnotstarted'>{$total_timepd}</td>";
echo "</tr>";


            echo "</tbody>";
            echo "</table>";
            echo "</div>";
         //   echo "</div>";
      //      echo "</div>";
		//    echo " </div>";

}
else
{ 
 echo "<script>alert('No records find to the selected time period.'); window.location.href = 'index.php?tab=batch_report'; </script>";
}
}

if(isset($_POST["viewallstudents"]))   
{	

echo "<style>
		.lowerthan100{
 background-color:red;
 color:white;   
}
.higherthan100{
 background-color:white;   
 color:red;
}
 .lowert{
 background-color:blue;
 color:white;   
 }
 .fullcomplete{
 background-color:LimeGreen;
 color:black;   
 }
 .instnotstarted{
 background-color:GreenYellow;
 color:black;   
 }
 .needattention{
 background-color:OrangeRed;
 color:black;   
 }
 .pastdue{
 background-color:red;
 color:white;   
 }
 .stillpaying{
 background-color:Yellow;
 color:black;   
 }
 .installmentcomplete{
 background-color:LightGreen;
 color:black;   
 }
 
</style>";

//$payment_state $student_batch
// , student_course_batch_info scbi
//s.std_id = scbi.bi_std_id
// scbi.batch_id='$student_batch' and

//,student_course_batch scb
// scb.scb_aid= scbi.batch_id  and       
// scb_course_id  scb_branch_id
//and scb.scb_course_id like '$course22' and scb.scb_branch_id like '$branch22'

		$query = "SELECT * FROM student s, payment p, course c, student_branch sb, branch b, student_course sc, course_installment ci,payment_receipt pr , student_course_batch_info scbi,student_course_batch scb where s.std_id = sb.std_id and s.std_id = scbi.bi_std_id and sb.branch_id=b.branch_id and s.std_id=p.std_id and s.std_id=sc.std_id and sc.course_id=p.course_id and scb.scb_aid= scbi.batch_id  and  sc.course_id=c.course_id and s.std_id=pr.pr_std_id and sc.course_id=pr.pr_course_id and sc.course_id=ci.course_id and p.pay_date BETWEEN '" . $mydate2 . "' AND  '" . $mydate1 . "' and p.type='FullPay' and scbi.batch_id='$student_batch' and sc.course_id = '$batch_c_id' and scb.scb_branch_id like '$branch22' order by b.name asc   ";


$result = $con->query( $query );

//get number of rows returned

$num_results = $result->num_rows;
$remainingBal=0;
$paidAm = 0;


if( $num_results > 0)
	
{ //it means there's already a database record
echo "    <div class='clearfix'></div>";
              
             echo "     <div class='x_content'>";
            echo "<p class='text-muted font-13 m-b-30'>Report $mydate2 to $mydate1 - Full Payment Plans</p>";
               echo "     <table id='datatable' class='table table-striped table-bordered'>";
                   echo "   <thead>";
                     echo "   <tr>";
                     echo "     <th>Student ID</th>";
                     echo "     <th>Student Name</th>";
                     echo "     <th>NIC</th>";
                      echo "    <th>Course Name</th>";
                      echo "    <th>Discount</th>";
                      echo "    <th>Course Fee excludes Discount</th>";
					echo "	  <th>Registration Date</th>";
					  echo " <th>Branch</th>";
					echo "	  <th>Pay Date</th>";
					echo "	  <th>Paid Amount</th>";
						  echo " <th>Remaining Balance</th>";
						
                        echo "</tr>";
                      echo "</thead>";
					  
					
					 echo "<tbody>";






//loop to show each records

		
while( $row = $result->fetch_assoc() ){
	
$paidAm = 0;



//extract row

extract($row);

//a query to find if the student's payment has finished for the selected course
$mypay = 0;
$find_pay = mysqli_query($con, "SELECT * FROM payment p , payment_receipt pr where p.std_id = pr.pr_std_id and p.course_id = pr.pr_course_id and pr.pr_std_id='$std_id' and pr.pr_course_id='$course_id'") or die(mysqli_error($con));

while( $rowpay = $find_pay->fetch_assoc() ){
extract($rowpay);
$mypay = $mypay + $payment;
}

if(($payment_state == 2) && ($tot_amount > $mypay))
{

//creating new table row per record

echo "<tr>";

echo "<td>{$std_id}</td>";

echo "<td>{$fname}  {$lname}</td>";

echo "<td>{$nic}</td>";

echo "<td>{$c_name}</td>";

echo "<td>{$discount}</td>";

echo "<td>{$course_fee}</td>";

echo "<td>{$regDate}</td>";

echo "<td>{$name}</td>";

echo "<td>{$pay_date}</td>";

//magic

$my_query = mysqli_query($con, "SELECT * FROM payment_receipt where pr_std_id='$std_id' and pr_course_id='$course_id'") or die(mysqli_error($con));


while( $row22 = $my_query->fetch_assoc() ){
extract($row22);
$paidAm = $paidAm + $payment;

}


//}

//
//$paidAm = $payment;
$remainingBal=$tot_amount - ($paidAm);


$month = $course_dur; //changed to adapt to special durations
$days = $month * 30;               //CHANGEEEE  150;//

$daysuntilEnd  = (int)($days);


$dbdate = $sc_date; //$today = date ("Y-m-d");
$duedateFinal = date ("Y-m-d", strtotime ($dbdate ."+$daysuntilEnd days"));

$todayis = date("Y-m-d"); //current date


	if(strtotime($todayis) < strtotime($duedateFinal))
{
	if($paidAm<$tot_amount)
{
	echo "<td class='stillpaying'>{$paidAm}</td>";
	echo "<td class='stillpaying'>{$remainingBal}</td>";
}
else
{
	echo "<td class='fullcomplete'>{$paidAm}</td>";
	echo "<td class='fullcomplete'>{$remainingBal}</td>";
}
}

	else
{
	if($paidAm<$tot_amount)
{
	echo "<td class='needattention'>{$paidAm}</td>";
	echo "<td class='needattention'>{$remainingBal}</td>";
}
else
{
	echo "<td class='fullcomplete'>{$paidAm}</td>";
	echo "<td class='fullcomplete'>{$remainingBal}</td>";
}
}
echo "</tr>";

}


else if(($payment_state == 1) && ($tot_amount <= $mypay))
{

//creating new table row per record

echo "<tr>";

echo "<td>{$std_id}</td>";

echo "<td>{$fname}  {$lname}</td>";

echo "<td>{$nic}</td>";

echo "<td>{$c_name}</td>";

echo "<td>{$discount}</td>";

echo "<td>{$course_fee}</td>";

echo "<td>{$regDate}</td>";

echo "<td>{$name}</td>";

echo "<td>{$pay_date}</td>";

//magic

$my_query = mysqli_query($con, "SELECT * FROM payment_receipt where pr_std_id='$std_id' and pr_course_id='$course_id'") or die(mysqli_error($con));


while( $row22 = $my_query->fetch_assoc() ){
extract($row22);
$paidAm = $paidAm + $payment;

}


//}

//
//$paidAm = $payment;
$remainingBal=$tot_amount - ($paidAm);


$month = $course_dur; //changed to adapt to special durations
$days = $month * 30;               //CHANGEEEE  150;//

$daysuntilEnd  = (int)($days);


$dbdate = $sc_date; //$today = date ("Y-m-d");
$duedateFinal = date ("Y-m-d", strtotime ($dbdate ."+$daysuntilEnd days"));

$todayis = date("Y-m-d"); //current date


	if(strtotime($todayis) < strtotime($duedateFinal))
{
	if($paidAm<$tot_amount)
{
	echo "<td class='stillpaying'>{$paidAm}</td>";
	echo "<td class='stillpaying'>{$remainingBal}</td>";
}
else
{
	echo "<td class='fullcomplete'>{$paidAm}</td>";
	echo "<td class='fullcomplete'>{$remainingBal}</td>";
}
}

	else
{
	if($paidAm<$tot_amount)
{
	echo "<td class='needattention'>{$paidAm}</td>";
	echo "<td class='needattention'>{$remainingBal}</td>";
}
else
{
	echo "<td class='fullcomplete'>{$paidAm}</td>";
	echo "<td class='fullcomplete'>{$remainingBal}</td>";
}
}
echo "</tr>";

}

//getall payments
else if(($payment_state == 3))
{

//creating new table row per record

echo "<tr>";

echo "<td>{$std_id}</td>";

echo "<td>{$fname}  {$lname}</td>";

echo "<td>{$nic}</td>";

echo "<td>{$c_name}</td>";

echo "<td>{$discount}</td>";

echo "<td>{$course_fee}</td>";

echo "<td>{$regDate}</td>";

echo "<td>{$name}</td>";

echo "<td>{$pay_date}</td>";

//magic

$my_query = mysqli_query($con, "SELECT * FROM payment_receipt where pr_std_id='$std_id' and pr_course_id='$course_id'") or die(mysqli_error($con));


while( $row22 = $my_query->fetch_assoc() ){
extract($row22);
$paidAm = $paidAm + $payment;

}


//}

//
//$paidAm = $payment;
$remainingBal=$tot_amount - ($paidAm);


$month = $course_dur; //changed to adapt to special durations
$days = $month * 30;               //CHANGEEEE  150;//

$daysuntilEnd  = (int)($days);


$dbdate = $sc_date; //$today = date ("Y-m-d");
$duedateFinal = date ("Y-m-d", strtotime ($dbdate ."+$daysuntilEnd days"));

$todayis = date("Y-m-d"); //current date


	if(strtotime($todayis) < strtotime($duedateFinal))
{
	if($paidAm<$tot_amount)
{
	echo "<td class='stillpaying'>{$paidAm}</td>";
	echo "<td class='stillpaying'>{$remainingBal}</td>";
}
else
{
	echo "<td class='fullcomplete'>{$paidAm}</td>";
	echo "<td class='fullcomplete'>{$remainingBal}</td>";
}
}

	else
{
	if($paidAm<$tot_amount)
{
	echo "<td class='needattention'>{$paidAm}</td>";
	echo "<td class='needattention'>{$remainingBal}</td>";
}
else
{
	echo "<td class='fullcomplete'>{$paidAm}</td>";
	echo "<td class='fullcomplete'>{$remainingBal}</td>";
}
}
echo "</tr>";

}


}
//end of while

       echo "</tbody>";
            echo "</table>";
            echo "</div>";
       
        

echo "<br/> <br/>";
	
	
}
	
//$payment_state $student_batch
// , student_course_batch_info scbi
//s.std_id = scbi.bi_std_id and 
// scbi.batch_id='$student_batch' and
	
//,student_course_batch scb
// scb.scb_aid= scbi.batch_id and       
// scb_course_id  scb_branch_id
//and scb.scb_course_id like '$course22' and scb.scb_branch_id like '$branch22'

$query99 = "SELECT * FROM student s, payment p, student_branch sb, branch b, payment_installment pi,course c,student_course sc, course_installment ci, student_course_batch_info scbi ,student_course_batch scb where s.std_id = sb.std_id and scb.scb_aid= scbi.batch_id and s.std_id = scbi.bi_std_id and sb.branch_id=b.branch_id and s.std_id=p.std_id and s.std_id=sc.std_id and sc.course_id=c.course_id and sc.course_id=p.course_id and s.std_id=pi.std_id and sc.course_id=pi.course_id and sc.course_id=ci.course_id and pi.l_pay_date BETWEEN '" . $mydate2 . "' AND  '" . $mydate1 . "' and p.type='HalfPay' and scbi.batch_id='$student_batch' and sc.course_id = '$batch_c_id' and scb.scb_branch_id like '$branch22' order by b.name asc , p.course_id  ";


$result99 = $con->query( $query99 );

//get number of rows returned

$num_results99 = $result99->num_rows;
$remainingBal=0;
$totIns1 = 0;
$totIns2 = 0;
$totIns3 = 0;


if( $num_results99 > 0)
	{ //it means there's already a database record
         echo "    <div class='clearfix'></div>";
               echo "   </div>";
             echo "     <div class='x_content'>";
            echo "<p class='text-muted font-13 m-b-30'> Report $mydate2 to $mydate1 - Installment Plans</p>";
               echo "     <table id='datatable' class='table table-striped table-bordered'>";
                   echo "   <thead>";
                     echo "   <tr>";
                     echo "     <th>Student ID</th>";
                     echo "     <th>Student Name</th>";
                     echo "     <th>NIC</th>";
                      echo "    <th>Course Name</th>";
                      echo "    <th>Discount</th>";
                      echo "    <th>Total Amount to be Paid</th>";
					echo "	  <th>Registration Date</th>";
					echo " <th>Branch</th>";
					echo "	  <th>Last Pay Date</th>";
					echo "	  <th>Installment 1</th>";
						echo "  <th>Installment 2</th>";
						echo "  <th>Installment 3</th>";
						  echo " <th>Remaining Balance</th>";
                        echo "</tr>";
                      echo "</thead>";
					  
					
					 echo "<tbody>";



//loop to show each records

		
while( $row99 = $result99->fetch_assoc() ){


//extract row

extract($row99);


//a query to find if the student's payment has finished for the selected course
$mypay = 0;
$find_pay = mysqli_query($con, "SELECT * FROM payment p , payment_receipt pr where p.std_id = pr.pr_std_id and p.course_id = pr.pr_course_id and pr.pr_std_id='$std_id' and pr.pr_course_id='$course_id'") or die(mysqli_error($con));

while( $rowpay = $find_pay->fetch_assoc() ){
extract($rowpay);
$mypay = $mypay + $payment;
}

//if(($payment_state == 2) && ($tot_amount > $mypay))

/*
if(($tot_amount > $mypay)) //$payment_state 1
{
	echo "yay";
}
else
{
	echo "$mypay "; 
}*/
//end
/*
if($payment_state == 2)
{
	if(($tot_amount > $mypay))
}

else if($payment_state == 1)
{
	if(($tot_amount <= $mypay))
}
*/



if(($payment_state == 2) && ($tot_amount > $mypay))
{ //start of function to pay state

//creating new table row per record

echo "<tr>";

echo "<td>{$std_id}</td>";

echo "<td>{$fname}  {$lname}</td>";

echo "<td>{$nic}</td>";

echo "<td>{$c_name}</td>";

echo "<td>{$discount}</td>";

echo "<td>{$tot_amount}</td>";

echo "<td>{$regDate}</td>";

echo "<td>{$name}</td>";

echo "<td>{$l_pay_date}</td>";

//



$remainingBal=$tot_amount - ($installment_1+$installment_2+$installment_3);
$totIns1 = $totIns1 + $installment_1;
$totIns2 = $totIns2 + $installment_2;
$totIns3 = $totIns3 + $installment_3;

$month = $course_dur; //changed to adapt to special durations
$days = $month * 30;               //CHANGEEEE  150;//

$daysPerInstallment = (int)($days/3);;
$daysPerInstallment2 = $daysPerInstallment * 2;
$daysPerInstallment3 = $daysPerInstallment * 3 - 7; //a week before conundrum
//echo $daysPerInstallment3;

$dbdate = $sc_date;//$today = date ("Y-m-d");
$duedateIns1 = date ("Y-m-d", strtotime ($dbdate ."+$daysPerInstallment days"));
$duedateIns2 = date ("Y-m-d", strtotime ($dbdate ."+$daysPerInstallment2 days"));
$duedateIns3 = date ("Y-m-d", strtotime ($dbdate ."+$daysPerInstallment3 days"));
$todayis = date("Y-m-d"); //current date


	if(strtotime($todayis) < strtotime($duedateIns1))
{

	
	if($installment_1<$installment_01) //installement studentpaid< installment set to that course
{
	echo "<td class='stillpaying'>{$installment_1}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_1}</td>";
}

echo "<td class='instnotstarted'>{$installment_2}</td>";
echo "<td class='instnotstarted'>{$installment_3}</td>";

echo "<td class='stillpaying'>{$remainingBal}</td>";

}

if(((strtotime($todayis) > strtotime($duedateIns1)) && strtotime($todayis) <= strtotime($duedateIns2)) && (strtotime($todayis) < strtotime($duedateIns3)))
{
	//in the time period of 2nd installment
	
if($installment_1<$installment_01) //installement studentpaid< installment set to that course
{
	echo "<td class='needattention'>{$installment_1}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_1}</td>";
}

if($installment_2<$installment_02) //installement studentpaid< installment set to that course
{
	echo "<td class='stillpaying'>{$installment_2}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_2}</td>";
}


echo "<td class='instnotstarted'>{$installment_3}</td>";	
	
echo "<td class='stillpaying'>{$remainingBal}</td>";	
}

if(((strtotime($todayis) > strtotime($duedateIns1)) && strtotime($todayis) > strtotime($duedateIns2)) && (strtotime($todayis) <= strtotime($duedateIns3)))
{
	//in the time period of final installment
	
	if($installment_1<$installment_01) //installement studentpaid< installment set to that course
{
	echo "<td class='needattention'>{$installment_1}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_1}</td>";
}

if($installment_2<$installment_02) //installement studentpaid< installment set to that course
{
	echo "<td class='needattention'>{$installment_2}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_2}</td>";
}
	
	
if($installment_3<($tot_amount -($installment_1+$installment_2))) //installement studentpaid< installment set to that course
{
	echo "<td class='stillpaying'>{$installment_3}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_3}</td>";
}

//check balance finally
if($remainingBal<=0)
{
echo "<td class='fullcomplete'>{$remainingBal}</td>";	
}
else
{
echo "<td class='stillpaying'>{$remainingBal}</td>";
}	
}


if((strtotime($todayis) > strtotime($duedateIns3)))
{
	//need attention course over
	if($installment_1<$installment_01) //installement studentpaid< installment set to that course
{
	echo "<td class='needattention'>{$installment_1}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_1}</td>";
}

if($installment_2<$installment_02) //installement studentpaid< installment set to that course
{
	echo "<td class='needattention'>{$installment_2}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_2}</td>";
}
	
	
//if($installment_3<$installment_03) //installement studentpaid< installment set to that course

if($installment_3<($tot_amount -($installment_1+$installment_2)))

{
	echo "<td class='needattention'>{$installment_3}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_3}</td>";
}

//check balance finally
if($remainingBal<=0)
{
echo "<td class='fullcomplete'>{$remainingBal}</td>";	
}
else
{
echo "<td class='pastdue'>{$remainingBal}</td>";
}

}

echo "</tr>";


}

else if(($payment_state == 1) && ($tot_amount <= $mypay))
{ //start of function to pay state

//creating new table row per record

echo "<tr>";

echo "<td>{$std_id}</td>";

echo "<td>{$fname}  {$lname}</td>";

echo "<td>{$nic}</td>";

echo "<td>{$c_name}</td>";

echo "<td>{$discount}</td>";

echo "<td>{$tot_amount}</td>";

echo "<td>{$regDate}</td>";

echo "<td>{$name}</td>";

echo "<td>{$l_pay_date}</td>";

//



$remainingBal=$tot_amount - ($installment_1+$installment_2+$installment_3);
$totIns1 = $totIns1 + $installment_1;
$totIns2 = $totIns2 + $installment_2;
$totIns3 = $totIns3 + $installment_3;

$month = $course_dur; //changed to adapt to special durations
$days = $month * 30;               //CHANGEEEE  150;//

$daysPerInstallment = (int)($days/3);;
$daysPerInstallment2 = $daysPerInstallment * 2;
$daysPerInstallment3 = $daysPerInstallment * 3 - 7; //a week before conundrum
//echo $daysPerInstallment3;

$dbdate = $sc_date;//$today = date ("Y-m-d");
$duedateIns1 = date ("Y-m-d", strtotime ($dbdate ."+$daysPerInstallment days"));
$duedateIns2 = date ("Y-m-d", strtotime ($dbdate ."+$daysPerInstallment2 days"));
$duedateIns3 = date ("Y-m-d", strtotime ($dbdate ."+$daysPerInstallment3 days"));
$todayis = date("Y-m-d"); //current date


	if(strtotime($todayis) < strtotime($duedateIns1))
{

	
	if($installment_1<$installment_01) //installement studentpaid< installment set to that course
{
	echo "<td class='stillpaying'>{$installment_1}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_1}</td>";
}

echo "<td class='instnotstarted'>{$installment_2}</td>";
echo "<td class='instnotstarted'>{$installment_3}</td>";

echo "<td class='stillpaying'>{$remainingBal}</td>";

}

if(((strtotime($todayis) > strtotime($duedateIns1)) && strtotime($todayis) <= strtotime($duedateIns2)) && (strtotime($todayis) < strtotime($duedateIns3)))
{
	//in the time period of 2nd installment
	
if($installment_1<$installment_01) //installement studentpaid< installment set to that course
{
	echo "<td class='needattention'>{$installment_1}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_1}</td>";
}

if($installment_2<$installment_02) //installement studentpaid< installment set to that course
{
	echo "<td class='stillpaying'>{$installment_2}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_2}</td>";
}


echo "<td class='instnotstarted'>{$installment_3}</td>";	
	
echo "<td class='stillpaying'>{$remainingBal}</td>";	
}

if(((strtotime($todayis) > strtotime($duedateIns1)) && strtotime($todayis) > strtotime($duedateIns2)) && (strtotime($todayis) <= strtotime($duedateIns3)))
{
	//in the time period of final installment
	
	if($installment_1<$installment_01) //installement studentpaid< installment set to that course
{
	echo "<td class='needattention'>{$installment_1}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_1}</td>";
}

if($installment_2<$installment_02) //installement studentpaid< installment set to that course
{
	echo "<td class='needattention'>{$installment_2}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_2}</td>";
}
	
	
if($installment_3<($tot_amount -($installment_1+$installment_2))) //installement studentpaid< installment set to that course
{
	echo "<td class='stillpaying'>{$installment_3}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_3}</td>";
}

//check balance finally
if($remainingBal<=0)
{
echo "<td class='fullcomplete'>{$remainingBal}</td>";	
}
else
{
echo "<td class='stillpaying'>{$remainingBal}</td>";
}	
}


if((strtotime($todayis) > strtotime($duedateIns3)))
{
	//need attention course over
	if($installment_1<$installment_01) //installement studentpaid< installment set to that course
{
	echo "<td class='needattention'>{$installment_1}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_1}</td>";
}

if($installment_2<$installment_02) //installement studentpaid< installment set to that course
{
	echo "<td class='needattention'>{$installment_2}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_2}</td>";
}
	
	
//if($installment_3<$installment_03) //installement studentpaid< installment set to that course

if($installment_3<($tot_amount -($installment_1+$installment_2)))

{
	echo "<td class='needattention'>{$installment_3}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_3}</td>";
}

//check balance finally
if($remainingBal<=0)
{
echo "<td class='fullcomplete'>{$remainingBal}</td>";	
}
else
{
echo "<td class='pastdue'>{$remainingBal}</td>";
}

}

echo "</tr>";


}

else if(($payment_state == 3))
{ //start of function to pay state

//creating new table row per record

echo "<tr>";

echo "<td>{$std_id}</td>";

echo "<td>{$fname}  {$lname}</td>";

echo "<td>{$nic}</td>";

echo "<td>{$c_name}</td>";

echo "<td>{$discount}</td>";

echo "<td>{$tot_amount}</td>";

echo "<td>{$regDate}</td>";

echo "<td>{$name}</td>";

echo "<td>{$l_pay_date}</td>";

//



$remainingBal=$tot_amount - ($installment_1+$installment_2+$installment_3);
$totIns1 = $totIns1 + $installment_1;
$totIns2 = $totIns2 + $installment_2;
$totIns3 = $totIns3 + $installment_3;

$month = $course_dur; //changed to adapt to special durations
$days = $month * 30;               //CHANGEEEE  150;//

$daysPerInstallment = (int)($days/3);;
$daysPerInstallment2 = $daysPerInstallment * 2;
$daysPerInstallment3 = $daysPerInstallment * 3 - 7; //a week before conundrum
//echo $daysPerInstallment3;

$dbdate = $sc_date;//$today = date ("Y-m-d");
$duedateIns1 = date ("Y-m-d", strtotime ($dbdate ."+$daysPerInstallment days"));
$duedateIns2 = date ("Y-m-d", strtotime ($dbdate ."+$daysPerInstallment2 days"));
$duedateIns3 = date ("Y-m-d", strtotime ($dbdate ."+$daysPerInstallment3 days"));
$todayis = date("Y-m-d"); //current date


	if(strtotime($todayis) < strtotime($duedateIns1))
{

	
	if($installment_1<$installment_01) //installement studentpaid< installment set to that course
{
	echo "<td class='stillpaying'>{$installment_1}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_1}</td>";
}

echo "<td class='instnotstarted'>{$installment_2}</td>";
echo "<td class='instnotstarted'>{$installment_3}</td>";

echo "<td class='stillpaying'>{$remainingBal}</td>";

}

if(((strtotime($todayis) > strtotime($duedateIns1)) && strtotime($todayis) <= strtotime($duedateIns2)) && (strtotime($todayis) < strtotime($duedateIns3)))
{
	//in the time period of 2nd installment
	
if($installment_1<$installment_01) //installement studentpaid< installment set to that course
{
	echo "<td class='needattention'>{$installment_1}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_1}</td>";
}

if($installment_2<$installment_02) //installement studentpaid< installment set to that course
{
	echo "<td class='stillpaying'>{$installment_2}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_2}</td>";
}


echo "<td class='instnotstarted'>{$installment_3}</td>";	
	
echo "<td class='stillpaying'>{$remainingBal}</td>";	
}

if(((strtotime($todayis) > strtotime($duedateIns1)) && strtotime($todayis) > strtotime($duedateIns2)) && (strtotime($todayis) <= strtotime($duedateIns3)))
{
	//in the time period of final installment
	
	if($installment_1<$installment_01) //installement studentpaid< installment set to that course
{
	echo "<td class='needattention'>{$installment_1}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_1}</td>";
}

if($installment_2<$installment_02) //installement studentpaid< installment set to that course
{
	echo "<td class='needattention'>{$installment_2}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_2}</td>";
}
	
	
if($installment_3<($tot_amount -($installment_1+$installment_2))) //installement studentpaid< installment set to that course
{
	echo "<td class='stillpaying'>{$installment_3}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_3}</td>";
}

//check balance finally
if($remainingBal<=0)
{
echo "<td class='fullcomplete'>{$remainingBal}</td>";	
}
else
{
echo "<td class='stillpaying'>{$remainingBal}</td>";
}	
}


if((strtotime($todayis) > strtotime($duedateIns3)))
{
	//need attention course over
	if($installment_1<$installment_01) //installement studentpaid< installment set to that course
{
	echo "<td class='needattention'>{$installment_1}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_1}</td>";
}

if($installment_2<$installment_02) //installement studentpaid< installment set to that course
{
	echo "<td class='needattention'>{$installment_2}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_2}</td>";
}
	
	
//if($installment_3<$installment_03) //installement studentpaid< installment set to that course

if($installment_3<($tot_amount -($installment_1+$installment_2)))
{
	echo "<td class='needattention'>{$installment_3}</td>";
}
else
{
	echo "<td class='installmentcomplete'>{$installment_3}</td>";
}

//check balance finally
if($remainingBal<=0)
{
echo "<td class='fullcomplete'>{$remainingBal}</td>";	
}
else
{
echo "<td class='pastdue'>{$remainingBal}</td>";
}

}

echo "</tr>";


}



}
//end of while

       echo "</tbody>";
            echo "</table>";
            echo "</div>";
        //    echo "</div>";
       //     echo "</div>";
		//    echo " </div>";


}

//special student

//$payment_state $student_batch
// , student_course_batch_info scbi
//s.std_id = scbi.bi_std_id and 
// scbi.batch_id='$student_batch' and

//,student_course_batch scb
// scb.scb_aid= scbi.batch_id and       
// scb_course_id  scb_branch_id
//and scb.scb_course_id like '$course22' and scb.scb_branch_id like '$branch22'

$query20 = "SELECT * FROM student s, payment p, course c, student_branch sb, branch b, student_course sc, student_course_batch_info scbi,student_course_batch scb where s.std_id = sb.std_id and scb.scb_aid= scbi.batch_id and sb.branch_id=b.branch_id and s.std_id = scbi.bi_std_id and sc.course_id=p.course_id and s.std_id=p.std_id and p.type='SPC' and s.std_id=sc.std_id and sc.course_id=c.course_id and scbi.batch_id='$student_batch' and p.pay_date BETWEEN '" . $mydate2 . "' AND  '" . $mydate1 . "' and sc.course_id = '$batch_c_id' and scb.scb_branch_id like '$branch22' order by b.name asc ";

$result20 = $con->query( $query20 );

//get number of rows returned

$num_results20 = $result20->num_rows;
$remainingBal=0;
$paidAm = 0;


if( $num_results20 > 0)
	{ //it means there's already a database record
echo "    <div class='clearfix'></div>";
	echo "</div>";
             echo "     <div class='x_content'>";
            echo "<p class='text-muted font-13 m-b-30'> CADD CENTER - REPORT FOR THE SELECTED TIME PERIOD $mydate2 to $mydate1 SPECIAL PLANS</p>";
               echo "     <table id='datatable' class='table table-striped table-bordered'>";
                   echo "   <thead>";
                     echo "   <tr>";
                     echo "     <th>Student ID</th>";
                     echo "     <th>Student Name</th>";
                     echo "     <th>NIC</th>";
                      echo "    <th>Course Name</th>";
                      echo "    <th>Discount</th>";
                      echo "    <th>Course Fee NEW</th>";
					echo "	  <th>Registration Date</th>";
					echo " <th>Branch</th>";
					echo "	  <th>Pay Date</th>";
					echo "	  <th>Paid Amount</th>";
						  echo " <th>Remaining Balance</th>";
                        echo "</tr>";
                      echo "</thead>";
					  
					
					 echo "<tbody>";


		
while( $row = $result20->fetch_assoc() ){


//extract row

extract($row);


//special student get only uncompleted payments
//a query to find if the student's payment has finished for the selected course
$mypay = 0;
$find_pay = mysqli_query($con, "SELECT * FROM payment p , payment_receipt pr where p.std_id = pr.pr_std_id and p.course_id = pr.pr_course_id and pr.pr_std_id='$std_id' and pr.pr_course_id='$course_id'") or die(mysqli_error($con));

while( $rowpay = $find_pay->fetch_assoc() ){
extract($rowpay);
$mypay = $mypay + $payment;
}

if(($payment_state == 2) && ($tot_amount > $mypay))
{

//creating new table row per record

echo "<tr>";

echo "<td>{$std_id}</td>";

echo "<td>{$fname}  {$lname}</td>";

echo "<td>{$nic}</td>";

echo "<td>{$c_name}</td>";

echo "<td>{$discount}</td>";

echo "<td>{$tot_amount}</td>";

echo "<td>{$regDate}</td>";

echo "<td>{$name}</td>";

echo "<td>{$pay_date}</td>";

//magic

	


//loop to show each records
$paidAm = 0;
$my_query = mysqli_query($con, "SELECT * FROM payment_receipt where pr_std_id='$std_id' and pr_course_id='$course_id'") or die(mysqli_error($con));
while( $row22 = $my_query->fetch_assoc() ){
extract($row22);
$paidAm = $paidAm + $payment;
}
$newam = $tot_amount - $paidAm;
echo "<td>{$paidAm}</td>";
if($newam==0)
echo "<td class='fullcomplete'>{$newam}</td>";
else
echo "<td class='stillpaying'>{$newam}</td>";



echo "</tr>";
}

else if(($payment_state == 1) && ($tot_amount <= $mypay))
{
//creating new table row per record

echo "<tr>";

echo "<td>{$std_id}</td>";

echo "<td>{$fname}  {$lname}</td>";

echo "<td>{$nic}</td>";

echo "<td>{$c_name}</td>";

echo "<td>{$discount}</td>";

echo "<td>{$tot_amount}</td>";

echo "<td>{$regDate}</td>";

echo "<td>{$name}</td>";

echo "<td>{$pay_date}</td>";

//magic

	


//loop to show each records
$paidAm = 0;
$my_query = mysqli_query($con, "SELECT * FROM payment_receipt where pr_std_id='$std_id' and pr_course_id='$course_id'") or die(mysqli_error($con));
while( $row22 = $my_query->fetch_assoc() ){
extract($row22);
$paidAm = $paidAm + $payment;
}
$newam = $tot_amount - $paidAm;
echo "<td>{$paidAm}</td>";
if($newam==0)
echo "<td class='fullcomplete'>{$newam}</td>";
else
echo "<td class='stillpaying'>{$newam}</td>";



echo "</tr>";
}

if(($payment_state == 3))
{

//creating new table row per record

echo "<tr>";

echo "<td>{$std_id}</td>";

echo "<td>{$fname}  {$lname}</td>";

echo "<td>{$nic}</td>";

echo "<td>{$c_name}</td>";

echo "<td>{$discount}</td>";

echo "<td>{$tot_amount}</td>";

echo "<td>{$regDate}</td>";

echo "<td>{$name}</td>";

echo "<td>{$pay_date}</td>";

//magic

	


//loop to show each records
$paidAm = 0;
$my_query = mysqli_query($con, "SELECT * FROM payment_receipt where pr_std_id='$std_id' and pr_course_id='$course_id'") or die(mysqli_error($con));
while( $row22 = $my_query->fetch_assoc() ){
extract($row22);
$paidAm = $paidAm + $payment;
}
$newam = $tot_amount - $paidAm;
echo "<td>{$paidAm}</td>";
if($newam==0)
echo "<td class='fullcomplete'>{$newam}</td>";
else
echo "<td class='stillpaying'>{$newam}</td>";



echo "</tr>";
}


}
//end of while

       echo "</tbody>";
            echo "</table>";
            echo "</div>";
	}
//del spc 

if((( $num_results > 0) || ( $num_results99 > 0)))
{
	
echo "<br/> <br/>";
//color information

             echo "<div class='clearfix'></div>";
            
             echo "<div class='x_content'>";
           //  echo "<p class='text-muted font-13 m-b-30'> Color Information</p>";
             echo "<table id='datatable' class='table table-striped table-bordered'>";
echo "<thead>";
echo "<tr>";
echo "<th>COLOR INFORMATION</th>";
echo "</tr>";

echo "</thead>";
echo "<tbody>";


echo "<tr>";
echo "<td class='instnotstarted'>Installment not Started</td>";
echo "</tr>";

echo "<tr>";
echo "<td class='stillpaying'>Still Paying</td>";
echo "</tr>";

echo "<tr>";
echo "<td class='installmentcomplete'>Installment Complete</td>";
echo "</tr>";

echo "<tr>";
echo "<td class='fullcomplete'>Full Complete</td>";
echo "</tr>";

echo "<tr>";
echo "<td class='needattention'>Need Attention</td>";
echo "</tr>";

echo "<tr>";
echo "<td class='pastdue'>Payment Past Due</td>";
echo "</tr>";



echo "</tbody>";
echo "</table>";
echo "</div>";

//echo "</div>";
}


if(!(( $num_results > 0) || ( $num_results99 > 0) || ( $num_results20 > 0) ))
//else
{
	echo "<script>alert('No records found to the selected time period!'); window.location.href = 'index.php?tab=batch_report'; </script>";
}
						
}



?>
						
						
	
        <!-- /page content -->

  
  </body>
</html>