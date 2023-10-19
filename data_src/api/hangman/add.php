<?php
require_once "../includes/db_config.php"; // Follow the lines

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

// We're doing it the hard way I guess
$sql = $connection->prepare("INSERT INTO hangman (word) VALUES (UPPER(?));");
$sql->bind_param("s", $word); // No SQLi allowed

$word = $_POST["word"]; // Receive the Word of User
$sql->execute();

$message = ["message" => "Added a word successfully", "word" => $word]; // It works
// Should change it in case it doesn't work
echo json_encode($message);

$sql->close();
// Close the database connection
$connection->close();
?>
