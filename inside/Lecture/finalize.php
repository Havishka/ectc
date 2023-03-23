
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
    <div class="wrapper ">
        <!-- <div class="row" style="padding-left: 30%;"> -->
        <br><br>

    <form method='post' action=''>
    <h3>Approve Payments</h3>
        <table style="margin-top: 2%;">
            <tr>
                <td> <input type="month" class="form-control" name="mydate" id="mydate" style="width:350px" placeholder="Choose a month" value="<?php echo isset($_POST['mydate']) ? htmlspecialchars($_POST['mydate'], ENT_QUOTES) : ''; ?>"  required\></td>
                <?php $mydate = date("Y-m"); ?> 

                <td style="padding-left:2%"> <input type='submit' name='but_search' value='View' id="btnSearch" class="btn btn-xm btn-primary"> </td>
            </tr>
        </table>
    </form>

    <div id="table-container1"></div>

        <table class="table table-striped table-bordered" id="" width="96%" cellspacing="0">
            <thead>
                <tr>
                    <th>Lecturer Name</th>
                    <th>Course Name</th>
                    <th>Batch Code</th>
                    <th>Month</th>
                    <th>Total Hours</th>
                    <th>Payment Rate</th>
                    <th>Hourly Payment</th>
                    <th>Tolal Payment</th>
                    <th>Lecture Coverages</th>
                    <th>Documents</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
                if (isset($_POST['but_search'])) {
                    $mydate = $_POST['mydate'];
                }
            $ret = mysqli_query($con, "select r.f_name as fname, r.l_name as lname, l.*, c.pay_hr 
                                        from lec_pay l, lecture_reg r, c_assign c 
                                        where c.id=l.as_id and l.l_name=r.f_name and finalize IS NULL and l.paid_for like '$mydate%'");

            while ($row = mysqli_fetch_array($ret)) {
            ?>

                <tbody>
                    <tr>
                        <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
                        <td><?php echo $row['course']; ?></td>
                        <td><?php echo $row['c_name']; ?></td>
                        <td><?php echo $row['paid_for']; ?></td>
                        <td><?php echo $row['tot']; ?></td>
                        <td><?php echo $row['rate']; ?></td>
                        <td>Rs. <?php echo $row['pay_hr']; ?></td>
                        <td>Rs. <?php echo $row['pay']; ?></td>
                       <td> 
                            <a href="Lecture/view_lecs.php?id=<?php echo $row['as_id']; ?>&&month=<?php echo $row['paid_for']; ?>" class="btn btn-xs btn-success" target="_blank">View >>
                                        <i class="feather icon-clock m-t-10 f-16 "></i>
                            </a>
                        </td>
                        <td>
                            <a href="<?php echo $row['documents']; ?>" class="btn btn-xs btn-warning" target="_blank">View >><i class="feather icon-clock m-t-10 f-16 "></i></a>
                        </td>
                        <td>
                            <!-- <a href="index.php?tab=finalize&&editid=<?php echo $row['id']; ?>" class="approve btn btn-xs btn-primary">Approve >><i class="feather icon-clock m-t-10 f-16 "></i></a> -->
                             <button <?php $id=$row['id']?>class="approve btn btn-xs btn-primary" type="button" id='del_<?= $id ?>' data-id='<?= $id ?>' name="approve_btn"> Approve >> <i class="feather icon-clock m-t-10 f-16 "></i></button> 
                        </td>
                    </tr>

                </tbody>
            <?php

            } ?>
        </table>
     
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

	<script>
        $(document).ready(function() {
			$('.approve').click(function() {
                var approveid = $(this).data('id');
                if (confirm("Are you sure?")) {
                    $.ajax({
                        url: './Lecture/approve_finalize.php',
                        type: 'get',
                        data: {
                            id: approveid
                        },
                        success: function(response) {
                            if (response == 0){
                                alert('Lecture payment approved successfully!.');
                                setTimeout(function() {
                                    window.location.reload();
                                }, 100);
                            } else {
                                alert('Cannot approve.');
                            }
                        }
                    });
                }
            });

            
        });

	</script>

</body>

</html>