<?php
require_once '../../config/database.php';

$conn = db_connect();
$PatientCounter = mysqli_query($conn, "SELECT COUNT(*) FROM patients");
$PatientCounter = mysqli_query($conn, "SELECT COUNT(*) FROM doctors");
$PatientCounter = mysqli_query($conn, "SELECT COUNT(*) FROM patients");

$query = "SELECT departments.name AS name, COUNT(doctors.id) AS total
    FROM departments
    LEFT JOIN doctors ON doctors.department_id = departments.id
    GROUP BY departments.id";

$labels = [];
$percentages = [];

$result = mysqli_query($conn, $query);

$totalDoctors = 0;
$rows = [];

while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
    $totalDoctors += (int) $row['total'];
}

foreach ($rows as $row) {
    $labels[] = $row['name']; // ✅ FIXED
    $percentages[] = $totalDoctors > 0
        ? round(($row['total'] / $totalDoctors) * 100, 2)
        : 0;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  


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
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
    </style>
    <?php include '../includes/style.php'; ?>
</head>

<body>

    <div class="container w-full flex">
        <?php include '../includes/sidebar.php'; ?>
        <?php include 'count.php'; ?>

        <div class="main flex-1 p-8">

            <h1 class="text-4xl font-bold text-gray-900 mb-8">Dashboard</h1>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div
                    class="bg-gradient-to-r from-blue-500 to-blue-700 rounded-xl shadow-lg p-6 text-white flex flex-col items-start transition-transform transform hover:scale-105">
                    <h3 class="text-lg font-semibold mb-2">Total Patients</h3>
                    <p class="text-3xl font-bold"><?= htmlspecialchars($totalPatients) ?></p>
                </div>

                <div
                    class="bg-gradient-to-r from-green-500 to-green-700 rounded-xl shadow-lg p-6 text-white flex flex-col items-start transition-transform transform hover:scale-105">
                    <h3 class="text-lg font-semibold mb-2">Total Doctors</h3>
                    <p class="text-3xl font-bold"><?= htmlspecialchars($totalDoctors) ?></p>
                </div>

                <!-- Total Departments -->
                <div
                    class="bg-gradient-to-r from-purple-500 to-purple-700 rounded-xl shadow-lg p-6 text-white flex flex-col items-start transition-transform transform hover:scale-105">
                    <h3 class="text-lg font-semibold mb-2">Total Departments</h3>
                    <p class="text-3xl font-bold"><?= htmlspecialchars($totalDepartments) ?></p>

                </div>
            </div>

            <div class="chart-container mx-auto my-6" style="max-width: 400px;">
    <canvas id="myChart"></canvas>
</div>

        </div>
    </div>

</body>
  <script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
    type: 'doughnut', // <-- change from 'bar' to 'doughnut'
    data: {
        labels: <?= json_encode($labels) ?>,
        datasets: [{
            label: 'Doctors per Department (%)',
            data: <?= json_encode($percentages) ?>,
            backgroundColor: [
                '#3b82f6',
                '#22c55e',
                '#eab308',
                '#a855f7',
                '#ef4444',
                '#14b8a6'
            ],
            borderWidth: 1
        }]
    },
    options: {
        plugins: {
            tooltip: {
                callbacks: {
                    label: function(context) {
                        return context.label + ': ' + context.parsed + '%';
                    }
                }
            },
            legend: {
                position: 'bottom', // optional, moves legend below
                labels: {
                    boxWidth: 20,
                    padding: 15
                }
            }
        }
    }
});
</script>

</html>