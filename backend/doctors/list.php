
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
        <?php  include '../includes/sidebar.php'; ?>
        
        
        <div class="main">
        
        <h1>doctors</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Department id</th>
    </tr>

<?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
        <td><?= htmlspecialchars($row['id']) ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['department_id']) ?></td>
    </tr>
<?php endwhile; ?>

</table>


    </div>

</div>

</body>
</html>
