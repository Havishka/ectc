<?php
session_start();
/* Database connection start*/
$servername = "localhost";
$username = "root";
$password = "ectc";
$dbname = "ectc_lec";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());


//include('../../../connection.php');
/* Database connection end */

//$conn=$con;

if(isset($_SESSION['btns'])){
	$dd = $_SESSION['btns'];
	
}

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 =>'course_id', 
	1 => 'c_name',
	2=> 'course_fee',
	3=> 'duration',
	4=> 'addedDate'
	
	
);

// getting total number records without any search
$sql = "SELECT course_id,c_name,course_fee,duration,addedDate,expdate";
$sql.=" FROM course";
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT  course_id,c_name,course_fee,duration,addedDate,expdate";
$sql.=" FROM course WHERE 1=1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( course_id LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR c_name LIKE '".$requestData['search']['value']."%' ";

	$sql.=" OR addedDate LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("query error: get course");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["course_id"];
	$nestedData[] = $row["c_name"];
	$nestedData[] = $row["course_fee"];
	$nestedData[] = $row["duration"];
	$nestedData[] = $row["addedDate"];
	
	$nestedData[] = "<center><a href='index.php?tab=all_course&&manage=".$row["course_id"]."' class='btn btn-warning ".$dd."' id='ee'><i class='fa fa-cog' aria-hidden='true'></i>&nbsp;Manage course</a></center>";
	$data[] = $nestedData;
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
