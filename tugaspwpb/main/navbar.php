<header>
    <nav class="navbar">
        <div class="navbar-left">
            <img src="/tugaspwpb/images/logo/AV1.png" alt="Logo" class="logo">
        </div>
        <div class="navbar-center">
            <ul>
            <li><a href="index.php">Beranda</a></li>
                <li><a href="daftaranim.php">Daftar Anime</a></li>
                <li><a href="request.php">Request</a></li>
                <li><a href="subscription.php">Subscription</a></li>
            </ul>
        </div>
        <div class="navbar-right">
            <?php if ($is_logged_in): ?>
                <div class="profile-container" onclick="location.href='user_page.php'">
                    <img src="<?php echo $profile_picture_path; ?>" alt="Profile Picture" class="profile-picture" style="border-radius: 50%; width: 40px; height: 40px;">
                    <span class="username"><?php echo htmlspecialchars($username); ?></span>
                </div>
            <?php else: ?>
                <button class="btn-login" onclick="openLoginModal()">Sign in</button>
            <?php endif; ?>
        </div>
    </nav>
</header>




<!-- Sign-in Modal -->
<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('loginModal')">&times;</span>
        <h2>Sign in</h2>
        <form id="signInForm" method="POST" action="aksi_login_user.php">
            <label for="username">Username:</label>
            <input type="text" placeholder="Username" name="username" id="username" required />

            <label for="password">Password:</label>
            <div class="password-container">
                <input type="password" placeholder="Password" name="password" id="password" required />
                <span class="toggle-password" onclick="togglePassword('password')">&#128065;</span>
            </div>

            <button type="submit">Sign In</button>
        </form>
        <p id="signInResponseMessage" style="display: none;"></p>

        <p>Belum punya akun? <a href="#" onclick="openSignUpModal()" class="sign">Sign Up</a></p>
    </div>
</div>

<!-- Sign-up Modal -->
<div id="signUpModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('signUpModal')">&times;</span>
        <h2>Sign Up</h2>
        <form id="signUpForm" method="POST" action="aksi_signup_user.php">
            <label for="signup-username">Username:</label>
            <input type="text" placeholder="Username" name="username" id="signup-username" required />

            <label for="signup-password">Password:</label>
            <div class="password-container">
                <input type="password" placeholder="Password" name="password" id="signup-password" required />
                <span class="toggle-password" onclick="togglePassword('signup-password')">&#128065;</span>
            </div>

            <label for="signup-confirm-password">Confirm Password:</label>
            <div class="password-container">
                <input type="password" placeholder="Confirm Password" name="confirm_password" id="signup-confirm-password" required />
                <span class="toggle-password" onclick="togglePassword('signup-confirm-password')">&#128065;</span>
            </div>

            <button type="submit">Sign Up</button>
        </form>
        <p id="signupResponseMessage" style="display: none;"></p>

        <p>Sudah punya akun? <a href="#" onclick="openLoginModal()" class="sign">Sign in</a></p>
    </div>
</div>
