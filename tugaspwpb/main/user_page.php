<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Ambil data user dari sesi
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$picture = $_SESSION['picture'];

// Jika ada permintaan untuk mengunggah foto profil baru
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_picture'])) {
    $file = $_FILES['profile_picture'];
    $upload_dir = '../images/uploads/';

    // Pastikan direktori upload ada
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    $file_name = uniqid() . '_' . basename($file['name']);
    $target_file = $upload_dir . $file_name;

    // Validasi dan unggah file
    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        // Perbarui gambar profil di database
        $query = "UPDATE userav SET picture = '$file_name' WHERE ID = $user_id";
        mysqli_query($koneksi, $query);

        // Perbarui sesi
        $_SESSION['picture'] = $file_name;
        header('Location: user_page.php');
        exit;
    } else {
        $error = 'Gagal mengunggah foto. Coba lagi.';
    }
}

// Tombol logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    <link href="../css/user_page.css" rel="stylesheet">
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
        <button>Settings</button>
        <?php if ($user_id == 0): ?>
            <button onclick="window.location.href='admin.php'">Halaman Admin</button>
        <?php endif; ?>
        <button class="logout" onclick="showLogoutPopout()">Log Out</button>
    </div>
</div>

<div class="popout" id="logoutPopout">
    <div class="box">
        <p>Are you sure you want to logout?</p>
        <button class="confirm" onclick="confirmLogout()">Yes</button>
        <button class="cancel" onclick="hideLogoutPopout()">No</button>
    </div>
</div>

    <script>
        function showLogoutPopout() {
            document.getElementById('logoutPopout').style.display = 'flex';
        }

        function hideLogoutPopout() {
            document.getElementById('logoutPopout').style.display = 'none';
        }

        function confirmLogout() {
            window.location.href = "user_page.php?logout=true";
        }
    </script>

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
