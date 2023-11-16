<!DOCTYPE html>
<html>
<head>
    <title>Add Prescription Record</title>
</head>
<body>
    <h2>Add Prescription Record</h2>
    <form action="save_prescriptionrecord.php" method="post">
        <label for="prescription_id">Prescription ID:</label>
        <select name="prescription_id" required>
            <option value="">Select Prescription ID</option>
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

            // Fetch prescription IDs from the database
            $sql = "SELECT prescriptionid FROM prescription";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['prescriptionid'] . "'>" . $row['prescriptionid'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <label for="medicine_id">Medicine:</label>
        <select name="medicine_id" required>
            <option value="">Select Medicine</option>
            <?php
            // Establish a new database connection (use the same credentials)
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch medicine IDs, names, and costs from the database
            $sql = "SELECT medicineid, medicinename, medicinecost FROM medicine";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['medicineid'] . "'>" . $row['medicinename'] . " ($" . $row['medicinecost'] . ")</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <label for="cost">Cost:</label>
        <input type="text" name="cost" required><br><br>

        <label for="unit">Unit:</label>
        <input type="text" name="unit" required><br><br>

        <label for="dosage">Dosage:</label>
        <input type="text" name="dosage" required><br><br>

        <label for="status">Status:</label>
        <input type="text" name="status" required><br><br>

        <input type="submit" value="Add Prescription Record">
    </form>
</body>
</html>
