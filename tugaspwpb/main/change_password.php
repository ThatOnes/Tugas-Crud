<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_password = mysqli_real_escape_string($koneksi, $_POST['current_password']);
    $new_password = mysqli_real_escape_string($koneksi, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($koneksi, $_POST['confirm_password']);
    
    // Validasi password baru
    if ($new_password !== $confirm_password) {
        $error = 'Password baru dan konfirmasi password tidak cocok.';
    } elseif (strlen($new_password) < 4) {
        $error = 'Password baru harus memiliki minimal 4 karakter.';
    } else {
        // Periksa password lama
        $query = "SELECT password FROM userav WHERE ID = $user_id";
        $result = mysqli_query($koneksi, $query);
        $user = mysqli_fetch_assoc($result);

        if ($current_password === $user['password']) {
            // Perbarui password di database tanpa hash
            $update_query = "UPDATE userav SET password = '$new_password' WHERE ID = $user_id";

            if (mysqli_query($koneksi, $update_query)) {
                $success = 'Password berhasil diubah.';
            } else {
                $error = 'Terjadi kesalahan saat mengubah password.';
            }
        } else {
            $error = 'Password lama tidak cocok.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/user_page.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="/tugaspwpb/images/logo/AV2.png">
    <title>Change Password</title>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Ganti Password</h1>
    </div>

    <form method="POST" class="form-container">
    <?php if (isset($error)): ?>
        <p class="error-message"><?php echo htmlspecialchars($error); ?></p>
    <?php elseif (isset($success)): ?>
        <p class="success-message"><?php echo htmlspecialchars($success); ?></p>
    <?php endif; ?>

    <label for="current_password" class="form-label">Password Lama:</label>
    <input type="password" name="current_password" required class="form-input">

    <label for="new_password" class="form-label">Password Baru:</label>
    <input type="password" name="new_password" required class="form-input">

    <label for="confirm_password" class="form-label">Konfirmasi Password Baru:</label>
    <input type="password" name="confirm_password" required class="form-input">

    <button type="submit" class="form-button">Ganti Password</button>
    </form>

    <button onclick="window.location.href='user_page.php'" class="back-button">Kembali</button>
</div>
<?php include('footer.php'); ?>
</body>
</html>
