<!DOCTYPE html> 
<html lang='en-GB'>
<head>
    <title>PHP09 E</title>
    <style>
        /* CSS untuk mempercantik tampilan formulir */
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 300px; /* Lebar formulir */
            margin: 0 auto; /* Posisi formulir di tengah halaman */
        }

        label {
            display: inline-block;
            width: 60px; /* Lebar label */
            margin-bottom: 10px; /* Jarak antara label dengan input */
        }

        input[type="text"],
        input[type="email"],
        input[type="submit"] {
            padding: 5px;
            width: 100%; /* Lebar input */
            margin-bottom: 10px;
            box-sizing: border-box; /* Box sizing agar padding tidak menambah lebar */
        }

        input[type="submit"] {
            background-color: #007bff; /* Warna latar belakang tombol */
            color: white; /* Warna teks */
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Warna latar belakang tombol saat dihover */
        }
    </style>
</head>
<body>
    <h1>Add New Meeting Data</h1>
    <!-- Formulir penambahan data pertemuan -->
    <form action="php09E_action.php" method="POST">
        <label for="slot">Slot</label>
        <input type="text" id="slot" name="slot"><br>
        <label for="name">Name</label>
        <input type="text" id="name" name="name"><br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email"><br><br>
        <input type="submit" value="Tambah"> <!-- Tombol submit -->
    </form>
</body>
</html>
