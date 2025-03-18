<?php
include 'koneksi.php';

// Ambil kata kunci pencarian dari parameter GET
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

// Query untuk mencari anime berdasarkan judul
$data = mysqli_query($koneksi, "SELECT * FROM buku WHERE judul LIKE '%$searchQuery%'");

echo '<section id="search-results" class="search-results">';
echo '<h2>Hasil Pencarian: "' . htmlspecialchars($searchQuery) . '"</h2>';
echo '<div class="gallery-container">';
echo '<div class="anime-grid" id="animeGrid">';

// Cek apakah ada hasil
if (mysqli_num_rows($data) > 0) {
    while ($d = mysqli_fetch_array($data)) {
        echo '<div class="anime-card">';
        echo '<a href="#">';
        echo '<div class="card-overlay"></div>';
        echo '<img src="images/' . htmlspecialchars($d['gambar']) . '" alt="' . htmlspecialchars($d['judul']) . '">';
        echo '<h3>' . htmlspecialchars($d['judul']) . '</h3>';
        echo '<p>Genre: ' . htmlspecialchars($d['genre']) . '</p>';
        echo '</a>';
        echo '</div>';
    }
} else {
    echo '<p>Tidak ada hasil untuk pencarian "' . htmlspecialchars($searchQuery) . '".</p>';
}

echo '</div>';
echo '</div>';
echo '</section>';
?>
