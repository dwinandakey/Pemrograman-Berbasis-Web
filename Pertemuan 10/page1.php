<?php
// Membutuhkan file mylibrary.php yang berisi definisi fungsi-fungsi yang diperlukan
require_once 'mylibrary.php';

// Menampilkan halaman HTML dengan pesan sambutan kepada pengunjung dan jumlah permintaan halaman yang sudah dilakukan
echo "<html lang=\"en-GB\"><head></head><body>\n";
echo "Hello visitor!<br />This is your page request no ";
echo count_requests() . " from this site.<br />\n";

// Menampilkan tautan untuk melanjutkan ke halaman berikutnya atau mengakhiri sesi
echo '<a href="page1.php">Continue</a> |
<a href="finish.php">Finish</a></body>';
?>