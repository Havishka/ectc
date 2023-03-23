<?php
include ("header.php");
include ("footer.php");
?>

<!--header end-->

<!--sidebar start-->

<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class=" wrapper">
      <?php
			
			//include database connection

            //select the specific database record to update

$query = "select * from status_report sr, work_status ws , worker w, employee e

where ws.status_id=sr.status_id and w.work_id=ws.work_id and w.w_nic=e.nic and sr.status_id='".$con->real_escape_string($_REQUEST['status_id'])."'

limit 0,1";

//execute the query

$result = $con->query( $query );

//get the result

$row = $result->fetch_assoc();

//assign the result to certain variable so our html form will be filled up with values
//$work_id= $row['work_id'];

$fname=$row['fname'];
$lname=$row['lname'];
$work_id= $row['work_id'];

$sts_id=$row['status_id'];

$status = $row['status'];

$date = $row['date'];

$time = $row['time'];

$att = $row['attachment'];






?>
<br>
             <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Status Report of <?php echo $fname; ?> 
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                            <form role="form-horizontal" method="post" action="s_view_q.php" name="form1" id="form1" enctype="multipart/form-data" >								
                             <div class="form-group">
                                    <!--<label for="to" class="">Status ID</label>-->
                                    <input type="hidden"  id="sts_id" class="form-control" name="sts_id" value="<?php echo $sts_id;?>">
                                </div>
                                
                                <div class="form-group">
                                   <!-- <label for="to" class="">Comment No</label>-->
                                    <input type="hidden"  id="com_id" class="form-control" name="com_id" value="<?php echo $com_id;?>">
                                </div> 
                                	
                            <div class="form-group">
                                    <!--<label for="to" class="">Sup ID</label>-->
                                    <input type="hidden"  id="s_id" class="form-control" name="s_id" value="<?php echo $s_id;?>">
                                </div> 
                            
                                <div class="form-group">
                                    <!--<label for="to" class="">ID</label>-->
                                    <input type="hidden"  id="id" class="form-control" name="work_id" value="<?php echo $work_id;?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="subject" class="">Date:</label>
                                    <input type="text"  id="date" class="form-control" name="date" value="<?php echo $date;?>" readonly="readonly">
                                </div>
                                
                                  <div class="form-group">
                                    <label for="subject" class="">Time:</label>
                                    <input type="text"  id="time" class="form-control" name="time" value="<?php echo $time;?>" readonly="readonly">
                                </div>
									
                              <label for="subject" class="">Status:</label>
 								<div class="form-group">
                                
                                
                                 <!--<input type="text" style="height:100px;font-size:10pt; white-space:pre-line"  id="status" class="form-control" name="status" value="<?php echo $status;?>" readonly="readonly">-->
                                 
                                 <textarea  rows="10" cols="62" style="white-space: pre-line;" wrap="hard" name="status" id="status" readonly="readonly">
                                 <?php echo $status;?>
                               
                                 </textarea>
                                </div>
                                
                                <div class="form-group">
                                <label for="subject" class="">Files</label>
                               
                                  <input type="text" class="form-control" id="file" name="file"  value="<?php echo $att;?>" readonly="readonly">
                                  <a href="../employee/upload/<?php echo $row['attachment'] ?>" target="_blank">View Attachment</a>                                </div>


									<label for="subject" class="">Comments</label>
								 <div class="form-group">
                                
                               
                                  <!--<input type="text" style="height:100px;font-size:10pt;" class="form-control" id="comment" name="comment"  value="" >-->
                                 <textarea name="comment" id="comment" cols="45" rows="5" required="required"></textarea>
                                </div>
                                
                                 <div class="compose-editor">
                                    
                                     <input name="submit" type="submit" value="Upload" />
                                </div>
                                </div>
                              
                                <!--<div class="compose-btn">
                                    <button type="submit" name="submit"id="submit" class="btn btn-success">Submit</button>
                                    <button class="btn btn-sm"><i class="fa fa-times"></i> Discard</button>
                                    <button class="btn btn-sm">Draft</button>
                                </div>-->
                            </form>
                            
                             <?php
	if(isset($_GET['success']))
	{
		?>
        <label>Comment Uploaded Successfully...  </label>
        <?php
	}
	else if(isset($_GET['fail']))
	{
		?>
        <label>Problem While comment Uploading !</label>
        <?php
	}
	else
	{
		?>
        <label></label>
        <?php
	}
	?>
                         </div>
          </div>
                         </div>
                        
                  
    
    
    <!-- footer -->
		 
  <!-- / footer -->
</section>

<!--main content end-->
</section>

