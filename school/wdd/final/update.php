<?php
echo $username;
require('db.php');
$username = stripslashes($_GET['user']);

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


	$stmt = $con->prepare("UPDATE users SET email=?, fname=?,lname=?, address=?, city=?, state=?, zip=?,phone=? WHERE username = '" . $username . "'");
	$stmt->bind_param("ssssssss", $email,$fname,$lname, $address, $city, $state, $zip,$phone);
	$stmt->execute();
	header("Location:admin_view.php");

