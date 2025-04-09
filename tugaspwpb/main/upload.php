<?php
include 'koneksi.php';  // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $judul = $_POST['judul'];
    $genre = $_POST['genre'];

    // Proses gambar
    $targetDir = "/ProjectRizky/cover";  // Folder tempat gambar disimpan
    $targetFile = $targetDir . basename($_FILES["gambar"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Validasi gambar
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if ($check === false) {
        echo "File yang diunggah bukan gambar.";
        exit;
    }

    // Cek ekstensi file
    $allowedTypes = array("jpg", "png", "jpeg", "gif");
    if (!in_array($imageFileType, $allowedTypes)) {
        echo "Hanya gambar dengan ekstensi JPG, JPEG, PNG, dan GIF yang diizinkan.";
        exit;
    }

    // Cek apakah file sudah ada
    if (file_exists($targetFile)) {
        echo "Maaf, file gambar sudah ada.";
        exit;
    }

    // Cek ukuran file (misalnya, 5MB)
    if ($_FILES["gambar"]["size"] > 5000000) {
        echo "Maaf, ukuran file gambar terlalu besar.";
        exit;
    }

    // Pindahkan gambar ke folder tujuan
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
        // Simpan informasi buku ke database
        $sql = "INSERT INTO buku (judul, genre, gambar) VALUES ('$judul', '$genre', '$targetFile')";
        if (mysqli_query($koneksi, $sql)) {
            echo "Buku berhasil ditambahkan!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        }
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah gambar.";
    }
}
?>
