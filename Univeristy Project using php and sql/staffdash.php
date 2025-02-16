<?php
session_start();
include "connectdb.php";

$var1 = '';
$var1 = $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us</title>
  <link rel="stylesheet" href="staffdash.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

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
          Welcome to CampusConnect-UoB Staff  Dashboard
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
          <a href="#students">My Students</a>
        </li>

        <li class="nav-item">
          <i class="bx bxs-group"></i>
          <a href="#professors">My Schedule</a>
        </li>
        <li class="nav-item">
          <i class="bx bxs-exit"></i>
          <a href="logout.html">Sign Out</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="connect">
      <pre>
            <h3>Welcome Back! <?php echo $var1 ?> <br>
<input type="text" style="width: 250px; height: 40px; border-radius: 5px; border: none;" placeholder=" Search..."> <button style=" padding: 10px 20px;
border: none;
border-radius: 5px;
cursor: pointer;
margin-right: 10px;

background-color: brown;
color: #fff;">seacrh</button>
        </pre>
    </div>
  </div>
  <div class="conc">
    <div class="services " style="
            background: rgba(255, 255, 255, 0.06);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            text-align: center;
            margin-bottom: 10px; /* Add margin bottom for spacing */
            -webkit-backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255, 255, 255, 0.15);
            transition: 0.4s;
            padding: 10px;
            border-radius: 10px;
            height: fit-content;
            width:410px">
      <div>
        <a href="Staffcomplaint.php">
          <h5>View Student Complaints</h5>
        </a>
        <pre>
Check and Reply to Student Complaints
                </pre>
      </div>
      <hr>

      <div>
        <a href="staffappoinment.php">
          <br>
          <h5>View Meeting requests</h5>
        </a>
        <pre>
View, approve or reschedule a meeting.
                </pre>
      </div>
      <hr>

      <div>
        <a href="staffmailing.html">
          <br>
          <h5>Mail an authority</h5>
        </a>
        <pre>
Got questions? Mail any of the department.
                </pre>
      </div>
      <hr>

      <div>
        <a href="staffupdate.php">
          <br>
          <h5>Update Profile</h5>
        </a>
        <pre>
Update your tutor profile instantly.
                </pre>
      </div>
      <hr>