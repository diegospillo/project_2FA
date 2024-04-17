<?php
  function get_domain_name(){
    $_SESSION['state_api'] = "true";
    $Domain_Name = "https://api-2fa.onrender.com";
    return $Domain_Name;
  }
  function error_API(){
    $_SESSION['state_api'] = "false";
    header('Location: /Project_2fa/login/');
  }
?>