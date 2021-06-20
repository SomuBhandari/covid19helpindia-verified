<?php
include '../lib/db.php';
// if($_POST['state'] != '' && $_POST['city'] != '')
if($_POST['city'] != ''){
    // echo $_POST['state'].'<br>';
    // echo $_POST['city'];


    
    $search = "SELECT hb.`pk_hospital_id`, hb.`name`, hb.`contact`, hb.`additional_information`, hb.`address`, c.`city_name`, s.`state_name`
    FROM 
        `hospital_bed` hb
    LEFT JOIN
        `city` c
    ON
        hb.`fk_city_id` = c.`pk_city_id`
    LEFT JOIN
        `state` s
    ON
        c.`fk_state_id` = s.`pk_state_id`
    LEFT JOIN
        `bed_type` bt
    ON
        hb.`fk_bed_type_id` = bt.`pk_bed_type_id`
    WHERE 
        bt.`bed_type_name` IN('General Beds','ALL Types') AND
        hb.`fk_city_id` = '{$_POST['city']}' AND
        hb.`available` = 1;";
    // echo $search;
    $query = mysqli_query($db, $search);
    while($row = mysqli_fetch_assoc($query)){
         echo '
	  <tr>
		   <td>'.$row["name"].'</td>
		   <td>'.$row["contact"].'</td>
		   <td>'.$row["city_name"].'</td>
           <td>'.$row["address"].'</td>
           <td>'.$row["additional_information"].'</td>
		 
	  </tr>';
    }
    // $data = explode(",", $_POST['state']);
    // $data1 = implode("', '", $_POST['city']);
    
    // echo $data;
    // echo $data1;


    
}
?>