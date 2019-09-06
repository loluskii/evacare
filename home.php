<?php
//start a new session
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Account | Evacare</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/b95e0dbf48.js"></script>
    <style>
        body {
            font-family: 'Montserrat';
        }

        a>.card {
            position: relative;
            -webkit-transition: 0.2s all ease-in-out !important;
            -o-transition: 0.2s all ease-in-out !important;
            transition: 0.2s all ease-in-out !important;
            top: 0;
        }

        a>.card:hover {
            -webkit-box-shadow: 0 5px 20px -7px rgba(0, 0, 0, 0.9) !important;
            box-shadow: 0 5px 20px -7px rgba(0, 0, 0, 0.9) !important;
            top: -2px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
            <a class="navbar-brand pl-md-5 ml-md-5 pr-md-5 mr-md-5" href="#">EVACARE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mr-4 text-dark">
                        <b><a class="nav-link" href="#"><i class="fa fa-user"></i> Hi, <?php echo htmlspecialchars($_SESSION["username"]); ?> </a></b>
                    </li>
                    <li class="nav-item mr-4 text-dark">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div style="background-image: url(images/48.jpg); background-repeat: no-repeat; height: 100vh; min-height: 500px; background-size: cover; background-position: center center;">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 text-center">
                        <h2 class="text-center pb-5 mb-5-">What Would you like to do?</h2>
                        <div class="row">
                            <div class="container col-sm-6 col-md-4">
                                <a href="edit-profile.php" style="text-decoration: none;">
                                    <div class="card p-5 shadow-lg rounded" style="background-image: url('images/46.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
                                        <div class="card-block card-title text-center">
                                            <h1 class="mb-2 text-light"><i class="fa fa-user fa-3x"></i></h1>
                                        </div>
                                    </div>
                                    <h3 class="mt-3 text-dark font-weight-bold">Edit Your Profile</h3>
                                </a>
                            </div>
                            <div class="container col-sm-6 col-md-4">
                                <a href="order.php" style="text-decoration: none;">
                                    <div class="card p-5 shadow-lg rounded" style="background-image: url('images/47.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
                                        <div class="card-block card-title text-center">
                                            <h1 class="mb-2 text-light"><i class="fa fa-calendar fa-3x"></i></h1>
                                        </div>
                                    </div>
                                    <h3 class="mt-3 text-dark font-weight-bold">Book an Apointment</h3>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <script src="js/jquery-3.3.1.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>