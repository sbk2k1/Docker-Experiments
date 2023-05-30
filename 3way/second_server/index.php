<?php
$firstServerUrl = "http://first_server";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the text insertion request
    $text = $_POST['text'];

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the text into the database
    $sql = "INSERT INTO your_table (text) VALUES ('$text')";
    if ($conn->query($sql) === TRUE) {
        echo "Text inserted successfully.";
    } else {
        echo "Error occurred while inserting text: " . $conn->error;
    }

    $conn->close();
} else {
    // Make a request to the first server to get the texts
    $texts = file_get_contents($firstServerUrl);

    echo $texts;
}
?>
