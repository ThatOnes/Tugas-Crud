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


//login modal
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


//profil
function toggleProfileMenu() {
    const profileMenu = document.getElementById('profileMenu');
    if (profileMenu.style.display === 'block') {
        profileMenu.style.display = 'none';
    } else {
        profileMenu.style.display = 'block';
    }
}

// Tutup menu profil jika klik di luar area menu
window.onclick = function (event) {
    const profileMenu = document.getElementById('profileMenu');
    if (!event.target.matches('.btn-profile')) {
        if (profileMenu && profileMenu.style.display === 'block') {
            profileMenu.style.display = 'none';
        }
    }
};



//profile
function triggerFileUpload() {
    document.getElementById('profileInput').click();
}



//animasi 

