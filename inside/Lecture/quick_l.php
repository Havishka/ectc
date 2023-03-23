<?php
require_once("../connection.php");
require_once("../../check.php");
if(!empty($_POST["keyword"])) {
	

		$query ="SELECT f_name FROM lecture_reg WHERE f_name like '" . $_POST["keyword"] . "%' ORDER BY f_name LIMIT 0,6";


$result = mysqli_query($con, $query);
if(!empty($result)) {
?>
<ul id="country-list">

<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["f_name"]; ?>');"><?php echo $country["f_name"]; ?>:<?php echo $country["l_name"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>