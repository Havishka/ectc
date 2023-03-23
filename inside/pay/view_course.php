<!DOCTYPE html>
<html lang="en">
  <head>
   


  </head>

  <body class="nav-md">
   

            <div class="clearfix"></div>
            
                    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                    <br />
                    
 <?php

include("../connection.php");
  
	$sql="SELECT c.course_id,c.c_name,c.duration , c.course_fee, ci.installment_01, ci.installment_02, ci.installment_03 FROM course c, course_installment ci WHERE ci.course_id=c.course_id";
	
    $q=mysqli_query($con,$sql);


	echo"<center><h2>Course Details</h2></center>";
	echo"<br>";
	
echo "<table class='table table-striped table-bordered' >";//start table

//creating our table heading

echo "<tr>";

echo "<th>Course ID</th>";

echo "<th>Course Name </th>";

echo "<th>Duration </th>";

echo "<th>Course Fee </th>";

echo "<th>Installment 01</th>";

echo "<th>Installment 02</th>";

echo "<th>Installment 03</th>";

echo "</tr>";

while ($row=$q -> fetch_assoc())
	{
	extract($row);
	
	echo "<tr>";

	echo "<td>{$course_id}</td>";
	echo "<td>{$c_name}</td>";
	echo "<td>{$duration}</td>";
	echo "<td>{$course_fee}</td>";
	echo "<td>{$installment_01}</td>";
	echo "<td>{$installment_02}</td>";
	echo "<td>{$installment_03}</td>";
	
	
	echo "</tr>";

}
echo "</table>";

	


?>

                    
                    
                    
                    
                    
                    
                         </div>
                </div>
              </div>

              
                </div>
      
  
  </body>
</html>
