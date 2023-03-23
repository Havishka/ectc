<!DOCTYPE html>
<html lang="en">
  <head>
    
  </head>

  <body class="nav-md">
   

        <!-- page content -->
    
          		   <div class="page-title">
              <div class="title_left">
                <h3></h3>
              </div>

              <div class="title_right">
			  <form class="form-inline" method="post" action="#" >
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" name="nic" placeholder="Student Pre Details"  required >
					
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit" name="submit">Go!</button>
                    </span>
                  </div>
                </div>
				</form>
              </div>
			    
            </div>

            <div class="clearfix"></div>
        
                    
 <?php


if(isset($_REQUEST['submit'])){
    $nic=$_POST['nic'];
   
	$sql="select s.fname,spc.nic, s.std_id,s.email,s.mobile,s.address,spc.count_course,c.c_name 
	from student s, student_pre_course spc,course c 
	where s.nic=spc.nic and s.nic and c.course_id=spc.last_course_id and s.nic like '$nic'";
	
    $q=mysqli_query($con,$sql);
	
	$sql1="select s.nic, s.fname,s.std_id, sg.group_id, c.c_name,sgt.numMembers 
	from student s, student_course sc, course c, student_group sg , student_group_tot sgt 
	where s.std_id = sc.std_id and s.std_id = sg.std_id and sc.course_id =c.course_id and sc.course_id = sg.course_id and sgt.group_id=sg.group_id and s.nic like '$nic'";
	
	$q1=mysqli_query($con,$sql1);
	
	if($q==!null){


$res = $q->fetch_assoc();

echo '  
<form class="form-horizontal" action="" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2">Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" disabled  value="'.$res['fname'].'" >
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" >NIC:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" disabled  value="'.$res['nic'].'" />
    </div>
  </div>
  
  
  <div class="form-group">
    <label class="control-label col-sm-2" >Student ID :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="'.$res['std_id'].'" disabled />
    </div>
  </div>
  
  
  <div class="form-group">
    <label class="control-label col-sm-2" >Email:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="'.$res['email'].'" disabled />
	  
    </div>
  </div>
  
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Phone:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="'.$res['mobile'].'" disabled />
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2">Address:</label>
    <div class="col-sm-10">	
      <input type="text" class="form-control" value="'.$res['address'].'" disabled />
    </div>
  </div>
  
  
   <div class="form-group">
    <label class="control-label col-sm-2" >Number of course:</label>
    <div class="col-sm-10">
     <input type="text" class="form-control" value="'.$res['count_course'].'" readonly />
    </div>
  </div>
 
	<div class="form-group">
    <label class="control-label col-sm-2">Student Last Registered course:</label>
    <div class="col-sm-10">
     <input type="text" class="form-control" value="'.$res['c_name'].'" readonly />
    </div>
  </div>
 
</form>




';




}
	
	

if($q1==!null){

$res1 = $q1->fetch_assoc();

echo '  
<form class="form-horizontal" action="" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2">Group ID:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" disabled  value="'.$res1['group_id'].'" >
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" >Course Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" disabled  value="'.$res1['c_name'].'" />
    </div>
  </div>
  
  
  <div class="form-group">
    <label class="control-label col-sm-2" >Number Of Members :</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="'.$res1['numMembers'].'" disabled />
    </div>
  </div>
  
  
  
 
</form>




';
}

if ((mysqli_num_rows($q) == 0) && (mysqli_num_rows($q1) == 0) )
{
	echo "STUDENT RECORD NOT FOUND";
	echo "<script>alert('STUDENT RECORD NOT FOUND'); window.location.href = 'index.php?tab=payment_home'; </script>";
}

}

   
?>
<p align="right">
<br>
                <button class="btn btn-primary" onClick="document.location.href='index.php?tab=payment_home'" type="button" >Go Back</button>     
</p>                   
                    
                    
                    
                    
                         </div>
                </div>
              </div>




  </body>
</html>

