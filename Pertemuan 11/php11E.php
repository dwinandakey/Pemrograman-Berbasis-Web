<!DOCTYPE html>
<html lang='en-GB'>

<head>
    <title>PHP11 E</title>
    <style>
        /* CSS untuk general layout */
        body {
            font-family: Arial, sans-serif;
            font-size: 20px;
            margin: 0;
            background-color: #f9f9f9;
        }

        /* CSS untuk header */
        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: left;
        }

        /* CSS untuk menu navigasi */
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #575757;
            border-radius: 5px;
        }

        /* CSS untuk judul */
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* CSS untuk kontainer */
        .container {
            width: 50%;
            max-width: 600px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
        }

        /* CSS untuk formulir */
        form {
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="submit"] {
            padding: 10px;
            width: calc(100% - 22px);
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php
    // Memulai sesi
    session_start();

    // Memeriksa apakah pengguna sudah login, jika tidak arahkan ke halaman login
    if (!isset($_SESSION['username'])) {
        header("Location: php11D.php");
        exit();
    }

    // Menyertakan file header untuk navigasi
    include ('php11F_header.php');
    ?>

    <div class="container">
        <h1>Add New Meeting Data</h1>
        <!-- Formulir penambahan data pertemuan -->
        <form action="php11E_action.php" method="POST">
            <label for="slot">Slot</label>
            <input type="text" id="slot" name="slot" required>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <input type="submit" value="Tambah">
        </form>
    </div>
</body>

</html>