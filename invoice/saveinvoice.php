

$<?php
// Assuming you have a database connection established
// Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials
$conn = new mysqli('localhost', 'root', '', 'final');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_name = $_POST['patient_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $paid_date = $_POST['paid_date'];
    $card_holder = $_POST['card_holder'];
    $cvv_no = $_POST['cvv_no'];
    $invoice_number = $_POST['invoice_number'];
    $invoice_date = $_POST['invoice_date'];
    $paid_time = $_POST['paid_time'];
    $paid_amount = $_POST['paid_amount'];
    $card_number = $_POST['card_number'];
    $expiry_date = $_POST['expiry_date'];

    // Insert the form data into the database
    $sql = "INSERT INTO invoices (patient_name, address, city, paid_date, card_holder, cvv_no, invoice_number, invoice_date, paid_time, paid_amount, card_number, expiry_date)
    VALUES ('$patient_name', '$address', '$city', '$paid_date', '$card_holder', '$cvv_no', '$invoice_number', '$invoice_date', '$paid_time', '$paid_amount', '$card_number', '$expiry_date')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
