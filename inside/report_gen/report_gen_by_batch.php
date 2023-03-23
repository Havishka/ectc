<!DOCTYPE html>
<html lang="en">
  <head>

  <script src="report_gen/js/jquery-1.12.4.js"></script>
  <script src="report_gen/js/jquery-ui.js"></script>

  	<link rel="stylesheet" href="report_gen/css/datepicker.css">
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
                
                $('#item24').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });
			
			$(document).ready(function () {
                
                $('#item85').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });
			
			$(document).ready(function () {
                
                $('#item86').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });
			
					$(document).ready(function () {
                
                $('#item35').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });
			
			$(document).ready(function () {
                
                $('#item36').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });

			
	</script>

	<script src="report_gen/js/bootstrap-datepicker.js"></script>
	
	<!-- script to find batches related to selected course and branch -->
<script>
function getCustomBatches()
{
	var getSelectedBranchID = document.getElementById('item83').value;
	var getSelectedCourseID = document.getElementById('item88').value;
	
   // document.getElementById('student_batch').value = "$select4.='<option>magics</option>';";
	
	alert("Branch Selected : "+getSelectedBranchID+" Course Selected : "+getSelectedCourseID);

	//getCustomBatchesMenu(getSelectedBranchID, getSelectedCourseID);
}
</script>
  
  <!--
<script type="text/javascript" src="report_gen/jquery.min.js"></script>
-->

<script type="text/javascript">

$(document).ready(function() {
	$("#branch").change(function() {
		var scb_branch_id = $(this).val();
		if(scb_branch_id != "") {
			$.ajax({
				url:"report_gen/report_gen_view_sel_time_period_batch_getbatch.php",
				data:{c_id:scb_branch_id},
				type:'POST',
				success:function(response) {
					var resp = $.trim(response);
					$("#batches_fd").html(resp);
				}
			});
		} else {
			$("#batches_fd").html("<option value=''>-Select The Batch-</option>");
		}
	});
});

</script>


  </head>
<body class="nav-md">

            <div class="clearfix"></div>

                       
 <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i>Registered this month</span>
              <div class="count"> 
<?php 

$themonth = date("Y-m");
$themonth1="$themonth-01" ;
$themonth2="$themonth-31" ;

					if(($le==2)||($le==3))
					{
						$query3="select count(s.std_id) as sys from student s, student_branch sb where s.std_id = sb.std_id and s.regDate BETWEEN '" . $themonth1 . "' AND  '" . $themonth2 . "' and sb.branch_id= '$bid' ";
						//echo "magics";
					}
					else
						{
						   $query3="select count(std_id) as sys from student where regDate BETWEEN '" . $themonth1 . "' AND  '" . $themonth2 . "'";
						   //echo "magicxxxs";
					    }


$result = mysqli_query($con, $query3);
while($rows=mysqli_fetch_array($result))
{
$mag=$rows['sys'];
}
echo "$mag";

//echo "$themonth1";
?>
</div>
              <span class="count_bottom"><i class="green">
			  <?php 
$todayis = date("Y-m-d");
$lastweek = date ("Y-m-d", strtotime ($todayis ."-7 days"));





						if(($le==2)||($le==3))
					{
					
						 $query3="select count(s.std_id) as sys from student s, student_branch sb where s.std_id = sb.std_id and s.regDate>='$lastweek' ";
						
					}
					else
						{
						   $query3="select count(std_id) as sys from student where regDate>='$lastweek' ";
					    }



$result = mysqli_query($con, $query3);
while($rows=mysqli_fetch_array($result))
{
$mag=$rows['sys'];
}
echo "$mag";
?>

</i> From last Week</span>
</div>
			
			   <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Courses</span>
              <div class="count">
			  <?php 
$query3="select count(course_id) as sys from course where state='T'";
$result = mysqli_query($con, $query3);
while($rows=mysqli_fetch_array($result))
{
$mag=$rows['sys'];
}
echo "$mag";
?>
			  
			  </div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> 
			  			  <?php 
$query3="select count(course_id) as sys from course where state='F'";
$result = mysqli_query($con, $query3);
while($rows=mysqli_fetch_array($result))
{
$mag=$rows['sys'];
}
echo "$mag";
?>
			  
			  </i>Updated courses </span>
            </div>
			
			
			
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Payments Received Today</span>
              <div class="count">
				  <?php 
$todayis = date("Y-m-d");
$lastweek = date ("Y-m-d", strtotime ($todayis ."-7 days"));






		if(($le==2)||($le==3))
					{
						 $query3="select count(p.pr_id) as sys from payment_receipt p, student_branch sb  where p.pr_std_id = sb.std_id and p.pr_date='$todayis' ";
					}
					else
						{
						   $query3="select count(pr_id) as sys from payment_receipt where pr_date='$todayis' ";
					    }


$result = mysqli_query($con, $query3);
while($rows=mysqli_fetch_array($result))
{
$mag=$rows['sys'];
}
echo "$mag";
?>		  
			  
			  
			  </div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"> </i>
			  <?php 
$todayis = date("Y-m-d");
$lastweek = date ("Y-m-d", strtotime ($todayis ."-7 days"));




	if(($le==2)||($le==3))
					{
						 $query3="select count(p.pr_id) as sys from payment_receipt p, student_branch sb  where p.pr_std_id = sb.std_id and p.pr_date>='$lastweek' ";	 
					}
					else
						{
						  $query3="select count(pr_id) as sys from payment_receipt where pr_date>='$lastweek' ";
					    }

$result = mysqli_query($con, $query3);
while($rows=mysqli_fetch_array($result))
{
$mag=$rows['sys'];
}
echo "$mag";
?>
			  </i>
From last week
			  </span>
            </div>
			
			
			
			
			</div>
					

 <nav class="navbar navbar-default">
 <h3>View Report By Batch</h3>
 
<ul class="nav nav-pills">
 		

	  <form class="form-horizontal form-label-left input_mask" method="post" action="index.php?tab=report_gen_view_batch" id="myForm89" name="myForm4">
        <div class="form-group">
		</div>
	


<?php 
/*
//select menu_section branch
$sql22="SELECT branch_id, name from branch";
$sql = mysqli_query($con, $sql22);
if(mysqli_num_rows($sql)){
$select= '<select name="item83" id="item83" class="select2_single form-control" tabindex="-1" form="myForm89" onChange="getCustomBatches();">';
$select.='<option value="%">Search All Branches</option>';
while($rs=mysqli_fetch_array($sql)){
      $select.='<option value="'.$rs['branch_id'].'">'.$rs['name'].'</option>';
  }
}
$select.='</select>';
echo $select;	
*/	
?>

<?php 
/*
//select menu_section course
//$sql22="SELECT course_id, c_name from course where state='T'";
//only show courses that have batches
$sql22="SELECT c.course_id, c.c_name from course c where c.state='T' and c.course_id in (select distinct(scb_course_id) from student_course_batch) ";
$sql = mysqli_query($con, $sql22);		
if(mysqli_num_rows($sql)){
$select= '<select name="item88" id="item88" class="select2_single form-control" tabindex="-1" form="myForm89" onChange="getCustomBatches();">';
$select.='<option value="%">Search All Courses</option>';
while($rs=mysqli_fetch_array($sql)){
      $select.='<option value="'.$rs['course_id'].'">'.$rs['c_name'].'</option>';
  }
}
$select.='</select>';
echo $select;	

*/	
?>
		
<?php 
/*
//select menu_section student_course_batch
$sql23="SELECT scb_aid, batch_start_date,scb_course_id from student_course_batch";
//$sql23="SELECT scb_aid, batch_start_date,scb_course_id from student_course_batch where scb_branch_id like '201' and scb_course_id='2'";
$sql3 = mysqli_query($con, $sql23);
if(mysqli_num_rows($sql3)){
$select4= '<select name="student_batch" id="student_batch" class="select2_single form-control" tabindex="-1" form="myForm89">';
$select4.='<option disabled>Select Batch</option>';
while($rs23=mysqli_fetch_array($sql3)){
		$datexx = $rs23['batch_start_date'];
		$bathcidx = $rs23['scb_aid'];
		$scb_course_id = $rs23['scb_course_id'];
		//
		$sel_queryz="select c_name from course where course_id='$scb_course_id' ";
		$resultz = mysqli_query($con,$sel_queryz);
		if($rowz = mysqli_fetch_assoc($resultz)){
			$c_name=$rowz["c_name"];
		}
		//
		$gotmonth = date('F, Y',strtotime($datexx));
		$uniqueBatchName = "$bathcidx, $c_name : $gotmonth Intake";
        $select4.='<option value="'.$rs23['scb_aid'].'">'.$uniqueBatchName.'</option>';
  }
}
$select4.='</select>';
echo $select4;		

*/
?>



	<div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Branch :</label>
		 <div class="col-md-9 col-sm-9 col-xs-12">
		<select name="branch" id="branch" class="select2_single form-control" required="required">
			<option value=''>Select the Branch</option>
			<?php 
			
			if(($le==2))
			{
			$sql = "SELECT branch_id, name from branch where branch_id='$bid'";
			}
			else
			{
		    $sql = "SELECT branch_id, name from branch";
			}

			$res = mysqli_query($con, $sql);
			if(mysqli_num_rows($res) > 0) {
				while($row = mysqli_fetch_object($res)) {
					echo "<option value='".$row->branch_id."'>".$row->name."</option>";
				}
			}
			?>
		</select>
		    </div>
					  </div>
		
		<div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Batches Registered Under This Branch :</label>
		 <div class="col-md-9 col-sm-9 col-xs-12">
		<select name="batches_fd" id="batches_fd" class="select2_single form-control" tabindex="-1" required="required"><option>Select the Batch</option></select>
	
    </div>
					  </div>


					<div class="form-group">
                 	<label class="control-label col-md-3 col-sm-3 col-xs-12">Payment State :</label>
					  <div class="col-md-9 col-sm-9 col-xs-12">
                          <select id="payment_state" class="form-control" name="payment_state">
                                <option disabled  value="deflt">Payment State</option>
                           								<option selected value="3">All Payments</option>
                                                        <option value="2">Incompleted Payments</option>
														<option value="1">Completed Payments</option>
                          </select>
                        </div>
					  </div>



	<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Required Payment Time Period From:</label>
	  <div class="col-md-9 col-sm-9 col-xs-12">
         <input type="text" class="form-control" name="item85" id="item85" placeholder="Choose From... Leave Empty to find all information of the batch" form="myForm89"  \>

		  </div>
        </div>
		
			<div class="form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12">Required Payment Time Period To:</label>
	  <div class="col-md-9 col-sm-9 col-xs-12">
		 <input type="text" class="form-control" name="item86" id="item86" placeholder="Choose To..." form="myForm89"  value="<?php echo date("Y-m-d"); ?>"  \>
		 
		  </div>
        </div>

		 
		 <br>
		 
	    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">

						   <input type="submit" name="viewallstudents" class="btn btn-success" value="View Batch Students" form="myForm89" data-toggle="tooltip" title="View the batch details for the selected time period by categorizing either all payment states, completed payments or incomplete payments."/>
						   <input type="submit" name="batchsummary" class="btn btn-primary" value="View Batch Summary" form="myForm89" data-toggle="tooltip" title="Get The Summary of the Batch Selected (Course Fee, Payments So far and Payments Received for the selected time period. This includes all the payment states."/>	   
  </div>
        </div>
		<br>
		
      </form>
	  
</ul>
</nav>



 <br/> <br/>
 
 
 

    <!-- jQuery
    <script src="../vendors/jquery/dist/jquery.min.js"></script> -->

  </body>
</html>
