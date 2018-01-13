<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" \>
</head>
<h3>Users</h3>
<table>
<tr>
	<th>Username</th>
	<th>First</th>
	<th>Last</th>
	<th>Email</th>
	<th>Telephone</th>
	<th>Address</th>
	<th>City</th>
	<th>State</th>
	<th>Zip</th>
</tr>
<?php
require('db.php');

$query = "select * from tblUsers order by lastName";
$result = mysqli_query($con, $query);

echo "<p><a href='index.php'>back</a></p>\n";
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		echo "<tr>\n";
		echo "<td>" . $row['username'] . "</td>\n";
		echo "<td>" . $row['firstName'] . "</td>\n";
		echo "<td>" . $row['lastName'] . "</td>\n";
		echo "<td>" . $row['email'] . "</td>\n";
		echo "<td>" . $row['phone'] . "</td>\n";
		echo "<td>" . $row['address'] . "</td>\n";
		echo "<td>" . $row['city'] . "</td>\n";
		echo "<td>" . $row['state'] . "</td>\n";
		echo "<td>" . $row['zip'] . "</td>\n";
		echo "<td><a href='edit_users.php?user=" . $row['username'] . "'>edit</a></td>\n";
		echo "</tr>\n";
	}
	mysqli_close($con);
}
?>
</table>
</body>
</html>
