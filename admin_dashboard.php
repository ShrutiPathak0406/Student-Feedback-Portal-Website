<?php include('db_connect.php'); session_start();
if(!isset($_SESSION['admin_id'])){ header("Location: admin_login.php"); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Admin Dashboard</title><link rel="stylesheet" href="style.css"></head>
<body>
<header><h1>All Feedback (Admin View)</h1></header>
<main>
<table>
<tr><th>Student Name</th><th>Subject</th><th>Message</th><th>Rating</th></tr>
<?php
$res=mysqli_query($conn,"SELECT f.*,u.name FROM feedback f JOIN users u ON f.user_id=u.id");
while($r=mysqli_fetch_assoc($res)){
  echo "<tr><td>{$r['name']}</td><td>{$r['subject']}</td><td>{$r['message']}</td><td>{$r['rating']}</td></tr>";
}
?>
</table>
</main>
</body>
</html>
