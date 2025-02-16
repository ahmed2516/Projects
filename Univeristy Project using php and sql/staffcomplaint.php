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

$sql = "SELECT * FROM complain WHERE staff_id = $var1 ";
$result = $conn->query($sql);
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
    width: 800px;

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
    height: 50px;

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
  border: 0;
  border-radius: 3px;
  color: #ffffff;
  font-weight: 700;
  outline: none;
  text-decoration: none;
}

a:hover {
  background-color: rosybrown;
}
</style>

<body>
  <header class="header">
    <div class="email-info">
      <i class="bx bxs-envelope"></i>
      <span>uobuk@uk.ac.com</span>
    </div>
    <div class="contact-info">
      <i class="bx bxs-phone"></i>
      <span>010201</span>
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
    <h2>View Student Complaints</h2>
  </center> <br>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Date</th>
        <th>Action</th>

      </tr>
    </thead>
    <tbody>
      <?php
      if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            $id =  $row['enq_id'];
            $subject = $row['subject'];
            $msg = $row['enq_msg'];
            $date = $row['com_date'];
            echo "<tr>
    
            <td>$id</td>
            <td>$subject</td>
            <td>$msg</td>
            <td>$date</td>
            <td><a href='staffcomprpy.php'>Reply</a></td> 

            
              
          </tr>";
        }
      } else {
        echo "<script>alert('The record cant be found')</script>";
        //echo "<script>window.open('staffpanel.php', '_self')</script>";
      }
      ?>
    </tbody>
  </table>
</body>

</html>
