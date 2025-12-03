<?php
// Database connection details
$servername = "mypiono.sysoftgroups.com";
$username = "sysoftg1_admin";
$password = "1o)_+OEjFGjK";
$dbname = "sysoftg1_mypiono";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Set the fetch flag to TRUE
$sql = "UPDATE fetch_flag SET flag = TRUE WHERE id = 1";

if ($conn->query($sql) === TRUE) {
  echo "ESP32 will fetch song data again!";
} else {
  echo "Error updating flag: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Restart Song on ESP32</title>
</head>
<body>
    <h1>Restart ESP32 Song Fetch</h1>
    <form method="POST">
        <button type="submit">Restart ESP32</button>
    </form>
</body>
</html>
