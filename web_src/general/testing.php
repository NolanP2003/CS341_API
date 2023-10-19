<?php
require_once "../../data_src/api/includes/db_config.php";

// Create a database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

// Database query
$query = "SELECT * FROM user;";
$result = $connection->query($query);

while ($row = $result->fetch_assoc()) {
    echo "Name: ".$row["username"] . "<br>";
}

$query2 = "SELECT t.question, a.triv_answer FROM trivia t JOIN answer a USING (questionID) WHERE is_Correct IS TRUE;";
$result2 = $connection->query($query2);

while ($row = $result2->fetch_assoc()) {
    echo "Q: ".$row["question"]."<br>";
    echo "A: ".$row["triv_answer"]."<br><br>";
}

// Close the database connection
$connection->close();
?>
