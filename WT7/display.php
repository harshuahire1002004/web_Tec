<?php
$hostname = "localhost";
$username = "Abhi";
$password = "Abhi@2004";
$database = "addressbook";

// New MySQLi Connection
$dbhandle = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$dbhandle) {
    die("Unable to connect to MySQL: " . mysqli_connect_error());
}

// Execute the SQL query and return records
$result = mysqli_query($dbhandle, "SELECT id, name, phno, email, padd, tadd FROM person");

// Display data in a table
echo "<h1><center>Address Book Information</center></h1>";
echo "<table border='1' align='center'>";
echo "<tr><th>ID</th><th>Name</th><th>Phone No</th><th>Email</th><th>P ADD</th><th>T ADD</th></tr>";

while ($row = mysqli_fetch_array($result)) { // ✅ Correct function
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['phno']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['padd']."</td>";
    echo "<td>".$row['tadd']."</td>";
    echo "</tr>";
}

echo "</table>";

// Close connection
mysqli_close($dbhandle);
?>

<html>
<body>
<form name="f1" action="addressbook.php" method="post">
    <input type="submit" name="display" value="Back"/>
</form>
</body>
</html>
