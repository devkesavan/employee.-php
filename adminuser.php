<?php
session_start();
include 'config.php'; // Include your database configuration file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize form data
    $adminname = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check if the user exists in the database
    $stmt = $conn->prepare("SELECT * FROM `admin` WHERE `adminname` = ? AND `password` = ? LIMIT 1");
    if ($stmt === false) {
        die("Prepare failed: " . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("ss",$adminname, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        // Store user information in session
        $_SESSION['admin'] = $admin;
        echo "Login successful! Welcome " . htmlspecialchars($admin['adminname']);
        // Redirect to a protected page
        header('Location:admindashbord.php');
        exit();
    } else {
        echo "<p style='color:red;'>Invalid adminname or password.</p>";
    }

    $stmt->close();
}

$conn->close();
?>
