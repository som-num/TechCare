<?php
include '../config.php';
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: ../login.php");
  exit();

}

$user_id = $_SESSION['user_id'];



if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $data = file_get_contents("php://input");
  $request = json_decode($data, true);
 
 

  if(isset($request['fetchData']) && $request['fetchData'] === true){
    $sql = "SELECT service_type, date, start_time, end_time, location FROM Reservation WHERE user_id = ?";
    $query = $dbconnection->prepare($sql);
    $query->bind_param("i",$user_id);
    $query->execute();

    $result = $query->get_result();
    $reservations = [];

    while($row = $result->fetch_assoc()){
      $reservations[] = $row;
    }
    echo json_encode($reservations);
    exit();

  }
  else{
    $service_type = $request["title"];
    $date = $request["date"];
    $location = $request["description"];
    $startTime = $request["start"];
    $endTime = $request["end"];
    $status = "pending";

    $sql = "INSERT INTO Reservation (user_id,service_type,date,start_time,end_time,location,status) VALUES (?,?,?,?,?,?,?)";
    $query = $dbconnection->prepare($sql);
    $query->bind_param("issssss",$user_id, $service_type, $date, $startTime, $endTime,$location, $status);

    if($query->execute()){
      echo json_encode(["success" => true, "message"=>"Reservation added successfully!"]);

    }
    else{
      echo json_encode(["success"=> false,"message"=> $query->error]);
    }
    $query->close();
    exit();
  }
}

?>