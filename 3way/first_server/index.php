<?php
$servername = "sql_server";
$username = "root";
$password = "your_password";
$dbname = "your_database";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch texts from the database
$sql = "SELECT text FROM your_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["text"] . "<br>";
    }
} else {
    echo "No texts found.";
}

$conn->close();
?>
