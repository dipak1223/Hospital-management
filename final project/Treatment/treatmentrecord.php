<!DOCTYPE html>
<html>
<head>
    <title>Treatment Records</title>
</head>
<body>
    <h2>Treatment Records</h2>
    <table>
        <tr>
            <th>Treatment Record ID</th>
            <th>Treatment ID</th>
            <th>Treatment Description</th>
            <th>Patient Name</th>
            <th>Doctor Name</th>
            <th>Uploads</th>
            <th>Treatment Date</th>
            <th>Treatment Time</th>
            <th>Status</th>
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

        // Retrieving treatment records data from the database
        $sql = "SELECT tr.treatment_records_id, tr.treatmentid, tr.treatment_description, tr.uploads, tr.treatment_date, tr.treatment_time, tr.status, p.patientname, d.doctorname 
                FROM treatment_records tr
                INNER JOIN patient p ON tr.patientid = p.patientid
                INNER JOIN doctor d ON tr.doctorid = d.doctorid";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['treatment_records_id'] . "</td>";
                echo "<td>" . $row['treatmentid'] . "</td>";
                echo "<td>" . $row['treatment_description'] . "</td>";
                echo "<td>" . $row['patientname'] . "</td>";
                echo "<td>" . $row['doctorname'] . "</td>";
                echo "<td>" . $row['uploads'] . "</td>";
                echo "<td>" . $row['treatment_date'] . "</td>";
                echo "<td>" . $row['treatment_time'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
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
