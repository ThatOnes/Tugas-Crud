<?php
include 'koneksi.php'; // koneksi database

// Jika tombol Done ditekan untuk hapus data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['done_id'])) {
    $done_id = intval($_POST['done_id']);
    $hapus = $koneksi->prepare("DELETE FROM requestav WHERE ID = ?");
    $hapus->bind_param("i", $done_id);
    $hapus->execute();
    $hapus->close();
    header("Location: inbox.php"); // reload halaman
    exit;
}

// Ambil data request dari tabel requestav
$result = $koneksi->query("SELECT ID, request, email FROM requestav ORDER BY ID DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/inbox.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="/tugaspwpb/images/logo/AV2.png">
</head>
<body>
<a href="admin.php" class="back-btn">Kembali ke Admin</a>
    <div class="container">
        <h2>Inbox Request</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul Request</th>
                <th>Email</th>
                <th>Done</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['ID']) ?></td>
                    <td><?= htmlspecialchars($row['request']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?: '-' ?></td>
                    <td>
                        <form method="POST" onsubmit="return confirm('Yakin ingin hapus request ini?');">
                            <input type="hidden" name="done_id" value="<?= $row['ID'] ?>">
                            <button type="submit" class="done-btn">Done</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align:center;">Tidak ada request</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>


</html>

<?php
$koneksi->close();
?>
