<!DOCTYPE html>
<html>
<head>
    <title>Add Treatment Record</title>
</head>
<body>
    <h2>Add Treatment Record</h2>
    <form action="save_treatmentrecord.php" method="post">
        <label for="treatmentid">Treatment ID:</label>
        <select name="treatmentid" required>
            <option value="">Select Treatment</option>
            <?php
            // Connect to the database (Replace with your actual database credentials)
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "final";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch treatment IDs and names from the database
            $sql = "SELECT treatmentid, treatmenttype FROM treatment";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['treatmentid'] . "'>" . $row['treatmenttype'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <label for="patientid">Patient:</label>
        <select name="patientid" required>
            <option value="">Select Patient</option>
            <?php
            // Connect to the database (Replace with your actual database credentials)
            // Same connection details can be used

            // Fetch patient IDs and names from the database
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT patientid, patientname FROM patient";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['patientid'] . "'>" . $row['patientname'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <label for="doctorid">Doctor:</label>
        <select name="doctorid" required>
            <option value="">Select Doctor</option>
            <?php
            // Connect to the database (Replace with your actual database credentials)
            // Same connection details can be used

            // Fetch doctor IDs and names from the database
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT doctorid, doctorname FROM doctor";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['doctorid'] . "'>" . $row['doctorname'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <label for="treatment_description">Treatment Description:</label><br>
        <textarea name="treatment_description" required></textarea><br><br>

        <label for="uploads">Uploads:</label>
        <input type="text" name="uploads" required><br><br>

        <label for="treatment_date">Treatment Date:</label>
        <input type="date" name="treatment_date" required><br><br>

        <label for="treatment_time">Treatment Time:</label>
        <input type="time" name="treatment_time" required><br><br>

        <label for="status">Status:</label>
        <input type="text" name="status" required><br><br>

        <input type="submit" value="Add Treatment Record">
    </form>
</body>
</html>
