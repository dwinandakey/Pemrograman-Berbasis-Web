<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 08C</title>
</head>

<body>
    <h1>Array Operators and Regular Expressions</h1>
    <?php
    echo "<h2>Exercise 2a</h2>\n";
    
    // Array awal yang berisi satu elemen 'earth'
    $planets = array("earth");
    
    // Menambahkan beberapa elemen ke awal dan akhir array
    array_unshift($planets, "mercury", "venus");
    array_push($planets, "mars", "jupiter", "saturn");
    
    // Menampilkan isi array $planets setelah penambahan dan penghapusan elemen
    echo "(1) \$planets = [", join(", ", $planets), "]<br>\n";
    $last = array_pop($planets);
    echo "(2) \$planets = [", join(", ", $planets), "]<br>\n";
    $first = array_shift($planets);
    echo "(3) \$planets = [", join(", ", $planets), "]<br>\n";
    echo "(4) \$first = $first, \$last = $last<br>\n";

    echo "<h2>Exercise 2c</h2>\n";
    
    // Membuat salinan array $planets ke $spheres
    $spheres = $planets;
    echo "(5) \$spheres = [", join(", ", $spheres), "]<br>\n";
    
    // Mengubah elemen kedua dari $planets menjadi 'midgard'
    $planets[1] = "midgard";
    echo "(6) \$planets = [", join(", ", $planets), "]<br>\n";
    echo "(6) \$spheres = [", join(", ", $spheres), "]<br>\n";
    
    // Menghubungkan $spheres dengan $planets (referensi)
    $spheres = &$planets;
    echo "(7) \$spheres = [", join(", ", $spheres), "]<br>\n";
    
    // Mengubah elemen pertama dari $planets menjadi 'friga'
    $planets[0] = "friga";
    echo "(8) \$planets = [", join(", ", $planets), "]<br>\n";
    echo "(8) \$spheres = [", join(", ", $spheres), "]<br>\n";
    
    // Menghapus elemen-elemen dari array $planets menggunakan array_pop
    for ($isi = count($planets); $isi > 0; $isi--) {
        $delete = array_pop($planets);
        echo "Removed: ", $delete, " Remaining : [", join(", ", $planets), "]<br>\n";
    }

    echo "<h2>Exercise 3</h2>\n";
    
    // Array nama-nama dengan berbagai gelar
    $names = [
        "Dave Shield",
        "Mr Andy Roxburgh",
        "Dr George Christodoulou",
        "Dr Ullrich Hustadt",
        "Dr David Jackson"
    ];
    
    // Menampilkan nama-nama dengan gelar
    foreach ($names as $name)
        echo "(1) Name: $name<br>\n";

    // Modifikasi nama-nama dengan menghapus gelar dan mengubah urutan nama
    foreach ($names as $nameKey => $name) {
        $find = array("Dr", "Mr");
        $modifiedName = str_ireplace($find, "", $name);

        $nameParts = explode(" ", $modifiedName);
        $firstName = array_pop($nameParts);
        $lastName = implode(" ", $nameParts);

        $names[$nameKey] = strtoupper($lastName) . ", " . $firstName;
    }

    // Menampilkan nama-nama setelah dimodifikasi
    foreach ($names as $name)
        echo "(2) Name: $name<br>\n";
    ?>
</body>

</html>
