1
    <form method="POST" onsubmit="return confirmDeletion()">
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <label for="password">Masukkan Password:</label>
        <input type="password" name="password" required>

        <label for="confirmation">Ketik "Hapus Akun" untuk konfirmasi:</label>
        <input type="text" name="confirmation" required>

        <button type="submit">Hapus Akun</button>
    </form>



 2   
    <button onclick="window.location.href='user_page.php'">Kembali</button>

        <form method="POST">
        <label for="new_username">Username Baru:</label>
        <input type="text" name="new_username" required>
        <button type="submit">Ganti Username</button>
    </form>
    
    <button onclick="window.location.href='user_page.php'">Kembali</button>



3
        <form method="POST">
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php elseif (isset($success)): ?>
            <p style="color: green;"><?php echo htmlspecialchars($success); ?></p>
        <?php endif; ?>

        <label for="current_password">Password Lama:</label>
        <input type="password" name="current_password" required>

        <label for="new_password">Password Baru:</label>
        <input type="password" name="new_password" required>

        <label for="confirm_password">Konfirmasi Password Baru:</label>
        <input type="password" name="confirm_password" required>

        <button type="submit">Ganti Password</button>
    </form>
    
    <button onclick="window.location.href='user_page.php'">Kembali</button>

buat code php dan html nya menjadi rapih tambahkan class yang di samakan saja


pisahkan 3 nya nanti saat kau tulis 