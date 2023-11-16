<!DOCTYPE html>
<html>
<head>
    <title>Add Prescription</title>
</head>
<body>
    <h2>Add Prescription</h2>
    <form action="save_prescription.php" method="post">
        <label for="treatment_records_id">Treatment Record:</label>
        <select name="treatment_records_id" required>
            <option value="">Select Treatment Record</option>
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

            // Fetch treatment record IDs and display with a name or any identification as per your table structure
            $sql = "SELECT treatment_records_id FROM treatment_records";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['treatment_records_id'] . "'>" . $row['treatment_records_id'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <label for="doctorid">Doctor:</label>
        <select name="doctorid" required>
            <option value="">Select Doctor</option>
            <?php
            // Connect to the database (same connection details can be used)

            // Fetch doctor IDs and names from the database
            // Adjust query according to your table structure
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

        <label for="patientid">Patient:</label>
        <select name="patientid" required>
            <option value="">Select Patient</option>
            <?php
            // Connect to the database (same connection details can be used)

            // Fetch patient IDs and names from the database
            // Adjust query according to your table structure
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

        <label for="medicineid">Medicine:</label>
        <select name="medicineid" required>
            <option value="">Select Medicine</option>
            <?php
            // Connect to the database (same connection details can be used)

            // Fetch medicine IDs and names from the database
            // Adjust query according to your table structure
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT medicineid, medicinename FROM medicine";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['medicineid'] . "'>" . $row['medicinename'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>
        
          <label for="delivery_type">Delivery Type:</label>
        <input type="text" name="delivery_type" required><br><br>

        <label for="delivery_id">Delivery ID:</label>
        <input type="text" name="delivery_id" required><br><br>

        <label for="prescriptiondate">Prescription Date:</label>
        <input type="date" name="prescriptiondate" required><br><br>

        <label for="status">Status:</label>
        <input type="text" name="status" required><br><br>

        <label for="appointmentid">Appointment ID:</label>
        <input type="text" name="appointmentid" required><br><br>

        <!-- Other input fields for delivery type, delivery id, prescription date, status if required -->

        <input type="submit" value="Add Prescription">
    </form>
</body>
</html>
