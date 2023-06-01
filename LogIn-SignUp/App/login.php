<?php
$servername = "db";
$username = "root";
$password = "your_password";
$dbname = "your_database";
$setName = array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8');

$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, $setName);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['username']) && isset($_POST['password'])) {

    if ($db->connect_errno) {
        echo "Error: Failed to connect to MySQL - " . $db->connect_error;
    } else {
        // check user
        $sql = "SELECT * FROM your_table WHERE username = :username AND password = :password";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            echo "Login Success";
        } else {
            echo "Login Failed";
        }
    }
} else {
    echo "All fields are required";
}
?>
