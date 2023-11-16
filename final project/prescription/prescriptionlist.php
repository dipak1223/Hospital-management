<!DOCTYPE html>
<html>
<head>
    <title>Prescription List</title>
</head>
<body>
    <h2>Prescription List</h2>
    <table>
        <tr>
            <th>Prescription ID</th>
            <th>Treatment Record ID</th>
            <th>Doctor ID</th>
            <th>Patient ID </th>
            <th>Medicine ID</th>
            <th>Appointment ID</th>
            <!-- Include other relevant fields from the prescription table -->

            <!-- Adjust the table headers based on the data you want to display -->
        </tr>

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

        // Retrieve prescription data from the database
        $sql = "SELECT * FROM prescription";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['prescriptionid'] . "</td>";
                echo "<td>" . $row['treatment_records_id'] . "</td>";
                // Fetch and display doctor's name based on doctorid
                echo "<td>" . $row['doctorid'] . "</td>";
                // Fetch and display patient's name based on patientid
                echo "<td>" . $row['patientid'] . "</td>";
                // Fetch and display medicine's name based on medicineid
                echo "<td>" . $row['medicineid'] . "</td>";
                echo "<td>" . $row['appointmentid'] . "</td>";
                // Include other fields from the prescription table

                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
