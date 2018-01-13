<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
require('db.php');
//require('con.php');
session_start();
if (isset($_POST['username'])) {
	$message = "";
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($con, $username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$_REQUEST['password']);
	$query = "select * from tblUsers where userName='$username' and password = '$password'";
	$result = mysqli_query($con, $query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
	if ($rows == 1) {
		$_SESSION['username'] = $username;
		header("Location: index.php");
	} else {
		echo "<div class='form'>
			<h3>Username/password is incorrect.</h3>
<br/>Click here to <a Href='login.php'>Login</a></div>";
	}
} else {
?>

<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>
<?php } ?>
</body>
</html>
