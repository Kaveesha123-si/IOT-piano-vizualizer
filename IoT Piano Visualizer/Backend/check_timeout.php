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

// Set the timeout duration (e.g., 10 minutes)
$timeoutDuration = 10 * 60;  // 10 minutes in seconds

// Query to get the last status and timestamp
$sql = "SELECT status, timestamp FROM esp32_status WHERE id=1";  // Adjust based on your ID
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the row
    $row = $result->fetch_assoc();
    $lastTimestamp = strtotime($row['timestamp']);  // Convert to timestamp
    $currentTimestamp = time();  // Current time

    // Check if the last update is older than the timeout duration
    if (($currentTimestamp - $lastTimestamp) > $timeoutDuration) {
        echo "ESP32 is offline (status: off)\n";
        
        // Optionally, update the status to "off" in the database
        $updateSql = "UPDATE esp32_status SET status='off' WHERE id=1";
        $conn->query($updateSql);
    } else {
        echo "ESP32 is online (status: " . $row['status'] . ")\n";
    }
} else {
    echo "No status data found.";
}

$conn->close();
?>
