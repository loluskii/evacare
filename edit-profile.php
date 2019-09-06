<?php
//start a new session
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once 'config.php';
$username = $_SESSION["username"];

$succ = "";
$err = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST["fname"];
    $sur_name = $_POST["lname"];
    $email = $_POST["email"];
    $pass_word = $_POST["pass1"];
    $phone_number = $_POST["phone_no"];

    $query = "UPDATE users SET first_name='$first_name', sur_name='$sur_name', email='$email', pass_word='$pass_word', phone_number='$phone_number' WHERE first_name = '$username' ";
    $sql = mysqli_query($db, $query) or die(mysqli_error($db));

    if ($sql) {
        $succ = "<div class='alert alert-info alert-dismissable'>
                    <a class='panel-close close' data-dismiss='alert'>×</a> 
                    <i class='fa fa-coffee'></i>
                    Your profile has been updated!
                </div>";
    } else {
        $err = "<div class='alert alert-info alert-dismissable'>
                    <a class='panel-close close' data-dismiss='alert'>×</a> 
                    <i class='fa fa-coffee'></i>
                    An error occured. Try again!
                </div>";
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evacare | Edit Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/b95e0dbf48.js"></script>
    <style>
        body {
            font-family: 'Montserrat';
        }
    </style>
</head>

<body style=" background-color:rgb(255, 224, 225); ">
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
    </header>
    <div style="background-image: url(); background-repeat: no-repeat; height: 100vh; min-height: 800px; background-size: cover; background-attachment:fixed; background-position: center center;">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12  mt-5 pt-4">
                    <h1>Edit Profile</h1>
                    <hr>
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-4">
                            <div class="text-center">
                                <img src="//placehold.it/200" class="avatar img-circle" alt="avatar">
                                <h6>Upload a different photo...</h6>
                                <input type="file" class="form-control">
                            </div>
                        </div>

                        <!-- edit form column -->
                        <div class="col-md-8 ">
                            <?php echo $succ; ?>
                            <h3>Personal info</h3>
                            <form class="form-horizontal ml-5" action="edit-profile.php" method="POST" role="form">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">First name:</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="fname" placeholder="John">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Last name:</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="lname" placeholder="Smith">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Email:</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="email" placeholder="janesemail@gmail.com" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Phone Number:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="number" placeholder="09050005000" name="phone_no">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Password:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="password" name="pass1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Confirm password:</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="password" name="pass2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-lg mr-3" style="" value="Save Changes">
                                        <span></span>
                                        <input type="reset" class="btn btn-default" value="Cancel">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <hr>
</body>

</html>