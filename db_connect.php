<?php
$servername = "localhost";
$username   = "root";
$password   = "root";
$database   = "feedback_portal_db"; // new database name

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("❌ Connection failed: " . mysqli_connect_error());
}
?>
