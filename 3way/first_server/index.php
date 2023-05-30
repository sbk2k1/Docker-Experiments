<?php
$servername = "sql_server";
$username = "root";
$password = "your_password";
$dbname = "your_database";
$setName = array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8');


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, $setName);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch texts from the database
    $sql = "SELECT text FROM your_table";
    $stmt = $conn->query($sql);

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo $row["text"] . "<br>";
        }
    } else {
        echo "No texts found.";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
