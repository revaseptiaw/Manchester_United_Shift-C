// admin_dashboard.php
<?php
require 'config.php'; 
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'Admin') {
    echo "<script>alert('Anda tidak memiliki akses ke halaman ini!'); window.location.href='login.html';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
</head>
<body>
    <h1>Dashboard Admin</h1>
    <p>Selamat datang, Admin <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
    <a href="logout.php">Logout</a>
</body>
</html>
