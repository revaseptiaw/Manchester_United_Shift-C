// Mendapatkan elemen modal dan tombol back
const modal = document.getElementById('player-modal');
const backButton = document.querySelector('.back-button');

// Mengambil semua elemen pemain
const players = document.querySelectorAll('.player');

// Menambahkan event listener untuk setiap gambar pemain
players.forEach(player => {
    player.addEventListener('click', function() {
        // Mengambil data dari atribut data-* pemain
        const playerId = player.getAttribute('data-player-id');
        const playerName = player.getAttribute('data-player-name');
        const playerNumber = player.getAttribute('data-player-number');
        const playerPosition = player.getAttribute('data-player-position');
        const playerBirth = player.getAttribute('data-player-birth');
        const playerCountry = player.getAttribute('data-player-country');
        const playerJoined = player.getAttribute('data-player-joined');
        const playerQuote = player.getAttribute('data-player-quote'); // Mengambil kutipan pemain

        // Mengupdate konten modal dengan data pemain
        document.getElementById('modal-img').src = `img/biodata/${playerName.replace(' ', '_').toLowerCase()}.png`;  // Gambar sesuai nama file
        document.getElementById('modal-number').textContent = `${playerNumber} ${playerName}`;
        document.getElementById('modal-birth').textContent = playerBirth;
        document.getElementById('modal-country').textContent = playerCountry;
        document.getElementById('modal-position').textContent = playerPosition;
        document.getElementById('modal-joined').textContent = playerJoined;
        document.getElementById('modal-quote').textContent = `"${playerQuote}"`;  // Menampilkan kutipan pemain
        

        // Menampilkan modal
        modal.style.display = 'block';
    });
});

// Menambahkan event listener untuk tombol "Back" untuk menutup modal
backButton.addEventListener('click', function(event) {
    event.preventDefault(); // Mencegah tindakan default
    modal.style.display = 'none'; // Menyembunyikan modal
});

// Menambahkan event listener agar modal bisa ditutup dengan klik di luar modal
window.addEventListener('click', function(event) {
    if (event.target === modal) {
        modal.style.display = 'none'; // Menyembunyikan modal jika klik di luar modal
    }
});
