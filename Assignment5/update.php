<?php
$uid = $_POST['uid'];
session_start();
$_SESSION['uid'] = $uid;
$con = mysqli_connect("localhost", "root", "root", "addressbook");

if (mysqli_connect_errno()) {
  echo "Failed to connect to mysqli: " . mysqli_connect_error();
}

$sql1 = "SELECT * FROM person WHERE id = $uid";
$result = mysqli_query($con, $sql1);
$recordFound = mysqli_num_rows($result) > 0;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Update Record</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f0f4f8;
      margin: 0;
      padding: 40px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    h1 {
      color: #333;
      margin-bottom: 20px;
    }

    .message {
      color: #c62828;
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    form {
      background-color: #ffffff;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      width: 100%;
      max-width: 500px;
    }

    table {
      width: 100%;
    }

    td {
      padding: 10px 0;
    }

    input[type="text"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 14px;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      margin-top: 10px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 15px;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

  <?php if (!$recordFound): ?>
    <div class="message">Record not present</div>
  <?php endif; ?>

  <form name="f1" action="addressbook.php" method="post">
    <input type="submit" name="back" value="Back" />
  </form>

  <?php if ($recordFound): ?>
  <h1>Update Address Book</h1>
  <form name="f1" action="save.php" method="post">
    <table>
      <tr><td>UserId:</td><td><input type="text" name="t1" value=""/></td></tr>
      <tr><td>Name:</td><td><input type="text" name="t2" value=""/></td></tr>
      <tr><td>PhoneNo:</td><td><input type="text" name="t3" value=""/></td></tr>
      <tr><td>Email:</td><td><input type="text" name="t4" value=""/></td></tr>
      <tr><td>Permanent Address:</td><td><input type="text" name="t5" value=""/></td></tr>
      <tr><td>Temporary Address:</td><td><input type="text" name="t6" value=""/></td></tr>
    </table>
    <input type="submit" name="but1" value="Save" />
  </form>
  <?php endif; ?>

</body>
</html>
