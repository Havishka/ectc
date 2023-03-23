<?php

include '../connection.php';

if (isset($_GET['editid'])) {
	$cid = $_GET['editid'];
	// $approved = 'approved';
	// $query ="UPDATE t_time SET approval = 'Approved' Where id='$cid' ";
	// mysqli_query($con,$query);

	$sqlBidAccept = "SELECT *FROM t_time WHERE id = '$cid' "; //for accept bid
	$BidAccept = mysqli_query($con, $sqlBidAccept);
	$BidAcceptResultCheck = mysqli_num_rows($BidAccept);
	$bidAcceptRow = mysqli_fetch_assoc($BidAccept);

	if ($BidAcceptResultCheck > 0) {

		$Accepted = 1;
		//$AcceptedPrice = $bidAcceptRow['bid'];
		$accepted = 'Approved';

		$query = "UPDATE t_time SET f_approval = '$accepted' Where id='$cid'";
		mysqli_query($con, $query);
	} else {

		$Accepted = 0;
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
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
			width: 190px;
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
		}

		#search-box_2 {
			padding: 10px;
			border: #eaedeb 1px solid;
			border-radius: 12px;
		}
	</style>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>ECTC | PDP</title>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">
		<!-- <div class="row" style="padding-left: 30%;"> -->
		<br>
		<br>
		<h3>Add Payments for Approved Lectures</h3>

		<form method='post' action=''>
			<table style="margin-top: 5%;">
				<tr>
					<td> <input type="month" class="form-control" name="mydate" id="mydate" style="width:350px" placeholder="Choose Month..." value="<?php echo date("Y-m"); ?>" required></td>
					<?php $mydate = 'date("Y-m")'; ?>
					<!-- <td>
						<?php

						$sql21 = "SELECT c_name from c_assign order by c_name ASC";
						$sql = mysqli_query($con, $sql21);
						if (mysqli_num_rows($sql)) {
							$selectq = '<select name="item84" id="item84" class="select2_single form-control" tabindex="-1" required>';
							$selectq .= '<option value="%" readonly>--Select a Batch Code--</option>';
							while ($rs = mysqli_fetch_array($sql)) {
								$selectq .= '<option value="' . $rs['c_name'] . '">' . $rs['c_name'] . '</option>';
							}
						}
						$selectq .= '</select>';
						echo $selectq;
						?></td> -->

					<td style="width: 5px;"></td>
					<td> <input type='submit' name='but_search' value='View' id="btnSearch" class="btn btn-s btn-primary"> </td>
				</tr>

			</table>
		</form> <br><br>

		<?php
		if (isset($_POST['but_search'])) {
			$mydate = $_POST['mydate'];
		?>
			<h4>Add Payments - <?php echo $mydate; ?></h4><br>
			<table class="table table-striped table-bordered" id="" width="80%" cellspacing="0">
				<thead>
					<tr>
						<th>Lecturer Name</th>
						<th>Branch</th>
						<th>Course Name</th>
						<th>Batch Code</th>

						<th>Pay Month</th>
						<!-- <th>Total Hours</th> -->

						<th>Pay Rate</th>
						<th>Hourly Rate</th>
						<th>Action</th>
					</tr>
				</thead>
				<?php

				$ret = mysqli_query($con, "(select DISTINCT DATE_FORMAT(`rdate`,'%Y-%m') AS Month, t.le_name, t.co_name, c.course, c.rate, c.pay_hr, t.as_id, l.f_name as fname, l.l_name as lname, b.name as branchname
											from t_time t, c_assign c, lecture_reg l, branch b
											where (l.branch=b.branch_id and t.username=l.username) and c.id=t.as_id and t.approval='Approved' and pay!='1' and DATE_FORMAT(`rdate`,'%Y-%m')='$mydate') order by l.f_name asc");

											// //where (l.branch=b.branch_id and t.username=l.username) and c.id=t.as_id and t.approval='Approved' and pay!='1' and DATE_FORMAT(`rdate`,'%Y-%m')='$mydate') order by l.f_name asc
											// (select DISTINCT DATE_FORMAT(`rdate`,'%Y-%m') AS Month, t.le_name, t.co_name, c.course, c.rate, t.as_id 
											// from t_time t, c_assign c 
											// where c.id=t.as_id and t.approval='Approved' and pay!='1' and DATE_FORMAT(`rdate`,'%Y-%m')='$mydate') order by t.le_name asc
				while ($row = mysqli_fetch_array($ret)) {

				?>
					<tbody>
						<tr>
							<td>
								<?php echo $row['fname']; ?> <?php echo $row['lname']; ?>
							</td>
							<td>
								<?php echo $row['branchname']; ?> 
							</td>
							<td>
								<?php echo $row['course']; ?>
							</td>
							<td>
								<?php echo $row['co_name']; ?>
							</td>

							<td><?php echo $row['Month']; ?></td>
							<!-- <td><?php echo $row['tot']; ?></td> -->
							<td>
								<?php echo $row['rate']; ?>
							</td>
							<td>
								<?php echo $row['pay_hr']; ?>
							</td>
							<td>
									<a href="Lecture/view_approve_f.php?id=<?php echo $row['as_id']; ?>&&month=<?php echo $row['Month']; ?>" class="btn btn-xs btn-primary">Add Payments
										<i class="feather icon-clock m-t-10 f-16 "></i>
									</a>
							</td>

							</td>
						</tr>
					</tbody>
				<?php

				}
		} ?>
			</table>

			<br><hr><br>
			<?php
			if (isset($_POST['but_search'])) {
				$mydate = $_POST['mydate'];
				?>
				<h4>Approval Pending Payments - <?php echo $mydate; ?></h4><br>
				<table class="table table-striped table-bordered" id="" width="80%" cellspacing="0">
					<thead>
						<tr>
							<th>Lecturer Name</th>
							<th>Course Name</th>
							<th>Batch Code</th>

							<th>Payment Rate</th>
							
							<th>Payment Month</th>
							<th>Total Hours</th>
							<th>Added Payment</th>
							<th>Action</th>

						</tr>
					</thead>
					<?php

					$ret = mysqli_query($con, "select * from lec_pay
												where finalize IS NULL and paid_for like '$mydate%' order by l_name asc");
					while ($row = mysqli_fetch_array($ret)) {

						?>
						<tbody>
							<tr>
								<td> <?php echo $row['l_name']; ?> </td>
								<td> <?php echo $row['course']; ?> </td>
								<td> <?php echo $row['c_name']; ?> </td>
								<td> <?php echo $row['rate']; ?> </td>
								<td> <?php echo $row['paid_for']; ?> </td>
								<td> <?php echo $row['tot']; ?> </td>
								<td> Rs: <?php echo $row['pay']; ?> </td>
								<td>
									<a href="Lecture/edit_approve_f.php?id=<?php echo $row['as_id']; ?>&&month=<?php echo $row['paid_for']; ?>" class="btn btn-xs btn-success">Edit Payments
										<i class="feather icon-clock m-t-10 f-16 "></i>
									</a>
								</td>
							</tr>
						</tbody>
						<?php

					}
			} ?>
		</table>
	</div>

</body>

</html>