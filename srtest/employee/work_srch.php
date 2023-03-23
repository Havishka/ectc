
<?php
include ("header.php");
include ("footer.php")
?>
<section id="main-content">
	<section class=" wrapper">
    <br>
     <div class="mail-w3agile">
        <div class="row">
            <div class="col-sm-12 mail-w3agile">
                <section class="panel">
               
                    <div class="panel-body">
                      
                        <div class="compose-mail">
                        
                        <?php


if(isset($_REQUEST['viewbyany'])){
    $date=$_POST['search-box'];
   
	
    //$sql=" SELECT * FROM users WHERE fname like '%".$name."%' OR user_email ='%".$email."%'";
	
	//SELECT * FROM student s, payment p, student_course sc WHERE s.std_id=p.std_id and s.std_id=sc.std_id and s.nic="941234567V" and sc.course_id="1"
	
	
	$sql="SELECT sr.status_id, sr.status, sr.date, sr.time, ws.work_id, w.w_nic FROM status_report sr, worker w, work_status ws, employee e WHERE sr.status_id= ws.status_id AND e.nic=w.w_nic and w.work_id=ws.work_id and sr.date like '%".$date."%' and w.w_nic='".$con->real_escape_string($_SESSION['nic'])."'  order by sr.status_id DESC";
	
	//$sql=" SELECT fname, lname ,regDate,nic, email FROM student WHERE  nic like '%".$nic."%' ";
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

	echo "<td>{$status}</td>";
	echo "<td>{$date}</td>";
	echo "<td>{$time}</td>";;

echo "<td>";

//just preparing the edit link to edit the record

  echo "<a href='view.php?status_id={$status_id}'>View</a>";


echo "</td>";


echo "</tr>";

}
echo "</table>";
}
?>
                        
                        
                        
                        
                                                </div>
                         </div>
                         </div>
                        
                  
    
    
    <!-- footer -->
		 
  <!-- / footer -->
</section>

<!--main content end-->
</section>



