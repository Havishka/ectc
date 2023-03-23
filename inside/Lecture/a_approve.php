

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ECTC | PDP</title>
</head>

<body>
    <br>
    <div>
        <!-- <div class="row" style="padding-left: 30%;"> -->
        <h3>Approve Payments for Lecture Coverages</h3><br><br>
        <br>
        <table class="table table-striped table-bordered" id="" width="96%" cellspacing="0">
            <thead>
                <tr>
                    <th>Lecturer Name</th>
                    <th>Course Name</th>
                    <th>Batch Code</th>
                    <th>Payment Month</th>
                    <th>Total Hours</th>
                    <th>Payment Rate</th>
                    <th>Pay Amount</th>
                    <th>Documents</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            $ret = mysqli_query($con, "select r.f_name as fname, r.l_name as lname, l.* from lec_pay l, lecture_reg r where l.l_name=r.f_name and finalize='Approved' and approve IS NULL order by paid_for asc");

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
                        <td>Rs. <?php echo $row['pay']; ?></td>
                        <td><a href="<?php echo $row['documents']; ?>" class="btn btn-xs btn-warning" style="width:70px" target="_blank">View</a></td>
                        <!-- <td><a href="./index.php?tab=admin_approve_lec&&editid=<?php echo $row['id']; ?>" class="btn btn-xs btn-primary" style="width:70px">Approve<i class="feather icon-clock m-t-10 f-16 "></i></a> -->
                        <td>
                        <button <?php $id=$row['id']?>class="approve btn btn-xs btn-primary" type="button" id='del_<?= $id ?>' data-id='<?= $id ?>' name="approve_btn"> Approve <i class="feather icon-clock m-t-10 f-16 "></i></button>
                        </td>
                    </tr>

                </tbody>
            <?php

            } ?>
        </table>
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
                    <p>Payment approval was successful!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="location.href = 'a_approve.php';">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

	<script>
        $(document).ready(function() {
			$('.approve').click(function() {
                var approveid = $(this).data('id');
                if (confirm("Are you sure?")) {
                    $.ajax({
                        url: './Lecture/a_approve_finalize.php',
                        type: 'get',
                        data: {
                            id: approveid
                        },
                        success: function(response) {
                            if (response == 1){
                                alert('Lecture coverage payment approved!.');
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