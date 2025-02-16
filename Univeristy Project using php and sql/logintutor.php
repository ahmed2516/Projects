<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign In</title>
  <link rel="stylesheet" href="login.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
  <header class="header">
    <div class="email-info">
      <i class="bx bxs-envelope"></i>
      <span>uobuk@uk.ac.com..ac.com</span>
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
      <a href="applynow.php" class="button" style="text-decoration: none">Apply Now</a>
    </nav>
  </header>

  <div class="container">
    <div class="content">
      <div class="text-sci">
        <h2>Bolton <br><br><br><br>Welcome!<br /><span>To Our Website.</span></h2>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos
          natus ea, voluptas quasi a quae unde.
        </p>

        <div class="socials-icons">
          <i class="bx bxl-facebook-square"></i>
          <i class="bx bxl-instagram"></i>
          <i class="bx bxl-twitter"></i>
          <i class="bx bxl-linkedin-square"></i>
          <i class="bx bxl-youtube"></i>
        </div>
      </div>
    </div>

    <div class="logreg-box">
      <div class="form-box login">


        <form method="post" style="background: rgba(255, 255, 255, 0.06);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-right: 1px solid rgba(255, 255, 255, 0.15);
        transition: 0.4s; padding: 40px;">
          <h2>Staff</h2>
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
            $stmt = $conn->prepare("SELECT * FROM staff WHERE email = ? AND Password = ?");
            $stmt->bind_param("ss", $email, $password);

            // Execute the query
            $stmt->execute();

            // Get the result
            $result = $stmt->get_result();

            // Check if a row was returned
            if ($result->num_rows == 1) {
              // Authentication successful
              // Redirect to a new page
              session_start();
              $_SESSION['loggedin'] = true;
              $row = $result->fetch_assoc();
              $_SESSION['name'] = $row['fullname'];
              $_SESSION['ID'] = $row['ID'];
              header("Location: staffdash.php");
              exit();
            } else {
              echo "<script>alert('Please enter your correct details')</script>";
              echo "<script>window.open('logintutor.php','_self')</script>";
            }
          }

          // Close the database connection
          $conn->close();
          ?>
          <div class="input-box">
            <span class="icon"><i class="bx bxs-envelope"></i></span>
            <input type="text" name="email" required />
            <label> Staff Email</label>
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