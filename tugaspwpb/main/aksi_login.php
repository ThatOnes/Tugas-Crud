<?php
session_start();
include '../koneksi.php'; // Menghubungkan ke database

$username = $_POST['username'];
$password = $_POST['password'];

// Cek di tabel adminav
$data_admin = mysqli_query($koneksi, "SELECT * FROM adminav WHERE username = '$username' AND password = '$password'");
$cek_admin = mysqli_num_rows($data_admin);

if ($cek_admin > 0) {
    $_SESSION['username'] = $username; 
    $_SESSION['role'] = 'admin'; // Menambahkan role untuk admin
    header("location:../main/admin.php"); // Arahkan ke halaman admin
    exit();
}

// Cek di tabel userav
$data_user = mysqli_query($koneksi, "SELECT * FROM userav WHERE username = '$username' AND password = '$password'");
$cek_user = mysqli_num_rows($data_user);

if ($cek_user > 0) {
    $_SESSION['username'] = $username; 
    $_SESSION['role'] = 'user'; // Menambahkan role untuk user
    header("location:main/index.php"); // Tetap di halaman utama
    exit();
}

// Jika tidak ditemukan di kedua tabel
header("location:index.php?pesan=gagal");
exit();
?>
