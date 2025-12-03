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

$song_id = $data['song_id'];
$mode = $data['mode'];

// SQL query to insert the song play data
$sql_insert = "INSERT INTO played_songs (song_id, mode) VALUES ('$song_id', '$mode')";

if ($conn->query($sql_insert) === TRUE) {
    // After successfully inserting, update the flag in fetch_flag table
    $sql_update = "UPDATE fetch_flag SET flag = TRUE WHERE id = 1";
    
    if ($conn->query($sql_update) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Song play data saved and flag updated successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error updating flag: " . $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Error saving song play data: " . $conn->error]);
}

// Close connection
$conn->close();
?>
