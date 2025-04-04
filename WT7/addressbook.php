<html>
<body>
<h1>Address Book</h1>
<form name="f1" action="" method="post">
<table >
<tr><td>UserId:</td>
<td><input type="text" name="t1" value=""/></td></tr>
<tr><td>Name:</td>
<td><input type="text" name="t2" value=""/></td></tr>
<tr><td>PhoneNo:</td>
<td><input type="text" name="t3" value=""/></td></tr>
<tr><td>Email:</td>
<td><input type="text" name="t4" value=""/></td></tr>
<tr><td>Permanent Address:</td>
<td><input type="text" name="t5" value=""/></td></tr>
<tr><td>Temporary Address:</td>
<td><input type="text" name="t6" value=""/></td></tr>
</table>
<input type="submit" name="but1" value="ADD"/>
<input type="submit" name="but2" value="UPDATE"/>
<input type="submit" name="but3" value="DELETE"/>
<input type="submit" name="but4" value="DISPLAY"/>
</form>
<?php
if(isset($_POST['but1']))
{
$con=mysqli_connect("localhost","Abhi","Abhi@2004","addressbook");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to mysqli: " . mysqli_connect_error();
}
$userid = $_POST["t1"];
$name = $_POST["t2"];
$phno = $_POST["t3"];
$email = $_POST["t4"];
$padd = $_POST["t5"];
$tadd = $_POST["t6"];
$sql="INSERT INTO person (id, name, phno, email, padd, tadd)
VALUES ('$userid', '$name', '$phno', '$email', '$padd', '$tadd')";
if (!mysqli_query($con,$sql)) {
die('Error: ' . mysqli_error($con));
}
echo "1 record added successfully";
//mysqli_close($con);
}
else if(isset($_POST['but4']))
{
header('Location: display.php');
}
else if(isset($_POST['but3']))
{
header('Location: delete.html');
}
else if(isset($_POST['but2']))
{
header('Location: update.html');;
}
?>
</body>
</html>