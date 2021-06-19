<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Beds</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
 <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script src="../ajax/handler.js"></script>
    <script src="../ajax/search-handler.js"></script>
</head>
<body>
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="#"><img src="../images/Covid19HelpIndiaLogo.JPG"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="#top">Blood</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about-us">Oxygen</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#services">Hospitals</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#testimonials">Medical Resources</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#testimonials">Become a Donor</a>
              </li>
                
            </ul>
          </div>
        </nav>
        </section>  

    <section id="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="promo-title">Covid-19 Help India</p>
                </div>
            </div>
        </div>
    </section>

    <section id="breadcrumb">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"> <a href="../hospital.html">Hospital</a></li>
              <li class="breadcrumb-item active" aria-current="page"> <a href="./general.html">General Beds</a></li>
            </ol>
          </nav>
          
        
    </section>

    <section id="services">

      <div class="frmDropDown">
        <div class="row">
          <label>State:</label><br /> <select name="state"
                id="country-list" class="demoInputBox"
                onChange="getCity(this.value);">
                <option value disabled selected>Select State</option>
                <?php
include '../lib/db.php';
$query = "SELECT * FROM states";
$result = mysqli_query($db, $query);
while ($row = mysqli_fetch_array($result)){
    ?>
<option value="<?php echo $row["pk_state_id"]; ?>"><?php echo $row["state_name"]; ?></option>
<?php
}
?>
</select>
        </div>

        <div class="row">
            <label>City:</label><br /> <select name="city"
                id="city-list" class="demoInputBox">
                <option>Select City</option>
            </select>
        </div>
      </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Number</th>
                    <th>City</th>
                    <th>State</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>

    </section>
<script>
    
//     $(document).ready(function() {
    

//     $('#city-list').change(function() {
//         var state= $('#country-list').val();
//         var city = $('#city-list').val();
//         // alert(state+"," +city+","+"hello");

//         listRecords(state, city);
//     });
// });

 $("#country-list").select2();
  $("#city-list").select2();

</script>
</body>
</html>