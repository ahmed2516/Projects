<?php
session_start();
include "connectdb.php";

$var1 = '';
$var1 = $_SESSION['name'];
$var2 = '';
$var2 = $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student Complaint Form</title>
	<link rel="stylesheet" href="studentcomplaint.css" />
	<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<style>
	.container {
		display: flex;
		justify-content: center;
		align-items: center;
		height: 500px;
	}

	.cardd {
		width: 500px;
		padding: 20px;
		background: rgba(255, 255, 255, 0.06);
		box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
		backdrop-filter: blur(15px);
		-webkit-backdrop-filter: blur(10px);
		border-right: 1px solid rgba(255, 255, 255, 0.15);
		transition: 0.4s;
	}

	.card-body {
		color: white;
		text-align: left;
		padding: 10px;
		margin-bottom: 20px;
	}

	.form-control {
		width: 100%;
		padding: 10px;
		margin-bottom: 10px;
		box-sizing: border-box;
	}

	.btn {
		cursor: pointer;
		padding: 10px 20px;
		border: 0;
		border-radius: 3px;
		background-color: #a70a32;
		color: #ffffff;
		font-size: 15px;
		font-weight: 700;
		outline: none;
		width: 100%;
	}

	.btn:hover {
		background-color: rosybrown;
	}
</style>


<body>

	<header class="header">
		<div class="email-info">
			<i class="bx bxs-envelope"></i>
			<span>uobuk@uk.ac.com.</span>
		</div>
		<div class="contact-info">
			<i class="bx bxs-phone"></i>
			<span>+442345678</span>
		</div>
		<div class="socials">
			<i class="bx bxl-facebook-square"></i>
			<i class="bx bxl-instagram"></i>
			<i class="bx bxl-twitter"></i>
			<i class="bx bxl-linkedin-square"></i>
			<i class="bx bxl-youtube"></i>
		</div>
	</header>

	<header class="card">
		<div class="navbar">
			<span class="logo">
				<i class="bx bxs-school"></i> University of <br />
				Bolton
			</span>
			<div class="links">
				<h2 style="color: white">
					Welcome to CampusConnect-UoB Student Dashboard
				</h2>
			</div>
			<a href="logout.html" class="button" style="text-decoration: none">Logout</a>
		</div>
	</header>

	<nav>
		<div class="nav-brand">
			<img src="imgs/logo.jpg" alt="" />
			<div class="info">
				<h2>Abdurrahman Maihula</h2>
				<p>University-Admin</p>
			</div>
		</div>
		<div class="sidebar">
			<ul style="text-align: left">
				<li class="nav-item">
					<i class="bx bxs-home-alt-2"></i>
					<a href="#">Home</a>
				</li>
				<li class="nav-item">
					<i class="bx bxs-graduation"></i>
					<a href="#students">Students</a>
					<ul>
						<li>
							<a href="#" onclick="toggleForm('studentForm')">Add Student</a>
						</li>
						<li>
							<a href="#" onclick="toggleStudentApplications()">Student Applications</a>
						</li>
						<li>
							<a href="#" onclick="toggleListStudents()">List All Students</a>
						</li>
					</ul>
				</li>

				<li class="nav-item">
					<i class="bx bxs-group"></i>
					<a href="#professors">Professors</a>
					<ul>
						<li><a href="#">Add Professor</a></li>
						<li><a href="#">List All Professors</a></li>
					</ul>
				</li>

				<li class="nav-item">
					<i class="bx bxs-exit"></i>
					<a href="logout.html">Sign Out</a>
				</li>
			</ul>
		</div>
	</nav>



	<div class="container">
		<div class="cardd">
			<div class="card-body">
				<h2>Student Complaint/Enqruiry</h2>
				<a href="studentcomp.php" style="float: right; text-decoration:none; color:#ffffff">View Replies</a>
			</div>
			<div class="card-body">
				<form class="form-group" action="#" method="POST" enctype="multipart/form-data">
					<label for="subject">Subject</label>
					<input type="text" id="subject" name="subject" class="form-control" required>
					<label for="msg">Complaint/Enquiry Message</label>
					<input type="text" id="msg" name="msg" class="form-control" required>

					<label for="department">Department</label>
					<select id="department" name="department" class="form-control" onChange="getTeacher(this.value);">
						<option value="">Select Department</option>
						<?php
						$sql1 = "SELECT * FROM Department";
						$results = $dbhandle->query($sql1);
						while ($rs = $results->fetch_assoc()) {
						?>
							<option value="<?php echo $rs["Departmentid"]; ?>"><?php echo $rs["Departmentname"]; ?></option>
						<?php
						}
						?>
					</select>

					<label for="teacher-listy">Teacher:</label>
					<select id="teacher-list" name="Teachers" class="form-control">
						<option value="">Select Teacher</option>
					</select>

					<button type="submit" name="studcomp" class="btn">Submit Complaint</button>
				</form>
			</div>
		</div>
	</div>


	<script>
		function getTeacher(val) {
			$.ajax({
				type: "POST",
				url: "get_state.php",
				data: 'Departmentid=' + val,
				success: function(data) {
					$("#teacher-list").html(data);
				}
			});
		}
	</script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

	<?php

	if (isset($_POST['studcomp'])) {
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
		$var1 = '';
		$var1 = $_SESSION['name'];
		$var2 = '';
		$var2 = $_SESSION['id'];
		$department = $_POST['department'];
		$msg = $_POST['msg'];
		$staff = $_POST['Teachers'];
		$subject = $_POST['subject'];
		$todayDate = date("Y-m-d H:i:s");

		// Prepare and execute SQL query
		$sql = "INSERT INTO complain (subject, enq_msg, staff_id, stud_id, dept, com_date) VALUES (?, ?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("ssssss", $subject, $msg, $staff, $var2, $department, $todayDate);
		$stmt->execute();

		// Check if insertion was successful
		if ($stmt->affected_rows > 0) {
			echo "<script>alert('New Complaint sent Succesfully')</script>";
			echo "<script>window.open('studentdash.php','_self')</script>";
		} else {
			echo "<script>alert('Sorry an error occurs')</script>";
		}

		// Close statement
		$stmt->close();

		// Close connection
		$conn->close();
	}
	?>