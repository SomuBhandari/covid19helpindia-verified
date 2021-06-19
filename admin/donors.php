<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"  crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href="./assets/dashboard.css" rel="stylesheet">
    <script src="../ajax/handler.js"></script>
    <!-- <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script> -->
  </head>
  <body>

<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
  header("location: ./login.php");
  exit;
} 
include '../lib/db.php';

if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>


  <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"> Admin</a>
        </div>

        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Dashboard</a></li>
            <li><a href="">Hospitals</a></li>
            <li><a href="">Donors</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome  </a></li>
            <li><a href="login.php">Logout</a></li>
          </ul>
        </div><!--.nav-collapse -->
      </div>
    </nav>

<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Hospital Dashboard </h1>
            </div>
            <div class="col-md-2">
                
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="modal" data-target="#addPage" aria-haspopup="true" aria-expanded="true">
                Add Hospital
              </button>

  
            </div>
        </div>
    </div>
</header>

<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="active">Dashboard</li>
            <li>Hospital</li>
        </ol>
    </div>
</section>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <!-- Latest Users -->
                <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                        <tr>
                          <th>Donor Name</th>
                          <th>Contact</th>
                          <th width="30%">Additional Info</th>
                          <th>Blood Group</th>
                          <th>City</th>
                          <th>State</th>
                          
                          <th>Availability</th>
                          
                        </tr>
                         <?php
                
             
                if (mysqli_connect_errno()){
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }

                $donor_query = "SELECT bd.pk_blood_donor_id, bd.`donor_name`, bd.`contact`, bd.`additional_information`, bg.`blood_group`, c.`city_name`, s.`state_name`, bd.`available`
                FROM 
                    `blood_donor` bd
                LEFT JOIN 
                    `blood_group` bg
                ON
                    bd.`fk_blood_group_id` = bg.`pk_blood_group_id`
                LEFT JOIN
                    `city` c
                ON
                    bd.`fk_city_id` = c.`pk_city_id`
                LEFT JOIN
                    `state` s
                ON
                    c.`fk_state_id` = s.`pk_state_id`";
                $result = mysqli_query($db, $donor_query);
                while($row = mysqli_fetch_array($result)){
                     $available = $row['available'];

                    echo '<tr>
                    <td>'.$row['donor_name'].'</td>
                    <td>'.$row['contact'].'</td>
                    <td>'.$row['additional_information'].'</td>
                    <td>'.$row['blood_group'].'</td>
                    <td>'.$row['city_name'].'</td>
                    <td>'.$row['state_name'].'</td>';

                    if($available==0){
                        echo "
                        <form method='POST' action='setavailability.php'>
                        <td><button type='submit' name='makeavailable' value='$row[pk_blood_donor_id]'>Make Available</button></td>";
                    }
                    else{
                        echo "<td><button type='submit' name='makeunavailable' value='$row[pk_blood_donor_id]'>Make Unavailable</button></td>
                        </form>";
                    }
                    echo "</tr>";
                }
                ?>
                      </table>
                    </div>
            </div>
        </div>
    </div>
</section>
<div>
            <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="POST" action="adddonor.php">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Donor</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Donor Name</label>
          <input type="text" class="form-control" placeholder="Donor Name" name='name' required>
        </div>
        <div class="form-group">
          <label>Donor Contact</label>
          <input type="text" class="form-control" placeholder="Donor Contact" name='contact' required>
        </div>
        <div class="form-group">
          <label>Donor Address</label>
          <input type="text" class="form-control" placeholder="Donor Address" name='address'>
        </div>
        <div class="form-group">
          <label>Additional Information</label>
          <input type="text" class="form-control" placeholder="Additional Information" name='infor'>
        </div>
        
        <div class="form-group">
          <label>Blood Group</label>
          <select class="form-control" name="blood" required>
                        <option value disabled selected>Choose Blood Group</option>
                        <?php
                        $getType = "SELECT*FROM blood_group";
                $typeResult = mysqli_query($db, $getType);
                while($type = mysqli_fetch_array($typeResult)){
                    echo $type['blood_group'];
                    echo' <option value='.$type['pk_blood_group_id'].'>'.$type['blood_group'].'</option>';
                }
                ?>
                        </select>
        </div>

        <div class="form-group">
        <label>State:</label><br /> 
          <select name="state"
                id="country-list" class="form-control"
                onChange="getCity(this.value);" required>
                <option value disabled selected>Select State</option>
                <?php
                  
                    $query = "SELECT * FROM state";
                    $result = mysqli_query($db, $query);
                    while ($row = mysqli_fetch_array($result)){
                        ?>
                    <option value="<?php echo $row["pk_state_id"]; ?>"><?php echo $row["state_name"]; ?></option>
                    <?php
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
        <label>City:</label><br /> <select name="city"
                id="city-list" class="form-control" required>
                <option>Select City</option>
            </select>
        </div>

        <div class="form-group">
          <label>Available</label>
          <select class="form-control" name="available">
                        <!-- <option value='Availability'>Available</option> -->
                        <option value="0" >No</option>
                        <option value="1" selected>Yes</option>
                        </select>
        </div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name='submit' class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

<footer id="footer">
    
</footer>



<!-- 
<script>
    CKEDITOR.replace( 'editor1' );
</script> -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
