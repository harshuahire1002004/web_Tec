<?php
$hostname = "localhost";
$username = "root";
$password = "root";
$database = "addressbook";


$dbhandle = mysqli_connect($hostname, $username, $password, $database);


if (!$dbhandle) {
    die("Unable to connect to MySQL: " . mysqli_connect_error());
}


$result = mysqli_query($dbhandle, "SELECT id, name, phno, email, padd, tadd FROM person");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Address Book Display</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #ecf0f3;
      padding: 40px;
    }

    h1 {
      text-align: center;
      color: #2c3e50;
      margin-bottom: 30px;
    }

    table {
      width: 90%;
      margin: auto;
      border-collapse: collapse;
      background-color: #ffffff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    th, td {
      padding: 14px;
      text-align: center;
      border-bottom: 1px solid #dee2e6;
    }

    th {
      background-color: #6c7ae0;
      color: white;
      font-weight: 600;
    }

    tr:nth-child(even) {
      background-color: #f2f5f7;
    }

    tr:hover {
      background-color: #e4ecf1;
    }

    .back-btn {
      display: block;
      width: 140px;
      margin: 30px auto 0;
      padding: 12px;
      text-align: center;
      background-color: #6c7ae0;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 500;
      transition: background-color 0.3s ease;
    }

    .back-btn:hover {
      background-color: #5864c4;
    }
  </style>
</head>
<body>

<h1>Address Book Information</h1>

<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Phone No</th>
    <th>Email</th>
    <th>Permanent Address</th>
    <th>Temporary Address</th>
  </tr>

  <?php
  while ($row = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>".$row['id']."</td>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['phno']."</td>";
      echo "<td>".$row['email']."</td>";
      echo "<td>".$row['padd']."</td>";
      echo "<td>".$row['tadd']."</td>";
      echo "</tr>";
  }

  
  mysqli_close($dbhandle);
  ?>
</table>


<a href="addressbook.php" class="back-btn">← Back to Form</a>

</body>
</html>
