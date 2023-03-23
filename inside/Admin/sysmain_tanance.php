<?php
include ("../connection.php");
include("../../check.php");	

?>
<!DOCTYPE html">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>System Maintanance</title>
<style type="text/css">
body {
	background-color: #212f3c ;
	font-size: xx-large;
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;	
}
body {
	font-weight: bold;
}
p {
	color: #FFF;
}
</style>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
	
	<!--  <script src="../report_gen/js/jquery-1.12.4.js"></script>-->

</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center">CADD CENTRE SYSTEM MAINTANANCE</p>



			<div class="frmSearch" align="center">
					<form class="form-inline" method="post" action="#">
					
<div class="form-group">
<label>you shall not pass</label></div>
<br><br>

<input type="text" id="mainsorcer" name="mainsorcer" required placeholder="enter the sorcery" class="form-control"/> 

<br>
<br>
				
					   <button type="submit" class="btn btn-primary" name="submit" >Find Something</button>
					   
					   <button type="submit" class="btn btn-primary" name="findraw" >Find Raw</button>
					   
					<!--    <button type="submit" class="btn btn-primary" name="updatebid" > update bid from sid </button>-->
						
						 <button type="submit" class="btn btn-primary" name="rowyourboat" >Row Your Boat</button>
						
					   <button type="reset" class="btn btn-primary" name="clear" >Clear</button>
					<br>
			
                    </form>
					
					</fieldset></div>	




<?php

if(isset($_REQUEST['updatebid']))
{

    $inputmy=$_POST['mainsorcer'];
	
	
	$query99="update student_branch set branch_id='202' where std_id='$inputmy' "; //202 is kurunagala

	
	$result99 = mysqli_query($con, $query99);


if (!($result99 ))
  {
  	echo("you have failed this city! : " . mysqli_error($con));
  }
  else
	  echo "it is done";
	
}

if(isset($_REQUEST['rowyourboat']))
{

    $query97=$_POST['mainsorcer'];
	
	
$result97 = mysqli_query($con, $query97);


if (!($result97 ))
  {
  	echo("you have failed this city! : " . mysqli_error($con));
  }
  else
  {
	  echo "your boat has safely gone to the great beyond!";
	/*  echo "<table border='1'>";

$i = 0;
while($row = $result97->fetch_assoc())
{
    if ($i == 0) {
      $i++;
      echo "<tr>";
      foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($row as $value) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
	  
	*/  
  }
	
}



if(isset($_REQUEST['findraw']))
{
	echo "System Details... Raw";
	 $inputmy=$_POST['mainsorcer'];
	
$result = mysqli_query($con,"SELECT * FROM student where std_id='$inputmy'");

echo "<table border='1'>";

$i = 0;
while($row = $result->fetch_assoc())
{
    if ($i == 0) {
      $i++;
      echo "<tr>";
      foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($row as $value) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";


//2
echo "<br><br>";


$result2 = mysqli_query($con,"SELECT * FROM student_branch where std_id='$inputmy'");

echo "<table border='1'>";

$i = 0;
while($row = $result2->fetch_assoc())
{
    if ($i == 0) {
      $i++;
      echo "<tr>";
      foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($row as $value) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";


//3
echo "<br><br>";


$result3 = mysqli_query($con,"SELECT * FROM student_course where std_id='$inputmy'");

echo "<table border='1'>";

$i = 0;
while($row = $result3->fetch_assoc())
{
    if ($i == 0) {
      $i++;
      echo "<tr>";
      foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($row as $value) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";


//7
echo "<br><br>";


$result7 = mysqli_query($con,"SELECT * FROM student_phone where student_id='$inputmy'");

echo "<table border='1'>";

$i = 0;
while($row = $result7->fetch_assoc())
{
    if ($i == 0) {
      $i++;
      echo "<tr>";
      foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($row as $value) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";



//4
echo "<br><br>";


$result4 = mysqli_query($con,"SELECT * FROM payment_receipt where pr_std_id='$inputmy'");

echo "<table border='1'>";

$i = 0;
while($row = $result4->fetch_assoc())
{
    if ($i == 0) {
      $i++;
      echo "<tr>";
      foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($row as $value) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

//4.5
echo "<br><br>";


$result41 = mysqli_query($con,"SELECT * FROM payment where std_id='$inputmy'");

echo "<table border='1'>";

$i = 0;
while($row = $result41->fetch_assoc())
{
    if ($i == 0) {
      $i++;
      echo "<tr>";
      foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($row as $value) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";


//4.6
echo "<br><br>";


$result11 = mysqli_query($con,"SELECT * FROM payment_installment where std_id='$inputmy'");

echo "<table border='1'>";

$i = 0;
while($row = $result11->fetch_assoc())
{
    if ($i == 0) {
      $i++;
      echo "<tr>";
      foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($row as $value) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";


//5
echo "<br><br>";


$result5 = mysqli_query($con,"SELECT * FROM student_group where std_id='$inputmy'");

echo "<table border='1'>";

$i = 0;
while($row = $result5->fetch_assoc())
{
    if ($i == 0) {
      $i++;
      echo "<tr>";
      foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($row as $value) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";


//6
echo "<br><br>";


$result6 = mysqli_query($con,"SELECT * FROM student_course_batch_info where bi_std_id='$inputmy'");

echo "<table border='1'>";

$i = 0;
while($row = $result6->fetch_assoc())
{
    if ($i == 0) {
      $i++;
      echo "<tr>";
      foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($row as $value) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";


	
//8	
}

if(isset($_REQUEST['submit']))
{

    $inputmy=$_POST['mainsorcer'];

	$sql = "SELECT * FROM student s, student_branch sb, student_course sc where s.std_id = sb.std_id and s.std_id=sc.std_id and (s.nic LIKE '%$inputmy%' or s.fname LIKE '%$inputmy%' or s.lname LIKE '%$inputmy%')";
	
	$q=mysqli_query($con,$sql);

echo "<table class='table table-striped table-bordered' >";//start table

//creating our table heading

echo "<tr>";

echo "<th>STUDENT ID</th>";
echo "<th>Name</th>";
echo "<th>NIC</th>";
echo "<th>Registration Date</th>";
echo "<th>Course ID</th>";
echo "<th>Student Course Reg Date</th>";
echo "<th>Email</th>";
echo "<th>Reg Fee</th>";
echo "<th>Student Branch</th>";

echo "</tr>";


while ($row=$q -> fetch_assoc())
{
extract($row);
	
echo "<tr>";
echo "<td>{$std_id}</td>";
echo "<td>{$fname} {$lname}</td>";
echo "<td>{$nic}</td>";
echo "<td>{$regDate}</td>";
echo "<td>{$course_id}</td>";
echo "<td>{$sc_date}</td>";
echo "<td>{$email}</td>";
echo "<td>{$regFee}</td>";
echo "<td>{$branch_id}</td>";



echo "<td>";

   // echo "<input class='btn btn-primary' type='submit' value='DelMe' />";
   
 echo"  <form method='post' action=''>
	<input type='hidden' name='student_id' value='$std_id'/>
	
<input type='submit' name='remove_student' id='remove_student' value='Get it off the planet' class='btn btn-danger' style='border-radius:12px; padding:10px;'  onClick='javascript:return confirm('Are you sure you want to remove this student?');'  />
</td>
</form>";


echo "</td>";



echo "</tr>";

}
echo "</table>";

}
	
if(isset($_POST['DelMe']))
{
	echo "yay";
}

if(isset($_POST['remove_student'])){
	
	
	$student_id = $_POST['student_id'];
	
	echo "student  $student_id is no more!";

	$query2 = "DELETE FROM student_course WHERE std_id=$student_id"; 
	$result2 = mysqli_query($con,$query2) or die ( mysqli_error());
	
	$query3 = "DELETE FROM student_branch WHERE std_id=$student_id"; 
	$result3 = mysqli_query($con,$query3) or die ( mysqli_error());
	
	$query4 = "DELETE FROM student_phone WHERE student_id=$student_id"; 
	$result4 = mysqli_query($con,$query3) or die ( mysqli_error());
	
	$query = "DELETE FROM student WHERE std_id=$student_id"; 
	$result = mysqli_query($con,$query) or die ( mysqli_error());
	
}

?>



<p>&nbsp;</p>
<p style="center">CADD CENTER</p>

	<script src="../vendors/jquery/dist/jquery.min.js"></script>
	
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
</body>
</html>