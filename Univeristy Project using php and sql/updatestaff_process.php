<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HelpDesk";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
require('staffdash.php');

if (isset($_POST['update'])) {
	$var1 = '';
	$var1 = $_SESSION['ID'];
	$name = $_POST['fullname'];
	$phone = $_POST['number'];
	$email = $_POST['email'];
	$profile = $_POST['profile'];
	$password = $_POST['password'];


	$sql = "UPDATE `staff` SET `fullname` = '$name', `phone_number` = '$phone', `email` = '$email', `profile` = '$profile', `password` = '$password' WHERE `staff`.`ID` = $var1";
	$result = mysqli_query($conn, $sql);

	if ($result) {
		echo "<script>alert('Details Updated Succesfully')</script>";
		echo "<script>window.open('staffdash.php','_self')</script>";
	} else {

		echo "<script>alert('Sorry an error occurs')</script>";
		//echo "<script>window.open('adminpanel.php','_self')</script>";
	}
} else {
	echo "fields required";
}
