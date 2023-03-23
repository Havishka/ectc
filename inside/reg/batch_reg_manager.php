<?php
include("../connection.php");
?>
<?php
$query4 = "select max(scb_aid) as sys from student_course_batch";

$result = mysqli_query($con, $query4);

if ($result->num_rows > 0) {

	while ($rows = mysqli_fetch_array($result)) {
		$scb_aid = $rows['sys'] + 1;
	}
} else {
	$scb_aid = 1;
}

?>
<?php
if (isset($_POST['create_batch'])) {


	$scb_aid = $_POST['scb_aid'];
	$course_id = $_POST['course_id'];

	if ($_POST['branch_id'] == null) {
		$branch_id = $_POST['branch_id'];
	} else {
		$branch_id = $_POST['branch_id'];
	}

	//ref  grpid -- > session change sbi_id 



	$startdate = $_POST['startdate'];
	$enddate = $_POST['enddate'];
	$si_state = $_POST['si_state'];
	$remarks = $_POST['remarks'];
	$todayis = date("Y-m-d");

	$query1 = "insert into student_course_batch ( scb_aid, scb_branch_id , scb_course_id , batch_start_date ,batch_end_date, batch_remarks, batch_state, scb_created_date) values ('$scb_aid', '$branch_id', '$course_id' ,'$startdate','$enddate','$remarks','$si_state','$todayis')";

	$result = mysqli_query($con, $query1);


	if (!($result)) {
		echo ("Database Error : " . mysqli_error($con));
	} else {
		unset($_SESSION['scb_aid']);
		unset($_SESSION['course_id']);
		unset($_SESSION['branch_id']);

		$_SESSION['scb_aid'] = $_POST['scb_aid'];
		$_SESSION['course_id'] = $_POST['course_id'];
		$_SESSION['branch_id'] = $_POST['branch_id'];

		echo "<script>alert('Batch creation was successful!'); window.location.href = 'index.php?tab=batch_reg'; </script>";
	}
} else {
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="vendors/nprogress/nprogress.css" rel="stylesheet">
	<!-- bootstrap-daterangepicker -->
	<link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	<!-- bootstrap-datetimepicker -->
	<link href="vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">


	<!-- Custom Theme Style -->
	<link href="build/css/custom.min.css" rel="stylesheet">
	<style>
		​#myInput {
			background-image: url('/css/searchicon.png');
			background-position: 10px 10px;
			background-repeat: no-repeat;
			width: 100%;
			font-size: 16px;
			padding: 12px 20px 12px 40px;
			border: 1px solid #ddd;
			margin-bottom: 12px;
		}

		.field {
			padding: 10px;
			border: #eaedeb 1px solid;
			border-radius: 12px;
			width: 300px;
			font-size: 14px;
		}
	</style>
	<script type="text/javascript">
		function delete_allgroup(mag) {
			if (confirm("Do you really want delete?")) {

				window.location.href = 'reg/delete_group_full.php?gid=' + mag;


			} else {
				return;
			}
		}
	</script>

</head>

<h3 align="center">Create New Batch</h3>
<div>
	<br />
	<form class="form-horizontal form-label-left input_mask" action="index.php?tab=batch_reg" method="post" align="center">
		<table align="center">
			<tr>

				<td>
					<label class="control-label"></label>
				</td>


				<td> <input type="text" name="scb_aid" class="field" value="<?php echo $scb_aid; ?>" readonly="readonly" required hidden>
				</td>
			</tr>
			<tr style="height: 15px;"></tr>
			<tr>

				<td> <label class="" style="float: left;">Batch Code</label></td>

				<td> <input type="text" class="field" placeholder="Enter Batch Code" name="remarks" required></td>

			</tr>
			<tr style="height: 15px;"></tr>
			<tr>

				<td> <label class="" style="float: left;">Course</label></td>


				<td> <?php


						//query
						$sql = mysqli_query($con, "SELECT c_name,course_id FROM course where state='T' ");
						if (mysqli_num_rows($sql)) {
							$select = '<select id="branch" class="field" name="course_id" required><option selected disabled>Please select..</option>';

							while ($rs = mysqli_fetch_array($sql)) {
								$select .= '<option value="' . $rs['course_id'] . '">' . $rs['c_name'] . '</option>';
							}
						}
						$select .= '</select>';
						echo $select;
						?>
				</td>

			</tr>
			<tr style="height: 15px;"></tr>
			<tr>


				<td> <label class="" style="float: left;">Branch</label></td>



				<td> <?php



						if ($le == 3) {
							$sql = mysqli_query($con, "SELECT branch_id , name FROM branch where branch_id='$bid'");
						} else {
							$sql = mysqli_query($con, "SELECT branch_id,name FROM branch");
						}




						if (mysqli_num_rows($sql)) {
							$select = '<select id="branch" class="field" name="branch_id"  class="field" required><option selected disabled>Please select..</option>';

							while ($rs = mysqli_fetch_array($sql)) {
								$select .= '<option value="' . $rs['branch_id'] . '">' . $rs['name'] . '</option>';
							}
						}
						$select .= '</select>';
						echo $select;
						?>
				</td>
			</tr>
			<tr style="height: 15px;"></tr>
			<tr>
				<td> <label class="" style="float: left;">Start Date</label></td>


				<td> <input type='date' class="field" required name="startdate" placeholder="Start Date" value="<?php echo date("Y-m-d"); ?>" /></td>


			</tr>
			<tr style="height: 15px;"></tr>
			<tr>

				<td> <label class="" style="float: left;">End Date</label></td>


				<td> <input type='date' class="field" name="enddate" placeholder="End Date" required /></td>

			</tr>
			<tr style="height: 15px;"></tr>
			<tr>

				<td> <label class="" style="float: left;">Batch State</label></td>

				<td> <select id="si_state" class="field" name="si_state" required>
						<option selected value="Ongoing">Ongoing</option>
						<option value="Finished">Finished</option>
						<option value="Hold">Hold</option>
					</select>

				</td>

			</tr>

		</table>
		<br>
		<br>



		<button type="submit" class="btn btn-primary" name="create_batch">Create Batch</button>
</div>
</div>
</form>



</div>

<br>
<p>&nbsp;</p>

<h3>Manage Batches</h3><br>
<?php

//note: change to find all but state finished to limit results if it gets crowded
// if ($le == 3) {
// 	$sql = "select * from student_course_batch where scb_branch_id ='$bid' order by scb_aid desc ";
// } else {
	$sql = "select * from student_course_batch where batch_end_date >= curdate() order by scb_aid desc";
// }

$result = $con->query($sql);

//( scb_aid, scb_branch_id , scb_course_id , batch_start_date ,batch_end_date, batch_remarks, batch_state, scb_created_date)


if ($result->num_rows > 0) {
	echo "<input type='text' id='myInput' onkeyup='myFunction()' placeholder='Search by batch code...' title='Type in a name'>";
	echo "<br>";
	echo "<br>";
	echo "<table class='table table-bordered' id='myTable'><tr><th>Batch Code</th><th>Branch</th><th>Course ID</th><th>Start Date</th><th>End Date</th>
	<th>State</th></tr>";
	// output data of each row

	while ($row = $result->fetch_assoc()) {

		//capture relevant branch and course names from their id's
		//get current course name
		$queryc2 = "select c_name from course where course_id = '" . $row["scb_course_id"] . "' ";
		$resultc2 = $con->query($queryc2);
		$rowc2 = $resultc2->fetch_assoc();
		$selectedcoursename = $rowc2['c_name'];

		//get current branch name
		$queryc3 = "select name from branch where branch_id = '" . $row["scb_branch_id"] . "' ";
		$resultc3 = $con->query($queryc3);
		$rowc3 = $resultc3->fetch_assoc();
		$selectedbranchname = $rowc3['name'];


		echo "<tr>
		<td>" . $row["batch_remarks"] . "</td>
		<td>" . $selectedbranchname . "</td>
		
		<td>" . $selectedcoursename . "</td>
		<td>" . $row["batch_start_date"] . "</td><td>" . $row["batch_end_date"] . "</td>
		<td>" . $row["batch_state"] . "</td>
		<td width='100px'>
		
		<form action='index.php?tab=batch_edit&&batch_idc=" . $row["scb_aid"] . "' method='post'>
		
		<input type='hidden' value='" . $row["scb_aid"] . "' name='batch_id'>
		
		<input type='hidden' value='" . $row["scb_course_id"] . "' name='course_idy'>
		
		<input type='hidden' value='" . $row["scb_branch_id"] . "' name='branch_idy'>
		
		<button type='submit' class='btn btn-primary' name='editbatch'>  &nbsp;&nbsp;Edit&nbsp;&nbsp;  </button>
		
		</form>
		
		</td>	
		
		


		

		
		</tr>";
	}
	echo "</table>";
} else {
	echo "No Batches Found!";
}

$con->close();

/*
		<td width='100px'><a href='javascript:delete_allbatch(".$row["scb_aid"].")'>
		<button type='button' class='btn btn-danger'>Delete Batch</button></a></td>*/
?>
<!-- bootstrap-daterangepicker -->
<script src="vendors/moment/min/moment.min.js"></script>
<script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->
<script src="vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

<script>
	$('#myDatepicker').datetimepicker({
		format: 'YYYY-MM-DD'

	});

	$('#myDatepicker2').datetimepicker({
		format: 'YYYY-MM-DD'
	});
</script>
<script>
	function myFunction() {
		var input, filter, table, tr, td, i, txtValue;
		input = document.getElementById("myInput");
		filter = input.value.toUpperCase();
		table = document.getElementById("myTable");
		tr = table.getElementsByTagName("tr");
		for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[0];
			if (td) {
				txtValue = td.textContent || td.innerText;
				if (txtValue.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				} else {
					tr[i].style.display = "none";
				}
			}
		}
	}
</script>
</body>

</html>