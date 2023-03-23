<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password =$_POST['password'];
    $rdate = $_POST['rdate'];

    $id=$_GET['id'];
    $query = mysqli_query($con, "update lecture_reg set nic = '$username',f_name = '$firstname',l_name ='$lastname',email='$email',phone='$phone' where id='$id'");
    if ($query) {
  

        //echo "<script>alert popup()('Data Successfully Added.');</script>";
        echo "<script>alert('Successfully updated!');</script>";
        echo "<script>window.location.href ='view_lecture.php'</script>";
      } else {
        echo "<script>alert('Error occured!');</script>";
        echo "<script>window.location.href ='view_lecture.php'</script>";
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
include 'includes/nav.php';
include 'includes/sidebar.php';
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
              <li class="breadcrumb-item active">Edit Lecturer Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <form class="form-horizontal" action='' method="POST">
    <?php
                                    $id=$_GET['id'];
                                    $ret=mysqli_query($con,"select * from  lecture_reg where id='$id'");
                                    $cnt=1;
                                    while ($row=mysqli_fetch_array($ret)) {

                                    ?>
  <fieldset>
  <h3 class="" style="padding-left:10%">Edit Lecturer Details</h3><br><br>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="username" >NIC*</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="" class="input-xlarge" maxlength="10" style="width: 400px; height:40%; margin-left:0" required value="<?php  echo $row['nic']; ?>" readonly>
        
      </div>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="user" >Username*</label>
      <div class="controls">
        <input type="text" id="user" name="user" placeholder="" class="input-xlarge" maxlength="10" style="width: 400px; height:40%; margin-left:0" required value="<?php  echo $row['username']; ?>" readonly>
        
      </div>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="firstname">First Name*</label>
      <div class="controls">
        <input type="text" id="firstname" name="firstname" placeholder="" style="width: 400px; height:40%;" class="input-xlarge" required value="<?php  echo $row['f_name']; ?>">
        
      </div>
    </div>
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="lastname">Last Name*</label>
      <div class="controls">
        <input type="text" id="lastname" name="lastname" style="width: 400px; height:40%;" placeholder="" class="input-xlarge" required value="<?php  echo $row['l_name']; ?>">
        
      </div>
    </div>
 
    <div class="control-group">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" style="width: 400px; height:40%;" placeholder="" class="input-xlarge" required value="<?php  echo $row['email']; ?>">
        <!-- <p class="help-block">Please provide your E-mail</p> -->
      </div>
    </div>
 
    <div class="control-group">
      <!-- Username -->
      <label class="control-label"  for="phone">Phone*</label>
      <div class="controls">
        <input type="text" id="phone" name="phone" style="width: 400px; height:40%;" placeholder="" class="input-xlarge" required value="<?php  echo $row['phone']; ?>">
        
      </div>
    </div>
   
 
    
 
    <div class="control-group">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-primary" id="submit1" name="submit">Update</button>
        <input type="button" class="btn btn-primary" onclick="location.href='registration.php';" value="Back" style="background-color:#003366; color:#fff"/>
      </div>
    </div>
  </fieldset>
  <?php } ?>
</form>

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
