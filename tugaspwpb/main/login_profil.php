<?php
            session_start();
            include 'koneksi.php';
            
            if (isset($_SESSION['username'])) {
                // Ambil data user dari database
                $username = $_SESSION['username'];
                $query = mysqli_query($koneksi, "SELECT picture FROM userav WHERE username = '$username'");
                $user = mysqli_fetch_assoc($query);
                $profilePicture = $user['picture'] ? $user['picture'] : 'path/to/default-profile.png';

                // Tampilkan profil user
                echo '
                <div class="user-profile">
                    <a href="user.php" class="profile-link">
                        <img src="' . htmlspecialchars($profilePicture) . '" alt="Profile" class="profile-pic">
                        <span class="username">' . htmlspecialchars($username) . '</span>
                    </a>
                </div>';
            } else {
                // Jika user belum login, tampilkan tombol login
                echo '<button class="btn-login" onclick="openLoginModal()">Login</button>';
            }
?>