<script>
	function myFunction() {

		var x = document.getElementById("mySelect").value;

	}
</script>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<?php

session_start();
if (isset($_SESSION['name'])) {
	include 'includes/sidbar_l.php';
	include 'includes/nav.php';
	include 'connection.php';
	if (isset($_POST['submit'])) {
		$err;
		$nicpost = $_POST['search-box'];
		$course_id = $_POST['course_id'];
		$stime = $_POST['stime'];
		$etime = $_POST['etime'];

		$coverage = $_POST['coverage'];
		$rdate = $_POST['rdate'];
		$name = $_SESSION['name'];

		$check = mysqli_query($con, "select * from t_time where username='$name' and rdate='$rdate' and co_name='$course_id' and ('$stime' BETWEEN s_time and e_time or '$etime' BETWEEN s_time and e_time)");
		if (mysqli_num_rows($check) == 0) {

			if ($stime < $etime) {

				$check1 = mysqli_query($con, "select * from student_course_batch where '$rdate' NOT BETWEEN batch_start_date and batch_end_date and batch_remarks='$course_id'");

				if (mysqli_num_rows($check1) == 0) {




					$query = mysqli_query($con, "insert into t_time (le_name,username,course,co_name,s_time,e_time,to_time,approval,f_approval,g_approval,coverage,rdate,as_id) value('$nicpost','$name',(select c.c_name from course c, student_course_batch b where b.batch_remarks='$course_id' and b.scb_course_id=c.course_id),'$course_id','$stime','$etime',TIME_TO_SEC(TIMEDIFF(\"$etime\", \"$stime\")),'Not Approved','Not Approved','Not Approved','$coverage','$rdate',(select id from c_assign where username=\"$name\" and c_name=\"$course_id\"))");
					$query3 = mysqli_query($con, "update c_assign set hr=hr-TIME_TO_SEC(TIMEDIFF(\"$etime\", \"$stime\")) where c_name='$course_id' and username='$name'");

					if ($query) {
?>
						<div class="alert alert-info" style="width: 25%;margin-left:50%; margin-top:2%">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Successfully added!</strong>
						</div>
					<?php

						// echo "<script>alert('Successfully added!');</script>";
						// echo "<script>sucess</script>";
					} else {
					?>
						<div class="alert alert-danger" style="width: 25%;margin-left:50%; margin-top:2%">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							<strong>Something Went Wrong. Please try again!</strong>
						</div>
					<?php
						//echo "<script>alert('Something Went Wrong. Please try again.');</script>";
					}
				} else {
					?>
					<div class="alert alert-danger" style="width: 25%;margin-left:50%; margin-top:2%">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Invalid date!</strong>
					</div>
				<?php
					//echo "<script>alert('Invalid date!');</script>";
				}
			} else {
				?>
				<div class="alert alert-danger" style="width: 25%;margin-left:50%; margin-top:2%">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Invalid time range!</strong>
				</div>
			<?php
				//echo "<script>alert('Invalid time range!');</script>";
			}
			// }
		} else {
			?>
			<div class="alert alert-danger" style="width: 25%;margin-left:50%; margin-top:2%">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Time slot already occupied!</strong>
			</div>
<?php
			//echo "<script>alert('A lecture has been already scheduled to selected time slot!');</script>";
		}
	}
} else {
	header("Location: login.php");
	exit();
}
$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		.frmSearch {
			border: 1px solid #eaedeb;
			background-color: #fdfefe;
			margin: 2px 0px;
			padding: 40px;
			border-radius: 12px;
		}

		#country-list {
			float: left;
			list-style: none;
			margin-top: 5px;
			margin-left: 0%;
			padding: 0;
			width: 250px;
			position: absolute;
			border-radius: 12px;
		}

		#country-list li {
			padding: 10px;
			background: #f0f0f0;
			border-bottom: #bbb9b9 1px solid;
		}

		#country-list li:hover {
			background: #ece3d2;
			cursor: pointer;
		}

		#search-box {
			padding: 10px;
			border: #eaedeb 1px solid;
			border-radius: 12px;
			width: 250px;
		}

		.field {
			padding: 10px;
			border: #eaedeb 1px solid;
			border-radius: 12px;
			width: 250px;
		}

		#field1 {
			padding: 10px;
			border: #eaedeb 1px solid;
			border-radius: 12px;
			width: 250px;
		}

		#field2 {
			padding: 10px;
			border: #eaedeb 1px solid;
			border-radius: 12px;
			width: 250px;
		}

		#field3 {
			padding: 10px;
			border: #eaedeb 1px solid;
			border-radius: 12px;
			width: 250px;
		}

		#brand {
			padding: 10px;
			border: #eaedeb 1px solid;
			border-radius: 12px;
			width: 250px;
		}

		#field1 {
			padding: 10px;
			border: #eaedeb 1px solid;
			border-radius: 12px;
			width: 500px;
		}

		#tlecture {
			padding: 10px;
			border: #eaedeb 1px solid;
			border-radius: 12px;
		}

		#search-box_2 {
			padding: 10px;
			border: #eaedeb 1px solid;
			border-radius: 12px;
			width: 250px;
		}

		#status {
			padding: 10px;
			border: #eaedeb 1px solid;
			border-radius: 12px;
		}
	</style>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<style>
		body {
			font-family: 'Varela Round', sans-serif;
		}

		.modal-confirm {
			color: #636363;
			width: 325px;
			font-size: 14px;
		}

		.modal-confirm .modal-content {
			padding: 20px;
			border-radius: 5px;
			border: none;
		}

		.modal-confirm .modal-header {
			border-bottom: none;
			position: relative;
		}

		.modal-confirm h4 {
			text-align: center;
			font-size: 26px;
			margin: 30px 0 -15px;
		}

		.modal-confirm .form-control,
		.modal-confirm .btn {
			min-height: 40px;
			border-radius: 3px;
		}

		.modal-confirm .close {
			position: absolute;
			top: -5px;
			right: -5px;
		}

		.modal-confirm .modal-footer {
			border: none;
			text-align: center;
			border-radius: 5px;
			font-size: 13px;
		}

		.modal-confirm .icon-box {
			color: #fff;
			position: absolute;
			margin: 0 auto;
			left: 0;
			right: 0;
			top: -70px;
			width: 95px;
			height: 95px;
			border-radius: 50%;
			z-index: 9;
			background: #82ce34;
			padding: 15px;
			text-align: center;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
		}

		.modal-confirm .icon-box i {
			font-size: 58px;
			position: relative;
			top: 3px;
		}

		.modal-confirm.modal-dialog {
			margin-top: 80px;
		}

		.modal-confirm .btn {
			color: #fff;
			border-radius: 4px;
			background: #82ce34;
			text-decoration: none;
			transition: all 0.4s;
			line-height: normal;
			border: none;
		}

		.modal-confirm .btn:hover,
		.modal-confirm .btn:focus {
			background: #6fb32b;
			outline: none;
		}

		.trigger-btn {
			display: inline-block;
			margin: 100px auto;
		}
	</style>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ECTC | PDP</title>
	<link rel="icon" type="image/jpg" href="../../images/logo.jpg">

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- summernote -->
	<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<!-- <script src="../pay/js/jquery-2.1.4.js" type="text/javascript"></script> -->
	<!-- Page level plugin JavaScript-->
	<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script>
		$(document).ready(function() {
			$("#search-box_2").keyup(function() {
				$.ajax({
					type: "POST",
					url: "search/le_check.php",
					data: 'keyword=' + $(this).val(),
					beforeSend: function() {
						$("#search-box_2").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
					},
					success: function(data) {
						$("#suggesstion-box_2").show();
						$("#suggesstion-box_2").html(data);
						$("#search-box_2").css("background", "#FFF");
					}
				});
			});
		});

		function selectCountry_2(val) {
			$("#search-box_2").val(val);
			$("#suggesstion-box_2").hide();
		}
	</script>
	<script>
		function date() {
			p = "1/1/1970 ";
			var starth = document.getElementById("stime").value;
			var endh = document.getElementById("etime").value;
			var difference = new Date(new Date(p + endh) - new Date(p + starth)).toUTCString().split(" ")[4];
			document.getElementById("tlecture").value = difference;
		}
	</script>
	<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#dataTable').DataTable();
		});
	</script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
				</div>
				<!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item">
							<a href="index_l.php">Home</a>
						</li>
						<li class="breadcrumb-item active">Add Lecture Coverage </li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<h3 align="center" style="padding-left: 20%;">Add Lecture Coverage</h3>
	<div class="wrapper" style="padding-left: 20%;">
		<!-- <div class="row" style="padding-left: 30%;"> -->
		<br>

		<div>
			<?php

			$connect = mysqli_connect("localhost", "root", "ectc", "ectc_lec");
			function fill_brand($connect)
			{
				$name = $_SESSION['name'];
				$output = '';
				$sql = "SELECT c_name from c_assign where status='T' and username='$name' and hr>0";
				$result = mysqli_query($connect, $sql);
				while ($row = mysqli_fetch_array($result)) {
					$output .= '<option value="' . $row["c_name"] . '">' . $row["c_name"] . '</option>';
				}
				return $output;
			}
			function fill_product($connect)
			{
				$name = $_SESSION['name'];
				$output = '';
				if (isset($_POST["c_name"])) {
					if ($_POST["c_name"] != '') {
						$sql = "SELECT * FROM c_assign WHERE username='$name' and hr>0 and c_name = '" . $_POST["c_name"] . "'";
					}
					$result = mysqli_query($connect, $sql);
					while ($row = mysqli_fetch_array($result)) {
						$output .= '<div class="col-md-12">';
						$output .= '<div style="border:1px solid #ccc; padding:1px;" align="center">' . $row["hr"] . '';
						$output .=     '</div>';
						$output .=     '</div>';
					}
					return $output;
				}
			}
			?>
			<div class="container" align="center">
				<h6>
					<!-- <select name="brand" id="brand">
						<option value="" disabled selected>-- View Remaining Hours --</option>
						<?php echo fill_brand($connect); ?>
					</select>
					<div class="col" id="show_product" align="center">
						<?php echo fill_product($connect); ?>
					</div> -->
				</h6>
			</div>

			<form method="post">
				<table id="table1" ; cellspacing="5px" cellpadding="5%" ; align="center">
					<tr>
						<td align="right">Lecturer Name :</td>
						<td>
							<?php
							$ret = mysqli_query($con, "select * from lecture_reg where username='$name'");
							$cnt = 1;
							while ($row = mysqli_fetch_array($ret)) {
							?>
								<input type="text" id="search-box" name="search-box" value="<?php echo $row['f_name']; ?>" readonly style="background-color:#F5F5F5"/>
							<?php } ?>
							<div id="suggesstion-box" align="center"></div>
						</td>
						<td align="right">Batch Code :</td>

						<td>
							<!-- <?php

									$sql = mysqli_query($con, "SELECT c_name from c_assign where username='$name' and status='T' and hr>0");
									if (mysqli_num_rows($sql)) {
										$select = '<select  id="mySelect" onchange="myFunction()" class="form-control" name="course_id" required><option selected disabled value="">-- Please Select --</option>';
										while ($rs = mysqli_fetch_array($sql)) {
											$select .= '<option value="' . $rs['c_name'] . '">' . $rs['c_name'] . '</option>';
										}
									}

									$select .= '</select>';
									echo $select;

									?> -->
							<select name="course_id" id="brand" required>
								<option value="" disabled selected>-- Select a Batch --</option>
								<?php echo fill_brand($connect); ?>
							</select>
							<div class="col" id="show_product" align="center">
								<?php echo fill_product($connect); ?>
							</div>
						</td>
					</tr>

					<tr>
						<td align="right">Start Time :</td>
						<td>
							<input type="time" class="field" name="stime" required="true" />

						</td>
						<td align="right">End Time :</td>
						<td>
							<input type="time" class="field" name="etime" required="true" />

						</td>
					</tr>

					<tr>
						<!-- <td  align="right" >Lecture Duration :</td>    
              <td >     <input type="text" id="field"  name="tlecture"  onclick="date()" placeholder="00:00:00"/></div></td>     -->
						<td align="right">Date :</td>
						<td>
							<input type="date" class="field" name="rdate" required="true">
						</td>
						<td align="right">Lecture Coverage :</td>
						<td>
							<textarea name="coverage" class="field" required></textarea>

						</td>
					</tr>
					<tr>
						<td align="right"></td>
						<td>

							<button type="submit" class="btn btn-primary" name="submit"> Add Lecture Coverage</button>
						</td>
					</tr>
				</table>
				<br>
				<br>
			</form>
		</div>
		<div class="row col-md-12 ">
			<h4>Approval Pending Lecture Coverages</h4><br><br>
			<table class="table table-striped table-bordered" id="" class="display" width="96%" cellspacing="0">
				<thead>
					<tr>
						<th>Course Name</th>
						<th>Batch Code</th>
						<th>Date</th>
						<th>Start Time</th>
						<th>End Time</th>
						<th>Lecture Duration (Hrs)</th>
						<th>Lecture Coverage</th>
						<th>Action</th>
					</tr>
				</thead>
				<?php
				$ret = mysqli_query($con, "select id,course,s_time , e_time , to_time , co_name,rdate,coverage,approval from t_time where username='$name' and approval='Not Approved'");
				while ($row = mysqli_fetch_array($ret)) {
					$hours = floor($row['to_time'] / 3600);
					$minutes = floor(($row['to_time'] / 60) % 60);
				?>
					<tbody>
						<tr>
							<td>
								<?php echo $row['course']; ?>
							</td>
							<td>
								<?php echo $row['co_name']; ?>
							</td>
							<td>
								<?php echo $row['rdate']; ?>
							</td>
							<td>
								<?php echo $row['s_time']; ?>
							</td>
							<td>
								<?php echo $row['e_time']; ?>
							</td>
							<td>
								<?php echo $hours; ?>h : <?php echo $minutes; ?>m
							</td>
							<td>
								<?php echo $row['coverage']; ?>
							</td>
							<!-- <td>
							<a href="lec-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-xs btn-primary">Edit</i>
							</a>
						</td> -->
							<td>
								<?php
								if (($row['approval'] != 'Approved') && ($row['approval'] != 'Declined')) {
								?>
									<a href="edit_lecture.php?id=<?php echo $row['id']; ?>" style="width:90px" class="btn btn-xs btn-primary">Edit</a>
									<a href="lec-delete.php?id=<?php echo $row['id']; ?>" style="width:90px" class="btn btn-xs btn-danger">Remove</a>


								<?php
								} ?>
							</td>
						</tr>
					</tbody>
				<?php
				} ?>
			</table>
		</div>
		<div class="row col-md-12 " style="margin-top: 2%;">
			<h4>Rejected Lecture Coverages</h4><br><br>
			<table class="table table-striped table-bordered" id="" class="display" width="96%" cellspacing="0">
				<thead>
					<tr>
						<th>Course Name</th>
						<th>Batch Code</th>
						<th>Date</th>
						<th>Start Time</th>
						<th>End Time</th>
						<th>Lecture Duration (Hrs)</th>
						<th>Lecture Coverage</th>
						<th>Action</th>
					</tr>
				</thead>
				<?php
				$ret = mysqli_query($con, "select id,course,s_time , e_time , to_time , co_name,rdate,coverage,approval from t_time where username='$name' and approval='Declined'");
				while ($row = mysqli_fetch_array($ret)) {
					$hours = floor($row['to_time'] / 3600);
					$minutes = floor(($row['to_time'] / 60) % 60);
				?>
					<tbody>
						<tr>
							<td>
								<?php echo $row['course']; ?>
							</td>
							<td>
								<?php echo $row['co_name']; ?>
							</td>
							<td>
								<?php echo $row['rdate']; ?>
							</td>
							<td>
								<?php echo $row['s_time']; ?>
							</td>
							<td>
								<?php echo $row['e_time']; ?>
							</td>
							<td>
								<?php echo $hours; ?>h : <?php echo $minutes; ?>m
							</td>
							<td>
								<?php echo $row['coverage']; ?>
							</td>
							<!-- <td>
							<a href="lec-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-xs btn-primary">Edit</i>
							</a>
						</td> -->
							<td>
							
									<?php
								 if ($row['approval'] == 'Declined') {

									?>
									<a href="lec-delete.php?id=<?php echo $row['id']; ?>" style="cursor:pointer" class="btn btn-xs btn-danger">Remove</a>
								<?php
								}
								?>
							</td>
						</tr>
					</tbody>
				<?php
				} ?>
			</table>
		</div>
	</div>
	</div>
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body">
					<p>Successfully added!</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$('#brand').change(function() {
				var c_name = $(this).val();
				$.ajax({
					url: "load_data.php",
					method: "POST",
					data: {
						c_name: c_name
					},
					success: function(data) {
						$('#show_product').html(data);
					}
				});
			});
		});
	</script>
</body>

</html>