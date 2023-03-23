

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
        <h4>Approve Lecture Coverages</h4> <br><br>
        <form method='get' action='/'>

<!-- <table>

    <tr>
        <td> <input type="month" class="form-control" name="mydate" id="mydate" style="width:350px" placeholder="Choose Month..." value="<?php echo date("Y-m"); ?>" required\></td>
        <?php $mydate = date("Y-m"); ?>
        <td style="width: 5px;"></td>
        <td> <?php

                $sql21 = "SELECT * from lecture_reg order by f_name ASC";
                $sql = mysqli_query($con, $sql21);
                if (mysqli_num_rows($sql)) {
                    $selectq = '<select name="item84" id="item84" class="select2_single form-control" tabindex="-1" required>';
                    $selectq .= '<option value="" readonly>--Select a Lecturer--</option>';
                    while ($rs = mysqli_fetch_array($sql)) {
                        $selectq .= '<option value="' . $rs['username'] . '">' . $rs['f_name'] . ' ' . $rs['l_name'] .  '</option>';
                    }
                }
                $selectq .= '</select>';
                echo $selectq;
                ?></td>
        <td style="width: 5px;"></td>
        <td> <input type='submit' name='but_search' value='View' id="btnSearch" class="btn btn-s btn-primary"> </td>
    </tr>
</table> -->
</form>
<br>
<!-- <?php 

if (isset($_POST['but_search'])) {
$mydate = $_POST['mydate'];
$select = $_POST['item84'];

?>
<h4>Month | <?php echo $mydate; ?> </h4> <br>
<?php }?> -->

        <table class="table table-striped table-bordered" id="" width="96%" cellspacing="0">
            <thead>
                <tr>

                    <th>Lecturer Name</th>
                    <th>Course Name</th>
                    <th>Batch Code</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Total Hours</th>
                    <th>Lecture Coverage</th>
                    <th>Action</th>

                </tr>
            </thead>
            <?php
            $ret = mysqli_query($con, "select t.*, l.f_name as fname, l.l_name as lname from t_time t, lecture_reg l where t.approval='Not Approved' and t.username=l.username order by l.f_name, t.rdate asc");
            if (mysqli_num_rows($ret) > 0) {
            while ($row = mysqli_fetch_array($ret)) {

                $hours = floor($row['to_time'] / 3600);
                $minutes = floor(($row['to_time'] / 60) % 60);
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
                        <td><?php echo $row['course']; ?></td>
                        <td><?php echo $row['co_name']; ?></td>
                        <td><?php echo $row['rdate']; ?></td>
                        <td><?php echo $row['s_time']; ?></td>
                        <td><?php echo $row['e_time']; ?></td>
                        <td>
                            <?php echo $hours; ?>h :
                            <?php echo $minutes; ?>m

                        </td>
                        <td><?php echo $row['coverage']; ?></td>
                        <td>
                            <button <?php $id=$row['id']?>class="approve btn btn-xs btn-primary" type="button" id='del_<?= $id ?>' data-id='<?= $id ?>' name="approve_btn"> Approve<i class="feather icon-clock m-t-10 f-16 "></i></button>
                            <!-- <a href="./index.php?tab=approve_lecs&&editid=<?php echo $row['id']; ?>" class="btn btn-xs btn-primary">Approve<i class="feather icon-clock m-t-10 f-16 "></i></a> -->
                            <!-- <a href="Lecture/decline.php?id=<?php echo $row['id']; ?>" class="btn btn-xs btn-danger">Decline<i class="feather icon-clock m-t-10 f-16 "></i></a> -->
                            <button <?php $id=$row['id']?>class="decline btn btn-xs btn-danger" type="button" id='del_<?= $id ?>' data-id='<?= $id ?>' name="decline_btn"> Decline<i class="feather icon-clock m-t-10 f-16 "></i></button>
                        </td>

                        </td>
                    </tr>

                </tbody>
            <?php

            }}else {
                echo "<tr>";
                echo "<td colspan='9'>No record found!</td>";
                echo "</tr>";
            } ?>
        </table>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

    <script>
        $(document).ready(function() {
            $('.decline').click(function() {
                var declineid = $(this).data('id');
                if (confirm("Are you sure?")) {
                    $.ajax({
                        url: './Lecture/decline.php',
                        type: 'get',
                        data: {
                            id: declineid
                        },
                        success: function(response) {
                            if (response == 1){
                                alert('Lecture declined successfully.');
                                setTimeout(function() {
                                    window.location.reload();
                                }, 100);
                            } else {
                                alert('Cannot decline.');
                            }

                        }
                    });
                }

            });
          

			$('.approve').click(function() {
                var approveid = $(this).data('id');
                if (confirm("Are you sure?")) {
                    $.ajax({
                        url: './Lecture/approvelecture.php',
                        type: 'get',
                        data: {
                            id: approveid
                        },
                        success: function(response) {
                            if (response == 1){
                                alert('Lecture approved successfully.');
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