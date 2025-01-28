<?php
include 'koneksi.php';

// Mengambil data dari form
$ID = $_POST['ID'];
$judul = $_POST['judul'];
$genre = $_POST['genre'];

// Menangani pengunggahan gambar
$gambar = $_FILES['gambar']['name'];
$gambarTmp = $_FILES['gambar']['tmp_name'];
$gambarPath = 'images/' . $gambar;

// Jika ada gambar yang diunggah, pindahkan gambar ke folder 'images'
if ($gambar) {
    move_uploaded_file($gambarTmp, $gambarPath);
}

// Menyimpan data buku ke dalam database
$query = "INSERT INTO buku (ID, judul, genre, gambar) VALUES ('$ID', '$judul', '$genre', '$gambar')";
mysqli_query($koneksi, $query);

// Mengalihkan ke halaman admin.php setelah data disimpan
header("Location: admin.php");
exit();
?>
