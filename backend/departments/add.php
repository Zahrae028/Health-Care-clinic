<?php
require_once '../../config/database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name  = trim($_POST['name']);
    $description = trim($_POST['description']);

    if ($name !== "") {
        $conn = db_connect();

        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO departments (name, description) VALUES (?, ?)"
        );

        mysqli_stmt_bind_param($stmt, "ss", $name, $description);
        mysqli_stmt_execute($stmt); 

        
        echo "<script>location.href = 'list.php'</script>";
        echo "Doctor added successfully";
    } else {
        echo "Name is required";
    }
}
?>

<h2>Add Department</h2>

<form action="" method="POST" >
    <input name="name" placeholder="Name" required><br><br>
    <input name="description" placeholder="Description"><br><br>
  
    <button>Add Department</button>
</form>
