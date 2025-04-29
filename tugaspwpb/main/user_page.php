<?php include 'user_page_code.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="/tugaspwpb/images/logo/AV2.png">
    <link href="../css/user_page.css" rel="stylesheet">
    <link href="../css/navbar.css" rel="stylesheet">
    <script src="../js/script.js"></script>
    <title>User Page</title>
</head>
<body>
<div class="container">
<div class="header">
    <h1>My Account<a href="#" class="back-arrow" id="back-button">&larr;</a></h1>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const backButton = document.getElementById('back-button');
        if (document.referrer) {
            backButton.setAttribute('href', document.referrer);
        } else {
            backButton.style.display = 'none'; // Sembunyikan jika tidak ada halaman sebelumnya
        }
    });
</script>


    <div class="profile-section">
        <form method="POST" enctype="multipart/form-data">
            <!-- Input file langsung tersembunyi -->
            <input type="file" name="profile_picture" id="profile_picture" accept="image/*" style="display: none;" onchange="this.form.submit()">
            <!-- Label untuk input file berupa gambar -->
            <label for="profile_picture" style="cursor: pointer;">
                <?php if ($picture): ?>
                    <img src="../images/uploads/<?php echo htmlspecialchars($picture); ?>" alt="Profile Picture">
                <?php else: ?>
                    <p>Belum ada foto profil</p>
                <?php endif; ?>
            </label>
        </form>
        <p class="username">Username: <?php echo htmlspecialchars($username); ?></p>
    </div>

    <div class="actions">
    <button onclick="showSettingsPopout()">Settings</button>

        <!--
        <button onclick="window.location.href='pengaturan.php'">Settings</button>
        -->
        <?php if ($user_id == 0): ?>
                <button onclick="window.location.href='admin.php'">Halaman Admin</button>
        <?php endif; ?>
        <button onclick="window.location.href='index.php'">Kembali ke beranda</button>
        <button class="logout" onclick="showLogoutPopout()">Log Out</button>
    </div>
</div>

<div class="settings-popout" id="settings-popout">
    <div class="settings-box">
        <p style="font-weight: bolder; font-size: x-large; padding: 10px;">Settings</p>
        
        <!-- Tombol Pengaturan -->
        <button class="settings-button" onclick="window.location.href='/tugaspwpb/main/change_username.php'">Ganti Username</button>
        <button class="settings-button" onclick="window.location.href='/tugaspwpb/main/change_password.php'">Ganti Password</button>
        <button class="settings-button" onclick="window.location.href='/tugaspwpb/main/delete_account.php'">Hapus Akun</button>

        <button class="settings-button" onclick="hideSettingsPopout()">Close</button>
    </div>
</div>






<div class="popout" id="logoutPopout">
    <div class="box">
        <p>yakin ingin Logout?</p>
        <button class="confirm" onclick="confirmLogout()">Yes</button>
        <button class="cancel" onclick="hideLogoutPopout()">No</button>
    </div>
</div>
<?php include('footer.php'); ?>
    </body>
</html>
