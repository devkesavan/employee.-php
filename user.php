<?php
session_start();
include 'config.php'; // Include your database configuration file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize form data
    $username = trim($_POST['username']);
    $aadhar = trim($_POST['aadhar']);

    // Check if the user exists in the database
    $stmt = $conn->prepare("SELECT * FROM `user` WHERE `emname` = ? AND `aadhaar` = ? LIMIT 1");
    if ($stmt === false) {
        die("Prepare failed: " . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("ss", $username, $aadhar);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Store user information in session
        $_SESSION['user'] = $user;
        echo "Login successful! Welcome " . htmlspecialchars($user['emname']);
        // Redirect to a protected page
        header('Location: dashboard.php');
        exit();
    } else {
        echo "<p style='color:red;'>Invalid username or Aadhar number.</p>";
    }

    $stmt->close();
}

$conn->close();
?>
