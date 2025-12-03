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

// Retrieve the POST data
$song_name = $_POST['song_name'];
$mode = $_POST['mode'];
$score = $_POST['score'];

// Prepare the SQL query
$sql = "INSERT INTO performance_data (song_name, mode, score) VALUES ('$song_name', '$mode', '$score')";

// Execute the query
if ($conn->query($sql) === TRUE) {
  echo "Performance data saved successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
