<!DOCTYPE html>
<html>
<head>
    <title>Add Patient Record</title>
</head>
<body>
    <h2>Add Patient Record</h2>
    <form action="save_patientrecord.php" method="post">
        <label for="patient_id">Patient Name:</label>
        <select name="patient_id" required>
            <option value="">Select Patient</option>
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

            // Fetch patient IDs and names from the database
            $sql = "SELECT patientid, patientname FROM patient";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                   echo "<option value='" . $row['patientid'] . "'>" . $row['patientid'] . "  " . $row['patientname'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>


            
             <label for="medicine_id">Medicine:</label>
        <select name="medicine_id" required>
            <option value="">Medicine</option>
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

            // Fetch patient IDs and names from the database
            $sql = "SELECT medicine_name, cost,unit FROM prescription_records";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                   echo "<option value='" . $row['medicine_name'] . "'>" . $row['medicine_name'] . " RS  " . $row['cost'] ." ---  " . $row['unit'] ."</option>";
                }
            }
            $conn->close();
            ?>
            
            
        </select><br><br>

        <label for="doctor_id">Doctor Charge:</label>
        <select name="doctor_id" required>
            <option value="">Select Doctor</option>
            <?php
            // Establish a new database connection (use the same credentials)
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch doctor IDs and consultancy charges from the doctor table
            $sql = "SELECT doctorname, consultancy_charge FROM doctor";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['doctorname'] . "'>" . $row['doctorname'] . " - Consultancy Charge: $" . $row['consultancy_charge'] . "</option>";

                }
            }
            $conn->close();
            ?>
        
 </select><br><br>
        <label for="treatment_type">Treatment Type:</label>
        <select name="treatment_type"  required>
            <option value="">Select Treatment Type</option>
            <?php
            // Establish a new database connection (use the same credentials)
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch treatment types and costs from the treatment table
            $sql = "SELECT treatmenttype, treatment_cost FROM treatment";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['treatment_cost'] . "'>" . $row['treatmenttype'] . " ($" . $row['treatment_cost'] . ")</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>
       <label for="Total">Total</label><br>
  <input type="text" id="Total" name="Total" value="">
        </select><br><br>

        <input type="submit" value="Add Patient Record">
    </form>
</body>
</html>
