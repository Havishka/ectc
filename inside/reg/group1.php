<?php 
	include("../connection.php");


	//session_start();
	
	$referenceno=$_GET['ref'];
	


	
	if(!isset($_SESSION['reno']) || empty($_SESSION['reno'])) {
echo '<meta http-equiv="Refresh" content="2; url=../target.html">';
}
	
	
	$noofmembers=$_GET['n'];
	$member=$_GET['member'];
	
	
	$gp=$_GET['grp'];
	$cd=$_GET['cid'];
	//include("Dashboard.html"); 
	
	
	if($noofmembers>=$member){
		
		if($noofmembers>$member){
			
$btn='<button type="submit"  name="next" class="btn btn-success">Next</button>';

//header("Location: index.php?tab=regrp&&ref=&&n=3&&member=1&&grp=6&&cid=3"); 

		}else if($noofmembers==$member){
			
			
			
			$btn='<button type="submit"  name="Finish" class="btn btn-success" onclick="location.href="http://google.com"">Finish</button>';
			
			
		}
		
	}else{
			header("Location: ../404.php"); 
		}
	
	
	
	
?>
<?php 


$query3="select max(std_id)+1 as sys from student";

$result = mysqli_query($con, $query3);

while($rows=mysqli_fetch_array($result))
{
$systemID=$rows['sys'];
}

?>

<?php 


$query4="select max(group_id) as sys from student_group_tot";

$result = mysqli_query($con, $query4);

while($rows=mysqli_fetch_array($result))
{
$group_id=$rows['sys'];
}

?>


<?php 


$query4="select g_branch_id,g_course_id  from student_group_tot order by group_id desc limit 1";

$result = mysqli_query($con, $query4);

while($rows=mysqli_fetch_array($result))
{
$branch=$rows['g_branch_id'];

$coursee=$rows['g_course_id'];


								$query45="select name  from branch where branch_id='$branch'";

								$result2 = mysqli_query($con, $query45);
								
								while($rows=mysqli_fetch_array($result2))
								
								{
								$branchname=$rows['name'];

								
								}
								
								
								
								//course name
								$query435="select c_name from course where state='T' and course_id='$coursee'";

								$result23 = mysqli_query($con, $query435);
								
								while($rows=mysqli_fetch_array($result23))
								
								{
								$coname=$rows['c_name'];

								
								}

}

?>

<?php

if(isset($_POST['next'])) {
	
	//insert data
	
		
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$nic = $_POST['nic'];
			$regDate = $_POST['regDate'];
			$address = $_POST['address'];
			$course = $_POST['course'];
			$regFee= $_POST['regFee'];
			$branch_id= $_POST['branch_id'];
			$sysID= $_POST['sysID'];
			$groupID= $_POST['groupID'];
			$dob=$_POST['dob'];
			$occ=$_POST['occ'];
			$gender=$_POST['gender'];
			
			
		   // $branch = $_POST['branch'];
			//$courseName = $_POST['courseName'];
			
			
			//$type = $_POST['type'];
			//$groupNum = $_POST['groupNum'];
			
		
		
		$query1="insert into student( fname,lname, nic, email, mobile, address ,regDate , regFee,  dob, gender, occupation) values ( '$fname', '$lname', '$nic', '$email', '$phone','$address','$regDate' , '$regFee','$dob', '$gender', '$occ' )";
		
		$query2="insert into student_branch ( std_id, branch_id) values ( '$sysID', '$branch_id')";
		
		$query3="insert into student_course ( std_id ,course_id ) values ( '$sysID', '$course')";
		
		$query4="insert into student_group (group_id, course_id, std_id) values ('$groupID', '$course' , '$sysID')";
		
		$result = mysqli_query($con, $query1);
		 
		$result= mysqli_query($con, $query2);
		
		$result = mysqli_query($con, $query3);
		
		$result = mysqli_query($con, $query4);
		
		
		
		if (!($result ))
		  {
			echo("Database Error : " . mysqli_error($con));
		  }
		else
		  {
			echo("$fname Student creation was Successful");
			
			
			
			$nid=$member+1;


		
			$referenceno=$_GET['ref'];
	

	
	 $_SESSION['reno']=$_GET['ref'];
				
			echo "<script>alert('GrsdsdsdsSuccessful'); window.location.href = 'index.php?tab=regrp&&ref=".$_SESSION['reno']."&&n=$noofmembers&&member=$nid&&grp=$gp&&cid=$cd'; </script>";


			
			
			
		  }
		  
		  
  
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	






}
else if(isset($_POST['Finish'])) {
	
	
	//Final member insert
	
	
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$nic = $_POST['nic'];
			$regDate = $_POST['regDate'];
			$address = $_POST['address'];
			$course = $_POST['course'];
			$regFee= $_POST['regFee'];
			$branch_id= $_POST['branch_id'];
			$sysID= $_POST['sysID'];
			$groupID= $_POST['groupID'];
			$dob=$_POST['dob'];
			$occ=$_POST['occ'];
			$gender=$_POST['gender'];
			
			
		   // $branch = $_POST['branch'];
			//$courseName = $_POST['courseName'];
			
			
			//$type = $_POST['type'];
			//$groupNum = $_POST['groupNum'];
			
		
		
		$query1="insert into student( fname,lname, nic, email, mobile, address ,regDate , regFee,  dob, gender, occupation) values ( '$fname', '$lname', '$nic', '$email', '$phone','$address','$regDate' , '$regFee','$dob', '$gender', '$occ' )";
		
		$query2="insert into student_branch ( std_id, branch_id) values ( '$sysID', '$branch_id')";
		
		$query3="insert into student_course ( std_id ,course_id ) values ( '$sysID', '$course')";
		
		$query4="insert into student_group (group_id, course_id, std_id) values ('$groupID', '$course' , '$sysID')";
		
		$result = mysqli_query($con, $query1);
		 
		$result= mysqli_query($con, $query2);
		
		$result = mysqli_query($con, $query3);
		
		$result = mysqli_query($con, $query4);
		
		
		
		if (!($result ))
		  {
			echo("Database Error : " . mysqli_error($con));
		  }
		else
		  {
			echo("$fname Student creation was Successful");
			
			
			
			$nid=$member+1;


		
			$referenceno=$_GET['ref'];
	

	
	 $_SESSION['reno']=$_GET['ref'];
				
			echo "<script>alert('GrsdsdsdsSuccessful'); window.location.href = 'index.php?tab=regrp'; </script>";


			
			
			
		  }
		  
		  
  
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	unset($_SESSION["reno"]);
	
	
	
echo "<script>alert('Are you sure?'); window.location.href = 'index.php?tab=regrp&ref='; </script>";
}


?>
<!DOCTYPE html>
<html lang="en">


  <body class="nav-md">
    <div class="container body">
  <!-- top navigation -->
  <div class="top_nav"></div>
  <!-- /top navigation -->

  <!-- page content -->

  <div class="clearfix"></div>

  <div class="row">
  <div class="x_title">
    <h1>Member : <?php echo $member;?> of <?php echo $noofmembers;?></h1>

    <div class="clearfix"></div>
    </div>
     <div class="x_content">
       <br />
        
       <form class="form-horizontal form-label-left input_mask" method="post" action="" form="form1">
          
         <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">First Name</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" class="form-control" placeholder="First Name" required name="fname">
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
             </div>
         </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Name</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" class="form-control" placeholder="Last Name" required name="lname">
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
            </div>
         </div>
          
          
         <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12">Date of Birth</label>
           <div class="col-md-9 col-sm-9 col-xs-12">
             <input type="text" class="form-control" placeholder="YYYY/MM/DD" required name="dob">
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
           </div>
         </div>
          
         <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
           <div class="col-md-9 col-sm-9 col-xs-12">
             <select id="gender" class="form-control" name="gender">
                <option selected disabled>Please select..</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
             </select>
           </div>
         </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Occupation</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" class="form-control" placeholder="Occupation" required name="occ">
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
            </div>
         </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" class="form-control" placeholder="Email" required name="email">
              <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
            </div>
         </div>
          
         <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Phone</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" class="form-control" placeholder="Phone" required name="phone">
              <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
              </div>
         </div>
          
         <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12">NIC</label>
           <div class="col-md-9 col-sm-9 col-xs-12">
             <input type="text" class="form-control" placeholder="NIC" required name="nic">
              <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
           </div>
         </div>
          
          
          
          
          
          
         <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12">Registration Date<span class="required">*</span>
           </label>
          <div class="col-md-9 col-sm-9 col-xs-12">
            <div class='input-group date' id='myDatepicker2'>
              <input type='text' class="form-control" name="regDate" placeholder"Registration Date" />
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
              
              <!-- <input type="text" class="form-control" name="regDate" id="regDate" placeholder="Registration Date" form="form1"  value="<?php echo date("Y-m-d"); ?>"  \>-->
            </div>
         </div>
          
          
          
         <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
           <div class="col-md-9 col-sm-9 col-xs-12">
             <input type="text" class="form-control" placeholder="Address" required name="address">
              <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>
           </div>
         </div>
          
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Registraion Fee</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" class="form-control" placeholder="Registration Fee" required name="regFee">
              <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>
            </div>
         </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Course</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" class="form-control" placeholder="course" required name="coursen" value='<?php echo $coname; ?>'  readonly="readonly">
              <input type="hidden" value="<?php echo $coursee;?>" name="course">
              <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>
            </div>
         </div>
          
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">branch</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input type="text" class="form-control" placeholder="course" required name="branch" value='<?php echo $branchname; ?>'  readonly="readonly">
              <input type="hidden" value="<?php echo $branch;?>" name="branch_id">
              <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>
            </div>
         </div>
        
          
         <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12">Student ID</label>
           <div class="col-md-9 col-sm-9 col-xs-12">
             <input type="text"  class="form-control"  name="sysID" value='<?php echo $systemID; ?>'  required="required" readonly >
              <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>
           </div>
         </div>
          
         <div class="form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12">Group ID</label>
           <div class="col-md-9 col-sm-9 col-xs-12">
             <input type="text"  class="form-control"  name="groupID" value='<?php echo $group_id; ?>' required  readonly="readonly">
              <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>
           </div>
         </div>
          
          
          
          
          
          
         <div class="ln_solid"></div>
         <div class="form-group">
           <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
              
              <button class="btn btn-primary" type="reset">Reset</button>
              
              
              <?php echo $btn;?> </div>
         </div>
          
       </form>
    </div>
  </div>


</body>
</html>
