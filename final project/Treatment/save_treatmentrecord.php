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
    $treatmentid = $_POST['treatmentid'];
    
    $patientid = $_POST['patientid'];
    $doctorid = $_POST['doctorid'];
    $treatment_description = $_POST['treatment_description'];
    $uploads = $_POST['uploads'];
    $treatment_date = $_POST['treatment_date'];
    $treatment_time = $_POST['treatment_time'];
    $status = $_POST['status'];

    // SQL query to insert data into the 'treatment_records' table
    $sql = "INSERT INTO treatment_records (treatmentid, patientid, doctorid, treatment_description, uploads, treatment_date, treatment_time, status)
            VALUES ('$treatmentid', '$patientid', '$doctorid', '$treatment_description', '$uploads', '$treatment_date', '$treatment_time', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "New treatment record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
