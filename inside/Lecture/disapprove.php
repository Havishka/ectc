<?php 



include 'connection.php';






    $cid=$_GET['editid'];
    
    // $approved = 'approved';
    // $query ="UPDATE t_time SET approval = 'Approved' Where id='$cid' ";
    // mysqli_query($con,$query);

    $sqlBidAccept = "SELECT *FROM t_time WHERE id = '$cid' ;"; //for accept bid
    $BidAccept = mysqli_query($con, $sqlBidAccept);
    $BidAcceptResultCheck = mysqli_num_rows($BidAccept);
    $bidAcceptRow = mysqli_fetch_assoc($BidAccept);

    if($BidAcceptResultCheck > 0) {
        
        $Accepted = 1;
        
        //$AcceptedPrice = $bidAcceptRow['bid'];
        // $accepted = 'Approved';
        $disapproved = 'Disapproved';
        $query ="UPDATE t_time SET approval = '$disapproved' Where id='$cid'";
        mysqli_query($con,$query);
        

    }else {

        $Accepted = 0;
    }







?>