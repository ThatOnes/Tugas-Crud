<?php
include 'koneksi.php';

// Mendapatkan ID dari form
$ID = $_POST['ID'];
$judul = $_POST['judul'];
$genre = $_POST['genre'];
$episode = $_POST['episode'];

// Folder tujuan untuk upload gambar
$uploadDir = '../images/image/';

// Menangani pengunggahan gambar
if ($_FILES['gambar']['name']) {
    $gambar = basename($_FILES['gambar']['name']); // Ambil nama file saja
    $gambarTmp = $_FILES['gambar']['tmp_name'];
    $gambarPath = $uploadDir . $gambar;

    // Pindahkan gambar ke folder tujuan
    if (move_uploaded_file($gambarTmp, $gambarPath)) {
        // Query untuk update data termasuk gambar baru
        $query = "UPDATE dbav SET judul = '$judul', genre = '$genre', episode = '$episode', gambar = '$gambar' WHERE ID = '$ID'";
    } else {
        echo "<script>
            alert('Gagal mengunggah gambar.');
            window.location.href = 'admin.php';
        </script>";
        exit;
    }
} else {
    // Jika gambar tidak diubah, tetap gunakan gambar yang lama
    $query = "UPDATE dbav SET judul = '$judul', genre = '$genre', episode = '$episode' WHERE ID = '$ID'";
}

// Eksekusi query update
if (mysqli_query($koneksi, $query)) {
    // Tampilkan pesan popup dan redirect ke admin.php
    echo "<script>
        alert('Data berhasil diubah!');
        window.location.href = 'admin.php';
    </script>";
} else {
    // Tampilkan pesan error jika gagal
    echo "<script>
        alert('Gagal mengubah data: " . mysqli_error($koneksi) . "');
        window.location.href = 'admin.php';
    </script>";
}
?>
