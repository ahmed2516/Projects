<?php

// MySQL server configuration
$server = "localhost";
$username = "root";
$password = "";
$dbname = "HelpDesk"; // Change to your database name

// Create a connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Successfully Connected to the Server.";

// Close the connection (optional)
$conn->close();

?>
