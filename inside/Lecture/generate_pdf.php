
<?php
//include connection file 

include_once('fpdf/fpdf.php');

Class dbObj{
    /* Database connection start */
    var $dbhost = "localhost";
    var $username = "root";
    var $password = "ectc";
    var $dbname = "ectc_lec";
    var $conn;
    function getConnstring() {
    $con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
    
    /* check connection */
    if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
    } else {
    $this->conn = $con;
    }
    return $this->conn;
    }
    }

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
  // $this->Image('logo.jpg',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'           Confirmed Payments',1,0,'B');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array(  'le_name'=> 'Lecturer Name', 'co_name'=> 'Course Name','s_time'=> 'Start Time', 'e_time'=> 'End Time','to_time'=> 'ID','coverage'=> 'ID','approval'=> 'ID','f_approval'=> 'ID','g_approval'=> 'ID','sy_time'=> 'ID','pay_confirm'=> 'ID','id'=> 'ID');

$result = mysqli_query($connString, "select t.*, c.rate from  t_time t, c_assign c where t.g_approval='Approved' and t.pay_confirm='Approved' and c.c_name=t.co_name and c.l_name=t.le_name") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM t_time");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
foreach($header as $heading) {
$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(40,12,$column,1);
}
$pdf->Output();
?>