<?php
// Memulai sesi
session_start();

// Informasi koneksi database
$servername = "localhost";
$dbname = "pbw10"; // Ganti dengan nama database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$db_charset = "utf8mb4";

try {
    // Membuat koneksi PDO ke database
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Mengatur mode error PDO ke exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Mengambil username dan password yang dikirim melalui POST
    $submittedUsername = $_POST['username'];
    $submittedPassword = $_POST['password'];

    // Menyiapkan dan mengeksekusi pernyataan SQL
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $submittedUsername);
    $stmt->bindParam(':password', $submittedPassword);
    $stmt->execute();

    // Memeriksa apakah pengguna yang cocok ditemukan
    if ($stmt->rowCount() == 1) {
        // Jika cocok, simpan username dalam sesi dan alihkan ke halaman php11F.php
        $_SESSION['username'] = $_POST['username'];
        header("Location: php11F.php");
        exit();
    } else {
        // Jika tidak cocok, tampilkan pesan kesalahan dan kembali ke halaman login
        echo "<script>alert('Username atau password salah');
        window.location.href='php11D.php';</script>";
    }
} catch (PDOException $e) {
    // Menangani kesalahan koneksi dan menampilkan pesan
    echo "Connection failed: " . $e->getMessage();
}

// Menutup koneksi database
$conn = null;
?>