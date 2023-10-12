<?php
require_once "../includes/db_config.php";

// Create a database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Perform a database query
$query = "SELECT * FROM users";
$result = $connection->query($query);


while ($row = $result->fetch_assoc()) {
    echo "Name: ".$row["name"] . "<br>";
}

// Close the database connection
$connection->close();
?>
