<?php
                        // include '../config/db.php';

                        $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM patients");
                        $row = mysqli_fetch_assoc($result);
                        $totalPatients = $row['total'];
                        // include '../config/db.php';

                        $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM doctors");
                        $row = mysqli_fetch_assoc($result);
                        $totalDoctors = $row['total'];

                        $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM departments");
                        $row = mysqli_fetch_assoc($result);
                        $totalDepartments = $row['total'];
?>