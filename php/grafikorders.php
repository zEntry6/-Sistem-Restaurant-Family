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

// Mengambil jumlah total transaksi berdasarkan jumlah id_pesanan
$sql = "SELECT COUNT(id_pesanan) as total FROM orders";
$result = $conn->query($sql);

$total = 0;

if ($result && $row = $result->fetch_assoc()) {
    $total = $row['total'];
} else {
    echo "Error: " . $conn->error;
}

$conn->close();

// Mengirim data sebagai JSON
echo json_encode(array("total" => $total));
?>
