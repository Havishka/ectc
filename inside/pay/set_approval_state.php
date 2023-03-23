<?php

include("../connection.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
   
  </head>

  <body class="nav-md">
   
		   <div class="page-title">
              <div class="title_left">
                <h3></h3>
              </div>

              <div class="title_right">
			  <form class="form-inline" method="post" action="index.php?tab=searchStd" >
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" name="nic" placeholder="Student Pre Details"  required >
					
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit" name="submit">Go!</button>
                    </span>
                  </div>
                </div>
				</form>
              </div>
			    
            </div>
		  
		  
            <div class="clearfix"></div>

			
			<!--
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                   <h2>Search and add Payment </h2>
                  <div class="x_content">
				  <div class="row" style="margin-bottom:20px;">
					<div class="col-md-12">
						<fieldset class="scheduler-border" >
					<form class="form-inline" method="post">
					
					<div class="form-group">
					<label for="email">NIC</label>
					<input type="text" class="form-control" name="nic" placeholder="Type NIC" required>
					</div>
					
					<div class="form-group">
						<label> Course Name</label>
							<select  class="form-control" id="course_id22" name="course_id22" required >
								<option value="%" >Select course</option>
                                    <?php
									$sql="select * from course";
									$result=mysqli_query($con,$sql);
									
									while($row=mysqli_fetch_array($result))
									{
									echo "<option value='" .$row['course_id']. "'>" . $row['c_name'] . "</option>";
									}
									?>
							</select>
					</div>
				
					   <button type="submit" class="btn btn-primary" name="submit" > Find </button>
					   <button type="reset" class="btn btn-primary" name="clear" > Clear </button>
					
		
                    </form>
					
					</fieldset>

</div>
</div> -->
				  <?php


//if(isset($_REQUEST['submit']))
{
	/*
    $nic=$_POST['nic'];
    $course_id=$_POST['course_id22'];
	
	$sql = "SELECT s.fname,s.lname, s.nic, s.regDate, sc.course_id  FROM student s,  student_course sc, course c WHERE s.std_id=sc.std_id and c.course_id=sc.course_id and s.nic like '%".$nic."%' and sc.course_id like '%".$course_id."%'";
	*/
	
	
	if(($le==1))
	{
	$sql = " SELECT * FROM student s, payment p, course c, student_branch sb, branch b, student_course sc where s.std_id = sb.std_id and sb.branch_id=b.branch_id and sc.course_id=p.course_id and s.std_id=p.std_id and p.approvalState='F' and s.std_id=sc.std_id and sc.course_id=c.course_id order by b.name asc , p.course_id  ";
	}
	if(($le==2))
	{
	$sql = " SELECT * FROM student s, payment p, course c, student_branch sb, branch b, student_course sc where s.std_id = sb.std_id and sb.branch_id=b.branch_id and sc.course_id=p.course_id and s.std_id=p.std_id and p.approvalState='F' and s.std_id=sc.std_id and sc.course_id=c.course_id and sb.branch_id='$bid' order by b.name asc , p.course_id  ";
	}
	
	
/*
$query20 = "SELECT * FROM student s, payment p, course c, student_branch sb, branch b, student_course sc where s.std_id = sb.std_id and sb.branch_id=b.branch_id and sc.course_id=p.course_id and s.std_id=p.std_id and p.type='SPC' and s.std_id=sc.std_id and sc.course_id=c.course_id and p.pay_date BETWEEN '" . $mydate2 . "' AND  '" . $mydate1 . "' and sc.course_id like '$course22' and sb.branch_id like '$branch22'  order by b.name asc , p.course_id  ";
*/
		
	
	
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

echo "<a href='index.php?tab=approvediscount&&nic=$nic&&course_id=$course_id&&std_id=$std_id&&loginis=$login_name'><i class='fa fa-star'></i>Approve Discount<span></span> <br></a>";

echo "<a href='index.php?tab=rejecteddiscount&&nic=$nic&&course_id=$course_id&&std_id=$std_id'><i class='fa fa-star-half-full'></i>Reject Discount<span class='text-muted'></span><br></a>";

echo "</td>";


echo "</tr>";

}
echo "</table>";
}
?>
					
                    
                    
                 
                </div>
           </div> 
		   </div>
		   
<!--		   
<a href='pay/set_approval_state_email.php'><i class='fa fa-star-half-full'></i>test me<span class='text-muted'></span><br></a>
		   
	<a href='pay/set_approval_state_email2.php'><i class='fa fa-star-half-full'></i>test me222<span class='text-muted'></span><br></a>	   -->
  </body>
</html>
