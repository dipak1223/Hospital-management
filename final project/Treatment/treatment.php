<!DOCTYPE html>
<html>
<head>
    <title>Treatment List</title>
</head>
<body>
    <h2>Treatment List</h2>
    <table>
        <tr>
            <th>Treatment ID</th>
            <th>Treatment Type</th>
            <th>Treatment Cost</th>
            <th>Note</th>
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

        // Retrieving treatment data from the database
        $sql = "SELECT * FROM treatment";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['treatmentid'] . "</td>";
                echo "<td>" . $row['treatmenttype'] . "</td>";
                echo "<td>" . $row['treatment_cost'] . "</td>";
                echo "<td>" . $row['note'] . "</td>";
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
