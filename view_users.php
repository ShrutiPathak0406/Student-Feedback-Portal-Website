<?php
include('db_connect.php');

// Fetch all users from the database
$sql = "SELECT id, name, email, role FROM users";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View All Users</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background: #f1f5fb;
      font-family: 'Segoe UI', Tahoma, sans-serif;
    }
    h1 {
      text-align: center;
      color: #0056b3;
      margin-top: 30px;
    }
    table {
      width: 80%;
      margin: 30px auto;
      border-collapse: collapse;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
    }
    th {
      background-color: #0056b3;
      color: white;
      text-align: left;
      padding: 10px;
    }
    td {
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }
    tr:hover {
      background-color: #f5faff;
    }
    footer {
      text-align: center;
      background: #0056b3;
      color: white;
      padding: 15px;
      margin-top: 40px;
      border-top: 3px solid #004080;
    }
  </style>
</head>
<body>

<h1>Registered Users</h1>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
  </tr>

  <?php
  if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['role']}</td>
                </tr>";
      }
  } else {
      echo "<tr><td colspan='4' style='text-align:center;'>No users found</td></tr>";
  }
  ?>
</table>

<footer>
  <p>© 2025 Student Feedback Portal | Designed by Shruti Pathak</p>
</footer>

</body>
</html>
