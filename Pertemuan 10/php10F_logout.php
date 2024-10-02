<?php
// Memulai sesi
session_start();

// Menghancurkan sesi yang ada
session_destroy();

// Mengarahkan pengguna ke halaman php10D.php setelah keluar
header("Location: php10D.php");
?>