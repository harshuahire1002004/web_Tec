<?php
session_start();
$uid=$_SESSION['uid'];
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
$sql1="select * from person where id=$uid";
$result = mysqli_query($con,$sql1);
if(mysqli_num_rows($result) == 1)
{
$sql="UPDATE person SET
id='$userid',name='$name',phno='$phno',email='$email',padd='$padd',tadd='$tadd' WHERE id=$uid";
if (!mysqli_query($con,$sql)) {
die('Error: ' . mysqli_error($con));
}
else{
echo "Record Updated Successfully";
}
}
else{
echo "Record not present";
}
mysqli_close($con);
?>
<html>
<body>
<form name="f1" action="addressbook.php" method="post">
<input type="submit" name="display" value="OK"/>
</form>
</body>
</html>