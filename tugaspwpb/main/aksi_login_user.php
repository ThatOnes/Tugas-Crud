<?php
session_start();
include 'koneksi.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa username dan password
    $query = "SELECT * FROM userav WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        // Jika login berhasil
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['ID'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['picture'] = $user['picture'];

        echo json_encode(['status' => 'success', 'message' => 'Login berhasil!', 'redirect' => 'user_page.php']);
    } else {
        // Jika username atau password salah
        echo json_encode(['status' => 'error', 'message' => 'Username atau password salah!']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Akses tidak valid!']);
}
?>
