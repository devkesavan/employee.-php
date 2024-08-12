<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin'])) {
    // If not, redirect to the login page
    header('Location: admin.php');
    exit();
}

include 'config.php'; // Include your database configuration file

// Check if employee ID is provided in the URL
if (!isset($_GET['id'])) {
    // If not provided, redirect back to the dashboard
    header('Location: admindashbord.php');
    exit();
}

// Fetch employee details based on the provided ID
$employeeId = $_GET['id'];
$query = "SELECT * FROM `employee-details` WHERE emid = '$employeeId'";
$result = $conn->query($query);

if ($result === false) {
    die("Error retrieving employee details: " . htmlspecialchars($conn->error));
}

// Check if employee exists
if ($result->num_rows == 0) {
    // If not found, redirect back to the dashboard
    header('Location: admindashbord.php');
    exit();
}

// Fetch employee data
$row = $result->fetch_assoc();

// Handle form submission for updating employee details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data and update database
    // You need to write this part based on your database structure and update logic
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $number = $_POST['number'];
    $dob = $_POST['dob'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $gmail = $_POST['gmail'];
    $education = isset($_POST['education']) ? $_POST['education'] : '';
    $skils = isset($_POST['skils']) && is_array($_POST['skils']) ? implode(', ', $_POST['skils']) : '';

    $designation = $_POST['designation'];
    $salary = $_POST['salary'];
    $duration = $_POST['duration'];
    $aadhar = $_POST['aadhar'];
    $pan = $_POST['pan'];
    $city = $_POST['city'];
    $hint = $_POST['hint'];

    // Update query
    $updateQuery = "UPDATE `employee-details` SET
                    emmane = '$fullname',
                    number = '$number',
                    dob = '$dob',
                    gender = '$gender',
                    gmail = '$gmail',
                    education = '$education',
                    skils = '$skils',
                    designation = '$designation',
                    salary = '$salary',
                    duration = '$duration',
                    aadhar = '$aadhar',
                    pan = '$pan',
                    city = '$city',
                    hint = '$hint'
                    WHERE emid = '$employeeId'";

    if ($conn->query($updateQuery) === TRUE) {
        // Redirect to dashboard after successful update
        header('Location: admindashbord.php');
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
$a = $row['skils'];
$b = explode(",", $a);
$c = $row['gender'];

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css"> <!-- Add your custom styles if any -->
</head>
<body>
    <style>
        .container{
            width: 600px;
        }
        input[type="text"],
input[type="date"],
input[type="file"],
input[type="password"],
input[type="email"],
input[type="number"],


select {
    width: 50%;
    padding: 5px;
    margin-top: 6px;
    margin-right: 10px;
    border-radius:5px;
    border: 2px solid #ffffff;
    float:right;
    background-color:transparent;
    color: rgb(3, 3, 3);  
   
}
.html {
    float: right;
   width: 50%;
   margin-top: 10px;
   margin-bottom: -20px;
}
.aadhar:hover{
    width: 0px;
}
    </style>
    <div class="container mt-5" >
        <h1 class="mb-4">Edit Employee Details</h1>
        <form method="post" action="" enctype="multipart/form-data">
            <!-- Input fields to edit employee details -->
            <div class="form-group">
                <label for="fullname">Full Name:</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $row['emmane']; ?>" required>
            
            </div>

            <div class="form-group">
                <label for="number">Phone Number:</label>
                <input type="text" class="form-control" id="number" name="number" maxlength="10"  value="<?php echo $row['number']; ?>" required>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $row['dob']; ?>"  required>
            </div>
            <div class="form-group">
                        <label>Gender:</label>
                        <div class="Male" style=" margin-right: 0px; margin-top: 3px;" >
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="male" name="gender" value="male" >
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="female" name="gender" value="female" >
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                    </div>
            
            <div class="form-group">
                <label for="gmail">Email:</label>
                <input type="email" class="form-control" id="gmail" name="gmail" value="<?php echo $row['gmail']; ?>" required>
            </div>        
           

            <div class="form-group">
                        <label>Education:</label>
                        <select name="skils" id="skils" class="form-control" style="width: 50%; margin-left: 13px;">
                            <option value="Bca" <?php echo (isset($_POST['skils']) && $_POST['skils'] == 'Bca') ? 'selected' : ''; ?>>Bca</option>
                            <option value="bsc" <?php echo (isset($_POST['skils']) && $_POST['skils'] == 'bsc') ? 'selected' : ''; ?>>Bsc</option>
                            <option value="mca" <?php echo (isset($_POST['skils']) && $_POST['skils'] == 'mca') ? 'selected' : ''; ?>>MCA</option>
                            <option value="msc" <?php echo (isset($_POST['skils']) && $_POST['skils'] == 'msc') ? 'selected' : ''; ?>>Msc</option>
                            <option value="mba" <?php echo (isset($_POST['skils']) && $_POST['skils'] == 'mba') ? 'selected' : ''; ?>>Mba</option>
                            <option value="mcom" <?php echo (isset($_POST['skils']) && $_POST['skils'] == 'mcom') ? 'selected' : ''; ?>>Mcom</option>
                        </select>
                    </div>

            <div class="form-group">
                
                <label for="skils" style="margin-top: 10px;">Skills:</label> 
                <div  class="html">               
                <input type="checkbox" id="html" name="skils[]"<?php if(in_array("html",$b)){echo "checked";}?>value="HTML">
                <label for="html">HTML</label>
                <input type="checkbox" id="css" name="skils[]" value="CSS">
                <label for="css">CSS</label>
                <input type="checkbox" id="html" name="skils[]" value="HTML">
                <label for="html">js</label>
                <input type="checkbox" id="css" name="skils[]" value="CSS">
                <label for="css">php</label></div>
                <!-- Add more skills as needed -->
            </div>
           
           

            <div class="form-group">
                <label for="designation">Designation:</label>
                <input type="text" class="form-control" id="designation" name="designation"value="<?php echo $row['designation']; ?>" required>
            </div>

            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="text" class="form-control" id="salary" name="salary" value="<?php echo $row['salary']; ?>" required>
            </div>

            <div class="form-group">
                <label for="duration">Duration:</label>
                <input type="text" class="form-control" id="duration" name="duration" value="<?php echo $row['duration']; ?>" required>
            </div>

          <div class="form-group">
                <label for="aadhar">Aadhar Number:</label>
               <input type="text" class="form-control aadhar" id="aadhar" name="aadhar" value="<?php echo $row['aadhar']; ?>" required>
            </div>

            <div class="form-group">
                <label for="pan">PAN Number:</label>
                <input type="text" class="form-control" id="pan" name="pan"value="<?php echo $row['pan']; ?>" required>
            </div>

            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" id="city" name="city" value="<?php echo $row['city']; ?>" required>
            </div>

            <div class="form-group">
                <label for="hint">Hint:</label>
                <input type="text" class="form-control" id="hint" name="hint" value="<?php echo $row['hint']; ?>" required>
            </div>

            <!-- Input fields for resume and photo -->
            

            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
