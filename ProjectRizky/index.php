<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MangaVerse</title>
    <link href="/ProjectRizky/css/style.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar">
        <div class="navbar-left">
            <img src="/ProjectRizky/imgLogo/1-removebg-preview.png" alt="Logo" class="logo">
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li><a href="genre.php">Genre</a></li>
                    <li><a href="#ab">About us</a></li>
                    <li><a href="#faq">FAQ</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="navbar-right">
                <button onclick="openLoginModal()">Login</button>
            </div>
        </nav>
    </header>


<!-- Login Modal -->
<form method="POST" action="aksi_login.php">
<div id="loginModal" class="modal">
    <div class="modal-content">
    <span class="close" onclick="closeLoginModal()">&times;</span>
            <h2>Login</h2>
            <p>For Admin</p>

            <label for="username">Username:</label>
            <input type="text" placeholder="Username" name="Username" id="username" required/>

            <label for="password">Password:</label>
            <input type="password" placeholder="Password" name="Password" id="password" required/>

            <button type="submit">Login</button> <!-- Remove onclick here -->
    </div>
</div>
</form>

<script>
    // Open the login modal
    function openLoginModal() {
        document.getElementById("loginModal").classList.add('show');
    }

    // Close the login modal
    function closeLoginModal() {
        document.getElementById("loginModal").classList.remove('show');
    }
</script>

<!-- Intro -->

    <section class="intro">
        <div class="container">
            <h1>Selamat Datang di MangaVerse</h1>
            <p>Temukan dan nikmati berbagai koleksi manga populer dari berbagai genre. Rasakan pengalaman membaca manga yang seru dan menyenangkan di sini!</p>
        </div>
    </section>

<!-- Search Bar -->

    <div class="search-bar">
        <input type="text" id="searchInput" placeholder="Cari manga atau komik...">
        <button onclick="searchManga()">Cari</button>
    </div>


<!-- Manga Gallery -->

<main>
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
                <p>Genre: isekai</p>
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
                <p>Genre: Horror</p>
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

<!-- Script searchbar -->

<script>
    function searchManga() {
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        const mangaCards = document.querySelectorAll('.manga-card');
        
        mangaCards.forEach(card => {
            const title = card.getAttribute('data-title').toLowerCase();
            if (title.includes(searchTerm)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>

<!-- About Us -->

<div id="ab">
    <div class="container" style="max-width: 800px; margin: 0 auto; text-align: center; padding: 20px;">
        <h1 style="color: #e74c3c;">About Us</h1>
        <hr style="border: 1px solid #e74c3c; width: 60%; margin: 10px auto;">
        <div style="border-top: 4px solid #e74c3c; border-bottom: 4px solid #e74c3c; padding: 20px 0; margin: 20px 0;">
            <p style="line-height: 1.8; text-align: justify; margin: 0;">
                MangaVerse adalah komunitas penggemar manga yang berdedikasi untuk memberikan pengalaman terbaik bagi pembaca manga di seluruh dunia. Kami menyediakan berbagai macam manga dari berbagai genre, seperti aksi, petualangan, romansa, dan banyak lagi, dengan tujuan untuk memuaskan rasa ingin tahu setiap penggemar.
            </p>
            <p style="line-height: 1.8; text-align: justify; margin: 20px 0;">
                Dengan platform yang mudah diakses, kami ingin membantu Anda menemukan manga favorit Anda, memberikan rekomendasi terbaik, serta ulasan mendalam yang dapat memperkaya pengalaman membaca Anda. Kami percaya bahwa manga adalah seni yang dapat menghubungkan orang-orang dari berbagai belahan dunia, menciptakan komunitas yang penuh semangat dan berbagi kisah yang memikat.
            </p>
            <p style="line-height: 1.8; text-align: justify; margin: 0;">
                Bergabunglah dengan kami, dan temukan dunia manga yang tidak terbatas. Jadilah bagian dari perjalanan kami, temukan cerita yang menginspirasi, dan nikmati pengalaman membaca yang tak terlupakan bersama MangaVerse!
            </p>
        </div>
    </div>
</div>

<!-- FAQ -->

<section id="faq" class="faq-section">
<h2>FAQ (Frequently Asked Questions)</h2>
    <div class="faq-item">
        <details>
            <summary>Bagaimana cara membaca manga?</summary>
            <p>Klik pada judul manga yang Anda inginkan, dan Anda akan diarahkan ke halaman baca manga tersebut.</p>
        </details>
    </div>
    <div class="faq-item">
        <details>
            <summary>Apakah membaca manga di sini gratis?</summary>
            <p>Ya, semua manga dapat dibaca secara gratis tanpa biaya tambahan.</p>
        </details>
    </div>
    <div class="faq-item">
        <details>
            <summary>Apa saja genre yang tersedia?</summary>
            <p>Kami memiliki berbagai genre seperti aksi, drama, petualangan, fantasi, misteri, supernatural, dan banyak lagi.</p>
        </details>
    </div>
    <div class="faq-item">
        <details>
            <summary>Apakah perlu membuat akun untuk membaca manga?</summary>
            <p>Tidak, Anda bisa membaca tanpa akun. Namun, membuat akun memberikan manfaat tambahan seperti daftar favorit.</p>
        </details>
    </div>
    <div class="faq-item">
        <details>
            <summary>Bagaimana cara melaporkan masalah pada manga?</summary>
            <p>Anda bisa menghubungi kami melalui formulir kontak di halaman Bantuan.</p>
        </details>
    </div>
</section>

<!-- contact -->

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
</main>

<!-- footer -->

<footer>
    <div>
    <img src="/ProjectRizky/imgLogo/1-removebg-preview.png" alt="Logo Footer" width="100" height="auto">
        <p>&copy; 2025 MangaVerse. Semua Hak Dilindungi.</p>
    </div>
</footer>

<!-- script animation -->

<script>
    const elementsToAnimate = document.querySelectorAll('.manga-card, .intro, .faq-item');

    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            } else {
                entry.target.classList.remove('animate');
            }
        });
    }, observerOptions);

    elementsToAnimate.forEach(element => {
        observer.observe(element);
    });

</script>
</body>
</html>