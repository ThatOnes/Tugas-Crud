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
    <link href="/tugaspwpb/css/navbar.css" rel="stylesheet">
    <script src="../js/script.js " defer></script>
    <title>AnimeVerse</title>
    <style>

.container {
    max-width: 1200px;
    margin: 100px auto; /* Sesuaikan nilai margin-top di sini */
    background-color: #333;
    border-radius: 8px;
    overflow: hidden;
    padding: 20px;
    display: flex;
    gap: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}
        .image-container img {
            width: 250px;
            height: auto;
            border-radius: 8px;
        }
        .details {
            flex: 1;
        }
        .details h1 {
            margin: 0 0 20px;
            color: #e74c3c;
        }
        .details p {
            margin: 5px 0;
            line-height: 1.6;
        }
        .details .description {
            margin-top: 20px;
            font-size: 1em;
            line-height: 1.8;
        }
        .button-container {
            margin-top: 30px;
        }
        .button-container a {
            display: inline-block;
            padding: 15px 20px;
            background-color: #e74c3c;
            color: white;
            text-align: center;
            border-radius: 5px;
            font-size: 1.2em;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .button-container a:hover {
            background-color: #c0392b;
        }
    </style>
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
                <p>
                   Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias ad, doloremque, maiores natus veniam inventore rem hic facilis ratione nisi aliquid impedit, sed praesentium. Aspernatur, officiis? Accusamus consequuntur repellendus laborum voluptates maxime. Tenetur soluta voluptates optio nihil nisi, ex, sunt atque, odit ducimus blanditiis sequi temporibus omnis exercitationem esse animi! Mollitia eligendi deleniti ducimus magni possimus accusamus exercitationem harum alias praesentium. Fugiat nesciunt ipsa, quam quibusdam error exercitationem impedit dicta ipsum ullam non, veniam odit dignissimos, mollitia totam dolore enim cumque recusandae asperiores id sit pariatur. Dolorem maiores sequi facilis odit laudantium repellendus, quam quos necessitatibus excepturi culpa deserunt quasi animi! Aperiam dolore enim placeat cupiditate. Sequi tenetur excepturi numquam reprehenderit accusantium saepe corrupti deserunt error veritatis nemo amet commodi quia exercitationem aspernatur, corporis, doloribus eos. Mollitia accusantium aperiam, minus, distinctio soluta, nihil sunt quaerat quis porro ex aliquid obcaecati. Debitis laudantium asperiores placeat id perspiciatis odio saepe pariatur ipsam totam voluptates, reiciendis odit dolor, obcaecati consequatur? Nam ipsum laudantium eius explicabo voluptas asperiores repellendus ratione et amet suscipit delectus, beatae quae. Ipsum sint, placeat, laboriosam atque magni nobis commodi praesentium et consequatur quod facere. Doloremque voluptatem, nulla totam dolorem, expedita exercitationem consequuntur culpa, aliquid quasi perspiciatis numquam praesentium nemo!
                </p>
            </div>
            <div class="button-container">
                <a href="underdevelopment.php">Tonton Episode Terbaru</a>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>

</body>
</html>
