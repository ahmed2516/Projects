<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Apply Now</title>
<link rel="stylesheet" href="applynow.css" />
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet"/>
<style>
.success-message {
  background-color: #d4edda;
  color: #155724;
  border: 1px solid #c3e6cb;
  padding: 10px 20px;
  margin-bottom: 20px;
}
</style>
</head>
<body>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // MySQL server configuration
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "HelpDesk"; // Change to your database name

    // Create a connection
    $conn = new mysqli($server, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $fullName = $_POST["fullName"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $nationality = $_POST["nationality"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $program = $_POST["program"];
    $startDate = $_POST["start-date"];

    // Prepare SQL statement for inserting data
    $sql = "INSERT INTO StudentApplications (FullName, DateOfBirth, Gender, Nationality, Address, Email, PhoneNumber, ProgramOfInterest, DesiredStartDate)
            VALUES ('$fullName', '$dob', '$gender', '$nationality', '$address', '$email', '$phone', '$program', '$startDate')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "<p class='success-message'>Details successfully stored.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
      <nav class="navbar">
        <span class="logo">
          <i class="bx bxs-school"></i> University of <br />
          Bolton
        </span>
        <div class="links">
          <a href="Home.html">Home</a>
          <a href="aboutus.html">About Us</a>
          <a href="courses.html">Courses</a>
          <a href="#">Faculty</a>
          <a href="faq.html">FAQ</a>
          <a href="contactus.html">Contact Us</a>
        </div>
        <a href="applynow.html" class="button" style="text-decoration: none">Apply Now</a>
      </nav>
    </header>

<div class="form-container">
  <div class="form-column">
    <div class="form-group">
      <label for="fullName">Full Name</label>
      <input type="text" id="fullName" name="fullName" required>
    </div>
    <div class="form-group">
      <label for="dob">Date of Birth</label>
      <input type="date" id="dob" name="dob" required>
    </div>
    <div class="form-group">
      <label for="gender">Gender</label>
      <select id="gender" name="gender" required>
        <option value="">Select</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>
    </div>
    <div class="form-group">
      <label for="nationality">Nationality</label>
      <input type="text" id="nationality" name="nationality" required>
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <textarea id="address" name="address" rows="4" required></textarea>
    </div>
  </div>
  <div class="form-column">
    <div class="form-group">
      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="phone">Phone Number</label>
      <input type="tel" id="phone" name="phone" required>
    </div>
    <div class="form-group">
      <label for="program">Program of Interest</label>
      <input type="text" id="program" name="program" required>
    </div>
    <div class="form-group">
      <label for="start-date">Desired Start Date</label>
      <input type="date" id="start-date" name="start-date" required>
    </div>
    <div class="form-group">
      <button type="submit" class="form-btn">Apply Now</button>
    </div>
  </div>
</div>

</form>

<script>
// Function to display success message
function displaySuccessMessage() {
  var successMessage = document.createElement("p");
  successMessage.classList.add("success-message");
  successMessage.textContent = "Data entered successfully.";

  // Insert success message after the form
  var form = document.querySelector("form");
  form.parentNode.insertBefore(successMessage, form.nextSibling);

  // Remove success message after 5 seconds
  setTimeout(function() {
    successMessage.remove();
  }, 5000);
}

// Check if the URL contains success parameter
var urlParams = new URLSearchParams(window.location.search);
if (urlParams.has("success")) {
  displaySuccessMessage();
}
</script>

</body>
</html>
