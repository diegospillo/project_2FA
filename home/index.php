<?php
  session_start();
  if((isset($_SESSION['state_login']) && $_SESSION['state_login'] == "true") && ((isset($_SESSION['validated']) && $_SESSION['validated'] == "true") || (isset($_SESSION['verified']) && $_SESSION['verified'] == "true"))){
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> 
  </head>
  <body>
  <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1" style="font-size: 25px;">Ciao <?php echo $_SESSION['username']; ?>!</span>
    <a href="/Project_2fa/logout/"><button type="button" class="btn btn-danger">Logout</button></a>
  </div>
</nav>
<div class="position-absolute top-50 start-50 translate-middle"><h1>Accesso Effetuato🎉</h1></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
<?php
}else{
  $_SESSION['state_login'] = false;
  header('Location: /Project_2fa/login/');
}
?>