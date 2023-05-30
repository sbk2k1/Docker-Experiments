<?php
$servername = "sql_server";
$username = "root";
$password = "your_password";
$dbname = "your_database";
$firstServerUrl = "http://first_server";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the text insertion request
    $text = $_POST['text'];

    // Check if the text is empty
    if (empty($text)) {
        echo "Text is empty.";
        return;
    }

    // Create a connection
    $conn = mysqli_init();
    mysqli_real_connect($conn, $servername, $username, $password, $dbname);

    // Insert the text into the database
    $sql = "INSERT INTO your_table (text) VALUES ('$text')";
    if (mysqli_query($conn, $sql)) {
        echo "Text inserted successfully.";
    } else {
        echo "Error occurred while inserting text: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    // Make a request to the first server to get the texts
    $texts = file_get_contents($firstServerUrl);

    echo $texts;
}

?>
