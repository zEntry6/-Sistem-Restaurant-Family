<?php
$servername = "localhost";
$username = "root";
$password = ""; // Ubah sesuai dengan password database Anda
$dbname = "restaurant_family"; // Ubah sesuai dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $productName = $_POST['nama_makanan'];
    $productStock = $_POST['productStock'];
    $productPrice = $_POST['productPrice'];

    // Menyiapkan query untuk memasukkan data
    $sql = "INSERT INTO daftar_menu (nama_makanan, stock, price) VALUES ('$productName', '$productStock', '$productPrice')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New record created successfully'); window.location.href='menu.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    

    $conn->close();
}
?>
