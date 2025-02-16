<?php

if (isset($_POST['studcomp']))
	// Create new database connection
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helpdesk";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Get form data
$department = $_POST['department'];
$msg = $_POST['msg'];
$staff = $_POST['Teachers'];
$subject = $_POST['subject'];
$todayDate = date("Y-m-d H:i:s");

// Prepare and execute SQL query
$sql = "INSERT INTO complain (subject, enq_msg, staff_id, stud_id, dept, com_date) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssiss", $subject, $msg, $staff, $var2, $department, $todayDate);
$stmt->execute();

// Check if insertion was successful
if ($stmt->affected_rows > 0) {
	echo "<script>alert('New Complaint sent Successfully')</script>";
	echo "<script>window.open('studentdash.php','_self')</script>";
} else {
	echo "<script>alert('Sorry, an error occurred while inserting data')</script>";
}

// Close statement
$stmt->close();

// Close connection
$conn->close();
