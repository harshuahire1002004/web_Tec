<?php
$con = mysqli_connect("localhost", "root", "root", "addressbook");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to mysqli: " . mysqli_connect_error();
}
$userid = $_POST['uid'];
$sql1 = "SELECT * FROM person WHERE id = $userid";
$result = mysqli_query($con, $sql1);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Delete Record</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f4f6f8;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      height: 100vh;
      margin: 0;
    }

    .message-box {
      background-color: #ffffff;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      text-align: center;
      max-width: 400px;
    }

    .message-box h2 {
      color: #333;
      margin-bottom: 15px;
    }

    .success {
      color: #2e7d32;
    }

    .error {
      color: #c62828;
    }

    input[type="submit"] {
      background-color: #1976d2;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      font-weight: bold;
      margin-top: 20px;
      transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #1565c0;
    }
  </style>
</head>
<body>

<div class="message-box">
  <?php
  if (mysqli_num_rows($result) == 1) {
      $sql = "DELETE FROM person WHERE id = $userid";
      if (!mysqli_query($con, $sql)) {
          echo "<h2 class='error'>Error: " . mysqli_error($con) . "</h2>";
      } else {
          echo "<h2 class='success'>Record Deleted Successfully</h2>";
      }
  } else {
      echo "<h2 class='error'>Record not present</h2>";
  }
  mysqli_close($con);
  ?>
  <form name="f1" action="addressbook.php" method="post">
    <input type="submit" name="back" value="Back"/>
  </form>
</div>

</body>
</html>
