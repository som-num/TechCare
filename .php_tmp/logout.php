<?php
// Check if the logout parameter exists in the query string
if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
    // Perform logout actions here, like clearing session or cookies
    session_start();
    session_unset();
    session_destroy();

    // Redirect to login or another page after logout
    header("Location: ../login.php");
    exit();
}
?>
