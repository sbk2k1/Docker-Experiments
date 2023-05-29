<?php
$databaseHostname = "db";
$databaseUsername = "root";
$databasePassword = "secret";
$databaseName = "test";
$databasePort = 8081;

$db = new mysqli($databaseHostname, $databaseUsername, $databasePassword, $databaseName, $databasePort);

if (isset($_POST['username']) && isset($_POST['password'])) {

    if ($db->connect_errno) {
        echo "Error: Failed to connect to MySQL - " . $db->connect_error;
    } else {
        if ($db->logIn("users", $_POST['username'], $_POST['password'])) {
            echo "Login Success";
        } else {
            echo "Username or Password wrong";
        }
    }
} else {
    echo "All fields are required";
}
?>
