<?php
include '../lib/db.php';
if (! empty($_POST["state_id"])) {
    
    $stateId = $_POST["state_id"];
    
    
    $query_city = "SELECT * FROM `city` WHERE `fk_state_id`='$stateId'";
$result_city = mysqli_query($db, $query_city);
    ?>
<option>Select City</option>
<?php
while($city = mysqli_fetch_array($result_city)) {
        ?>
<option value="<?php echo $city["pk_city_id"]; ?>"><?php echo $city["city_name"]; ?></option>
<?php
    }
}
?>