<html>
<body>
<?php
$uid=$_POST['uid'];
session_start();
$_SESSION['uid']=$_POST['uid'];
$con=mysqli_connect("localhost","Abhi","Abhi@2004","addressbook");
if (mysqli_connect_errno()) {
  echo "Failed to connect to mysqli: " . mysqli_connect_error();
}
$sql1="select * from person where id=$uid";
$result = mysqli_query($con,$sql1);
    if(mysqli_num_rows($result) == 0) 
    {
	echo "Record not present";
	
	}
?>
<form name="f1" action="addressbook.php" method="post"/>
<input type="submit" name="back" value="Back"/>
</form>
<h1>Address Book</h1>
<form name="f1" action="save.php" method="post">
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
<input type="submit" name="but1" value="Save"/>
</form>

</body>
</html>