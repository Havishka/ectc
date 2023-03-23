<?php 
	include("../connection.php");

	//session_start();
	
	//include("Dashboard.html"); 
?>
<?php 




$query4="select max(group_id) as sys from student_group_tot";

$result = mysqli_query($con, $query4);

if ($result->num_rows > 0) {
	
while($rows=mysqli_fetch_array($result))
{
$group_id=$rows['sys']+1;
}





}else{
	
	echo "hiyiuyiy";
	$group_id=0;
	
}

?>



<?php




if (isset($_POST['crtegrp'])){

		
	$memNo ="";






	
   
	$groupNo= $_POST['groupNo'];
	
	
	$course_id = $_POST['course_id'];
	
	
	if($_POST['branch_id']==null){
	$branch_id= $_POST['branch_id'];
	}else{
		
	$branch_id= $_POST['branch_id'];	
		
		
	}
	
	
	
	$memNo ="0";
	
	$date=date("l jS \of F Y h:i:s A");
   // $branch = $_POST['branch'];
	//$courseName = $_POST['courseName'];
	
	
	//$type = $_POST['type'];
	//$groupNum = $_POST['groupNum'];
	
	
	
	

	

							
							$query1="insert into student_group_tot ( group_id, g_course_id, numMembers, g_branch_id,dateCreate) values ( '$groupNo', '$course_id', '$memNo' ,'$branch_id','$date')";
							
							//$query2="insert into student_group ( std_id, branch_id) values ( '$sysID', '$branch_id')";
							
							//$query3="insert into student_course ( std_id ,course_id ,regNo) values ( '$sysID', '$course' , '$regNo')";
							
							$result = mysqli_query($con, $query1);
							 
							//$result= mysqli_query($con, $query2);
							
							//$result = mysqli_query($con, $query3);
							
							
							
							if (!($result ))
							  {
								echo("Database Error : " . mysqli_error($con));
							  }
							else
							  {
								   unset($_SESSION['grpid']);
								unset($_SESSION['brnid']);
								unset($_SESSION['coid']);
								///unset($_SESSION['nostudent']);
								  
								  //create session
								$_SESSION['grpid']=$_POST['groupNo'];
								$_SESSION['coid']= $_POST['course_id'];
								$_SESSION['brnid']= $_POST['branch_id'];
								//$_SESSION['nostudent']=$_POST['memNo'];
							
								
							echo "<script>alert('Group creation was Successful'); window.location.href = 'index.php?tab=regrp&&ref=3231&&grpid=".$_SESSION['grpid']."'; </script>";
									//header("Location: RegHome.php");
							  }
							  
  
  
					  echo "$username <br/> ";
					 } else {
						
					 }
							
							
		
		
	
	
	
	
	
	
	?>
<?php

if (isset($_POST['editg'])) {
	
	
	 unset($_SESSION['grpid']);
	unset($_SESSION['brnid']);
	unset($_SESSION['coid']);
	unset($_SESSION['nostudent']);
	
	
	
	
	 $_SESSION['grpid']=$_POST['g'];
	$_SESSION['coid']= $_POST['c'];
	$_SESSION['brnid']= $_POST['b'];
	$_SESSION['nostudent']=$_POST['b'];
	
	echo "<script>window.location.href = 'index.php?tab=regrp&&ref=3231&&grpid=".$_SESSION['grpid']."'; </script>";
  
}

?>





<!DOCTYPE html>
<html lang="en">
  <head>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
function delete_allgroup(mag) 
{ 
   if (confirm("Do you really want delete?")) {
	  
	   // window.location.href='Admin/M_ADMIN/deleteUSER.php?mode='+intValue;
	   window.location.href='reg/delete_group_full.php?gid='+mag;
	   
	  
    }else{
    return;
    }
}
</script>

  </head>

               <h3>Create new group</h3>
                  
                
              <div class="x_content">
                    <br />
                <form action="index.php?tab=regrp" method="post">
            <div class="form-content">
                <div class="row">
                 <div class="col-md-3">
                        <div class="form-group">
                            <label>Group Number </label>
							
                            <input type="text" name="groupNo" class="form-control"/ value="<?php echo $group_id; ?>"  readonly="readonly">
                            
                        </div>
                    </div>
					
					<div class="col-md-3">
                        <div class="form-group">
                            <label>Course</label>
                            <br>
                            <?php   
				
					
					//query
					$sql=mysqli_query($con,"SELECT c_name,course_id FROM course where state='T' ");
					if(mysqli_num_rows($sql)){
					$select= '<select id="branch" class="form-control" name="course_id" required><option selected disabled>Please select..</option>';
					
					while($rs=mysqli_fetch_array($sql)){
						  $select.='<option value="'.$rs['course_id'].'">'.$rs['c_name'].'</option>';
					  }
					}
					$select.='</select>';
					echo $select;
?>
                        </div>
                    </div>
					<div class="col-md-3">
                        <div class="form-group">
                            <label>Branch</label>
                            <br>
                            <?php   
			
					//query
					//$sql=mysqli_query($con,"SELECT branch_id,name FROM branch");
					
						//if level 2 or 3 only can register to his branch
					if(($le==2)||($le==3))
					{
						$sql=mysqli_query($con,"SELECT branch_id , name FROM branch where branch_id='$bid'");
					}
					else
					{
					$sql=mysqli_query($con,"SELECT branch_id,name FROM branch");
					}
					
					
					
					
					if(mysqli_num_rows($sql)){
					$select= '<select id="branch" class="form-control" name="branch_id" required><option selected disabled>Please select..</option>';
					
					while($rs=mysqli_fetch_array($sql)){
						  $select.='<option value="'.$rs['branch_id'].'">'.$rs['name'].'</option>';
					  }
					}
					$select.='</select>';
					echo $select;
?>
                            
                            
 							                   
                      </div>
                    </div>
					<BR>
                  <br>
                  <br><br><br>
                  <button type="submit" class="btn btn-success" name="crtegrp">Create new group</button>
                </form>
                    
                    <hr>
                    
                </div>    
                    
              <hr>
              <br>
              
  <h3>Edit Group</h3>

  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  
  <?php

 $sql = "SELECT course.c_name AS coursename, student_group_tot.group_id AS ggid,student_group_tot.dateCreate
 AS DCTE ,student_group_tot.g_course_id AS codid ,student_group_tot.g_branch_id AS bidd, student_group_tot.numMembers
 AS count FROM course
LEFT JOIN  student_group_tot ON course.course_id = student_group_tot.g_course_id WHERE student_group_tot.g_branch_id
ORDER BY student_group_tot.dateCreate desc";
 


$result = $con->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table table-bordered'><tr><th>Group ID</th><th>Course</th><th>Branch id</th><th>Create date</th><th>No of students</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
	
	if($row["bidd"]==$bid){
        echo "<tr><td>" . $row["ggid"]. "</td><td>" . $row["coursename"]. " (Course ID:" . $row["codid"]. ")</td><td>" . $row["bidd"]. "</td><td>" . $row["DCTE"]. "</td><td>" . $row["count"]. "</td><td width='100px'><form action='' method='post'><input type='hidden' value='" . $row["ggid"]. "' name='g'><input type='hidden' value='" . $row["codid"]. "' name='c'><input type='hidden' value='". $row["bidd"]."' name='b'><button type='submit' class='btn btn-warning' name='editg'>Edit group</button></form></td><td width='100px'><a href='javascript:delete_allgroup(".$row["ggid"].")'><button type='button' class='btn btn-danger'>Delete Group</button></a></td></tr>";
		
		}
		
		/*
		
		    <a href="javascript:delete_allgroup('.$row["ggid"].')"><button type="button" class="btn btn-danger" style="width:100%;">Delete Group</button></a><br/>
</td><br></tr>';
		   echo "<tr><td>" . $row["ggid"]. "</td><td>" . $row["coursename"]. " (Course ID:" . $row["codid"]. ")</td><td>" . $row["bidd"]. "</td><td>" . $row["DCTE"]. "</td><td>" . $row["count"]. "</td><td width='100px'><form action='' method='post'><input type='hidden' value='" . $row["ggid"]. "' name='g'><input type='hidden' value='" . $row["codid"]. "' name='c'><input type='hidden' value='". $row["bidd"]."' name='b'><button type='submit' class='btn btn-warning' name='editg'>Edit group</button></form></td><td width='100px'><a href='reg/delete_group_full.php?gid=". $row["ggid"]."' class='btn btn-danger'>Delete Group</a></td></tr>";
		
		
		      echo "<tr><td>" . $row["ggid"]. "</td><td>" . $row["coursename"]. " (Course ID:" . $row["codid"]. ")</td><td>" . $row["bidd"]. "</td><td>" . $row["DCTE"]. "</td><td>" . $row["count"]. "</td><td width='100px'><form action='' method='post'><input type='hidden' value='" . $row["ggid"]. "' name='g'><input type='hidden' value='" . $row["codid"]. "' name='c'><input type='hidden' value='". $row["bidd"]."' name='b'><button type='submit' class='btn btn-warning' name='editg'>Edit group</button></form></td><td width='100px'><button type='button' class='btn btn-danger' >Delete group</button></td></tr>";*/
		
		/*<a href="reg/delete_group_full.php?gid=. $row["ggid"]." class="btn btn-danger">Delete Group</a>*/
    }
    echo "</table>";
} else {
    echo "0 results";
}

$con->close();


?>
  </body>
</html>
