<?php

include("../connection.php");

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
   
		 
		  
			<div class="clearfix"></div>
			
			   <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                   <h2>Refund Payment </h2>
				   <h5>Refund is only available to course fee.</h5>
					<!--<h5>If the selected student is in a batch or a group for this course, remove student from them first.</h5>-->
                  <div class="x_content">
				  <div class="row" style="margin-bottom:20px;">
					<div class="col-md-12">
						<fieldset class="scheduler-border" >
					<div class="frmSearch">
					<form class="form-inline" method="post" action="#">
					
					<div class="form-group">
					<label for="email">NIC or Name</label></div><br>
	

<input type="text" id="search-box" name="search-box" required placeholder="Enter NIC or Name" size="60" name="nicpost" autocomplete="off" /> 


<div id="suggesstion-box" align="center"></div>
<br>

				
					   <button type="submit" class="btn btn-primary" name="submit" > Find Student </button>
					   <button type="reset" class="btn btn-primary" name="clear" > Clear </button>
					
			
                    </form>
					
					</fieldset></div>	


			
<?php


if(isset($_REQUEST['submit']))
{

   $stud= $inputmy=$_POST['search-box'];
   
//get receipt history

$query21 = "SELECT * FROM student s, payment p, course c, student_branch sb, branch b, student_course sc where s.std_id = sb.std_id and sb.branch_id=b.branch_id and sc.course_id=p.course_id and s.std_id=p.std_id and s.std_id=sc.std_id and sc.course_id=c.course_id and (s.std_id LIKE '%$stud%' or s.nic LIKE '%$stud%' or s.fname LIKE '%$stud%' or s.lname LIKE '%$stud%') order by p.pay_id desc"; // limit 3 


//$query21 = "SELECT * FROM payment_receipt pr where pr.pr_std_id='$std_id' and pr.pr_course_id='$course_id' ";

$result20 = $con->query( $query21 );

//get number of rows returned

$num_results20 = $result20->num_rows;
$remainingBal=0;
$paidAm = 0;


if( $num_results20 > 0)
	{ //it means there's already a database record
echo "    <div class='clearfix'></div>";
	        echo "</div>";
            echo "     <div class='x_content'>";
            echo "<p class='text-muted font-13 m-b-30'> SELECTED STUDENT -  PAYMENT HISTORY</p>";
                    echo "     <table id='datatable' class='table table-striped table-bordered'>";
                    echo "   <thead>";
                    echo "   <tr>";
                    echo "     <th>Student Name</th>";
                    echo "     <th>NIC</th>";
						  echo "    <th>Registration Fee</th>";
                    echo "    <th>Course Name</th>";
					  echo "    <th>Course Registration Date</th>";
                    echo "    <th>Total Course Fee</th>";
							echo "	  <th>Discount</th>";
					echo "    <th>Payment Type</th>";
                    echo "    <th>Payment Date</th>";
			
						echo "	  <th>Refundable Amount</th>";
                    echo "</tr>";
                    echo "</thead>";
					echo "<tbody>";

		
while( $row = $result20->fetch_assoc() ){

//extract row

extract($row);

//creating new table row per record

echo "<tr>";
echo "<td>{$fname}  {$lname}</td>";
echo "<td>{$nic}</td>";
echo "<td>{$regFee}</td>";
echo "<td>{$c_name}</td>";
echo "<td>{$sc_date}</td>";
//loop to show each records
//$totalx= $tot_amount;

//$newam = 0;
$paidAm = 0;
$my_query = mysqli_query($con, "SELECT * FROM payment_receipt pr where pr.pr_std_id='$std_id' and pr.pr_course_id='$course_id'") or die(mysqli_error($con));
while( $row22 = $my_query->fetch_assoc() ){
extract($row22);
$paidAm = $paidAm + $payment;
}

//$newam = $tot_amount - $paidAm;
echo "<td>{$tot_amount}</td>";
echo "<td>{$discount}</td>";
echo "<td>{$type}</td>";
echo "<td>{$pay_date}</td>";

echo "<td>{$paidAm}</td>";

echo "<td>";



	if(false)
	{
		//echo "Student Payment is already finished.";
	}
	else
	{
//echo "<a href='index.php?tab=changedisc&&nic=$nic&&course_id=$course_id&&std_id=$std_id'><i class='fa fa-star-half-full'></i>Change Discount<span class='text-muted'></span><br></a>";

echo "<a href='index.php?tab=payment_refund_in&&course_id=$course_id&&std_id=$std_id'><i class='fa fa-star-half-full'></i>Refund Payment<span class='text-muted'></span><br></a>";
	}

echo "</td>";




echo "</tr>";

}
//end of while

       echo "</tbody>";
            echo "</table>";
            echo "</div>";
	}
	else
	{
		echo "<script>alert('Unrecognized NIC or Name'); window.location.href = 'index.php?tab=payment_refund'; </script>";
	}

//get receipt history end


//del me


}
?>
					
                    
                    
                  </div>
                </div>
           </div> 
		   </div>

  </body>
</html>
