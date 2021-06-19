<?php
include '../lib/db.php';
// if($_POST['state'] != '' && $_POST['city'] != '')
if($_POST['city'] != ''){
    // echo $_POST['state'].'<br>';
    // echo $_POST['city'];
    
    $search = "SELECT * FROM `hospital_bed` WHERE `fk_city_id` = '{$_POST['city']}'";
    // echo $search;
    $query = mysqli_query($db, $search);
    while($row = mysqli_fetch_assoc($query)){
         echo '
	  <tr>
		   <td>'.$row["name"].'</td>
		   <td>'.$row["contact"].'</td>
		   <td>'.$row["address"].'</td>
		 
	  </tr>';
    }
    // $data = explode(",", $_POST['state']);
    // $data1 = implode("', '", $_POST['city']);
    
    // echo $data;
    // echo $data1;


    
}
?>