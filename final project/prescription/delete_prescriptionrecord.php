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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $prescription_record_id = $_GET['id'];

    // SQL query to delete data from the 'prescription_records' table
    $sql = "DELETE FROM prescription_records WHERE prescription_record_id = $prescription_record_id";

    if ($conn->query($sql) === TRUE) {
        echo "Prescription record with ID: $prescription_record_id has been deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
