<?php
include '../config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// SQL query to count the events by status
$sql = "
    SELECT 
        status,
        COUNT(*) as count
    FROM Reservation
    GROUP BY status
";

// Prepare the query
$query = $dbconnection->prepare($sql);
// $query->bind_param("i", $user_id); // Bind the user_id
$query->execute();

// Get the result
$result = $query->get_result();

// Prepare an array to store the counts for each status
$statusCounts = [
    'pending' => 0,
    'accepted' => 0,
    'denied' => 0,
    'completed' => 0
];

// Loop through the results and store the counts
while ($row = $result->fetch_assoc()) {
    $status = strtolower($row['status']); // Convert status to lowercase
    if (isset($statusCounts[$status])) {
        $statusCounts[$status] = $row['count'];
    }
}

// Return the counts as JSON
echo json_encode($statusCounts);
?>
