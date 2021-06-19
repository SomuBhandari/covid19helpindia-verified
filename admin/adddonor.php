<?php
 if(isset($_POST['submit'])){
    include '../lib/db.php'; 
    $name = trim($_POST['name']);
    $contact = trim($_POST['contact']);
    $address = trim($_POST['address']);
    $info = trim($_POST['infor']);
    $blood = trim($_POST['blood']);
    $state = trim($_POST['state']);
    $city = trim($_POST['city']);
    $available = trim($_POST['available']);

    // echo '
    // $name <br> $contact <br> $info <br> $blood <br> $state <br> $city
    // ';

    $insert_donor = "INSERT INTO `blood_donor`(`donor_name`, `contact`, `address`, `additional_information`, `fk_blood_group_id`, `fk_city_id`, `fk_state_id`, `available`) VALUES ('$name','$contact','$address','$info','$blood','$city',$state,'$available')";

    $result = mysqli_query($db, $insert_donor);
    

    if($result){
        // echo "success";
        header("Location:./donors.php");

    }

    else{
        echo "chutiya gaandu";
    }
 }
 ?>