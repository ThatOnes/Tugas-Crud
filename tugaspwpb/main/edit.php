<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/edit.css" rel="stylesheet">
    <title>Edit Manga</title>
</head>
<body>
    <?php 
        include 'koneksi.php';
        $ID = $_GET['ID'];  // Mendapatkan ID dari URL
        $data = mysqli_query($koneksi, "SELECT * FROM dbav WHERE ID = '$ID'");
        while ($d = mysqli_fetch_array($data)) {
    ?>
    <div class="container">
        <a href="admin.php" class="back-button">Kembali</a>
        <h2>Edit manga</h2>
        <form method="post" action="update.php" enctype="multipart/form-data">
            <input type="hidden" name="ID" value="<?php echo $d['ID']; ?>">
            <table>
                <tr>
                    <td><label for="judul">Judul</label></td>
                    <td><input type="text" name="judul" value="<?php echo $d['judul']; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="genre">Episode</label></td>
                    <td><input type="text" name="episode" value="<?php echo $d['episode']; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="genre">Genre</label></td>
                    <td><input type="text" name="genre" value="<?php echo $d['genre']; ?>" required></td>
                </tr>
                <tr>
                    <td><label for="gambar">Gambar</label></td>
                    <td>
                        <input type="file" name="gambar" accept="image/*" id="image-input" onchange="previewImage()">
                        <br>
                        <div id="image-preview">
                            <img id="preview" src="" alt="Preview Gambar">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Simpan"></td>
                </tr>
            </table>
        </form>
    </div>
    
    <script>
        function previewImage() {
            const file = document.getElementById("image-input").files[0];
            const reader = new FileReader();

            reader.onloadend = function() {
                const preview = document.getElementById("preview");
                const imagePreview = document.getElementById("image-preview");

                preview.src = reader.result;
                imagePreview.style.display = "block";  // Menampilkan gambar preview
            }

            if (file) {
                reader.readAsDataURL(file);  // Membaca gambar sebagai URL data
            } else {
                document.getElementById("image-preview").style.display = "none";  // Menyembunyikan preview jika tidak ada file
            }
        }
    </script>
    <?php
        }
    ?>
</body>
</html>
