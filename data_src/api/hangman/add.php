<?php
require_once "../includes/db_config.php"; // Follow the lines

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

$word = $_POST["word"]; // Receive the Word of User

$sql = $connection->prepare("SELECT word FROM hangman WHERE word = UPPER(?);");
$sql->bind_param("s", $word);
$sql->execute();
$data = $sql->get_result();

if ($data->num_rows > 0) { // If there are more than 0 rows
    $message = ["message" => "Rejected. Word is already in Database", "word" => $word];
    // $response = "rejected";
} else { // If the word isn't in the database
    // We're doing it the hard way I guess
    $sql = $connection->prepare("INSERT INTO hangman (word) VALUES (UPPER(?));");
    $sql->bind_param("s", $word); // No SQLi allowed
    $sql->execute();

    $message = ["message" => "Added a word successfully", "word" => $word];
    // $response = "success";
}

echo json_encode($message);

$sql->close();
// Close the database connection
$connection->close();

// echo "<script>document.getElementById('response').value='".$response."';</script>";
?>
