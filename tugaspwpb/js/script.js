


//index.php start



//search fitur

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


// login/sign up modal
function openLoginModal() {
    closeAllModals(); // Tutup semua modal sebelum membuka yang baru
    document.getElementById("loginModal").classList.add("show");
}

function openSignUpModal() {
    closeAllModals(); // Tutup semua modal sebelum membuka yang baru
    document.getElementById("signUpModal").classList.add("show");
}

function closeModal(modalId) {
    // Menutup modal yang sesuai dengan ID yang diberikan
    document.getElementById(modalId).classList.remove("show");
}

function closeAllModals() {
    // Menutup semua modal
    document.querySelectorAll(".modal").forEach(modal => {
        modal.classList.remove("show");
    });
}



// sign-in massage 
document.addEventListener('DOMContentLoaded', () => {
    const signInForm = document.getElementById('signInForm');
    const signInResponseMessage = document.getElementById('signInResponseMessage');
    const signInButton = document.querySelector('#signInForm button[type="submit"]');

    if (signInForm) {
        signInForm.addEventListener('submit', function (e) {
            e.preventDefault(); // Mencegah reload halaman

            const formData = new FormData(this);
            signInResponseMessage.style.display = 'none'; // Sembunyikan pesan sebelumnya

            // Tampilkan animasi loading pada tombol
            signInButton.disabled = true; // Nonaktifkan tombol
            const originalButtonText = signInButton.innerHTML;
            signInButton.innerHTML = '<div class="loader"></div> Signing In...'; // Ganti teks tombol dengan animasi

            fetch('aksi_login_user.php', {
                method: 'POST',
                body: formData,
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === 'success') {
                    signInResponseMessage.style.color = 'rgb(143, 237, 71)'; // Hijau
                    signInResponseMessage.textContent = data.message;
                    signInResponseMessage.style.display = 'block';

                    // Tunggu 2 detik sebelum mengarahkan ke user.php
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 2000);
                } else {
                    signInResponseMessage.style.color = 'rgb(235, 81, 61)'; // Merah
                    signInResponseMessage.textContent = data.message;
                    signInResponseMessage.style.display = 'block';

                    // Kembalikan tombol ke kondisi semula
                    signInButton.disabled = false;
                    signInButton.innerHTML = originalButtonText;
                }
            })
            .catch((error) => {
                signInResponseMessage.textContent = 'Terjadi kesalahan, coba lagi.';
                signInResponseMessage.style.color = 'rgb(235, 81, 61)'; // Merah
                signInResponseMessage.style.display = 'block';

                // Kembalikan tombol ke kondisi semula
                signInButton.disabled = false;
                signInButton.innerHTML = originalButtonText;
            });
        });
    }
});






// sign-up masage
document.addEventListener('DOMContentLoaded', () => {
    const signUpForm = document.getElementById('signUpForm');
    const signupResponseMessage = document.getElementById('signupResponseMessage');
    const signUpButton = document.querySelector('#signUpForm button[type="submit"]');

    if (signUpForm) {
        signUpForm.addEventListener('submit', function (e) {
            e.preventDefault(); // Mencegah reload halaman

            const formData = new FormData(this);
            signupResponseMessage.style.display = 'none'; // Sembunyikan pesan sebelumnya

            // Tampilkan animasi loading pada tombol
            signUpButton.disabled = true; // Nonaktifkan tombol
            const originalButtonText = signUpButton.innerHTML;
            signUpButton.innerHTML = '<div class="loader"></div> Signing Up...'; // Ganti teks tombol dengan animasi

            fetch('aksi_signup_user.php', {
                method: 'POST',
                body: formData,
            })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === 'success') {
                    signupResponseMessage.style.color = 'rgb(143, 237, 71)'; // Hijau
                    signupResponseMessage.textContent = data.message;
                    signupResponseMessage.style.display = 'block';

                    // Tunggu 2 detik sebelum mengarahkan ke user.php
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 2000);
                } else {
                    signupResponseMessage.style.color = 'rgb(235, 81, 61)'; // Merah
                    signupResponseMessage.textContent = data.message;
                    signupResponseMessage.style.display = 'block';

                    // Kembalikan tombol ke kondisi semula
                    signUpButton.disabled = false;
                    signUpButton.innerHTML = originalButtonText;
                }
            })
            .catch((error) => {
                signupResponseMessage.textContent = 'Terjadi kesalahan, coba lagi.';
                signupResponseMessage.style.color = 'rgb(235, 81, 61)'; // Merah
                signupResponseMessage.style.display = 'block';

                // Kembalikan tombol ke kondisi semula
                signUpButton.disabled = false;
                signUpButton.innerHTML = originalButtonText;
            });
        });
    }
});




// kartu per page-width
(function() {
    const width = window.innerWidth;

    let itemsPerPage;
    if (width > 1245) {
        itemsPerPage = 21;
    }
    else if (width > 1165){
        itemsPerPage = 24;
    }else if (width > 1040){
        itemsPerPage = 21;
    }else if (width > 880){
        itemsPerPage = 18;
    } else if (width > 768) {
        itemsPerPage = 20;
    } else if (width > 700) {
        itemsPerPage = 16; 
    } else if (width > 600) {
        itemsPerPage = 12; 
    } else if (width > 470) {
        itemsPerPage = 9; 
    } else {
        itemsPerPage = 8; 
    }

    document.cookie = `itemsPerPage=${itemsPerPage}; path=/;`;


    if (!document.cookie.includes(`itemsPerPage=${itemsPerPage}`)) {
        window.location.reload();
    }
})();






//index.php end