
<?php
require_once '../../config/database.php';

$conn = db_connect();
$PatientCounter = mysqli_query($conn, "SELECT COUNT(*) FROM patients");
$PatientCounter = mysqli_query($conn, "SELECT COUNT(*) FROM doctors"); 
$PatientCounter = mysqli_query($conn, "SELECT COUNT(*) FROM patients"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f4f4f4;
        }

        .container {
            display: flex;
        }

        /* Sidebar */
        

        /* Main content */
        .main {
            flex: 1;
            padding: 20px;
        }

        .cards {
            display: flex;
            gap: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 5px;
            width: 200px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }
    </style>
    <?php include '../includes/style.php'; ?>
</head>

<body>

<div class="container">
<?php include '../includes/sidebar.php'; ?>
    <!-- SIDEBAR -->

    <!-- <div class="sidebar">
        <h2>Unity Care</h2>
        <a href="../dashboard/index.php">Dashboard</a>
        <a href="../patients/list.php">Patients</a>
        <a href="../doctors/list.php">Doctors</a>
        <a href="../departments/list.php">Departments</a>
    </div> -->

    <!-- MAIN CONTENT -->
    <div class="main">
        <h1>Dashboard</h1>

        <div class="cards">
            <div class="card">
                <h3>Total Patients</h3>
                <p>0</p>
            </div>

            <div class="card">
                <h3>Total Doctors</h3>
                <p>0</p>
            </div>

            <div class="card">
                <h3>Total Departments</h3>
                <p>0</p>
            </div>
        </div>
    </div>

</div>

</body>
</html>
