<?php
session_start();
include 'koneksi.php';

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm_password'];

// Periksa apakah password dan konfirmasi password cocok
if ($password !== $confirmPassword) {
    header("Location: index.php?pesan=password_mismatch");
    exit();
}

// Cek apakah username sudah ada di tabel userav
$query = mysqli_query($koneksi, "SELECT * FROM userav WHERE username = '$username'");
$existingUser = mysqli_num_rows($query);

if ($existingUser > 0) {
    header("Location: index.php?pesan=username_taken");
    exit();
}

// Cari ID terbesar yang ada di database
$queryMaxID = mysqli_query($koneksi, "SELECT MAX(id) as max_id FROM userav");
$row = mysqli_fetch_assoc($queryMaxID);
$newID = $row['max_id'] + 1; // ID baru adalah ID terbesar + 1

if (!$newID) {
    $newID = 1; // Mulai dari 1 jika belum ada ID
}

// Set default profile picture
$defaultPicture = "picture/default.png";

// Query untuk menyimpan data pengguna baru
$queryInsert = "INSERT INTO userav (id, username, password, picture) VALUES ('$newID', '$username', '$password', '$defaultPicture')";
if (mysqli_query($koneksi, $queryInsert)) {
    $_SESSION['username'] = $username; // Set session username setelah pendaftaran
    header("Location: user.php");
    exit();
} else {
    // Jika terjadi kesalahan saat menyimpan data
    header("Location: index.php?pesan=error");
    exit();
}
?>
