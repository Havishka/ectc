<?php
require_once("../connection.php");
require_once("../../check.php");
if(!empty($_POST["keyword"])) {
	
	
	if(($le==1))
	{
		$query ="SELECT nic,fname,lname FROM student WHERE nic like '" . $_POST["keyword"] . "%' ORDER BY nic LIMIT 0,6";
	}
	else
	{
		$query ="SELECT s.nic,s.fname,s.lname FROM student s,student_branch sb WHERE s.std_id=sb.std_id and sb.branch_id='$bid' and nic like '" . $_POST["keyword"] . "%' ORDER BY s.nic LIMIT 0,6";
	}

$result = mysqli_query($con, $query);
if(!empty($result)) {
?>
<ul id="country-list">

<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["nic"]; ?>');"><?php echo $country["nic"]; ?>:<?php echo $country["lname"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>