<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $query_sql = "UPDATE reservation SET status = '$status' WHERE id = '$id'";
    if (mysqli_query($conn, $query_sql)) {
        header("Location: dashboard.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
