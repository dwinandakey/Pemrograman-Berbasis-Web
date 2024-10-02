<!DOCTYPE html>
<html lang='en-GB'>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="php08E.php">
    <title>PHP 08E</title>
</head>

<body>
    <h1>Variable-length Argument Lists</h1>
    <?php
    // Mendefinisikan fungsi reduceOp()
    function reduceOp()
    {
        // Mengambil semua argumen yang diberikan
        $argumen = func_get_args();
        // Menghitung jumlah argumen
        $numArgumen = count($argumen);
        // Memeriksa jika argumen terakhir adalah array dan memiliki kunci 'op'
        if ($numArgumen > 0 && is_array($argumen[$numArgumen - 1]) && array_key_exists('op', $argumen[$numArgumen - 1])) {
            // Mendapatkan operator dari argumen terakhir
            $op = $argumen[$numArgumen - 1]['op'] ?? null;

            // Jika operator tidak ada, lempar pengecualian 'TypeError'
            if ($op === null) {
                throw new Exception('TypeError');
            }

            // Jika jumlah argumen hanya 1 (hanya opsi), kembalikan NULL
            if (count($argumen) == 1) {
                return 'NULL';
            }

            // Hapus argumen terakhir (yaitu array operator)
            array_pop($argumen);
        } else {
            // Jika argumen terakhir bukan array atau tidak memiliki kunci 'op', lempar pengecualian 'TypeError'
            throw new Exception('TypeError');
        }
        // Jika tidak ada argumen, kembalikan NULL
        if ($numArgumen == 0) {
            return null;
        } else {
            // Lakukan operasi sesuai dengan operator yang diberikan
            switch ($op) {
                case '+':
                    return array_sum($argumen); // Penjumlahan semua argumen
                case '-':
                    $result = $argumen[0];
                    for ($i = 1; $i < count($argumen); $i++) {
                        $result -= $argumen[$i]; // Pengurangan semua argumen
                    }
                    return $result;
                case '*':
                    return array_product($argumen); // Perkalian semua argumen
                default:
                    // Jika operator tidak valid, lempar pengecualian 'ValueError'
                    throw new Exception('ValueError');
            }
        }
    }

    // Mengujicoba fungsi reduceOp() dengan berbagai argumen
    try {
        echo "1: ", reduceOp(2, 3), "<br>\n"; // Throws an exception
    } catch (Exception $e) {
        echo "1: Exception ", $e->getMessage(), "<br>\n"; // 'TypeError'
    }

    try {
        echo "2: ", reduceOp(2, 3, array('op' => '/')), // Throws an exception
            "<br>\n";
    } catch (Exception $e) {
        echo "2: Exception ", $e->getMessage(), "<br>\n"; // 'ValueError'
    }

    echo "3: ", reduceOp(array('op' => '+')), // Should return NULL
        "<br>\n";
    echo "4: ", reduceOp(2, array('op' => '*')), // Should return 2
        "<br>\n";
    echo "5: ", reduceOp(2, 3, 5, array('op' => '+')), // Should return 10
        "<br>\n";
    echo "6: ", reduceOp(2, 3, 5, 7, array('op' => '*')), // Should return 210
        "<br>\n";
    echo "7: ", reduceOp(2, 3, 5, 7, 11, array('op' => '-')), // Should return -24
        "<br>\n";
    ?>

</body>

</html>