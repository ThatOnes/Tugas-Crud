<?php
session_start();

// Redirect user to underdevelopment.php if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: underdevelopment.php");
    exit();
}

$is_logged_in = true; // Since the check ensures they are logged in
$username = $_SESSION['username'] ?? 'Guest';
$profile_picture = $_SESSION['picture'] ?? 'default.png';
$profile_picture_path = "../images/uploads/" . htmlspecialchars($profile_picture);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="/tugaspwpb/images/logo/AV2.png">
</head>
<body>
<div class="sidebar">
    <div class="sidebar-header">
        <h1 class="brand-name">AnimeVerse</h1>
    </div>
    <div class="admin-profile">
        <a href="user_page.php" class="profile-link">
            <img src="<?php echo $profile_picture_path; ?>" alt="Profile Picture" class="admin-picture">
            <span class="admin-name"><?php echo htmlspecialchars($username); ?></span>
        </a>
    </div>
    <nav class="nav-links">
        <a href="tambah.php">Tambah Data</a>
        <a href="inbox.php">Inbox</a>
        <div class="bottom-link">
            <a href="index.php">Kembali ke beranda</a>
        </div>
    </nav>
</div>



    <div class="main-content">
        <header>
            <h2>Database AnimeVerse</h2>
        </header>

    <div class="search-bar">
    <input type="text" id="searchBar" placeholder="Cari anime..." onkeyup="filterTable()">
    <select id="rowLimit" onchange="limitTableRows()">
        <option value="all">All</option>
        <option value="10">10</option>
        <option value="50">50</option>
        <option value="100">100</option>
        <option value="500">500</option>
    </select>
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
function limitTableRows() {
    const limit = document.getElementById("rowLimit").value;
    const rows = document.querySelectorAll("#tableBody tr");

    if (limit === "all") {
        rows.forEach(row => row.style.display = ""); // Tampilkan semua
    } else {
        const max = parseInt(limit);
        rows.forEach((row, index) => {
            row.style.display = index < max ? "" : "none";
        });
    }
}

function filterTable() {
    const value = document.getElementById("searchBar").value.toLowerCase();
    const rows = document.querySelectorAll("#tableBody tr");
    const limit = document.getElementById("rowLimit").value;
    const max = limit === "all" ? rows.length : parseInt(limit);

    let count = 0; // Counter untuk memastikan batas baris

    rows.forEach(row => {
        const titleCell = row.cells[1]; // Kolom ke-1 adalah judul
        const match = titleCell && titleCell.innerText.toLowerCase().includes(value);
        
        if (match && count < max) {
            row.style.display = "";
            count++;
        } else {
            row.style.display = "none";
        }
    });
}

</script>

</body>
</html>
