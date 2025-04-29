<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_username'])) {
    $new_username = mysqli_real_escape_string($koneksi, $_POST['new_username']);
    
    $query = "UPDATE userav SET username = '$new_username' WHERE ID = $user_id";
    if (mysqli_query($koneksi, $query)) {
        $_SESSION['username'] = $new_username;
        header('Location: user_page.php');
        exit;
    } else {
        $error = 'Gagal mengubah username. Coba lagi.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/user_page.css" rel="stylesheet">
    <title>Change Username</title>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Ganti Username</h1>
    </div>
<form method="POST" class="form-container">
    <label for="new_username" class="form-label">Username Baru:</label>
    <input type="text" name="new_username" required class="form-input" value="<?php echo htmlspecialchars($username); ?>">
    
    <button type="submit" class="form-button">Ganti Username</button>
</form>

<button onclick="window.location.href='user_page.php'" class="back-button">Kembali</button>

</div>
</body>
</html>

