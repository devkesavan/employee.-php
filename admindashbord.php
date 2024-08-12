<?php
session_start();

// Check if the user is logged in and if the session variable is set
if (!isset($_SESSION['admin']) || !isset($_SESSION['admin']['adminname'])) {
    // If not logged in or session variable is not set, redirect to the login page
    header('Location: admin.php');
    exit();
}

include 'config.php'; // Include your database configuration file

$searchQuery = '';
if (isset($_POST['search'])) {
    $searchQuery = trim($_POST['search']);
}

// Fetch employee details with search filter if applicable
$query = "SELECT * FROM `employee-details`";
if (!empty($searchQuery)) {
    $query .= " WHERE emid LIKE '%" . $conn->real_escape_string($searchQuery) . "%' 
                OR emmane LIKE '%" . $conn->real_escape_string($searchQuery) . "%' 
                OR aadhar LIKE '%" . $conn->real_escape_string($searchQuery) . "%'
                OR number LIKE '%" . $conn->real_escape_string($searchQuery) . "%'";
}
$result = $conn->query($query);

if ($result === false) {
    die("Error retrieving employee details: " . htmlspecialchars($conn->error));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- DataTables CSS and JS libraries -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 4px;
            text-align: left;
        }

        img {
            height: 100px;
            /* Set the desired height */
            width: auto;
            /* Maintain aspect ratio */
        }

        section .excel {
            float: right;
            margin-top: -100px;





        }

        button {

            background-color: blue;
            font-size: 12px;
            width: 200px;
        }

        .button {
            background-color: red;
        }



        @media only screen and (max-width: 600px) {

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;
            }

            td {
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
                /* Adjust according to your needs */
            }

            td:before {
                position: absolute;
                top: 6px;
                left: 6px;
                width: 45%;
                /* Adjust according to your needs */
                padding-right: 10px;
                white-space: nowrap;
            }

        }
    </style>
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
                <div>
                    <form method="post" action="" style="">
                        <input type="text" name="search" placeholder="Search by ID, Name, or Aadhar Number"
                            value="<?php echo htmlspecialchars($searchQuery); ?>">
                    </form>
                </div>
                <ul class="navbar-menu">
                    <li><a href="rigister.php" class="nav-link">Logout</a></li>
                </ul>
            </nav>
        </div>
    </section>

    <section>
        <div class="container">
            <h2>Welcome, <?php echo htmlspecialchars($_SESSION['admin']['adminname']); ?>!</h2>
            <h3>Employee Details</h3>
            <div class="excel">
                <button class="button-ecl" onclick="exportTable('employeeTable', 'Employee_Details', 'excel')">Download as Excel</button>
                <button onclick="exportTable('employeeTable', 'Employee_Details', 'pdf')">Download as PDF</button>
            </div>


            <table id="employeeTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Education</th>
                        <th>Skills</th>
                        <th>Designation</th>
                        <th>Salary</th>
                        <th>Duration</th>
                        <th>Aadhar Number</th>
                        <th>PAN Number</th>
                        <th>City</th>
                        <th>Photo</th>
                        <th>Resume</th>
                        <th>Hint</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($result) && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['emid']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['emname']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['number']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['dob']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['gmail']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['education']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['skils']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['designation']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['salary']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['duration']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['aadhar']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['pan']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['city']) . "</td>";
                            echo "<td><img src='" . htmlspecialchars($row['photo']) . "' alt='Photo'></td>";
                            echo "<td><a href='" . htmlspecialchars($row['resume']) . "' target='_blank'>View Resume</a></td>";
                            echo "<td>" . htmlspecialchars($row['hint']) . "</td>";
                            echo "<td><a href='delete.php?id=" . htmlspecialchars($row['emid']) . "' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a></td>";
                            echo "<td><a href='edit.php?id=" . htmlspecialchars($row['emid']) . "'>Edit</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='19'>No records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <script>
        // Function to export table data to Excel or PDF
        function exportTable(tableID, filename = '', format = 'excel') {
            var downloadLink;
            var dataType = format === 'pdf' ? 'application/pdf' : 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

            // Specify file name
            filename = filename ? filename + '.' + (format === 'pdf' ? 'pdf' : 'xls') : 'data.' + (format === 'pdf' ? 'pdf' : 'xls');

            // Create download link element
            downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if (navigator.msSaveOrOpenBlob && format === 'excel') {
                var blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob(blob, filename);
            } else {
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                // Setting the file name
                downloadLink.download = filename;

                // Triggering the function
                downloadLink.click();
            }
        }

    </script>


</body>

</html>