<?php include 'user_page_code.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    <link href="../css/user_page.css" rel="stylesheet">
    <script src="../js/script.js"></script>
    <title>User Page</title>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>My Account<a href="index.php" class="back-arrow">&larr;</a></h1>
    </div>

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
        <?php if ($user_id == 0): ?>
                <button onclick="window.location.href='admin.php'">Halaman Admin</button>
        <?php endif; ?>
        <button onclick="showGiftSettingsPopout()">Settings</button>
        <button class="logout" onclick="showLogoutPopout()">Log Out</button>
    </div>
</div>

<div class="gift-popout" id="gift-settingsPopout">
    <div class="gift-box">
        <p>Under Construction</p>
        <img src="../images/logo/1.gif" alt="Gift" width="100" height="100">
        <button class="gift-cancel" onclick="hideGiftSettingsPopout()">Close</button>
    </div>
</div>



<div class="popout" id="logoutPopout">
    <div class="box">
        <p>Are you sure you want to logout?</p>
        <button class="confirm" onclick="confirmLogout()">Yes</button>
        <button class="cancel" onclick="hideLogoutPopout()">No</button>
    </div>
</div>




<footer class="footer" style="margin-top: 100px;">
      <div class="footer-container">
          <div class="footer-section">
              <h4>About Us</h4>
              <ul>
                  <li><a href="#">Our Story</a></li>
                  <li><a href="#">Team</a></li>
                  <li><a href="#">Careers</a></li>
              </ul>
          </div>
          <div class="footer-section">
              <h4>Services</h4>
              <ul>
                  <li><a href="#">Web Design</a></li>
                  <li><a href="#">Development</a></li>
                  <li><a href="#">Hosting</a></li>
              </ul>
          </div>
          <div class="footer-section">
              <h4>Contact</h4>
              <ul>
                  <li><a href="#">Email Us</a></li>
                  <li><a href="#">Support</a></li>
                  <li><a href="#">FAQs</a></li>
              </ul>
          </div>
      </div>
      <div class="footer-bottom">
          <p>&copy; 2025 AnimeVerse . All Rights Reserved.</p>
      </div>
    </footer> 
    </body>
</html>
