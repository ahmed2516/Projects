<!DOCTYPE html>
<html lang="en">

<head>
  <title>ADMIN DASHBOARD</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="admindash.css" />
  <style>
    .success-message {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #fff;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      z-index: 9999;
    }

    table {
      margin-left: 90px;
      margin: 0 auto;
      border-collapse: collapse;
    }

    th,
    td {
      text-align: left;
      padding: 8px;
      border-bottom: 1px solid #ddd;
      width: 50px;
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
  <nav>
    <div class="nav-brand">
      <img src="imgs/logo.jpg" alt="" />
      <div class="info">
        <h2>Abdurrahman Maihula</h2>
        <p>unversity-Admin</p>
      </div>
    </div>
    <div class="sidebar">
      <ul style="text-align: left;">
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
            <li><a href="#" onclick="toggleListStudents()">List All Students</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <i class="bx bxs-group"></i>
          <a href="#professors">Professors</a>
          <ul>
            <li><a href="#" onclick="toggleTutorForm()">Add Professor</a></li>
            <li><a href="#" onclick="toggleListTutors()">List All Professors</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <i class='bx bxs-calendar-event'></i>
          <a href="#professors">Events</a>
          <ul>
            <li><a href="#" onclick="toggleListEvents()">Upcoming Events</a></li>
            <li><a href="#" onclick="toggleEventForm()">Add an Event</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <i class='bx bxs-comment-detail'></i>
          <a href="#">Complaints</a>
          <ul>
            <li><a href="#" onclick="toggleListComplains()">View Complains</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <i class='bx bxs-exit'></i>
          <a href="logout.html">Sign Out</a>
        </li>
      </ul>
    </div>
  </nav>

  <!--CODE TO REGISTER A NEW STUDENT-->

  <div id="studentForm" class="content" style="display: none;">
    <h2>Add Student</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-columns">
      <div class="form-row">
        <div class="form-group">
          <label for="firstName">First Name:</label>
          <input type="text" id="firstName" name="firstName" placeholder="Enter first name" required />
        </div>
        <div class="form-group">
          <label for="lastName">Last Name:</label>
          <input type="text" id="lastName" name="lastName" placeholder="Enter last name" required />
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" placeholder="Enter email" required />
        </div>
        <div class="form-group">
          <label for="registrationDate">Registration Date:</label>
          <input type="date" id="registrationDate" name="registrationDate" required />
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="StudentID">Student ID </label>
          <input type="text" id="StudentID" name="StudentID" placeholder="Enter Student ID" required />
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="text" id="password" name="password" required />
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="gender">Gender:</label>
          <select id="gender" name="gender" required>
            <option value="" disabled selected>Select gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="form-group">
          <label for="mobile">Mobile:</label>
          <input type="tel" id="mobile" name="mobile" placeholder="Enter mobile number" required />
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="ParentsName">Parent's name </label>
          <input type="text" id="ParentsName" name="ParentsName" placeholder="Enter mobile number" required />
        </div>
        <div class="form-group">
          <label for="ParentsMobile">Parent's Mobile</label>
          <input type="text" id="ParentsMobile" name="ParentsMobile" />
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="DateOfBirth">Date of Birth</label>
          <input type="date" id="DateOfBirth" name="DateOfBirth" placeholder="DateOfBirth" required />
        </div>
        <div class="form-group">
          <label for="class">Blood Group</label>
          <input type="text" id="class" name="class" required />
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="Address">Address</label>
          <input type="text" id="Address" name="Address" placeholder="Address" required />
        </div>
        <div class="form-group">
          <label for="class">Choose File:</label>
          <input type="file" id="file" name="file" />
        </div>
      </div>
      <div class="button-group">
        <button class="submit-btn" type="submit" style="background-color: brown" onclick="clearForm()">Submit</button>
        <button type="button" style="background-color: rgb(226, 116, 116)" onclick="toggleForm('studentForm')">Cancel</button>
      </div>
    </form>
  </div>

  <!--CODE TO DISPLAY ALL THE EXISTING STUDENTS-->

  <div id="listStudents" class="" style="display: none;">
    <center>
      <h2>View All Students</h2>
    </center>
    <table>

      <?php
      // Fetch and display all students
      $server = "localhost";
      $username = "root";
      $password = "";
      $dbname = "HelpDesk";

      // Create a connection
      $conn = new mysqli($server, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM students";
      $result = $conn->query($sql);

      echo '<center style="color><h2>List of Students</h2></center>';
      echo '<table style="margin: 0 auto;">'; // Center the table
      echo '<thead>';
      echo '<tr>';
      echo '<th>First Name</th>';
      echo '<th>Last Name</th>';
      echo '<th>Email</th>';
      echo '<th>Registration Date</th>';
      echo '<th>Student ID</th>';
      echo '<th>Gender</th>';
      echo '<th>Mobile</th>';
      echo '<th>Parents Name</th>';
      echo '<th>Parents Mobile</th>';
      echo '<th>Date of Birth</th>';
      echo '<th>Blood Group</th>';
      echo '<th>Address</th>';
      echo '</tr>';
      echo '</thead>';
      echo '<tbody>';

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . $row["FirstName"] . '</td>';
          echo '<td>' . $row["LastName"] . '</td>';
          echo '<td>' . $row["Email"] . '</td>';
          echo '<td>' . $row["RegistrationDate"] . '</td>';
          echo '<td>' . $row["StudentID"] . '</td>';
          echo '<td>' . $row["Gender"] . '</td>';
          echo '<td>' . $row["Mobile"] . '</td>';
          echo '<td>' . $row["ParentsName"] . '</td>';
          echo '<td>' . $row["ParentsMobile"] . '</td>';
          echo '<td>' . $row["DateOfBirth"] . '</td>';
          echo '<td>' . $row["BloodGroup"] . '</td>';
          echo '<td>' . $row["Address"] . '</td>';
          echo '</tr>';
        }
      } else {
        echo "<tr><td colspan='14'>No data found</td></tr>";
      }

      echo '</tbody>';
      echo '</table>';

      // Close the connection
      $conn->close();
      ?>
  </div>

  <!--CODE TO DISPLAY STUDENT APPLICATIONS-->
  <div id="studentApplications" class="" style="display: none">
    <center>
      <h2>Student Applications</h2>
    </center>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>FullName</th>
          <th>DateOfBirth</th>
          <th>Gender</th>
          <th>Nationality</th>
          <th>Address</th>
          <th>Email</th>
          <th>PhoneNumber</th>
          <th>ProgramOfInterest</th>
          <th>DesiredStartDate</th>
          <th>ApplicationDate</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Fetch data from studentapplications table
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "HelpDesk";

        // Create a connection
        $conn = new mysqli($server, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM studentapplications";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ApplicationID"] . "</td>";
            echo "<td>" . $row["FullName"] . "</td>";
            echo "<td>" . $row["DateOfBirth"] . "</td>";
            echo "<td>" . $row["Gender"] . "</td>";
            echo "<td>" . $row["Nationality"] . "</td>";
            echo "<td>" . $row["Address"] . "</td>";
            echo "<td>" . $row["Email"] . "</td>";
            echo "<td>" . $row["PhoneNumber"] . "</td>";
            echo "<td>" . $row["ProgramOfInterest"] . "</td>";
            echo "<td>" . $row["DesiredStartDate"] . "</td>";
            echo "<td>" . $row["ApplicationDate"] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='11'>No data found</td></tr>";
        }

        // Close the connection
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>

  <!-- CODE TO REGISTER A NEW TUTOR-->
  <?php include "connectdb.php"; ?>
  <div id="tutorForm" style="margin: auto; max-width: 600px; background-color: #fff;
  border-radius: 10px;
  display:none;
  padding:30px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  background: rgba(255, 255, 255, 0.06);
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border-right: 1px solid rgba(255, 255, 255, 0.15);
  transition: 0.4s;">
    <div class="dropdown">
      <h2>Staff Registration</h2>
      <div class="card-body">
        <form class="form-group" action="staffreg.php" method="POST" enctype="multipart/form-data">
          <label>Full Name</label>
          <input type="text" name="fullname" class="form-control" required>
          <label>Phone Number</label>
          <input type="number" name="number" class="form-control" required>
          <label>Email</label>
          <input type="email" name="email" class="form-control" required="number"><br>
          <label>Designation</label>
          <input type="text" name="designation" class="form-control" required>
          <label>Department ID</label>
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
          <label>Profile</label>
          <input type="text" name="profile" class="form-control" required><br>

          <label>Password</label>
          <input type="password" name="password" class="form-control" required><br>

          <label>Image</label>
          <input type="file" name="image" class="form-control"><br> <br>
          <center> <input type="submit" name="staffreg" value="Register Staff" class="btn btn-danger" style="background-color: brown;
          color: #fff;padding: 10px 20px;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          margin-right: 10px;"></center>
        </form>
      </div>
    </div>
  </div>

  <!-- CODE TO DISPLAY ALL THE TUTOR-->

  <div id="listTutors" class="" style="display: none;">
    <?php
    // Fetch and display all students
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Helpdesk";

    // Create a connection
    $conn = new mysqli($server, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM staff";
    $result = $conn->query($sql);

    echo '<center><h2>List of Tutors</h2></center>';
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>DeptID</th>';
    echo '<th>FullName</th>';
    echo '<th>Designation</th>';
    echo '<th>Email</th>';
    echo '<th>Phone Numer</th>';
    echo '<th>Profile</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["ID"] . '</td>';
        echo '<td>' . $row["Departmentid"] . '</td>';
        echo '<td>' . $row["fullname"] . '</td>';
        echo '<td>' . $row["designation"] . '</td>';
        echo '<td>' . $row["email"] . '</td>';
        echo '<td>' . $row["phone_number"] . '</td>';
        echo '<td>' . $row["profile"] . '</td>';
        echo '</tr>';
      }
    } else {
      echo "<tr><td colspan='14'>No data found</td></tr>";
    }

    echo '</tbody>';
    echo '</table>';

    // Close the connection
    $conn->close();
    ?>
  </div>

  <!--CODE TO VIEW ALL THE COMPLAINS-->

  <div id="listComplains" class="" style="display: none;">
    <?php
    // Fetch and display all students
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Helpdesk";

    // Create a connection
    $conn = new mysqli($server, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM complain";
    $result = $conn->query($sql);

    echo '<center><h2>List of Complaints</h2></center>';
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Complaint ID</th>';
    echo '<th>Subject</th>';
    echo '<th>Message</th>';
    echo '<th>Staff</th>';
    echo '<th>Student ID</th>';
    echo '<th>Department</th>';
    echo '<th>Date</th>';
    echo '<th>Reply</th>';
    echo '<th>Reply Date</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["enq_id"] . '</td>';
        echo '<td>' . $row["subject"] . '</td>';
        echo '<td>' . $row["enq_msg"] . '</td>';
        echo '<td>' . $row["staff_id"] . '</td>';
        echo '<td>' . $row["stud_id"] . '</td>';
        echo '<td>' . $row["dept"] . '</td>';
        echo '<td>' . $row["com_date"] . '</td>';
        echo '<td>' . $row["staff_reply"] . '</td>';
        echo '<td>' . $row["reply_date"] . '</td>';
        echo '</tr>';
      }
    } else {
      echo "<tr><td colspan='14'>No data found</td></tr>";
    }

    echo '</tbody>';
    echo '</table>';

    // Close the connection
    $conn->close();
    ?>
  </div>

  <!--CODE TO DISPLAY UPCOMING EVENTS-->
  <div id="listEvents" class="" style="display: none;">
    <?php
    // Fetch and display all students
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "HelpDesk";

    // Create a connection
    $conn = new mysqli($server, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM events";
    $result = $conn->query($sql);

    echo '<center><h2>List of Events</h2></center>';
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>EventID</th>';
    echo '<th>EventName</th>';
    echo '<th>Department</th>';
    echo '<th>Presenter</th>';
    echo '<th>Venue</th>';
    echo '<th>Date</th>';
    echo '<th>Time</th>';
    echo '<th>SubmissionDate</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["EventID"] . '</td>';
        echo '<td>' . $row["EventName"] . '</td>';
        echo '<td>' . $row["Department"] . '</td>';
        echo '<td>' . $row["Presenter"] . '</td>';
        echo '<td>' . $row["Venue"] . '</td>';
        echo '<td>' . $row["Date"] . '</td>';
        echo '<td>' . $row["Time"] . '</td>';
        echo '<td>' . $row["SubmissionDate"] . '</td>';
        echo '</tr>';
      }
    } else {
      echo "<tr><td colspan='14'>No data found</td></tr>";
    }

    echo '</tbody>';
    echo '</table>';

    // Close the connection
    $conn->close();
    ?>
  </div>

  <!-- CODE TO ADD AN EVENT -->

  <div id="eventForm" class="content" style="display: none;">
    <h2>Add an Event</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form-columns">
      <div class="form-row">
        <div class="form-group">
          <label for="eventName">Event Name:</label>
          <input type="text" id="eventName" name="eventName" placeholder="Enter event name" required />
        </div>
        <div class="form-group">
          <label for="department">Department:</label>
          <select id="department" name="department">
            <option value="course1">Computing</option>
            <option value="course2">Software Engineering</option>
            <option value="course1">Business</option>
            <option value="course2">Civil Engineering</option>
          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="presenter">Presenter:</label>
          <input type="text" id="presenter" name="presenter" placeholder="Enter presenter" required />
        </div>
        <div class="form-group">
          <label for="venue">Venue:</label>
          <input type="text" id="venue" name="venue" placeholder="Enter venue" required />
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="date">Date:</label>
          <input type="date" id="date" name="date" required />
        </div>
        <div class="form-group">
          <label for="time">Time:</label>
          <input type="time" id="time" name="time" required />
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="file">File:</label>
          <input type="file" id="file" name="file" />
        </div>
      </div>
      <div class="button-group">
        <button class="submit-btn" type="submit" style="background-color: brown">Submit</button>
        <button type="button" style="background-color: rgb(226, 116, 116)" onclick="toggleEventForm()">Cancel</button>
      </div>
    </form>
  </div>


  <!--CODE TO HANDLE FORM SUBMISSIONS-->

  <?php
  // Check if form is submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have already established a MySQL connection
    $servername = "localhost";
    $username = "root"; // Your MySQL username
    $password = ""; // Your MySQL password
    $dbname = "HelpDesk";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['eventName'])) { // Event form submitted
      // Retrieve form data
      $eventName = $_POST['eventName'];
      $department = $_POST['department'];
      $presenter = $_POST['presenter'];
      $venue = $_POST['venue'];
      $date = $_POST['date'];
      $time = $_POST['time'];

      // Prepare SQL statement for event insertion
      $sql = "INSERT INTO events (EventName, Department, Presenter, Venue, Date, Time) 
                VALUES ('$eventName', '$department', '$presenter', '$venue', '$date', '$time')";
      // Add other fields to the SQL statement as needed

      if ($conn->query($sql) === TRUE) {
        echo '<div class="success-message">New event created successfully</div>';
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    } elseif (isset($_POST['firstName'])) { // Student form submitted
      // Retrieve form data
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $email = $_POST['email'];
      $registrationDate = $_POST['registrationDate'];
      $studentID = $_POST['StudentID']; // Note the capitalization
      $password = $_POST['password'];
      $gender = $_POST['gender'];
      $mobile = $_POST['mobile'];
      $parentsName = $_POST['ParentsName']; // Note the capitalization
      $parentsMobile = $_POST['ParentsMobile']; // Note the capitalization
      $dateOfBirth = $_POST['DateOfBirth']; // Note the capitalization
      $bloodGroup = $_POST['class']; // Note the capitalization
      $address = $_POST['Address']; // Note the capitalization

      // Prepare SQL statement to insert data
      $sql = "INSERT INTO students (FirstName, LastName, Email, RegistrationDate, StudentID, Password, Gender, Mobile, ParentsName, ParentsMobile, DateOfBirth, BloodGroup, Address) 
            VALUES ('$firstName', '$lastName', '$email', '$registrationDate', '$studentID', '$password', '$gender', '$mobile', '$parentsName', '$parentsMobile', '$dateOfBirth', '$bloodGroup', '$address')";
      // Add other fields to the SQL statement as needed

      if ($conn->query($sql) === TRUE) {
        echo '<div class="success-message">New student created successfully</div>';
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }

    $conn->close();
  }
  ?>

  <script>
    function toggleForm(formId) {
      var form = document.getElementById(formId);
      var studentApplications = document.getElementById("studentApplications");
      var listStudents = document.getElementById("listStudents");
      var listEvents = document.getElementById("listEvents");
      var eventForm = document.getElementById("eventForm");

      if (form.style.display === "none") {
        form.style.display = "block";
        studentApplications.style.display = "none";
        listStudents.style.display = "none";
        listEvents.style.display = "none";
        eventForm.style.display = "none";
      } else {
        form.style.display = "none";
      }
    }

    function toggleListStudents() {
      var listStudents = document.getElementById("listStudents");
      var studentApplications = document.getElementById("studentApplications");
      var form = document.getElementById("studentForm");
      var listEvents = document.getElementById("listEvents");
      var eventForm = document.getElementById("eventForm");

      if (listStudents.style.display === "none") {
        listStudents.style.display = "block";
        studentApplications.style.display = "none";
        form.style.display = "none";
        listEvents.style.display = "none";
        eventForm.style.display = "none";
      } else {
        listStudents.style.display = "none";
      }
    }

    function toggleStudentApplications() {
      var studentApplications = document.getElementById("studentApplications");
      var form = document.getElementById("studentForm");
      var listStudents = document.getElementById("listStudents");
      var listEvents = document.getElementById("listEvents");
      var eventForm = document.getElementById("eventForm");

      if (studentApplications.style.display === "none") {
        studentApplications.style.display = "block";
        form.style.display = "none";
        listStudents.style.display = "none";
        listEvents.style.display = "none";
        eventForm.style.display = "none";
      } else {
        studentApplications.style.display = "none";
      }
    }

    function toggleEventForm() {
      var eventForm = document.getElementById("eventForm");
      var studentApplications = document.getElementById("studentApplications");
      var form = document.getElementById("studentForm");
      var listStudents = document.getElementById("listStudents");
      var listEvents = document.getElementById("listEvents");

      if (eventForm.style.display === "none") {
        eventForm.style.display = "block";
        studentApplications.style.display = "none";
        form.style.display = "none";
        listStudents.style.display = "none";
        listEvents.style.display = "none";
      } else {
        eventForm.style.display = "none";
      }
    }

    function toggleTutorForm() {
      var tutorForm = document.getElementById("tutorForm");
      var studentApplications = document.getElementById("studentApplications");
      var form = document.getElementById("studentForm");
      var listStudents = document.getElementById("listStudents");
      var listEvents = document.getElementById("listEvents");

      if (tutorForm.style.display === "none") {
        tutorForm.style.display = "block";
        studentApplications.style.display = "none";
        form.style.display = "none";
        listStudents.style.display = "none";
        listEvents.style.display = "none";
      } else {
        tutorForm.style.display = "none";
      }
    }

    function toggleListEvents() {
      var listEvents = document.getElementById("listEvents");
      var studentApplications = document.getElementById("studentApplications");
      var form = document.getElementById("studentForm");
      var listStudents = document.getElementById("listStudents");
      var eventForm = document.getElementById("eventForm");

      if (listEvents.style.display === "none") {
        listEvents.style.display = "block";
        studentApplications.style.display = "none";
        form.style.display = "none";
        listStudents.style.display = "none";
        eventForm.style.display = "none";
      } else {
        listEvents.style.display = "none";
      }
    }

    function toggleListTutors() {
      var listTutors = document.getElementById("listTutors");
      var studentApplications = document.getElementById("studentApplications");
      var form = document.getElementById("studentForm");
      var listStudents = document.getElementById("listStudents");
      var eventForm = document.getElementById("eventForm");

      if (listTutors.style.display === "none") {
        listTutors.style.display = "block";
        studentApplications.style.display = "none";
        form.style.display = "none";
        listStudents.style.display = "none";
        eventForm.style.display = "none";
      } else {
        listTutors.style.display = "none";
      }
    }


    function toggleListComplains() {
      var listComplains = document.getElementById("listComplains");
      var studentApplications = document.getElementById("studentApplications");
      var form = document.getElementById("studentForm");
      var listStudents = document.getElementById("listStudents");
      var eventForm = document.getElementById("eventForm");

      if (listComplains.style.display === "none") {
        listComplains.style.display = "block";
        studentApplications.style.display = "none";
        form.style.display = "none";
        listStudents.style.display = "none";
        eventForm.style.display = "none";
      } else {
        listComplains.style.display = "none";
      }
    }

    function closeSuccessMessage() {
      var successMessage = document.querySelector('.success-message');
      successMessage.style.display = 'none';
    }

    document.addEventListener('click', function(event) {
      var successMessage = document.querySelector('.success-message');
      if (event.target !== successMessage && !successMessage.contains(event.target)) {
        successMessage.style.display = 'none';
      }
    });

    
  </script>