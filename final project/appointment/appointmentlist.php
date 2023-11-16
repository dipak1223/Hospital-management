<!DOCTYPE html>
<html>
<head>
    <title>Appointment List</title>
</head>
<body>
    <h2>Appointment List</h2>
    <table>
        <tr>
            <th>Appointment ID</th>
            <th>Appointment Type</th>
            <th>Patient ID</th>
            <th>Room ID</th>
            <th>Department ID</th>
            <th>Appointment Date</th>
            <th>Appointment Time</th>
            <th>Doctor ID</th>
            <th>Status</th>
            <th>Appointment Reason</th>
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

        // Retrieving appointment data from the database
        $sql = "SELECT * FROM appointment";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['appointmentid'] . "</td>";
                echo "<td>" . $row['appointmenttype'] . "</td>";
                echo "<td>" . $row['patientid'] . "</td>";
                echo "<td>" . $row['roomid'] . "</td>";
                echo "<td>" . $row['departmentid'] . "</td>";
                echo "<td>" . $row['appointmentdate'] . "</td>";
                echo "<td>" . $row['appointmenttime'] . "</td>";
                echo "<td>" . $row['doctorid'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['app_reason'] . "</td>";
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
