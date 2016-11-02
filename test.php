<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>
<?php
// Create connection to Oracle
$conn = OCILogon("ora_c3e0b", "a38106143", "ug");
if (!$conn) {
  echo "error";
}
else {
   print "Connected to Oracle!<br>";
}
// Perform a simple query
$query = "select * from customer";
$stid = oci_parse($conn, $query);
oci_execute($stid);
print '<table border="1">';
while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC)) {
     print '<tr>';
        foreach ($row as $item) {
                 print '<td>'.($item !== null ? htmlentities($item, ENT_QUOTES) : '&nbsp').'</td>';
                    }
        print '</tr>';
}
print '</table>';
// Close connection to Oracle
oci_close($conn);
echo "closed connection\n"
?>
</body>
</html>
