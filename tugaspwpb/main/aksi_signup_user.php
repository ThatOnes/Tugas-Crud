<?php
include 'koneksi.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi password konfirmasi
    if ($password !== $confirm_password) {
        echo json_encode(['status' => 'error', 'message' => 'Password dan konfirmasi password tidak cocok!']);
        exit();
    }

    // Periksa apakah username sudah ada
    $result_check = mysqli_query($koneksi, "SELECT 1 FROM userav WHERE username = '$username'");
    if (mysqli_num_rows($result_check) > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Username sudah terdaftar!']);
        exit();
    }

    // Dapatkan ID baru
    $result_max_id = mysqli_query($koneksi, "SELECT MAX(ID) + 1 AS new_id FROM userav");
    $row = mysqli_fetch_assoc($result_max_id);
    $new_id = $row['new_id'] ?? 1;

    // Simpan data pengguna ke database
    $query_insert = "INSERT INTO userav (ID, username, password) VALUES ('$new_id', '$username', '$password')";
    if (mysqli_query($koneksi, $query_insert)) {
        // Berhasil, kirim respons dengan URL tujuan
        echo json_encode(['status' => 'success', 'message' => 'Registrasi berhasil! Silakan login.', 'redirect' => 'user_page.php']);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Terjadi kesalahan saat mendaftar!',
            'debug' => mysqli_error($koneksi)
        ]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Akses tidak valid!']);
}
?>
