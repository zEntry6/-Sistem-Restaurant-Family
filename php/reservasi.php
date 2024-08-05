<?php
    require 'koneksi.php';

    $full_name = $_POST['full_name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $meja = $_POST['meja'];
    $schedule = $_POST['schedule'];

    $query_sql = "INSERT INTO reservation (full_name, contact, email, alamat, meja, schedule) 
    VALUES ('$full_name', '$contact', '$email','$alamat', '$meja', '$schedule')";

    if (mysqli_query($conn, $query_sql)) {
        // Jika reservasi berhasil
        echo "<script>
            alert('Reservasi telah berhasil, Silahkan memilih menu untuk memesan');
            window.location.href = 'link_pemesanan_makanan.php'; // Ganti dengan link pemesanan makanan kamu
        </script>";
    } else {
        // Jika reservasi gagal
        echo "<script>
            alert('Pendaftaran Gagal: " . mysqli_error($conn) . "');
            window.history.back(); // Mengarahkan kembali ke halaman sebelumnya
        </script>";
    }
?>
