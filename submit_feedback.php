<?php include('db_connect.php'); session_start();
if(!isset($_SESSION['student_id'])){ header("Location: student_login.php"); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Submit Feedback</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header><h1 class="navbar">Submit Feedback</h1></header>
<main class="container center-box">
<div class="card fade-in">
<?php
if(isset($_POST['submit'])){
  $sid=$_SESSION['student_id'];
  $subject=$_POST['subject'];
  $message=$_POST['message'];
  $rating=$_POST['rating'];
  mysqli_query($conn,"INSERT INTO feedback(user_id,subject,message,rating)
                      VALUES('$sid','$subject','$message','$rating')");
  echo "<p style='color:green;text-align:center;'>Feedback sent!</p>";
}
?>
<form method="post">
  <label>Subject</label><input type="text" name="subject" required>
  <label>Feedback</label><textarea name="message" required></textarea>
  <label>Rating (1–5)</label><input type="number" name="rating" min="1" max="5" required>
  <button name="submit">Submit</button>
</form>
<p><a href="view_feedback.php">View My Feedback</a></p>
</main>
</body>
</html>
