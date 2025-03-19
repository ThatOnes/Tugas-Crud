<?php
session_start();
session_destroy(); // Hapus semua sesi
header("location:index.php"); // Kembali ke halaman utama
exit();
?>
