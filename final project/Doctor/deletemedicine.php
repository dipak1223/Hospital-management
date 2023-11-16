<!DOCTYPE html>
<html>
<head>
    <title>Delete Medicine</title>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this medicine?");
        }
    </script>
</head>
<body>
    <?php
    // Check if medicineid is provided in the URL
    if (isset($_GET['medicineid'])) {
        $medicineid = $_GET['medicineid'];

        // Establish a database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "final";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Delete medicine record from the database
        $sql = "DELETE FROM medicine WHERE medicineid = $medicineid";

        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    alert('Medicine deleted successfully');
                    window.location.href = 'medicinelist.php';
                  </script>";
        } else {
            echo "Error deleting record: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Medicine ID not provided.";
    }
    ?>
</body>
</html>
