<?php

include "../connection.php";

$gotmonth = date("Y-m");
$gotmonth1 = "$gotmonth-01";
$gotmonth2 = "$gotmonth-31";

$branch_idx = $bid;

$totalnewreg = 0;
$countx = 0;
//my queries
$menu = array();
$totalperbranch = array();
$my_query54 = mysqli_query($con, "SELECT * FROM course where state='T' ") or die(mysqli_error($con));
while( $row54 = $my_query54->fetch_assoc() ){
extract($row54);
$menu[] = $row54['c_name'];

$course_idx = $course_id;
$course_namex = $c_name;
$countx = $countx +1;

$paidAmx = 0;
$receiptsissued = 0;
//$my_query = mysqli_query($con, "SELECT * FROM payment_receipt pr,student s, student_branch sb where s.std_id =pr.pr_std_id and pr.pr_std_id=sb.std_id and sb.branch_id like '$branch_idx' and pr.pr_course_id = '$course_idx' and pr.pr_date BETWEEN '" . $gotmonth1 . "' AND  '" . $gotmonth2 . "' ") or die(mysqli_error($con));

// $my_query = mysqli_query($con, "SELECT * FROM student s, student_branch sb,student_course sc where s.std_id=sc.std_id and sb.branch_id like '$branch_idx' and sc.course_id = '$course_idx' and sc.sc_date BETWEEN '" . $gotmonth1 . "' AND  '" . $gotmonth2 . "' ") or die(mysqli_error($con));

// while( $row22 = $my_query->fetch_assoc() ){
// extract($row22);

// $receiptsissued = $receiptsissued + 1;
// }
// $totalperbranch[] = $receiptsissued;

}



require 'report_gen/chart_polar/ChartJS.php';
require 'report_gen/chart_polar/ChartJS_PolarArea.php';

ChartJS::addDefaultColor(array('fill' => '#f2b21a', 'stroke' => '#e5801d', 'point' => '#e5801d', 'pointStroke' => '#e5801d'));
ChartJS::addDefaultColor(array('fill' => 'rgba(28,116,190,.8)', 'stroke' => '#1c74be', 'point' => '#1c74be', 'pointStroke' => '#1c74be'));
ChartJS::addDefaultColor(array('fill' => 'rgba(212,41,31,.7)', 'stroke' => '#d4291f', 'point' => '#d4291f', 'pointStroke' => '#d4291f'));
ChartJS::addDefaultColor(array('fill' => '#dc693c', 'stroke' => '#ff0000', 'point' => '#ff0000', 'pointStroke' => '#ff0000'));
ChartJS::addDefaultColor(array('fill' => 'rgba(46,204,113,.8)', 'stroke' => '#2ecc71', 'point' => '#2ecc71', 'pointStroke' => '#2ecc71'));
ChartJS::addDefaultColor(array('fill' => '#f2b21a', 'stroke' => '#e5801d', 'point' => '#e5801d', 'pointStroke' => '#e5801d'));
ChartJS::addDefaultColor(array('fill' => 'rgba(28,116,190,.8)', 'stroke' => '#1c74be', 'point' => '#1c74be', 'pointStroke' => '#1c74be'));
ChartJS::addDefaultColor(array('fill' => 'rgba(212,41,31,.7)', 'stroke' => '#d4291f', 'point' => '#d4291f', 'pointStroke' => '#d4291f'));
ChartJS::addDefaultColor(array('fill' => '#dc693c', 'stroke' => '#ff0000', 'point' => '#ff0000', 'pointStroke' => '#ff0000'));
ChartJS::addDefaultColor(array('fill' => 'rgba(46,204,113,.8)', 'stroke' => '#2ecc71', 'point' => '#2ecc71', 'pointStroke' => '#2ecc71'));



$PolarArea = new ChartJS_PolarArea('example_polararea', 400, 400);
/*
$PolarArea->addSegment(65);
$PolarArea->addSegment(59);
$PolarArea->addSegment(95);
$PolarArea->addSegment(81);
$PolarArea->addSegment(56);
$PolarArea->addSegment(15);
$PolarArea->addSegment(40);
$PolarArea->addSegment(20);
*/


// for ($x = 0; $x < $countx; $x++) {
// 	ChartJS::addDefaultColor(array('fill' => 'rgba(46,204,113,.8)', 'stroke' => '#2ecc71', 'point' => '#2ecc71', 'pointStroke' => '#2ecc71'));
//     //echo "The number is: $regisar[$x] <br>";
// 	$PolarArea->addSegment($totalperbranch[$x]);
// }


$PolarArea->addLabels($menu);
?>
<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

 <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-book"></i> Total Batches</span>
              <div class="count"> 
<?php 

$themonth = date("Y-m");
$themonth1="$themonth-01" ;
$themonth2="$themonth-31" ;

				
						$query3="select count(scb_aid) as sys from student_course_batch where batch_state='Ongoing'";
						//echo "magics";
				


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

</i> </span>
</div>
			
			   <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-suitcase"></i> Total Courses</span>
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
              <span class="count_bottom">
			  			  <?php 
$query3="select count(course_id) as sys from course where state='F'";
$result = mysqli_query($con, $query3);
while($rows=mysqli_fetch_array($result))
{
$mag=$rows['sys'];
}

?>
			  
			 </span>
            </div>
			
			
			
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Lecturers</span>
              <div class="count">
				  <?php 
$todayis = date("Y-m-d");
$lastweek = date ("Y-m-d", strtotime ($todayis ."-7 days"));


						 $query3="select count(id) as sys from lecture_reg";
				


$result = mysqli_query($con, $query3);
while($rows=mysqli_fetch_array($result))
{
$mag=$rows['sys'];
}
echo "$mag";
?>		  
			  
			  
			  </div>
              <span class="count_bottom">
			 

			  </span>
            </div>
			
			
			
			
			</div>



<body>

<!-- <div class="x_content">
<h1>Students enrolled in new Courses </h1>
<h5>*for the current month </h5>
<?php
echo $PolarArea
?>
</div>

<script src="report_gen/chart_polar/Chart.js"></script>
<script src="report_gen/chart_polar/chart.js-php.js"></script>
<script>
    (function () {
        loadChartJsPhp();
    })();
</script> -->
</body>
</html>