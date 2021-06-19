<?php
  if(isset($_POST['submit'])){
    include '../lib/db.php';
    if(!$db){
        echo "Database Connection failed";
    }
    $email = $_POST['email'];
    $password = $_POST['pass'];
    // $pass=md5($password);
    // echo $password ,'<br>';
    // echo $pass;
    echo $email;
    echo $password;
     $query  = "SELECT *FROM admin_user WHERE `user_name` = '".$email."' ";
     $res  = mysqli_query($db,$query);
     $data = mysqli_fetch_array($res);
     $count = mysqli_num_rows($res);
     if($count>=1){
     $query  = "SELECT *FROM admin_user WHERE `user_name` = '".$email."' AND `password` = '".$password."'";
     $res  = mysqli_query($db,$query);
     $data = mysqli_fetch_array($res,MYSQLI_ASSOC);
     $count = mysqli_num_rows($res);
      
     if($count==1){
         	
         echo json_encode("login success");  
        session_start();
         $_SESSION["loggedin"] = true;
         $_SESSION['sess_useruser']=$email;
         $_SESSION["pass"] = $pass; 
         header("Location: ./index.php");
      }else {
         echo "<script>
alert('Login credentials did not match try the correct one.');
window.location.href='./login.php';
</script>";
     }
       
     }else {
         echo json_encode("dont have an account");
         }	
          
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="./assets/login.css">
</head>
<body>
<div class="sidenav">
         <div class="login-main-text">
            <h2>Application<br> Login Page</h2>
            <p>Login or register from here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form method="POST" action="login.php">
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" class="form-control" name="email" placeholder="User Name">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" name="pass" placeholder="Password">
                  </div>
                  <button type="submit" name="submit" class="btn btn-black">Login</button>
                  <button type="submit" class="btn btn-secondary">Register</button>
               </form>
            </div>
         </div>
      </div>
</body>
</html>