<?php

include 'config.php';

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
        echo "Error: ".mysqli_error($db);
    }
    
}
?>