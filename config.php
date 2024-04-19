<?php
// Database configuration settings
$servername = "localhost";  // Server address
$username = "root";         // MySQL username
$password = "";             // MySQL password (empty if not set)
$dbname = "php_crud";       // Your DB name

// Create database connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Your folder name
$base_url = "/crud";
?>