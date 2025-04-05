<?php
session_start();
$uid = $_SESSION['uid'];
$con = mysqli_connect("localhost", "root", "root", "addressbook");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$userid = $_POST["t1"];
$name = $_POST["t2"];
$phno = $_POST["t3"];
$email = $_POST["t4"];
$padd = $_POST["t5"];
$tadd = $_POST["t6"];

$sql1 = "SELECT * FROM person WHERE id = $uid";
$result = mysqli_query($con, $sql1);

$updateMessage = "";

if (mysqli_num_rows($result) == 1) {
    $sql = "UPDATE person SET id='$userid', name='$name', phno='$phno', email='$email', padd='$padd', tadd='$tadd' WHERE id=$uid";
    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    } else {
        $updateMessage = "✅ Record Updated Successfully!";
    }
} else {
    $updateMessage = "❌ Record not present!";
}

mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Result</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f9;
            margin: 0;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .message {
            font-size: 20px;
            padding: 20px 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            color: #2e7d32;
        }

        .error {
            color: #c62828;
        }

        form {
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        input[type="submit"] {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="message <?= (str_contains($updateMessage, '❌') ? 'error' : '') ?>">
        <?= $updateMessage ?>
    </div>

    <form name="f1" action="addressbook.php" method="post">
        <input type="submit" name="display" value="OK" />
    </form>

</body>
</html>
