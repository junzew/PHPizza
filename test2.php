<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content='text/html' charset=utf8_bin>
<head>
	<title></title>
</head>
<body>
<?php
echo "<br>Results:<br>";
$dbc = mysqli_connect('localhost',"root", "","phpizza") or die('Error connect');
$query = "SELECT * FROM customer";
$result = mysqli_query($dbc, $query) or die('Error querying database.');
while($row = mysqli_fetch_array($result)) {
	echo $row['phone'].' , ',$row['address'].' , '.$row['first_name'].' , '.$row['last_name'].'<br>';
}
mysqli_close($dbc);
?>
</body>
</html>
