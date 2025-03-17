<?php
include '../config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// Set the response header to JSON
header("Content-Type: application/json");

// Get the incoming data
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id']) && is_numeric($data['id'])) {
    $id = $data['id'];

    // Prepare and execute the SQL statement
    $sql = "DELETE FROM Reservation WHERE reservation_id = ?";
    $stmt = $dbconnection->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Event deleted successfully"]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed to delete event"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "Database error"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request"]);
}
?>
