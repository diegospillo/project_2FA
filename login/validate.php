<?php
  session_start();
  if(!isset($_SESSION['state_login']) || $_SESSION['state_login']=="false"){
    $_SESSION['state_login']="false";
    header('Location: /Project_2fa/login/');
  }
  if(isset($_SESSION['validated']) && $_SESSION['validated']=="false"){
    echo "<script>alert('Token Errato!')</script>";
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
        <form action="../request_2FA/validate.php" method="POST">
            <center><h2>Verifica Codice</h2></center>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="token" placeholder="Inserisci codice di verifica" required></div>
            <div class="form-group"><button class="btn btn-primary btn-block">Verifica</button></div></form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>