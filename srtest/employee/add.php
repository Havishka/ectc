<?php

include("header.php");
include("footer.php");
?>


<!--header end-->

<!--sidebar start-->

<!--sidebar end-->
<!--main content start-->
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
                                    <label for="to" class="">ID</label>
                                    <input type="text"  id="id" class="form-control" name="id" value='<?php echo $work_id; ?> ' readonly="readonly">
                                    
                                </div>
                                <div class="form-group">
                                    <!--<label for="to" class="">Status ID</label>-->
                                    <input type="hidden"  id="report_id" class="form-control" name="status_id" value='<?php echo $status_id; ?>' readonly="readonly">
                                </div>


                                <div class="form-group">
                                    <label for="subject" class="">Date:</label>
                                    <input type="text"  id="date" class="form-control" name="date" value="<?php echo date("Y-m-d")?>" readonly="readonly">
                                </div>
                                
                                  <div class="form-group">
                                    <label for="subject" class="">Time:</label>
                                    <input type="text"  id="time" class="form-control" name="time" readonly="readonly" value="<?php 
  $D = exec('date /T');
  $T = exec('time /T');
  $DT = strtotime(str_replace("/","-",$D." ".$T));
  echo(date("H:i:s",$DT));
?>">
                                </div>
									
                              
 								<div class="form-group">
                                 <label for="subject" class=""></label>
								<textarea name="status" id="status" cols="45" rows="5" required="required"></textarea>
                                </div>

                                <div class="compose-editor">
                                    
                                    <input type="file" class="default" id="file" name="file">
                                     <input name="submit" type="submit" value="Upload" />
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
        <label>File Uploaded Successfully...  </label>
        <?php
	}
	else if(isset($_GET['fail']))
	{
		?>
        <label>File Uploaded without attachment !</label>
        <?php
	}
	else
	{
		?>
        <label>Try to upload any files(PDF, DOC, EXE, VIDEO, ZIP, etc...)</label>
        <?php
	}
	?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
		        </section>
 <!-- footer -->
		 
  <!-- / footer -->
</section>

<!--main content end-->
</section>
