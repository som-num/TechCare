<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: ../login.php");
  exit();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="styles2.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/tippy.js@6"></script>
</head>

<body>
  <script src="./adminCalendar.js"></script>
  <script src="./adminfetchData.js"></script>



  <div class="sidebar">
    <div class="usrInfo">
      <div class="usrIcon">
        <i class="ri-user-line"></i>
      </div>
      <div class="usrName">
        <p>Admin</p>
      </div>

    </div>
    <ul class="sidebar__links">
      <li class="link"><a href="admin.php"><i class="ri-dashboard-line"></i> Dashboard</a></li>
      <!-- <li class="link"><a href="ManageBooking"><i class="ri-bookmark-line"></i> Manage Booking</a></li> -->
      <li class="link"><a href="logout.php?logout=true"><i class="ri-logout-box-line"></i> LogOut</a></li>
    </ul>

  </div>
  <div class="content">
    <div class="content-header">
      <h2>Admin Dashboard</h2>
      <!-- <a href="#add" class="btn">Add New</a> -->
      <a href="logout.php?logout=true"><button class="btn btn-primary"><i class="ri-logout-box-line"></i></button> </a>

    </div>
    <div class="metricsCard">

      <div class="card" id="pending">
        <h1><i class="ri-time-line"></i></h1>
        <h3>Pending</h3>
        <p>Loading...</p>
      </div>

      <div class="card" id="accepted">
        <h1><i class="ri-checkbox-circle-fill"></i></h1>
        <h3>Accepted </h3>
        <p>Loading...</p>
      </div>
      <div class="card" id="denied">
        <h1><i class="ri-close-circle-fill"></i></h1>
        <h3>Denied</h3>
        <p>Loading...</p>
      </div>

      <div class="card" id="completed">
        <h1><i class=" ri-check-double-fill"></i>
        </h1>
        <h3>Completed</h3>
        <p>Loading...</p>
      </div>


    </div>
    <div class="calendar-container">
      <div id="calendar" class="calendar-header"></div>
      <div id="listCalendar" class="calendar-header"></div>

    </div>

  </div>
  <div class="modal-backdrop" id="modalBackdrop"></div>
  <div id="eventModal" class="modal">
    <div class="modal-header">
      <h5 class="modal-title">Booking Details</h5>
      <button class="close" onclick="closeModal()">&times;</button>
    </div>
    <div class="modal-body">
    <p><strong>Name:</strong> <span id="modalUserName"></span></p>
      <p><strong>Event Name:</strong> <span id="modalEventName"></span></p>
      <p><strong>Date:</strong> <span id="modalEventDate"></span></p>
      <p><strong>Start Time:</strong> <span id="modalStartTime"></span></p>
      <p><strong>End Time:</strong> <span id="modalEndTime"></span></p>
      <p><strong>Location:</strong> <span id="modalLocation"></span></p>

      <label for="eventStatus">Change Status:</label>
      <select id="eventStatus">
        <option value="pending">Pending</option>
        <option value="accepted">Accept</option>
        <option value="completed">Completed</option>
        <option value="denied">Deny</option>

      </select>
      <br><br>
      <div class="modal-footer">
        <button class="btn btn-danger" id="btn-danger" onclick="deleteEvent()">Delete Event</button>
        <button class="btn btn-primary" onclick="updateEventStatus()">Save Event</button>
      </div>
    </div>
  </div>


</body>

</html>





<!-- 
 need logic for no overlapping of schedule
 need all button functionality testimonials 
   -->