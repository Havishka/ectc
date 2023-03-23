<?php 



include("connection.php");





    $fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
   
	
	


$query1="insert into student( fname,lname, nic, email, mobile, address ,regDate , regFee,  dob, gender, occupation) values ( '$fname', '$lname', '$nic', '$email', '$phone','$address','$regDate' , '$regFee','$dob', '$gender', '$occ' )";

$result = mysqli_query($con, $query1);
 

if (!($result ))
  {
  	echo("Database Error : " . mysqli_error($con));
  }
else
  {
	echo("Student creation was Successful");
	echo "<script>alert('Student creation was Successful'); window.location.href = 'group1.php'; </script>";
		//header("Location: RegHome.php");
  }
  
  
  
  

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


<div class="x_content">
                    <br />
                <form action="index.php?tab=manage_admin" method="post">
            <div class="form-content">
                <div class="row">
                 <div class="col-md-3">
                        <div class="form-group">
                            <label>Group Number </label>
							
                            <input type="text" name="groupNo" class="form-control" />
                            
                        </div>
                    </div>
					
					<div class="col-md-3">
                        <div class="form-group">
                            <label>Course</label>
                            <br>
                            <?php   
					error_reporting(E_ALL ^ E_DEPRECATED); 
                    mysql_connect("localhost","root","ectc");
					mysql_select_db("ectc_lec");
					
					//query
					$sql=mysql_query("SELECT c_name,course_id FROM course");
					if(mysql_num_rows($sql)){
					$select= '<select id="branch" class="form-control" name="course_id"><option selected disabled>Please select..</option>';
					
					while($rs=mysql_fetch_array($sql)){
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
                            <label>Number of Members </label>
                            <input type="text" name="memNo" class="form-control"/>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Branch</label>
                            <br>
                            <?php   
					error_reporting(E_ALL ^ E_DEPRECATED); 
                    mysql_connect("localhost","root","ectc");
					mysql_select_db("ectc_lec");
					
					//query
					$sql=mysql_query("SELECT branch_id,name FROM branch");
					if(mysql_num_rows($sql)){
					$select= '<select id="branch" class="form-control" name="branch_id"><option selected disabled>Please select..</option>';
					
					while($rs=mysql_fetch_array($sql)){
						  $select.='<option value="'.$rs['branch_id'].'">'.$rs['name'].'</option>';
					  }
					}
					$select.='</select>';
					echo $select;
?>
                            
                            
 							                   
                      </div>
                    </div>
					
				  <button type="submit" class="btn btn-success" name="crtegrp">Submit</button>
                 </form>
                    
                    <hr>
                    
                </div>
</body>
</html>