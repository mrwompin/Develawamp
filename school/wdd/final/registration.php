<!doctype html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<?php
$Registration_Error = []; // holds error messages
$error = 0; // boolean for error handling

require('db.php');
// submit values to database on form submission
if (isset($_REQUEST['username'])) {
	$username = stripslashes($_REQUEST['username']);
	$query = "select * from tblUsers where username='$username'";
	$result = mysqli_query($con, $query) or die(mysqli_error());
	$rows = mysqli_num_rows($result);
	if (!$username) {
		$Registration_Error[] = "Username is a Required Field";
		$error = 1;
	} elseif($rows==1) {
			$Registration_Error[] = "User already exists";
			$error = 1;	
	} elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username)) {
		$Registration_Error[] = "Username must contain letters and numbers only";
		$error = 1;
	} else {
		$username = mysqli_real_escape_string($con,$username);
	}
	
	$password = stripslashes($_REQUEST['password']);
	$password_check = stripslashes($_REQUEST['password_check']);
	if (!$password) {
		$Registration_Error[] = "Password is a Required Field";
		$error = 1;
	} elseif (strlen($password) < 5) {
		$Registration_Error[] = "Password minimum of 5 characters";
		$error = 1;
	}	elseif ($password <> $password_check) {
		$Registration_Error[] = "Passwords do not match";
		$error = 1;
	}	else {
		$password = mysqli_real_escape_string($con,$password);
	}

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


	if ($error <> 1) {
		$stmt = mysqli_prepare($con,'insert into tblUsers (username, firstName, lastName, email, password, address, city, state, zip, phone) values (?,?,?,?,?,?,?,?,?,?);');

		mysqli_stmt_bind_param($stmt, "ssssssssss",$username, $fname,$lname, $email, $password, $address, $city, $state, $zip,$phone);
		mysqli_stmt_execute($stmt);
		header("Location:login.php");
	} else {
		foreach ($Registration_Error as $err) {
			echo $err . "<br>";
		}
		unset($Registration_Error);
	}
} else {
?>

<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
	<input type="text" name="username" placeholder="Username" required />
	<input type="password" name="password" placeholder="Password" required />
	<input type="password" name="password_check" placeholder="Retype Password" required />
	<input type="email" name="email" placeholder="Email" required />
	<input type="text" name="fname" placeholder="First" required />
	<input type="text" name="lname" placeholder="Last" required />
	<input type="text" name="address" placeholder="Address" required />
	<input type="text" name="city" placeholder="City" required />
	<input type="text" name="state" placeholder="State" maxlength="2" required />
	<input type="number" name="zip" placeholder="Zip" required />
	<input type="number" name="phone" placeholder="1234567890" required />
	<input type="submit" name="submit" value="Register" />
</form>
<p><a href="login.php">Back</a></p>
</div>
<?php } ?>
</body>
</html>

