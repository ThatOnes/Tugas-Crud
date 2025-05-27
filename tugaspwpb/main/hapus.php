<?php 
// Koneksi database
include 'koneksi.php';

// Menangkap data ID yang dikirim dari URL
$id = $_GET['id'];

// Menghapus data dari database
$query = "DELETE FROM dbav WHERE id='$id'";
if (mysqli_query($koneksi, $query)) {
    // Menampilkan popup dan mengalihkan ke halaman admin.php
    echo "<script>
        alert('Data berhasil dihapus!');
        window.location.href = 'admin.php';
    </script>";
} else {
    // Menampilkan pesan error jika gagal
    echo "<script>
        alert('Gagal menghapus data: " . mysqli_error($koneksi) . "');
        window.location.href = 'admin.php';
    </script>";
}
?>
