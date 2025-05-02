<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$error = '';
$showPopup = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Verifikasi password
    $query = "SELECT password FROM userav WHERE ID = $user_id";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($password === $row['password']) {
            $showPopup = true; // Tampilkan popup untuk konfirmasi
        } else {
            $error = 'Password salah.';
        }
    } else {
        $error = 'Akun tidak ditemukan.';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_delete'])) {
    // Proses penghapusan akun setelah konfirmasi
    $delete_query = "DELETE FROM userav WHERE ID = $user_id";
    if (mysqli_query($koneksi, $delete_query)) {
        session_destroy(); // Hapus sesi
        header('Location: goodbye.php'); // Redirect ke halaman perpisahan
        exit;
    } else {
        $error = 'Gagal menghapus akun. Coba lagi.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/user_page.css" rel="stylesheet">
    <link href="../css/delete.css" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const overlay = document.getElementById('overlay');
            const confirmButton = document.getElementById('confirm-delete');
            const cancelButton = document.getElementById('cancel-delete');

            <?php if ($showPopup) : ?>
                overlay.style.display = 'flex';
            <?php endif; ?>

            cancelButton.addEventListener('click', () => {
                overlay.style.display = 'none';
            });

            confirmButton.addEventListener('click', () => {
                // Setujui form untuk disubmit dengan menambahkan hidden field untuk konfirmasi
                const form = document.getElementById('delete-form');
                const confirmDeleteInput = document.createElement('input');
                confirmDeleteInput.type = 'hidden';
                confirmDeleteInput.name = 'confirm_delete';
                confirmDeleteInput.value = '1';
                form.appendChild(confirmDeleteInput); // Tambahkan hidden input ke form
                form.submit(); // Submit form
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
            <input type="password" name="password" required class="form-input" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">
            <button type="submit" class="form-button">Lanjutkan</button>
        </form>
        <?php if (!empty($error)) : ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        <button onclick="window.location.href='user_page.php'" class="back-button">Kembali</button>
    </div>

    <!-- Popup -->
    <div class="overlay" id="overlay">
        <div class="popup">
            <p>Apakah Anda yakin ingin menghapus akun? Tindakan ini tidak dapat dibatalkan.</p>
            <button class="confirm-btn" id="confirm-delete">Ya, Hapus</button>
            <button class="cancel-btn" id="cancel-delete">Batal</button>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>
