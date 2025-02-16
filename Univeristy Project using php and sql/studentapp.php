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
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>
<style>
  .container {
    display: flex;
    justify-content: center;
    align-items: center;
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

    function showMsg() {

      $("#msgC").html($("#department-list option:selected").text());
      $("#msgS").html($("#teacher-list option:selected").text());
      return false;
    }
  </script>

  <body>
    <div class="container">
      <div class="cardd">
        <div class="card-body">
          <h2>Request a Meeting </h2>
              <a href="studentappointment.php" style="float: right; text-decoration:none; color:#ffffff">View Replies</a> <!-- Add this line -->

        </div>
        <div class="card-body">
          <form class="form-group" action="app.php" method="POST" enctype="multipart/form-data">

            <label>Enter Appointment Message</label>
            <input type="text" name="msg" class="form-control" required><br>

            <label>Department</label>

            <select name="department" id="department-list" class="form-control" onChange="getTeacher(this.value);">
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
            </select><br>

            <label>Teacher:</label>
            <select id="teacher-list" name="Teachers" class="form-control">
              <option value="">Select Teacher</option>
            </select>
            <center> <input type="submit" name="studcomp" value="Send Reqeust" class="btn btn-warning"></center>

          </form>
        </div>
      </div>
    </div>
    <div class="col-md-1">


      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
      <script>
        $(function() {
          $('#time').combodate({
            firstItem: 'name', //show 'hour' and 'minute' string at first item of dropdown
            minuteStep: 1
          });
        });
      </script>

      

  </body>

</html>