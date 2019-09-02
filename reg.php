<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST["firstname"];
    $sur_name = $_POST["surname"];
    $email = $_POST["email"];
    $pass_word = $_POST["password"];
    $phone_number = $_POST["number"];

    $query = "INSERT INTO customer_data (first_name, sur_name, email, pass_word, phone_number) VALUES('$first_name', '$sur_name','$email','$pass_word','$phone_number')";
    $sql = mysqli_query($conn, $query) or die(mysqli_error($db));

    if ($sql) {
        header("location: order.php");
    } else {
        echo "An error occured!" . mysqli_error($db);
    }
}
