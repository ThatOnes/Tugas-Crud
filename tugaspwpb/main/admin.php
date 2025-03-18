<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/tugaspwpb/css/admin.css" rel="stylesheet">
    <title>Halaman Admin</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-left">
        <img src="/ProjectRizky/imgLogo/1-removebg-preview.png" alt="Logo" class="logo">
            <h3>Admin</h3>
        </div>
        <div class="navbar-right">
            <a href="tambah.php" class="cta-button">Tambah Buku</a>
            <a href="/tugaspwpb/navbar/index.php" class="cta-button" onclick="confirmLogout(event)">Logout</a>
        </div>
    </nav>

    <!-- Title -->
    <div class="container" style="text-align: center;">
        <h1>Database MangaVerse</h1>
    </div>

    <!-- Search bar -->
    <div class="search-bar">
        <input 
            type="text" 
            id="searchBar" 
            placeholder="Cari sesuatu..." 
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
                    <th>Judul manga</th>
                    <th>Genre </th>
                    <th>Gambar</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php 
                include 'koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT * FROM buku");
                while ($d = mysqli_fetch_array($data)) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($no++); ?></td>
                        <td><?php echo htmlspecialchars($d['judul']); ?></td>
                        <td><?php echo htmlspecialchars($d['genre']); ?></td>
                        <td>
                            <!-- Menampilkan gambar jika ada -->
                            <?php if ($d['gambar']) { ?>
                                <img src="images/<?php echo $d['gambar']; ?>" alt="Gambar Buku">
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

    <footer>
    <div>
    <img src="/ProjectRizky/imgLogo/1-removebg-preview.png" alt="Logo Footer" width="100" height="auto">
        <p>&copy; 2025 MangaVerse. Semua Hak Dilindungi.</p>
    </div>
</footer>

    <script>
        function confirmDeletion(event) {
            const userConfirmed = confirm("Apakah Anda yakin ingin menghapus data ini?");
            if (!userConfirmed) {
                event.preventDefault();
            }
        }

        function confirmLogout(event) {
            const userConfirmed = confirm("Apakah Anda yakin ingin logout?");
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
