<!DOCTYPE html>
<html lang="en-GB">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP10 A</title>
</head>

<body>
    <!-- Formulir untuk mengirimkan data ke php10B.php menggunakan metode POST -->
    <form action="php10B.php" method="post">
        <label for="item">Item:</label>
        <!-- Input teks untuk memasukkan item, wajib diisi -->
        <input type="text" id="item" name="item" required>
        <!-- Tombol submit untuk mengirimkan formulir -->
        <input type="submit" value="Send">
    </form>
</body>

</html>