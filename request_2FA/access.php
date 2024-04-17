<?php
session_start();

include "../connection.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$conn = new_connection();

$sql = "SELECT * FROM utenti WHERE username = '" . $username . "' AND password = '" . $password . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $_SESSION['state_login'] = "true";
  $_SESSION['id'] = $row['id'];
  $_SESSION['username'] = $row['username'];
  $_SESSION['private_key'] = $row['private_key'];
  if($row['state']=='validate'){
    $_SESSION['validated'] = "default";
    header('Location: /Project_2fa/login/validate.php');
  }
  else if($row['state']=='verify'){
    $_SESSION['verified'] = "default";
    header('Location: /Project_2fa/signup/verify.php');
  }
} else {
  $_SESSION['state_login'] = "false";
  header('Location: /Project_2fa/login/');
}

?>