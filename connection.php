<?php
$servername = "localhost";
$username = "u936666569_kool7caraircon";
$password = "Mejaki1996";
$database = "u936666569_kool7";

try {
    $conn = new PDO(
        "mysql:host=$servername;dbname=$dbname",
        $username,
        $password
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit(); // Stop further execution if the connection fails
}
?>

