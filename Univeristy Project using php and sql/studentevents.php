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

$sql = "SELECT * FROM events";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Events</title>
  <link rel="stylesheet" href="studentdash.css">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <style>
    table {
      margin-left: 90px;
      margin: 0 auto;
      border-collapse: collapse;

    }

    h2 {
            color: white; /* Set font color to white */
        }

    th,
    td {
      text-align: left;
      padding: 8px;
      border-bottom: 1px solid #ddd;
      width: 50px;

    }

    td{
      color: white; /* Set font color to white */

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
  </style>
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

    <center><h2>List of Events</h2></center> <br>
    <table>
      <thead>
        <tr>
          <th>EventID</th>
          <th>EventName</th>
          <th>Department</th>
          <th>Presenter</th>
          <th>Venue</th>
          <th>Date</th>
          <th>Time</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["EventID"] . "</td>";
            echo "<td>" . $row["EventName"] . "</td>";
            echo "<td>" . $row["Department"] . "</td>";
            echo "<td>" . $row["Presenter"] . "</td>";
            echo "<td>" . $row["Venue"] . "</td>";
            echo "<td>" . $row["Date"] . "</td>";
            echo "<td>" . $row["Time"] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='8'>No events found</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>