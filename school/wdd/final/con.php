<?php
$con = new mysqli("localhost","root","welcome","register");

if ($con->connect_error) {
	die("Conneciton failed: " . $con->connect_error);
}
?>

