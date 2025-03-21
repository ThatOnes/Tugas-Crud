<?php
include 'koneksi.php';

// Mendapatkan ID dari form
$ID = $_POST['ID'];
$judul = $_POST['judul'];
$genre = $_POST['genre'];
$episode = $_POST['episode'];

// Menangani pengunggahan gambar
if ($_FILES['gambar']['name']) {
    $gambar = $_FILES['gambar']['name'];
    $gambarTmp = $_FILES['gambar']['tmp_name'];
    $gambarPath = '../images/image/' . $gambar;

    // Pindahkan gambar ke folder 'images'
    if (move_uploaded_file($gambarTmp, $gambarPath)) {
        // Query untuk update data termasuk gambar baru
        $query = "UPDATE dbav SET judul = '$judul', genre = '$genre', episode = '$episode', gambar = '$gambarPath' WHERE ID = '$ID'";
    } else {
        echo "Gagal mengunggah gambar.";
        exit;
    }
} else {
    // Jika gambar tidak diubah, tetap gunakan gambar yang lama
    $query = "UPDATE dbav SET judul = '$judul', genre = '$genre', episode = '$episode' WHERE ID = '$ID'";
}

// Eksekusi query update
if (mysqli_query($koneksi, $query)) {
    header("Location: admin.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>

