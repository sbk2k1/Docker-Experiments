<?php
$servername = "sql_server";
$username = "root";
$password = "your_password";
$dbname = "your_database";
$firstServerUrl = "http://first_server";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {

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

        // Insert the text into the database with suffix - from server 2 -
        $sql = "INSERT INTO your_table (text) VALUES ('$text - from server 2')";
        if (mysqli_query($conn, $sql)) {
            // refresh page
            header("Refresh:0");
        } else {
            echo "Error occurred while inserting text: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } catch (Exception $e) {
        echo "Error occurred while inserting text: " . $e->getMessage();
    }
} else {
    // Fetch texts from the database
    $conn = mysqli_init();

    mysqli_real_connect($conn, $servername, $username, $password, $dbname);

    $sql = "SELECT text FROM your_table";

    $result = mysqli_query($conn, $sql);

    echo "<ul>";

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>" . $row['text'] . "</li>";
        }
    }

    echo "</ul>";

    // Also add a form to insert a new text which sends a POST request to this server

    echo <<<HTML
    <form method="post">
        <input type="text" name="text" />
        <input type="submit" value="Insert text" />
    </form>
HTML;


}

?>