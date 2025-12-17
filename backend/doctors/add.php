<?php
require_once '../../config/database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $department_id = $_POST['department_id'];

    if ($name !== "") {
        $conn = db_connect();

        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO doctors (name, email, department_id) VALUES (?, ?, ?)"
        );

        mysqli_stmt_bind_param($stmt, "ssi", $name, $email, $department_id);
        mysqli_stmt_execute($stmt); 

        
        echo "<script>location.href = 'list.php'</script>";
        echo "Doctor added successfully";
    } else {
        echo "Name is required";
    }
}
?>

<h2>Add Doctor</h2>

<form action="" method="POST" >
    <input name="name" placeholder="Name" required><br><br>
    <input name="email" placeholder="Email"><br><br>
    <input name="department_id" placeholder="Department id"><br><br>
    <button>Add Doctor</button>
</form>
