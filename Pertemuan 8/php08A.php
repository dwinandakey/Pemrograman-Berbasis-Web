<!DOCTYPE html>
<html lang='en-GB'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Pembuat">
    <meta name="copyright" content="Hak Cipta">
    <meta name="date" content="Tanggal Pembuatan Skrip/Halaman Web">
    <title>Hello World</title>
</head>

<body>
    <h1>Our first PHP script</h1>

    <?php
    $user = "<Dwinanda Muhammad Keyzha>"; // Menginisialisasi variabel $user dengan string "<Dwinanda Muhammad Keyzha>"
    print ("<p><b>Hello $user<br>\nHello World!</b></p>\n"); // Menampilkan pesan "Hello <nama_user>"
    // \n digunakan untuk membuat baris baru dalam HTML
    // $user dimasukkan ke dalam pesan menggunakan tanda kutip ganda ("")
    ?>
</body>

</html>