<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .print-bill {
            text-align: right;
        }
    </style>
</head>
<body>
    <h2>Invoice</h2>
    <table>
        <tr>
            <th>Payment ID</th>
            <th>Patient ID</th>
            <th>Appointment ID</th>
            <th>Paid Date</th>
            <th>Paid Time</th>
            <th>Paid Amount</th>
            <th>Status</th>
            <th>Cardholder</th>
            <th>Card Number</th>
            <th>CVV Number</th>
            <th>Expiration Date</th>
            <th></th>
        </tr>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "final";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM payment";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["paymentid"] . "</td>
                    <td>" . $row["patientid"] . "</td>
                    <td>" . $row["appointmentid"] . "</td>
                    <td>" . $row["paiddate"] . "</td>
                    <td>" . $row["paidtime"] . "</td>
                    <td>" . $row["paidamount"] . "</td>
                    <td>" . $row["status"] . "</td>
                    <td>" . $row["cardholder"] . "</td>
                    <td>" . $row["cardnumber"] . "</td>
                    <td>" . $row["cvvno"] . "</td>
                    <td>" . $row["expdate"] . "</td>
                    <td class='print-bill'><button class='print-row' data-paymentid='" . $row["paymentid"] . "' data-patientid='" . $row["patientid"] . "' data-appointmentid='" . $row["appointmentid"] . "' data-paiddate='" . $row["paiddate"] . "' data-paidtime='" . $row["paidtime"] . "' data-paidamount='" . $row["paidamount"] . "' data-status='" . $row["status"] . "' data-cardholder='" . $row["cardholder"] . "' data-cardnumber='" . $row["cardnumber"] . "' data-cvvno='" . $row["cvvno"] . "' data-expdate='" . $row["expdate"] . "'>Print Bill</button></td>
                </tr>";
            }
        }
        $conn->close();
        ?>
    </table>

    <script>
        const printButtons = document.querySelectorAll('.print-row');
        printButtons.forEach(button => {
            button.addEventListener('click', function() {
                const printWindow = window.open('', '', 'height=600,width=800');
                printWindow.document.write('<html><head><title>Print Bill</title></head><body>');
                printWindow.document.write('<h2>Invoice</h2>');
                printWindow.document.write('<p><strong>Payment ID:</strong> ' + this.getAttribute('data-paymentid') + '</p>');
                printWindow.document.write('<p><strong>Patient ID:</strong> ' + this.getAttribute('data-patientid') + '</p>');
                printWindow.document.write('<p><strong>Appointment ID:</strong> ' + this.getAttribute('data-appointmentid') + '</p>');
                printWindow.document.write('<p><strong>Paid Date:</strong> ' + this.getAttribute('data-paiddate') + '</p>');
                printWindow.document.write('<p><strong>Paid Time:</strong> ' + this.getAttribute('data-paidtime') + '</p>');
                printWindow.document.write('<p><strong>Paid Amount:</strong> ' + this.getAttribute('data-paidamount') + '</p>');
                printWindow.document.write('<p><strong>Status:</strong> ' + this.getAttribute('data-status') + '</p>');
                printWindow.document.write('<p><strong>Cardholder:</strong> ' + this.getAttribute('data-cardholder') + '</p>');
                printWindow.document.write('<p><strong>Card Number:</strong> ' + this.getAttribute('data-cardnumber') + '</p>');
                printWindow.document.write('<p><strong>CVV Number:</strong> ' + this.getAttribute('data-cvvno') + '</p>');
                printWindow.document.write('<p><strong>Expiration Date:</strong> ' + this.getAttribute('data-expdate') + '</p>');
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.print();
            });
        });
    </script>
</body>
</html>
