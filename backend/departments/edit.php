<?php
require_once '../../config/database.php'; 

$conn = db_connect();

$id = $_GET['id'];

$stmt = mysqli_prepare(
    $conn,
    "SELECT * FROM departments WHERE id = ?"
);

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt); 
$row = mysqli_fetch_assoc($result);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name  = trim($_POST['name']);
    $description = trim($_POST['description']);

    if ($name !== "") {
        $stmt = mysqli_prepare(
            $conn,
            "UPDATE departments SET name = ?, description = ? WHERE id = $id;"
        );

        mysqli_stmt_bind_param($stmt, "ss",  $name, $description);
        mysqli_stmt_execute($stmt); 

        
        echo "<script>location.href = 'list.php'</script>";
        echo "Department updated successfully";
    } else {
        echo "Name is required";
    }
}
// print_r($row);

?>
<!DOCTYPE html>
<html>

<head>
    <title>department</title>
    <?php include '../includes/style.php'; ?>
</head>
<body>
<div class="min-h-screen flex items-center justify-center bg-[#1e1e1e]">
    <div class="w-full max-w-md bg-[#2b2b2b] border border-gray-700 rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-200 mb-6 text-center">
            Edit Department
        </h2>

        <form action="" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm text-gray-400 mb-1">Name</label>
                <input
                    type="text"
                    name="name"
                    value="<?= htmlspecialchars($row['name']) ?>"
                    required
                    class="w-full rounded-md bg-[#333] border border-gray-600 px-3 py-2 text-sm text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-1">Description</label>
                <input
                    type="text"
                    name="description"
                    value="<?= htmlspecialchars($row['description']) ?>"
                    class="w-full rounded-md bg-[#333] border border-gray-600 px-3 py-2 text-sm text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            

            <button
                type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-md font-medium transition"
            >
                Update department
            </button>
        </form>
    </div>
</div>
</body>
</html>