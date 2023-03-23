<?php
include('db.php');

 if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
$actionfunction = $_REQUEST['actionfunction'];
  
   call_user_func($actionfunction,$_REQUEST,$con);
}
function saveData($data,$con){
  
 
   $fname = $con->real_escape_string($data['name']);
  $ename = $con->real_escape_string($data['em']);
  $branchid = $con->real_escape_string($data['brnc']);
  $username= $con->real_escape_string($data['un']);
    $pass= $con->real_escape_string(md5($data['pass']));
  $sql = "insert into admin(admin_id,name,email,branch_id,username,password) values('','$fname',' $ename ','$branchid','$username','$pass')";
  if($con->query($sql)){
    showData($data,$con);
  }
  else{
  echo "error";
  }
  
}
function showData($data,$con){
  $sql = "select * from admin order by admin_id asc";
  $data = $con->query($sql);
  $str='<tr class="head"><td>Name</td><td>Email</td><td>Branch Id</td><td>Username</td><td>Password</td><td></td></tr>';
  if($data->num_rows>0){
   while( $row = $data->fetch_array(MYSQLI_ASSOC)){
      $str.="<tr id='".$row['admin_id']."'><td>".$row['name']."</td><td>".$row['email']."</td><td width='100px'>".$row['branch_id']."</td><td>".$row['username']."</td><td>".$row['password']."</td><td><input type='button' class='ajaxedit' value='Edit'/> <input type='button' class='ajaxdelete' value='Delete'></td></tr>";
   }
   }else{
    $str .= "<td colspan='5'>No Data Available</td>";
   }
   
echo $str;   
}
function updateData($data,$con){
  $fname = $con->real_escape_string($data['fname']);
  $lname = $con->real_escape_string($data['lname']);
  $domain = $con->real_escape_string($data['domain']);
  $email = $con->real_escape_string($data['email']);
  $editid = $con->real_escape_string($data['editid']);
  $sql = "update admin set firstname='$fname',lastname='$lname',domain='$domain',email='$email' where id=$editid";
  if($con->query($sql)){
    showData($data,$con);
  }
  else{
   echo "error";
  }
  }
  function deleteData($data,$con){
    $delid = $con->real_escape_string($data['deleteid']); 
	$sql = "delete from admin where admin_id=$delid";
	if($con->query($sql)){
	  showData($data,$con);
	}
	else{
	echo "error";
	}
  }
?>