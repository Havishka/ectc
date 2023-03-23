<?php

include 'includes/f_sidebar.php';
include 'includes/f_nav.php';
include 'connection.php';

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

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="../pay/js/jquery-2.1.4.js" type="text/javascript"></script>
    <!-- Page level plugin JavaScript-->
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#search-box").keyup(function() {
                $.ajax({
                    type: "POST",
                    url: "search/search.php",
                    data: 'keyword=' + $(this).val(),
                    beforeSend: function() {
                        $("#search-box").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
                    },
                    success: function(data) {
                        $("#suggesstion-box").show();
                        $("#suggesstion-box").html(data);
                        $("#search-box").css("background", "#FFF");
                    }
                });
            });
        });

        function selectCountry(val) {
            $("#search-box").val(val);
            $("#suggesstion-box").hide();
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#search-box_2").keyup(function() {
                $.ajax({
                    type: "POST",
                    url: "search/c_search.php",
                    data: 'keyword=' + $(this).val(),
                    beforeSend: function() {
                        $("#search-box_2").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
                    },
                    success: function(data) {
                        $("#suggesstion-box_2").show();
                        $("#suggesstion-box_2").html(data);
                        $("#search-box_2").css("background", "#FFF");
                    }
                });
            });
        });

        function selectCountry_2(val) {
            $("#search-box_2").val(val);
            $("#suggesstion-box_2").hide();
        }
    </script>




</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper " style="padding-left: 20%;">
        <!-- <div class="row" style="padding-left: 30%;"> -->


        
    <br><br>
   
    <h3>Add Lecture Payments </h3>

<br><br>

<nav class="navbar navbar-default">

<ul class="nav nav-pills">
             
     <form class="navbar-form navbar-left" method="post" action="../report_gen/lec_pay_report_excel.php" id="myForm91" name="myForm91">
       <div class="form-group">

       
<?php 
//select menu_section branch
$sql21="SELECT distinct le_name from t_time where approval='Approved' and f_approval!='Approved'";
$sql = mysqli_query($con, $sql21);
if(mysqli_num_rows($sql)){
$select= '<select name="item83" id="item83" class="select2_single form-control" tabindex="-1" form="myForm91">';
$select.='<option value="%" readonly>--Select a Lecturer--</option>';
while($rs=mysqli_fetch_array($sql)){
     $select.='<option value="'.$rs['le_name'].'">'.$rs['le_name'].'</option>';
 }
}
$select.='</select>';
echo $select;		
?>
<br><br>	
<?php 

$sql22="SELECT distinct co_name from t_time where approval='Approved' and f_approval!='Approved'";
$sql = mysqli_query($con, $sql22);		
if(mysqli_num_rows($sql)){
$select= '<select name="item88" id="item88" class="select2_single form-control" tabindex="-1" form="myForm91">';
$select.='<option value="%">--Select a Course--</option>';
while($rs=mysqli_fetch_array($sql)){
     $select.='<option value="'.$rs['co_name'].'">'.$rs['co_name'].'</option>';
 }
}
$select.='</select>';
echo $select;		
?>
<br><br>	
       
       
       </div><div>
       
      <!--  <input type="text" class="form-control" name="item23" id="item23" placeholder="Choose From..." form="myForm91"  \>-->
        <input type="text" class="form-control" name="item24" id="item24" placeholder="Choose Month..." form="myForm91"  value="<?php echo date("Y-m"); ?>"  \>
       </div>
       <br>
               
                          
                          
                                <div class="btn-group">
                                <!-- <input type="submit" name="viewcsum" class="btn btn-success" value="View Report" form="myForm91" data-toggle="tooltip" /> -->
                      
                          <input type="submit" name="" class="btn btn-PRIMARY" value="View" form="myForm91" data-toggle="tooltip"/>
                          <!-- <a href="view_approve_f.php?le_name=<?php echo $row['le_name']; ?>" class="btn btn-xs btn-primary"> -->
                       </div>
     </form>
     
</ul>
</nav>
        <!-- <form class="form-inline" method="post" action="generate_pdf.php">
<button type="submit" id="pdf" name="generate_pdf" class="btn btn-primary"><i class="fa fa-pdf"" aria-hidden="true"></i>
Generate PDF</button>
</form> -->

    </div>












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




    <?php include 'includes/footer.php'; ?>

</body>

</html>