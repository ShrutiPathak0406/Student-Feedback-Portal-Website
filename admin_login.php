<?php include('db_connect.php'); session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header class="navbar"><h1>Admin Login</h1></header>
<main class="container center-box">
<div class="card fade-in">
<?php
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE email='$email' AND role='admin'";
  $result = mysqli_query($conn, $sql);
  $admin = mysqli_fetch_assoc($result);

  if ($admin && password_verify($password, $admin['password'])) {
    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['admin_name'] = $admin['name'];
    header("Location: admin_dashboard.php");
    exit;
  } else {
    echo "<p style='color:red;text-align:center;'>Invalid email or password!</p>";
  }
}
?>
<form method="post">
  <label>Email</label>
  <input type="email" name="email" required>
  <label>Password</label>
  <input type="password" name="password" required>
  <button name="login">Login</button>
</form>
</div>
</main>
</body>
</html>
