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
    $patient_id = $_POST["patient_id"];
    $appointment_id = $_POST["appointment_id"];
    $paid_date = $_POST["paid_date"];
    $paid_time = $_POST["paid_time"];
    $paid_amount = $_POST["paid_amount"];
    $status = $_POST["status"];
    $cardholder = $_POST["cardholder"];
    $card_number = $_POST["card_number"];
    $cvv_no = $_POST["cvv_no"];
    $exp_date = $_POST["exp_date"];

    // Insert data into the payment table
    $sql = "INSERT INTO payment (patientid, appointmentid, paiddate, paidtime, paidamount, status, cardholder, cardnumber, cvvno, expdate) VALUES ('$patient_id', '$appointment_id', '$paid_date', '$paid_time', '$paid_amount', '$status', '$cardholder', '$card_number', '$cvv_no', '$exp_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Payment added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
