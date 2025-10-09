<?php include('db_connect.php'); session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header><h1 class="navbar">Student Login</h1></header>
<main class="container center-box">
<div class="card fade-in">
  
<?php
if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $result = mysqli_query($conn,"SELECT * FROM users WHERE email='$email' AND role='student'");
  $user = mysqli_fetch_assoc($result);
  if($user && password_verify($password,$user['password'])){
    $_SESSION['student_id']=$user['id'];
    $_SESSION['student_name']=$user['name'];
    header("Location: submit_feedback.php"); exit;
  } else {
    echo "<p style='color:red;text-align:center;'>Invalid login!</p>";
  }
}
?>
<form method="post">
  <label>Email</label><input type="email" name="email" required>
  <label>Password</label><input type="password" name="password" required>
  <button name="login">Login</button>
</form>
</main>
</body>
</html>
