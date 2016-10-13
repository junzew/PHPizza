<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>
<?php 
// Create connection to Oracle
$conn = oci_connect("ora_c3e0b", "a38106143", "ug");
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
}
else {
   print "Connected to Oracle!";
}

$query = "select * from customer";
$stid = oci_parse($conn, $query);
oci_execute($stid);
echo "<table border='1'>\n";
while($row = oci_fetch_array($stid), OCI_RETURN_NULLS+OCI_ASSOC) {
	echo "<tr>\n";
	foreach ($row as $item) {
		echo " <td>".$item."<./td>\n";
	}
	echo "</tr>\n";
}
echo "</table>\n";


// Close the Oracle connection
oci_close($conn);
?>
</body>
</html>