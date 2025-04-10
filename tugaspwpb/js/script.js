


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

function togglePassword(inputId) {
    var input = document.getElementById(inputId);
    var type = input.type === "password" ? "text" : "password";
    input.type = type;
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



//user_page.php start
function showLogoutPopout() {
    document.getElementById('logoutPopout').style.display = 'flex';
}

function hideLogoutPopout() {
    document.getElementById('logoutPopout').style.display = 'none';
}

function confirmLogout() {
    window.location.href = "user_page.php?logout=true";
}



function showGiftSettingsPopout() {
    document.getElementById('gift-settingsPopout').style.display = 'flex';
}

function hideGiftSettingsPopout() {
    document.getElementById('gift-settingsPopout').style.display = 'none';
}








//user_page.php end

//daftaranim.php start
function setLetter(letter) {
    const letterBtn = document.getElementById('sortLetterBtn');
    letterBtn.textContent = letter || 'A-Z'; // Tampilkan huruf atau default "A-Z"
    const params = new URLSearchParams(window.location.search);
    if (letter) {
        params.set('sortLetter', letter);
    } else {
        params.delete('sortLetter');
    }
    window.location.search = params.toString(); // Reload dengan parameter baru
}

function setGenre(genre) {
    const genreBtn = document.getElementById('sortGenreBtn');
    genreBtn.textContent = genre || 'Genre'; // Tampilkan genre atau default "Genre"
    const params = new URLSearchParams(window.location.search);
    if (genre) {
        params.set('sortGenre', genre);
    } else {
        params.delete('sortGenre');
    }
    window.location.search = params.toString(); // Reload dengan parameter baru
}

function setEpisode(episode) {
    const episodeBtn = document.getElementById('sortEpisodeBtn');
    episodeBtn.textContent = episode || 'Episode'; // Tampilkan kategori atau default "Episode"
    const params = new URLSearchParams(window.location.search);
    if (episode) {
        params.set('sortEpisode', episode);
    } else {
        params.delete('sortEpisode');
    }
    window.location.search = params.toString(); // Reload dengan parameter baru
}

function openEpisodePopup() {
    document.getElementById('episodePopup').style.display = 'flex';
}

function closeEpisodePopup() {
    document.getElementById('episodePopup').style.display = 'none';
}

function openSortPopup() {
    document.getElementById('sortPopup').style.display = 'flex';
}

function closeSortPopup() {
    document.getElementById('sortPopup').style.display = 'none';
}

function openGenrePopup() {
    document.getElementById('genrePopup').style.display = 'flex';
}

function closeGenrePopup() {
    document.getElementById('genrePopup').style.display = 'none';
}


//daftaranim.php End

document.getElementById("animeForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Mencegah submit default

    const judul = document.getElementById("judul").value.trim();
    const email = document.getElementById("email").value.trim();

    if (!judul) {
        alert("Judul Anime harus diisi!");
        return;
    }

    // Tampilkan overlay dan popup
    const overlay = document.getElementById("overlay");
    overlay.classList.remove("hidden");

    // Sembunyikan popup dan overlay setelah 2 detik
    setTimeout(() => {
        overlay.classList.add("hidden");
    }, 2000);

    // Reset form setelah submit berhasil
    document.getElementById("animeForm").reset();
});
