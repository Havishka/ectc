<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $l_name = $_POST['l_name'];
    $c_name = $_POST['c_name'];
    $tot = $_POST['tot'];
    $rate =$_POST['rate'];
    $pay = $_POST['pay'];
    $rem_pay = $_POST['rem_pay'];
    $pay_month = $_POST['pay_month'];
    $pay_date = $_POST['pay_date'];
    $id=$_GET['id'];
    $month=$_GET['month'];
    $year=$_GET['year'];
    $query = mysqli_query($con, "insert into  lec_pay (l_name,c_name,tot,rate,pay,rem_pay,pay_month,pay_year,sy_date,as_id) value('$l_name','$c_name','$tot','$rate','$pay','$rem_pay','$month','$year','$pay_date',$id)");
    if ($query) {
  //$q1=mysqli_query($con, "update lec_pay set rem_pay='$rem_pay' where as_id=$id and pay_month='$month' and pay_year='$year'");

        //echo "<script>alert popup()('Data Successfully Added.');</script>";
        // echo "<script>alert('Successfully added the payment details!');</script>";
        // echo "<script>window.location.href ='f_approve.php'</script>";
      } else {
        echo "<script>alert('Error occured!');</script>";
        echo "<script>window.location.href ='f_approve.php'</script>";
      }
    }
    
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  </head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php 
include 'includes/f_nav.php';
include 'includes/f_sidebar.php';
?>


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Payments</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <form class="form-horizontal" action='' method="POST">
    <?php
                                    $id=$_GET['id'];
                                    $month=$_GET['month'];
                                    $year=$_GET['year'];
                                    $ret=mysqli_query($con,"select SEC_TO_TIME(SUM(TIME_TO_SEC(t.to_time))) as total, c.*, l.rem_pay from t_time t, c_assign c, lec_pay l where MONTH(t.rdate)='$month' and YEAR(t.rdate)='$year' and t.as_id=$id and c.id=t.as_id and l.as_id=t.as_id and t.approval='Approved' and l.pay_month='$month' and l.pay_year='$year'");
                                    $cnt=1;
                                    while ($row=mysqli_fetch_array($ret)) {

                                    ?>
  <fieldset>
  <h3 class="" style="padding-left:10%">Add Payments - <?php echo $month.' / '.$year; ?></h3><br><br>
  <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="pay_month" >Month</label>
      <div class="controls">
     
        <input type="text" id="pay_month" name="pay_month" placeholder="" class="input-xlarge" maxlength="10" style="width: 400px; height:40%; margin-left:0" required value=" <?php echo $month.' / '.$year; ?>" readonly>
        
      </div>
      </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="l_name" >Lecturer Name</label>
      <div class="controls">
        <input type="text" id="l_name" name="l_name" placeholder="" class="input-xlarge" maxlength="10" style="width: 400px; height:40%; margin-left:0" required value="<?php  echo $row['l_name']; ?>" readonly>
        
      </div>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="c_name">Course Name</label>
      <div class="controls">
        <input type="text" id="c_name" name="c_name" placeholder="" style="width: 400px; height:40%;" class="input-xlarge" required value="<?php  echo $row['c_name']; ?>" readonly>
        
      </div>
    </div>

    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="to_time">Total Hours per Month</label>
      <div class="controls">
        <input type="text" id="tot" name="tot" style="width: 400px; height:40%;" placeholder="" class="input-xlarge" required value="<?php  echo $row['total']; ?>" readonly>
        
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="rate">Payment Rate</label>
      <div class="controls">
        <input type="text" id="rate" name="rate" style="width: 400px; height:40%;" placeholder="" class="input-xlarge" required value="<?php  echo $row['rate']; ?>" readonly>
        <!-- <p class="help-block">Please provide your E-mail</p> -->
      </div>
    </div>
    <?php
    $q="select * from lec_pay where as_id='$id' and pay_month='$month' and pay_year='$year'";
    $result = $con->query($q);
    $num_results = $result->num_rows;

if( $num_results > 0){ 
    ?>
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="rem_pay">Remaining Payment</label>
      <div class="controls">
        <input type="text" id="rem_pay" name="rem_pay" style="width: 400px; height:40%;" placeholder="" class="input-xlarge" required value="Rs. <?php  echo $row['rem_pay']; ?>" readonly>
        <!-- <p class="help-block">Please provide your E-mail</p> -->
      </div>
    </div>
 <?php } ?>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="pay">Payable Amount</label>
      <div class="controls">
        <input type="text" id="pay" name="pay" style="width: 400px; height:40%;" placeholder="" class="input-xlarge" required >
        
      </div>
    </div>
    <div class="control-group">
  
      <label class="control-label"  for="rem_pay">Remaining Payment</label>
      <div class="controls">
        <input type="text" id="rem_pay" name="rem_pay" style="width: 400px; height:40%;" placeholder="" class="input-xlarge" required >
        
      </div>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="pay">Pay Date</label>
      <div class="controls">
        <input type="date" id="pay_date" name="pay_date" style="width: 400px; height:40%;" placeholder="" class="input-xlarge" required >
        
      </div>
    </div>
    
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-primary" id="submit1" name="submit">Add Payment</button>
        <!-- <button class="btn btn-danger" id="submit2" name="submit">Cancel</button> -->
      </div>
    </div>
  </fieldset>
  <?php } ?>
</form>
<table class="table table-striped table-bordered" id="" width="80%" cellspacing="0">
            <thead>
                <tr>

                    
                    <th>Date</th>
                     <th>Start Time</th>
                    <th>End Time</th>
                    <th>Total Hours</th>
                    <th>Lecture Coverage</th>
                


                </tr>
            </thead>
            <?php
             $id=$_GET['id'];
            $ret = mysqli_query($con, "select * from t_time where as_id=$id and approval='Approved' and MONTH(rdate)='$month' and YEAR(rdate)='$year'");
            // and (MONTH(rdate) = MONTH(CURRENT_DATE()) and YEAR(rdate) = YEAR(CURRENT_DATE()))

            while ($row = mysqli_fetch_array($ret)) {
            ?>

                <tbody>
                    
                        <td><?php echo $row['rdate']; ?></td>
                        <td><?php echo $row['s_time']; ?></td>
                        <td><?php echo $row['e_time']; ?></td>
                        <td><?php echo $row['to_time']; ?></td>
                        <td><?php echo $row['coverage']; ?></td>
                     
                      
                    </tr>

                </tbody>
            <?php

            } ?>
        </table>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<?php
include 'includes/footer.php';
?>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
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
