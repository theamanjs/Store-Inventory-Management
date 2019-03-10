<?php
session_start();
include './connection/connection.php';
?>

<html lang="en">
<head>
    <title>Store Management(STC)</title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- Custom Stylesheet   -->
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand head" href="#">Store Management (STC)</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-item nav-link" href="adminHelp.html">Help</a>
</li>
      </div>
    </div>
  </nav>
  <!-- navbar ends -->
  <div class="overlay">

<form class="login-one-form" method="POST">
  <div class="col">
      <div class="login-one-ico">
          <i class="fa fa-lock" id="lockico"></i>
      </div>
      <div class="form-group">
          <div>
              <h3 id="heading">Login Admin</h3>
          </div>
          <input class="form-control" type="text" placeholder="Username" name="username" id="input" autofocus required>
          <input class="form-control" type="password" placeholder="Password" name="password" id="input" required>
          <button class="btn btn-primary" type="submit" name="login" id="button" style="background-color:#007BFF;">
          Log in <i class="fa fa-unlock-alt"></i>
          </button>
         
      </div>
      <?php
      if(isset($_POST['login']))
      {
          $uname = $_POST['username'];
          $pass = $_POST['password'];
          $login = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";
          $result = mysqli_query($conn,$login);
          $resultFetch = mysqli_fetch_array($result);
          if($resultFetch)
              {
                  $_SESSION['name'] = $uname;
                  header("Location:home.html");
              }
          else
              echo "<script>alert('Wrong Username Or Password')</script>";
      }
      ?>
  </div>
</form>

</div>

  <!-- Optional JavaScript -->

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- end of javascript files -->

</body>
</html>
