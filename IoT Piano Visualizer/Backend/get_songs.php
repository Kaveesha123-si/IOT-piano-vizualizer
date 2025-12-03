<?php
header('Content-Type: application/json');

// Set CORS headers
header("Access-Control-Allow-Origin: *"); // Allow all origins; adjust as needed
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");


// Database connection details
$host = "mypiono.sysoftgroups.com";
$username = "sysoftg1_admin";
$password = "1o)_+OEjFGjK";
$database = "sysoftg1_mypiono";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

// SQL query to fetch songs
$sql = "SELECT id, song_name FROM songs";
$result = $conn->query($sql);

$songs = array();

if ($result->num_rows > 0) {
    // Fetch each row
    while($row = $result->fetch_assoc()) {
        $songs[] = $row;
    }
    echo json_encode(["status" => "success", "songs" => $songs]);
} else {
    echo json_encode(["status" => "error", "message" => "No songs found"]);
}

// Close connection
$conn->close();
?>
