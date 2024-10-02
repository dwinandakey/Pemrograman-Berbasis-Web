<!DOCTYPE html>
<html lang='en-GB'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 08B</title>
</head>

<body>
    <h1>Hello World</h1>
    <?php
    // Menampilkan semua jenis error PHP untuk membantu dalam debugging
    error_reporting(E_ALL);
    // Mengatur agar kesalahan ditampilkan secara langsung di layar
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    // Menampilkan judul sebelum menampilkan informasi tentang tipe data
    echo "<h2>Types and Type Casting</h2>\n";

    // Menghasilkan angka acak antara 1 dan 4 untuk menentukan jenis data acak yang akan dihasilkan
    $mode = rand(1, 4);

    // Struktur kontrol untuk menentukan jenis data acak berdasarkan nilai $mode
    if ($mode == 1)
        $randvar = rand(); // Jika $mode adalah 1, maka nilai acak adalah integer
    elseif ($mode == 2)
        $randvar = (string) rand(); // Jika $mode adalah 2, maka nilai acak dikonversi menjadi string
    elseif ($mode == 3)
        $randvar = rand() / (rand() + 1); // Jika $mode adalah 3, maka nilai acak adalah floating-point number
    else
        $randvar = (bool) $mode; // Jika $mode adalah selain 1, 2, atau 3, maka nilai acak adalah boolean

    // Menampilkan nilai acak yang dihasilkan
    echo "Random scalar: $randvar<br>\n";

    // Struktur kontrol untuk menentukan jenis dari nilai acak yang dihasilkan
    if (is_int($randvar))
        echo "i. This is an integer";
    elseif (is_float($randvar))
        echo "ii. This is a floating-point number";
    elseif (is_string($randvar))
        echo "iii. This is a string";
    else
        echo "I don't know what this is";
    ?>
</body>

</html>