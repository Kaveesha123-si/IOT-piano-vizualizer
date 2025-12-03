<?php

// Set CORS headers
header("Access-Control-Allow-Origin: *"); // Allow all origins; adjust as needed
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Database connection details
$servername = "mypiono.sysoftgroups.com";
$username = "sysoftg1_admin";
$password = "1o)_+OEjFGjK";
$dbname = "sysoftg1_mypiono";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error", "message" => "Invalid email format"]);
        exit;
    }

    // Password validation (minimum 8 characters, at least 1 letter, 1 number, and 1 special character)
    $password_pattern = "/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/";
    if (!preg_match($password_pattern, $password)) {
        echo json_encode(["status" => "error", "message" => "Password must be at least 8 characters long, contain at least one letter, one number, and one special character"]);
        exit;
    }

    // Hash the password for secure storage
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo json_encode(["status" => "error", "message" => "Email is already registered"]);
    } else {
        // Insert the new user into the database
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["status" => "success", "message" => "User registered successfully!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Error: " . $conn->error]);
        }
    }

    $conn->close();
}
?>