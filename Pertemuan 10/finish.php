<?php
// Membutuhkan file mylibrary.php yang berisi definisi fungsi-fungsi yang diperlukan
require_once 'mylibrary.php';

// Memanggil fungsi untuk menghancurkan sesi dan data
destroy_session_and_data();

// Menampilkan pesan selamat tinggal kepada pengunjung
echo "<html lang=\"en-GB\"><head></head><body>\n";
echo "Goodbye visitor!<br />";

// Menampilkan tautan untuk memulai sesi kembali
echo '<a href="page1.php">Start again</a></body>';
?>