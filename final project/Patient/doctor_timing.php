<?php
// Establish a database connection (Replace with your actual database credentials)
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Processing form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctorid = $_POST['doctorid'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $available_day = $_POST['available_day'];
    $status = $_POST['status'];

    // SQL query to insert data into the 'doctor_timings' table
    $sql = "INSERT INTO doctor_timings (doctorid, start_time, end_time, available_day, status) 
    VALUES ('$doctorid', '$start_time', '$end_time', '$available_day', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>






















<!DOCTYPE html>
<html>
<head>
    <title>Doctor Timings</title>
</head>
<body>
    <h2>Doctor Timings Form</h2>
    <form action="save_doctor_timing.php" method="post">
        <label for="doctorid">Doctor ID:</label>
        <select name="doctorid" required>
            <option value="">Select Doctor ID</option>
            <?php
            // Establish a connection to the database (Replace with your actual database credentials)
            // Establish a database connection (Replace with your actual database credentials)
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "final";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve doctor IDs from the database
            $sql = "SELECT doctorid FROM doctor";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['doctorid'] . "'>" . $row['doctorid'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <label for="start_time">Start Time:</label>
        <input type="time" id="start_time" name="start_time" required><br><br>

        <label for="end_time">End Time:</label>
        <input type="time" id="end_time" name="end_time" required><br><br>

        <label for="available_day">Available Day:</label>
        <input type="text" id="available_day" name="available_day" required><br><br>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
