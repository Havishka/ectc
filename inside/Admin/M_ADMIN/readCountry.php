<?php
require_once("../../connection.php");
if(!empty($_POST["keyword"])) {
$query ="SELECT branch_id,name FROM branch WHERE name like '" . $_POST["keyword"] . "%' OR branch_id like '" . $_POST["keyword"] . "%' ORDER BY branch_id LIMIT 0,6";
$result = mysqli_query($con, $query);
if(!empty($result)) {
?>
<ul id="country-list">
<h3>Branch List</h3>
<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["branch_id"]; ?>');"><?php echo $country["branch_id"]; ?> - <?php echo $country["name"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>