<?php
$servername = "localhost";  // Change this if your database is on a different server
$username = "root";         // Your MySQL username
$password = "";             // Your MySQL password
$dbname = "employee_management"; // The name of the database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
