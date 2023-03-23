<!DOCTYPE html>
<html lang="en">
  <head>
   
	
	  <script src="report_gen/js/jquery-1.12.4.js"></script>
	  <script src="report_gen/js/jquery-ui.js"></script>

  
  
  	<link rel="stylesheet" href="report_gen/css/datepicker.css">
	<script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#item').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });

			 $(document).ready(function () {
                
                $('#item22').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });	
			
			$(document).ready(function () {
                
                $('#item23').datepicker({
                    format: "yyyy-mm"
                });  
            
            });
			
			$(document).ready(function () {
                
                $('#item24').datepicker({
                    format: "yyyy-mm"
                });  
            
            });
			
			$(document).ready(function () {
                
                $('#item85').datepicker({
                    format: "yyyy-mm-dd"
                });  
            
            });
			
			$(document).ready(function () {
                
                $('#item86').datepicker({
                    format: "yyyy-mm"
                });  
            
            });

			
	</script>

	<script src="report_gen/js/bootstrap-datepicker.js"></script>

  
  
  
  
  </head>

  <body class="nav-md">


            <div class="clearfix"></div>

			
		<div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i>Registered this month</span>
              <div class="count"> 
<?php 

$themonth = date("Y-m");
$themonth1="$themonth-01" ;
$themonth2="$themonth-31" ;

					if(($le==2)||($le==3))
					{
						$query3="select count(s.std_id) as sys from student s, student_branch sb where s.std_id = sb.std_id and s.regDate BETWEEN '" . $themonth1 . "' AND  '" . $themonth2 . "' and sb.branch_id= '$bid' ";
						//echo "magics";
					}
					else
						{
						   $query3="select count(std_id) as sys from student where regDate BETWEEN '" . $themonth1 . "' AND  '" . $themonth2 . "'";
						   //echo "magicxxxs";
					    }


$result = mysqli_query($con, $query3);
while($rows=mysqli_fetch_array($result))
{
$mag=$rows['sys'];
}
echo "$mag";

//echo "$themonth1";
?>
</div>
              <span class="count_bottom"><i class="green">
			  <?php 
$todayis = date("Y-m-d");
$lastweek = date ("Y-m-d", strtotime ($todayis ."-7 days"));





						if(($le==2)||($le==3))
					{
					
						 $query3="select count(s.std_id) as sys from student s, student_branch sb where s.std_id = sb.std_id and s.regDate>='$lastweek' ";
						
					}
					else
						{
						   $query3="select count(std_id) as sys from student where regDate>='$lastweek' ";
					    }



$result = mysqli_query($con, $query3);
while($rows=mysqli_fetch_array($result))
{
$mag=$rows['sys'];
}
echo "$mag";
?>

</i> From last Week</span>
</div>
			
			   <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Courses</span>
              <div class="count">
			  <?php 
$query3="select count(course_id) as sys from course where state='T'";
$result = mysqli_query($con, $query3);
while($rows=mysqli_fetch_array($result))
{
$mag=$rows['sys'];
}
echo "$mag";
?>
			  
			  </div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> 
			  			  <?php 
$query3="select count(course_id) as sys from course where state='F'";
$result = mysqli_query($con, $query3);
while($rows=mysqli_fetch_array($result))
{
$mag=$rows['sys'];
}
echo "$mag";
?>
			  
			  </i>Updated courses </span>
            </div>
			
			
			
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Payments Received Today</span>
              <div class="count">
				  <?php 
$todayis = date("Y-m-d");
$lastweek = date ("Y-m-d", strtotime ($todayis ."-7 days"));






		if(($le==2)||($le==3))
					{
						 $query3="select count(p.pr_id) as sys from payment_receipt p, student_branch sb  where p.pr_std_id = sb.std_id and p.pr_date='$todayis' ";
					}
					else
						{
						   $query3="select count(pr_id) as sys from payment_receipt where pr_date='$todayis' ";
					    }


$result = mysqli_query($con, $query3);
while($rows=mysqli_fetch_array($result))
{
$mag=$rows['sys'];
}
echo "$mag";
?>		  
			  
			  
			  </div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"> </i>
			  <?php 
$todayis = date("Y-m-d");
$lastweek = date ("Y-m-d", strtotime ($todayis ."-7 days"));




	if(($le==2)||($le==3))
					{
						 $query3="select count(p.pr_id) as sys from payment_receipt p, student_branch sb  where p.pr_std_id = sb.std_id and p.pr_date>='$lastweek' ";	 
					}
					else
						{
						  $query3="select count(pr_id) as sys from payment_receipt where pr_date>='$lastweek' ";
					    }

$result = mysqli_query($con, $query3);
while($rows=mysqli_fetch_array($result))
{
$mag=$rows['sys'];
}
echo "$mag";
?>
			  </i>
From last week
			  </span>
            </div>
			
			
			
			
			</div>
					   


 <nav class="navbar navbar-default">
 <h2>View Report For The Selected Month</h2>
 
<ul class="nav nav-pills">
 		

	  <form class="navbar-form navbar-left" method="post" action="index.php?tab=report_gen_view_sel_month" id="myForm89" name="myForm4">
        <div class="form-group">
		
		
<?php 
//select menu_section course
$sql22="SELECT course_id, c_name from course where state='T'";
$sql = mysqli_query($con, $sql22);		
if(mysqli_num_rows($sql)){
$select= '<select name="item88" id="item88" class="select2_single form-control" tabindex="-1" form="myForm89">';
$select.='<option value="%">ALL COURSES</option>';
while($rs=mysqli_fetch_array($sql)){
      $select.='<option value="'.$rs['course_id'].'">'.$rs['c_name'].'</option>';
  }
}
$select.='</select>';
echo $select;		
?>
		
<?php 
//select menu_section branch custom made for branch managers
$sql22="SELECT branch_id, name from branch where branch_id='$bid'";
$sql = mysqli_query($con, $sql22);
if(mysqli_num_rows($sql)){
$select= '<select name="item83" id="item83" class="select2_single form-control" tabindex="-1" form="myForm89">';
while($rs=mysqli_fetch_array($sql)){
      $select.='<option value="'.$rs['branch_id'].'">'.$rs['name'].'</option>';
  }
}
$select.='</select>';
echo $select;		
?>

	  
	  <br><br>
</div><div>
     
		 <input type="text" class="form-control" name="item23" id="item23" placeholder="Choose Month..." form="myForm89"  value="<?php echo date("Y-m"); ?>"  \>
		   <!--  <input type="text" class="form-control" name="item85" id="item85" placeholder="Choose From..." form="myForm89"  \>-->
		 
        </div>
		 <br>
		 
		<!--new button group -->
		
		       <div class="btn-group">
					<input type="submit" name="viewcomplete" class="btn btn-primary" value="View Complete" form="myForm89"  data-toggle="tooltip" title="View Payments to the selected course/branch by all types, installment payments or special payments that have started on selected month..." />
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
					  <br>
                        <li>   <input type="submit" name="viewhalfPay" class="btn btn-primary" value="View Installment" form="myForm89"/>
                        </li>
						<br>
                        <li>   <input type="submit" name="viewfullPay" class="btn btn-primary" value="View Fullpaid" form="myForm89"/>
                        </li>
						<br>
						  <li>  <input type="submit" name="viewSPC" class="btn btn-primary" value="View Special" form="myForm89"/>
						  </li>
						
                        <!--<li class="divider"></li>
                        <li><a href="#">Separated link</a>
                        </li>-->
                      </ul>
                

		  </div>	

						    <div class="btn-group">
							
						   <input type="submit" name="viewcsum" class="btn btn-success" value="View Final Summary" form="myForm89" data-toggle="tooltip" title="View the final income for selected course/all in the given month."/>
						<!--   <input type="button" class="btn btn-info" value="Summary Chart" onClick="document.location.href='index.php?tab=completesummary'" />-->
  </div>	
		
						
						
						
				
					    



						
      </form>
	  
</ul>
</nav>




       
       
  </body>
</html>
