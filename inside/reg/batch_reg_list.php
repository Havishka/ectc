<?php 
	include("../connection.php");	
	
	$batchidcaptured = $_GET['scb_aid'];
	
	//echo  $batchidcaptured;
	
?>
<?php
if(isset($_POST['add'])){


						$nic = $_POST['nicpost'];
						$todayis = date("Y-m-d");
						//get the current course id to check against new students
						$sel_queryx="select * from student_course_batch where scb_aid='$batchidcaptured'";
						$resulrrx = mysqli_query($con,$sel_queryx);
						if($rowx = mysqli_fetch_assoc($resulrrx)) {
							$scb_branch_idx=$rowx["scb_branch_id"];
							$scb_course_idx=$rowx["scb_course_id"];
							$batch_start_date=$rowx["batch_start_date"];
						}
						
						//SELECT * from student s, student_course sc, student_branch sb where s.std_id=sc.std_id and s.std_id=sb.std_id and s.nic='$nic'
						
						$sel_queryz="select * from student s, student_course sc where s.std_id=sc.std_id and sc.course_id = '$scb_course_idx' and s.nic='$nic' ";
						$resultz = mysqli_query($con,$sel_queryz);
						
						if($rowz = mysqli_fetch_assoc($resultz)){
							$std_id=$rowz["std_id"];
							
						//fix to prevent same student from being added to the batch
						$sel_query_a="select * from student_course_batch_info where batch_id = '$batchidcaptured' and bi_std_id = '$std_id'";
						$result_a = mysqli_query($con,$sel_query_a);
							
							if($result_a->num_rows > 0)
							{
								echo "<script>alert('Student is already in this batch!');</script>";
							}
							
							else
							{
							//echo "student is reg for this course all okay";
							
						//update sc_date so the course reg date will be referred as batch start date
						$queryupdate="update student_course set sc_date='$batch_start_date' where std_id='$std_id' and course_id='$scb_course_idx' ";
						$resultupdate = mysqli_query($con, $queryupdate);
							
							
								
								$query1="insert into student_course_batch_info(batch_id, bi_std_id, bi_added_date) values ('$batchidcaptured', '$std_id','$todayis')";
								$result = mysqli_query($con, $query1);

								if(!($result ))
									{
										echo("Error : " . mysqli_error($con));
									}
							}

						}
						else
						{
							//echo "student not yet reg to this course";
							echo "<script>alert('Selected Student is Not Registered to the Course of this Batch! Register student and try again!');</script>";
						}
						
						
						
						/*
						echo "got1 $scb_course_idx";
						echo "got2 $scb_branch_idx";
						
						
						echo "got nic is $nic";
						echo "batchidcaptured is $batchidcaptured";*/
		

}

if(isset($_POST['remove_student'])){
	$student_id = $_POST['student_id'];
//	echo "yay $student_id";

$query = "DELETE FROM student_course_batch_info WHERE bi_std_id=$student_id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
	
}
?>
<!DOCTYPE html>
<html>
<head>
<!-- quick search things-->
<style>
.frmSearch {border: 1px solid #eaedeb;background-color: #fdfefe  ;margin: 2px 0px;padding:40px;border-radius:12px;}
#country-list{float: left;list-style:none;margin-top:5px; margin-left:0%;padding:0;width:190px;position: absolute; border-radius:12px;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #eaedeb 1px solid;border-radius:12px;}
</style>



<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "reg/batch_quick_search.php",
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

<script type="text/javascript">
function remove_batch_member(mag) 
{ 
   if (confirm("Do you really want Remove? "+mag)) {
	   //window.location.href='reg/test.php?remove_student='+mag;
	    window.location=anchor.attr("href");
    }
	else{
    return;
    }
}
</script>




</head>

<body>

<br />

<form method="post" action="index.php?tab=batch_reg">
<button type="submit" class="btn btn-warning" name="allsub" id="allsub" >Finish</button></form>
<?php
$sel_query="select * from student_course_batch where scb_aid='$batchidcaptured'";

$resulrr = mysqli_query($con,$sel_query);
if($row = mysqli_fetch_assoc($resulrr)) {
	
	
	$batchid=$row["scb_aid"];
	$scb_branch_id=$row["scb_branch_id"];
	$scb_course_id=$row["scb_course_id"];
	$batch_start_date=$row["batch_start_date"];
	$batch_end_date=$row["batch_end_date"];
	$batch_remarks=$row["batch_remarks"];
	$batch_state=$row["batch_state"];
	$scb_created_date=$row["scb_created_date"];
	$scb_other=$row["scb_other"];
	
	
}

//capture relevant branch and course names from their id's
//get current course name
$queryc2 = "select c_name from course where course_id = '$scb_course_id' ";
$resultc2 = $con->query($queryc2);
$rowc2 = $resultc2->fetch_assoc();
$selectedcoursename = $rowc2['c_name'];

//get current branch name
$queryc3 = "select name from branch where branch_id = '$scb_branch_id' ";
$resultc3 = $con->query($queryc3);
$rowc3 = $resultc3->fetch_assoc();
$selectedbranchname = $rowc3['name'];

	
?>
<div class="frmSearch" >
<form method="post" action="">
<input type="text" id="search-box" placeholder="Enter Student NIC" size="18" name="nicpost" autocomplete="off"/> 
<input type="submit" name="add" id="add" value="Insert Student" class="btn btn-success" style="border-radius:12px; padding:10px;" />

</form>

<div id="suggesstion-box" align="center"></div>
</div>


<br />
<hr />
<div class="form">
<p>&nbsp;</p>
<h2>Batch Information ID(<?php echo $batchidcaptured;?>)</h2><br />
<table class="table table-hover">
    <thead>
      <tr>

		<th>Batch ID</th>
		<th>Branch</th>
		<th>Course</th>
		<th>Start Date</th>
		<th>End Date</th>
		<th>Remarks</th>
		<th>Current State</th>
		<th>Created Date</th>
		<th>Other</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <td bgcolor="#F0F0F0"><?php echo $batchid;?></td>
        <td bgcolor="#F0F0F0"><?php echo $selectedbranchname;?></td>
        <td bgcolor="#F0F0F0"><?php echo $selectedcoursename;?></td>
        <td bgcolor="#F0F0F0"><?php echo $batch_start_date;?></td>
        <td bgcolor="#F0F0F0"><?php echo $batch_end_date;?></td>
		<td bgcolor="#F0F0F0"><?php echo $batch_remarks;?></td>
        <td bgcolor="#F0F0F0"><?php echo $batch_state;?></td>
        <td bgcolor="#F0F0F0"><?php echo $scb_created_date;?></td>
		<td bgcolor="#F0F0F0"><?php echo $scb_other;?></td>
      </tr>
    </tbody>
  </table>



<br />

<table width="100%" border="1" style="border-collapse: collapse; font-size: 14px; color: #000;" class="table">
<thead>
<tr>
  <th width="4%" bgcolor="#FFFFFF"><strong>No</strong></th>
  <th width="14%" bgcolor="#FFFFFF"><strong>Name</strong></th>
  <th width="14%" bgcolor="#FFFFFF"><strong>NIC</strong></th>
  <th width="20%" bgcolor="#FFFFFF"><strong>Course Starting Date</strong></th>
  <th width="18%" bgcolor="#FFFFFF"><strong>Added Date</strong></th>
  <th width="4%">&nbsp;</th>
  
</tr>
</thead>
<tbody>



<?php
	
$count=1;

/*
$sel_query="SELECT * from student s, student_course sc, student_branch sb where s.std_id=sc.std_id and s.std_id=sb.std_id and sc.course_id='$scb_course_id' and sb.branch_id='$scb_branch_id'";*/

$sel_query="SELECT * from student s, student_course sc, student_branch sb, student_course_batch_info scbi where s.std_id=sc.std_id and s.std_id=sb.std_id and s.std_id=scbi.bi_std_id and scbi.batch_id='$batchidcaptured' and sc.course_id='$scb_course_id' order by sbi_aid asc";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td align="center" style="text-align: left"><?php echo $count; ?></td>
<td align="center" bgcolor="#FFFF99" style="text-align: left"><?php echo $row["fname"]; echo" "; echo $row["lname"];?></td>
<td align="center" bgcolor="#FFFF99" style="text-align: left"><?php echo $row["nic"]; ?></td>
<td align="center" bgcolor="#FFFF99" style="text-align: left"><?php echo $row["sc_date"]; ?></td>
<td align="center" style="text-align: left"><?php echo $row["bi_added_date"]; ?></td>

<!--

<td width='100px'>
<a href='javascript:remove_batch_member(<?php echo $row["std_id"]; ?>)'>

<button type='button' class='btn btn-danger'>Remove Studentzzz</button>
</a>

</td>


-->

<td align="center">
<form method="post" action="">
	<input type='hidden' name='student_id' value='<?php echo $row["std_id"]; ?>'/>
<input type="submit" name="remove_student" id="remove_student" value="Remove Student" class="btn btn-danger" style="border-radius:12px; padding:10px;" onClick="javascript:return confirm('Are you sure you want to remove this student?');"  />
</td>
</form>

</tr>
<?php $count++; } ?>
</tbody>

<?php 

$totals = $count-1;
echo "Total Students : $totals"; ?>
</table>

<br /><br /><br />
</div>

</body>
</html>