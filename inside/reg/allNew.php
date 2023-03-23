<?php 
	include("../connection.php");

	
	session_start();
	
	//include("Dashboard.html"); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
  </head>

  <body class="nav-md">
    
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                   
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
					
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    
                     <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                   <h2></h2>
                  <div class="x_content">
					
				  <?php


if(isset($_REQUEST['submit'])){
    $nic=$_POST['nic'];
   
	
    //$sql=" SELECT * FROM users WHERE fname like '%".$name."%' OR user_email ='%".$email."%'";
	
	//SELECT * FROM student s, payment p, student_course sc WHERE s.std_id=p.std_id and s.std_id=sc.std_id and s.nic="941234567V" and sc.course_id="1"
	
	
	
	
	$sql=" SELECT fname, lname ,regDate,nic, email FROM student WHERE  nic like '%".$nic."%' ";
    $q=mysqli_query($con,$sql);
	
	echo"<center><h2> Student Details of ".$nic."</h2></center>";
	echo"<br>";
	
	
	
echo "<table class='table table-striped table-bordered' >";//start table

//creating our table heading

echo "<tr>";

echo "<th>First Name</th>";

echo "<th>Last Name</th>";

echo "<th>Reg date</th>";

echo "<th>Email</th>";

echo "<th>NIC</th>";

echo "</tr>";


while ($row=$q -> fetch_assoc())
{
extract($row);
	
echo "<tr>";

echo "<td>{$fname}</td>";
echo "<td>{$lname}</td>";
echo "<td>{$regDate}</td>";
echo "<td>{$email}</td>";
echo "<td>{$nic}</td>";

echo "<td>";

//just preparing the edit link to edit the record

echo "<a href='newReg.php?nic={$nic}'><i class='fa fa-archive'></i> New Course<span></span> <br></a>";



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
