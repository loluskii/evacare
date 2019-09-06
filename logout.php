<?php

//initialize the session
session_start();

//remove or unset or delete all session variables
$_SESSION = array();

//destroy the session
session_destroy();

//redirect to the login page
header("location: login.php");
exit;

?>