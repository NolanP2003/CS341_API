<?php
require_once "../includes/db_config.php"; // Follow the lines

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

$questionID = $_POST["questionID"];

$sql = $connection->prepare("SELECT question FROM trivia WHERE questionID = (?);");
$sql->bind_param("i", $questionID);
$sql->execute();
$data = $sql->get_result();

if ($data->num_rows == 0) { // If nothing comes up
    // $message = ["message" => "Word is not in the Database"];
    $response = ["status" => "Error", "message" => "Question is not in the database."];
} elseif ($data->num_rows == 1) { // There should only be one row, unneccessary?
    $sql = $connection->prepare("DELETE FROM trivia WHERE questionID = (?);");
    $sql->bind_param("i", $questionID);
    $sql->execute();

    // $message = ["message" => "Deleted a question successfully", "questionID" => $questionID];
    $response = ["status" => "success", "message" => "Deleted a question."];
}

echo json_encode($response);

$sql->close();
// Close the database connection
$connection->close();
?>
