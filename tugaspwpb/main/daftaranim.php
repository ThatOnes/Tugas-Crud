<?php
error_reporting(E_ERROR | E_PARSE);
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="/tugaspwpb/images/logo/AV2.png">
    <link href="/tugaspwpb/css/daftaranim.css" rel="stylesheet">
    <link href="/tugaspwpb/css/navbar.css" rel="stylesheet">
    <script src="../js/script.js" defer></script>
    <title>AnimeVerse</title>
</head>
<body>

<?php include('navbar.php'); ?>

<section class="intro">
    <div class="container">
        <h1>Daftar Anime AnimeVerse</h1>
        <p>Temukan dan nikmati berbagai anime dari berbagai genre.</p>
    </div>
</section>

<div class="search-bar">
    <form action="search.php" method="GET" style="display: flex;">
        <input type="text" id="searchInput" name="search" placeholder="Cari anime...">
        <button type="submit">Cari</button>
    </form>
</div>

<div class="sort-buttons">
    <button id="sortLetterBtn" class="sort-btn" onclick="openSortPopup()">
        <?php echo isset($_GET['sortLetter']) && $_GET['sortLetter'] ? htmlspecialchars($_GET['sortLetter']) : 'A-Z'; ?>
    </button>
    <button id="sortGenreBtn" class="sort-btn" onclick="openGenrePopup()">
        <?php echo isset($_GET['sortGenre']) && $_GET['sortGenre'] ? htmlspecialchars($_GET['sortGenre']) : 'Genre'; ?>
    </button>
    <button id="sortEpisodeBtn" class="sort-btn" onclick="openEpisodePopup()">
        <?php echo isset($_GET['sortEpisode']) && $_GET['sortEpisode'] ? htmlspecialchars($_GET['sortEpisode']) : 'Episode'; ?>
    </button>
    <button id="itemsPerPageBtn" class="sort-btn" onclick="openItemsPerPagePopup()">
         <?php echo isset($_GET['itemsPerPage']) && $_GET['itemsPerPage'] ? htmlspecialchars($_GET['itemsPerPage']) : 'Page'; ?>
    </button>
</div>



<!-- Popup Sort Huruf -->
<div id="sortPopup" class="popup">
    <div class="popup-content">
        <button class="close-btn" onclick="closeSortPopup()">X</button>
        <h3>Pilih Huruf</h3>
        <div class="sort-options">
            <?php foreach (range('A', 'Z') as $letter): ?>
                <button class="sort-option" onclick="setLetter('<?php echo $letter; ?>')"><?php echo $letter; ?></button>
            <?php endforeach; ?>
            <button class="sort-option" onclick="setLetter('')">All</button>
        </div>
    </div>
</div>


<!-- Popup Sort Genre -->
<div id="genrePopup" class="popup">
    <div class="popup-content">
        <button class="close-btn" onclick="closeGenrePopup()">X</button>
        <h3>Pilih Genre</h3>
        <div class="sort-options">
            <?php 
            $genres = ["Action", "Adventure", "Thriller", "Horror", "Fantasy", "Sci-Fi", "Comedy", "Sports", "Drama", "Romance", "Misteri", "Isekai"];
            foreach ($genres as $genre): ?>
                <button class="sort-option" onclick="setGenre('<?php echo $genre; ?>')"><?php echo $genre; ?></button>
            <?php endforeach; ?>
            <button class="sort-option" onclick="setGenre('')">All</button>
        </div>
    </div>
</div>

<!-- Popup Sort Episode -->
<div id="episodePopup" class="popup">
    <div class="popup-content">
        <button class="close-btn" onclick="closeEpisodePopup()">X</button>
        <h3>Pilih Episode</h3>
        <div class="sort-options">
            <button class="sort-option" onclick="setEpisode('100+')">100+</button>
            <button class="sort-option" onclick="setEpisode('50+')">50+</button>
            <button class="sort-option" onclick="setEpisode('20+')">20+</button>
            <button class="sort-option" onclick="setEpisode('10+')">10+</button>
            <button class="sort-option" onclick="setEpisode('movie')">Movie</button>
            <button class="sort-option" onclick="setEpisode('')">All</button>
        </div>
    </div>
</div>


<!-- Popup Pilihan Jumlah Tabel -->
<div id="itemsPerPagePopup" class="popup">
    <div class="popup-content">
        <button class="close-btn" onclick="closeItemsPerPagePopup()">X</button>
        <h3>Pilih Jumlah Tabel</h3>
        <div class="sort-options">
            <button class="sort-option" onclick="setItemsPerPage(10)">10</button>
            <button class="sort-option" onclick="setItemsPerPage(50)">50</button>
            <button class="sort-option" onclick="setItemsPerPage(100)">100</button>
            <button class="sort-option" onclick="setItemsPerPage('all')">All</button>
        </div>
    </div>
</div>



<main>
<?php
ob_start(); // Mulai output buffering

include 'koneksi.php';

// Default jumlah item per halaman
$defaultItemsPerPage = 100;

// Jika tidak ada parameter itemsPerPage di URL, reset cookie ke default 100
if (!isset($_GET['itemsPerPage'])) {
    setcookie('itemsPerPage', $defaultItemsPerPage, time() + (86400 * 30), "/");
    $itemsPerPage = $defaultItemsPerPage;
} else {
    // Jika ada parameter itemsPerPage, pakai dan update cookie
    $itemsPerPage = $_GET['itemsPerPage'] === 'all' ? PHP_INT_MAX : (int)$_GET['itemsPerPage'];
    setcookie('itemsPerPage', $itemsPerPage, time() + (86400 * 30), "/");
}

// Ambil parameter filter dari URL
$sortLetter = isset($_GET['sortLetter']) ? $_GET['sortLetter'] : '';
$sortGenre = isset($_GET['sortGenre']) ? $_GET['sortGenre'] : '';
$sortEpisode = isset($_GET['sortEpisode']) ? $_GET['sortEpisode'] : '';

// Query dasar
$query = "SELECT * FROM dbav WHERE 1=1";

// Tambahkan filter huruf jika ada
if ($sortLetter) {
    $query .= " AND judul LIKE '" . mysqli_real_escape_string($koneksi, $sortLetter) . "%'";
}

// Tambahkan filter genre jika ada
if ($sortGenre) {
    $query .= " AND genre LIKE '%" . mysqli_real_escape_string($koneksi, $sortGenre) . "%'";
}

// Tambahkan filter episode jika ada
if ($sortEpisode) {
    if ($sortEpisode === '100+') {
        $query .= " AND CAST(episode AS UNSIGNED) > 100";
    } elseif ($sortEpisode === '50+') {
        $query .= " AND CAST(episode AS UNSIGNED) > 50 AND CAST(episode AS UNSIGNED) <= 100";
    } elseif ($sortEpisode === '20+') {
        $query .= " AND CAST(episode AS UNSIGNED) > 20 AND CAST(episode AS UNSIGNED) <= 50";
    } elseif ($sortEpisode === '10+') {
        $query .= " AND CAST(episode AS UNSIGNED) > 10 AND CAST(episode AS UNSIGNED) <= 20";
    } elseif ($sortEpisode === 'movie') {
        $query .= " AND CAST(episode AS UNSIGNED) = 1";
    }
}

// Tambahkan limit berdasarkan jumlah item per halaman
if ($itemsPerPage !== PHP_INT_MAX) {
    $query .= " LIMIT $itemsPerPage";
}

// Eksekusi query
$data = mysqli_query($koneksi, $query);

// Tampilkan data
echo '<section id="cover-anime" class="cover-anime">';
echo '<h2>Daftar Anime</h2>';
echo '<div class="gallery-container">';
echo '<div class="anime-grid" id="animeGrid">';

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
    echo '<p style="text-align:center;">Belum Tersedia</p>';
}

echo '</div>';
echo '</div>';
echo '</section>';


ob_end_flush(); // Kirim semua output
?>


</main>

<?php include('footer.php'); ?>

</body>
</html>
