<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // If not, redirect to the login page
    header('Location: login.php');
    exit();
}

include 'config.php'; // Include your database configuration file

// Fetch details of the logged-in user
$username = $_SESSION['user']['emname'];
$query = "SELECT * FROM `employee-details` WHERE `emname` = ?";
$stmt = $conn->prepare($query);

if ($stmt === false) {
    die("Prepare failed: " . htmlspecialchars($conn->error));
}

$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result === false) {
    die("Error retrieving employee details: " . htmlspecialchars($conn->error));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Dashboard</title>
</head>
<body>
<style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: auto;
            margin-bottom: 40px;
           margin-top: 10px;
            
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align:left;
           
        }
        th {
            background-color: #f2f2f2;
            padding-right: 50px;
        }
        .container{
            text-align: center;

        }
    </style>
  
    <section>
        <div class="navbar-toggler">
            <nav class="navbar">
                <div class="logo">
                    <a href="#">
                        <img src="img/yamee_logo-removebg-preview.png" alt="yameecluster">
                    </a>
                </div>
                <ul class="navbar-menu">
                    <li><a href="login.php" class="nav-link">Logout</a></li>
                    <li><a href="rigister.php" class="nav-link">rigister</a></li>

                </ul>
            </nav>
        </div>
    </section>

    <section>
        <div class="container">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']['emname']); ?>!</h2>
            <h3>Employee Details</h3>
            <?php
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            ?>
               <table>
                <tr>
                    <th>employee-details</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><?php echo htmlspecialchars($row['emmane']); ?></td>
                </tr>
                <tr>
                    <td>ID</td>
                    <td><?php echo htmlspecialchars($row['emid']); ?></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td><?php echo htmlspecialchars($row['number']); ?></td>
                </tr>
                <tr>
                    <td>DOB</td>
                    <td><?php echo htmlspecialchars($row['dob']); ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?php echo htmlspecialchars($row['gender']); ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo htmlspecialchars($row['gmail']); ?></td>
                </tr>
                <tr>
                    <td>Education</td>
                    <td><?php echo htmlspecialchars($row['education']); ?></td>
                </tr>
                <tr>
                    <td>Skills</td>
                    <td><?php echo htmlspecialchars($row['skils']); ?></td>
                </tr>
                <tr>
                    <td>Designation</td>
                    <td><?php echo htmlspecialchars($row['designation']); ?></td>
                </tr>
                <tr>
                    <td>Salary</td>
                    <td><?php echo htmlspecialchars($row['salary']); ?></td>
                </tr>
                <tr>
                    <td>Duration</td>
                    <td><?php echo htmlspecialchars($row['duration']); ?></td>
                </tr>
                <tr>
                    <td>Aadhar Number</td>
                    <td><?php echo htmlspecialchars($row['aadhar']); ?></td>
                </tr>
                <tr>
                    <td>PAN Number</td>
                    <td><?php echo htmlspecialchars($row['pan']); ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?php echo htmlspecialchars($row['city']); ?></td>
                </tr>
                <tr>
                    <td>Hint</td>
                    <td><?php echo htmlspecialchars($row['hint']); ?></td>
                </tr>
                <tr>
                    <td>Photo</td>
                    <td><img src="<?php echo htmlspecialchars($row['photo']); ?>" alt="Photo" style="max-width: 200px;"></td>
                </tr>
                <tr>
                    <td>Resume</td>
                    <td><a href="<?php echo htmlspecialchars($row['resume']); ?>" target="_blank">View Resume</a></td>
                </tr>
                <!-- Add more rows for other fields -->
            </table>
           
            <?php
            } else {
                echo "<p>No data found for this user.</p>";
            }
            ?>
        </div>
    </section>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
