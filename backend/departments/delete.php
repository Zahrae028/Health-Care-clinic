 <?php
 require_once '../../config/database.php'; 

 

 $conn = db_connect();

 $id = $_GET['id'];
        $stmt = mysqli_prepare(
            $conn,
            "DELETE FROM departments WHERE id = ?"
        );

        mysqli_stmt_bind_param($stmt,"i",$id);
        mysqli_stmt_execute($stmt); 

        echo "<script>location.href = 'list.php'</script>";
?>