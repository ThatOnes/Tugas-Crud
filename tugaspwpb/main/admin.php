<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/tugaspwpb/css/admin.css" rel="stylesheet">
    <title>Halaman Admin</title>
</head>
<body>
<nav class="navbar">
    <div class="navbar-left">
    <button class="btn-login" onclick="openLoginModal()">Login</button>
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
                            <a href="hapus.php?id=<?php echo $d['ID']; ?>" class="delete-button" onclick="confirmDeletion(event)">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
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
        function confirmDeletion(event) {
            const userConfirmed = confirm("Apakah Anda yakin ingin menghapus data ini?");
            if (!userConfirmed) {
                event.preventDefault();
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
