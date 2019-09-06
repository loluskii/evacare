<?php
require 'config.php';
$succ = "";
$err = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST["firstname"];
    $sur_name = $_POST["surname"];
    $email = $_POST["email"];
    $pass_word = $_POST["pass"];
    $phone_number = $_POST["number"];

    $query = "INSERT INTO users (first_name, sur_name, email, pass_word, phone_number) VALUES('$first_name', '$sur_name','$email','$pass_word','$phone_number')";
    $sql = mysqli_query($db, $query) or die(mysqli_error($db));

    if ($sql) {
        $succ = "Registration Successful! <a href='login.php' >Proceed to login</a>";
    } else {
        $err = "An Error Occured. Please try again.";
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                            <form method="POST" action="register.php" class="col-md-6 mx-auto p-3">
                                <h1 class="text-center">Login Page</h1>
                                <hr class="col-md-5 mx-auto">
                                <div class="container">
                                    <div class="row">
                                        <input type="text" placeholder="First Name" class="form-control mb-3" id="name" name="firstname">

                                        <!-- <label for="surname"><b>Surname</b></label> -->
                                        <input type="text" placeholder="Surname" class="form-control mb-3" name="surname">

                                        <!-- <label for="email"><b>Email</b></label> -->
                                        <input type="email" placeholder="Enter Email" class="form-control mb-3" name="email" id="name" required>

                                        <!-- <label for="Number"><b>Phone Number</b></label> -->
                                        <!-- <input type="tel"  placeholder="Country code" class="" id="number"> -->
                                        <input type="tel" placeholder="Number" class="form-control mb-3" name="number">

                                        <br>
                                        <!-- <label for="password"><b>Password</b></label> -->
                                        <input type="password" placeholder="Enter password" class="form-control mb-4" name="pass" id="name" required>
                                        <br>
                                        <input type="submit" value="Sign Up" class="btn btn-block btn-xs " style="background-color: rgb(227, 165, 119)">
                                        <p class="mb-0 mt-2 text-dark"><?php echo $succ; ?></p>
                                        <p class="mb-0 mt-2 text-danger"><?php echo $err; ?></p>
                                        <div class="col-md-6 mx-auto mt-3 text-center">
                                            <p class="text-center"><a href="login.php" class="text-dark mr-4 text-center">Already have an account? Log
                                                    In</a>
                                            </p>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-center" style="background-color:rgb(255, 224, 225);">Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved. </p>
        </div>

    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>