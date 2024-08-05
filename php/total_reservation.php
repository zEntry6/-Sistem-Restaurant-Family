<?php

// File: get_total_reservations.php

header('Content-Type: application/json');

// Sertakan file koneksi database
require 'koneksi.php';

// Fungsi untuk mengambil total reservasi
function getTotalReservations($conn) {
    // Ganti query sesuai dengan struktur database Anda
    $get1 = mysqli_query($conn,"SELECT * FROM daftar_menu ");
    $count1 = mysqli_num_row($get1);
}

// Mengambil data total reservasi
$totalReservations = getTotalReservations($conn);

// Mengembalikan data dalam format JSON
echo json_encode(['total' => $totalReservations]);

// Menutup koneksi
$conn->close();
?>