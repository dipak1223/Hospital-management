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

// Processing login data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginid = $_POST['loginid'];
    $password = $_POST['password'];

    // SQL query to check if the login credentials are valid
    $sql = "SELECT * FROM doctor WHERE loginid = '$loginid' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Redirect to another page (replace 'dashboard.php' with the desired page)
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid login credentials";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Doctor Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Doctor Login</h1>
    <form action="doctor_login.php" method="post">
        <div class="form-group">
            <label for="loginid">Login ID:</label>
            <input type="text" class="form-control" id="loginid" name="loginid" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
</div>

<!-- Bootstrap JS and jQuery (Optional, but required for some Bootstrap features) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
