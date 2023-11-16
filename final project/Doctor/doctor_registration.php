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
<html lang="en">
<head>
    <title>Doctor Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
           body {
            background-image: url('hospital-background.jpg'); /* Replace 'hospital-background.jpg' with your image file */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            color: #ffffff; /* Set text color to white for better readability */
        }


        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }

        h2 {
            color: #007bff;
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            color: #007bff;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Doctor Registration Form</h2>
        <form action="doctor_registration.php" method="post">
          <div class="form-group">
                <label for="doctorname">Doctor Name:</label>
                <input type="text" class="form-control" id="doctorname" name="doctorname" required>
            </div>

            <div class="form-group">
                <label for="mobileno">Mobile Number:</label>
                <input type="text" class="form-control" id="mobileno" name="mobileno" required>
            </div>

            <div class="form-group">
                <label for="departmentid">Department ID:</label>
                <input type="text" class="form-control" id="departmentid" name="departmentid" required>
            </div>

            <div class="form-group">
                <label for="loginid">Login ID:</label>
                <input type="text" class="form-control" id="loginid" name="loginid" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" id="status" name="status" required>
            </div>

            <div class="form-group">
                <label for="education">Education:</label>
                <input type="text" class="form-control" id="education" name="education" required>
            </div>

            <div class="form-group">
                <label for="experience">Experience (in years):</label>
                <input type="number" step="0.1" class="form-control" id="experience" name="experience" required>
            </div>

            <div class="form-group">
                <label for="consultancy_charge">Consultancy Charge:</label>
                <input type="number" step="0.01" class="form-control" id="consultancy_charge" name="consultancy_charge" required>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS and jQuery (Optional, but required for some Bootstrap features) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <!-- Form Validation Script -->
    <script src="validation.js"></script>
</body>
</html>
