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
    $treatment_records_id = $_POST['treatment_records_id'];
    $doctorid = $_POST['doctorid'];
    $patientid = $_POST['patientid'];
    $medicineid = $_POST['medicineid'];
    $delivery_type = $_POST['delivery_type'];
    $delivery_id = $_POST['delivery_id'];
    $prescriptiondate = $_POST['prescriptiondate'];
    $status = $_POST['status'];
    $appointmentid = $_POST['appointmentid'];

    // SQL query to insert data into the 'prescription' table
    $sql = "INSERT INTO prescription (treatment_records_id, doctorid, patientid, medicineid, delivery_type, delivery_id, prescriptiondate, status, appointmentid)
            VALUES ('$treatment_records_id', '$doctorid', '$patientid', '$medicineid', '$delivery_type', '$delivery_id', '$prescriptiondate', '$status', '$appointmentid')";

    if ($conn->query($sql) === TRUE) {
        echo "New prescription created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
