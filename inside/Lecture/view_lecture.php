<?php 
include 'includes/sidebar.php';
include 'includes/nav.php';
include 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
</head>
<body>

<div class="main-body">
<div class="container " style="padding-left: 5%;  padding-top:03%;">

<h4>Lecturer Details</h4><br>
    <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>NIC</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Registerd Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
                                $ret=mysqli_query($con,"select *from lecture_reg ");
                              
                                while ($row=mysqli_fetch_array($ret)) {
                                ?> 
      
        <tbody>
            <tr>
            <td><?php  echo $row['nic'];?></td>
            <td><?php  echo $row['f_name'];?></td>
            <td><?php  echo $row['l_name'];?></td> 
            <td><?php  echo $row['email'];?></td> 
            <td><?php  echo $row['phone'];?></td>
            <td><?php  echo $row['r_date'];?></td>
            <td><a href="edit_lec.php?id=<?php echo $row['id']; ?>" class="btn btn-xs btn-primary">Edit<i class="feather icon-clock m-t-10 f-16 "></i></a>
                        <a href="delete_lec.php?id=<?php echo $row['id']; ?>" class="btn btn-xs btn-danger">Delete<i class="feather icon-clock m-t-10 f-16 "></i></a></td>
                  
            </tr>
           
        </tbody>
        <?php 
                                
                                }?>
    </table>





    
</div>

</div>


<?php include 'includes/footer.php';?>


<script>
    $(document).ready(function() {
          $('#dataTable').DataTable();
    });
</script>

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