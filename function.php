<?php
include "config.php";

// admin: admin@gmail.com
// admin123
// user: user@gmail.com
// user123 
// carlton@gmail.com
// 123

if (isset($_POST['signup-btn'])) {

    $user_id = null;
    $full_name = $_POST['full-name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO Users (full_name,email,password,role) VALUES (?, ?, ?, 'user')";
    $query = $dbconnection->prepare($sql);
    $query->bind_param('sss', $full_name, $email, $hashed_password);

    if ($query->execute()) {
        header("Location: login.php");
    } else {
        echo "Error: " . $query->error;
    }

    $query->close();
    $dbconnection->close();
} 


else if (isset($_POST["signin-btn"])) {
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT user_id, password, role FROM Users WHERE email=?";
    $qry = $dbconnection->prepare($sql);
    $qry->bind_param("s", $email);
    $qry->execute();

    $qry->store_result();
    $qry->bind_result($user_id, $stored_password, $role);


    if ($qry->num_rows == 1) {
        $qry->fetch();
        if (password_verify($password, $stored_password)) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['role'] = $role;
            echo 'yawa';
            if($role ==='admin') {
            header('Location: /booking_dashboard/admin.php');
            } else {
                header('Location: /booking_dashboard/user_dashboard.php');

            }
            exit();
        } else {
            echo "Email: $email<br>";  // Debug the email input
            echo "Password: $password<br>";
            echo "Invalid email or password. Please try again.";
        }
    } else {
        // echo "pisting yawa";
        echo "No user found with this email";
    }
    $qry->close();
    $dbconnection->close();
}

?>