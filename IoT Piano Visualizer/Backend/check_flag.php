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

// Query to get the flag status
$sql = "SELECT flag FROM fetch_flag WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo $row['flag'] ? "true" : "false";
} else {
  echo "Error retrieving flag.";
}

$conn->close();
?>
