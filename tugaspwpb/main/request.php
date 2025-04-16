<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);
$username = $is_logged_in ? $_SESSION['username'] : null;
$profile_picture = $is_logged_in ? ($_SESSION['picture'] ?: 'default.png') : null;

// Pastikan jalur file gambar benar
$profile_picture_path = $is_logged_in ? "/tugaspwpb/images/uploads/" . htmlspecialchars($profile_picture) : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/tugaspwpb/images/logo/AV2.png">
    <link rel="stylesheet" href="../css/request.css">
    <link href="/tugaspwpb/css/navbar.css" rel="stylesheet">
    <script src="../js/script.js " defer></script>
    <title>Request Anime</title>
</head>
<body>
<?php include('navbar.php'); ?>

    <div class="new-new-container">
        <img src="../images/logo/kys.gif" alt="Anime Request" class="new-new-anime-image">
        <form class="new-new-back" id="animeForm">
    <div class="new-new-form-group">
        <label for="judul">Judul Anime:</label>
        <input type="text" id="judul" name="judul" class="new-new-redrod" required>
    </div>
    <div class="new-new-form-group">
        <label for="email">Email (Opsional):</label>
        <input type="email" id="email" name="email" class="new-new-redrod">
    </div>
    <button type="submit" class="new-new-btn">Request!</button>
</form>

<div id="overlay" class="overlay hidden">
    <div id="popup" class="popup">Request berhasil!</div>
</div>



        <p class="new-new-note">
            Untuk Anda yang ingin merequest streaming/link download FULL HD untuk anime lama/baru rilis yang belum ada di AnimeVerse saat ini, silahkan langsung isi formulir di atas, akan segera diposting 1-3 jam (di jam kerja jika admin online) dan akan ada pemberitahuan melalui email jika anda mengisi form email. 
            Request anime baru/lama dengan respon tercepat bisa kami lakukan untuk Anda dan untuk menambah list anime kami yang mungkin akan kami posting atau belum sempat kami posting, dan akan langsung kami posting saat itu juga dengan adanya request Anda.
        </p>
    </div>
<?php include('footer.php'); ?>
</body>
</html>
