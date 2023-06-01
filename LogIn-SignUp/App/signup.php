<?php

$servername = "db";
$username = "root";
$password = "your_password";
$dbname = "your_database";
$setName = array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8');

$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, $setName);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {

    if ($db->connect_errno) {
        echo "Error: Failed to connect to MySQL - " . $db->connect_error;
    } else {
        // insert new user
        $sql = "INSERT INTO your_table (fullname, email, username, password) VALUES (:fullname, :email, :username, :password)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':fullname', $_POST['fullname'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
        $stmt->execute();
        echo "Register Success";
    }
} else {
    echo "All fields are required";
}
?>