<?php
include('connection.php');

 if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
$actionfunction = $_REQUEST['actionfunction'];
  
   call_user_func($actionfunction,$_REQUEST,$con);
}
function saveData($data,$con){
  
 
   $bname = $con->real_escape_string($data['name']);
  
  $sql = "insert into branch(branch_id,name) values('','$bname')";
  if($con->query($sql)){
    showData($data,$con);
  }
  else{
  echo "error";
  }
  
}
function showData($data,$con){
  $sql = "select * from branch order by branch_id asc";
  $data = $con->query($sql);
  $str='<tr class="head"><td>Branch Id</td><td>Branch name</td><td></td></tr>';
  if($data->num_rows>0){
   while( $row = $data->fetch_array(MYSQLI_ASSOC)){
	   
      $str.="<tr><tr id='".$row['branch_id']."'><td>".$row['branch_id']."</td><td>".$row['name']."</td><td><input type='button' class='ajaxedit w3-button w3-dark-grey w3-round-large w3-hover-blue-grey' value='Edit'/> <input type='button' class='ajaxdelete w3-button w3-red w3-round-large w3-hover-blue-grey' value='Delete'></td></tr>";
	  
   }
   }else{
    $str .= "<td colspan='5'>No Data Available</td>";
   }
   
echo $str;   
}
function updateData($data,$con){
   $bir = $con->real_escape_string($data['bii']);
  $bnnr = $con->real_escape_string($data['bnn']);
  
	$editid = $con->real_escape_string($data['editid']);
  $sql = "update branch set name='$bnnr' where branch_id='200'";
  if($con->query($sql)){
    showData($data,$con);
  }
  else{
   echo "error";
  }
  }
  function deleteData($data,$con){
    $delid = $con->real_escape_string($data['deleteid']); 
	$sql = "delete from branch where branch_id=$delid";
	if($con->query($sql)){
	  showData($data,$con);
	}
	else{
	echo "error";
	}
  }
?>