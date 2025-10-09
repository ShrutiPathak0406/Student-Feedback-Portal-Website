<?php
include('db_connect.php');

// Define admin details
$name = "Admin";
$email = "admin@gmail.com";
$password_plain = "Admin@123";
$role = "admin";

// Hash password using PHP's native password_hash
$hashed_password = password_hash($password_plain, PASSWORD_DEFAULT);

// Delete old admin if exists
mysqli_query($conn, "DELETE FROM users WHERE role='admin'");

// Insert new admin
$sql = "INSERT INTO users (name, email, password, role)
        VALUES ('$name', '$email', '$hashed_password', '$role')";

if (mysqli_query($conn, $sql)) {
    echo "✅ Admin created successfully!<br>";
    echo "Email: $email<br>Password: $password_plain<br>";
} else {
    echo "❌ Error: " . mysqli_error($conn);
}
?>
