<?php

include '../connection.php';

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

    <title>ECTC | PDP</title>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- <div class="row" style="padding-left: 30%;"> -->

        <br><br>

        <h3 align="center">Confirmed Lecture Payments</h3>

        <br><br>
        
        <nav class="navbar navbar-default">

            <ul class="nav nav-pills">

                <form class="navbar-form navbar-center" method="post" action="./report_gen/lec_pay_report_excel.php" id="myForm91" name="myForm91" align="center">
                    <div class="form-group">


                        <?php
                        //select menu_section branch
                        $sql21 = "SELECT distinct c_assign.l_name as fname, lecture_reg.l_name as lname from c_assign, lecture_reg where status='T' and lecture_reg.f_name=c_assign.l_name";
                        $sql = mysqli_query($con, $sql21);
                        if (mysqli_num_rows($sql)) {
                            $select = '<select name="item83" id="item83" class="select2_single form-control" tabindex="-1" form="myForm91" required style="width:350px">';
                            $select .= '<option value="%" readonly>--Select a Lecturer--</option>';
                            while ($rs = mysqli_fetch_array($sql)) {
                                $select .= '<option value="' . $rs['fname'] . '">' . $rs['fname'] . ' '. $rs['lname'] . '</option>';
                            }
                        }
                        $select .= '</select>';
                        echo $select;
                        ?>
                        <br><br>
                        <?php

                        $sql22 = "SELECT distinct c_name from c_assign where status='T'";
                        $sql = mysqli_query($con, $sql22);
                        if (mysqli_num_rows($sql)) {
                            $select = '<select name="item88" id="item88" class="select2_single form-control" tabindex="-1" form="myForm91" required style="width:350px">';
                            $select .= '<option value="%">--Select a Batch--</option>';
                            while ($rs = mysqli_fetch_array($sql)) {
                                $select .= '<option value="' . $rs['c_name'] . '">' . $rs['c_name'] . '</option>';
                            }
                        }
                        $select .= '</select>';
                        echo $select;
                        ?>
                        <br><br>


                    </div>
                    <div>

                        <!--  <input type="text" class="form-control" name="item23" id="item23" placeholder="Choose From..." form="myForm91"  \>-->
                        <input type="month" class="form-control" name="item24" id="item24" style="width:350px" placeholder="Choose Month..." form="myForm91" value="<?php echo date("Y-m"); ?>" required\>
                    </div>
                    <br>



                    <div class="btn-group">
                        <!-- <input type="submit" name="viewcsum" class="btn btn-success" value="View Report" form="myForm91" data-toggle="tooltip" /> -->

                        <input type="submit" name="export_viewsummary" class="btn btn-primary" value="Export Report" form="myForm91" data-toggle="tooltip" />
                        <!-- &nbsp; &nbsp; <a href="conpay_view.php?id=<?php echo $row['as_id']; ?>&&month=<?php echo $row['Month']; ?>&&year=<?php echo $row['Year']; ?>" class="btn btn-xs btn-primary">View Report
							<i class="feather icon-clock m-t-10 f-16 "></i> -->
                        </a>
                    </div>
                </form>

            </ul>
        </nav>
        <!-- <form class="form-inline" method="post" action="generate_pdf.php">
<button type="submit" id="pdf" name="generate_pdf" class="btn btn-primary"><i class="fa fa-pdf"" aria-hidden="true"></i>
Generate PDF</button>
</form> -->

    </div>




</body>

</html>