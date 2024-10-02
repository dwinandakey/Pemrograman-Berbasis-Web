<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 08D</title>
    <style>
        table {
            border-collapse: collapse;
            text-align: center;
        }

        th,
        td {
            padding: 5px;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h1>Associative Arrays</h1>

    <?php
    // Mendefinisikan associative arrays
    $dict1 = array('a' => 1, 'b' => 2);
    // Meng-copy isi dari $dict1 ke $dict2
    $dict2 = $dict1;
    // Mengubah nilai 'b' dalam $dict1
    $dict1['b'] = 4;
    // Menampilkan nilai 'b' dari $dict1 dan $dict2
    echo "\$dict1['b'] = ", $dict1['b'], "<br>\n";
    echo "\$dict2['b'] = ", $dict2['b'], "<br><br>\n";

    // Menampilkan pasangan key-value dalam $dict1
    echo "Tampilan keluaran pasangan key-value dalam array dict1 :<br>\n";
    foreach ($dict1 as $key => $value) {
        echo "Key = $key - Value = $value <br>\n";
    }

    // Memproses teks
    $text = 'lorem ipsum elit congue auctor inceptos taciti suscipit tortor auctor integer congue hac nullam hac auctor tellus nullam inceptos nullam integer tellus nullam auctor elit lorem ipsum elit';
    // Menghapus duplikasi kata dan membagi teks menjadi array kata
    $kata = array_unique(explode(" ", $text));
    echo "<br>";

    // Menghitung jumlah kemunculan setiap kata
    foreach ($kata as $words) {
        $dict3[$words] = substr_count($text, $words);
        echo "$words -> ", $dict3[$words], "<br>\n";
    }

    // Menampilkan jumlah kemunculan kata dalam tabel
    echo "<br><strong> Tabel Urutan </strong></div><br>";
    // Mengurutkan array $dict3 berdasarkan nilai secara menurun
    arsort($dict3);
    echo "<table>\n";
    echo "<tr><th> Kata </th><th> Jumlah Kemunculan </th></tr>\n";
    foreach ($dict3 as $kata => $jumlah) {
        echo "<tr><td> $kata </td><td>$jumlah</td></tr>\n";
    }
    echo "</table>\n";
    ?>
</body>

</html>