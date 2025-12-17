<?php
require_once '../../config/database.php';

$conn = db_connect();
$result = mysqli_query($conn, "SELECT * FROM doctors"); ?>

<!DOCTYPE html>
<html>

<head>
    <title>doctors</title>
    <?php include '../includes/style.php'; ?>
</head>

<body>

    <div class="container">
        <?php include '../includes/sidebar.php'; ?>


        <div class="main">

            <h1>doctors</h1>

                <?php include 'add.php'; ?>

            <table border="1" cellpadding="10">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department id</th>
                </tr>

                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['department_id']) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="text-blue-400 hover:text-blue-500 font-medium">
                                Edit
                            </a>
                            
                            <a href='delete.php?id=<?= $row['id'] ?>'
                                class='inline-block text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-2 py-1 shadow-md transition-all'>
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>

            </table>


        </div>

    </div>

</body>

</html>