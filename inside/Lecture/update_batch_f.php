<?php
include 'includes/f_sidebar.php';
include 'includes/f_nav.php';
include 'connection.php';

if (isset($_POST['submit'])) {
    $search2 = $_POST['search-box'];
    $search3 = $_POST['search-box_2'];
    $rate = $_POST['rate'];
    // $status=$_POST['status'];

    $eid = $_GET['editid'];

    $query = mysqli_query($con, "update c_assign  set l_name='$search2', c_name='$search3',rate='$rate' where id='$eid'");
    if ($query) {
        $msg = "Successfully updated!";
        echo "<script>alert('Successfully updated!');</script>";
        echo "<script>window.location.href ='assign_batch_f.php'</script>";
    } else {
        $msg = "Error occured!";
    }
}
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

        #status {
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


        <div class="frmSearch">

            <form class="form-inline" method="post">
                <?php
                $cid = $_GET['editid'];
                $ret = mysqli_query($con, "select * from  c_assign where id='$cid'");
                $cnt = 1;
                while ($row = mysqli_fetch_array($ret)) {

                ?>

                    <table>
                        <tr>

                            <td> <label for="email">Lecture Name: </label></td>
                            <td> <input type="text" id="search-box" name="search-box" value="<?php echo $row['l_name']; ?>" readonly required placeholder="Search By First Name.." name="nicpost" autocomplete="off" required="true" />
                                <div id="suggesstion-box" align="center"></div>
                            </td>


                        </tr>

                        <tr style="height:15px"></tr>
                        <tr>

                            <td> <label for="email">Course Name: </label></td>
                            <td> <input type="text" id="search-box_2" name="search-box_2" value="<?php echo $row['c_name']; ?>" required placeholder="Search By Name..." name="nicpost_2" autocomplete="off" required="true" readonly />
                                <div id="suggesstion-box_2" align="center"></div>
                            </td>


                        </tr>
                        <tr style="height:15px"></tr>
                        <tr>

                            <td> <label for="email">Course Rate: &nbsp;</label></td>
                            <td>
                                <div class="field">

                                    <select name="rate" id="rate" width="100px" class="field" value="<?php echo $row['selected']; ?>">
                                        <!-- <option>     --Select Rate--   </option> -->
                                        <option value="30% Rate"> 30% Rate</option>
                                        <option value="Hourly Rate"> Hourly Rate</option>

                                    </select>
                                </div>
                            </td>


                        </tr>
                        <tr style="height:15px"></tr>
                        <tr>

                            <td> <label for="email">No of Hrs: </label></td>
                            <td> <input type="text" id="search-box" name="search-box" value="<?php echo $row['tot_hr']; ?>" required placeholder="Search By First Name.." name="tot" autocomplete="off" required="true" />
                            </td>


                        </tr>
                        <tr style="height:15px"></tr>
                        <tr>

                            <td> <label for="email">Horly Rate: </label></td>
                            <td> <input type="text" id="search-box" name="search-box" value="<?php echo $row['pay_hr']; ?>" readonly required placeholder="Search By First Name.." name="pay_hr" autocomplete="off" required="true" />
                            </td>


                        </tr>
                        <tr style="height:15px"></tr>
                        <tr>
                            <td>
                                <!-- <button type="submit" class="btn btn-primary" name="submit" style=" position: absolute;"> Submit </button></td> -->
                                <button type="submit" class="btn btn-primary" name="submit" > Update </button>
                            </td>
                        </tr>

                        <tr style="height:15px"></tr>
                    </table>
                    <!-- <div class="form-group">
                    <label for="name">Lecture Name: </label> <br>
                    <br> <input type="text" id="search-box" name="search-box"  size="60"   value="<?php echo $row['l_name']; ?>" readonly/>
                    <div id="suggesstion-box" align="center" ></div>

                </div>
                <br><br>
                <div class="form-group">
                    <label for="cname">Course Name: </label></br>
                    <br> <input type="text" id="search-box_2"  name="search-box_2" required placeholder="Search By Name..." size="60" value="<?php echo $row['c_name']; ?>" />
                    <div id="suggesstion-box_2" align="center"></div>

                </div> -->

                    <!-- <div class="form-group">
                    <label for="cstatus">Course Status: </label></br>
                    <br> <input type="text" id="status" name="status"  size="60"  required="true" value="<?php echo 'T'; ?>"/>
            

                </div> -->


                <?php } ?>


            </form>

        </div>
    </div>



    <?php include 'includes/footer.php'; ?>



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