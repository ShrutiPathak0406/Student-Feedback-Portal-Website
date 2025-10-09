<?php include('db_connect.php'); session_start();
if(!isset($_SESSION['student_id'])){ header("Location: student_login.php"); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>My Feedback</title><link rel="stylesheet" href="style.css"></head>
<body>
<header><h1>My Feedback</h1></header>
<main>
<table>
<tr><th>Subject</th><th>Message</th><th>Rating</th></tr>
<?php
$sid=$_SESSION['student_id'];
$res=mysqli_query($conn,"SELECT * FROM feedback WHERE user_id='$sid'");
while($r=mysqli_fetch_assoc($res)){
  echo "<tr><td>{$r['subject']}</td><td>{$r['message']}</td><td>{$r['rating']}</td></tr>";
}
?>
</table>
</main>
</body>
</html>
