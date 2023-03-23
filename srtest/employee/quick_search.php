

<?php
include("../connection.php"); 


if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM status_report WHERE date like '" . $_POST["keyword"] . "%' ORDER BY date LIMIT 0,6";

$result = mysqli_query($con, $query);
if(!empty($result)) {
?>
<ul id="country-list">

<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["date"]; ?>');"><?php echo $country["date"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>