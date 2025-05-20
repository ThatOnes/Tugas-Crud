<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);
$username = $is_logged_in ? $_SESSION['username'] : 'Guest';
$profile_picture = $is_logged_in ? ($_SESSION['picture'] ?: 'default.png') : 'default.png';
$profile_picture_path = "/images/uploads/" . htmlspecialchars($profile_picture);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <img src="images/logo.png" alt="Logo" class="logo">
            <h1 class="brand-name">AnimeVerse</h1>
        </div>
        <div class="admin-profile">
            <img src="<?php echo $profile_picture_path; ?>" alt="Profile Picture" class="admin-picture">
            <span class="admin-name"><?php echo htmlspecialchars($username); ?></span>
        </div>
        <nav class="nav-links">
            <a href="dashboard.php"><i class="icon">🏠</i> Dashboard</a>
            <a href="tambah.php"><i class="icon">➕</i> Tambah Data</a>
            <a href="user_page.php"><i class="icon">👤</i> Profil</a>
            <a href="logout.php"><i class="icon">🚪</i> Keluar</a>
        </nav>
    </div>

    <div class="main-content">
        <header>
            <h2>Database AnimeVerse</h2>
        </header>

        <div class="search-bar">
            <input type="text" id="searchBar" placeholder="Cari anime..." onkeyup="filterTable()">
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Genre</th>
                        <th>Episode</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php 
                    include 'koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi, "SELECT * FROM dbav");
                    while ($d = mysqli_fetch_array($data)) { ?>
                        <tr>
                            <td><?= htmlspecialchars($no++) ?></td>
                            <td><?= htmlspecialchars($d['judul']) ?></td>
                            <td><?= htmlspecialchars($d['genre']) ?></td>
                            <td><?= htmlspecialchars($d['episode']) ?></td>
                            <td>
                            <?php if ($d['gambar']) { ?>
                                <img src="../images/image/<?php echo $d['gambar']; ?>" alt="cover anime" class="thumbnail">
                            <?php } else { ?>
                                Tidak ada gambar
                            <?php } ?>
                            </td>
                            <td>
                                <a href="edit.php?ID=<?= $d['ID'] ?>" class="edit-btn">Edit</a>
                                <a href="hapus.php?id=<?= $d['ID'] ?>" class="delete-btn" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
    function filterTable() {
        const value = document.getElementById("searchBar").value.toLowerCase();
        const rows = document.querySelectorAll("#tableBody tr");
        rows.forEach(row => {
            const match = [...row.cells].some(cell => cell.innerText.toLowerCase().includes(value));
            row.style.display = match ? "" : "none";
        });
    }
    </script>
</body>
</html>
