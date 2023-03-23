<?php
include '../connection.php';
ob_start();
$mydate3 = $_POST['item24'];
$mydate2 = "$mydate3-01";
$mydate1 = "$mydate3-31";

$lec22 = $_POST['item83'];
$course22 = $_POST['item88'];

$output = '';

if (isset($_POST["export_viewsummary"])) {

  $q = mysqli_query($con, "select sum(lec_pay.pay) as tot_pay, lec_pay.tot as tot, concat(pay_year,'-0',pay_month) as monthyear, lec_pay.course as course, c_assign.tot_hr as tot_hr, c_assign.hr as hr, lecture_reg.f_name as fname, lecture_reg.l_name as lname from lec_pay, c_assign, lecture_reg where lecture_reg.f_name='$lec22' and c_assign.c_name='$course22' and lec_pay.c_name='$course22' and lec_pay.l_name='$lec22' and concat(pay_year,'-0',pay_month)='$mydate3' group by tot, pay, pay_year, pay_month, course, tot_hr, hr, lecture_reg.l_name");
  while ($row = mysqli_fetch_array($q)) {
    $hours = floor($row['tot_hr'] / 3600);
    $minutes = floor(($row['tot_hr'] / 60) % 60);
    $hours1 = floor($row['hr'] / 3600);
    $minutes1 = floor(($row['hr'] / 60) % 60);

    echo "    <div class='clearfix'></div>";
    echo "   </div>";
    echo "     <div class='x_content'>";
    echo "<h2></h2>";
    echo "<h3 class='text-muted font-24 m-t-30' style='margin-top:20px;'> <b>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<u> ECTC | PDP - Confirmed Lecture Payments Report</u> </b></h3>";

    echo "</br>";
    echo "</br>";

    echo "<tr>";
    echo "<h4 class='text-muted font-15 m-b-15'> &nbsp; &nbsp; &nbsp; &nbsp;<b>* Lecturer Name : ". $row['fname'] ." ". $row['lname'] ."</b></h4>";
    echo "<h4 class='text-muted font-15 m-b-15'> &nbsp; &nbsp; &nbsp; &nbsp;<b>* Course Name : " . $row['course'] . " </b></h4>";
    echo "<h4 class='text-muted font-15 m-b-15'>  &nbsp; &nbsp; &nbsp; &nbsp;<b>* Batch Code : $course22 </b></h4>";
    echo "<h4 class='text-muted font-15 m-b-15'>  &nbsp; &nbsp; &nbsp; &nbsp;<b>* Month : $mydate3  </b></h4>";
    echo "<h4 class='text-muted font-15 m-b-15'>  &nbsp; &nbsp; &nbsp; &nbsp;<b>* Total Course Hours : $hours h : $minutes m   </b></h4>";
    echo "<h4 class='text-muted font-15 m-b-15'>  &nbsp; &nbsp; &nbsp; &nbsp;<b>* Remaining Course Hours : $hours1 h : $minutes1 m </b></h4>";
    echo "<h4 class='text-muted font-15 m-b-15'>  &nbsp; &nbsp; &nbsp; &nbsp;<b>* Covered Hours per Month : " . $row['tot'] . "  </b></h4>";
    echo "<h4 class='text-muted font-15 m-b-15'>  &nbsp; &nbsp; &nbsp; &nbsp;<b>* Total Payment : Rs:" . $row['tot_pay'] . "  </b></h4>";

    echo "<h4 class='text-muted font-15 m-b-15'>  &nbsp; &nbsp; &nbsp; &nbsp;<b>----------------------------------------------------------------------------------------------------- </b></h4>";
    echo "</tr>";
    echo "     <table id='datatable' class='table table-striped table-bordered'>";
    echo "   <thead>";
    echo "   <tr>";
    echo "</tr>";
    echo "   <tr>";
    echo "</tr>";
    echo "   <tr>";

    echo "     <th></th>";
    echo "     <th>Date</th>";
    echo "    <th>Start Time</th>";
    echo "    <th>End Time</th>";
    echo "    <th>Time Duration</th>";
    echo "	  <th>Lecture Coverage</th>";
    echo "     <th></th>";
    echo "</tr>";
    echo "</thead>";
  }
  echo "<tbody>";

  // $query = "select t.* , c.rate from t_time t, c_assign c where t.pay_confirm='Approved' and c.c_name=t.co_name and c.l_name=t.le_name and t.le_name like '$lec22' and t.rdate BETWEEN '" . $mydate2 . "' AND  '" . $mydate1 . "'";
  //$query= "select t.* from t_time t, c_assign c, lec_pay l where t.le_name like '$lec22' and t.co_name like '$course22' and t.rdate BETWEEN '" . $mydate2 . "' AND  '" . $mydate1 . "' and c.id=t.as_id and l.as_id=c.id and l.finalize='Approved'";
  $query = "select t.* from t_time t where t.le_name like '$lec22' and t.co_name like '$course22' and t.rdate BETWEEN '" . $mydate2 . "' AND  '" . $mydate1 . "' and t.approval='Approved'";

  $result = $con->query($query);

  $num_results = $result->num_rows;
  $remainingBal = 0;
  $totIns1 = 0;
  $totIns2 = 0;
  $totIns3 = 0;

  //stylesheet to display colors accordingly
  echo "<style>
		.lowerthan100{
 background-color:red;
 color:white;   
}
.higherthan100{
 background-color:white;   
 color:red;
}
 .lowert{
 background-color:blue;
 color:white;   
 }
 .fullcomplete{
 background-color:LimeGreen;
 color:black;   
 }
 .instnotstarted{
 background-color:GreenYellow;
 color:black;   
 }
 .needattention{
 background-color:OrangeRed;
 color:black;   
 }
 .pastdue{
 background-color:red;
 color:white;  
 }
 .stillpaying{
 background-color:Yellow;
 color:black;   
 }
 .installmentcomplete{
 background-color:LightGreen;
 color:black;   
 }
 
</style>";


  if ($num_results > 0) {

    while ($row = $result->fetch_assoc()) {

      extract($row);
      // echo "<h4 class='text-muted font-15 m-b-15'>  &nbsp; &nbsp; &nbsp; &nbsp;<b>* Month : $rate  </b></h4>";

      $hours = floor($to_time / 3600);
      $minutes = floor(($to_time / 60) % 60);
      echo "<tr>";

      echo "<td></td>";
      echo "<td>{$rdate}</td>";
      echo "<td>{$s_time}</td>";
      echo "<td>{$e_time}</td>";
      echo "<td>$hours h : $minutes m  </td>";
      echo "<td>{$coverage}</td>";
      echo "<td></td>";
      echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "<h4 class='text-muted font-15 m-b-15'>  &nbsp; &nbsp; &nbsp; &nbsp;<b>----------------------------------------------------------------------------------------------------- </b></h4>";
    echo "<h6> &nbsp; &nbsp; &nbsp; &nbsp;System Generated Report on " . date("d/m/Y") . "</h6>";

    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo " </div>";

    echo "<br/> <br/>";

    echo "<div class='clearfix'></div>";
    echo "</div>";
    echo "<div class='x_content'>";

    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=$lec22.$course22.$mydate3.Confirmed_Lecture_Payments.xls");
    echo $output;
  } else if ($lec22 == '' or $course22 == '' or $mydate3 == '') {

    echo "<script>alert('All the fields are required!!!'); window.location.href = '../index.php?tab=f_report'; </script>";
  } else {
    echo "<script>alert('No any confirmed payments for the selected data!!!'); window.location.href = '../index.php?tab=f_report'; </script>";
  }
}
