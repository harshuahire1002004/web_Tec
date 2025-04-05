<!DOCTYPE html>
<html>
<head>
  <title>Address Book</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #e9eff1;
      padding: 40px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    form {
      background-color: #ffffff;
      padding: 35px 45px;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 600px;
    }

    h1 {
      text-align: center;
      color: #2d3e50;
      margin-bottom: 25px;
    }

    table {
      width: 100%;
      margin-bottom: 20px;
    }

    td {
      padding: 12px 8px;
      vertical-align: middle;
      color: #333;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccd6dd;
      border-radius: 6px;
      font-size: 15px;
      background-color: #f9fbfc;
    }

    .button-group {
      text-align: center;
    }

    .btn {
      border: none;
      padding: 10px 20px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 15px;
      margin: 6px;
      color: #fff;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }

    .btn-add {
      background-color: #4caf50;
    }
    .btn-add:hover {
      background-color: #3e8e41;
    }

    .btn-update {
      background-color: #5c6bc0;
    }
    .btn-update:hover {
      background-color: #3f51b5;
    }

    .btn-delete {
      background-color: #ef5350;
    }
    .btn-delete:hover {
      background-color: #d32f2f;
    }

    .btn-display {
      background-color: #26c6da;
    }
    .btn-display:hover {
      background-color: #00acc1;
    }
  </style>
</head>
<body>

  <form name="f1" action="" method="post">
    <h1>Address Book</h1>
    <table>
      <tr><td>UserId:</td><td><input type="text" name="t1" value=""/></td></tr>
      <tr><td>Name:</td><td><input type="text" name="t2" value=""/></td></tr>
      <tr><td>PhoneNo:</td><td><input type="text" name="t3" value=""/></td></tr>
      <tr><td>Email:</td><td><input type="text" name="t4" value=""/></td></tr>
      <tr><td>Permanent Address:</td><td><input type="text" name="t5" value=""/></td></tr>
      <tr><td>Temporary Address:</td><td><input type="text" name="t6" value=""/></td></tr>
    </table>
    <div class="button-group">
      <input type="submit" name="but1" value="ADD" class="btn btn-add"/>
      <input type="submit" name="but2" value="UPDATE" class="btn btn-update"/>
      <input type="submit" name="but3" value="DELETE" class="btn btn-delete"/>
      <input type="submit" name="but4" value="DISPLAY" class="btn btn-display"/>
    </div>
  </form>

<?php
if(isset($_POST['but1'])) {
  $con = mysqli_connect("localhost", "root", "root", "addressbook");
  if (mysqli_connect_errno()) {
    echo "Failed to connect to mysqli: " . mysqli_connect_error();
  }
  $userid = $_POST["t1"];
  $name = $_POST["t2"];
  $phno = $_POST["t3"];
  $email = $_POST["t4"];
  $padd = $_POST["t5"];
  $tadd = $_POST["t6"];
  $sql = "INSERT INTO person (id, name, phno, email, padd, tadd)
          VALUES ('$userid', '$name', '$phno', '$email', '$padd', '$tadd')";
  if (!mysqli_query($con, $sql)) {
    die('Error: ' . mysqli_error($con));
  }
  echo "<p style='text-align:center; color: green; font-weight: bold;'>✔ 1 record added successfully</p>";
}
else if(isset($_POST['but4'])) {
  header('Location: display.php');
}
else if(isset($_POST['but3'])) {
  header('Location: delete.html');
}
else if(isset($_POST['but2'])) {
  header('Location: update.html');
}
?>
</body>
</html>
