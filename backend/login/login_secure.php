<?php
require_once '../../config/database.php';
session_start();

$conn = db_connect();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit;
}

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = mysqli_prepare(
  $conn,
  "SELECT * FROM users WHERE username = ? AND password = ?"
);

mysqli_stmt_bind_param($stmt, "ss", $username, $password);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {

    $user = mysqli_fetch_assoc($result);

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    header("Location: ../dashboard/index.php");
    exit;

} else {
    echo "❌ Login failed";
}
