<?php 
	include "../connection.php";


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

  
                    
   <div class="row">
     <div class="col-md-12 col-sm-12 col-xs-12">
       <div class="x_panel">
          <h2></h2>
          <p></p>
      <table width="393" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="96" height="67" align="left" valign="middle"><button type="button" class="btn btn-warning" onclick="location.href='index.php?tab=updatestd'">< Back</button></td>
    <td width="297" align="left" valign="middle"><h2><ul>
      <li> Search Result</li></ul></h2></td>
  </tr>
</table>
         
          <br>
          <hr>
          <p><span class="x_content">
            <?php


if(isset($_REQUEST['submit'])){
    $nic=$_POST['nic'];
   
	
    //$sql=" SELECT * FROM users WHERE fname like '%".$name."%' OR user_email ='%".$email."%'";
	
	//SELECT * FROM student s, payment p, student_course sc WHERE s.std_id=p.std_id and s.std_id=sc.std_id and s.nic="941234567V" and sc.course_id="1"
	
	
	
	
	$sql=" SELECT fname, lname ,regDate,nic, email FROM student WHERE  nic like '%".$nic."%' ";
    $q=mysqli_query($con,$sql);
	
	echo"<center><h2>Student Details of ".$nic."</h2></center>";
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

//echo "<a href='edit.php?nic={$nic}'><i class='fa fa-edit'></i>Edit Student<span></span> <br></a>";
	echo "<a href='index.php?tab=updatestd&&edit={$nic}'><i class='fa fa-edit'></i>  Edit Student<span></span> <br></a>";


echo "</td>";


echo "</tr>";

}
echo "</table>";
}
?>
          </span></p>
          <p></p>
          <p></p>
          <p></p>
         <div class="x_content"></div>
                           

              
       </div>
     </div>
  </div>
  <!-- /page content -->

  <!-- footer content --><!-- /footer content -->
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
