<?php
  session_start();
  if((isset($_SESSION['state_login']) && $_SESSION['state_login'] == "true") && ((isset($_SESSION['validated']) && $_SESSION['validated'] == "true") || (isset($_SESSION['verified']) && $_SESSION['verified'] == "true"))){
    header('Location: /Project_2fa/home/');
  }
  if(isset($_SESSION['state_login']) && $_SESSION['state_login']=="false"){
    echo "<script>alert('Username o Password errati!')</script>";
  }
  if(isset($_SESSION['state_api']) && $_SESSION['state_api']=="false"){
    echo "<script>alert(\"L'API 2FA non risponde!\")</script>";
  }
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../authentication.css">
</head>

<body>
    <div class="login-dark" style="height: 695px;">
        <form action="../request_2FA/access.php" method="POST">
            <center><h2>Login</h2></center>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username" required></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
            <div class="form-group"><button class="btn btn-primary btn-block">Log In</button></div>
            <a href="../signup/" class="forgot">Sign Up</a>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>