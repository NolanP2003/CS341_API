<?php
require_once "../includes/db_config.php"; // Follow the lines

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

$word = $_POST["word"];

$sql = $connection->prepare("SELECT word FROM hangman WHERE word = UPPER(?);");
$sql->bind_param("s", $word);
$sql->execute();
$data = $sql->get_result();

// TODO: Create a message that pops up on the website instead of going to this page

if ($data->num_rows == 0) { // If nothing comes up
    $message = ["message" => "Word is not in the Database"];
} elseif ($data->num_rows == 1) { // There should only be one row, unneccessary?
    $sql = $connection->prepare("DELETE FROM hangman WHERE word = UPPER(?);");
    $sql->bind_param("s", $word);
    $sql->execute();

    $message = ["message" => "Deleted a word successfully", "word" => $word];
}
// Should change it in case it doesn't work
echo json_encode($message);

$sql->close();
// Close the database connection
$connection->close();
?>
