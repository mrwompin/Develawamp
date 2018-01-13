<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css" \>
</head>
<?php
require('db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$Registration_Error = [];
	$error = 0;

	$email = stripslashes($_REQUEST['email']);
	if (!$email) {
		$Registration_Error[] .= "Email is a Required Field";
		$error = 1;
	} elseif (!preg_match('/^[a-zA-Z].*@[a-zA-Z]*\.(com|net|org)/',$email)) {
		$Registration_Error[] = "invallid email address";
		$error = 1;
	}	else {
		$email = mysqli_real_escape_string($con,$email);
	}

	$fname = stripslashes($_REQUEST['fname']);
	if (!$fname) {
		$Registration_Error[] = "First Name is a Required Field";
		$error = 1;
	}	else {
		$fname = mysqli_real_escape_string($con,$fname);
	}

	$lname = stripslashes($_REQUEST['lname']);
	if (!$lname) {
		$Registration_Error[] = "Last Name is a Required Field";
		$error = 1;
	}	else {
		$lname = mysqli_real_escape_string($con,$lname);
	}

	$address = stripslashes($_REQUEST['address']);
	if (!$address) {
		$Registration_Error[] = "Address is a Required Field";
		$error = 1;
	}	else {
		$address = mysqli_real_escape_string($con,$address);
	}

	$city = stripslashes($_REQUEST['city']);
	if (!$city) {
		$Registration_Error[] = "city is a Required Field";
		$error = 1;
	}	else {
		$city = mysqli_real_escape_string($con,$city);
	}


	$state = stripslashes($_REQUEST['state']);
	if (!$state) {
		$Registration_Error[] = "State is a Required Field";
		$error = 1;
	}	else {
		$state = mysqli_real_escape_string($con,$state);
	}

	$zip = stripslashes($_REQUEST['zip']);
	if (!$zip) {
		$Registration_Error[] = "zip is a Required Field";
		$error = 1;
	} elseif (strlen($zip) <> 5) {
		$Registration_Error[] = "Invalid Zip";
		$error = 1;
	}	else {
		$zip = mysqli_real_escape_string($con,$zip);
	}

	$phone = stripslashes($_REQUEST['phone']);
	if (!$phone) {
		$Registration_Error[] = "phone is a Required Field";
		$error = 1;
	} elseif (strlen($phone) <> 10) {
		$Registration_Error[] = "Invalid phone number";
		$error = 1;
	}	else {
		$phone = mysqli_real_escape_string($con,$phone);
	}

	if (isset($_POST['btnEdit'])) {
		$username = $_GET['user'];

		$stmt = $con->prepare("UPDATE tblUsers SET email=?, firstName=?,lastName=?, address=?, city=?, state=?, zip=?,phone=? WHERE userName = '" . $username . "'");
		$stmt->bind_param("ssssssss", $email,$fname,$lname, $address, $city, $state, $zip,$phone);
		$stmt->execute();
		header("Location:admin_view.php");
	}

	if (isset($_POST['btnDelete'])) {
		$username = $_GET['user'];

		$stmt = $con->prepare("DELETE FROM tblUsers WHERE userName = '" . $username . "'");
		$stmt->execute();
		header("Location:admin_view.php");
	}

} else
	if (isset($_GET['user'])) {
		$username = mysqli_real_escape_string($con, $_GET['user']);
		$query = "select * from tblUsers where userName='" . $username . "'";
		$result = mysqli_query($con, $query);
		if (mysqli_num_rows($result) > 0) {
			while ($row=mysqli_fetch_assoc($result)) {
				echo "<h2 name='user'>" . $row['username'] . "</h2>\n";
				echo "<form name='edit' action='edit_users.php?user=" . $username . "' method='Post'>\n";
				echo "<input type='text' name='fname' value='" . $row['firstName'] . "' required />\n";
				echo "<input type='text' name='lname' value='" . $row['lastName'] . "' required />\n";
				echo "<input type='email' name='email' value='" . $row['email'] . "' required />\n";
				echo "<input type='number' name='phone' value='" . $row['phone'] . "' required />\n";
				echo "<input type='text' name='address' value='" . $row['address'] . "' required />\n";
				echo "<input type='text' name='city' value='" . $row['city'] . "' required />\n";
				echo "<input type='text' name='state' value='" . $row['state'] . "' maxlength='2' required />\n";
				echo "<input type='number' name='zip' value='" . $row['zip'] . "' required />\n";
				echo "<input type='submit' name='btnEdit' value='Edit' />\n";
				echo "<input type='submit' name='btnDelete' value='Delete' />\n";
				echo "</form>\n";
				echo "<p><a href='admin_view.php'>back</a></p>\n";
			}
		}
	} 
?>
</table>
</body>
</html>
