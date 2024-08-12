<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    
    <title>Form</title>
</head>
<body class="admin-body">
    <style>
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

    .container-1
{
       width: 90%;
      margin-bottom: 30%;
      margin-right: 25px;
      padding: 10px;
           
}
    .admin-body{
    background-image:url(img/admin-004.jpg) ;
     background-repeat: no-repeat;
     background-size: cover;
     height: 400px;

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
        <div class="container-1" >
            <H2>ADMIN</H2>
          <form action="adminuser.php" method="post" >       
            
            <div class="login">
                <i class='bx bxs-user'></i>
                <input type="text" class="name" name="username"  placeholder="Admin ID">
            </div>
            <div class="login">
                <i class='bx bxs-lock' ></i>
                <input type="password" class="name" name="password"  placeholder="Admin Password">

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