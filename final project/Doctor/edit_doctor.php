<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>
    <!-- Include Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add your additional stylesheets or other head elements here -->
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Doctor</h2>

        <?php
        // Check if doctor ID is provided in the URL
        if (isset($_GET['id'])) {
            $doctor_id = $_GET['id'];

            // Establish a database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "final";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch doctor data based on the provided ID
            $sql = "SELECT * FROM doctor WHERE doctorid = $doctor_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
                <form action="update_doctor.php" method="post">
                    <!-- Add form fields for editing -->
                    <input type="hidden" name="doctor_id" value="<?php echo $row['doctorid']; ?>">
                    <div class="form-group">
                        <label for="doctor_name">Doctor Name:</label>
                        <input type="text" class="form-control" id="doctor_name" name="doctor_name" value="<?php echo $row['doctorname']; ?>" required>
                    </div>
                    <!-- Add other form fields for the remaining attributes -->
                    
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


                    

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
        <?php
            } else {
                echo "<p>No doctor found with the provided ID.</p>";
            }

            $conn->close();
        } else {
            echo "<p>Doctor ID not provided.</p>";
        }
        ?>

        <a href="doctorlist.php" class="btn btn-secondary mt-3">Back to Doctor List</a>
    </div>

    <!-- Include Bootstrap JS and other scripts if needed -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
