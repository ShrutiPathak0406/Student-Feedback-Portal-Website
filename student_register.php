<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Register</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header><h1 class="navbar">Student Registration</h1></header>
<main class="container center-box">
<div class="card fade-in">
<?php
if(isset($_POST['register'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  if(mysqli_num_rows($check)>0){
    echo "<p style='color:red;text-align:center;'>Email already exists!</p>";
  }else{
    mysqli_query($conn, "INSERT INTO users(name,email,password,role) VALUES('$name','$email','$password','student')");
    echo "<p style='color:green;text-align:center;'>Registered successfully! <a href='student_login.php'>Login</a></p>";
  }
}
?>
<form method="post">
  <label>Name</label><input type="text" name="name" required>
  <label>Email</label><input type="email" name="email" required>
  <label>Password</label><input type="password" name="password" required>
  <button name="register">Register</button>
</form>
</main>
</body>
</html>
