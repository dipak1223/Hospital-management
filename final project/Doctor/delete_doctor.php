<?php
// Check if doctor ID is provided in the URL
if (isset($_GET['id'])) {
    $doctor_id = $_GET['id'];

    // Establish a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "final";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete the doctor from the database
    $sql = "DELETE FROM doctor WHERE doctorid = $doctor_id";
    if ($conn->query($sql) === TRUE) {
        echo "<p>Doctor deleted successfully</p>";
		 // Redirect to the doctor list page after 2 seconds
                        header("refresh:0; url=doctorlist.php");
    } else {
        echo "Error deleting doctor: " . $conn->error;
    }

    $conn->close();
} else {
    echo "<p>Doctor ID not provided.</p>";
}
?>
<a href="doctorlist.php" class="btn btn-secondary mt-3">Back to Doctor List</a>
