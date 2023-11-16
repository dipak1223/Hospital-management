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
    $patientname = $_POST['patientname'];
    $admissiondate = $_POST['admissiondate'];
    $admissiontime = $_POST['admissiontime'];
    $address = $_POST['address'];
    $mobileno = $_POST['mobileno'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $loginid = $_POST['loginid'];
    $password = $_POST['password'];
    $bloodgroup = $_POST['bloodgroup'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $status = $_POST['status'];

    // SQL query to insert data into the 'patient' table
    $sql = "INSERT INTO patient (patientname, admissiondate, admissiontime, address, mobileno, city, pincode, loginid, password, bloodgroup, gender, dob, status) 
    VALUES ('$patientname', '$admissiondate', '$admissiontime', '$address', '$mobileno', '$city', '$pincode', '$loginid', '$password', '$bloodgroup', '$gender', '$dob', '$status')";

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
    <title>Patient Registration</title>
</head>
<body>
    <h2>Patient Registration Form</h2>
    <form action="register_patient.php" method="post">
        <label for="patientname">Patient Name:</label>
        <input type="text" id="patientname" name="patientname" required><br><br>

        <label for="admissiondate">Admission Date:</label>
        <input type="date" id="admissiondate" name="admissiondate" required><br><br>

        <label for="admissiontime">Admission Time:</label>
        <input type="time" id="admissiontime" name="admissiontime" required><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>

        <label for="mobileno">Mobile Number:</label>
        <input type="text" id="mobileno" name="mobileno" required><br><br>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required><br><br>

        <label for="pincode">Pincode:</label>
        <input type="text" id="pincode" name="pincode" required><br><br>

        <label for="loginid">Login ID:</label>
        <input type="text" id="loginid" name="loginid" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="bloodgroup">Blood Group:</label>
        <input type="text" id="bloodgroup" name="bloodgroup" required><br><br>

        <label for="gender">Gender:</label>
        <input type="radio" id="male" name="gender" value="Male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female" required>
        <label for="female">Female</label><br><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br><br>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
