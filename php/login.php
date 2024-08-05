<?php
require 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query_sql = "SELECT * FROM petugas WHERE username = '$username' AND password = '$password'";

$result = mysqli_query($conn, $query_sql);

if (mysqli_num_rows($result) > 0) {
    header("Location: dashboard.php");
} else {
    echo "<center><h1>Username atau Password anda salah</h1></center>";
}
?>
