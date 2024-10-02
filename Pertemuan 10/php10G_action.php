<?php
// Konfigurasi koneksi database
$db_hostname = "localhost"; // Nama server database
$db_database = "pbw10"; // Nama database
$db_username = "root"; // Username database
$db_password = ""; // Password database
$db_charset = "utf8mb4"; // Karakter set (opsional)

// Konstruksi DSN (Data Source Name) untuk PDO
$dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";

// Opsi tambahan untuk koneksi PDO
$opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Mode error
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Mode fetch default
    PDO::ATTR_EMULATE_PREPARES => false // Emulasi prepare statement (nonaktifkan)
);

try {
    // Membuat koneksi PDO
    $pdo = new PDO($dsn, $db_username, $db_password, $opt);

    // Mendapatkan data dari form
    $slot = $_POST["slot"]; // Slot untuk pembaruan
    $name = $_POST["name"]; // Nama baru
    $email = $_POST["email"]; // Email baru

    // Persiapkan dan jalankan statement pembaruan
    $stmt = $pdo->prepare("UPDATE meetings SET name=:name, email=:email WHERE slot=:slot");
    $stmt->bindParam(":name", $name); // Bind parameter nama
    $stmt->bindParam(":email", $email); // Bind parameter email
    $stmt->bindParam(":slot", $slot); // Bind parameter slot
    $stmt->execute(); // Eksekusi statement

    // Tutup koneksi PDO
    $pdo = NULL;

    // Redirect ke halaman php10F.php setelah pembaruan berhasil
    header("Location: php10F.php");
    exit(); // Keluar dari skrip
} catch (PDOException $e) {
    // Tangani kesalahan PDO
    exit("PDO Error: " . $e->getMessage() . "<br>");
}
?>
