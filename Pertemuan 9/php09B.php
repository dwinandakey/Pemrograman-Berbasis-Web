<!DOCTYPE html>
<html lang='en-GB'>

<head>
    <title>PHP09 B</title>
</head>

<body>
    <?php
    // Menampilkan nilai 'item' yang diterima dari halaman sebelumnya
    echo 'Item: ', $_REQUEST['item'], "<br>";
    // Menampilkan formulir untuk input alamat
    // Menambahkan input hidden untuk menyimpan nilai 'item'
    echo '
            <form action="php09C.php" method="post">
                <label>Address: <input type="text" name="address"></label>
                <input type = "hidden" name ="item" value ="' . $_REQUEST['item'] . '">
            </form>';
    ?>
</body>

</html>