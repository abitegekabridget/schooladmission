<?php
session_start(); // Start the session

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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

    if (!$email || !$password) {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Missing email or password']);
        http_response_code(400);
        exit;
    }

    // Check user credentials
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userId, $hashedPassword);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashedPassword)) {
            // Password is correct, start a session
            $_SESSION['user_id'] = $userId;
            header('Content-Type: application/json');
            echo json_encode(['message' => 'Login successful']);
            http_response_code(200);
            exit;
        } else {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Incorrect password']);
            http_response_code(401); // Unauthorized
            exit;
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'User not found']);
        http_response_code(404); // Not Found
        exit;
    }

    $stmt->close();
} else {
    // If not a POST request
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Invalid request method']);
    http_response_code(405); // Method Not Allowed
    exit;
}

$conn->close();
?>