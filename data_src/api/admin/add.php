<?php
require_once "../includes/db_config.php";

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

if ($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

if (!isset($_POST['username'], $_POST['password'])) {
    exit('Please complete the registration form!');
}

$sql = "SELECT * FROM admin WHERE username = ?";
$sql->bind_param('s', $_POST['username']);
$sql->execute();
$data = $query->get_result();

if ($data->num_rows > 0) {
    echo 'Username already exists, try again';
} else {
    $sql = $connection->prepare("INSERT INTO admin (username, password) VALUES (?, ?);");
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql->bind_param("ss", $_POST['username'], $password); // No SQLi allowed
    $sql->execute();
}
$sql->close();
$connection->close();

?>