<?php
session_start();
$var1 = $_SESSION['ID'];

// Database connection parameters
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

$sql = "SELECT * FROM appointment WHERE staff_id = $var1 ";
$result = $conn->query($sql);
if (mysqli_num_rows($result) > 0) {
  while ($_row = mysqli_fetch_array($result)) {
    $subject = $_row['app_msg'];
    $msg = $_row['staff_id'];
    $studid = $_row['stud_id'];
  }
} else
  echo "<script>alert('The record cant be found')</script>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Emailing</title>
  <link rel="stylesheet" href="staffdash.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>
<style>
  table {
    margin-left: 90px;
    margin: 0 auto;
    border-collapse: collapse;

  }

  h2 {
    color: white;
    /* Set font color to white */
  }

  th,
  td {
    text-align: left;
    padding: 8px;
    border-bottom: 1px solid #ddd;
    width: 50px;

  }

  td {
    color: white;
    /* Set font color to white */

  }

  th {
    background-color: #f2f2f2;
  }

  tr:hover {
    background: rgba(255, 255, 255, 0.06);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);

  }

  a {
    cursor: pointer;
    padding: 10px 20px;
    margin: 10px;
    border: 0;
    border-radius: 3px;
    color: #ffffff;
    font-size: 12px;
    font-weight: 700;
    outline: none;
    text-decoration: none;
  }

  a:hover {
    background-color: rosybrown;
  }
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
      <span>uobuk@uk.ac.com..ac.com.ac.com</span>
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

  <center>
    <h2>View Meeting Requests</h2>
  </center>

  <div class="container">
		<div class="cardd">
			<div class="card-body">
        <h2>Respond to Student Appointment </h2>
      </div>
      <div class="card-body">
        <form class="form-group" action="staff_app_reply.php" method="POST" enctype="multipart/form-data">

          <label>Message</label>
          <input type="text" name="app_msg" class="form-control" value="<?php echo $subject; ?>" readonly><br>

          <label>Student ID</label>
          <input type="text" name="stud_id" class="form-control" value="<?php echo $studid; ?>" readonly><br>

          <label>Staff ID</label>
          <input type="text" name="staff_id" class="form-control" value="<?php echo $msg; ?>" readonly><br>



          <label>Please select a following reply</label>
          <select class="form-control" name="department">
            <option>Select...</option>
            <option>Approved</option>
            <option>Not Approved</option>
            <br>
            <br>

            <center> <input type="submit" name="staffapp_reply" value="Submit Reply" class="btn btn-warning"></center>






        </form>
      </div>
    </div>
  </div>