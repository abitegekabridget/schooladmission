<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "localhost";
$username = "root";
$password = "1+Six=16";
$dbname = "db_admission";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Database connection failed']);
    http_response_code(500);
    exit;
}

// Get form data
$first_name = $_POST['firstName'] ?? null;
$last_name = $_POST['lastName'] ?? null;
$username = $_POST['username'] ?? null;
$email = $_POST['email'] ?? null;
$phone_number = $_POST['phoneNumber'] ?? null;
$password = $_POST['password'] ?? null;

if (!$first_name || !$username || !$email || !$phone_number || !$password) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Missing required fields']);
    http_response_code(400);
    exit;
}

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if username or email already exists
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Username or email already exists']);
    http_response_code(409);
    exit;
}

// Insert user data
$stmt = $conn->prepare("INSERT INTO users (first_name, last_name, username, email, phone_number, password) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $first_name, $last_name, $username, $email, $phone_number, $hashed_password);

if ($stmt->execute()) {
    header('Content-Type: application/json');
    echo json_encode(['message' => 'User registered successfully']);
    http_response_code(201);
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Database error: ' . $stmt->error]);
    http_response_code(500);
}

$stmt->close();
$conn->close();
?>