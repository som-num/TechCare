<?php 
define("HOST","127.0.0.1");
define("USER","root");
define("PW","");
define("DB","booking_db");

$dbconnection = new mysqli(HOST, USER, PW, DB );

if ($dbconnection->connect_error) {
    die("Connection Failed:". $dbconnection->connect_error);
}
?>