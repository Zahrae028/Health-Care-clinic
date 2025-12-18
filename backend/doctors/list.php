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

    <div class="container  w-full flex">
        <?php include '../includes/sidebar.php'; ?>


        <div class="main flex flex-col items-center w-full gap-8">

            <h1 class="text-4xl font-bold text-gray-800 mb-8">Doctors</h1>

           
            <div class="w-full mt-6 overflow-hidden rounded-lg border border-gray-700">
                <table class="w-full border-collapse text-sm self-center text-gray-200 bg-[#2b2b2b] ">
                    <thead class="bg-[#333]">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold">Id</th>
                            <th class="px-4 py-3 text-left font-semibold">Name</th>
                            <th class="px-4 py-3 text-left font-semibold">Email</th>
                            <th class="px-4 py-3 text-left font-semibold">Department</th>
                            <th class="px-4 py-3 text-left font-semibold">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-700">
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr class="hover:bg-gray-700/40 transition">
                                <td class="px-4 py-3"><?= htmlspecialchars($row['id']) ?></td>
                                <td class="px-4 py-3"><?= htmlspecialchars($row['name']) ?></td>
                                <td class="px-4 py-3"><?= htmlspecialchars($row['email']) ?></td>
                                <td class="px-4 py-3"><?= htmlspecialchars($row['department_id']) ?></td>
                                <td class="px-4 py-3 flex gap-3">
                                    <a href="edit.php?id=<?= $row['id'] ?>"
                                        class="text-blue-400 hover:text-blue-500 font-medium">
                                        Edit
                                    </a>
                                    <a href="delete.php?id=<?= $row['id'] ?>"
                                        class="text-red-400 hover:text-red-500 font-medium"
                                        onclick="return confirm('Delete this doctor?')">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

                 <?php include 'add.php'; ?>

        </div>

    </div>

</body>

</html>