<?php  
		
	include("../connection.php"); 	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>E-wis</title>
<meta http-equiv="description" content="page description" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<style type="text/css">@import "styles.css";</style>
<style>
.frmSearch {border: 1px solid #eaedeb;background-color: #fdfefe  ;margin: 2px 0px;padding:40px;border-radius:12px;}
#country-list{float: left;list-style:none;margin-top:5px; margin-left:0%;padding:0;width:190px;position: absolute; border-radius:12px;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #eaedeb 1px solid;border-radius:12px;}
</style>

<script src="../js/jquery-2.1.4.js" type="text/javascript"></script>
<!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script> -->
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "quick_search.php",
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

<body>
<?php include("header.php");?>
<?php include("sidebar.php");?>

<section id="main-content">

		
		
	<section class="wrapper">
	 <div class="">
    
	
	<div class="frmSearch">

<form method="post" action="search_get.php" id="myForm8" name="myForm4">
<input type="text" id="search-box" name="search-box" required placeholder="Search By NIC or Name..." form="myForm8" size="20" name="nicpost" autocomplete="off" /> 
		<input type="submit" name="viewbyany" class="btn btn-success" value="Search " form="myForm8"/>
		<button class="btn btn-primary" type="reset">Reset</button>
</form>

<div id="suggesstion-box" align="center"></div>
</div>	
				  
				  
</div>
	
		<div class="table-agile-info">
 
	
	<?php
	echo "<div class=''>
		<center><h3>	Admin </h3></center>
	</div>
	<br>";

	$query = "SELECT e.nic,e.fname,e.lname,e.email,e.gender,e.phone FROM super_admin sa, employee e where sa.a_nic=e.nic and sa.a_nic != '$namesession' ";
	$result = $con->query( $query );
	$num_results = $result->num_rows;
	//echo"$namesession";
if( $num_results > 0)
{ 
echo "<table class='table table-striped b-t b-light'>";

echo "<tr>";

echo "<th>NIC</th>";

echo "<th>First Name</th>";

echo "<th>Last Name</th>";

echo "<th>Email</th>";

echo "<th>Gender</th>";

echo "<th>Phone</th>";


echo "</tr>";


while( $row = $result->fetch_assoc() )
{

extract($row);

echo "<tr>";

echo "<td>{$nic}</td>";

echo "<td>{$fname}</td>";

echo "<td>{$lname}</td>";

echo "<td>{$email}</td>";

echo "<td>{$gender}</td>";

echo "<td>{$phone}</td>";

echo "<td>";


echo "<a href = 'update_emp.php?nic={$nic}''><name='update'/>Update</a>";


echo "</td>";

echo "</tr>";

}

echo "</table>";

}
?>
<br>
<?php
	echo "<div class=''>
		<center><h3>	supervisor </h3></center>
	</div>
	<br>";

	$query = "SELECT e.nic,e.fname,e.lname,e.email,e.gender,e.phone FROM supervisor s, employee e where s.s_nic=e.nic ";
	$result = $con->query( $query );
	$num_results = $result->num_rows;
	
if( $num_results > 0)
{ 
echo "<table class='table table-striped b-t b-light'>";

echo "<tr>";

echo "<th>NIC</th>";

echo "<th>First Name</th>";

echo "<th>Last Name</th>";

echo "<th>Email</th>";

echo "<th>Gender</th>";

echo "<th>Phone</th>";


echo "</tr>";


while( $row = $result->fetch_assoc() )
{

extract($row);

echo "<tr>";

echo "<td>{$nic}</td>";

echo "<td>{$fname}</td>";

echo "<td>{$lname}</td>";

echo "<td>{$email}</td>";

echo "<td>{$gender}</td>";

echo "<td>{$phone}</td>";

echo "<td>";



echo "<a href = 'update_emp.php?nic={$nic}''><name='update'/>Update</a>";


echo "</td>";

echo "</tr>";

}

echo "</table>";

}
?>

<br>
<?php
	echo "<div class=''>
			<center><h3>Employee</h3></center>
	</div>
	<br>";

	$query = "SELECT e.nic,e.fname,e.lname,e.email,e.gender,e.phone FROM worker w, employee e where w.w_nic=e.nic ";
	$result = $con->query( $query );
	$num_results = $result->num_rows;
	
if( $num_results > 0)
{ 
echo "<table class='table table-striped b-t b-light'>";

echo "<tr>";

echo "<th>NIC</th>";

echo "<th>First Name</th>";

echo "<th>Last Name</th>";

echo "<th>Email</th>";

echo "<th>Gender</th>";

echo "<th>Phone</th>";


echo "</tr>";


while( $row = $result->fetch_assoc() )
{

extract($row);

echo "<tr>";

echo "<td>{$nic}</td>";

echo "<td>{$fname}</td>";

echo "<td>{$lname}</td>";

echo "<td>{$email}</td>";

echo "<td>{$gender}</td>";

echo "<td>{$phone}</td>";

echo "<td>";



echo "<a href = 'update_emp.php?nic={$nic}''><name='update'/>Update</a>";


echo "</td>";

echo "</tr>";

}

echo "</table>";

}
?>
	
  </div>
</div>
</section>

           
		
      
 <!-- footer -->
		 
  <!-- / footer -->


<!--main content end-->


<!--main content end-->
</section>
<?php include("footer.php");?>
</body>
</html>
