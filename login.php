<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Login</title>
</head>
<body>
    <style>
        /* styles.css */

/* Add your existing styles here */

/* Media query for mobile devices */

*{
    margin:0;
    padding: 0;
    box-sizing: border-box;
    font-family: "poppins",sans-serif;
    
}
body{
    background-color: #c9d6ff;
    background: linear-gradient(to right,#e2e2e2,#c9d6ff);
    background-image:url(img/1665061146-GettyImages-1323677096.jpg) ;
     background-repeat: no-repeat;
     background-size: cover;
     height: 500px;

    
   
}
.admin-body{
    background-image:url(img/admin-004.jpg) ;
     background-repeat: no-repeat;
     background-size: cover;
     height: 400px;

}
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    padding: 10px 20px;
}

.navbar .logo img {
    height: 50px;
}

.navbar-menu {
    list-style: none;
    display: flex;
    justify-content: end
}

.navbar-menu li {
    margin: 0 15px;
}

.navbar-menu .nav-link {
    text-decoration: none;
    color: #000000;
    font-weight: bold;
    transition: color 0.3s;
}
.admin .nav-link{
    color: white;
}
.navbar-menu .nav-link:hover {
    color: #ff6347;
}
body section .navbar-toggler .navbar{
    display:flex;
    justify-content: space-between;
    background-color:transparent;
}
.name{
    height: 40px;
    width: 300px;
    background: transparent;
    
    
}
div ::placeholder{
    text-align: center;
    color: #000000;
}
.container
{
   
    width: 450px;
    background-image: url(img/001-modified.jpg);
    background-size: cover;
    float:right;
    border-radius: 10px;   
    box-shadow: #381616;
    text-align: center;
    margin-right: 42%;
    
    margin-top: 260px;
    line-height: 1.6cm;
    
} 
.container-1
{
   
    width: 450px;
    background-image: url(img/admin-message-working-office-table-background-93379017.webp);
    background-size: cover;
    float:right;
    border-radius: 10px;   
    box-shadow: #381616;
    text-align: center;
    margin-right: 42%;
    
    margin-top: 260px;
    line-height: 1.6cm;
    
} 

input[ type="text"],
input[type="password"],
select{
    color: #000000;
    border: none;
    border-bottom:2px solid rgb(0, 0, 0);
    line-height: 1.6cm;
    font-weight: 700;

}


section h2{
    padding-bottom: 10px;
    padding-top: -10px;
}
.login-container a {
    color:black;
    font-size: small;
}
.login-container a:hover{
    color: blue;
    font-size: medium;
}

.submit button {
    margin-top: 10px;
    padding-top: 5px;
    background-color: rgb(230, 89, 89);
    width: 80px;
    height: 30px;
    color: #ffffff;
    font-size: small;
    border-radius:5px;
    border: 1px solid rgb(230, 130, 130);
    
}
.submit button:hover{
    background-color:rgb(248, 12, 12);
    font-size: medium;
    color: white;
    width: 100px;
    height: 30px;
}
@media only screen and (max-width: 600px) {
    .navbar {
        justify-content: space-between;
        padding: 10px;
    }

    .navbar .logo img {
        height: 40px;
    }

    .navbar-menu {
        display: none; /* Hide the menu */
    }

    .navbar-toggler .navbar-menu {
        display: flex;
        align-items: center;
    }

    .navbar-toggler .navbar-menu li {
        margin: 0;
    }

    .navbar-toggler .navbar-menu .nav-link {
        padding: 0 10px;
        font-size: 24px;
    }

    .container {
        width: 90%;
      margin-bottom: 30%;
      margin-right: 25px;
      padding: 10px;
           
        
    }
    body{
    background-color: #c9d6ff;
    background: linear-gradient(to right,#e2e2e2,#c9d6ff);
    background-image:url(img/1665061146-GettyImages-1323677096.jpg) ;
     background-repeat: no-repeat;
     background-size: cover;
     height:max-content;
   
}

}


    </style>
   <section>
        <div class="navbar-toggler">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="logo">
                    <a class="navbar-brand bg-white" href="#">
                        <img src="img/yamee_logo-removebg-preview.png" alt="yameecluster" class="img-fluid" style="max-width: 100px;">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto  text-dark">
                        <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="rigister.php" class="nav-link">Register</a></li>
                        <li class="nav-item"><a href="admin.php" class="nav-link">Admin</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </section>
    <section>
        <div class="container login-container">
            <h2>LOGIN</h2>
            <form action="user.php" method="post">
                <div class="login">
                    <i class='bx bxs-user'></i>
                    <input type="text" class="name" name="username" placeholder="User Name" required>
                </div>
                <div class="login">
                    <i class='bx bxs-lock'></i>
                    <input type="password" class="name" name="aadhar" placeholder="Aadhar Number" maxlength="12" required>
                </div>
                <div class="submit">
                <button type="submit" class="btn btn-dark bg-danger">Sign Up</button>
                </div>
            </form>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
