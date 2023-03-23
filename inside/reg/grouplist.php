<?php 
	include("../connection.php");


//session_start();
	
	//$referenceno=$_GET['ref'];
	
?>
<?php
if(isset($_POST['add'])){
	
	


/*
$queryc = "SELECT * FROM student WHERE nic='".$_POST['nicpost']."'";
$resultcc = mysqli_query($con, $queryc);
$rox = mysqli_fetch_array($resultcc);

if ($resultcc->num_rows == 0) {



*/






	

			$nic = $_POST['nicpost'];
			
			
			
			
			//error_reporting(E_ALL ^ E_DEPRECATED);
		
	 //$qr4 = mysql_query(
        //"SELECT student_group.std_id
//FROM student_group
//LEFT JOIN student ON student.std_id = student WHERE student.nic='".$nic."'");


//$resultone = mysqli_query($con, $qr4);

//if(mysqli_fetch_array($resultone)== 0)
//{
    
			
			
			
									
						$query4="select std_id from student where nic='".$nic."' limit 1";
						
						$result = mysqli_query($con, $query4);
						
						if($rows=mysqli_fetch_array($result))
						{
						$std=$rows['std_id'];
						
						
						
												if(isset($_SESSION['grpid'])){
												
												$gidd=$_SESSION['grpid'];
												$ciid=$_SESSION['coid'];
												
												//insert
												
													$query1="insert into student_group(group_id,course_id,std_id,addedDate) values ( '$gidd', '$ciid', '$std','".date("Y-m-d")."')";
													
													
													
													$result = mysqli_query($con, $query1);
													 
													
													
													
													if (!($result ))
													  {
														echo("Database Error : " . mysqli_error($con));
														
														
													  }
													else
													  {
														echo("<p style='color:red; font-size:16px'>New student added successful</p>");
														
																	$querym1="UPDATE student_group_tot SET numMembers=`numMembers`+1 WHERE group_id='".$gidd."'";
																			
																			
																			
																			$resultFIN = mysqli_query($con, $querym1);
													 
																			
																		if (!($resultFIN ))
																		  {
																		  
																		  
																			  }
																		else
																		  {
																			echo("TOT ++");
																		  }
																		  
																		  
																		  
													  }
												  
												  
												  
												  
												}else{
													
												$gidd=$_GET['grpid'];
												echo $gidd;
												$query45="select course_id  from student_group where group_id='".$gidd."' limit 1";
						
												$resultc = mysqli_query($con, $query45);
												
												while($rows=mysqli_fetch_array($resultc))
												{
													
												
												$gstd=$rows['group_id'];
												$cstd=$rows['course_id'];
												
												
												//insert
												
												$query1="insert into student_group(group_id,course_id,std_id) values ( '$gstd', '$cstde', '$std')";
												
												
												
												$resultv = mysqli_query($con, $query1);
												 
												
												
												
												if (!($resultv))
												  {
													echo("Database Error : " . mysqli_error($con));
												  }
												else
												  {
													echo("Student creation was Successful");
												
												}
												
												
												
												
												}
						
						
						
										
													
													
													
									
						}
						
						
									
									
									////$fname = $_SESSION['coid'];
									//$lname = $_SESSION['brnid'];
									//$email = $_POST['email'];
									
									
									
								
								
						}
						
						
		/*				
      }else{
		  
		echo "cannot enter duplicate data";  
		  
	  }*/
}










//submit all

if(isset($_POST['allsub'])){
  
   unset($_SESSION['grpid']);
	unset($_SESSION['brnid']);
	unset($_SESSION['coid']);
	unset($_SESSION['nostudent']);
	
	
	
	echo '<script type="text/javascript">
   	// Javascript URL redirection
    window.location.replace("index.php?tab=regrp");
</script>';
}




?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<style>

.frmSearch {border: 1px solid #a8d4b1;background-color: #1a2956;margin: 2px 0px;padding:40px;border-radius:12px;}
#country-list{float: left;list-style:none;margin-top:5px; margin-left:0%;padding:0;width:190px;position: absolute; border-radius:12px;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:12px;}
</style>



<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "reg/readCountry.php",
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

<br />


<?php
if(isset($_SESSION['grpid'])){

$gidd=$_SESSION['grpid'];
}else{
	
$gidd=$_GET['grpid'];
}
?>

<hr />
<form method="post" action="">
<button type="submit" class="btn btn-warning" name="allsub" id="allsub" >Submit all</button></form>
<?php
$sel_query="SELECT course.c_name AS cname, course.duration AS du, course.course_fee AS cf, student_group_tot.g_branch_id AS gbi
, student_group_tot.dateCreate AS dct FROM student_group_tot
RIGHT JOIN course ON course.course_id=student_group_tot.g_course_id WHERE student_group_tot.group_id='".$_SESSION['grpid']."'";

$resulrr = mysqli_query($con,$sel_query);
if($row = mysqli_fetch_assoc($resulrr)) {
	
	
	$c=$row["cname"];
	$dur=$row["du"];
	$cfee=$row["cf"];
	$gbii=$row["gbi"];
	$dctt=$row["dct"];
	
	
}
	
	?> 
<div class="frmSearch" >
<form method="post" action="">
<input type="text" id="search-box" placeholder="Enter Nic" size="60" name="nicpost" autocomplete="off" /> <input type="submit" name="add" id="add" value="INSERT NEW" class="btn btn-success" style="border-radius:12px; padding:10px;" /></form>



<div id="suggesstion-box" align="center"></div>
</div>


<br />
<hr />
<div class="form">
<p>&nbsp;</p>
<h2>Group Information <?php echo $_SESSION['grpid'];?></h2><br />
<table class="table table-hover">
    <thead>
      <tr>
        <th>Course Name</th>
        <th>Duration</th>
        <th>Course fee</th>
        <th>Branch Id</th>
        <th>Group create date</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td bgcolor="#F0F0F0"><?php echo $c;?></td>
        <td bgcolor="#F0F0F0"><?php echo $dur;?></td>
        <td bgcolor="#F0F0F0"><?php echo $cfee;?></td>
        <td bgcolor="#F0F0F0"><?php echo $gbii;?></td>
        <td bgcolor="#F0F0F0"><?php echo $dctt;?></td>
      </tr>
    </tbody>
  </table>



<hr /><br />

<table width="100%" border="1" style="border-collapse: collapse; font-size: 14px; color: #000;" class="table">
<thead>
<tr>
  <th width="4%" bgcolor="#FFFFFF"><strong>No</strong></th>
  <th width="14%" bgcolor="#FFFFFF"><strong>First Name</strong></th><th width="14%" bgcolor="#FFFFFF"><strong>Last Name</strong></th><th width="20%" bgcolor="#FFFFFF"><strong>Nic</strong></th><th width="18%" bgcolor="#FFFFFF"><strong>Added date</strong></th><th width="4%">&nbsp;</th></tr>
</thead>
<tbody>



<?php
	
$count=1;
$sel_query="SELECT student.fname AS name, student_group.std_id AS stdnum, student.nic AS nicc, student.lname AS ln
, student_group.addedDate AS ad FROM student
RIGHT JOIN student_group ON student.std_id=student_group.std_id WHERE student_group.group_id='".$_SESSION['grpid']."' ORDER BY student_group.addedDate desc";

$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center" style="text-align: left"><?php echo $count; ?></td><td align="center" bgcolor="#FFFF99" style="text-align: left"><?php echo $row["name"]; ?></td><td align="center" bgcolor="#FFFF99" style="text-align: left"><?php echo $row["ln"]; ?></td><td align="center" bgcolor="#FFFF99" style="text-align: left"><?php echo $row["nicc"]; ?></td><td align="center" style="text-align: left"><?php echo $row["ad"]; ?></td><td align="center"><a href="reg/delete.php?id=<?php echo $row["stdnum"];?>&&Gid=<?php echo$_SESSION['grpid'];?>" class="btn btn-danger">Delete</a></td></tr>
<?php $count++; } ?>
</tbody>
</table>

<br /><br /><br />
</div>

</body>
</html>