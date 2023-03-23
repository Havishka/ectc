<script>
	function myFunction() {
		var x = document.getElementById("mySelect").value;
		document.getElementById("demo").innerHTML = x;

	}
</script>
<?php
session_start();

if (isset($_SESSION['name'])) {

	include 'includes/sidbar_l.php';
	//include 'includes/nav.php';
	include 'connection.php';

	if (isset($_POST['submit'])) {
		$nicpost = $_POST['search-box'];
		$course_id = $_POST['course_id'];
		$stime = $_POST['stime'];
		$etime = $_POST['etime'];

		$coverage = $_POST['coverage'];
		$rdate = $_POST['rdate'];

		$query = mysqli_query($con, "insert into t_time (le_name,co_name,s_time,e_time,to_time,approval,f_approval,g_approval,coverage,rdate,as_id) value('$nicpost','$course_id','$stime','$etime',TIMEDIFF(\"$etime\", \"$stime\"),'Not Approved','Not Approved','Not Approved','$coverage','$rdate',(select id from c_assign where l_name=\"$nicpost\" and c_name=\"$course_id\"))");
		if ($query) {

			echo "<script>alert('Successfully added!');</script>";
			//echo "<script>alert popup()('Data Successfully Added.');</script>";
			echo "<script>sucess</script>";
		} else {
			echo "<script>alert('Something Went Wrong. Please try again.');</script>";
		}
	}

	if (isset($_POST['view'])) {


		echo "<script>alert('You have '' remaining hours!');</script>";
	}
} else {
	header("Location: login.php");
	exit();
}

$name = $_SESSION['name'];
?>


<script>
	$(document).ready(function() {
		$('#MyTable').DataTable({
			initComplete: function() {
				this.api().columns().every(function() {
					var column = this;
					var select = $('<select><option value=""></option></select>')
						.appendTo($(column.footer()).empty())
						.on('change', function() {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
							);
							//to select and search from grid  
							column
								.search(val ? '^' + val + '$' : '', true, false)
								.draw();
						});

					column.data().unique().sort().each(function(d, j) {
						select.append('<option value="' + d + '">' + d + '</option>')
					});
				});
			}
		});
	});
</script>

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

		#field {
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
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>CADD</title>
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
					<h1 class="m-0">Dashboard</h1>
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
	<h3 align="center" style="margin-top:25px;margin-bottom:25px;padding-left: 20%;">Add Lecture Coverage</h3>
	<div class="wrapper" style="padding-left: 20%;">
		<!-- <div class="row" style="padding-left: 30%;"> -->
		<br>

		<div>
			<td>
				<button type="submit" class="btn btn-success" name="view"> View Remaining Hours </button>
			</td>
			<form method="post">
				<table id="table1" ; cellspacing="5px" cellpadding="5%" ; align="center">
					<tr>
						<td align="right" class="style1">Lecturer Name :</td>
						<td class="style1">
							<input type="text" id="search-box" name="search-box" value="<?php echo $name ?>" readonly />
							<div id="suggesstion-box" align="center"></div>
						</td>
						<td align="right" class="style1">Course Name :</td>
						<!-- <td class="style1">  <input type="text" id="search-box_2"  name="search-box_2" required placeholder="Search By Name..." />
                    <div id="suggesstion-box_2" align="center"></div></td>     -->

						<td>
							<?php


							//query
							$sql = mysqli_query($con, "SELECT c_name from c_assign where l_name='$name' and status='T'");
							if (mysqli_num_rows($sql)) {
								$select = '<select  id="mySelect" onchange="myFunction()" class="form-control" name="course_id" required><option selected disabled value="">Please select..</option>';

								while ($rs = mysqli_fetch_array($sql)) {
									$select .= '<option value="' . $rs['c_name'] . '">' . $rs['c_name'] . '</option>';
								}
							}
							$select .= '</select>';
							echo $select;
							?>
						</td>

					</tr>
					<!-- <tr>

						<td align="right" class="style1">Remaining Hours per Month:</td>
						<td class="style1">
							<input type="text" id="field" name="rem" readonly>
						</td>

					</tr> -->

					<tr>

					</tr>
					<tr>
						<td align="right" class="style1">Start Time :</td>
						<td class="style1">
							<input type="time" id="field" name="stime" required="true" />
		</div>
		</td>
		<td align="right" class="style1">End Time :</td>
		<td class="style1">
			<input type="time" id="field" name="etime" required="true" />
	</div>
	</td>
	</tr>
	<tr>

	</tr>

	<tr>
		<!-- <td  align="right" class="style1">Lecture Duration :</td>    
              <td class="style1">     <input type="text" id="field"  name="tlecture"  onclick="date()" placeholder="00:00:00"/></div></td>     -->
		<td align="right" class="style1">Date :</td>
		<td class="style1">
			<input type="date" id="field" name="rdate" required="true">
		</td>
		<td align="right" class="style1">Lecture Coverage :</td>
		<td class="style1">
			<textarea name="coverage" id="field" required></textarea>
			</div>
		</td>
	</tr>


	<tr>
		<td align="right" class="field"></td>

		<td>
			<button type="submit" class="btn btn-primary" name="submit" onClick="date()"> Add Lecture Coverage </button>
		</td>

	</tr>


	</table>


	<br>
	<br>

	</form>

	</div>


	<div class="row col-md-12 ">
		<table class="table table-striped table-bordered" id="" class="display" width="96%" cellspacing="0">
			<thead>
				<tr>


					<th>Course Name</th>
					<th>Date</th>
					<th>Start Time</th>
					<th>End Time</th>
					<th>Lecture Duration</th>
					<th>Lecture Coverage</th>
					<th>Approval Status</th>
					<!-- <th>Action</th> -->



				</tr>
			</thead>
			<?php
			$ret = mysqli_query($con, "select * from t_time where le_name='$name' and (MONTH(rdate) = MONTH(CURRENT_DATE()) and YEAR(rdate) = YEAR(CURRENT_DATE()))");

			while ($row = mysqli_fetch_array($ret)) {
			?>

				<tbody>
					<tr>

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
							<?php echo $row['to_time']; ?>
						</td>
						<td>
							<?php echo $row['coverage']; ?>
						</td>
						<td>
							<?php echo $row['approval']; ?>
						</td>
						<td>
							<a href="lec-edit.php?id=<?php echo $row['id']; ?>" class="btn btn-xs btn-primary">Edit</i>
							</a>
						</td>
						<td>
							<?php
							if ($row['approval'] != 'Approved') {
							?>
								<a href="lec-delete.php?id=<?php echo $row['id']; ?>" style="cursor:pointer" class="btn btn-xs btn-danger">Remove</a>
							<?php
							} ?>
						</td>
					</tr>

				</tbody>
			<?php

			} ?>
		</table>

	</div>





	</div>


	</div>

	<?php include 'includes/footer.php'; ?>







	<!-- jQuery UI 1.11.4 -->
	<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Sparkline -->
	<script src="plugins/sparklines/sparkline.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
	<!-- daterangepicker -->
	<script src="plugins/moment/moment.min.js"></script>
	<script src="plugins/daterangepicker/daterangepicker.js"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<!-- Summernote -->
	<script src="plugins/summernote/summernote-bs4.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="dist/js/pages/dashboard.js"></script>







</body>

</html>