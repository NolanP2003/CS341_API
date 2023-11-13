<?php
require_once "../includes/db_config.php"; // Follow the lines

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST["username"]; // Receive the admin username
    $password = $_POST["password"]; // Receive the admin password
} else {
    $response = ["status" => "Error", "message" => "Invalid or empty"];
    echo json_encode($response);
    exit;
}

// SQL query
if ($qry = $connection->prepare("SELECT adminID, password FROM admin WHERE username = ?")) {
    $qry->bind_param("s", $_POST["username"]);
    $qry->execute();
    $qry->store_result();

    // If username is found
    if ($qry->num_rows > 0) {
        $qry->bind_result($id, $password);
        $qry->fetch();
        
        if ($_POST["password"] === $password) {
            session_regenerate_id();
            $_SESSION["loggedin"] = TRUE;
            $_SESSION["name"] = $_POST["username"];
            $_SESSION["id"] = $id;

            // Relocates back to home once logged in
            header("Location: ../../../web_src/general/settings.php");
        }
    } else {
        echo "Incorrect username or password, try again.";
        header("Location: ../../../web_src/general/login.php");
    }
    $qry->close();
    

} else {
    echo "Incorrect username or password, try again.";
    header("Location: ../../../web_src/general/login.php");
}

// Close the database connection
$connection->close();

exit();
?>
