<?php
  session_start();
  if(isset($_SESSION['signup']) && $_SESSION['signup']=="false"){
    echo "<script>alert('Questo username è già stato utilizzato')</script>";
  }
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../authentication.css">
</head>

<body>
    <div class="login-dark" style="height: 695px;">
        <form action="../request_2FA/register.php" method="POST">
            <center><h2>Sign Up</h2></center>
            <div class="illustration"><i class="bi bi-pencil"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username" required></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
            <div class="form-group"><button class="btn btn-primary btn-block">Sign Up</button></div>
            <a href="../login/" class="forgot">Log In</a>
          </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>