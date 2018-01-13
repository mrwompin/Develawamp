<?php
$con = new mysqli("localhost","root","welcome","contacts");

if ($con->connect_error) {
	die("Conneciton failed: " . $con->connect_error);
}
?>

