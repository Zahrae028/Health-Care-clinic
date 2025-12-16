<?php
require_once '../../config/database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    if ($name !== "") {
        $conn = db_connect();

        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO patients (name, email, phone) VALUES (?, ?, ?)"
        );

        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $phone);
        mysqli_stmt_execute($stmt); 

        echo "Patient added successfully";
    } else {
        echo "Name is required";
    }
}
?>

<h2>Add Patient</h2>

<form method="POST" >
    <input name="name" placeholder="Name" required><br><br>
    <input name="email" placeholder="Email"><br><br>
    <input name="phone" placeholder="Phone"><br><br>
    <button>Add Patient</button>
</form>
