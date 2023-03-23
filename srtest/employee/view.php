

<?php
include ("header.php");
include ("footer.php")
//include "../connection.php";
?>
<!--header end-->

<!--sidebar start-->

<!--sidebar end-->
<!--main content start-->

      <?php
			
			//include database connection

            //select the specific database record to update
/*
$query = "select * from status_report sr, work_status wr, comment_status cs, comments c , supervisor_comment sc , supervisor s, employee e where e.nic=s.s_nic AND s.sId=sc.s_id  AND cs.status_id=wr.status_id AND wr.status_id=sr.status_id AND sr.status_id='".$con->real_escape_string($_REQUEST['status_id'])."'
limit 0,100";
*/

//$statusIDGOT = "'".$con->real_escape_string($_REQUEST['status_id'])."'";


	
$magiccheck = "select * from comment_status cs where cs.status_id='".$con->real_escape_string($_REQUEST['status_id'])."' ";
$resultmagic = $con->query( $magiccheck );
$num = $resultmagic->num_rows;
if(($num)>0)
	{
	//echo "got a comment";
	$magicstate='T';
	$query = "select * from status_report sr, work_status wr, comment_status cs, comments c , supervisor_comment sc , supervisor s, employee e where e.nic=s.s_nic AND s.sId=sc.s_id  AND cs.status_id=wr.status_id AND wr.status_id=sr.status_id AND sr.status_id='".$con->real_escape_string($_REQUEST['status_id'])."'
limit 0,100";

//execute the query

$result = $con->query( $query );
	
	//get the result

$row = $result->fetch_assoc();


//assign the result to certain variable so our html form will be filled up with values
//$work_id= $row['work_id'];


$fname=$row['fname'];
$s_id=$row['s_id'];
$comment=$row['reply'];
$work_id= $row['work_id'];

$status = $row['status'];

$date = $row['date'];

$time = $row['time'];

$att = $row['attachment'];

$status_id= $row['status_id'];

	
	
	}
	else
	{
	//echo "no comments";
	$magicstate='F';
		$query = "select * from status_report sr, work_status wr where wr.status_id=sr.status_id AND sr.status_id='".$con->real_escape_string($_REQUEST['status_id'])."'
limit 0,100";

//execute the query

$result = $con->query( $query );

	
	//get the result

$row = $result->fetch_assoc();


//assign the result to certain variable so our html form will be filled up with values
//$work_id= $row['work_id'];


//$fname=$row['fname'];
//$s_id=$row['s_id'];
//$comment=$row['reply'];
$work_id= $row['work_id'];

$status = $row['status'];

$date = $row['date'];

$time = $row['time'];

$att = $row['attachment'];

$status_id= $row['status_id'];


$s_id = '';
$fname='';
$comment = "Not yet replied";
	}
	
	
	if(!$resultmagic)
	{
	 echo ("error ".mysqli_error($con));
	}
	





?>
<br>
       <section id="main-content">
	<section class=" wrapper">
   <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                          Status Report
                        </header>
                        <div class="panel-body">
                            <div class="position-center">  
                            <form role="form-horizontal" method="post" action="add_q.php" name="form1" id="form1" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <label for="to" class="">Name:</label>
                                    <input type="text"  id="id" class="form-control" name="id" value="<?php echo $name;?>" readonly="readonly">
                                </div>
                                
                                 <!--<div class="form-group">
                                    <label for="to" class="">Status No</label>
                                    <input type="text"  id="status_id" class="form-control" name="status_id" value="<?php echo $status_id;?>" readonly="readonly">
                                </div>-->
                                
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
                                
                                 	<!--<input type="text" style="height:100px;font-size:10pt;" id="status" class="form-control" name="status" value="<?php echo $status;?>" readonly="readonly">-->
                                     <textarea  rows="10" cols="62" style="white-space: pre-line;" wrap="hard" name="status" id="status" readonly="readonly">
                                 <?php echo $status;?>
                               
                                 </textarea>
                                </div>
                                
                               <div class="form-group">
                                	<label for="subject" class="">Files:</label>
                                    <input type="text" class="form-control" id="file" name="file"  value="<?php echo $att;?>" readonly="readonly">				                      
                                    <a href="upload/<?php echo $row['attachment'] ?>" target="_blank">View </a>
                                </div>
                                
                                
								 <div class="form-group">
                                <label for="subject" class="">Comments</label>
                                 
                                </div>

							
								<?php 
							
								if($magicstate=='T')
								{
								$query = "select * from employee e, supervisor s, supervisor_comment sc, comments c, comment_status cs where c.com_id=sc.com_id and sc.s_id=s.sId and s.s_nic=e.nic and c.com_id=cs.com_id and cs.status_id='".$con->real_escape_string($_REQUEST['status_id'])."' ";

							$resultx =  mysqli_query($con, $query); 
							while( $row = $resultx->fetch_assoc() ) {
							 extract($row); 
							  
							 $fname=$row['fname'];
							 $s_id=$row['s_id'];
							 $comment=$row['reply'];
							 
							  	

								echo '
								<div class="form-group">
                                
                                  <input type="text" style="height:50px;font-size:10pt;" class="form-control" id="comment" name="comment"  value="'. htmlspecialchars($row['reply']) . '" readonly="readonly">
                                  <label>
                                  <input type="text" name="cmmnt_id" style="width:600px;" id="cmmnt_id" value="Commented By Supervisor '. htmlspecialchars($row['fname']) . '"  readonly="readonly">
                                  </label>
                                </div>
								';
								}
								}
								
								
								
								else
								{
								echo'
								<div class="form-group">
								</div>
                              ';
								}
								
								
								
								
                               ?>
                              

                            </form>
                         </div>
                         </div>
                         </div>
                        
                  
    
    


</section>

</section>
