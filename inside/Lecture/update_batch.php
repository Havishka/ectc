<?php

include '../connection.php';


if (isset($_POST['submit'])) {
    $tot_hr = $_POST['tot_hr'];
    $hr = ($_POST['tot_hr'] * 10000);
    $pay_hr = $_POST['pay_hr'];
    $rate = $_POST['rate'];
    // $status=$_POST['status'];

    $eid = $_GET['editid'];

    $query = mysqli_query($con, "update c_assign set tot_hr='$hr', pay_hr='$pay_hr' where id='$eid'");
    if ($query) {
        $msg = "Successfully updated!";
        echo "<script>alert('Successfully updated!');</script>";
        echo "<script>window.location.href ='index.php?tab=assign_batch'</script>";
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
            width: 350px;
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

    <title>ECTC | PDP</title>


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper ">
        <!-- <div class="row" style="padding-left: 30%;"> -->


        <div class="frmSearch">
            <h3 align="center">Assigned Courses Details </h3> <br><br>
            <form class="form-inline" method="post">
                <?php
                $cid = $_GET['editid'];
                $ret = mysqli_query($con, "select tot_hr, nic,l_name,c_name,rate,id,pay_hr,course from c_assign where id='$cid'");
                $cnt = 1;
                while ($row = mysqli_fetch_array($ret)) {
                    $hours = floor($row["tot_hr"] / 3600);
                    $minutes = floor(($row["tot_hr"] / 60) % 60);
                ?>

                    <table align="center">
                        <tr>

                            <td> <label for="email">Lecturer Name: </label></td>
                            <td> <input type="text" id="search-box" name="l_name" value="<?php echo $row['l_name'] . ' : ' . $row['nic']; ?>" readonly required="true" style="background-color:#F0F0F0;" />
                                <div id="suggesstion-box" align="center"></div>
                            </td>


                        </tr>
                        <tr style="height:15px"></tr>
                        <tr>

                            <td> <label for="email">Course Name: </label></td>
                            <td> <input type="text" id="search-box" name="course" value="<?php echo $row['course']; ?>" required readonly style="background-color:#F0F0F0;" />

                            </td>


                        </tr>

                        <tr style="height:15px"></tr>
                        <tr>

                            <td> <label for="email">Batch Code: </label></td>
                            <td> <input type="text" id="search-box" name="c_name" value="<?php echo $row['c_name']; ?>" required readonly style="background-color:#F0F0F0;" />

                            </td>


                        </tr>
                        <tr style="height:15px"></tr>
                        <tr>



                            <td> <label for="email">Payment Rate: </label></td>
                            <td> <input type="text" id="search-box" name="rate" value="<?php echo $row['rate']; ?>" readonly required style="background-color:#F0F0F0;" />
                                <div id="suggesstion-box" align="center"></div>
                            </td>



                        </tr>
                        <tr style="height:15px"></tr>
                        <tr>

                            <td> <label for="email">No of Hrs: </label></td>
                            <td> <input type="text" id="search-box" name="tot_hr" value="<?php echo $hours; ?>h : <?php echo $minutes; ?>m" required readonly style="background-color:#F0F0F0;" />
                            </td>


                        </tr>
                        <tr style="height:15px"></tr>
                        <tr>
                            <?php if ($row['rate'] == 'Hourly Rate') { ?>
                                <td> <label for="email">Hourly Rate (Rs): </label></td>
                                <td> <input type="text" id="search-box" name="pay_hr" value="<?php echo $row['pay_hr']; ?>" required />
                                </td>
                            <?php } else if ($row['rate'] == 'Other') { ?>
                                <td> <label for="email">Payment Details: </label></td>
                                <td> <input type="text" id="search-box" name="pay_hr" value="<?php echo $row['pay_hr']; ?>" required />
                                <?php } ?>
                        </tr>
                        <tr style="height:15px"></tr>
                        <tr>
                            <td>
                                <!-- <button type="submit" class="btn btn-primary" name="submit" style=" position: absolute;"> Submit </button></td> -->

                                <?php if (($row['rate'] == 'Hourly Rate') || ($row['rate'] == 'Other')) { ?>
                                    <button type="submit" class="btn btn-primary" name="submit"> Update </button>
                                <?php } ?>
                                <button class="btn btn-danger"> <a href="index.php?tab=assign_batch" style="text-decoration:none;color:#fff">Cancel</a></button>
                            </td>
                            <td>
                                <!-- <button type="submit" class="btn btn-primary" name="submit" style=" position: absolute;"> Submit </button></td> -->
                                <!-- <button class="btn btn-danger" onclick="window.location.href ='assign_batch.php'"> Cancel </button> -->

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




</body>

</html>