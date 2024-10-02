<!DOCTYPE html>
<html lang='en-GB'>

<head>
    <title>PHP09 C</title>
</head>

<body>
    <?php
    // Menampilkan nilai 'item' yang diterima dari halaman sebelumnya
    echo 'Item: ', $_REQUEST['item'], '<br>';
    // Menampilkan nilai 'address' yang diterima dari halaman sebelumnya
    echo 'Address: ', $_REQUEST['address'], '<br>';
    ?>
    <!-- Membuat tautan kembali ke halaman PHP09 A -->
    <a href="php09A.php">
        <button>Back</button>
    </a>
    <!-- Baris di bawah ini adalah kode JavaScript yang dijadikan komentar -->
    <!-- Kode ini bisa digunakan untuk membuat tombol kembali menggunakan JavaScript -->
    <!-- echo 
        '<button type = "button" onclick = "Back()">Back</button>
        <script>
            function Back(){
            window.location.href = "php09A.php";
            }
        </script> ';
    ?> -->
</body>

</html>
