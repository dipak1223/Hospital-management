<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor List</title>
    <!-- Include Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add your additional stylesheets or other head elements here -->
</head>
<body>
    <div class="container-fluid mt-5"> <!-- Changed container to container-fluid and adjusted margin -->
        <h2>Doctor List</h2>
        <a href="doctor_registration.php" class="btn btn-success mb-3">Add Doctor</a>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Doctor ID</th>
                    <th>Doctor Name</th>
                    <th>Mobile Number</th>
                    <th>Department ID</th>
                    <th>Login ID</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th>Education</th>
                    <th>Experience</th>
                    <th>Consultancy Charge</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Establish a database connection
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "final";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch doctors from the database
                $sql = "SELECT * FROM doctor";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['doctorid']}</td>
                            <td>{$row['doctorname']}</td>
                            <td>{$row['mobileno']}</td>
                            <td>{$row['departmentid']}</td>
                            <td>{$row['loginid']}</td>
                            <td>{$row['password']}</td>
                            <td>{$row['status']}</td>
                            <td>{$row['education']}</td>
                            <td>{$row['experience']}</td>
                            <td>{$row['consultancy_charge']}</td>
                            <td>
                                <a href='edit_doctor.php?id={$row['doctorid']}' class='btn btn-primary btn-sm'>Edit</a>
                                <a href='delete_doctor.php?id={$row['doctorid']}' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No doctors found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap JS and other scripts if needed -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
