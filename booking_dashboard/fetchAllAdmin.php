<?php
include '../config.php';
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: ../login.php");
  exit();

}

$user_id = $_SESSION['user_id'];

$sql = "SELECT 
            r.reservation_id AS id,
            r.service_type AS title,
            CONCAT(r.date, 'T', r.start_time) AS start,
            CONCAT(r.date, 'T', r.end_time) AS end,
            r.location AS description,
            r.status,
            u.full_name AS user_name,
            'false' AS allDay 
        FROM Reservation r
        INNER JOIN Users u ON r.user_id = u.user_id
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
        "userName"=>$row["user_name"],
        "start" => $row["start"],
        "end" => $row["end"],
        "allDay" => filter_var($row["allDay"], FILTER_VALIDATE_BOOLEAN)
     ];
}

echo json_encode($events);
