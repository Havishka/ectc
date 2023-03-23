<?php
session_start();

if (isset($_SESSION['name'])) {



?>


  <?php
  include 'connection.php';
  $lname = $_SESSION['name'];

  $ret = mysqli_query($con, "select count(id) as id5 from c_assign where username='$lname' and hr>0");
  $row4 = mysqli_fetch_array($ret);

  $ret = mysqli_query($con, "select count(id) as id6 from t_time where approval='Approved' and username='$lname' and (MONTH(rdate) = MONTH(CURRENT_DATE()) and YEAR(rdate) = YEAR(CURRENT_DATE()))");
  $row3 = mysqli_fetch_array($ret);

  $ret = mysqli_query($con, "select count(id) as id7 from t_time where approval='Not Approved' and username='$lname' and (MONTH(rdate) = MONTH(CURRENT_DATE()) and YEAR(rdate) = YEAR(CURRENT_DATE()))");
  $row5 = mysqli_fetch_array($ret);

  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ECTC | PDP</title>

    <script>
      function moreinfo(x) {
        if (x == 1) {
          document.getElementById('moreinfo1').style.display = 'block';
          document.getElementById('moreinfo2').style.display = 'none';
          document.getElementById('moreinfo3').style.display = 'none';

          document.getElementById('M1').style.border = '';
          document.getElementById('M2').style.border = 'none';
          document.getElementById('M3').style.border = 'none';

        } else if (x == 2) {
          document.getElementById('moreinfo1').style.display = 'none';
          document.getElementById('moreinfo2').style.display = 'block';
          document.getElementById('moreinfo3').style.display = 'none';

          document.getElementById('M1').style.border = 'none';
          document.getElementById('M2').style.border = '';
          document.getElementById('M3').style.border = 'none';

        }
        else if (x == 3) {
          document.getElementById('moreinfo1').style.display = 'none';
          document.getElementById('moreinfo2').style.display = 'none';
          document.getElementById('moreinfo3').style.display = 'block';

          document.getElementById('M1').style.border = 'none';
          document.getElementById('M2').style.border = 'none';
          document.getElementById('M3').style.border = '';

        }
        return;
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
      include 'includes/nav.php';
      include 'includes/sidbar_l.php';

      ?>

      <!-- Content Wrapper. Contains page content -->
      <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0"></h1>
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
        <section class="content">
          <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-3 col-1">
              </div>
              <div class="col-lg-2 col-3">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3><?php echo $row4['id5']; ?></h3>

                    <p>Assigned Batches</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <button class="small-box-footer" style="width: 100%;" onclick="moreinfo(3)" id="M3">View <i class="fas fa-arrow-circle-right"></i></button>
                </div>
              </div>
              <div class="col-lg-2 col-3">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3><?php echo $row3['id6']; ?></h3>

                    <p>Approved Lectures - <?php echo date('M Y'); ?></p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <button class="small-box-footer" style="width: 100%;" onclick="moreinfo(1)" id="M1">View <i class="fas fa-arrow-circle-right"></i></button>
                </div>
              </div>
              <!-- ./col -->

              <!-- ./col -->
              <div class="col-lg-2 col-3">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3><?php echo $row5['id7']; ?></h3>

                    <p>Approval Pending Lectures</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>

                  <button class="small-box-footer" style="width: 100%;" onclick="moreinfo(2)" id="M2">View <i class="fas fa-arrow-circle-right"></i></button>
                  <div class="col-lg-3 col-1">
                  </div>
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
      <div class="container" style="display: none; width: 80%; padding-left:10%;" id="moreinfo1">
        <h4>Approved Lectures - <?php echo date('M Y'); ?></h4></br>
        <table class="table table-striped table-bordered" width="96%" cellspacing="0">
          <thead>
            <tr>


              <th>Course Name</th>
              <th>Date</th>
              <th>Start Time</th>
              <th>End Time</th>
              <th>Lecture Duration</th>
              <th>Lecture Coverage</th>




            </tr>
          </thead>
          <?php
          $ret = mysqli_query($con, "select * from t_time where approval='Approved' and username='$lname' and (MONTH(rdate) = MONTH(CURRENT_DATE()) and YEAR(rdate) = YEAR(CURRENT_DATE()))");


          while ($row = mysqli_fetch_array($ret)) {
            $hours = floor($row['to_time'] / 3600);
            $minutes = floor(($row['to_time'] / 60) % 60);
          ?>

            <tbody>
              <tr>

                <td><?php echo $row['co_name']; ?></td>
                <td><?php echo $row['rdate']; ?></td>
                <td><?php echo $row['s_time']; ?></td>
                <td><?php echo $row['e_time']; ?></td>
                <td> <?php echo $hours; ?>h :
                  <?php echo $minutes; ?>m</td>
                <td><?php echo $row['coverage']; ?></td>


                </td>
              </tr>

            </tbody>
          <?php
          }
          ?>
        </table>
      </div>



      <div class="container" style="display: none; width: 80%; padding-left:10%;" id="moreinfo2">
        <h4>Approval Pending Lectures </h4></br>
        <table class="table table-striped table-bordered" id="dataTable" width="96%" cellspacing="0">
          <thead>
            <tr>


              <th>Course Name</th>
              <th>Date</th>
              <th>Start Time</th>
              <th>End Time</th>
              <th>Lecture Duration</th>
              <th>Lecture Coverage</th>




            </tr>
          </thead>
          <?php
          $ret = mysqli_query($con, "select * from t_time where approval='Not Approved' and username='$lname' and (MONTH(rdate) = MONTH(CURRENT_DATE()) and YEAR(rdate) = YEAR(CURRENT_DATE()))");


          while ($row = mysqli_fetch_array($ret)) {
            $hours = floor($row['to_time'] / 3600);
            $minutes = floor(($row['to_time'] / 60) % 60);
          ?>

            <tbody>
              <tr>

                <td><?php echo $row['co_name']; ?></td>
                <td><?php echo $row['rdate']; ?></td>
                <td><?php echo $row['s_time']; ?></td>
                <td><?php echo $row['e_time']; ?></td>
                <td> <?php echo $hours; ?>h :
                  <?php echo $minutes; ?>m</td>
                <td><?php echo $row['coverage']; ?></td>


                </td>
              </tr>

            </tbody>
          <?php
          }
          ?>
        </table>
      </div>

      <div class="container" style="display: none; width: 80%; padding-left:10%;" id="moreinfo3">
        <h4>Assigned Batches </h4></br>
        <table class="table table-striped table-bordered" width="96%" cellspacing="0">
          <thead>
            <tr>
            <th>Batch Start Date</th>
            <th>Batch End Date</th>
            <!-- <th>Assigned Date</th> -->
            <th>Course Name</th>
              <th>Batch Code</th>
              <th>Payment Rate</th>
              <th>Total Hours</th>
              <th>Remaining Hours</th>
             




            </tr>
          </thead>
          <?php
          $ret = mysqli_query($con, "select * from c_assign, student_course_batch where username='$lname' and hr>'0' and student_course_batch.batch_remarks=c_assign.c_name");


          while ($row = mysqli_fetch_array($ret)) {
            $hours = floor($row['tot_hr'] / 3600);
            $minutes = floor(($row['tot_hr'] / 60) % 60);
            $hours1 = floor($row['hr'] / 3600);
            $minutes1 = floor(($row['hr'] / 60) % 60);
          ?>

            <tbody>
              <tr>
              <td><?php echo $row['batch_start_date']; ?></td>
              <td><?php echo $row['batch_end_date']; ?></td>
              <!-- <td><?php echo $row['as_date']; ?></td> -->
              <td><?php echo $row['course']; ?></td>
                <td><?php echo $row['c_name']; ?></td>
                <td><?php echo $row['rate']; ?></td>
                <td><?php echo $hours; ?>h : <?php echo $minutes; ?>m</td>
                <td><?php echo $hours1; ?>h : <?php echo $minutes1; ?>m</td>
             


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

  } else {
    header("Location: login.php");
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