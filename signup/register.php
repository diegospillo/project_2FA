<?php
 session_start();
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
  <div class="card position-absolute top-50 start-50 translate-middle" style="width: 19.5rem;">
  <br>
  <center><p class="text-body-secondary">Usa la tua app di autenticazione per scannerizzare questo QR code</p></center>
  <img src="<?php echo $_SESSION['data_url'] ?>" class="card-img-top" alt="...">
  <div class="card-body" style="border-top: 2px solid black;">
    <center><p class="text-body-secondary">O inserisci questo codice nella tua app di autenticazione</p></center>
    <p class="card-text fw-bolder"><?php echo $_SESSION['secret'] ?></p>
    <center><a href="/Project_2fa/signup/verify.php" class="btn btn-primary">Prosegui con la verifica</a></center>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>