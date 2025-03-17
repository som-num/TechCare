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
  <title>User Dashboard</title>
  <link rel="stylesheet" href="styles2.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/tippy.js@6"></script>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

</head>

<body>
  <script src="./calendar.js"></script>

  <script>
    // Fetch user information
    document.addEventListener('DOMContentLoaded', () => {
      fetch('fetchName.php')
        .then(response => response.json())
        .then(data => {
          if (data.error) {
            console.error(data.error);
            document.querySelector('.usrName p').textContent = "Guest";
          } else {
            document.querySelector('.usrName p').textContent = data.full_name;
          }
        })
        .catch(error => console.error('Error fetching user info:', error));
    });
  </script>

  <div class="sidebar">
    <div class="usrInfo">
      <div class="usrIcon">
        <i class="ri-user-line"></i>
      </div>
      <div class="usrName">
        <p>Loading...</p>
      </div>

    </div>
    <ul class="sidebar__links">
      <li class="link"><a href="user_dashboard.php"><i class="ri-dashboard-line"></i> Dashboard</a></li>
      <!-- <li class="link"><a href="user_booking.php"><i class="ri-bookmark-line"></i> My Booking</a></li> -->
      <li class="link"><a href="logout.php?logout=true"><i class="ri-logout-box-line"></i> LogOut</a></li>
    </ul>

  </div>
  <div class="content">
    <div class="content-header">
      <h2>User Dashboard</h2>
      <a href="logout.php?logout=true"><button class="btn btn-primary"><i class="ri-logout-box-line"></i></button> </a>
    </div>

    <div class="calendar-container">
      <div id="calendar" class="calendar-header"></div>
      <div id="listCalendar" class="calendar-header"></div>

    </div>

  

  </div>

  <div class="modal-backdrop" id="modalBackdrop"></div>

<!-- Modal -->
<div class="modal" id="eventEntryModal">
  <div class="modal-header">
    <h5 class="modal-title">Add New Event</h5>
    <button class="close" onclick="closeModal()">&times;</button>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <label for="event_name">Event name</label>
      <!-- <input type="text" id="event_name" placeholder="Enter your event name"> -->
      <select name="event_name" id="event_name">
        <option value="CCTV">CCTV INSTALLATION</option>
        <option value="SOLAR">SOLAR INSTALLATION</option>
        <option value="COMPUTER">COMPUTER REPAIR</option>
      </select>
    </div>
    <div class="form-group">
      <label for="event_start_time">Start Time</label>
      <input type="time" id="event_start_time" placeholder="Event start Time">
    </div>
    <div class="form-group">
      <label for="event_end_time">End Time</label>
      <input type="time" id="event_end_time" placeholder="Event end Time">
    </div>
    <div class="form-group">
      <label for="event_date">Event Date</label>
      <input type="date" id="event_date" placeholder="Event  date">
    </div>
    <div class="form-group">
      <label for="location">Location/Address</label>
      <input type="text" id="location" placeholder="Input Location">
    </div>
  </div>
  <div class="modal-footer">
    <button class="btn btn-primary" onclick="saveData()">Save Event</button>
  </div>
</div>

</body>

</html>
