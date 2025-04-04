<?php
$con=mysqli_connect("localhost","Abhi","Abhi@2004","addressbook");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to mysqli: " . mysqli_connect_error();
}
//execute the SQL query and return records
$userid=$_POST['uid'];
$sql1="select * from person where id=$userid";
$result = mysqli_query($con,$sql1);
if(mysqli_num_rows($result) == 1) // User not found. So, redirect to login_form again.
{
    $sql="DELETE FROM person WHERE id=$userid";
if (!mysqli_query($con,$sql)) {
die('Error: ' . mysqli_error($con));
}
else{
echo "Record Deleted Successfully";
}
}
else{
echo "Record not present";
}
mysqli_close($con);
?>
<html>
<body>
<form name="f1" action="addressbook.php" method="post"/>
<input type="submit" name="back" value="Back"/>
</form>
</body>
</html>