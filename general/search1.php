<?php

include '../lib/db.php';
    $key=$_GET['key'];
    $array = array();
    // $con=mysqli_connect("localhost","root","","demos");
    $query=mysqli_query($db, "select * from city where city_name LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['city_name'];
    }
    echo json_encode($array);
    mysqli_close($db);
?>
