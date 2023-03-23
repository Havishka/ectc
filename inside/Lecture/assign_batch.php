<?php

include '../connection.php';

if (isset($_POST['submit'])) {

	$nicpost = $_POST['lec'];
	$nicpost_2 = $_POST['course'];
	$rate = $_POST['rate'];
	$pay = $_POST['pay_hr'];

	// $sdate=$_POST['sdate'];
	// $edate=$_POST['edate'];
	$hr = ($_POST['hr'] * 3600);
	//$hrs=SEC_TO_TIME(SUM(TIME_TO_SEC($hr)));


	// $a = mysqli_num_rows($query1);
	// $row = mysqli_fetch_assoc($query1);

	// if($a > 0) {
	// 	$username = $_GET['username'];

	$query = mysqli_query($con, "insert into c_assign (l_name,nic,course,c_name,rate,tot_hr,hr,username,status,pay_hr) value((select f_name from lecture_reg where nic='$nicpost'),'$nicpost',(select c.c_name from course c, student_course_batch b where b.batch_remarks='$nicpost_2' and b.scb_course_id=c.course_id),'$nicpost_2','$rate','$hr','$hr',(select username from lecture_reg where nic='$nicpost'),'T', '$pay')");

	if ($query) {

		echo "<script>alert('Batch was assigned successfully!');</script>";
		echo "<script>sucess</script>";
	} else {
		echo "<script>alert('Something Went Wrong. Please try again.');</script>";
	}
}
// }

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

		.field {
			padding: 10px;
			border: #eaedeb 1px solid;
			border-radius: 12px;
			width: 300px;
			font-size: 14px;
		}

		#branch {
			padding: 10px;
			border: #eaedeb 1px solid;
			border-radius: 12px;
			font-size: 14px;
			width: 300px;
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
	<div class="wrapper ">
		<!-- <div class="row" style="padding-left: 30%;"> -->

		<div class="frmSearch">
			<h3 align="center">Assign Lecturers for Courses</h3>
			<br>

			<form class="form-inline" method="post">
				<table align="center">
					<tr>
						<td align="right" class="style1">Lecturer :&nbsp;&nbsp;&nbsp;</td>
						<td>
							<?php
							//query
							$sql = mysqli_query($con, "SELECT * from lecture_reg");
							if (mysqli_num_rows($sql)) {
								$select = '<select id="branch" class="field" name="lec" required> <option selected disabled value=""> -- Select a Lecturer -- </option>';

								while ($rs = mysqli_fetch_array($sql)) {
									$select .= '<option value="' . $rs['nic'] . '">' . $rs['f_name'] . '  ' . $rs['l_name'] . ' : ' . $rs['nic'] . '</option>';
								}
							}
							$select .= '</select>';
							echo $select;
							?>
						</td>
					</tr>
					<tr style="height:15px"></tr>
					<tr>
						<td align="right" class="style1">Batch Code :&nbsp;&nbsp;&nbsp;</td>
						<td>
							<?php
							//query
							$sql = mysqli_query($con, "SELECT * from student_course_batch where batch_remarks NOT IN (select c_name from c_assign)");
							if (mysqli_num_rows($sql)) {
								$select = '<select id="batch" class="field" name="course" required> <option selected disabled value=""> -- Select a Batch -- </option>';

								while ($rs = mysqli_fetch_array($sql)) {
									$select .= '<option value="' . $rs['batch_remarks'] . '">' . $rs['batch_remarks'] . '</option>';
								}
							}
							$select .= '</select>';
							echo $select;
							?>
						</td>
					</tr>

					<tr style="height:15px"></tr>
					<tr>
						<td align="right">Rate :&nbsp;&nbsp;&nbsp;</td>
						<td>
							<select name="rate" id="field" class="field" onchange="change();">
								<option selected disabled> -- Select Rate -- </option>
								<option value="30% Rate"> 30% Rate</option>
								<option value="Hourly Rate"> Hourly Rate</option>
								<option value="Other"> Other</option>

							</select>
						</td>
					</tr>
					<tr style="height:15px"></tr>
					<tr>
						<td align="right" class="style1">No of Hrs : &nbsp;&nbsp;&nbsp;</td>
						<td class="style1">
							<input type="text" class="field" id="hr" name="hr" required="true" placeholder="Enter No of Hrs">
						</td>
					</tr>
					<tr style="height:15px"></tr>
					<tr>
						<td></td>
						<td>
							<script>
								function change() {
									var select = document.getElementById("field");
									var divv = document.getElementById("container");
									var value = select.value;
									if (value == "Hourly Rate") {
										toAppend = "<input type='number' min=0 class='field' name='pay_hr' placeholder='Enter Hourly Payment Amount'>";
										divv.innerHTML = toAppend;
										return;
									}
									if (value == "30% Rate") {
										toAppend = "<input type='number' name='pay_hr' value='0' hidden>";
										divv.innerHTML = toAppend;
										return;
									}
									if (value == "Other") {
										toAppend = "<input type='text' name='pay_hr' class='field' placeholder='Enter Payment Details'>";
										divv.innerHTML = toAppend;
										return;
									}
								}
							</script>
							<div id="container">
						</td>
					</tr>
					<tr style="height:15px"></tr>
					<tr>
					</tr>
					<tr style="height:15px"></tr>

					<tr style="height:10px"></tr>
					<tr>
						<td></td>
						<td>
							<button type="submit" class="btn btn-primary" id="AssignLec" name="submit" style=" position: absolute;"> Assign </button> 
							<!-- <button <?php $id=$row['AssignLec']?>class="assign btn btn-primary" type="button" id='del_<?= $id ?>' data-id='<?= $id ?>' name="assign_btn"> Assign<i class="feather icon-clock m-t-10 f-16 "></i></button> -->
						</td>
					</tr>

					<tr style="height:15px"></tr>
				</table>
			</form>

		</div><br>
		<h4>Assigned Batches</h4> <br>
		<form method='post' action=''>
			<table>
				<tr>
					<td> 
						<?php
							$sql21 = "SELECT * from lecture_reg order by f_name ASC";
							$sql = mysqli_query($con, $sql21);
							if (mysqli_num_rows($sql)) {
								
								$selectq = '<select name="item84" id="item84" class="select2_single form-control" tabindex="-1" required>';
								$selectq .= '<option value="" readonly>--Select a Lecturer--</option>';

								while ($rs = mysqli_fetch_array($sql)) {
									$selectq .= '<option value="' . $rs['username'] . '">' . $rs['f_name'] . ' ' . $rs['l_name'] .  '</option>';
								}
							}
							$selectq .= '</select>';
							echo $selectq;
						?>
					</td>
					<td style="width: 5px;"></td>
					<td> <input type='submit' name='but_search' value='View' id="btnSearch" class="btn btn-s btn-primary"> </td>
				</tr>
			</table>
		</form>

		<?php
			if (isset($_POST['but_search'])) {

				$select = $_POST['item84'];
			} ?>
		<br><br>
		<!-- <input type='text' id='myInput' onkeyup='myFunction()' placeholder='Search by nic...' title='Type in a nic'><br><br> -->

		<!--		Show Numbers Of Rows 		-->
		<!-- <select class="form-control" name="state" id="maxRows">
				<option value="5000">Show ALL Rows</option>
				<option value="5">5</option>
				<option value="10">10</option>
				<option value="15">15</option>
				<option value="20">20</option>
				<option value="50">50</option>
				<option value="70">70</option>
				<option value="100">100</option>
			</select> -->

		<table class="table table-striped table-bordered" id="myTable" width="80%" cellspacing="0">
			<thead>
				<tr>
					<th>Lecturer NIC</th>
					<th>Lecturer Name</th>
					<th>Course Name</th>
					<th>Batch Code</th>
					<th>Payment Rate</th>
					<th>Total No of Hrs</th>
					<th>Remaining Hrs</th>
					<th>Action</th>
				</tr>
			</thead>
			<?php
			$ret = mysqli_query($con, "select c.course, c.tot_hr, c.hr, c.nic,c.c_name,c.rate,c.id,l.f_name as first, l.l_name as last from c_assign c, lecture_reg l where c.nic=l.nic and c.username='$select'");
			if (mysqli_num_rows($ret) > 0) {

				while ($row = mysqli_fetch_array($ret)) {
					$hours = floor($row['tot_hr'] / 3600);
					$minutes = floor(($row['tot_hr'] / 60) % 60);
					$rhours = floor($row['hr'] / 3600);
					$rminutes = floor(($row['hr'] / 60) % 60);
					?>
					<tbody>
						<tr>
							<td>
								<?php echo $row['nic']; ?>
							</td>
							<td>
								<?php echo $row['first'] . ' ' . $row['last']; ?>
							</td>
							<td>
								<?php echo $row['course']; ?>
							</td>
							<td>
								<?php echo $row['c_name']; ?>
							</td>
							<td>
								<?php echo $row['rate']; ?>
							</td>
							<td>
								<?php echo $hours; ?>h :
								<?php echo $minutes; ?>m
							</td>
							<td>
								<?php echo $rhours; ?>h :
								<?php echo $rminutes; ?>m
							</td>
							<?php if ($row['hr'] > 0) {
							?>
								<td>
									<a href="index.php?tab=update_batch&&editid=<?php echo $row['id']; ?>" class="btn btn-xs btn-primary">View
										<i class="feather icon-clock m-t-10 f-16 "></i>
									</a>
									<!-- <a href="Lecture/delete_assign_f.php?id=<?php echo $row['id']; ?>" class="btn btn-xs btn-danger">Remove<i class="feather icon-clock m-t-10 f-16 "></i>
									</a> -->
									<button <?php $id=$row['id']?>class="delete_c btn-xs btn-danger" type="button" id='del_<?= $id ?>' data-id='<?= $id ?>' name="delete_btn"> Remove<i class="feather icon-clock m-t-10 f-16 "></i></button>
								</td>
							<?php 
						} else {
							?>
							<td>
								<?php echo "Batch Finished!"; ?>
							</td>

							<?php 

							}
							?>
						</tr>
					</tbody>
					<?php
				}

			} else {
				echo "<tr>";
				echo "<td colspan='9'>No record found!</td>";
				echo "</tr>";
			}
			?>
		</table>
	</div>

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

	<script>
		getPagination('#myTable');
		//getPagination('.table-class');
		//getPagination('table');

		/*					PAGINATION 
		- on change max rows select options fade out all rows gt option value mx = 5
		- append pagination list as per numbers of rows / max rows option (20row/5= 4pages )
		- each pagination li on click -> fade out all tr gt max rows * li num and (5*pagenum 2 = 10 rows)
		- fade out all tr lt max rows * li num - max rows ((5*pagenum 2 = 10) - 5)
		- fade in all tr between (maxRows*PageNum) and (maxRows*pageNum)- MaxRows 
		*/


		function getPagination(table) {
			var lastPage = 1;

			$('#maxRows')
				.on('change', function(evt) {
					//$('.paginationprev').html('');						// reset pagination

					lastPage = 1;
					$('.pagination')
						.find('li')
						.slice(1, -1)
						.remove();
					var trnum = 0; // reset tr counter
					var maxRows = parseInt($(this).val()); // get Max Rows from select option

					if (maxRows == 5000) {
						$('.pagination').hide();
					} else {
						$('.pagination').show();
					}

					var totalRows = $(table + ' tbody tr').length; // numbers of rows
					$(table + ' tr:gt(0)').each(function() {
						// each TR in  table and not the header
						trnum++; // Start Counter
						if (trnum > maxRows) {
							// if tr number gt maxRows

							$(this).hide(); // fade it out
						}
						if (trnum <= maxRows) {
							$(this).show();
						} // else fade in Important in case if it ..
					}); //  was fade out to fade it in
					if (totalRows > maxRows) {
						// if tr total rows gt max rows option
						var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
						//	numbers of pages
						for (var i = 1; i <= pagenum;) {
							// for each page append pagination li
							$('.pagination #prev')
								.before(
									'<li data-page="' +
									i +
									'">\
								  <span>' +
									i++ +
									'<span class="sr-only">(current)</span></span>\
								</li>'
								)
								.show();
						} // end for i
					} // end if row count > max rows
					$('.pagination [data-page="1"]').addClass('active'); // add active class to the first li
					$('.pagination li').on('click', function(evt) {
						// on click each page
						evt.stopImmediatePropagation();
						evt.preventDefault();
						var pageNum = $(this).attr('data-page'); // get it's number

						var maxRows = parseInt($('#maxRows').val()); // get Max Rows from select option

						if (pageNum == 'prev') {
							if (lastPage == 1) {
								return;
							}
							pageNum = --lastPage;
						}
						if (pageNum == 'next') {
							if (lastPage == $('.pagination li').length - 2) {
								return;
							}
							pageNum = ++lastPage;
						}

						lastPage = pageNum;
						var trIndex = 0; // reset tr counter
						$('.pagination li').removeClass('active'); // remove active class from all li
						$('.pagination [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
						// $(this).addClass('active');					// add active class to the clicked
						limitPagging();
						$(table + ' tr:gt(0)').each(function() {
							// each tr in table not the header
							trIndex++; // tr index counter
							// if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
							if (
								trIndex > maxRows * pageNum ||
								trIndex <= maxRows * pageNum - maxRows
							) {
								$(this).hide();
							} else {
								$(this).show();
							} //else fade in
						}); // end of for each tr in table
					}); // end of on click pagination list
					limitPagging();
				})
				.val(5)
				.change();

			// end of on select change

			// END OF PAGINATION
		}

		function limitPagging() {
			// alert($('.pagination li').length)

			if ($('.pagination li').length > 7) {
				if ($('.pagination li.active').attr('data-page') <= 3) {
					$('.pagination li:gt(5)').hide();
					$('.pagination li:lt(5)').show();
					$('.pagination [data-page="next"]').show();
				}
				if ($('.pagination li.active').attr('data-page') > 3) {
					$('.pagination li:gt(0)').hide();
					$('.pagination [data-page="next"]').show();
					for (let i = (parseInt($('.pagination li.active').attr('data-page')) - 2); i <= (parseInt($('.pagination li.active').attr('data-page')) + 2); i++) {
						$('.pagination [data-page="' + i + '"]').show();

					}

				}
			}
		}
	</script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script>
		
        $(document).ready(function() {
			$('.delete_c').click(function() {
                var deleteid = $(this).data('id');
                if (confirm("Are you sure?")) {
                    $.ajax({
                        url: './Lecture/delete_assign_f.php',
                        type: 'POST',
                        data: {
                            id: deleteid
                        },
                        success: function(response) {
                            if (response == 1) {
                                alert('Assigned batch deleted.');
                                setTimeout(function() {
                                    window.location.reload();
                                }, 100);
                             } else {
                                alert('Cannot delete.');
                            }
                        }
                    });
                }
            });
        });

    </script>

</body>

</html>