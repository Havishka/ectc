<?php include '../connection.php'; ?>
<?php
if(isset($_POST['c_id'])) {
	$sql = "select * from `student_course_batch` where `scb_branch_id`=".mysqli_real_escape_string($con, $_POST['c_id']);
	$res = mysqli_query($con, $sql);
	if(mysqli_num_rows($res) > 0) {
		echo "<option value='' >Please Select The Batch</option>";
		while($row = mysqli_fetch_object($res)) {
			
			//
			
			
			
		$datexx = $row->batch_start_date;
		$bathcidx = $row->scb_aid;                  //scb_aid
		$scb_course_id = $row->scb_course_id;  //scb_course_id
		//
		$sel_queryz="select c_name from course where course_id='$scb_course_id' ";
		$resultz = mysqli_query($con,$sel_queryz);
		if($rowz = mysqli_fetch_assoc($resultz)){
			$c_name=$rowz["c_name"];
		}

		$gotmonth = date('F, Y',strtotime($datexx));
		$uniqueBatchName = "$bathcidx, $c_name : $gotmonth Intake";

			//echo "<option value='".$row->scb_aid."'>".$row->batch_start_date."</option>";
			
			echo "<option value='".$row->scb_aid."'>".$uniqueBatchName."</option>";
		}
	}
} else {
	header('location: ./');
}
?>
