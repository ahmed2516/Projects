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
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $subject = $row['subject'];
        $msg = $row['enq_msg'];
        $studid = $row['stud_id'];
    }
} else {
    echo "<script>alert('The record cant be found')</script>";
}
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
    /* Your CSS Styles Here */
</style>

<body>
    <!-- Your HTML Content Here -->
</body>

</html>

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

if(isset($_POST['staff_reply'])){
    $var1= $_SESSION['ID'];
    $subject = $_POST['subject'];
    $reply = $_POST['msg'];
    $todayDate = date("Y-m-d H:i:s");

    $sql= "UPDATE `complain` SET `staff_reply` = '$reply', `reply_date` = '$todayDate' WHERE `complain`.`staff_id` = $var1 AND `complain`.`subject` = '$subject'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Details Updated Successfully')</script>";
        echo "<script>window.open('staffdash.php','_self')</script>";
    } else {
        echo "<script>alert('Sorry an error occurred')</script>";
    }
} else {
    echo "Fields required";
}
?>
