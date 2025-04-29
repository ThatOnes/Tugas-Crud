<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Verifikasi password (tanpa hash)
    $query = "SELECT password FROM userav WHERE ID = $user_id";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($password === $row['password']) {
            // Hapus akun jika verifikasi benar
            $delete_query = "DELETE FROM userav WHERE ID = $user_id";
            if (mysqli_query($koneksi, $delete_query)) {
                session_destroy(); // Hapus sesi
                header('Location: goodbye.php'); // Redirect ke halaman perpisahan
                exit;
            } else {
                $error = 'Gagal menghapus akun. Coba lagi.';
            }
        } else {
            $error = 'Password salah.';
        }
    } else {
        $error = 'Akun tidak ditemukan.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/user_page.css" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', () => {
    const deleteButton = document.getElementById('delete-button');
    const deleteForm = document.getElementById('delete-form');

    deleteButton.addEventListener('click', () => {
        const confirmation = confirm('Apakah Anda yakin ingin menghapus akun? Tindakan ini tidak dapat dibatalkan.');
        if (confirmation) {
            deleteForm.submit();
        }
    });
});

    </script>
    <title>Delete Account</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Hapus Akun</h1>
        </div>
        <form method="POST" class="form-container" action="delete_account.php" id="delete-form">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" required class="form-input">
            <button type="button" class="form-button" id="delete-button">Hapus Akun</button>
        </form>
        <?php if (!empty($error)) : ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        <button onclick="window.location.href='user_page.php'" class="back-button">Kembali</button>
    </div>
</body>
</html>

