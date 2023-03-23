<script>
    function myFunction() {
        var x = document.getElementById("mySelect").value;
    }
</script>

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<?php

session_start();
if (isset($_SESSION['name'])) {
    include 'includes/sidbar_l.php';
    include 'includes/nav.php';
    include 'connection.php';
    if (isset($_POST['submit'])) {
        $id = $_GET['id'];
        $err;
        $nicpost = $_POST['search-box'];
        $stime = $_POST['stime'];
        $etime = $_POST['etime'];

        $coverage = $_POST['coverage'];
        $rdate = $_POST['rdate'];
        $name = $_SESSION['name'];
        $course_id = $_POST['course_id'];

        $check1 = mysqli_query($con, "select * from student_course_batch where '$rdate' NOT BETWEEN batch_start_date and batch_end_date and batch_remarks='$course_id'");
        if (mysqli_num_rows($check1) == 0) {

        $query = mysqli_query($con, "update t_time set coverage='$coverage',rdate='$rdate' where id='$id'");

        if ($query) {
            //echo "<script>alert('Successfully updated!');</script>";
            //echo "<script>window.location.href ='update_time.php'</script>";
            ?>
            <div class="alert alert-info" style="width: 25%;margin-left:50%; margin-top:2%">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Successfully added!</strong>
			</div>

            <script>
                setTimeout("location.href='update_time.php';" , 1500);
            </script>

            <?php

        } else {
            ?>
            <div class="alert alert-danger" style="width: 25%;margin-left:50%; margin-top:2%">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Something Went Wrong. Please try again!</strong>
            </div>
            <?php
        }
    }
        else {
            echo "<script>alert('Check batch start/end date!');</script>";
        }
    }

} else {
    header("Location: login.php");
    exit();
}
$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            width: 250px;
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
            width: 250px;
        }

        .field {
            padding: 10px;
            border: #eaedeb 1px solid;
            border-radius: 12px;
            width: 250px;
        }

        #field1 {
            padding: 10px;
            border: #eaedeb 1px solid;
            border-radius: 12px;
            width: 250px;
        }

        #field2 {
            padding: 10px;
            border: #eaedeb 1px solid;
            border-radius: 12px;
            width: 250px;
        }

        #field3 {
            padding: 10px;
            border: #eaedeb 1px solid;
            border-radius: 12px;
            width: 250px;
        }

        #brand {
            padding: 10px;
            border: #eaedeb 1px solid;
            border-radius: 12px;
            width: 250px;
        }

        #field1 {
            padding: 10px;
            border: #eaedeb 1px solid;
            border-radius: 12px;
            width: 500px;
        }

        #tlecture {
            padding: 10px;
            border: #eaedeb 1px solid;
            border-radius: 12px;
        }

        #search-box_2 {
            padding: 10px;
            border: #eaedeb 1px solid;
            border-radius: 12px;
            width: 250px;
        }

        #status {
            padding: 10px;
            border: #eaedeb 1px solid;
            border-radius: 12px;
        }
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: 'Varela Round', sans-serif;
        }

        .modal-confirm {
            color: #636363;
            width: 325px;
            font-size: 14px;
        }

        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
        }

        .modal-confirm .modal-header {
            border-bottom: none;
            position: relative;
        }

        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -15px;
        }

        .modal-confirm .form-control,
        .modal-confirm .btn {
            min-height: 40px;
            border-radius: 3px;
        }

        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -5px;
        }

        .modal-confirm .modal-footer {
            border: none;
            text-align: center;
            border-radius: 5px;
            font-size: 13px;
        }

        .modal-confirm .icon-box {
            color: #fff;
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: -70px;
            width: 95px;
            height: 95px;
            border-radius: 50%;
            z-index: 9;
            background: #82ce34;
            padding: 15px;
            text-align: center;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
        }

        .modal-confirm .icon-box i {
            font-size: 58px;
            position: relative;
            top: 3px;
        }

        .modal-confirm.modal-dialog {
            margin-top: 80px;
        }

        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #82ce34;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            border: none;
        }

        .modal-confirm .btn:hover,
        .modal-confirm .btn:focus {
            background: #6fb32b;
            outline: none;
        }

        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECTC | PDP</title>
    <link rel="icon" type="image/jpg" href="../../images/logo.jpg">

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
    <!-- <script src="../pay/js/jquery-2.1.4.js" type="text/javascript"></script> -->
    <!-- Page level plugin JavaScript-->
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        $(document).ready(function() {
            $("#search-box_2").keyup(function() {
                $.ajax({
                    type: "POST",
                    url: "search/le_check.php",
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
    <script>
        function date() {
            p = "1/1/1970 ";
            var starth = document.getElementById("stime").value;
            var endh = document.getElementById("etime").value;
            var difference = new Date(new Date(p + endh) - new Date(p + starth)).toUTCString().split(" ")[4];
            document.getElementById("tlecture").value = difference;
        }
    </script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="index_l.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Lecture Coverage </li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <h3 align="center" style="padding-left: 10%;">Edit Lecture Coverage</h3>
    <div class="wrapper" style="padding-left: 10%;">
        <!-- <div class="row" style="padding-left: 30%;"> -->
        <br>

        <div>
            <form method="post" >
                <table id="table1" ; cellspacing="15px" cellpadding="10%" ; align="center">
                    <?php
                    $id = $_GET['id'];
                    $ret = mysqli_query($con, "select * from t_time where id='$id' ");

                    while ($row = mysqli_fetch_array($ret)) {
                        ?>
                        <tr>
                            <td align="right">Lecturer Name :</td>
                            <td>
                                <input type="text" id="search-box" name="search-box" value="<?php echo $row['le_name']; ?>" readonly style="background-color: #F5F5F5;" />
                                <div id="suggesstion-box" align="center"></div>
                            </td>
                        </tr>

                        <tr>
                            <td align="right">Batch Code :</td>
                            <td>
                                <input type="text" id="search-box" name="course_id" value="<?php echo $row['co_name']; ?>" readonly style="background-color: #F5F5F5;" />
                            </td>
                        </tr>

                        <tr>
                            <td align="right">Start Time :</td>
                            <td>
                                <input type="time" class="field" name="stime" required="true" value="<?php echo $row['s_time']; ?>" readonly style="background-color: #F5F5F5;" />
                            </td>
                        </tr>

                        <tr>
                            <td align="right">End Time :</td>
                            <td>
                                <input type="time" class="field" name="etime" required="true" value="<?php echo $row['e_time']; ?>" readonly style="background-color: #F5F5F5;" />
                            </td>
                        </tr>

                        <tr>
                            <!-- <td  align="right" >Lecture Duration :</td>    
                            <td >     <input type="text" id="field"  name="tlecture"  onclick="date()" placeholder="00:00:00"/></div></td>     -->
                            <td align="right">Date :</td>
                            <td>
                                <input type="date" class="field" name="rdate" required="true" value="<?php echo $row['rdate']; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td align="right">Lecture Coverage :</td>
                            <td>
                                <input type="text" id="coverage" name="coverage" class="field" required value="<?php echo $row['coverage']; ?>"></textarea>
                            </td>
                        </tr>

                    <?php
                    } ?>
                    <tr style="height: 15px;"></tr>
                    <tr>
                        <td></td>
                        <td align="center">
                            <button type="submit" class="btn btn-danger" name="submit" style="width: 90px;"> <a href="update_time.php" style="text-decoration: none;color:white">Cancel</a></button>
                            <button type="submit" class="btn btn-primary" id="submit" name="submit" style="width: 90px;"> Update</button>
                        </td>
                    </tr>
                </table>
                <br>
                <br>
            </form>
        </div>

    </div>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p>Successfully added!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#brand').change(function() {
                var c_name = $(this).val();
                $.ajax({
                    url: "load_data.php",
                    method: "POST",
                    data: {
                        c_name: c_name
                    },
                    success: function(data) {
                        $('#show_product').html(data);
                    }
                });
            });
        });
    </script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

    <script> 
        $('#submit').click(function () {
            $coverage=$("#coverage").val(); 
            
            $.ajax({
                url:"update_time.php", 
                method:"POST", 
                data:{
                    coverage: $coverage,
                }, 
                success:function(){
                    window.location.href="./Lecture/update_time.php"; 
            }}); 
        
        }); 
   
    </script>  -->

</body>

</html>