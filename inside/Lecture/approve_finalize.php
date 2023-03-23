<?php

include '../connection.php';

    if(isset($_GET['id'])){
        $cid = $_GET['id'];

        $sqlBidAccept = "SELECT * FROM lec_pay WHERE id = '$cid' "; //for accept bid
        $BidAccept = mysqli_query($con, $sqlBidAccept);
        $BidAcceptResultCheck = mysqli_num_rows($BidAccept);
        $bidAcceptRow = mysqli_fetch_assoc($BidAccept);

        if($BidAcceptResultCheck > 0) {
            
            $Accepted = 1;
            //$AcceptedPrice = $bidAcceptRow['bid'];
            $accepted = 'Approved';
            $query ="UPDATE lec_pay SET finalize = '$accepted' Where id='$cid'";
            mysqli_query($con,$query);
            // echo "<script>alert('Lecture payment approved successfully!');</script>";
            // echo "<script>window.location.href ='index.php?tab=finalize'</script>";
        
        } else {
            $Accepted = 0;
            // echo "<script>alert('Error occured!');</script>";
            // echo "<script>window.location.href ='finalize.php'</script>";
        }
    }

?>