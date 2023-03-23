<?php

include("../connection.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <!-- quick search things-->
<style>
.frmSearch {border: 1px solid #eaedeb;background-color: #fdfefe  ;margin: 2px 0px;padding:40px;border-radius:12px;}
#country-list{float: left;list-style:none;margin-top:5px; margin-left:0%;padding:0;width:190px;position: absolute; border-radius:12px;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #eaedeb 1px solid;border-radius:12px;}
</style>

<script src="pay/js/jquery-2.1.4.js" type="text/javascript"></script>
<!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script> -->
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "pay/quick_search_pay.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
  </head>

  <body class="nav-md">
   
		  <!-- <div class="page-title">
              <div class="title_left">
                <h3></h3>
              </div>

              <div class="title_right">
			  <form class="form-inline" method="post" action="#" >
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <!--<input type="text" class="form-control" name="inputmy" placeholder="Enter NIC or Name"  value=''  > ->
					<input type="text" id="search-box" name="search-box" required placeholder="Enter NIC or Name" size="60" name="nicpost" autocomplete="off" /> 
					<div id="suggesstion-box" align="center"></div>
					
					
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit" name="submit">Find!</button>
                    </span>
                  </div>
                </div>
				</form>
              </div>
			    
            </div> -->
		  
			<div class="clearfix"></div>
			
			   <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                   <h2>Search and alter already given discounts </h2>
                  <div class="x_content">
				  <div class="row" style="margin-bottom:20px;">
					<div class="col-md-12">
						<fieldset class="scheduler-border" >
					<div class="frmSearch">
					<form class="form-inline" method="post" action="#">
					
					<div class="form-group">
					<label for="email">NIC or Name</label></div><br>
			
					<!--<input type="text" class="form-control" name="nic" placeholder="Type NIC" required>-->

<input type="text" id="search-box" name="search-box" required placeholder="Enter NIC or Name" size="60" name="nicpost" autocomplete="off" /> 


<div id="suggesstion-box" align="center"></div>
<br>

				
					   <button type="submit" class="btn btn-primary" name="submit" > Find Student </button>
					   <button type="reset" class="btn btn-primary" name="clear" > Clear </button>
					
			
                    </form>
					
					</fieldset></div>	
			
			
			
			
			
			
			

			
<?php


if(isset($_REQUEST['submit']))
{

    $inputmy=$_POST['search-box'];

	if(($le==1))
	{
	$sql = " SELECT * FROM student s, payment p, course c, student_branch sb, branch b, student_course sc where s.std_id = sb.std_id and sb.branch_id=b.branch_id and sc.course_id=p.course_id and s.std_id=p.std_id and s.std_id=sc.std_id and sc.course_id=c.course_id and (s.nic LIKE '%$inputmy%' or s.fname LIKE '%$inputmy%' or s.lname LIKE '%$inputmy%') and p.type!='FullPay' and p.approvalState!='F' order by b.name asc , p.course_id  ";
	} //and p.discount>0  removed due to error correction requirement
	if(($le==2))
	{
	$sql = " SELECT * FROM student s, payment p, course c, student_branch sb, branch b, student_course sc where s.std_id = sb.std_id and sb.branch_id=b.branch_id and sc.course_id=p.course_id and s.std_id=p.std_id  and s.std_id=sc.std_id and sc.course_id=c.course_id and (s.nic LIKE '%$inputmy%' or s.fname LIKE '%$inputmy%' or s.lname LIKE '%$inputmy%') and sb.branch_id='$bid' and p.type!='FullPay' and p.approvalState!='F' order by b.name asc , p.course_id  ";
	} //and p.discount>0
	
	
	$q=mysqli_query($con,$sql);
	
	
	
	
echo "<table class='table table-striped table-bordered' >";//start table

//creating our table heading

echo "<tr>";

echo "<th>Name</th>";
echo "<th>NIC</th>";
echo "<th>Registration Date</th>";
echo "<th>Course Name</th>";
echo "<th>Course Fee</th>";
echo "<th>Given Discount</th>";
echo "<th>Reason for Discount</th>";
echo "<th>Payment Type</th>";
echo "<th>Student Branch</th>";

echo "</tr>";


while ($row=$q -> fetch_assoc())
{
extract($row);
	
echo "<tr>";

echo "<td>{$fname} {$lname}</td>";
echo "<td>{$nic}</td>";
echo "<td>{$regDate}</td>";
echo "<td>{$c_name}</td>";
echo "<td>{$course_fee}</td>";
echo "<td>{$discount}</td>";
echo "<td>{$discount_remark}</td>";
echo "<td>{$type}</td>";
echo "<td>{$name}</td>";


echo "<td>";

   $sql23 = "SELECT * FROM student s, payment p WHERE s.std_id=p.std_id and s.nic like '%".$nic."%' and p.course_id like '%".$course_id."%' and p.type='FullPay'";
   $result23 = $con->query( $sql23 );
   $num_results23 = $result23->num_rows;

	if($num_results23 > 0)
	{
		echo "Student Payment is already finished.";
	}
	else
	{
echo "<a href='index.php?tab=changedisc&&nic=$nic&&course_id=$course_id&&std_id=$std_id'><i class='fa fa-star-half-full'></i>Change Discount<span class='text-muted'></span><br></a>";
	}

echo "</td>";


echo "</tr>";

}
echo "</table>";
}
?>
					
                    
                    
                  </div>
                </div>
           </div> 
		   </div>

  </body>
</html>
