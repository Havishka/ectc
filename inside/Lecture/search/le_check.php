<?php 
include 'connection.php';
include  'l_check.php';
if(!empty($_POST["keyword"])) {
        $lname=$_SESSION['name'];
        $query = "SELECT c_name FROM c_assign WHERE c_name like '" . $_POST["keyword"] . "%' LIMIT 0,6";
    
  


$result = mysqli_query($con, $query);
if(!empty($result)) {
?>
<ul id="country-list">

<?php
foreach($result as $country) {
?>
<li onClick="selectCountry_2('<?php echo $country["c_name"]; ?>');"><?php echo $country["c_name"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>