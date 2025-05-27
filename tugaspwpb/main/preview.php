<?php
include 'koneksi.php';

// Validasi dan ambil ID dari parameter GET
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Query untuk mengambil data anime berdasarkan ID
$query = mysqli_query($koneksi, "SELECT * FROM dbav WHERE id = $id");

// Cek apakah data ditemukan
if (mysqli_num_rows($query) > 0) {
    $anime = mysqli_fetch_assoc($query);
} else {
    die("Anime tidak ditemukan.");
}
?>


<?php
session_start();
include 'koneksi.php';

// Periksa apakah user login
$is_logged_in = isset($_SESSION['user_id']);
$user_subs = $is_logged_in ? ($_SESSION['subs'] ?? 0) : 0; // Subs user: 1 atau 0
$username = $is_logged_in ? $_SESSION['username'] : null;
$profile_picture = $is_logged_in ? ($_SESSION['picture'] ?: 'default.png') : null;

// Jalur gambar profil
$profile_picture_path = $is_logged_in ? "../images/uploads/" . htmlspecialchars($profile_picture) : null;

// Ambil data episode
$result = $koneksi->query("SELECT ID, episode, subs FROM episode WHERE ID >= 1 ORDER BY ID ASC");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="/tugaspwpb/images/logo/AV2.png">
    <link href="../css/navbar.css" rel="stylesheet">
    <link href="../css/preview.css" rel="stylesheet">
    <script src="../js/script.js" defer></script>
    <title>AnimeVerse</title>
</head>
<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <div class="image-container">
            <img src="../images/image/<?php echo htmlspecialchars($anime['gambar']); ?>" alt="<?php echo htmlspecialchars($anime['judul']); ?>">
        </div>
        <div class="details">
            <h1><?php echo htmlspecialchars($anime['judul']); ?></h1>
            <p><strong>Genre:</strong> <?php echo htmlspecialchars($anime['genre']); ?></p>
            <p><strong>Episode:</strong> <?php echo htmlspecialchars($anime['episode']); ?></p>
            <div class="description">
                <p><strong>Sinopsis:</strong></p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias ad Lorem ipsum dolor Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae reiciendis corrupti itaque atque rem recusandae labore cupiditate, modi vitae amet enim at cumque, est, id dolor! Neque dolor, inventore quibusdam sapiente nesciunt, optio ipsa at perferendis, voluptatum incidunt voluptate voluptas? sit amet consectetur adipisicing elit. Molestias, dolorum cum exercitationem sequi velit voluptas repellat ullam impedit molestiae reiciendis sapiente quia perspiciatis saepe amet eaque quod rem eligendi distinctio. Eius nihil possimus hic tenetur ipsum voluptatem obcaecati et nulla.</p>
            </div>
            <div>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <?php $can_access = $row['subs'] == 0 || $user_subs == 1; ?>
                        <div class="episode-item">
                            <span><?= htmlspecialchars($row['ID']) ?> - Episode <?= htmlspecialchars($row['episode']) ?></span>
                            <?php if ($can_access): ?>
                                <form method="POST" action="error.php">
                                    <input type="hidden" name="episode_id" value="<?= htmlspecialchars($row['ID']) ?>">
                                    <button type="submit" class="watch-btn">Tonton</button>
                                </form>
                            <?php else: ?>
                                <button class="watch-btn disabled" disabled>Upgrade untuk Menonton</button>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p style="text-align:center;">Tidak ada episode tersedia</p>
                <?php endif; ?>
            </div>
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
