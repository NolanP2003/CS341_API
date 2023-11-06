<?php
require_once "../includes/db_config.php"; // Follow the lines

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

$questionID = $_POST["questionID"];

$sql = $connection->prepare("SELECT * FROM answer WHERE questionID = (?);");
$sql->bind_param("i", $questionID);
$sql->execute();
$data = $sql->get_result();

if ($data->num_rows == 0) { // If nothing comes up
    // $message = ["message" => "Word is not in the Database"];
    $response = ["status" => "Error", "message" => "Question is not in the database."];
} elseif ($data->num_rows >= 1) {
    $sql = $connection->prepare("DELETE FROM answer WHERE questionID = (?);");
    $sql->bind_param("i", $questionID);
    $sql->execute();

    // $message = ["message" => "Deleted answers successfully", "questionID" => $questionID];
    $response = ["status" => "success", "message" => "Deleted answers."];
}

echo json_encode($response);

$sql->close();
// Close the database connection
$connection->close();
?>
