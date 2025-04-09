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
    <link href="/tugaspwpb/css/admin.css" rel="stylesheet">
    <title>Halaman Admin</title>
</head>
<body>
<nav class="navbar">
    <div class="navbar-left">
        <?php if ($is_logged_in): ?>
            <div class="profile-container" onclick="location.href='user_page.php'">
                <img src="<?php echo $profile_picture_path; ?>" alt="Profile Picture" class="profile-picture" style="border-radius: 50%; width: 40px; height: 40px;">
                <span class="username"><?php echo htmlspecialchars($username); ?></span>
            </div>
        <?php endif; ?>
    </div>
    <div class="navbar-center">
        <img src="../images/logo/AV1.png" alt="Logo" class="logo">
    </div>
    <div class="navbar-right">
        <div class="tambah-data">
            <a href="tambah.php" class="cta-button">Tambah Data</a>
        </div>
    </div>
</nav>

    <!-- Title -->
    <div class="container" style="text-align: center;">
        <h1>Database AnimeVerse</h1>
    </div>

    <!-- Search bar -->
    <div class="search-bar">
        <input 
            type="text" 
            id="searchBar" 
            placeholder="Cari database..." 
            onkeyup="filterTable()"
        >
        <button onclick="filterTable()">Cari</button>
    </div>

    <!-- Table -->
    <div class="manga-gallery">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul Anime</th>
                    <th>Genre </th>
                    <th>episode</th>
                    <th>Gambar</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php 
                include 'koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM dbav");
                while ($d = mysqli_fetch_array($data)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($no++); ?></td>
                        <td><?php echo htmlspecialchars($d['judul']); ?></td>
                        <td><?php echo htmlspecialchars($d['genre']); ?></td>
                        <td><?php echo htmlspecialchars($d['episode']); ?></td>
                        <td>
                            <!-- Menampilkan gambar jika ada -->
                            <?php if ($d['gambar']) { ?>
                                <img src="../images/image/<?php echo $d['gambar']; ?>" alt="Gambar Buku">
                            <?php } else { ?>
                                Tidak ada gambar
                            <?php } ?>
                        </td>
                        <td class="buttons">
                            <a href="edit.php?ID=<?php echo $d['ID']; ?>" class="edit-button">Edit</a>
                            <a href="hapus.php?id=<?php echo $d['ID']; ?>" class="delete-button" onclick="showPopout(event, '<?php echo $d['ID']; ?>')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="popout" id="delete-popout">
    <div class="box">
        <p>Apakah Anda yakin ingin menghapus data ini?</p>
        <button class="confirm" onclick="confirmDeletion()">Ya, Hapus</button>
        <button class="cancel" onclick="closePopout()">Batal</button>
    </div>
</div>

<!-- footer -->

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

    <script>
let deleteId = null;

function showPopout(event, id) {
    event.preventDefault(); // Mencegah tautan default
    deleteId = id;
    const popout = document.getElementById('delete-popout');
    popout.style.display = 'flex'; // Menampilkan pop-up
}

function closePopout() {
    const popout = document.getElementById('delete-popout');
    popout.style.display = 'none'; // Menyembunyikan pop-up
    deleteId = null; // Reset ID
}

function confirmDeletion() {
    if (deleteId) {
        window.location.href = `hapus.php?id=${deleteId}`;
    }
}




        function filterTable() {
            const searchValue = document.getElementById("searchBar").value.toLowerCase();
            const rows = document.getElementById("tableBody").getElementsByTagName("tr");

            for (let i = 0; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName("td");
                let match = false;

                for (let j = 0; j < cells.length - 1; j++) {
                    if (cells[j].innerText.toLowerCase().includes(searchValue)) {
                        match = true;
                        break;
                    }
                }

                rows[i].style.display = match ? "" : "none";
            }
        }
    </script>
</body>
</html>
