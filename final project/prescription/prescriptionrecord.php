<!DOCTYPE html>
<html>
<head>
    <title>Prescription Record List</title>
</head>
<body>
    <h2>Prescription Record List</h2>
    <table>
        <tr>
            <th>Prescription Record ID</th>
            <th>Prescription ID</th>
            <th>Medicine Name</th>
            <th>Cost</th>
            <th>Unit</th>
            <th>Dosage</th>
            <th>Status</th>
            <!-- Include other relevant fields from the prescription_records table -->

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

        // Retrieve prescription record data from the database
        $sql = "SELECT * FROM prescription_records";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['prescription_record_id'] . "</td>";
                echo "<td>" . $row['prescription_id'] . "</td>";
                echo "<td>" . $row['medicine_name'] . "</td>";
                echo "<td>" . $row['cost'] . "</td>";
                echo "<td>" . $row['unit'] . "</td>";
                echo "<td>" . $row['dosage'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                // Include other fields from the prescription_records table

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
