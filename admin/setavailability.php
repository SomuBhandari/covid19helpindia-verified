<?php
 include '../lib/db.php'; 
// $id = $_POST['id'];
// echo $id;
if(isset($_POST['makeavailable'])){
    $id = $_POST['makeavailable'];
    // echo $id;
    $available = "UPDATE `blood_donor` SET `available`= 1 WHERE `pk_blood_donor_id`= '$id'";
// echo $available;
    $result = mysqli_query($db, $available);
    if($result){
        // echo "success";
        header("Location:./donors.php");
    }
    else {
        echo 'error';
    }
}

if(isset($_POST['makeunavailable'])){
    $id = $_POST['makeunavailable'];
    // echo $id;
    $unavailable = "UPDATE `blood_donor` SET `available`= 0 WHERE `pk_blood_donor_id`= '$id'";
// echo $unavailable;
    $result1 = mysqli_query($db, $unavailable);
    if($result1){
        // echo "success";
        header("Location:./donors.php");
    }
    else {
        echo 'error';
    }
}

?>