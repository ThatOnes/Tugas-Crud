<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genre Manga</title>
    <link rel="stylesheet" href="/ProjectRizky/css/genre.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-left">
        <img src="/ProjectRizky/imgLogo/1-removebg-preview.png" alt="Logo" class="logo">
            <ul>
                <li><a href="index.php">Beranda</a></li>
            </ul>
        </div>
        <div class="navbar-right">
            <button onclick="openLoginModal()">Login</button>
        </div>
    </nav>

    <!-- Login Modal -->
<form method="POST" action="aksi_login.php">
    <div id="loginModal" class="modal" onclick="closeOnOverlayClick(event)">
        <div class="modal-content">
            <span class="close" onclick="closeLoginModal()">&times;</span>
            <h2>Login</h2>
            <p>Login For Admin</p>

            <label for="username">Username</label>
            <input type="text" placeholder="Username" name="Username" id="username" required />
            
            <label for="password">Password</label>
            <input type="password" placeholder="Password" name="Password" id="password" required />
            <button type="submit">Login</button>
        </div>
    </div>
</form>

<script>
    // Open the login modal
    function closeOnOverlayClick(event) {
    // Cek apakah klik terjadi di luar elemen modal-content
    if (event.target.id === "loginModal") {
        closeLoginModal();
    }
    }

    function closeLoginModal() {
        document.getElementById("loginModal").style.display = "none";
    }

    function openLoginModal() {
        document.getElementById("loginModal").style.display = "flex";
    }

    function openLoginModal() {
        document.getElementById("loginModal").classList.add('show');
    }

    // Close the login modal
    function closeLoginModal() {
        document.getElementById("loginModal").classList.remove('show');
    }

    const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('pesan') === 'gagal') {

            alert('Login gagal! Username atau password salah.');
        }
</script>

<section>
    <div class="container">
        <h1>Cari Manga Berdasarkan Genre Nya</h1>
    </div>
</section>

    <!-- Genre Buttons -->
    <div class="genre-buttons">
        <button onclick="showGenre('ALL')">ALL</button>
        <button onclick="showGenre('aksi')">Aksi</button>
        <button onclick="showGenre('petualangan')">Petualangan</button>
        <button onclick="showGenre('fantasi')">Fantasi</button>
        <button onclick="showGenre('misteri')">Misteri</button>
        <button onclick="showGenre('Slice Of Life')">Slice Of Life</button>
        <button onclick="showGenre('Psycological')">Psycological</button>
    </div>

    <!-- Genre Title -->
    <div class="genre-title">
        <h1 id="genreName">Genre: Action</h1>
    </div>

    <!-- Manga Gallery -->
    <section id="manga-gallery" class="manga-gallery">
    <h2>Manga Populer</h2>
    <div class="manga-grid" id="mangaGrid">
        <!-- Manga 1 -->
        <div class="manga-card" data-title="One Piece">
            <img src="/ProjectRizky/img1/op.png" alt="Manga 1">
            <h3>One Piece</h3>
            <p>Genre: Petualangan</p>
        </div>
        <!-- Manga 2 -->
        <div class="manga-card" data-title="Naruto">
            <img src="/ProjectRizky/img1/nt.png" alt="Manga 2">
            <h3>Naruto</h3>
            <p>Genre: Aksi</p>
        </div>
        <!-- Manga 3 -->
        <div class="manga-card" data-title="Attack on Titan">
            <img src="/ProjectRizky/img1/aot.png" alt="Manga 3">
            <h3>Attack on Titan</h3>
            <p>Genre: Fantasi</p>
        </div>
        <!-- Manga 4 -->
        <div class="manga-card" data-title="Demon Slayer">
            <img src="/ProjectRizky/img1/ds.png" alt="Manga 4">
            <h3>Demon Slayer</h3>
            <p>Genre: Aksi</p>
        </div>
        <!-- Manga 5 -->
        <div class="manga-card" data-title="My Hero Academia">
            <img src="/ProjectRizky/img1/mh.png" alt="Manga 5">
            <h3>My Hero Academia</h3>
            <p>Genre: Aksi</p>
        </div>
        <!-- Manga 6 -->
        <div class="manga-card" data-title="Tokyo Revengers">
            <img src="/ProjectRizky/img1/tr.png" alt="Manga 6">
            <h3>Tokyo Revengers</h3>
            <p>Genre: Aksi</p>
        </div>
        <!-- Manga 7 -->
        <div class="manga-card" data-title="Bleach">
            <img src="/ProjectRizky/img1/b.png" alt="Manga 7">
            <h3>Bleach</h3>
            <p>Genre: Fantasi</p>
        </div>
        <!-- Manga 8 -->
        <div class="manga-card" data-title="Fairy Tail">
            <img src="/ProjectRizky/img1/ft.png" alt="Manga 8">
            <h3>Fairy Tail</h3>
            <p>Genre: Petualangan</p>
        </div>
        <!-- Manga 9 -->
        <div class="manga-card" data-title="Black Clover">
            <img src="/ProjectRizky/img2/bc.png" alt="Manga 9">
            <h3>Black Clover</h3>
            <p>Genre: Aksi</p>
        </div>
        <!-- Manga 10 -->
        <div class="manga-card" data-title="Hunter x Hunter">
            <img src="/ProjectRizky/img2/hxh.png" alt="Manga 10">
            <h3>Hunter x Hunter</h3>
            <p>Genre: Petualangan</p>
        </div>
        <!-- Manga 11 -->
        <div class="manga-card" data-title="Fullmetal Alchemist">
            <img src="/ProjectRizky/img2/fm.png" alt="Manga 11">
            <h3>Fullmetal Alchemist</h3>
            <p>Genre: Fantasi</p>
        </div>
        <!-- Manga 12 -->
        <div class="manga-card" data-title="One Punch Man">
            <img src="/ProjectRizky/img2/op.png" alt="Manga 12">
            <h3>One Punch Man</h3>
            <p>Genre: Aksi</p>
        </div>
        <!-- Manga 13 -->
        <div class="manga-card" data-title="Sword Art Online">
            <img src="/ProjectRizky/img2/sao.png" alt="Manga 13">
            <h3>word Art Online</h3>
            <p>Genre: Fantasi</p>
        </div>
        <!-- Manga 14 -->
        <div class="manga-card" data-title="Death Note">
            <img src="/ProjectRizky/img2/dn.png" alt="Manga 14">
            <h3>Death Note</h3>
            <p>Genre: Misteri</p>
        </div>
        <!-- Manga 15 -->
        <div class="manga-card" data-title="Dragon Ball">
            <img src="/ProjectRizky/img2/dg.png" alt="Manga 15">
            <h3>Dragon Ball</h3>
            <p>Genre: Petualangan</p>
        </div>
        <!-- Manga 16 -->
        <div class="manga-card" data-title="Tokyo Ghoul">
            <img src="/ProjectRizky/img2/tg.png" alt="Manga 16">
            <h3>Tokyo Ghoul</h3>
            <p>Genre: Psycological</p>
        </div>
        <!-- Manga 17 -->
        <div class="manga-card" data-title="Blue Box">
            <img src="/ProjectRizky/img3/bb.png" alt="Manga 17">
            <h3>Blue Box</h3>
            <p>Genre: Slice Of Life</p>
        </div>
        <!-- Manga 18 -->
        <div class="manga-card" data-title="Chainsaw Man">
            <img src="/ProjectRizky/img3/cm.png" alt="Manga 18">
            <h3>Chainsaw Man</h3>
            <p>Genre: Aksi</p>
        </div>
                <!-- Manga 19 -->
        <div class="manga-card" data-title="Dandadan">
            <img src="/ProjectRizky/img3/dd.png" alt="Manga 19">
            <h3>Dandadan</h3>
            <p>Genre: Petualangan</p>
        </div>
                <!-- Manga 20 -->
        <div class="manga-card" data-title="Jujutsu Kaisen">
            <img src="/ProjectRizky/img3/jjk.png" alt="Manga 20">
            <h3>Jujutsu Kaisenl</h3>
            <p>Genre: Aksi</p>
        </div>
                <!-- Manga 21 -->
        <div class="manga-card" data-title="Kaiju No8">
            <img src="/ProjectRizky/img3/k8.png" alt="Manga 21">
            <h3>Kaiju No8</h3>
            <p>Genre: Aksi</p>
        </div>
                <!-- Manga 22 -->
        <div class="manga-card" data-title="The Art Of Nausicaa">
            <img src="/ProjectRizky/img3/nw.png" alt="Manga 22">
            <h3>The Art Of Nausicaa</h3>
            <p>Genre: Petualangan</p>
        </div>
                <!-- Manga 23 -->
        <div class="manga-card" data-title="Oshi No Ko">
            <img src="/ProjectRizky/img3/osk.png" alt="Manga 23">
            <h3>Oshi No Ko</h3>
            <p>Genre: Misteri</p>
        </div>
                <!-- Manga 24 -->
        <div class="manga-card" data-title="The Promised Neverland">
            <img src="/ProjectRizky/img3/pn.png" alt="Manga 24">
            <h3>The Promised Neverland</h3>
            <p>Genre: Psycological</p>
        </div>
    </div>
</section>

<section id="contact" class="contact-section">
    <div class="container">
        <h2>Contact</h2>
        <hr style="border: 1px solid #e74c3c; width: 80%; margin: 20px auto;">
        <p>Jika Anda memiliki pertanyaan atau saran, jangan ragu untuk menghubungi kami!</p>
        <div class="social-media">
            <a href="mailto:example@gmail.com" class="social-icon">
                <img src="/ProjectRizky/imgLogo/gmail.png" alt="Gmail" width="40">
            </a>
            <a href="https://twitter.com" class="social-icon">
                <img src="/ProjectRizky/imgLogo/x.jpg" alt="Twitter" width="40">
            </a>
            <a href="https://facebook.com" class="social-icon">
                <img src="/ProjectRizky/imgLogo/facebook.png" alt="Facebook" width="40">
            </a>
            <a href="https://instagram.com" class="social-icon">
                <img src="/ProjectRizky/imgLogo/ig.png" alt="Instagram" width="40">
            </a>
        </div>
    </div>
</section>

<footer>
    <div>
    <img src="/ProjectRizky/imgLogo/1-removebg-preview.png" alt="Logo Footer" width="100" height="auto">
        <p>&copy; 2025 MangaVerse. Semua Hak Dilindungi.</p>
    </div>
</footer>

    <script>
        function showGenre(genre) {
            const genreName = document.getElementById("genreName");
            const mangaGrid = document.getElementById("mangaGrid");

            // Update the genre title
            genreName.textContent = `Genre: ${genre.charAt(0).toUpperCase() + genre.slice(1)}`;

            // Here you can dynamically change the manga based on the genre selected
            // For now, just sample manga images based on genre selection
            if (genre == 'ALL' ) {
                mangaGrid.innerHTML =`
                <!--manga 1 -->
                <div class="manga-card" data-title="One Piece">
                    <img src="/ProjectRizky/img1/op.png" alt="Manga 1">
                    <h3>One Piece</h3>
                    <p>Genre: Petualangan</p>
                </div>
                <!-- Manga 2 -->
                <div class="manga-card" data-title="Naruto">
                    <img src="/ProjectRizky/img1/nt.png" alt="Manga 2">
                    <h3>Naruto</h3>
                    <p>Genre: Aksi</p>
                </div>
                <!-- Manga 3 -->
                <div class="manga-card" data-title="Attack on Titan">
                    <img src="/ProjectRizky/img1/aot.png" alt="Manga 3">
                    <h3>Attack on Titan</h3>
                    <p>Genre: Fantasi</p>
                </div>
                <!-- Manga 4 -->
                <div class="manga-card" data-title="Demon Slayer">
                    <img src="/ProjectRizky/img1/ds.png" alt="Manga 4">
                    <h3>Demon Slayer</h3>
                    <p>Genre: Aksi</p>
                </div>
                <!-- Manga 5 -->
                <div class="manga-card" data-title="My Hero Academia">
                    <img src="/ProjectRizky/img1/mh.png" alt="Manga 5">
                    <h3>My Hero Academia</h3>
                    <p>Genre: Aksi</p>
                </div>
                <!-- Manga 6 -->
                <div class="manga-card" data-title="Tokyo Revengers">
                    <img src="/ProjectRizky/img1/tr.png" alt="Manga 6">
                    <h3>Tokyo Revengers</h3>
                    <p>Genre: Aksi</p>
                </div>
                <!-- Manga 7 -->
                <div class="manga-card" data-title="Bleach">
                    <img src="/ProjectRizky/img1/b.png" alt="Manga 7">
                    <h3>Bleach</h3>
                    <p>Genre: Fantasi</p>
                </div>
                <!-- Manga 8 -->
                <div class="manga-card" data-title="Fairy Tail">
                    <img src="/ProjectRizky/img1/ft.png" alt="Manga 8">
                    <h3>Fairy Tail</h3>
                    <p>Genre: Petualangan</p>
                </div>
                <!-- Manga 9 -->
                <div class="manga-card" data-title="Black Clover">
                    <img src="/ProjectRizky/img2/bc.png" alt="Manga 9">
                    <h3>Black Clover</h3>
                    <p>Genre: Aksi</p>
                </div>
                <!-- Manga 10 -->
                <div class="manga-card" data-title="Hunter x Hunter">
                    <img src="/ProjectRizky/img2/hxh.png" alt="Manga 10">
                    <h3>Hunter x Hunter</h3>
                    <p>Genre: Petualangan</p>
                </div>
                <!-- Manga 11 -->
                <div class="manga-card" data-title="Fullmetal Alchemist">
                    <img src="/ProjectRizky/img2/fm.png" alt="Manga 11">
                    <h3>Fullmetal Alchemist</h3>
                    <p>Genre: Fantasi</p>
                </div>
                <!-- Manga 12 -->
                <div class="manga-card" data-title="One Punch Man">
                    <img src="/ProjectRizky/img2/op.png" alt="Manga 12">
                    <h3>One Punch Man</h3>
                    <p>Genre: Aksi</p>
                </div>
                <!-- Manga 13 -->
                <div class="manga-card" data-title="Sword Art Online">
                    <img src="/ProjectRizky/img2/sao.png" alt="Manga 13">
                    <h3>word Art Online</h3>
                    <p>Genre: Fantasi</p>
                </div>
                <!-- Manga 14 -->
                <div class="manga-card" data-title="Death Note">
                    <img src="/ProjectRizky/img2/dn.png" alt="Manga 14">
                    <h3>Death Note</h3>
                    <p>Genre: Misteri</p>
                </div>
                <!-- Manga 15 -->
                <div class="manga-card" data-title="Dragon Ball">
                    <img src="/ProjectRizky/img2/dg.png" alt="Manga 15">
                    <h3>Dragon Ball</h3>
                    <p>Genre: Petualangan</p>
                </div>
                <!-- Manga 16 -->
                <div class="manga-card" data-title="Tokyo Ghoul">
                    <img src="/ProjectRizky/img2/tg.png" alt="Manga 16">
                    <h3>Tokyo Ghoul</h3>
                    <p>Genre: Psycological</p>
                </div>
                <!-- Manga 17 -->
                <div class="manga-card" data-title="Blue Box">
                    <img src="/ProjectRizky/img3/bb.png" alt="Manga 17">
                    <h3>Blue Box</h3>
                    <p>Genre: Slice Of Life</p>
                </div>
                <!-- Manga 18 -->
                <div class="manga-card" data-title="Chainsaw Man">
                    <img src="/ProjectRizky/img3/cm.png" alt="Manga 18">
                    <h3>Chainsaw Man</h3>
                    <p>Genre: Aksi</p>
                </div>
                        <!-- Manga 19 -->
                <div class="manga-card" data-title="Dandadan">
                    <img src="/ProjectRizky/img3/dd.png" alt="Manga 19">
                    <h3>Dandadan</h3>
                    <p>Genre: Petualangan</p>
                </div>
                        <!-- Manga 20 -->
                <div class="manga-card" data-title="Jujutsu Kaisen">
                    <img src="/ProjectRizky/img3/jjk.png" alt="Manga 20">
                    <h3>Jujutsu Kaisenl</h3>
                    <p>Genre: Aksi</p>
                </div>
                        <!-- Manga 21 -->
                <div class="manga-card" data-title="Kaiju No8">
                    <img src="/ProjectRizky/img3/k8.png" alt="Manga 21">
                    <h3>Kaiju No8</h3>
                    <p>Genre: Aksi</p>
                </div>
                        <!-- Manga 22 -->
                <div class="manga-card" data-title="The Art Of Nausicaa">
                    <img src="/ProjectRizky/img3/nw.png" alt="Manga 22">
                    <h3>The Art Of Nausicaa</h3>
                    <p>Genre: Petualangan</p>
                </div>
                        <!-- Manga 23 -->
                <div class="manga-card" data-title="Oshi No Ko">
                    <img src="/ProjectRizky/img3/osk.png" alt="Manga 23">
                    <h3>Oshi No Ko</h3>
                    <p>Genre: Misteri</p>
                </div>
                        <!-- Manga 24 -->
                <div class="manga-card" data-title="The Promised Neverland">
                    <img src="/ProjectRizky/img3/pn.png" alt="Manga 24">
                    <h3>The Promised Neverland</h3>
                    <p>Genre: Psycological</p>
                </div>
            </div>
               `;
            } else if (genre === 'aksi') {
                mangaGrid.innerHTML = `

            <div class="manga-card" data-title="Naruto">
                    <img src="/ProjectRizky/img1/nt.png" alt="Manga 2">
                    <h3>Naruto</h3>
                    <p>Genre: Aksi</p>
                </div>

                <div class="manga-card" data-title="Demon Slayer">
                    <img src="/ProjectRizky/img1/ds.png" alt="Manga 4">
                    <h3>Demon Slayer</h3>
                    <p>Genre: Aksi</p>
                </div>

                <div class="manga-card" data-title="My Hero Academia">
                    <img src="/ProjectRizky/img1/mh.png" alt="Manga 5">
                    <h3>My Hero Academia</h3>
                    <p>Genre: Aksi</p>
                </div>

                <div class="manga-card" data-title="Tokyo Revengers">
                    <img src="/ProjectRizky/img1/tr.png" alt="Manga 6">
                    <h3>Tokyo Revengers</h3>
                    <p>Genre: Aksi</p>
                </div>

                <div class="manga-card" data-title="Black Clover">
                    <img src="/ProjectRizky/img2/bc.png" alt="Manga 9">
                    <h3>Black Clover</h3>
                    <p>Genre: Aksi</p>
                </div>

                <div class="manga-card" data-title="One Punch Man">
                    <img src="/ProjectRizky/img2/op.png" alt="Manga 12">
                    <h3>One Punch Man</h3>
                    <p>Genre: Aksi</p>
                </div>

                <div class="manga-card" data-title="Chainsaw Man">
                    <img src="/ProjectRizky/img3/cm.png" alt="Manga 18">
                    <h3>Chainsaw Man</h3>
                    <p>Genre: Aksi</p>
                </div>

                <div class="manga-card" data-title="Jujutsu Kaisen">
                    <img src="/ProjectRizky/img3/jjk.png" alt="Manga 20">
                    <h3>Jujutsu Kaisenl</h3>
                    <p>Genre: Aksi</p>
                </div>

                <div class="manga-card" data-title="Kaiju No8">
                    <img src="/ProjectRizky/img3/k8.png" alt="Manga 21">
                    <h3>Kaiju No8</h3>
                    <p>Genre: Aksi</p>
                </div>
                `;
            } else if (genre === 'petualangan') {
                mangaGrid.innerHTML = `
                <div class="manga-card" data-title="One Piece">
                    <img src="/ProjectRizky/img1/op.png" alt="Manga 1">
                    <h3>One Piece</h3>
                    <p>Genre: Petualangan</p>
                </div>

                <div class="manga-card" data-title="Fairy Tail">
                    <img src="/ProjectRizky/img1/ft.png" alt="Manga 8">
                    <h3>Fairy Tail</h3>
                    <p>Genre: Petualangan</p>
                </div>

                <div class="manga-card" data-title="Dragon Ball">
                    <img src="/ProjectRizky/img2/dg.png" alt="Manga 15">
                    <h3>Dragon Ball</h3>
                    <p>Genre: Petualangan</p>
                </div>

                <div class="manga-card" data-title="Dandadan">
                    <img src="/ProjectRizky/img3/dd.png" alt="Manga 19">
                    <h3>Dandadan</h3>
                    <p>Genre: Petualangan</p>
                </div>

                <div class="manga-card" data-title="The Art Of Nausicaa">
                    <img src="/ProjectRizky/img3/nw.png" alt="Manga 22">
                    <h3>The Art Of Nausicaa</h3>
                    <p>Genre: Petualangan</p>
                </div>
                `;
            } else if (genre === 'fantasi') {
                mangaGrid.innerHTML = `
                <div class="manga-card" data-title="Attack on Titan">
                    <img src="/ProjectRizky/img1/aot.png" alt="Manga 3">
                    <h3>Attack on Titan</h3>
                    <p>Genre: Fantasi</p>
                </div>

                <div class="manga-card" data-title="Bleach">
                    <img src="/ProjectRizky/img1/b.png" alt="Manga 7">
                    <h3>Bleach</h3>
                    <p>Genre: Fantasi</p>
                </div>

                <div class="manga-card" data-title="Fullmetal Alchemist">
                    <img src="/ProjectRizky/img2/fm.png" alt="Manga 11">
                    <h3>Fullmetal Alchemist</h3>
                    <p>Genre: Fantasi</p>
                </div>

                <div class="manga-card" data-title="Sword Art Online">
                    <img src="/ProjectRizky/img2/sao.png" alt="Manga 13">
                    <h3>word Art Online</h3>
                    <p>Genre: Fantasi</p>
                </div>
                `;
            } else if (genre === 'misteri') {
                mangaGrid.innerHTML = `
                <div class="manga-card" data-title="Death Note">
                    <img src="/ProjectRizky/img2/dn.png" alt="Manga 14">
                    <h3>Death Note</h3>
                    <p>Genre: Misteri</p>
                </div>

                <div class="manga-card" data-title="The Art Of Nausicaa">
                    <img src="/ProjectRizky/img3/nw.png" alt="Manga 22">
                    <h3>The Art Of Nausicaa</h3>
                    <p>Genre: Petualangan</p>
                </div>

                <div class="manga-card" data-title="The Promised Neverland">
                    <img src="/ProjectRizky/img3/pn.png" alt="Manga 24">
                    <h3>The Promised Neverland</h3>
                    <p>Genre: Psycological</p>
                </div>
                `;
            } else if (genre === 'Slice Of Life') {
                mangaGrid.innerHTML = `
                <div class="manga-card" data-title="Blue Box">
                    <img src="/ProjectRizky/img3/bb.png" alt="Manga 17">
                    <h3>Blue Box</h3>
                    <p>Genre: Slice Of Life</p>
                </div>
                `;
            } else if (genre === 'Psycological') {
                mangaGrid.innerHTML = `
                <div class="manga-card" data-title="The Promised Neverland">
                    <img src="/ProjectRizky/img3/pn.png" alt="Manga 24">
                    <h3>The Promised Neverland</h3>
                    <p>Genre: Psycological</p>
                </div>

                <div class="manga-card" data-title="Death Note">
                    <img src="/ProjectRizky/img2/dn.png" alt="Manga 14">
                    <h3>Death Note</h3>
                    <p>Genre: Misteri</p>
                </div>

                <div class="manga-card" data-title="Tokyo Ghoul">
                    <img src="/ProjectRizky/img2/tg.png" alt="Manga 16">
                    <h3>Tokyo Ghoul</h3>
                    <p>Genre: Psycological</p>
                </div>
                `;
            } 
        }
    </script>
</body>
</html>


