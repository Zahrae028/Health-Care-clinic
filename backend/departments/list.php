
<?php
require_once '../../config/database.php';

$conn = db_connect();
$result = mysqli_query($conn, "SELECT * FROM departments"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>departments</title>
    <?php include '../includes/style.php'; ?>
</head>

<body>
    
    <div class="container">
        <?php  include '../includes/sidebar.php'; ?>
        
        
        <div class="main">
        
        <h1>departments</h1>
<?php include 'add.php'; ?>
<table border="1" cellpadding="10">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
    </tr>

<?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
        <td><?= htmlspecialchars($row['id']) ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= $row['description'] ?? 'no description'; ?></td>
        <td> <a href='delete.php?id=<?= $row['id']?>'
                                           class='inline-block text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-2 py-1 shadow-md transition-all'>
                                           Delete
                                        </a></td>
    </tr>
<?php endwhile; ?>

</table>


    </div>

</div>

</body>
</html>
