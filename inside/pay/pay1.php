<?php

//include("../connection.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
<!-- quick search things-->
<style>
.frmSearch {border: 1px solid #eaedeb;background-color: #fdfefe  ;margin: 2px 0px;padding:40px;border-radius:12px;}
#country-list{float: left;list-style:none;margin-top:5px; margin-left:0%;padding:0;width:190px;position: absolute; border-radius:12px;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #eaedeb 1px solid;border-radius:12px;}
</style>

<script src="pay/js/jquery-2.1.4.js" type="text/javascript"></script>
<!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script> -->
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "pay/quick_search_pay.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
   
  </head>

  <body class="nav-md">
   
        <!-- page content -->
      
		  
		   <div class="page-title">
              <div class="title_left">
                <h3></h3>
              </div>

              <div class="title_right">
			  <form class="form-inline" method="post" action="index.php?tab=searchStd" >
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" name="nic" placeholder="Student Pre Details"  required >
					
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit" name="submit">Go!</button>
                    </span>
                  </div>
                </div>
				</form>
              </div>
			    
            </div>
		  
		  
            <div class="clearfix"></div>

			
			
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                   <h2>Search and add Payment </h2>
                  <div class="x_content">
				  <div class="row" style="margin-bottom:20px;">
					<div class="col-md-12">
						<fieldset class="scheduler-border" >
					<div class="frmSearch">
					<form class="form-inline" method="post">
					
					<div class="form-group">
					<label for="email">NIC</label></div><br>
			
					<!--<input type="text" class="form-control" name="nic" placeholder="Type NIC" required>-->

<input type="text" id="search-box" name="search-box" required placeholder="Search By NIC..." size="60" name="nicpost" autocomplete="off" /> 


<div id="suggesstion-box" align="center"></div>
<br>

					<div class="form-group">
						<label> Course Name</label></div><br>
							<select  class="form-control" id="course_id22" name="course_id22" required >
								<option value="%" >Select Course / Search all</option>
                                    <?php
									$sql="select * from course where state='T'";
									$result=mysqli_query($con,$sql);
									
									while($row=mysqli_fetch_array($result))
									{
									echo "<option value='" .$row['course_id']. "'>" . $row['c_name'] . "</option>";
									}
									?>
							</select>
					
			<br><br>
					   <button type="submit" class="btn btn-primary" name="submit" > Find </button>
					   <button type="reset" class="btn btn-primary" name="clear" > Clear </button>
					
			
                    </form>
					
					</fieldset></div>	
					
					<!--
					<div class="frmSearch">

<form method="post" action="index.php?tab=report_gen_view_selected_student" id="myForm8" name="myForm4">
<input type="text" id="search-box" name="search-box" required placeholder="Search By NIC or Name..." form="myForm8" size="60" name="nicpost" autocomplete="off" /> 
		<input type="submit" name="viewbyany" class="btn btn-success" value="Search " form="myForm8"/>
		<button class="btn btn-primary" type="reset">Reset</button>
</form>

<div id="suggesstion-box" align="center"></div>
</div>	
-->

</div>
</div>
				  <?php


if(isset($_REQUEST['submit'])){
	
   // $nic=$_POST['nic'];
   $nic=$_POST['search-box'];
    $course_id=$_POST['course_id22'];
	
    //$sql=" SELECT * FROM users WHERE fname like '%".$name."%' OR user_email ='%".$email."%'";
	
	//SELECT * FROM student s, payment p, student_course sc WHERE s.std_id=p.std_id and s.std_id=sc.std_id and s.nic="941234567V" and sc.course_id="1"
	
	
	//$sql="SELECT s.fname, s.nic, s.regDate, sc.course_id  FROM student s, payment p, student_course sc WHERE s.std_id=p.std_id and s.std_id=sc.std_id and s.nic like '%".$nic."%' and sc.course_id like '%".$course_id."%'";
    
	if(($le==3))
	{
	$sql = "SELECT s.std_id, s.fname,s.lname, s.nic, s.regDate, sc.course_id,c.c_name FROM student s,  student_course sc, course c,student_branch sb WHERE s.std_id=sc.std_id and s.std_id=sb.std_id and c.course_id=sc.course_id and sb.branch_id='$bid' and s.nic like '%".$nic."%' and sc.course_id like '%".$course_id."%'";
	} //only the related branch payments can be authorized using this manner
	else
	{
		$sql = "SELECT s.std_id, s.fname,s.lname, s.nic, s.regDate, sc.course_id,c.c_name FROM student s,  student_course sc, course c WHERE s.std_id=sc.std_id and c.course_id=sc.course_id and s.nic like '%".$nic."%' and sc.course_id like '%".$course_id."%'";
	}
	
	
	
	$q=mysqli_query($con,$sql);
	
	
echo "<table class='table table-striped table-bordered' >";//start table

//creating our table heading

echo "<tr>";

echo "<th>Name</th>";

echo "<th>NIC</th>";

echo "<th>Registration Date</th>";

echo "<th>Course Name</th>";

echo "<th>Remaining Payment</th>";

echo "</tr>";


while ($row=$q -> fetch_assoc())
{
extract($row);
	
echo "<tr>";

echo "<td>{$fname} {$lname}</td>";
echo "<td>{$nic}</td>";

echo "<td>{$regDate}</td>";
echo "<td>{$c_name}</td>";

///////////////////


	$mypaymenty = 0;
	$query99 = "SELECT * from payment p,payment_receipt pr where p.std_id=pr.pr_std_id and p.course_id= pr.pr_course_id and pr.pr_std_id='$std_id' and pr.pr_course_id='$course_id' "; //mnxx
	$result99 = $con->query( $query99 );
	$num_results99 = $result99->num_rows;
if( $num_results99 > 0)
{
$remainPayment=0;
while( $row99 = $result99->fetch_assoc() ){
extract($row99);
$mypaymenty = $mypaymenty+$payment;
$tot_amounty = $tot_amount;
}

	
$remainPayment = $tot_amounty - $mypaymenty;

//echo $mypayment;
	if($tot_amounty <= $mypaymenty)
	{
		//echo "0";
		echo "<td>Complete</td>";
	}
	else
	{
		//echo "$remainPayment";
		echo "<td>{$remainPayment}</td>";
	}
}
else
{
	echo "<td>Processing...</td>";
}




/////////////////////

echo "<td>";

//just preparing the edit link to edit the record

//only show full payment and initial payment once

   $sql23 = "SELECT * FROM student s, payment p WHERE s.std_id=p.std_id and s.nic like '%".$nic."%' and p.course_id ='$course_id' ";
   $result23 = $con->query( $sql23 );
   $num_results23 = $result23->num_rows;

	if($num_results23 == 0)
	{
echo "<a href='index.php?tab=fullpay&&nic=$nic&&course_id=$course_id'><i class='fa fa-star'></i> Add to Full Payment<span></span> <br></a>";
echo "<a href='index.php?tab=installment_first&&nic=$nic&&course_id=$course_id'><i class='fa fa-star-half-full'></i> Add to Initial Installment<span class='text-muted'></span><br></a>";
echo "<a href='index.php?tab=specialpayment&&nic=$nic&&course_id=$course_id'><i class='fa fa-user'></i> Add as Special Payment<span class='text-muted'></span><br> </a>";
	}

else
{
	//find if payment already completed
	$std_idx = $std_id;
	$mypayment = 0;
	$query99 = "SELECT * from payment p,payment_receipt pr where p.std_id=pr.pr_std_id and p.course_id= pr.pr_course_id and pr.pr_std_id='$std_idx' and pr.pr_course_id='$course_id' "; //mnxx
	$result99 = $con->query( $query99 );
	$num_results99 = $result99->num_rows;
if( $num_results99 > 0)
{
$remainPayment=0;
while( $row99 = $result99->fetch_assoc() ){
extract($row99);
$mypayment = $mypayment+$payment;
$tot_amountx = $tot_amount;
}
}
	
$remainPayment = $tot_amountx - $mypayment;

//echo $mypayment;
	if($tot_amountx <= $mypayment)
	{
		echo "Payment already completed";
		//echo $tot_amountx;
	}
	/*else
	{
		echo "Remaining Balance : $remainPayment";
	}*/
	//
}
//else
{
   $sql24 = "SELECT * FROM student s, payment p WHERE s.std_id=p.std_id and  p.type='SPC' and s.nic like '%".$nic."%' and p.course_id ='$course_id'";
   $result24 = $con->query( $sql24 );
   $num_results24 = $result24->num_rows;
   
   $sql27 = "SELECT * FROM student s, payment p WHERE s.std_id=p.std_id and  p.type='FullPay' and s.nic like '%".$nic."%' and p.course_id ='$course_id'";
   $result27 = $con->query( $sql27 );
   $num_results27 = $result27->num_rows;
   
   $sql29 = "SELECT * FROM student s, payment p WHERE s.std_id=p.std_id and  p.approvalState ='F' and s.nic like '%".$nic."%' and p.course_id ='$course_id'";
   $result29 = $con->query( $sql29 );
   $num_results29 = $result29->num_rows;
	if(($num_results29 > 0))
	{
		echo "Your Discount Approval is Still Pending";
	}
	else
	{

	if(($num_results24 == 0) && ($num_results23 != 0) && ($num_results27 == 0) && ($remainPayment > 0))
	{
echo "<a href='index.php?tab=installment_payment&&nic=$nic&&course_id=$course_id'><i class='fa fa-star-half-full'></i> Pay a Installment<span class='text-muted'></span><br></a>";
	}
	else if(($num_results24 > 0) && ($tot_amountx > $mypayment))
	{
		echo "<a href='index.php?tab=specialpayinstallment&&nic=$nic&&course_id=$course_id'><i class='fa fa-star-half-full'></i> Pay a Special Installment<span class='text-muted'></span><br></a>";
	}
	

	}
	
	
	//check if discount modified
	  $sql15 = "SELECT * FROM student s, payment p WHERE s.std_id=p.std_id and  p.approvalState ='TC' and s.nic like '%".$nic."%' and p.course_id ='$course_id'";
   $result15 = $con->query( $sql15 );
   $num_results15 = $result15->num_rows;
	if(($num_results15 > 0))
	{
		echo "Your Discount has been altered.";
	}
	
	//fullpaychangeddisc
	//full payment discount alter fix
  $sql14 = "SELECT * FROM student s, payment p WHERE s.std_id=p.std_id and  p.approvalState ='TC' and p.type='FullPay' and s.nic like '%".$nic."%' and p.course_id ='$course_id'";
   $result14 = $con->query( $sql14 );
   $num_results14 = $result14->num_rows;
	if(($num_results14 > 0))
	{
		echo "<a href='index.php?tab=fullpaychangeddisc&&nic=$nic&&course_id=$course_id'><i class='fa fa-star-half-full'></i> Pay remaining balance on your full payment<span class='text-muted'></span><br></a>";
	}
	

}	

echo "</td>";


echo "</tr>";

}
echo "</table>";
}
?>
					
                    
                    
                 
                </div>
           </div> 
		   </div>

  </body>
</html>
