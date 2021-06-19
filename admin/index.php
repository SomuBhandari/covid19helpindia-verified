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
  $result = mysqli_query($db,"SELECT * FROM hospital_bed");
  $count_hospitals=mysqli_num_rows($result);

  $result1 = mysqli_query($db,"SELECT * FROM blood_donor");
  $count_donors=mysqli_num_rows($result1);

//   $result2 = mysqli_query($db,"SELECT * FROM batches");
//   $count_batches=mysqli_num_rows($result2);
  
//   $result3 = mysqli_query($db,"SELECT * FROM `student_details` WHERE `student_phone`='-' AND `student_email` LIKE '%learnenmet.com%'");
//   $count_manual=mysqli_num_rows($result3);
  



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
            <li class="active"><a href="index.html">Dashboard</a></li>
            <li><a href="">Hospitals</a></li>
            <li><a href="./donors.php">Donors</a></li>
<!--            <li><a href="./quiz/">Quiz</a></li>-->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome  </a></li>
            <li><a href="login.html">Logout</a></li>
          </ul>
        </div><!--.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard </h1>
          </div>
          <div class="col-md-2">
            <!-- <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Create Content
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#addPage">Add Page</a></li>
                <li><a href="#">Add Post</a></li>
                <li><a href="#">Add User</a></li>
              </ul>
            </div> -->
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Dashboard</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Website Overview</h3>
              </div>
              <div class="panel-body">
                <div class="col-md-3">
                  <div class="well dash-box">
                      <h2></h2>
                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> </h2>
                      <h2><?php echo $count_hospitals; ?></h2>
                    <h4>Hospital Beds</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> </h2>
                      <h2><?php echo $count_donors; ?></h2>
                    <h4>Donors</h4>
                  </div>
                </div>
                  <!-- <div class="col-md-3">
                      <div class="well dash-box">
                          <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> </h2>
                          <h2><?php echo $count_students; ?></h2>
                          <h4>Students</h4>
                      </div>
                  </div>
                   <div class="col-md-3">
                      <div class="well dash-box">
                          <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> </h2>
                          <h2><?php echo $count_manual; ?></h2>
                          <h4>Manual Students</h4>
                      </div>
                  </div>
                 -->
                <!-- <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 33</h2>
                    <h4>Posts</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 12,334</h2>
                    <h4>Visitors</h4>
                  </div>
                </div> -->
              </div>
              </div>

              <!-- Latest Users -->
              <!--<div class="panel panel-default">-->
              <!--  <div class="panel-heading">-->
              <!--    <h3 class="panel-title">Latest Students</h3>-->
              <!--  </div>-->
              <!--  <div class="panel-body">-->
              <!--    <table class="table table-striped table-hover">-->
              <!--        <tr>-->
              <!--          <th>Name</th>-->
              <!--          <th>Email</th>-->
              <!--          <th>Joined</th>-->
              <!--        </tr>-->
              <!--        <tr>-->
              <!--          <td>Jill Smith</td>-->
              <!--          <td>jillsmith@gmail.com</td>-->
              <!--          <td>Dec 12, 2016</td>-->
              <!--        </tr>-->
              <!--        <tr>-->
              <!--          <td>Eve Jackson</td>-->
              <!--          <td>ejackson@yahoo.com</td>-->
              <!--          <td>Dec 13, 2016</td>-->
              <!--        </tr>-->
              <!--        <tr>-->
              <!--          <td>John Doe</td>-->
              <!--          <td>jdoe@gmail.com</td>-->
              <!--          <td>Dec 13, 2016</td>-->
              <!--        </tr>-->
              <!--        <tr>-->
              <!--          <td>Stephanie Landon</td>-->
              <!--          <td>landon@yahoo.com</td>-->
              <!--          <td>Dec 14, 2016</td>-->
              <!--        </tr>-->
              <!--        <tr>-->
              <!--          <td>Mike Johnson</td>-->
              <!--          <td>mjohnson@gmail.com</td>-->
              <!--          <td>Dec 15, 2016</td>-->
              <!--        </tr>-->
              <!--      </table>-->
              <!--  </div>-->
              <!--</div>-->
          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <!-- <p>Copyright AdminStrap, &copy; 2017</p> -->
    </footer>

    <!-- Modals -->

    <!-- Add Page -->
 

  <script>
     CKEDITOR.replace( 'editor1' );
 </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </body>
</html>
