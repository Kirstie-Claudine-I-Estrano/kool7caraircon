<?php
$servername = "localhost";
$username = "u936666569_kool7caraircon";
$password = "Mejaki1996";
$database = "u936666569_kool7";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

