<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php"); // Arahkan ke halaman utama jika belum login
    exit();
}

// Ambil data user dari database
$username = $_SESSION['username'];
$query = mysqli_query($koneksi, "SELECT * FROM userav WHERE username = '$username'");
$user = mysqli_fetch_assoc($query);

// Jika form untuk mengganti foto profil dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_picture'])) {
    $targetDir = "images/picture/"; // Folder penyimpanan gambar
    $profilePicture = $_FILES['profile_picture']['name'];
    $tempName = $_FILES['profile_picture']['tmp_name'];
    $targetFile = $targetDir . basename($profilePicture);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Periksa apakah file adalah gambar
    $check = getimagesize($tempName);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }

    // Periksa ukuran file (maks 2MB)
    if ($_FILES['profile_picture']['size'] > 2000000) {
        echo "File terlalu besar.";
        $uploadOk = 0;
    }

    // Izinkan format tertentu
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Hanya file JPG, JPEG, dan PNG yang diizinkan.";
        $uploadOk = 0;
    }

    // Jika semua OK, pindahkan file dan perbarui database
    if ($uploadOk == 1) {
        if (move_uploaded_file($tempName, $targetFile)) {
            // Perbarui URL gambar di database
            $updateQuery = "UPDATE userav SET picture = '$targetFile' WHERE username = '$username'";
            if (mysqli_query($koneksi, $updateQuery)) {
                $_SESSION['picture'] = $targetFile; // Perbarui sesi
                header("Location: user.php"); // Refresh halaman
                exit();
            } else {
                echo "Gagal memperbarui database.";
            }
        } else {
            echo "Terjadi kesalahan saat mengunggah file.";
        }
    }
}
?>
