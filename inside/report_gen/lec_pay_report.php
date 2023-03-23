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
<?php include("../connection.php"); 

?>
  <body class="nav-md">


            <div class="clearfix"></div>

			
			<!--
			<p> magics</p>
			-->
   


 <nav class="navbar navbar-default">
 <!-- <h2>View Report For The Selected Month</h2> -->
 
<ul class="nav nav-pills">
 		

	  <form class="navbar-form navbar-left" method="post" action="lec_pay_report_view.php" id="myForm89" name="myForm4">
        <div class="form-group">
		
		
<?php 
//select menu_section course
// $sql22="SELECT course_id, c_name from course where state='T'";
// $sql = mysqli_query($con, $sql22);		
// if(mysqli_num_rows($sql)){
// $select= '<select name="item88" id="item88" class="select2_single form-control" tabindex="-1" form="myForm89">';
// $select.='<option value="%">ALL COURSES</option>';
// while($rs=mysqli_fetch_array($sql)){
//       $select.='<option value="'.$rs['course_id'].'">'.$rs['c_name'].'</option>';
//   }
// }
// $select.='</select>';
// echo $select;		
?>
		
<?php 
//select menu_section branch
// $sql22="SELECT branch_id, name from branch";
// $sql = mysqli_query($con, $sql22);
// if(mysqli_num_rows($sql)){
// $select= '<select name="item83" id="item83" class="select2_single form-control" tabindex="-1" form="myForm89">';
// $select.='<option value="%">ALL BRANCHES</option>';
// while($rs=mysqli_fetch_array($sql)){
//       $select.='<option value="'.$rs['branch_id'].'">'.$rs['name'].'</option>';
//   }
// }
// $select.='</select>';
// echo $select;		
?>

	  
	
</div>
<!-- <div>
     
		 <input type="text" class="form-control" name="item23" id="item23" placeholder="Choose Month..." form="myForm89"  value="<?php echo date("Y-m"); ?>"  \>		 
        </div> -->
		 <br>
		 
	
						    <!-- <div class="btn-group">
							
						   <input type="submit" name="viewcsum" class="btn btn-success" value="View Final Summary" form="myForm89" data-toggle="tooltip" title="View the final income for selected course/all and selected branch/all in the given month."/>
  </div>	 -->
<script>
//get the month to a variable
						function getmonth() 
						{
						var b = document.getElementById('item23').value;
						//alert(b);
						return document.location.href='index.php?tab=completesummary&&selmonth='+b;
						}
</script>		

				
      </form>
	  
</ul>
</nav>



 <br/> <br/>
 
 <nav class="navbar navbar-default">
 <h2>Confirmed Lecture Payments </h2>
 
<ul class="nav nav-pills">
 			 
	  <form class="navbar-form navbar-left" method="post" action="lec_pay_report_excel.php" id="myForm91" name="myForm91">
        <div class="form-group">

		
<?php 
//select menu_section branch
$sql21="SELECT distinct le_name from t_time where pay_confirm='Approved'";
$sql = mysqli_query($con, $sql21);
if(mysqli_num_rows($sql)){
$select= '<select name="item83" id="item83" class="select2_single form-control" tabindex="-1" form="myForm91">';
$select.='<option value="%" readonly>--Select a Lecturer--</option>';
while($rs=mysqli_fetch_array($sql)){
      $select.='<option value="'.$rs['le_name'].'">'.$rs['le_name'].'</option>';
  }
}
$select.='</select>';
echo $select;		
?>
<?php 

$sql22="SELECT distinct c_name from c_assign where l_name like '$lec22'";
$sql = mysqli_query($con, $sql22);		
if(mysqli_num_rows($sql)){
$select= '<select name="item88" id="item88" class="select2_single form-control" tabindex="-1" form="myForm91">';
$select.='<option value="%">--Select a Course--</option>';
while($rs=mysqli_fetch_array($sql)){
      $select.='<option value="'.$rs['c_name'].'">'.$rs['c_name'].'</option>';
  }
}
$select.='</select>';
echo $select;		
?>
<br><br>	
		
		
		</div><div>
		
       <!--  <input type="text" class="form-control" name="item23" id="item23" placeholder="Choose From..." form="myForm91"  \>-->
		 <input type="text" class="form-control" name="item24" id="item24" placeholder="Choose Month..." form="myForm91"  value="<?php echo date("Y-m"); ?>"  \>
        </div>
		<br>
				
						   
						   
						         <div class="btn-group">
								 <input type="submit" name="viewcsum" class="btn btn-success" value="View" form="myForm91" data-toggle="tooltip" title="View the final income for selected course/all and selected branch/all in the given month."/>
					   
						   <input type="submit" name="export_viewsummary" class="btn btn-success" value="Export" form="myForm91" data-toggle="tooltip" title="Export the final income for selected course/all and selected branch/all in the given month."/>
 
						</div>
      </form>
	  
</ul>
</nav>



	  <br>
<br/>
<!--del2-->
			
		  <br>  <br>  <br>	
		
			
			
			
			<!-- del del del -->
       
       
  </body>
</html>
