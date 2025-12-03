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

// Get the POST data
$data = json_decode(file_get_contents('php://input'), true);

$song_name = $data['song_name'];
$notes = json_encode($data['notes']); // JSON encode the notes array
$durations = json_encode($data['durations']); // JSON encode the durations array

// SQL query to insert data into the songs table
$sql = "INSERT INTO songs (song_name, notes, durations) VALUES ('$song_name', '$notes', '$durations')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success", "message" => "Song saved successfully!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error: " . $conn->error]);
}

// Close connection
$conn->close();
?>
