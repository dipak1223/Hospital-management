<?php
// Establish a database connection (Replace with your actual database credentials)
 $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "final";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching IDs based on the selected values
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patientid = $_POST['patientid'];
    $doctorid = $_POST['doctorid'];
    $departmentid = $_POST['departmentid'];

    // Processing other form data
    $appointmenttype = $_POST['appointmenttype'];
    $roomid = $_POST['roomid'];
    $appointmentdate = $_POST['appointmentdate'];
    $appointmenttime = $_POST['appointmenttime'];
    $status = $_POST['status'];
    $app_reason = $_POST['app_reason'];

    // SQL query to insert data into the 'appointment' table
    $sql = "INSERT INTO appointment (appointmenttype, patientid, roomid, departmentid, appointmentdate, appointmenttime, doctorid, status, app_reason) 
    VALUES ('$appointmenttype', '$patientid', '$roomid', '$departmentid', '$appointmentdate', '$appointmenttime', '$doctorid', '$status', '$app_reason')";

    if ($conn->query($sql) === TRUE) {
        echo "New appointment created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
