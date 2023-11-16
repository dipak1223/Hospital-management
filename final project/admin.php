<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        #sidebar {
            height: 100vh;
            background: #343a40;
            color: white;
        }

        #content {
            transition: margin-left 0.5s;
            padding: 16px;
        }

        .navbar {
            background-color: #007bff;
        }

        .navbar-brand, .navbar-nav a {
            color: white;
        }

        .nav-link i {
            margin-right: 10px;
        }

        .h1 {
            margin-bottom: 20px;
            text-align: center;
            color: #007bff;
        }

        .icon-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .icon-container a {
            display: inline-block;
            width: 100%;
            max-width: 200px;
            border: 1px solid #007bff;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .icon-container i, .icon-container img {
            width: 100%;
            max-width: 150px;
            height: auto;
            margin: 0 auto;
            cursor: pointer;
        }

        .icon-caption {
            font-size: 14px;
            color: #495057;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand"  align="center" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <!-- You can add additional navigation links here if needed -->
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar" id="sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <!-- Removed the dashboard icon -->
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-10 ml-sm-auto px-4" id="content">
            <h1 class="h1">Admin Panel</h1>

            <div class="icon-container">
                <a href="Doctor/medicinelist.php">
                    <img src="doctor.png" alt="Doctors" title="Manage Doctors">
                    <div class="icon-caption">Manage Doctors</div>
                </a>
                <a href="patients.php">
                    <img src="patient.png" alt="Patients" title="Manage Patients">
                    <div class="icon-caption">Manage Patients</div>
                </a>
                <a href="medicines.php">
                    <img src="medicine.jpg" alt="Medicines" title="Manage Medicines">
                    <div class="icon-caption">Manage Medicines</div>
                </a>
            </div>

            <!-- Content goes here -->

        </main>
    </div>
</div>

<!-- Bootstrap JS and jQuery (Optional, but required for some Bootstrap features) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
