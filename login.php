<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: order.php");
    exit;
}

require_once 'config.php';

$succ = "";
$err = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = mysqli_real_escape_string($db, $_POST["email"]);
    $pass= mysqli_real_escape_string($db, $_POST["pass"]);

    $pwd = md5($pass);//encrypts password in md5 hashing
    $query = "SELECT * FROM users WHERE email='$email' ";
    $results = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($results);
    $passt = $row['pass_word'];
    $username = $row['first_name'];

    if ($pass === $passt) {
        session_start();

        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        header("location: home.php");
    }else {
        $err = "Your username or password is incorrect!";
    }


}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="css/all.css">
    <script src="https://kit.fontawesome.com/b95e0dbf48.js"></script>
    <style>
        body {
            overflow: hidden;
        }
    </style>
</head>

<body style=" background-color:rgb(255, 224, 225); ">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
        <a class="navbar-brand pl-md-5 ml-md-5 pr-md-5 mr-md-5" href="index.html">EVACARE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-3 text-dark">
                    <a href="tel://2349000500000" class="nav-link"><i class="fa fa-phone "></i>+234 9000500000</a>
                </li>
                <li class="nav-item mr-3 text-dark">
                    <a href="mailto:" class="nav-link"> <i class="fa fa-envelope"></i> support@evacare.com.ng</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div style="height: 100vh;">
            <div class=" h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 text-center">
                        <div class="text-center">
                            <form method="POST" action="login.php" class="col-md-6 mx-auto p-3">
                                <h1 class="text-center">Login Page</h1>
                                <hr class="col-md-5 mx-auto">
                                <div class="container">
                                    <div class="row">
                                        <label for="email"><b>Email</b></label>
                                        <input type="text" placeholder="Enter Email" class="form-control mb-3"
                                            name="email" id="name" required>
                                        <br>
                                        <label for="password"><b>Password</b></label>
                                        <input type="password" placeholder="Enter password" class="form-control mb-4"
                                            name="pass" id="name" required>
                                        <br>
                                        <input type="submit" value="Login" class="btn btn-block btn-xs "
                                            style="background-color: rgb(227, 165, 119)">
                                        <p class="text-danger mt-2"> <?php echo $err; ?> </p>

                                        <div class="col-md-6 mx-auto mt-3 text-center">
                                            <p class="text-center"><a href="register.php"
                                                    class="text-dark mr-4 text-center">Don't have an account? Register
                                                    Now</a>
                                            </p>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center" style="background-color:rgb(255, 224, 225);">Copyright &copy;
                <script>document.write(new Date().getFullYear());</script> All rights reserved. </p>
        </div>

    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>