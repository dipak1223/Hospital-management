<!DOCTYPE html>
<html>
<head>
    <title>Add Payment</title>
</head>
<body>
    <h2>Add Payment</h2>
    <form action="save_payment.php" method="post">
        <label for="patient_id">Patient Name:</label>
        <select name="patient_id" required>
            <option value="">Select Patient</option>
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

            // Fetch patient IDs and names from the database
            $sql = "SELECT patientid, patientname FROM patient";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['patientid'] . "'>" . $row['patientname'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <label for="appointment_id">Appointment:</label>
        <select name="appointment_id" required>
            <option value="">Select Appointment</option>
            <?php
            // Establish a new database connection (use the same credentials)
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch appointment IDs from the appointment table
            $sql = "SELECT appointmentid FROM appointment";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['appointmentid'] . "'>" . $row['appointmentid'] . "</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <label for="paid_date">Payment Date:</label>
        <input type="date" name="paid_date" required><br><br>

        <label for="paid_time">Payment Time:</label>
        <input type="time" name="paid_time" required><br><br>

        <label for="paid_amount">Paid Amount:</label>
        <input type="number" step="0.01" name="paid_amount" required><br><br>

        <label for="status">Status:</label>
        <input type="text" name="status" required><br><br>

        <label for="cardholder">Cardholder:</label>
        <input type="text" name="cardholder" required><br><br>

        <label for="card_number">Card Number:</label>
        <input type="text" name="card_number" required><br><br>

        <label for="cvv_no">CVV Number:</label>
        <input type="text" name="cvv_no" required><br><br>

        <label for="exp_date">Expiration Date:</label>
        <input type="date" name="exp_date" required><br><br>

        <input type="submit" name="add_payment" value="Add Payment">
    </form>

    <?php
    if (isset($_POST['add_payment'])) {
        // Establish a database connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $patient_id = $_POST['patient_id'];
        $appointment_id = $_POST['appointment_id'];
        $paid_date = $_POST['paid_date'];
        $paid_time = $_POST['paid_time'];
        $paid_amount = $_POST['paid_amount'];
        $status = $_POST['status'];
        $cardholder = $_POST['cardholder'];
        $card_number = $_POST['card_number'];
        $cvv_no = $_POST['cvv_no'];
        $exp_date = $_POST['exp_date'];

        $sql = "INSERT INTO payment (patientid, appointmentid, paiddate, paidtime, paidamount, status, cardholder, cardnumber, cvvno, expdate) VALUES ('$patient_id', '$appointment_id', '$paid_date', '$paid_time', '$paid_amount', '$status', '$cardholder', '$card_number', '$cvv_no', '$exp_date')";

        if ($conn->query($sql) === TRUE) {
            echo "Payment added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
</body>
</html>
