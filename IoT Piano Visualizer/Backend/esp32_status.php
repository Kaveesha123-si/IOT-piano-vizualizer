<?php
// Database connection details
$servername = "mypiono.sysoftgroups.com";
$username = "sysoftg1_admin";
$password = "1o)_+OEjFGjK";
$dbname = "sysoftg1_mypiono";

// Create connection to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the ESP32 status from the POST request
$status = isset($_POST['status']) ? $_POST['status'] : 'unknown';

// Prepare SQL query to save or update the status and timestamp
$sql = "INSERT INTO esp32_status (status, timestamp) 
        VALUES ('$status', NOW())
        ON DUPLICATE KEY UPDATE status='$status', timestamp=NOW()";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "ESP32 status saved: " . $status;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
