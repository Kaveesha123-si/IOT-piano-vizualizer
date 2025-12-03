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

// SQL query to get the latest played song
$sql = "SELECT ps.song_id, ps.mode, s.song_name, s.notes, s.durations
        FROM played_songs ps
        JOIN songs s ON ps.song_id = s.id
        ORDER BY ps.id DESC LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the latest played song data
    $row = $result->fetch_assoc();

    // Convert notes and durations from JSON string to arrays
    $notes = json_decode($row['notes']);
    $durations = json_decode($row['durations']);

    // Prepare the song data array
    $song_data = array(
        "song_name" => $row['song_name'],
        "mode" => $row['mode'],
        "notes" => $notes,
        "durations" => $durations
    );

    // Return the song data as a JSON response
    echo json_encode($song_data);

} else {
    // No songs found
    echo json_encode(["status" => "error", "message" => "No played songs found"]);
}

// Close connection
$conn->close();
?>
