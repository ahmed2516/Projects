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
require('staffdash.php');

if (isset($_POST['staffapp_reply'])) {
	$var2 = '';
	$var2 = $_SESSION['ID'];
	$subject = $_POST['app_msg'];
	$msg = $_POST['staff_id'];
	$studid = $_POST['stud_id'];
	$reply = $_POST['department'];
	$todayDate = date("Y-m-d H:i:s");


	$sql = "UPDATE `appointment` SET 
	`staff_reply` = '$reply', `reply_date` = '$todayDate' 
	WHERE `appointment`.`staff_id` = $var2 
	AND `appointment`.`app_msg` = '$subject' 
	AND `appointment`.`stud_id` = '$studid' ";
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
