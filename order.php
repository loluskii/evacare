<?php
//start a new session
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

require_once 'config.php';
$err = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($db, $name=$_POST["name"]);
    $phonenumber = mysqli_real_escape_string($db, $name=$_POST["phone"]);
    $service_options = mysqli_real_escape_string($db, $name=$_POST["option"]);
    $massages= mysqli_real_escape_string($db, $name=$_POST["massage"]);
    $hairstyles=mysqli_real_escape_string($db, $name=$_POST["hairstyles"]);
    $nails=mysqli_real_escape_string($db, $name=$_POST["nails"]);
    $facials=mysqli_real_escape_string($db, $name=$_POST["facials"]);
    $location=mysqli_real_escape_string($db, $name=$_POST["location"]);
    $date=mysqli_real_escape_string($db, $name=$_POST["date"]);
    $homeservice=mysqli_real_escape_string($db, $name=$_POST["service"]);
    
    $sql = "INSERT INTO order (name, phonenumber, service_options, massages, hairstyle, nails, facials, location, date, homeservice)
     VALUES ('$name','$phonenumber', '$service_options', '$massages', '$hairstyles', '$nails', '$facials', '$location', '$date', '$homeservice')";
     
    $query =  mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
    
    if ($sql) {
        header("location: thank-you.html");
    } else { 
        $err = "An error occured. Try again";
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/all.css">
    <script src="https://kit.fontawesome.com/b95e0dbf48.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>


    <style>
        .card {
            border-radius: 20px;
            box-shadow: 0 6px 10px -4px rgba(0, 0, 0, 0.15);
        }

        body {
            font-family: 'Montserrat';
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
        <a class="navbar-brand pl-md-5 ml-md-5 pr-md-5 mr-md-5" href="index.html">EVACARE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mr-4 text-dark">

                    <b><a class="nav-link" href="#"><i class="fa fa-user"></i> Hi, <?php echo htmlspecialchars($_SESSION["username"]); ?> </a></b>
                </li>
                <!-- <li class="nav-item mr-4 text-dark">
                            <a class="nav-link" href="">Contact</a>
                        </li> -->
                <li class="nav-item mr-4 text-dark">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div style="background-image: url(images/thai.jpeg); background-repeat: no-repeat; height: 100vh; min-height: 800px; background-size: cover; background-attachment:fixed; background-position: center center;">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-md-8 mx-auto mb-4">
                    <div class="card light-card" style="margin-top: 100px;">
                        <h5 class="m-4 ">
                            Fill the Form below to create your appointment
                        </h5>
                        <form class="card-body" action="order-data.php" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-0">
                                        <label for="">Name</label>
                                        <input type="text" placeholder="Tobi Olujohnson" class="form-control" name="name" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mt-0">
                                        <label for="">Phone Number</label>
                                        <input type="telephone" placeholder="07054674584" class="form-control" name="phone" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Service Options</label>
                                        <select class="form-control" name="option">
                                            <option>- Choose one -</option>
                                            <option value="Hair">Hair</option>
                                            <option value="Body">Body</option>
                                            <option value="Facial">Facial</option>
                                            <option value="Nails ">Nails</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Massages</label>
                                        <select class="form-control" name="massage">
                                            <option>- Choose one -</option>
                                            <option value="Hot Stone">Hot Stone</option>
                                            <option value="Deep Tissue">Deep Tissue</option>
                                            <option value="Reflexology">Reflextology</option>
                                            <option value="Shiatsu ">Shiatsu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Facials</label>
                                        <select class="form-control" name="facials">
                                            <option>- Choose one -</option>
                                            <option value="Antioxidant">Antioxidant</option>
                                            <option value="Anti-aging">Anti-aging</option>
                                            <option value="Micro-dermal">Micro-dermal</option>
                                            <option value="Deeo-cleanse">Deep-cleanse</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="">Hairstyle </label>
                                        <select class="form-control" name="hairstyles">
                                            <option>- Choose one -</option>
                                            <option value="Haircut">Haircut</option>
                                            <option value="Wash Hair">Wash Hair</option>
                                            <option value="Braids">Braids</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="">Nails </label>
                                <select class="form-control" name="nails">
                                    <option>- Choose one -</option>
                                    <option value="Pedicure">Pedicure</option>
                                    <option value="Manicure">Manicure</option>
                                    <option value="Paint Only">Paint Only</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Would you like Home service</label>
                                <select class="form-control" name="service">
                                    <option>- Choose one -</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>





                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Where would you like the service?</label>
                                        <select class="form-control" name="location">>
                                            <option>-choose one-</option>
                                            <option value="Ajah">Ajah</option>
                                            <option value="Egbeda">Egbeda</option>
                                            <option value="Festac">Festac</option>
                                            <option value="Ikoyi">Ikoyi</option>
                                            <option value="Ikeja">Ikeja</option>
                                            <option value="Ikorodu">Ikorodu</option>
                                            <option value="Lekki">Lekki</option>
                                            <option value="Surelere">Surelere</option>
                                            <option value="VI">VI</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" name="date" id="" class="form-control">

                                    </div>
                                </div>
                            </div>
                            
                            <input type="submit" value="Submit" class="btn btn-block" style="background-color: rgb(227, 165, 119); color: #fff">
                            <p class="text-danger"> <?php echo $err; ?> </p>
                        </form>

                    </div>
                </div>
            </div>

            <!-- <p class="text-center" style="">Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved. </p> -->


        </div>
    </div>






    <script src="js/jquery-3.3.1.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>