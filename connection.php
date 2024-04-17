<?php
function new_connection(){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";
$port = "3307";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
return $conn;
}
?>