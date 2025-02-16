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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="studentdash.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <header class="header">
      <div class="email-info">
        <i class="bx bxs-envelope"></i>
        <span>uobuk@uk.ac.com</span>
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
        <a href="logout.html" class="button" style="text-decoration: none"
          >Logout</a
        >
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
            <a href="#students">Courses</a>
          </li>

          <li class="nav-item">
            <i class="bx bxs-group"></i>
            <a href="#professors">Schedule</a>
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
            <h3>Welcome Back! <?php echo $var1 . $var2; ?> 
            <h4 >We're here to help you succeed. Explore out services or chat with us for immmediate assiatance</h4>
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
      <div class="services">
        <div
          style="
            background: rgba(255, 255, 255, 0.06);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255, 255, 255, 0.15);
            transition: 0.4s;
            padding: 10px;
            border-radius: 10px;
            height: 150px;
          "
        >
          <i class="bx bxs-wrench"></i>
          <a href="Studentcomplaint.php"><h5>Report An Issue</h5></a>
          <pre>
Something's broken 
or not working?
Report it so we can 
fix it.
                </pre
          >
        </div>

        <div
          style="
            background: rgba(255, 255, 255, 0.06);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255, 255, 255, 0.15);
            transition: 0.4s;
            padding: 10px;
            border-radius: 10px;
            height: 150px;
          "
        >
          <i class="bx bxs-calendar-event"></i>
          <a href="studentevents.php"><h5>Upcoming Events</h5></a>
          <pre>
View and register
for upcoming
events in the
campus.
                </pre
          >
        </div>

        <div
          style="
            background: rgba(255, 255, 255, 0.06);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255, 255, 255, 0.15);
            transition: 0.4s;
            padding: 10px;
            border-radius: 10px;
            height: 150px;
          "
        >
          <i class="bx bx-mail-send"></i>
          <a href="studentmailing.html"><h5>Mail an authority</h5></a>
          <pre>
Have a question or
need help from a 
department? Email them
right away.
                  </pre
          >
        </div>

        <div
          style="
            background: rgba(255, 255, 255, 0.06);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255, 255, 255, 0.15);
            transition: 0.4s;
            padding: 10px;
            border-radius: 10px;
            height: 150px;
          "
        >
          <i class="bx bxs-conversation"></i>
          <a href="chatbot.html"><h5>Live chat</h5></a>
          <pre>
Need immmediate
assistance? chat
with us during
business hours.
                  </pre
          >
        </div>

        <div
          style="
            background: rgba(255, 255, 255, 0.06);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255, 255, 255, 0.15);
            transition: 0.4s;
            padding: 10px;
            border-radius: 10px;
            height: 150px;
          "
        >
          <i class="bx bxs-time-five"></i>
          <a href="studentapp.php"><h5>Request a meeting</h5></a>
          <pre>
Still in dilemma?
Request a meeting
with your instructors
or any department.
                  </pre
          >
        </div>
      </div>
    </div>
    <footer
        class="copy"
        style="color: aliceblue; background-color: black; height: 50px"
      >
        <i class="bx bx-copyright"></i> Copyright All Rights Reserved 2024,
        University of Bolton.
        <div class="socials" style="margin-top: 10px">
          <i class="bx bxl-facebook-square"></i>
          <i class="bx bxl-instagram"></i>
          <i class="bx bxl-twitter"></i>
          <i class="bx bxl-linkedin-square"></i>
          <i class="bx bxl-youtube"></i>
        </div>
      </footer>
  </body>
</html>
