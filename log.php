<?php
require 'config.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = mysqli_real_escape_string($db, $_POST["email"]);
    $pass= mysqli_real_escape_string($db, $_POST["pass"]);

    $pwd = md5($pass);//encrypts password in md5 hashing
    $query = "SELECT * FROM users WHERE email='$email' AND password='$pwd'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        header("location: order.php");
    }else {
        echo '<script> window.alert("Your username or password is incorrect!") </script>';
    }


}

?>

