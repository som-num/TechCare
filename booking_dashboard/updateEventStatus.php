<?php
include '../config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$request = json_decode(file_get_contents("php://input"), true);

if (isset($request["id"]) && isset($request["status"])) {
  $eventId = $request["id"];
  $newStatus = $request["status"];

  $sql = "UPDATE Reservation SET status = ? WHERE reservation_id = ?";
  $query = $dbconnection->prepare($sql);
  $query->bind_param("si", $newStatus, $eventId);

  if ($query->execute()) {
    echo json_encode(["success" => true, "message" => "Status updated successfully."]);
  } else {
    echo json_encode(["success" => false, "message" => $query->error]);
  }
  $query->close();
} else {
  echo json_encode(["success" => false, "message" => "Invalid input."]);
}
?>
