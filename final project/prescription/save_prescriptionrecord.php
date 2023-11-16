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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prescription_id = $_POST['prescription_id'];
    $medicine_id = $_POST['medicine_id'];
    $cost = $_POST['cost'];
    $unit = $_POST['unit'];
    $dosage = $_POST['dosage'];
    $status = $_POST['status'];

    // SQL query to insert data into the 'prescription_records' table
    $sql = "INSERT INTO prescription_records (prescription_id, medicine_name, cost, unit, dosage, status)
            VALUES ('$prescription_id', '$medicine_id', '$cost', '$unit', '$dosage', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "New prescription record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
