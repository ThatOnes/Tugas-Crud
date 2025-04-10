<?php
include 'koneksi.php';

// Default jumlah item per halaman
$defaultItemsPerPage = 21;

// Ambil jumlah item per halaman dari request (jika ada)
$itemsPerPage = isset($_COOKIE['itemsPerPage']) ? (int)$_COOKIE['itemsPerPage'] : $defaultItemsPerPage;

// Ambil query pencarian dari input
$searchQuery = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';

// Hitung total item dan halaman untuk hasil pencarian
$totalItemsQuery = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM dbav WHERE judul LIKE '%$searchQuery%' OR genre LIKE '%$searchQuery%'");
$totalItems = mysqli_fetch_assoc($totalItemsQuery)['total'];
$totalPages = ceil($totalItems / $itemsPerPage);

// Halaman saat ini
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$currentPage = max(1, min($currentPage, $totalPages)); // Validasi halaman

// Data offset
$offset = ($currentPage - 1) * $itemsPerPage;
$data = mysqli_query($koneksi, "SELECT * FROM dbav WHERE judul LIKE '%$searchQuery%' OR genre LIKE '%$searchQuery%' LIMIT $offset, $itemsPerPage");
?>

<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);
$username = $is_logged_in ? $_SESSION['username'] : null;
$profile_picture = $is_logged_in ? ($_SESSION['picture'] ?: 'default.png') : null;

// Pastikan jalur file gambar benar
$profile_picture_path = $is_logged_in ? "/tugaspwpb/images/uploads/" . htmlspecialchars($profile_picture) : null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/script.js " defer></script>
    <link rel="stylesheet" href="../css/search.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <title>Pencarian Anime</title>
</head>
<body>

<?php include('navbar.php'); ?>

    <div class="search-bar" >
        <form action="search.php" method="GET" style="display: flex;">
            <input type="text" id="searchInput" name="search" placeholder="Cari anime..." value="<?php echo htmlspecialchars($searchQuery); ?>">
            <button type="submit">Cari</button>
        </form>
    </div>

    <section id="cover-anime" class="cover-anime">
        <h2>Hasil Pencarian: "<?php echo htmlspecialchars($searchQuery); ?>"</h2>
        <div class="gallery-container">
            <?php
            if (mysqli_num_rows($data) > 0) {
                while ($d = mysqli_fetch_assoc($data)) {
                    echo '<div class="anime-card">';
                    echo '<a href="preview.php?id=' . htmlspecialchars($d['ID']) . '">';
                    echo '<div class="card-overlay"></div>';
                    echo '<img src="../images/image/' . htmlspecialchars($d['gambar']) . '" alt="' . htmlspecialchars($d['judul']) . '">';
                    echo '<h3>' . htmlspecialchars($d['judul']) . '</h3>';
                    echo '<p>Genre: ' . htmlspecialchars($d['genre']) . '</p>';
                    echo '<p>Episode: ' . htmlspecialchars($d['episode']) . '</p>';
                    echo '</a>';
                    echo '</div>';
                }
            } else {
                echo '<p>Tidak ada hasil yang ditemukan untuk pencarian "' . htmlspecialchars($searchQuery) . '"</p>';
            }
            ?>
        </div>
    </section>

    <div class="pagination">
        <?php if ($currentPage > 2) { ?>
            <a href="?search=<?php echo urlencode($searchQuery); ?>&page=1" class="min">1</a>
        <?php } ?>
        <?php
        $startPage = max(1, min($currentPage - 1, $totalPages - 2));
        $endPage = min($totalPages, $startPage + 2);

        for ($i = $startPage; $i <= $endPage; $i++) {
            $activeClass = $i === $currentPage ? 'active' : '';
            echo '<a href="?search=' . urlencode($searchQuery) . '&page=' . $i . '" class="' . $activeClass . '">' . $i . '</a>';
        }
        ?>
        <?php if ($currentPage < $totalPages - 1) { ?>
            <a href="?search=<?php echo urlencode($searchQuery); ?>&page=<?php echo $totalPages; ?>" class="max"><?php echo $totalPages; ?></a>
        <?php } ?>
    </div>

<?php include('footer.php'); ?>

</body>
</html>
