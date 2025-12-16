<?php

function db_connect() {
    $conn = mysqli_connect("localhost", "root", "", "unity_care");

    if (!$conn) {
        die("Database connection failed");
    }

    return $conn;
}