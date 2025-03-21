<?php
include 'koneksi.php';

// Mendapatkan ID maksimum dari database
$queryMaxID = "SELECT MAX(ID) AS maxID FROM dbav";
$result = mysqli_query($koneksi, $queryMaxID);
$row = mysqli_fetch_assoc($result);
$maxID = $row['maxID'];

// Menentukan ID baru
$newID = $maxID + 1;

// Mengambil data dari form
$judul = $_POST['judul'];
$genre = $_POST['genre'];
$episode = $_POST['episode'];
$gambar = "";

// Menangani pengunggahan gambar jika ada
if (!empty($_FILES['gambar']['name'])) {
    $gambar = $_FILES['gambar']['name'];
    $gambarTmp = $_FILES['gambar']['tmp_name'];
    $gambarPath = "../images/image/" . $gambar;

    // Pindahkan file gambar ke folder tujuan
    if (!move_uploaded_file($gambarTmp, $gambarPath)) {
        die("Gagal mengunggah gambar.");
    }
}

// Menyimpan data ke database
$query = "INSERT INTO dbav (ID, judul, genre, episode, gambar) 
          VALUES ('$newID', '$judul', '$genre', '$episode', '$gambar')";
if (mysqli_query($koneksi, $query)) {
    header("Location: admin.php"); // Redirect ke halaman admin
    exit();
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
