<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Ambil data user dari sesi
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$picture = $_SESSION['picture'];

// Jika ada permintaan untuk mengunggah foto profil baru
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_picture'])) {
    $file = $_FILES['profile_picture'];
    $upload_dir = '../images/uploads/';

    // Pastikan direktori upload ada
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    $file_name = uniqid() . '_' . basename($file['name']);
    $target_file = $upload_dir . $file_name;

    // Validasi dan unggah file
    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        // Perbarui gambar profil di database
        $query = "UPDATE userav SET picture = '$file_name' WHERE ID = $user_id";
        mysqli_query($koneksi, $query);

        // Perbarui sesi
        $_SESSION['picture'] = $file_name;
        header('Location: user_page.php');
        exit;
    } else {
        $error = 'Gagal mengunggah foto. Coba lagi.';
    }
}

// Tombol logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}
?>