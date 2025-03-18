<?php 
include 'user_profil.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/tugaspwpb/imglogo/AV2.png">
    <link href="/tugaspwpb/css/user.css" rel="stylesheet">
    <script src="/tugaspwpb/js/style.js"></script>
    <title>Profil User</title>
</head>
<body>
    <div class="profile-container">
        <form action="user.php" method="POST" enctype="multipart/form-data">
            <img src="<?php echo htmlspecialchars($user['picture']); ?>" alt="Profile Picture" class="profile-pic" onclick="triggerFileUpload()">
            <input type="file" name="profile_picture" id="profileInput" accept="images/*" style="display: none;" onchange="this.form.submit()">
        </form>
        <h1>Halo, <?php echo htmlspecialchars($user['username']); ?></h1>
        <a href="index.php" class="back-button">Kembali ke Beranda</a>
        <a href="logout.php" class="logout-button">Logout</a>
    </div>
</body>
</html>
