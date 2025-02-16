<?php


// Database connection parameters
$servername = "localhost"; // Replace 'localhost' with your database host
$username = "root"; // Replace 'your_username' with your database username
$password = ""; // Replace 'your_password' with your database password
$dbname = "HelpDesk"; // Replace 'your_database_name' with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['studcomp'])) {
	require('studentapp.php');
	$var1 = '';
	$var1 = $_SESSION['name'];
	$var2 = '';
	$var2 = $_SESSION['id'];
	$department = $_POST['department'];
	$msg = $_POST['msg'];
	$staff = $_POST['Teachers'];


	$sql = "INSERT INTO appointment 
	(id, app_msg, stud_id, staff_id, Department_id) 
	VALUES(NULL, '$msg',  '$var2', '$staff','$department' )";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('New Appointment details sent  Succesfully')</script>";
		echo "<script>window.open('studentdash.php','_self')</script>";
	} else {

		echo "<script>alert('Sorry an error occurs')</script>";

		//ho "<script>window.open('adminpanel.php','_self')</script>";
	}
}
