<?php
include('connection.php');

 if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
$actionfunction = $_REQUEST['actionfunction'];
  
   call_user_func($actionfunction,$_REQUEST,$con);
}
function saveData($data,$con){
  
 
    $cname = $con->real_escape_string($data['cname']);
  $coursefee = $con->real_escape_string($data['cf']);
  $courseduration = $con->real_escape_string($data['cd']);
  $ff= $con->real_escape_string($data['fi']);
  $ss= $con->real_escape_string($data['si']);
  $tt= $con->real_escape_string($data['ti']);
  
  //$sql = "insert into course(c_name,course_fee,duration) values('$cname',' $coursefee ','$courseduration')";
  
  //$sql2 = "insert into course_installment(course_id,installment_01 ,installment_02 ,installment_03) values('11','$inst1',' $inst2 ','$inst3')";
  
 // result2 = $con->query($sql2);
 
 
 
 
 
 /*
 
 $cnamee = $con->real_escape_string($data['cname']);
  $cfe = $con->real_escape_string($data['cf']);
  $cde = $con->real_escape_string($data['cd']);
  
  
     //$cci= $con->real_escape_string($data['ci']);
   $ff = $con->real_escape_string($data['fi']);
  $ss = $con->real_escape_string($data['si']);
  $tt = $con->real_escape_string($data['ti']);
  */
  $installemnt_approval=false;
   
  
  if(($ff==0) ||( $ff==null)){
	  $ff=0;
	  $ss=0;
	  $tt=0;
	  
	  $installemnt_approval=false;
	//  echo "in 1";
  }
  
   if(($ss==0) ||( $ss==null)){
	
	  $ss=0;
	  $tt=0;
	   $installemnt_approval=true;
	 //  echo "in 2";
  }
  
   if(($tt==0) ||( $tt==null)){
	
	
	  $tt=0;
	   $installemnt_approval=true;
	 //  echo "in 3";
	  
  }
  if(($ff!=0)&&($ss!=0)&&($tt!=0) )
  {
	  $installemnt_approval=true;
	   //echo "in 3ee";
  }
  
  //echo "in 4";


$sql = "SELECT course_id FROM course_installment order by course_id desc";
$result = $con->query($sql);

 $finallast=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $last = $row['course_id'];
  $finallast=$last+1;

    }
} else {
    echo "0 results";
}


  
  
 // $sql = "insert into course(course_id,c_name,course_fee,duration) values('','$cnamee','$cfe','$cde')";
    $sql = "insert into course(c_name,course_fee,duration) values('$cname',' $coursefee ','$courseduration')";
	
	/*echo "$ff";
	
	$sql = "SELECT course_id FROM course order by course_id desc limit 1 ";
			$result = $con->query($sql);
			while($row = $result->fetch_assoc()) {
					
					$lid=$row["course_id"];
			}
	
						echo "$lid";*/
						
  
 if(($con->query($sql))){
	 
	 
			$sql = "SELECT course_id FROM course order by course_id desc limit 1 ";
			$result = $con->query($sql);
			while($row = $result->fetch_assoc()) {
					
					$lid=$row["course_id"];
					
					if($installemnt_approval==true){
					$sqlci = "insert into course_installment(course_id,installment_01,installment_02,installment_03) values('$lid','$ff','$ss','$tt')";
						
						if($con->query($sqlci)){
					//	echo "$ff";
					//	echo "$lid";
						//showData($data,$con);
							 }else{
								 
								 
								 
							 }
					}else if($installemnt_approval==false){
						
						
						
					}
					
					
				}


		 

		 
		 
		 
  }
  else{
  echo "error";
  }
  
}
function showData($data,$con){
  $sql = "select * from course where state='T' order by course_id asc";
  $data = $con->query($sql);
  $str='<tr class="head"><td>Course ID</td><td>Course Name</td><td>Course Fee</td><td>Course Duration</td><td></td></tr>';
  if($data->num_rows>0){
   while( $row = $data->fetch_array(MYSQLI_ASSOC)){
      $str.="<tr><tr id='".$row['course_id']."'><td>".$row['course_id']."</td><td>".$row['c_name']."</td><td>".$row['course_fee']."</td><td width='100px'>".$row['duration']."</td><td><a href='Admin/M_COURSE/installements.php'><input type='button' class=' w3-button w3-yellow w3-round-large w3-hover-blue-grey' value='Installments'></a>
	  
	  <br><input type='button' class='ajaxedit w3-button w3-dark-grey w3-round-large w3-hover-blue-grey' value='Edit'/> <input type='button' class='ajaxdelete w3-button w3-red w3-round-large w3-hover-blue-grey' value='Delete'>
	  
	  
 </td>
	  
	  
	  </tr>
	  ";
   }
   }else{
    $str .= "<td colspan='5'>No Data Available</td>";
   }
   
echo $str;   
}
function updateData($data,$con){
   $ccname = $con->real_escape_string($data['cname']);
  $r = $con->real_escape_string($data['cf']);
  $d = $con->real_escape_string($data['cd']);

	$editid = $con->real_escape_string($data['editid']);
  $sql = "update course set c_name='$ccname',course_fee='$r',duration='$d' where course_id='$editid'";
  if($con->query($sql)){
    showData($data,$con);
  }
  else{
   echo "error";
  }
  }
  function deleteData($data,$con){
    $delid = $con->real_escape_string($data['deleteid']); 
	/*$sql = "delete from course where course_id=$delid";
	$sql2 = "delete from course_installment where course_id=$delid";*/
	$sql = "update course set state='F' where course_id=$delid ";
	//$resu=$con->query($sql2);
	if($con->query($sql)){
	  showData($data,$con);
	}
	else{
	echo "error";
	}
  }
?>