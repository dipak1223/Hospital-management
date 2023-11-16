<!DOCTYPE html>
<html>
<head>
    <title>Appointment Form</title>
</head>
<body>
    <h2>Appointment Form</h2>
    <form action="save_appointment.php" method="post">
        <label for="patientid">Patient Name:</label>
        <select name="patientid" required>
            <option value="">Select Patient Name</option>
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

            // Fetch patient names from the database
            $sql = "SELECT patientid, patientname FROM patient";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['patientid'] . "'>" . $row['patientname'] . "</option>";
                 echo "<option value='" . $row['patientid'] . "'>" . $row['patientid'] . "</option>";
                }
				}
				
        
            $conn->close();
            ?>
        </select><br><br>

        <label for="doctorid">Doctor ID:</label>
        <select name="doctorid" required>
            <option value="">Select Doctor ID</option>
            <?php
            // Connect to the database (Replace with your actual database credentials)
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch doctor IDs from the database
            $sql = "SELECT doctorid FROM doctor";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['doctorid'] . "'>" . $row['doctorid'] . "</option>";
                }
            }
            $conn->close();
			
			
			
			
	 ?>
        </select><br><br>
        <label for="departmentid">Department ID:</label>
        <select name="doctorid" required>
            <option value="">Select Department ID</option>
            <?php
            // Connect to the database (Replace with your actual database credentials)
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch doctor IDs from the database
            $sql = "SELECT departmentid FROM department";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['departmentid'] . "'>" . $row['departmentid'] . "</option>";
                }
            }
            $conn->close();
			
			
			
			
	 ?>
     </select><br><br>

        <label for="appointmenttype">Appointment Type:</label>
        <input type="text" id="appointmenttype" name="appointmenttype" required><br><br>

        <label for="roomid">Room ID:</label>
        <input type="text" id="roomid" name="roomid" required><br><br>

        
        <label for="appointmentdate">Appointment Date:</label>
        <input type="date" id="appointmentdate" name="appointmentdate" required><br><br>

        <label for="appointmenttime">Appointment Time:</label>
        <input type="time" id="appointmenttime" name="appointmenttime" required><br><br>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" required><br><br>

        <label for="app_reason">Appointment Reason:</label>
        <textarea id="app_reason" name="app_reason" required></textarea><br><br>

        <input type="submit" value="Schedule Appointment">
    </form>
</body>
</html>
