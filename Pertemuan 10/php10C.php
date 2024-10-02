<?php
// Mulai sesi
session_start();
// Jika ada permintaan untuk alamat, simpan alamat dalam sesi
if (isset($_REQUEST['address'])) {
    $_SESSION['address'] = $_REQUEST['address'];
}
?>
<!DOCTYPE html>
<html lang='en-GB'>

<head>
    <title>PHP10C</title>
</head>

<body>
    <?php
    // Tampilkan item yang disimpan dalam sesi
    echo $_SESSION['item'], "<br>";
    // Tampilkan alamat yang disimpan dalam sesi
    echo $_SESSION['address'];

    // Setelah tidak membutuhkan data lagi, bersihkan sesi dan alihkan ke php10A.php setelah 3 detik
    // Mengecek apakah sesi sudah dimulai
    if (isset($_SESSION["item"])) {
        // Jika waktu sejak login melebihi 3 detik, bersihkan sesi dan alihkan ke php10A.php
        if (time() - $_SESSION["login_time_stamp"] > 3) {
            session_unset();
            session_destroy();
            header("Location:php10A.php");
        } else {
            // Jika belum 3 detik, perbarui waktu login
            $_SESSION["login_time_stamp"] = time();
        }
    }
    ?>
</body>

</html>