<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/tambah.css" rel="stylesheet">
    <title>Tambah Buku</title>
</head>
<body>
<div class="container">
        <a href="admin.php" class="back-button">Kembali</a>
        <h2>Tambah Buku</h2>
        <form method="post" action="tambah_aksi.php" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="judul">Judul Buku</label></td>
                    <td><input type="text" name="judul" id="judul" required></td>
                </tr>
                <tr>
                    <td><label for="genre">Genre</label></td>
                    <td><input type="text" name="genre" id="genre" required></td>
                </tr>
                <tr>
                    <td><label for="episode">Episode</label></td>
                    <td><input type="text" name="episode" id="episode" required></td>
                </tr>
                <tr>
                    <td><label for="gambar">Gambar Buku</label></td>
                    <td><input type="file" name="gambar" accept="image/*" id="image-input" onchange="previewImage()"></td>
                </tr>
            </table>
            <!-- Preview Image -->
            <div id="image-preview">
                <h3>Preview Gambar:</h3>
                <img id="preview" src="" alt="Gambar Buku Preview">
            </div>
            <input type="submit" value="SIMPAN">
        </form>
    </div>

    <script>
        function previewImage() {
            const file = document.getElementById("image-input").files[0];
            const reader = new FileReader();

            reader.onloadend = function () {
                const preview = document.getElementById("preview");
                const imagePreview = document.getElementById("image-preview");

                preview.src = reader.result;
                imagePreview.style.display = "block"; // Menampilkan gambar preview
            };

            if (file) {
                reader.readAsDataURL(file); // Membaca gambar sebagai URL data
            } else {
                document.getElementById("image-preview").style.display = "none"; // Menyembunyikan preview jika tidak ada file
            }
        }
    </script>
</body>
</html>