<?php
session_start();
include 'koneksi.php';

$is_logged_in = isset($_SESSION['user_id']);
$user_id = $is_logged_in ? $_SESSION['user_id'] : null;

$subs = 0; // Default subscription status

if ($is_logged_in) {
    // Ambil status subscription user dari database
    $query = "SELECT subs FROM userav WHERE id = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($subs);
    $stmt->fetch();
    $stmt->close();
}

// Proses pembelian subscription
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $is_logged_in) {
    $query = "UPDATE userav SET subs = 1 WHERE id = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $user_id);
    if ($stmt->execute()) {
        $_SESSION['subs'] = 1;
        $subs = 1;
        $success_message = "Anda berhasil membeli subscription!";
    } else {
        $error_message = "Terjadi kesalahan. Silakan coba lagi.";
    }
    $stmt->close();
}

$username = $is_logged_in ? $_SESSION['username'] : null;
$profile_picture = $is_logged_in ? ($_SESSION['picture'] ?: 'default.png') : null;
$profile_picture_path = $is_logged_in ? "/tugaspwpb/images/uploads/" . htmlspecialchars($profile_picture) : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="/tugaspwpb/images/logo/AV2.png">
    <script src="../js/script.js " defer></script>
    <title>Subscription</title>
</head>
<body>
    <?php include('navbar.php'); ?>

    <section class="subscription-section">
        <div class="container">
            <h1>Apa itu Subscription?</h1>
            <p>Subscription di AnimeVerse memungkinkan Anda menikmati konten eksklusif, tanpa iklan, dan akses ke fitur premium lainnya.</p>
            <h2>Harga</h2>
            <p>Hanya Rp 29.900 per bulan!</p>

            <?php if (isset($success_message)) : ?>
                <div class="success-message"><?= htmlspecialchars($success_message); ?></div>
            <?php endif; ?>

            <?php if (isset($error_message)) : ?>
                <div class="error-message"><?= htmlspecialchars($error_message); ?></div>
            <?php endif; ?>

            <?php if (!$is_logged_in): ?>
                <button class="cta-button locked" disabled>Terkunci</button>
            <?php elseif ($subs == 1): ?>
                <div class="subscriber-message">
                    Anda sudah menjadi subscriber premium!
                </div>
            <?php else: ?>
                <form method="POST" action="subscription.php">
                    <button type="submit" class="cta-button">Beli Sekarang</button>
                </form>
            <?php endif; ?>
        </div>
    </section>

    <?php include('footer.php'); ?>
</body>
</html>
