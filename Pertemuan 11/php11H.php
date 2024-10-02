<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: php11D.php");
    exit();
}
// Konfigurasi database
$db_hostname = "localhost"; // Nama server database
$db_database = "pbw10"; // Nama database
$db_username = "root"; // Username database
$db_password = ""; // Password database
$db_charset = "utf8mb4"; // Karakter set (opsional)

// PDO configuration
$dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
$opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
);

try {
    // Mendapatkan slot dari parameter GET
    $slot = $_GET['slot'];

    // Membuat koneksi PDO
    $pdo = new PDO($dsn, $db_username, $db_password, $opt);

    // Menyiapkan dan menjalankan statement DELETE
    $stmt = $pdo->prepare("DELETE FROM meetings WHERE slot = ?");
    $stmt->execute([$slot]);

    // Mengarahkan kembali ke halaman php11F.php setelah penghapusan berhasil
    header("Location: php11F.php");
    exit;
} catch (PDOException $e) {
    // Menangani kesalahan PDO
    exit("PDO Error: " . $e->getMessage() . "<br>");
}
?>