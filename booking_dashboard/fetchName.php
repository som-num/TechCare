<?php
include '../config.php';
session_start();

// Turn on error reporting temporarily for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check if user ID is set in the session
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'User ID not set in session.']);
    exit();
}

$user_id = $_SESSION['user_id'];

// Query to fetch user name from the database
$sql = "SELECT full_name FROM Users WHERE user_id = ?";
$stmt = $dbconnection->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if the query returned a result
if ($result->num_rows > 0) {
    $name = $result->fetch_assoc()['full_name'];
    echo json_encode(['full_name' => $name]);
} else {
    echo json_encode(['error' => 'No user found with the given ID.']);
}

exit();
