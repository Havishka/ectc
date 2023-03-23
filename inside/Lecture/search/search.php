<?php 
include 'connection.php';
include  '/xampp/htdocs/sys1/check.php';
if(!empty($_POST["keyword"])) {
 
        $query = "SELECT f_name  FROM lecture_reg WHERE f_name like '" . $_POST["keyword"] . "%' ";
    
  


$result = mysqli_query($con, $query);
if(!empty($result)) {
?>
<ul id="country-list">

<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["f_name"]; ?>');"><?php echo $country["f_name"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>
