<?php
require_once '../../config/database.php';

$conn = db_connect();
$result = mysqli_query($conn, "SELECT * FROM patients"); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Patients</title>
    <?php include '../includes/style.php'; ?>
</head>

<body>



    <div class="container ">
        <?php include '../includes/sidebar.php'; ?>


        <div class="main flex flex-col items-center gap-8">
            
            <h1 class="text-4xl font-bold text-gray-800 mb-8 float-start">Patients</h1>

            
            <div class="w-full min-w-[100%] mt-6 overflow-hidden rounded-lg border border-gray-700">
                <table class="w-full border-collapse text-sm text-gray-200 bg-[#2b2b2b]">
                    <thead class="bg-[#333]">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold">Id</th>
                            <th class="px-4 py-3 text-left font-semibold">Name</th>
                            <th class="px-4 py-3 text-left font-semibold">Email</th>
                            <th class="px-4 py-3 text-left font-semibold">Phone</th>
                            <th class="px-4 py-3 text-left font-semibold">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-700">
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr class="hover:bg-gray-700/40 transition">
                                <td class="px-4 py-3"><?= htmlspecialchars($row['id']) ?></td>
                                <td class="px-4 py-3"><?= htmlspecialchars($row['name']) ?></td>
                                <td class="px-4 py-3"><?= htmlspecialchars($row['email']) ?></td>
                                <td class="px-4 py-3"><?= htmlspecialchars($row['phone']) ?></td>
                                <td class="px-4 py-3 flex gap-3">
                                       <a href="edit.php?id=<?= $row['id'] ?>"
                                        class="text-blue-400 hover:text-blue-500 font-medium">
                                        Edit
                                    </a>
                                    <a href="delete.php?id=<?= $row['id'] ?>"
                                        class="text-red-400 hover:text-red-500 font-medium"
                                        onclick="return confirm('Delete this record?')">
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