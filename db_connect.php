<?php
$servername = "localhost";  
$username = "root";        
$password = "";            
$dbname = "muhammh3_marigold";  


// Create connection
$conn = new mysqli("localhost", "root", "", "muhammh3_marigold");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
