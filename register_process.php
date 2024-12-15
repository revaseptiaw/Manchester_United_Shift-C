<?php
require 'config.php'; // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    

    // Validasi input
    if (empty($username) || empty($password) || empty($email)) {
        echo "Username, password dan email harus diisi!";
        exit;
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        // Simpan ke database
        $stmt = $pdo->prepare("INSERT INTO user (username, password, email) VALUES (?, ?, ?)");
        $stmt->execute([$username, $hashedPassword, $email]);

        echo "<script>alert('Registrasi berhasil.'); window.location.href='login.html';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
