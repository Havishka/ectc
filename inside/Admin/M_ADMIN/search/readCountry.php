<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT branch_id FROM branch WHERE name like '" . $_POST["keyword"] . "%' ORDER BY branch_id LIMIT 0,6";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["branch_id"]; ?>');"><?php echo $country["branch_id"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>