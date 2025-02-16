<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <!-- Link to external stylesheet -->
  <link rel="stylesheet" href="login.css">
  <!-- Link to Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
  <!-- Header section -->
  <header class="header">
    <!-- Email info -->
    <div class="email-info">
      <i class="bx bxs-envelope"></i>
      <span>uobuk@uk.ac.com</span>
    </div>
    <!-- Contact info -->
    <div class="contact-info">
      <i class="bx bxs-phone"></i>
      <span>+442345678</span>
    </div>
    <!-- Social icons -->
    <div class="socials">
      <i class="bx bxl-facebook-square"></i>
      <i class="bx bxl-instagram"></i>
      <i class="bx bxl-twitter"></i>
      <i class="bx bxl-linkedin-square"></i>
      <i class="bx bxl-youtube"></i>
    </div>
  </header>

  <!-- Card section -->
  <header class="card">
    <nav class="navbar">
      <!-- Logo -->
      <span class="logo">
        <i class="bx bxs-school"></i> University of <br />
        Bolton
      </span>
      <!-- Navigation links -->
      <div class="links">
        <a href="Home.html">Home</a>
        <a href="aboutus.html">About Us</a>
        <a href="courses.html">Courses</a>
        <a href="#">Faculty</a>
        <a href="faq.html">FAQ</a>
        <a href="contactus.html">Contact Us</a>
      </div>
      <!-- Apply Now button -->
      <a href="applynow.php" class="button" style="text-decoration: none">Apply Now</a>
    </nav>
  </header>

  <!-- Main content container -->
  <div class="container">
    <div class="content">
      <!-- Text content -->
      <div class="text-sci">
        <h2>Bolton <br><br><br><br>Welcome!<br /><span>To Our Website.</span></h2>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos
          natus ea, voluptas quasi a quae unde.
        </p>
        <!-- Social icons -->
        <div class="socials-icons">
          <i class="bx bxl-facebook-square"></i>
          <i class="bx bxl-instagram"></i>
          <i class="bx bxl-twitter"></i>
          <i class="bx bxl-linkedin-square"></i>
          <i class="bx bxl-youtube"></i>
        </div>
      </div>
    </div>

    <!-- Login/Register box -->
    <div class="logreg-box">
      <div class="form-box login">
        <!-- Login form -->
        <form method="post" style="background: rgba(255, 255, 255, 0.06);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-right: 1px solid rgba(255, 255, 255, 0.15);
        transition: 0.4s; padding: 40px;">
          <h2>Admin</h2>
          <h2>Sign In</h2>
          <!-- PHP code for form submission and validation -->
          <?php
          // Database connection details
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "HelpDesk";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);

          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          // Initialize error message
          $error_message = "";

          // Handle form submission
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve email and password from form
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Prepare SQL statement
            $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
            $stmt->bind_param("ss", $email, $password);

            // Execute the query
            $stmt->execute();

            // Get the result
            $result = $stmt->get_result();

            // Check if a row was returned
            if ($result->num_rows == 1) {
              // Authentication successful
              // Redirect to a new page
              header("Location: admindash.php");
              exit();
            } else {
              echo "<script>alert('Please enter your correct details')</script>";
              echo "<script>window.open('loginadmin.php','_self')</script>";
            }
          }

          // Close the database connection
          $conn->close();
          ?>
          <!-- Input fields -->
          <div class="input-box">
            <span class="icon"><i class="bx bxs-envelope"></i></span>
            <input type="text" name="email" required />
            <label> Email</label>
          </div>
          <div class="input-box">
            <span class="icon"><i class="bx bx-lock"></i></span>
            <input type="password" name="password" required />
            <label> Password</label>
          </div>
          <!-- Remember me and forgot password options -->
          <div class="remember-forgot">
            <label> <input type="checkbox" />Remember me</label>
            <a href="#"> Forgot password?</a>
          </div>
          <!-- Sign In button -->
          <button type="submit" class="btn">Sign In</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>