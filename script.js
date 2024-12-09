document.getElementById("see-more").addEventListener("click", function () {
    // Alihkan pengguna ke halaman baru
    window.location.href = "players.html";
});

    document.querySelector('.nav-register').addEventListener('click', function (e) {
        e.preventDefault(); // Mencegah perilaku default link
        window.location.href = 'register.html'; // Arahkan ke halaman register
    });
