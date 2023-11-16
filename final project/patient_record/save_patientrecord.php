<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "final";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id  = $_POST["patient_id"];
    $medicine_id = $_POST["medicine_id"];
    $doctor_id = $_POST["doctor_id"];
    $treatment_type = $_POST["treatment_type"];
    $total = $_POST["Total"];

    // Insert data into the patientrecord table
    $sql = "INSERT INTO patientrecord (patient_id, medicine_id, doctor_id, treatment_type, total) VALUES ('$patient_id', '$medicine_id', '$doctor_id', '$treatment_type', '$total')";

    if ($conn->query($sql) === TRUE) {
        echo "Patient record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
