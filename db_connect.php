<?php
$servername = "localhost";       // usually localhost
$username = "dasouqu1_ula";     // your cPanel DB username
$password = "lulululu12345";     // your DB password
$dbname = "dasouqu1_marigold";  // your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
