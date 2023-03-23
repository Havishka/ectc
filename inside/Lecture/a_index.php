<?php 
session_start();
if(isset($_SESSION['username'] )){


  

?>
<?php 
include 'connection.php';


$ret=mysqli_query($con,"select count(id) as id4 from lecture_reg ");
 $row4=mysqli_fetch_array($ret); 

 $ret=mysqli_query($con,"select count(course_id) as id5 from course where state='T'");
 $row=mysqli_fetch_array($ret); 

 $ret=mysqli_query($con,"select count(id) as id6 from lec_pay where approve='Approved' and (pay_month = MONTH(CURRENT_DATE()) and pay_year = YEAR(CURRENT_DATE()))");
 $row3=mysqli_fetch_array($ret);  

 $ret=mysqli_query($con,"select count(id) as id7 from lec_pay where approve!='Approved'");
 $row5=mysqli_fetch_array($ret);  

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CADD</title>

  <script>
  function moreinfo(x){
    if (x==1){
      document.getElementById('moreinfo1').style.display = 'block';
      document.getElementById('moreinfo2').style.display = 'none';
      document.getElementById('moreinfo3').style.display = 'none';
      document.getElementById('moreinfo4').style.display = 'none';

      document.getElementById('M1').style.border = '';
      document.getElementById('M2').style.border = 'none';
      document.getElementById('M3').style.border = 'none';
      document.getElementById('M4').style.border = 'none';
    }
    else if (x==2){
      document.getElementById('moreinfo1').style.display = 'none';
      document.getElementById('moreinfo2').style.display = 'block';
      document.getElementById('moreinfo3').style.display = 'none';
      document.getElementById('moreinfo4').style.display = 'none';

      document.getElementById('M1').style.border = 'none';
      document.getElementById('M2').style.border = '';
      document.getElementById('M3').style.border = 'none';
      document.getElementById('M3').style.border = 'none';
    }
    else if (x==3){
      document.getElementById('moreinfo1').style.display = 'none';
      document.getElementById('moreinfo2').style.display = 'none';
      document.getElementById('moreinfo3').style.display = 'block';
      document.getElementById('moreinfo4').style.display = 'none';

      document.getElementById('M1').style.border = 'none';
      document.getElementById('M2').style.border = 'none';
      document.getElementById('M3').style.border = '';
      document.getElementById('M3').style.border = 'none';
    }
    else if (x==4){
      document.getElementById('moreinfo1').style.display = 'none';
      document.getElementById('moreinfo2').style.display = 'none';
      document.getElementById('moreinfo3').style.display = 'none';
      document.getElementById('moreinfo4').style.display = 'block';

      document.getElementById('M1').style.border = 'none';
      document.getElementById('M2').style.border = 'none';
      document.getElementById('M3').style.border = 'none';
      document.getElementById('M3').style.border = '';
    }
  }
  
  
  </script>
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
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

 
<?php 
include 'includes/a_nav.php';
include 'includes/a_sidbar.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">Dashboard</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" style="padding-left:5%">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-lg-2 col-6"></div>
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $row4['id4']; ?></h3>

                <p>Total Lecturers</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <button class="small-box-footer" style="width: 100%;" onclick="moreinfo(1)" id="M1">View <i class="fas fa-arrow-circle-right"></i></button>
            </div>
          </div>
          <!-- ./col -->
               <!-- ./col -->
               <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $row['id5']; ?></h3>

                <p>Total Courses</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <button class="small-box-footer" style="width: 100%;" onclick="moreinfo(2)" id="M2">View <i class="fas fa-arrow-circle-right"></i></button>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $row3['id6']; ?></h3>

                <p>Approved Lectures - <?php echo date('M Y'); ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <button class="small-box-footer" style="width: 100%;" onclick="moreinfo(3)" id="M3">View <i class="fas fa-arrow-circle-right"></i></button>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $row5['id7']; ?></h3>

                <p>Approval Pending</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <button class="small-box-footer" style="width: 100%;" onclick="moreinfo(4)" id="M4">View <i class="fas fa-arrow-circle-right"></i></button>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
       

          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
<br><br>
    <div class="container" style=" display:none; width: 80%; padding-left:8%" id="moreinfo1">
    <h3>Lecturer Details</h3><br>
            <table class="table table-striped table-bordered" id="dataTable" width="96%"   cellspacing="0">
            <thead>
                <tr>

                    
                    <th>Lecturer Name</th>
                     <th>Email</th>
                   
                    <th>Phone Number</th>
                    
        
                </tr>
            </thead>
            <?php
              $ret=mysqli_query($con,"select * from  lecture_reg");
              

              while ($row = mysqli_fetch_array($ret)){
            
            ?>

                <tbody>
                    <tr>
                       
                        <td><?php echo $row['f_name']; ?> <?php echo $row['l_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                       
                        <td><?php echo $row['phone']; ?></td>
                        
                        </td>
                    </tr>

                </tbody>
            <?php
              }
            ?>
        </table>
    </div>


    <div class="container" style=" display: none; width: 80%; padding-left:8%" id="moreinfo2">
    <h3>Course Details</h3><br>
    <table class="table table-striped table-bordered"   width="96%"   cellspacing="0">
            <thead>
                <tr>

                    
                    <th>Course Name</th>
                     <th>Course Fee</th>
                    <th>Duration</th>
                   
                    
                   


                </tr>
            </thead>
            <?php
              $ret=mysqli_query($con,"select * from course where state!='F'");
              

              while ($row = mysqli_fetch_array($ret)){
            
            ?>

                <tbody>
                    <tr>
                       
                        <td><?php echo $row['c_name']; ?></td>
                        <td>Rs. <?php echo $row['course_fee']; ?></td>
                        <td><?php echo $row['duration']; ?> months</td>
                       
                        
                        
                        </td>
                    </tr>

                </tbody>
            <?php
              }
            ?>
        </table>
    </div>


    <div class="container" style="display: none; width: 80%; padding-left:8% " id="moreinfo3">
    <h3>Payments Approved Lectures - <?php echo date('M Y'); ?></h3><br>
            <table class="table table-striped table-bordered" id="dataTable" width="96%"   cellspacing="0">
            <thead>
                <tr>

                <th>Lecturer Name</th>
                    <th>Course Name</th>
                     <th>Payment Rate</td>
                    <th>Total hours</th>
                    <th>Payment Month</th>
                    <th>Pay Amount</th>
                   


                </tr>
            </thead>
            <?php
              $ret=mysqli_query($con,"select * from lec_pay where approve='Approved' and (pay_month = MONTH(CURRENT_DATE()) and pay_year = YEAR(CURRENT_DATE()))");
              

              while ($row = mysqli_fetch_array($ret)){
                // $hours = floor($row['tot'] / 3600);
                // $minutes = floor(($row['tot'] / 60) % 60);
            ?>

                <tbody>
                    <tr>
                       
                        <td><?php echo $row['l_name']; ?></td>
                        <td><?php echo $row['c_name']; ?></td>
                        <td><?php echo $row['rate']; ?></td>
                        <td>	<?php echo $row['tot']; ?></td>
                        <td><?php echo $row['pay_month']; ?></td>
                        <td><?php echo $row['pay']; ?></td>
                        
                        </td>
                    </tr>

                </tbody>
            <?php
              }
            ?>
        </table>
    </div>

    <div class="container" style="display: none; width: 80%; padding-left:8% " id="moreinfo4">
    <h3>Payment Approval Pending Lectures</h3><br>
            <table class="table table-striped table-bordered" id="dataTable" width="96%"   cellspacing="0">
            <thead>
                <tr>

                <th>Lecturer Name</th>
                    <th>Course Name</th>
                     <th>Payment Rate</td>
                    <th>Total hours</th>
                    <th>Payment Month</th>
                    <th>Pay Amount</th>
                   


                </tr>
            </thead>
            <?php
              $ret=mysqli_query($con,"select * from lec_pay where approve!='Approved'");
              

              while ($row = mysqli_fetch_array($ret)){
                // $hours = floor($row['tot'] / 3600);
                // $minutes = floor(($row['tot'] / 60) % 60);
            ?>

                <tbody>
                    <tr>
                       
                        <td><?php echo $row['l_name']; ?></td>
                        <td><?php echo $row['c_name']; ?></td>
                        <td><?php echo $row['rate']; ?></td>
                        
                        <td>	<?php echo $row['tot']; ?></td>
                        <td><?php echo $row['pay']; ?></td>
                        
                        </td>
                    </tr>

                </tbody>
            <?php
              }
            ?>
        </table>
    </div>

  <!-- /.content-wrapper -->
<?php 
include 'includes/footer.php';
}else{
  header ("Location: ../../index.php");
  exit();
}

?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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
