<?php
$servername = "localhost";  // aapka server name
$username = "root";         // aapka database username
$password = "";             // aapka database password
$dbname = "loginsystem";   // aapka database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
