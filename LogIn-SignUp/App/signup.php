<?php

$databaseHostname = "db";
$databaseUsername = "root";
$databasePassword = "secret";
$databaseName = "test";
$databasePort = 8081;

$db = new mysqli($databaseHostname, $databaseUsername, $databasePassword, $databaseName, $databasePort);


if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {

// echo the $db variable to see if it is working
echo $db;


    if ($db->connect_errno) {
        echo "Error: Failed to connect to MySQL - " . $db->connect_error;
    } else {
        if ($db->signUp("users", $_POST['fullname'], $_POST['email'], $_POST['username'], $_POST['password'])) {
            echo "Sign Up Success";
        } else {
            echo "Sign up Failed";
        }
    }
} else {
    echo "All fields are required";
}
?>