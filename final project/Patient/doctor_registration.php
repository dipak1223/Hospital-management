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

// Processing form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctorname = $_POST['doctorname'];
    $mobileno = $_POST['mobileno'];
    $departmentid = $_POST['departmentid'];
    $loginid = $_POST['loginid'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $education = $_POST['education'];
    $experience = $_POST['experience'];
    $consultancy_charge = $_POST['consultancy_charge'];

    // SQL query to insert data into the 'doctor' table
    $sql = "INSERT INTO doctor (doctorname, mobileno, departmentid, loginid, password, status, education, experience, consultancy_charge) 
    VALUES ('$doctorname', '$mobileno', '$departmentid', '$loginid', '$password', '$status', '$education', '$experience', '$consultancy_charge')";

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
    <title>Doctor Registration</title>
</head>
<body>
    <h2>Doctor Registration Form</h2>
    <form action="doctor_registration.php" method="post">
        <label for="doctorname">Doctor Name:</label>
        <input type="text" id="doctorname" name="doctorname" required><br><br>

        <label for="mobileno">Mobile Number:</label>
        <input type="text" id="mobileno" name="mobileno" required><br><br>

        <label for="departmentid">Department ID:</label>
        <input type="text" id="departmentid" name="departmentid" required><br><br>

        <label for="loginid">Login ID:</label>
        <input type="text" id="loginid" name="loginid" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required><br><br>

        <label for="education">Education:</label>
        <input type="text" id="education" name="education" required><br><br>

        <label for="experience">Experience (in years):</label>
        <input type="number" step="0.1" id="experience" name="experience" required><br><br>

        <label for="consultancy_charge">Consultancy Charge:</label>
        <input type="number" step="0.01" id="consultancy_charge" name="consultancy_charge" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
