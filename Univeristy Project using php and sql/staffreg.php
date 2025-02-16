<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "HelpDesk";

// Create connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['staffreg'])) {
	$name = $_POST['fullname'];
	$phone = $_POST['number'];
	$email = $_POST['email'];
	$department = $_POST['department'];
	$password = $_POST['password'];
	$profile = $_POST['profile'];
	$designation = $_POST['designation'];


	$sql = "INSERT INTO staff (ID, DepartmentID, fullname, designation, email, phone_number, profile, image, password) VALUES(NULL, '$department', '$name',  '$designation', '$email', '$phone', '$profile', '$target', '$password')";
	$result = mysqli_query($conn, $sql);
	/*if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
 	echo "image uploaded";
 }else{
 	echo "failed to upload image";
 }*/
	if ($result) {
		echo "<script>alert('New Staff Registed Succesfully')</script>";
		echo "<script>window.open('admindash.php','_self')</script>";
	} else {

		echo "<script>alert('Sorry an error occurs')</script>";
		//echo "<script>window.open('adminpanel.php','_self')</script>";
	}
} else {
	echo "fields required";
}
