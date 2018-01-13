<?php 
$hostName = "localhost";
$dbName = "contacts";
$mysqlUser = "root";
$mysqlPass = "welcome";
if (!($db = new mysqli($hostName,$mysqlUser,$mysqlPass,$dbName))) {
	echo "error connecting to server";
}else {
	echo "Connected to MySqli!<br>";
	if (!(mysqli_select_db($db, $dbName))) {
		echo mysqli_errno() . " ";
		echo mysqli_error() . "\n";
		echo "unable to connect to database";
	}else {
		echo "Connected to " . $dbName . "!";
	}
}
?>
