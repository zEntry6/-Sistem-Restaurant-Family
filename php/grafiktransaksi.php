<?php
$servername = "localhost";
$username = "root";
$password = ""; // Ganti sesuai dengan password database Anda
$dbname = "restaurant_family"; // Ganti sesuai dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil total transaksi
$sql = "SELECT SUM(total_harga) as total FROM transaction";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data dari setiap baris
    $row = $result->fetch_assoc();
    echo json_encode(array("total" => $row['total']));
} else {
    echo json_encode(array("total" => 0));
}

$conn->close();
?>
