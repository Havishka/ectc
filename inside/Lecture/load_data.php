<?php  
session_start();
$name = $_SESSION['name'];
 //load_data.php  
 $connect = mysqli_connect("localhost", "root", "ectc", "ectc_lec");  
 $output = '';  
 if(isset($_POST["c_name"]))  
 {  
      if($_POST["c_name"] != '')  
      {  
           $sql = "SELECT hr FROM c_assign WHERE username='$name' and c_name = '".$_POST["c_name"]."'";  
      }  
     
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
          $hours = floor($row["hr"] / 3600);
          $minutes = floor(($row["hr"] / 60) % 60);
           $output .= '<div class="col-md-12"><div style="color:green">Remaining Hours : '.$hours.'h : '.$minutes.'m</div></div>';  
      }  
      echo $output;  
 }  
 ?>  