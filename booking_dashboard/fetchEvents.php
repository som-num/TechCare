<?php
include '../config.php';
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: ../login.php");
  exit();

}

$user_id = $_SESSION['user_id'];

$sql = "SELECT reservation_id AS id, 
               service_type AS title, 
               CONCAT(date, 'T', start_time) AS start, 
               CONCAT(date, 'T', end_time) AS end, 
               location as description,
               status,
               'false' AS allDay 
        FROM Reservation
       ";

// Use prepare() to create the query
$query = $dbconnection->prepare($sql);

// Bind user_id to the prepared statement
// $query->bind_param("i", $user_id);

// Execute the query
$query->execute();

// Get the result
$result = $query->get_result();


$events = [];
while ($row = $result->fetch_assoc()) {
    $events[] = [
        "id" => $row["id"],
        "title" => $row["title"],
        "description"=>$row["description"],
        "status"=>$row["status"],
        "start" => $row["start"],
        "end" => $row["end"],
        "allDay" => filter_var($row["allDay"], FILTER_VALIDATE_BOOLEAN)
    ];
}

echo json_encode($events);
