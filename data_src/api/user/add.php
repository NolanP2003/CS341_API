<?php
require_once "../includes/db_config.php"; // Follow the lines

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

$username = $_POST["user"]; // Receive the username

// We're doing it the hard way I guess
$sql = $connection->prepare("INSERT INTO user (username) VALUES (UPPER(?));");
$sql->bind_param("s", $username); // No SQLi allowed
$sql->execute();

$response = ["status" => "success", "message" => "User added successfully."];

echo json_encode($response);

$sql->close();
// Close the database connection
$connection->close();
?>
