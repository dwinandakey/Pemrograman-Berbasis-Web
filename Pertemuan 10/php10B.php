<?php
// Set waktu kedaluwarsa sesi menjadi 3600 detik (1 jam)
session_set_cookie_params(3600);
// Mulai sesi
session_start();
// Jika ada permintaan untuk item, simpan item dalam sesi dan catat waktu login
if (isset($_REQUEST['item'])) {
    $_SESSION['item'] = $_REQUEST['item'];
    $_SESSION['login_time_stamp'] = time();
}
?>
<!DOCTYPE html>
<html lang='en-GB'>

<head>
    <title>PHP10B</title>
</head>

<body>
    <!-- Formulir untuk meminta alamat -->
    <form action="php10C.php" method="post">
        <!-- Input teks untuk memasukkan alamat -->
        <label>Address: <input type="text" name="address"></label>
        <!-- Tombol submit untuk mengirimkan formulir -->
        <input type="submit" value="Send">
    </form>
</body>

</html>