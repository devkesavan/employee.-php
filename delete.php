<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin'])) {
    // If not, redirect to the login page
    header('Location: admin.php');
    exit();
}

include 'config.php'; // Include your database configuration file

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL DELETE statement
    $query = "DELETE FROM `employee-details` WHERE `emid` = ?";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die("Error preparing the SQL statement: " . htmlspecialchars($conn->error));
    }

    // Bind the parameter (assuming emid is a string, use "s")
    $stmt->bind_param("s", $id);

    // Execute the query
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            // Redirect to the admin dashboard after successful deletion
            header('Location: admindashboard.php');
            exit();
        } else {
            echo "Error: No record found with the given ID.";
        }
    } else {
        echo "Error deleting record: " . htmlspecialchars($stmt->error);
    }

    $stmt->close();
} else {
    die("Error: Invalid request.");
}

$conn->close();
?>
