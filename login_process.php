<?php
require 'config.php'; // File konfigurasi koneksi database
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // Validasi input kosong
    if (empty($username) || empty($password)) {
        echo "<script>alert('Username dan password harus diisi!'); window.location.href='login.html';</script>";
        exit;
    }

    try {
        // Query untuk mengambil data pengguna berdasarkan username
        $stmt = $pdo->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Periksa apakah password cocok
            if (password_verify($password, $user['password'])) {
                // Simpan data pengguna ke dalam sesi
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // Periksa role pengguna
                if ($user['role'] === 'Admin') {
                    // Jika Admin, arahkan ke dashboard Admin
                    header('Location: admin_dashboard.php');
                    exit;
                } else {
                    // Jika User biasa, arahkan ke halaman utama
                    header('Location: index.html');
                    exit;
                }
            } else {
                // Jika password salah
                echo "<script>alert('Password salah!'); window.location.href='login.html';</script>";
                exit;
            }
        } else {
            // Jika username tidak ditemukan
            echo "<script>alert('Username tidak ditemukan!'); window.location.href='login.html';</script>";
            exit;
        }
    } catch (PDOException $e) {
        // Tangani error database
        echo "<script>alert('Terjadi kesalahan pada sistem: {$e->getMessage()}');</script>";
        exit;
    }
}
?>
