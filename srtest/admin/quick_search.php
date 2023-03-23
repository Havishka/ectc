<?php
include("../connection.php"); 
include("../session.php");

if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM employee WHERE nic like '" . $_POST["keyword"] . "%' and nic != '$namesession' ORDER BY nic LIMIT 0,6";

$result = mysqli_query($con, $query);
if(!empty($result)) {
?>
<ul id="country-list">

<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["nic"]; ?>');"><?php echo $country["nic"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>