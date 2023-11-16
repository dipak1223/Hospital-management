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

// Processing form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $medicinename = $_POST['medicinename'];
    $medicinecost = $_POST['medicinecost'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    // SQL query to insert data into the 'medicine' table
    $sql = "INSERT INTO medicine (medicinename, medicinecost, description, status) 
            VALUES ('$medicinename', '$medicinecost', '$description', '$status')";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to medicinelist.php after successful insertion
        header("Location: medicinelist.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Medicine</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 100%;
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            color: #007bff;
        }

        /* Beautify borders */
        input.form-control,
        textarea.form-control {
            border: 1px solid #007bff;
            border-radius: 5px;
        }

        /* Beautify Add Medicine button */
        button.btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 5px;
            font-weight: bold; /* Bold text */
        }

        button.btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-5" align="center">Add Medicine</h2>
        <form action="insertmedicine.php" method="post">
            <div class="form-group">
                <label for="medicinename">Medicine Name:</label>
                <input type="text" class="form-control" id="medicinename" name="medicinename" required>
            </div>

            <div class="form-group">
                <label for="medicinecost">Medicine Cost:</label>
                <input type="text" class="form-control" id="medicinecost" name="medicinecost" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" id="status" name="status" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Medicine</button>
        </form>
    </div>

    <!-- Bootstrap JS and jQuery (Optional, but required for some Bootstrap features) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
