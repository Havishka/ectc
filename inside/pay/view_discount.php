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
  
	$sql="SELECT * FROM discount_member";
	
    $q=mysqli_query($con,$sql);


	echo"<center><h2>Discount</h2></center>";
	echo"<br>";
	
echo "<table class='table table-striped table-bordered' >";//start table

//creating our table heading

echo "<tr>";

echo "<th>Number of courses</th>";

echo "<th>Full Pay %</th>";

echo "<th>Installment Pay %</th>";

echo "</tr>";

while ($row=$q -> fetch_assoc())
	{
	extract($row);
	
	echo "<tr>";

	echo "<td>{$prev_courses}</td>";
	echo "<td>{$fullPay_discount}</td>";
	echo "<td>{$halfPay_discount}</td>";
	
	
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
