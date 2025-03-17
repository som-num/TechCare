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
</head>

<body>

    <div class="sidebar">
        <div class="usrInfo">
            <div class="usrIcon">
            <i class="ri-user-line"></i>
            </div>
            <div class="usrName">
            <p>hatdog</p>
            </div>
            
        </div>
        <ul class="sidebar__links">
    <li class="link"><a href="Dashboard"><i class="ri-dashboard-line"></i> Dashboard</a></li>
    <li class="link"><a href="ManageBooking"><i class="ri-bookmark-line"></i> Manage Booking</a></li>
    <li class="link"><a href="Customers"><i class="ri-group-line"></i> Customers</a></li>
    <li class="link"><a href="logout.php?logout=true"><i class="ri-logout-box-line"></i> LogOut</a></li>
</ul>

    </div>
    <div class="content">
    <div class="content-header">
      <h2>Dashboard</h2>
      <a href="#add" class="btn">Add New</a>
    </div>
    <div class="metricsCard">

    <div class="card">
      <h3>Card Title</h3>
      <p>Some quick example text to build on the card title and make up the bulk of the content.</p>
    </div>

    <div class="card">
      <h3>Another Card</h3>
      <p>This is another example of a card layout in this admin template.</p>
    </div>
    <div class="card">
      <h3>Card Title</h3>
      <p>Some quick example text to build on the card title and make up the bulk of the content.</p>
    </div>

    <div class="card">
      <h3>Another Card</h3>
      <p>This is another example of a card layout in this admin template.</p>
    </div>
    </div>
   
  </div>

</body>

</html>