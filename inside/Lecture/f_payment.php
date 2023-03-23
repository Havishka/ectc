<?php

include '../connection.php';

    if(isset($_GET['editid'])){
        $cid = $_GET['editid'];
    // $approved = 'approved';
    // $query ="UPDATE t_time SET approval = 'Approved' Where id='$cid' ";
    // mysqli_query($con,$query);

    $sqlBidAccept = "SELECT *FROM lec_pay WHERE id = '$cid' "; //for accept bid
    $BidAccept = mysqli_query($con, $sqlBidAccept);
    $BidAcceptResultCheck = mysqli_num_rows($BidAccept);
    $bidAcceptRow = mysqli_fetch_assoc($BidAccept);

    if($BidAcceptResultCheck > 0) {
        
        $Accepted = 1;
        
        //$AcceptedPrice = $bidAcceptRow['bid'];
        $accepted = 'Approved';
     
        $query ="UPDATE lec_pay SET finalize = '$accepted' Where id='$cid'";
        mysqli_query($con,$query);
        echo "<script>alert('Lecture payment finalized successfully!');</script>";
        echo "<script>window.location.href ='index.php?tab=f_payment'</script>";
        
    }else {

        $Accepted = 0;
        echo "<script>alert('Error occured!');</script>";
        echo "<script>window.location.href ='f_payment.php'</script>";
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
<h3>Finalized Payments Report</h3>
        <table style="margin-top: 2%;">

            <tr>
                <td> <input type="month" class="form-control" name="mydate" id="mydate" style="width:350px" placeholder="Choose Month..." value="<?php echo isset($_POST['mydate']) ? htmlspecialchars($_POST['mydate'], ENT_QUOTES) : ''; ?>" required\></td>
               <?php $mydate = date("Y-m"); ?> 

                <td style="padding-left:2%"> <input type='submit' name='but_search' value='View' id="btnSearch" class="btn btn-xm btn-primary"> </td>
            </tr>
        </table>
    </form>
   
        <table class="table table-striped table-bordered" id="" width="96%" cellspacing="0">
            <thead>
                <tr>

                    <th>Lecturer Name</th>
                    <th>Course Name</th>
                    <th>Batch Code</th>
                    <th>Month</th>
                     <th>Total Hours</th>
                    
                    <th>Payment Rate</th>
                    <th>Pay Amount</th>
                   
                    <th>Documents</th>


                </tr>
            </thead>
            <?php
               if (isset($_POST['but_search'])) {
                $mydate = $_POST['mydate'];
            }
            $ret = mysqli_query($con, "select r.f_name as fname, r.l_name as lname, l.* from lec_pay l, lecture_reg r where l.l_name=r.f_name and approve='Approved' and paid_for like '$mydate%'");

            while ($row = mysqli_fetch_array($ret)) {
            ?>

                <tbody>
                    <tr>
                        <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
                        <td><?php echo $row['course']; ?></td>
                        <td><?php echo $row['c_name']; ?></td>
                        <td><?php echo $row['paid_for']; ?> </td>
                        <td><?php echo $row['tot']; ?></td>
                        <td><?php echo $row['rate']; ?></td>
                        <td><?php echo $row['pay']; ?></td>
                      
                        <td>
                            <a href="<?php echo $row['documents']; ?>" class="btn btn-xs btn-primary">View Documents<i class="feather icon-clock m-t-10 f-16 "></i></a>
                        </td>
                    </tr>

                </tbody>
            <?php

            } ?>
        </table>
     
    </div>

</body>

</html>