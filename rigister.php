<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPLOYEE</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
   

</head>

<body>
    <section>
        <div class="navbar-toggler">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="logo">
                    <a class="navbar-brand bg-white" href="#">
                        <img src="img/yamee_logo-removebg-preview.png" alt="yameecluster" class="img-fluid" style="max-width: 100px;">
                    </a>
                </div>
                <button class="navbar-toggler"  onclick="click" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto text-white">
                        <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="rigister.php" class="nav-link">Register</a></li>
                        <li class="nav-item"><a href="admin.php" class="nav-link">Admin</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </section>

    <section class="main-container container my-5">
        <div class="row">
            <div class="col-md-6 mb-4">
                <img src="img/img4.webp" alt="" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2><i class='bx bx-group'></i> EMPLOYEE REGISTER</h2>
                <form action="insert.php" method="post" enctype="multipart/form-data">
                    <?php 
                    if(isset($error)){
                        foreach ($error as $error) {
                            echo '<span class="error-msg text-danger">'.$error.'</span>';
                        }
                    }
                    ?>

                    <div class="form-group">
                        <label for="fullname">Employee Name:</label>
                        <input type="text" class="form-control uppercase-input no-numbers-input" id="fullname" name="fullname" placeholder="Enter your name" required
                            value="<?php echo isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : ''; ?>" style="text-transform: uppercase;" >
                    </div>

                    <div class="form-group">
                        <label for="Employeeid">Employee id:</label>
                        <!--<input type="text" class="form-control uppercase-input no-numbers-input" id="Employeeid" name="Employeeid" maxlength="10" placeholder="" required value="">-->
                        <script>
                            function setDefaultEmployeeId() {
                                const defaultIdPrefix = 'YC_00';
                                document.getElementById('Employeeid').value = defaultIdPrefix;
                            }
                            window.onload = setDefaultEmployeeId;
                        </script>
                    </div>

                    <div class="form-group">
                        <label for="number">Phone Number:</label>
                        <input type="number" class="form-control" id="number" name="number"  placeholder="Enter your number"
                            value="<?php echo isset($_POST['number']) ? htmlspecialchars($_POST['number']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="age">DOB:</label>
                        <div style="display:flex; width: 300px;float:right; margin-right: -20px;">
                        <input type="date" class="form-control" id="age" name="age" placeholder="Enter your age" required
                            value="<?php echo isset($_POST['age']) ? htmlspecialchars($_POST['age']) : ''; ?>" style="width: 75%;">
                         <input type="text" readonly id="dob" onmousemove="findage()" name="age" placeholder="age" required style="width:20%;margin-right: 28px;" >   
                    </div>
                        </div>

                    <div class="form-group">
                        <label>Gender:</label>
                        <div class="Male" style=" margin-right: 0px; margin-top: 3px;" >
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="male" name="gender" value="male" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'male') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="female" name="gender" value="female" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'female') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gmail">Gmail:</label>
                        <input type="email" class="form-control" id="gmail" name="gmail" placeholder="Enter your Gmail" required
                            value="<?php echo isset($_POST['gmail']) ? htmlspecialchars($_POST['gmail']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label>Education:</label>
                        <select name="skils" id="skils" class="form-control" style="width: 50%; margin-right: 13px;" >
                            <option value="Bca" <?php echo (isset($_POST['skils']) && $_POST['skils'] == 'Bca') ? 'selected' : ''; ?>>Bca</option>
                            <option value="bsc" <?php echo (isset($_POST['skils']) && $_POST['skils'] == 'bsc') ? 'selected' : ''; ?>>Bsc</option>
                            <option value="mca" <?php echo (isset($_POST['skils']) && $_POST['skils'] == 'mca') ? 'selected' : ''; ?>>MCA</option>
                            <option value="msc" <?php echo (isset($_POST['skils']) && $_POST['skils'] == 'msc') ? 'selected' : ''; ?>>Msc</option>
                            <option value="mba" <?php echo (isset($_POST['skils']) && $_POST['skils'] == 'mba') ? 'selected' : ''; ?>>Mba</option>
                            <option value="mcom" <?php echo (isset($_POST['skils']) && $_POST['skils'] == 'mcom') ? 'selected' : ''; ?>>Mcom</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="skills">Skills</label>
                        <div style="float:right; width: 55%; margin-right: -10px;">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="html" name="skils[]" value="HTML" <?php echo (isset($_POST['skils']) && in_array('HTML', $_POST['skils'])) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="html">HTML</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="css" name="skils[]" value="CSS" <?php echo (isset($_POST['skils']) && in_array('CSS', $_POST['skils'])) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="css">CSS</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="js" name="skils[]" value="JS" <?php echo (isset($_POST['skils']) && in_array('JS', $_POST['skils'])) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="js">JS</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="php" name="skils[]" value="PHP" <?php echo (isset($_POST['skils']) && in_array('PHP', $_POST['skils'])) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="php">PHP</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="Designation">Designation:</label>
                        <input type="text" class="form-control uppercase-input no-numbers-input" id="Designation" name="Designation" placeholder="Enter your Designation" required
                            value="<?php echo isset($_POST['Designation']) ? htmlspecialchars($_POST['Designation']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="Salary">Salary CTC:</label>
                        <input type="tel" class="form-control" id="Salary" name="Salary" maxlength="7" placeholder="Enter your Salary"
                            value="<?php echo isset($_POST['Salary']) ? htmlspecialchars($_POST['Salary']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="Duration">Duration:</label>
                        <input type="text" class="form-control uppercase-input no-numbers-input" id="Duration" name="Duration" placeholder="Enter From-To" required
                            value="<?php echo isset($_POST['Duration']) ? htmlspecialchars($_POST['Duration']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="Aadhar-number">Aadhar Number:</label>
                        <input type="tel" class="form-control" id="Aadhar-number" name="Aadhar-number" maxlength="12" placeholder="Enter your Aadhar number only"
                            value="<?php echo isset($_POST['Aadhar-number']) ? htmlspecialchars($_POST['Aadhar-number']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="Pan-number">Pan Number:</label>
                        <input type="tel" class="form-control" id="Pan-number" name="Pan-number" maxlength="10" placeholder="Enter your Pan number only"
                            value="<?php echo isset($_POST['Pan-number']) ? htmlspecialchars($_POST['Pan-number']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" class="form-control uppercase-input no-numbers-input" id="city" name="city" placeholder="Enter your city" required
                            value="<?php echo isset($_POST['city']) ? htmlspecialchars($_POST['city']) : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label for="photo">Photo:</label>
                        <input type="file" class="form-control-file" id="photo" name="photo" required>
                    </div>

                    <div class="form-group">
                        <label for="resume">Resume:</label>
                        <input type="file" class="form-control-file" id="resume" name="resume" style="margin-top:-30px;" required>
                    </div>

                    <div class="form-group">
                        <label for="hint">Hint:</label>
                        <input type="text" class="form-control" id="hint" name="hint" placeholder="other" required
                            value="<?php echo isset($_POST['hint']) ? htmlspecialchars($_POST['hint']) : ''; ?>">
                    </div>

                    <br>
                    <button type="submit" class="btn btn-dark bg-danger">Sign Up</button>

                </form>
            </div>
        </div>
    </section>
  

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Function to reload the page after form submission
        function reloadPage() {
            location.reload();
        }

        // Add event listener for form submission
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            // Prevent the default form submission
            event.preventDefault();
            
            // Perform any additional actions (like validation) here if needed
            
            // Submit the form
            this.submit();
            
            // Reload the page after a delay (adjust as needed)
            setTimeout(reloadPage, 2000); // Reloads after 2 seconds (2000 milliseconds)
        });
    </script>
    <script>
        function findage() {
            var day = document.getElementById("age").value;
            var DOB = new Date(day);
            var today = new Date();
            var Age = today.getTime() - DOB.getTime();
            Age = Math.floor(Age / (1000 * 60 * 60 * 24 * 365.25));
            document.getElementById("dob").value = Age;
        }
    </script>
</body>
</html>
