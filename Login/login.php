<?php
  require_once('../database/dbhelper.php');
  session_start();
  $email = $password = '';
  if(!empty($_POST)) {
    if(isset($_POST['email'])) {
      $email = $_POST['email'];
    }
    if(isset($_POST['password'])) {
      $password = $_POST['password'];
    }
    
    if($_SESSION['email'] != " " ) {
      if(!empty($email)) {
        $sql = "select * from user where email='$email' and password='$password' ";
        execute($sql);
        if($sql) {
          $_SESSION['email'] = $email;
          $_SESSION['name'] = $name;
          var_dump($_SESSION['name']);
          print($_SESSION['name']);
          header('Location: ../../../../MenClothes/admin/index.php');
        }
        die();
      }

    }else 
    {
      header('Location: ./login.php');
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="" method="POST" autocomplete="">
                    <h2 class="text-center">Login Form</h2>
                    <p class="text-center">Login with your email and password.</p>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                    <div class="link login-link text-center">Not yet a member? <a href="signup-user.php">Signup now</a></div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>