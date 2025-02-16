<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Events</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .edit-form {
            display: none;
        }
    </style>
    <script>
        function showEditForm(event_id) {
            document.getElementById("event_id").value = event_id;
            document.getElementById("edit-form").style.display = "block";
            document.getElementById("event-table").style.display = "none";
        }
    </script>
</head>

<body>

    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Universityofbolton";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle form submission for updating event
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $event_id = $_POST["event_id"];
        $event_name = $_POST["event_name"];
        $department = $_POST["department"];
        $presenter = $_POST["presenter"];
        $venue = $_POST["venue"];
        $date = $_POST["date"];
        $time = $_POST["time"];

        // Update event details in the database
        $sql = "UPDATE events SET EventName='$event_name', Department='$department', Presenter='$presenter', Venue='$venue', Date='$date', Time='$time' WHERE EventID='$event_id'";
        if ($conn->query($sql) === TRUE) {
            echo "Event updated successfully";
        } else {
            echo "Error updating event: " . $conn->error;
        }
    }
    ?>
    <h1>Edit Events</h1>
    <table id="event-table">
        <tr>
            <th>Event ID</th>
            <th>Event Name</th>
            <th>Department</th>
            <th>Presenter</th>
            <th>Venue</th>
            <th>Date</th>
            <th>Time</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = "SELECT * FROM events";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["EventID"] . "</td>";
                echo "<td>" . $row["EventName"] . "</td>";
                echo "<td>" . $row["Department"] . "</td>";
                echo "<td>" . $row["Presenter"] . "</td>";
                echo "<td>" . $row["Venue"] . "</td>";
                echo "<td>" . $row["Date"] . "</td>";
                echo "<td>" . $row["Time"] . "</td>";
                // Edit button
                echo "<td><button onclick=\"showEditForm('" . $row["EventID"] . "')\">Edit</button></td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </table>

    <!-- Edit event form -->
    <div id="edit-form" class="edit-form">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <!-- Input fields for event details -->
            <!-- Prefill these input fields with event details -->
            <input type="hidden" id="event_id" name="event_id">
            <label for="event_name">Event Name:</label>
            <input type="text" id="event_name" name="event_name"><br>
            <label for="department">Department:</label>
            <input type="text" id="department" name="department"><br>
            <label for="presenter">Presenter:</label>
            <input type="text" id="presenter" name="presenter"><br>
            <label for="venue">Venue:</label>
            <input type="text" id="venue" name="venue"><br>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date"><br>
            <label for="time">Time:</label>
            <input type="time" id="time" name="time"><br>
            <button type="submit">Update Event</button>
        </form>
    </div>
</body>

</html>

<?php
$conn->close();
?>