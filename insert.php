<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPLOYEE</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <section>
        <div class="navbar-toggler">
            <nav class="navbar">
                <div class="logo">
                    <a href="#">
                        <img src="img/yamee_logo-removebg-preview.png" alt="yameecluster">
                    </a>
                </div>
                <ul class="navbar-menu">
                    <li><a href="login.php" class="nav-link">Login</a></li>
                    <li><a href="register.php" class="nav-link">Register</a></li>
                    <li><a href="admin.php" class="nav-link">Admin</a></li>
                </ul>
            </nav>
        </div>
    </section>

    <?php
include 'config.php'; // Include your database configuration file

// Retrieve and sanitize form data
$employee_name = strtoupper(trim($_POST['fullname']));
$phone_number = trim($_POST['number']);
$dob = $_POST['age'];
$gender = $_POST['gender'];
$email = trim($_POST['gmail']);
$education = isset($_POST['skils']) ? $_POST['skils'] : [];
$skills = implode(', ', $education);
$designation = strtoupper(trim($_POST['Designation']));
$salary = trim($_POST['Salary']);
$duration = strtoupper(trim($_POST['Duration']));
$aadhar_number = trim($_POST['Aadhar-number']);
$pan_number = trim($_POST['Pan-number']);
$city = strtoupper(trim($_POST['city']));
$hint = trim($_POST['hint']);

// Handle file uploads
$target_dir = "uploads/";
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$photo_target_file = $target_dir . basename($_FILES["photo"]["name"]);
$resume_target_file = $target_dir . basename($_FILES["resume"]["name"]);
$photo_file_type = strtolower(pathinfo($photo_target_file, PATHINFO_EXTENSION));
$resume_file_type = strtolower(pathinfo($resume_target_file, PATHINFO_EXTENSION));

$uploadOk = 1;

// Validate file sizes and types
if ($_FILES["photo"]["size"] > 500000 || $_FILES["resume"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
if (!in_array($photo_file_type, ['jpg', 'png', 'jpeg', 'gif']) || !in_array($resume_file_type, ['pdf', 'doc', 'docx'])) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed for photos and PDF, DOC, DOCX files are allowed for resumes.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $photo_target_file) && move_uploaded_file($_FILES["resume"]["tmp_name"], $resume_target_file)) {
        // Check if the user already exists in `employee-details`
        $select_employee = "SELECT * FROM `employee-details` WHERE `number`='$phone_number' AND `gmail`= '$email' AND `aadhar`= '$aadhar_number' AND `pan` = '$pan_number'";
        $result_employee = mysqli_query($conn, $select_employee);

        if ($result_employee === false) {
            die("Error in query for employee-details: " . htmlspecialchars(mysqli_error($conn)));
        }

        if (mysqli_num_rows($result_employee) > 0) {
            echo 'User already exists';
        } else {
            // Generate new `emid`
            $select_max_id = "SELECT MAX(emid) AS max_id FROM `employee-details` WHERE emid LIKE 'YC_%'";
            $result_max_id = mysqli_query($conn, $select_max_id);
            $row = mysqli_fetch_assoc($result_max_id);
            $max_id = $row['max_id'];
            
            // Extract the numeric part and increment it
            if ($max_id) {
                $numeric_part = (int) substr($max_id, 3);
                $new_numeric_part = $numeric_part + 1;
            } else {
                $new_numeric_part = 1; // Start from 1 if no ID exists
            }

            // Format the new `emid`
            $new_emid = 'YC_' . str_pad($new_numeric_part, 2, '0', STR_PAD_LEFT);

            // Prepare an SQL statement for employee-details
            $stmt_employee = $conn->prepare("INSERT INTO `employee-details` (`emname`, `emid`, `number`, `dob`, `gender`, `gmail`, `education`, `skils`, `designation`, `salary`, `duration`, `aadhar`, `pan`, `city`, `photo`, `resume`, `hint`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            if ($stmt_employee === false) {
                die('Prepare failed for employee-details: ' . htmlspecialchars($conn->error));
            }

            $stmt_employee->bind_param("sssssssssssssssss", $employee_name, $new_emid, $phone_number, $dob, $gender, $email, $skills, $skills, $designation, $salary, $duration, $aadhar_number, $pan_number, $city, $photo_target_file, $resume_target_file, $hint);

            if ($stmt_employee->execute()) {
                echo "New record created successfully in employee-details.";
                
                // Now insert into the `user` table
                $stmt_user = $conn->prepare("INSERT INTO `user` (`emname`, `aadhaar`) VALUES (?, ?)");
                if ($stmt_user === false) {
                    die("Prepare failed for user: " . htmlspecialchars($conn->error));
                }

                $stmt_user->bind_param("ss", $employee_name, $aadhar_number);

                if ($stmt_user->execute()) {
                    echo "New record created successfully in user.";
                } else {
                    echo "Error: " . htmlspecialchars($stmt_user->error);
                }
                $stmt_user->close();

            } else {
                echo "Error: " . htmlspecialchars($stmt_employee->error);
            }
            $stmt_employee->close();
        }
    } else {
        echo "Sorry, there was an error uploading your files.";
    }
}

// Close the connection
$conn->close();
?>

</body>
</html>
