<?php
include ("header.php");
include ("footer.php");
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
<!--header end-->

<!--sidebar start-->

<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class=" wrapper">
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      My Status Report
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
                   
      </div>
      <div class="col-sm-4">
      </div>
      <div class="">
     
      <div class="frmSearch">
    
      <form method="post" action="work_srch.php" id="myForm8" name="myForm4">
<input type="text" id="search-box" name="search-box" required placeholder="Search By NIC or Name..." form="myForm8" size="15" name="nicpost" autocomplete="off" />
		<input type="submit" name="viewbyany" class="btn btn-success" value="Search " form="myForm8"/>
		<button class="btn btn-primary" type="reset">Reset</button>
</form>
<div id="suggesstion-box" align="center"></div>

      
               </div>
        
      </div>
      
    </div>
    <div class="table-responsive">
     <?php

	//$sql= "SELECT sr.status_id, sr.status, sr.date, sr.time, ws.work_id FROM  status_report sr,  work_status ws WHERE sr.status_id= ws.status_id order by sr.status_id DESC";
	
	$sql="SELECT sr.status_id, sr.status, sr.date, sr.time, ws.work_id, w.w_nic FROM status_report sr, worker w, work_status ws, employee e WHERE sr.status_id= ws.status_id AND e.nic=w.w_nic and w.work_id=ws.work_id AND w.w_nic='".$con->real_escape_string($_SESSION['nic'])."' order by sr.status_id DESC

limit 0,50 ";
	
    $q=mysqli_query($con,$sql);


	echo"<center><h2> </h2></center>";
	echo"<br>";
	
echo "<table class='table table-striped table-bordered' >";//start table

//creating our table heading

echo "<tr>";

echo "<th>Status ID</th>";

echo "<th>Status</th>";

echo "<th>Date</th>";

echo "<th>Time</th>";



echo "</tr>";

while ($row=$q -> fetch_assoc())
	{
	extract($row);
	
	echo "<tr>";

	echo "<td>{$status_id}</td>";
		$position=20; // Define how many character you want to display.

	$message="$status";
	$post = substr($message, 0, $position);

	echo "<td>{$post} ...</td>"; 
	//echo "<td>{$status}</td>";
	echo "<td>{$date}</td>";
	echo "<td>{$time}</td>";

	echo "<td>";

//just preparing the edit link to edit the record

     echo "<a href='view.php?status_id={$status_id}'>View</a>";

	echo "</td>";
	

	echo "</tr>";

}
echo "</table>";

	


?>

    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          
        </div>
      </div>
    </footer>
  </div>
</div>
		        </section>
 <!-- footer -->
		 
  <!-- / footer -->
</section>

<!--main content end-->
</section>

